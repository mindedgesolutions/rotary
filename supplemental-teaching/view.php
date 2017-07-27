<?php
include('../../include/config.php');

$folderNo_whole = explode('/', base64_decode($_REQUEST['prno']));
$folderNo = $folderNo_whole[1];

if (!file_exists('images/'.$folderNo)){
	mkdir('images/'.$folderNo, 0777, true);
}
$masterInfo = mysql_fetch_array(mysql_query("select * from project_teacher_support_supplement_master where project_no='".base64_decode($_REQUEST['prno'])."'"));

$schoolCount = mysql_fetch_array(mysql_query("select no_schools from project_teacher_support_supplement_details where project_no='".base64_decode($_REQUEST['prno'])."'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('../../../../include/title.php'); ?></title>
<!-- Css Files -->
<?php include('../../../../include/favicon.php'); ?>

<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../../../css/font-awesome.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/owl.carousel.css" rel="stylesheet">
<link href="../../css/color.css" rel="stylesheet">
<link href="../../css/dl-menu.css" rel="stylesheet">
<link href="../../css/flexslider.css" rel="stylesheet"> 
<link href="../../css/prettyphoto.css" rel="stylesheet">
<link href="../../css/responsive.css" rel="stylesheet">
<link href="../../css/menu_v.css" rel="stylesheet" type="text/css" />

<script src="../../js/jquery.min.js"></script>
<script src="../../js/modernizr.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.dlmenu.js"></script>
<script src="../../js/flexslider-min.js"></script>
<script src="../../js/goalProgress.min.js"></script>
<script src="../../js/jquery.countdown.min.js"></script>
<script src="../../js/jquery.prettyphoto.js"></script>
<script src="../../js/waypoints-min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/newsticker.js"></script>
<script src="../../js/parallex.js"></script>
<script src="../../js/styleswitch.js"></script>
<script src="../../js/functions.js"></script>

<script type="text/javascript" src="source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css" media="screen" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/dot-luv/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<style type="text/css">
.form-div{
	width: 100%;
	height: auto;
	float: left;
	margin: 25px 0;
	box-sizing: border-box;
	border: 1px solid #ccc;
	color: #4a4a4a;
	font-size: 90%;
	padding: 15px 15px 0 15px;
}
.header-text{
	width: 100%;
	height: 60px;
	float: left;
}
.header-text h3{
	font-weight: 600;
	color: #757575;
	word-spacing: 5px;
	position: relative;
	text-align: center;
}
.header-text h3:after{
	content: '';
	height: 2px;
	width: 10%;
	position: absolute;
	background: #edb542;
	top: 30px;
	left: 45%;
}
.table-head{
  background-color: #333;
  color: #fff;
  text-align: center;
}
input[type='checkbox']{
	float: left;
	margin: 14px 10px 0 5px;
}
label{
	color: #757575;
	font-size: 90%;
	float: left;
	margin: 5px 0 0 0;
}
</style>

<script type="text/javascript">
function openFancy(par){
	var sln = par;
	var prno = $('#prno').val();
	var schools_involved = $('#schools_involved').val();
	var volunteer_no = $('#volunteer_no'+par).val();
	var schoolId = $('#schoolId'+par).val();
	var schoolName = $('#schoolName'+par).val();
	var schoolCity = $('#schoolCity'+par).val();
	var schoolState = $('#schoolState'+par).val();
	var schoolType = $('#schoolType'+par).val();

	$(document).ready(function() {
		$.fancybox({
		openEffect: 'elastic',
		closeEffect: 'elastic',
		prevEffect: 'fade',
		nextEffect: 'fade',
		fitToView: false,
		closeBtn : false,
		maxWidth: 700,
		maxHeight: 600,
		padding: 0,
		type: 'iframe',
		scrolling: 'no',
		href: 'view_table_details.php?sln=' + sln + '&prno=' + prno + '&schools_involved=' + schools_involved + '&volunteer_no=' + volunteer_no + '&schoolId=' + schoolId + '&schoolName=' + schoolName + '&schoolCity=' + schoolCity + '&schoolState=' + schoolState + '&schoolType=' + schoolType,
		/*'afterClose':function () {
				 href: '../mycart/registration_success.php',
			  }, */
			  'afterClose': function(){
			},
		});
	});
}
</script>

</head>
<body style="padding-right:0px;">

<input type="hidden" name="prno" id="prno" value="<?= base64_decode($_REQUEST['prno']) ?>" />
<input type="hidden" name="folderno" id="folderno" value="<?= base64_decode($_REQUEST['folderno']) ?>" />

	<!--// Main Wrapper //-->
	<div class="as-mainwrapper">

		<!--// Header //-->
		<header id="as-header" >

			<!--// TopStrip //-->
			<div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
				<div class="as-topstrip as-bgcolor" style="background-color: #009dff;">
					<?php include('../../include/top-head.php'); ?>
				</div>
			</div>
			<!--// TopStrip //-->

			<div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
				<div class="as-header-bar">
					<div class="row">
						<div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
							<div class="col-md-2">
								<a style="float:left;" href="index.php" class="logo1"><img src="../../images/logo2.png" alt=""></a>
							</div>
							<!--  include('include/logo.php');  -->
							<div class="col-md-10">
								<div>
									<?php include('../../include/navigation_mem.php'); ?>
									<?php //include('include/search-bar.php'); ?>
								</div>

								<?php include('../../include/responsive-menu.php'); ?>

							</div>
						</div>
					</div>
				</div>
			</div>

		</header>

		<!--// Header class="as-section-right" //-->
		<div class="as-main-content">

			<!--// MainSection //-->
			<div class="row">
				<div class="col-md-12">

					<div class="col-md-1"></div>

					<div class="col-md-10" style="margin: 50px 0;">

						<div class="header-text"><h3>Teacher Support : Supplemental Training</h3></div>

						<table>
							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of schools involved : </td>

								<td width="35%">
									<input type="text" name="schools_involved" id="schools_involved" value="<?= $schoolCount['no_schools'] ?>" class="form-control" readonly />
								</td>

								<td width="40%" colspan="2">&nbsp;</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="100%" colspan="4">

								<table border="1" style="border-collapse: collapse;">
								<tr class="table-head">
									<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
									<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">School ID</td>
									<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">School Name</td>
									<td style="line-height: 18px;width: 16%;height: 50px;line-height: 50px;font-size: 90%;">City/Village</td>
									<td style="line-height: 18px;width: 22%;height: 50px;line-height: 50px;font-size: 90%;">State</td>
									<td style="line-height: 18px;width: 15.5%;height: 50px;line-height: 50px;font-size: 90%;">No. of Volunteer Teacher</td>
									<td style="line-height: 18px;width: 8.5%;height: 50px;font-size: 90%;line-height: 50px;">Action</td>
								</tr>

								<?php
								$i = 1;
								$query_schoolDet = mysql_query("select * from project_teacher_support_supplement_details where project_no='".base64_decode($_REQUEST['prno'])."' group by school_id");

								while ($schoolDet = mysql_fetch_array($query_schoolDet)){

									$volCount = mysql_num_rows(mysql_query("select * from project_teacher_support_supplement_details where project_no='".base64_decode($_REQUEST['prno'])."' and school_id='".$schoolDet['school_id']."'"));
								?>
								<tr class="table-row">
									<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

									<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
										<input type="text" name="schoolId<?= $i ?>" id="schoolId<?= $i ?>" value="<?= $schoolDet['school_id'] ?>" class="form-control" readonly />
									</td>

									<td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
										<input type="text" name="schoolName<?= $i ?>" id="schoolName<?= $i ?>" value="<?= $schoolDet['school_name'] ?>" class="form-control" readonly />
									</td>

									<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
										<input type="text" name="schoolCity<?= $i ?>" id="schoolCity<?= $i ?>" value="<?= $schoolDet['city'] ?>" class="form-control" readonly />
									</td>

									<td style="line-height: 18px;width: 7%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
										<select name="schoolState<?= $i ?>" id="schoolState<?= $i ?>" disabled class="form-control" style="margin: 8px 0 0 0;">
											<option value="">-- Please Select --</option>

											<?php
											$query_state = mysql_query("select * from states");
											while ($state = mysql_fetch_array($query_state)){
											?>
											<option value="<?= $state['state'] ?>" <?php if($schoolDet['state']==$state['state']){echo 'selected';} ?>><?= $state['state'] ?></option>
											<?php } ?>
										</select>
									</td>

									<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
										<input type="text" name="volunteer_no<?= $i ?>" id="volunteer_no<?= $i ?>" value="<?= $volCount ?>" class="form-control" readonly />
									</td>

									<td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
										<input type="button" name="endBtn" id="endBtn" value="Details" class="btn btn-primary" onclick="openFancy(<?= $i ?>)" />
									</td>
								</tr>
								<?php $i++;} ?>
							</table>

								</td>
							</tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Total cost involved : </td>

								<td width="35%">
									<input type="text" name="total_cost" id="total_cost" value="<?= $masterInfo['total_cost'] ?>" class="form-control" readonly />
								</td>

								<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Duration : </td>

								<td width="35%">
									<input type="text" name="project_duration" id="project_duration" value="<?= $masterInfo['project_duration'] ?>" class="form-control" readonly />
								</td>

								<td width="40%" colspan="2" style="color: #757575;text-align: left;padding: 0 0 0 15px;">(In Days)</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Brief description (Max 100 words) : </td>

								<td width="35%">
									<textarea class="form-control" name="trainingDesc" id="trainingDesc" style="resize: none;height: 80px;width: 100%;font-size: 12px;" readonly><?= $masterInfo['description'] ?></textarea>
								</td>

								<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 1 : </td>

								<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
									<?php if($masterInfo['image_1']!=''){ ?><img src="<?= $masterInfo['image_1'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
								</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 2 : </td>

								<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
									<?php if($masterInfo['image_2']!=''){ ?><img src="<?= $masterInfo['image_2'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
								</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 3 : </td>

								<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
									<?php if($masterInfo['image_3']!=''){ ?><img src="<?= $masterInfo['image_3'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
								</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td colspan="3" style="height: 15px;text-align: center;">
									<input type="button" name="submitBtn" id="submitBtn" value="Close" class="btn btn-primary" onclick="window.close()" />
								</td>
							</tr>
						</table>

						</form>

						</div>
					</div>
				</div>
			</div>

			<!--// MainSection //-->

		</div>


		<!--// Footer //-->
		<div class="as-footer">
			<div class="container">
				<?php include('../../include/footer.php'); ?>
			</div>
			<?php include('../../include/copy-right.php'); ?>
		</div>
		<!--// Footer //-->
		<div class="clearfix"></div>

		<!--// Main Wrapper //-->
</body>
</html>