<?php


	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/


	
	$dbName='rotary32_teach';
	$dbHost='103.227.62.215';
	$dbUser='mindedgeteach1';
	$dbPass='SuHiNa@1979';
	
	$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
	@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());



	$pmobile = trim($_GET["pmobile"]);



$sql = "select Id,user_emaiil from user_master where user_mobile='" .$pmobile. "' LIMIT 1";

//die($query);
$result1 = mysql_query($sql);
$userid=0;
$pmemail="";
while ($row = mysql_fetch_assoc($result1)) {
   $userid = $row["Id"];
   $pmemail= $row["user_emaiil"];
}




	$cpwd = mt_rand();




$query = "Update user_master set user_pwd='" .$cpwd . "' where  Id='" .$userid ."'";

	echo $cpwd;

	$result2 = mysql_query($query);

	$from = "volunteer@rotaryteach.org";
	$to= $pmemail;
	$subject = "Forgot Password";
	$header = "From: ".$from."\r\n";
	$body="";
	$body=$body."New Password is  ".$cpwd."\r\n";

	$newmsg=rawurldecode($body);


	mail($to,$subject,$newmsg,$header);





?>
