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
 * English language strings for Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2019, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Middlesex School';

/* General */
$string['print'] = 'Print';
$string['checkbox_saved'] = 'saved';
$string['email_button_default'] = 'Send Emails';
$string['email_button_confirmation'] = 'Are you sure you want to send this bulk notification?';
$string['email_button_sending'] = 'Emails Sending...';
$string['email_button_send_success'] = 'Emails Sent';
$string['email_button_send_failure'] = 'Emails Failed to Send';
$string['sign_in_button'] = 'Sign In';
$string['legend_header'] = 'Legend';

$string['report_header_actions'] = 'Actions';
$string['report_delete_warning'] = 'Are you sure want to delete this record?';
$string['report_select_default'] = 'All';
$string['report_select_dorm'] = 'All Houses';
$string['report_select_boarding_dorm'] = 'All Dorms';
$string['form_select_default'] = 'Select';

$string['first_semester'] = 'First Semester';
$string['second_semester'] = 'Second Semester';
$string['am'] = 'AM';
$string['pm'] = 'PM';
$string['room_type_single'] = 'Single';
$string['room_type_double'] = 'Double';
$string['room_type_quad'] = 'Quad';

// Capabilities.
$string['mxschool:manage_students'] = 'Middlesex School: View and manage student data';
$string['mxschool:manage_faculty'] = 'Middlesex School: View and manage faculty data';
$string['mxschool:manage_dorms'] = 'Middlesex School: View and manage dorm data';
$string['mxschool:manage_vehicles'] = 'Middlesex School: View and manage student vehicle registration';
$string['mxschool:view_checkin'] = 'Middlesex School: View checkin sheets';
$string['mxschool:manage_checkin_preferences'] = 'Middlesex School: View and manage checkin preferences';
$string['mxschool:manage_weekend'] = 'Middlesex School: View and manage weekend forms';
$string['mxschool:manage_esignout'] = 'Middlesex School: View and manage student eSignout records';
$string['mxschool:manage_esignout_preferences'] = 'Middlesex School: View and manage eSignout preferences';
$string['mxschool:manage_advisor_selection'] = 'Middlesex School: View and manage students\' advisor selection records';
$string['mxschool:manage_advisor_selection_preferences'] = 'Middlesex School: View and manage advisor selection preferences';
$string['mxschool:manage_rooming'] = 'Middlesex School: View and manage students\' rooming request records';
$string['mxschool:manage_rooming_preferences'] = 'Middlesex School: View and manage rooming preferences';
$string['mxschool:manage_vacation_travel'] = 'Middlesex School: View and manage students\' basic vacation travel records';
$string['mxschool:notify_vacation_travel'] = 'Middlesex School: Notify students who haven\'t submitted a vacation travel form';
$string['mxschool:manage_vacation_travel_transportation'] = 'Middlesex School: View and manage students\' detailed vacation travel records';
$string['mxschool:manage_vacation_travel_preferences'] = 'Middlesex School: View and manage vacation travel preferences';


// Settings Pages.
$string['mxschool_category'] = 'Middlesex School';

$string['email_settings'] = 'Email Settings';
$string['email_redirect'] = 'Redirect Email';
$string['email_redirect_description'] = 'The email address to redirect to for debugging - if empty emails will be sent to actual recipients.';
$string['deans_email'] = 'Deans Email';
$string['deans_email_description'] = 'The email address to send notifications to the deans.';
$string['deans_addressee'] = 'Deans Addressee Name';
$string['deans_addressee_description'] = 'The name to use when addressing the deans in a email notification.';
$string['transportationmanager_email'] = 'Transportation Manager Email';
$string['transportationmanager_email_description'] = 'The email address to send notifications to the transportation manager.';
$string['transportationmanager_addressee'] = 'Transportation Manager Addressee Name';
$string['transportationmanager_addressee_description'] = 'The name to use when addressing the transportation manager in a email notification.';

$string['other_settings'] = 'Other Settings';
$string['school_ip'] = 'Middlesex Network IP';
$string['school_ip_description'] = 'The IP to check against to confirm that someone is on campus.';
$string['table_size'] = 'Default Table Length';
$string['table_size_description'] = 'The number of rows to display when outputting tables.';

$string['indexes'] = 'Index Pages';
$string['main_index'] = 'Middlesex School Index';
$string['user_management_index'] = 'User Management Index';
$string['checkin_index'] = 'Checkin Sheets and Weekend Forms Index';
$string['esignout_index'] = 'eSignout Index';
$string['advisor_selection_index'] = 'Advisor Selection Index';
$string['rooming_index'] = 'Rooming Index';
$string['vacation_travel_index'] = 'Vacation Travel Index';

// Events.
$string['event_page_viewed'] = 'mxschool page viewed';
$string['event_record_created'] = 'mxschool record created';
$string['event_record_updated'] = 'mxschool record updated';
$string['event_record_deleted'] = 'mxschool record deleted';
$string['event_email_sent'] = 'mxschool email notification sent';

// Notifications.
$string['user_management_student_edit_success'] = 'Student Record Updated Successfully';
$string['user_management_parent_edit_success'] = 'Parent Record Updated Successfully';
$string['user_management_faculty_edit_success'] = 'Faculty Record Updated Successfully';
$string['user_management_dorm_create_success'] = 'Dorm Record Created Successfully';
$string['user_management_dorm_edit_success'] = 'Dorm Record Updated Successfully';
$string['user_management_vehicle_create_success'] = 'Vehicle Record Created Successfully';
$string['user_management_vehicle_edit_success'] = 'Vehicle Record Updated Successfully';
$string['checkin_preferences_edit_success'] = 'Check-in Preferences Saved Successfully';
$string['checkin_weekend_form_success'] = 'Weekend Form Submitted Successfully';
$string['checkin_weekend_comment_form_success'] = 'Weekend Comment Updated Successfully';
$string['esignout_preferences_edit_success'] = 'eSignout Preferences Saved Successfully';
$string['esignout_success'] = 'eSignout Submitted Successfully';
$string['advisor_selection_preferences_edit_success'] = 'Advisor Selection Preferences Saved Successfully';
$string['advisor_selection_success'] = 'Advisor Selection Form Submitted Successfully';
$string['rooming_preferences_edit_success'] = 'Rooming Preferences Saved Successfully';
$string['rooming_success'] = 'Rooming Form Submitted Successfully';
$string['vacation_travel_preferences_edit_success'] = 'Vacation Travel Preferences Saved Successfully';
$string['vacation_travel_site_create_success'] = 'Vacation Travel Site Record Created Successfully';
$string['vacation_travel_site_edit_success'] = 'Vacation Travel Site Record Updated Successfully';
$string['vacation_success'] = 'Vacation Travel Form Submitted Successfully';

