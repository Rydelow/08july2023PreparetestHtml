<?php 
require_once("$CFG->libdir/formslib.php");
 
class notificationform extends moodleform {
    //Add elements to form
    public function definition() {
       global $CFG, $DB, $PAGE, $USER; 
           $mform = $this->_form;


           $radioarray=array();
$radioarray[] = $mform->createElement('radio', 'yesno', '', 'All User','alluser', $attributes);
$radioarray[] = $mform->createElement('radio', 'yesno', '','New User','newuser', $attributes);
$radioarray[] = $mform->createElement('radio', 'yesno', '','Enrole Course Users','enrolecourse', $attributes);
$mform->setDefault('yesno','alluser');
$mform->addGroup($radioarray, 'radioar', '', array(' '), false);
 $mform->addElement('html', '<div class="or_diao dactive" id="alluserdata">');


           $radiodata=array();
$radiodata[] = $mform->createElement('radio', 'selectuser', '', 'Select User','selectuser', $attributes);
$radiodata[] = $mform->createElement('radio', 'selectuser', '','All User','alluser', $attributes);
$mform->setDefault('selectuser','selectuser');
$mform->addGroup($radiodata, 'radioard', '', array(' '), false);

$mform->addElement('html', '<div class="newor_diao dactive" id="selectuserdata">');

			$instancesql=$DB->get_records('user');

			foreach ($instancesql as $instanceuser){ 
			$dataarray[$instanceuser->id] = $instanceuser->firstname." ".$instanceuser->lastname." (".$instanceuser->email.")" ;
			} 
			$options = array(                                                                                                           
			'multiple' => true,                                                  
			                                
			); 

			$mform->addElement('autocomplete', 'users','Select users' , $dataarray, $options);
			 $mform->addElement('html', '</div>');
 $mform->addElement('html', '</div><div class="or_diao" id="newuserdata">');

 $mform->addElement('text', 'email_id', 'Email Id');

  $mform->addElement('html', '</div><div class="or_diao" id="enrolecoursedata">');

$coursedata = $DB->get_records("course", array("visible"=>1));
foreach ($coursedata as $datavalue) {
		$selecttype[$datavalue->id]=$datavalue->fullname;
}
$select = $mform->addElement('select', 'courseid','Assign role',$selecttype);      
  $mform->addElement('html', '</div>'); 

  $mform->addElement('text', 'subject', 'Subject');

  $mform->addElement('editor', 'notification', 'Notification Content');
  $mform->addHelpButton('notification', 'notification', 'Symbol Help @f=First Name ,@l=Last Name,@u=User Name,@e=Email');
     $mform->setType('fieldname', PARAM_RAW);  

			$buttonarray[] = &$mform->createElement('submit', 'submitbutton', 'Send'); 
       
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
   }
 }

