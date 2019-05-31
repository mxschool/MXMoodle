<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Generic email notification for all of the emails sent by Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2019, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mxschool\local;

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__.'/../../locallib.php');

use \local_mxschool\event\email_sent;

abstract class notification {

    /** @var string $emailclass The class of the email as specified in the local_mxschool_notification database table.*/
    private $emailclass;
    /** @var string $subject The subject line of the email.*/
    private $subject;
    /** @var string $body The body text of the email.*/
    private $body;
    /** @var array $data The data for the email as [placeholder => value].*/
    protected $data;
    /**
     * @var array $recipients The recipients for the email with string properties email, addresseeshort, and addresseelong
     * and an optional array property replacements which has the form [placeholder => value].
     */
    protected $recipients;

    /**
     * This generic constructor initializes the $emailclass, $subject, and $body fields to the appropriate values,
     * and initializes the $data and $recipients fields to default empty values.
     * Subclasses should call this constructor then add the appropriate entries to the $data and $recipients arrays.
     *
     * @param string $emailclass The class of the email as specified in the local_mxschool_notification database table.
     * @throws coding_exception If the email class does not exist.
     */
    public function __construct($emailclass) {
        global $DB;
        $record = $DB->get_record('local_mxschool_notification', array('class' => $emailclass));
        if (!$record) {
            throw new \coding_exception("Invalid email class: {$emailclass}.");
        }
        $this->emailclass = $emailclass;
        $this->subject = $record->subject;
        $this->body = $record->body_html;
        $this->data = array();
        $this->recipients = array();
    }

    /**
     * Generates the subject line for the email with replacements.
     *
     * @param array $recipientdata Additional substitutions as [placeholder => value].
     * @return string The processed subject line.
     */
    final public function get_subject($recipientdata) {
        return self::replace_placeholders($this->subject, array_merge($this->data, $recipientdata));
    }

    /**
     * Generates the body text for the email with replacements.
     *
     * @param array $recipientdata Additional substitutions as [placeholder => value].
     * @return string The processed body text.
     */
    final public function get_body($recipientdata) {
        return self::replace_placeholders($this->body, array_merge($this->data, $recipientdata));
    }

    /**
     * Sends the notification emails to all of the specified recipients.
     *
     * @return bool A value of true if all emails send successfully, false otherwise.
     * @throws coding_exception If any recipient has a non-valid email or
     *                          if any recipient has no non-empty addresseename, alternatename, or firstname field.
     */
    final public function send() {
        $supportuser = \core_user::get_support_user();
        $result = true;
        foreach ($this->recipients as $recipient) {
            if (empty($recipient->email)) {
                throw new \coding_exception('Recipient has no email address.');
            }
            if (empty($recipient->addresseename) && (empty($recipient->lastname) || empty($recipient->firstname))) {
                throw new \coding_exception('Recipient has no valid option for salutation.');
            }
            $recipientdata = array('email' => $recipient->email);
            if (!empty($recipient->addresseename)) {
                $recipientdata['addresseeshort'] = $recipientdata['addresseelong'] = $recipient->addresseename;
            } else {
                $recipientdata['addresseeshort'] = !empty($recipient->alternatename)
                    ? $recipient->alternatename : $recipient->firstname;
                $recipientdata['addresseelong'] = "{$recipient->lastname}, {$recipient->firstname}" . (
                    !empty($recipient->alternatename) && $recipient->alternatename !== $recipient->firstname
                        ? " ({$recipient->alternatename})" : ''
                );
            }
            if (!empty($recipient->replacements)) {
                $recipientdata += $recipient->replacements;
            }
            $subject = $this->get_subject($recipientdata);
            $body = $this->get_body($recipientdata);
            $redirect = get_config('local_mxschool', 'email_redirect');
            if (!empty($redirect)) {
                $recipient->email = $redirect;
            }
            $result &= email_to_user($recipient, $supportuser, $subject, '', $body);
            email_sent::create(array('other' => array('emailclass' => $this->emailclass)))->trigger();
        }
        return $result;
    }

    /**
     * @return array The list of strings which can serve as tags for the notification.
     */
    public function get_tags() {
        return array('email', 'addresseeshort', 'addresseelong');
    }

    /**
     * Generates a user object to which emails should be sent to reach the deans.
     * @return stdClass The deans user object.
     */
    final protected static function get_deans_user() {
        $supportuser = \core_user::get_support_user();
        $deans = clone $supportuser;
        $deans->email = get_config('local_mxschool', 'email_deans');
        $deans->addresseename = get_config('local_mxschool', 'addressee_deans');
        return $deans;
    }

    /**
     * Generates a user object to which emails should be sent to reach the transportation manager.
     * @return stdClass The deans user object.
     */
    final protected static function get_transportationmanager_user() {
        $supportuser = \core_user::get_support_user();
        $transportationmanager = clone $supportuser;
        $transportationmanager->email = get_config('local_mxschool', 'email_transportationmanager');
        $transportationmanager->addresseename = get_config('local_mxschool', 'addressee_transportationmanager');
        return $transportationmanager;
    }

    /**
     * Substitutes placeholders with values in an arbitrary string.
     *
     * @param string $string The string with placeholders.
     * @param stdClass|array $replacements The substitutions to make as [placeholder => value].
     * @return string The original string with the substitutions having been made.
     */
    final protected static function replace_placeholders($string, $replacements) {
        $replacements = (array)$replacements;
        foreach ($replacements as $placeholder => $value) {
            $string = str_replace("{{$placeholder}}", $value, $string);
        }
        return $string;
    }

}
