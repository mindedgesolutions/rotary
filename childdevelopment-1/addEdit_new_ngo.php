<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$i=1;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>

<style>
.footer {
	position: absolute;
	bottom: 0;
	width:100%;
	height:60px;
	background-color:#32343b;
}
.altcol{
	background-color : #dae5f4;
}		
.pad{
	padding-left:5px;
}
.headercol{
	background-color: #dae5f4;
	height: 50px;
}
.headercol:nth-of-type(odd){
	background-color: #b8d1f3;
	height: 50px;
}
</style>
</head>

<body>
<div class="wrapper">
	<header>
	  <div class="logo"> <a href="edit-child-tagging-dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
	  <?php include('include/mainnav.php'); ?>
	  <div class="clearfix"></div>
	</header>
	<div class="structure-row alone"> 
		<div class="right-sec"> 
			<header> 
			  <?php include('include/child_header.php'); ?>
				<div>
					<h1 style="color:#ffffff; text-align:center;">NGO List</h1>
					<font color="#F4F3F3" style="float:right;">Master -> NGO</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
			<div class="container">

				<div class="col-sm-12" align="left" style="height : 35px; color: #ffffff; margin-top:10px; margin-left:10px; padding : 5px;">
					<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" value="Add New NGO" onClick="Javascript:window.location.href = 'http://rotaryteach.org/childdevelopment/add_new_ngo.php';" />
				</div>
				
				<br/>
			</div>
			<!--Record Searching End-->
		</div>
	</div>
	<br/>
<div class="container">
<div class="col-sm-12" style="padding-bottom: 100px;">


<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
	<thead>							
		<tr>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
			<th width='8%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>User Name</th>
			<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>First Name</th>
			<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Last Name</th>
			<th width='18%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>E-Mail</th>
			<th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>NGO Name</th>
			<th width='8%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Total Children</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Edit</th>
			<th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>View Children</th>
			<th width='6%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Marks</th>
		</tr>
	</thead>

	<?php
	$i = 1;

	$query_getDet = "select * from tbl_admin where type='NGO' and status='Active'";
	$result_getDet = mysql_query($query_getDet);
	while ($getDet = mysql_fetch_array($result_getDet)){

		$getTotal = mysql_fetch_array(mysql_query("select count(child_id) as ch_count from tbl_child_profile_card where create_by='".$getDet['username']."'"));
	?>

	<tr class='headercol' style="text-align: center;">

		<td class='pad'><?= $i ?></td>

		<td class='pad'><?= $getDet['username'] ?></td>		

		<td class='pad'><?= $getDet['firstname'] ?></td>

		<td class='pad'><?= $getDet['lastname'] ?></td>

		<td class='pad'><?= $getDet['email'] ?></td>

		<td class='pad'><?= $getDet['center_name'] ?></td>

		<td class='pad'><?= $getTotal['ch_count'] ?></td>

		<td class='pad' style='text-align:center;'><a href="edit_ngo_center.php?id=<?= $getDet["id"] ?>" >Edit</a></td>

		<td class='pad' style='text-align:center;'><a href="child_approved_redirect.php?uid=<?= base64_encode($getDet["username"]) ?>&ngo=<?= base64_encode($getDet["center_name"]) ?>" >View Children</a></td>

		<td class='pad' style='text-align:center;'>
			<?php if ($getDet['examtype']=='Quarterly'){ ?>
			<a href="child_progress_report.php?createdBy=<?= base64_encode($getDet['username']) ?>" target='_blank' >Update</a>
			<?php }else{ ?>
			N/A
			<?php } ?>
		</td>
	</tr>
	<?php $i++;} ?>
</table>

<br/>
</div>

</div>

<?php
	include('include/footer.php');
?>

</div>

</body>
</html>
