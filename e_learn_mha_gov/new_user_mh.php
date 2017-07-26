<?php
session_start();
ob_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');		
$msg="";
$sessionid=$_GET['seid'];
$sqlmobno = "select id,mobno,otpno from tbl_user_mh where session_id='$sessionid'";
$res_mob_no=mysql_query($sqlmobno);
while($row = mysql_fetch_array($res_mob_no)){
			extract($row);
			$mobno1=$mobno;
			$userid=$id;
			$getotpno=$otpno;
			
}


if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];
if($action=="register"){

$type = "school survey";
$status = "Active";
$createDate = date('d/m/y');


$pwd = mt_rand(1000, 9999);
$fullname = $_POST['txtfullname'];
$address = $_POST['txtAddress'];
$email = $_POST['txtEmail'];
$mobno2 = $_POST['txtMobno'];
$username = $fullname;
$uid = $_POST['txtuserid'];
$otpno_txt = $_POST['txtOtpno'];
$db_otp_no = $_POST['txtGetOtpNo'];
$get_session_id = $_POST['txtSessionId'];

$sql="Select * from tbl_user_mh where email='$email' and type='$type' and status='$status'";
$result=mysql_query($sql);
$count = mysql_num_rows($result);
if($count>0){
			echo '<script>
				alert("Please select other email id.");
				window.location.href="http://rotaryteach.org/e_learn_mha_gov/new_user_mh.php?seid='.$get_session_id.'";
				</script>
				';
}
else if($db_otp_no == $otpno_txt) {

$sql_create = "Update tbl_user_mh set type='$type',username='$username',password='$pwd',fullname='$fullname',address='$address',status='$status',
				email='$email' where id='$uid'";	
$result = mysql_query($sql_create);
	
				if($result){
					
					$sender_email = 'Maharashtra School Survey Credentials';
					
					//$contact_email = $email;
					$contact_email = $email.','."elearning@rotaryteach.org";
					$contact_content = "Dear Sir/Madam,\n\n We are pleased to inform you that your account has been created successfully. \n\n
					Your Login details are as follows. \n\n
					User ID - $mobno2  \n\n  Password - $pwd \n\n 
					Please keep this email for future reference. \n\n\n
					You may also reach us by: \n\n
					Writing to us on “communications@rotaryteach.org” \n\n\n
					This is an automatically generated email. Please do not reply to this message \n\n\n
					
					Regards, \n\n Rotary India Literacy Mission";   
					
					// send mail
					if(mail($contact_email,$sender_email,$contact_content))
					{
						echo '<script>
								alert("Please check your email and get your User ID and Password");
								window.location.href="http://rotaryteach.org/e_learn_mha_gov";
								</script>
								';
					}else{
						echo '<script>
								alert("Please try again !!!");
								window.location.href="http://rotaryteach.org/e_learn_mha_gov";
								</script>
								';
					}
					
				}
}
else{
		echo '<script>
			alert("Wrong OTP No !!!");
			window.location.href="http://rotaryteach.org/e_learn_mha_gov/new_user_mh.php?seid='.$get_session_id.'";
			
			</script>
			';
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
        <form action="new_user_mh.php?action=register" method="post">
			<div class="mobno">
            	<input type="text" class="form-control" id="txtMobno" name="txtMobno" readonly value="<?php echo $mobno1; ?>" />
				<input type="text" class="form-control" id="txtuserid" name="txtuserid" readonly value="<?php echo $userid; ?>" style="display:none;" />
				<input type="text" class="form-control" id="txtGetOtpNo" name="txtGetOtpNo" readonly value="<?php echo $getotpno; ?>" style="display:none;" />
				<input type="text" class="form-control" id="txtSessionId" name="txtSessionId" readonly value="<?php echo $sessionid; ?>" style="display:none;" />
				
            </div>
			<div class="otpno">
            	<input type="text" class="form-control" id="txtOtpno" name="txtOtpno" placeholder="Enter your OTP No"  />
            </div>
			
        	<div class="firstname">
        		<input type="text" class="form-control" id="txtfullname" name="txtfullname" placeholder="Enter your Full Name" />
                
            </div>
			<div class="address">
        		<input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Enter your Address" />
                
            </div>
            <div class="email">
            	<input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Enter your valid Email" />
                
            </div>  
			  			
            <input type="submit" class="btn btn-primary style2" value="Sign Up" />
			
        </form>        
    </div>
</div>
<!-- Wrapper End -->



</body>
</html>
