<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$sql = "SELECT * FROM  tbl_child_selected_tagging WHERE donar_id = '' ORDER BY child_id ASC";
$result  = mysql_query($sql);

if(isset($_POST['submit'])){
$donar_id = $_POST['donar_tag'];
$date_of = date('d-m-Y');
$time_of = date('h:i:sa');
$sql = "Select * from tbl_donar_master where donar_id = '$donar_id'";
$res = mysql_query($sql);
while($data = mysql_fetch_array($res)){
 extract($data);
$qry="UPDATE tbl_child_selected_tagging SET donar_id = '$donar_id', date_of = '$date_of', time_of = '$time_of' where donar_id = ''";
mysql_query($qry);
header('Location:tagged_by.php');
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
<header class="header"> <a href="index.php" class="logo">
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
      <h1> Child Profile Card <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Selected Child List</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
	 <h4 class="page-header">
        Selected Child List
     </h4>
     <br>
	 
     <div class="box-body table-responsive">
      <table cellspacing="0" cellpadding="0" border="0" width="100%">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%" align="center"><p>Child Image</p></td>
                <td width="19%" align="center"><p>Child Name</p></td>
                <td width="19%" align="center"><p>Child Parent</p></td>
                <td width="15%" align="center"><p>Child Sex</p></td>
                <td width="40%" align="center"><p>NGO Partner</p></td>
               </tr>
               </table>
            </td>
          </tr>
          <tr>
            <td>
               <div style="width:100%; height:253px; overflow:auto;">
                 
                 <table cellspacing="0" cellpadding="1" border="1" width="100%" >
                   
                   <?php
					while($row_product = mysql_fetch_array($result)){
					extract($row_product);
				  ?>
				  <tr>
                    <td width="10%" align="center"><img src="../upload/<?php echo $child_image; ?>" height="50" width="50" alt="no image"/></p></td>
                    <td width="19%" align="center"><p><?php echo $child_name; ?></p></td>
					<td width="19%" align="center"><p><?php echo $child_parent; ?></p></td>
					<td width="17%" align="center"><p><?php echo $child_sex; ?></p></td>
					<td width="40%" align="center"><p><?php echo $ngo; ?></p></td>
				  </tr>	
                  <?php
					}
				   ?>
                 </table>   
               </div>
            </td>
          </tr>
        </table>
		<br>
        <br>
        <h4 class="page-header">Donar List</h4>
        <form action="donar_tagging.php" name="tagged" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
          <tr>
            <td width="396">
            <select name="district" class="form-control" id="district" onChange="loadXMLDoc(this.value);">
            <option value="">Select District</option>
            <?php 
			$sql=mysql_query("select DISTINCT donar_district from tbl_donar_master");
			while($row = mysql_fetch_array($sql))
			{
			$data=$row['donar_district'];
			?>
			<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
			<?php
			 } 
		   ?>
            </select>
            </td>
            <td width="410">
            <select name="club" class="form-control" id="club">
            <option value="">Select Club</option>
            </select>
            </td>
            <td width="55"></td>
            <td width="115"><input type="submit" name="submit" value="Search" class="btn btn-success"></td>
          </tr>
        </table>
		</form>
        <?php
		if(isset($_POST['submit'])){
		$district = $_POST['district'];
		$club = $_POST['club'];
		
		$sql = "SELECT * from tbl_donar_master where donar_district = '$district' AND donar_club = '$club'";
		$result = mysql_query($sql);
		?>
        <br>
        <br>
        <br>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="15%" align="center"><p>Select</p></td>
                    <td width="15%"><p>Donar District</p></td>
                    <td width="17%"><p>Donar Club</p></td>
                    <td width="19%"><p>Donar Name</p></td>
                    <td width="17%"><p>Donar City</p></td>
                    <td width="17%"><p>Amount for No of Child</p></td>
                  </tr>
               </table>
            </td>
          </tr>
          <tr>
            <td>
            <form method="post" enctype="multipart/form-data" action="donar_tagging.php">
               <div style="width:100%; height:253px; overflow:auto;">
                 
                 <table cellspacing="0" cellpadding="1" border="1" width="100%" >
                   
                   <?php
					while($data = mysql_fetch_array($result)){
						extract($data);
					?>
					 <tr>
						<td width="15%" align="center"><input name="donar_tag" type="radio" value="<?php echo $donar_id; ?>"></td>
						<td width="15%"><p><?php echo $donar_district; ?></p></td>
						<td width="17%"><p><?php echo $donar_club; ?></p></td>
						<td width="19%"><p><?php echo $first_name.' '.$last_name; ?></p></td>
						<td width="17%"><p><?php echo $donar_city; ?></p></td>
						<td width="17%"><p><?php echo $amount_no_child; ?></p></td>
					  </tr> 
					<?php
					 }
					?>
                 </table>
                 
               </div>
               <br>
         	   <input type="submit" name="submit" value="Tagged" class="btn btn-success">  
            </form>
            </td>
          </tr>
        </table>
        <?php
		}
		?>
        
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
<!-- Jquery Confirmation -->
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	

</script>
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
		document.getElementById('club').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_district.php?id="+id);
	xmlhttp.send();
}
</script>
</body>
</html>