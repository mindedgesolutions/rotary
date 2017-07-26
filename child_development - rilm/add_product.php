<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
//////////////////////// ADDITION ////////////////////////////////////////////////////////
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

if($action == 'add'){

	if($_POST['latest_album']=='latest_album'){
	$general_album=0;
	}
	elseif($_POST['comingsoon_album']=='comingsoon_album'){
	$general_album=0;
	}
	else{
	$general_album=1;
	}
	
    $artist_name=implode(",",$_REQUEST['artist_name']);
	$category_name = $_POST['category_name'];
	$album_name = $_POST['album_name'];
	$artist_name = $artist_name;
	$album_description = $_POST['album_description'];
	$album_dateofrelease = $_POST['album_dateofrelease'];
	$album_keywords = $_POST['album_keywords'];
	$album_price = $_POST['album_price'];
	$cupling_no = $_POST['cupling_no'];
	$comingsoon_album = $_POST['comingsoon_album'];
	$latest_album = $_POST['latest_album'];
	$general_album = $general_album;
	$album_stockstatus = $_POST['album_stockstatus'];
	
	$album_song_count = $_POST['album_song_count'];
	$album_quantity = $_POST['album_quantity'];
	$best_sellers = $_POST['best_sellers'];
	$album_createdby = $_SESSION['username'];
	$status = 1;
	
	$image = $_FILES['product_image'];
	$image_name= basename($_FILES['product_image']['name']);
	move_uploaded_file($image['tmp_name'], "../albumimage/album/". $image_name);
	
	$query = "Insert into tbl_album_master values	(NULL,'$category_name','$album_name','$artist_name','$album_description','$album_dateofrelease','$album_keywords','$album_price','$cupling_no','$comingsoon_album','$latest_album',
	 '$general_album','0','$album_stockstatus','$album_quantity','','$album_createdby','','$album_createdby','$image_name','$album_song_count','$best_sellers','','$status')";
	$answe = mysql_query($query);

	$sql = "Select * from tbl_album_master where album_name = '$album_name'";
	$res = mysql_query($sql);
	while($data = mysql_fetch_array($res)){
		extract($data);
	}
  }
   header('location:album_list.php');
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
      <h1> Survey Data <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="product_list.php">Survey Data List</a></li>
        <li class="active">Add Survey Data</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="add_product.php?action=add" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>
      <fieldset>
	  <legend>Survey Data Information</legend>
      <div class="form-group">
       <label>Category</label>
       <table width="100%">
          <tbody>
            <tr>
              <td width="134" align="center">Children of Convicts</td>
              <td width="182" align="center">Children of Sex Worker</td>
              <td width="148" align="center">Children of Migrant Worker</td>
              <td width="96" align="center">Child labours</td>
              <td width="138" align="center">Vagrant/Homeless Children</td>
              <td width="167" align="center">Children at Night Shelter</td>
              <td width="108" align="center">Street Children</td>
              <td width="55" align="center">Others</td>
            </tr>
            <tr>
              <td align="center"><input type="checkbox" class="form-control" name="r1" value="Children of Convicts"/></td>
              <td align="center"><input type="checkbox" class="form-control" name="r2" value="Children of Sex Worker"/></td>
              <td align="center"><input type="checkbox" class="form-control" name="r3" value="Children of Migrant Worker"/></td>
              <td align="center"><input type="checkbox" class="form-control" name="r4" value="Child labours"/></td>
              <td align="center"><input type="checkbox" class="form-control" name="r5" value="Vagrant/Homeless Children"/></td>
              <td align="center"><input type="checkbox" class="form-control" name="r6" value="Children at Night Shelter"/></td>
              <td align="center"><input type="checkbox" class="form-control" name="r7" value="Street Children"/></td>
              <td align="center"><input type="checkbox" class="form-control" name="r8" value="Others"/></td>
            </tr>
          </tbody>
        </table>

       
      </div>
	  <div class="form-group">
       <label>Survey Done by Rotary Club of</label>
       <input type="text" class="form-control" placeholder="Survey Done by Rotary Club of" name="surveyor_name"/>
      </div>      
      <div class="form-group">
       <label>Survey Done by Partner Organisation [Name]</label>
       <input type="text" class="form-control" placeholder="Survey Done by Partner Organisation [Name]" name="surveyor_partner_name" />
      </div>
      <div class="form-group">
      <label>Location Surveyed [Address]</label>
      <input type="text" class="form-control" name="place" value="" placeholder="Location Surveyed [Address]"> 
      </div>
      <div class="form-group">
       <label>Surveyor Contact No</label>   
       <input type="text" class="form-control" placeholder="Surveyor Contact No" name="contact">
      </div>
      <div class="form-group">
       <label>Survey Date</label>   
       <input type="text" class="form-control" placeholder="Survey Date" name="date_survey">
      </div>
      </fieldset>

      <fieldset>
	  <legend>Child Details</legend>
      <div class="form-group">
       
      </div>

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