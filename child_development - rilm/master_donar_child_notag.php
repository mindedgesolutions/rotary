<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
$rowsPerPage = 25000;
   $first_name=$_POST['txtMemberFirstName'];
       $last_name=$_POST['txtMemberLastName'];
$donar_email=$_POST['txtMemberEmail'];
$donar_contact=$_POST['txtMemberMobile'];
$sql="select * from tbl_donar_master where 1=1";
if (strlen($first_name)>0)
{
     $sql=$sql . "  and first_name like '%$first_name%'";
}
if (strlen($last_name)>0)
{
     $sql=$sql . " and last_name like '%$last_name%'";
}
if (strlen($donar_contact)>0)
{
     $sql=$sql . " and donar_contact like '%$donar_contact%'";
}
if (strlen($donar_email)>0)
{
     $sql=$sql . " and donar_email like '%$donar_email%'";
}
 $sql=$sql . " order by first_name";

$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);


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
  <h1> Donor Tagging </h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Donar record update</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">
 <!-- Small boxes (Stat box) -->
 <form role="form" action="master_donar_child_notag.php" method="post" enctype="multipart/form-data">
 <div class="box-body">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Donor Search</legend>

      <div class="form-group">
        <div class="row">
             <div class="col-sm-6">
                         <label>First Name</label>
                          <input type="text" class="form-control" name="txtMemberFirstName" id="txtMemberFirstName" />
              </div>
              <div class="col-sm-6">
                         <label>Last Name</label>
                         <input type="text" class="form-control" name="txtMemberLastName" id="txtMemberLastName" />
              </div>
        </div>
         <div class="row">
             <div class="col-sm-6">
                         <label>Contact No</label>
                          <input type="text" class="form-control" name="txtMemberMobile" id="txtMemberMobile" />
              </div>
              <div class="col-sm-6">
                         <label>Email</label>
                         <input type="text" class="form-control" name="txtMemberEmail" id="txtMemberEmail" />
              </div>
        </div>
                 <div class="row" style="margin-top : 10px;">
                             <div class="col-sm-12">
                 <div class="box-footer" style="text-align : center;">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
      </div>
      </div>
            </div>
        </div>

          <legend>Donor List</legend>

                <div class="form-group">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr>
        <td width="15%"><p>First Name</p></td>
        <td width="15%"><p>Last Name</p></td>
        <td width="25%"><p>Email</p></td>
        <td width="15%"><p>Mobile</p></td>
        <td width="20%"><p>No of Child</p></td>
        <td width="10%"><p>Edit</p></td>

                                         </tr>
                                         
                                         
                                          <?php
	  while($row = mysql_fetch_array($result)){
	  extract($row);

       $sqlchild="select count(*) as totchild from tbl_child_selected_tagging where donar_id='$donar_id'";

       $totchild=0;
       $resultchild = mysql_query($sqlchild);
       while($rowchild = mysql_fetch_array($resultchild)){
	   extract($rowchild);
              $totchild=$totchild;

        }
       if ($totchild<1) {
	  ?>
	         <tr>
        <td><p style="color:#0d9429;"><?php echo $first_name; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $last_name; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $donar_email; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $donar_contact; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $totchild; ?></p></td>
        <td><p style="color:#0d9429;"><a href='master_data_child.php?id=<?php echo $donar_id; ?>'>Edit</a></p></td>
        </tr>
             <?php
	   }
	}
	?>
                          
                          </table>
                          	<div class="box-footer clearfix">
     <ul class="pagination pagination-sm no-margin pull-right">
     <?php echo $pagingLink; ?>
     </ul>
    </div>
                
                
                </div>
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
