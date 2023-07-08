<?php require_once("../../config.php");
 include_once 'Signup_form.php'; 
 include_once 'weblocallib.php'; 
 global $DB, $OUTPUT, $PAGE, $USER,$CFG;
 $login=new Signup_form();
$sql="SELECT * FROM {user}";
$data=$DB->get_records_sql($sql);
/*echo "<pre>";
print_r($data);
echo "</pre>";*/

 $weblocallib=new weblocallib();
 $titledata=new stdClass();
 $titledata->title='Confirm your account';
echo $login->headerlib($titledata);
echo html_writer::start_tag('div', array('class' => 'to_p_man'));
include('header.php');
echo html_writer::end_tag('div');
echo html_writer::end_tag('section');
echo $login->dataconfirmation($_GET['data']);
include('footer.php');
echo $login->footerscript();

// $html.="aaa";
// $html.="bbb";
// $html.="ccc";
// echo $html;
