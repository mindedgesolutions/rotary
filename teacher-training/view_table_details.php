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
</style>

<script>
function closeFBox(){
	parent.jQuery.fancybox.close();
}
</script>
</head>

<body>

<?php
$getTemp = mysql_fetch_array(mysql_query("select * from project_teacher_support_training_details where project_no='".$_REQUEST['prno']."' and sln='".$_REQUEST['sln']."'"));
?>

<table width="500" border="0" style="border-collapse: collapse;margin: 5px 0 0 0;">
	<tr>
		<td class="heading" colspan="2">Details of : <?= strtoupper($_REQUEST['schoolName']) ?></td>
	</tr>

	<tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row">Name of teacher - 1 : </td>
		<td width="55%" class="table-row">
			<input type="text" name="teacher_name_1" id="teacher_name_1" readonly="readonly" value="<?php echo $getTemp['teacher_name_1'] ?>" class="form-control" style="width: 95%;" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">No. of students taught : </td>
		<td width="55%" class="table-row">
			<input type="text" name="no_student_1" id="no_student_1" readonly="readonly" value="<?php if ($getTemp['student_no_1']!=''){echo $getTemp['student_no_1'];} ?>" class="form-control" style="width: 95%;" onkeyup="numbersOnly(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">Name of teacher - 2 : </td>
		<td width="55%" class="table-row">
			<input type="text" name="teacher_name_2" id="teacher_name_2" readonly="readonly" value="<?php echo $getTemp['teacher_name_2'] ?>" class="form-control" style="width: 95%;" onkeyup="letterswithspace(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">No. of students taught : </td>
		<td width="55%" class="table-row">
			<input type="text" name="no_student_2" id="no_student_2" readonly="readonly" value="<?php if ($getTemp['student_no_2']!=''){echo $getTemp['student_no_2'];} ?>" class="form-control" style="width: 95%;" onkeyup="numbersOnly(this)" />
		</td>
	</tr>

	<tr>
		<td width="100%" class="table-row" colspan="2" style="line-height: 25px;">If more than 2 teachers involved, please provide the total number of teachers trained <input type="text" name="additional_teacher" id="additional_teacher" value="<?php echo $getTemp['total_teacher'] ?>" readonly="readonly" class="form-control" style="width: 50px;height: 25px;font-size: 12px;text-align: center;" /> and total number of students taught by all the teachers trained <input type="text" name="additional_students" id="additional_students" value="<?php echo $getTemp['total_student'] ?>" class="form-control" style="width: 50px;height: 25px;font-size: 12px;text-align: center;" readonly="readonly" />. </td>
	</tr>

	<tr>
		<td colspan="2" style="height: 20px;"></td>
	</tr>

	<tr>
		<td colspan="2" height="20" style="text-align: center;">
			<input type="button" name="closeBtn" id="closeBtn" value="Close" class="btn btn-primary" onclick="closeFBox()" style="margin: 0 15px 0 0;width: 80px;" />
		</td>
	</tr>

	<tr>
		<td colspan="2" style="height: 20px;"></td>
	</tr>
</table>

<input type="hidden" name="sln" id="sln" value="<?= $_REQUEST['sln'] ?>" />
<input type="hidden" name="projectId" id="projectId" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="trainingType" id="trainingType" value="<?= $_REQUEST['trainingType'] ?>" />
<input type="hidden" name="schoolId" id="schoolId" value="<?= $_REQUEST['schoolId'] ?>" />
<input type="hidden" name="schoolName" id="schoolName" value="<?= $_REQUEST['schoolName'] ?>" />
<input type="hidden" name="schoolCity" id="schoolCity" value="<?= $_REQUEST['schoolCity'] ?>" />
<input type="hidden" name="schoolState" id="schoolState" value="<?= $_REQUEST['schoolState'] ?>" />
<input type="hidden" name="schoolType" id="schoolType" value="<?= $_REQUEST['schoolType'] ?>" />
<input type="hidden" name="no_schools" id="no_schools" value="<?= $_REQUEST['no_schools'] ?>" />

<script>
$(document).ready(function(){
	$("html").niceScroll({cursorcolor:"#2c72b1"});
});
</script>
</body>
</html>