<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";
if(isset($_GET['pid'])){
$pid = $_GET['pid'];
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
  
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <div class="box-body table-responsive">
      <fieldset>
	  <?php 
		$sql = "select * from tbl_child_profile_card where child_id='$pid'";
		$result = mysql_query($sql);
		while($row=mysql_fetch_array($result)){
		?>
		
        <legend>Child Progress Report Card (Monthly) : <b><i><?php echo $row['child_name']; } ?></b></i> </legend>
        
         <table width="100%" border="1">
          <tr>
            <td width="5%" align="center"><strong>Month</strong></td>
            <td width="5%" align="center"><strong>Year</strong></td>
            <td width="5%" align="center"><strong>Class</strong></td>
            <td width="5%" align="center"><strong>Attendance</strong></td>
			<td width="15%" align="center"><strong>Local Language Grade</strong></td>
            <td width="15%" align="center"><strong>English Grade</strong></td>
			<td width="15%" align="center"><strong>Math Grade</strong></td>
            <td width="15%" align="center"><strong>Environmental Studies Grade</strong></td>
			<td width="15%" align="center"><strong>Holistic Development Grade</strong></td>
          </tr>
			<?php
				$sql1 = "select monname,year,edustatus,noofdayattend,llgrad,enggrad,mathgrad,envstudgrad,holdevgrad 
				from tbl_Asha_Kirn_Children_Marks_Dtl where stud_id='$pid'";
				$result1 = mysql_query($sql1);
				while($fetch1 = mysql_fetch_array($result1)){
					extract($fetch1);
			?>

          <tr>
			<td width="5%" align="center"><strong><?Php echo $monname; ?></strong></td>
            <td width="5%" align="center"><strong><?Php echo $year; ?></strong></td>
            <td width="5%" align="center"><strong><?Php echo $edustatus; ?></strong></td>
            <td width="5%" align="center"><strong><?Php echo $noofdayattend; ?></strong></td>
			<td width="15%" align="center"><strong><?Php echo $llgrad; ?></strong></td>
            <td width="15%" align="center"><strong><?Php echo $enggrad; ?></strong></td>
			<td width="15%" align="center"><strong><?Php echo $mathgrad; ?></strong></td>
            <td width="15%" align="center"><strong><?Php echo $envstudgrad; ?></strong></td>
			<td width="15%" align="center"><strong><?Php echo $holdevgrad; ?></strong></td>
          </tr>
		  <?php
				}
			?>
          </table>
          </fieldset>
          </div>
      <!-- /.box-body -->
      <br>
    <br>
      <div class="box-footer">
      <a href="view_child_progress.php?pid=<?php echo $pid; ?>"><button class="btn btn-success btn-sm">Back</button></a>
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