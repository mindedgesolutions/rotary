<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
$did = $_GET['did'];
if(isset($_GET['pid'])){

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
  
  <aside class="right-side">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <div class="box-body table-responsive">
      <fieldset>
	  <legend>Your Asha kiran Child</legend>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><label>Child Image</label></td>
            <td><label><img src="../upload/<?php echo $child_photo; ?>" height="150" width="150"></label></td>
          </tr>
          <tr>
            <td height="30"><label>Name</label></td>
            <td><label><?php echo $child_name;?></label></td>
          </tr>
          <tr>
            <td width="27%" height="30"><label>Gender</label></td>
            <td width="73%"><label><?php echo $child_gender;?></label></td>
          </tr>
          <tr>
            <td width="27%" height="30"><label>DOB [DD/MM/YYYY]</label></td>
            <td width="73%"><label><?php echo $child_dob;?></label></td>
          </tr>
           <tr>
            <td width="27%" height="30"><label>Father's Name</label></td>
            <td width="73%"><label><?php echo $child_father_name;?></label></td>
          </tr>
          <tr>
            <td width="27%" height="30"><label>Mother's Name</label></td>
            <td width="73%"><label><?php echo $child_mother_name;?></label></td>
          </tr>
          <tr>
            <td width="27%" height="30"><label>Address</label></td>
            <td width="73%"><label><?php echo $city; ?></label></td>
          </tr>
          </table>
          </fieldset>
          <fieldset>
	  	<legend>NGO Information</legend>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="27%" height="30"><label>NGO Partner</label></td>
            <td width="73%"><label><?php echo $name_partner_ngo;?></label></td>
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
            <td width="27%" height="30"><label>State</label></td>
            <td width="73%"><label><?php echo $state;?></label></td>
          </tr>
          <tr>
            <td width="27%" height="30"><label>City</label></td>
            <td width="73%"><label><?php echo $city;?></label></td>
          </tr>
       </table>
      </fieldset>
      
      <fieldset>
	  	<legend>Progress Card</legend>
       	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <!--<td width="11%" height="30"><a href="qt1_new.php?pid=<?php echo $child_id; ?>&did=<?php echo $did; ?>"><input type="submit" name="submit1" class="btn btn-success btn-sm" value="Quarter 1"></a></td>
            <td width="11%" height="30"><a href="qt2_new.php?pid=<?php echo $child_id; ?>&did=<?php echo $did; ?>"><input type="submit" name="submit2" class="btn btn-success btn-sm" value="Quarter 2"></a></td>
            <td width="11%" height="30"><a href="qt3_new.php?pid=<?php echo $child_id; ?>&did=<?php echo $did; ?>"><input type="submit" name="submit3" class="btn btn-success btn-sm" value="Quarter 3"></a></td>
            <td width="11%" height="30"><a href="qt4_new.php?pid=<?php echo $child_id; ?>&did=<?php echo $did; ?>"><input type="submit" name="submit4" class="btn btn-success btn-sm" value="Quarter 4"></a></td>
			-->
			<td width="55%" height="30"><a href="quarterly_report_new.php?pid=<?php echo $child_id; ?>&did=<?php echo $did; ?>"><input type="submit" name="Quarterly" class="btn btn-success btn-sm" value="Quarterly Reports"></a></td>
          </tr>
       </table>
      </fieldset>
      
      
      
      </div>
      <!-- /.box-body -->
      <br>
	  <br>
      <div class="box-footer">
      <a href="view_tagged_child_dtl.php?donorid=<?php echo $did; ?>"><button class="btn btn-success btn-sm">Back</button></a>
	  
        <!--&nbsp;view_tagged_child_dtl
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
<!-- <script src="js/AdminLTE/app.js" type="text/javascript"></script> -->
</body>
</html>