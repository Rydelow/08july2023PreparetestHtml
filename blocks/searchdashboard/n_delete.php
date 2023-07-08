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
$returnid= optional_param('returnid', '0', PARAM_INT);


	$rdata=$DB->get_record('searchda_categories_seo',array('th_id'=>$id));
	 $sqlquer = "DELETE FROM {searchda_categories_seo} where id='" .$rdata->id. "' ";
    $res = $DB->execute($sqlquer);


$redirect_url=$CFG->wwwroot."/blocks/searchdashboard/third_categories.php?subid=".$returnid;
	
	 $sqlquery = "DELETE FROM {".$table."} where id='" . $id . "' ";
    $res = $DB->execute($sqlquery);
	redirect(new moodle_url($redirect_url));