<?php require_once("../../config.php");
global $DB, $OUTPUT, $PAGE, $USER,$COURSE;
// if (!isloggedin()) {
// 	redirect($CFG->wwwroot.'/login/index.php');
// }



 if(!empty($_GET['base'])){


     $data= unserialize(gzuncompress(stripslashes(base64_decode(strtr($_GET['base'], '-_,', '+/=')))));


$datarecord=$DB->get_record($data['action'],array('id'=>$data['actionid']));

$quizurl=parse_url($datarecord->moodleurl);
parse_str($quizurl['query'],$output);
$course_module=$output['id'];
$atemdata=$DB->get_record('course_modules',array('id'=>$course_module));

if(!empty($atemdata)){
	$endtime=strtotime("+6 months");
	enrolCourse($atemdata->course,$data['userid'],'5',$endtime,time());

	$quizallatemdata=$DB->get_record_sql("SELECT qa.id from {course_modules} as cm inner join {quiz_attempts} as qa on cm.instance=qa.quiz where qa.userid='".$data['userid']."' and cm.id='".$course_module."'");
	if(!empty($quizallatemdata)){
		 $sqlquerydata = "DELETE FROM {quiz_attempts} where id='" . $quizallatemdata->id . "' ";
    $DB->execute($sqlquerydata);

	}






$qdata=new stdClass();
$qdata->userid=$data['userid'];
$qdata->base=$data['action'];
$qdata->baseid=$data['actionid'];
$qdata->postid=$datarecord->postid;
$qdata->createdtime=time();
$qdata->payment_type="payment";
$datar=$DB->get_record('searchda_complte_payment',array('userid'=>$data['userid'],'base'=>$data['action'],'baseid'=>$data['actionid'],'postid'=>$datarecord->postid));
if(empty($datar)){
$DB->insert_record('searchda_complte_payment', $qdata,true);
}else{
	if($datar->payment_type=='free'){
	$qdata->id=$datar->id;
	$DB->update_record('searchda_complte_payment', $qdata,true);
	}
}
redirect($datarecord->moodleurl);
 }
}else{
 	redirect($CFG->wwwroot.'/login/index.php');
 }



function enrolCourse($courseid, $userid, $roleid,$endtime,$startime) {
    global $DB, $CFG;
    $query = 'SELECT * FROM {enrol} WHERE enrol = "manual" AND courseid = '.$courseid;
    $enrollmentID = $DB->get_record_sql($query);
    if(!empty($enrollmentID->id)) {
        if (!$DB->record_exists('user_enrolments', array('enrolid'=>$enrollmentID->id, 'userid'=>$userid))) {
            $userenrol = new stdClass();
            $userenrol->status = 0;
            $userenrol->userid = $userid;
            $userenrol->enrolid = $enrollmentID->id;
            $userenrol->timestart  = $startime;
            $userenrol->timeend = $endtime;
            $userenrol->modifierid  = 2;
            $userenrol->timecreated  = time();
            $userenrol->timemodified  = time();
            //print_r($userenrol);die;
            $enrol_manual = enrol_get_plugin('manual');
            $enrol_manual->enrol_user($enrollmentID, $userid, $roleid, $userenrol->timestart, $userenrol->timeend);
            // add_to_log($courseid, 'course', 'enrol', '../enrol/users.php?id='.$courseid, $courseid, $userid);
             //there should be userid somewhere!
            //redirect('http://lln.axisinstitute.edu.au/my');
        } else {
            $oldenroll = $DB->get_record('user_enrolments', array('enrolid'=>$enrollmentID->id, 'userid'=>$userid));
            $oldenroll->timestart = $startime;
            $oldenroll->timeend = $endtime;
            if($oldenroll){
                $insertRecords=$DB->update_record('user_enrolments', $oldenroll);
            }
        }
    }
}

