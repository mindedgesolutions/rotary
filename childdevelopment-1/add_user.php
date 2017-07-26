<?php
session_start();
include('include/config1.php');
include 'include/session_check.php';

$msg = "";
if(isset($_POST['submit'])){
$user_type = $_POST['user_type'];	
$user_club = $_POST['club'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$center_name = $_POST['center_name'];
$club = $_POST['club'];	
$create_date = date('d/m/Y');
$user_status = 'Active';

$sql = "Insert into tbl_admin values(NULL,'$center_name','$user_password','$first_name','$last_name','$user_email','$user_type',
		'$create_date','$user_status','$club')";
echo $sql;
$ans = mysql_query($sql);
if($ans){
 //header('location:myaccount.php');
 }
 else{
	$msg = '<div class="alert alert-danger alert-dismissable">
            <b>ALERT!</b>USER IS NOT CREATED.......</div>';
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
<script type="text/javascript">
function hideDiv() {
      document.getElementById("list").style.display = 'none';    
	  document.getElementById("list2").style.display = 'none';    
    }  
</script>
<script type="text/javascript">
function loadXMLDoc(id)
{
	var xmlhttp;
	if (id == 'ngo') {
		document.getElementById('list').style.display='none';
		document.getElementById('list2').style.display='none';
	}
	else {
		document.getElementById('list').style.display='';
		document.getElementById('list2').style.display='';
	}
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		
		 var str=xmlhttp.responseText;
		  var res = str.split("|");
		for (i = 0; i < res.length; i++) {
			if (res[i].length>2){
				var option = document.createElement("option");
				option.text = res[i];
				document.getElementById('club').add(option);
			}
		}
//		document.getElementById('club').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_ngo.php?id='center'");
	
	xmlhttp.send();
}
</script>
</head>
<body class="skin-blue" onLoad="hideDiv();">
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
          <p>Hello, <?php echo ucfirst($_SESSION['username']); ?>
          </p>
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
      <h1> Dashboard <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href ="user_list.php">User</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <form role="form" action="add_user.php" method="post" enctype="multipart/form-data">
     <div class="box-body">
     <?php echo $msg; ?>
     <div class="form-group">
       <label>Type</label>
       <select class="form-control" name="user_type" id="district" onChange="loadXMLDoc(this.value);">
       <option>Select Type</option>
       <option value="ngo">NGO</option>
	   <option value="center">CENTER</option>
       </select>
     </div>
	<div class="form-group" id="list">
       <label>NGO LIST</label>
       <select name="club" class="form-control" id="club">
		</select>
     </div>
     <div class="form-group">
       <label>Center Name</label>
       <input type="text" class="form-control" placeholder="Enter Center Name...." name="center_name"/>
     </div>
	 <div class="form-group">
       <label>Contact Person First Name</label>
       <input type="text" class="form-control" placeholder="Enter First Name...." name="first_name"/>
     </div>
     <div class="form-group">
       <label>Contact Person Last Name</label>
       <input type="text" class="form-control" placeholder="Enter Last Name...." name="last_name"/>
     </div>
     <div class="form-group">
       <label>Contact Person Email </label>
       <input type="email" class="form-control" placeholder="Enter Email...." name="user_email">
      </div>
      <div class="form-group">
       <label>NGO / CENTER Name</label>
       <input type="text" class="form-control" placeholder="Enter Name...." name="ngo_name"/>
      </div>
      <div class="form-group">
       <label>NGO / Center Password</label>
       <input type="password" class="form-control" placeholder="Enter Password...." name="user_password">
      </div>
      <!--<div class="form-group">
       <label>User Name</label>
       <input type="text" class="form-control" placeholder="Enter Name...." name="user_name"/>
      </div>-->
      
      <!--<div class="form-group">
       <label>User Status</label>
       <select class="form-control" name="user_status">
       <option selected>Active</option>
       </select>
     </div>-->
     </div><!-- /.box-body -->
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
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
</body>
</html>