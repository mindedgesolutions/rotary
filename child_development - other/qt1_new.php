<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
$did = $_GET['did'];
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

<div class="wrapper row-offcanvas row-offcanvas-left">

  <aside class="right-side">
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <div class="box-body table-responsive">
      <fieldset>
      	 <legend>Child Progress Report Card</legend>
         <table width="100%" border="1">
          <tr>
            <td width="32%" align="center"><strong>Areas of Progress</strong></td>
            <td width="16%" align="center"><strong>1st Quarter</strong></td>
          </tr>
          <tr>
            <td>
            <table width="100%" border="1">
            <?php
			$sql = "Select * from tbl_subject";
			$res = mysql_query($sql);
			while($data = mysql_fetch_array($res)){
              extract($data);
			?>
              <tr>
                <td><?php echo $subject_serial; ?></td>
                <td><?php echo $subject_name; ?></td>
              </tr>
              <?php
			}
			?>
            </table>
            </td>
            <td>
            <table width="100%" border="1">
              <?php
			$sql1 = "Select * from quarter_1 where child_id = '$pid'";
			$res1 = mysql_query($sql1);
			while($data1 = mysql_fetch_array($res1)){
              extract($data1);
			?>
              <tr>
                <td><?php if($value == ''){echo '&nbsp;';} else{echo $value;} ?></td>
              </tr>
              <?php
			}
			?>
            </table>

            
            </td>
            
          </tr>
        </table>
        
        </fieldset>
      
      
      
      </div>
      <!-- /.box-body -->
      <br>
	  <br>
      <div class="box-footer">
      <a href="view_child_progress_new.php?pid=<?php echo $pid; ?>&did=<?php echo $did; ?>"><button class="btn btn-success btn-sm">Back</button></a>
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
<!-- <script src="js/AdminLTE/app.js" type="text/javascript"></script> -->
</body>
</html>