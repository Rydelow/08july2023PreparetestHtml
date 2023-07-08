<?php 
require_once("$CFG->libdir/formslib.php");
 
class home_news extends moodleform {
    //Add elements to form
    public function definition() {
       global $CFG, $DB, $PAGE, $USER; 	
 
 
 	$attributes=array('class' => 'option-select', 'title'=>'');
 	
 	$valid=array('class'=>'custom-valid');
 
        $mform = $this->_form; // Don't forget the underscore! 
 
     
       $mform->addElement('hidden', 'id');
       // $mform->addElement('hidden', 'user_id');

    
       
     
      $mform->addElement('editor', 'news', 'News Content');
     $mform->setType('fieldname', PARAM_RAW);
       
            
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Submit'); 
       $buttonarray[] = &$mform->createElement('cancel');
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
    }
 
    
}