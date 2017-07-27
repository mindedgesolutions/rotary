<?php


	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/
	
	$dbname="rotary32_teach";
	$host="192.185.36.129";
	$dbuname="rotary32_teach";
	$dbpass="info123";
	

	
	
	
	$link=mysqli_connect($host,$dbuname,$dbpass,$dbname) or die("Can not connect DATABASE.");



	

	$userid = trim($_GET["uid"]);	
	$pmobile = trim($_GET["pmobile"]);
	$pmemail = trim($_GET["pmemail"]);
	$cpwd = rand(5,15);


/*if(isset($_GET["btnSave"]))
{*/

$query = "Update user_master set user_pwd='" .$cpwd . "' where  Id='" .$userid ."'";


//die($query);

	$res = mysqli_query($link,$query);
	if($res)
	{
	$from = "volunteer@rotaryteach.org";
	$to= $pmemail;
	$subject = "Forgot Password";
	$header = "From: ".$from."\r\n";
	$body="";
	$body=$body."New Password is  ".$cpwd."\r\n";	
	
		$newmsg=rawurldecode($body);

	
	 mail($to,$subject,$newmsg,$header);
	}

	

//}
//die("sas");
//print_r($_FILES);
//echo 'save'
?>
