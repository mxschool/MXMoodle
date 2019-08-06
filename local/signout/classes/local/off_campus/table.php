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
 * Off-campus signout table for Middlesex's eSignout Subplugin.
 *
 * @package     local_signout
 * @subpackage  off_campus
 * @author      Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author      Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright   2019 Middlesex School, 1400 Lowell Rd, Concord MA 01742 All Rights Reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_signout\local\off_campus;

defined('MOODLE_INTERNAL') || die();

class table extends \local_mxschool\table {

    /**
     * Creates a new off_campus_table.
     *
     * @param stdClass $filter Any filtering for the table - could include properties type, date, and search.
     */
    public function __construct($filter) {
        global $USER;
        $columns = array(
            'student', 'grade', 'type', 'passengers', 'passengercount', 'driver', 'destination', 'departuredate', 'departuretime',
            'approver', 'signin'
        );
        if ($filter->type) {
            if (in_array($filter->type, array('Driver', 'Passenger', 'Parent', 'Rideshare'))) {
                unset($columns[array_search('type', $columns)]);
            }
            if ($filter->type !== 'Driver') {
                unset($columns[array_search('passengers', $columns)]);
                unset($columns[array_search('passengercount', $columns)]);
            }
            if ($filter->type !== 'Passenger') {
                unset($columns[array_search('driver', $columns)]);
            }
        }
        if ($filter->date) {
            unset($columns[array_search('departuredate', $columns)]);
        }
        $headers = $this->generate_headers($columns, 'off_campus_report', 'local_signout');
        $sortable = array($filter->date ? 'departuretime' : 'departuredate', 'student', 'grade', 'approver');
        $centered = array('grade', 'type', 'driver', 'passengers', 'passengercount', 'departuredate', 'departuretime', 'signin');
        parent::__construct('off_campus_table', $columns, $headers, $sortable, $centered, $filter, true, false);

        $fields = array(
            'oc.id', 'oc.userid', "CONCAT(u.lastname, ', ', u.firstname) AS student", 's.grade', 'oc.type', 'oc.passengers',
            'du.id AS driverid', 'd.destination', 'd.departure_time AS departuredate', 'd.departure_time AS departuretime',
            "CONCAT(a.lastname, ', ', a.firstname) AS approver", 'oc.sign_in_time AS signin', 'oc.time_created AS timecreated'
        );
        $from = array(
            '{local_signout_off_campus} oc', '{user} u ON oc.userid = u.id', '{local_mxschool_student} s on oc.userid = s.userid',
            '{local_signout_off_campus} d ON oc.driverid = d.id', '{user} du ON d.userid = du.id',
            '{user} a ON oc.approverid = a.id'
        );
        $where = array('oc.deleted = 0', 'u.deleted = 0', 'd.deleted = 0', 'du.deleted = 0');
        if ($filter->type) {
            $types = array('Driver', 'Passenger', 'Parent', 'Rideshare');
            $otherstring = implode(' AND ', array_map(function($type) {
                return "oc.type <> '{$type}'"; // Need to negate all types because the 'Other' text is stored in the type field.
            }, $types));
            $where[] = in_array($filter->type, $types) ? "oc.type = '{$filter->type}'" : $otherstring;
        }
        if ($filter->date) {
            $starttime = generate_datetime($filter->date);
            $endtime = clone $starttime;
            $endtime->modify('+1 day');
            array_push($where, "d.departure_time >= {$starttime->getTimestamp()}", "d.departure_time < {$endtime->getTimestamp()}");
        }
        $searchable = array(
            'u.firstname', 'u.lastname', 'u.alternatename', 'du.firstname', 'du.lastname', 'du.alternatename', 'd.destination',
            'a.firstname', 'a.lastname'
        );
        $this->define_sql($fields, $from, $where, $searchable, $filter->search);
    }

    /**
     * Formats the passengers column.
     */
    protected function col_passengers($values) {
        global $DB;
        if ($values->type !== 'Driver') {
            return '-';
        }
        $passengers = array_filter(array_map(function($passenger) use($DB) {
            return format_student_name($passenger);
        }, json_decode($values->passengers)));
        return count($passengers) ? implode('<br>', $passengers) : get_string('off_campus_report_nopassengers', 'local_signout');
    }

    /**
     * Formats the passenger count column.
     */
    protected function col_passengercount($values) {
        global $DB;
        if ($values->type !== 'Driver') {
            return '-';
        }
        $submitted = $DB->count_records_sql(
            "SELECT COUNT(oc.id)
             FROM {local_signout_off_campus} oc LEFT JOIN {user} u ON oc.userid = u.id
             WHERE oc.driverid = ? AND oc.deleted = 0 AND u.deleted = 0", array($values->id)
        ) - 1;
        $count = count(array_filter(json_decode($values->passengers), function($passenger) use ($DB) {
            return !$DB->get_field('user', 'deleted', array('id' => $passenger));
        }));
        return "{$submitted} / {$count}";
    }

    /**
     * Formats the driver column to "last, first (alternate)" or "last, first".
     */
    protected function col_driver($values) {
        return $values->type === 'Passenger' ? format_student_name($values->driverid) : '-';
    }

    /**
     * Formats the departure date column to 'n/j/y'.
     */
    protected function col_departuredate($values) {
        return format_date('n/j/y', $values->departuredate);
    }

    /**
     * Formats the departure time column to 'g:i A'.
     */
    protected function col_departuretime($values) {
        return format_date('g:i A', $values->departuretime);
    }

    /**
     * Formats the sign-in time column to 'g:i A'.
     */
    protected function col_signin($values) {
        return isset($values->signin) ? format_date('g:i A', $values->signin) : '-';
    }

    /**
     * Formats the actions column.
     */
    protected function col_actions($values) {
        return $this->edit_icon('/local/signout/off_campus/form.php', $values->id) . $this->delete_icon($values->id);
    }

}
