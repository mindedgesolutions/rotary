<?php
$to = "sumit@mindedgesolutions.com";
$subject = "My subject 123";
$txt = "Hello world!";

// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	// More headers
	$headers .= 'From: Rotary India Literacy Mission <info@rotarytech.org>'. "\r\n";

if(mail($to,$subject,$txt,$headers)){
        echo "The email($to,$subject) was successfully sent.";
    } else {
        echo "The email($to,$subject) was NOT sent.";
    }
?> 