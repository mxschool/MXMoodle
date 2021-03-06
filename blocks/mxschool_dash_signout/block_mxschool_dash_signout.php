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
 * Content for Middlesex's Signout Block for Students.
 *
 * @package    block_mxschool_dash_signout
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2019 Middlesex School, 1400 Lowell Rd, Concord MA 01742 All Rights Reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__.'/../../local/signout/locallib.php');

class block_mxschool_dash_signout extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_mxschool_dash_signout');
    }

    public function get_content() {
        global $DB, $USER;
        if (isset($this->content)) {
            return $this->content;
        }

        $currentsignout = get_user_current_signout();
        $buttons = array();
        if ($currentsignout) {
            $state = get_string('state:out', 'block_mxschool_dash_signout', $currentsignout->location);
            if ($currentsignout->type === 'on_campus') {
                $buttons[] = new local_mxschool\output\redirect_button(
                    get_string('on_campus_button:edit', 'block_mxschool_dash_signout'),
                    new moodle_url('/local/signout/on_campus/form.php')
                );
                $boardingstatus = strtolower($DB->get_field(
                    'local_mxschool_student', 'boarding_status', array('userid' => $USER->id)
                ));
                $buttons[] = new local_signout\output\sign_in_button(
                    get_string("on_campus_button:signin:{$boardingstatus}", 'block_mxschool_dash_signout')
                );
            } else {
                if (generate_datetime()->getTimestamp() < get_edit_cutoff($currentsignout->timecreated)) {
                    $buttons[] = new local_mxschool\output\redirect_button(
                        get_string('off_campus_button:edit', 'block_mxschool_dash_signout'),
                        new moodle_url('/local/signout/off_campus/form.php', array('id' => $currentsignout->id))
                    );
                } else {
                    $buttons[] = new local_signout\output\sign_in_button(
                        get_string('off_campus_button:signin', 'block_mxschool_dash_signout')
                    );
                }
            }
        } else {
            $state = get_string('state:in', 'block_mxschool_dash_signout');
            if (user_is_admin() || (user_is_student() && student_may_access_on_campus_signout($USER->id))) {
                $buttons[] = new local_mxschool\output\redirect_button(
                    get_string('on_campus_button:signout', 'block_mxschool_dash_signout'),
                    new moodle_url('/local/signout/on_campus/form.php')
                );
            }
            if (user_is_admin() || (user_is_student() && student_may_access_off_campus_signout($USER->id))) {
                $buttons[] = new local_mxschool\output\redirect_button(
                    get_string('off_campus_button:signout', 'block_mxschool_dash_signout'),
                    new moodle_url('/local/signout/off_campus/form.php')
                );
            }
        }
        $this->content = new stdClass();
        if (count($buttons)) {
            $this->content->text = $state . '<br>' . array_reduce($buttons, function($html, $button) {
                global $PAGE;
                $output = $PAGE->get_renderer('local_signout');
                return $html . $output->render($button);
            }, '');
        }
        return $this->content;
    }

    public function specialization() {
        $this->title = get_string('blockname', 'block_mxschool_dash_signout');
    }
}
