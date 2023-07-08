<?php

defined('MOODLE_INTERNAL') || die;
require_once($CFG->libdir.'/formslib.php');


class subcategories_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE;

        $mform    = $this->_form;

        $heading= (!empty('edit')) ? 'blockeditsettings' : 'blockaddsettings';

        $mform->addElement('header', 'addusergeneral1', 'Quizzes Title Section');
        $mform->setExpanded('addusergeneral1');
        $mform->addElement('hidden', 'thid','');
        $mform->addElement('hidden', 'id','');
        $mform->addElement('text', 'title','Title');
         $mform->setDefault('title', 'Quizzes');    
       

      
        if(empty($_GET['cid'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }
    }

  


}



