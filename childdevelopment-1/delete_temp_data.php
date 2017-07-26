<?php
include('include/config.php');

$delete = "delete from asha_kiran_child_response_temp where id='".$_REQUEST['dbsln']."'";
mysql_query($delete);
?>

<?php
$count = mysql_num_rows(mysql_query("select id from asha_kiran_child_response_temp where assessment_id='".$_REQUEST['assessid']."'"));
if ($count > 0){
?>
<table width="100%" border="1" style="border-collapse: collapse;margin: 10px 0 0 0;">
	<tr class="table_head">
		<td class="table_head_td" width="13%">Child Name</td>
		<td class="table_head_td" width="7%">Age</td>
		<td class="table_head_td" width="5%">Gender</td>
		<td class="table_head_td" width="14%">Child is happy being in the centre</td>
		<td class="table_head_td" width="14%">Attendance pattern of the Child over last one month</td>
		<td class="table_head_td" width="14%">Proactive participation of the Child during the interaction</td>
		<td class="table_head_td" width="14%">Ability to read as of his/her age</td>
		<td class="table_head_td" width="14%">Ability to write as of his/her age</td>
		<td class="table_head_td" width="5%">Action</td>
	</tr>
<?php
	$i=1;

	$query_getDet = mysql_query("select * from asha_kiran_child_response_temp where assessment_id='".$_REQUEST['assessid']."'");
	while ($getDet = mysql_fetch_array($query_getDet)){

		$childDet = mysql_fetch_array(mysql_query("select child_name, child_dob, child_gender from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));
?>
	<tr>
		<td class="table_head_td"><?= $childDet['child_name'] ?></td>
		<td class="table_head_td"><?= $childDet['child_dob'] ?></td>
		<td class="table_head_td"><?= $childDet['child_gender'] ?></td>
		<td class="table_head_td"><?= $getDet['happy_in_center'] ?></td>
		<td class="table_head_td"><?= $getDet['att_pattern'] ?></td>
		<td class="table_head_td"><?= $getDet['pro_participation'] ?></td>
		<td class="table_head_td"><?= $getDet['able_read'] ?></td>
		<td class="table_head_td"><?= $getDet['able_write'] ?></td>

		<input type="hidden" name="dbsln<?= $i ?>" id="dbsln<?= $i ?>" value="<?= $getDet['id'] ?>" />

		<td class="table_head_td">
			<img src="deleteBtn.png" height="30px" width="auto" style="cursor: pointer;" onclick="deleteRow(<?= $i ?>)" />
		</td>
	</tr>
<?php $i++;} ?>
</table>
<?php } ?>