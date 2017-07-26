<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$mesg = '';

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script>
function perAttendance()
		{
			var text1 = document.getElementById("txtTotalNoOfDaysAtten").value;
			var text2 = document.getElementById("txtNoOfWorkinDays").value;
			if(text1 == "")
				text1=0;
			if(text2 == "")
				text2=0;
			var result = (parseInt(text1) / parseInt(text2))*100;
			if(!isNaN(result)){
				document.getElementById("txtPerctOfAttend").value = result.toFixed(2);;
			}
		}

function addLocalLanguage()
		{
			var text1 = document.getElementById("txtLLListeningSkill").value;
			var text2 = document.getElementById("txtLLSpeakingSkill").value;
			var text3 = document.getElementById("txtLLReadingSkill").value;
			var text4 = document.getElementById("txtLLWritingSkill").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			if(text4 == "" )
				text4=0;
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3) + parseInt(text4);
			if(!isNaN(result)){
				document.getElementById("txtLLAggregate").value = result;
				if(result < 120)
					var grade="D";
				if(result > 120 && result < 160)
					var grade="C";
				if(result > 160 && result < 240)
					var grade="B";
				if(result > 240 )
					var grade="A";
				document.getElementById("txtLLGrade").value = grade;
			}
			
		}	

function addEnglish()
		{
			var text1 = document.getElementById("txtEngListeningSkill").value;
			var text2 = document.getElementById("txtEngSpeakingSkill").value;
			var text3 = document.getElementById("txtEngReadingSkill").value;
			var text4 = document.getElementById("txtEngWritingSkill").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			if(text4 == "" )
				text4=0;
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3) + parseInt(text4);
			if(!isNaN(result)){
				document.getElementById("txtEngAggregate").value = result;
				if(result < 120)
					var grade="D";
				if(result > 120 && result < 160)
					var grade="C";
				if(result > 160 && result < 240)
					var grade="B";
				if(result > 240 )
					var grade="A";
				document.getElementById("txtEngGrade").value = grade;
			}
		}			

function addMath()
		{
			var text1 = document.getElementById("txtMathProgressInArth").value;
			var text2 = document.getElementById("txtMathAnalyticalSkill").value;
			var text3 = document.getElementById("txtMathGeoShap").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3);
			if(!isNaN(result)){
				document.getElementById("txtMathAggregate").value = result;
				if(result < 90)
					var grade="D";
				if(result > 90 && result < 120)
					var grade="C";
				if(result > 120 && result < 180)
					var grade="B";
				if(result > 180 )
					var grade="A";
				document.getElementById("txtMathGrade").value = grade;
			}
		}

function addEnvironmentalStudies()
		{
			var text1 = document.getElementById("txtEnvStuSocKnow").value;
			var text2 = document.getElementById("txtEnvStuNatuEnvKnow").value;
			var text3 = document.getElementById("txtEnvStuCivicSense").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3);
			if(!isNaN(result)){
				document.getElementById("txtEnvStuAggregate").value = result;
				if(result < 90)
					var grade="D";
				if(result > 90 && result < 120)
					var grade="C";
				if(result > 120 && result < 180)
					var grade="B";
				if(result > 180 )
					var grade="A";
				document.getElementById("txtEnvStuGrade").value = grade;
			}
		}

function addHolisticDevelopment()
		{
			var text1 = document.getElementById("txtHoliDevGenKnow").value;
			var text2 = document.getElementById("txtHoliDevPartInActive").value;
			var text3 = document.getElementById("txtHoliDevSociability").value;
			var text4 = document.getElementById("txtHoliDevLeaderQuality").value;
			var text5 = document.getElementById("txtHoliDevHealthHyg").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			if(text4 == "" )
				text4=0;
			if(text5 == "" )
				text5=0;
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3) + parseInt(text4) + parseInt(text5);
			if(!isNaN(result)){
				document.getElementById("txtHoliDevAggregate").value = result;
				if(result < 150)
					var grade="D";
				if(result > 150 && result < 200)
					var grade="C";
				if(result > 200 && result < 250)
					var grade="B";
				if(result > 250 )
					var grade="A";
				document.getElementById("txtHoliDevGrade").value = grade;
			}
		}			
		
</script>
<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
function IsNumeric1(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error1").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric2(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error2").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric3(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error3").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric4(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error4").style.display = ret ? "none" : "inline";
			return ret;
		}	
		
