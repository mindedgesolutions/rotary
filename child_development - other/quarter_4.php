<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";
if(isset($_GET['pid'])){
$pid =$_GET['pid'];
$sql = "Select * from  tbl_child_profile_card where child_id = '$pid'";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	extract($row);	
 }
}

if(isset($_POST['submit_form'])){
$pid = $_POST['pid'];
$date_admission_center = $_POST['date_admission_center']; 
$age_class = $_POST['age_class']; 	
$child_id = $_POST['child_id']; 	
$exam = $_POST['exam']; 	
$quarter = $_POST['quarter'];	
$date_of = date('d/m/Y');

$sql = "Insert into tbl_child_progress_card values(NULL,'$child_id','$date_admission_center','$age_class')";
echo $sql;
$result = mysql_query($sql);	
if($result){
foreach($quarter as $value){
 $sql = "Insert into quarter_4 values(NULL,'$child_id','$exam','$value','$date_of')";	
 echo $sql;
 $result = mysql_query($sql);
 header('location:add_child_progress.php?pid='.$pid);
  }
 }
 else{
   $msg = "Please Contact your Service Provider."; 
 }
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
  <h1> Child Progress Report <small>Control panel</small> </h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Child Progress Report</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">

 <!-- Small boxes (Stat box) -->
 <div class="box-body">   
     <?php echo $msg; ?>      
     <form action="quarter_4.php" method="post" enctype="multipart/form-data"> 
          <fieldset>
          <legend>Child Information</legend>
          <table width="100%" border="0">
              <tr>
                <td width="17%"><img src="../upload/<?php echo $child_photo; ?>" width="140" style="border:#000 thin solid;"></td>
                <td width="83%" valign="top">
                <table width="100%" border="0">
                  <tr>
                    <td width="44%">
                    <label>Child Name : </label>
                    <?php echo $child_name; ?>
                    </td>
                    <td width="56%">
                    <label>Child DOB : </label>
                    <?php echo $child_dob; ?>yrs
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <label>Child Gender : </label>
                    <?php echo $child_gender; ?>
                    </td>
                    <td>
                    <label>Father Name : </label>
                    <?php echo $child_father_name; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <label>Child Mother Name : </label>
                    <?php echo $child_mother_name; ?>
                    </td>
                    <td>
                    <label>Child City : </label>
                    <?php echo $city; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <label>Pin Code : </label>
                    <?php echo $pin; ?>
                    </td>
                    <td>
                    <label>NGO Partner : </label>
                    <?php echo $name_partner_ngo; ?>
                    </td>
                  </tr>
                  <?php
				  $query = "Select * from tbl_child_progress_card where child_id = '$pid'";
		  		  $result = mysql_query($query);
				  while($data = mysql_fetch_array($result)){
					  extract($data);
				  }
				  ?>
                  <tr>
                    <td>
                    <label>Date of Admission in the Center : </label>
                    <input type="text" class="form-control" placeholder="Date of Admission" name="date_admission_center" value="<?php if(isset($date_admission_center))
					{echo $date_admission_center;} else{}?>"/>
                    </td>
                    <td>
                    <label>Age appropriate class </label>
                    <input type="text" class="form-control"  placeholder="Age appropriate class" name="age_class" value="<?php if(isset($age_class))
					{echo $age_class;} else{}?>"/>
                    </td>
                  </tr>
                  
                </table>
                </td>
              </tr>
            </table> 
          </fieldset>
          <br>
          <br>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-3"></div>
                <div class="col-xs-5">
                  <strong>Grades: A = Very Good, B = Good, C = Satisfactory, D = Need Improvement</strong><br>
                  <strong><center>(Please assess as commensurate to the age appropriate class)</center></strong>
                 </div>
                <div class="col-xs-4"></div>
                </div>
              </div>
             
      	 <fieldset>
      	 <legend>Child Progress Report Card</legend>
         <table width="100%" border="1">
          <tr>
            <td width="4%"><strong>Serial</strong></td>
            <td width="32%" align="center"><strong>Areas of Progress</strong></td>
            <td width="16%" align="center"><strong>4th Quarter</strong></td>
          </tr>
          <?php
          $sql = "Select * from tbl_subject";
          $res = mysql_query($sql);
          while($data = mysql_fetch_array($res)){
              extract($data);
		  
          ?>
          <tr>
            <td><?php echo $subject_serial; ?></td>
            <td><?php echo $subject_name; ?></td>
            <td><input type="text" class="form-control" name="quarter[]" value=""/></td>
            <input type="hidden" class="form-control"  name="exam" value="4"/>
            <input type="hidden" class="form-control"  name="child_id" value="<?php echo $child_id; ?>"/>
            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
          </tr>
          <?php
          }
          ?>
        </table>
        
        </fieldset>
   		  <br>
          <div class="box-footer" style="text-align:center;">
          <input type="submit" name="submit_form" class="btn btn-primary" value="Submit" />
          </div>
          </form>
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