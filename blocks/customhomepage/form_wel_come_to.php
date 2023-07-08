<?php 
require_once("$CFG->libdir/formslib.php");
 
class wel_com_to extends moodleform {
    //Add elements to form
    public function definition() {
       global $CFG, $DB, $PAGE, $USER; 	
 
 
 	$attributes=array('class' => 'option-select', 'title'=>'');
 	
 	$valid=array('class'=>'custom-valid');
 
        $mform = $this->_form; // Don't forget the underscore! 
 
     
       $mform->addElement('hidden', 'id');
       // $mform->addElement('hidden', 'user_id');

    
       
     
      $mform->addElement('editor', 'wel_come_to', 'Welcome to Content');
     $mform->setType('fieldname', PARAM_RAW);
       
            
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Submit'); 
       $buttonarray[] = &$mform->createElement('cancel');
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
    }
 
    
}