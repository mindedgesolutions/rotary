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
/*
.footer {
	position: absolute;
	bottom: 0;
	width:100%;
	height:60px;
	background-color:#32343b;
}
*/
.footer {
    margin:0 auto;
    width:100%;
    height:auto;
    overflow:hidden;
    position: fixed;
    bottom: 0px;
    background-color:#32343b;
}

.headercol{
	background-color: #dae5f4;
}
.headercol:nth-of-type(odd){
	background-color: #b8d1f3;
}
.altcol{
	background-color : #dae5f4;
}		
.pad{
	padding-left:5px;
}
#sanctionDate{
	cursor: pointer;
}
#deleteBtn{
	position: fixed;
	bottom: 100px;
	right: 0;
}
#untagBtn{
	position: fixed;
	bottom: 50px;
	right: 0;
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

/*-------------------Select / Unselect All--------------------------*/
$(function(){
   $('#checkAllDel').click(function(){
       $('.delete_class').prop('checked', this.checked);
   });

   $('#checkAllUnap').click(function(){
       $('.unapprove_class').prop('checked', this.checked);
   });
});
</script>

</head>

<body>

<div id="load_screen"><div id="loading">Fetching data ...</div></div>

<!--<div id="load_screen"><div id="loading"><img src="ring.gif" width="60" height="60" /></div></div>-->

<!--<div id="load_screen">
	<div id="loading">
		<progress id="progressBar" value="0" max="100" style="width: 300px;height: 10px;padding: 0;border: 0;border-radius: 10px;" ></progress>
		<span id="status"></span>
	</div>
</div>

<script type="text/javascript">
function progressBarSim(al){
	var bar = document.getElementById('progressBar');
	var status = document.getElementById('status');
	status.innerHTML = al + '%';
	bar.value = al;
	al++;
	var sim = setTimeout('progressBarSim('+al+')',300);

	if (al==100){
		status.innerHTML = '100%';
		bar.value = 100;
		clearTimeout(sim);
	}
}
var amountLoaded = 0;
progressBarSim(amountLoaded);
</script>-->