$string['user_management_parent_delete_success'] = 'Parent Record Deleted Successfully';
$string['user_management_parent_delete_failure'] = 'Parent Record Not Found for Deletion';
$string['user_management_dorm_delete_success'] = 'Dorm Record Deleted Successfully';
$string['user_management_dorm_delete_failure'] = 'Dorm Record Not Found for Deletion';
$string['user_management_vehicle_delete_success'] = 'Vehicle Record Deleted Successfully';
$string['user_management_vehicle_delete_failure'] = 'Vehicle Record Not Found for Deletion';
$string['checkin_weekend_form_delete_success'] = 'Weekend Form Record Deleted Successfully';
$string['checkin_weekend_form_delete_failure'] = 'Weekend Form Record Not Found for Deletion';
$string['esignout_delete_success'] = 'eSignout Record Deleted Successfully';
$string['esignout_delete_failure'] = 'eSignout Record Not Found for Deletion';
$string['vacation_travel_site_delete_success'] = 'Vacation Travel Site Record Deleted Successfully';
$string['vacation_travel_site_delete_failure'] = 'Vacation Travel Site Record Not Found for Deletion';


/* User Management. */
$string['user_management'] = 'User Management';
$string['user_management_student_report'] = 'Student Report';
$string['user_management_faculty_report'] = 'Faculty Report';
$string['user_management_dorm_report'] = 'Dorm Report';
$string['user_management_vehicle_report'] = 'Registered Student Vehicles Report';
$string['user_management_student_edit'] = 'Edit Student Record';
$string['user_management_parent_edit'] = 'Edit Parent Record';
$string['user_management_faculty_edit'] = 'Edit Faculty Record';
$string['user_management_dorm_edit'] = 'Edit Dorm Record';
$string['user_management_vehicle_edit'] = 'Edit Student Vehicle Record';

// Student Report.
$string['user_management_student_report_type_students'] = 'Student Report';
$string['user_management_student_report_type_permissions'] = 'Permissions Report';
$string['user_management_student_report_type_parents'] = 'Parent Report';
$string['user_management_parent_report_add'] = 'New Parent';
$string['user_management_student_report_students_header_student'] = 'Name';
$string['user_management_student_report_students_header_grade'] = 'Grade';
$string['user_management_student_report_students_header_advisor'] = 'Advisor';
$string['user_management_student_report_students_header_dorm'] = 'Dorm';
$string['user_management_student_report_students_header_room'] = 'Room';
$string['user_management_student_report_students_header_phone'] = 'Phone Number';
$string['user_management_student_report_students_header_birthday'] = 'Birthday';
$string['user_management_student_report_permissions_header_student'] = 'Name';
$string['user_management_student_report_permissions_header_overnight'] = 'Overnight';
$string['user_management_student_report_permissions_header_license'] = 'Issue Date of License';
$string['user_management_student_report_permissions_header_driving'] = 'May Drive with eSignout?';
$string['user_management_student_report_permissions_header_passengers'] = 'May Drive Passengers?';
$string['user_management_student_report_permissions_header_riding'] = 'May Ride With';
$string['user_management_student_report_permissions_header_ridingcomment'] = 'Riding Comment';
$string['user_management_student_report_permissions_header_rideshare'] = 'May Use Rideshare?';
$string['user_management_student_report_permissions_header_boston'] = 'May Go to Boston?';
$string['user_management_student_report_permissions_header_swimcompetent'] = 'Competent Swimmer?';
$string['user_management_student_report_permissions_header_swimallowed'] = 'Allowed to Swim?';
$string['user_management_student_report_permissions_header_boatallowed'] = 'Allowed in Boats?';
$string['user_management_student_report_parents_header_student'] = 'Student Name';
$string['user_management_student_report_parents_header_parent'] = 'Parent Name';
$string['user_management_student_report_parents_header_primaryparent'] = 'Primary';
$string['user_management_student_report_parents_header_relationship'] = 'Relationship';
$string['user_management_student_report_parents_header_homephone'] = 'Home Phone';
$string['user_management_student_report_parents_header_cellphone'] = 'Cell Phone';
$string['user_management_student_report_parents_header_workphone'] = 'Work Phone';
$string['user_management_student_report_parents_header_email'] = 'Email';

// Faculty Report.
$string['user_management_faculty_report_header_name'] = 'Name';
$string['user_management_faculty_report_header_dorm'] = 'Dorm';
$string['user_management_faculty_report_header_approvesignout'] = 'May Approve eSignout?';
$string['user_management_faculty_report_header_advisoryavailable'] = 'Advisory Available?';
$string['user_management_faculty_report_header_advisoryclosing'] = 'Advisory Closing?';

// Dorm Report.
$string['user_management_dorm_report_add'] = 'New Dorm';
$string['user_management_dorm_report_header_name'] = 'Name';
$string['user_management_dorm_report_header_abbreviation'] = 'Abbreviation';
$string['user_management_dorm_report_header_hoh'] = 'Head of House';
$string['user_management_dorm_report_header_permissionsline'] = 'Permissions Line';
$string['user_management_dorm_report_header_type'] = 'Type';
$string['user_management_dorm_report_header_gender'] = 'Gender';
$string['user_management_dorm_report_header_available'] = 'Available';

// Vehicle Report.
$string['user_management_vehicle_report_add'] = 'Register a Vehicle';
$string['user_management_vehicle_report_header_student'] = 'Student Name';
$string['user_management_vehicle_report_header_grade'] = 'Grade';
$string['user_management_vehicle_report_header_phone'] = 'Student Phone Number';
$string['user_management_vehicle_report_header_license'] = 'Issue Date of License';
$string['user_management_vehicle_report_header_make'] = 'Vehicle Make';
$string['user_management_vehicle_report_header_model'] = 'Vehicle Model';
$string['user_management_vehicle_report_header_color'] = 'Vehicle Color';
$string['user_management_vehicle_report_header_registration'] = 'Vehicle Registration';

