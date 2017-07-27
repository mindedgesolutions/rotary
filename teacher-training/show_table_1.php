<?php
include('../../include/config.php');

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
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}

/*-------------------No Special Character--------------------------*/
function nospecial(input){
  var regex = /[^a-zA-Z0-9 ]/gi;
  input.value = input.value.replace(regex, "");
}
$(document).ready(function() {
	$(window).keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
  			return false;
		}
	});
});
function wordCount(input){
  var words = input.value.match(/\S+/g).length;

  if (words > 100) {

    var trimmed = $(input).val().split(/\s+/, 100).join(" ");
    $(input).val(trimmed + " ");
  }
  else{
    $('#trainingDesc').text(100-words);
  }
}
function otherTopic(){
  
  var topic = $('#topic').val();

  if (topic=='other'){

    $('#other_topic_span').fadeIn('500');
    document.getElementById('other_topic').value = '';
  }else{

    $('#other_topic_span').hide();
    document.getElementById('other_topic').value = '';
  }
}
function showDetailsTable(){

	var schoolsNo = $('#schoolsNo').val();

	if (schoolsNo!='' && schoolsNo!='0'){

		$.ajax({

			url: 'table.php',
			type: 'post',
			data: 'schoolsNo=' + schoolsNo,
			success: function(f){

				$('#table_details').html(f);
			}
		})
	}else{
		$('#table_details').html('');
	}
}
function validateForm(){

	var topic = $('#topic').val();
	var other_topic = $('#other_topic').val();
	var trainingHours = $('#trainingHours').val();
	var trainingDays = $('#trainingDays').val();
	var trainingDesc = $('#trainingDesc').val();
	var schoolsNo = $('#schoolsNo').val();

	if (topic==''){

		alert('Please select a training topic');
		document.getElementById('topic').focus();
		return false;
	}else if (topic=='other' && other_topic==''){

		alert('Please enter training topic');
		document.getElementById('other_topic').focus();
		return false;
	}else if (trainingHours==''){

		alert('Please enter total training hours');
		document.getElementById('trainingHours').focus();
		return false;
	}else if (trainingDays==''){

		alert('Please enter total training days');
		document.getElementById('trainingDays').focus();
		return false;
	}else if (trainingDesc==''){

		alert('Please enter enter training module and brief description of training');
		document.getElementById('trainingDesc').focus();
		return false;
	}else if (schoolsNo==''){

		alert('Please enter no. of schools participated');
		document.getElementById('schoolsNo').focus();
		return false;
	}
}
</script>

<input type="hidden" name="prno" id="prno" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="prno_enc" id="prno_enc" value="<?= base64_encode($_REQUEST['prno']) ?>" />
<input type="hidden" name="folderNo_enc" id="folderNo_enc" value="<?= base64_encode($_REQUEST['folderno']) ?>" />
<input type="hidden" name="trainingType" id="trainingType" value="<?= $_REQUEST['trainingType'] ?>" />

<?php
if (isset($_REQUEST['submitBtn'])){


}
?>

<form action="" method="post" onsubmit="return validateForm()">

<table>
	<tr><td colspan="4" style="height: 15px;border-top: 1px solid #e0e0e0;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Training Partner : </td>

	    <td width="35%">
			<input type="text" name="trainingPartner" id="trainingPartner" value="" class="form-control" readonly="readonly" />
		</td>

	    <td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">What was the training topic(s)? : </td>

	    <td width="35%">
			<select name="topic" id="topic" class="form-control" onchange="otherTopic()">
				<option value="">-- Please Select --</option>

				<option value="rilm1">RILM curriculum - 1</option>
				<option value="rilm3">RILM curriculum - 2</option>
				<option value="other">Other</option>
			</select>
		</td>

	    <td width="40%" colspan="2" style="text-align: right;"><span id="other_topic_span" style="display: none;color: #757575;">Other Topic : <input type="text" name="other_topic" id="other_topic" value="" class="form-control" style="width: 50%;margin: 0 0 0 10px;" onkeyup="nospecial(this)" /></span></td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Number of Training Hours : </td>

		<td width="35%">
			<input type="text" name="trainingHours" id="trainingHours" value="" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
	</tr>

	<tr><td colspan="3" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Number of Training Days : </td>

		<td width="35%">
			<input type="text" name="trainingDays" id="trainingDays" value="" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
	</tr>

  	<tr><td colspan="3" style="height: 15px;"></td></tr>

  	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Module and brief description (Max 100 words) : </td>

		<td width="35%">
			<textarea class="form-control" name="trainingDesc" id="trainingDesc" style="resize: none;height: 80px;width: 100%;font-size: 12px;" onkeyup="wordCount(this), nospecial(this)"></textarea>
		</td>

		<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Total Cost Involved : </td>

		<td width="35%">
			<input type="text" name="trainingCost" id="trainingCost" value="" class="form-control" readonly="readonly" />
		</td>

		<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of schools participated : </td>

		<td width="35%">
			<input type="text" name="schoolsNo" id="schoolsNo" value="" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td width="40%" colspan="2">
			<input type="button" name="tableBtn" id="tableBtn" value="OK" class="btn btn-primary" style="width: 80px;margin: 0 0 0 20px;" onclick="showDetailsTable()" />
		</td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="100%" colspan="4"><span id="table_details"></span></td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Total no. of teachers trained : </td>

		<td width="35%">
			<input type="text" name="teacherNo" id="teacherNo" value="" class="form-control" readonly="readonly" />
		</td>

		<td width="40%" colspan="2">&nbsp;</td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Upload images : </td>

		<td width="75%" colspan="3">&nbsp;</td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr>
		<td width="100%" colspan="4" style="text-align: center;">
			<input type="submit" name="submitBtn" id="submitBtn" value="Submit Project" class="btn btn-primary" style="width: 150px;" />
		</td>
	</tr>

  	<tr><td colspan="3" style="height: 15px;"></td></tr>
</table>

</form>