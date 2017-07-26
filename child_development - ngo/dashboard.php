<?php
session_start();
ob_start();
$ngo_user_name = $_SESSION['username'];
$uid = $_SESSION['uid'];
include('include/config.php');

if (!isset($_SESSION['username'])) {
header('Location: index.php');
}


$sql90 = "Select * from tbl_child_profile_card where create_by = '$ngo_user_name'";
$res = mysql_query($sql90);
while($data23 = mysql_fetch_array($res)){
	extract($data23);
}

$sql = "Select * from tbl_admin where username = '$ngo_user_name'";
$ans = mysql_query($sql);
$no_of_admin = mysql_num_rows($ans);

$sql = "Select * from tbl_child_selected_tagging where ngo = '$name_partner_ngo'";
$ans = mysql_query($sql);
$child_tagged = mysql_num_rows($ans);

$sql = "Select * from tbl_child_profile_card where create_by = '$ngo_user_name'";
$ans = mysql_query($sql);
$child_profile_card = mysql_num_rows($ans);

$sql = "SELECT count(*) as total FROM `tbl_child_progress_card` WHERE `create_by` = '$ngo_user_name'";
$result = mysql_query($sql);
$data= mysql_fetch_assoc($result);
$child_progress_card = $data['total'];

//first Quater
$sql = "Select distinct(child_id) from quarter_1 where create_by = '$ngo_user_name'";
$ans = mysql_query($sql);
$quarter1 = mysql_num_rows($ans);

//Second Quater
$sql = "Select distinct(child_id) from quarter_2 where create_by = '$ngo_user_name'";
$ans = mysql_query($sql);
$quarter2 = mysql_num_rows($ans);

//third Quater
$sql = "Select distinct(child_id) from quarter_3 where create_by = '$ngo_user_name'";
$ans = mysql_query($sql);
$quarter3 = mysql_num_rows($ans);

//four Quater
$sql = "Select distinct(child_id) from quarter_4 where create_by = '$ngo_user_name'";
$ans = mysql_query($sql);
$quarter4 = mysql_num_rows($ans);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin | Dashboard</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="index.html" class="logo">
  <!-- Add the class icon to your logo image or logo icon to add the margining -->
  Super Admin </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
    <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
    <div class="navbar-right">
      <?php include('include/user_account.php'); ?>
    </div>
  </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image"> <img src="img/avatar5.png" class="img-circle" alt="User Image" /> </div>
        <div class="pull-left info">
          <p>Hello, <?php echo ucfirst($_SESSION['username']); ?></p>
          </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('include/side_menu.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Dashboard <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
<div class="row">
     					
    <!-- SALE PART-->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
				  <?php echo $child_profile_card; ?>
				</h3>
				<p>
					Child Profile Card
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="child_profile.php" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
				  <?php echo $quarter1; ?>
				</h3>
				<p>
					Quarter - 1
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="child_profile.php" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
				  <?php echo $quarter2; ?>
				</h3>
				<p>
					Quarter - 2
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="child_profile.php" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
				  <?php echo $quarter3; ?>
				</h3>
				<p>
					Quarter - 3
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="child_profile.php" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>
<div class="row">	
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
				  <?php echo $quarter4; ?>
				</h3>
				<p>
					Quarter - 4
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="child_profile.php" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
                        
                       
</div>
                    <!-- /. row-->
                    <h4 class="page-header">
                        Asha Kiran Child Development.
                        <small>Gauri should be in school. You can help bring a ray of hope for her with Asha Kiran. </small>
                    </h4>
     </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- add new calendar event modal -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
</body>
</html>