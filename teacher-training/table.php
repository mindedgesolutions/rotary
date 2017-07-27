<?php
include('../../include/config.php');

$delete = "delete from project_temp_teacher_support_training where project_no='".$_REQUEST['prno']."'";
mysql_query($delete);
?>

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

function openFancy(par){
	var sln = par;
	var prno = $('#prno').val();
	var no_schools = $('#no_schools').val();
	var trainingType = $('#trainingType').val();
	var schoolId = $('#schoolId'+par).val();
	var schoolName = $('#schoolName'+par).val();
	var schoolCity = $('#schoolCity'+par).val();
	var schoolState = $('#schoolState'+par).val();
	var schoolType = $('#schoolType'+par).val();

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
		href: 'update_table_details.php?sln=' + sln + '&prno=' + prno + '&no_schools=' + no_schools + '&trainingType=' + trainingType + '&schoolId=' + schoolId + '&schoolName=' + schoolName + '&schoolCity=' + schoolCity + '&schoolState=' + schoolState + '&schoolType=' + schoolType,
		/*'afterClose':function () {
				 href: '../mycart/registration_success.php',
			  }, */
			  'afterClose': function(){
			},
		});
	});
}
</script>


<input type="hidden" name="prno" id="prno" value="<?= $_REQUEST['prno'] ?>" />
<input type="hidden" name="trainingType" id="trainingType" value="<?= $_REQUEST['trainingType'] ?>" />
<input type="hidden" name="no_schools" id="no_schools" value="<?= $_REQUEST['schoolsNo'] ?>" />



<table border="1" style="border-collapse: collapse;">
	<tr class="table-head">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
		<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">School ID</td>
		<td style="line-height: 18px;width: 22%;height: 50px;line-height: 50px;font-size: 90%;">School Name</td>
		<td style="line-height: 18px;width: 16%;height: 50px;line-height: 50px;font-size: 90%;">City/Village</td>
		<td style="line-height: 18px;width: 20%;height: 50px;line-height: 50px;font-size: 90%;">State</td>
		<td style="line-height: 18px;width: 16.5%;height: 50px;line-height: 50px;font-size: 90%;">School Type</td>
		<td style="line-height: 18px;width: 12.5%;height: 50px;font-size: 90%;line-height: 50px;">Other Details</td>
	</tr>

	<?php
	for ($i = 1; $i <= $_REQUEST['schoolsNo']; $i++){
	?>
	<tr class="table-row">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

		<td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolId<?= $i ?>" id="schoolId<?= $i ?>" value="" class="form-control" onkeyup="nospecial(this)" />
		</td>

		<td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolName<?= $i ?>" id="schoolName<?= $i ?>" value="" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="schoolCity<?= $i ?>" id="schoolCity<?= $i ?>" value="" class="form-control" onkeyup="letterswithspace(this)" />
		</td>

		<td style="line-height: 18px;width: 7%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<select name="schoolState<?= $i ?>" id="schoolState<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;">
				<option value="">-- Please Select --</option>

				<?php
				$query_state = mysql_query("select * from states");
				while ($state = mysql_fetch_array($query_state)){
				?>
				<option value="<?= $state['state'] ?>"><?= $state['state'] ?></option>
				<?php } ?>
			</select>
		</td>

		<td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
			<select name="schoolType<?= $i ?>" id="schoolType<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;">
				<option value="">-- Please Select --</option>

				<option value="Government">Government</option>
				<option value="Government-aided">Government-aided</option>
			</select>
		</td>

		<td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
			<input type="button" name="endBtn" id="endBtn" value="Update Details" class="btn btn-primary" onclick="openFancy(<?= $i ?>)" />
		</td>
	</tr>
	<?php } ?>
</table>