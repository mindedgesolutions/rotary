<?php
include('../../include/config.php');

$delete = "delete from project_temp_teacher_support_training where project_no='".$_REQUEST['prno']."'";
mysql_query($delete);

$grantNo = mysql_fetch_array(mysql_query("select * from project_master where project_no='".$_REQUEST['prno']."'"));
?>

<style type="text/css">
.table-head{
  background-color: #333;
  color: #fff;
  text-align: center;
}
input[type='checkbox']{
	float: left;
	margin: 14px 10px 0 5px;
}
label{
	color: #757575;
	font-size: 90%;
	float: left;
	margin: 5px 0 0 0;
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
function otherPartner(){
  
  var training_Partner = $('#training_Partner').val();

  if (training_Partner=='Others'){

    $('#other_training_partner_span').fadeIn('500');
    $('#mcmillan').hide();
	$('#royal').hide();
	$('#Indian').hide();
	$('#learning').hide();
	$('#aspiring').hide();
	$('#zeal').hide();
	$('#radhika').hide();
	$('#nitya').hide();
  }else{

    $('#other_training_partner_span').hide();

    if (training_Partner!='' && training_Partner=='Macmillan Publishers Pvt. Ltd.'){
		
    	$('#mcmillan').show('500');
    	$('#royal').hide();
    	$('#Indian').hide();
    	$('#learning').hide();
    	$('#aspiring').hide();
    	$('#zeal').hide();
    	$('#radhika').hide();
    	$('#nitya').hide();

	}else if (training_Partner!='' && training_Partner=='Royal Society of Chemistry'){

		$('#mcmillan').hide();
		$('#royal').show('500');
		$('#Indian').hide();
		$('#learning').hide();
		$('#aspiring').hide();
		$('#zeal').hide();
		$('#radhika').hide();
		$('#nitya').hide();

	}else if (training_Partner!='' && training_Partner=='Indian Career Education and Development  Council'){

		$('#mcmillan').hide();
		$('#royal').hide();
		$('#Indian').show('500');
		$('#learning').hide();
		$('#aspiring').hide();
		$('#zeal').hide();
		$('#radhika').hide();
		$('#nitya').hide();
		
	}else if (training_Partner!='' && training_Partner=='Learning Links Foundation'){

		$('#mcmillan').hide();
		$('#royal').hide();
		$('#Indian').hide();
		$('#learning').show('500');
		$('#aspiring').hide();
		$('#zeal').hide();
		$('#radhika').hide();
		$('#nitya').hide();
		
	}else if (training_Partner!='' && training_Partner=='Aspiring Persona'){

		$('#mcmillan').hide();
		$('#royal').hide();
		$('#Indian').hide();
		$('#learning').hide();
		$('#aspiring').show('500');
		$('#zeal').hide();
		$('#radhika').hide();
		$('#nitya').hide();
		
	}else if (training_Partner!='' && training_Partner=='Zeal Education Trust'){

		$('#mcmillan').hide();
		$('#royal').hide();
		$('#Indian').hide();
		$('#learning').hide();
		$('#aspiring').hide();
		$('#zeal').show('500');
		$('#radhika').hide();
		$('#nitya').hide();
		
	}else if (training_Partner!='' && training_Partner=='Resource Person Radhika Gupte'){

		$('#mcmillan').hide();
		$('#royal').hide();
		$('#Indian').hide();
		$('#learning').hide();
		$('#aspiring').hide();
		$('#zeal').hide();
		$('#radhika').show('500');
		$('#nitya').hide();
		
	}else if (training_Partner!='' && training_Partner=='Resource Person Nitya Gopalalrishnan'){

		$('#mcmillan').hide();
		$('#royal').hide();
		$('#Indian').hide();
		$('#learning').hide();
		$('#aspiring').hide();
		$('#zeal').hide();
		$('#radhika').hide();
		$('#nitya').show('500');
	}else if (training_Partner!='' && training_Partner=='Others'){

		$('#mcmillan').hide();
		$('#royal').hide();
		$('#Indian').hide();
		$('#learning').hide();
		$('#aspiring').hide();
		$('#zeal').hide();
		$('#radhika').hide();
		$('#nitya').hide();
	}
  }
}
function showDetailsTable(){

	var schoolsNo = $('#schoolsNo').val();
	var prno = $('#prno').val();
	var prno_enc = $('#prno_enc').val();
	var folderNo_enc = $('#folderNo_enc').val();
	var trainingType = $('#trainingType').val();

	if (schoolsNo!='' && schoolsNo!='0'){

		$.ajax({

			url: 'table.php',
			type: 'post',
			data: 'schoolsNo=' + schoolsNo + '&prno=' + prno + '&prno_enc=' + prno_enc + '&folderNo_enc=' + folderNo_enc + '&trainingType=' + trainingType,
			success: function(f){

				$('#table_details').html(f);
			}
		})
	}else{
		$('#table_details').html('');
	}
}
function validateForm(){
	var training_Partner = $('#training_Partner').val();
	var trainingHours = $('#trainingHours').val();
	var trainingDays = $('#trainingDays').val();
	var trainingDesc = $('#trainingDesc').val();
	var trainingCost = $('#trainingCost').val();
	var schoolsNo = $('#schoolsNo').val();

	if (training_Partner==''){
		alert('Please select training partner');
		return false;
	}else if (trainingHours==''){
		alert('Please enter training hours');
		return false;
	}else if (trainingDays==''){
		alert('Please enter training days');
		return false;
	}else if (trainingDesc==''){
		alert('Please enter training description');
		return false;
	}else if (trainingCost==''){
		alert('Please enter total training cost involved');
		return false;
	}else if (schoolsNo==''){
		alert('No. of schools participated cannot be empty');
		return false;
	}
}
</script>

<form action="action.php" method="post" onsubmit="return validateForm1()" autocomplete="off">

<input type="hidden" name="prno" id="prno" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="prno_enc" id="prno_enc" value="<?= base64_encode($_REQUEST['prno']) ?>" />
<input type="hidden" name="folderNo_enc" id="folderNo_enc" value="<?= base64_encode($_REQUEST['folderno']) ?>" />
<input type="hidden" name="trainingType" id="trainingType" value="<?= $_REQUEST['trainingType'] ?>" />

<table>
	<tr><td colspan="4" style="height: 15px;border-top: 1px solid #e0e0e0;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Who was involved in providing the training? : </td>

	    <td width="35%">
			<select name="training_Partner" id="training_Partner" class="form-control" onchange="otherPartner()">
				<option value="">-- Please Select --</option>

				<option value="Macmillan Publishers Pvt. Ltd.">Macmillan Publishers Pvt. Ltd.</option>
				<option value="Royal Society of Chemistry">Royal Society of Chemistry</option>
				<option value="Indian Career Education and Development  Council">Indian Career Education and Development  Council</option>
				<option value="Learning Links Foundation">Learning Links Foundation</option>
				<option value="Aspiring Persona">Aspiring Persona</option>
				<option value="Zeal Education Trust">Zeal Education Trust</option>
				<option value="Resource Person Radhika Gupte">Resource Person Radhika Gupte</option>
				<option value="Resource Person Nitya Gopalalrishnan">Resource Person Nitya Gopalalrishnan</option>
				<option value="Others">Others</option>
			</select>
		</td>

	    <td width="40%" colspan="2" style="text-align: right;"><span id="other_training_partner_span" style="display: none;color: #757575;">Other Partner : <input type="text" name="other_training_partner" id="other_training_partner" value="" class="form-control" style="width: 50%;margin: 0 0 0 10px;" onkeyup="nospecial(this)" /></span></td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

	<tr id="mcmillan" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_1" value="Child and Adolescent Development" /><label for="id_1">Child and Adolescent Development</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_2" value="Curriculum" /><label for="id_2">Curriculum</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_3" value="Pedagogy" /><label for="id_3">Pedagogy</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_4" value="Language Skills" /><label for="id_4">Language Skills</label></td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_5" value="Classroom Management" /><label for="id_5">Classroom Management</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_6" value="Assessment and Evaluation Studies" /><label for="id_6">Assessment and Evaluation Studies</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_7" value="Life Skills Education" /><label for="id_7">Life Skills Education</label></td>

					<td width="25%">
						<input type="checkbox" name="check_result[]" id="id_8" value="Others" /><label for="id_8">Others</label><input type="text" name="other_id_1" id="other_id_1" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr id="royal" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_9" value="How to teach science effectively" /><label for="id_9">How to teach science effectively</label></td>

					<td width="25%" colspan="3">
						<input type="checkbox" name="check_result[]" id="id_10" value="Others" /><label for="id_10">Others</label><input type="text" name="other_id_2" id="other_id_2" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>
					<td width="50%">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr id="Indian" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_11" value="Strength based life coaching" /><label for="id_11">Strength based life coaching</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_12" value="Using differentiated teaching" /><label for="id_12">Using differentiated teaching</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_13" value="Simple lesson plan methodologies" /><label for="id_13">Simple lesson plan methodologies</label></td>

					<td width="25%" colspan="3">
						<input type="checkbox" name="check_result[]" id="id_14" value="Others" /><label for="id_14">Others</label><input type="text" name="other_id_3" id="other_id_3" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr id="learning" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_15" value="Subject Enrichment" /><label for="id_15">Subject Enrichment</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_16" value="Classroom Management" /><label for="id_16">Classroom Management</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_17" value="Assessment in the class" /><label for="id_17">Assessment in the class</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_18" value="Classroom Transaction" /><label for="id_18">Classroom Transaction</label></td>
				</tr>
				<tr class="topic_tr">
					<td width="25%">
						<input type="checkbox" name="check_result[]" id="id_19" value="Others" /><label for="id_19">Others</label><input type="text" name="other_id_4" id="other_id_4" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>

					<td width="75%" colspan="3">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr id="aspiring" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_20" value="Team Building" /><label for="id_20">Team Building</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_21" value="Motivation" /><label for="id_21">Motivation</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_22" value="Time Management" /><label for="id_22">Time Management</label></td>

					<td width="25%"><input type="checkbox" name="check_result[]" id="id_23" value="Leadership" /><label for="id_23">Leadership</label></td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_24" value="Perception and Attitude Building" /><label for="id_24">Perception and Attitude Building</label></td>

					<td width="25%">
						<input type="checkbox" name="check_result[]" id="id_25" value="Others" /><label for="id_25">Others</label><input type="text" name="other_id_5" id="other_id_5" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>

					<td width="50%" colspan="2">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr id="zeal" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="25%"><input type="checkbox" name="check_result[]" id="id_26" value="" /><label for="id_26">Methods of teaching mathematics</label></td>

					<td width="25%" colspan="3">
						<input type="checkbox" name="check_result[]" id="id_27" value="" /><label for="id_27">Others</label><input type="text" name="other_id_6" id="other_id_6" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>
					<td width="50%">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr id="radhika" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="30%"><input type="checkbox" name="check_result[]" id="id_28" value="" /><label for="id_28">Awareness on children with special needs</label></td>

					<td width="25%" colspan="3">
						<input type="checkbox" name="check_result[]" id="id_29" value="" /><label for="id_29">Others</label><input type="text" name="other_id_7" id="other_id_7" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>
					<td width="45%">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr id="nitya" style="display: none;">
		<td colspan="4">
			<table border="1" style="border-collapse: collapse;">
				<tr class="topic_tr">
					<td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
				</tr>
				<tr class="topic_tr">
					<td width="30%"><input type="checkbox" name="check_result[]" id="id_30" value="" /><label for="id_30">Awareness on children with special needs</label></td>

					<td width="25%" colspan="3">
						<input type="checkbox" name="check_result[]" id="id_31" value="" /><label for="id_31">Others</label><input type="text" name="other_id_8" id="other_id_8" value="" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
					</td>
					<td width="45%">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Number of Training Hours : </td>

		<td width="35%">
			<input type="text" name="trainingHours" id="trainingHours" value="" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
	</tr>

	<tr><td colspan="4" style="height: 15px;"></td></tr>

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
			<input type="text" name="trainingCost" id="trainingCost" value="" class="form-control" onkeyup="numbersOnly(this)" />
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

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 1 : </td>

		<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
			<input type="file" name="img_1" id="img_1" />

			<span id="uploaded_image_1"></span>

			<?php if ($getTemp['image_1']!=''){ ?><span style="color: #009342;" id="have_doc_1">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr><td colspan="3" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 2 : </td>

		<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
			<input type="file" name="img_2" id="img_2" />

			<span id="uploaded_image_2"></span>

			<?php if ($getTemp['image_2']!=''){ ?><span style="color: #009342;" id="have_doc_2">We already have an image</span><?php } ?>
		</td>
	</tr>

	<tr><td colspan="3" style="height: 15px;"></td></tr>

	<tr>
		<td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 3 : </td>

		<td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
			<input type="file" name="img_3" id="img_3" />

			<span id="uploaded_image_3"></span>

			<?php if ($getTemp['image_3']!=''){ ?><span style="color: #009342;" id="have_doc_3">We already have an image</span><?php } ?>
		</td>
	</tr>

  	<tr><td colspan="3" style="height: 25px;"></td></tr>

  	<tr>
  		<td colspan="3" style="text-align: center;">
  			<input type="submit" name="otherSave" id="otherSave" value="Save Project" class="btn btn-primary" />		
  		</td>
	</tr>
</table>
</form>

<script type="text/javascript">
$(document).on('change', '#img_1', function(){

	$('#have_doc_1').hide();

	var property = document.getElementById('img_1').files[0];
	var prno = document.getElementById('prno').value;

	var image_name = property.name;
	var image_extension = image_name.split('.').pop().toLowerCase();

	if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

		alert('Invalid file extension');
		document.getElementById('img_1').value = '';
	}
	var image_size = property.size;

	if (image_size > 2000000){

		alert('Image is too large. Please select an image of smaller size');
		document.getElementById('img_1').value = '';
	}
	else{

		var form_data = new FormData();
		form_data.append('img_1', property);
		form_data.append('prno', prno);

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

	$('#have_doc_2').hide();

	var property = document.getElementById('img_2').files[0];
	var prno = document.getElementById('prno').value;

	var image_name = property.name;
	var image_extension = image_name.split('.').pop().toLowerCase();

	if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

		alert('Invalid file extension');
		document.getElementById('img_2').value = '';
	}
	var image_size = property.size;

	if (image_size > 2000000){

		alert('Image is too large. Please select an image of smaller size');
		document.getElementById('img_2').value = '';
	}
	else{

		var form_data = new FormData();
		form_data.append('img_2', property);
		form_data.append('prno', prno);

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

	$('#have_doc_3').hide();

	var property = document.getElementById('img_3').files[0];
	var prno = document.getElementById('prno').value;

	var image_name = property.name;
	var image_extension = image_name.split('.').pop().toLowerCase();

	if (jQuery.inArray(image_extension, ['jpg', 'jpeg']) == -1){

		alert('Invalid file extension');
		document.getElementById('img_3').value = '';
	}
	var image_size = property.size;

	if (image_size > 2000000){

		alert('Image is too large. Please select an image of smaller size');
		document.getElementById('img_3').value = '';
	}
	else{

		var form_data = new FormData();
		form_data.append('img_3', property);
		form_data.append('prno', prno);

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
</script>