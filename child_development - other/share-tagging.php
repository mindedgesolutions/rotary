<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$i=1;
$user_email = $_SESSION['email'];
//donar_id = '$donar_id' AND 
$child = '';
$rowsPerPage = 100;
//$sql = "Select * from tbl_donar_master where donar_email = '$user_email'";
$sql = "Select * from tbl_donar_master where donar_email = '$user_email' ORDER BY donar_id limit 1";

$query = mysql_query($sql);
while($data = mysql_fetch_array($query)){
	extract($data);
}
$sql3 = "SELECT * FROM  tbl_child_selected_tagging WHERE donar_id = '$donar_id'";
$result3     = dbQuery(getPagingQuery($sql3, $rowsPerPage));
$count = mysql_num_rows($result3);
$pagingLink = getPagingLink($sql3, $rowsPerPage);

$status = '';

$donorId = mysql_fetch_array(mysql_query("select donar_id from tbl_donar_master where donar_email='".$user_email."'"));

$a = mysql_query("select * from share_tagged_child_details_temp where shared_by_donor='".$donorId['donar_id']."'");
while ($b = mysql_fetch_array($a)){

  $id_array[] = $b['child_id'];
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<style type="text/css">
.btn-holder{
  width: 140px;
  height: 50px;
  position: fixed;
  right: 0;
  bottom: 20px;
}
</style>

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
					<td width="80%"><p>: <?php echo $count; ?></p></td>
				</tr>
			</table>
		</div>
	</b>
	<hr>
    
    <?php
    if (isset($_REQUEST['submitBtn'])){

      $tagId = '';

      if (!empty($_REQUEST['chkbox'])){

        /*-------------Generate ID starts-------------*/

        if (base64_decode($_REQUEST['sNo'])==''){

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
          /*--------------Generate ID ends--------------*/

          $insertMaster = "insert into share_tagged_child_master(share_id, shared_by_donor, shared_date) values('".$sNo."', '".$donorId['donar_id']."', '".date('Y-m-d')."')";

          mysql_query($insertMaster);

          $childId = $_REQUEST['chkbox'];
          $arrayCount = count($_REQUEST['chkbox']);
          for ($i=0; $i<$arrayCount; $i++){

            $tagId = $tagId.$childId[$i].'+';

            $insertQry = "insert into share_tagged_child_details_temp(child_id, shared_by_donor, share_date, share_id) values('".$childId[$i]."', '".$donorId['donar_id']."', '".date('Y-m-d')."', '".$sNo."')";

            mysql_query($insertQry);
          }
        ?>
        <script type="text/javascript">
        window.location = 'share-tagging-2.php?sNo=<?= base64_encode($sNo) ?>&sharedBy=<?= base64_encode($donorId['donar_id']) ?>';
        </script>
        <?php
        }else{

          $deleteTemp = "delete from share_tagged_child_details_temp where share_id='".base64_decode($_REQUEST['sNo'])."'";

          mysql_query($deleteTemp);

          $childId = $_REQUEST['chkbox'];
          $arrayCount = count($_REQUEST['chkbox']);
          for ($i=0; $i<$arrayCount; $i++){

            $tagId = $tagId.$childId[$i].'+';

            $insertQry = "insert into share_tagged_child_details_temp(child_id, shared_by_donor, share_date, share_id) values('".$childId[$i]."', '".$donorId['donar_id']."', '".date('Y-m-d')."', '".base64_decode($_REQUEST['sNo'])."')";

            mysql_query($insertQry);
          }
        ?>
        <script type="text/javascript">
        window.location = 'share-tagging-2.php?sNo=<?= $_REQUEST['sNo'] ?>&sharedBy=<?= base64_encode($donorId['donar_id']) ?>';
        </script>
        <?php
        }
      }else{
      ?>
      <script type="text/javascript">
      alert('Select at least one child to proceed');
      window.location = 'share-tagging.php';
      </script>
      <?php
      }
    }
    ?>

    <div class="box-body table-responsive">
    
    <form action="" method="POST">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr style="text-align: center;">
		    <td width="5%"><p><b>Sl. No.</b></p></td>
        <td width="10%"><p><b>Sponsored Child</b></p></td>
        <td width="22%"><p><b>Child Name</b></p></td>
		    <td width="10%"><p><b>Date</b> </p></td>
        <td width="11%"><p><b>NGO Partner</b></p></td>
        <td width="8%" style="padding: 0 0 0 5px;"><p><b>Select Child</b></p></td>
        <td width="22%" style="padding: 0 0 0 10px;"><p><b>Dedicated To</b></p></td>
        <td width="12%"><p><b>Action</b></p></td>
      </tr>
      <?php
	  	while($row_catagory = mysql_fetch_array($result3)){
	  	extract($row_catagory);
		
  		$sql = "SELECT * FROM tbl_child_profile_card where child_id = '$child_id'";
  		$query = mysql_query($sql);
  		while($data = mysql_fetch_array($query)){
        extract($data);
		  }

  		$sql1 = "SELECT * FROM  tbl_donar_master WHERE donar_id = '$donar_id'";
  		$resu = mysql_query($sql1);
  		while($ans = mysql_fetch_array($resu)){
        extract($ans);

        $check_status = mysql_fetch_array(mysql_query("select status from share_tagged_child_details_temp where child_id='".$child_id."' and shared_to_donor!=''"));
      ?>
      <tr style="text-align: center;">
      	<td><p><?php echo $i; ?></p></td>
        <td><p><img src="../upload/<?php echo $child_photo; ?>" height="50" width="50" alt="no image"/></p></td>
        <td><p><?php echo ucfirst($child_name); ?></p></td>
		    <td><p><?php echo ucfirst($create_date); ?></p></td>
        <td><p><?php echo ucfirst($name_partner_ngo); ?></p></td>

        <td style="padding: 0 0 0 20px;">
          <input type="checkbox" name="chkbox[]" <?php if ((in_array($child_id, $id_array)) && $check_status['status']!=''){echo 'disabled';}else if ((in_array($child_id, $id_array)) && $check_status['status']==''){echo 'checked';} ?> id="cbox<?= $i ?>" value="<?= $child_id ?>" />
        </td>

        <td style="padding: 0 0 0 10px;">
          <p>
            <?php
            $getDet = mysql_fetch_array(mysql_query("select * from share_tagged_child_details where child_id='".$child_id."'"));

            $donorName = mysql_fetch_array(mysql_query("select name from honor_master where SLN='".$getDet['shared_to_donor']."'"));

            echo $donorName['name'];
            ?> 
          </p>
        </td>

        <td>
          <?php
          if ($check_status['status']!=''){
          ?>
          <a href="share-tagging-3.php?childId=<?= base64_encode($child_id) ?>&sharedBy=<?= base64_encode($donorId['donar_id']) ?>">Edit Dedicated To</a>
          <?php
          }else{
            echo 'N/A';
          }
          ?>
        </td>
      </tr>
      <?php
        $i=$i+1;
      }
    }
    ?>
      <tr>
        <td height="30" colspan="8">&nbsp;</td>
      </tr>
    </table>

    <div class="btn-holder"><input type="submit" name="submitBtn" id="submitBtn" class="btn btn-success" value="Done Selecting" style="width: 140px;background-color: #367fa9;" /></div>

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