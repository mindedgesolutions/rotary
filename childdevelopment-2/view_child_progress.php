<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$msg = "";
if(isset($_GET['pid'])){

//$pid = base64_decode($_GET['pid']);
$pid = $_GET['pid'];

$sql = "SELECT * FROM tbl_child_profile_card where child_id = '$pid'";
$query = mysql_query($sql);
while($data = mysql_fetch_array($query)){
  extract($data);
  }
}

if(isset($_POST['approve'])){
$child_id = $_POST['child_id'];
$approval = $_POST['approval'];

$sql = "Update tbl_child_profile_card set approval = '$approval' where child_id = '$child_id'";
$result = mysql_query($sql);
header('location:view_child_profile.php?pid='.$child_id);
}

?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>

</head>
<style>
.container{
	margin-bottom:20px;
}
</style>




<body>

  <div class="wrapper">
    <?php include('include/header.php'); ?>
 
    <?php include 'child-progress-pagination.php'; ?>
      
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Child Report Card</li>
      </ol>
    </section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
      <fieldset>
    <legend>Your Asha kiran Child</legend>
       <table class="col-md-12" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="col-md-4" valign="top"><label>Child Image</label></td>
            <td class="col-md-8"><label><img src="../child_development/upload/<?php echo $child_photo; ?>" height="150" width="150"></label></td>
          </tr>
          <tr>
            <td class="col-md-4" height="30"><label>Name</label></td>
            <td class="col-md-8"><label><?php echo $child_name;?></label></td>
          </tr>
          <tr>
            <td class="col-md-4" height="30"><label>Gender</label></td>
            <td class="col-md-8"><label><?php echo $child_gender;?></label></td>
          </tr>
          <tr>
            <td class="col-md-4" height="30"><label>DOB / Age</label></td>
            <td class="col-md-8"><label><?php echo $child_dob;?></label></td>
          </tr>
           <tr>
            <td class="col-md-4" height="30"><label>Father's Name</label></td>
            <td class="col-md-8"><label><?php echo $child_father_name;?></label></td>
          </tr>
          <tr>
            <td class="col-md-4" height="30"><label>Mother's Name</label></td>
            <td class="col-md-8"><label><?php echo $child_mother_name;?></label></td>
          </tr>
          <tr>
            <td class="col-md-4"  height="30"><label>Address</label></td>
            <td class="col-md-8"><label><?php echo $city; ?></label></td>
          </tr>
          </table>
          </fieldset>
		  </div>
		  <div class="col-md-12">
          <fieldset>
      <legend>NGO Information</legend>
        <table class="col-md-12" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="col-md-4" height="30"><label>NGO Partner</label></td>
            <td class="col-md-8"><label><?php echo $name_partner_ngo;?></label></td>
          </tr>
          <!--<tr>
            <td width="27%" height="30"><label>Name Of Representative</label></td>
            <td width="73%"><label><?php echo $ngo_representative;?></label></td>
          </tr>
          <tr>
            <td width="27%" height="30"><label>NGO Contact</label></td>
            <td width="73%"><label><?php echo $ngo_contact;?></label></td>
          </tr>-->
          <tr>
            <td class="col-md-4" height="30"><label>State</label></td>
            <td class="col-md-8"><label><?php echo $state;?></label></td>
          </tr>
          <tr>
            <td class="col-md-4" height="30"><label>City</label></td>
            <td class="col-md-8"><label><?php echo $city;?></label></td>
          </tr>
       </table>
      </fieldset>
      </div>
	   <div class="col-md-12">
      <fieldset>
      <legend>Progress Card</legend>
        <table class="col-md-12" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="col-md-12" style="padding-right:15px;" height="30"><a href="quarterly_report.php?pid=<?php echo $child_id; ?>"><input type="submit" name="submit1" class="btn btn-success btn-sm" value="View Report"></a>
            <a href="child_progress_report.php"><input type="submit" name="submit1" class="btn btn-success btn-sm" value="Back"></a></td>
			<!--
			<td class="col-md-12" style="padding-right:15px;" height="30"><a href="quarterly_report.php?pid=<?php echo base64_encode($child_id); ?>"><input type="submit" name="submit1" class="btn btn-success btn-sm" value="View Report"></a>
            <a href="child_progress_report.php"><input type="submit" name="submit1" class="btn btn-success btn-sm" value="Back"></a></td>
			-->
          </tr>
       </table>
      </fieldset>
	  </div>
      
      </div>
	  </div>
      <?php
    include('include/footer.php');
    ?>
      </div>
	   
	
      <!-- /.box-body -->
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