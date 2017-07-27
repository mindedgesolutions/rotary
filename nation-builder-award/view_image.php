<?php
include('../../include/config.php');

$getDet = mysql_fetch_array(mysql_query("select evaluation_form, image_1, image_2, image_3 from project_teacher_support_nation where project_no='".$_REQUEST['prno']."' and sln='".$_REQUEST['sln']."'"));
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
			<?php if ($getDet['evaluation_form']!=''){ ?><img src="<?= $getDet['evaluation_form'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

    <tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 1 : </td>
		<td width="55%" class="table-row" style="height: 40px;">
			<?php if ($getDet['image_1']!=''){ ?><img src="<?= $getDet['image_1'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

    <tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 2 : </td>
		<td width="55%" class="table-row">
			<?php if ($getDet['image_2']!=''){ ?><img src="<?= $getDet['image_2'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

    <tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 3 : </td>
		<td width="55%" class="table-row">
			<?php if ($getDet['image_3']!=''){ ?><img src="<?= $getDet['image_3'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

	<tr>
		<td colspan="2" style="height: 40px;"></td>
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

<script type="text/javascript">
$(document).ready(function(){
	$("html").niceScroll({cursorcolor:"#2c72b1"});
});
</script>
</body>
</html>