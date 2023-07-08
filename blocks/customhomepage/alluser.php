<?php require_once("../../config.php");

global $DB, $OUTPUT, $PAGE, $USER,$CFG;

if($fromform->selectuser=="selectuser"){

      foreach ($fromform->users as $value) {
      	$userdata=$DB->get_record('user',array('id'=>$value));
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


}else{

$alldata=$DB->get_records_sql("SELECT * FROM {user} where suspended='0' and `email`!=''");
    foreach ($alldata as $value) {
            $userdata=$DB->get_record('user',array('id'=>$value));
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

}







