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
 * Vacation travel report for Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @subpackage vacation_travel
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__.'/../../../config.php');
require_once(__DIR__.'/../locallib.php');
require_once(__DIR__.'/../classes/output/renderable.php');
require_once(__DIR__.'/../classes/mx_dropdown.php');
require_once('vacation_table.php');

require_login();
require_capability('local/mxschool:manage_vacation_travel', context_system::instance());

$filter = new stdClass();
$filter->dorm = get_param_faculty_dorm();
$filter->submitted = optional_param('submitted', '', PARAM_RAW);
$filter->search = optional_param('search', '', PARAM_RAW);

$parents = array(
    get_string('pluginname', 'local_mxschool') => '/local/mxschool/index.php',
    get_string('vacation_travel', 'local_mxschool') => '/local/mxschool/vacation_travel/index.php'
);
$url = '/local/mxschool/vacation_travel/vacation_report.php';
$title = get_string('vacation_travel_report', 'local_mxschool');

setup_mxschool_page($url, $title, $parents);

$submittedoptions = array(
    '1' => get_string('vacation_travel_report_select_submitted_true', 'local_mxschool'),
    '0' => get_string('vacation_travel_report_select_submitted_false', 'local_mxschool')
);
$dorms = get_boarding_dorm_list();

$table = new vacation_table($filter);

$dropdowns = array(
    new local_mxschool_dropdown('dorm', $dorms, $filter->dorm, get_string('report_select_boarding_dorm', 'local_mxschool')),
    new local_mxschool_dropdown(
        'submitted', $submittedoptions, $filter->submitted, $default = get_string('report_select_default', 'local_mxschool')
    )
);
$addbutton = new stdClass();
$addbutton->text = get_string('vacation_travel_report_add', 'local_mxschool');
$addbutton->url = new moodle_url('/local/mxschool/vacation_travel/vacation_enter.php');
$emailbutton = new stdClass();
$emailbutton->text = get_string('vacation_travel_report_remind', 'local_mxschool');
$emailbutton->emailclass = 'vacation_travel_notify_unsubmitted';
$emailbuttons = array($emailbutton);

$output = $PAGE->get_renderer('local_mxschool');
$renderable = new \local_mxschool\output\report($table, 50, $filter->search, $dropdowns, true, $addbutton, $emailbuttons);

echo $output->header();
echo $output->heading($title);
echo $output->render($renderable);
echo $output->footer();
