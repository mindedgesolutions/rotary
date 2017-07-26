<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";
if(isset($_GET['pid'])){
$pid =$_GET['pid'];
$sql = "Select * from tbl_artist_master where artist_id = '$pid'";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	extract($row);	
 }
}
//////////////////////// ADDITION ////////////////////////////////////////////////////////
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

if($action == 'edit'){
$artist_id = $_POST['artist_id'];	
$artist_name = $_POST['artist_name'];
$artist_email = $_POST['artist_email'];
$artist_description = $_POST['artist_description'];
$artist_category = $_POST['artist_category'];
$artist_link = $_POST['artist_link'];
$artist_keywords = $_POST['artist_keywords'];
$artist_editedby = $_SESSION['username'];
$unsubscribe = '0';
$status = 1;

$image = $_FILES['product_image'];
$image_name= basename($_FILES['product_image']['name']);
move_uploaded_file($image['tmp_name'], "../artistimage/artist/". $image_name);

$sql = "Select * from tbl_artist_master where artist_id = '$artist_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['artist_image'];
}
	
$query = "Update tbl_artist_master set artist_name = '$artist_name',artist_email = '$artist_email',artist_description = '$artist_description',
artist_category = '$artist_category',artist_link = '$artist_link',artist_keywords = '$artist_keywords',artist_editedby = '$artist_editedby',
artist_image = IF('$image_name'='','$pd_img_02','$image_name'),status = '$status' where artist_id = '$artist_id'";
$answe = mysql_query($query);
  }
  header('location:artist_list.php');
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
        <li><a href="artist_list.php">Artist List</a></li>
        <li class="active">Edit Artist</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="edit_artist.php?action=edit" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>
      <fieldset>
	  <legend>Artist Information</legend>
      <div class="form-group">
       <label>Artist Name</label>
       <input type="text" class="form-control" placeholder="Enter Artist Name...." name="artist_name" value="<?php echo $artist_name; ?>"/>
      </div>
	  <div class="form-group">
       <label>Artist Email</label>
       <input type="text" class="form-control" placeholder="Enter Artist Keyword...." name="artist_email" value="<?php echo $artist_email; ?>"/>
      </div>      
      <div class="form-group">
       <label>Artist Catagory</label>
       <select name="artist_category" title="Search" class="form-control" id="catagory">
        <?php 
			$i=0;
			$sql_c="select * from  tbl_category";
			$result_c= dbQuery($sql_c);
			while($row_c = dbFetchAssoc($result_c)){			
			
			if($row_c['category_name']== $artist_category){
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
      </div>    
      <div class="form-group">
       <label>Artist Description</label>
       <textarea class="form-control" rows="3" placeholder="Enter Artist Description..." name="artist_description"><?php echo $artist_description; ?></textarea>
      </div>
      <div class="form-group">
      <label>Artist Keyword</label>
      <input type="text" class="form-control" name="artist_keywords" value="<?php echo $artist_keywords; ?>" placeholder="Enter Keyword...."> 
      </div>
      <div class="form-group">
       <label>Artist Link :</label>   
       <input type="text" class="form-control" placeholder="Enter Link...." name="artist_link" value="<?php echo $artist_link; ?>">
      </div>
      </fieldset>

      <fieldset>
	  <legend>Artist Image</legend>
      <div class="form-group">
      <label>Artist Image</label>
      <input type="file" id="exampleInputFile" name="product_image" >
      <img src="../artistimage/artist/<?php echo $artist_image; ?>" height="150" width="150" alt="No Image"><!--File Upload-->
      </div>
      <input type="hidden" name="artist_id" value="<?php echo $artist_id; ?>" />
      </fieldset>
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