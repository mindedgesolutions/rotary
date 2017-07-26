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
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="js/jquery-ui.css" rel="stylesheet" media="screen" />



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />

<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<style>
.footer {
	position: absolute;
	bottom: 0;
	width:100%;
	height:60px;
	background-color:#32343b;
}
.headercol
{
	background-color : #b8d1f3;
}
.altcol
{
	background-color : #dae5f4;
}		
.pad
{
	padding-left:5px;
}
#sanctionDate{
	cursor: pointer;
}
</style>

<script type="text/javascript">
$(function() {
    $( "#sanctionDate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1900:2100",
        maxDate: '0',
        dateFormat: 'dd-mm-yy'
    });
});

function checkDate(){

	var sanctionDate = $('#sanctionDate').val();

	if (sanctionDate==''){
		alert('Please enter sanction date');
		return false;
	}
}
</script>
</head>

<body>
<div class="wrapper" style="min-height:100%; position:relative;">
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
					<h1 style="color:#ffffff; text-align:center;">Child List for Sanction</h1>
					<font color="#F4F3F3" style="float:right;">Master -> Child Sanction</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
			<div class="container">

				<form action="" method="post"> 
					<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:10px; padding : 5px;">Search</div>
						
							
					<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
						<div class="form-group" >
							<br/>									
							<select class="form-control" id="selNgo" name="selNgo" >
							<option value="">-- Select NGO --</option>
							<?php		
							$sql="select username,center_name from tbl_admin where type='NGO' and center_name!='' and status='Active' order by center_name;";
							$result = mysql_query($sql);
							while($row = mysql_fetch_array($result)) {
							?>
							<option value="<?= $row['username'] ?>" <?php if ($row['username']==$_REQUEST['selNgo']){echo 'selected';} ?>><?= $row['center_name'] ?></option>
							<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
						<div class="form-group" >
						<br/>									
							<input class="btn btn-primary" type="submit" name="searchBtn" value="Search" />
						</div>
					</div>
				</form>
				<br/>
			</div>
			<!--Record Searching End-->
		</div>
	</div>

	<br/>

	
<!--insert div-->
<div class="container">
	<div class="row">
		<form action='' method='post' onsubmit="return checkDate()">
		<div class="col-sm-12">

			<?php
			if (isset($_REQUEST['searchBtn'])){

				$createdBy=$_POST['selNgo'];

				$sql="select child_id, child_photo, child_name, child_gender, child_dob, child_father_name, child_mother_name, child_guardian_name, name_partner_ngo, create_by, create_date FROM tbl_child_profile_card_temp where create_by='". $createdBy ."' and status_b='a'";

				$r_query = mysql_query($sql); 
				$count = mysql_num_rows($r_query);

				if($count>0){
			?>
			<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
			  <thead>
				  <tr>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Image</th>
				  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Gender</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>DOB/Age</th>
				  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Father Name</th>
				  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Mother Name</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>View</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Approve</th>
				  </tr>
			  </thead>
			<?php
			while ($row = mysql_fetch_array($r_query)){  
			?>
				<tr class='headercol'>
					<td class='pad'><?= $i ?></td>

					<td class='pad'>
						<img height='100' width='100' src='http://rotaryteach.org/child_development/upload/<?= $row["child_photo"] ?>'>
					</td>

					<td class='pad'><?= $row["child_name"] ?></td>

					<td class='pad'><?= $row["child_gender"] ?></td>

					<td class='pad'><?= $row["child_dob"] ?></td>

					<td class='pad'><?= $row["child_father_name"] ?></td>

					<td class='pad'><?= $row["child_mother_name"] ?></td>

					<td class='pad' style='text-align:center;'>
						<a href="viewChildProfile.php?id=<?= $row['child_id'] ?>" target='_blank' style='color: #2288f1;' >View</a>
					</td>

					<td style='text-align:center;'><input type='checkbox' name='check_list[]' value="<?= $row['child_id'] ?>" id='chk".$i."'></td>
				</tr>
			<?php $i = $i+1; }  ?>

				<tr style="height: 80px;">
					<td colspan="9">
						<table width="100%">
							<tr>
								<td width="40%" style="text-align: right;">Sanction Date : </td>

								<td width="60%" style="box-sizing: border-box;padding: 0 0 0 20px;">
									<input type="text" name="sanctionDate" id="sanctionDate" value="" readonly="readonly" class="form-control" />
								</td>
							</tr>
						</table>
					</td>
				</tr>

			<?php }else{ ?>
				<tr class='headercol'>
					<td class='pad' colspan="9">No Record Found</td>
				</tr>
			<?php }} ?>
			</table>

			</div>
			<br/>
			<div class='col-md-12'>
				<center><input class='btn btn-primary' type='submit' name='submit' value='Approved'></center>
			</div>
			</form>
		</div>
	</div>

	<?php
	if (isset($_REQUEST['submit']) && $_REQUEST['check_list']!=''){

		$sanctionDate = date('Y-m-d', strtotime($_REQUEST['sanctionDate']));
		$checkValue = $_REQUEST['check_list'];
		$arrayCount = count($checkValue);

		for ($i=0; $i<$arrayCount; $i++){

			$getDet = mysql_fetch_array(mysql_query("select * from tbl_child_profile_card_temp where child_id='".$checkValue[$i]."'"));

			$updateQuery = "update tbl_child_profile_card_temp set status_b='s', sanction_date='".$sanctionDate."' where child_id='".$checkValue[$i]."'";

			mysql_query($updateQuery);

			$insertQuery = "insert into tbl_child_profile_card(child_photo, child_name, child_gender, child_dob, child_father_name, child_mother_name, child_guardian_name, previously_study, address, street, city, state, pin, name_partner_ngo, create_by, create_date, status, approval, type, tagged, basic_calculation, reason_no_school, occupation, tmp_child_id) values('".$getDet['child_photo']."', '".$getDet['child_name']."', '".$getDet['child_gender']."', '".$getDet['child_dob']."', '".$getDet['child_father_name']."', '".$getDet['child_mother_name']."', '".$getDet['child_guardian_name']."', '".$getDet['previously_study']."', '".$getDet['address']."', '".$getDet['street']."', '".$getDet['city']."', '".$getDet['state']."', '".$getDet['pin']."', '".$getDet['name_partner_ngo']."', '".$getDet['create_by']."', '".$getDet['create_date']."', '1', '".$getDet['approval']."', 'NGO', 'no', '".$getDet['basic_calculation']."', '".$getDet['reason_no_school']."', '".$getDet['occupation']."', '".$checkValue[$i]."')";

			mysql_query($insertQuery);
		}
	?>
	<script type="text/javascript">
		alert('Details Have Been Saved Successfully');
		window.location = 'child_unsanctioned.php';
	</script>
	<?php
	}
	?>

	<div id="footer">
	<?php
	  include('include/footer.php');
	?>
	</div>

</div>
</body>
</html>
