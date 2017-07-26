<?php
session_start();
ob_start();

include('include/config.php');

$msg="";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

$userid = $_POST['txtUserID'];
$password = $_POST['password'];


if($action=="login"){
//$sql="Select * from tbl_user_mh where mobno ='$userid' and password ='$password' and type='school survey'";
$sql="Select * from tbl_user_mh where mobno ='$userid' and password ='$password'";
//echo $sql;
$query=mysql_query($sql);
while($data = mysql_fetch_array($query)){

if($data['status'] == 'Active'){
	$_SESSION['uid'] = $data['id'];
	$_SESSION['type'] = $data['type'];
	$_SESSION['username'] = $data['username'];
	$usertype = $data['type'];
	if($usertype =='school survey')
	{
		header('location:dashboard.php');
	}
	else if($usertype =='admin')
	{
		header('location:dashboardadmin.php');
	}
	
  }
 else{
  $msg = "Please check your Username / Password.";
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
</head>

<body>
<!-- Wrapper Start -->
<div class="loginwrapper">
	<span class="circle"></span>
	<div class="loginone">
    	<header>
        	<!-- <a href="dashboard1.html"><img src="assets/images/logo.png" alt="" /></a> -->
            <p>Maharashtra School Survey login Form</p>
        </header>
        <form action="index.php?action=login" method="post">
        	<div class="username">
        		<input type="text" class="form-control" id="txtUserID" name="txtUserID" placeholder="Enter your User ID" />
                <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="password">
            	<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" />
                <i class="glyphicon glyphicon-lock"></i>
            </div>  
			<div>
            <input type="submit" class="btn btn-primary style2" value="Sign In" />
			
			</div>
			<div>
			<center>
			<button type="button" class="btn btn-primary style2" onClick="parent.open('http://rotaryteach.org/e_learn_mha_gov/gen_otp_no.php')">New User Sign up </button>
			<button type="button" class="btn btn-primary style2" onClick="parent.open('http://rotaryteach.org/e_learn_mha_gov/mh_survey_forgot_pwd.php')">Forgot Password &nbsp;</button> 
			</center>
			</div>
		</form>        
    </div>
</div>
<!-- Wrapper End -->



</body>
</html>
