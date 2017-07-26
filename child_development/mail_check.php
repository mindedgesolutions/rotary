<?php
/*$to = "aapga.singh@rotaryteach.org";
$subject = "TEST MAIL";
$message = "TEST";
$headers = "From: info@rotaryteach.org\r\n";
$headers .= "Reply-To: info@rotaryteach.org\r\n";
$headers .= "Return-Path: info@rotaryteach.org\r\n";
$headers .= "BCC: website@rotaryteach.org\r\n";

if ( mail($to,$subject,$message,$headers) ) {
   echo "The email has been sent!";
   } else {
   echo "The email has failed!";
   }*/
   $to="aapga.singh@rotaryteach.org";
                        $subject="This is Your Message";
                        $from = 'Sender <info@rotaryteach.org>';
                        $body='Hi '.$name.', <br/><br>Now You can See Yor main in inbox';
                        $headers = "From: " .($from) . "\r\n";
                        $headers .= "Reply-To: ".($from) . "\r\n";
                        $headers .= "Return-Path: ".($from) . "\r\n";;
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
                        mail($to,$subject,$body,$headers);
?> 


