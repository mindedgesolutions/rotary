<?php
include('../../include/config.php');

$folderNo_whole = explode('/', base64_decode($_REQUEST['prno']));
$folderNo = $folderNo_whole[1];

if (!file_exists('images/'.$folderNo)){
	mkdir('images/'.$folderNo, 0777, true);
}
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
</style>

<script>
/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
	var regex = /[^0-9.]/gi;
	input.value = input.value.replace(regex, "");
}
function wordCount(input){
	var words = input.value.match(/\S+/g).length;

	if (words > 100) {

		var trimmed = $(input).val().split(/\s+/, 100).join(" ");
		$(input).val(trimmed + " ");
	}
	else{
		$('#trainingDesc').text(100-words);
	}
}
function showDetailsTable(){

	var schools_involved = $('#schools_involved').val();
	var prno = $('#prno').val();

	if (schools_involved!=''){

		$.ajax({

			url: 'table.php',
			type: 'post',
			data: 'schools_involved=' + schools_involved + '&prno=' + prno,
			success: function(f){

				$('#table_details').html(f);
			}
		})
	}else{
		$('#table_details').html('');
	}
}
function validateForm(){
	var schools_involved = $('#schools_involved').val();
	var total_cost = $('#total_cost').val();
	var project_duration = $('#project_duration').val();
	var trainingDesc = $('#trainingDesc').val();

	if (schools_involved==''){
		alert('Please enter no. of schools involved');
		return false;
	}else if (total_cost==''){
		alert('Please enter total cost involved');
		return false;
	}else if (project_duration==''){
		alert('Please enter project duration');
		return false;
	}else if (trainingDesc==''){
		alert('Please enter a brief project description');
		return false;
	}
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

						<?php
						if (isset($_REQUEST['submitBtn'])){

							$volDet = mysql_num_rows(mysql_query("select * from project_temp_teacher_support_supplement where project_no='".$_REQUEST['prno']."'"));

							if ($volDet > 0){

								$checkImage = mysql_fetch_array(mysql_query("select image_1, image_2, image_3 from project_teacher_support_supplement_master where project_no='".$_REQUEST['prno']."'"));

								if ($checkImage['image_1']!='' || $checkImage['image_2']!='' || $checkImage['image_3']!=''){

									$update = "update project_teacher_support_supplement_master set upload_date='".date('Y-m-d')."', total_cost='".$_REQUEST['total_cost']."', project_duration='".$_REQUEST['project_duration']."', description='".$_REQUEST['trainingDesc']."' where project_no='".$_REQUEST['prno']."'";

									mysql_query($update);

									$query_getDet = mysql_query("select * from project_temp_teacher_support_supplement where project_no='".$_REQUEST['prno']."'");

									while ($getDet = mysql_fetch_array($query_getDet)){

										$insertDet = "insert into project_teacher_support_supplement_details(project_no, no_schools, sln, school_id, school_name, city, state, volunteer_sln, volunteer_name, co_curricular, co_curricular_other, subject_support, subject_support_other, total_hours, total_students) values('".$_REQUEST['prno']."', '".$getDet['no_schools']."', '".$getDet['sln']."', '".$getDet['school_id']."', '".$getDet['school_name']."', '".$getDet['city']."', '".$getDet['state']."', '".$getDet['volunteer_sln']."', '".$getDet['volunteer_name']."', '".$getDet['co_curricular']."', '".$getDet['co_curricular_other']."', '".$getDet['subject_support']."', '".$getDet['subject_support_other']."', '".$getDet['total_hours']."', '".$getDet['total_students']."')";

										mysql_query($insertDet);
									}

									$updateMaster = "update project_master set status='complete' where project_no='".$_REQUEST['prno']."'";

									mysql_query($updateMaster);
								?>
								<script type="text/javascript">
								alert('Project has been saved successfully');
								window.location.href = '../../index.php';
								</script>
								<?php	
								}else{
								?>
								<script type="text/javascript">
								alert('Please upload related images');
								window.location.href = 'index.php?prno=<?= base64_encode($_REQUEST['prno']) ?>&folderno=<?= $_REQUEST['folderno'] ?>';
								</script>
								<?php
								}
							}else{
							?>
							<script type="text/javascript">
							alert('Please enter school and volunteer details');
							window.location.href = 'index.php?prno=<?= base64_encode($_REQUEST['prno']) ?>&folderno=<?= $_REQUEST['folderno'] ?>';
							</script>
							<?php
							}
						}
						?>

						<form method="post" action="" onsubmit="return validateForm()" autocomplete="off">

						<table>
							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of schools involved : </td>

								<td width="35%">
									<input type="text" name="schools_involved" id="schools_involved" value="" class="form-control" onkeyup="numbersOnly(this)" />
								</td>

								<td width="40%" colspan="2">
									<input type="button" name="tableBtn" id="tableBtn" value="OK" class="btn btn-primary" style="width: 80px;margin: 0 0 0 20px;" onclick="showDetailsTable()" />
								</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr><td width="100%" colspan="4"><span id="table_details"></span></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Total cost involved : </td>

								<td width="35%">
									<input type="text" name="total_cost" id="total_cost" value="" class="form-control" onkeyup="numbersOnly(this)" />
								</td>

								<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Duration : </td>

								<td width="35%">
									<input type="text" name="project_duration" id="project_duration" value="" class="form-control" onkeyup="numbersOnly(this)" />
								</td>

								<td width="40%" colspan="2" style="color: #757575;text-align: left;padding: 0 0 0 15px;">(In Days)</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Brief description (Max 100 words) : </td>

								<td width="35%">
									<textarea class="form-control" name="trainingDesc" id="trainingDesc" style="resize: none;height: 80px;width: 100%;font-size: 12px;" onkeyup="wordCount(this), nospecial(this)"></textarea>
								</td>

								<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 1 : </td>

								<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
									<input type="file" name="img_1" id="img_1" />

									<span id="uploaded_image_1"></span>

									<?php if ($getTemp['image_1']!=''){ ?><span style="color: #009342;" id="have_doc_1">We already have an image</span><?php } ?>
								</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 2 : </td>

								<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
									<input type="file" name="img_2" id="img_2" />

									<span id="uploaded_image_2"></span>

									<?php if ($getTemp['image_2']!=''){ ?><span style="color: #009342;" id="have_doc_2">We already have an image</span><?php } ?>
								</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 3 : </td>

								<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
									<input type="file" name="img_3" id="img_3" />

									<span id="uploaded_image_3"></span>

									<?php if ($getTemp['image_3']!=''){ ?><span style="color: #009342;" id="have_doc_3">We already have an image</span><?php } ?>
								</td>
							</tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr><td colspan="3" style="height: 15px;"></td></tr>

							<tr>
								<td colspan="3" style="height: 15px;text-align: center;">
									<input type="submit" name="submitBtn" id="submitBtn" value="Save Project" class="btn btn-primary" />
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
<script type="text/javascript">
$(document).on('change', '#img_1', function(){

	$('#have_doc_1').hide();

	var property = document.getElementById('img_1').files[0];
	var prno = document.getElementById('prno').value;

	var image_name = property.name;
	var image_extension = image_name.split('.').pop().toLowerCase();

	if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

		alert('Invalid file extension');
		document.getElementById('img_1').value = '';
	}
	var image_size = property.size;

	if (image_size > 2000000){

		alert('Image is too large. Please select an image of smaller size');
		document.getElementById('img_1').value = '';
	}
	else{

		var form_data = new FormData();
		form_data.append('img_1', property);
		form_data.append('prno', prno);

		$.ajax({
			url: 'upload_1.php',
			type: 'post',
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function(){

				$('#uploaded_image_1').html('<label class="text-success">Image uploading ...</label>');
			},
			success: function(data){
				$('#uploaded_image_1').html(data);
			}
		})
	}
});
$(document).on('change', '#img_2', function(){

	$('#have_doc_2').hide();

	var property = document.getElementById('img_2').files[0];
	var prno = document.getElementById('prno').value;

	var image_name = property.name;
	var image_extension = image_name.split('.').pop().toLowerCase();

	if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

		alert('Invalid file extension');
		document.getElementById('img_2').value = '';
	}
	var image_size = property.size;

	if (image_size > 2000000){

		alert('Image is too large. Please select an image of smaller size');
		document.getElementById('img_2').value = '';
	}
	else{

		var form_data = new FormData();
		form_data.append('img_2', property);
		form_data.append('prno', prno);

		$.ajax({
			url: 'upload_2.php',
			type: 'post',
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function(){

				$('#uploaded_image_2').html('<label class="text-success">Image uploading ...</label>');
			},
			success: function(data){
				$('#uploaded_image_2').html(data);
			}
		})
	}
});
$(document).on('change', '#img_3', function(){

	$('#have_doc_3').hide();

	var property = document.getElementById('img_3').files[0];
	var prno = document.getElementById('prno').value;

	var image_name = property.name;
	var image_extension = image_name.split('.').pop().toLowerCase();

	if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

		alert('Invalid file extension');
		document.getElementById('img_3').value = '';
	}
	var image_size = property.size;

	if (image_size > 2000000){

		alert('Image is too large. Please select an image of smaller size');
		document.getElementById('img_3').value = '';
	}
	else{

		var form_data = new FormData();
		form_data.append('img_3', property);
		form_data.append('prno', prno);

		$.ajax({
			url: 'upload_3.php',
			type: 'post',
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function(){

				$('#uploaded_image_3').html('<label class="text-success">Image uploading ...</label>');
			},
			success: function(data){
				$('#uploaded_image_3').html(data);
			}
		})
	}
});
</script>
</body>
</html>