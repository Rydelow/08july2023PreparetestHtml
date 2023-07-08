<?php
namespace blocks_searchdashboard;
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
use stdClass;
use html_writer;
use core_course_list_element;
use moodle_url;
use context_course;
use context_coursecat;
defined('MOODLE_INTERNAL') || die();
class State 
{
	public $message=array();
    function __construct()
    {
    	echo"dddddddddd";
    	echo $this->css();
        echo $this->index();
        echo $this->js_script();
    }
     public function css(){
         $attribute=array('rel'=>'stylesheet','href'=>'https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css');
         return $css=html_writer::tag("link",'',$attribute);

    }
    public function index(){
    	 global $DB,$CFG,$OUTPUT,$PAGE; 
    	$setting=array();
    	 return $OUTPUT->render_from_template('block_searchdashboard/index', $setting);
    }
       public function js_script(){
        global $CFG,$PAGE;
     $attribute=array('src'=>new moodle_url("https://code.jquery.com/jquery-3.3.1.js"),'type'=>"text/javascript");
     $js=html_writer::tag('script','',$attribute);

     $attribute=array('src'=>new moodle_url("https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"),'type'=>"text/javascript");
     $js.=html_writer::tag('script','',$attribute);

      $attribute=array('src'=>new moodle_url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"),'type'=>"text/javascript");
      $js.=html_writer::tag('script','',$attribute);

       $attribute=array('src'=>new moodle_url("https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"),'type'=>"text/javascript");
      $js.=html_writer::tag('script','',$attribute);
    
    return $js;
    }
}