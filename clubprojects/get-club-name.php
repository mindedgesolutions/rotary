<?php include('include/config.php'); ?>

<option value="">--Select--</option>

<?php

if(isset($_REQUEST['rotary_district'])){

	$Sql_Select = "select * from all_district_club where district_code='".$_REQUEST['rotary_district']."'";
}

 $Rs_Select=mysql_query($Sql_Select)or die (mysql_error()); 

if (mysql_num_rows($Rs_Select) > 0){

while($row = mysql_fetch_array($Rs_Select)){                                          
?>
	<option value="<?php echo $row['club_name']; ?>"><?php echo $row['club_name']; ?></option>
<?php

	}
}
?>