function IsNumeric5(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error5").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric6(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error6").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric7(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error7").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric8(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error8").style.display = ret ? "none" : "inline";
			return ret;
		}		

function IsNumeric9(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error9").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric10(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error10").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric11(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error11").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric12(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error12").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric13(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error13").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric14(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error14").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric15(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error15").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric16(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error16").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric17(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error17").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric18(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error18").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric19(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error19").style.display = ret ? "none" : "inline";
			return ret;
		}			
</script>
<script type="text/javascript">
function get_children() { // Call to ajax function
    var monthname = $('#monthname').val();
    var dataString = "monthname="+monthname;
    $.ajax({
        type: "POST",
        url: "getChildrenList.php", // Name of the php files
        data: dataString,
        success: function(html)
        {
            $("#get_children_name").html(html);
        }
    });
}
</script>		
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
<header> 
  <!-- Logo Start -->
  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
  <!-- Logo End --> 
  <!-- Sidebar Navigation Start -->
  <?php include('include/mainnav.php'); ?>
  <div class="clearfix"></div>
  <!-- Sidebar Navigation End --> 
</header>
<div class="structure-row alone"> 
  <!-- Right Section Start -->
  <div class="right-sec"> 
    <!-- Right Section Header Start -->
    <header> 
      <!-- User Section Start -->
      <?php include('include/child_header.php'); ?>
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<div>
			<h1 style="color:#ffffff; text-align:center;">ASHA KIRAN CHILDREN MARKS DETAIL</h1>
		</div>
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
    
		  <div class="container" style="position: relative; left: 150px;">
		  <?php
					$id = $_REQUEST['id'];
					
					$servername = "103.227.62.215";
					$username = "mindedgeteach2";
					$password = "SuHiNa@1979";
					$dbname = "rotary32_teach2";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					
					//$sql = "SELECT happyschoolID,district,name,club,projectYear FROM tblHappySchoolMaster where happyschoolID='".$id."'";
					$sql = "SELECT a.marksIDpk as marksIDpk,a.nameofngo as nameofngo,b.child_name as stud_name,nameofcentre,centreteacher,projcoordinator,monname,year,workingday,ashakiranid,stud_id,edustatus,noofdayattend,
							percntofattendance,lllistskill,llspeakingskill,llreadingskill,llwritingskill,llagregate,llgrad,englistskill,engspeakingskill,engreadingskill,engwritingskill,
							engagregate,enggrad,mathprogarithmetic,mathanalyticalskill,mathegeoshape,mathagregate,mathgrad,envstudsocialknow,envstudnaturalenv,envstudcivicsense,
							envstudagregate,envstudgrad,holdevgenknow,holdevparticiactivities,holdevsociability,holdevleaderquility,holdevhealthhygiene,
							holdevagregate,holdevgrad,dtofregularisationinschool,lldecision,llreason,engdecision,engreason,mathdecision,mathreason,envstuddecision,envstudreason,holdevdecision,holdevreason
							FROM tbl_Asha_Kirn_Children_Marks_Dtl a,tbl_child_profile_card b
							where a.stud_id=b.child_id AND marksIDpk='".$id."'";
					$result = $conn->query($sql);
					//echo $result->num_rows;
					
					if ($result->num_rows > 0) {
						
						// output data of each row    '<a href="fulltext.php?'.$row['happyschoolID'].'">'
						
						while($row = $result->fetch_assoc()) {
							
			?>
				
		  
			<form class="form-horizontal" name="frm" id="frm" action="" method="post" enctype="multipart/form-data" >
				<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Master Information</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				 
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Month:</label>
						<?php echo $row["monname"]; ?>
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Year:</label>
						<?php echo $row["year"]; ?>
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Name of Project Coordinator:</label>
						<?php echo $row["projcoordinator"]; ?>
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Name of Centre Teacher:</label>
						<?php echo $row["centreteacher"]; ?>
					  </div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" ></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Number Of Working Day:</label>
					  <?php echo $row["workingday"]; ?>
					</div>
				  </div>
			</div>
				<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Enter Details Of Marks Obtained By Students In Your Center</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="get_children_name" class="col-sm-8"> 
					  <label for="exampleInputFile">Name Of Student:</label>
						<?php echo $row["stud_name"]; ?>
					</div>
				  </div>

				  <div class="form-group">
					<label class="control-label col-sm-3"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Present Educational Status:</label>
						<?php echo $row["edustatus"]; ?>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Number Of Days Attend During The Month:</label>
					  <?php echo $row["noofdayattend"]; ?>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">% of Attendance:</label>
					  <?php echo $row["percntofattendance"]; ?>	
					</div>
				  </div>

			     </div>
			
			      <div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks for Local Language</div>
			    <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
						<?php echo $row["lllistskill"]; ?>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <?php echo $row["llspeakingskill"]; ?>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label>
					    <?php echo $row["llreadingskill"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label>
					    <?php echo $row["llwritingskill"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label>
					    <?php echo $row["llagregate"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
					    <?php echo $row["llgrad"]; ?>
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtLLResion" readonly name="txtLLResion" maxlength='100'><?php echo $row["llreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtLLDecision" readonly name="txtLLDecision" maxlength='100'><?php echo $row["lldecision"]; ?></textarea>
						</div>
					  </div>
					  
			</div>

			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks for English</div>
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
					  <?php echo $row["englistskill"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <?php echo $row["engspeakingskill"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label>
					    <?php echo $row["engreadingskill"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label>
					     <?php echo $row["engwritingskill"]; ?>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label>
					    <?php echo $row["engagregate"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
					    <?php echo $row["enggrad"]; ?>
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txEngResion" readonly name="txEngResion" maxlength='100'><?php echo $row["engreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtEngDecision" readonly name="txtEngDecision" maxlength='100'><?php echo $row["engdecision"]; ?></textarea>
						</div>
					  </div>
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Marks for Math</div>
				  
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Progress in Arithmetic:</label>
					  <?php echo $row["mathprogarithmetic"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Analytical Skill:</label>
					  <?php echo $row["mathanalyticalskill"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Understanding of Geometrical shapes & concept:</label>
					    <?php echo $row["mathegeoshape"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label>
					    <?php echo $row["mathagregate"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
					    <?php echo $row["mathgrad"]; ?>
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtMathResion" readonly name="txtMathResion" maxlength='100'><?php echo $row["mathreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtMathDecision" readonly name="txtMathDecision" maxlength='100'><?php echo $row["mathdecision"]; ?></textarea>
						</div>
				  </div>
			</div>
			
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Marks for Environmental Studies</div>
			
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Social Knowlegde:</label>
					  <?php echo $row["envstudsocialknow"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Natural Environmental Knowledge:</label>
					  <?php echo $row["envstudnaturalenv"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Civic Sense:</label>
					    <?php echo $row["envstudcivicsense"]; ?>
					</div>
				  </div>		  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label>
					    <?php echo $row["envstudagregate"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
					    <?php echo $row["envstudgrad"]; ?>
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtEnvStuResion" readonly name="txtEnvStuResion" maxlength='100'><?php echo $row["envstudreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtEnvStuDecision" readonly name="txtEnvStuDecision" maxlength='100'><?php echo $row["envstuddecision"]; ?></textarea>
						</div>
				  </div>
			</div>
			
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks for Holistic Development</div>
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">General Knowledge:</label>
					  <?php echo $row["holdevgenknow"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Participation In Activities:</label>
					  <?php echo $row["holdevparticiactivities"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Sociability:</label>
					    <?php echo $row["holdevsociability"]; ?>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Leadership Quality:</label>
					   <?php echo $row["holdevleaderquility"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Health And Hygiene:</label>
					  <?php echo $row["holdevhealthhygiene"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label>
					    <?php echo $row["holdevagregate"]; ?>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
					    <?php echo $row["holdevgrad"]; ?>
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtHoliDevResion" readonly name="txtHoliDevResion" maxlength='100'><?php echo $row["holdevreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtHoliDevDecision" readonly name="txtHoliDevDecision" maxlength='100'><?php echo $row["holdevdecision"]; ?></textarea>
						</div>
				  </div>
			</div>
					
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Regularization Details</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Date of Regularisation in School:</label><br/>
							<?php echo $row["dtofregularisationinschool"]; ?>
						</div>
					  </div>
				 </div>
			
			</form>
		  <?php
			}
					} else {
						echo "No Record Found";
					}
					//$conn->close();
					
			?>
		</div>  
		</div>
    </div>
    <br>

	<?php include('include/footer.php'); ?>

</body>
</html>
