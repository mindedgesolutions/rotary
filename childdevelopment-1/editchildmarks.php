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
<!-- for calender -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script>
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

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
function minmax(value, max) 
		{
			//if(parseInt(value) < min || isNaN(parseInt(value))) 
			//	return 0; 
			//else if(parseInt(value) > max) 
			var min=0;
			if(parseInt(value) > max) 
			{
				//return 100; 
				alert(value + ' is not between ' + min + ' and ' + max);
			}
				
			else
			{
				return value;
				addLocalLanguage();
			}
		}

function minmaxLL(value, max) 
		{
			//if(parseInt(value) < min || isNaN(parseInt(value))) 
			//	return 0; 
			//else if(parseInt(value) > max) 
			var num = parseInt(value);
			if (0 > num || 100 < num) {
				alert(num + ' is not between ' + min + ' and ' + max);
			}
			else
			{
				addLocalLanguage();
			}
		}	
		
//function addLocalLanguage()
function noDayAtten()
{
	var text1 = document.getElementById("txtNoOfWorkinDays").value;
	var text2 = document.getElementById("txtTotalNoOfDaysAtten").value;
	if(text1=="")
	{
		alert('Please Insert Some Value for Number of Working Days');
		document.getElementById("txtNoOfWorkinDays").focus();
	}
	else if(text2>text1)
	{
		alert('Please Insert Less Value from Number of Working Days');
		
	}	
}

function addLocalLanguage()
		{
			var grade="D";
			var text1 = document.getElementById("txtLLListeningSkill").value;
			var text2 = document.getElementById("txtLLSpeakingSkill").value;
			var text3 = document.getElementById("txtLLReadingSkill").value;
			var text4 = document.getElementById("txtLLWritingSkill").value;
			if(text1 == "")
				document.getElementById("txtLLListeningSkill").value=0;
			if(text2 == "" )
				document.getElementById("txtLLSpeakingSkill").value=0;
			if(text3 == "" )
				document.getElementById("txtLLReadingSkill").value=0;
			if(text4 == "" )
				document.getElementById("txtLLWritingSkill").value=0;
			if(text1>100)
			{
				document.getElementById("txtLLListeningSkill").value=100;
			}
			if(text2>100)
			{
				document.getElementById("txtLLSpeakingSkill").value=100;
			}
			if(text3>100)
			{
				document.getElementById("txtLLReadingSkill").value=100;
			}
			if(text4>100)
			{
				document.getElementById("txtLLWritingSkill").value=100;
			}
			var result1 = parseInt(document.getElementById("txtLLListeningSkill").value) + parseInt(document.getElementById("txtLLSpeakingSkill").value) + parseInt(document.getElementById("txtLLReadingSkill").value) + parseInt(document.getElementById("txtLLWritingSkill").value);
			//document.getElementById("txtLLAggregate").value = result1;
			if(!isNaN(result1)){
				//document.getElementById("txtLLAggregate").value = result1;
				var percnt=(parseInt(result1)/400)*100;
				document.getElementById("txtLLAggregate").value = Math.round(percnt);
				var result = Math.round(percnt);
				if(result > 80)
					grade="A";
				if(result > 60 && result < 79)
					grade="B";
				if(result > 40 && result < 59)
					grade="C";
				if(result < 40 )
					grade="D";
				document.getElementById("txtLLGrade").value = grade;
			}
		}	

function addEnglish()
		{
			var grade="D";
			var text1 = document.getElementById("txtEngListeningSkill").value;
			var text2 = document.getElementById("txtEngSpeakingSkill").value;
			var text3 = document.getElementById("txtEngReadingSkill").value;
			var text4 = document.getElementById("txtEngWritingSkill").value;
			if(text1 == "")
				document.getElementById("txtEngListeningSkill").value=0;
			if(text2 == "" )
				document.getElementById("txtEngSpeakingSkill").value=0;
			if(text3 == "" )
				document.getElementById("txtEngReadingSkill").value=0;
			if(text4 == "" )
				document.getElementById("txtEngWritingSkill").value=0;
			
			if(text1>100)
			{
				document.getElementById("txtEngListeningSkill").value=100;
			}
			if(text2>100)
			{
				document.getElementById("txtEngSpeakingSkill").value=100;
			}
			if(text3>100)
			{
				document.getElementById("txtEngReadingSkill").value=100;
			}
			if(text4>100)
			{
				document.getElementById("txtEngWritingSkill").value=100;
			}
			
			var result1 = parseInt(document.getElementById("txtEngListeningSkill").value) + parseInt(document.getElementById("txtEngSpeakingSkill").value) + parseInt(document.getElementById("txtEngReadingSkill").value) + parseInt(document.getElementById("txtEngWritingSkill").value);
			if(!isNaN(result1)){
				//document.getElementById("txtEngAggregate").value = result1;
				var percnt=(parseInt(result1)/400)*100;
				document.getElementById("txtEngAggregate").value = Math.round(percnt);
				var result = Math.round(percnt);
				if(result > 80)
					grade="A";
				if(result > 60 && result < 79)
					grade="B";
				if(result > 40 && result < 59)
					grade="C";
				if(result < 40 )
					grade="D";
				document.getElementById("txtEngGrade").value = grade;
			}
		}			

