<?php
include('../include/config.php');

$getTemp = mysql_fetch_array(mysql_query("select * from project_temp_adult_literacy where project_no='".$_REQUEST['prno']."' and sln='".$_REQUEST['sln']."'"));

$startDate = mysql_fetch_array(mysql_query("select start_date from project_adult_literacy where project_no='".$_REQUEST['prno']."' and sln='".$_REQUEST['sln']."'"));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../../../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/owl.carousel.css" rel="stylesheet">
<link href="../css/color.css" rel="stylesheet">
<link href="../css/dl-menu.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet"> 
<link href="../css/prettyphoto.css" rel="stylesheet">
<link href="../css/responsive.css" rel="stylesheet">
<link href="../css/menu_v.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/dot-luv/jquery-ui.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script src="../js/modernizr.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dlmenu.js"></script>
<script src="../js/flexslider-min.js"></script>
<script src="../js/goalProgress.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.prettyphoto.js"></script>
<script src="../js/waypoints-min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/newsticker.js"></script>
<script src="../js/parallex.js"></script>
<script src="../js/styleswitch.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.min.js"></script>

<style type="text/css">
body{
	margin:0px;
	padding:0px;
	overflow-y: auto;
}
.heading{
	width:98%;
	font-family: 'Open Sans', sans-serif;
	color:#fff;
	font-size:20px;
	line-height:45px;
	text-align:left;
	font-weight:normal;
	background-color:#266faf;
	box-sizing: border-box;
	padding:0 10px;
	margin:5px 1%;
}
.table-row{
	font-size: 90%;
	color: #4a4a4a;
	padding: 0 15px;
	height: 60px;
}
</style>

<script>
function closeFBox(){
	parent.jQuery.fancybox.close();
}
/*-----------------------Letter without space-------------------------*/
function lettersOnly(input){
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex, "");
}

/*-----------------------Letter with space-------------------------*/
function letterswithspace(input){
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}

/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}

/*-------------------No Special Character--------------------------*/
function nospecial(input){
  var regex = /[^a-zA-Z0-9 ]/gi;
  input.value = input.value.replace(regex, "");
}
$(function() {    
    $( "#endDate" ).datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2100",
		minDate: '<?= $startDate['start_date'] ?>',
		maxDate: '0',
		dateFormat: 'yy-mm-dd',
	});
	$( "#examDate" ).datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2100",
		minDate: '<?= $startDate['start_date'] ?>',
		maxDate: '0',
		dateFormat: 'yy-mm-dd',
	});
});
</script>
</head>

<body>

