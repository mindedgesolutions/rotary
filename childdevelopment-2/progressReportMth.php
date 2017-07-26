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
}
.headercol:nth-of-type(odd){
	background-color: #b8d1f3;
}
</style>	
</head>

<body>
<div class="wrapper">
	<header>
	  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
	  <?php include('include/mainnav.php'); ?>
	  <div class="clearfix"></div>
	</header>
	<div class="structure-row alone"> 
		<div class="right-sec"> 
			<header> 
			  <?php include('include/child_header.php'); ?>
				<div>
					<h1 style="color:#ffffff; text-align:center;">Monthly Progress Report Uploaded</h1>
					<font color="#F4F3F3" style="float:right;">Master -> NGO</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
			
			<!--Record Searching End-->
		</div>
	</div>
	<br/>

	<div class="container">
		<div class="col-sm-12">
<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
	<thead>							
		<tr style="height: 50px;">
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
			<th width='18%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>NGO Name</th>
			<th width='7%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Total Children</th>	
			
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Jan</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Feb</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Mar</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Apr</th>

			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>May</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Jun</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Jul</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Aug</th>

			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sep</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Oct</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Nov</th>
			<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Dec</th>
		</tr>
	</thead>

	<?php
	$i = 1;

	$query_getDet = "select * from tbl_admin where type='NGO' and status='Active' and examtype='Monthly'";
	$result_getDet = mysql_query($query_getDet);
	while ($getDet = mysql_fetch_array($result_getDet)){

		$getTotal = mysql_fetch_array(mysql_query("select count(child_id) as ch_count from tbl_child_profile_card where create_by='".$getDet['username']."'"));

		$jan = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt1 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='January' and year='2017' "));

		$feb = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt2 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='February' and year='2017' "));

		$mar = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt3 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='March' and year='2017' "));

		$apr = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt4 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='April' and year='2017' "));		

		
		$may = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt5 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='May' and year='2017' "));

		$jun = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt6 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='June' and year='2017' "));

		$jul = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt7 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='July' and year='2017' "));

		$aug = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt8 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='August' and year='2017' "));	

	
		$sep = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt9 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='September' and year='2017' "));

		$oct = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt10 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='October' and year='2017' "));

		$nov = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt11 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='November' and year='2017' "));

		$dec = mysql_fetch_array(mysql_query("select count(distinct(stud_id)) as cnt12 from tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$getDet['username']."' and monname='December' and year='2017' "));	
	?>

	<tr class='headercol' style="text-align: center;height: 50px;">

		<td class='pad'><?= $i ?></td>

		<td class='pad'><?= $getDet['center_name'] ?></td>

		<td class='pad'><?= $getTotal['ch_count'] ?></td>

		<td class='pad'><?= $jan['cnt1'] ?></td>

		<td class='pad'><?= $feb['cnt2'] ?></td>

		<td class='pad'><?= $mar['cnt3'] ?></td>

		<td class='pad'><?= $apr['cnt4'] ?></td>

		<td class='pad'><?= $may['cnt5'] ?></td>

		<td class='pad'><?= $jun['cnt6'] ?></td>

		<td class='pad'><?= $jul['cnt7'] ?></td>

		<td class='pad'><?= $aug['cnt8'] ?></td>

		<td class='pad'><?= $sep['cnt9'] ?></td>

		<td class='pad'><?= $oct['cnt10'] ?></td>

		<td class='pad'><?= $nov['cnt11'] ?></td>

		<td class='pad'><?= $dec['cnt12'] ?></td>

	</tr>
	<?php $i++;} ?>
</table>



	<br/>
		</div>

	</div>

<?php include('include/footer.php'); ?>

</div>

</body>
</html>
