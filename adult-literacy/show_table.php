<?php
include('../include/config.php');

$delete = "delete from project_temp_adult_literacy where project_no='".$_REQUEST['prno']."'";
mysql_query($delete);

$grantNo = mysql_fetch_array(mysql_query("select * from project_master where project_no='".$_REQUEST['prno']."'"));
?>

<style type="text/css">
.table-head{
  background-color: #333;
  color: #fff;
  text-align: center;
}
</style>

<script type="text/javascript" src="source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css" media="screen" />

<script type="text/javascript">
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
function openFancyBox_start(par){
	var sln = par;
	var prno = $('#prno').val();
	var centerId = $('#centerId'+par).val();
	var centerName = $('#centerName'+par).val();
	var centerCity = $('#centerCity'+par).val();
	var centerState = $('#centerState'+par).val();
	var centerNo = $('#centerNo').val();
	var no_adult_learner = $('#no_adult_learner'+par).val();
	var teachingLanguage = $('#teachingLanguage'+par).val();
	var primerUsed = $('#primerUsed'+par).val();

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
		href: 'session_start_details.php?sln=' + sln + '&centerId=' + centerId + '&centerName=' + encodeURIComponent(centerName) + '&centerCity=' + centerCity + '&centerState=' + centerState + '&prno=' + prno + '&centerNo=' + centerNo + '&no_adult_learner=' + no_adult_learner + '&teachingLanguage=' + teachingLanguage + '&primerUsed=' + primerUsed,
		/*'afterClose':function () {
				 href: '../mycart/registration_success.php',
			  }, */
			  'afterClose': function(){
			},
		});
	});
}
function openFancyBox_end(par){
	var sln = par;
	var prno = $('#prno').val();
	var centerId = $('#centerId'+par).val();
	var centerName = $('#centerName'+par).val();
	var centerCity = $('#centerCity'+par).val();
	var centerState = $('#centerState'+par).val();
	var centerNo = $('#centerNo').val();
	var no_adult_learner = $('#no_adult_learner'+par).val();
	var teachingLanguage = $('#teachingLanguage'+par).val();
	var primerUsed = $('#primerUsed'+par).val();

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
		href: 'session_end_details.php?sln=' + sln + '&centerId=' + centerId + '&centerName=' + encodeURIComponent(centerName) + '&centerCity=' + centerCity + '&centerState=' + centerState + '&prno=' + prno + '&centerNo=' + centerNo + '&no_adult_learner=' + no_adult_learner + '&teachingLanguage=' + teachingLanguage + '&primerUsed=' + primerUsed,
		/*'afterClose':function () {
				 href: '../mycart/registration_success.php',
			  }, */
			  'afterClose': function(){
			},
		});
	});
}
function saveCenter(){

	var prno = $('#prno').val();
	var centerNo = $('#centerNo').val();
	var prno_enc = $('#prno_enc').val();folderNo_enc
	var folderno = $('#folderNo_enc').val();
	var projector = $('#projector').val();

	$.ajax({
		url: 'save-center-info.php',
		type: 'post',
		data: 'prno=' + prno + '&centerNo=' + centerNo + '&projector=' + projector,
		success: function(f){

			if (f==1){
				alert('Please fill all the information before you proceed');
			}else{
				window.location = 'funding-details.php?prno=' + prno_enc + '&folderno=' + folderno;
			}
		}
	})
}
</script>

<input type="hidden" name="prno" id="prno" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="prno_enc" id="prno_enc" value="<?= base64_encode($_REQUEST['prno']) ?>" />
<input type="hidden" name="folderNo_enc" id="folderNo_enc" value="<?= base64_encode($_REQUEST['folderno']) ?>" />
<input type="hidden" name="centerNo" id="centerNo" value="<?= $_REQUEST['centerNo'] ?>" />
<input type="hidden" name="grantNo" id="grantNo" value="<?= $grantNo['grant_no'] ?>" />

<table border="1" style="border-collapse: collapse;">
	<tr class="table-head">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
		<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">Center ID</td>
		<td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;">Center Name</td>
		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;">City/Village</td>
		<td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;">State</td>
		<td style="line-height: 18px;width: 10%;height: 50px;font-size: 90%;padding: 8px 0 0 0;">No. of Adult Learner</td>
		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;">Teaching Language</td>
		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;">Primer Used</td>
		<td style="line-height: 50px;width: 11%;height: 50px;font-size: 90%;">Start Session</td>
		<td style="line-height: 50px;width: 11%;height: 50px;font-size: 90%;">End Session</td>
	</tr>

	<?php
	for ($i = 1; $i <= $_REQUEST['centerNo']; $i++){
	?>
	<tr class="table-row">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

		<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="centerId<?= $i ?>" id="centerId<?= $i ?>" value="" class="form-control" />
		</td>

		<td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="centerName<?= $i ?>" id="centerName<?= $i ?>" value="" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="centerCity<?= $i ?>" id="centerCity<?= $i ?>" value="" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<select name="centerState<?= $i ?>" id="centerState<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;">
				<option value="">-- Select --</option>

				<?php
				$get_state = mysql_query("select * from states");
				while ($state = mysql_fetch_array($get_state)){
				?>
				<option value="<?= $state['state'] ?>" <?php if($state['state']==$getDet['school_state']){echo 'selected';} ?>><?= $state['state'] ?></option>
				<?php } ?>
			</select>
		</td>

		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="no_adult_learner<?= $i ?>" id="no_adult_learner<?= $i ?>" value="" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="teachingLanguage<?= $i ?>" id="teachingLanguage<?= $i ?>" value="" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 7%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<select name="primerUsed<?= $i ?>" id="primerUsed<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;">
				<option value="">-- Select --</option>

				<option value="RILM Primer">RILM Primer</option>
				<option value="SRC Primer">SRC Primer</option>
				<option value="Other">Other</option>
			</select>
		</td>

		<td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
			<input type="button" name="startBtn" id="startBtn" value="Update" class="btn btn-primary" onclick="openFancyBox_start(<?= $i ?>)" />
		</td>

		<td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
			<input type="button" name="endBtn" id="endBtn" value="Update" class="btn btn-primary" onclick="openFancyBox_end(<?= $i ?>)" disabled="disabled" />
		</td>
	</tr>
	<?php } ?>
</table>

<table style="margin: 40px 0 0 0;">
	<tr>
		<td style="text-align: center;">
			<input type="button" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" style="width: 80px;" onclick="saveCenter()" />
		</td>
	</tr>
</table>