<div class="wrapper" style="min-height:100%; position:relative;">
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
					<h1 style="color:#ffffff; text-align:center;">Child <!--Tagging--> Details (NGO-wise)</h1><br>
					<!--<h3 style="color: #fff;text-align: center;padding: 0;margin: 0;font-size: 100%;font-weight: normal;">You will be able to Delete (permanantly remove record) or UnApprove (move record to UnApproved List) Child Data</h3>-->
					<font color="#F4F3F3" style="float:right;">Master -> Child Tagging Details</font>
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
		<form action='' method='post' onsubmit="return validateData()">
		<div class="col-sm-12" style="padding-bottom: 100px;">

			<?php
			if (isset($_REQUEST['searchBtn'])){

				$_SESSION['filterResult'] = $_POST['selNgo'];

				$i=1;

				$createdBy=$_POST['selNgo'];

				$sql="select child_id, child_photo, child_name, child_gender, child_dob, child_father_name, child_mother_name, child_guardian_name, name_partner_ngo, create_by, create_date FROM tbl_child_profile_card where create_by='".$createdBy."' order by child_name";

				$r_query = mysql_query($sql); 
				$count = mysql_num_rows($r_query);

				if($count>0){
			?>

			<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
				<!--<thead>
			  		<tr style="height: 40px;">
				  	<th width='100%' colspan="7" style='background-color:#1980cf; text-align:center; color:#ffffff;'>
				  		<span style="float: right;margin: 2px 2% 0 0;">CHECK / UNCHECK ALL</span>
				  	</th>

				  	<th style='background-color:#1980cf; text-align:center; color:#ffffff;'>
				  		<input type="checkbox" id="checkAllDel" value="" onclick="togglecheckboxes()" style="margin: 2px 2% 0 0;" />
				  	</th>
				  	<th style='background-color:#1980cf; text-align:center; color:#ffffff;'>
				  		<input type="checkbox" id="checkAllUnap" value="" onclick="togglecheckboxes()" style="margin: 2px 2% 0 0;" />
				  	</th>
				  	</tr>
			  	</thead>-->

			  <thead>
				  <tr style="height: 40px;">
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Image</th>
				  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
				  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>NGO</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Donor ID</th>
				  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Donor Name</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Registered</th>
				  <!--<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Delete</th>
				  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Unapprove</th>-->
				  </tr>
			  </thead>
			<?php
			while ($row = mysql_fetch_array($r_query)){

				$getTagging = mysql_fetch_array(mysql_query("select donar_id from tbl_child_selected_tagging where child_id='".$row["child_id"]."'"));

				$donarName = mysql_fetch_array(mysql_query("select first_name, last_name from tbl_donar_master where donar_id='".$getTagging['donar_id']."'"));

				$ngoName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$row["create_by"]."'"));

				$registered = mysql_num_rows(mysql_query("select * from tbl_admin where idfk='".$getTagging['donar_id']."' and idfk > 0"));

				if ($registered > 0){$registered_status = 'Yes';}else{$registered_status = 'No';}
			?>
				<tr class='headercol'>
					<td class='pad' style="text-align: center;"><?= $i ?></td>

					<td class='pad' style="text-align: center;">
						<img height='100' width='100' src='http://rotaryteach.org/child_development/upload/<?= $row["child_photo"] ?>' alt="No Image">
					</td>

					<td class='pad' style="text-align: center;"><?= $row["child_name"] ?></td>

					<td class='pad' style="text-align: center;"><?= $ngoName["center_name"] ?></td>

					<td class='pad' style="text-align: center;"><?php if ($getTagging['donar_id']==''){echo 'N/A';}else{echo $getTagging['donar_id'];} ?></td>

					<td class='pad' style="text-align: center;"><?php if ($donarName["first_name"]==''){echo 'N/A';}else{echo $donarName["first_name"].' '.$donarName["last_name"];} ?></td>

					<td class='pad' style="text-align: center;"><?= $registered_status ?></td>

					<!--<td class='pad' style="text-align: center;"><input type="checkbox" class="delete_class" name="delete[]" id="del<?= $i ?>" value='<?= $row["child_id"] ?>' /></td>

					<td class='pad' style="text-align: center;"><input type="checkbox" class="unapprove_class" name="untag[]" id="untag<?= $i ?>" value='<?= $row["child_id"] ?>' /></td>-->
				</tr>
			<?php $i++;} ?>

			<?php }else{ ?>
				<tr class='headercol'>
					<td class='pad' colspan="9">No Record Found</td>
				</tr>
			<?php }} ?>
			</table>

			</div>
			<br/>
			<!--<div class='col-md-12'>
				<?php if ($ngoName["center_name"]!=''){ ?>
					<input class="btn btn-primary" type="submit" name="deleteBtn" id="deleteBtn" value="Delete Selected" style="width: 150px;" />

					<input class="btn btn-primary" type="submit" name="untagBtn" id="untagBtn" value="Unapprove Selected" style="width: 150px;" />
				<?php } ?>
			</div>-->
			</form>
		</div>
	</div>

	<?php
	if (isset($_REQUEST['deleteBtn'])){

		if ($_REQUEST['delete']!=''){

			$arrayDel = $_REQUEST['delete'];
			$arrayDel_count = count($arrayDel);

			for ($i=0; $i<$arrayDel_count; $i++){

				$getDet = mysql_fetch_array(mysql_query("select * from tbl_child_profile_card where child_id='".$arrayDel[$i]."'"));

				$query_insert = "insert into delete_child_details(child_id, child_photo, child_name, child_gender, child_dob, child_father_name, child_mother_name, child_guardian_name, previously_study, address, street, city, state, pin, name_partner_ngo, ngo_representative, ngo_contact, create_by, create_date, status, approval, type, tagged, ngoid, centerid, dateofRegularization, block, category, Differently_Abled, Learning_Disabilities, taggedid, taggeddate, basic_calculation, reason_no_school, occupation, tmp_child_id) values('".$arrayDel[$i]."', '".$getDet['child_photo']."', '".$getDet['child_name']."', '".$getDet['child_gender']."', '".$getDet['child_dob']."', '".$getDet['child_father_name']."', '".$getDet['child_mother_name']."', '".$getDet['child_guardian_name']."', '".$getDet['previously_study']."', '".$getDet['address']."', '".$getDet['street']."', '".$getDet['city']."', '".$getDet['state']."', '".$getDet['pin']."', '".$getDet['name_partner_ngo']."', '".$getDet['ngo_representative']."', '".$getDet['ngo_contact']."', '".$getDet['create_by']."', '".$getDet['create_date']."', '".$getDet['status']."', '".$getDet['approval']."', '".$getDet['type']."', '".$getDet['tagged']."', '".$getDet['ngoid']."', '".$getDet['centerid']."', '".$getDet['dateofRegularization']."', '".$getDet['block']."', '".$getDet['category']."', '".$getDet['Differently_Abled']."', '".$getDet['Learning_Disabilities']."', '".$getDet['taggedid']."', '".$getDet['taggeddate']."', '".$getDet['basic_calculation']."', '".$getDet['reason_no_school']."', '".$getDet['occupation']."', '".$getDet['tmp_child_id']."')";

				mysql_query($query_insert);

				$query_delete = "delete from tbl_child_profile_card where child_id='".$arrayDel[$i]."'";

				mysql_query($query_delete);

				$query_delete_tagging = "delete from tbl_child_selected_tagging where child_id='".$arrayDel[$i]."'";

				mysql_query($query_delete_tagging);
			}
		?>
		<script type="text/javascript">
		alert('Profiles have been deleted');
		window.location = 'edit-child-tagging.php';
		</script>
		<?php
		}else{
		?>
		<script type="text/javascript">
		alert('No child was selected');
		window.location = 'edit-child-tagging.php';
		</script>
		<?php
		}
	}else if (isset($_REQUEST['untagBtn'])){

		if ($_REQUEST['untag']!=''){

			$arrayTag = $_REQUEST['untag'];
			$arrayTag_count = count($arrayTag);

			for ($i=0; $i<$arrayTag_count; $i++){

				$getDet = mysql_fetch_array(mysql_query("select * from tbl_child_profile_card where child_id='".$arrayTag[$i]."'"));

				$query_insert = "insert into tbl_child_profile_card_temp(child_photo, child_name, child_gender, child_dob, child_father_name, child_mother_name, child_guardian_name, previously_study, address, street, city, state, pin, name_partner_ngo, ngo_representative, ngo_contact, create_by, create_date, status, approval, type, tagged, ngoid, centerid, dateofRegularization, block, category, Differently_Abled, Learning_Disabilities, taggedid, taggeddate, status_b, basic_calculation, reason_no_school, occupation) values('".$getDet['child_photo']."', '".$getDet['child_name']."', '".$getDet['child_gender']."', '".$getDet['child_dob']."', '".$getDet['child_father_name']."', '".$getDet['child_mother_name']."', '".$getDet['child_guardian_name']."', '".$getDet['previously_study']."', '".$getDet['address']."', '".$getDet['street']."', '".$getDet['city']."', '".$getDet['state']."', '".$getDet['pin']."', '".$getDet['name_partner_ngo']."', '".$getDet['ngo_representative']."', '".$getDet['ngo_contact']."', '".$getDet['create_by']."', '".$getDet['create_date']."', '".$getDet['status']."', '".$getDet['approval']."', '".$getDet['type']."', '".$getDet['tagged']."', '".$getDet['ngoid']."', '".$getDet['centerid']."', '".$getDet['dateofRegularization']."', '".$getDet['block']."', '".$getDet['category']."', '".$getDet['Differently_Abled']."', '".$getDet['Learning_Disabilities']."', '".$getDet['taggedid']."', '".$getDet['taggeddate']."', 't', '".$getDet['basic_calculation']."', '".$getDet['reason_no_school']."', '".$getDet['occupation']."')";

				mysql_query($query_insert);

				$query_delete = "delete from tbl_child_profile_card where child_id='".$arrayTag[$i]."'";

				mysql_query($query_delete);

				$query_delete_tagging = "delete from tbl_child_selected_tagging where child_id='".$arrayTag[$i]."'";

				mysql_query($query_delete_tagging);
			}
		?>
		<script type="text/javascript">
		alert('Profiles have been moved to unapproved list and donors have been untagged');
		//window.location = 'edit-child-tagging.php';
		</script>
		<?php
		}else{
		?>
		<script type="text/javascript">
		alert('No child was selected');
		window.location = 'edit-child-tagging.php';
		</script>
		<?php
		}
	}
	?>

	<div id="footer" >
	<?php
	  include('include/footer.php');
	?>
	</div>

</div>
</body>
</html>