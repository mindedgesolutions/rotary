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
  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <!-- Content Header (Page header) -->
  <!--
    <section class="content-header">
      <h1> Product <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>.
        <li><a href="child_profile.php">Catagory</a></li>
        <li class="active">View Detail Product</li>
      </ol>
    </section>
  -->
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
		
        <legend>Child Progress Report Card : <b><i><?php echo $row['child_name']; } ?></b></i> </legend>

        <?php
        $sql1 = "Select * from quarter_1 where child_id = '$pid' and exam='1'";
        $result1 = mysql_query($sql1);
        while($fetch1 = mysql_fetch_array($result1)){

           $marks1 = $marks1.$fetch1['value'].'+';
        }
        $arrayVal1 = explode('+', $marks1);


        $sql2 = "Select * from quarter_2 where child_id = '$pid' and exam='2'";
        $result2 = mysql_query($sql2);
        while($fetch1 = mysql_fetch_array($result1)){

           $marks2 = $marks2.$fetch2['value'].'+';
        }
        $arrayVal2 = explode('+', $marks2);


        $sql3 = "Select * from quarter_3 where child_id = '$pid' and exam='3'";
        $result3 = mysql_query($sql3);
        while($fetch3 = mysql_fetch_array($result3)){

           $marks3 = $marks3.$fetch3['value'].'+';
        }
        $arrayVal3 = explode('+', $marks3);


        $sql4 = "Select * from quarter_4 where child_id = '$pid' and exam='4'";
        $result4 = mysql_query($sql4);
        while($fetch4 = mysql_fetch_array($result4)){

           $marks4 = $marks4.$fetch4['value'].'+';
        }
        $arrayVal4 = explode('+', $marks4);
        ?>

         <table width="100%" border="1">
          <tr>
            <td width="5%" align="center"><strong>Sl. No.</strong></td>
            <td width="35%" align="center"><strong>Areas of Progress</strong></td>
            <td width="15%" align="center"><strong>1st Quarter</strong></td>
            <td width="15%" align="center"><strong>2nd Quarter</strong></td>
            <td width="15%" align="center"><strong>3rd Quarter</strong></td>
            <td width="15%" align="center"><strong>4th Quarter</strong></td>
          </tr>

          <tr>
          	<td width="5%" align="center">A</td>
            <td width="35%" align="center" style="text-align: left;">Ability to understand what is been said to him/her in mother tongue</td>
            <td width="15%" align="center"><?= $arrayVal1[0] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[0] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[0] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[0] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">A.1</td>
            <td width="35%" align="center" style="text-align: left;">Ability to express his/her ideas in a conclusive manner in mother tongue</td>
            <td width="15%" align="center"><?= $arrayVal1[1] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[1] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[1] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[1] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">A.2</td>
            <td width="35%" align="center" style="text-align: left;">Ability to read in mother tongue</td>
            <td width="15%" align="center"><?= $arrayVal1[2] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[2] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[2] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[2] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">A.3</td>
            <td width="35%" align="center" style="text-align: left;">Ability to write in mother tongue</td>
            <td width="15%" align="center"><?= $arrayVal1[3] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[3] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[3] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[3] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">B</td>
            <td width="35%" align="center" style="text-align: left;">Knowledge in Arithmetic</td>
            <td width="15%" align="center"><?= $arrayVal1[4] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[4] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[4] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[4] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">C</td>
            <td width="35%" align="center" style="text-align: left;">General Knowledge</td>
            <td width="15%" align="center"><?= $arrayVal1[5] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[5] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[5] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[5] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">D</td>
            <td width="35%" align="center" style="text-align: left;">Creative Skill (Games & Sports/drawing/dance/others)</td>
            <td width="15%" align="center"><?= $arrayVal1[6] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[6] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[6] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[6] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">E</td>
            <td width="35%" align="center" style="text-align: left;">Personal Hygiene</td>
            <td width="15%" align="center"><?= $arrayVal1[7] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[7] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[7] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[7] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">F</td>
            <td width="35%" align="center" style="text-align: left;">Attendance</td>
            <td width="15%" align="center"><?= $arrayVal1[8] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[8] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[8] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[8] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">G</td>
            <td width="35%" align="center" style="text-align: left;">Discipline</td>
            <td width="15%" align="center"><?= $arrayVal1[9] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[9] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[9] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[9] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">H</td>
            <td width="35%" align="center" style="text-align: left;">Sociability (Participation, Group interaction, etc.)</td>
            <td width="15%" align="center"><?= $arrayVal1[10] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[10] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[10] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[10] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">I</td>
            <td width="35%" align="center" style="text-align: left;">Leadership quality</td>
            <td width="15%" align="center"><?= $arrayVal1[11] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[11] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[11] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[11] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">J</td>
            <td width="35%" align="center" style="text-align: left;">Teacher's overall opinion about the student</td>
            <td width="15%" align="center"><?= $arrayVal1[12] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[12] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[12] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[12] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">K</td>
            <td width="35%" align="center" style="text-align: left;">Above mentioned abilities of the child are commensurate to class</td>
            <td width="15%" align="center"><?= $arrayVal1[13] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[13] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[13] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[13] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">L</td>
            <td width="35%" align="center" style="text-align: left;">Date of Admission in Government School/back to school</td>
            <td width="15%" align="center"><?= $arrayVal1[14] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[14] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[14] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[14] ?></td>
          </tr>

          <tr>
          	<td width="5%" align="center">M</td>
            <td width="35%" align="center" style="text-align: left;">Name of the School where the child admitted/readmitted</td>
            <td width="15%" align="center"><?= $arrayVal1[15] ?></td>
            <td width="15%" align="center"><?= $arrayVal2[15] ?></td>
            <td width="15%" align="center"><?= $arrayVal3[15] ?></td>
            <td width="15%" align="center"><?= $arrayVal4[15] ?></td>
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
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
</body>
</html>