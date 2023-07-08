<?php

defined('MOODLE_INTERNAL') || die;
require_once($CFG->libdir.'/formslib.php');


class seo_form extends moodleform {

       /**
     * Form definition.
     */
    function definition() {
        global $CFG, $PAGE;

        $mform    = $this->_form;

        $heading= (!empty('edit')) ? 'blockeditsettings' : 'blockaddsettings';

        $mform->addElement('header', 'addusergeneral1', 'Page Title and Seo');
        $mform->setExpanded('addusergeneral1');
       
        $mform->addElement('hidden', 'id','');
        $mform->addElement('text', 'url','Url-'.$CFG->wwwroot.'/');
        $mform->addHelpButton('url','url','block_searchdashboard');
        $mform->addElement('text', 'title','Title');
        $mform->addElement('text', 'keywords','Keywords');
        $mform->addElement('text', 'author','Author');
        $mform->addElement('textarea', 'description','Description', 'wrap="virtual" rows="20" cols="50"');
   


      
        // if(empty($_GET['cid'])){
        // $mform->addElement('submit', 'submit', 'Submit', array('class' => 'form-submit'));
        //     }else{
        //         $mform->addElement('submit', 'submit','Update', array('class' => 'form-submit'));
        //     }

                $buttonarray=array();
$buttonarray[] = $mform->createElement('submit', 'submitbutton', get_string('savechanges'));
// $buttonarray[] = $mform->createElement('reset', 'resetbutton', get_string('revert'));
$buttonarray[] = $mform->createElement('cancel');
$mform->addGroup($buttonarray, 'buttonar', '', ' ', false);

    }
    
  function validation($data, $files) {
    $errors= array();
    $haystack = $data['url'];
$needle = "https://preparetest.com/";
if(empty($data['id'])){
   if( strpos( $haystack, $needle ) !== false) {
   $errors['url']="Please Remove 'https://preparetest.com/' Add Only Ex:-blocks/searchdashboard/other.php";
} 
}

return $errors;

  }


}



