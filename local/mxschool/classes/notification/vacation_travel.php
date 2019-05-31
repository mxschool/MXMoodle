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
 * Email notifications for the vacation travel subpackage of Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @subpackage vacation_travel
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2019, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mxschool\local\vacation_travel;

defined('MOODLE_INTERNAL') || die();

require_once('mx_notification.php');

use local_mxschool\local\notification;

/**
 * Email notification for when a vacation travel form is submitted for Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @subpackage vacation_travel
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2019, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class submitted extends notification {

    /**
     * @param int $id The id of the vacation travel form which has been submitted.
     * @throws coding_exception If the specified record does not exist.
     */
    public function __construct($id) {
        global $DB;
        parent::__construct('vacation_travel_submitted');

        $record = $DB->get_record_sql(
            "SELECT u.id AS student, u.firstname, u.lastname, u.alternatename, t.destination, t.phone_number AS phonenumber,
                    t.time_modified AS timesubmitted, d.mx_transportation AS depmxtransportation, d.type AS deptype,
                    ds.name AS depsite, d.details AS depdetails, d.carrier AS depcarriercompany,
                    d.transportation_number AS depnumber, d.date_time AS depvariable, d.international AS depinternational,
                    r.mx_transportation AS retmxtransportation, r.type AS rettype, rs.name AS retsite, r.details AS retdetails,
                    r.carrier AS retcarriercompany, r.transportation_number AS retnumber, r.date_time AS retvariable,
                    r.international AS retinternational
             FROM {local_mxschool_vt_trip} t LEFT JOIN {user} u ON t.userid = u.id
             LEFT JOIN {local_mxschool_vt_transport} d ON t.departureid = d.id
             LEFT JOIN {local_mxschool_vt_site} ds ON d.siteid = ds.id
             LEFT JOIN {local_mxschool_vt_transport} r ON t.returnid = r.id
             LEFT JOIN {local_mxschool_vt_site} rs ON r.siteid = rs.id WHERE t.id = ?", array($id)
        );
        if (!$record) {
            throw new coding_exception("Record with id {$id} not found.");
        }

        $this->data['studentname'] = "{$record->lastname}, {$record->firstname}".(
            !empty($record->alternatename) && $record->alternatename !== $record->firstname ? " ({$record->alternatename})" : ''
        );
        $this->data['destination'] = $record->destination ?? '-';
        $this->data['phonenumber'] = $record->phonenumber ?? '-';
        $this->data['depmxtransportation'] = $record->depmxtransportation ? get_string('yes') : get_string('no');
        $this->data['deptype'] = $record->deptype ?? '-';
        $this->data['depsite'] = $record->depsite ?? '-';
        $this->data['depdetails'] = $record->depdetails ?? '-';
        $this->data['depcarriercompany'] = $record->depcarriercompany ?? '-';
        $this->data['depnumber'] = $record->depnumber ?? '-';
        $this->data['depdatetime'] = date('n/j/y g:i A', $record->depvariable);
        $this->data['depinternational'] = isset($record->depinternational) ? (
            $record->depinternational ? get_string('yes') : get_string('no')
        ) : '-';
        $this->data['retmxtransportation'] = isset($record->retmxtransportation) ? (
            $record->retmxtransportation ? get_string('yes') : get_string('no')
        ) : '';
        $this->data['rettype'] = $record->rettype ?? '-';
        $this->data['retsite'] = $record->retsite ?? '-';
        $this->data['retdetails'] = $record->retdetails ?? '-';
        $this->data['retcarriercompany'] = $record->retcarriercompany ?? '-';
        $this->data['retnumber'] = $record->retnumber ?? '-';
        $this->data['retdatetime'] = isset($record->retvariable) ? date('n/j/y g:i A', $record->retvariable) : '';
        $this->data['retinternational'] = isset($record->retinternational) ? (
            $record->retinternational ? get_string('yes') : get_string('no')
        ) : '-';
        $this->data['timesubmitted'] = date('n/j/y g:i A', $record->timesubmitted);

        array_push(
            $this->recipients, $DB->get_record('user', array('id' => $record->student)), self::get_transportationmanager_user()
        );
    }

    /**
     * @return array The list of strings which can serve as tags for the notification.
     */
    public function get_tags() {
        return array_merge(array(
            'studentname', 'destination', 'phonenumber', 'depmxtransportation', 'deptype', 'depsite', 'depdetails',
            'depcarriercompany', 'depnumber', 'depdatetime', 'depinternational', 'retmxtransportation', 'rettype', 'retsite',
            'retdetails', 'retcarriercompany', 'retnumber', 'retdatetime', 'retinternational', 'timesubmitted'
        ), parent::get_tags());
    }
}

/**
 * Email notification to remind students to complete the vacation travel form
 * for Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @subpackage vacation_travel
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2019, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class notify_unsubmitted extends notification {

    public function __construct() {
        global $DB;
        parent::__construct('vacation_travel_notify_unsubmitted');

        $list = get_student_without_vacation_travel_form_list();
        foreach ($list as $userid => $name) {
            $this->recipients[] = $DB->get_record('user', array('id' => $userid));
        }
        $this->recipients[] = self::get_deans_user();
    }

}
