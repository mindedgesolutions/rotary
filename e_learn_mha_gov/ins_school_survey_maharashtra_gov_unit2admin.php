<?php
session_start();
ob_start();
include('include/config.php');
   
$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];
// Get values from form 
$surveyid=$_POST['txtsurveyid'];
$identity=$_POST['areyoua'];
$district=$_POST['ddDistrict']; 
$club=$_POST['ddClub']; 
$installationDt=$_POST['txtDtOfInstallation']; 
$compMake=$_POST['txtCompanyMake']; 
$tvModel=$_POST['txtTVModel'];
$name=$_POST['txtRotaryContactPerName'];
$ph_no=$_POST['txtRotaryContactPerMobNo'];  
$email=$_POST['txtRotaryContactPerEmail']; 

if($surveyid!=""){
	$sqlSel = "Select * from tbl_E_Learn_Maharashtra_unit2 where survey_id='$surveyid'";
	$r_sel = mysql_query($sqlSel);
	//$cnt = mysql_num_rows($r_sel);
	//if($cnt>0)
	//{
		$sqlDel = "Delete from tbl_E_Learn_Maharashtra_unit2 where survey_id='$surveyid'";
		$r_del = mysql_query($sqlDel);
		$sql="INSERT INTO tbl_E_Learn_Maharashtra_unit2(survey_id,rilm_identity,distirct,club,dt_installation,company_make,tv_model,name,mobile,email)
		VALUES('$surveyid','$identity','$district','$club','$installationDt','$compMake','$tvModel','$name','$ph_no','$email')";

		$result=mysql_query($sql);

		if($result){	
			//echo $sql;
			echo '
				<script>
				alert("Data Saved Successfully");
				window.location.href="http://rotaryteach.org/e_learn_mha_gov/dashboardadmin.php";
				</script>
				';
		}
	//}
	/*
	else
	{
		$sql="INSERT INTO tbl_E_Learn_Maharashtra_unit2(survey_id,rilm_identity,distirct,club,dt_installation,company_make,tv_model,name,mobile,email)
		VALUES('$surveyid','$identity','$district','$club','$installationDt','$compMake','$tvModel','$name','$ph_no','$email')";

		$result=mysql_query($sql);

		if($result){	
			//echo $sql;
			echo '
				<script>
				alert("Data Saved Successfully");
				window.location.href="http://rotaryteach.org/e_learn_mha_gov/dashboardadmin.php";
				</script>
				';
		}
	}
	*/
else {
echo "ERROR";
}
}
?> 
