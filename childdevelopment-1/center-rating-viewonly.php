<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$getDet = mysql_fetch_array(mysql_query("select * from asha_kiran_center_rating where assessment_id='".base64_decode($_REQUEST['assessid'])."'"));
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

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">background information</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td class="table_label">Asha Kiran Organization name : </td>
							<td class="table_label_info" colspan="3"><?= strtoupper($ngoName['center_name']) ?></td>
						</tr>

						<tr class="table_tr">
							<td width="25%" class="table_label">Asha Kiran Center name : </td>
							<td colspan="3" class="table_label_info"><?php if ($centerName['center_name']==''){echo 'N/A';}else{echo strtoupper($centerName['center_name']);} ?></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">AKC ID : </td>
							<td class="table_label_info" colspan="3"><?= $getDet['ngo'] ?></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">State : </td>
							<td class="table_label_info" colspan="3"><?= $getDet['state'] ?></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Project period : </td>
							<td class="table_label_info" colspan="3"><?= strtoupper($getDet['project_period']) ?></td>
						</tr>

						<tr class="table_tr">
							<td width="25%" class="table_label">Name of the teacher : </td>
							<td width="45%" class="table_label_info"><?= strtoupper($getDet['teacher_name']) ?></td>
							<td width="15%" class="table_label">Gender : </td>
							<td>
								<input type="radio" name="gender" id="male" value="male" <?php if($getDet['gender']=='male'){echo 'checked';} ?> disabled /><label for="male" style="margin: 8px 20px 0 0;">Male</label>

								<input type="radio" name="gender" id="female" value="female" <?php if($getDet['gender']=='female'){echo 'checked';} ?> disabled /><label for="female">Female</label>
							</td>
						</tr>
					</table>
				</div>

				<div class="col-sm-12" id="form_section">

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">CHILDREN’S DETAIL IN THE ASHAKIRAN CENTRE:</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="24%" class="table_label">Total no. of enrolled boys : </td>
							<td width="9%" class="table_label_info"><?= $getDet['enrolled_boys'] ?></td>

							<td width="24%" class="table_label">Total no. of enrolled girls : </td>
							<td width="9%" class="table_label_info"><?= $getDet['enrolled_girls'] ?></td>

							<?php $total_enrolled = $getDet['enrolled_boys'] + $getDet['enrolled_girls'] ?>

							<td width="24%" class="table_label">Total no. of enrolled children : </td>
							<td width="9%" class="table_label_info"><?= $total_enrolled ?></td>
						</tr>

						<tr class="table_tr">
							<td width="24%" class="table_label">No. of boys present : </td>
							<td width="9%" class="table_label_info"><?= $getDet['present_boys'] ?></td>

							<td width="24%" class="table_label">No. of girls present : </td>
							<td width="9%" class="table_label_info"><?= $getDet['present_girls'] ?></td>

							<?php $total_present = $getDet['present_boys'] + $getDet['present_girls'] ?>

							<td width="24%" class="table_label">Children present on the day of visit: : </td>
							<td width="9%" class="table_label_info"><?= $total_present ?></td>
						</tr>
					</table>
				</div>

				<div class="col-sm-12" id="form_section">

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">visit details</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td width="25%" class="table_label">Visiting quarter : </td>
							<td colspan="3">
								<input type="radio" name="quarter" id="quarter_1" value="quarter_1" <?php if($getDet['visiting_quarter']=='quarter_1'){echo 'checked';} ?> disabled /><label for="quarter_1" style="margin: 8px 20px 0 0;">Quarter - I</label>

								<input type="radio" name="quarter" id="quarter_2" value="quarter_2" <?php if($getDet['visiting_quarter']=='quarter_2'){echo 'checked';} ?> disabled /><label for="quarter_2" style="margin: 8px 20px 0 0;">Quarter - II</label>

								<input type="radio" name="quarter" id="quarter_3" value="quarter_3" <?php if($getDet['visiting_quarter']=='quarter_3'){echo 'checked';} ?> disabled /><label for="quarter_3" style="margin: 8px 20px 0 0;">Quarter - III</label>

								<input type="radio" name="quarter" id="quarter_4" value="quarter_4" <?php if($getDet['visiting_quarter']=='quarter_4'){echo 'checked';} ?> disabled /><label for="quarter_4" style="margin: 8px 20px 0 0;">Quarter - IV</label>
							</td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Month of last visit : </td>
							<td class="table_label_info" colspan="3"><?= $getDet['last_visit_month'] ?></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Month of current visit : </td>
							<td class="table_label_info" colspan="3"><?= $getDet['current_visit_month'] ?></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Date of visit : </td>
							<td class="table_label_info" colspan="3"><?= date('d-m-Y', strtotime($getDet['visit_date'])) ?></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Duration of stay : </td>
							<td class="table_label_info" colspan="3"><?= $getDet['stay_duration'] ?></td>
						</tr>
					</table>
				</div>

				<a href="center-rating-2-viewonly.php?assessid=<?= $_REQUEST['assessid'] ?>"><input type="button" name="saveBtn" id="saveBtn" value="GO TO PAGE - II" class="btn btn-primary" style="float: right;margin: 20px 0 0 0;" /></a>

			</div>

		</div>
	</div>	

<?php include('include/footer.php'); ?>
	
	
</div>

</body>
</html>