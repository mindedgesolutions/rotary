<?php include('include/config.php'); ?>

<option value="">-- Please Select --</option>

<?php
if(isset($_REQUEST['ngo'])){

	$Sql_Select="select * from tbl_admin where type='center' and idfk='".$_REQUEST['ngo']."'";
	$Rs_Select=mysql_query($Sql_Select)or die (mysql_error());
	if (mysql_num_rows($Rs_Select) > 0){

	while($row = mysql_fetch_array($Rs_Select)){
	?>
	<option value="<?= $row['id'] ?>"><?= $row['center_name'] ?></option>
	<?php
		}
	}else{
	?>
	<option value="NA">N/A</option>
	<?php
	}
}
?>