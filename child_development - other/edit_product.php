<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";
if(isset($_GET['pid'])){
$pid =$_GET['pid'];
$sql = "Select * from tbl_album_master where album_id = '$pid'";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	$artists=explode(",",$row['artist_name']);
	extract($row);	
 }
}
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

if($action=="edit"){
	
	if($_POST['latest_album']=='latest_album'){
	$general_album=0;
	}elseif($_POST['comingsoon_album']=='comingsoon_album'){
	$general_album=0;
	}else{
	$general_album=1;
	}
	$artist_name=implode(",",$_POST['artist_name']);
	
	$album_id = $_POST['album_id'];
	$category_name = $_POST['category_name'];
	$album_name = $_POST['album_name'];
	$artist_name = $artist_name;
	$album_description = $_POST['album_description'];
	$album_keywords = $_POST['album_keywords'];
	$album_price = $_POST['album_price'];
	$cupling_no = $_POST['cupling_no'];
	$comingsoon_album = $_POST['comingsoon_album'];
	$latest_album = $_POST['latest_album'];
	$general_album = $general_album;
	$album_status = $_POST['album_status'];
	$album_stockstatus = $_POST['album_stockstatus'];
	$album_song_count = $_POST['album_song_count'];
	$album_quantity = $_POST['album_quantity'];
	$best_sellers = $_POST['best_sellers'];
	$album_editedby = $_SESSION['username'];
	$album_editdate = date('Y-m-d');
	
	$image = $_FILES['product_image'];
	$image_name= basename($_FILES['product_image']['name']);
	move_uploaded_file($image['tmp_name'], "../albumimage/album/". $image_name);
	
	$sql = "Select * from tbl_album_master where album_id = '$album_id'";
	$result = mysql_query($sql);
	while($data = mysql_fetch_array($result)){
	$pd_img_02 = $data['album_image'];
	}
	$query = "Update tbl_album_master set category_name = '$category_name',album_name = '$album_name',artist_name = '$artist_name',album_description = '$album_description',album_dateofrelease = '$album_dateofrelease',album_keywords = '$album_keywords',album_price = '$album_price',cupling_no = '$cupling_no',comingsoon_album = '$comingsoon_album',latest_album = '$latest_album',general_album = '$general_album',album_stockstatus = '$album_stockstatus',album_quantity = '$album_quantity',album_editdate = '$album_editdate',album_editedby = '$album_editedby',album_image = IF('$image_name'='','$pd_img_02','$image_name'),album_song_count = '$album_song_count',best_sellers = '$best_sellers' where album_id = '$album_id'";
	echo $query;
	$answe = mysql_query($query); 
	
	
/*	########################### FOR COMINGSOON ##############################
	if($_POST['comingsoon_album']=='comingsoon_album'){
		
	$album_id = $_POST['album_id'];			  
	$category_name = $_POST['category_name'];
	$album_name = $_POST['album_name'];
	$artist_name = $artist_name;
	$album_description = $_POST['album_description'];
	$album_dateofrelease = $_POST['album_dateofrelease'];
	$album_keywords = $_POST['album_keywords'];
	$album_price = $_POST['album_price'];
	$cupling_no = $_POST['cupling_no'];
	$album_type = 'comingsoon_album';
	$album_image = $image;
	$album_song_count = $_POST['album_song_count'];	
	
	$query = "Update  tbl_comingsoon set category_name ='$category_name',album_name ='$album_name',artist_name ='$artist_name',
	album_description = '$album_description',album_dateofrelease = '$album_dateofrelease',album_keywords = '$album_keywords',album_type = '$album_type',album_price = '$album_price',
	cupling_no = '$cupling_no',album_image = IF('$image_name'='','$pd_img_02','$image_name') ,album_song_count = '$album_song_count' where album_id = '$album_id'";
	$answe = mysql_query($query);
	}
	
	########################### FOR LATEST ALBUM ##############################
	
	if($_POST['latest_album']=='latest_album'){
		
	$album_id = $_POST['album_id'];	
	$album_id = $album_id;
	$category_name = $_POST['category_name'];
	$album_name = $_POST['album_name'];
	$artist_name = $artist_name;
	$album_description = $_POST['album_description'];
	$album_dateofrelease = $_POST['album_dateofrelease'];
	$album_keywords = $_POST['album_keywords'];
	$album_price = $_POST['album_price'];
	$cupling_no = $_POST['cupling_no'];
	$album_type = 'latest_album';
	$album_image = $image;
	$album_song_count = $_POST['album_song_count'];	
	
	$query = "Update tbl_latestalbum set category_name ='$category_name',album_name ='$album_name',artist_name ='$artist_name',
	album_description = '$album_description',album_dateofrelease = '$album_dateofrelease',album_keywords = '$album_keywords',album_type = '$album_type',album_price = '$album_price',
	cupling_no = '$cupling_no',album_image = IF('$image_name'='','$pd_img_02','$image_name') ,album_song_count = '$album_song_count' where album_id = '$album_id'";
	$answe = mysql_query($query);
	}
*/   }
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
url: "ajax_sub.php",
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
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="product_list.php">Product List</a></li>
        <li class="active">Edit Album</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="edit_product.php?action=edit" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>
      <fieldset>
	  <legend>Album Information</legend>
      <div class="form-group">
       <label>Album Name</label>
       <input type="text" class="form-control" placeholder="Enter Product Name...." name="album_name" value="<?php echo $album_name?>"/>
      </div>
	  <div class="form-group">
       <label>Album Keyword</label>
       <input type="text" class="form-control" placeholder="Enter Product Keyword...." name="album_keywords" value="<?php echo $album_keywords;?>"/>
      </div>      
      <div class="form-group">
       <label>Aritist Catagory</label>
       <select name="artist_name[]" title="Search" class="form-control" id="catagory" multiple="multiple">
        <?php
	  $sql = mysql_query("SELECT * from tbl_artist_master");
	  while($data = mysql_fetch_array($sql)){
	  ?> 
      <option value="<?php echo $data['artist_name'];?>" <?php if(in_array($data['artist_name'],$artists)) {?> selected="selected" <?php } ?>>
	  <?php echo stripslashes($data['artist_name'])?>
      </option>
	  <?php } ?>
      </select>
      </div>
      <div class="form-group">
       <label>Album/Song Description</label>
       <textarea class="form-control" rows="3" placeholder="Enter Product Description..." name="album_description"><?php echo $album_description;?></textarea>
      </div>
      <div class="form-group">
      <label>Album Release Date</label>
      <input type="text" class="form-control" name="album_dateofrelease" value="<?php echo $album_dateofrelease; ?>" placeholder="Enter Number of Songs...."> 
      </div>
      <div class="form-group">
       <label>Album Song Count :</label>   
       <input type="text" class="form-control" placeholder="Enter Order No...." name="album_song_count" value="<?php echo $album_song_count ;?>">
      </div>
      </fieldset>

      <fieldset>
	  <legend>Product Details</legend>
      <div class="form-group">
       <label>Album Quantity</label>
       <input type="text" class="form-control" placeholder="Enter Product Quantity...." name="album_quantity" value="<?php echo $album_quantity;?>"/>
      </div>
      <div class="form-group">
       <label>Album Catagory</label>
       <select name="category_name" title="Search" class="form-control" id="catagory">
        <option value="" selected>Select...</option>
        <?php 
			$i=0;
			$sql_c="select * from  tbl_category";
			$result_c= dbQuery($sql_c);
			while($row_c = dbFetchAssoc($result_c)){			
			
			if($row_c['category_name']== $category_name){
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
        
      <!-- END HERE IS TO BE CHANGE BE CODING.....................-->
      <div class="form-group">
       <label>Album Status:</label>
        <?php
	   $sql = "Select `comingsoon_album` from tbl_album_master where album_id = '$pid'";
	   $res = mysql_query($sql);
	   while($data = mysql_fetch_array($res)){
	   if($data['comingsoon_album']=="comingsoon_album"){
		 $c = "checked=checked";
		}
		else{
		 $c="";
		}
	   }
	   ?> 
        <?php
	   $sql = "Select `latest_album` from tbl_album_master where album_id = '$pid'";
	   $res = mysql_query($sql);
	   while($data = mysql_fetch_array($res)){
	   if($data['latest_album']=="latest_album"){
		 $d = "checked=checked";
		}
		else{
		 $d="";
		}
	   }
	   ?>       
       <input type="checkbox" class="form-control" name="comingsoon_album" value="comingsoon_album" <?php echo $c; ?>>&nbsp;&nbsp;Comming Soon&nbsp;&nbsp;
       <input type="checkbox" class="form-control" name="latest_album" value="latest_album" <?php echo $d; ?>>&nbsp;&nbsp;Latest Album
      </div>
      <div class="form-group">
       <label>Album Best Seller:</label> 
       <?php
	   $sql = "Select `best_sellers` from tbl_album_master where album_id = '$pid'";
	   $res = mysql_query($sql);
	   while($data = mysql_fetch_array($res)){
	   if($data['best_sellers']=="best_seller"){
		 $c = "checked=checked";
		}
		else{
		 $c="";
		}
	   }
	   ?>   
       <input type="checkbox" class="form-control" name="best_sellers" value="best_seller" <?php echo $c; ?> >
      </div>
      <div class="form-group">
       <label>Album Stock :</label>
       <?php
	   $d = "";
	   $sql = "Select `album_stockstatus` from tbl_album_master where album_id = '$pid'";
	   $res = mysql_query($sql);
	   while($data = mysql_fetch_array($res)){
	   if($data['album_stockstatus']=="in_stock"){
		 $c = "checked=checked";
		}
		elseif($data['album_stockstatus']=="out_of_stock"){
		 $d = "checked=checked";	
		}
		else{
		 $c="";
		}
	   }
	   ?> 
       <input type="checkbox" class="form-control" name="album_stockstatus" value="in_stock" <?php echo $c;?>>&nbsp;&nbsp;In Stock&nbsp;&nbsp;
       <input type="checkbox" class="form-control" name="album_stockstatus" value="out_of_stock" <?php echo $d;?>>&nbsp;&nbsp;Out of Stock
      </div>
         
      <div class="form-group">
       <label>Album Cupling No :</label>   
       <input type="text" class="form-control" placeholder="Enter Order No...." name="cupling_no" value="<?php echo $cupling_no; ?>">
      </div>
      <div class="form-group">
      <label>Album Cover Image</label>
      <input type="file" id="exampleInputFile" name="product_image" value="<?php echo $album_image; ?>">
      <img src="../albumimage/album/<?php echo $album_image; ?>" height="150" width="150" alt="No Image"> <!--File Upload-->
      </div>
      </fieldset>
      
      
      <fieldset>
	  <legend>Album Pricing</legend>
       <div class="form-group">
       <label>Album Selling Price</label>
       <input type="text" class="form-control" placeholder="Enter Product Selling Price..." name="album_price" value="<?php echo $album_price; ?>"/>
       </div>
      </fieldset>
      <input type="hidden" name="album_id" value="<?php echo $pid; ?>">
      
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
<!-- AdminLTE App-->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
</body>
</html>