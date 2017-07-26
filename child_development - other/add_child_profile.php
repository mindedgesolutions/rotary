<?php
session_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";

if(isset($_POST['submit'])){
	
$child_name = ucfirst($_POST['child_name']);
$child_gender = $_POST['gender'];
$child_dob = $_POST['child_dob'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$child_gaurdian = $_POST['child_gaurdian'];
$child_study = $_POST['studied'];
$child_address = $_POST['address'];
$child_street = $_POST['street'];
$child_state = $_POST['state'];
$child_city = $_POST['city'];
$child_pin = $_POST['pin'];
$ngo_partner = $_POST['ngo_partner'];
$ngo_representative = $_POST['ngo_rep'];
$ngo_contact = $_POST['ngo_contact'];
$profile_createdby = $_SESSION['username'];
$create_date = date('d-m-Y');
$status = '1';
$type = 'NGO';

$image = $_FILES['child_image'];
$image_name= time().basename($_FILES['child_image']['name']);
move_uploaded_file($image['tmp_name'], "../upload/". $image_name);

$sql = "Insert into tbl_child_profile_card values(NULL,'$image_name','$child_name','$child_gender','$child_dob','$father_name','$mother_name','$child_gaurdian','$child_study','$child_address',
'$child_street','$child_city','$child_state','$child_pin','$ngo_partner','$ngo_representative','$ngo_contact',
'$profile_createdby','$create_date','$status','Unapproved','$type','no')";
echo $sql;
$ans = mysql_query($sql);
if($ans){
 header('location:child_profile.php');
 }
 else{
	$msg = '<div class="alert alert-danger alert-dismissable">
            <b>ALERT!</b>CHILD PROFILE IS NOT CREATED.......</div>';
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
  <h1> Child Profile <small>Control panel</small> </h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Child Profile</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">
 <!-- Small boxes (Stat box) -->
 <form role="form" action="add_child_profile.php" method="post" enctype="multipart/form-data">
 <div class="box-body">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Child Data Information</legend>
      <div class="form-group">
       <label>Child Image</label>
       <input type="file" id="exampleInputFile" name="child_image" required/>
      </div>
      <div class="form-group">
       <label>Child Name</label>
       <input type="text" class="form-control" placeholder="Child Name...." name="child_name" required/>
      </div> 
      <div class="form-group">
       <label>Gender</label>
       Male&nbsp;&nbsp;<input type="radio" class="form-control" name="gender" value="Male"/>&nbsp;&nbsp;
       Female&nbsp;&nbsp;<input type="radio" class="form-control" name="gender" value="Female"/>&nbsp;&nbsp;
      </div> 
      <div class="form-group">
       <label>Child DOB</label>
       <input type="text" class="form-control" placeholder="Child DOB...." name="child_dob" required/>
      </div> 
      <div class="form-group">
       <label>Father Name</label>
       <input type="text" class="form-control" placeholder="Father Name..." name="father_name" required/>
      </div> 
      <div class="form-group">
       <label>Mother Name</label>
       <input type="text" class="form-control" placeholder="Mother Name..." name="mother_name"/>
      </div> 
      <div class="form-group">
       <label>Child Gaurdian</label>
       <input type="text" class="form-control" placeholder="Child Gaurdian...." name="child_gaurdian"/>
      </div> 
      <div class="form-group">
       <label>Child has previously studied upto which standard/class?</label>
       <input type="checkbox" class="form-control" name="studied" value="yes"/>
      </div> 
      <div class="form-group">
       <label>Address</label>
       <input type="text" class="form-control" placeholder="Address.." name="address"/>
      </div> 
      <div class="form-group">
       <label>Street</label>
       <input type="text" class="form-control" placeholder="Street.." name="street"/>
      </div> 
      <div class="form-group">
       <label>State</label>
       <select name="state" class="form-control" required>
        <option value="">Select State</option>
       	<?php 
        $sql=mysql_query("select * from tbl_states");
        while($row = mysql_fetch_array($sql))
        {
        $data=$row['state'];
		?>
        <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
        <?php
         } 
       ?>
       </select>
      </div>
      <div class="form-group">
       <label>City</label>
       <input type="text" class="form-control" placeholder="City.." name="city" required/>
      </div> 
      <!--
      <div class="form-group">
       <label>Rotary Type</label>
       <select name="type" id="catagory" onChange="loadXMLDoc(this.value);" required>
        <option value="">Select Type</option>
       	<?php 
        $sql=mysql_query("select * from tbl_member_type");
        while($row = mysql_fetch_array($sql))
        {
        $data=$row['member_type'];
		?>
        <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
        <?php
         } 
       ?>
       </select>
      </div>
      <div class="form-group">
       <label>Rotary District</label>
       <select name="dist" id="sub_catagory" onChange="loadXMLDoc1(this.value);" required>
       		<option value="">Select District</option>
       </select>
      </div>
      <div class="form-group">
       <label>Club</label>
       <select name="club" id="club" required>
       		<option value="">Select Club</option>
       </select>
      </div>
      -->
      <div class="form-group">
       <label>Pin</label>
       <input type="text" class="form-control" placeholder="Pin.." name="pin" required/>
      </div>
      </fieldset>
      <fieldset>
      <legend>NGO Details</legend>
      <div class="form-group">
       <label>Partner NGO Organisation</label>
       <input type="text" class="form-control" placeholder="Partner NGO.." name="ngo_partner" required/>
      </div>
      <div class="form-group">
       <label>Name of NGO Representative</label>
       <input type="text" class="form-control" placeholder="NGO Representative" name="ngo_rep"/>
      </div>
      <div class="form-group">
       <label>Contact</label>
       <input type="text" class="form-control" placeholder="Contact.." name="ngo_contact"  required/>
      </div>
      
      </fieldset>
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

<script type="text/javascript">
function loadXMLDoc(id)
{
	var xmlhttp;
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
		//alert(xmlhttp.responseText);
		document.getElementById('sub_catagory').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_sub_cat.php?id="+id);
	xmlhttp.send();
}
</script>

<script type="text/javascript">
function loadXMLDoc1(id)
{
	var xmlhttp;
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
		//alert(xmlhttp.responseText);
		document.getElementById('club').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_sub.php?club="+id);
	xmlhttp.send();
}
</script>




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