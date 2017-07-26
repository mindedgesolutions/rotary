<?php

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');		
$msg="";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];
if($action=="register"){
	
	
	
	
$status = "Inactive";
$createDate = date('d/m/y');
$otpno = mt_rand(1000, 9999);
$mobno = "91".$_POST['txtMobno'];
$sessionid = mt_rand(10000, 99999);

/*sms*/
//Please Enter Your Details

$user="mobel"; //your username
$password="welcome123"; //your password
$mobilenumbers=$mobno;//"919831960329"; //enter Mobile numbers comma seperated
$message = "otp is " . $otpno; //enter Your Message
$senderid="mindeg"; //Your senderid
$messagetype="N"; //Type Of Your Message
$DReports="Y"; //Delivery Reports
$url="http://www.smscountry.com/SMSCwebservice_Bulk.aspx";
$message = urlencode($message);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL handle");}
$ret = curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_POSTFIELDS,
"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
$curlresponse = curl_exec($ch); // execute
if(curl_errno($ch))
echo 'curl error : '. curl_error($ch);
if (empty($ret)) {
// some kind of an error happened
die(curl_error($ch));
curl_close($ch); // close cURL handler
} else {
$info = curl_getinfo($ch);
curl_close($ch); // close cURL handler
//echo "";
//echo $curlresponse; //echo "Message Sent Succesfully" ;
}
/*sms*/


$sql="Select * from tbl_user_mh where mobno=$mobno and status='Active'";
$result=mysql_query($sql);
$count = mysql_num_rows($result);
if($count>0){	
$result = mysql_query($sql_create);
			echo '<script>
				alert("This mobile number is already associated with another account.");
				window.location.href="http://rotaryteach.org/e_learn_mha_gov/gen_otp_no.php";
				</script>
				';
}
else{
	$sql_create = "Insert into tbl_user_mh values(NULL,'','','','','',$mobno,'','$createDate','$status','$otpno','$sessionid')";
	//echo $sql_create;
$result = mysql_query($sql_create);
if($result){
		echo '<script>
				alert("Please check your sms and get your OTP No.");
				window.location.href="http://rotaryteach.org/e_learn_mha_gov/new_user_mh.php?seid='.$sessionid.'";
				</script>
				';
				
		
}

}


}

}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>School Survey</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric1(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error1").style.display = ret ? "none" : "inline";
			return ret;
		}
</script>
		
</head>

<body>
<!-- Wrapper Start -->
<div class="loginwrapper">
	<span class="circle"></span>
	<div class="loginone">
    	<header>
        	<!-- <a href="dashboard1.html"><img src="assets/images/logo.png" alt="" /></a> -->
            <p>Maharashtra School Survey Registration Form</p>
        </header>
        <form action="gen_otp_no.php?action=register" method="post">
        	
			<div class="mobno">
            	<input type="text" class="form-control" id="txtMobno" name="txtMobno" required  maxlength="10" placeholder="Enter your contact no" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
				<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
         
            </div>  			
            <input type="submit" class="btn btn-primary style2" value="Sign Up" />
			
        </form>        
    </div>
</div>
<!-- Wrapper End -->



</body>
</html>
