<?php
session_start();
ob_start();
include('include/config.php');
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
   
   
//$host="103.227.62.215"; // Host name 
//$username="mindedgeteach2"; // Mysql username 
//$password="SuHiNa@1979"; // Mysql password 
//$db_name="rotary32_teach2"; // Database name 
$tbl_name="tbl_Asha_Kirn_Children_Marks_Dtl"; // Table name 

// Connect to server and select database.

//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");

//if(isset($_POST['submit'] && $_POST['txtTotalNoOfDaysAtten']!='')
	
// Get values from form 
//$areyoua=$_POST['areyoua'];
//$marksIDpk=$_POST[''];
//$nameofngo=$_SESSION['idfk'];
//$nameofngo=$_SESSION['uid'];
//$nameofcentre=$_POST[''];


if($_SESSION['type']=='NGO')
	{
		$nameofngo = $_SESSION['uid'];
		$nameofcentre = $_SESSION['centerid'];
		$create_by = $_SESSION['username'];
	}
else if($_SESSION['type']=='center')
	{
		$nameofngo = $_SESSION['idfk'];
		$nameofcentre = $_SESSION['uid'];
		

		$username=mysql_fetch_array(mysql_query("select username from tbl_admin where id=(select idfk from tbl_admin where id='".$nameofcentre."')"));

		$create_by = $username['username'];
	}

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
$engreason=$_POST['txtEngResion'];

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

/*
if($stud_id='')
{
	echo '
	<script>
	alert("Please try again");
	window.location.href="AshaKiranChildrenMarksEntry.php";
	</script>
	';
}*/

//else{
		$checkPresent = mysql_num_rows(mysql_query("select * from tbl_Asha_Kirn_Children_Marks_Dtl where stud_id='".$stud_id."' and create_by='".$create_by."' and monname='".$monname."' and year='".$year."'"));

	if($checkPresent=='0')
	{
		// Insert data into mysql 
		 $sql="INSERT INTO $tbl_name(marksIDpk,nameofngo,nameofcentre,centreteacher,projcoordinator,create_by,monname,year,workingday,ashakiranid,stud_id,edustatus,
		noofdayattend,percntofattendance,lllistskill,llspeakingskill,llreadingskill,llwritingskill,llagregate,llgrad,englistskill,engspeakingskill,engreadingskill,
		engwritingskill,engagregate,enggrad,mathprogarithmetic,mathanalyticalskill,mathegeoshape,mathagregate,mathgrad,envstudsocialknow,envstudnaturalenv,
		envstudcivicsense,envstudagregate,envstudgrad,holdevgenknow,holdevparticiactivities,holdevsociability,holdevleaderquility,holdevhealthhygiene,
		holdevagregate,holdevgrad,dtofregularisationinschool,lldecision,llreason,engdecision,engreason,mathdecision,mathreason,
		envstuddecision,envstudreason,holdevdecision,holdevreason,createdon,monthindex
		)
		VALUES('$marksIDpk','$nameofngo','$nameofcentre','$centreteacher','$projcoordinator','$create_by','$monname','$year','$workingday','$ashakiranid','$stud_id','$edustatus','$noofdayattend','$percntofattendance','$lllistskill','$llspeakingskill','$llreadingskill','$llwritingskill','$llagregate','$llgrad','$englistskill','$engspeakingskill','$engreadingskill','$engwritingskill','$engagregate','$enggrad','$mathprogarithmetic',
		'$mathanalyticalskill','$mathegeoshape','$mathagregate','$mathgrad','$envstudsocialknow','$envstudnaturalenv','$envstudcivicsense',
		'$envstudagregate','$envstudgrad','$holdevgenknow','$holdevparticiactivities','$holdevsociability','$holdevleaderquility','$holdevhealthhygiene',
		'$holdevagregate','$holdevgrad','$dtofregularisationinschool','$lldecision','$llreason','$engdecision','$engreason','$mathdecision',
		'$mathreason','$envstuddecision','$envstudreason','$holdevdecision','$holdevreason',CURDATE(),'$monthindex')";
		
		$result=mysql_query($sql);

		// if successfully insert data into database, displays message "Successful".
		  
		if($result){
			echo '
			<script>
			alert("Data Successfully Saved");
			window.location.href="AshaKiranChildrenMarksEntry.php";
			</script>
			';
			//header ("Location: AshaKiranChildrenMarksEntry.php");	
		}
		else {
		echo "ERROR";

		}	
		
	}
	else {
		//$pkid = mysql_fetch_array(mysql_query("select marksIDpk from tbl_Asha_Kirn_Children_Marks_Dtl where stud_id='".$stud_id."' and create_by='".$create_by."' and monname='".$monname."' and year='".$year."'"));
		// Update data into mysql 		
		//echo $pkid['marksIDpk'];
		echo '
			<script>
			alert("Data Successfully Saved");
			window.location.href="AshaKiranChildrenMarksEntry.php";
			</script>
			';

	}

	
	

//}


?> 


