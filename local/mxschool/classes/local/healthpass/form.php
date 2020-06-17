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
 * Form to submit daily intake for Middlesex Health Pass Plugin.
 *
 * @package     local_mxschool
 * @subpackage  healthpass
 * @author      Cannon Caspar, Class of 2021 <cpcaspar@mxschool.edu>
 * @author      Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright   2019 Middlesex School, 1400 Lowell Rd, Concord MA 01742 All Rights Reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mxschool\local\healthpass;

defined('MOODLE_INTERNAL') || die();

class form extends \local_mxschool\form {

    /**
     * Form definition.
     */
    protected function definition() {
	   // All possible temperature values
        $temps = array(
           '96' => '96', '97' => '97', '98' => '98', '99' => '99',
           '100' => '100', '101' => '101', '102' => '102', '103' => '103', '104' => '104', '105' => '105'
         );
	    $temp_decimals = array(
		    '.1' => '.1', '.2' => '.2', '.3' => '.3', '.4' => '.4',
		    '.5' => '.5', '.6' => '.6', '.7' => '.7', '.8' => '.8',
		    '.9' => '.9'
	    );

	   // Get $users and $isManager from form page
        $users = $this->_customdata['users'];
	   $isManager = $this->_customdata['isManager'];

	   // Define fields
        $fields = array(
            '' => array(
                'id' => self::ELEMENT_HIDDEN_INT,
                'timecreated' => self::ELEMENT_HIDDEN_INT,
                'isstudent' => self::ELEMENT_HIDDEN_INT
            ),
            'health_info' => array(
                'name' => $isManager ?
			   array('element' => 'select', 'options' => $users)
			 : array('element' => 'static', 'text' => $users['name']),
                'body_temperature' => array('element' => 'group', 'children' => array(
				 'temp' => array('element' => 'select', 'options' => $temps),
				 'temp_decimal' => array('element' => 'select', 'options' => $temp_decimals)
			 )),
                'anyone_sick_at_home' => self::ELEMENT_YES_NO_REQUIRED,
			 'traveled_internationally' => self::ELEMENT_YES_NO_REQUIRED
            ),
            'symptoms' => array(
                'has_fever' => self::ELEMENT_YES_NO,
                'has_sore_throat' => self::ELEMENT_YES_NO,
                'has_cough' => self::ELEMENT_YES_NO,
                'has_runny_nose' => self::ELEMENT_YES_NO,
                'has_muscle_aches' => self::ELEMENT_YES_NO,
                'has_loss_of_sense' => self::ELEMENT_YES_NO,
                'has_short_breath' => self::ELEMENT_YES_NO,
		 ),
        );
        $this->set_fields($fields, 'healthpass:form', false, 'local_mxschool', false);

        $mform = $this->_form;
	   $mform->setDefault('body_temperature_temp', '98');
	   $mform->setDefault('body_temperature_temp_decimal', '.6');

	   // Create 'I have no symptoms' button and then add 'Save Changes' and 'Cancel' buttons
	   $mform->addElement($mform->createElement('submit', 'no_symptoms', get_string('healthpass:form:no_symptoms_button', 'local_mxschool')));
	   $this->add_action_buttons();
    }

    /**
	* Validates the health form before it can be submitted.
	* The checks performed are to ensure that the user did not click 'I have no symptoms'
	* when yes has been selected for any of the symptoms.
	*
	* @return array of errors as "element_name"=>"error_description" or an empty array if there are no errors.
	*/
    public function validation($data, $files) {
	   global $DB;
	   $errors = parent::validation($data, $files);
	   if($data['no_symptoms']) { // if no_symptoms button is pressed but there are yes's
		   if($data['has_fever']=='Yes') $errors['has_fever'] = get_string('healthpass:form:error:no_symptoms_logic', 'local_mxschool');
		   if($data['has_sore_throat']=='Yes') $errors['has_sore_throat'] = get_string('healthpass:form:error:no_symptoms_logic', 'local_mxschool');
		   if($data['has_cough']=='Yes') $errors['has_cough'] = get_string('healthpass:form:error:no_symptoms_logic', 'local_mxschool');
		   if($data['has_runny_nose']=='Yes') $errors['has_runny_nose'] = get_string('healthpass:form:error:no_symptoms_logic', 'local_mxschool');
		   if($data['has_muscle_aches']=='Yes') $errors['has_muscle_aches'] = get_string('healthpass:form:error:no_symptoms_logic', 'local_mxschool');
		   if($data['has_loss_of_sense']=='Yes') $errors['has_loss_of_sense'] = get_string('healthpass:form:error:no_symptoms_logic', 'local_mxschool');
		   if($data['has_short_breath']=='Yes') $errors['has_short_breath'] = get_string('healthpass:form:error:no_symptoms_logic', 'local_mxschool');
	   }
	   if(!$data['no_symptoms']) { // if save changes is pressed but there are unset symptoms
		   if(!isset($data['has_fever'])) $errors['has_fever'] = get_string('healthpass:form:error:unset_symptom', 'local_mxschool');
		   if(!isset($data['has_sore_throat'])) $errors['has_sore_throat'] = get_string('healthpass:form:error:unset_symptom', 'local_mxschool');
		   if(!isset($data['has_cough'])) $errors['has_cough'] = get_string('healthpass:form:error:unset_symptom', 'local_mxschool');
		   if(!isset($data['has_runny_nose'])) $errors['has_runny_nose'] = get_string('healthpass:form:error:unset_symptom', 'local_mxschool');
		   if(!isset($data['has_muscle_aches'])) $errors['has_muscle_aches'] = get_string('healthpass:form:error:unset_symptom', 'local_mxschool');
		   if(!isset($data['has_loss_of_sense'])) $errors['has_loss_of_sense'] = get_string('healthpass:form:error:unset_symptom', 'local_mxschool');
		   if(!isset($data['has_short_breath'])) $errors['has_short_breath'] = get_string('healthpass:form:error:unset_symptom', 'local_mxschool');
	   }
	   return $errors;
    }
}
