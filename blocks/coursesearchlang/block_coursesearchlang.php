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
 * Main coursesearchlang class.
 *
 * @package   block_coursesearchlanglang
 * @author    Mark Sharp <m.sharp@chi.ac.uk>
 * @copyright 2017 University of Chichester {@link https://www.chi.ac.uk}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Main coursesearchlang class.
 *
 * @copyright 2017 University of Chichester {@link https://www.chi.ac.uk}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_coursesearchlang extends block_base {

    /**
     * {@inheritdoc}
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_coursesearchlang');
    }

    /**
     * {@inheritdoc}
     */
    public function instance_allow_multiple() {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function instance_allow_config() {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function specialization() {

        // Load userdefined title and make sure it's never empty.
        if (empty($this->config->title)) {
            $this->title = get_string('pluginname', 'block_coursesearchlang');
        } else {
            $this->title = $this->config->title;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function get_content() {
        global $OUTPUT, $CFG;
        if ($this->content !== null) {
            return $this->content;
        }

      //  $langs = get_string_manager()->get_list_of_translations();
        $currentlang = current_language();

// $langs = get_string_manager()->get_list_of_translations();
        // $currentlang = current_language();

$langs=array('alllg'=>'All Language','en' =>'English (en)','ta'=>'Tamil (ta)','mr'=>'मराठी (mr)','hi'=>'हिंदी (hi)');



        // Create empty content.
        $this->content = new stdClass();
        $this->content->text = '';
        $html = "";
        $html .= html_writer::start_tag('div' , array('class' => 'container' ));
        $html .= html_writer::start_tag('form', array('action'=>$CFG->wwwroot.'/blocks/coursesearchlang/search.php','method'=>'get','class'=>'searchform'));
        $html .= html_writer::start_tag('div', array('class' => 'searchdiv' ));
        
        $html .= html_writer::select($langs, 'slang', $currentlang, false, array());
        $html .= html_writer::start_tag('input', array('name' => 'q', 'class' => 'searchforminput', 'placeholder' => get_string('placeholder', 'block_coursesearchlang')));
        $html .= html_writer::end_tag('input');
        $html .= html_writer::start_tag('button', array('class' => 'searchbutton' , 'type' => 'submit' ));
        $html .= html_writer::start_span('searchicon') . '<span class="flaticon-magnifying-glass"></span>' . html_writer::end_span();
        $html .= html_writer::end_tag('button');
        $html .= html_writer::end_tag('div');
        $html .= html_writer::end_tag('form');
        $html .= html_writer::end_tag('div');

        $this->content->text = $html; 
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function applicable_formats() {
        return array('my' => true, 'site' => true);
    }
}
