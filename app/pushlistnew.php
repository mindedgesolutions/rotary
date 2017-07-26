<?php
//include("connection.php");



$dbName='rotary32_teach';
$dbHost='103.227.62.215';
$dbUser='mindedgeteach1';
$dbPass='SuHiNa@1979';

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());


$sql = "SELECT token_id token_id, message msgn FROM noti_trigger";
$result1 = mysql_query($sql);
//$teacher = mysql_num_rows($result1);
$rslt1="";
$msgn="";
while ($row = mysql_fetch_assoc($result1)) {
   $rslt1 = trim($row["token_id"]);
    $msgn = trim($row["msgn"]);
   //sendPushImg($rslt1);
   sendPush($rslt1,$msgn);
}

function sendPush($rslt,$txt) {
echo $txt;
//$rslt="dl-ldpApRhc:APA91bG42Sju7368UnhWnCXr_yW-zn0b6qaoE_t1BTR91IZ37YMS-G0MyDAG2gYEzUMeJP1-rTY7XdgN-cNdFVQ54oEne_YMAHG330D8D0peQxTXGkgpdR8mVfbUmfSPQjAKXaxSZabw";
//$rslt="f8-Jy2wc-yc:APA91bEC0l6t-8oUJ_n6keNDp3M3Ndby634bCzm4ObailmhqZ7FaO7oGmUC2CLQoEepekjFx2HdI89G6aiDjz_8dEmoYPMZk-yWyu5WKapox2hDiwWIj3FpvxrUXSrnYfAEfZfuSXpqd";
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCXGngVdPMN7H1Yp7EAdEXKIRyT53X131M' );


//$registrationIds = array("f8-Jy2wc-yc:APA91bEC0l6t-8oUJ_n6keNDp3M3Ndby634bCzm4ObailmhqZ7FaO7oGmUC2CLQoEepekjFx2HdI89G6aiDjz_8dEmoYPMZk-yWyu5WKapox2hDiwWIj3FpvxrUXSrnYfAEfZfuSXpqd");//array( $_GET['id'] );
$registrationIds = array($rslt);//array( $_GET['id'] );
// prep the bundle
$msg = array
(
	'message' 	=> $txt,//'A Grant for 120 E-Learning Facilities to be installed in 120 schools in select cities in RID 3291 is available.',
	'title'		=> 'TEACH',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'notiid' => 525,
	'smallIcon'	=> 'http://www.rotaryteach.org/images/logo2.png'
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
}
function sendPushImg($rslt) {
//$rslt="dl-ldpApRhc:APA91bG42Sju7368UnhWnCXr_yW-zn0b6qaoE_t1BTR91IZ37YMS-G0MyDAG2gYEzUMeJP1-rTY7XdgN-cNdFVQ54oEne_YMAHG330D8D0peQxTXGkgpdR8mVfbUmfSPQjAKXaxSZabw";
//$rslt="f8-Jy2wc-yc:APA91bEC0l6t-8oUJ_n6keNDp3M3Ndby634bCzm4ObailmhqZ7FaO7oGmUC2CLQoEepekjFx2HdI89G6aiDjz_8dEmoYPMZk-yWyu5WKapox2hDiwWIj3FpvxrUXSrnYfAEfZfuSXpqd";
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCXGngVdPMN7H1Yp7EAdEXKIRyT53X131M' );


//$registrationIds = array("f8-Jy2wc-yc:APA91bEC0l6t-8oUJ_n6keNDp3M3Ndby634bCzm4ObailmhqZ7FaO7oGmUC2CLQoEepekjFx2HdI89G6aiDjz_8dEmoYPMZk-yWyu5WKapox2hDiwWIj3FpvxrUXSrnYfAEfZfuSXpqd");//array( $_GET['id'] );
$registrationIds = array($rslt);//array( $_GET['id'] );
// prep the bundle
$msg = array
(
    /*'style' => 'picture',
	'image_url'	=> 'http://www.mobelhomestore.com/mobelloot.jpg',
	'message' 	=> 'Hi, welcome, aboard on the journey towards Total Literacy and Quality Education',
	'title'		=> 'TEACH',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'http://www.rotaryteach.org/extra-images/ban6.png',
	'smallIcon'	=> 'http://www.rotaryteach.org/images/logo2.png'*/
	
	//'message' 	=> 'Hi, welcome, aboard on the journey towards Total Literacy and Quality Education',
	'title'		=> 'TEACH',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'style' => 'picture',
	'picture'	=> 'http://www.rotaryteach.org/extra-images/ban6.png',
	'smallIcon'	=> 'http://www.rotaryteach.org/images/logo2.png'

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
}

?>


