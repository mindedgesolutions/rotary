<?php
session_start();
ob_start();
print_r($_SESSION); 
echo "aa";
echo $_SESSION['selyear'];
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

function IsNumeric20(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error20").style.display = ret ? "none" : "inline";
			return ret;
		}			
function IsNumeric21(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error21").style.display = ret ? "none" : "inline";
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

function evsHide(value)
{
    //alert(value);
	if(value=="Class1" || value=="Class2" || value=="Class3")
	{
		document.getElementById("evsMaster").style.display = "none";
		document.getElementById("evsChild").style.display = "none";
	}
	else{
		document.getElementById("evsMaster").style.display = null;
		document.getElementById("evsChild").style.display = null;
	}
}
function isValidDate(txtdate) {
    var txtDate = "#" + txtdate;
    var dateString = $(txtDate).val();
    var date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
    if (!(date_regex.test(dateString))) {
    alert("Date Must Be in mm/dd/yyyy format");
}}
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
      <div class="user">
        <figure> <a href="dashboard.php#"><img src="assets/images/avatar1.jpg" alt="Adminise" /></a> </figure>
        <div class="welcome">
          <p>Welcome</p>
          <h5><a href="dashboard.php#">RILM Member</a></h5>
        </div>
      </div>
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<div align="Centre" style="margin-left:400px;">
			<h1 style="color:#ffffff;">ASHA KIRAN CHILDREN MARKS ENTRY SCREEN</h1>
		</div>
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
    
		  <div class="container" style="position: relative; left: 150px;">
			<form class="form-horizontal" name="frm" id="frm" action="ashakirnchildrenmarksentrysave.php" method="post" enctype="multipart/form-data" >
				<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Master Information</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				   <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Month:</label>
						  <input type="text" class="form-control" id="selMonth" name="selMonth" value="<?php echo $_session["selmonth"]; ?>"  />	
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Year:</label>
					  <input type="text" class="form-control" id="selYear" name="selYear" value="<?php echo $_session["selyear"]; ?>"  />	
					  </div>
				  </div>

<!--				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>s
					<div class="col-sm-8">
						<label for="exampleInputFile">Name Of NGO:</label><br/>
						<input type="text" class="form-control" id="txtNGOName" name="txtNGOName" />	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" ></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Name Of Centre:</label>
					  <input type="text" class="form-control" id="txtCentreName" name="txtCentreName" />	
					</div>
				  </div>-->
				  <?php
						$host="192.185.36.129"; // Host name 
						$username="rotary32_teach2"; // Mysql username 
						$password="info123"; // Mysql password 
						$db_name="rotary32_teach2"; // Database name 
						$tbl_name="tbl_Asha_Kirn_Children_Marks_Dtl"; // Table name 
						mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
						mysql_select_db("$db_name")or die("cannot select DB");
						$query = "select centreteacher,projcoordinator,monname,year,workingday from tbl_Asha_Kirn_Children_Marks_Dtl where marksIDpk=(select max(marksIDpk) from tbl_Asha_Kirn_Children_Marks_Dtl)";
						
						//AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl) city='Madhabpur' AND 
						$result = mysql_query($query);
						while($row = mysql_fetch_assoc($result))
							{
								extract($row);
							}
						if($result)
						{
						?>
						 
						  <div class="form-group">
							<label class="control-label col-sm-3" ></label>
							<div class="col-sm-8"> 
							  <label for="exampleInputFile">Name of Project Coordinator:</label>
							  <input type="text" class="form-control" id="txtProjCoOrdinator" name="txtProjCoOrdinator" value="<?php echo $projcoordinator; ?>" />	
							</div>
						  </div>  
						 <div class="form-group">
							<label class="control-label col-sm-3" ></label>
							<div class="col-sm-8"> 
							  <label for="exampleInputFile">Name of Centre Teacher:</label>
							  <input type="text" class="form-control" id="txtCentreTeacher" name="txtCentreTeacher" value="<?php echo $centreteacher; ?>"  />	
							</div>
						  </div>
						
				
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" ></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Number of Working Days:</label>
					  <input type="text" class="form-control" id="txtNoOfWorkinDays" value="<?php echo $workingday; ?>" name="txtNoOfWorkinDays" maxlength="2" onkeyup="perAttendance();" onkeypress="return IsNumeric20(event);" ondrop="return false;" onpaste="return false;"/>
					  <span id="error20" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <?php
					}
					?>	
<!--				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Student Id:</label>
					  <input type="text" class="form-control" id="txtStudentID" readonly name="txtStudentID"  />	
					</div>
				  </div> -->
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="get_children_name" class="col-sm-8"> 
					  <label for="exampleInputFile">Name of Student:</label>
<!--					  <select class="form-control" id="selNameOfStudent" name="selNameOfStudent">
						<option value="-1">Select Children</option>
						</select> -->
					<?php
						$host="192.185.36.129"; // Host name 
						$username="rotary32_teach2"; // Mysql username 
						$password="info123"; // Mysql password 
						$db_name="rotary32_teach2"; // Database name 
						$tbl_name="tbl_Asha_Kirn_Children_Marks_Dtl"; // Table name 
						mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
						mysql_select_db("$db_name")or die("cannot select DB");
						//$query = "select child_id,child_name from tbl_child_profile_card where city='Madhabpur'";
						
						$query = "select child_id,child_name from tbl_child_profile_card where city='Madhabpur' AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl where monname='" . $_session["selmonth"] ."' and year='" . $_session["selyear"] ."')";
						
						//AND child_id NOT IN (SELECT child_id FROM tbl_Asha_Kirn_Children_Marks_Dtl)
						$result = mysql_query($query);
						if($result)
						{
							echo "<select class='form-control' id='selNameOfStudent' name='selNameOfStudent'>";
							
							while($row = mysql_fetch_assoc($result))
							{
								echo '<option value="'.$row["child_id"].'">'.$row["child_name"].'</option>';
							}	
							echo "</select>";
						}
						?>	
					</div>
				  </div>

				  <div class="form-group">
					<label class="control-label col-sm-3"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Present Educational Status:</label>
						<select class="form-control" id="selPresentEduStatus" name="selPresentEduStatus" onchange="evsHide(this.value);">
						<option value="C">Select Class</option>
                                    <option value="Class1">Class1</option>
                                    <option value="Class2">Class2</option>
                                    <option value="Class3">Class3</option>
                                    <option value="Class4">Class4</option>
                                    <option value="Class5">Class5</option>
                                    <option value="Class6">Class6</option>
                                    <option value="Class7">Class7</option>
                                    <option value="Class8">Class8</option>
						</select>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Number of Days Attended During the Month:</label>
					  <input type="text" class="form-control" name="txtTotalNoOfDaysAtten" maxlength="2" id="txtTotalNoOfDaysAtten" onkeyup="perAttendance();" onkeypress="return IsNumeric21(event);" ondrop="return false;" onpaste="return false;"/>
					  <span id="error21" style="color: Red; display: none">* Input digits (0 - 9)</span>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">% of Attendance:</label>
					  <input type="text" class="form-control" readonly name="txtPerctOfAttend" id="txtPerctOfAttend" />
					</div>
				  </div>
				  
<!--				  <div class="form-group">
					<label class="control-label col-sm-3" ></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Asha Kiran Id:</label>
					  <input type="text" class="form-control" id="txtAshaKiranID" name="txtAshaKiranID" />	
					</div>
				  </div> -->
				  
			</div>
			
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Marks Obtained In Local Language</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
					  <input type="text" class="form-control" name="txtLLListeningSkill" id="txtLLListeningSkill" onkeyup="addLocalLanguage();" onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;"/>
					  <span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <input type="text" class="form-control" name="txtLLSpeakingSkill" id="txtLLSpeakingSkill" onkeyup="addLocalLanguage();" onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label><br/>
					    <input type="text" class="form-control" name="txtLLReadingSkill" id="txtLLReadingSkill" onkeyup="addLocalLanguage();" onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label><br/>
					    <input type="text" class="form-control" name="txtLLWritingSkill" id="txtLLWritingSkill" onkeyup="addLocalLanguage();" onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label><br/>
					    <input type="text" class="form-control" name="txtLLAggregate" readonly id="txtLLAggregate" />
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label><br/>
					    <input type="text" class="form-control" name="txtLLGrade" readonly id="txtLLGrade" />
					</div>
				  </div>
				 </div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks Obtained In English</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
					  <input type="text" class="form-control" name="txtEngListeningSkill" id="txtEngListeningSkill" onkeyup="addEnglish();" onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <input type="text" class="form-control" name="txtEngSpeakingSkill" id="txtEngSpeakingSkill" onkeyup="addEnglish();" onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label><br/>
					    <input type="text" class="form-control" name="txtEngReadingSkill" id="txtEngReadingSkill" onkeyup="addEnglish();" onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label><br/>
					    <input type="text" class="form-control" name="txtEngWritingSkill" id="txtEngWritingSkill" onkeyup="addEnglish();" onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label><br/>
					    <input type="text" class="form-control" name="txtEngAggregate" readonly id="txtEngAggregate" />
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label><br/>
					    <input type="text" class="form-control" name="txtEngGrade" readonly id="txtEngGrade" />
					</div>
				  </div>
				  
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks Obtained In Maths</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Progress in Arithmetic:</label>
					  <input type="text" class="form-control" name="txtMathProgressInArth" id="txtMathProgressInArth" onkeyup="addMath();" onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Analytical Skill:</label>
					  <input type="text" class="form-control" name="txtMathAnalyticalSkill" id="txtMathAnalyticalSkill" onkeyup="addMath();" onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Understanding of Geometrical Shapes & Concept:</label><br/>
					    <input type="text" class="form-control" name="txtMathGeoShap" id="txtMathGeoShap" onkeyup="addMath();" onkeypress="return IsNumeric11(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error11" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label><br/>
					    <input type="text" class="form-control" name="txtMathAggregate" readonly id="txtMathAggregate" />
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label><br/>
					    <input type="text" class="form-control" name="txtMathGrade" readonly id="txtMathGrade" />
					</div>
				  </div>
			</div>
			<div id="evsMaster" class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Marks Obtained In Environmental Studies</div>
				  <div id="evsChild" class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div id="evsChild1" class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="evsChild1_1" class="col-sm-8"> 
					  <label for="exampleInputFile">Social Knowledge:</label>
					  <input type="text" class="form-control" name="txtEnvStuSocKnow" id="txtEnvStuSocKnow" onkeyup="addEnvironmentalStudies();" onkeypress="return IsNumeric12(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error12" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div id="evsChild2" class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="evsChild2_1" class="col-sm-8"> 
					  <label for="exampleInputFile">Natural Environmental Knowledge:</label>
					  <input type="text" class="form-control" name="txtEnvStuNatuEnvKnow" id="txtEnvStuNatuEnvKnow" onkeyup="addEnvironmentalStudies();" onkeypress="return IsNumeric13(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error13" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div id="evsChild3" class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div id="evsChild3_1" class="col-sm-8">
						<label for="exampleInputFile">Civic Sense:</label><br/>
					    <input type="text" class="form-control" name="txtEnvStuCivicSense" id="txtEnvStuCivicSense" onkeyup="addEnvironmentalStudies();" onkeypress="return IsNumeric14(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error14" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>		  
				  <div id="evsChild4"class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div id="evsChild4_1" class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label><br/>
					    <input type="text" class="form-control" name="txtEnvStuAggregate" readonly id="txtEnvStuAggregate" />
					</div>
				  </div>
				  <div id="evsChild5" class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div id="evsChild5_1" class="col-sm-8">
						<label for="exampleInputFile">Grade:</label><br/>
					    <input type="text" class="form-control" name="txtEnvStuGrade" readonly id="txtEnvStuGrade" />
					</div>
				  </div>
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Marks Obtained In Holistic Development</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">General Knowledge:</label>
					  <input type="text" class="form-control" name="txtHoliDevGenKnow" id="txtHoliDevGenKnow" onkeyup="addHolisticDevelopment();" onkeypress="return IsNumeric15(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error15" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Participation In Activities:</label>
					  <input type="text" class="form-control" name="txtHoliDevPartInActive" id="txtHoliDevPartInActive" onkeyup="addHolisticDevelopment();" onkeypress="return IsNumeric16(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error16" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Sociability:</label><br/>
					    <input type="text" class="form-control" name="txtHoliDevSociability" id="txtHoliDevSociability" onkeyup="addHolisticDevelopment();" onkeypress="return IsNumeric17(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error17" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Leadership Quality:</label>
					  <input type="text" class="form-control" name="txtHoliDevLeaderQuality" id="txtHoliDevLeaderQuality" onkeyup="addHolisticDevelopment();" onkeypress="return IsNumeric18(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error18" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Health And Hygiene:</label>
					  <input type="text" class="form-control" name="txtHoliDevHealthHyg" id="txtHoliDevHealthHyg" onkeyup="addHolisticDevelopment();" onkeypress="return IsNumeric19(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error19" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Aggregate:</label><br/>
					    <input type="text" class="form-control" name="txtHoliDevAggregate" readonly id="txtHoliDevAggregate" />
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label><br/>
					    <input type="text" class="form-control" name="txtHoliDevGrade" readonly id="txtHoliDevGrade" />
					</div>
				  </div>
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; "></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Date of Regularisation in School:</label><br/>
					    <input type="text" class="form-control" name="txtDtOfRegInSchool" id="txtDtOfRegInSchool" />*(dd/mm/yyyy)
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Decision:</label><br/>
					    <textarea class="form-control" rows="5" id="txtDecision" name="txtDecision" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reason:</label><br/>
						<textarea class="form-control" rows="5" id="txtResion" name="txtResion" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  
				  <div class="form-group"> 
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
					  <button type="submit" class="btn" onclick="dateCheck(document.myForm.txtDtOfRegInSchool)" style="color: #ffffff; background-color: #003c6a;">Submit</button>
					</div>
				  </div>
				  
				 </div>
			
			</form>
			
		  </div>
      </div>
    </div>
	<br/>
    <!-- Wrapper End --> 
	<header> 
	


  <!-- Logo Start -->
  
	  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div> 
	  <!-- Logo End --> 
	  <!-- Sidebar Navigation Start -->
	
	  <!-- Header Top Navigation Start -->
		
      <!-- Header Top Navigation End -->
	  <div class="clearfix">
		<div align="right">
			<h3 style="color:#ffffff;">Design & Development By</h3><br/>
			<h5 style="color:#ffffff;">MindedgeSolutions</h5>
		</div>
	  </div>
  <!-- Sidebar Navigation End --> 
	
	</header>
  </div>

</body>
</html>
