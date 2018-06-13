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
 * Provides renderable classes for Middlesex School's Dorm and Student functions plugin.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mxschool\output;

defined('MOODLE_INTERNAL') || die;

use renderable;
use renderer_base;
use templatable;
use stdClass;
use html_writer;

/**
 * Renderable class for index pages.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class index_page implements renderable, templatable {

    /** @var array $links array of links (displayText => url) to be passed to the template.*/
    private $links;

    /**
     * @param array $links array of links (displayText => url) to be passed to the template.
     */
    public function __construct($links) {
        $this->links = $links;
    }

    /**
     * Exports this data so it can be used as the context for a mustache template.
     *
     * @return stdClass with property links which is an array of stdClass with properties text and url.
     */
    public function export_for_template(renderer_base $output) {
        global $CFG;
        $data = new stdClass();
        $data->links = array();
        foreach ($this->links as $text => $url) {
            $data->links[] = array('text' => $text, 'url' => $CFG->wwwroot.$url);
        }
        return $data;
    }
}

/**
 * Renderable class for report pages.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class report_page implements renderable, templatable {

    /** @var string $id an id to tag this report for custom formatting.*/
    private $id;
    /** @var mx_table $table table object to be outputed to the template.*/
    private $table;
    /** @var int $size the number of rows to output.*/
    private $size;
    /** @var string $search default search text, null if there is no search option.*/
    private $search;
    /** @param array $dropdowns array of local_mxschool_dropdown objects.*/
    private $dropdowns;
    /** @var bool $printbutton whether to display a print button.*/
    private $printbutton;
    /** @var array|bool $addbutton text and url for an add button or false.*/
    private $addbutton;

    /**
     * @param string $id an id to tag this report for custom formatting.
     * @param mx_table $table table object to be outputed to the template.
     * @param int $size the number of rows to output.
     * @param string $search default search text, null if there is no search option.
     * @param array $dropdowns array of local_mxschool_dropdown objects.
     * @param bool $printbutton whether to display a print button.
     * @param array|bool $addbutton text and url for an add button or false.
     */
    public function __construct(
        $id, $table, $size, $search = null, $dropdowns = array(), $printbutton = false, $addbutton = false
    ) {
        $this->id = $id;
        $this->table = $table;
        $this->size = $size;
        $this->search = $search;
        $this->dropdowns = $dropdowns;
        $this->printbutton = $printbutton;
        $this->addbutton = $addbutton;
    }

    /**
     * Exports this data so it can be used as the context for a mustache template.
     *
     * @return stdClass with properties id, url, dropdowns, searchable, search, printable, addtext, addurl, and table.
     */
    public function export_for_template(renderer_base $output) {
        global $PAGE;
        $data = new stdClass();
        $data->id = $this->id;
        $data->url = $PAGE->url;
        $data->dropdowns = array();
        foreach ($this->dropdowns as $dropdown) {
            $data->dropdowns[] = html_writer::select($dropdown->options, $dropdown->name, $dropdown->selected, $dropdown->nothing);
        }
        $data->searchable = $this->search !== null;
        $data->search = $this->search;
        $data->printable = $this->printbutton;
        if ($this->addbutton) {
            $data->addtext = $this->addbutton['text'];
            $data->addurl = $this->addbutton['url']->out();
        }
        ob_start();
        $this->table->out($this->size, true);
        $data->table = ob_get_clean();
        return $data;
    }

}

/**
 * Renderable class for form pages.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class form_page implements renderable, templatable {

    /** @var moodleform $form The form object to render.*/
    private $form;
    /** @var string|bool $topdescription A description for the top of the form or false.*/
    private $descrption;
    /** @var string|bool $bottomdescription A description for the bottom of the form or false.*/
    private $bottomdescription;

    /**
     * @param moodleform $form The form object to render.
     * @param string|bool $topdescription A description for the top of the form or false.
     * @param string|bool $bottomdescription A description for the bottom of the form or false.
     */
    public function __construct($form, $topdescription = false, $bottomdescription = false) {
        $this->form = $form;
        $this->topdescription = $topdescription;
        $this->bottomdescription = $bottomdescription;
    }

    /**
     * Exports this data so it can be used as the context for a mustache template.
     *
     * @return stdClass with properties form, topdescription, and bottomdescription.
     */
    public function export_for_template(renderer_base $output) {
        $data = new stdClass();
        ob_start();
        $this->form->display();
        $data->form = ob_get_clean();
        $data->topdescription = $this->topdescription;
        $data->bottomdescription = $this->bottomdescription;
        return $data;
    }
}

/**
 * Renderable class for checkboxes.
 *
 * @package    local_mxschool
 * @author     Jeremiah DeGreeff, Class of 2019 <jrdegreeff@mxschool.edu>
 * @author     Charles J McDonald, Academic Technology Specialist <cjmcdonald@mxschool.edu>
 * @copyright  2018, Middlesex School, 1400 Lowell Rd, Concord MA
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class checkbox implements renderable, templatable {

    /** @var string $value The value attribute of the checkbox.*/
    private $value;
    /** @var string $name The name attribute of the checkbox.*/
    private $name;
    /** @var bool $checked Whether the checkbox should be checked.*/
    private $checked;

    /**
     * @param string $value The value attribute of the checkbox.
     * @param string $name The name attribute of the checkbox.
     * @param bool $checked Whether the checkbox should be checked.
     */
    public function __construct($value, $name, $checked) {
        $this->value = $value;
        $this->name = $name;
        $this->checked = $checked;
    }

    /**
     * Exports this data so it can be used as the context for a mustache template.
     *
     * @return stdClass with properties value, name, and checked.
     */
    public function export_for_template(renderer_base $output) {
        $data = new stdClass();
        $data->value = $this->value;
        $data->name = $this->name;
        $data->checked = $this->checked;
        return $data;
    }

}
