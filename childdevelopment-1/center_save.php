<?php
session_start();
ob_start();

include('include/config.php');

$db_name="rotary32_teach2"; // Database name 
$tbl_name="tbl_admin"; // Table name 

// Get values from form 

$type="center";

$idfk=$_POST['ngoid'];	
	
$centername=$_POST['txtCenterName'];

$firstname=$_POST['txtFirstName'];
$lastname=$_POST['txtLastName'];
$email=$_POST['txtEmail'];
$username=$firstname." ".$lastname;
$pword=$_POST['txtPassword'];
$state=$_POST['ddState'];
$block=$_POST['txtBlock'];
$create_date = date('d/m/Y');	

// Insert data into mysql 
$sql="INSERT INTO $tbl_name(username,password,firstname,lastname,email,type,create_date,status,center_name,idfk,state,block)
VALUES('$username','$pword','$firstname','$lastname','$email','$type','$create_date','Active','$centername','$idfk','$state','$block')";

$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	echo '
	<script>
	alert("Data Successfully Saved");
	window.location.href="addEdit_new_center.php";
	</script>
	';
	//header ("Location: addnew_ngo_center.php");	
}
else {
echo "ERROR";
}
?> 
