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

// Insert data into mysql 
$sql="INSERT INTO tbl_donar_master(donar_district,donar_club,first_name,last_name,donar_email,donar_contact,donar_address,donar_city,
donar_country,amount_no_child,tagged,memberof,voucherNo,donationAmount,created_on,state,donar_state,actual_tagging,accounts_count)
VALUES('$donar_district','$donar_club','$first_name','$last_name','$donar_email','$donar_contact','$donar_address','$donar_city',
'$donar_country','$no_child','$tagged','$memberof','$voucherNo','$donationAmount','$created_on','$state','$donar_state','$no_child','$no_child')";
//echo $sql;
$result=mysql_query($sql);

if($result){	
	$result1 = mysql_query("select max(donar_id) as maxid from tbl_donar_master");
    //$row = mysql_fetch_row($result1);
	//$resultAns = mysql_query($result1);
	$count = mysql_num_rows($result1);
	if($count>0){
			while($rowAns = mysql_fetch_array($result1)) {
		extract($rowAns);
			}
	}
    $highest_id = $maxid;
	//echo $highest_id;
	if($old_donar_id!='')
	{
		$highest_id = $old_donar_id;
	}
	if($state!='')
	{
		//echo $state;
		//count number of record for Preferred State 
		$sqlCount="select * from tbl_child_profile_card where state='$state' and tagged='no'";
		$resultCount=mysql_query($sqlCount);
		$count1=mysql_num_rows($resultCount);
		//echo $count1;
		if($count1>$no_child){
			for($x = 0; $x < $no_child; $x++) {
				$sqlMinID = "select min(child_id)as minID from tbl_child_profile_card where state='$state' and tagged='no'";
				$resMinID = mysql_query($sqlMinID);
				$minIDCount = mysql_num_rows($resMinID);
				if($minIDCount>0){
						while($rowAnsCount = mysql_fetch_array($resMinID)) {
						extract($rowAnsCount);
						$sqlIns = "insert into tbl_child_selected_tagging (child_image,child_id,child_name,child_city,child_parent,child_sex,ngo,donar_id,date_of,time_of,donor_email)
								select a.child_photo,'$minID',a.child_name,a.city,a.child_father_name,a.child_gender,a.name_partner_ngo,'$highest_id','$created_on','$current_time','$donar_email' from tbl_child_profile_card a where a.child_id=$minID";
						$resultIns = mysql_query($sqlIns);
						
						$sqlUpd = "update tbl_child_profile_card SET tagged='Yes',taggedid='$highest_id',taggeddate='$created_on' where child_id=$minID";
						$resultUpd = mysql_query($sqlUpd);
					
						
											
					}				
				}
			}
			$sqlDonorMastDtl = "Insert into tbl_donar_master_detail(donar_fk,amount_no_child,tagged,voucherNo,donationAmount,created_on)
											values('$highest_id','$no_child','','$voucherNo','$donationAmount','$created_on')";
			$resultMaster = mysql_query($sqlDonorMastDtl);
			
		}
		else if($count1<$no_child){
			$requiredOtherState = $no_child - $count1;
			for($x = 0; $x < $count1; $x++) {
				$sqlMinID = "select min(child_id)as minID from tbl_child_profile_card where state='$state' and tagged='no'";
				$resMinID = mysql_query($sqlMinID);
				$minIDCount = mysql_num_rows($resMinID);
				if($minIDCount>0){
					while($rowAnsCount = mysql_fetch_array($resMinID)) {
					extract($rowAnsCount);
					
						$sqlIns = "insert into tbl_child_selected_tagging (child_image,child_id,child_name,child_city,child_parent,child_sex,ngo,donar_id,date_of,time_of,donor_email)
								select a.child_photo,'$minID',a.child_name,a.city,a.child_father_name,a.child_gender,a.name_partner_ngo,'$highest_id','$created_on','$current_time','$donar_email' from tbl_child_profile_card a where a.child_id=$minID";
						$resultIns = mysql_query($sqlIns);
						$sqlUpd = "update tbl_child_profile_card SET tagged='Yes',taggedid='$highest_id',taggeddate='$created_on' where child_id=$minID";
						$resultUpd = mysql_query($sqlUpd);
					}
				}
				
			}
			for($x = 0; $x < $requiredOtherState; $x++) 
			{
				$sqlMinID = "select min(child_id)as minID from tbl_child_profile_card where tagged='no'";
				$resMinID = mysql_query($sqlMinID);
				$minIDCount = mysql_num_rows($resMinID);
				if($minIDCount>0){
					while($rowAnsCount = mysql_fetch_array($resMinID)) {
					extract($rowAnsCount);
						$sqlIns = "insert into tbl_child_selected_tagging (child_image,child_id,child_name,child_city,child_parent,child_sex,ngo,donar_id,date_of,time_of,donor_email)
								select a.child_photo,'$minID',a.child_name,a.city,a.child_father_name,a.child_gender,a.name_partner_ngo,'$highest_id','$created_on','$current_time','$donar_email' from tbl_child_profile_card a where a.child_id=$minID";
						$resultIns = mysql_query($sqlIns);
						$sqlUpd = "update tbl_child_profile_card SET tagged='Yes',taggedid='$highest_id',taggeddate='$created_on' where child_id=$minID";
						$resultUpd = mysql_query($sqlUpd);
					}
				}				
			}
			//getting more then one time donor for $old_donar_id;
						
							$sqlDonorMastDtl = "Insert into tbl_donar_master_detail(donar_fk,amount_no_child,tagged,voucherNo,donationAmount,created_on)
											values('$highest_id','$no_child','','$voucherNo','$donationAmount','$created_on')";
							$resultMaster = mysql_query($sqlDonorMastDtl);
						
			//select * from tbl_child_profile_card where child_id=(select min(child_id) from tbl_child_profile_card where state='GOA' and tagged='no');
		}
		echo '
				<script>
				alert("Data Successfully Saved");
				window.location.href="donar_entery_form.php";
				</script>
				';
	}
	else{
			$sqlCount="select * from tbl_child_profile_card where tagged='no'";
			$resultCount=mysql_query($sqlCount);
			$count=mysql_num_rows($resultCount);
			if($count>$no_child)
			{
				for($x = 0; $x < $no_child; $x++) 
				{
					$sqlMinID = "select min(child_id)as minID from tbl_child_profile_card where tagged='no'";
					$resMinID = mysql_query($sqlMinID);
					$minIDCount = mysql_num_rows($resMinID);
					if($minIDCount>0)
					{
						while($rowAnsCount = mysql_fetch_array($resMinID)) {
						extract($rowAnsCount);
						
						$sqlIns = "insert into tbl_child_selected_tagging (child_image,child_id,child_name,child_city,child_parent,child_sex,ngo,donar_id,date_of,time_of,donor_email)
								select a.child_photo,'$minID',a.child_name,a.city,a.child_father_name,a.child_gender,a.name_partner_ngo,'$highest_id','$created_on','$current_time','$donar_email' from tbl_child_profile_card a where a.child_id=$minID";
						$resultIns = mysql_query($sqlIns);
						$sqlUpd = "update tbl_child_profile_card SET tagged='Yes',taggedid='$highest_id',taggeddate='$created_on' where child_id=$minID";
						$resultUpd = mysql_query($sqlUpd);					
						}
					}
					
				}
					//getting more then one time donor for $old_donar_id;
						
							$sqlDonorMastDtl = "Insert into tbl_donar_master_detail(donar_fk,amount_no_child,tagged,voucherNo,donationAmount,created_on)
											values('$highest_id','$no_child','','$voucherNo','$donationAmount','$created_on')";
							$resultMaster = mysql_query($sqlDonorMastDtl);
						
						
			}
			else if($count<$no_child){
				echo '
				<script>
				alert("You can tag maximum Child");
				window.location.href="donar_entery_form.php";
				</script>
				';
			}
			echo '
				<script>
				alert("Data Successfully Saved");
				window.location.href="donar_entery_form.php";
				</script>
				';
		}
	
//echo $highest_id;
	if($resultUpd)
	{
		if (isset($_POST["donar_email"])) {
			$link_msg = 'http://rotaryteach.org/child_development/other/login.php';
			if(mail("$donar_email","Donation",$link_msg,"From: RILM\n"))
			{
				echo '
				<script>
				alert("Data Successfully Saved");
				window.location.href="donar_entery_form.php";
				</script>
				';
			}
		}		
	}
}
else {
echo "ERROR";
}

?> 