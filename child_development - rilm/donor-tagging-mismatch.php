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

<script type="text/javascript">
$(document).ready(function() {
    $("#donor_id").searchable();
});
</script>

<style type="text/css">
.table-head{
  line-height: 40px;
  text-align: center;
  background-color: #333;
  color: #fff;
}
.table-tr{
  line-height: 30px;
}
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

<div id="load_screen"><div id="loading">Loading document ....</div></div>

<input type="hidden" name="username" id="username" value="<?= $_SESSION['username'] ?>" />

<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="dashboard.php" class="logo">
<!-- Add the class icon to your logo image or logo icon to add the margining -->
Super Admin </a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
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
  <h1>Tagging Mismatch</h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Tagging Mismatch</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">
 <!-- Small boxes (Stat box) -->
 
 <div class="box-body" style="min-height: 500px;">

      <?php //include 'pagination-tagging-mismatch.php'; ?>

      <legend>Donor Details</legend>

        <div class="form-group">
          <table width="100%" border="1" style="border-collapse: collapse;">
            <tr class="table-head">
              <td width="15%">Donor ID</td>
              <td width="40%">Donor Name</td>
              <td width="15%">Ideal Tagging</td>
              <td width="15%">Actual Tagging</td>
              <td width="15%">Discrepancy</td>
            </tr>
            
            <?php
            $sln=1;

            $query_getDonor = mysql_query("select donar_id, first_name, last_name, amount_no_child, actual_tagging from tbl_donar_master where first_name!=''");
            while ($getDonor = mysql_fetch_array($query_getDonor)){

              $getCount = mysql_fetch_array(mysql_query("select count(child_id) as childNo from tbl_child_selected_tagging where donar_id='".$getDonor['donar_id']."'"));

                $difference = floor($getDonor['actual_tagging'] - $getCount['childNo']);

                if ($difference != 0){

            //$query_getDetails = mysql_query("SELECT tbl_donar_master.donar_id, tbl_donar_master.first_name, tbl_donar_master.last_name, tbl_donar_master.amount_no_child, count(tbl_child_selected_tagging.child_id) as childNo FROM tbl_donar_master, tbl_child_selected_tagging WHERE  tbl_donar_master.donar_id=tbl_child_selected_tagging.donar_id"); SOUVIK//



            ?>
            <tr class="table-tr">
              <td style="padding: 0 0 0 10px;text-align: center;"><?= $getDonor['donar_id'] ?></td>

              <td style="padding: 0 0 0 10px;text-align: center;"><?= $getDonor['first_name'].' '.$getDonor['last_name'] ?></td>

              <td style="padding: 0 0 0 10px;text-align: center;"><?= floor($getDonor['accounts_count']) ?></td>

              <td style="padding: 0 0 0 10px;text-align: center;"><?= floor($getCount['childNo']) ?></td>

              <td style="padding: 0 0 0 10px;text-align: center;"><?php if($difference < 1){echo '<span style="color:#ff0000;">'.$difference.'</span>';}else{echo '<span>'.$difference.'</span>';} ?></td>
            </tr>
            <?php $sln++;}} ?>
          </table>
                
          </div>
        </div>

        <!--<div class="col-lg-6">
              <div class="pagination" style="text-align: center;">
                <div style="float: left;"><?php echo $paginationDisplay; ?></div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="pagination" style="text-align: center;">
                  <div>
                      <input type="text" name="jumpTo" id="jumpTo" onkeypress="return isNumberKey(event)" style="border: 1px solid #ccc; height: 30px; border-radius: 3px; width: 60px; text-align: center; margin-right: 10px;" />

                      <input type="button" name="jumpBtn" id="jumpBtn" value="Go To Page" class="btn btn-primary" onclick="jumpToPage()" />
                  </div>
              </div>
          </div>-->

     </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>

<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!-- ./wrapper -->
</body>
</html>