<?php include('include/config.php'); ?>

<option value="">--Select--</option>

<?php

if(isset($_REQUEST['createdBy']))
{
	$Sql_Select="select distinct(district_code) as d_code from all_district_club where status='".$_REQUEST['createdBy']."'";
}

$Rs_Select=mysql_query($Sql_Select)or die (mysql_error()); 
if (mysql_num_rows($Rs_Select) > 0){

	while($row = mysql_fetch_array($Rs_Select)){                                          
   ?>
       
       <option value="<?= $row['d_code']; ?>"><?= $row['d_code'] ?></option>        
<?php

	}
}
?>