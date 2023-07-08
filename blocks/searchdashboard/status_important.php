<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
if (empty($USER->id)) {
	redirect($CFG->wwwroot);
}
if (is_siteadmin()) {


} else {
	redirect($CFG->wwwroot);}	

	$id = optional_param('id', '0', PARAM_INT);
	$thid = optional_param('thid', '0', PARAM_INT);
	 $data=$DB->get_record('searchda_quiz_t_imp',array('id'=>$id));
	 $topbar_slider=new stdClass();
	 $topbar_slider->id=$id;
	 if($data->status==1){
	$topbar_slider->status="0";
}else{
	$topbar_slider->status="1";
}
	$topbar_slider->timemodified=time();
	$DB->update_record('searchda_quiz_t_imp', $topbar_slider,true);
$redirect_url=$CFG->wwwroot."/blocks/searchdashboard/exam_explore.php?id=".$thid;
	redirect(new moodle_url($redirect_url));