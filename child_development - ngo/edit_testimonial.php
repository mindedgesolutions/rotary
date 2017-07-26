<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";

if(isset($_GET['test_id'])){
$test_id = $_GET['test_id'];	
$sql = "Select * from tbl_testimonial where test_id = '$test_id'";
$ans = mysql_query($sql);
while($row = mysql_fetch_array($ans)){
	extract($row);
 }
}

if(isset($_POST['submit'])){

$test_id = $_POST['test_id'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_description = $_POST['user_description'];
$post_date = date('d-m-Y');
$post_time = date("G:i A");
$status = $_POST['status'];

$image = $_FILES['user_image'];
$image_name= basename($_FILES['user_image']['name']);
move_uploaded_file($image['tmp_name'], "../userimage/user/". $image_name);

$sql = "Select * from tbl_testimonial where test_id = '$test_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['user_image'];
}


$sql = "Update tbl_testimonial set user_image = IF('$image_name'='','$pd_img_02','$image_name'), user_name = '$user_name', user_email = '$user_email',
user_description = '$user_description', post_date = '$post_date', post_time = '$post_time', approval_keywords = '$status' where test_id = '$test_id'";

$ans = mysql_query($sql);
if($ans){
 header('location:testimonial_list.php');
 }
 else{
	$msg = '<div class="alert alert-danger alert-dismissable">
            <b>ALERT!</b>TESTIMONIAL IS NOT EDITED.......</div>';
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
        <li><a href="testimonial_list.php">Testimonial List</a></li>
        <li class="active">Edit Testimonial</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="edit_testimonial.php" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>																						
      <div class="form-group">
       <label>User Name</label>
       <input type="text" class="form-control" placeholder="Enter User/Post Name...." name="user_name" required="required" value="<?php echo $user_name; ?>"/>
      </div> 
      <div class="form-group">
       <label>User Email</label>
       <input type="text" class="form-control" placeholder="Enter User Email...." name="user_email" required="required" value="<?php echo $user_email; ?>"/>
      </div> 
      <div class="form-group">
       <label>Description</label>
       <textarea class="form-control" rows="3" placeholder="Enter Description..." name="user_description" required="required"> <?php echo $user_description; ?></textarea>
      </div>
      <div class="form-group">
       <label>Approval</label>
       <?php
	   $d = "";
	   $c = "";
	   $sql = "Select `approval_keywords` from tbl_testimonial where test_id = '$test_id'";
	   $res = mysql_query($sql);
	   while($data = mysql_fetch_array($res)){
	   if($data['approval_keywords']=="Approve"){
		 $c = "checked=checked";
		}
		elseif($data['approval_keywords']=="Unapprove"){
		 $d = "checked=checked";	
		}
		else{
		 $c="";
		}
	   }
	   ?> 
       <input type="radio" class="form-control" name="status" value="Approve" <?php echo $c;?>>&nbsp;&nbsp;Approve&nbsp;&nbsp;
       <input type="radio" class="form-control" name="status" value="Unapprove" <?php echo $d;?>>&nbsp;&nbsp;Unapprove
      </div>
      <div class="form-group">
       <label>User Image</label>
       <input type="file" id="exampleInputFile" name="user_image" >
       <img src = "../userimage/user/<?php echo $user_image;?>" height="120" width="120" alt="No Image">
      </div> 
     </div><!-- /.box-body -->
      <div class="box-footer">
      <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
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