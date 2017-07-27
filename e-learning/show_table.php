<?php
include('../include/config.php');

/*$check = mysql_num_rows(mysql_query("select * from project_temp_elearning where project_no='".$_REQUEST['prno']."'"));

if ($check > 0){*/

$delete = "delete from project_temp_elearning where project_no='".$_REQUEST['prno']."'";
mysql_query($delete);
//}
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

function openFancyBox(par){
	var sln = par;
	var prno = $('#prno').val();
	var schoolName = $('#schoolName'+par).val();
	var schoolId = $('#schoolId'+par).val();
	var schoolCity = $('#schoolCity'+par).val();
	var schoolState = $('#schoolState'+par).val();
	var schoolNo = $('#schoolNo').val();
	var projector = $('#projector').val();

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
		href: 'school-details.php?sln=' + sln + '&schoolId=' + schoolId + '&schoolName=' + encodeURIComponent(schoolName) + '&schoolCity=' + encodeURIComponent(schoolCity) + '&schoolState=' + schoolState + '&prno=' + prno + '&schoolNo=' + schoolNo + '&projector=' + projector,
		/*'afterClose':function () {
				 href: '../mycart/registration_success.php',
			  }, */
			  'afterClose': function(){
			},
		});
	});
}

function saveSchool(){

	var prno = $('#prno').val();
	var schoolNo = $('#schoolNo').val();
	var prno_enc = $('#prno_enc').val();
	var folderno = $('#folderNo_enc').val();
	var grantNo = $('#grantNo').val();
	var projector = $('#projector').val();

	$.ajax({
		url: 'save-school-info.php',
		type: 'post',
		data: 'prno=' + prno + '&schoolNo=' + schoolNo + '&projector=' + projector,
		success: function(f){

			if (f==1){
				alert('Please fill all the information before you proceed');
			}else{
				if (grantNo!=''){

					window.location = 'vendor-details.php?prno=' + prno_enc + '&folderno=' + folderno;
				}else{

					window.location = 'funding-details.php?prno=' + prno_enc + '&folderno=' + folderno;
				}
			}
		}
	})
}
</script>

<input type="hidden" name="prno" id="prno" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="prno_enc" id="prno_enc" value="<?= base64_encode($_REQUEST['prno']) ?>" />
<input type="hidden" name="folderNo_enc" id="folderNo_enc" value="<?= base64_encode($_REQUEST['folderno']) ?>" />
<input type="hidden" name="schoolNo" id="schoolNo" value="<?= $_REQUEST['schoolNo'] ?>" />
<input type="hidden" name="projector" id="projector" value="<?= $_REQUEST['projector'] ?>" />
<input type="hidden" name="grantNo" id="grantNo" value="<?= $grantNo['grant_no'] ?>" />

<table border="1" style="border-collapse: collapse;">
	<tr class="table-head">
		<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;">School ID</td>
		<td style="line-height: 18px;width: 23%;height: 50px;line-height: 50px;font-size: 90%;">School Name</td>
		<td style="line-height: 18px;width: 17%;height: 50px;line-height: 50px;font-size: 90%;">City/Village</td>
		<td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;">State</td>
		<td style="line-height: 18px;width: 20%;height: 50px;line-height: 50px;font-size: 90%;">School Details</td>
	</tr>

	<?php
	for ($i = 1; $i <= $_REQUEST['schoolNo']; $i++){
	?>
	<tr class="table-row">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolId<?= $i ?>" id="schoolId<?= $i ?>" value="<?php if ($getDet['school_id']!=''){echo $getDet['school_id'];}else{echo '';} ?>" class="form-control" />
		</td>

		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolName<?= $i ?>" id="schoolName<?= $i ?>" value="<?php if ($getDet['school_name']!=''){echo urldecode($getDet['school_name']);}else{echo '';} ?>" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 13%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolCity<?= $i ?>" id="schoolCity<?= $i ?>" value="<?php if ($getDet['school_city']!=''){echo $getDet['school_city'];}else{echo '';} ?>" class="form-control" />
		</td>

		<td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<select name="schoolState<?= $i ?>" id="schoolState<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;">
				<option value="">-- Select --</option>

				<?php
				$get_state = mysql_query("select * from states");
				while ($state = mysql_fetch_array($get_state)){
				?>
				<option value="<?= $state['state'] ?>" <?php if($state['state']==$getDet['school_state']){echo 'selected';} ?>><?= $state['state'] ?></option>
				<?php } ?>
			</select>
		</td>

		<td style="line-height: 18px;width: 20%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
			<input type="button" name="fancyBtn" id="fancyBtn" value="Click to Update Details" class="btn btn-primary" onclick="openFancyBox(<?= $i ?>)" />
		</td>
	</tr>
	<?php } ?>
</table>

<table style="margin: 40px 0 0 0;">
	<tr>
		<td style="text-align: center;">
			<input type="button" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" style="width: 80px;" onclick="saveSchool()" />
		</td>
	</tr>
</table>