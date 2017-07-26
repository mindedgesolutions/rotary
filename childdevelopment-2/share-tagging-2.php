<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$user_email = $_SESSION['email'];

$child = '';

$sql = "Select * from tbl_donar_master where donar_email = '$user_email' ORDER BY donar_id limit 1";

$query = mysql_query($sql);
while($data = mysql_fetch_array($query)){
  extract($data);
}

$donorId = mysql_fetch_array(mysql_query("select donar_id from tbl_donar_master where donar_email='".$user_email."'"));

$result3     = mysql_fetch_array(mysql_query("select count(child_id) as ch_count from tbl_child_selected_tagging where donar_id='".$donorId['donar_id']."'"));

/*$a = mysql_query("select * from share_tagged_child where shared_by_donor='".$donorId['donar_id']."'");
while ($b = mysql_fetch_array($a)){

  $id_array[] = $b['child_id'];
}*/
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
    $("#shared_to_donor").searchable();
});
</script>

</head>






<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="#" class="logo">
  <!-- Add the class icon to your logo image or logo icon to add the margining -->
 </a>
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
      <h1> Child Profile Card</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tagged By</li>
      </ol>
    </section>
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) 
	 <h5 class="page-header">-->
	<b>
		<div class="box-body table-responsive">     
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="20%"><p>Donor</p></td>
					<td width="80%"><p>: <?php echo ucfirst($_SESSION['username']); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>E-mail</p></td>
					<td width="80%"><p>: <?php echo ucfirst($user_email); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>District</p></td>
					<td width="80%"><p>: <?php echo ucfirst($donar_district); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>Club</p></td>
					<td width="80%"><p>: <?php echo ucfirst($donar_club); ?></p></td>
				</tr>
				<tr>
					<td width="20%"><p>Total Children Tagged </p></td>
					<td width="80%"><p>: <?php echo $result3['ch_count']; ?></p></td>
				</tr>
			</table>
		</div>
	</b>
	<hr>
    
    <?php
    if (isset($_REQUEST['submitBtn'])){

      /*$tagId_p = base64_decode($_REQUEST['tagId']);
      $tagId = rtrim($tagId_p,'+');
      $ex_tagged = explode('+', $tagId);
      
      foreach ($ex_tagged as $key => $i) {

        $updateQry = "update share_tagged_child set shared_to_donor='".$_REQUEST['shared_to_donor']."', status='active' where child_id='".$i."'";

        mysql_query($updateQry);
      }*/

      /*-----------Delete Details-------------*/
      $checkDetails = mysql_num_rows(mysql_query("select * from share_tagged_child_details where shared_by_donor='".base64_decode($_REQUEST['sharedBy'])."' and shared_to_donor='".$_REQUEST['shared_to_donor']."'"));

      if ($checkDetails > 0){

        $deleteDetails = "delete from share_tagged_child_details where shared_by_donor='".base64_decode($_REQUEST['sharedBy'])."' and shared_to_donor='".$_REQUEST['shared_to_donor']."'";

        mysql_query($deleteDetails);
      }
      /*-----------Delete Details-------------*/

      /*-----------Update Master-------------*/
      $getCount = mysql_num_rows(mysql_query("select SLN from share_tagged_child_details_temp where share_id='".base64_decode($_REQUEST['sNo'])."'"));

      $updateMaster = "update share_tagged_child_master set shared_to_donor='".$_REQUEST['shared_to_donor']."', shared_count='".$getCount."', status='complete' where share_id='".base64_decode($_REQUEST['sNo'])."'";

      mysql_query($updateMaster);
      /*-----------Update Master-------------*/

      /*-----------Update Temp-------------*/
      $updateTemp = "update share_tagged_child_details_temp set shared_to_donor='".$_REQUEST['shared_to_donor']."', status='complete' where share_id='".base64_decode($_REQUEST['sNo'])."'";

      mysql_query($updateTemp);
      /*-----------Update Temp-------------*/

      /*-----------Insert Details-------------*/
      $query_tmpDetails = mysql_query("select * from share_tagged_child_details_temp where share_id='".base64_decode($_REQUEST['sNo'])."'");
      while ($tmpDetails = mysql_fetch_array($query_tmpDetails)){

        $insertDetails = "insert into share_tagged_child_details(child_id, shared_by_donor, shared_to_donor, share_date, status, share_id) values('".$tmpDetails['child_id']."', '".$tmpDetails['shared_by_donor']."', '".$_REQUEST['shared_to_donor']."', '".$tmpDetails['share_date']."', '".date('Y-m-d')."', '".base64_decode($_REQUEST['sNo'])."')";

        mysql_query($insertDetails);
      }
      /*-----------Insert Details-------------*/
    ?>
    <script type="text/javascript">
      alert('Sharing is done');
      window.location = 'share-tagging.php';
    </script>
    <?php
    }
    ?>

    <div class="box-body table-responsive" style="min-height: 500px;">
    
    <form action="" method="POST">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
		    <td width="100%"><p><b>Select Donor : </b></p></td>
      </tr>
      
      <tr>
      	<td>
          <select name="shared_to_donor" id="shared_to_donor" class="form-control" style="width: 60%;height: 35px;" >
            <option>-- Please Select --</option>

            <?php
            $query_allDonor = mysql_query("select * from tbl_donar_master where donar_id!='".$donorId['donar_id']."'");
            while ($allDonor = mysql_fetch_array($query_allDonor)){
            ?>
            <option value="<?= $allDonor['donar_id'] ?>"><?= $allDonor['first_name'].' '.$allDonor['last_name'] ?></option>
            <?php } ?>
          </select> 
        </td>
      </tr>
      
      <tr>
        <td height="30">&nbsp;</td>
      </tr>

      <tr>
        <td height="30">
          <a href="share-tagging.php?sNo=<?= $_REQUEST['sNo'] ?>"><input type="button" name="backBtn" id="backBtn" class="btn btn-success" value="Check Selection" style="width: 140px;margin: 0 20px 0 0;" /></a>

          <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-success" value="Share Children" style="width: 140px;" />
        </td>
      </tr>
    </table>

    </form>

   </div>
   <div class="box-footer clearfix">
     <ul class="pagination pagination-sm no-margin pull-right">
     <?php echo $pagingLink; ?>
     </ul>
    </div>	
     </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- add new calendar event modal -->
<!-- jQuery 2.0.2 -->

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
<!-- Jquery Confirmation -->

<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
</script>

</body>
</html>