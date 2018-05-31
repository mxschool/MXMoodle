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
 * Generic moodleform with desired defaults to be used for Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/formslib.php');

abstract class local_mxschool_form extends moodleform {

    const ELEMENT_TEXT = array(
        'element' => 'text', 'type' => PARAM_TEXT, 'attributes' => array('size' => 20)
    );
    const ELEMENT_TEXT_REQUIRED = array(
        'element' => 'text', 'type' => PARAM_TEXT, 'attributes' => array('size' => 20), 'rules' => array('required')
    );
    const ELEMENT_YES_NO = array(
        'element' => 'radio', 'options' => array('Yes', 'No')
    );
    const ELEMENT_YES_NO_REQUIRED = array(
        'element' => 'radio', 'options' => array('Yes', 'No'), 'rules' => array('required')
    );
    const ELEMENT_EMAIL_REQUIRED = array(
        'element' => 'text', 'type' => PARAM_TEXT, 'attributes' => array('size' => 40), 'rules' => array('email', 'required')
    );

    /**
     * Sets all the fields for the form.
     *
     * @param array $hidden any hidden fields to be placed at the top of the form.
     * @param array $fields array of fields as category => [name => [properties]].
     * @param string $stringprefix a prefix for any necessary language strings.
     */
    protected function set_fields($hidden, $fields, $stringprefix) {
        $mform = $this->_form;

        $this->add_action_buttons();
        foreach ($hidden as $name) {
            $mform->addElement('hidden', $name, null);
            $mform->setType($name, PARAM_INT);
        }
        foreach ($fields as $category => $categoryfields) {
            $mform->addElement('header', $category, get_string("{$stringprefix}_header_{$category}", 'local_mxschool'));
            foreach ($categoryfields as $name => $properties) {
                $displayname = get_string("{$stringprefix}_{$category}_{$name}", 'local_mxschool');
                switch($properties['element']) {
                    case 'radio':
                        $buttons = array();
                        foreach ($properties['options'] as $option) {
                            $buttons[] = $mform->createElement('radio', $name, '', $option, $option);
                        }
                        $name = "{$name}group";
                        $mform->addGroup($buttons, $name, $displayname, '     ', false);
                        break;
                    case 'select':
                        $mform->addElement('select', $name, $displayname, $properties['options']);
                        break;
                    default:
                        $mform->addElement($properties['element'], $name, $displayname, $properties['attributes']);
                }
                if (isset($properties['type'])) {
                    $mform->setType($name, $properties['type']);
                }
                if (isset($properties['rules'])) {
                    if (in_array('required', $properties['rules'])) {
                        $mform->addRule($name, null, 'required', null, 'client');
                    }
                    if (in_array('email', $properties['rules'])) {
                        $mform->addRule($name, null, 'email');
                    }
                }
            }
        }
        $this->add_action_buttons();
    }

}
