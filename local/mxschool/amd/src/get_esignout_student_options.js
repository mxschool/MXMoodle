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
 * Updates the types and passengers fields of the eSignout form for Middlesex School's Dorm and Student functions plugin.
 *
 * @module     local_mxschool/get_esignout_driver_details
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery', 'core/ajax', 'core/str', 'core/notification'], function($, ajax, str, notification) {
    function update() {
        var passengersDiv = $('.mx-form select#id_passengers').parent().parent();
        var driverDiv = $('.mx-form select#id_driver').parent().parent();
        var otherDiv = $('.mx-form input#id_type_other').parent().parent();
        var permissionsFieldset = $('.mx-form fieldset#id_permissions');
        if (!$('.mx-form input#id_type_select_Driver').prop('checked')) {
            passengersDiv.hide();
            passengersDiv.next().hide();
        }
        if ($('.mx-form input#id_type_select_Passenger').prop('checked')) {
            driverDiv.show();
        } else {
            driverDiv.hide();
        }
        if ($('.mx-form input#id_type_select_Other').prop('checked')) {
            otherDiv.show();
        } else {
            otherDiv.hide();
        }
        var promises = ajax.call([{
            methodname: 'local_mxschool_get_esignout_student_options',
            args: {
                userid: $('.mx-form select#id_student > option:selected').val()
            }
        }]);
        promises[0].done(function(data) {
            // console.log(data);
            if ($('.mx-form input#id_type_select_Driver').prop('checked')) {
                if(data.maydrivepassengers) {
                    passengersDiv.show();
                    passengersDiv.next().hide();
                } else {
                    passengersDiv.hide();
                    passengersDiv.next().show();
                }
            }
            if ($('.mx-form input#id_type_select_Passenger').prop('checked') && data.mayridewith !== 'Any Driver') {
                permissionsFieldset.prev().hide();
                permissionsFieldset.show();
                var parentPermissionDiv = permissionsFieldset.children().eq(1).children().eq(0);
                var specificDriversDiv = permissionsFieldset.children().eq(1).children().eq(1);
                if (data.mayridewith === 'Parent Permission') {
                    parentPermissionDiv.show();
                    specificDriversDiv.hide();
                } else if (data.mayridewith === 'Specific Drivers') {
                    parentPermissionDiv.hide();
                    $.when(str.get_string('esignout_form_specific_warning', 'local_mxschool')).done(function(text) {
                        specificDriversDiv.children().eq(1).children().eq(0).text(text + ' ' + data.specificdrivers + '.');
                        specificDriversDiv.show();
                    });
                }
            } else {
                permissionsFieldset.prev().show();
                permissionsFieldset.hide();
            }
            // var passengersSelect = $('.mx-form select#id_passengers');
            // passengersSelect.empty();
            // $.each(data.passengers, function(index, student) {
            //     passengersSelect.append($('<option></option>').attr('value', student.userid).text(student.name));
            // });
            var driverSelect = $('.mx-form select#id_driver');
            driverSelect.empty();
            $.each(data.drivers, function(index, student) {
                driverSelect.append($('<option></option>').attr('value', student.esignoutid).text(student.name));
            });
        }).fail(notification.exception);
    }
    return  {
        updateWithPermissions: function() {
            $(document).ready(update);
            $('.mx-form div[data-groupname="type_select"]').change(update);
            $('.mx-form select#id_student').change(update);
        }
    };
});