function addMath()
		{
			var grade="D";
			var text1 = document.getElementById("txtMathProgressInArth").value;
			var text2 = document.getElementById("txtMathAnalyticalSkill").value;
			var text3 = document.getElementById("txtMathGeoShap").value;
			if(text1 == "")
				document.getElementById("txtMathProgressInArth").value=0;
			if(text2 == "" )
				document.getElementById("txtMathAnalyticalSkill").value=0;
			if(text3 == "" )
				document.getElementById("txtMathGeoShap").value=0;
			if(text1>100)
			{
				document.getElementById("txtMathProgressInArth").value=100;
			}
			if(text2>100)
			{
				document.getElementById("txtMathAnalyticalSkill").value=100;
			}
			if(text3>100)
			{
				document.getElementById("txtMathGeoShap").value=100;
			}
			
			var result1 = parseInt(document.getElementById("txtMathProgressInArth").value) + parseInt(document.getElementById("txtMathAnalyticalSkill").value) + parseInt(document.getElementById("txtMathGeoShap").value);
			if(!isNaN(result1)){
				//document.getElementById("txtMathAggregate").value = result1;
				var percnt=(parseInt(result1)/300)*100;
				document.getElementById("txtMathAggregate").value = Math.round(percnt);
				var result = Math.round(percnt);
				if(result > 80)
					grade="A";
				if(result > 60 && result < 79)
					grade="B";
				if(result > 40 && result < 59)
					grade="C";
				if(result < 40 )
					grade="D";
				document.getElementById("txtMathGrade").value = grade;
			
			}
		}

function addEnvironmentalStudies()
		{
			var grade="D";
			var text1 = document.getElementById("txtEnvStuSocKnow").value;
			var text2 = document.getElementById("txtEnvStuNatuEnvKnow").value;
			var text3 = document.getElementById("txtEnvStuCivicSense").value;
			if(text1 == "")
				document.getElementById("txtEnvStuSocKnow").value=0;
			if(text2 == "" )
				document.getElementById("txtEnvStuNatuEnvKnow").value=0;
			if(text3 == "" )
				document.getElementById("txtEnvStuCivicSense").value=0;
			
			if(text1>100)
			{
				document.getElementById("txtEnvStuSocKnow").value=100;
			}
			if(text2>100)
			{
				document.getElementById("txtEnvStuNatuEnvKnow").value=100;
			}
			if(text3>100)
			{
				document.getElementById("txtEnvStuCivicSense").value=100;
			}
			
			var result1 = parseInt(document.getElementById("txtEnvStuSocKnow").value) + parseInt(document.getElementById("txtEnvStuNatuEnvKnow").value) + parseInt(document.getElementById("txtEnvStuCivicSense").value);
			if(!isNaN(result1)){
				//document.getElementById("txtEnvStuAggregate").value = result1;
				var percnt=(parseInt(result1)/300)*100;
				document.getElementById("txtEnvStuAggregate").value = Math.round(percnt);
				var result = Math.round(percnt);
				if(result > 80)
					grade="A";
				if(result > 60 && result < 79)
					grade="B";
				if(result > 40 && result < 59)
					grade="C";
				if(result < 40 )
					grade="D";
				document.getElementById("txtEnvStuGrade").value = grade;
			}
		}

