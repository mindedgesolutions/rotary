<?php
//session_start();
//ob_start();

include('include/config02.php');
include 'include/session_check.php';

$_SESSION['uid'];
$_SESSION['prof_type'];
$_SESSION['district'];
$_SESSION['club'];
$_SESSION['name'];
$_SESSION['mobile'];
// Get values from form 
//insert in table tbl_eva_exam_header
$userpk=$_SESSION['uid'];
$curent_dt=date('d/m/y');
//$exam_no="ZLC".rand(1,9999);
$name=$_SESSION['name'];
$mobno=$_SESSION["mobile"];
$district=$_SESSION["district"];
$stype=$_GET['txtstype'];
$eval_type_no=$_GET['txt_evalu_type_no'];
$exam_no=$stype;
//insert in table tbl_eva_exam_details
$str=$_GET['txtQueIDmarksID'];
$header_id=$_GET['txtHeaderIDFK'];
//$count=$count_main-1;
//delete record from tbl_eva_exam_header and tbl_eva_exam_details
$sqlDelHeader = "delete from tbl_eva_exam_header where district='$district' and exam_no='$exam_no' and id='$header_id' and evalu_type_no='$eval_type_no'";
$result1 = mysql_query($sqlDelHeader);
$sqlDelDetails = "delete from tbl_eva_exam_details where header_id_fk='$header_id'";
$result2 = mysql_query($sqlDelDetails);

// Insert data into mysql 
$sql="INSERT INTO tbl_eva_exam_header(user_id_fk,exam_date,exam_no,memname,mobile_no,district,evalu_type_no)
VALUES('$userpk','$curent_dt','$exam_no','$name','$mobno','$district','$eval_type_no')";
//echo $sql;
$result=mysql_query($sql);

if($result){	
	$result1 = mysql_query("select max(id) from tbl_eva_exam_header");
    $row = mysql_fetch_row($result1);
    $highest_id = $row[0];	
	$myArray = explode('|', $str);
	foreach($myArray as $my_Array){
    $sss= explode('#', $my_Array); 
	$sqlChildIns="INSERT INTO tbl_eva_exam_details(header_id_fk,quest_master_pk,quest_ans_master_pk)
			VALUES('$highest_id','$sss[0]','$sss[1]')";
			if ($sss[0]<>'') {
			$result1=mysql_query($sqlChildIns);
			}
			
}
	
//echo $highest_id;
	if($result1)
	{
		echo '
		<script>
		alert("Data Successfully Updated");
		window.location.href="dashboard.php";
		</script>
		';
	}
}

else {
echo "ERROR";
}
?>