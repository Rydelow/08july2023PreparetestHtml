<?php

defined('MOODLE_INTERNAL') || die;
require_once($CFG->libdir.'/formslib.php');


class subcategories_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $DB, $CFG, $PAGE;

        $mform    = $this->_form;

        $heading= (!empty('edit')) ? 'blockeditsettings' : 'blockaddsettings';

        $mform->addElement('header', 'addusergeneral1', 'Tests and Quizzes Section');
      
        $mform->addElement('hidden', 'postid','');
        $mform->addElement('hidden', 'tableid','');
        $mform->addElement('hidden', 'tablebase','');
        $mform->addElement('hidden', 'id','');
 $mform->addElement('text', 'section_number','Title');
$mform->setDefault('section_number', 'Section Number');

$mform->addElement('text', 'no_of_question','Title');
$mform->setDefault('no_of_question', 'No Of Question');

$mform->addElement('text', 'maximam_marks','Title');
$mform->setDefault('maximam_marks', 'Maximam Marks');

$mform->addElement('text', 'nagative_marks','Title');
$mform->setDefault('nagative_marks', 'Nagative Marks');

$mform->addElement('text', 'positive_marks','Title');
$mform->setDefault('positive_marks', 'Positive Marks');



        $mform->setExpanded('addusergeneral1');
       


  
$mform->closeHeaderBefore('addusergeneral1');
      
        if(empty($_GET['cid'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }
    }

  


}



