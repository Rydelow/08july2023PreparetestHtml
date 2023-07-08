<?php

defined('MOODLE_INTERNAL') || die;
require_once($CFG->libdir.'/formslib.php');


class subcategories_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $DB, $CFG, $PAGE;

$id = $_GET['id'];
$table= base64_decode($_GET['base']);
if(!empty($table)){
$dataa=$DB->get_record($table,array('id'=>$id));
}else{
  $dataa="";
}

$topbar = $DB->get_record('searchda_general',array('postid'=>$dataa->postid,'tableid'=>$dataa->id));


        $mform    = $this->_form;

        $heading= (!empty('edit')) ? 'blockeditsettings' : 'blockaddsettings';

        $mform->addElement('header', 'addusergeneral1', 'Tests and Quizzes Section');
      
        $mform->addElement('hidden', 'postid','');
        $mform->addElement('hidden', 'tableid','');
        $mform->addElement('hidden', 'tablebase','');
        $mform->addElement('hidden', 'id','');


 $mform->addElement('text', 'section_number',$topbar->section_number);





$mform->addElement('text', 'no_of_question',$topbar->no_of_question);



$mform->addElement('text', 'maximam_marks',$topbar->maximam_marks);





$mform->addElement('text', 'nagative_marks',$topbar->nagative_marks);





$mform->addElement('text', 'positive_marks',$topbar->positive_marks);




        $mform->setExpanded('addusergeneral1');
       


  
$mform->closeHeaderBefore('addusergeneral1');
      
        if(empty($_GET['cid'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }
    }

  


}



