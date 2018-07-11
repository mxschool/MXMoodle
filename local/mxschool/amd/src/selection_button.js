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
 * Selects an option for Middlesex School's Dorm and Student functions plugin.
 *
 * @module     local_mxschool/selection_button
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery', 'core/ajax', 'core/notification'], function($, ajax, notification) {
    function select() {
        var element = $(this);
        var args = JSON.parse(element.val());
        var promises = ajax.call([{
            methodname: 'local_mxschool_select_advisor',
            args: args
        }]);
        promises[0].fail(notification.exception);
        var row = element.parent().parent();
        row.children('td.selection-selected').text(element.text());
        row.find('button.mx-selection-button').change();
    }
    function update() {
        var element = $(this);
        var selected = element.parent().parent().children('td.selection-selected');
        if (selected.text() === element.text()) {
            element.removeClass('btn-secondary');
            element.addClass('btn-primary');
        } else {
            element.removeClass('btn-primary');
            element.addClass('btn-secondary');
        }
    }
    return function(value) {
        var element = $("button.mx-selection-button[value='" + value + "']");
        element.click(select);
        element.change(update);
        $(document).ready(element.change());
    };
});