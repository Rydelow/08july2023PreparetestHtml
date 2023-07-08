<?php 
require_once("$CFG->libdir/formslib.php");
 
class home_slider extends moodleform {
    //Add elements to form
    public function definition() {
       global $CFG, $DB, $PAGE, $USER; 	
 
 
 	$attributes=array('class' => 'option-select', 'title'=>'');
 	
 	$valid=array('class'=>'custom-valid');
 
        $mform = $this->_form; // Don't forget the underscore! 
 
     
       $mform->addElement('hidden', 'id');


$mform->addElement('filepicker', 'image_id','Tesimonial image',get_string('image_id'), array('maxbytes' => $maxbytes, 'accepted_types' => array('.jpg','.jpeg','.png','.gif')));
        $mform->addRule('image_id', get_string('fileupload', 'image_id'),'');

       // $mform->addElement('hidden', 'user_id');  
      $mform->addElement('editor','testimonial_content','Content');
$mform->addElement('text','name','Name');





$mform->setType('fieldname', PARAM_RAW);  

        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Submit'); 
       $buttonarray[] = &$mform->createElement('cancel');
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
    }
 
    
}