<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

if(isset($_GET['pid'])){
$pid = $_GET['pid'];	
$sql = "Select * from tbl_events where event_id = '$pid'";
$ans = mysql_query($sql);
while($row = mysql_fetch_array($ans)){
	extract($row);
 }
}


$msg = "";
if(isset($_POST['submit'])){

$event_id = $_POST['event_id'];
$event_description = $_POST['event_description'];
$image = $_FILES['event_image'];
$image_name= basename($_FILES['event_image']['name']);
move_uploaded_file($image['tmp_name'], "../eventimage/event/". $image_name);

$sql = "Insert into tbl_events_image values(NULL,'$event_id','$image_name','$event_description')";
$ans = mysql_query($sql);
if($ans){
 header("location:more_event.php?pid=$event_id");
 }
 else{
	$msg = '<div class="alert alert-danger alert-dismissable">
            <b>ALERT!</b>EVENT IS NOT CREATED.......</div>';
 }
}
if(isset($_REQUEST['del'])){
	
$sql=mysql_query("DELETE FROM tbl_events_image WHERE `image_id`='".$_REQUEST['del']."'");
$event_idd=$_REQUEST['event'];			
  	header("location:more_event.php?pid=$event_idd"); 
	exit();
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
      <h1> Event <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Event</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="more_event.php" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>																						
      <div class="form-group">
       <label>Event Name : </label>
       &nbsp;&nbsp;&nbsp;<strong><?php echo $event_name; ?></strong>
      </div> 
      <div class="form-group">
       <label>Event Description : </label>
       <textarea class="form-control" rows="3" placeholder="Enter Event Description..." name="event_description"></textarea>
      </div>
      <div class="form-group">
       <label>Event Image : </label>
       <input type="file" id="exampleInputFile" name="event_image" >
      </div> 
      <input type="hidden" name="event_id" value="<?php echo $event_id; ?>" >
     </div><!-- /.box-body -->
      <div class="box-footer">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
      </div>
     </form>
	 <hr/ >
     <table width="100%" border="0" cellpadding="0">
      <tr>
        <td width="15%">Image</td>
        <td width="29%">Event Name </td>
        <td width="41%">Description</td>
        <td width="15%">Action</td>
      </tr>
      <?php
      	if(isset($_GET['pid'])){
        $pid = $_GET['pid'];	
        $sql = "Select * from tbl_events_image where event_id = '$pid'";
        $ans = mysql_query($sql);
        while($row = mysql_fetch_array($ans)){
            extract($row);
	  ?>
      <tr>
        <td height="91"><img src="../eventimage/event/<?php echo $event_image; ?>" height="80" width="80"></td>
        <td><?php echo $event_name; ?></td>
        <td><?php echo $image_description; ?></td>
        <td><a href="more_event.php?del=<?php echo $image_id; ?>&amp;event=<?php echo $event_id;?>" class="ask">
        <button class="btn btn-danger btn-sm">Delete</button></a></td>
      </tr>
     <?php
		}
	  }
	 ?> 
    </table>

     
     
     
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
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	

</script>

</body>
</html>