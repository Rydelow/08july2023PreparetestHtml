<?php function attempt_submitted(\core\event\user_created $event){
         global $DB, $USER,$CFG;
         echo "";
         print_r($event);
         die();
          //require_once($CFG->dirroot.'/local/mdl_course_enroll/lib.php');
     	// if($event->target=="attempt" && $event->action=="submitted"){
      //    $rdata=quizsubmitnotification($event->objectid,$event->contextinstanceid);
     	// }
}