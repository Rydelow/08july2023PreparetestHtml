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


if($table=='searchda_categories'){
	$rdata=$DB->get_record('searchda_categories_firstseo',array('first_id'=>$id));
	 $sqlquer = "DELETE FROM {searchda_categories_firstseo} where id='" .$rdata->id. "' ";
    $res = $DB->execute($sqlquer);
}

if($table=='searchda_secondc'){
	$rdata=$DB->get_record('searchda_categories_secondseo',array('second_id'=>$id));
	 $sqlquer = "DELETE FROM {searchda_categories_secondseo} where id='" .$rdata->id. "' ";
    $res = $DB->execute($sqlquer);
}
if($table=='searchda_ca_quiz'){
	$udata=$DB->get_records_sql("SELECT * FROM {exam_listing} where `exam_id`='".$id."' and `exam_table`='searchda_ca_quiz'"); 
  foreach ($udata as $value) {
  	$DB->delete_records('exam_listing',array('id'=>$value->id));
  }
}
if($table=='searchda_quiz'){
	$udata=$DB->get_records_sql("SELECT * FROM {exam_listing} where `exam_id`='".$id."' and `exam_table`='searchda_quiz'"); 
  foreach ($udata as $value) {
  	$DB->delete_records('exam_listing',array('id'=>$value->id));
  }
}


if(empty($_GET['secure'])){
 $url=parse_url($_GET['url']);

  if(empty($data->title)){
 	$title="";
 }else{
 	$title=$data->title;
 }
if(isset($url['query'])){
	$redirect_url=$_GET['url']."&sucessfully=".$title." Deleted";
}else{
$redirect_url=$_GET['url']."?sucessfully=".$title." Deleted";
}
}else{

	$redirect_url=urldecode($_GET['url']);
}

if($table=='searchda_quiz_section_ca'){
	$admintestpaper_catequizdata=$DB->get_records('searchda_testpaper_quiz',array('testpaperid'=>$id));
	foreach ($admintestpaper_catequizdata as $valueadmin) {
	 	 $sqlquerydata = "DELETE FROM {searchda_testpaper_quiz} where id='" . $valueadmin->id . "' ";
    $DB->execute($sqlquerydata);
	}
}



if($table=='searchda_test'){
	


			 	 $sqlquerydataa = "DELETE FROM {searchda_ca_quiz} where quizcategories='" . $id . "' ";
		    $DB->execute($sqlquerydataa);
			



			$admintestpaper_catequizdata=$DB->get_records('searchda_testpaper_quiz',array('testpaperid'=>$id));
			foreach ($admintestpaper_catequizdata as $valueadmin) {
			 	 $sqlquerydata = "DELETE FROM {searchda_testpaper_quiz} where id='" . $valueadmin->id . "' ";
		    $DB->execute($sqlquerydata);
			}

			 $sqlquerydata = "DELETE FROM {searchda_quiz_section_ca} where quizcategories='" . $id . "'";
		    $DB->execute($sqlquerydata);


	

	

}

	
	    echo $sqlquery = "DELETE FROM {".$table."} where id='" . $id . "' ";
    $res = $DB->execute($sqlquery);
	redirect(new moodle_url($redirect_url));