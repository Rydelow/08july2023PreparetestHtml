<?php
class block_searchdashboard extends block_list {
    public function init() {
        $this->title = get_string('pluginname', 'block_searchdashboard');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    function get_content () {
    //  global $CFG;
    //  $this->content         = new stdClass;
    //  $this->content->items  = array();
    //  $this->content->icons  = array();
    //  $this->content->footer = '';

        // $this->content->items[] = html_writer::tag('a', "My Module", array('href' => "$all_lesson_planner"), $CFG->wwwroot."/my/");
        
    global $CFG, $OUTPUT, $DB, $USER;
        if ($this->content !== null) {
            return $this->content;
        }   
        $this->content = new stdClass;
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';
        $spacer = array('height' => 1, 'width' => 4);
        $subtopic = array('height' => 1, 'width' => 15);

if(is_siteadmin()){



  // $this->content->items[]="<br><h5 id='instance-92-header' style='padding-right: 19px !important;' class='card-title d-inline'> Notification</h5><br>";

  $data_uu = $CFG->wwwroot . '/blocks/searchdashboard/first_categories.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Categories', array('href' => $data_uu));
  $data_uu = $CFG->wwwroot . '/local/seodashboard/addexamcategory.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Add Exam Categories', array('href' => $data_uu));

    $data_uu = $CFG->wwwroot . '/local/seodashboard/state.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>State City', array('href' => $data_uu));
}

       
       
        
       
            return $this->content;
    }
}