<?php
session_start();

include('include/config.php');
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

<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.searchabledropdown-1.0.8.min.js"></script>

<style type="text/css">
#load_screen{
	background: #000;
	opacity: 0.8;
	position: fixed;
	z-index: 999;
	top: 0;
	left: 0;
	width: 100%;
	height: 2000px;
}
#loading{
	color: #0098f7;
	width: 150px;
	height: 30px;
	margin: 300px auto;
}
</style>

<script type="text/javascript">
window.addEventListener('load', function(){
	var load_screen = document.getElementById('load_screen');
	document.body.removeChild(load_screen);
})
</script>

</head>

<body class="skin-blue">

<div id="load_screen"><div id="loading">Fetching data ....</div></div>

<header class="header"> <a href="dashboard.php" class="logo">Super Admin </a>

<nav class="navbar navbar-static-top" role="navigation">

<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
<span class="icon-bar"></span> <span class="icon-bar"></span> </a>
<div class="navbar-right">
  <?php include('include/user_account.php'); ?>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">

<aside class="left-side sidebar-offcanvas">

<section class="sidebar">

  <div class="user-panel">
    <div class="pull-left image"> <img src="img/avatar5.png" class="img-circle" alt="User Image" /> </div>
    <div class="pull-left info">
      <p>Hello, <?php echo ucfirst($_SESSION['username']); ?></p>
      </div>
  </div>

  <?php include('include/side_menu.php'); ?>
</section>
</aside>

<aside class="right-side">

<section class="content-header">
  <h1>Tagging Mismatch</h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Tagging Mismatch</li>
  </ol>
</section>

 <section class="content">
	<script type="text/javascript">
	window.location = 'donor-tagging-mismatch.php';
	</script>
</body>
</html>