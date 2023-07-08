<?php

defined('MOODLE_INTERNAL') || die;
require_once($CFG->libdir.'/formslib.php');


class content_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE,$DB;
        $id = $_GET['id'];
            $table= base64_decode($_GET['base']);
            if(!empty($table)){
            $dataa=$DB->get_record($table,array('id'=>$id));
            }else{
              $dataa="";
            }
        $mform    = $this->_form;
        $mform->addElement('header', 'addusergeneral1', 'Title Section');
        $mform->setExpanded('addusergeneral1');
        $mform->addElement('hidden', 'thid','');
        $mform->addElement('hidden', 'id','');
        $mform->addElement('text', 'title','Title');
        $mform->setDefault('title','Title');
        $mform->addElement('text','icon','Icon Class');
        if(empty($_GET['id'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }

            
    }

  


}


class dropdowncontent_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE,$DB;
    
        $mform    = $this->_form;
    
        $mform->addElement('hidden', 'thid','');
        $mform->addElement('hidden', 'id','');
        $mform->addElement('text', 'title','Title');
        $mform->setDefault('title','Title');
        $mform->addElement('text','icon','Icon Class');
        if(empty($_GET['id'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }

            
    }

  


}

class bottomcontent_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE,$DB;
    
        $mform    = $this->_form;
                $mform->addElement('hidden', 'thid','');
        $mform->addElement('hidden', 'id','');
     $mform->addElement('editor','t_content','Content');

 if(empty($_GET['id'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }

            
    }

  


}


class important_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE,$DB;
    
        $mform    = $this->_form;
                $mform->addElement('hidden', 'titleid','');
                $mform->addElement('hidden', 'thid','');
        $mform->addElement('hidden', 'id','');
      $mform->addElement('text','name','Title');
     $mform->addElement('editor','content','Content');

 if(empty($_GET['id'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }

            
    }

  


}
