<?php 
require_once("$CFG->libdir/formslib.php");
 
class upcoming_notification extends moodleform {
    //Add elements to form
    public function definition() {
       global $CFG, $DB, $PAGE, $USER; 	
 
 
 	$attributes=array('class' => 'option-select', 'title'=>'');
 	
 	$valid=array('class'=>'custom-valid');
 
        $mform = $this->_form; // Don't forget the underscore! 
 
       $mform->addElement('hidden', 'id');
       // $mform->addElement('hidden', 'user_id');
        $mform->addElement('text', 'upnotification_name', 'Upcoming Notification Name'); 
     
      $mform->addElement('editor', 'upnotification', 'Upcoming Notification Content');

      $mform->addElement('filepicker', 'image_id','Logo',get_string('image_id'), array('maxbytes' => $maxbytes, 'accepted_types' => array('.jpg','.jpeg','.png','.gif')));
        $mform->addRule('image_id', get_string('fileupload', 'image_id'),'');



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