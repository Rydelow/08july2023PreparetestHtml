<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
if (empty($USER->id)) {
	redirect($CFG->wwwroot);
}
if (is_siteadmin()) {


} else {
	redirect($CFG->wwwroot);}	


	
	$id = optional_param('id', '0', PARAM_INT);
$table= optional_param('table', '0', alphaext);
 $data=$DB->get_record($table,array('id'=>$id));
 if(empty($_GET['secure'])){
 $url=parse_url($_GET['url']);

 if(empty($data->title)){
 	$title="";
 }else{
 	$title=$data->title;
 }
if(isset($url['query'])){

$redirect_url=$_GET['url']."&sucessfully=".$title." Status Update";
 }else{
$redirect_url=$_GET['url']."?sucessfully=".$title." Status Update";

 }
}else{
	$redirect_url=urldecode($_GET['url']);
}


$topbar_slider=new stdClass();
	$topbar_slider->id=$id;
	
if($data->status==1){
	$topbar_slider->status="0";
}else{
	$topbar_slider->status="1";
}


	$topbar_slider->timemodified=time();
	$DB->update_record($table, $topbar_slider,true);

	redirect(new moodle_url($redirect_url));