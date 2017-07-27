<?php
include('../include/config.php');

$grantNo = mysql_fetch_array(mysql_query("select grant_no from project_master where project_no='".$_REQUEST['prno']."'"));
?>

<script type="text/javascript">
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

function saveSftwDetails(){

	var hdwRowcount = $('#hdwRowcount').val();
	
	if (hdwRowcount > 0){

		for (i=0; i<hdwRowcount; i++){

			var sln = i;
			var prno = $('#prno').val();
			var sftw_vendor_name = $('#sftw_vendor_name'+i).val();
			var language = $('#language'+i).val();
			var sftw_total_unit = $('#sftw_total_unit'+i).val();
			var sftw_total_cost = $('#sftw_total_cost'+i).val();

			$.ajax({

				url: 'insert_software_data.php',
				type: 'post',
				data: 'sftw_vendor_name=' + encodeURIComponent(sftw_vendor_name) + '&language=' + encodeURIComponent(language) + '&sftw_total_unit=' + sftw_total_unit + '&sftw_total_cost=' + sftw_total_cost + '&prno=' + prno + '&sln=' + sln,
				success: function(f){}
			})
		}
		alert('Data saved successfully');
	}else{

		alert("There's no data to update");
	}
}
</script>

<style type="text/css">
.table-head{
  background-color: #333;
  color: #fff;
  text-align: center;
}
</style>

<table>
	<tr>
		<td width="100%" style="font-size: 16px;font-weight: 600;color: #757575;">Vendor-Product Details (Hardware)</td>
	</tr>
</table>

<table border="1" style="border-collapse: collapse;">
	<tr class="table-head">
		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Vendor Name</td>
		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Projector Model No.</td>
        <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Total Units</td>
        <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Total Cost</td>
	</tr>

	<?php
	$query_getHdw = mysql_query("select * from grant_vendor_details where grant_no='".$grantNo['grant_no']."' and hardware_vendor_name!=''");
	while ($getHdw = mysql_fetch_array($query_getHdw)){
	?>
	<tr class="table-row">
		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="hdw_vendor_name" id="hdw_vendor_name" value="<?= $getHdw['hardware_vendor_name'] ?>" class="form-control" onkeyup="nospecial(this)" />
		</td>

		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="projector_model_no" id="projector_model_no" value="<?= $getHdw['language'] ?>" class="form-control" onkeyup="nospecial(this)" />
		</td>

		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="hdw_total_unit" id="hdw_total_unit" value="<?= $getHdw['hardware_total_unit'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="hdw_total_cost" id="hdw_total_cost" value="<?= $getHdw['hardware_total_cost'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
		</td>
	</tr>
	<?php } ?>
</table>

<table>
	<tr>
		<td width="100%" style="font-size: 16px;font-weight: 600;color: #757575;">Vendor-Product Details (Software)</td>
	</tr>
</table>

<table border="1" style="border-collapse: collapse;">
	<tr class="table-head">
		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Vendor Name</td>
        <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Language</td>
        <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Total Units</td>
        <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Total Cost</td>
	</tr>

	<?php
	$query_getSftw = mysql_query("select * from grant_vendor_details where grant_no='".$grantNo['grant_no']."' and software_vendor_name!=''");
	while ($getSftw = mysql_fetch_array($query_getSftw)){
	?>
	<tr class="table-row">
		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="sftw_vendor_name" id="sftw_vendor_name" value="<?= $getSftw['software_vendor_name'] ?>" class="form-control" onkeyup="nospecial(this)" />
		</td>

		<td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="language" id="language" value="<?= $getSftw['language'] ?>" class="form-control" onkeyup="nospecial(this)" />
		</td>

		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="sftw_total_unit" id="sftw_total_unit" value="<?= $getSftw['software_total_unit'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
		</td>

		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="sftw_total_cost" id="sftw_total_cost" value="<?= $getSftw['software_total_cost'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
		</td>
	</tr>
	<?php } ?>
</table>


<input type="hidden" name="hdwRowcount" id="hdwRowcount" value="<?= $rowCount ?>" />
<input type="hidden" name="prno" id="prno" value="<?= $_REQUEST['prno'] ?>" />