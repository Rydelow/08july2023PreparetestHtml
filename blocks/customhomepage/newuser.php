<?php require_once("../../config.php");

global $DB, $OUTPUT, $PAGE, $USER,$CFG;

$str = $fromform->email_id;

$dd=explode(",",rtrim($str,","));

$num=count($dd);

if($num>1){
	foreach($dd as $email){
				$usernamereplace=str_replace("@u",$email,$fromform->notification['text']);
     		 $messagehtml = "<html><head><title></title></head><body>".$usernamereplace."</body></html>";
      		$fromUser = "notification@preparetest.com";
      		$subject =$fromform->subject;
              $emailuser = new stdClass();
              $emailuser->email = $email;
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
}else{
$email=$str;

			$usernamereplace=str_replace("@u",$email,$fromform->notification['text']);
     		 $messagehtml = "<html><head><title></title></head><body>".$usernamereplace."</body></html>";
      		$fromUser = "notification@preparetest.com";
      		$subject =$fromform->subject;
              $emailuser = new stdClass();
              $emailuser->email = $email;
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


