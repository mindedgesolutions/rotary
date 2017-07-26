<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
if(isset($_GET['pid'])){
$pid =$_GET['pid'];
$sql = "Select * from tbl_composer_master where composer_id = '$pid'";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	extract($row);	
 }
}
//////////////////////// ADDITION ////////////////////////////////////////////////////////
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

if($action == 'edit'){
$composer_id = $_POST['composer_id'];	
$composer_name = $_POST['composer_name'];
$composer_description = $_POST['composer_description'];
$composer_category = $_POST['composer_category'];
$composer_keywords = $_POST['composer_keywords'];
$composer_editedby = $_SESSION['username'];
$status = 1;

$image = $_FILES['product_image'];
$image_name= basename($_FILES['product_image']['name']);
move_uploaded_file($image['tmp_name'], "../composerimage/composer/". $image_name);

$sql = "Select * from tbl_composer_master where composer_id = '$composer_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['composer_image'];
}

	
$query = "Update tbl_composer_master set composer_name = '$composer_name',composer_description = '$composer_description',composer_category = '$composer_category',
composer_keywords = '$composer_keywords',composer_image = IF('$image_name'='','$pd_img_02','$image_name'),composer_editedby = '$composer_editedby',status = '$status' where composer_id = '$composer_id'";
$answe = mysql_query($query);
  }
  header('location:composer_list.php');
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#catagory").change(function()
{
var data=$(this).val();
var dataString = 'data='+ data;

$.ajax
({
type: "POST",
url: "ajax_sub_cat.php",
data: dataString,
cache: false,
success: function(html)
{
$("#sub_cat").html(html);
} 
});

});
});
</script>
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="composer_list.php">Composer List</a></li>
        <li class="active">Edit Composer</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="edit_composer.php?action=edit" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>
      <fieldset>
	  <legend>Composer Information</legend>
      <div class="form-group">
       <label>Composer Name</label>
       <input type="text" class="form-control" placeholder="Enter Composer Name...." name="composer_name" value="<?php echo $composer_name; ?>"/>
      </div>    
      <div class="form-group">
       <label>Composer Catagory</label>
       <select name="composer_category" title="Search" class="form-control" id="catagory">
        <option value="" selected>Select...</option>
       <?php 
			$i=0;
			$sql_c="select * from  tbl_category";
			$result_c= dbQuery($sql_c);
			while($row_c = dbFetchAssoc($result_c)){			
			
			if($row_c['category_name']== $composer_category){
			$c='selected="selected"';
			} 
			else{
			$c="";
			} 			
	 		if($i%4==0){
   			echo '</tr><td>&nbsp;</td><tr>';
  			} ?>
            <option value="<?php echo $row_c['category_name'];?>" <?php echo $c; ?>><?php echo $row_c['category_name']; ?></option>
            <?php $i++; } ?>
      </select>
      </select>
      </div>    
      <div class="form-group">
       <label>Composer Description</label>
       <textarea class="form-control" rows="3" placeholder="Enter Composer Description..." name="composer_description"><?php echo $composer_description; ?></textarea>
      </div>
      <div class="form-group">
      <label>Composer Keyword</label>
      <input type="text" class="form-control" name="composer_keywords" value="<?php echo $composer_keywords; ?>" placeholder="Enter Keyword...."> 
      </div>
      </fieldset>

      <fieldset>
	  <legend>Composer Image</legend>
      <div class="form-group">
      <label>Composer Image</label>
      <input type="file" id="exampleInputFile" name="product_image" >
      <img src="../composerimage/composer/<?php echo $composer_image; ?>" height="150" width="150" alt="No Image"> <!--File Upload-->
      </div>
      </fieldset>
      <input type="hidden" name="composer_id" value="<?php echo $composer_id; ?>" />
      </div>
      <!-- /.box-body -->
      <br>
	  <br>
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