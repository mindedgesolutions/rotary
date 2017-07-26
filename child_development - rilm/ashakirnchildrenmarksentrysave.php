<?php
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
 //$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
   
   
$host="192.185.36.129"; // Host name 
$username="rotary32_teach2"; // Mysql username 
$password="info123"; // Mysql password 
$db_name="rotary32_teach2"; // Database name 
$tbl_name="tbl_Asha_Kirn_Children_Marks_Dtl"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
//$areyoua=$_POST['areyoua'];
//$marksIDpk=$_POST[''];
//$nameofngo=$_POST[''];
//$nameofcentre=$_POST[''];
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
$englistskill=$_POST['txtEngListeningSkill'];
$engspeakingskill=$_POST['txtEngSpeakingSkill'];
$engreadingskill=$_POST['txtEngReadingSkill'];
$engwritingskill=$_POST['txtEngWritingSkill'];
$engagregate=$_POST['txtEngAggregate'];
$enggrad=$_POST['txtEngGrade'];
$mathprogarithmetic=$_POST['txtMathProgressInArth'];
$mathanalyticalskill=$_POST['txtMathAnalyticalSkill'];
$mathegeoshape=$_POST['txtMathGeoShap'];
$mathagregate=$_POST['txtMathAggregate'];
$mathgrad=$_POST['txtMathGrade'];
$envstudsocialknow=$_POST['txtEnvStuSocKnow'];
$envstudnaturalenv=$_POST['txtEnvStuNatuEnvKnow'];
$envstudcivicsense=$_POST['txtEnvStuCivicSense'];
$envstudagregate=$_POST['txtEnvStuAggregate'];
$envstudgrad=$_POST['txtEnvStuGrade'];
$holdevgenknow=$_POST['txtHoliDevGenKnow'];
$holdevparticiactivities=$_POST['txtHoliDevPartInActive'];
$holdevsociability=$_POST['txtHoliDevSociability'];
$holdevleaderquility=$_POST['txtHoliDevLeaderQuality'];
$holdevhealthhygiene=$_POST['txtHoliDevHealthHyg'];
$holdevagregate=$_POST['txtHoliDevAggregate'];
$holdevgrad=$_POST['txtHoliDevGrade'];
$dtofregularisationinschool=$_POST['txtDtOfRegInSchool'];
$decision=$_POST['txtDecision'];
$reason=$_POST['txtResion'];


// Insert data into mysql 
$sql="INSERT INTO $tbl_name(marksIDpk,nameofngo,nameofcentre,centreteacher,projcoordinator,monname,year,workingday,ashakiranid,stud_id,edustatus,noofdayattend,
percntofattendance,lllistskill,llspeakingskill,llreadingskill,llwritingskill,llagregate,llgrad,englistskill,engspeakingskill,engreadingskill,engwritingskill,
engagregate,enggrad,mathprogarithmetic,mathanalyticalskill,mathegeoshape,mathagregate,mathgrad,envstudsocialknow,envstudnaturalenv,envstudcivicsense,
envstudagregate,envstudgrad,holdevgenknow,holdevparticiactivities,holdevsociability,holdevleaderquility,holdevhealthhygiene,
holdevagregate,holdevgrad,dtofregularisationinschool,decision,reason
)
VALUES('$marksIDpk','$nameofngo','$nameofcentre','$centreteacher','$projcoordinator','$monname','$year','$workingday','$ashakiranid','$stud_id',
'$edustatus','$noofdayattend','$percntofattendance','$lllistskill','$llspeakingskill','$llreadingskill','$llwritingskill','$llagregate',
'$llgrad','$englistskill','$engspeakingskill','$engreadingskill','$engwritingskill','$engagregate','$enggrad','$mathprogarithmetic',
'$mathanalyticalskill','$mathegeoshape','$mathagregate','$mathgrad','$envstudsocialknow','$envstudnaturalenv','$envstudcivicsense',
'$envstudagregate','$envstudgrad','$holdevgenknow','$holdevparticiactivities','$holdevsociability','$holdevleaderquility','$holdevhealthhygiene',
'$holdevagregate','$holdevgrad','$dtofregularisationinschool','$decision','$reason')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	header ("Location: AshaKiranChildrenMarksEntry.php");	
}
else {
echo "ERROR";
}
?> 


