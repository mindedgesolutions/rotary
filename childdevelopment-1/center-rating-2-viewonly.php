<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$getAssess = mysql_fetch_array(mysql_query("select * from asha_kiran_center_assessment where assessment_id='".base64_decode($_REQUEST['assessid'])."'"));
$ngoName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where id='".$getDet['ngo']."'"));
$centerName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where id='".$getDet['center']."'"));
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
.table_label_info{
	box-sizing: border-box;
	padding: 0 0 0 5px;
	font-size: 100%;
	text-align: left;
	color: #000;
}
</style>

</head>

<body>

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
				<div class="col-sm-12" id="form_section">

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">PHYSICAL LOCATION AND ACCESSIBILITY TO THE CENTER</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="35%" class="table_label">Location Appropriateness</td>
							<td width="15%" class="table_label_info"><?= $getAssess['location_appropriate'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Asha Kiran Centre Sign Board with RILM Logo</td>
							<td width="15%" class="table_label_info"><?= $getAssess['rilm_logo'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Attendance on the day of visit</td>
							<td width="15%" class="table_label_info"><?= $getAssess['att_visit_day'] ?></td>
							<td width="50%"></td>
						</tr>
					</table>

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">SAFETY AND CONGENIALITY ASPECTS OF THE CENTRE</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="35%" class="table_label">Safe for children</td>
							<td width="15%" class="table_label_info"><?= $getAssess['safe_for_children'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Cleanliness of the Centre</td>
							<td width="15%" class="table_label_info"><?= $getAssess['cleanliness'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Seating arrangement adequacy</td>
							<td width="15%" class="table_label_info"><?= $getAssess['seating_arrangement'] ?></td>
							<td width="50%"></td>
						</tr>
					</table>

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">CLASSROOM MANAGEMENT</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="35%" class="table_label">Group seating (as per age of the children)</td>
							<td width="15%" class="table_label_info"><?= $getAssess['group_seating'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Adequate content for each group</td>
							<td width="15%" class="table_label_info"><?= $getAssess['adequate_content'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Teacher is able to transact lessons</td>
							<td width="15%" class="table_label_info"><?= $getAssess['transact_lessons'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Engagement of teacher with children</td>
							<td width="15%" class="table_label_info"><?= $getAssess['engagement_teacher'] ?></td>
							<td width="50%"></td>
						</tr>
					</table>

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">PEDAGOGICAL INFORMATION</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="35%" class="table_label">Separate lesson plan for each age wise group</td>
							<td width="15%" class="table_label_info"><?= $getAssess['separate_lesson_plan'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Lesson plan followed for corresponding groups</td>
							<td width="15%" class="table_label_info"><?= $getAssess['plan_corresponding_groups'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">TLM availability in the centre</td>
							<td width="15%" class="table_label_info"><?= $getAssess['tlm_availability'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Use of TLM</td>
							<td width="15%" class="table_label_info"><?= $getAssess['tlm_use'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Progress records of children available</td>
							<td width="15%" class="table_label_info"><?= $getAssess['progress_records'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Progress records of children maintained properly</td>
							<td width="15%" class="table_label_info"><?= $getAssess['progress_records_maintained'] ?></td>
							<td width="50%"></td>
						</tr>
					</table>

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">EFFECTIVENESS OF TEACHER</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="35%" class="table_label">Acceptance of Teacher</td>
							<td width="15%" class="table_label_info"><?= $getAssess['acceptance_teacher'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Teachers ability to transact lessons with Children</td>
							<td width="15%" class="table_label_info"><?= $getAssess['transact_lesson_children'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Well organized</td>
							<td width="15%" class="table_label_info"><?= $getAssess['well_organized'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Teaching methodology</td>
							<td width="15%" class="table_label_info"><?= $getAssess['teaching_method'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Respect for students</td>
							<td width="15%" class="table_label_info"><?= $getAssess['respect_students'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Engaging children in co curricular activities</td>
							<td width="15%" class="table_label_info"><?= $getAssess['curricular_activities'] ?></td>
							<td width="50%"></td>
						</tr>
					</table>

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">OTHER INFORMATION</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="35%" class="table_label">Home visit records of children</td>
							<td width="15%" class="table_label_info"><?= $getAssess['home_visit_records'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Parent Teacher Meeting Register</td>
							<td width="15%" class="table_label_info"><?= $getAssess['parent_teacher_meeting'] ?></td>
							<td width="50%"></td>
						</tr>
						<tr class="table_tr">
							<td width="35%" class="table_label">Community Support in running the Centre</td>
							<td width="15%" class="table_label_info"><?= $getAssess['community_support'] ?></td>
							<td width="50%"></td>
						</tr>
					</table>
				</div>

				<table width="100%" border="1" style="border-collapse: collapse;margin: 10px 0 0 0;">
					<tr class="table_head">
						<td class="table_head_td" width="13%">Child Name</td>
						<td class="table_head_td" width="7%">Age</td>
						<td class="table_head_td" width="5%">Gender</td>
						<td class="table_head_td" width="15%">Child is happy being in the centre</td>
						<td class="table_head_td" width="15%">Attendance pattern of the Child over last one month</td>
						<td class="table_head_td" width="15%">Proactive participation of the Child during the interaction</td>
						<td class="table_head_td" width="15%">Ability to read as of his/her age</td>
						<td class="table_head_td" width="15%">Ability to write as of his/her age</td>
					</tr>
					<?php
						$i=1;

						$query_getDet = mysql_query("select * from asha_kiran_child_response where assessment_id='".base64_decode($_REQUEST['assessid'])."'");
						while ($getDet = mysql_fetch_array($query_getDet)){

							$childDet = mysql_fetch_array(mysql_query("select child_name, child_dob, child_gender from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));
					?>
					<tr>
						<td class="table_head_td"><?= $childDet['child_name'] ?></td>
						<td class="table_head_td"><?= $childDet['child_dob'] ?></td>
						<td class="table_head_td"><?= $childDet['child_gender'] ?></td>
						<td class="table_head_td"><?= $getDet['happy_in_center'] ?></td>
						<td class="table_head_td"><?= $getDet['att_pattern'] ?></td>
						<td class="table_head_td"><?= $getDet['pro_participation'] ?></td>
						<td class="table_head_td"><?= $getDet['able_read'] ?></td>
						<td class="table_head_td"><?= $getDet['able_write'] ?></td>
					</tr>
					<?php $i++;} ?>
				</table>

				<span id="showTable"></span>

				<a href="center-rating-list-view.php"><input type="button" name="saveBtn" id="saveBtn" value="BACK TO LIST" class="btn btn-primary" style="float: right;margin: 20px 0 0 20px;width: 140px;" >

				<a href="center-rating-viewonly.php?assessid=<?= $_REQUEST['assessid'] ?>"><input type="button" name="backBtn" id="backBtn" value="BACK TO PAGE - I" class="btn btn-primary" style="float: right;margin: 20px 0 0 0;width: 140px;" /></a>

				</form>
			</div>

		</div>
	</div>	

<?php include('include/footer.php'); ?>
	
	
</div>

</body>
</html>