// Student Edit.
$string['user_management_student_edit_header_student'] = 'Student Information';
$string['user_management_student_edit_header_permissions'] = 'Student Permissions';
$string['user_management_student_edit_student_firstname'] = 'First Name';
$string['user_management_student_edit_student_middlename'] = 'Middle Name';
$string['user_management_student_edit_student_lastname'] = 'Last Name';
$string['user_management_student_edit_student_alternatename'] = 'Alternate Name';
$string['user_management_student_edit_student_email'] = 'Email';
$string['user_management_student_edit_student_admissionyear'] = 'Year of Admission';
$string['user_management_student_edit_student_grade'] = 'Grade';
$string['user_management_student_edit_student_grade_9'] = '9';
$string['user_management_student_edit_student_grade_10'] = '10';
$string['user_management_student_edit_student_grade_11'] = '11';
$string['user_management_student_edit_student_grade_12'] = '12';
$string['user_management_student_edit_student_gender'] = 'Gender';
$string['user_management_student_edit_student_gender_M'] = 'M';
$string['user_management_student_edit_student_gender_F'] = 'F';
$string['user_management_student_edit_student_advisor'] = 'Advisor';
$string['user_management_student_edit_student_isboarder'] = 'Boarder/Day Student';
$string['user_management_student_edit_student_isboarder_Boarder'] = 'Boarder';
$string['user_management_student_edit_student_isboarder_Day'] = 'Day';
$string['user_management_student_edit_student_isboardernextyear'] = 'Boarder/Day Student Next Year';
$string['user_management_student_edit_student_isboardernextyear_Boarder'] = 'Boarder';
$string['user_management_student_edit_student_isboardernextyear_Day'] = 'Day';
$string['user_management_student_edit_student_dorm'] = 'Dorm';
$string['user_management_student_edit_student_room'] = 'Room';
$string['user_management_student_edit_student_phonenumber'] = 'Phone Number';
$string['user_management_student_edit_student_birthday'] = 'Birthday';
$string['user_management_student_edit_permissions_overnight'] = 'Overnight';
$string['user_management_student_edit_permissions_overnight_Parent'] = 'Parent';
$string['user_management_student_edit_permissions_overnight_Host'] = 'Host';
$string['user_management_student_edit_permissions_license'] = 'Issue Date of License';
$string['user_management_student_edit_permissions_driving'] = 'May Drive with eSignout?';
$string['user_management_student_edit_permissions_passengers'] = 'May Drive Passengers?';
$string['user_management_student_edit_permissions_riding'] = 'May Ride With';
$string['user_management_student_edit_permissions_riding_parent'] = 'Parent Permission';
$string['user_management_student_edit_permissions_riding_21'] = 'Over 21';
$string['user_management_student_edit_permissions_riding_any'] = 'Any Driver';
$string['user_management_student_edit_permissions_riding_specific'] = 'Specific Drivers';
$string['user_management_student_edit_permissions_ridingcomment'] = 'Riding Comment';
$string['user_management_student_edit_permissions_rideshare'] = 'May Use Rideshare?';
$string['user_management_student_edit_permissions_rideshare_Parent'] = 'Parent';
$string['user_management_student_edit_permissions_boston'] = 'May Go to Boston?';
$string['user_management_student_edit_permissions_boston_Parent'] = 'Parent';
$string['user_management_student_edit_permissions_swimcompetent'] = 'Competent Swimmer?';
$string['user_management_student_edit_permissions_swimallowed'] = 'Allowed to Swim?';
$string['user_management_student_edit_permissions_boatallowed'] = 'Allowed in Boats?';

// Parent Edit.
$string['user_management_parent_edit_header_parent'] = 'Parent Information';
$string['user_management_parent_edit_parent_student'] = 'Child';
$string['user_management_parent_edit_parent_name'] = 'Parent Name';
$string['user_management_parent_edit_parent_isprimary'] = 'Primary Parent?';
$string['user_management_parent_edit_parent_relationship'] = 'Relationship to Child';
$string['user_management_parent_edit_parent_homephone'] = 'Parent Home Phone';
$string['user_management_parent_edit_parent_cellphone'] = 'Parent Cell Phone';
$string['user_management_parent_edit_parent_workphone'] = 'Parent Work Phone';
$string['user_management_parent_edit_parent_email'] = 'Parent Email';

// Faculty Edit.
$string['user_management_faculty_edit_header_faculty'] = 'Faculty Information';
$string['user_management_faculty_edit_faculty_firstname'] = 'First Name';
$string['user_management_faculty_edit_faculty_middlename'] = 'Middle Name';
$string['user_management_faculty_edit_faculty_lastname'] = 'Last Name';
$string['user_management_faculty_edit_faculty_alternatename'] = 'Alternate Name';
$string['user_management_faculty_edit_faculty_email'] = 'Email';
$string['user_management_faculty_edit_faculty_facultycode'] = 'Faculty Code';
$string['user_management_faculty_edit_faculty_dorm'] = 'Dorm';
$string['user_management_faculty_edit_faculty_approvesignout'] = 'May Approve eSignout';
$string['user_management_faculty_edit_faculty_advisoryavailable'] = 'Advisory Available';
$string['user_management_faculty_edit_faculty_advisoryclosing'] = 'Advisory Closing';

// Dorm Edit.
$string['user_management_dorm_edit_header_dorm'] = 'Dorm Information';
$string['user_management_dorm_edit_dorm_name'] = 'Name';
$string['user_management_dorm_edit_dorm_abbreviation'] = 'Abbreviation';
$string['user_management_dorm_edit_dorm_hoh'] = 'Head of House';
$string['user_management_dorm_edit_dorm_permissionsline'] = 'Permissions Line';
$string['user_management_dorm_edit_dorm_type'] = 'Type';
$string['user_management_dorm_edit_dorm_type_Boarding'] = 'Boarding';
$string['user_management_dorm_edit_dorm_type_Day'] = 'Day';
$string['user_management_dorm_edit_dorm_type_All'] = 'All';
$string['user_management_dorm_edit_dorm_gender'] = 'Gender';
$string['user_management_dorm_edit_dorm_gender_Boys'] = 'Boys';
$string['user_management_dorm_edit_dorm_gender_Girls'] = 'Girls';
$string['user_management_dorm_edit_dorm_gender_All'] = 'All';
$string['user_management_dorm_edit_dorm_available'] = 'Available';

// Vehicle Edit.
$string['user_management_vehicle_edit_student'] = 'Student';
$string['user_management_vehicle_edit_make'] = 'Make';
$string['user_management_vehicle_edit_model'] = 'Model';
$string['user_management_vehicle_edit_color'] = 'Color';
$string['user_management_vehicle_edit_registration'] = 'Vehicle Registration';


/* Check-In Sheets and Weekend Forms. */
$string['checkin'] = 'Check-In Sheets and Weekend Forms';
$string['checkin_preferences'] = 'Check-In Sheets Preferences';
$string['checkin_generic_report'] = 'Check-In Sheet';
$string['checkin_weekday_report'] = 'Weekday Check-In Sheet';
$string['checkin_weekend_form'] = 'Weekend Form';
$string['checkin_weekend_report'] = 'Weekend Check-In Sheet';
$string['checkin_weekend_calculator'] = 'Weekend Calculator';

