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

$currentDonor = mysql_fetch_array(mysql_query("select * from share_tagged_child_details where child_id='".base64_decode($_REQUEST['childId'])."'"));

$currentCount = mysql_fetch_array(mysql_query("select shared_count from share_tagged_child_master where shared_by_donor='".base64_decode($_REQUEST['sharedBy'])."' and shared_to_donor='".$currentDonor['shared_to_donor']."'"));
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

      if ($_REQUEST['shared_to_donor']==''){
      ?>
      <script type="text/javascript">
      alert('No donor is selected');
      </script>
      <?php
      }else{

        $presentCount = $currentCount['shared_count'] - 1;

        $updateMaster = "update share_tagged_child_master set shared_count='".$presentCount."' where shared_by_donor='".base64_decode($_REQUEST['sharedBy'])."' and shared_to_donor='".$currentDonor['shared_to_donor']."'";

        mysql_query($updateMaster);

        $checkMaster = mysql_num_rows(mysql_query("select * from share_tagged_child_master where shared_by_donor='".base64_decode($_REQUEST['sharedBy'])."' and shared_to_donor='".$_REQUEST['shared_to_donor']."'"));

        if ($checkMaster==0){

          $select = "select max(SLN) as SLN from share_tagged_child_master";
          $result=mysql_query($select);
          $row=mysql_fetch_array($result);

          if($row['SLN']==0)
          {
              $sNo = "SH/0001";
          }
          else
          {
              $NewSLN=$row['SLN']+1;
              $NewSLN_length=strlen($NewSLN);

              if($NewSLN_length==1)
              {
                  $NewSLN = "000".$NewSLN;
              }
              else if($NewSLN_length==2)
              {
                  $NewSLN = "00".$NewSLN;
              }
              else if($NewSLN_length==3)
              {
                  $NewSLN = "0".$NewSLN;
              }
              else
              {
                  $NewSLN = $NewSLN;
              }
              $sNo = "SH/".($NewSLN);
          }

          $insertQry = "insert into share_tagged_child_master(share_id, shared_by_donor, shared_to_donor, shared_count, shared_date, status) values('".$sNo."', '".base64_decode($_REQUEST['sharedBy'])."', '".$_REQUEST['shared_to_donor']."', '1', '".date('Y-m-d')."', 'complete')";

          mysql_query($insertQry);

          $updateDetails = "update share_tagged_child_details set shared_to_donor='".$_REQUEST['shared_to_donor']."', share_id='".$sNo."' where child_id='".base64_decode($_REQUEST['childId'])."'";

          mysql_query($updateDetails);

          $updateTemp = "update share_tagged_child_details_temp set shared_to_donor='".$_REQUEST['shared_to_donor']."', share_id='".$sNo."' where child_id='".base64_decode($_REQUEST['childId'])."'";

          mysql_query($updateTemp);
        ?>
        <script type="text/javascript">
        alert('Sharing is done');
        window.location = 'share-tagging.php';
        </script>
        <?php
        }else{

          $updatedCount = $currentCount['shared_count'] + 1;

          $updateQry = "update share_tagged_child_master set shared_count='".$updatedCount."' where shared_by_donor='".base64_decode($_REQUEST['sharedBy'])."' and shared_to_donor='".$_REQUEST['shared_to_donor']."'";

          mysql_query($updateQry);

          $updateDetails = "update share_tagged_child_details set shared_to_donor='".$_REQUEST['shared_to_donor']."' where child_id='".base64_decode($_REQUEST['childId'])."'";

          mysql_query($updateDetails);

          $updateTemp = "update share_tagged_child_details_temp set shared_to_donor='".$_REQUEST['shared_to_donor']."' where child_id='".base64_decode($_REQUEST['childId'])."'";

          mysql_query($updateTemp);
        ?>
        <script type="text/javascript">
        alert('Sharing is done');
        window.location = 'share-tagging.php';
        </script>
        <?php
        }
      }
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
            $query_allDonor = mysql_query("select * from honor_master where status='active'");
            while ($allDonor = mysql_fetch_array($query_allDonor)){
            ?>
            <option value="<?= $allDonor['SLN'] ?>"><?= $allDonor['name'] ?></option>
            <?php } ?>
          </select> 
        </td>
      </tr>
      
      <tr>
        <td height="30">&nbsp;</td>
      </tr>

      <tr>
        <td height="30">
          <a href="share-tagging.php"><input type="button" name="backBtn" id="backBtn" class="btn btn-success" value="Back to List" style="width: 140px;margin: 0 20px 0 0;" /></a>

          <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-success" value="Save Details" style="width: 140px;" />
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