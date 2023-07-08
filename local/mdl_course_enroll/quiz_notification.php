<?php function attempt_submitted(\mod_quiz\event\attempt_submitted $event){
global $DB, $USER,$CFG;
          require_once($CFG->dirroot.'/local/mdl_course_enroll/lib.php');
     	if($event->target=="attempt" && $event->action=="submitted"){
         $rdata=quizsubmitnotification($event->objectid,$event->contextinstanceid);
     	}
}
function attempt_started(\mod_quiz\event\attempt_started $event){
	global $DB, $USER,$CFG;
    require_once($CFG->dirroot.'/local/mdl_course_enroll/lib.php');
if($event->target=="attempt" && $event->action=="started"){
$rdata=quizstartnotification($event->objectid,$event->contextinstanceid);
}
}