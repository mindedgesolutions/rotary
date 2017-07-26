<?php
session_start();
ob_start();
include('include/config.php');
/*
$host="103.227.62.215"; // Host name 
$username="rotary32_teach2"; // Mysql username 
$password="Rotary@2016"; // Mysql password 
$db_name="rotary32_teach2"; // Database name 
//$tbl_name="tbl_eva_exam_header"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
  */ 
//$_SESSION['uid'];

// Get values from form 
//donar_id,
date_default_timezone_set('Asia/Calcutta');											
$donar_district=$_POST['ddDistrict'];
$donar_club=$_POST['ddClub'];
$first_name=$_POST['txtFirstName'];
$last_name=$_POST['txtLastName'];
$donar_email=$_POST['txtEmail'];
$donar_contact=$_POST['txtMobNo'];
$donar_address=$_POST['txtAddress'];
$donar_city=$_POST['txtCity'];
$donar_state=$_POST['ddState1'];
$donar_country=$_POST['txtCountry'];
$no_child=$_POST['txtNoOfChild'];
$tagged='Yes';
$memberof=$_POST['ddMember'];
$voucherNo=$_POST['txtVoucherNo'];
$donationAmount=$_POST['txtDonationAmount'];
$created_on=date('d/m/y');
$state=$_POST['ddState'];
$current_time=date("h:i:s a"); 
$old_donar_id=$_POST['txtdbemail'];
$donation_dt=$_POST['txtDonationDT'];
$pay_mode=$_POST['ddPayMethod'];
$remarks=$_POST['txtRemarks'];

// Insert data into mysql 
$sql="INSERT INTO tbl_donar_master_not_tagged(donar_district,donar_club,first_name,last_name,donar_address,donar_city,
donar_state,donar_country,donar_email,donar_contact,donationAmount,state,created_on,old_donar_id,active,noofchild,memberof,
donation_dt,pay_method,remarks)
VALUES('$donar_district','$donar_club','$first_name','$last_name','$donar_address','$donar_city','$donar_state','$donar_country',
'$donar_email','$donar_contact','$donationAmount','$state','$created_on','$old_donar_id','yes','$no_child','$memberof','$donation_dt',
'$pay_mode','$remarks')";
//echo $sql;
$result=mysql_query($sql);

if($result){
		echo '
			<script>
			alert("Submission Successful, Thank you for submitting your entry! We will get back to you soon.");
			window.location.href="http://rotaryteach.org/";
			</script>
			';
}
else {
echo "ERROR";
}

?> 