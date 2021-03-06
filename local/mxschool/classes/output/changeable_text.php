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
 * Renderable class for changeable text for Middlesex's Dorm and Student Functions Plugin.
 * Can be accessed in javascript with $('.mx-changeable-text'+element_name+userid).
 *
 * @package     local_mxschool
 * @author      Cannon Caspar, Class of 2021 <cpcaspar@mxschool.edu>
 * @author      Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright   2020 Middlesex School, 1400 Lowell Rd, Concord MA 01742 All Rights Reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mxschool\output;

defined('MOODLE_INTERNAL') || die();

class changeable_text implements \renderable, \templatable {

	/** @var string The user's id.*/
	public $userid;
	/** @var string The element's name.*/
	public $element_name;
    /** @var string Default text.*/
    public $default_text;

    public function __construct($userid, $element_name, $default_text) {
	   $this->userid = $userid;
	   $this->element_name = $element_name;
        $this->default_text = $default_text;
    }

    /**
     * Exports this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output The renderer which is rendering this renderable.
     * @return stdClass Object with properties depending on the button type.
     */
    public function export_for_template(\renderer_base $output) {
        return (object) array('userid' => $this->userid,
	   					'element_name' => $this->element_name,
		   				'default_text' => $this->default_text);
    }

}