// Check-in Preferences.
$string['checkin_preferences_header_dates'] = 'Opening and Closing Dates';
$string['checkin_preferences_header_weekends'] = 'Weekend Types';
$string['checkin_preferences_header_notifications'] = 'Weekend Form Email Notifications';
$string['checkin_preferences_header_text'] = 'Weekend Form Instructions';
$string['checkin_preferences_dates_dormsopen'] = 'Dorms Open On: ';
$string['checkin_preferences_dates_secondsemester'] = 'Second Semester Starts On: ';
$string['checkin_preferences_dates_dormsclose'] = 'Dorms Close On: ';
$string['checkin_preferences_weekends_label'] = 'Saturday {$a}';
$string['checkin_preferences_weekends_type_Open'] = 'Open';
$string['checkin_preferences_weekends_type_Closed'] = 'Closed';
$string['checkin_preferences_weekends_type_Free'] = 'Free';
$string['checkin_preferences_weekends_type_Vacation'] = 'Vacation';
$string['checkin_preferences_notifications_submitted_tags'] = 'Available Tags for Weekend Form Submitted Email';
$string['checkin_preferences_notifications_submitted_subject'] = 'Subject for Weekend Form Submitted Email';
$string['checkin_preferences_notifications_submitted_body'] = 'Body for Weekend Form Submitted Email';
$string['checkin_preferences_notifications_approved_tags'] = 'Available Tags for Weekend Form Approved Email';
$string['checkin_preferences_notifications_approved_subject'] = 'Subject for Weekend Form Approved Email';
$string['checkin_preferences_notifications_approved_body'] = 'Body for Weekend Form Approved Email';
$string['checkin_preferences_text_topinstructions'] = 'Top Instructions';
$string['checkin_preferences_text_bottominstructions'] = 'Bottom Instructions';
$string['checkin_preferences_text_closedwarning'] = 'Warning for a Closed Weekend';

// Generic Check-in Sheet.
$string['checkin_generic_report_title'] = '{$a}Check-In Sheet for __________';
$string['checkin_generic_report_header_student'] = 'Name';
$string['checkin_generic_report_header_dorm'] = 'Dorm';
$string['checkin_generic_report_header_room'] = 'Room';
$string['checkin_generic_report_header_grade'] = 'Grade';
$string['checkin_generic_report_header_checkin'] = '&emsp;&emsp;';

// Weekday Check-in Sheet.
$string['checkin_weekday_report_title'] = '{$a}Check-In Sheet for the Week of __________';
$string['checkin_weekday_report_header_student'] = 'Name';
$string['checkin_weekday_report_header_dorm'] = 'Dorm';
$string['checkin_weekday_report_header_room'] = 'Room';
$string['checkin_weekday_report_header_grade'] = 'Grade';
$string['checkin_weekday_report_header_early'] = 'Early';
$string['checkin_weekday_report_header_late'] = 'Late';

// Weekend Form.
$string['checkin_weekend_form_dorm'] = 'Dorm';
$string['checkin_weekend_form_student'] = 'Student';
$string['checkin_weekend_form_departure'] = 'Departure Date and Time';
$string['checkin_weekend_form_return'] = 'Return Date and Time';
$string['checkin_weekend_form_destination'] = 'Your Destination';
$string['checkin_weekend_form_transportation'] = 'Transportation by';
$string['checkin_weekend_form_phone'] = 'Phone Number<br>(even if you are going home)';
$string['checkin_weekend_form_instructions_placeholder_hoh'] = 'your head of house';
$string['checkin_weekend_form_instructions_placeholder_permissionsline'] = 'the house permissions line';
$string['checkin_weekend_form_error_outoforder'] = 'Your return date and time must be after your departure date and time.';
$string['checkin_weekend_form_error_notinweekend'] = 'Your departure date must be within a valid weekend.';
$string['checkin_weekend_form_error_indifferentweekends'] = 'Your return date must be in the same weekend as your departure date.';
$string['checkin_weekend_form_error_nodestination'] = 'You must specify a destination.';
$string['checkin_weekend_form_error_notransportation'] = 'You must specify who is driving you.';
$string['checkin_weekend_form_error_nophone'] = 'You must specify a phone number.';

// Weekend Check-in Sheet.
$string['checkin_weekend_report_title'] = '{$a->dorm}Check-In Sheet for the Weekend of {$a->weekend} ({$a->type})';
$string['checkin_weekend_report_select_start_day_default'] = 'Default Start Day';
$string['checkin_weekend_report_select_end_day_default'] = 'Default End Day';
$string['checkin_weekend_report_select_submitted_true'] = 'Weekend Form';
$string['checkin_weekend_report_select_submitted_false'] = 'No Weekend Form';
$string['checkin_weekend_report_add'] = 'New Weekend Form';
$string['checkin_weekend_report_header_student'] = 'Name';
$string['checkin_weekend_report_header_dorm'] = 'Dorm';
$string['checkin_weekend_report_header_room'] = 'Room';
$string['checkin_weekend_report_header_grade'] = 'Grade';
$string['checkin_weekend_report_header_early'] = 'Early';
$string['checkin_weekend_report_header_late'] = 'Late';
$string['checkin_weekend_report_header_clean'] = 'Room Clean?';
$string['checkin_weekend_report_header_parent'] = 'Parent?';
$string['checkin_weekend_report_header_invite'] = 'Invite?';
$string['checkin_weekend_report_header_approved'] = 'Approved?';
$string['checkin_weekend_report_header_destinationtransportation'] = 'Destination<br>Transportation';
$string['checkin_weekend_report_header_phone'] = 'Phone Number';
$string['checkin_weekend_report_header_departurereturn'] = 'Departure Time<br>Return Time';

$string['checkin_weekend_comment_form_comment'] = 'Comments';

// Weekend Calculator.
$string['checkin_weekend_calculator_report_title'] = 'Weekend Calculator{$a}';
$string['checkin_weekend_calculator_report_header_student'] = 'Name';
$string['checkin_weekend_calculator_report_header_grade'] = 'Grade';
$string['checkin_weekend_calculator_report_header_total'] = 'Total';
$string['checkin_weekend_calculator_report_header_allowed'] = 'Allowed';

$string['checkin_weekend_calculator_abbreviation_offcampus'] = 'X';
$string['checkin_weekend_calculator_abbreviation_free'] = 'free';
$string['checkin_weekend_calculator_abbreviation_closed'] = 'camp';
$string['checkin_weekend_calculator_abbreviation_unlimited'] = 'ALL';

$string['checkin_weekend_calculator_legend_0_left'] = 'No weekends left';
$string['checkin_weekend_calculator_legend_1_left'] = '1 weekend left';
$string['checkin_weekend_calculator_legend_2_left'] = '2 weekends left';
$string['checkin_weekend_calculator_legend_3_left'] = '3+ weekends left';
$string['checkin_weekend_calculator_legend_offcampus'] = 'Student Off Campus';
$string['checkin_weekend_calculator_legend_free'] = 'Free weekend';
$string['checkin_weekend_calculator_legend_closed'] = 'Campus weekend';


/* eSignout. */
$string['esignout'] = 'eSignout';
$string['esignout_preferences'] = 'eSignout Preferences';
$string['esignout_form'] = 'eSignout Form';
$string['esignout_report'] = 'eSignout Report';

