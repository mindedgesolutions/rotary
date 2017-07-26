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
function jumpToPage(){
    var lastPage = $('#lastPage').val();
    var jumpTo = $('#jumpTo').val();
    var pathname = window.location.pathname;
    
    if (Number(jumpTo) > Number(lastPage)){
        window.location.href = pathname + '?pn=' + lastPage;
    }else{
        window.location.href = pathname + '?pn=' + jumpTo;
    }
}
function editName(par){

  document.getElementById('firstname'+par).style.display = 'none';
  document.getElementById('fname'+par).style.display = 'block';
  document.getElementById('lastname'+par).style.display = 'none';
  document.getElementById('lname'+par).style.display = 'block';
  document.getElementById('edit'+par).style.display = 'none';
  document.getElementById('update'+par).style.display = 'block';
  document.getElementById('cancel'+par).style.display = 'block';
}
function updateName(par){

  var donorId = $('#donorId'+par).val();
  var fname = $('#fname'+par).val();
  var lname = $('#lname'+par).val();

  $.ajax({

    url: 'ajax-update-donor-name.php',
    type: 'post',
    data: 'donorId=' + donorId + '&fname=' + fname + '&lname=' + lname,
    success: function(f){

      alert('Donor Name has been updated successfully');
      window.location.reload();
    }
  })
}
function cancelName(par){

  document.getElementById('firstname'+par).style.display = 'block';
  document.getElementById('fname'+par).style.display = 'none';
  document.getElementById('lastname'+par).style.display = 'block';
  document.getElementById('lname'+par).style.display = 'none';
  document.getElementById('edit'+par).style.display = 'block';
  document.getElementById('update'+par).style.display = 'none';
  document.getElementById('cancel'+par).style.display = 'none';
}
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
</style>
</head>



<body class="skin-blue">

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
  <h1>Change Donor Name</h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Donar record update</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">
 <!-- Small boxes (Stat box) -->
 
 <div class="box-body" style="min-height: 500px;">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Donor Search</legend>

      <form action="" method="POST">

      <div class="form-group">
        <div class="row">
           <div class="col-sm-6">
                <label>Select Donor : </label>
                <select class="form-control" id="donor_id" name="donor_id" style="height: 20px;">
                  <option value="">-- Select Donor --</option>

                  <?php
                  $query_getDonor = mysql_query("select * from tbl_donar_master where last_name=''");
                  while ($getDonor = mysql_fetch_array($query_getDonor)){

                  ?>
                  <option value="<?= $getDonor['donar_id'] ?>" <?php if ($getDonor['donar_id']==$_REQUEST['donor_id']){echo 'selected';} ?>><?= $getDonor['first_name'].' '.$getDonor['last_name'] ?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-sm-3" style="padding-top: 25px;margin: 0 0 0 20px;">
                <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Submit" style="width: 80px;margin: 0 15px 0 0;" />

                <a href="update-donor-name.php"><input type="button" name="resetBtn" id="resetBtn" class="btn btn-primary" value="Reset" style="width: 80px;" /></a>
            </div>
        </div>
      </div>

      </form>

      <?php include 'pagination-donor-name.php'; ?>

      <legend>Donor Details</legend>

        <div class="form-group">
          <table width="100%" border="1" style="border-collapse: collapse;">
            <tr class="table-head">
              <td width="10%">Donor ID</td>
              <td width="30%">First Name</td>
              <td width="30%">Last Name</td>
              <td width="15%">Donor Contact</td>
              <td width="15%">Action</td>
            </tr>
            
            <?php
            $sln=1;

            if (isset($_REQUEST['submitBtn'])){

              $query_donorDet = "select * from tbl_donar_master where donar_id!='' and";

              if ($_REQUEST['donor_id']!=''){
                $query_donorDet = $query_donorDet." donar_id='".$_REQUEST['donor_id']."'";
              }
            }else{
              $query_donorDet = "select * from tbl_donar_master where last_name='' order by donar_id $limit";
            }

            $query_donorDet = $query_donorDet;

            $result_donorDet = mysql_query($query_donorDet);
            while ($donorDet = mysql_fetch_array($result_donorDet)){
            ?>
            <tr class="table-tr">
              <td style="padding: 0 0 0 10px;text-align: center;"><?= $donorDet['donar_id'] ?></td>

              <input type="hidden" name="donorId<?= $sln ?>" id="donorId<?= $sln ?>" value="<?= $donorDet['donar_id'] ?>" />

              <td style="padding: 0 0 0 10px;text-align: center;">
                <span id="firstname<?= $sln ?>"><?= $donorDet['first_name'] ?></span>

                <input type="text" name="fname<?= $sln ?>" id="fname<?= $sln ?>" class="form-control" value="<?= $donorDet[first_name] ?>" style="width: 70%;margin: 0 15%;display: none;" />
              </td>

              <td style="padding: 0 0 0 10px;text-align: center;">
                <span id="lastname<?= $sln ?>"><?= $donorDet['last_name'] ?></span>
                  
                <input type="text" name="lname<?= $sln ?>" id="lname<?= $sln ?>" class="form-control" value="<?= $donorDet[last_name] ?>" style="width: 70%;margin: 0 15%;display: none;" />
              </td>

              <td style="padding: 0 0 0 10px;text-align: center;"><?= $donorDet['donar_contact'] ?></td>

              <td style="text-align: center;">

                <input type="button" name="edit<?= $sln ?>" id="edit<?= $sln ?>" class="btn btn-primary" value="Edit Name" onclick="editName(<?= $sln ?>)" style="width: 70%;height: 38px;margin: 1px 15%;" />

                <input type="button" name="update<?= $sln ?>" id="update<?= $sln ?>" class="btn btn-primary" value="Update" onclick="updateName(<?= $sln ?>)" style="width: 40%;height: 38px;margin: 1px 2% 1px 8%;display: none;background-color: #00527f;float: left;text-align: center;padding: 0;border: none;" />

                <input type="button" name="cancel<?= $sln ?>" id="cancel<?= $sln ?>" class="btn btn-primary" value="Cancel" onclick="cancelName(<?= $sln ?>)" style="width: 40%;height: 38px;margin: 1px 8% 1px 2%;display: none;background-color: #ba0000;float: left;text-align: center;padding: 0;border: none;" />

              </td>
            </tr>
            <?php $sln++;} ?>
          </table>

          <?php
          if (!isset($_REQUEST['submitBtn'])){
          ?>
          <div class="col-lg-6">
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
          </div>
          <?php } ?>
                
          </div>
        </div>

     </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>

<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!-- ./wrapper -->
</body>
</html>