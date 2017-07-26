<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['assessment_id'] = $_REQUEST['assessid'];

$getngo = mysql_fetch_array(mysql_query("select * from asha_kiran_center_rating where assessment_id='".base64_decode($_REQUEST['assessid'])."'"));
$createby = mysql_fetch_array(mysql_query("select username from tbl_admin where id='".$getngo['ngo']."'"));
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

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/overcast/jquery-ui.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<style type="text/css">
.table_tr{
	height: 50px;
}
.table_label{
	box-sizing: border-box;
	padding: 0 20px 0 0;
	font-size: 100%;
	text-align: right;
}
input[type="radio"]{
	margin: 0 10px 0 0;
}
#form_section{
	background-color: #dbdbdb;
	box-sizing: border-box;
	padding: 0 20px 10px 0;
	margin: 10px 0;
}
.part_haeder{
	width: 100%;
	height: auto;
	float: left;
	background-color: #34363d;
	margin: 10px;
}
#last_visit, #current_visit, #visit_date{
	cursor: pointer;
}
.table_head{
	height: auto;
	line-height: 15px;
	text-align: center;
	background-color: #34363d;
	color: #fff;
}
.table_head_td{
	padding: 10px 0;
	text-align: center;
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
function getChDet(){
	var response_child = $('#response_child').val();

	if (response_child!=''){
		$.ajax({
			url: 'get-child-details.php',
			type: 'post',
			data: 'response_child=' + response_child,
			success: function(f){

				var array_data = f.split("|");
        		var age = array_data[0],
            		gender = array_data[1];
				$('#child_age').val(age);
				$('#child_gender').val(gender);
			}
		})
	}
}
function addData(){
	var assessid = $('#assessid').val();
	var response_child = $('#response_child').val();
	var is_happy = $('#is_happy').val();
	var attendance_pattern = $('#attendance_pattern').val();
	var participation = $('#participation').val();
	var read_ability = $('#read_ability').val();
	var write_ability = $('#write_ability').val();

	$.ajax({
		url: 'add_temp_data.php',
		type: 'post',
		data: 'assessid=' + assessid + '&response_child=' + response_child + '&is_happy=' + is_happy + '&attendance_pattern=' + attendance_pattern + '&participation=' + participation + '&read_ability=' + read_ability + '&write_ability=' + write_ability,
		success: function(f){
			document.getElementById('response_child').value = '';
			document.getElementById('child_age').value = '';
			document.getElementById('child_gender').value = '';
			document.getElementById('is_happy').value = '1';
			document.getElementById('attendance_pattern').value = '1';
			document.getElementById('participation').value = '1';
			document.getElementById('read_ability').value = '1';
			document.getElementById('write_ability').value = '1';
			$('#showTable').html(f);
		}
	})
}
function deleteRow(par){
	var assessid = $('#assessid').val();
	var dbsln = $('#dbsln'+par).val();

	$.ajax({
		url: 'delete_temp_data.php',
		type: 'post',
		data: 'assessid=' + assessid + '&dbsln=' + dbsln,
		success: function(f){
			alert('Deleted successfully');
			$('#showTable').html(f);
		}
	})
}
window.addEventListener('load', function(){
	var load_screen = document.getElementById('load_screen');
	document.body.removeChild(load_screen);
})
</script>

</head>

<body onload="addData()">

<div id="load_screen"><div id="loading">Saving data ...</div></div>

<input type="hidden" name="assessid" id="assessid" value="<?= base64_decode($_REQUEST['assessid']) ?>" />

<div class="wrapper">
<header>
	<div class="logo"><a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a></div>
	<?php include('include/mainnav.php'); ?>
	<div class="clearfix"></div>
</header>

<div class="structure-row alone"> 
	<div> 
		<header> 
			<?php include('include/child_header.php'); ?>
			<div class="clearfix"></div>
		</header>
  
		<div class="container">
								
			<div class="col-sm-12"><center><h1>ASHA KIRAN CENTRE VISIT – RATING</h1></center></div>

			<div class="container">

				<?php
				if (isset($_REQUEST['saveBtn'])){

					$check = mysql_fetch_array(mysql_query("select count(id) as row_id from asha_kiran_child_response_temp where assessment_id='".base64_decode($_REQUEST['assessid'])."'"));

					if ($check['row_id']==0){
					?>
					<script type="text/javascript">
					alert('Response from children are missing');
					window.location = 'center-rating-2.php?assessid=<?= $_REQUEST['assessid'] ?>';
					</script>
					<?php
					}else{

						$val = $_REQUEST['particularVal'];
						$location_appropriate = $val[0];
						$rilm_logo = $val[1];
						$att_visit_day = $val[2];
						$safe_for_children = $val[3];
						$cleanliness = $val[4];
						$seating_arrangement = $val[5];
						$group_seating = $val[6];
						$adequate_content = $val[7];
						$transact_lessons = $val[8];
						$engagement_teacher = $val[9];
						$separate_lesson_plan = $val[10];
						$plan_corresponding_groups = $val[11];
						$tlm_availability = $val[12];
						$tlm_use = $val[13];
						$progress_records = $val[14];
						$progress_records_maintained = $val[15];
						$acceptance_teacher = $val[16];
						$transact_lesson_children = $val[17];
						$well_organized = $val[18];
						$teaching_method = $val[19];
						$respect_students = $val[20];
						$curricular_activities = $val[21];
						$home_visit_records = $val[22];
						$parent_teacher_meeting = $val[23];
						$community_support = $val[24];

						$check = mysql_num_rows(mysql_query("select * from asha_kiran_center_assessment where assessment_id='".base64_decode($_REQUEST['assessid'])."'"));
						if ($check==0){

							$insert_assessment = "insert into asha_kiran_center_assessment(assessment_id, location_appropriate, rilm_logo, att_visit_day, safe_for_children, cleanliness, seating_arrangement, group_seating, adequate_content, transact_lessons, engagement_teacher, separate_lesson_plan, plan_corresponding_groups, tlm_availability, tlm_use, progress_records, progress_records_maintained, acceptance_teacher, transact_lesson_children, well_organized, teaching_method, respect_students, curricular_activities, home_visit_records, parent_teacher_meeting, community_support) values('".base64_decode($_REQUEST['assessid'])."', '".$location_appropriate."', '".$rilm_logo."', '".$att_visit_day."', '".$safe_for_children."', '".$cleanliness."', '".$seating_arrangement."', '".$group_seating."', '".$adequate_content."', '".$transact_lessons."', '".$engagement_teacher."', '".$separate_lesson_plan."', '".$plan_corresponding_groups."', '".$tlm_availability."', '".$tlm_use."', '".$progress_records."', '".$progress_records_maintained."', '".$acceptance_teacher."', '".$transact_lesson_children."', '".$well_organized."', '".$teaching_method."', '".$respect_students."', '".$curricular_activities."', '".$home_visit_records."', '".$parent_teacher_meeting."', '".$community_support."')";

							mysql_query($insert_assessment);
						}

						$updateRating = mysql_query("update asha_kiran_center_rating set status='complete' where assessment_id='".base64_decode($_REQUEST['assessid'])."'");

						$query_responseDet = mysql_query("select * from asha_kiran_child_response_temp where assessment_id='".base64_decode($_REQUEST['assessid'])."'");
						while ($responseDet = mysql_fetch_array($query_responseDet)){

							$insertResponse = "insert into asha_kiran_child_response(assessment_id, child_id, happy_in_center, att_pattern, pro_participation, able_read, able_write) values('".base64_decode($_REQUEST['assessid'])."', '".$responseDet['child_id']."', '".$responseDet['happy_in_center']."', '".$responseDet['att_pattern']."', '".$responseDet['pro_participation']."', '".$responseDet['able_read']."', '".$responseDet['able_write']."')";

							mysql_query($insertResponse);
						}
						unset($_SESSION['assessment_id']);
					?>
					<script type="text/javascript">
					window.location = 'center-rating.php';
					</script>
					<?php
					}
				}
				?>

				<form action="" method="post">

				<?php
				$query_getCategory = mysql_query("select distinct(rate_category) as distCategory from asha_kiran_rating_parameters where rate_category!='RESPONSE FROM CHILDREN'");

				while ($getCategory = mysql_fetch_array($query_getCategory)){
				?>
				<div class="col-sm-12" id="form_section">

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;"><?= $getCategory['distCategory'] ?></h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<?php
						$i = 1;

						$query_getParticular = mysql_query("select * from asha_kiran_rating_parameters where rate_category='".$getCategory['distCategory']."'");

						while ($getParticular = mysql_fetch_array($query_getParticular)){
						?>
						<tr class="table_tr">
							<td width="35%" class="table_label"><?= $getParticular['category_particular'] ?></td>

							<td width="15%">
								<select name="particularVal[]" id="<?= $i ?>" class="form-control" style="width: 100%;">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</td>

							<td width="50%"></td>
						</tr>
						<?php $i++;} ?>
					</table>
				</div>
				<?php } ?>

				<div class="col-sm-12" id="form_section">

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">RESPONSE FROM CHILDREN</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="35%" class="table_label">Name of child : </td>

							<td width="35%">
								<select name="response_child" id="response_child" class="form-control" onchange="getChDet()" style="width: 100%;">
									<option value="">-- Please Select --</option>

									<?php
									$query_getChild = mysql_query("select * from tbl_child_profile_card where create_by='".$createby['username']."'");
									while ($getChild = mysql_fetch_array($query_getChild)){
									?>
									<option value="<?= $getChild['child_id'] ?>"><?= $getChild['child_name'] ?></option>
									<?php } ?>
								</select>
							</td>

							<td width="30%"></td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">Child age : </td>

							<td width="35%"><input type="text" name="child_age" id="child_age" class="form-control" style="width: 100%;" readonly /></td>

							<td width="30%"></td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">Child gender : </td>

							<td width="35%"><input type="text" name="child_gender" id="child_gender" class="form-control" style="width: 100%;" readonly /></td>

							<td width="30%"></td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">Child is happy being in the centre</td>

							<td width="35%">
								<select name="is_happy" id="is_happy" class="form-control" style="width: 50%;" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</td>

							<td width="30%"></td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">Attendance pattern of the Child over last one month</td>

							<td width="35%">
								<select name="attendance_pattern" id="attendance_pattern" class="form-control" style="width: 50%;" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</td>

							<td width="30%"></td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">Proactive participation of the Child during the interaction</td>

							<td width="35%">
								<select name="participation" id="participation" class="form-control" style="width: 50%;" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</td>

							<td width="30%"></td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">Ability to read as of his/her age</td>

							<td width="35%">
								<select name="read_ability" id="read_ability" class="form-control" style="width: 50%;" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</td>

							<td width="30%"></td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">Ability to write as of his/her age</td>

							<td width="35%">
								<select name="write_ability" id="write_ability" class="form-control" style="width: 50%;" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</td>

							<td width="30%">&nbsp;</td>
						</tr>

						<tr class="table_tr">
							<td width="35%" class="table_label">&nbsp;</td>

							<td width="35%">
								<input type="button" name="addBtn" id="addBtn" value="ADD" class="btn btn-primary" style="width: 80px;" onclick="addData()" />
							</td>

							<td width="30%"></td>
						</tr>
					</table>
				</div>

				<span id="showTable"></span>

				<input type="submit" name="saveBtn" id="saveBtn" value="SAVE & EXIT" class="btn btn-primary" style="float: right;margin: 20px 0 0 20px;width: 140px;" >

				<a href="center-rating.php?assessid=<?= $_REQUEST['assessid'] ?>"><input type="button" name="backBtn" id="backBtn" value="BACK TO PAGE - I" class="btn btn-primary" style="float: right;margin: 20px 0 0 0;width: 140px;" /></a>

				</form>
			</div>

		</div>
	</div>	

<?php include('include/footer.php'); ?>
	
	
</div>

</body>
</html>