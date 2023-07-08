<?php 
require_once("$CFG->libdir/formslib.php");
 
class latest_notification extends moodleform {
    //Add elements to form
    public function definition() {
       global $CFG, $DB, $PAGE, $USER; 	
 
 
 	$attributes=array('class' => 'option-select', 'title'=>'');
 	
 	$valid=array('class'=>'custom-valid');
 
        $mform = $this->_form; // Don't forget the underscore! 
 
     
       $mform->addElement('hidden', 'id');
       // $mform->addElement('hidden', 'user_id');

    
        $mform->addElement('text', 'awesome_features', 'Awesome Features Title'); 
     
      $mform->addElement('editor', 'awesome_features_desc', 'Awesome Features Description');
     $mform->setType('fieldname', PARAM_RAW);
       
            if(empty($_GET['id'])){
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Submit'); 
    }else{
       $buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Update'); 
    }


       $buttonarray[] = &$mform->createElement('cancel');
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
    }
 
    
}