<table width="500" border="0" style="border-collapse: collapse;margin: 5px 0 0 0;">
	<tr>
		<td class="heading" colspan="2">Details of : <?= strtoupper($_REQUEST['centerName']) ?></td>
	</tr>

	<tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row">End Date : </td>
		<td width="55%" class="table-row">
			<input type="text" name="endDate" id="endDate" value="<?php if ($getTemp['end_date']!=''){echo $getTemp['end_date'];} ?>" class="form-control" style="width: 95%;" readonly="readonly" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">Examination Date : </td>
		<td width="55%" class="table-row">
			<input type="text" name="examDate" id="examDate" value="<?php if ($getTemp['exam_date']!=''){echo $getTemp['exam_date'];} ?>" class="form-control" style="width: 95%;" readonly="readonly" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">No. Appeared : </td>
		<td width="55%" class="table-row">
			<input type="text" name="appeared" id="appeared" value="<?= $getTemp['no_appeared'] ?>" class="form-control" style="width: 95%;" onkeyup="numbersOnly(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">No. Passed : </td>
		<td width="55%" class="table-row">
			<input type="text" name="passed" id="passed" value="<?= $getTemp['no_passed'] ?>" class="form-control" style="width: 95%;" onkeyup="numbersOnly(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 1 : </td>
		<td width="55%" class="table-row" style="height: 40px;">
			<input type="file" name="img_1" id="img_1" />

			<span id="uploaded_image_1"></span>

			<?php if ($getTemp['exam_image_1']!=''){ ?><span style="color: #009342;" id="have_doc_1">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 2 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="img_2" id="img_2" />

			<span id="uploaded_image_2"></span>

			<?php if ($getTemp['exam_image_2']!=''){ ?><span style="color: #009342;" id="have_doc_2">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 3 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="img_3" id="img_3" />

			<span id="uploaded_image_3"></span>

			<?php if ($getTemp['exam_image_3']!=''){ ?><span style="color: #009342;" id="have_doc_3">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 4 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="img_4" id="img_4" />

			<span id="uploaded_image_4"></span>

			<?php if ($getTemp['exam_image_4']!=''){ ?><span style="color: #009342;" id="have_doc_4">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 5 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="img_5" id="img_5" />

			<span id="uploaded_image_5"></span>

			<?php if ($getTemp['exam_image_5']!=''){ ?><span style="color: #009342;" id="have_doc_5">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td colspan="2" style="height: 10px;"></td>
	</tr>

	<tr>
		<td colspan="2" height="20" style="text-align: center;">
			<input type="button" name="closeBtn" id="closeBtn" value="Close" class="btn btn-primary" onclick="closeFBox()" style="margin: 0 15px 0 0;width: 80px;" />

			<input type="button" name="saveBtn" id="saveBtn" value="Save" class="btn btn-primary" onclick="saveData()" style="width: 80px;" />
		</td>
	</tr>

	<tr>
		<td colspan="2" style="height: 20px;"></td>
	</tr>
</table>

<input type="hidden" name="projectId" id="projectId" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="centerId" id="centerId" value="<?= $_REQUEST['centerId'] ?>" />
<input type="hidden" name="centerName" id="centerName" value="<?= $_REQUEST['centerName'] ?>" />
<input type="hidden" name="centerCity" id="centerCity" value="<?= $_REQUEST['centerCity'] ?>" />
<input type="hidden" name="centerState" id="centerState" value="<?= $_REQUEST['centerState'] ?>" />
<input type="hidden" name="sln" id="sln" value="<?= $_REQUEST['sln'] ?>" />
<input type="hidden" name="centerNo" id="centerNo" value="<?= $_REQUEST['centerNo'] ?>" />
<input type="hidden" name="no_adult_learner" id="no_adult_learner" value="<?= $_REQUEST['no_adult_learner'] ?>" />
<input type="hidden" name="teachingLanguage" id="teachingLanguage" value="<?= $_REQUEST['teachingLanguage'] ?>" />
<input type="hidden" name="primerUsed" id="primerUsed" value="<?= $_REQUEST['primerUsed'] ?>" />

<script>
$(document).ready(function(){
	//---------for letter of requirement----------//

	$(document).on('change', '#img_1', function(){

		$('#have_doc_1').hide();

		var property = document.getElementById('img_1').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

			alert('Invalid file extension');
			document.getElementById('img_1').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Document size is too large. Please select a document of smaller size');
			document.getElementById('img_1').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('img_1', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_exam_img_1.php',
				type: 'post',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					$('#uploaded_image_1').html('<label class="text-success">Document uploading ...</label>');
				},
				success: function(data){
					//alert(data);
					$('#uploaded_image_1').html(data);
				}
			})
		}
	});

	//---------for letter of satisfaction----------//

	$(document).on('change', '#img_2', function(){

		$('#have_doc_2').hide();

		var property = document.getElementById('img_2').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

			alert('Invalid file extension');
			document.getElementById('img_2').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Document size is too large. Please select a document of smaller size');
			document.getElementById('img_2').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('img_2', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_exam_img_2.php',
				type: 'post',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					$('#uploaded_image_2').html('<label class="text-success">Document uploading ...</label>');
				},
				success: function(data){
					//alert(data);
					$('#uploaded_image_2').html(data);
				}
			})
		}
	});

	//---------for image - 1----------//

	$(document).on('change', '#img_3', function(){

		$('#have_doc_3').hide();

		var property = document.getElementById('img_3').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

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
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_exam_img_3.php',
				type: 'post',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					$('#uploaded_image_3').html('<label class="text-success">Image uploading ...</label>');
				},
				success: function(data){
					//alert(data);
					$('#uploaded_image_3').html(data);
				}
			})
		}
	});

	//---------for image - 2----------//

	$(document).on('change', '#img_4', function(){

		$('#have_doc_4').hide();

		var property = document.getElementById('img_4').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

			alert('Invalid file extension');
			document.getElementById('img_4').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Image is too large. Please select an image of smaller size');
			document.getElementById('img_4').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('img_4', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_exam_img_4.php',
				type: 'post',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					$('#uploaded_image_4').html('<label class="text-success">Image uploading ...</label>');
				},
				success: function(data){
					//alert(data);
					$('#uploaded_image_4').html(data);
				}
			})
		}
	});

	//---------for image - 3----------//

	$(document).on('change', '#img_5', function(){

		$('#have_doc_5').hide();

		var property = document.getElementById('img_5').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

			alert('Invalid file extension');
			document.getElementById('img_5').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Image is too large. Please select an image of smaller size');
			document.getElementById('img_5').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('img_5', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_exam_img_5.php',
				type: 'post',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					$('#uploaded_image_5').html('<label class="text-success">Image uploading ...</label>');
				},
				success: function(data){
					//alert(data);
					$('#uploaded_image_5').html(data);
				}
			})
		}
	});
});

