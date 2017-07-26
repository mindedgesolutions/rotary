<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
//$_SESSION['username'];
$_SESSION['ngo_name'];
//$_SESSION['type'];
//$_SESSION['uid'];

$uid = $_SESSION['uid'];
$ngo_user_name = $_SESSION['username'];
$type=$_SESSION['type'];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" /> 


<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<style type="text/css">
thead{
	background-color:#1980cf; text-align:center; color:#ffffff;
}
.headercol{
	background-color : #b8d1f3;
}
.altcol{
	background-color : #dae5f4;
}		
.pad{
	padding-left:5px;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<header> 
  	<!-- Logo Start -->
  		<div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
  		<!-- Logo End --> 
  		<!-- Sidebar Navigation Start -->
  		<?php include('include/mainnav.php'); ?>
  		<div class="clearfix"></div>
 	 	<!-- Sidebar Navigation End --> 
	</header>

	<div class="structure-row alone"> 
  		<div> 

			<header> 
		      	<?php include('include/child_header.php'); ?>

		      	<div class="clearfix"></div>
		    </header>

    		<br>
  
			<div class="container">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">

						<form action="" method="post">

						<table width="100%">
							<tr>
								<td width="20%" style="text-align: right;padding: 0 10px 0 0;">Select Donor : </td>
								<td width="30%">
									<select name="donorId" id="donorId" class="form-control" style="width: 95%;">
										<option value="">-- Please Select --</option>

										<?php
										$query_getDonor = mysql_query("select * from tbl_donar_master where actual_tagging!=''");
										while ($getDonor = mysql_fetch_array($query_getDonor)){
										?>
										<option value="<?= $getDonor['donar_id'] ?>" <?php if ($_REQUEST['donorId']==$getDonor['donar_id']){echo 'selected';} ?>><?= $getDonor['first_name'].' '.$getDonor['last_name'] ?></option>
										<?php } ?>
									</select>
								</td>
								<td width="50%">
									<input type="submit" name="submitBtn" id="submitBtn" value="Submit" class="btn btn-primary" style="width: 100px;" />
								</td>
							</tr>
						</table>

						</form>

						</div>

						<form action="" method="post">

						<div class="col-sm-12">

						<?php
							if (isset($_REQUEST['submitBtn'])){

								if ($_REQUEST['donorId']!=''){

									$getCount = mysql_fetch_array(mysql_query("select * from tbl_donar_master where donar_id='".$_REQUEST['donorId']."'"));

									$taggedCount = mysql_fetch_array(mysql_query("select count(child_id) as ch_id from tbl_child_selected_tagging where donar_id='".$_REQUEST['donorId']."'"));
						?>

						<input type="hidden" name="donor_id" id="donor_id" value="<?= $_REQUEST['donorId'] ?>" />

						<table width="100%" style='font-family: Droid Sans, sans-serif;margin: 30px 0 0 0;'>
							<tr style="line-height: 40px;">
								<td width="20%" style="text-align: right;padding: 0 15px 0 0;">Donor ID : </td>
								<td width="30%"><?= $_REQUEST['donorId'] ?></td>

								<td colspan="2">&nbsp;</td>
							</tr>

							<tr style="line-height: 40px;">
								<td width="20%" style="text-align: right;padding: 0 15px 0 0;">Tagged Children : </td>
								<td width="30%"><?= $taggedCount['ch_id'] ?></td>

								<td width="20%" style="text-align: right;padding: 0 15px 0 0;">Count as per Accounts Team : </td>
								<td width="30%"><?php if ($getCount['accounts_count']==''){echo '0';}else{echo $getCount['accounts_count'];} ?></td>
							</tr>
						</table>

						<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;margin: 30px 0 0 0;'>
							<thead>
								<td width="7%">Child ID</td>
								<td width="13%">Image</td>
								<td width="15%">Child Name</td>
								<td width="20%">Father's Name</td>
								<td width="15%">Mother's Name</td>
								<td width="20%">NGO</td>
								<td width="10%">Action</td>
							</thead>
						<?php
							$i = 1;

							$query_getDet = mysql_query("select * from tbl_child_selected_tagging where donar_id='".$_REQUEST['donorId']."'");
							while ($getDet = mysql_fetch_array($query_getDet)){

								$childDet = mysql_fetch_array(mysql_query("select * from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));

								$getNgo = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$childDet['create_by']."'"));
							?>
							<tr class='headercol'>
								<td class='pad' style="text-align: center;"><?= $getDet['child_id'] ?></td>

								<td class='pad' style="text-align: center;"><img height='100' width='100' alt="No Image Available" src='http://rotaryteach.org/child_development/upload/<?= $childDet['child_photo'] ?>'></td>

								<td class='pad' style="text-align: center;"><?= $childDet['child_name'] ?></td>

								<td class='pad' style="text-align: center;"><?php if ($childDet['child_father_name']==''){echo '--';}else{echo $childDet['child_father_name'];} ?></td>

								<td class='pad' style="text-align: center;"><?php if ($childDet['child_mother_name']==''){echo '--';}else{echo $childDet['child_mother_name'];} ?></td>

								<td class='pad' style="text-align: center;"><?= $getNgo['center_name'] ?></td>

								<td class='pad' style="text-align: center;">
									<input type="checkbox" name="untag[]" value="<?= $getDet['child_id'] ?>" />
								</td>
							</tr>
							<?php $i++;}}else{ ?>
							<tr class='headercol'>
								<td class='pad' colspan="7" style="text-align: center;">No donor selected</td>
							</tr>
							<?php }} ?>
						</table>

						</div>

						<div class='col-md-12' style="margin: 50px 0 0 0;">
							<center><input class='btn btn-primary' type='submit' name='untagBtn' id="untagBtn" value='Untag Children' style="width: 120px;" /></center>
						</div>

						</form>

						<?php
						if (isset($_REQUEST['untagBtn'])){

							$untagCheck = $_REQUEST['untag'];
							$count = count($_REQUEST['untag']);

							for ($n = 0; $n <= $count; $n++){

								if ($untagCheck[$n]!=''){

									$insert = "insert into delete_by_accounts(donor_id, child_id, action_date) values('".$_REQUEST['donor_id']."', '".$untagCheck[$n]."', '".date('Y-m-d')."')";

									mysql_query($insert);
								}

								$updateChild = "update tbl_child_profile_card set tagged='no' where child_id='".$untagCheck[$n]."'";
								mysql_query($updateChild);

								$deleteTagging = "delete from tbl_child_selected_tagging where child_id='".$untagCheck[$n]."'";
								mysql_query($deleteTagging);

								$updateDonor = "update tbl_donar_master set accounts_update='yes' where donar_id='".$_REQUEST['donor_id']."'";
								mysql_query($updateDonor);
							}
						?>
						<script type="text/javascript">
						alert('Success');
						window.location = 'untag-children.php';
						</script>
						<?php
						}
						?>
					</div>
				</div>
			</div>
  
			<?php include('include/footer.php'); ?>	
	
  		</div>
  	</div>

</body>
</html>