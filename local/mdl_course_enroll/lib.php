<?php function quizsubmitnotification($objectid,$contextinstanceid){
	global $DB, $USER,$CFG;
	 $fdata=$DB->get_record_sql("SELECT qt.id,q.name,qt.quiz as quizid,qt.userid as userid,u.username,u.firstname,u.lastname,u.email FROM {quiz_attempts} as qt left join {quiz} as q on qt.quiz=q.id left join {user} as u on qt.userid=u.id where qt.id='".$objectid."'");
	 $reviewurl=$CFG->wwwroot."/mod/quiz/view.php?id=".$contextinstanceid;
     $attempt=$CFG->wwwroot."/mod/quiz/review.php?attempt=".$fdata->id;
$messagehtml="<html>
<head>
<title></title>
</head>
<body>
<p>Dear ".$fdata->firstname." ".$fdata->lastname." ,</p>
<p>You have successfully completed <a href='".$reviewurl."'><b>'".$fdata->name." Test'</b></a></p>
<p>You can review this attempt at <a href=".$attempt.">".$attempt."</a></p>
<br>
Thanks<br>
Preparetest
</body>
</html>";
 $subject = $fdata->name.'  Test successfully completed';
    $emailuser = new stdClass();
    $emailuser->email = $fdata->email;
    $emailuser->maildisplay = true;
    $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
    $emailuser->id = 1;
    $emailuser->firstnamephonetic = false;
    $emailuser->lastnamephonetic = false;
    $emailuser->middlename = false;
    $emailuser->username = false;
    $emailuser->alternatename = false;
    $admiMail = email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);


}
function quizstartnotification($objectid,$contextinstanceid){
global $DB, $USER,$CFG;

$fdata=$DB->get_record_sql("SELECT qt.id,q.name,qt.quiz as quizid,qt.userid as userid,u.username,u.firstname,u.lastname,u.email,q.course,c.fullname FROM {quiz_attempts} as qt left join {quiz} as q on qt.quiz=q.id left join {user} as u on qt.userid=u.id inner join {course} as c on q.course=c.id where qt.id='".$objectid."'");



                $context = get_context_instance(CONTEXT_COURSE, $fdata->course);        
                $teachers = get_role_users('3', $context);
                foreach ($teachers as $teachersvalue) {  
            emailTeacher($teachersvalue->firstname,$teachersvalue->lastname,$teachersvalue->email,$fdata,$contextinstanceid);  
                

                }
                $admins = get_admins();
                foreach($admins as $admin) {
                  //$emailuser->email=$admin->email;
                //email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);

                }




    }
function emailTeacher($tfirstname,$tlastname,$temail,$fdata,$contextinstanceid){
  global $DB, $USER,$CFG;



     $reviewurl=$CFG->wwwroot."/mod/quiz/view.php?id=".$contextinstanceid;
     $attempt=$CFG->wwwroot."/mod/quiz/review.php?attempt=".$fdata->id;
$messagehtml="<html>
<head>
<title></title>
</head>
<body>
<p>Hi, ".$tfirstname." ".$tlastname."


 ".$fdata->firstname." ".$fdata->lastname." attempt start, ".$fdata->name." <a href='".$reviewurl."'><b>'".$fdata->name." Test'</b></a> in course ".$fdata->fullname."</p>
<p>You can review this attempt at <a href=".$attempt.">".$attempt."</a></p>
<br>
Thanks<br>
Preparetest
</body>
</html>";
 $subject = $fdata->name.'  Test Start';
    $emailuser = new stdClass();
    
    $emailuser->maildisplay = true;
    $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
    $emailuser->id = 1;
    $emailuser->firstnamephonetic = false;
    $emailuser->lastnamephonetic = false;
    $emailuser->middlename = false;
    $emailuser->username = false;
    $emailuser->alternatename = false;
    $emailuser->email = "sarojsahoo41@gmail.com";
   email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);

}