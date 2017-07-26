<?php
session_start();
ob_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');		
$msg="";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];
if($action=="register"){
$firstname = $_POST['txtfirstname'];
$lastname = $_POST['txtlastname'];
$email = $_POST['txtEmail'];
$type = "school survey";
$status = "Active";
$createDate = date('d/m/y');
$username = $firstname.' '.$lastname ;
$pwd = mt_rand(1000, 9999);

$sql="Select * from tbl_admin where email='$email' and type='$type' and status='$status'";
$result=mysql_query($sql);
$count = mysql_num_rows($result);
if($count>0){
			echo '<script>
				alert("Please select other email id.");
				window.location.href="http://rotaryteach.org/Comprehensive_School_Survey/survey_new_user.php";
				</script>
				';
}
else{
	$sql_create = "Insert into tbl_admin values(NULL,'$username','$pwd','$firstname','$lastname','$email','$type','$createDate','$status','','','','','')";
$result = mysql_query($sql_create);
if($result){
		
	$sender_email = 'School Survey Credentials';
    
    $contact_email = $email;
    $contact_content = "Dear Sir/Madam,\n\n Your login ID and Password is as follow. \n
	User ID=$contact_email  AND  Password=$pwd \n\n Thanks & Regards \n\n Rotary India Literacy Mission \n 145 Sarat Bose Road \n Kolkata - 700 026";   
    
    // send mail
    if(mail($contact_email,$sender_email,$contact_content))
	{
		echo '<script>
				alert("Please check your email and get your User ID and Password");
				window.location.href="http://rotaryteach.org/Comprehensive_School_Survey";
				</script>
				';
	}else{
		echo '<script>
				alert("Please try again !!!");
				window.location.href="http://rotaryteach.org/Comprehensive_School_Survey/survey_new_user.php";
				</script>
				';
	}
		
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
            <p>Comprehensive School Survey Registration Form</p>
        </header>
        <form action="survey_new_user.php?action=register" method="post">
        	<div class="firstname">
        		<input type="text" class="form-control" id="txtfirstname" name="txtfirstname" placeholder="Enter your First Name" />
                
            </div>
			<div class="lastname">
        		<input type="text" class="form-control" id="txtlastname" name="txtlastname" placeholder="Enter your Last Name" />
                
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
