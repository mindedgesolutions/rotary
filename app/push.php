<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCXGngVdPMN7H1Yp7EAdEXKIRyT53X131M' );


//$registrationIds = array("f8-Jy2wc-yc:APA91bEC0l6t-8oUJ_n6keNDp3M3Ndby634bCzm4ObailmhqZ7FaO7oGmUC2CLQoEepekjFx2HdI89G6aiDjz_8dEmoYPMZk-yWyu5WKapox2hDiwWIj3FpvxrUXSrnYfAEfZfuSXpqd");//array( $_GET['id'] );
$registrationIds = array("frVIYN3o0pM:APA91bFo_xyIy-a2n2zyc_80K-9YGhfGfI0JneBq-VG_nSpz_6DZ0chWPOrWN2PMDRsrxyzfNGf4dTafxtsqtLbZxqTUA0_epKhBAbL4B5kzREe-GKPoOxbaDSwy0klY52hC2_7SATf9");//array( $_GET['id'] );
// prep the bundle


	
$msg = array
(
	'message' 	=> 'here is a message. message',
	'title'		=> 'This is a title. title',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'style' => 'picture',
	'picture'	=> 'http://www.rotaryteach.org/extra-images/ban6.png',
	'smallIcon'	=> 'small_icon'
);

$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;