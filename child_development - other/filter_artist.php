<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$child = '';
$rowsPerPage = 30;

$filter_artist = $_GET['catagory']; 

$sql = "SELECT * FROM tbl_artist_master where artist_name = '$filter_artist'";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);

if(isset($_GET['del'])){
$del = $_GET['del'];	
// delete country
$sql = "delete from tbl_artist_master where artist_id = '$del'";	
$result = mysql_query($sql);

header('Location:artist_list.php');
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
<header class="header"> <a href="index.html" class="logo">
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
        <li class="active">Product</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
    	
        <div style="float:right; padding-right:80px;">
        <form action="filter_artist.php" method="get" enctype="multipart/form-data" name="search_product">
        <label>
            Catagory: 
            <select name="catagory" title="Search">
            <option value="" selected>Select...</option>
            <?php
			$sql = "SELECT DISTINCT `artist_name` FROM `tbl_artist_master`";
			$query = mysql_query($sql);
			while($data = mysql_fetch_array($query)){
			?>
            <option value="<?php echo $data['artist_name']; ?>"><?php echo $data['artist_name']; ?></option>
            <?php
			}
			?>
            </select>
        </label>
        <input type="submit" name="submit" class="btn btn-success btn-sm" value="Filter" />
        </form>
    	</div>
        
	 <h4 class="page-header">
        Artist Of Asha Audio.
     </h4>
     <div class="box-body table-responsive">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%"><p>Artist Image</p></td>
        <td width="18%"><p>Artist Name</p></td>
        <td width="26%"><p>Artist Email</p></td>
        <td width="13%"><p>Artist Catagory</p></td>
        <td width="16%"><p>Artist Keyword</p></td>
        <td width="17%"><p>Action</p></td> 
      </tr>
      <?php
	  	while($row_product = mysql_fetch_array($result)){
	  	extract($row_product);
	  ?>
      	<td><p><img src="../artistimage/artist/<?php echo $artist_image; ?>" height="50" width="50" alt="no image"/></p></td>
        <td><p><?php echo $artist_name; ?></p></td>
        <td><p><?php echo $artist_email; ?></p></td>
        <td><p><?php echo $artist_category; ?></p></td>
        <td><p><?php echo $artist_keywords; ?></p></td>
        <td>
        <p>
        <a href="view_artist.php?pid=<?php echo $artist_id; ?>"><button class="btn btn-success btn-sm">View</button></a>
        &nbsp;
        <a href="edit_artist.php?pid=<?php echo $artist_id; ?>"><button class="btn btn-success btn-sm">Edit</button></a>
        &nbsp;
        <a href="artist_list.php?del=<?php echo $artist_id; ?>" class="ask"><button class="btn btn-danger btn-sm">Delete</button></a>
        </p>
        </td>
      </tr>
      <?php
	}// row_country end
	?>
    <tr>
    <td height="30" colspan="8">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="8"><a href="add_artist.php"><button class="btn btn-success">Add Artist</button></a></td>
    </tr>
   </table> 
   </div>
   <div class="box-footer clearfix">
     <ul class="pagination pagination-sm no-margin pull-right">
     <?php echo $pagingLink; ?>
     </ul>
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
<!-- Jquery Confirmation -->
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

</body>
</html>