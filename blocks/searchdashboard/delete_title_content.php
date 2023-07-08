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

	 $sqlquery = "DELETE FROM {searchda_quiz_title} where id='" . $id . "' ";
    $res = $DB->execute($sqlquery);
    $redirect_url=$CFG->wwwroot."/blocks/searchdashboard/exam_explore.php?id=".$thid;
	redirect(new moodle_url($redirect_url));