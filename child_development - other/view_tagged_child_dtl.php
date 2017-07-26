<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$user_email = $_SESSION['email'];
//donar_id = '$donar_id' AND 
$child = '';
$rowsPerPage = 1000;
$donor_id = $_GET['donorid'];
//$sql = "Select * from tbl_donar_master where donar_email = '$user_email'";
//$sql = "Select * from tbl_donar_master where donar_email = '$user_email' ORDER BY donar_id limit 1";
$sql = "Select * from tbl_donar_master where donar_id = '$donor_id' ORDER BY donar_id limit 1";

$query = mysql_query($sql);
while($data = mysql_fetch_array($query)){
	extract($data);
}
//$sql3 = "SELECT * FROM  tbl_child_selected_tagging WHERE donar_id = '$donar_id'";
$sql3 = "SELECT * FROM  tbl_child_selected_tagging WHERE donar_id = '$donor_id'";
$result3     = dbQuery(getPagingQuery($sql3, $rowsPerPage));
$count = mysql_num_rows($result3);
$pagingLink = getPagingLink($sql3, $rowsPerPage);


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

<div class="wrapper row-offcanvas row-offcanvas-left">
  
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Tagged Child Profile</h1>
      
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
	 <h5 class="page-header">
		<div class="box-body table-responsive">     
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="20%"><p>Donor</p></td>
					<td width="80%"><p>: <?php echo ucfirst($first_name. ' ' .$last_name); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>E-mail</p></td>
					<td width="80%"><p>: <?php echo ucfirst($donar_email); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>District</p></td>
					<td width="80%"><p>: <?php echo ucfirst($donar_district); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>Club</p></td>
					<td width="80%"><p>: <?php echo ucfirst($donar_club); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>Total Children Tagged </p></td>
					<td width="80%"><p>: <?php echo $count; ?></p></td>
				</tr>
			</table>
		</div>
     </h5>
     <div class="box-body table-responsive">
     
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%"><p><b>Sponsored Child</b></p></td>
        <td width="12%"><p><b>Child Name</b></p></td>
		<td width="10%"><p><b>Date</b> </p></td>
        <td width="11%"><p><b>NGO Partner</b></p></td>
        <td width="8%"><p><b>Action</b></p></td>
      </tr>
      <?php
	  	while($row_catagory = mysql_fetch_array($result3)){
	  	extract($row_catagory);
		
		$sql = "SELECT * FROM tbl_child_profile_card where child_id = '$child_id'";
		$query = mysql_query($sql);
		while($data = mysql_fetch_array($query)){
			extract($data);
		  }

		$sql1 = "SELECT * FROM  tbl_donar_master WHERE donar_id = '$donor_id'";
		$resu = mysql_query($sql1);
		while($ans = mysql_fetch_array($resu)){
			extract($ans);
	  ?>
      	
        <td><p><img src="../upload/<?php echo $child_photo; ?>" height="50" width="50" alt="no image"/></p></td>
        <td><p><?php echo ucfirst($child_name); ?></p></td>
		<td><p><?php echo ucfirst($create_date); ?></p></td>
        <td><p><?php echo ucfirst($name_partner_ngo); ?></p></td>
        <!--<td><p><?php echo ucfirst($donar_club); ?></p></td>
        <td width="12%"><p><?php echo ucfirst($donar_district); ?></p></td>
        <td width="9%"><p><?php echo ucfirst($donar_city); ?></p></td>
        <td width="11%"><p><?php echo $first_name . $last_name; ?></p></td>-->
        <!--<td><p><?php echo $date_of; ?></p></td>-->
        <td><a href="view_child_progress_new.php?pid=<?php echo $child_id; ?>&did=<?php echo $donor_id; ?>"><button class="btn btn-success btn-sm">View</button></a></td>
      </tr>
      <?php
		}
	}// row_country end
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
<!-- <script src="js/AdminLTE/app.js" type="text/javascript"></script> -->
<!-- Jquery Confirmation -->
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	/*
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	*/

</script>

</body>
</html>