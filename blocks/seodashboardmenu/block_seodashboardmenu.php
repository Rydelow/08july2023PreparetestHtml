<?php
class block_seodashboardmenu extends block_list {
    public function init() {
        $this->title = get_string('pluginname', 'block_seodashboardmenu');
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



if(has_capability('local/seodashboard:seoadmindashboard',context_system::instance()) || is_siteadmin() || has_capability('local/seodashboard:seoadmindashboard_view',context_system::instance())){



  $data_uu = $CFG->wwwroot . '/local/seodashboard/allseodata.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Seo Page', array('href' => $data_uu));

$data_uu = $CFG->wwwroot . '/local/seodashboard/firstcategory.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>First category Slug', array('href' => $data_uu));

  $data_uu = $CFG->wwwroot . '/local/seodashboard/secondcategory.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Second category Slug', array('href' => $data_uu));


  $data_uu = $CFG->wwwroot . '/blocks/searchdashboard/other.php';
  $this->content->items[] = html_writer::tag('a','<i class="fa fa-hand-o-right" aria-hidden="true"></i>Other Slug', array('href' => $data_uu));



       
    }   
        
       
            return $this->content;
    }
}