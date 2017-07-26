<?php
session_start();
ob_start();
   
$host="192.185.36.129"; // Host name 
$username="rotary32_teach2"; // Mysql username 
$password="info123"; // Mysql password 
$db_name="rotary32_teach2"; // Database name 
$tbl_name="tbl_admin"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 

$type=$_POST['selType'];
if($type=="NGO")
{
	$idfk="-1";
}
else if($type=="center")
{
	$idfk=$_POST['center_name'];	
}
$centername=$_POST['txtCenterName'];

$firstname=$_POST['txtFirstName'];
$lastname=$_POST['txtLastName'];
$email=$_POST['txtEmail'];
$username=$firstname." ".$lastname;
$password=$_POST['txtPassword'];
$state=$_POST['ddState'];
$block=$_POST['txtBlock'];
$create_date = date('d/m/Y');	

// Insert data into mysql 
$sql="INSERT INTO $tbl_name(username,password,firstname,lastname,email,type,create_date,status,center_name,idfk,state,block)
VALUES('$username','$password','$firstname','$lastname','$email','$type','$create_date','Active','$centername','$idfk','$state','$block')";

$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	echo '
	<script>
	alert("Data Successfully Saved");
	window.location.href="addnew_ngo_center.php";
	</script>
	';
	//header ("Location: addnew_ngo_center.php");	
}
else {
echo "ERROR";
}
?> 
