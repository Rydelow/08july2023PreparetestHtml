<?php require_once("../../config.php");

global $DB, $OUTPUT, $PAGE, $USER,$CFG;

$courseid=$fromform->courseid;

$coursedata=$DB->get_records_sql("SELECT u.id,u.username FROM {user} as u INNER JOIN {role_assignments} as rs on rs.userid=u.id INNER JOIN {context} as ct on rs.contextid=ct.id WHERE ct.instanceid='".$courseid."' and rs.roleid=5");

foreach ($coursedata as $datavalue) {
	  	$userdata=$DB->get_record('user',array('id'=>$datavalue->id));
        $fnamereplace=str_replace("@f",$userdata->firstname,$fromform->notification['text']);
        $lnamereplace=str_replace("@l",$userdata->lastname,$fnamereplace);
        $emailreplace=str_replace("@e",$userdata->email,$lnamereplace);
        $usernamereplace=str_replace("@u",$userdata->username,$emailreplace);
      $messagehtml = "<html><head><title></title></head><body>".$usernamereplace."</body></html>";
      		$fromUser = "notification@preparetest.com";
      		$subject =$fromform->subject;
              $emailuser = new stdClass();
              $emailuser->email = $userdata->email;
             $emailuser->maildisplay = true;
           $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
           $emailuser->id = 1;
           $emailuser->firstnamephonetic = false;
           $emailuser->lastnamephonetic = false;
           $emailuser->middlename = false;
           $emailuser->username = false;
           $emailuser->alternatename = false;
      email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);
}

