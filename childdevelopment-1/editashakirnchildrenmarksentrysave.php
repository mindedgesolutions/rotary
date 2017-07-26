<?php
session_start();
ob_start();

$servername = "103.227.62.215";
$username = "mindedgeteach2";
$password = "SuHiNa@1979";
$dbname = "rotary32_teach2";


$tbl_name="tbl_Asha_Kirn_Children_Marks_Dtl"; // Table name 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
//$id = $_REQUEST['id'];
//$id=13;
$id=$_POST['merksid'];
// 1st delete record from the table 

$sql = "DELETE FROM tbl_Asha_Kirn_Children_Marks_Dtl WHERE marksIDpk='" .$id. "'";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
   
   
$host="103.227.62.215"; // Host name 
$username="mindedgeteach2"; // Mysql username 
$password="SuHiNa@1979"; // Mysql password 
$db_name="rotary32_teach2"; // Database name 
$tbl_name="tbl_Asha_Kirn_Children_Marks_Dtl"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
//$areyoua=$_POST['areyoua'];
//$marksIDpk=$_POST[''];
$nameofngo=$_SESSION['idfk'];
//$nameofcentre=$_POST[''];
//$centreid= $_SESSION['uid'];
$create_by= $_SESSION['username'];
$centreteacher=$_POST['txtCentreTeacher'];
$projcoordinator=$_POST['txtProjCoOrdinator'];
$monname=$_POST['selMonth'];
$year=$_POST['selYear'];
$workingday=$_POST['txtNoOfWorkinDays'];
//$ashakiranid=$_POST[''];
$stud_id=$_POST['selNameOfStudent'];
//$stud_name=$_POST['selNameOfStudent'];
$edustatus=$_POST['selPresentEduStatus'];
$noofdayattend=$_POST['txtTotalNoOfDaysAtten'];
$percntofattendance=$_POST['txtPerctOfAttend'];
$lllistskill=$_POST['txtLLListeningSkill'];
$llspeakingskill=$_POST['txtLLSpeakingSkill'];
$llreadingskill=$_POST['txtLLReadingSkill'];
$llwritingskill=$_POST['txtLLWritingSkill'];
$llagregate=$_POST['txtLLAggregate'];
$llgrad=$_POST['txtLLGrade'];
$lldecision=$_POST['txtLLDecision'];
$llreason=$_POST['txtLLResion'];

$englistskill=$_POST['txtEngListeningSkill'];
$engspeakingskill=$_POST['txtEngSpeakingSkill'];
$engreadingskill=$_POST['txtEngReadingSkill'];
$engwritingskill=$_POST['txtEngWritingSkill'];
$engagregate=$_POST['txtEngAggregate'];
$enggrad=$_POST['txtEngGrade'];
$engdecision=$_POST['txtEngDecision'];
$engreason=$_POST['txEngResion'];

$mathprogarithmetic=$_POST['txtMathProgressInArth'];
$mathanalyticalskill=$_POST['txtMathAnalyticalSkill'];
$mathegeoshape=$_POST['txtMathGeoShap'];
$mathagregate=$_POST['txtMathAggregate'];
$mathgrad=$_POST['txtMathGrade'];
$mathdecision=$_POST['txtMathDecision'];
$mathreason=$_POST['txtMathResion'];

$envstudsocialknow=$_POST['txtEnvStuSocKnow'];
$envstudnaturalenv=$_POST['txtEnvStuNatuEnvKnow'];
$envstudcivicsense=$_POST['txtEnvStuCivicSense'];
$envstudagregate=$_POST['txtEnvStuAggregate'];
$envstudgrad=$_POST['txtEnvStuGrade'];
$envstuddecision=$_POST['txtEnvStuDecision'];
$envstudreason=$_POST['txtEnvStuResion'];

$holdevgenknow=$_POST['txtHoliDevGenKnow'];
$holdevparticiactivities=$_POST['txtHoliDevPartInActive'];
$holdevsociability=$_POST['txtHoliDevSociability'];
$holdevleaderquility=$_POST['txtHoliDevLeaderQuality'];
$holdevhealthhygiene=$_POST['txtHoliDevHealthHyg'];
$holdevagregate=$_POST['txtHoliDevAggregate'];
$holdevgrad=$_POST['txtHoliDevGrade'];
$holdevdecision=$_POST['txtHoliDevDecision'];
$holdevreason=$_POST['txtHoliDevResion'];

$dtofregularisationinschool=$_POST['txtDtOfRegInSchool'];
if(strlen($dtofregularisationinschool)>1)
{
$sql1="UPDATE tbl_child_profile_card SET status='0' where child_id='" .$stud_id. "'";
$result1=mysql_query($sql1);	
}
$monthindex=$_POST['monthindex'];
// Insert data into mysql 

$sql="INSERT INTO $tbl_name(marksIDpk,nameofngo,nameofcentre,centreteacher,projcoordinator,create_by,monname,year,workingday,ashakiranid,stud_id,edustatus,
noofdayattend,percntofattendance,lllistskill,llspeakingskill,llreadingskill,llwritingskill,llagregate,llgrad,englistskill,engspeakingskill,engreadingskill,
engwritingskill,engagregate,enggrad,mathprogarithmetic,mathanalyticalskill,mathegeoshape,mathagregate,mathgrad,envstudsocialknow,envstudnaturalenv,
envstudcivicsense,envstudagregate,envstudgrad,holdevgenknow,holdevparticiactivities,holdevsociability,holdevleaderquility,holdevhealthhygiene,
holdevagregate,holdevgrad,dtofregularisationinschool,lldecision,llreason,engdecision,engreason,mathdecision,mathreason,
envstuddecision,envstudreason,holdevdecision,holdevreason,monthindex
)
VALUES('$marksIDpk','$nameofngo','$nameofcentre','$centreteacher','$projcoordinator','$create_by','$monname','$year','$workingday','$ashakiranid','$stud_id',
'$edustatus','$noofdayattend','$percntofattendance','$lllistskill','$llspeakingskill','$llreadingskill','$llwritingskill','$llagregate',
'$llgrad','$englistskill','$engspeakingskill','$engreadingskill','$engwritingskill','$engagregate','$enggrad','$mathprogarithmetic',
'$mathanalyticalskill','$mathegeoshape','$mathagregate','$mathgrad','$envstudsocialknow','$envstudnaturalenv','$envstudcivicsense',
'$envstudagregate','$envstudgrad','$holdevgenknow','$holdevparticiactivities','$holdevsociability','$holdevleaderquility','$holdevhealthhygiene',
'$holdevagregate','$holdevgrad','$dtofregularisationinschool','$lldecision','$llreason','$engdecision','$engreason','$mathdecision',
'$mathreason','$envstuddecision','$envstudreason','$holdevdecision','$holdevreason','$monthindex')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	echo '
	<script>
	alert("Data Successfully Updated");
	window.location.href="viewAshaKirnChildrenMarksDtl.php";
	</script>
	';
	//header ("Location: viewAshaKirnChildrenMarksDtl.php");window.location.href="viewAshaKirnChildrenMarksDtl.php";	
}
else {
echo "ERROR";
}	
?> 


