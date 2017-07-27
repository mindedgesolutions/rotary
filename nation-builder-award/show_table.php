<?php
include('../../include/config.php');

$delete = "delete from project_temp_teacher_support_nation where project_no='".$_REQUEST['prno']."'";
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
function openFancyBox(par){
	var sln = par;
	var prno = $('#prno').val();
	var schoolId = $('#schoolId'+par).val();
	var schoolName = $('#schoolName'+par).val();
	var schoolType = $('#schoolType'+par).val();
	var no_teacher_evaluated = $('#no_teacher_evaluated'+par).val();
	var no_teacher_awarded = $('#no_teacher_awarded'+par).val();
	var subject = $('#subject'+par).val();
	var distDate = $('#distDate').val();
	var schoolNo = $('#schoolNo').val();

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
		href: 'upload_image.php?sln=' + sln + '&prno=' + prno + '&schoolId=' + schoolId + '&schoolName=' + encodeURIComponent(schoolName) + '&schoolType=' + schoolType + '&no_teacher_evaluated=' + no_teacher_evaluated + '&no_teacher_awarded=' + no_teacher_awarded + '&subject=' + subject + '&distDate=' + distDate + '&schoolNo=' + schoolNo,
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
	var prno_enc = $('#prno_enc').val();
	var folderno = $('#folderNo_enc').val();
	var schoolNo = $('#schoolNo').val();

	$.ajax({
		url: 'save-school-info.php',
		type: 'post',
		data: 'prno=' + prno + '&schoolNo=' + schoolNo,
		success: function(f){

			if (f==1){
				alert('Please fill all the information before you proceed');
			}else{
				alert('Project details saved successfully');
				window.location = '../../index.php';
			}
		}
	})
}
</script>

<input type="hidden" name="prno" id="prno" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="prno_enc" id="prno_enc" value="<?= base64_encode($_REQUEST['prno']) ?>" />
<input type="hidden" name="folderNo_enc" id="folderNo_enc" value="<?= base64_encode($_REQUEST['folderno']) ?>" />
<input type="hidden" name="schoolNo" id="schoolNo" value="<?= $_REQUEST['schoolNo'] ?>" />
<input type="hidden" name="distDate" id="distDate" value="<?= $_REQUEST['distDate'] ?>" />

<table border="1" style="border-collapse: collapse;">
	<tr class="table-head">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
		<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">School ID</td>
		<td style="line-height: 18px;width: 17%;height: 50px;line-height: 50px;font-size: 90%;">School Name</td>
		<td style="line-height: 18px;width: 14%;height: 50px;line-height: 50px;font-size: 90%;">School Type</td>
		<td style="line-height: 18px;width: 12%;height: 50px;line-height: 18px;font-size: 90%;padding: 8px 0 0 0;">No. of Teachers Evaluated</td>
		<td style="line-height: 18px;width: 12%;height: 50px;line-height: 18px;font-size: 90%;padding: 8px 0 0 0;">No. of Teachers Awarded</td>
		<td style="line-height: 18px;width: 11%;height: 50px;line-height: 50px;font-size: 90%;">Subject Taught</td>
		<td style="line-height: 18px;width: 21%;height: 50px;line-height: 18px;font-size: 90%;padding: 8px 0 0 0;">Documents / Images</td>
	</tr>

	<?php
	for ($i = 1; $i <= $_REQUEST['schoolNo']; $i++){
	?>
	<tr class="table-row">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

		<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolId<?= $i ?>" id="schoolId<?= $i ?>" value="" class="form-control" />
		</td>

		<td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolName<?= $i ?>" id="schoolName<?= $i ?>" value="" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<select name="schoolType<?= $i ?>" id="schoolType<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;">
				<option value="">-- Select --</option>

				<option value="Government">Government</option>
				<option value="Government-aided">Government-aided</option>
			</select>
		</td>

		<td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="no_teacher_evaluated<?= $i ?>" id="no_teacher_evaluated<?= $i ?>" value="" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="no_teacher_awarded<?= $i ?>" id="no_teacher_awarded<?= $i ?>" value="" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="subject<?= $i ?>" id="subject<?= $i ?>" value="" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
			<input type="button" name="showImg<?= $i ?>" id="showImg<?= $i ?>" value="Upload" class="btn btn-primary" onclick="openFancyBox(<?= $i ?>)" />
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