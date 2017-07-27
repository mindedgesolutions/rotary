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

<script type="text/javascript">
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

	<tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row">School Type : </td>
		<td width="55%" class="table-row">
			<select name="schoolType" id="schoolType" disabled="disabled" class="form-control" style="width: 95%;">
				<option value="">-- Select --</option>

				<option value="Government" <?php if($getDet['school_type']=='Government'){echo 'selected';} ?>>Government</option>
				<option value="Government-aided" <?php if($getDet['school_type']=='Government-aided'){echo 'selected';} ?>>Government-aided</option>

			</select>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">No. of Students : </td>
		<td width="55%" class="table-row">
			<input type="text" name="noStudents" id="noStudents" value="<?php if ($getDet['no_students']==''){echo '';}else{echo $getDet['no_students'];} ?>" readonly="readonly" class="form-control" style="width: 95%;" onkeyup="numbersOnly(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">Language of Content : </td>
		<td width="55%" class="table-row">
			<input type="text" name="teachingLang" id="teachingLang" value="<?php if ($getDet['teaching_language']==''){echo '';}else{echo $getDet['teaching_language'];} ?>" readonly="readonly" class="form-control" style="width: 95%;" onkeyup="letterswithspace(this)" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row">Date of Installation : </td>
		<td width="55%" class="table-row">
			<input type="text" name="installDate" id="installDate" value="<?php if ($getDet['installation_date']==''){echo '';}else{echo $getDet['installation_date'];} ?>" readonly="readonly" class="form-control" style="width: 95%;" readonly="readonly" />
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload letter of requirement (only for self funded projects) : </td>
		<td width="55%" class="table-row" style="height: 40px;">
			<?php if ($getDet['requirement_letter']!=''){ ?><img src="<?= $getDet['requirement_letter'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

	<tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload letter of satisfaction from SMC / Principal of School : </td>
		<td width="55%" class="table-row">
			<?php if ($getDet['satisfaction_letter']!=''){ ?><img src="<?= $getDet['satisfaction_letter'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

	<tr><td colspan="2" style="height: 10px;"></td></tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 1 : </td>
		<td width="55%" class="table-row">
			<?php if ($getDet['image_1']!=''){ ?><img src="<?= $getDet['image_1'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 2 : </td>
		<td width="55%" class="table-row">
			<?php if ($getDet['image_2']!=''){ ?><img src="<?= $getDet['image_2'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

	<tr>
		<td width="45%" class="table-row" style="line-height: 18px;">Upload photograph - 3 : </td>
		<td width="55%" class="table-row">
			<?php if ($getDet['image_3']!=''){ ?><img src="<?= $getDet['image_3'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
		</td>
	</tr>

	<tr>
		<td colspan="2" style="height: 10px;"></td>
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
<input type="hidden" name="schoolCity" id="schoolCity" value="<?= $_REQUEST['schoolCity'] ?>" />
<input type="hidden" name="schoolState" id="schoolState" value="<?= $_REQUEST['schoolState'] ?>" />
<input type="hidden" name="schoolType" id="schoolType" value="<?= $_REQUEST['schoolType'] ?>" />
<input type="hidden" name="sln" id="sln" value="<?= $_REQUEST['sln'] ?>" />
<input type="hidden" name="schoolNo" id="schoolNo" value="<?= $_REQUEST['schoolNo'] ?>" />
<input type="hidden" name="projector" id="projector" value="<?= $_REQUEST['projector'] ?>" />

<script type="text/javascript">
$(document).ready(function(){
	$("html").niceScroll({cursorcolor:"#2c72b1"});
});
</script>
</body>
</html>