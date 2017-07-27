<?php
include('../../include/config.php');

$getDet = mysql_fetch_array(mysql_query("select evaluation_form, image_1, image_2, image_3 from project_teacher_support_nation where project_no='".$_REQUEST['prno']."'"));
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
    $( "#startDate" ).datepicker({
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

	<tr><td colspan="2" style="height: 30px;"></td></tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload scanned copy / image of the NB 3.1 evaluation form : </td>
		<td width="55%" class="table-row" style="height: 40px;">
			<input type="file" name="eval_form" id="eval_form" />

			<span id="uploaded_form"></span>

			<?php if ($getDet['evaluation_form']!=''){ ?><span style="color: #009342;" id="have_doc_form">We already have this document</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 1 : </td>
		<td width="55%" class="table-row" style="height: 40px;">
			<input type="file" name="img_1" id="img_1" />

			<span id="uploaded_image_1"></span>

			<?php if ($getDet['image_1']!=''){ ?><span style="color: #009342;" id="have_doc_1">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 2 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="img_2" id="img_2" />

			<span id="uploaded_image_2"></span>

			<?php if ($getDet['image_2']!=''){ ?><span style="color: #009342;" id="have_doc_2">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 3 : </td>
		<td width="55%" class="table-row">
			<input type="file" name="img_3" id="img_3" />

			<span id="uploaded_image_3"></span>

			<?php if ($getDet['image_3']!=''){ ?><span style="color: #009342;" id="have_doc_3">We already have an image</span><?php } ?>
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
<input type="hidden" name="schoolType" id="schoolType" value="<?= $_REQUEST['schoolType'] ?>" />
<input type="hidden" name="sln" id="sln" value="<?= $_REQUEST['sln'] ?>" />
<input type="hidden" name="no_teacher_evaluated" id="no_teacher_evaluated" value="<?= $_REQUEST['no_teacher_evaluated'] ?>" />
<input type="hidden" name="no_teacher_awarded" id="no_teacher_awarded" value="<?= $_REQUEST['no_teacher_awarded'] ?>" />
<input type="hidden" name="subject" id="subject" value="<?= $_REQUEST['subject'] ?>" />
<input type="hidden" name="distDate" id="distDate" value="<?= $_REQUEST['distDate'] ?>" />
<input type="hidden" name="schoolNo" id="schoolNo" value="<?= $_REQUEST['schoolNo'] ?>" />

<script>
$(document).ready(function(){
    $(document).on('change', '#eval_form', function(){

        var eval_form = document.getElementById('eval_form').files[0];
        var projectId = document.getElementById('projectId').value;
        var sln = document.getElementById('sln').value;
        var distDate = document.getElementById('distDate').value;

        var image_name = eval_form.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if (jQuery.inArray(image_extension, ['png', 'jpg', 'jpeg']) == -1){

            alert('Invalid file extension. Please select an image');
        }
        var image_size = eval_form.size;

        if (image_size > 2000000){

            alert('Image is too large. Please select an image of smaller size');
        }
        else{

            var form_data = new FormData();
            form_data.append('eval_form', eval_form);
            form_data.append('projectId', projectId);
            form_data.append('sln', sln);
            form_data.append('distDate', distDate);
            
            $.ajax({
                url: 'upload_form.php',
                type: 'post',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $('#uploaded_form').html('<label class="text-success">Image uploading ...</label>');
                },
                success: function(data){
                    $('#uploaded_form').html(data);
                }
            })
        }
    });

    $(document).on('change', '#img_1', function(){

        var img_1 = document.getElementById('img_1').files[0];
        var projectId = document.getElementById('projectId').value;
        var sln = document.getElementById('sln').value;
        var distDate = document.getElementById('distDate').value;

        var image_name = img_1.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if (jQuery.inArray(image_extension, ['png', 'jpg', 'jpeg']) == -1){

            alert('Invalid file extension. Please select an image');
        }
        var image_size = img_1.size;

        if (image_size > 2000000){

            alert('Image is too large. Please select an image of smaller size');
        }
        else{

            var form_data = new FormData();
            form_data.append('img_1', img_1);
            form_data.append('projectId', projectId);
            form_data.append('sln', sln);
            form_data.append('distDate', distDate);
            
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

        var img_2 = document.getElementById('img_2').files[0];
        var projectId = document.getElementById('projectId').value;
        var sln = document.getElementById('sln').value;
        var distDate = document.getElementById('distDate').value;

        var image_name = img_2.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if (jQuery.inArray(image_extension, ['png', 'jpg', 'jpeg']) == -1){

            alert('Invalid file extension. Please select an image');
        }
        var image_size = img_2.size;

        if (image_size > 2000000){

            alert('Image is too large. Please select an image of smaller size');
        }
        else{

            var form_data = new FormData();
            form_data.append('img_2', img_2);
            form_data.append('projectId', projectId);
            form_data.append('sln', sln);
            form_data.append('distDate', distDate);
            
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

        var img_3 = document.getElementById('img_3').files[0];
        var projectId = document.getElementById('projectId').value;
        var sln = document.getElementById('sln').value;
        var distDate = document.getElementById('distDate').value;

        var image_name = img_3.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if (jQuery.inArray(image_extension, ['png', 'jpg', 'jpeg']) == -1){

            alert('Invalid file extension. Please select an image');
        }
        var image_size = img_3.size;

        if (image_size > 2000000){

            alert('Image is too large. Please select an image of smaller size');
        }
        else{

            var form_data = new FormData();
            form_data.append('img_3', img_3);
            form_data.append('projectId', projectId);
            form_data.append('sln', sln);
            form_data.append('distDate', distDate);
            
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
});
	
function saveData(){

	var projectId = $('#projectId').val();
	var schoolId = $('#schoolId').val();
	var schoolName = $('#schoolName').val();
	var schoolType = $('#schoolType').val();
	var sln = $('#sln').val();
	var no_teacher_evaluated = $('#no_teacher_evaluated').val();
	var no_teacher_awarded = $('#no_teacher_awarded').val();
	var subject = $('#subject').val();
	var distDate = $('#distDate').val();
	var schoolNo = $('#schoolNo').val();

	if (schoolId==''){

		alert('School ID cannot be empty');
		parent.jQuery.fancybox.close();
	}else if (schoolName==''){

		alert('Please enter name of the school');
		parent.jQuery.fancybox.close();
	}else if (schoolType==''){

		alert('Please select a school type');
		parent.jQuery.fancybox.close();
	}else if (no_teacher_evaluated==''){

		alert('Please enter no. of teachers evaluated');
		parent.jQuery.fancybox.close();
	}else if (no_teacher_awarded==''){

		alert('Please enter no. of teachers awarded');
		parent.jQuery.fancybox.close();

	}else if (subject==''){

		alert('Please enter subject taught');
		parent.jQuery.fancybox.close();

	}else{

		$.ajax({

			url: 'save-row-data.php',
			type: 'post',
			data: 'projectId=' + projectId + '&schoolId=' + schoolId + '&schoolName=' + schoolName + '&schoolType=' + schoolType + '&sln=' + sln + '&no_teacher_evaluated=' + no_teacher_evaluated + '&no_teacher_awarded=' + no_teacher_awarded + '&subject=' + subject + '&distDate=' + distDate + '&schoolNo=' + schoolNo,
			success: function(f){
				if (f==1){

					alert('Document / Images are missing');
					return false;
				}else{

					alert('Data saved successfully');
					parent.jQuery.fancybox.close();
				}
			}
		})
	}
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("html").niceScroll({cursorcolor:"#2c72b1"});
});
</script>
</body>
</html>