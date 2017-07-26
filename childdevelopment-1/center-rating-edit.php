<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

unset($_SESSION['assessment_id']);

$getDet = mysql_fetch_array(mysql_query("select * from asha_kiran_center_rating where assessment_id='".base64_decode($_REQUEST['assessid'])."'"));
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
</style>

<script type="text/javascript">
$(function() {
	$( "#visit_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2100",
		maxDate: '0',
		dateFormat: 'dd-mm-yy',
		onSelect: function(date, instance){
		$.ajax({
			url: 'get-month.php',
			type: 'post',
			data: 'date=' + date,
			success: function(f){
				$('#current_visit').val(f);
			}
		});
     }
	});
});
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
function validateForm(){
	var ngo = $('#ngo').val();
	var akc_id = $('#akc_id').val();
	var state = $('#state').val();
	var project_period = $('#project_period').val();
	var teacher_name = $('#teacher_name').val();
	var enrolled_boys = $('#enrolled_boys').val();
	var enrolled_girls = $('#enrolled_girls').val();
	var boys_present = $('#boys_present').val();
	var girls_present = $('#girls_present').val();
	var last_visit = $('#last_visit').val();
	var current_visit = $('#current_visit').val();
	var visit_date = $('#visit_date').val();
	var duration = $('#duration').val();

	if (ngo==''){
		alert('Please select Asha Kiran Organization');
		return false;
	}else if (akc_id==''){
		alert('AKC Id cannot be empty');
		return false;
	}else if (state==''){
		alert('Please select a state');
		return false;
	}else if (project_period==''){
		alert('Project period cannot be empty');
		return false;
	}else if (teacher_name==''){
		alert('Teacher name cannot be emtpy');
		return false;
	}else if (enrolled_boys==''){
		alert('No. of total enrolled boys cannot be emtpy');
		return false;
	}else if (enrolled_girls==''){
		alert('No. of total enrolled girls cannot be emtpy');
		return false;
	}else if (boys_present==''){
		alert('No. of total present boys cannot be emtpy');
		return false;
	}else if (girls_present==''){
		alert('No. of total present girls cannot be emtpy');
		return false;
	}else if (last_visit==''){
		alert('Please mention the month of your last visit to this center');
		return false;
	}else if (current_visit==''){
		alert('Select a month when you conducted your current visit');
		return false;
	}else if (visit_date==''){
		alert('Select visit date');
		return false;
	}else if (duration==''){
		alert('What was the duration of your stay?');
		return false;
	}
}
function gettotalenrolled(){
	var enrolled_boys = $('#enrolled_boys').val();
    var enrolled_girls = $('#enrolled_girls').val();

    if (enrolled_boys==''){enrolledBoys = 0;}
    else{enrolledBoys = parseInt(enrolled_boys);}

    if (enrolled_girls==''){enrolledGirls = 0;}
    else{enrolledGirls = parseInt(enrolled_girls);}

    total_enrolled = enrolledBoys + enrolledGirls;
    
	$('#total_enrolled').val(total_enrolled);
}
function gettotalpresent(){
	var boys_present = $('#boys_present').val();
    var girls_present = $('#girls_present').val();

    if (boys_present==''){presentBoys = 0;}
    else{presentBoys = parseInt(boys_present);}

    if (girls_present==''){presentGirls = 0;}
    else{presentGirls = parseInt(girls_present);}

    total_present = presentBoys + presentGirls;

	$('#total_present').val(total_present);
}
function getClub(){
	var ngo = $('#ngo').val();

	$.ajax({
		url: 'get-club.php',
		type: 'post',
		data: 'ngo=' + ngo,
		success: function(f){
			$('#center_name').html(f);
			$('#akc_id').val(ngo);
		}
	})
}
function getLastVisit(){
	var ngo = $('#ngo').val();
	var center_name = $('#center_name').val();

	if (ngo!='' && center_name!=''){

		$.ajax({
			url: 'get-lastvisit.php',
			type: 'post',
			data: 'ngo=' + ngo + '&center_name=' + center_name,
			success: function(f){
				$('#last_visit').val(f);
			}
		})
	}
}
</script>

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

				<?php
				if (isset($_REQUEST['saveBtn'])){

					if ($_REQUEST['center_name']==''){$centerName = 'NA';}else{$centerName = $_REQUEST['center_name'];}

					$visitDate = date('Y-m-d', strtotime($_REQUEST['visit_date']));

					$edit = "update asha_kiran_center_rating set ngo='".$_REQUEST['ngo']."', center='".$centerName."', akc_id='".$_REQUEST['akc_id']."', state='".$_REQUEST['state']."', project_period='".$_REQUEST['project_period']."', teacher_name='".$_REQUEST['teacher_name']."', gender='".$_REQUEST['gender']."', enrolled_boys='".$_REQUEST['enrolled_boys']."', enrolled_girls='".$_REQUEST['enrolled_girls']."', present_boys='".$_REQUEST['boys_present']."', present_girls='".$_REQUEST['girls_present']."', visiting_quarter='".$_REQUEST['quarter']."', last_visit_month='".$_REQUEST['last_visit']."', current_visit_month='".$_REQUEST['current_visit']."', visit_date='".$visitDate."', stay_duration='".$_REQUEST['duration']."' where assessment_id='".base64_decode($_REQUEST['assessid'])."'";

					mysql_query($edit);
				?>
				<script type="text/javascript">
				alert('Details are saved');
				window.location = 'center-rating-2.php?assessid=<?= $_REQUEST['assessid'] ?>';
				</script>
				<?php
				}
				?>

				<form action="" method="post" onsubmit="return validateForm()">

				<div class="col-sm-12" id="form_section">

					<div class="part_haeder"><h1 style="padding: 10px 15px;margin: 0;font-weight: normal;word-spacing: 3px;text-transform: uppercase;color: #fff;">background information</h1></div>

					<table width="100%">
						<tr style="height: 10px;"><td colspan="4"></td>

						<tr class="table_tr">
							<td class="table_label">Asha Kiran Organization name : </td>
							<td colspan="3">
								<select name="ngo" id="ngo" class="form-control" onchange="getClub()" style="width: 100%;">
									<option value="">-- Please Select --</option>
									<?php
									$query_getngo = mysql_query("select * from tbl_admin where type='NGO' and center_name!='' and status='Active'");
									while ($getngo = mysql_fetch_array($query_getngo)){
									?>
									<option value="<?= $getngo['id'] ?>" <?php if ($getDet['ngo']==$getngo['id']){echo 'selected';} ?>><?= strtoupper($getngo['center_name']) ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>

						<tr class="table_tr">
							<td width="25%" class="table_label">Asha Kiran Center name : </td>
							<td colspan="3">
								<select name="center_name" id="center_name" class="form-control" onchange="getLastVisit()" style="width: 100%;">
									<option value="">-- Please Select --</option>
									
								</select>
							</td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">AKC ID : </td>
							<td colspan="3"><input type="text" name="akc_id" id="akc_id" class="form-control" style="width: 100%;" readonly="readonly" value="<?= $getDet['ngo'] ?>" /></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">State : </td>
							<td colspan="3">
								<select name="state" id="state" class="form-control" style="width: 100%;">
									<option value="">-- Please Select --</option>
									<?php
									$query_getstate = mysql_query("select * from tbl_states");
									while ($getstate = mysql_fetch_array($query_getstate)){
									?>
									<option value="<?= $getstate['state'] ?>" <?php if($getstate['state']==$getDet['state']){echo 'selected';} ?>><?= $getstate['state'] ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Project period : </td>
							<td colspan="3"><input type="text" name="project_period" id="project_period" class="form-control" style="width: 100%;" value="<?= $getDet['project_period'] ?>" /></td>
						</tr>

						<tr class="table_tr">
							<td width="25%" class="table_label">Name of the teacher : </td>
							<td width="45%"><input type="text" name="teacher_name" id="teacher_name" class="form-control" style="width: 100%;" onkeyup="letterswithspace(this)" value="<?= $getDet['teacher_name'] ?>" /></td>
							<td width="15%" class="table_label">Gender : </td>
							<td>
								<input type="radio" name="gender" id="male" value="male" <?php if($getDet['gender']=='male'){echo 'checked';} ?> /><label for="male" style="margin: 8px 20px 0 0;">Male</label>

								<input type="radio" name="gender" id="female" value="female" <?php if($getDet['gender']=='female'){echo 'checked';} ?> /><label for="female">Female</label>
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
							<td width="9%"><input type="text" name="enrolled_boys" id="enrolled_boys" class="form-control" style="width: 100%;" onkeyup="numbersOnly(this), gettotalenrolled()" value="<?= $getDet['enrolled_boys'] ?>" /></td>

							<td width="24%" class="table_label">Total no. of enrolled girls : </td>
							<td width="9%"><input type="text" name="enrolled_girls" id="enrolled_girls" class="form-control" style="width: 100%;" onkeyup="numbersOnly(this), gettotalenrolled()" value="<?= $getDet['enrolled_girls'] ?>" /></td>

							<td width="24%" class="table_label">Total no. of enrolled children : </td>
							<td width="9%"><input type="text" name="total_enrolled" id="total_enrolled" class="form-control" style="width: 100%;" onkeyup="numbersOnly(this)" readonly="readonly" value="<?php echo ($getDet['enrolled_boys'] + $getDet['enrolled_girls']); ?>" /></td>
						</tr>

						<tr class="table_tr">
							<td width="24%" class="table_label">No. of boys present : </td>
							<td width="9%"><input type="text" name="boys_present" id="boys_present" class="form-control" style="width: 100%;" onkeyup="numbersOnly(this), gettotalpresent()" value="<?= $getDet['present_boys'] ?>" /></td>

							<td width="24%" class="table_label">No. of girls present : </td>
							<td width="9%"><input type="text" name="girls_present" id="girls_present" class="form-control" style="width: 100%;" onkeyup="numbersOnly(this), gettotalpresent()" value="<?= $getDet['present_girls'] ?>" /></td>

							<td width="24%" class="table_label">Children present on the day of visit: : </td>
							<td width="9%"><input type="text" name="total_present" id="total_present" class="form-control" style="width: 100%;" onkeyup="numbersOnly(this)" readonly="readonly" value="<?php echo ($getDet['present_boys'] + $getDet['present_girls']); ?>" /></td>
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
								<input type="radio" name="quarter" id="quarter_1" value="quarter_1" <?php if($getDet['visiting_quarter']=='quarter_1'){echo 'checked';} ?> /><label for="quarter_1" style="margin: 8px 20px 0 0;">Quarter - I</label>

								<input type="radio" name="quarter" id="quarter_2" value="quarter_2" <?php if($getDet['visiting_quarter']=='quarter_2'){echo 'checked';} ?> /><label for="quarter_2" style="margin: 8px 20px 0 0;">Quarter - II</label>

								<input type="radio" name="quarter" id="quarter_3" value="quarter_3" <?php if($getDet['visiting_quarter']=='quarter_3'){echo 'checked';} ?> /><label for="quarter_3" style="margin: 8px 20px 0 0;">Quarter - III</label>

								<input type="radio" name="quarter" id="quarter_4" value="quarter_4" <?php if($getDet['visiting_quarter']=='quarter_4'){echo 'checked';} ?> /><label for="quarter_4" style="margin: 8px 20px 0 0;">Quarter - IV</label>
							</td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Month of last visit : </td>
							<td colspan="3"><input type="text" name="last_visit" id="last_visit" class="form-control" style="width: 100%;" readonly="readonly" value="<?= $getDet['last_visit_month'] ?>" /></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Month of current visit : </td>
							<td colspan="3"><input type="text" name="current_visit" id="current_visit" class="form-control" style="width: 100%;" readonly="readonly" value="<?= $getDet['current_visit_month'] ?>" /></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Date of visit : </td>
							<td colspan="3"><input type="text" name="visit_date" id="visit_date" class="form-control" style="width: 100%;" readonly="readonly" value="<?= $getDet['visit_date'] ?>" /></td>
						</tr>

						<tr class="table_tr">
							<td class="table_label">Duration of stay : </td>
							<td colspan="3"><input type="text" name="duration" id="duration" class="form-control" style="width: 80%;float: left;" onkeyup="numbersOnly(this)" value="<?= $getDet['stay_duration'] ?>" /><span style="float: left;line-height: 40px;margin: 0 0 0 15px;">(In hours)</span></td>
						</tr>
					</table>
				</div>

				<input type="submit" name="saveBtn" id="saveBtn" value="SAVE & GO TO PAGE - II" class="btn btn-primary" style="float: right;margin: 20px 0 0 0;" />

				</form>
			</div>

		</div>
	</div>	

<?php include('include/footer.php'); ?>
	
	
</div>

</body>
</html>