// Preferences for eSignout.
$string['esignout_preferences_header_config'] = 'Config';
$string['esignout_preferences_header_notifications'] = 'eSignout Email Notifications';
$string['esignout_preferences_header_text'] = 'eSignout Form Permissions Warnings';
$string['esignout_preferences_header_emailtext'] = 'eSignout Email Permissions Warnings';
$string['esignout_preferences_config_editwindow'] = 'Window for Students to Edit eSignout Forms (minutes)';
$string['esignout_preferences_config_tripwindow'] = 'Window for a Driver to be Available for Selection (minutes)';
$string['esignout_preferences_config_esignoutenabled_text'] = 'Check to Enable the eSignout Form';
$string['esignout_preferences_config_ipenabled_text'] = 'Check to Enable IP Validation Against {$a->school} - Your Current IP is {$a->current}';
$string['esignout_preferences_notifications_tags'] = 'Available Tags';
$string['esignout_preferences_notifications_subject'] = 'Subject for eSignout Form Submitted Email';
$string['esignout_preferences_notifications_body'] = 'Body for eSignout Form Submitted Email';
$string['esignout_preferences_text_ipformerror'] = 'Text to Display in eSignout Form When on the Wrong Network';
$string['esignout_preferences_text_ipreporterror'] = 'Text to Display in eSignout Report When on the Wrong Network';
$string['esignout_preferences_text_passengerinstructions'] = 'Instructions Regarding Selecting a Driver';
$string['esignout_preferences_text_bottominstructions'] = 'Instructions at the Bottom of the eSignout Form';
$string['esignout_preferences_text_nopassengers'] = 'Warning for a Student Who May Not Drive Passengers';
$string['esignout_preferences_text_needparent'] = 'Warning for a Student Who May Only be a Passenger with Parent Permission';
$string['esignout_preferences_text_onlyspecific'] = 'Warning for a Student Who May Only be the Passenger of Specific Drivers';
$string['esignout_preferences_text_confirmation'] = 'Confirmation for a Passenger with Warnings';
$string['esignout_preferences_emailtext_irregular'] = 'Indicator for an Irregular Signout';
$string['esignout_preferences_emailtext_driver'] = 'Warning for a Driver';
$string['esignout_preferences_emailtext_any'] = 'Warning for a Passenger with Permissions to Ride with Any Driver';
$string['esignout_preferences_emailtext_parent'] = 'Warning for a Passenger with Permissions to Ride Only with Parent Permission';
$string['esignout_preferences_emailtext_specific'] = 'Warning for a Passenger with Permissions to Ride Only with Specific Drivers';
$string['esignout_preferences_emailtext_over21'] = 'Warning for a Passenger with Permissions to Ride Only with Drivers Over 21';

// Form for eSignout.
$string['esignout_form_header_info'] = 'General Information';
$string['esignout_form_header_details'] = 'Details';
$string['esignout_form_header_permissions'] = 'Permissions Check';
$string['esignout_form_info_student'] = 'Student';
$string['esignout_form_info_type'] = 'Driver Type';
$string['esignout_form_info_type_select_Driver'] = 'Yourself';
$string['esignout_form_info_type_select_Passenger'] = 'Another Student';
$string['esignout_form_info_type_select_Parent'] = 'Your Parent';
$string['esignout_form_info_type_select_Other'] = 'Other Adult (Please Specify)';
$string['esignout_form_info_passengers'] = 'Your Passengers';
$string['esignout_form_info_driver'] = 'Your Driver';
$string['esignout_form_details_destination'] = 'Your Destination';
$string['esignout_form_details_departure_time'] = 'Departure Time';
$string['esignout_form_details_approver'] = 'Face-to-Face Permission Granted by';
$string['esignout_form_passengers_noselection'] = 'No Passengers Selected';
$string['esignout_form_passengers_placeholder'] = 'Search Passengers';
$string['esignout_form_error_notype'] = 'You must specify a driver type.';
$string['esignout_form_error_nodriver'] = 'You must specify a driver.';
$string['esignout_form_error_nodestination'] = 'You must specify a destination.';
$string['esignout_form_error_noapprover'] = 'You must specify who approved your signout.';

// Report for eSignout.
$string['esignout_report_select_type_all'] = 'All Types';
$string['esignout_report_select_type_driver'] = 'Driver';
$string['esignout_report_select_type_passenger'] = 'Passenger';
$string['esignout_report_select_type_parent'] = 'Parent';
$string['esignout_report_select_type_other'] = 'Other';
$string['esignout_report_select_date_all'] = 'All Dates';
$string['esignout_report_add'] = 'New eSignout Record';
$string['esignout_report_header_student'] = 'Student';
$string['esignout_report_header_type'] = 'Type';
$string['esignout_report_header_driver'] = 'Driver';
$string['esignout_report_header_passengers'] = 'Passengers';
$string['esignout_report_header_passengercount'] = 'Passengers Submitted';
$string['esignout_report_header_destination'] = 'Destination';
$string['esignout_report_header_date'] = 'Date';
$string['esignout_report_header_departure'] = 'Departure Time';
$string['esignout_report_header_approver'] = 'Permission From';
$string['esignout_report_header_signin'] = 'Sign In Time';
$string['esignout_report_nopassengers'] = 'None';


/* Advisor Selection. */
$string['advisor_selection'] = 'Advisor Selection';
$string['advisor_selection_preferences'] = 'Advisor Selection Preferences';
$string['advisor_selection_form'] = 'Advisor Selection Form';
$string['advisor_selection_report'] = 'Advisor Selection Report';

// Advisor Selection Preferences.
$string['advisor_selection_preferences_header_availability'] = 'Availability';
$string['advisor_selection_preferences_header_notifications'] = 'Advisor Selection Email Notifications';
$string['advisor_selection_preferences_header_text'] = 'Advisor Selection Form Instructions';
$string['advisor_selection_preferences_availability_start'] = 'Start Date';
$string['advisor_selection_preferences_availability_stop'] = 'Stop Date';
$string['advisor_selection_preferences_availability_who'] = 'Enable for Whom';
$string['advisor_selection_preferences_availability_who_new'] = 'Only New Students';
$string['advisor_selection_preferences_availability_who_all'] = 'All Underclassmen';
$string['advisor_selection_preferences_notifications_submitted_tags'] = 'Available Tags for Advisor Selection Form Submitted Email';
$string['advisor_selection_preferences_notifications_submitted_subject'] = 'Subject for Advisor Selection Form Submitted Email';
$string['advisor_selection_preferences_notifications_submitted_body'] = 'Body for Advisor Selection Form Submitted Email';
$string['advisor_selection_preferences_notifications_unsubmitted_tags'] = 'Available Tags for Unsubmitted Reminder Email';
$string['advisor_selection_preferences_notifications_unsubmitted_subject'] = 'Subject for Unsubmitted Reminder Email';
$string['advisor_selection_preferences_notifications_unsubmitted_body'] = 'Body for Unsubmitted Reminder Email';
$string['advisor_selection_preferences_notifications_results_tags'] = 'Available Tags for Results Email';
$string['advisor_selection_preferences_notifications_results_subject'] = 'Subject for Results Email';
$string['advisor_selection_preferences_notifications_results_body'] = 'Body for Results Email';
$string['advisor_selection_preferences_text_closing_warning'] = 'Warning for Closing Advisory';
$string['advisor_selection_preferences_text_instructions'] = 'Changing Advisor Instructions';