function addHolisticDevelopment()
		{
			var grade="D";
			var text1 = document.getElementById("txtHoliDevGenKnow").value;
			var text2 = document.getElementById("txtHoliDevPartInActive").value;
			var text3 = document.getElementById("txtHoliDevSociability").value;
			var text4 = document.getElementById("txtHoliDevLeaderQuality").value;
			var text5 = document.getElementById("txtHoliDevHealthHyg").value;
			if(text1 == "")
				document.getElementById("txtHoliDevGenKnow").value=0;
			if(text2 == "" )
				document.getElementById("txtHoliDevPartInActive").value=0;
			if(text3 == "" )
				document.getElementById("txtHoliDevSociability").value=0;
			if(text4 == "" )
				document.getElementById("txtHoliDevLeaderQuality").value=0;
			if(text5 == "" )
				document.getElementById("txtHoliDevHealthHyg").value=0;
			if(text1>100)
			{
				document.getElementById("txtHoliDevGenKnow").value=100;
			}
			if(text2>100)
			{
				document.getElementById("txtHoliDevPartInActive").value=100;
			}
			if(text3>100)
			{
				document.getElementById("txtHoliDevSociability").value=100;
			}
			if(text4>100)
			{
				document.getElementById("txtHoliDevLeaderQuality").value=100;
			}
			if(text5>100)
			{
				document.getElementById("txtHoliDevHealthHyg").value=100;
			}
			
			var result1 = parseInt(document.getElementById("txtHoliDevGenKnow").value) + parseInt(document.getElementById("txtHoliDevPartInActive").value) + parseInt(document.getElementById("txtHoliDevSociability").value) + parseInt(document.getElementById("txtHoliDevLeaderQuality").value) + parseInt(document.getElementById("txtHoliDevHealthHyg").value);
			if(!isNaN(result1)){
				//document.getElementById("txtHoliDevAggregate").value = result1;
				var percnt=(parseInt(result1)/500)*100;
				document.getElementById("txtHoliDevAggregate").value = Math.round(percnt);
				var result = Math.round(percnt);
				if(result > 80)
					grade="A";
				if(result > 60 && result < 79)
					grade="B";
				if(result > 40 && result < 59)
					grade="C";
				if(result < 40 )
					grade="D";
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
		document.getElementById("txtEnvStuSocKnow").value="";
		document.getElementById("txtEnvStuNatuEnvKnow").value="";
		document.getElementById("txtEnvStuCivicSense").value="";
		document.getElementById("txtEnvStuAggregate").value="";
		document.getElementById("txtEnvStuGrade").value="";
		document.getElementById("txtEnvStuResion").value="";
		document.getElementById("txtEnvStuDecision").value="";
	}
	else{
		document.getElementById("evsMaster").style.display = null;
		document.getElementById("evsChild").style.display = null;
	}
}

</script>		
<script>
     function dateCheck(inputText) {
        var cl = document.getElementById("selPresentEduStatus").value;
		if(cl==-1)
		{
			alert("Please Select Class");
			document.getElementById("selPresentEduStatus").focus;
			return false;
		} 
		var n=document.getElementById("txtDtOfRegInSchool").value;
		if (n.length > 1)
		 {
			 debugger;
			 var dateFormat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

			 var flag = 1;

			 if (inputText.value.match(dateFormat)) {
				 document.myForm.dateInput.focus();

				 var inputFormat1 = inputText.value.split('/');
				 var inputFormat2 = inputText.value.split('-');
				 linputFormat1 = inputFormat1.length;
				 linputFormat2 = inputFormat2.length;

				 if (linputFormat1 > 1) {
					 var pdate = inputText.value.split('/');
				 }
				 else if (linputFormat2 > 1) {
					 var pdate = inputText.value.split('-');
				 }
				 var date = parseInt(pdate[0]);
				 var month = parseInt(pdate[1]);
				 var year = parseInt(pdate[2]);

				 var ListofDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
				 if (month == 1 || month > 2) {
					 if (date > ListofDays[month - 1]) {
						 alert("Invalid date format!");
						 return false;
					 }
				 }

				 if (month == 2) {
					 var leapYear = false;

					 if ((!(year % 4) && year % 100) || !(year % 400)) {
						 leapYear = true;

					 }
					 if ((leapYear == false) && (date >= 29)) {
						 alert("Invalid date format!");
						 return false;
					 }
					 if ((leapYear == true) && (date > 29)) {
						 alert("Invalid date format!");
						 return false;
					 }
				 }
				 if (flag == 1) {
					 alert("Valid Date");
				 }
			 }
			 else {
				 alert("Invalid date format!");
				 document.frm.txtDtOfRegInSchool.focus();
				 return false;
				 }
		 }
     }
     function restrictCharacters(evt) {

         evt = (evt) ? evt : window.event;
         var charCode = (evt.which) ? evt.which : evt.keyCode;
         if (((charCode >= '48') && (charCode <= '57')) || (charCode == '47')) {
             return true;
         }
         else {
             return false;
         }
     }
	 function minmax(value, max) 
		{
			//if(parseInt(value) < min || isNaN(parseInt(value))) 
			//	return 0; 
			//else if(parseInt(value) > max) 
			if(parseInt(value) > max) 
				return 100; 
			else return value;
		}
 </script>	
