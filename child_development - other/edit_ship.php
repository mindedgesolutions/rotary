<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";

if(isset($_GET['uid'])){
$ship_code = $_GET['uid'];	
$sql = "Select * from shipping_rate where country_code = '$ship_code'";
$ans = mysql_query($sql);
while($row_ship = mysql_fetch_array($ans)){
	extract($row_ship);
 }
}
if(isset($_POST['submit'])){
$country_name = $_POST['country_name'];	
$country_code = $_POST['country_code'];
$state_name = $_POST['state_name'];
$state_code = $_POST['state_code'];
$ship_rate = $_POST['ship_rate'];


// For Shipping Rate...............
$sql = "Update shipping_rate set country_name = '$country_name', country_code = '$country_code', state_name = '$state_name', state_code = '$state_code', ship_rate = '$ship_rate' where country_code = '$country_code'";
$ans = mysql_query($sql);

if($ans){
 header('location:shipping.php');
 }
 else{
	$msg = '<div class="alert alert-danger alert-dismissable">
            <b>ALERT!</b>SHIPPING RATE IS NOT CREATED.......</div>';
 }
}
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
<header class="header"> <a href="dashboard.php" class="logo">
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
          <p>Hello, <?php echo ucfirst($_SESSION['user_code']); ?></p>
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
      <h1> Shiiping Rate <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Shipping</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="edit_ship.php" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>
      <div class="form-group">
       <label>Country Name</label>
       <input type="text" class="form-control" placeholder="Enter Name...." name="country_name" value="<?php echo $country_name; ?>"/>
      </div>
	  <div class="form-group">
       <label>Country Code</label>
       <input type="text" class="form-control" placeholder="Enter Code...." name="country_code" value="<?php echo $country_code; ?>"/>
      </div>      
      <div class="form-group">
       <label>State Name</label>
       <input type="text" class="form-control" placeholder="Enter Name...." name="state_name" value="<?php echo $state_name; ?>">
      </div>
      <div class="form-group">
       <label>State Code</label>
       <input type="text" class="form-control" placeholder="Enter Code...." name="state_code" value="<?php echo $state_code; ?>"/>
      </div>
      <div class="form-group">
       <label>Shipping Rate</label>
       <input type="text" class="form-control" placeholder="Enter Rate...." name="ship_rate" value="<?php echo $ship_rate; ?>"/>
      </div>
     </div><!-- /.box-body -->
      <div class="box-footer">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
      </div>
     </form>
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