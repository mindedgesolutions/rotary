<?php include('include/config.php'); ?>

<option value="">--Select--</option>

<?php

if(isset($_REQUEST['createdBy']) && isset($_REQUEST['district']))
{
	$Sql_Select="select distinct(club_name) as c_name from all_district_club where status='".$_REQUEST['createdBy']."' and district_code='".$_REQUEST['district']."'";
}

$Rs_Select=mysql_query($Sql_Select)or die (mysql_error()); 
if (mysql_num_rows($Rs_Select) > 0){

	while($row = mysql_fetch_array($Rs_Select)){                                          
   ?>
       
       <option value="<?= $row['c_name']; ?>"><?= $row['c_name'] ?></option>
<?php

	}
}
?>