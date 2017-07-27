<?php
include('../include/config.php');
?>

<style type="text/css">
.table-head{
	background-color: #333;
	color: #fff;
	text-align: center;
}
</style>

<table border="1" style="border-collapse: collapse;">
	<tr class="table-head">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sl No.</td>
		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;">District</td>
        <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Rotary / Inner Wheel</td>
        <td style="line-height: 18px;width: 55%;height: 50px;line-height: 50px;font-size: 90%;">Club Name</td>
	</tr>

	<tr class="table-row">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
			<?= '1' ?>
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="district_code[]" id="district_code<?= $i ?>" value="<?= $_REQUEST['rotary_district'] ?>" class="form-control" onkeyup="nospecial(this)" />
		</td>

		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<select name="clubType[]" id="clubType<?= $i ?>" class="form-control" style="margin: 8px 0;">
				<option value="Rotary" <?php if ($_REQUEST['club_type']=='Rotary'){echo 'selected';} ?>>Rotary</option>
				<option value="Inner Wheel" <?php if ($_REQUEST['club_type']=='Inner Wheel'){echo 'selected';} ?>>Inner Wheel</option>
			</select>
		</td>

		<td style="line-height: 18px;width: 55%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="club_name[]" id="club_name<?= $i ?>" value="<?= $_REQUEST['rotary_club'] ?>" class="form-control" onkeyup="nospecial(this)" />
		</td>
	</tr>

	<?php
	for ($i = 1; $i <= $_REQUEST['club_no']; $i++){

		$sln = $i+1;
	?>
	<tr class="table-row">
		<td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
			<?= $sln ?>
		</td>

		<td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="district_code[]" id="district_code<?= $i ?>" value="" class="form-control" onkeyup="nospecial(this)" />
		</td>

		<td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<select name="clubType[]" id="clubType<?= $i ?>" class="form-control" style="margin: 8px 0;">
				<option value="Rotary" <?php if ($_REQUEST['club_type']=='Rotary'){echo 'selected';} ?>>Rotary</option>
				<option value="Inner Wheel" <?php if ($_REQUEST['club_type']=='Inner Wheel'){echo 'selected';} ?>>Inner Wheel</option>
			</select>
		</td>

		<td style="line-height: 18px;width: 55%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
			<input type="text" name="club_name[]" id="club_name<?= $i ?>" value="" class="form-control" onkeyup="nospecial(this)" />
		</td>
	</tr>
	<?php } ?>
</table>