<script>
  $(document).ready(function() {
    $("#txtDtOfRegInSchool").datepicker({ dateFormat: 'dd/mm/yy',
											changeMonth: false,
											changeYear: false,
											stepMonths: false
										});
  });
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
			<h1 style="color:#ffffff; text-align:center;">EDIT ASHA KIRAN CHILDREN MARKS</h1>
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
					
					date_default_timezone_set("Asia/Kolkata");
					
					//monname
					$lastday=31;
					
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
						
						/* checking */
						$sqlchk="select lastday from tbl_utility where monthname='" .$row["monname"]. "'";
					
					$resultchk = $conn->query($sqlchk);
					while($row1 = $resultchk->fetch_assoc()) {
						$lastday=$row1["lastday"];
						
					}
					//echo date('d');
					
					if (intval(date('d')) > intval($lastday)) {
						header('Location: http://rotaryteach.org/childdevelopment/error.php');
					}
					/* checking */
							
			?>
				
		  
			
			<form class="form-horizontal" name="frm" id="frm" onsubmit="return dateCheck(document.frm.txtDtOfRegInSchool);" action="editashakirnchildrenmarksentrysave.php" method="post" enctype="multipart/form-data">
				<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Master Information</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				 
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Month:</label>
						<input type="text" class="form-control" id="selMonth" readonly name="selMonth" value="<?php echo $row["monname"]; ?>"  />
						<input type="text" class="form-control" id="merksid" style="display:none;" readonly name="merksid" value="<?php echo $row["marksIDpk"]; ?>"  />
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Year:</label>
						<input type="text" class="form-control" id="selYear" readonly name="selYear" value="<?php echo $row["year"]; ?>"  />
					  <?php
							$mon=$row["monname"];
							$yer=$row["year"];
							if($mon=="January")
							{
								$monno='01';
								$index=$yer.$monno;
							}
							if($mon=="February")
							{
								$monno='02';
								$index=$yer.$monno;
							}
							if($mon=="March")
							{
								$monno='03';
								$index=$yer.$monno;
							}
							if($mon=="April")
							{
								$monno='04';
								$index=$yer.$monno;
							}
							if($mon=="May")
							{
								$monno='05';
								$index=$yer.$monno;
							}
							if($mon=="June")
							{
								$monno='06';
								$index=$yer.$monno;
							}
							if($mon=="July")
							{
								$monno='07';
								$index=$yer.$monno;
							}
							if($mon=="August")
							{
								$monno='08';
								$index=$yer.$monno;
							}
							if($mon=="September")
							{
								$monno='09';
								$index=$yer.$monno;
							}
							if($mon=="October")
							{
								$monno='10';
								$index=$yer.$monno;
							}
							if($mon=="November")
							{
								$monno='11';
								$index=$yer.$monno;
							}
							if($mon=="December")
							{
								$monno='12';
								$index=$yer.$monno;
							}
								
						?>
						<input type="text" class="form-control" id="monthindex" style="display:none;" readonly name="monthindex" value="<?php echo $index; ?>"  />
					  </div>
				  </div>
				  
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Name of Project Coordinator:</label>
					  <input type="text" class="form-control" id="txtProjCoOrdinator" name="txtProjCoOrdinator" value="<?php echo $row["projcoordinator"]; ?>" />
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Name of Centre Teacher:</label>
						<input type="text" class="form-control" id="txtCentreTeacher" name="txtCentreTeacher" value="<?php echo $row["centreteacher"]; ?>" />
					  </div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" ></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Number Of Working Day:</label>
					  <input type="text" class="form-control" id="txtNoOfWorkinDays" value="<?php echo $row["workingday"]; ?>" name="txtNoOfWorkinDays" maxlength="2" onkeyup="perAttendance();" onkeypress="return IsNumeric20(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error20" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
			</div>
				<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Enter Details Of Marks Obtained By Students In Your Center</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="get_children_name" class="col-sm-8"> 
					  <label for="exampleInputFile">Name Of Student:</label>
					  <input type="text" class="form-control" id="txtStudentName" readonly name="txtStudentName" value="<?php echo $row["stud_name"]; ?>"  />
					  
					  <input type="text" class="form-control" id="selNameOfStudent" readonly name="selNameOfStudent" style="display:none;" value="<?php echo $row["stud_id"]; ?>"  />
					  
					</div>
				  </div>

				  <div class="form-group">
					<label class="control-label col-sm-3"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Present Educational Status:</label>
						<select class="form-control" id="selPresentEduStatus" name="selPresentEduStatus" onchange="evsHide(this.value);">
									<option value="-1">Select Class</option>
                                    <option value="Class1" <?php if($row["edustatus"]=='Class1'){ echo "selected";} ?>>Class1</option>
                                    <option value="Class2" <?php if($row["edustatus"]=='Class2'){ echo "selected";} ?>>Class2</option>
                                    <option value="Class3" <?php if($row["edustatus"]=='Class3'){ echo "selected";} ?>>Class3</option>
                                    <option value="Class4" <?php if($row["edustatus"]=='Class4'){ echo "selected";} ?>>Class4</option>
                                    <option value="Class5" <?php if($row["edustatus"]=='Class5'){ echo "selected";} ?>>Class5</option>
                                    <option value="Class6" <?php if($row["edustatus"]=='Class6'){ echo "selected";} ?>>Class6</option>
                                    <option value="Class7" <?php if($row["edustatus"]=='Class7'){ echo "selected";} ?>>Class7</option>
                                    <option value="Class8" <?php if($row["edustatus"]=='Class8'){ echo "selected";} ?>>Class8</option>
									<?php
										if($row["edustatus"]=='Class1')
										{
											?>
											<style type="text/css">
											#evsMaster{display:none;}
											#evsChild{display:none;}
											</style>
											<?php
										}
										if($row["edustatus"]=='Class1')
										{
											?>
											<style type="text/css">
											#evsMaster{display:none;}
											#evsChild{display:none;}
											</style>
											<?php
										}
										if($row["edustatus"]=='Class1')
										{
											?>
											<style type="text/css">
											#evsMaster{display:none;}
											#evsChild{display:none;}
											</style>
											<?php
										}
										else
										{
											?>
											<style type="text/css">
											#evsMaster{display:null;}
											#evsChild{display:null;}
											</style>
											<?php
										}
									?>
						</select>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Number Of Days Attend During The Month:</label>
					  <input type="text" class="form-control" name="txtTotalNoOfDaysAtten" maxlength="2" id="txtTotalNoOfDaysAtten" value="<?php echo $row["noofdayattend"]; ?>" onblur="noDayAtten();" onkeyup="perAttendance();" onkeypress="return IsNumeric21(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error21" style="color: Red; display: none">* Input digits (0 - 9)</span>
					  	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">% of Attendance:</label>
					  <input type="text" class="form-control" readonly name="txtPerctOfAttend" id="txtPerctOfAttend" value="<?php echo $row["percntofattendance"]; ?>" />
					  	
					</div>
				  </div>

			     </div>
			
			      <div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks for Local Language</div>
			    <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
					  <input type="text" class="form-control" name="txtLLListeningSkill" id="txtLLListeningSkill" value="<?php echo $row["lllistskill"]; ?>" onblur="addLocalLanguage();" onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required />
					  <span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <input type="text" class="form-control" name="txtLLSpeakingSkill" id="txtLLSpeakingSkill" value="<?php echo $row["llspeakingskill"]; ?>" onblur="addLocalLanguage();" onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required />
					  <span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
					  	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label>
						<input type="text" class="form-control" name="txtLLReadingSkill" id="txtLLReadingSkill" value="<?php echo $row["llreadingskill"]; ?>" onblur="addLocalLanguage();" onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required />
					  <span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>
					    
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label>
						<input type="text" class="form-control" name="txtLLWritingSkill" id="txtLLWritingSkill" value="<?php echo $row["llwritingskill"]; ?>" onblur="addLocalLanguage();" onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required />
					  <span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label> -->
						<label for="exampleInputFile">Percentage:</label><br/>
						<input type="text" class="form-control" name="txtLLAggregate" readonly id="txtLLAggregate" value="<?php echo $row["llagregate"]; ?>" />
					    
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
						<input type="text" class="form-control" name="txtLLGrade" readonly id="txtLLGrade" value="<?php echo $row["llgrad"]; ?>" />
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtLLResion" name="txtLLResion" maxlength='100'><?php echo $row["llreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtLLDecision" name="txtLLDecision" maxlength='100'><?php echo $row["lldecision"]; ?></textarea>
						</div>
					  </div>
					  
			</div>

			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks for English</div>
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
					  <input type="text" class="form-control" name="txtEngListeningSkill" id="txtEngListeningSkill" value="<?php echo $row["englistskill"]; ?>" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
					  
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <input type="text" class="form-control" name="txtEngSpeakingSkill" id="txtEngSpeakingSkill" value="<?php echo $row["engspeakingskill"]; ?>" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label>
						<input type="text" class="form-control" name="txtEngReadingSkill" id="txtEngReadingSkill" value="<?php echo $row["engreadingskill"]; ?>" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label>
						<input type="text" class="form-control" name="txtEngWritingSkill" id="txtEngWritingSkill" value="<?php echo $row["engwritingskill"]; ?>" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>
					     
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label> -->
						<label for="exampleInputFile">Percentage:</label><br/>
						<input type="text" class="form-control" name="txtEngAggregate" readonly id="txtEngAggregate" value="<?php echo $row["engagregate"]; ?>" />
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
						<input type="text" class="form-control" name="txtEngGrade" readonly id="txtEngGrade" value="<?php echo $row["enggrad"]; ?>" />
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txEngResion" name="txEngResion" maxlength='100'><?php echo $row["engreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtEngDecision" name="txtEngDecision" maxlength='100'><?php echo $row["engdecision"]; ?></textarea>
						</div>
					  </div>
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Marks for Math</div>
				  
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Progress in Arithmetic:</label>
					  <input type="text" class="form-control" name="txtMathProgressInArth" id="txtMathProgressInArth" value="<?php echo $row["mathprogarithmetic"]; ?>" maxlength='3' onblur="addMath();" onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Analytical Skill:</label>
					  <input type="text" class="form-control" name="txtMathAnalyticalSkill" id="txtMathAnalyticalSkill" value="<?php echo $row["mathanalyticalskill"]; ?>" maxlength='3' onblur="addMath();" onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
					  
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Understanding of Geometrical shapes & concept:</label>
						<input type="text" class="form-control" name="txtMathGeoShap" id="txtMathGeoShap" value="<?php echo $row["mathegeoshape"]; ?>" maxlength='3' onblur="addMath();" onkeypress="return IsNumeric11(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error11" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label> -->
						<label for="exampleInputFile">Percentage:</label><br/>
						<input type="text" class="form-control" name="txtMathAggregate" readonly id="txtMathAggregate" value="<?php echo $row["mathagregate"]; ?>" />
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
						<input type="text" class="form-control" name="txtMathGrade" readonly id="txtMathGrade" value="<?php echo $row["mathgrad"]; ?>" />
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtMathResion" name="txtMathResion" maxlength='100'><?php echo $row["mathreason"]; ?></textarea>
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtMathDecision" name="txtMathDecision" maxlength='100'><?php echo $row["mathdecision"]; ?></textarea>
						</div>
				  </div>
			</div>
			
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Marks for Environmental Studies</div>
			
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Social Knowlegde:</label>
					  <input type="text" class="form-control" name="txtEnvStuSocKnow" id="txtEnvStuSocKnow" value="<?php echo $row["envstudsocialknow"]; ?>" maxlength='3' onblur="addEnvironmentalStudies();" onkeypress="return IsNumeric12(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error12" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Natural Environmental Knowledge:</label>
					  <input type="text" class="form-control" name="txtEnvStuNatuEnvKnow" id="txtEnvStuNatuEnvKnow" value="<?php echo $row["envstudnaturalenv"]; ?>" maxlength='3' onblur="addEnvironmentalStudies();" onkeypress="return IsNumeric13(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error13" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Civic Sense:</label>
						<input type="text" class="form-control" name="txtEnvStuCivicSense" id="txtEnvStuCivicSense" value="<?php echo $row["envstudcivicsense"]; ?>" maxlength='3' onblur="addEnvironmentalStudies();" onkeypress="return IsNumeric14(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error14" style="color: Red; display: none">* Input digits (0 - 9)</span>
					    
					</div>
				  </div>		  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label> -->
						<label for="exampleInputFile">Percentage:</label><br/>
						<input type="text" class="form-control" name="txtEnvStuAggregate" readonly id="txtEnvStuAggregate" value="<?php echo $row["envstudagregate"]; ?>" />
					    
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
						<input type="text" class="form-control" name="txtEnvStuGrade" readonly id="txtEnvStuGrade" value="<?php echo $row["envstudgrad"]; ?>" />
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtEnvStuResion" name="txtEnvStuResion" maxlength='100'><?php echo $row["envstudreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtEnvStuDecision" name="txtEnvStuDecision" maxlength='100'><?php echo $row["envstuddecision"]; ?></textarea>
						</div>
				  </div>
			</div>
			
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Marks for Holistic Development</div>
			<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">General Knowledge:</label>
					  <input type="text" class="form-control" name="txtHoliDevGenKnow" id="txtHoliDevGenKnow" value="<?php echo $row["holdevgenknow"]; ?>" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric15(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error15" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Participation In Activities:</label>
					  <input type="text" class="form-control" name="txtHoliDevPartInActive" id="txtHoliDevPartInActive" value="<?php echo $row["holdevparticiactivities"]; ?>" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric16(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error16" style="color: Red; display: none">* Input digits (0 - 9)</span>
					  
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Sociability:</label>
						<input type="text" class="form-control" name="txtHoliDevSociability" id="txtHoliDevSociability" value="<?php echo $row["holdevsociability"]; ?>" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric17(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error17" style="color: Red; display: none">* Input digits (0 - 9)</span>
					    
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Leadership Quality:</label>
					  <input type="text" class="form-control" name="txtHoliDevLeaderQuality" id="txtHoliDevLeaderQuality" value="<?php echo $row["holdevleaderquility"]; ?>" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric18(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error18" style="color: Red; display: none">* Input digits (0 - 9)</span>
					   
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Health And Hygiene:</label>
					  <input type="text" class="form-control" name="txtHoliDevHealthHyg" id="txtHoliDevHealthHyg" value="<?php echo $row["holdevhealthhygiene"]; ?>" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric19(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error19" style="color: Red; display: none">* Input digits (0 - 9)</span>
					  
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label> -->
						<label for="exampleInputFile">Percentage:</label><br/>
						<input type="text" class="form-control" name="txtHoliDevAggregate" readonly id="txtHoliDevAggregate" value="<?php echo $row["holdevagregate"]; ?>" />
					    
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Grade:</label>
						<input type="text" class="form-control" name="txtHoliDevGrade" readonly id="txtHoliDevGrade" value="<?php echo $row["holdevgrad"]; ?>" />
					    
					</div>
				  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Reason:</label><br/>
							<textarea class="form-control" rows="5" id="txtHoliDevResion" name="txtHoliDevResion" maxlength='100'><?php echo $row["holdevreason"]; ?></textarea>
							
						</div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Decision:</label><br/>
							<textarea class="form-control" rows="5" id="txtHoliDevDecision" name="txtHoliDevDecision" maxlength='100'><?php echo $row["holdevdecision"]; ?></textarea>
						</div>
				  </div>
			</div>
					
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; ">Regularization Details</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
					  <div class="form-group">
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
							<label for="exampleInputFile">Date of Regularisation in School:</label><br/>
							<input type="text" class="form-control" name="txtDtOfRegInSchool" id="txtDtOfRegInSchool" value="<?php echo $row["dtofregularisationinschool"]; ?>" onkeypress="return restrictCharacters(event);" />*(dd/mm/yyyy)
							
						</div>
					  </div>
					  <div class="form-group"> 
						<label class="control-label col-sm-3" for="email"></label>
						<div class="col-sm-8">
						  <button type="submit" class="btn" style="color: #ffffff; background-color: #003c6a;">Submit</button>
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
