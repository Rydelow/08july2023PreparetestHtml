<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$CFG;
 include_once 'Login_form.php';
if("/blocks/searchdashboard/login.php"==$_SERVER['REQUEST_URI']){
  redirect($CFG->wwwroot."/user-login/");
}
 $dataquery = $DB->get_record('other_seo_url',array('url'=>$_SERVER['REQUEST_URI']));
  
 global $DB, $OUTPUT, $PAGE, $USER,$CFG;
 $login=new Login_form();
 $titledata=new stdClass();
 $titledata->title=$dataquery->title;
 $titledata->description=$dataquery->description;
 $titledata->keywords=$dataquery->keywords;
echo $login->headerlib($titledata);
echo html_writer::start_tag('div', array('class' => 'to_p_man'));
include('header.php');
echo html_writer::end_tag('div');
echo html_writer::end_tag('section');
echo $login->login();
include('footer.php'); 
echo $login->footerscript();

