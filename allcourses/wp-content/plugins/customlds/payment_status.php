<?php require_once("../../../wp-config.php");
    global $wpdb;

ob_start();
session_start();

global $wpdb, $user_ID;






       $to      = "sushilkumar@lds-international.in";

        $subject = "Bienvenue chez Five Students ! Votre compte est actif"; 

// To send HTML mail, the Content-type header must be set

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// Additional headers
        $headers .= 'From: no-reply@preparetest.com' . "\r\n";	 

// Compose a simple HTML email message 

        $message = '<html><body>';

        $message .= "<p style='font-size:18px;'>Bonjour,<p>";
        $message .= "<p style='font-size:18px;'>Veuillez <a href='#'>cliquant ICI. </a> pour télécharger notre application sur Google Play Store.</p>";
        $message .= '<div style="max-width: 100%; padding: 20px 15px;margin-bottom: 15px;">
        <figure>
        <img src="https://fivestudents.com/wp-content/uploads/2021/04/googleplay.png" width="200" style="max-width: 100%;display: block;" />
        </figure>
        </div>';
        $message .= "<p style='font-size:18px;'>Bonne préparation !</p>";

        $message .= "<p style='font-size:18px;'>L’Équipe Five Students</p>";

        $message .= '</body></html>';


$sent = wp_mail( $to, $subject, $message, $headers );
      if($sent) {
  echo $status='send';
die;  
      }
//message sent!
      else  {
  echo $status=0;	
die;
      }


?>