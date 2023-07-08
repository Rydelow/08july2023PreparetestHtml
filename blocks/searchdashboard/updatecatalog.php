<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
if (empty($USER->id)) {
	redirect($CFG->wwwroot);
}
if (is_siteadmin()) {


} else {
	redirect($CFG->wwwroot);}	


	$id = optional_param('id', '0', PARAM_INT);


$topbar_slider=new stdClass();
	$topbar_slider->id=$id;
	$topbar_slider->catfiletype="";
	$topbar_slider->bcat_file="";
	$topbar_slider->timemodified=time();
	$DB->update_record('searchdash_brwc', $topbar_slider,true);

	redirect(new moodle_url($CFG->wwwroot.'/blocks/searchdashboard/browse_catalogue.php'));