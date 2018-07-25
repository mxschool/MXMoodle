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
 * Peer Tutoring index page for Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_peertutoring
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once(__DIR__.'/../mxschool/locallib.php');
require_once(__DIR__.'/../mxschool/classes/output/renderable.php');

if (!has_capability('moodle/site:config', context_system::instance())) {
    redirect(new moodle_url('/my'));
}

admin_externalpage_setup('peertutoring_index');

$url = '/local/mxschool/peertutoring/index.php';
$title = get_string('peertutoring', 'local_peertutoring');

setup_generic_page($url, $title);

$output = $PAGE->get_renderer('local_mxschool');
$renderable = new \local_mxschool\output\index(array(
    get_string('preferences', 'local_peertutoring') => '/local/peertutoring/preferences.php',
    get_string('tutoring_form', 'local_peertutoring') => '/local/peertutoring/tutoring_enter.php',
    get_string('tutoring_report', 'local_peertutoring') => '/local/peertutoring/tutoring_report.php'
));

echo $output->header();
echo $output->heading($title);
echo $output->render($renderable);
echo $output->footer();
