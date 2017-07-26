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
    $("#child_id").searchable();
});
function untagDonor(par, par2){

  var child_id = $('#child_id').val();
  var donor_id = par;
  var username = $('#username').val();

  $.ajax({
    url: 'untag-donor-ajax.php',
    type: 'post',
    data: 'child_id=' + child_id + '&donor_id=' + donor_id + '&username=' + username,
    success: function(f){

      alert('Donor is untagged');
      $('#tagBtn'+par2).show();
      $('#untagBtn'+par2).hide();
    }
  })
}

function tagDonor(par, par2){

  var child_id = $('#child_id').val();
  var donor_id = par;
  var username = $('#username').val();

  $.ajax({
    url: 'tag-donor-ajax.php',
    type: 'post',
    data: 'child_id=' + child_id + '&donor_id=' + donor_id + '&username=' + username,
    success: function(f){

      alert('Donor is tagged');
      $('#untagBtn'+par2).show();
      $('#tagBtn'+par2).hide();
    }
  })
}

function finalTagging(){

  var child_id = $('#child_id').val();
  var c = confirm("Is the tagging done correctly?");

  if (c==true){
    $.ajax({

      url: 'tag-final-confirm.php',
      type: 'post',
      data: 'child_id=' + child_id,
      success: function(f){
        
        alert('Tagging completed');
        window.location = 'untag-donor.php';
      }
    })
  }else{
    alert('Action is cancelled');
  }
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
  <h1>Untag Duplicate Tagging</h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Donar record update</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">
 <!-- Small boxes (Stat box) -->
 
 <div class="box-body" style="min-height: 500px;">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Child Search</legend>

      <form action="" method="POST">

      <!--<div class="form-group">
        <div class="row">
           <div class="col-sm-6">
                <label>Select Child : </label>
                <select class="form-control" id="child_id" name="child_id" style="height: 20px;">
                  <option value="">-- Select Child --</option>

                  <?php
                  $query_getChild = mysql_query("select * from tbl_child_profile_card");
                  while ($getChild = mysql_fetch_array($query_getChild)){
                  ?>
                  <option value="<?= $getChild['child_id'] ?>" <?php if ($getChild['child_id']==$_REQUEST['child_id']){echo 'selected';} ?>><?= $getChild['child_name'] ?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-sm-3" style="padding-top: 25px;margin: 0 0 0 20px;">
                <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Submit" style="width: 80px;margin: 0 15px 0 0;" />

                <a href="untag-donor.php"><input type="button" name="resetBtn" id="resetBtn" class="btn btn-primary" value="Reset" style="width: 80px;" /></a>
            </div>
        </div>
      </div>-->

      <div class="form-group">
        <div class="row">
           <div class="col-sm-6">
                <label>Select Child : </label>
                <select class="form-control" id="child_id" name="child_id" style="height: 20px;">
                  <option value="">-- Select Child --</option>

                  <?php
                  $query_getChild = mysql_query("select * from tbl_child_selected_tagging group by child_id having count(child_id) > 1");
                  while ($getChild = mysql_fetch_array($query_getChild)){

                    $childName = mysql_fetch_array(mysql_query("select child_name from tbl_child_profile_card where child_id='".$getChild['child_id']."'"));
                  ?>
                  <option value="<?= $getChild['child_id'] ?>" <?php if ($getChild['child_id']==$_REQUEST['child_id']){echo 'selected';} ?>><?= $childName['child_name'] ?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-sm-3" style="padding-top: 25px;margin: 0 0 0 20px;">
                <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Submit" style="width: 80px;margin: 0 15px 0 0;" />

                <a href="untag-donor.php"><input type="button" name="resetBtn" id="resetBtn" class="btn btn-primary" value="Reset" style="width: 80px;" /></a>
            </div>
        </div>
      </div>

      </form>

      <legend>Child Details</legend>

        <div class="form-group">
          <table width="100%" border="1" style="border-collapse: collapse;">
            <tr class="table-head">
              <td width="25%">Name</td>
              <td width="10%">Donor ID</td>
              <td width="25%">Donor Name</td>
              <td width="15%">Donor Contact</td>
              <td width="10%">Registered</td>
              <td width="15%">Action</td>
            </tr>
            
            <?php
            if (isset($_REQUEST['submitBtn'])){

              $sln=1;

              $query = "select * from tbl_child_selected_tagging where child_tag_id!='' ";

              if ($_REQUEST['child_id']!=''){

                $query = $query."and child_id='".$_REQUEST['child_id']."'";
              }

              $query = $query." order by child_id";
              $result = mysql_query($query);
              while ($childDet = mysql_fetch_array($result)){

                $child_details = mysql_fetch_array(mysql_query("select child_name, child_gender from tbl_child_profile_card where child_id='".$_REQUEST['child_id']."'"));

                $donorDet = mysql_fetch_array(mysql_query("select first_name, last_name, donar_contact from tbl_donar_master where donar_id='".$childDet['donar_id']."'"));

                $registered = mysql_num_rows(mysql_query("select * from tbl_admin where idfk='".$childDet['donar_id']."' and idfk > 0"));

                if ($registered > 0){$registered_status = 'Yes';}else{$registered_status = 'No';}
            ?>
            <tr class="table-tr">
              <td style="padding: 0 0 0 10px;"><?= $child_details['child_name'] ?></td>

              <input type="hidden" name="child_id" id="child_id" value="<?= $_REQUEST['child_id'] ?>" />

              <td style="padding: 0 0 0 10px;"><?= $childDet['donar_id'] ?></td>

              <td style="padding: 0 0 0 10px;"><?= $donorDet['first_name'].' '.$donorDet['last_name'] ?></td>

              <td style="padding: 0 0 0 10px;"><?= $donorDet['donar_contact'] ?></td>

              <td style="padding: 0 0 0 10px;"><?= $registered_status ?></td>

              <td style="text-align: center;">

                <input type="button" name="untagBtn<?= $sln ?>" id="untagBtn<?= $sln ?>" class="btn btn-primary" value="Untag Donor" onclick="untagDonor(<?= $childDet['donar_id'] ?>, <?= $sln ?>)" style="height: 38px;margin: 1px 0;background-color: #ce0000;border: 1px solid #ce0000;" />

                <input type="button" name="tagBtn<?= $sln ?>" id="tagBtn<?= $sln ?>" class="btn btn-primary" value="Tag Donor" onclick="tagDonor(<?= $childDet['donar_id'] ?>, <?= $sln ?>)" style="height: 38px;margin: 1px 0;display: none;" />

              </td>
            </tr>
            <?php $sln++;}}else{ ?>
            <tr class="table-tr"><td colspan="6" style="text-align: center;">No Child is Selected</td></tr>
            <?php } ?>
          </table>

          <div class="box-footer clearfix">
            <ul style="text-align: center;">
              <input type="button" name="confirmBtn" id="confirmBtn" class="btn btn-primary" value="Confirm Tagging" style="margin: 20px 0 0 0;" onclick="finalTagging()" />
            </ul>
          </div>

          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              <?php echo $pagingLink; ?>
            </ul>
          </div>
                
                
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