// Advisor Selection Form.
$string['advisor_form_header_info'] = 'General Information';
$string['advisor_form_header_options'] = 'Choices';
$string['advisor_form_header_deans'] = 'Deans\' Selection';
$string['advisor_form_info_student'] = 'Student';
$string['advisor_form_info_current'] = 'Current Advisor';
$string['advisor_form_info_keepcurrent'] = 'Keep Current Advisor';
$string['advisor_form_options_option1'] = 'First Choice';
$string['advisor_form_options_option2'] = 'Second Choice';
$string['advisor_form_options_option3'] = 'Third Choice';
$string['advisor_form_options_option4'] = 'Fourth Choice';
$string['advisor_form_options_option5'] = 'Fifth Choice';
$string['advisor_form_deans_selected'] = 'Chosen Advisor';
$string['advisor_form_error_nokeepcurrent'] = 'You must specify whether or not you wish to keep your current advisor.';
$string['advisor_form_error_incomplete'] = 'You must either select five choices, or you current advisor must be your final choice.';

// Advisor Selection Report.
$string['advisor_selection_report_select_submitted_true'] = 'Submitted';
$string['advisor_selection_report_select_submitted_false'] = 'Not Submitted';
$string['advisor_selection_report_select_keepcurrent_true'] = 'Keeping Current Advisor';
$string['advisor_selection_report_select_keepcurrent_false'] = 'Changing Advisor';
$string['advisor_selection_report_add'] = 'New Advisor Selection Form';
$string['advisor_selection_report_remind'] = 'Notify Unsubmitted';
$string['advisor_selection_report_results'] = 'Notify Students and New Advisors';

$string['advisor_report_header_student'] = 'Student';
$string['advisor_report_header_current'] = 'Current Advisor';
$string['advisor_report_header_keepcurrent'] = 'Keep Current Advisor?';
$string['advisor_report_header_option1'] = 'Choice 1';
$string['advisor_report_header_option2'] = 'Choice 2';
$string['advisor_report_header_option3'] = 'Choice 3';
$string['advisor_report_header_option4'] = 'Choice 4';
$string['advisor_report_header_option5'] = 'Choice 5';
$string['advisor_report_header_selected'] = 'Chosen Advisor';


/* Rooming. */
$string['rooming'] = 'Rooming';
$string['rooming_preferences'] = 'Rooming Preferences';
$string['rooming_form'] = 'Rooming Requests Form';
$string['rooming_report'] = 'Rooming Requests Report';

// Rooming Preferecnes.
$string['rooming_preferences_header_availability'] = 'Availability';
$string['rooming_preferences_header_notifications'] = 'Rooming Email Notifications';
$string['rooming_preferences_availability_start'] = 'Start Date';
$string['rooming_preferences_availability_stop'] = 'Stop Date';
$string['rooming_preferences_header_text'] = 'Rooming Requests Form Instructions';
$string['rooming_preferences_notifications_submitted_tags'] = 'Available Tags for Rooming Form Submitted Email';
$string['rooming_preferences_notifications_submitted_subject'] = 'Subject for Rooming Form Submitted Email';
$string['rooming_preferences_notifications_submitted_body'] = 'Body for Rooming Form Submitted Email';
$string['rooming_preferences_notifications_unsubmitted_tags'] = 'Available Tags for Unsubmitted Reminder Email';
$string['rooming_preferences_notifications_unsubmitted_subject'] = 'Subject for Unsubmitted Reminder Email';
$string['rooming_preferences_notifications_unsubmitted_body'] = 'Body for Unsubmitted Reminder Email';
$string['rooming_preferences_text_roommateinstructions'] = 'Instructions Regarding Doubles';

// Rooming Form.
$string['rooming_form_header_info'] = 'General Information';
$string['rooming_form_header_requests'] = 'Requests';
$string['rooming_form_info_student'] = 'Student';
$string['rooming_form_info_dorm'] = 'Current Dorm';
$string['rooming_form_info_liveddouble'] = 'Have you previously lived in a one-room double?';
$string['rooming_form_requests_roomtype'] = 'Request a Room Type';
$string['rooming_form_requests_dormmate1'] = 'Request 3 Dormmates from Your Grade';
$string['rooming_form_requests_dormmate4'] = 'Request 3 Dormmates from Any Grade';
$string['rooming_form_requests_roommate'] = 'Preferred Roommate';
$string['rooming_form_error_noliveddouble'] = 'You must specify whether you have lived in a double.';
$string['rooming_form_error_noroomtype'] = 'You must specify a room type.';
$string['rooming_form_error_gradedormmates'] = 'You must request three dormmates from your grade.';
$string['rooming_form_error_dormmates'] = 'You must request three dormmates from any grade.';
$string['rooming_form_error_roommate'] = 'You must select a preferred roommate.';

// Rooming Report.
$string['rooming_report_select_submitted_true'] = 'Submitted';
$string['rooming_report_select_submitted_false'] = 'Not Submitted';
$string['rooming_report_select_gender_all'] = 'All Genders';
$string['rooming_report_select_gender_M'] = 'Boys';
$string['rooming_report_select_gender_F'] = 'Girls';
$string['rooming_report_select_roomtype_all'] = 'All Room Types';
$string['rooming_report_select_double_true'] = 'Has Lived in Double';
$string['rooming_report_select_double_false'] = 'Has Not Lived in Double';
$string['rooming_report_add'] = 'New Rooming Requests Form';
$string['rooming_report_remind'] = 'Notify Unsubmitted';
$string['rooming_report_header_student'] = 'Student';
$string['rooming_report_header_grade'] = 'Grade';
$string['rooming_report_header_gender'] = 'Gender';
$string['rooming_report_header_dorm'] = 'Current Dorm';
$string['rooming_report_header_roomtype'] = 'Requested Room Type';
$string['rooming_report_header_dormmates'] = 'Requested Dormmates';
$string['rooming_report_header_liveddouble'] = 'Has Lived in a Double';
$string['rooming_report_header_roommate'] = 'Preferred Roommate';


/* Vacation Travel. */
$string['vacation_travel'] = 'Vacation Travel';
$string['vacation_travel_preferences'] = 'Vacation Travel Preferences';
$string['vacation_travel_site_report'] = 'Site Report';
$string['vacation_travel_site_edit'] = 'Edit Site Record';
$string['vacation_travel_form'] = 'Vacation Travel Form';
$string['vacation_travel_report'] = 'Vacation Travel Report';
$string['vacation_travel_transportation_report'] = 'Transportation Report';

