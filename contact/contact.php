<?php

if(isset($_POST['submit'])){
  echo  $name = $_POST['name'];
  echo  $email = $_POST['email'];
   echo $message = $_POST['message'];
   
   // $to = $email;
   // $headers = "artisinghh11@gmail.com";
   // $subject = "admin message";
   //  if(mail($to, $subject, $message, $headers)){

   //      $to = "artisinghh11@gmail.com";
   //      $headers = $email;
   //      $subject = "user message";

   //    // if(mail($to, $subject, $message, $headers){
   //    //     echo "E-Mail Sent successfully, we will get back to you soon. </a>";
   //    // }
   //     echo "E-Mail Sent successfully, we will get back to you soon. ";

   //  }




      // $to = $email;
      // $subject = "Email Subject";

      // $message = 'Dear '.$name.',<br>';
      // $message .= $message."<br><br>";
      // $message .= "Regards,<br>";

      // // Always set content-type when sending HTML email
      // $headers = "MIME-Version: 1.0" . "\r\n";
      // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // // More headers
      // $headers .= 'From: artisinghh11@gmail.com' . "\r\n";
      // $headers .= 'Cc: artisinghh11@gmail.com'."\r\n";

      // mail($to,$subject,$message,$headers){
      //   echo "E-Mail Sent successfully, we will get back to you soon. ";
      // }


   
        echo $name = $_POST['name'];
        echo $email = $_POST['email'];
      
         echo  $message = $_POST['message'];exit;
        $formcontent=" From: $name  \n Message: $message ";
        $recipient = "artisinghh11@gmail.com";
        $recipient. = "CC: artisinghh11@gmail.com\r\n";
        // $recipient .= "BCC: bcc@gmail.com\r\n";   
        $subject = "Contact Form";
        $mailheader = "From: $email \r\n";
        mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
        echo "Thank You!" . " -" . "<a href='#' style='text-decoration:none;color:#ff0099;'> Return Home</a>";


}
?>