<?php

require('../../config.php');
global $DB, $USER, $CFG;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $fromUser = $email;
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    // $mybrowser = get_browser(null, true);
    // $browser_history =  $mybrowser['browser_name_regex'];
    date_default_timezone_set('Asia/Kolkata');
    $Date = date("d-m-Y", strtotime(date('Y-m-d'))); 
    $time = date('h:i A'); 
    // echo $time;exit;

    $messagehtml = "
    <style type='text/css'>
      .a{ text-align: center; padding: 30px;}
      .firs_td{
        width: 100px;
        padding: 10px;
        font-family: calibri;
      }
      .sec_td{
        width: 240px;
        padding: 10px;
        font-family: calibri;
      }
      .contact_text{
        background: red;
        color: #fff;
        font-size:20px;
        font-weight: bold; 
      }
    </style>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-12' style='text-align:center;'>
          <table border='1'>
            
              <tr class='a'><td class='contact_text'  colspan='2' style='background: red;color: #fff; font-size:20px;
        font-weight: bold;padding:10px;'> Contact Page Enquiry Time <br> $Date &nbsp; $time </td></tr>
              <tr class='a'><td class='firs_td'> Name </td> <td class='sec_td'><p> $name </p></td></tr>
              <tr class='a'><td class='firs_td'> Email </td> <td class='sec_td'><p>$email</p></td></tr>
              <tr class='a'><td class='firs_td'> Mobile </td> <td class='sec_td'><p>$mobile</p></td></tr>
              <tr class='a'><td class='firs_td'> Message </td><td class='sec_td'><p style='font-family: Montserrat'>$message</p></td></tr>
              <tr class='a'><td class='firs_td'> User IP </td><td class='sec_td'><p>$ipAddress</p></td></tr>
              <tr class='a'><td class='firs_td'> Time </td><td class='sec_td'><p>$Date &nbsp; $time</p></td></tr>
            
          </table>
        </div>
      </div>
    </div>";
 
    $subject = 'Contact Mail';
    $emailuser = new stdClass();
    $emailuser->email = 'hanudondapati@gmail.com';
    $emailuser->maildisplay = true;
    $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
    $emailuser->id = 1;
    $emailuser->firstnamephonetic = false;
    $emailuser->lastnamephonetic = false;
    $emailuser->middlename = false;
    $emailuser->username = false;
    $emailuser->alternatename = false;
 
    $admiMail = email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);
    if ($admiMail) {
      // user massege
      $emailuser->email = "preparetest2021@gmail.com";

      $userMail = email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);

       //$emailuser->email = "saroj@lds-international.in";

      $userMail = email_to_user($emailuser,$fromUser, $subject, $message = '', $messagehtml);
         if($userMail){
          redirect($CFG->wwwroot.'/contact/?msg=1');//, 'Mail sent successfull', null, \core\output\notification::NOTIFY_SUCCESS);
         }
         else{
             redirect($CFG->wwwroot.'/contact/?msg=2');//, 'Mail not send', null, \core\output\notification::NOTIFY_SUCCESS);
         }
        // redirect($CFG->wwwroot.'/blocks/searchdashboard/contact_us.php', 'Mail sent successfull', null, \core\output\notification::NOTIFY_SUCCESS);
    }
    else{
      redirect($CFG->wwwroot.'/contact/?msg=2');//, 'Mail not sent', null, \core\output\notification::NOTIFY_ERROR);
    }      
}
echo $OUTPUT->header();
?>