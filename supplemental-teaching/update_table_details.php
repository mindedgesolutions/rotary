<?php include('../../include/config.php'); ?>

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
.vol_details{
	width: 100%;
	height: auto;
	padding: 15px;
	margin: 10px 0;
	background-color: #b7b7b7;
}
.vol_details:nth-of-type(odd){
	background-color: #efeded;
}
label{
	float: left;
	margin: 0 0 0 10px;
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
function saveVolunteer(par){
	var volunteer_sln = par;
	var sln = $('#sln').val();
	var projectId = $('#projectId').val();
	var schoolId = $('#schoolId').val();
	var schoolName = $('#schoolName').val();
	var schoolCity = $('#schoolCity').val();
	var schoolState = $('#schoolState').val();
	var schools_involved = $('#schools_involved').val();
	var volunteer_name = $('#volunteer_name'+par).val();
	var dance = $('#dance'+par+':checked').val();
	var music = $('#music'+par+':checked').val();
	var art = $('#art'+par+':checked').val();
	var sports = $('#sports'+par+':checked').val();
	var other = $('#other'+par+':checked').val();
	var curricular_other = $('#curricular_other'+par).val();
	var science = $('#science'+par+':checked').val();
	var abacus = $('#abacus'+par+':checked').val();
	var reading = $('#reading'+par+':checked').val();
	var spelling = $('#spelling'+par+':checked').val();
	var writing = $('#writing'+par+':checked').val();
	var general_knowledge = $('#general_knowledge'+par+':checked').val();
	var support_other = $('#support_other'+par).val();
	var total_hours = $('#total_hours'+par).val();
	var student_taught = $('#student_taught'+par).val();

	if (schoolId==''){
		alert('School ID cannot be empty');
		parent.$.fancybox.close();
	}else if (schoolName==''){
		alert('School name cannot be empty');
		parent.$.fancybox.close();
	}else if (schoolCity==''){
		alert('School city cannot be empty');
		parent.$.fancybox.close();
	}else if (schoolState==''){
		alert('School state cannot be empty');
		parent.$.fancybox.close();
	}else if (volunteer_name==''){
		alert('Volunteer name cannot be empty');
		return false;
	}else if (total_hours==''){
		alert('Total hours cannot be empty');
		return false;
	}else if (student_taught==''){
		alert('Students taught cannot be empty');
		return false;
	}else{
		$.ajax({
			url: 'insert-volunteer-data.php',
			type: 'post',
			data: 'volunteer_sln=' + volunteer_sln + '&sln=' + sln + '&projectId=' + projectId + '&schoolId=' + schoolId + '&schoolName=' + schoolName + '&schoolCity=' + schoolCity + '&schoolState=' + schoolState + '&schools_involved=' + schools_involved + '&volunteer_name=' + volunteer_name + '&dance=' + dance + '&music=' + music + '&art=' + art + '&sports=' + sports + '&other=' + other + '&curricular_other=' + curricular_other + '&science=' + science + '&abacus=' + abacus + '&reading=' + reading + '&spelling=' + spelling + '&writing=' + writing + '&general_knowledge=' + general_knowledge + '&support_other=' + support_other + '&total_hours=' + total_hours + '&student_taught=' + student_taught,
			success: function(f){

				alert('Added successfully');
			}
		})
	}
}
function enableCurricular(par){	
	var other  = $('#other'+par+':checked').val();

	if (other=='other'){
		$("#curricular_other"+par).prop('disabled', false);
	}else{
		$("#curricular_other"+par).prop('disabled', true);
	}
}
function enableSubject(par){
	var subject_other  = $('#subject_other'+par+':checked').val();

	if (subject_other=='subject_support_other'){
		$("#support_other"+par).prop('disabled', false);
	}else{
		$("#support_other"+par).prop('disabled', true);
	}
}
</script>
</head>

<body>

<table width="500" border="0" style="border-collapse: collapse;margin: 5px 0 0 0;">
	<tr>
		<td class="heading" colspan="2">Details of : <?= strtoupper($_REQUEST['schoolName']) ?></td>
	</tr>

	<tr><td colspan="2" style="height: 20px;"></td></tr>
</table>

<input type="hidden" name="sln" id="sln" value="<?= $_REQUEST['sln'] ?>" />
<input type="hidden" name="projectId" id="projectId" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="schools_involved" id="schools_involved" value="<?= $_REQUEST['schools_involved'] ?>" />
<input type="hidden" name="volunteer_no" id="volunteer_no" value="<?= $_REQUEST['volunteer_no'] ?>" />
<input type="hidden" name="schoolId" id="schoolId" value="<?= $_REQUEST['schoolId'] ?>" />
<input type="hidden" name="schoolName" id="schoolName" value="<?= $_REQUEST['schoolName'] ?>" />
<input type="hidden" name="schoolCity" id="schoolCity" value="<?= $_REQUEST['schoolCity'] ?>" />
<input type="hidden" name="schoolState" id="schoolState" value="<?= $_REQUEST['schoolState'] ?>" />
<input type="hidden" name="schoolType" id="schoolType" value="<?= $_REQUEST['schoolType'] ?>" />

<?php for ($n=1; $n <= $_REQUEST['volunteer_no']; $n++){

	$getTemp = mysql_fetch_array(mysql_query("select * from project_temp_teacher_support_supplement where project_no='".$_REQUEST['prno']."' and sln='".$_REQUEST['sln']."' and volunteer_sln='".$n."'"));

	$vcurricular = explode(',', $getTemp['co_curricular']);
	$vsubject = explode(',', $getTemp['subject_support']);
?>

<div class="vol_details">
	<table width="100%">
		<tr>
			<td width="30%">Name : </td>
			<td width="70%"><input type="text" name="volunteer_name<?= $n ?>" id="volunteer_name<?= $n ?>" value="<?= $getTemp['volunteer_name'] ?>" class="form-control" required="required" /></td>
		</tr>
		<tr>
			<td width="100%" colspan="2">Activity undertaken : </td>
		</tr>
		<tr>
			<td width="100%" colspan="2">
				<table width="100%" border="1" style="border-collapse: collapse;">
					<tr>
						<td width="100%" colspan="4" style="background-color: #333;color: #fff;box-sizing: border-box;padding: 0 0 0 20px;">Co-curricular activities</td>
					</tr>
					<tr>
						<td width="25%"><input type="checkbox" name="dance<?= $n ?>" id="dance<?= $n ?>" value="dance" style="float: left;margin: 10px 5px 0 10px;" class="curricular" <?php if (in_array('dance', $vcurricular)){echo 'checked';} ?> /><label for="dance<?= $n ?>">Dance</label></td>

						<td width="25%"><input type="checkbox" name="music<?= $n ?>" id="music<?= $n ?>" value="music" style="float: left;margin: 10px 5px 0 10px;" class="curricular" <?php if (in_array('music', $vcurricular)){echo 'checked';} ?> /><label for="music<?= $n ?>">Music</label></td>

						<td width="25%"><input type="checkbox" name="art<?= $n ?>" id="art<?= $n ?>" value="art" style="float: left;margin: 10px 5px 0 10px;" class="curricular" <?php if (in_array('art', $vcurricular)){echo 'checked';} ?> /><label for="art<?= $n ?>">Art & Drawing</label></td>

						<td width="25%"><input type="checkbox" name="sports<?= $n ?>" id="sports<?= $n ?>" value="sports" style="float: left;margin: 10px 5px 0 10px;" class="curricular" <?php if (in_array('sports', $vcurricular)){echo 'checked';} ?> /><label for="sports<?= $n ?>">Sports</label></td>
					</tr>
					<tr>
						<td width="50%" colspan="2">
							<input type="checkbox" name="other<?= $n ?>" id="other<?= $n ?>" value="other" style="float: left;margin: 10px 5px 0 10px;" class="curricular" onclick="enableCurricular(<?= $n ?>)" /><label for="other<?= $n ?>">Other</label>
							
							<input type="text" name="curricular_other<?= $n ?>" id="curricular_other<?= $n ?>" class="form-control" style="width: 50%;margin: 0 0 0 20px;" value="<?= $getTemp['co_curricular_other'] ?>" disabled="disabled" />
						</td>
						<td width="50%" colspan="2">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="100%" colspan="2">
				<table width="100%" border="1" style="border-collapse: collapse;">
					<tr>
						<td width="100%" colspan="3" style="background-color: #333;color: #fff;box-sizing: border-box;padding: 0 0 0 20px;">Subject Support</td>
					</tr>
					<tr>
						<td width="50%"><input type="checkbox" name="science<?= $n ?>" id="science<?= $n ?>" value="science" style="float: left;margin: 10px 5px 0 10px;" <?php if (in_array('science', $vsubject)){echo 'checked';} ?> /><label for="science<?= $n ?>">Science in everyday life</label></td>

						<td width="50%"><input type="checkbox" name="abacus<?= $n ?>" id="abacus<?= $n ?>" value="abacus" style="float: left;margin: 10px 5px 0 10px;" <?php if (in_array('abacus', $vsubject)){echo 'checked';} ?> /><label for="abacus<?= $n ?>">Mental Maths/ Abacus</label></td>
					</tr>
					<tr>
						<td width="50%"><input type="checkbox" name="reading<?= $n ?>" id="reading<?= $n ?>" value="reading" style="float: left;margin: 10px 5px 0 10px;" <?php if (in_array('reading', $vsubject)){echo 'checked';} ?> /><label for="reading<?= $n ?>">Reading to children</label></td>

						<td width="50%"><input type="checkbox" name="spelling<?= $n ?>" id="spelling<?= $n ?>" value="spelling" style="float: left;margin: 10px 5px 0 10px;" <?php if (in_array('spelling', $vsubject)){echo 'checked';} ?> /><label for="spelling<?= $n ?>">Spelling</label></td>
					</tr>
					<tr>
						<td width="50%"><input type="checkbox" name="writing<?= $n ?>" id="writing<?= $n ?>" value="writing" style="float: left;margin: 10px 5px 0 10px;" <?php if (in_array('writing', $vsubject)){echo 'checked';} ?> /><label for="writing<?= $n ?>">Creative writing</label></td>

						<td width="50%"><input type="checkbox" name="general_knowledge<?= $n ?>" id="general_knowledge<?= $n ?>" value="general_knowledge" style="float: left;margin: 10px 5px 0 10px;" <?php if (in_array('general_knowledge', $vsubject)){echo 'checked';} ?> /><label for="general_knowledge<?= $n ?>">General Knowledge and Current Affairs</label></td>
					</tr>
					<tr>
						<td width="100%" colspan="2">
							<input type="checkbox" name="subject_other<?= $n ?>" id="subject_other<?= $n ?>" value="subject_support_other" style="float: left;margin: 10px 5px 0 10px;" onclick="enableSubject(<?= $n ?>)" /><label for="science">Other</label>

							<input type="text" name="support_other<?= $n ?>" id="support_other<?= $n ?>" class="form-control" style="width: 50%;margin: 0 0 0 20px;" value="<?= $getTemp['subject_support_other'] ?>" disabled="disabled" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="30%">Total hours dedicated : </td>
			<td width="70%">
				<input type="text" name="total_hours<?= $n ?>" id="total_hours<?= $n ?>" value="<?= $getTemp['total_hours'] ?>" class="form-control" required="required" onkeyup="numbersOnly(this)" />
			</td>
		</tr>
		<tr><td width="100%" colspan="2" style="height: 20px;"></td></tr>
		<tr>
			<td width="30%">Total students taught : </td>
			<td width="70%">
				<input type="text" name="student_taught<?= $n ?>" id="student_taught<?= $n ?>" value="<?= $getTemp['total_students'] ?>" class="form-control" required="required" onkeyup="numbersOnly(this)" />
			</td>
		</tr>
		<tr><td width="100%" colspan="2" style="height: 20px;"></td></tr>
		<tr>
			<td width="100%" colspan="2" style="text-align: center;">
				<input type="button" name="saveBtn" id="saveBtn" class="btn btn-primary" value="Save" style="width: 80px;" onclick="saveVolunteer(<?= $n ?>)">
			</td>
		</tr>
	</table>
</div>

<?php } ?>

<table width="500" border="0" style="border-collapse: collapse;margin: 5px 0 0 0;">
	<tr>
		<td colspan="2" height="20" style="text-align: center;">
			<input type="button" name="closeBtn" id="closeBtn" value="Close" class="btn btn-primary" onclick="closeFBox()" style="margin: 0 15px 0 0;width: 80px;" />
		</td>
	</tr>

	<tr>
		<td colspan="2" style="height: 20px;"></td>
	</tr>
</table>

<script>
$(document).ready(function(){
	$("html").niceScroll({cursorcolor:"#2c72b1"});
});
</script>
</body>
</html>