// Vacation Travel Preferences.
$string['vacation_travel_preferences_header_availability'] = 'Availability';
$string['vacation_travel_preferences_header_notifications'] = 'Vacation Travel Email Notifications';
$string['vacation_travel_preferences_availability_start'] = 'Start Date';
$string['vacation_travel_preferences_availability_stop'] = 'Stop Date';
$string['vacation_travel_preferences_availability_returnenabled_text'] = 'Check to Enable the Return Portion of the Form and Reports.';
$string['vacation_travel_preferences_notifications_submitted_tags'] = 'Available Tags for Vacation Travel Form Submitted Email';
$string['vacation_travel_preferences_notifications_submitted_subject'] = 'Subject for Vacation Travel Form Submitted Email';
$string['vacation_travel_preferences_notifications_submitted_body'] = 'Body for Vacation Travel Form Submitted Email';
$string['vacation_travel_preferences_notifications_unsubmitted_tags'] = 'Available Tags for Unsubmitted Reminder Email';
$string['vacation_travel_preferences_notifications_unsubmitted_subject'] = 'Subject for Unsubmitted Reminder Email';
$string['vacation_travel_preferences_notifications_unsubmitted_body'] = 'Body for Unsubmitted Reminder Email';

// Vacation Travel Site Report.
$string['vacation_travel_site_report_add'] = 'New Site';
$string['vacation_travel_site_report_header_name'] = 'Name';
$string['vacation_travel_site_report_header_type'] = 'Type';
$string['vacation_travel_site_report_header_departureenabled'] = 'Available for Departure';
$string['vacation_travel_site_report_header_defaultdeparturetime'] = 'Default Departure Time';
$string['vacation_travel_site_report_header_returnenabled'] = 'Available for Return';
$string['vacation_travel_site_report_header_defaultreturntime'] = 'Default Return Time';

// Vacation Travel Site Edit.
$string['vacation_travel_site_edit_header_site'] = 'Site Information';
$string['vacation_travel_site_edit_site_name'] = 'Name';
$string['vacation_travel_site_edit_site_type'] = 'Type';
$string['vacation_travel_site_edit_site_departureenabled'] = 'Available for Departure';
$string['vacation_travel_site_edit_site_defaultdeparturetime'] = 'Default Departure Time';
$string['vacation_travel_site_edit_site_returnenabled'] = 'Available for Return';
$string['vacation_travel_site_edit_site_defaultreturntime'] = 'Default Return Time';

// Vacation Travel Form.
$string['vacation_travel_form_header_info'] = 'General Information';
$string['vacation_travel_form_header_departure'] = 'Departure Information';
$string['vacation_travel_form_header_return'] = 'Return Information';
$string['vacation_travel_form_info_student'] = 'Student';
$string['vacation_travel_form_info_destination'] = 'Destination';
$string['vacation_travel_form_info_phone'] = 'Phone Number';
$string['vacation_travel_form_departure_dep_mxtransportation'] = 'Do You Need School Transportation?';
$string['vacation_travel_form_departure_dep_type'] = 'Transportation type';
$string['vacation_travel_form_departure_dep_type_Car'] = 'Car';
$string['vacation_travel_form_departure_dep_type_Plane'] = 'Plane';
$string['vacation_travel_form_departure_dep_type_Bus'] = 'Bus';
$string['vacation_travel_form_departure_dep_type_Train'] = 'Train';
$string['vacation_travel_form_departure_dep_type_NYCDirect'] = 'NYC Direct';
$string['vacation_travel_form_departure_dep_type_Non-MXBus'] = 'Non-MX Bus';
$string['vacation_travel_form_departure_dep_site'] = 'Stop';
$string['vacation_travel_form_departure_dep_site_Plane'] = 'Airport';
$string['vacation_travel_form_departure_dep_site_Train'] = 'Station';
$string['vacation_travel_form_departure_dep_site_other'] = 'Other (Please Specify Below)';
$string['vacation_travel_form_departure_dep_details'] = 'Details';
$string['vacation_travel_form_departure_dep_details_Car'] = 'Driver';
$string['vacation_travel_form_departure_dep_carrier'] = 'Carrier';
$string['vacation_travel_form_departure_dep_carrier_Plane'] = 'Airline';
$string['vacation_travel_form_departure_dep_carrier_Train'] = 'Train Company';
$string['vacation_travel_form_departure_dep_carrier_Bus'] = 'Bus Company';
$string['vacation_travel_form_departure_dep_number'] = 'Transportation Number';
$string['vacation_travel_form_departure_dep_number_Plane'] = 'Flight Number';
$string['vacation_travel_form_departure_dep_number_Train'] = 'Train Number';
$string['vacation_travel_form_departure_dep_number_Bus'] = 'Bus Number';
$string['vacation_travel_form_departure_dep_variable'] = 'Date and Time Leaving Campus';
$string['vacation_travel_form_departure_dep_variable_Plane'] = 'Flight Date and Time';
$string['vacation_travel_form_departure_dep_variable_Train'] = 'Train Date and Time';
$string['vacation_travel_form_departure_dep_variable_Bus'] = 'Bus Date and Time';
$string['vacation_travel_form_departure_dep_international'] = 'Is this an International Flight?';
$string['vacation_travel_form_return_ret_mxtransportation'] = 'Do You Need School Transportation?';
$string['vacation_travel_form_return_ret_type'] = 'Transportation type';
$string['vacation_travel_form_return_ret_type_Car'] = 'Car';
$string['vacation_travel_form_return_ret_type_Plane'] = 'Plane';
$string['vacation_travel_form_return_ret_type_Bus'] = 'Bus';
$string['vacation_travel_form_return_ret_type_Train'] = 'Train';
$string['vacation_travel_form_return_ret_type_NYCDirect'] = 'NYC Direct';
$string['vacation_travel_form_return_ret_type_Non-MXBus'] = 'Non-MX Bus';
$string['vacation_travel_form_return_ret_site'] = 'Stop';
$string['vacation_travel_form_return_ret_site_Plane'] = 'Arrival Airport';
$string['vacation_travel_form_return_ret_site_Train'] = 'Arrival Station';
$string['vacation_travel_form_return_ret_site_other'] = 'Other (Please Specify Below)';
$string['vacation_travel_form_return_ret_details'] = 'Details';
$string['vacation_travel_form_return_ret_details_Car'] = 'Driver';
$string['vacation_travel_form_return_ret_carrier'] = 'Carrier';
$string['vacation_travel_form_return_ret_carrier_Plane'] = 'Airline';
$string['vacation_travel_form_return_ret_carrier_Train'] = 'Train Company';
$string['vacation_travel_form_return_ret_carrier_Bus'] = 'Bus Company';
$string['vacation_travel_form_return_ret_number'] = 'Transportation Number';
$string['vacation_travel_form_return_ret_number_Plane'] = 'Flight Number';
$string['vacation_travel_form_return_ret_number_Train'] = 'Train Number';
$string['vacation_travel_form_return_ret_number_Bus'] = 'Bus Number';
$string['vacation_travel_form_return_ret_variable'] = 'Date and Time Arriving at Campus';
$string['vacation_travel_form_return_ret_variable_Plane'] = 'Flight Date and Time';
$string['vacation_travel_form_return_ret_variable_Train'] = 'Train Date and Time';
$string['vacation_travel_form_return_ret_variable_Bus'] = 'Bus Date and Time';
$string['vacation_travel_form_return_ret_international'] = 'Will You Be Clearing Customs in Boston?';
$string['vacation_travel_form_error_nodestination'] = 'You must specify a destination.';
$string['vacation_travel_form_error_nophone'] = 'You must specify a phone number.';
$string['vacation_travel_form_error_nomxtransportation'] = 'You must specify whether you will require school transportation.';
$string['vacation_travel_form_error_notype'] = 'You must specify a transportation type.';
$string['vacation_travel_form_error_nosite'] = 'You must specify a stop.';
$string['vacation_travel_form_error_noairport'] = 'You must specify an airport.';
$string['vacation_travel_form_error_nostation'] = 'You must specify a station.';
$string['vacation_travel_form_error_nodriver'] = 'You must specify a driver.';
$string['vacation_travel_form_error_nodetails'] = 'You must specify bus details.';
$string['vacation_travel_form_error_noother'] = 'You must specify your other information.';
$string['vacation_travel_form_error_nocarrier_Plane'] = 'You must specify a carrier.';
$string['vacation_travel_form_error_nocarrier_Bus'] = 'You must specify a bus company.';
$string['vacation_travel_form_error_nocarrier_Train'] = 'You must specify a train company.';
$string['vacation_travel_form_error_nonumber_Plane'] = 'You must specify a flight number.';
$string['vacation_travel_form_error_nonumber_Bus'] = 'You must specify a bus number.';
$string['vacation_travel_form_error_nonumber_Train'] = 'You must specify a train number.';
$string['vacation_travel_form_error_nointernational_dep'] = 'You must specify whether your flight is an international flight.';
$string['vacation_travel_form_error_nointernational_ret'] = 'You must specify whether you will be clearing customs in Boston.';
$string['vacation_travel_form_error_outoforder'] = 'Your return date and time must be after your departure date and time.';