function saveData(){

	var projectId = $('#projectId').val();
	var centerId = $('#centerId').val();
	var centerName = $('#centerName').val();
	var centerCity = $('#centerCity').val();
	var centerState = $('#centerState').val();
	var centerNo = $('#centerNo').val();
	var sln = $('#sln').val();
	var no_adult_learner = $('#no_adult_learner').val();
	var teachingLanguage = $('#teachingLanguage').val();
	var primerUsed = $('#primerUsed').val();
	var endDate = $('#endDate').val();
	var examDate = $('#examDate').val();
	var appeared = $('#appeared').val();
	var passed = $('#passed').val();

	if (projectId==''){

		alert('Center ID cannot be empty');
		parent.jQuery.fancybox.close();
	}else if (centerName==''){

		alert('Please enter name of the center');
		parent.jQuery.fancybox.close();
	}else if (centerCity==''){

		alert('Please enter city');
		parent.jQuery.fancybox.close();
	}else if (centerState==''){

		alert('Please select state');
		parent.jQuery.fancybox.close();
	}else if (no_adult_learner==''){

		alert('Please enter no. of adult learners');
		parent.jQuery.fancybox.close();

	}else if (teachingLanguage==''){

		alert('Please enter language of teaching');
		parent.jQuery.fancybox.close();

	}else if (primerUsed==''){

		alert('Please select primer');
		parent.jQuery.fancybox.close();

	}else if (endDate=='' || endDate=='0000-00-00'){

		alert('Please select end date');
		document.getElementById('endDate').focus();

	}else if (examDate=='' || examDate=='0000-00-00'){

		alert('Please select examination date');
		document.getElementById('examDate').focus();

	}else if (appeared==''){

		alert('Please enter no. of appeared learners');
		document.getElementById('appeared').focus();

	}else if (passed==''){

		alert('Please enter no. of passed learners');
		document.getElementById('passed').focus();

	}else{

		$.ajax({

			url: 'save-row-data-2.php',
			type: 'post',
			data: 'projectId=' + projectId + '&centerId=' + centerId + '&centerName=' + centerName + '&centerCity=' + centerCity + '&centerState=' + centerState + '&centerNo=' + centerNo + '&sln=' + sln + '&no_adult_learner=' + no_adult_learner + '&teachingLanguage=' + teachingLanguage + '&primerUsed=' + primerUsed + '&endDate=' + endDate + '&examDate=' + examDate + '&appeared=' + appeared + '&passed=' + passed,
			success: function(f){

				alert('Data saved successfully');
				parent.jQuery.fancybox.close();
			}
		})
	}
}
$(document).ready(function(){
	$("html").niceScroll({cursorcolor:"#2c72b1"});
});
</script>
</body>
</html>