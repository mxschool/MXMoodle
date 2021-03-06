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
 * Test report table for Middlesex's Dorm and Student Functions Plugin.
 *
 * @package     local_mxschool
 * @subpackage  healthtest
 * @author      Cannon Caspar, Class of 2021 <cpcaspar@mxschool.edu>
 * @author      Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright   2021 Middlesex School, 1400 Lowell Rd, Concord MA 01742 All Rights Reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 namespace local_mxschool\local\healthtest;

 defined('MOODLE_INTERNAL') || die();

 use local_mxschool\output\checkbox;

 class test_table extends \local_mxschool\table {

   /**
    * Creates a new table.
    *
    * @param stdClass $filter Any filtering for the table.
    * @param string download, indicates if the table is downloading
    */
   public function __construct($filter, $download) {
	  $this->is_downloading($download);
 	  // Define the names of the columns. Should match up with the $fields array.
       $columns = array('testing_cycle', 'block', 'name', 'grade', 'dorm', 'has_tested');
 	  // Get headers from language file
       $headers = $this->generate_headers($columns, 'healthtest:test_report');
 	  // Define sortable columns
       $sortable = array('name', 'testing_cycle', 'grade', 'has_tested');
 	  // All columns are centered
       $centered = array('testing_cycle', 'block', 'name', 'dorm', 'grade', 'has_tested');
       parent::__construct('healthtest_test_table', $columns, $headers, $sortable, $centered, $filter, true);

 	  // The fields to query from the database
       $fields = array('ht.id AS htid', 'u.lastname', 'u.firstname', 'u.alternatename', 'u.lastname AS name', 'stu.grade', 'stu.boarding_status',
  					'd.name AS dorm', 'ht.attended AS has_tested', 'ht.testing_block_id', 'tb.testing_cycle', 'tb.id AS tbid', 'tb.start_time',
					'tb.end_time', 'tb.date AS tbdate');
 	  // The tables which to query
       $from = array('{local_mxschool_healthtest} ht', '{local_mxschool_testing_block} tb ON tb.id = ht.testing_block_id',
  					'{user} u ON u.id = ht.userid', '{local_mxschool_student} stu ON stu.userid = u.id',
					'{local_mxschool_dorm} d ON d.id = stu.dormid');
 	  // Get everything unless there are filters
 	  $where = array('u.deleted = 0');

	  if($filter->testing_cycle) {
		  $where[] = "tb.testing_cycle = '{$filter->testing_cycle}'";
	  }

	  if($filter->block) {
		  // Ensure that the user isn't filtering by a cycle and a block that isn't in that cycle.
		  if(healthtest_block_is_in_testing_cycle($filter->block, $filter->testing_cycle)) {
			  $where[] = "tb.id = {$filter->block}";
		  }
	  }
	  if($filter->attended) {
		  if($filter->attended == 'Absent') {
			  $where[] = "ht.attended = 0";
		  }
		  else if($filter->attended == 'Present') {
			 $where[] = "ht.attended = 1";
		  }
	  }

        $searchable = array('u.firstname', 'u.lastname', 'u.alternatename');
        $this->define_sql($fields, $from, $where, $searchable, $filter->search);
   }

	// The following functions edit what is displayed in individual columns

	protected function col_name($values) {
		if($values->alternatename) return "{$values->lastname}, {$values->firstname} ({$values->alternatename})";
		return "{$values->lastname}, {$values->firstname}";
	}

	protected function col_dorm($values) {
		if(!$values->dorm) return '';
		return "{$values->dorm} ({$values->boarding_status})";
	}

	protected function col_has_tested($values) {
		if($this->is_downloading()) return $values->has_tested ? 'X' : '';
		global $PAGE;
		$output = $PAGE->get_renderer('local_mxschool');
		$renderable = new checkbox($values->htid, 'local_mxschool_healthtest', 'attended', $values->has_tested);
		return $output->render($renderable);
	}

	protected function col_block($values) {
		$block_date = date('n/d', strtotime($values->tbdate));
		$block_start = date('g:i A', strtotime($values->start_time));
		return "{$block_date} {$block_start}";
	}

	protected function col_testing_cycle($values) {
		$testing_cycle_dates = get_testing_cycle_dates($values->testing_cycle);
		$cycle_start = date('n/d', strtotime($testing_cycle_dates['start']));
		$cycle_end = date('n/d', strtotime($testing_cycle_dates['end']));
		return "{$cycle_start} -- {$cycle_end}";
	}

	/**
	 * Formats the actions column.
	 */
	protected function col_actions($values) {
	    return isset($values->htid) ? $this->delete_icon($values->htid) : '';
	}
}
