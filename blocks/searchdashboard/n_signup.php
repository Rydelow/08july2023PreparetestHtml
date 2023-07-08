<?php require_once("../../config.php");
 include_once 'Signup_form.php'; 
 global $DB, $OUTPUT, $PAGE, $USER,$CFG;
 $login=new Signup_form();
 $titledata=new stdClass();
 $titledata->title='PrepareTest Sign Up';
echo $login->headerlib($titledata);
echo html_writer::start_tag('div', array('class' => 'to_p_man'));
include('header.php');
echo html_writer::end_tag('div');
echo html_writer::end_tag('section');
echo $login->signup();
include('footer.php'); 
echo html_writer::script('','http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
$fscript='
  jQuery(document).ready(function( $ ) {
   

  });
';
echo html_writer::script($fscript);