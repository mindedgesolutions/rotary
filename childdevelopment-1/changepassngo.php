<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['username'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];

?>
<?php

$user_email = $_SESSION['email'];
$newpass = $_POST['newpass'];
$confirmnewpass = $_POST['confirmnewpass'];
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];
	if($action=="upd"){
		$cnt=strlen($newpass);
		if($cnt>3)
		{
			if($newpass == $confirmnewpass)
			{
				$sqlupd = "Update tbl_admin SET password='$newpass' where email='$user_email' and type='NGO' and status='Active'";
				$query=mysql_query($sqlupd);
				if($query)
				{
					$msg="Your password has been changed.";
				}
				else{
					$msg="error!!";
				}
			}
			else
			{
				$msg="Password is not matching";
			}
		}
		else
		{
			$msg="Please input minimum 4 digit";
		}
		

	}
}


?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<link href="http://rotaryteach.org/child_development/other/css/AdminLTE.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<script src="js/AdminLTE/app.js" type="text/javascript"></script>


<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
	
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
<header> 
  <!-- Logo Start -->
  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
  <!-- Logo End --> 
  <!-- Sidebar Navigation Start -->
  <?php include('include/mainnav.php'); ?>
  <div class="clearfix"></div>
  <!-- Sidebar Navigation End --> 
</header>
<div class="structure-row alone"> 
  <!-- Right Section Start -->
  <div> 
    <!-- Right Section Header Start -->
    <header> 
      <!-- User Section Start -->
      <?php include('include/child_header.php'); ?>
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<!--<div align="Centre" style="margin-left:400px;">
			<h1 style="color:#ffffff;"></h1>
		</div>-->
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
    <br>
  <?php  
	//echo 'First Name : '. $_SESSION['first_name'] . '<br/>';
	//echo 'User Name : '. $_SESSION['username'] . '<br/>';
	//echo 'NGO Name : '. $_SESSION['ngo_name'] . '<br/>';
	//echo 'Type : '. $_SESSION['type'] . '<br/>';
	//echo 'ID : '. $_SESSION['uid'] . '<br/>';
	//echo 'Center Name : '. $_SESSION['center_name'];
	
	?>
	<div class="container">
							
		<div class="form-box" id="login-box">
            <form action="changepassngo.php?action=upd" method="post">
				<div class="body bg-gray">
				<center>
					<h1>Change Password</h1>
					<p style="color:#FF0000;"><?php echo $msg; ?></p>
					<p style="color:#FF0000;"><?php echo $mesg_1; ?></p>
					
						<div class="form-group">
							<input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password"/>
						</div>
						<div class="form-group">
							<input type="password" name="confirmnewpass" id="confirmnewpass" class="form-control" placeholder="Confirm New Password"/>
						</div>          
				</center>
				</div>
				<div class="footer">                                                               
					<center><button type="submit" class="btn btn-success btn-sm">Change Password</button>  </center>
				</div>
			</form>   
        </div>
		
	<!--
	<div class="form-box" id="login-box">     
	<center>
		<form action="changepassngo.php?action=upd" method="post">
			<div class="body bg-gray">
			<center>
			<p style="color:#FF0000;"><?php //echo $msg; ?></p>
			<p style="color:#FF0000;"><?php //echo $mesg_1; ?></p>
			</center>
		<div class="col-sm-12">
			<div class="col-sm-4">
				<div class="form-group">
					<input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password"/>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="password" name="confirmnewpass" id="confirmnewpass" class="form-control" placeholder="Confirm New Password"/>
				</div> 
			</div>
			<div class="col-sm-4">
				<div class="footer">                                                               
					<center><button type="submit" class="btn btn-success btn-sm">Change Password</button>  </center>
				</div>
			</div>
		</div>
		
		</form>   
	</center>
	</div>
	-->
		
								
	</div>
<br>
<br>
<br>
<br>
<br>
<br>


      </div>
    </div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  
	  <?php
	  include('include/footer.php');
	  ?>
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
