<?php include('../include/config.php'); ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from project_elearning where project_no='".$_REQUEST['prno']."' and sln='".$_REQUEST['sln']."'"));
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
    $( "#installDate" ).datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2100",
		maxDate: '0',
		dateFormat: 'yy-mm-dd',
	});
});
</script>
</head>

<body>

<table width="500" border="0" style="border-collapse: collapse;margin: 5px 0 0 0;">
	<tr>
		<td class="heading" colspan="2">Details of : <?= strtoupper($_REQUEST['schoolName']) ?></td>
	</tr>

	<tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row">School Type : </td>
		<td width="55%" class="table-row">
			<select name="schoolType" id="schoolType" class="form-control" style="width: 95%;">
				<option value="">-- Select --</option>

				<option value="Government" <?php if($getDet['school_type']=='Government'){echo 'selected';} ?>>Government</option>
				<option value="Government-aided" <?php if($getDet['school_type']=='Government-aided'){echo 'selected';} ?>>Government-aided</option>

			</select>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">No. of Students : </td>
		<td width="55%" class="table-row">
			<input type="text" name="noStudents" id="noStudents" value="<?php if ($getDet['no_students']==''){echo '';}else{echo $getDet['no_students'];} ?>" class="form-control" style="width: 95%;" onkeyup="numbersOnly(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">Language of Content : </td>
		<td width="55%" class="table-row">
			<input type="text" name="teachingLang" id="teachingLang" value="<?php if ($getDet['teaching_language']==''){echo '';}else{echo $getDet['teaching_language'];} ?>" class="form-control" style="width: 95%;" onkeyup="letterswithspace(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">Date of Installation : </td>
		<td width="55%" class="table-row">
			<input type="text" name="installDate" id="installDate" value="<?php if ($getDet['installation_date']==''){echo '';}else{echo $getDet['installation_date'];} ?>" class="form-control" style="width: 95%;" readonly="readonly" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload letter of requirement (only for self funded projects) : </td>
		<td width="55%" class="table-row" style="height: 40px;">
			<input type="file" name="requirement_letter" id="requirement_letter" />

			<span id="uploaded_image_1"></span>

			<?php if ($getDet['requirement_letter']!=''){ ?><span style="color: #009342;" id="have_doc_1">We already have a document</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload letter of satisfaction from SMC / Principal of School : </td>
		<td width="55%" class="table-row">
			<input type="file" name="satisfaction_letter" id="satisfaction_letter" />

			<span id="uploaded_image_2"></span>

			<?php if ($getDet['satisfaction_letter']!=''){ ?><span style="color: #009342;" id="have_doc_2">We already have a document</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 1 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="photo_1" id="photo_1" />

			<span id="uploaded_image_3"></span>

			<?php if ($getDet['image_1']!=''){ ?><span style="color: #009342;" id="have_doc_3">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 2 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="photo_2" id="photo_2" />

			<span id="uploaded_image_4"></span>

			<?php if ($getDet['image_2']!=''){ ?><span style="color: #009342;" id="have_doc_4">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 3 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="photo_3" id="photo_3" />

			<span id="uploaded_image_5"></span>

			<?php if ($getDet['image_3']!=''){ ?><span style="color: #009342;" id="have_doc_5">We already have an image</span><?php } ?>
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
<input type="hidden" name="schoolId" id="schoolId" value="<?= $_REQUEST['schoolId'] ?>" />
<input type="hidden" name="schoolName" id="schoolName" value="<?= $_REQUEST['schoolName'] ?>" />
<input type="hidden" name="schoolCity" id="schoolCity" value="<?= $_REQUEST['schoolCity'] ?>" />
<input type="hidden" name="schoolState" id="schoolState" value="<?= $_REQUEST['schoolState'] ?>" />
<input type="hidden" name="schoolType" id="schoolType" value="<?= $_REQUEST['schoolType'] ?>" />
<input type="hidden" name="sln" id="sln" value="<?= $_REQUEST['sln'] ?>" />
<input type="hidden" name="schoolNo" id="schoolNo" value="<?= $_REQUEST['schoolNo'] ?>" />
<input type="hidden" name="projector" id="projector" value="<?= $_REQUEST['projector'] ?>" />

<script>
$(document).ready(function(){
	//---------for letter of requirement----------//

	$(document).on('change', '#requirement_letter', function(){

		$('#have_doc_1').hide();

		var property = document.getElementById('requirement_letter').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['pdf', 'docx', 'PDF', 'DOCX', 'jpg', 'JPG', 'jpeg', 'JPEG']) == -1){

			alert('Invalid file extension');
			document.getElementById('requirement_letter').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Document size is too large. Please select a document of smaller size');
			document.getElementById('requirement_letter').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('requirement_letter', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_1.php',
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

	$(document).on('change', '#satisfaction_letter', function(){

		$('#have_doc_2').hide();

		var property = document.getElementById('satisfaction_letter').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['pdf', 'docx', 'PDF', 'DOCX', 'jpg', 'JPG', 'jpeg', 'JPEG']) == -1){

			alert('Invalid file extension');
			document.getElementById('satisfaction_letter').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Document size is too large. Please select a document of smaller size');
			document.getElementById('satisfaction_letter').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('satisfaction_letter', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_2.php',
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

	$(document).on('change', '#photo_1', function(){

		$('#have_doc_3').hide();

		var property = document.getElementById('photo_1').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1){

			alert('Invalid file extension');
			document.getElementById('photo_1').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Image is too large. Please select an image of smaller size');
			document.getElementById('photo_1').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('photo_1', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_image_1.php',
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

	$(document).on('change', '#photo_2', function(){

		$('#have_doc_4').hide();

		var property = document.getElementById('photo_2').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1){

			alert('Invalid file extension');
			document.getElementById('photo_2').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Image is too large. Please select an image of smaller size');
			document.getElementById('photo_2').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('photo_2', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_image_2.php',
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

	$(document).on('change', '#photo_3', function(){

		$('#have_doc_5').hide();

		var property = document.getElementById('photo_3').files[0];
		var projectId = document.getElementById('projectId').value;
		var sln = document.getElementById('sln').value;

		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1){

			alert('Invalid file extension');
			document.getElementById('photo_3').value = '';
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Image is too large. Please select an image of smaller size');
			document.getElementById('photo_3').value = '';
		}
		else{

			var form_data = new FormData();
			form_data.append('photo_3', property);
			form_data.append('projectId', projectId);
			form_data.append('sln', sln);

			$.ajax({
				url: 'upload_image_3.php',
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
	var schoolId = $('#schoolId').val();
	var schoolName = $('#schoolName').val();
	var schoolCity = $('#schoolCity').val();
	var schoolState = $('#schoolState').val();
	var schoolType = $('#schoolType').val();
	var sln = $('#sln').val();
	var noStudents = $('#noStudents').val();
	var teachingLang = $('#teachingLang').val();
	var installDate = $('#installDate').val();
	var schoolNo = $('#schoolNo').val();
	var projector = $('#projector').val();

	if (schoolId==''){

		alert('School ID cannot be empty');
		parent.jQuery.fancybox.close();

	}else if (schoolName==''){

		alert('Please enter name of the school');
		parent.jQuery.fancybox.close();
	}else if (schoolCity==''){

		alert('Please enter city');
		parent.jQuery.fancybox.close();
	}else if (schoolState==''){

		alert('Please select state');
		parent.jQuery.fancybox.close();
	}else if (schoolType==''){

		alert('Please enter school type');
		parent.jQuery.fancybox.close();
	}else if (noStudents==''){

		alert('Please total no. of students');
		document.getElementById('noStudents').focus();

	}else if (teachingLang==''){

		alert('Please enter language of teaching');
		document.getElementById('teachingLang').focus();

	}else if (installDate==''){

		alert('Please select installation date');
		document.getElementById('installDate').focus();

	}else{

		$.ajax({

			url: 'save-row-data.php',
			type: 'post',
			data: 'projectId=' + projectId + '&schoolId=' + schoolId + '&schoolName=' + encodeURIComponent(schoolName) + '&schoolCity=' + encodeURIComponent(schoolCity) + '&schoolState=' + schoolState + '&schoolType=' + schoolType + '&sln=' + sln + '&noStudents=' + noStudents + '&teachingLang=' + teachingLang + '&installDate=' + installDate + '&schoolNo=' + schoolNo + '&projector=' + projector,
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