<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$getDet = mysql_fetch_array(mysql_query("select * from honor_master where email='".$_SESSION['email']."'"));

$ch_count = mysql_fetch_array(mysql_query("select count(child_id) as childCount from share_tagged_child_details where shared_to_donor='".$getDet['SLN']."'"));
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
<header class="header"> <a href="#" class="logo">
  <!-- Add the class icon to your logo image or logo icon to add the margining -->
 </a>
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
      <h1> Child Profile Card</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Tagged By</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) 
	 <h5 class="page-header">-->
	<b>
		<div class="box-body table-responsive">     
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="20%"><p>Donor</p></td>
					<td width="80%"><p>: <?php echo ucfirst($_SESSION['username']); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>E-mail</p></td>
					<td width="80%"><p>: <?= $getDet['email'] ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>Total Children Donated </p></td>
					<td width="80%"><p>: <?= $ch_count['childCount'] ?></p></td>
				</tr>
			</table>
		</div>
	</b>
	<hr>
        <!-- Donor : <?php //echo ucfirst($_SESSION['username']); ?><br>
		E-mail :  <?php //echo ucfirst($user_email); ?><br>
        District : <?php //echo ucfirst($donar_district); ?><br>
        Club : <?php //echo ucfirst($donar_club); ?></br>
        Total Children Tagged : <?php //echo $count; ?> </h5>-->
     
     <div class="box-body table-responsive">
     
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
	    <td width="5%"><p><b>Sl. No.</b></p></td>
        <td width="10%"><p><b>Sponsored Child</b></p></td>
        <td width="12%"><p><b>Child Name</b></p></td>
	    <td width="10%"><p><b>Date</b> </p></td>
        <td width="11%"><p><b>NGO Partner</b></p></td>
        <td width="12%"><p><b>Donated By</b></p></td>
        <!--<td width="9%"><p>Donor District</p></td>
        <td width="11%"><p>Donor City</p></td>
        <td width="11%"><p>Donor Name</p></td>-->
        <!--<td width="8%"><p>Date</p></td>-->
        <td width="8%"><p><b>Action</b></p></td>
      </tr>
      <?php
	  	$i=1;

      $query_childDet = mysql_query("select * from share_tagged_child_details where shared_to_donor='".$getDet['SLN']."'");
      while ($childDet = mysql_fetch_array($query_childDet)){

        $createDate = mysql_fetch_array(mysql_query("select child_name, child_photo, create_date, name_partner_ngo from tbl_child_profile_card where child_id='".$childDet['child_id']."'"));

        $donorName = mysql_fetch_array(mysql_query("select first_name, last_name from tbl_donar_master where donar_id='".$childDet['shared_by_donor']."'"));
      ?>
      <tr>
      	<td><p><?php echo $i; ?></p></td>

        <td><p><img src="../upload/<?= $createDate['child_photo']; ?>" height="50" width="50" alt="No Image" /></p></td>

        <td><p><?= ucwords($createDate['child_name']) ?></p></td>

		    <td><p><?= $createDate['create_date']; ?></p></td>

        <td><p><?= strtoupper($createDate['name_partner_ngo']); ?></p></td>

        <td><p><?= strtoupper($donorName['first_name']).' '.strtoupper($donorName['last_name']); ?></p></td>

        <td><a href="view_child_progress.php?pid=<?= $childDet['child_id'] ?>"><button class="btn btn-success btn-sm">View</button></a></td>
      </tr>
      <?php
	  $i=$i+1;
		}
	 ?>
    <tr>
    <td height="30" colspan="8">&nbsp;</td>
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