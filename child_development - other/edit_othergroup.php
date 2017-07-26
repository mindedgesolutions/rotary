<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";
if(isset($_GET['pid'])){
$user_id =$_GET['pid'];
$sql = "Select * from tbl_user where user_id = '$user_id'";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	extract($row);	
 }
}


$msg = "";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

if($action == 'edit'){
	
$user_id = $_POST['user_id'];		
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];
$phone_no = $_POST['phone_no'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$newsletter = $_POST['newsletter'];
$group_id = $_POST['group_id'];
$country = $_POST['country'];
$status = '1';

$image = $_FILES['user_image'];
$user_image= basename($_FILES['user_image']['name']);
move_uploaded_file($image['tmp_name'], "../userimage/user/". $user_image);

$sql = "Select * from tbl_user where user_id = '$user_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['user_image'];
}

$sql = "Update tbl_user set first_name ='$first_name',last_name = '$last_name',user_email = '$user_email',user_pass = '$user_pass',phone_no = '$phone_no',address = '$address',
city = '$city',state = '$state',pincode = '$pincode',newsletter = '$newsletter',group_id = '$group_id',user_image = IF('$user_image'='','$pd_img_02','$user_image'),
country = '$country' where user_id = '$user_id'";
echo $sql;
$ans = mysql_query($sql);
if($ans){
 //header('location:othergroup_list.php');
 }
 else{
	$msg = '<div class="alert alert-danger alert-dismissable">
            <b>ALERT!</b>CATAGORY IS NOT CREATED.......</div>';
  }
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
      <h1>Other Group <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Other Group</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="edit_othergroup.php?action=edit" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Other Groups Information</legend>
      <div class="form-group">
       <label>Group</label>
       <?php  ?>
       <select name="group_id" class="form-control">
       <option value="">Select Group</option>
       <?php 
	   $group_exec=mysql_query("select * from tbl_group");
	   while($group_arr=mysql_fetch_array($group_exec)) { 
	   if($group_arr['group_id']== $group_id){
			$c='selected="selected"';
		}
		else{
			$c = "";
		}
	   ?>
       <option value="<?php echo $group_arr['group_id']; ?>" <?php echo $c; ?>><?php echo $group_arr['group_name']; ?></option>
       <?php } ?>
       </select>
      </div> 
      <div class="form-group">
       <label>First Name</label>
       <input class="form-control" type="text" name="first_name" value="<?php echo $first_name; ?>"/>
      </div> 
      <div class="form-group">
      <label>Last Name</label>
	  <input class="form-control" type="text" name="last_name" value="<?php echo $last_name; ?>"/>
      </div>
      <div class="form-group">
      <label>Email ID :</label>
	  <input name="user_email" class="form-control" type="email" value="<?php echo $user_email; ?>"/>
      </div>
      <div class="form-group">
      <label>Password :</label>
	  <input name="user_pass" class="form-control" type="text" value="<?php echo $user_pass; ?>"/>
      </div>
      <div class="form-group">
      <label>Phone :</label>
	  <input name="phone_no" class="form-control" type="text" value="<?php echo $phone_no; ?>" />
      </div>
      <div class="form-group">
      <label>Address :</label>
	  <textarea type="text" name="address" class="form-control"><?php echo $address; ?></textarea>
      </div>
      <div class="form-group">
      <label>Country</label>
      <input type="text" class="form-control" name="country" value="<?php echo $city; ?>">
      </div>
      <div class="form-group">
      <label>State</label>
       <select name="state" class="form-control">
       <option value="">Select State</option>
       <?php 
			$i=0;
			$sql_c="select * from  state";
			$result_c= mysql_query($sql_c);
			while($row_c = mysql_fetch_array($result_c)){			
			
			if($row_c['StateName']== $state){
			$c='selected="selected"';
			} 
			else{
			$c="";
			} 			
	 		if($i%4==0){
   			echo '</tr><td>&nbsp;</td><tr>';
  			} ?>
            <option value="<?php echo $row_c['StateName'];?>" <?php echo $c; ?>><?php echo $row_c['StateName']; ?></option>
            <?php $i++; } ?>
       </select>
      </div>
      <div class="form-group">
      <label>City</label>
      <input type="text" class="form-control" name="city" value="<?php echo $city; ?>">
      </div>
      <div class="form-group">
      <label>Pin Code :</label>
	  <input class="form-control" type="text" name="pincode" value="<?php echo $pincode; ?>"/>
      </div>
      <div class="form-group">
       Sign Up for Newsletter 
      <input type="checkbox" name="newsletter" value="1"<?php if($newsletter==1){ $c ="checked=checked"; } else { $c = ""; } ?> <?php echo $c; ?>/>
      </div>
      </fieldset>
      
      <fieldset>
	  <legend>User Other Details</legend>
      <div class="form-group">
      <label>User Image</label>
      <input type="file" id="exampleInputFile" name="user_image" > <!--File Upload-->
      <img src="../userimage/user/<?php echo $user_image; ?>" height="150" width="150" alt="No Image">
      </div>
      </fieldset>
      </div><!-- /.box-body -->
      <br>
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
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