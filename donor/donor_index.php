<?php
session_start();
ob_start();
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
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:50px;
		 background-color:#32343b;
		}
		
</style>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<header> 
		<div class="logo"> <a href="#"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>		
		<div class="clearfix"></div>
	</header>

<div class="structure-row alone"> 
    <!-- Right Section Start -->
    <div class="right-sec"> 
      <!-- Right Section Header Start -->
		  <header> 
			<div class="row" style="margin-top:0px;">
				<div class="col-xs-12" style="margin-top:0px;">
					
					<h3 style="color:#ffffff; text-align:center;">Welcome Asha Kiran Donors</h3>
					<!-- <h6 style="color:#ffffff; text-align:center;"><i>Step 1: Search for Your Record </br>
																	 Step 2: Login to see the performance of the child you sponsored.</i></h6>
					-->
				</div>
			</div>
			
			<!-- User Section Start -->
			
			<!-- Header Top Navigation End -->
			<div class="clearfix"></div>
		  </header>
      <!-- Right Section Header End --> 
      <!-- Content Section Start -->  
<br/>
	<section class="content" style="padding-left:20px; padding-right:20px;">
	 <!-- Small boxes (Stat box) -->
	 <div class="row">
		<div class="col-md-12">
            <div class="col-md-6">
				<center>
					<a href="http://rotaryteach.org/child_development/other/login.php">
					<img src="http://rotaryteach.org/donor/man-icon.png" alt="login" style="width:25px;height:25px;">
					<h3>Login</a></h3> 
					<h5><i>Login to see the performance of the child you sponsored.</i></h5>
				</center>
			</div>
			<div class="col-md-6">
				<center>
					<a href="http://rotaryteach.org/donor/donor_register.php">
					<img src="http://rotaryteach.org/donor/search-icon.png" alt="login" style="width:25px;height:25px;">
					<h3>Search</a></h3>
					<h5><i>Search for Your Record</i></h5>
				</center>
			</div>
		</div>
	</div>
	</section>
	 
   
	  

    </div>
    <!-- Wrapper End --> 
	<br/>
	<br/>
	<div class="footer clearfix">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
</body>
</html>

