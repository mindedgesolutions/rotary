<?php include('include/config.php'); ?>

<option value="">--Select--</option>

<?php

if(isset($_REQUEST['club_type'])){

	if ($_REQUEST['club_type']=='Rotary'){$club_type = 'Rotary';}

	else if ($_REQUEST['club_type']=='Inner Wheel'){$club_type = 'Inner Wheel';}

	else {$club_type = 'Rotaract';}

	$Sql_Select = "select * from all_district_club where status='".$club_type."' group by district_code";
}


 $Rs_Select=mysql_query($Sql_Select)or die (mysql_error()); 

if (mysql_num_rows($Rs_Select) > 0){

while($row = mysql_fetch_array($Rs_Select)){                                          
?>
	<option value="<?php echo $row['district_code']; ?>"><?php echo $row['district_code']; ?></option>    
<?php

	}
}
?>