// Vacation Travel Report.
$string['vacation_travel_report_title'] = 'Vacation Travel Report{$a}';
$string['vacation_travel_report_select_submitted_true'] = 'Submitted';
$string['vacation_travel_report_select_submitted_false'] = 'Not Submitted';
$string['vacation_travel_report_add'] = 'New Vacation Travel Form';
$string['vacation_travel_report_remind'] = 'Notify Unsubmitted';
$string['vacation_travel_report_header_student'] = 'Student';
$string['vacation_travel_report_header_dorm'] = 'Dorm';
$string['vacation_travel_report_header_destination'] = 'Destination';
$string['vacation_travel_report_header_phone'] = 'Phone Number';
$string['vacation_travel_report_header_depdatetime'] = 'Departure Date and Time';
$string['vacation_travel_report_header_deptype'] = 'Departure Type';
$string['vacation_travel_report_header_retdatetime'] = 'Return Date and Time';
$string['vacation_travel_report_header_rettype'] = 'Return Type';
$string['vacation_travel_report_header_retinfo'] = 'Return Details';

// Vacation Travel Transportation Report.
$string['vacation_travel_transportation_report_view_departure'] = 'Departure Transportation Report';
$string['vacation_travel_transportation_report_view_return'] = 'Return Transportation Report';
$string['vacation_travel_transportation_report_select_view_departure'] = 'Departure';
$string['vacation_travel_transportation_report_select_view_return'] = 'Return';
$string['vacation_travel_transportation_report_select_type_all'] = 'All Types';
$string['vacation_travel_transportation_report_select_type_Car'] = 'Car';
$string['vacation_travel_transportation_report_select_type_Plane'] = 'Plane';
$string['vacation_travel_transportation_report_select_type_Bus'] = 'Bus';
$string['vacation_travel_transportation_report_select_type_Train'] = 'Train';
$string['vacation_travel_transportation_report_select_type_NYCDirect'] = 'NYC Direct';
$string['vacation_travel_transportation_report_select_type_Non-MXBus'] = 'Non-MX Bus';
$string['vacation_travel_transportation_report_select_mxtransportation_true'] = 'School Transportation';
$string['vacation_travel_transportation_report_select_mxtransportation_false'] = 'Not School Transportation';
$string['vacation_travel_transportation_report_add'] = 'New Vacation Travel Form';
$string['vacation_travel_transportation_report_departure_header_student'] = 'Student';
$string['vacation_travel_transportation_report_departure_header_destination'] = 'Destination';
$string['vacation_travel_transportation_report_departure_header_phone'] = 'Phone Number';
$string['vacation_travel_transportation_report_departure_header_mxtransportation'] = 'School Transportation';
$string['vacation_travel_transportation_report_departure_header_type'] = 'Type';
$string['vacation_travel_transportation_report_departure_header_site'] = 'Airport / Station / Stop';
$string['vacation_travel_transportation_report_departure_header_details'] = 'Details / Driver';
$string['vacation_travel_transportation_report_departure_header_carrier'] = 'Airline / Company';
$string['vacation_travel_transportation_report_departure_header_number'] = 'Flight / Bus / Train Number';
$string['vacation_travel_transportation_report_departure_header_datetime'] = 'Date and Time';
$string['vacation_travel_transportation_report_departure_header_international'] = 'International Flight';
$string['vacation_travel_transportation_report_departure_header_timemodified'] = 'Last Modified';
$string['vacation_travel_transportation_report_departure_header_email'] = 'Email';
$string['vacation_travel_transportation_report_return_header_student'] = 'Student';
$string['vacation_travel_transportation_report_return_header_destination'] = 'Destination';
$string['vacation_travel_transportation_report_return_header_phone'] = 'Phone Number';
$string['vacation_travel_transportation_report_return_header_mxtransportation'] = 'School Transportation';
$string['vacation_travel_transportation_report_return_header_type'] = 'Type';
$string['vacation_travel_transportation_report_return_header_site'] = 'Airport / Station / Stop';
$string['vacation_travel_transportation_report_return_header_details'] = 'Details / Driver';
$string['vacation_travel_transportation_report_return_header_carrier'] = 'Airline / Company';
$string['vacation_travel_transportation_report_return_header_number'] = 'Transportation Number';
$string['vacation_travel_transportation_report_return_header_datetime'] = 'Date and Time';
$string['vacation_travel_transportation_report_return_header_international'] = 'Clearing Customs in Boston';
$string['vacation_travel_transportation_report_return_header_timemodified'] = 'Last Modified';
$string['vacation_travel_transportation_report_return_header_email'] = 'Email';
$string['vacation_travel_transportation_report_site_other'] = 'Other';
