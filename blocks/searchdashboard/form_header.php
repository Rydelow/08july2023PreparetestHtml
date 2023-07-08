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

        $mform->addElement('header', 'addusergeneral1', 'Tests and Quizzes Section');
        $mform->setExpanded('addusergeneral1');
        $mform->addElement('hidden', 'thid','');
        $mform->addElement('hidden', 'id','');
        $mform->addElement('text', 'titleone','Title');
        $mform->setDefault('titleone', 'Tests and Quizzes');
 $mform->addElement('text', 'digitone','Number');
       
$mform->addElement('header', 'addusergene', 'Tests Taken Section');
  $mform->setExpanded('addusergene');
        $mform->addElement('text', 'titletwo','Title');
        $mform->setDefault('titletwo', 'Tests Taken');
        $mform->addElement('text', 'digittwo','Number');

        $mform->addElement('header', 'adduserg', 'Students Section');
        $mform->addElement('text', 'titlethree','Title');
        $mform->setDefault('titlethree', 'Students Section');
        $mform->addElement('text', 'digitthree','Number');
$mform->setExpanded('adduserg',true,false);
$mform->closeHeaderBefore('buttonar');
      
        if(empty($_GET['cid'])){
        $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
            }else{
                $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
            }
    }

  


}



