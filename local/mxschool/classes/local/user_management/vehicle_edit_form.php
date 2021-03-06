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
 * Form for editing vehicle data for Middlesex's Dorm and Student Functions Plugin.
 *
 * @package     local_mxschool
 * @subpackage  user_management
 * @author      Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author      Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright   2019 Middlesex School, 1400 Lowell Rd, Concord MA 01742 All Rights Reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mxschool\local\user_management;

defined('MOODLE_INTERNAL') || die();

class vehicle_edit_form extends \local_mxschool\form {

    /**
     * Form definition.
     */
    protected function definition() {
        $drivers = $this->_customdata['drivers'];

        $fields = array(
            '' => array(
                'id' => self::ELEMENT_HIDDEN_INT
            ),
            'info' => array(
                'student' => array('element' => 'select', 'options' => $drivers, 'rules' => array('required')),
            ),
            'vehicle' => array(
                'make' => self::ELEMENT_TEXT_REQUIRED,
                'model' => self::ELEMENT_TEXT_REQUIRED,
                'color' => self::ELEMENT_TEXT_REQUIRED,
                'registration' => self::ELEMENT_TEXT_REQUIRED
            )
        );
        $this->set_fields($fields, 'user_management:vehicle_edit');
    }
}
