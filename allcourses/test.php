<?php
	$to      = 'suneet@lds-international.in';
    $subject = 'test mail';
    $email = 'suneet1254@ldsengineers.com';
	$body = 'Name: ' . 'TEST MAIL hello 111'. "\n\n";
    $from =  'From:'.$email. "\r\n" ;

	
 if(mail($to,$subject,$body,$from))
	   {
		   echo 'Email has been sent ';
	   }
	   else
	   {
		   echo 'there was error to sending mail';
	   }
	




?>