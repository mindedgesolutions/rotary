<?php
session_start();
ob_start();
include('include/config.php');

 $id=$_POST['txtId'];
 $first_name=$_POST['txtMemberFirstName'];
 $last_name=$_POST['txtMemberLastName'];
 $donar_contact=$_POST['txtMemberMobile'];
 $donar_email=$_POST['txtMemberEmail'];
 $donor_district=$_POST['district'];
 $donor_club=$_POST['txtClub'];
 
	 
       
$msg = "";



$sql="update tbl_donar_master set first_name='$first_name',last_name='$last_name',donar_email='$donar_email',
donar_contact='$donar_contact',donar_district='$donor_district',donar_club='$donor_club' where donar_id='$id'";
$result = mysql_query($sql);

 echo '
				<script>
				alert("Data updated successfully.");
				window.location.href="master_donar.php";
				</script>
				';

?>
