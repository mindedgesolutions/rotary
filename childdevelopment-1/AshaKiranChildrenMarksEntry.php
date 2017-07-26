<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['uid'];
$_SESSION['username'];
$_SESSION['type'];
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
function perAttendance(){
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
function minmax(value, max) {
	//if(parseInt(value) < min || isNaN(parseInt(value))) 
	//	return 0; 
	//else if(parseInt(value) > max) 
	var min=0;
	if(parseInt(value) > max){
		//return 100; 
		alert(value + ' is not between ' + min + ' and ' + max);
	}else{
		return value;
		addLocalLanguage();
	}
}
function minmaxLL(value, max){
	//if(parseInt(value) < min || isNaN(parseInt(value))) 
	//	return 0; 
	//else if(parseInt(value) > max) 
	var num = parseInt(value);
	if (0 > num || 100 < num) {
		alert(num + ' is not between ' + min + ' and ' + max);
	}else{
		addLocalLanguage();
	}
}
		
//function addLocalLanguage()
function noDayAtten(){
	var text1 = document.getElementById("txtNoOfWorkinDays").value;
	var text2 = document.getElementById("txtTotalNoOfDaysAtten").value;
	if(text1==""){
		alert('Please Insert Some Value for Number of Working Days');
		document.getElementById("txtNoOfWorkinDays").focus();
	}else if(text2>text1){
		alert('Please Insert Less Value from Number of Working Days');
		
	}	
}
function addLocalLanguage(){
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
	if(text1>100){
		document.getElementById("txtLLListeningSkill").value=100;
	}
	if(text2>100){
		document.getElementById("txtLLSpeakingSkill").value=100;
	}
	if(text3>100){
		document.getElementById("txtLLReadingSkill").value=100;
	}
	if(text4>100){
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
function addEnglish(){
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
	
	if(text1>100){
		document.getElementById("txtEngListeningSkill").value=100;
	}
	if(text2>100){
		document.getElementById("txtEngSpeakingSkill").value=100;
	}
	if(text3>100){
		document.getElementById("txtEngReadingSkill").value=100;
	}
	if(text4>100){
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
function addMath(){
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
	if(text1>100){
		document.getElementById("txtMathProgressInArth").value=100;
	}
	if(text2>100){
		document.getElementById("txtMathAnalyticalSkill").value=100;
	}
	if(text3>100){
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
function addEnvironmentalStudies(){
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
	
	if(text1>100){
		document.getElementById("txtEnvStuSocKnow").value=100;
	}
	if(text2>100){
		document.getElementById("txtEnvStuNatuEnvKnow").value=100;
	}
	if(text3>100){
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
function addHolisticDevelopment(){
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
	if(text1>100){
		document.getElementById("txtHoliDevGenKnow").value=100;
	}
	if(text2>100){
		document.getElementById("txtHoliDevPartInActive").value=100;
	}
	if(text3>100){
		document.getElementById("txtHoliDevSociability").value=100;
	}
	if(text4>100){
		document.getElementById("txtHoliDevLeaderQuality").value=100;
	}
	if(text5>100){
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
		var studName = document.getElementById("selNameOfStudent").value;
		if(studName=='')
		{
			alert("Please Select Child Name");
			document.getElementById("selNameOfStudent").focus;
			return false;
		}

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
$(document).ready(function(){
	$("#txtDtOfRegInSchool").datepicker({
		dateFormat: 'dd/mm/yy',
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
			<h1 style="color:#ffffff; text-align:center;">ASHA KIRAN CHILDREN MARKS ENTRY SCREEN</h1>
            <font color="#F4F3F3" style="float:right;">Home -> Transaction -> Marks Entry</font>
		</div>
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
    
		  <div class="container" style="position: relative; left: 150px;">
			<form class="form-horizontal" name="frm" id="frm" onsubmit="return dateCheck(document.frm.txtDtOfRegInSchool);" action="ashakirnchildrenmarksentrysave.php" method="post" enctype="multipart/form-data">
				<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;"><b>Master Information</b></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				   <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Month:</label>
						  <input type="text" class="form-control" id="selMonth" readonly name="selMonth" value="<?php echo $_SESSION['selmonth']; ?>"  />	
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Year:</label>
					  <input type="text" class="form-control" id="selYear" readonly name="selYear" value="<?php echo $_SESSION['selyear']; ?>"  />
						<?php
							$mon=$_SESSION['selmonth'];
							$yer=$_SESSION['selyear'];
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
						
						$lastday=31; /* checking */
						$query = "select centreteacher,projcoordinator,monname,year from tbl_Asha_Kirn_Children_Marks_Dtl where marksIDpk=(select max(marksIDpk) from tbl_Asha_Kirn_Children_Marks_Dtl where create_by = '" . $_SESSION['username'] ."' AND monname = '" . $_SESSION['selmonth'] ."' AND year = '" . $_SESSION['selyear'] ."')";
						
						//AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl) city='Madhabpur' AND 
						$result = mysql_query($query);
						while($row = mysql_fetch_assoc($result))
							{
								extract($row);
							}
						if($result)
						{
							$noofday = "Select noofworkingdays,lastday from tbl_utility where monthname='" . $_SESSION['selmonth'] ."'";
							$resNoofDays = mysql_query($noofday);
							while($row1 = mysql_fetch_assoc($resNoofDays))
							{
								extract($row1);
								/* checking */
								$lastday=$row1["lastday"];
							}
							//echo date('d');
							if (intval(date('d')) > intval($lastday)) {
								//header('Location: http://rotaryteach.org/childdevelopment/error.php');
							}
							/* checking */
							if($resNoofDays)
							{
						?>
						 
						  <div class="form-group">
							<label class="control-label col-sm-3" ></label>
							<div class="col-sm-8"> 
							  <label for="exampleInputFile">Name of Project Coordinator:</label>
							  <input type="text" class="form-control" id="txtProjCoOrdinator" name="txtProjCoOrdinator" value="<?php echo $projcoordinator; ?>"   />	
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
					  <input type="text" class="form-control" id="txtNoOfWorkinDays" readonly value="<?php echo $noofworkingdays; ?>" name="txtNoOfWorkinDays" maxlength="2" onkeyup="perAttendance();" onkeypress="return IsNumeric20(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error20" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <?php
					}
						}
					?>	
				</div>
<!--				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Student Id:</label>
					  <input type="text" class="form-control" id="txtStudentID" readonly name="txtStudentID"  />	
					</div>
				  </div> -->
				  <div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;"><b>Enter Details Of Marks Obtained By Students In Your Center</b></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="get_children_name" class="col-sm-8"> 
					  <label for="exampleInputFile">Name of Student:</label>
<!--					  <select class="form-control" id="selNameOfStudent" name="selNameOfStudent">
						<option value="-1">Select Children</option>
						</select> -->
					<?php
						
						/*
						if($_SESSION['type']=='NGO')
						{
							$centerid=$_SESSION['uid'];
						}
						if($_SESSION['type']=='center')
						{
							$centerid=$_SESSION['uid'];
						}
						$createby=$_SESSION['username'];
						
						$query = "select child_id,child_name,child_father_name from tbl_child_profile_card where create_by='".$createby."' AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl where monname='" . $_SESSION['selmonth'] ."' and year='" . $_SESSION['selyear'] ."') order by child_name";
						
						*/

						$createby=$_SESSION['username'];
						if($_SESSION['type']=='NGO')
						{
							$centerid = $_SESSION['centerid'];

							$query = "select child_id,child_name,child_father_name from tbl_child_profile_card where create_by='".$createby."' AND centerid='". $centerid ."' AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl where create_by='".$createby."' and monname='" . $_SESSION['selmonth'] ."' and year='" . $_SESSION['selyear'] ."') order by child_name";
							$result = mysql_query($query);
							if($result)
							{
								echo "<select class='form-control' id='selNameOfStudent' name='selNameOfStudent'>";
								
								while($row = mysql_fetch_assoc($result))
								{
									echo '<option value="'.$row["child_id"].'">'.$row["child_name"].'&nbsp;&nbsp;----->&nbsp;&nbsp;'.$row["child_father_name"].'</option>';
									
								}	
								echo "</select>";
							}

						}
						else if($_SESSION['type']=='center')
						{
							$centerid = $_SESSION['uid'];
							
							$username="(select username from tbl_admin where id=(select idfk from tbl_admin where id='".$centerid."'))";

							$query = "select child_id,child_name,child_father_name from tbl_child_profile_card where create_by=$username AND centerid='". $centerid ."' AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl where create_by=$username and monname='" . $_SESSION['selmonth'] ."' and year='" . $_SESSION['selyear'] ."') order by child_name";


							$result = mysql_query($query);
							if($result)
							{
								echo "<select class='form-control' id='selNameOfStudent' name='selNameOfStudent'>";
								
								while($row = mysql_fetch_assoc($result))
								{
									echo '<option value="'.$row["child_id"].'">'.$row["child_name"].'&nbsp;&nbsp;----->&nbsp;&nbsp;'.$row["child_father_name"].'</option>';
									
								}	
								echo "</select>";
							}

						}



						//$query = "select child_id,child_name from tbl_child_profile_card where create_by='".$createby."' and centerid='". $centerid ."' AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl where monname='" . $_SESSION['selmonth'] ."' and year='" . $_SESSION['selyear'] ."') order by child_name";

						//echo $query;
						//$query = "select child_id,child_name from tbl_child_profile_card where create_by='". $_SESSION['username'] ."' AND status='1' AND child_id NOT IN (SELECT stud_id FROM tbl_Asha_Kirn_Children_Marks_Dtl where monname='" . $_SESSION['selmonth'] ."' and year='" . $_SESSION['selyear'] ."') order by child_name";
						//AND child_id NOT IN (SELECT child_id FROM tbl_Asha_Kirn_Children_Marks_Dtl)

						/*
						$result = mysql_query($query);
						if($result)
						{
							echo "<select class='form-control' id='selNameOfStudent' name='selNameOfStudent'>";
							
							while($row = mysql_fetch_assoc($result))
							{
								echo '<option value="'.$row["child_id"].'">'.$row["child_name"].'&nbsp;&nbsp;----->&nbsp;&nbsp;'.$row["child_father_name"].'</option>';
								
							}	
							echo "</select>";
						}
						*/
						?>	
					</div>
				  </div>

				  <div class="form-group">
					<label class="control-label col-sm-3"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Present Educational Status:</label>
						<select class="form-control" id="selPresentEduStatus" name="selPresentEduStatus" onchange="evsHide(this.value);" required>
                                    <option value="-1">Select Class</option>
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
					  <input type="text" class="form-control" name="txtTotalNoOfDaysAtten" maxlength="2" id="txtTotalNoOfDaysAtten" onblur="noDayAtten();" onkeyup="perAttendance();" onkeypress="return IsNumeric21(event);" ondrop="return false;" onpaste="return false;" required/>
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
			
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;"><b>Marks Obtained In Local Language</b></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
					  <input type="text" class="form-control" name="txtLLListeningSkill" id="txtLLListeningSkill" onblur="addLocalLanguage();" onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required/>
					  <span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <input type="text" class="form-control" name="txtLLSpeakingSkill" id="txtLLSpeakingSkill" onblur="addLocalLanguage();" onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required />
					  <span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label><br/>
					    <input type="text" class="form-control" name="txtLLReadingSkill" id="txtLLReadingSkill" onblur="addLocalLanguage();" onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required />
					  <span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label><br/>
					    <input type="text" class="form-control" name="txtLLWritingSkill" id="txtLLWritingSkill" onblur="addLocalLanguage();" onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" maxlength="3" required />
					  <span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label><br/> -->
						<label for="exampleInputFile">Percentage:</label><br/>
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
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reason:</label><br/>
						<textarea class="form-control" rows="5" id="txtLLResion" name="txtLLResion" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Decision:</label><br/>
					    <textarea class="form-control" rows="5" id="txtLLDecision" name="txtLLDecision" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  
				 </div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; "><b>Marks Obtained In English</b></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Listening Skill:</label>
					  <input type="text" class="form-control" name="txtEngListeningSkill" id="txtEngListeningSkill" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Speaking Skill:</label>
					  <input type="text" class="form-control" name="txtEngSpeakingSkill" id="txtEngSpeakingSkill" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reading Skill:</label><br/>
					    <input type="text" class="form-control" name="txtEngReadingSkill" id="txtEngReadingSkill" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Writing Skill:</label><br/>
					    <input type="text" class="form-control" name="txtEngWritingSkill" id="txtEngWritingSkill" maxlength='3' onblur="addEnglish();" onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label><br/> -->
					    <label for="exampleInputFile">Percentage:</label><br/>
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
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reason:</label><br/>
						<textarea class="form-control" rows="5" id="txtEngResion" name="txtEngResion" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Decision:</label><br/>
					    <textarea class="form-control" rows="5" id="txtEngDecision" name="txtEngDecision" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  
				  
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; "><b>Marks Obtained In Maths</b></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Progress in Arithmetic:</label>
					  <input type="text" class="form-control" name="txtMathProgressInArth" id="txtMathProgressInArth" maxlength='3' onblur="addMath();" onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Analytical Skill:</label>
					  <input type="text" class="form-control" name="txtMathAnalyticalSkill" id="txtMathAnalyticalSkill" maxlength='3' onblur="addMath();" onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Understanding of Geometrical Shapes & Concept:</label><br/>
					    <input type="text" class="form-control" name="txtMathGeoShap" id="txtMathGeoShap" maxlength='3' onblur="addMath();" onkeypress="return IsNumeric11(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error11" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label><br/> -->
						<label for="exampleInputFile">Percentage:</label><br/>
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
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reason:</label><br/>
						<textarea class="form-control" rows="5" id="txtMathResion" name="txtMathResion" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Decision:</label><br/>
					    <textarea class="form-control" rows="5" id="txtMathDecision" name="txtMathDecision" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  
			</div>
			<div id="evsMaster" class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;"><b>Marks Obtained In Environmental Studies</b></div>
				  <div id="evsChild" class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">	
				  <div id="evsChild1" class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="evsChild1_1" class="col-sm-8"> 
					  <label for="exampleInputFile">Social Knowledge:</label>
					  <input type="text" class="form-control" name="txtEnvStuSocKnow" id="txtEnvStuSocKnow" maxlength='3' onblur="addEnvironmentalStudies();" onkeypress="return IsNumeric12(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error12" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div id="evsChild2" class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div id="evsChild2_1" class="col-sm-8"> 
					  <label for="exampleInputFile">Natural Environmental Knowledge:</label>
					  <input type="text" class="form-control" name="txtEnvStuNatuEnvKnow" id="txtEnvStuNatuEnvKnow" maxlength='3' onblur="addEnvironmentalStudies();" onkeypress="return IsNumeric13(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error13" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div id="evsChild3" class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div id="evsChild3_1" class="col-sm-8">
						<label for="exampleInputFile">Civic Sense:</label><br/>
					    <input type="text" class="form-control" name="txtEnvStuCivicSense" id="txtEnvStuCivicSense" maxlength='3' onblur="addEnvironmentalStudies();" onkeypress="return IsNumeric14(event);" ondrop="return false;" onpaste="return false;" />
					  <span id="error14" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>		  
				  <div id="evsChild4"class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div id="evsChild4_1" class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label><br/> -->
						<label for="exampleInputFile">Percentage:</label><br/>
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
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reason:</label><br/>
						<textarea class="form-control" rows="5" id="txtEnvStuResion" name="txtEnvStuResion" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Decision:</label><br/>
					    <textarea class="form-control" rows="5" id="txtEnvStuDecision" name="txtEnvStuDecision" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;"><b>Marks Obtained In Holistic Development</b></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				<div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">General Knowledge:</label>
					  <input type="text" class="form-control" name="txtHoliDevGenKnow" id="txtHoliDevGenKnow" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric15(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error15" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Participation In Activities:</label>
					  <input type="text" class="form-control" name="txtHoliDevPartInActive" id="txtHoliDevPartInActive" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric16(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error16" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Sociability:</label><br/>
					    <input type="text" class="form-control" name="txtHoliDevSociability" id="txtHoliDevSociability" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric17(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error17" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Leadership Quality:</label>
					  <input type="text" class="form-control" name="txtHoliDevLeaderQuality" id="txtHoliDevLeaderQuality" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric18(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error18" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="pwd"></label>
					<div class="col-sm-8"> 
					  <label for="exampleInputFile">Health And Hygiene:</label>
					  <input type="text" class="form-control" name="txtHoliDevHealthHyg" id="txtHoliDevHealthHyg" maxlength='3' onblur="addHolisticDevelopment();" onkeypress="return IsNumeric19(event);" ondrop="return false;" onpaste="return false;" required />
					  <span id="error19" style="color: Red; display: none">* Input digits (0 - 9)</span>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<!-- <label for="exampleInputFile">Aggregate:</label><br/> -->
						<label for="exampleInputFile">Percentage:</label><br/>
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
				   <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Reason:</label><br/>
						<textarea class="form-control" rows="5" id="txtHoliDevResion" name="txtHoliDevResion" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Decision:</label><br/>
					    <textarea class="form-control" rows="5" id="txtHoliDevDecision" name="txtHoliDevDecision" maxlength='100'></textarea>
						<em>(Maximum 100 Character)</em>
					</div>
				  </div>
				 
			</div>
			<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; "><b>Regularization Details</b></div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group">
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
						<label for="exampleInputFile">Date of Regularization in School:</label><br/>
					    <input type="text" class="form-control" name="txtDtOfRegInSchool" id="txtDtOfRegInSchool" onkeypress="return restrictCharacters(event);" />*(dd/mm/yyyy)
					</div>
				  </div>
				  
				  
				  <div class="form-group"> 
					<label class="control-label col-sm-3" for="email"></label>
					<div class="col-sm-8">
					  <button type="submit" class="btn" name="submit" style="color: #ffffff; background-color: #003c6a;">Submit</button>
					</div>
				  </div>
				  
				 </div>
			
			</form>
			
		  </div>
      </div>
    </div>
	<br/>
    <!-- Wrapper End --> 
	<?php include('include/footer.php'); ?>
  </div>

</body>
</html>
