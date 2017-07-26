<?php
session_start();
ob_start();
include('include/config.php');
$_SESSION['username'];
$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['email'];

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
		 height:60px;
		 background-color:#32343b;
		}
</style>	
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
    <div class="right-sec"> 
      <!-- Right Section Header Start -->
      <header> 
	  <div class="row">
			<div class="col-xs-12">
				<div class="col-xs-4">
				<?php include('include/child_header.php'); $stype=$_GET['stype']; ?>
				</div>
				<div class="col-xs-4">
				<h3 style="color:#ffffff; text-align:center;"></h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;">Home</h5>
				</div>
			</div>
		</div>
		
        <!-- User Section Start -->
        
        <!-- Header Top Navigation End -->
        <div class="clearfix"></div>
      </header>
      <!-- Right Section Header End --> 
      <!-- Content Section Start -->  
  <?php /* 
	echo 'User Name : '. $_SESSION['first_name'] .'<br/>';
	echo 'NGO Name : '. $_SESSION['ngo_name'] .'<br/>';
	echo 'Type : '. $_SESSION['type'] .'<br/>';
	echo 'ID : '. $_SESSION['uid'] .'<br/>';
	*/

//echo 'ID : '. $_SESSION['uid'] .'<br/>';
//echo 'type : '. $_SESSION['prof_type'] .'<br/>';
//echo 'username : '. $_SESSION['username'] .'<br/>';
//echo 'name : '. $_SESSION['name'] .'<br/>';
//echo 'mobile : '. $_SESSION['mobile'] .'<br/>';

	?>


<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
					<div class="contents">
						<!--  <a class="togglethis">Toggle</a> -->
						<section class="boxpadding">
							<div class="col-md-12">
								<center>
								<label style="font-size:15px;">Donor Admin</label><br/> 
								<label style="font-size:15px;"></label>
								</center>
							</div>
							<div class="clearfix"></div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br/>


      </div>
    </div>
    <!-- Wrapper End --> 
	
	


<br/>
  <!-- Logo Start -->
  <div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
  </div>
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
