<?php
session_start();
ob_start();
include('include/config.php');
$donar_idN = $_GET['id'];
$msg = "";


$sql="select * from tbl_donar_master where donar_id='$donar_idN'";


$result = mysql_query($sql);
 while($row = mysql_fetch_array($result)){
	  extract($row);
	   $first_name=$first_name;
       $last_name=$last_name;
       $donar_email=$donar_email;
       $donar_contact=$donar_contact;
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
  <h1>  Donar Tagging </h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Donar record update</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">
 <!-- Small boxes (Stat box) -->
 <form role="form" action="master_data_conf_delete.php" method="post" enctype="multipart/form-data">
 <div class="box-body">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Donar Record Delete</legend>

      <div class="form-group">
        <div class="row">
             <div class="col-sm-6">
                         <label>First Name</label>
                           <input readonly type="text"  class="form-control" name="txtMemberFirstName" id="txtMemberFirstName" value="<?php echo $first_name; ?>"   />
                          <input type="text" class="form-control" name="txtId" id="txtId" value="<?php echo $donar_idN; ?>" style="display : none;" />
              </div>
              <div class="col-sm-6">
                         <label>Last Name</label>
                         <input readonly type="text" class="form-control" name="txtMemberLastName" id="txtMemberLastName" value="<?php echo $last_name; ?>"/>
              </div>
        </div>
         <div class="row">
             <div class="col-sm-6">
                         <label>Contact No</label>
                          <input readonly type="text" class="form-control" name="txtMemberMobile" id="txtMemberMobile" value="<?php echo $donar_contact; ?>"/>
              </div>
              <div class="col-sm-6">
                         <label>Email</label>
                         <input readonly type="text" class="form-control" name="txtMemberEmail" id="txtMemberEmail" value="<?php echo $donar_email; ?>"/>
              </div>
        </div>
                 <div class="row" style="margin-top : 10px;">
                             <div class="col-sm-12">
                 <div class="box-footer" style="text-align : center;">
      <input type="submit" name="submit" class="btn btn-primary" value="Delete" />
      </div>
      </div>
            </div>
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
