<?php
session_start();
ob_start();
include('include/config.php');


$db_database = 'rotary32_teach2';
$tbl_name="tbl_admin"; // Table name

// Get values from form 
$id=$_POST['pkid'];
$type=$_POST['selType'];
if($type=="NGO")
{
	$idfk="-1";
}
else if($type=="center")
{
	$idfk=$_POST['txtidfk'];	
}
$centername=$_POST['txtCenterName'];

$firstname=$_POST['txtFirstName'];
$lastname=$_POST['txtLastName'];
$email=$_POST['txtEmail'];
//$username=$firstname." ".$lastname;
$password=$_POST['txtPassword'];
$state=$_POST['txtStateno'];
$block=$_POST['txtBlock'];
$examtype = $_REQUEST['examType'];
$create_date = date('d/m/Y');	

// Insert data into mysql 
$sql="UPDATE $tbl_name SET password='$password',firstname='$firstname',lastname='$lastname',email='$email',type='$type',create_date='$create_date',status='Active',center_name='$centername',idfk='$idfk',state='$state',block='$block', examtype='$examtype'WHERE id='" .$id. "'";

$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	echo '
	<script>
	alert("Data Successfully Updated");
	window.location.href="addEdit_new_ngo.php";
	</script>
	';
	//header ("Location: add_ngo_center.php");	
}
else {
	echo "ERROR";
}