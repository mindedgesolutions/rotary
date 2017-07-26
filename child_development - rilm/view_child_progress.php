<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
if(isset($_GET['pid'])){

$pid = $_GET['pid'];

$sql = "SELECT * FROM tbl_child_profile_card where child_id = '$pid'";
$query = mysql_query($sql);
while($data = mysql_fetch_array($query)){
	extract($data);
  }
}







if(isset($_POST['approve'])){
$child_id = $_POST['child_id'];
$approval = $_POST['approval'];

$sql = "Update tbl_child_profile_card set approval = '$approval' where child_id = '$child_id'";
$result = mysql_query($sql);
header('location:view_child_profile.php?pid='.$child_id);
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
      <h1> Product <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>.
        <li><a href="child_profile.php">Catagory</a></li>
        <li class="active">View Detail Product</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <div class="box-body table-responsive">
      <fieldset>
	  <legend>Child Information</legend>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><label>Child Image</label></td>
            <td><label><img src="../upload/<?php echo $child_photo; ?>" height="150" width="150"></label></td>
          </tr>
          <tr>
            <td height="30"><label>Child Name</label></td>
            <td><label><?php echo $child_name;?></label></td>
          </tr>
          <tr>
            <td width="44%" height="30"><label>Child Gender</label></td>
            <td width="56%"><label><?php echo $child_gender;?></label></td>
          </tr>
          <tr>
            <td width="44%" height="30"><label>Child DOB [00/00/0000]</label></td>
            <td width="56%"><label><?php echo $child_dob;?></label></td>
          </tr>
           <tr>
            <td width="44%" height="30"><label>Child Father Name</label></td>
            <td width="56%"><label><?php echo $child_father_name;?></label></td>
          </tr>
          <tr>
            <td width="44%" height="30"><label>Child Mother Name</label></td>
            <td width="56%"><label><?php echo $child_mother_name;?></label></td>
          </tr>
          <tr>
            <td width="44%" height="30"><label>Child Address</label></td>
            <td width="56%"><label><?php echo $city; ?></label></td>
          </tr>
          </table>
          </fieldset>
          <fieldset>
	  	<legend>NGO Information</legend>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="44%" height="30"><label>NGO Partner</label></td>
            <td width="56%"><label><?php echo $name_partner_ngo;?></label></td>
          </tr>
          <tr>
            <td width="44%" height="30"><label>Name Of Representative</label></td>
            <td width="56%"><label><?php echo $ngo_representative;?></label></td>
          </tr>
          <tr>
            <td width="44%" height="30"><label>NGO Contact</label></td>
            <td width="56%"><label><?php echo $ngo_contact;?></label></td>
          </tr>
       </table>
      </fieldset>
      
      <fieldset>
	  	<legend>Progress Card</legend>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="11%" height="30"><a href="qt1.php?pid=<?php echo $child_id; ?>"><input type="submit" name="submit1" class="btn btn-success btn-sm" value="Quarter 1"></a></td>
            <td width="11%" height="30"><a href="qt2.php?pid=<?php echo $child_id; ?>"><input type="submit" name="submit2" class="btn btn-success btn-sm" value="Quarter 2"></a></td>
            <td width="11%" height="30"><a href="qt3.php?pid=<?php echo $child_id; ?>"><input type="submit" name="submit3" class="btn btn-success btn-sm" value="Quarter 3"></a></td>
            <td width="67%" height="30"><a href="qt4.php?pid=<?php echo $child_id; ?>"><input type="submit" name="submit4" class="btn btn-success btn-sm" value="Quarter 4"></a></td>
          </tr>
       </table>
      </fieldset>
      
      
      
      </div>
      <!-- /.box-body -->
      <br>
	  <br>
      <div class="box-footer">
      <a href="child_profile.php"><button class="btn btn-success btn-sm">Back</button></a>
        <!--&nbsp;
      <a href="edit_child_profile.php?pid=<?php //echo $child_id; ?>"><button class="btn btn-success btn-sm">Modify</button></a>-->
      </div>
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