<?php
session_start();
ob_start();
include('include/config.php');
$userid=$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprehensive School Survey Form</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
 
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
    $("#txteLearningWhen").datepicker({ dateFormat: 'dd/mm/yy',
											changeMonth: true,
											changeYear: true,
											maxDate: 0,
											minDate: new Date(2017, 0, 9)
										});
  });

$(document).on('keyup keypress', 'form input[type="text"]', function(e) {
  if(e.keyCode == 13) {
    e.preventDefault();
    return false;
  }
});
 </script>
  
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:60px;
		 background-color:#32343b;
		}
		.help {
    display:none;
    font-size:90%;
}
input:focus + .help {
    display:inline-block;
}
</style>


  


<script type="text/javascript">
	var url;

function showDistrict(str) {
	//alert("test");
	//var textHolderDistrict = ddMember.options[ddMember.selectedIndex].text
	//document.getElementById("txtMemberName").value = textHolderDistrict;
	
	if(str=="Rotaract")
	{
		document.getElementById("ddClub").style.display = "none";
		document.getElementById("txtClub").style.display = "block";
	}
	else
	{
		document.getElementById("ddClub").style.display = "block";
		document.getElementById("txtClub").style.display = "none";
	}
	
    if (str == "") {
        document.getElementById("ddDistrict").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ddDistrict").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_district_list.php?q="+str,true);
        xmlhttp.send();
    }
}

function showClub(str)
{
	//var textHolderClub = ddDistrict.options[ddDistrict.selectedIndex].text
	//document.getElementById("txtDistrictName").value = textHolderClub;
	
	if (str == "") {
        document.getElementById("ddClub").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ddClub").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_club_list.php?q="+str,true);
        xmlhttp.send();
    }
}
function schoolMgm1(){
		document.getElementById("idA1").style.display="block";
		document.getElementById("idA2").style.display="block";	
		document.getElementById("idB1").style.display="none";
		document.getElementById("idB2").style.display="none";	
		document.getElementById("idC1").style.display="block";
		document.getElementById("idC2").style.display="block";
}
function schoolMgm2(){
		document.getElementById("idA1").style.display="none";
		document.getElementById("idA2").style.display="none";	
		document.getElementById("idB1").style.display="block";
		document.getElementById("idB2").style.display="block";	
		document.getElementById("idC1").style.display="none";
		document.getElementById("idC2").style.display="none";
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

//3rd for 
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

//13
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
function IsNumeric22(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error22").style.display = ret ? "none" : "inline";
			return ret;
		}			

function IsNumeric23(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error23").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric24(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error24").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric25(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error25").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric26(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error26").style.display = ret ? "none" : "inline";
			return ret;
		}		
function IsNumeric27(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error27").style.display = ret ? "none" : "inline";
			return ret;
		}			
function IsNumeric28(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error28").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric29(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error29").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric30(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error30").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric31(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error31").style.display = ret ? "none" : "inline";
			return ret;
		}		
function IsNumeric32(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error32").style.display = ret ? "none" : "inline";
			return ret;
		}			
function IsNumeric33(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error33").style.display = ret ? "none" : "inline";
			return ret;
		}		
function IsNumeric34(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error34").style.display = ret ? "none" : "inline";
			return ret;
		}			
function IsNumeric201(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error201").style.display = ret ? "none" : "inline";
			return ret;
		}			
		
function showToiletBoys1(){
		//alert("test");
		document.getElementById("idA11").style.display="block";
}
function showToiletBoys2(){
		//txtBoysFunctional,txtBoysNonFunctional,txtTotalBoys
		document.getElementById("txtBoysFunctional").value="0";
		document.getElementById("txtBoysNonFunctional").value="0";
		document.getElementById("txtTotalBoys").value="0";
		document.getElementById("idA11").style.display="none";
}
/*
function add1(){
					var x = document.getElementById("txtBoysFunctional").value;
					var y = document.getElementById("txtBoysNonFunctional").value;
					var z = parseInt(x) + parseInt(y);
					document.getElementById("txtTotalBoys").value = z;
					
				}
*/				
function showToiletGirls1(){
		document.getElementById("idB11").style.display="block";
}
function showToiletGirls2(){
	//txtGirlsFunctional, txtGirlsNonFunctional, txtTotalGirls
		document.getElementById("txtGirlsFunctional").value="0";
		document.getElementById("txtGirlsNonFunctional").value="0";
		document.getElementById("txtTotalGirls").value="0";
		document.getElementById("idB11").style.display="none";
}
function showToiletTeacher1(){
		document.getElementById("idC11").style.display="block";
}
function showToiletTeacher2(){
	//txtTeacherFunctional,txtTeacherNonFunctional,txtTotalTeachers
		document.getElementById("txtTeacherFunctional").value="0";
		document.getElementById("txtTeacherNonFunctional").value="0";
		document.getElementById("txtTotalTeachers").value="0";
		document.getElementById("idC11").style.display="none";
}
function showWashStation1(){
		document.getElementById("idWashStation").style.display="block";
}
function showWashStation2(){
		document.getElementById("idWashStation").style.display="none";
}

function showLibBooks1(){
		document.getElementById("idlibBooks").style.display="block";
}
function showLibBooks2(){
		document.getElementById("idlibBooks").style.display="none";
}

function showBenches1(){
	document.getElementById("idAviBanches").style.display="block";	
}

function showBenches2(){
	document.getElementById("idAviBanches").style.display="none";
	document.getElementById("txtTotalBenches").value="0";
	
	
}
function showDesks1(){
	document.getElementById("idAviDesks").style.display="block";	
}

function showDesks2(){
	document.getElementById("idAviDesks").style.display="none";
	document.getElementById("txtTotalDesks").value="0";
	
}


function showheadTeacher1(){
		document.getElementById("idheadTeacher").style.display="block";
}
function showheadTeacher2(){
		document.getElementById("idheadTeacher").style.display="none";
}

function showStores1(){
		document.getElementById("idStroes").style.display="block";
}
function showStores2(){
		document.getElementById("idStroes").style.display="none";
}
function showlaboratory1(){
		document.getElementById("idLaboratory").style.display="block";
}
function showlaboratory2(){
		document.getElementById("idLaboratory").style.display="none";
}
function showKitchen1(){
		document.getElementById("idKitchen").style.display="block";
}
function showKitchen2(){
		document.getElementById("idKitchen").style.display="none";
}
function showIndoorGames1(){
		document.getElementById("idIndoorGames").style.display="block";
}
function showIndoorGames2(){
		document.getElementById("idIndoorGames").style.display="none";
}
function showStaffRoom1(){
		document.getElementById("idStaffRoom").style.display="block";
}
function showStaffRoom2(){
		document.getElementById("idStaffRoom").style.display="none";
}
function showeLearning1(){
		document.getElementById("ideLearning").style.display="block";
}
function showeLearning2(){
		document.getElementById("ideLearning").style.display="none";
}		
//		
function showOther5()
{
	document.getElementById("idpeTeacher").style.display="none";
	document.getElementById("peTeacherID1").style.display="none";
	document.getElementById("peTeacherID2").style.display="none";
	document.getElementById("peTeacherID2").value="0";
	document.getElementById("txtpeOther").value="0";
}
function showOther6()
{
	document.getElementById("idpeTeacher").style.display="none";
	document.getElementById("peTeacherID1").style.display="block";
	document.getElementById("peTeacherID2").style.display="block";
}

function showOther7()
{
	document.getElementById("peTeacherID1").style.display="block";
	document.getElementById("peTeacherID2").style.display="block";
	document.getElementById("idpeTeacher").style.display="block";
}

function checkEmail(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
    alert("Please enter a valid email address");
}		

function checkEmail1(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
    alert("Please enter a valid email address");
}


/*
function showDiv(str)
{
	
	//alert(str);
	
	if(str=='two')
	{
		//alert("rajesh");
		var checked = false;
		radios = document.getElementsByName('areyoua');
			for (var i = 0, radio; radio = radios[i]; i++) {
			if (radio.checked) {
				checked = true;
				break;
			}
		}

	if (!checked) {
		alert("Please select your identity");
		radios.focus();
		return false;
	}
	if(document.getElementById('ddDistrict').value=='')
	{
		alert("Please select district");
		return false;
	}
	
	if(document.getElementById('txtPhoneNo').value=='')
	{
		alert("Please input Phone No");
		return false;
	}
	if(document.getElementById('txtPersonName').value=='')
	{
		alert("Please input name");
		return false;
	}
	if(document.getElementById('txtAddress').value=='')
	{
		alert("Please input Address");
		return false;
	}
	if(document.getElementById('txtEmailID').value=='')
	{
		alert("Please input email id");
		return false;
	}
		document.getElementById("sumitone").style.display="none";
		document.getElementById("sumittwo").style.display="block";
		document.getElementById("sumitthree").style.display="none";
		document.getElementById("sumitfour").style.display="none";
		document.getElementById("sumitfive").style.display="none";
	return true;	
	}
	if(str=='three')
	{
		
		if(document.getElementById('txtSchoolName').value=='')
		{
			alert("Please input School Name");
			return false;
		}
		if(document.getElementById('txtudiseno').value=='')
		{
			alert("Please input UDISENO");
			return false;
		}
		if(document.getElementById('txtSchoolHead').value=='')
		{
			alert("Please input Head Teacher/Principal Name");
			return false;
		}
		
		if(document.getElementById('txtSchoolPhoneNo').value=='')
		{
			alert("Please input School Phone No");
			return false;
		}
		if(document.getElementById('txtSchoolEmailID').value=='')
		{
			alert("Please input school email id");
			return false;
		}
		if(document.getElementById('txtSchoolAddress').value=='')
		{
			alert("Please input School Address");
			return false;
		}
		if(document.getElementById('txtSchoolState').value=='')
		{
			alert("Please input School State");
			return false;
		}
		if(document.getElementById('txtSchoolPin').value=='')
		{
			alert("Please input School Pin No.");
			return false;
		}
		
		if(document.getElementById('mySelect').value=='-1')
		{
			alert("Please select Language");
			return false;
		}
		document.getElementById("sumitone").style.display="none";
		document.getElementById("sumittwo").style.display="none";
		document.getElementById("sumitthree").style.display="block";
		document.getElementById("sumitfour").style.display="none";
		document.getElementById("sumitfive").style.display="none";
	}
	if(str=='four')
	{
		var checked = false;
		radios = document.getElementsByName('schooltype');
			for (var i = 0, radio; radio = radios[i]; i++) {
			if (radio.checked) {
				checked = true;
				break;
			}
		}

		if (!checked) {
			alert("Please select Type of School");
			radios.focus();
			return false;
		}
		//schoolTypeGirls,schoolTypeBoys,schoolTypeCoEdu
		var rates = document.getElementsByName('schooltype');
		var rate_value;
		for(var i = 0; i < rates.length; i++){
			if(rates[i].checked){
				rate_value = rates[i].value;
			}
		}
		if(rate_value=="Girls")
		{
			if(document.getElementById('txtNoOfGirls').value==0)
			{
				alert("Please input the value for no of girls");
				return false;
			}

			if(document.getElementById("chk_diff_abled_female").checked)
			{
				document.getElementById('txtNoDisabilityFemale').value="0";
			}
			else
			{
				if(document.getElementById('txtNoDisabilityFemale').value==0)
				{
					alert("Please input the value for no of differently abled female students");
					return false;
				}
			}				
		}
		if(rate_value=="Boys")
		{
			if(document.getElementById('txtNoOfBoys').value==0)
			{
				alert("Please input the value for no of boys");
				return false;
			}

			if(document.getElementById("chk_diff_abled_male").checked)
			{
				document.getElementById('txtNoDisabilityMale').value="0";
			}
			else
			{
				if(document.getElementById('txtNoDisabilityMale').value==0)
				{
					alert("Please input the value for no of differently abled male students");
					return false;
				}
			}
		}
		if(rate_value=="Co-Educational")
		{
			if(document.getElementById('txtNoOfGirls').value==0)
			{
				alert("Please input the value for no of girls");
				return false;
			}
			if(document.getElementById('txtNoOfBoys').value==0)
			{
				alert("Please input the value for no of boys");
				return false;
			}
		//female
			if(document.getElementById("chk_diff_abled_female").checked)
			{
				document.getElementById('txtNoDisabilityFemale').value="0";
			}
			else
			{
				if(document.getElementById('txtNoDisabilityFemale').value==0)
				{
					alert("Please input the value for no of differently abled female students");
					return false;
				}
			}
		//male
			if(document.getElementById("chk_diff_abled_male").checked)
			{
				document.getElementById('txtNoDisabilityMale').value="0";
			}
			else
			{
				if(document.getElementById('txtNoDisabilityMale').value==0)
				{
					alert("Please input the value for no of differently abled male students");
					return false;
				}
			}
		}
	
	if(document.getElementById("not_aval_male_teacher").checked)
	{
		document.getElementById('txtMale').value="0";
	}
	else
	{
		if(document.getElementById('txtMale').value==0)
		{
			alert("Please input the value for No. of male Teachers");
			return false;
		}
	}
	
	if(document.getElementById("not_aval_female_teacher").checked)
	{
		document.getElementById('txtFemale').value="0";
	}
	else
	{
		if(document.getElementById('txtFemale').value==0)
		{
			alert("Please input the value for No. of female Teachers");
			return false;
		}
	}
	
	if(document.getElementById("not_aval_trained_male_teacher").checked)
	{
		document.getElementById('txtTrainedMaleTeacher').value="0";
		
	}
	else
	{
		if(document.getElementById('txtTrainedMaleTeacher').value==0)
		{
			alert("Please input the value for No. of Trained Male Teacher");
			return false;
		}
	}
	
	if(document.getElementById("not_aval_trained_female_teacher").checked)
	{
		document.getElementById('txtTrainedFemaleTeacher').value="0";
	}
	else
	{
		if(document.getElementById('txtTrainedFemaleTeacher').value==0)
		{
			alert("Please input the value for No. of Trained Female Teacher");
			return false;
		}
	}
		document.getElementById("sumitone").style.display="none";
		document.getElementById("sumittwo").style.display="none";
		document.getElementById("sumitthree").style.display="none";
		document.getElementById("sumitfour").style.display="block";
		document.getElementById("sumitfive").style.display="none";
	}
	
	if(str=='five')
	{
		//txtFootwear,txtSchoolBag,txtUniform,txtTotalBenches,txtTotalDesks
		
		if(document.getElementById('txtFootwear').value==0)
			{
				alert("Please input the Footwear Percentage");
				return false;
			}
		if(document.getElementById('txtSchoolBag').value==0)
			{
				alert("Please input the School Bag Percentage");
				return false;
			}
		if(document.getElementById('txtUniform').value==0)
			{
				alert("Please input the Uniform Percentage");
				return false;
			}
		
		document.getElementById("sumitone").style.display="none";
		document.getElementById("sumittwo").style.display="none";
		document.getElementById("sumitthree").style.display="none";
		document.getElementById("sumitfour").style.display="none";
		document.getElementById("sumitfive").style.display="block";
	}
}

*/

function showMaleTeacherNotAval(chkOther)
{
	if(document.getElementById("not_aval_male_teacher").checked)
	{
		document.getElementById('txtMale').value="0";
		document.getElementById('txtMale').readOnly=true;
		document.getElementById('txtTotalTeacher').value="0";
		
	}
	else
	{
		document.getElementById('txtMale').value="0";
		document.getElementById('txtMale').readOnly=false;
		document.getElementById('txtTotalTeacher').value="0";
	}

}

function showFemaleTeacherNotAval(chkOther)
{
	if(document.getElementById("not_aval_female_teacher").checked)
	{
		document.getElementById('txtFemale').value="0";
		document.getElementById('txtFemale').readOnly=true;
		document.getElementById('txtTotalTeacher').value="0";
	}
	else
	{
		document.getElementById('txtFemale').value="0";
		document.getElementById('txtFemale').readOnly=false;
		document.getElementById('txtTotalTeacher').value="0";
	}

}
//showTrainedMaleTeacherNotAval
function showTrainedMaleTeacherNotAval(chkOther)
{
	if(document.getElementById("not_aval_trained_male_teacher").checked)
	{
		document.getElementById('txtTrainedMaleTeacher').value="0";
		document.getElementById('txtTrainedMaleTeacher').readOnly=true;
		document.getElementById('txtTotalTrainedTeacher').value="0";
	}
	else
	{
		document.getElementById('txtTrainedMaleTeacher').value="0";
		document.getElementById('txtTrainedMaleTeacher').readOnly=false;
		document.getElementById('txtTotalTrainedTeacher').value="0";
	}

}

function showTrainedFemaleTeacherNotAval(chkOther)
{
	if(document.getElementById("not_aval_trained_female_teacher").checked)
	{
		document.getElementById('txtTrainedFemaleTeacher').value="0";
		document.getElementById('txtTrainedFemaleTeacher').readOnly=true;
		document.getElementById('txtTotalTrainedTeacher').value="0";
		
	}
	else
	{
		document.getElementById('txtTrainedFemaleTeacher').value="0";
		document.getElementById('txtTrainedFemaleTeacher').readOnly=false;
		document.getElementById('txtTotalTrainedTeacher').value="0";
	}

}

function showChk_diff_abled_male(chkOther)
{
	if(document.getElementById("chk_diff_abled_male").checked)
	{
		document.getElementById('txtNoDisabilityMale').value="0";
		document.getElementById('txtTotalDisability').value="0";
		document.getElementById('txtNoDisabilityMale').readOnly=true;
		
	}
	else
	{
		document.getElementById('txtNoDisabilityMale').value="0";
		document.getElementById('txtTotalDisability').value="0";
		document.getElementById('txtNoDisabilityMale').readOnly=false;
	}

}	

function showChk_diff_abled_female(chkOther)
{
	if(document.getElementById("chk_diff_abled_female").checked)
	{
		document.getElementById('txtNoDisabilityFemale').value="0";
		document.getElementById('txtTotalDisability').value="0";
		document.getElementById('txtNoDisabilityFemale').readOnly=true;
		
	}
	else
	{
		document.getElementById('txtNoDisabilityFemale').value="0";
		document.getElementById('txtTotalDisability').value="0";
		document.getElementById('txtNoDisabilityFemale').readOnly=false;
	}

}	

function finalValidate()
{
	//alert("testtest"); 
	var status_PE = false;
	if(document.getElementById("NonePE").checked)
	{
		status_PE = false;
		//alert("test1"); 
	}
	else if(document.getElementById("OnePE").checked)
	{
		status_PE = true;
		//alert("test2"); 
	}
	else if(document.getElementById("onetwoPE").checked)
	{
		status_PE = true;
		//alert("test3"); 
	}
	else if(document.getElementById("OtherPE").checked)
	{
		status_PE = true;
		//alert("test4"); 
	}
	//
	if(status_PE)
	{
		//alert("statuschk");
		var checkboxsQualification=document.getElementsByName("edu_qua_peTeacher[]");
		var okay1=false;
		for(var i=0,l=checkboxsQualification.length;i<l;i++)
		{
			if(checkboxsQualification[i].checked)
			{
				okay1=true;
				break;
			}
		}
		if(okay1)
		{
		}
		else {
			alert("Please select your educational qualification");
			return false;
		}
		
	}
		
				var checkboxssportPlayed=document.getElementsByName("sportPlayed[]");
				var okay=false;
				for(var i=0,l=checkboxssportPlayed.length;i<l;i++)
				{
					if(checkboxssportPlayed[i].checked)
					{
						okay=true;
						break;
					}
				}
				if(okay)
				{
					//sportInfra
						var checkboxssportInfra=document.getElementsByName("sportInfra[]");
						var okay=false;
						for(var i=0,l=checkboxssportInfra.length;i<l;i++)
						{
							if(checkboxssportInfra[i].checked)
							{
								okay=true;
								break;
							}
						}
						if(okay)
						{
							//promotPED
								var checkboxspromotPED=document.getElementsByName("promotPED[]");
								var okay=false;
								for(var i=0,l=checkboxspromotPED.length;i<l;i++)
								{
									if(checkboxspromotPED[i].checked)
									{
										okay=true;
										break;
									}
								}
								if(okay)
								{
									//sportfund
										var checkboxsportfund=document.getElementsByName("sportfund[]");
										var okay=false;
										for(var i=0,l=checkboxsportfund.length;i<l;i++)
										{
											if(checkboxsportfund[i].checked)
											{
												okay=true;
												break;
											}
										}
										if(okay)
										{
											//sportfund
											
											
										}
										else {
											alert("Please select Who fund sport activities in schools ? ");
											return false;
										}
								//
									
								}
								else {
									alert("Please select Select the major challenges faced in promoting PED in school ? ");
									return false;
								}
							//
						}
						else {
							alert("Please select What sports infrastructure available at the school ? ");
							return false;
						}
					//
					
				}
				else {
					alert("Please select What sports are played in the school? ");
					return false;
				}
}

function percentChk1(val)
{
	//alert("test");
	if(val>= 0 && val<=100)
	{
		//alert("true");
	}
	else{
		alert("Plese insert the value between 0 to 100");
		document.getElementById("txtFootwear").value="0";
		document.getElementById("txtFootwear").focus();
	}
}

function percentChk2(val)
{
	//alert("test");
	if(val>= 0 && val<=100)
	{
		//alert("true");
	}
	else{
		alert("Plese insert the value between 0 to 100");
		document.getElementById("txtSchoolBag").value="0";
		document.getElementById("txtSchoolBag").focus();
	}
}

function percentChk3(val)
{
	//alert("test");
	if(val>= 0 && val<=100)
	{
		//alert("true");
	}
	else{
		alert("Plese insert the value between 0 to 100");
		document.getElementById("txtUniform").value="0";
		document.getElementById("txtUniform").focus();
	}
}


   
function showBack(str)
{
	//alert(str);
	if(str=='two')
	{
		document.getElementById("sumitone").style.display="block";
		document.getElementById("sumittwo").style.display="none";
		document.getElementById("sumitthree").style.display="none";
		document.getElementById("sumitfour").style.display="none";
		document.getElementById("sumitfive").style.display="none";
	}
	if(str=='three')
	{
		document.getElementById("sumitone").style.display="none";
		document.getElementById("sumittwo").style.display="block";
		document.getElementById("sumitthree").style.display="none";
		document.getElementById("sumitfour").style.display="none";
		document.getElementById("sumitfive").style.display="none";
	}
	if(str=='four')
	{
		document.getElementById("sumitone").style.display="none";
		document.getElementById("sumittwo").style.display="none";
		document.getElementById("sumitthree").style.display="block";
		document.getElementById("sumitfour").style.display="none";
		document.getElementById("sumitfive").style.display="none";
	}
	if(str=='five')
	{
		document.getElementById("sumitone").style.display="none";
		document.getElementById("sumittwo").style.display="none";
		document.getElementById("sumitthree").style.display="none";
		document.getElementById("sumitfour").style.display="block";
		document.getElementById("sumitfive").style.display="none";
	}
}
function showOthersInstruction() {
    var x = document.getElementById("mySelect").value;
	if(x=='Others')
	{
		document.getElementById("idOther").style.display="block";
		document.getElementById("idOthertxt").style.display="block";
		
	}
		
	else
	{
		document.getElementById("idOther").style.display="none";
		document.getElementById("idOthertxt").style.display="none";
	}
		
    //document.getElementById("demo").innerHTML = "You selected: " + x;
}

function showEmailNot(chkOther)
{
	if(document.getElementById("not_aval").checked)
	{
		document.getElementById("txtSchoolEmailID").value="Not Available";
	}
	else 
	{
		document.getElementById("txtSchoolEmailID").value="";
	}	
}

				
function showPeTeacher(chkOther)
{
	if(document.getElementById("chkOther").checked)
	{
		document.getElementById("idPeTeacherOther").style.display="block";
	}
	else 
	{
		document.getElementById("idPeTeacherOther").style.display="none";
	}	
}

function showSportsInfraOther(chkOther)
{
	if(document.getElementById("chkSportsInfraOther").checked)
	{
		document.getElementById("idSportsInfraOther").style.display="block";
	}
	else 
	{
		document.getElementById("idSportsInfraOther").style.display="none";
	}	
}
  
function showSportFund(chkOther)
{
	if(document.getElementById("chkSportFundOther").checked)
	{
		document.getElementById("idSportFundOther").style.display="block";
	}
	else 
	{
		document.getElementById("idSportFundOther").style.display="none";
	}	
}
    
function showPromotPEDOther(chkOther)
{
	if(document.getElementById("chkPromotPEDOther").checked)
	{
		document.getElementById("idpromotPED").style.display="block";
	}
	else 
	{
		document.getElementById("idpromotPED").style.display="none";
	}	
}

function showPescribed1()
{
	document.getElementById("idPeSports").style.display="block";
}
function showPescribed2()
{
	document.getElementById("idPeSports").style.display="none";
	document.getElementById("txtPeSports").value="0";
	
}

showSportsOpinion2 /txtSportsOpinion2
function showSportsOpinion1()
{
	document.getElementById("txtSportsOpinion2").readOnly=true;
	document.getElementById("txtSportsOpinion2").value="";
	document.getElementById("txtSportsOpinion1").readOnly=false;
	document.getElementById("txtSportsOpinion1").value="";
}
function showSportsOpinion2()
{
	document.getElementById("txtSportsOpinion1").readOnly=true;
	document.getElementById("txtSportsOpinion1").value="";
	document.getElementById("txtSportsOpinion2").readOnly=false;
	document.getElementById("txtSportsOpinion2").value="";
}

</script>
<script>
													function schoolType1(){
															document.getElementById("txtNoOfGirls").style.display="block";
															document.getElementById("girl").style.display="block";
															
															document.getElementById("txtNoDisabilityFemale").style.display="block";
															document.getElementById("female").style.display="block";
															
															document.getElementById("txtNoDisabilityMale").style.display="none";
															document.getElementById("male").style.display="none";
															
															document.getElementById("txtNoOfBoys").style.display="none";	
															document.getElementById("boy").style.display="none";
															document.getElementById("txtNoOfBoys").style.display="none";
															document.getElementById("boy").style.display="none";
															
															document.getElementById("txtTotalStudent").style.display="none";
															document.getElementById("boygirltotal").style.display="none";
															document.getElementById("txtTotalDisability").style.display="none";
															document.getElementById("malefemaletotal").style.display="none";
															
															document.getElementById('txtNoOfGirls').value=0;
															document.getElementById('txtNoOfBoys').value=0;
															document.getElementById('txtNoDisabilityFemale').value=0;
															document.getElementById('txtNoDisabilityMale').value=0;
															document.getElementById('txtTotalStudent').value=0;
															document.getElementById('txtTotalDisability').value=0;
															
															//toilet for girls open
															
															document.getElementById("tblIDgirls").style.display="block";
															
															//document.getElementById("lbl_toilet_for_girls").style.display="block";
															//document.getElementById("lbl_toilet_for_girls_yes").style.display="block";
															//document.getElementById("inp_toilet_for_girls_yes").style.display="block";
															//document.getElementById("lbl_toilet_for_girls_no").style.display="block";
															//document.getElementById("inp_toilet_for_girls_no").style.display="block";
															//
															//toilet for boys close
															document.getElementById("tblIDboys").style.display="none";
															
															//document.getElementById("lbl_toilet_for_boys").style.display="none";
															//document.getElementById("lbl_toilet_for_boys_yes").style.display="none";
															//document.getElementById("inp_toilet_for_boys_yes").style.display="none";
															//document.getElementById("lbl_toilet_for_boys_no").style.display="none";
															//document.getElementById("inp_toilet_for_boys_no").style.display="none";
															//
															
													}
													function schoolType2(){
															document.getElementById("txtNoOfGirls").style.display="none";
															document.getElementById("girl").style.display="none";
															document.getElementById("txtNoOfBoys").style.display="block";
															document.getElementById("boy").style.display="block";
															document.getElementById("txtNoDisabilityMale").style.display="block";
															document.getElementById("male").style.display="block";
															document.getElementById("txtTotalStudent").style.display="none";
															document.getElementById("boygirltotal").style.display="none";	
															document.getElementById("txtTotalDisability").style.display="none";
															document.getElementById("malefemaletotal").style.display="none";	
															
															document.getElementById("txtNoDisabilityFemale").style.display="none";
															document.getElementById("female").style.display="none";
															document.getElementById('txtNoOfGirls').value=0;
															document.getElementById('txtNoOfBoys').value=0;
															document.getElementById('txtNoDisabilityFemale').value=0;
															document.getElementById('txtNoDisabilityMale').value=0;
															document.getElementById('txtTotalStudent').value=0;
															document.getElementById('txtTotalDisability').value=0;
															
															//toilet for girls close
															document.getElementById("tblIDgirls").style.display="none";
															
															//document.getElementById("lbl_toilet_for_girls").style.display="none";
															//document.getElementById("lbl_toilet_for_girls_yes").style.display="none";
															//document.getElementById("inp_toilet_for_girls_yes").style.display="none";
															//document.getElementById("lbl_toilet_for_girls_no").style.display="none";
															//document.getElementById("inp_toilet_for_girls_no").style.display="none";
															//
															//toilet for boys open
															document.getElementById("tblIDboys").style.display="block";
															//document.getElementById("lbl_toilet_for_boys").style.display="block";
															//document.getElementById("lbl_toilet_for_boys_yes").style.display="block";
															//document.getElementById("inp_toilet_for_boys_yes").style.display="block";
															//document.getElementById("lbl_toilet_for_boys_no").style.display="block";
															//document.getElementById("inp_toilet_for_boys_no").style.display="block";
															//
															
													}
													function schoolType3(){
															document.getElementById("txtNoOfGirls").style.display="block";
															document.getElementById("girl").style.display="block";
															document.getElementById("txtNoOfBoys").style.display="block";
															document.getElementById("boy").style.display="block";															
															document.getElementById("txtTotalStudent").style.display="block";
															document.getElementById("boygirltotal").style.display="block";	
															
															document.getElementById("txtTotalDisability").style.display="block";
															document.getElementById("malefemaletotal").style.display="block";	
															
															document.getElementById("txtNoDisabilityFemale").style.display="block";
															document.getElementById("female").style.display="block";
															document.getElementById("txtNoDisabilityMale").style.display="block";
															document.getElementById("male").style.display="block";
															document.getElementById('txtNoOfGirls').value=0;
															document.getElementById('txtNoOfBoys').value=0;
															document.getElementById('txtNoDisabilityFemale').value=0;
															document.getElementById('txtNoDisabilityMale').value=0;
															document.getElementById('txtTotalStudent').value=0;
															document.getElementById('txtTotalDisability').value=0;
															
															//toilet for girls open
															document.getElementById("tblIDgirls").style.display="block";
															//document.getElementById("lbl_toilet_for_girls").style.display="block";
															//document.getElementById("lbl_toilet_for_girls_yes").style.display="block";
															//document.getElementById("inp_toilet_for_girls_yes").style.display="block";
															//document.getElementById("lbl_toilet_for_girls_no").style.display="block";
															//document.getElementById("inp_toilet_for_girls_no").style.display="block";
															//
															//toilet for boys open
															document.getElementById("tblIDboys").style.display="block";
															
															//document.getElementById("lbl_toilet_for_boys").style.display="block";
															//document.getElementById("lbl_toilet_for_boys_yes").style.display="block";
															//document.getElementById("inp_toilet_for_boys_yes").style.display="block";
															//document.getElementById("lbl_toilet_for_boys_no").style.display="block";
															//document.getElementById("inp_toilet_for_boys_no").style.display="block";
															//
															
															
															
													}
												</script>
<script>
															function add1(){
																if(document.getElementById("txtNoOfGirls").value=="")
																{
																	document.getElementById("txtNoOfGirls").value="0";
																}
																if(document.getElementById("txtNoOfBoys").value=="")
																{
																	document.getElementById("txtNoOfBoys").value="0";
																}
																var x = document.getElementById("txtNoOfGirls").value;
																var y = document.getElementById("txtNoOfBoys").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalStudent").value = z;
																
															}
														</script>
														<script>
															function add2(){
																if(document.getElementById("txtMale").value=="")
																{
																	document.getElementById("txtMale").value="0";
																}
																if(document.getElementById("txtFemale").value=="")
																{
																	document.getElementById("txtFemale").value="0";
																}
																var x = document.getElementById("txtMale").value;
																var y = document.getElementById("txtFemale").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalTeacher").value = z;
																
															}
														</script>
														<script>
															function add3(){
																if(document.getElementById("txtTrainedMaleTeacher").value=="")
																{
																	document.getElementById("txtTrainedMaleTeacher").value="0";
																}
																if(document.getElementById("txtTrainedFemaleTeacher").value=="")
																{
																	document.getElementById("txtTrainedFemaleTeacher").value="0";
																}
																var x = document.getElementById("txtTrainedMaleTeacher").value;
																var y = document.getElementById("txtTrainedFemaleTeacher").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalTrainedTeacher").value = z;
																
															}
														</script>
														<script>
															function add4(){
																if(document.getElementById("txtNoDisabilityMale").value=="")
																{
																	document.getElementById("txtNoDisabilityMale").value="0";
																}
																if(document.getElementById("txtNoDisabilityFemale").value=="")
																{
																	document.getElementById("txtNoDisabilityFemale").value="0";
																}
																var x = document.getElementById("txtNoDisabilityMale").value;
																var y = document.getElementById("txtNoDisabilityFemale").value;
																var z = parseInt(x) + parseInt(y);
																document.getElementById("txtTotalDisability").value = z;
																
															}
														</script>		

<script>
																		function add10(){
																			if(document.getElementById("txtBoysFunctional").value=="")
																			{
																				document.getElementById("txtBoysFunctional").value="0";
																			}
																			
																			var x = document.getElementById("txtBoysFunctional").value;
																			
																			if(document.getElementById("txtBoysNonFunctional").value=="")
																			{
																				document.getElementById("txtBoysNonFunctional").value="0";
																			}
																			var y = document.getElementById("txtBoysNonFunctional").value;
																																					
																				var z = parseInt(x) + parseInt(y);
																				document.getElementById("txtTotalBoys").value = z;
																		}
																	</script>
																	<script>
																		function add20(){
																			if(document.getElementById("txtGirlsFunctional").value=="")
																			{
																				document.getElementById("txtGirlsFunctional").value="0"
																			}
																				var x = document.getElementById("txtGirlsFunctional").value;
																			
																			if(document.getElementById("txtGirlsNonFunctional").value=="")
																			{
																				document.getElementById("txtGirlsNonFunctional").value="0";
																			}
																			
																				var y = document.getElementById("txtGirlsNonFunctional").value;
																																					
																			var z = parseInt(x) + parseInt(y);
																			document.getElementById("txtTotalGirls").value = z;
																			
																		}
																	</script>
																	<script>
																		function add30(){
																			if(document.getElementById("txtTeacherFunctional").value=="")
																			{
																				document.getElementById("txtTeacherFunctional").value="0";
																			}
																			
																				var x = document.getElementById("txtTeacherFunctional").value;
																			
																			if(document.getElementById("txtTeacherNonFunctional").value=="")
																			{
																				document.getElementById("txtTeacherNonFunctional").value="0";
																			}
																			
																				var y = document.getElementById("txtTeacherNonFunctional").value;
																																						
																			var z = parseInt(x) + parseInt(y);
																			document.getElementById("txtTotalTeachers").value = z;
																		}
																		function sumit() {
																			document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=1';
																			document.getElementById("frm").submit();
																			
																		}
																	</script>


<style>
.tooltip1 {
    position: relative;
    display: inline-block;
}

.tooltip1 .tooltiptext {
    visibility: hidden;
    width: 350px;
    background-color: #7c7b7a;
    color: #fff;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 110%;
	
}

.tooltip .tooltiptext::after {
    content: " ";
    position: absolute;
    top: 100%; /* At the bottom of the tooltip */
    left: 50%;
    margin-left: -5px;
    border-color: black transparent transparent transparent;
}
.tooltip1:hover .tooltiptext {
    visibility: visible;
	padding:8px;
}
</style>
<style>
	.errorclass{
		transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
	}
</style>																	
<script>
function showELearn(chkOther)
{
	if(document.getElementById("chkELearnOther").checked)
	{
		document.getElementById("idELearnOther").style.display="block";
	}
	else 
	{
		document.getElementById("idELearnOther").style.display="none";
	}	
}

function finalSubmission()
{
	var len = document.getElementById("txtudiseno").value.length;
	var checked = false;
	radios = document.getElementsByName('schooltype');
		for (var i = 0, radio; radio = radios[i]; i++) {
		if (radio.checked) {
			checked = true;
			break;
		}
	}
	if (!checked) {
		alert("Please select Type of School");
		radios.focus();
		return false;
	}
	
	
	
	if(document.getElementById("txtSchoolName").value=="")
	{
		alert("Please fill School Name");
		//document.getElementById("txtSchoolName").style.boxShadow="0px 0px 25px #ff0000";
		document.getElementById("txtSchoolName").focus();
		return false;
	}
	else if(document.getElementById("txtudiseno").value=="")
	{
		alert("Please fill UDISE No");
		document.getElementById("txtudiseno").focus();
		return false;
	}
	else if(len<11)
	{
		alert("UDISE No. must be exactly 11 digits");
		document.getElementById("txtudiseno").focus();
		return false;
	}
	else if(document.getElementById("txtSchoolHead").value=="")
	{
		alert("Please fill Name of Head Teacher/Principal");
		document.getElementById("txtSchoolHead").focus();
		return false;
	}
	else if(document.getElementById("txtSchoolPhoneNo").value=="")
	{
		alert("Please fill School Phone No.");
		document.getElementById("txtSchoolPhoneNo").focus();
		return false;
	}
	else if(document.getElementById("txtDistrict").value=="")
	{
		alert("Please fill District");
		document.getElementById("txtDistrict").focus();
		return false;
	}
	else if(document.getElementById("txtTehsil").value=="")
	{
		alert("Please fill Tehsil");
		document.getElementById("txtTehsil").focus();
		return false;
	}
	else if(document.getElementById("txtSchoolVillage").value=="")
	{
		alert("Please fill Village");
		document.getElementById("txtSchoolVillage").focus();
		return false;
	}
	else if(document.getElementById("txtSchoolPin").value=="")
	{
		alert("Please fill Pin No");
		document.getElementById("txtSchoolPin").focus();
		return false;
	}
	
	else if(document.getElementById('schoolTypeGirls').checked)
	{
		var cnt=0;
		if(document.getElementById("txtNoOfGirls").value=="0")
		{
			cnt=1;
			alert("Enter Number of Girl Students");
			document.getElementById("txtNoOfGirls").focus();
			return false;
		}
		else if(document.getElementById("eLearning_yes").checked)
		{
			cnt=1;
			var chkElearnning=document.getElementsByName("chkELearn[]");
			var okay=false;
			for(var i=0,l=chkElearnning.length;i<l;i++)
			{
				if(chkElearnning[i].checked)
				{
					okay=true;
					break;
				}
			}
			if(okay)
			{
				//sportInfra
				if(document.getElementById("txteLearning").value=="0")
				{
					alert("Please fill e-learning functional units :");
					document.getElementById("txteLearning").focus();
					return false;
				}
				else if(document.getElementById("txteLearningWhen").value==" ")
				{
					alert("When was e-learning facility installed");
					document.getElementById("txteLearningWhen").focus();
					return false;
				}
				else if(document.getElementById("txteLearningComprise").value==" ")
				{
					alert("What does an e-learning unit comprise of");
					document.getElementById("txteLearningComprise").focus();
					return false;
				}
				else if(document.getElementById("txtNameOfPerson").value=="")
				{
					alert("Name of the person submitting this form");
					document.getElementById("txtNameOfPerson").focus();
					return false;
				}
				else if(document.getElementById("txtDesigOfPerson").value=="")
				{
					alert("Designation of the person submitting this form");
					document.getElementById("txtDesigOfPerson").focus();
					return false;
				}
				else
				{
					document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=2';
					document.getElementById("frm").submit();
				}
									
			}
			else {
				alert("Select minimum 1 option in E-Learning ");
				return false;
			}
				//
				
		}
		else{
			document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=2';
			document.getElementById("frm").submit();
		}
	}
	else if(document.getElementById('schoolTypeBoys').checked)
		{
			var cnt=0;
			if(document.getElementById("txtNoOfBoys").value=="0")
			{
				cnt=1;
				alert("Enter Number of Boy Students");
				document.getElementById("txtNoOfBoys").focus();
				return false;
			}
			else if(document.getElementById("eLearning_yes").checked)
			{
				cnt=1;
				var chkElearnning=document.getElementsByName("chkELearn[]");
				var okay=false;
				for(var i=0,l=chkElearnning.length;i<l;i++)
				{
					if(chkElearnning[i].checked)
					{
						okay=true;
						break;
					}
				}
				if(okay)
				{
					if(document.getElementById("txteLearning").value=="0")
					{
						alert("Please fill e-learning functional units :");
						document.getElementById("txteLearning").focus();
						return false;
					}
					else if(document.getElementById("txteLearningWhen").value==" ")
					{
						alert("When was e-learning facility installed");
						document.getElementById("txteLearningWhen").focus();
						return false;
					}
					else if(document.getElementById("txteLearningComprise").value==" ")
					{
						alert("What does an e-learning unit comprise of");
						document.getElementById("txteLearningComprise").focus();
						return false;
					}
					else if(document.getElementById("txtNameOfPerson").value=="")
					{
						alert("Name of the person submitting this form");
						document.getElementById("txtNameOfPerson").focus();
						return false;
					}
					else if(document.getElementById("txtDesigOfPerson").value=="")
					{
						alert("Designation of the person submitting this form");
						document.getElementById("txtDesigOfPerson").focus();
						return false;
					}
					else
					{
						document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=2';
						document.getElementById("frm").submit();
					}
						
				}
				else {
					alert("Select minimum 1 option in E-Learning ");
					return false;
				}
					//
					
			}
			else{
			document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=2';
			document.getElementById("frm").submit();
			}
		}
	
	else if(document.getElementById('schoolTypeCoEdu').checked)
		{
			var cnt=0;
			if(document.getElementById("txtNoOfGirls").value=="0")
			{
				cnt=1;
				alert("Enter Number of Girl Students");
				document.getElementById("txtNoOfGirls").focus();
				return false;
			}
			else if(document.getElementById("txtNoOfBoys").value=="0")
			{
				cnt=1;
				alert("Enter Number of Boy Students");
				document.getElementById("txtNoOfBoys").focus();
				return false;
			}
			else if(document.getElementById("eLearning_yes").checked)
			{
				cnt=1;
				var chkElearnning=document.getElementsByName("chkELearn[]");
				var okay=false;
				for(var i=0,l=chkElearnning.length;i<l;i++)
				{
					if(chkElearnning[i].checked)
					{
						okay=true;
						break;
					}
				}
				if(okay)
				{
					if(document.getElementById("txteLearning").value=="0")
					{
						alert("Please fill e-learning functional units :");
						document.getElementById("txteLearning").focus();
						return false;
					}
					else if(document.getElementById("txteLearningWhen").value=="")
					{
						alert("When was e-learning facility installed");
						document.getElementById("txteLearningWhen").focus();
						return false;
					}
					else if(document.getElementById("txteLearningComprise").value=="")
					{
						alert("What does an e-learning unit comprise of");
						document.getElementById("txteLearningComprise").focus();
						return false;
					}
					
					else if(document.getElementById("txtNameOfPerson").value=="")
					{
						alert("Name of the person submitting this form");
						document.getElementById("txtNameOfPerson").focus();
						return false;
					}
					else if(document.getElementById("txtDesigOfPerson").value=="")
					{
						alert("Designation of the person submitting this form");
						document.getElementById("txtDesigOfPerson").focus();
						return false;
					}
					
					else
					{
						document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=2';
						document.getElementById("frm").submit();
					}
						
				}
				else {
					alert("Select minimum 1 option in E-Learning ");
					return false;
				}
					//
					
			}
			else{
			document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=2';
			document.getElementById("frm").submit();
			}
		}
		
	else
	{
		document.getElementById("frm").action='edit_school_survey_maharashtra_gov.php?q=2';
		document.getElementById("frm").submit();
	}				
		
	
}

</script>																	
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	
	<header> 
		<div class="row" >
			<div class="col-xs-12" style="margin-top:0px;" >
				<div class="col-xs-4" style="margin-top:0px;">
					<div class="logo"><a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a></div>
				</div>
				<div class="col-xs-4" style="margin-top:0px;">
					<h3 style="color:#ffffff; text-align:center;">Comprehensive School Survey Form for Teacher Support, E-Learning & Happy School <br/>(Form No R 1.1)</h3>
				</div>
				<div class="col-xs-4" style="margin-top:0px;">
					 <?php include('include/mainnav.php'); ?>
				</div>
			</div>
		</div>		
        <div class="clearfix"></div>
	</header>
	<div class="structure-row alone">
	<div class="right-sec">   
		<!--
		<header> 
	  <div class="row">
			<div class="col-xs-12">
				<div class="col-xs-4">
				<?php //include('include/child_header.php'); ?>
				</div>
				<div class="col-xs-4">
				<h3 style="color:#ffffff; text-align:center;">Comprehensive School Survey Form for Teacher Support, E-Learning & Happy School (Form No R 1.1)</h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;"></h5>
				</div>
			</div>
		</div>
		
        <div class="clearfix"></div>
      </header> 
	    -->
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                       <!-- <div class="col-xs-12"> -->
					   <div class="col-md-2"></div>
					   <div class="col-md-8 sec-box">
                            <div class="sec-box">
                                <!-- <a class="closethis">Close</a> -->
                                
                                <div class="contents">
                                    <!-- <a class="togglethis">Toggle</a>  ins_school_survey_frm1.php-->
                                    <div class="table-box">
<div id="sumitone">                                      
										<table class="table">
                                            
                                            <tbody>		
	<form class="form-horizontal" name="frm" id="frm" action="edit_school_survey_maharashtra_gov.php" method="POST" enctype="multipart/form-data">	
								<tr>
								<td colspan="2" class="col-md-12">
								<header>
									<center>
										<h4 class="heading">PERSONAL DETAILS OF THE PERSON FILLING THE FORM</h4>
										
									</center>
								</header>
								</td>
								</tr>
                                                
												<tr style="display:none;">												
                                                    <td class="col-md-4">Select your identity :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "rotary"><input type = "radio" name = "areyoua" id = "rotary" value = "Rotary" onclick="showDistrict(this.value);" />Rotary</label>
														<label class="radio-inline" for = "innerwheel"><input type = "radio" name = "areyoua" id = "innerwheel" value = "Inner Wheel" onclick="showDistrict(this.value);" />Inner Wheel</label>
														<label class="radio-inline" for = "rotaract"><input type = "radio" name = "areyoua" id = "rotaract" value = "Rotaract" onclick="showDistrict(this.value);" />Rotaract</label>
													</td>
                                                </tr>
                                                
                                                <tr style="display:none;">
                                                    <td class="col-md-4">RI District :</td>
                                                    <td class="col-md-8">
														<select class="form-control" id="ddDistrict" name="ddDistrict" onchange='showClub(this.value)' >
														<option value="">Select District</option>
														</select>																
                                                    </td>
													
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">Name of Club :</td>
                                                    <td class="col-md-8">
														<input class="form-control" type="text" id="txtClub" name="txtClub" style="display:none;">
														<select class="form-control" id="ddClub" name="ddClub">
															<option value="">Select Club</option>									
														</select>
                                                    </td>
                                                </tr>
												<?php
													
													$sql = "select fullname,address,email,mobno from tbl_user_mh where id='$userid'";
													$result=mysql_query($sql);
													while($row = mysql_fetch_array($result)){
																extract($row);
													?>												
												
												<tr>
                                                    <td class="col-md-4">Full Name:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtPersonName" name="txtPersonName" class="form-control" readonly value="<?php echo $fullname; ?>">   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Postal Address :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtAddress" name="txtAddress" readonly value="<?php echo $address; ?>" >   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Email id :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtEmailID" name="txtEmailID" readonly value="<?php echo $email; ?>" >  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Phone Number :</td>
                                                    <td class="col-md-8">
														<input class="form-control" type="text" id="txtPhoneNo" name="txtPhoneNo" maxlength="10" readonly value="<?php echo $mobno; ?>" onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
                                                    </td>
                                                </tr>
													<?php } ?>
												<tr style="display:none;">
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <!--
															<input type="button" class="btn btn-primary" value="Next" onClick="showDiv('two')" />
															-->
                                                        </div>
                                                    </td>
                                                </tr>
											</tbody>
											</table>
    </div>
		<div id="sumittwo">
		<table class="table">                               
		<tbody>	
		<tr>
			<td colspan="2" class="col-md-12">
			<header>
				<center>
					<!-- <h4 class="heading">DETAILS OF THE SURVEYED SCHOOL (step-2)</h4> -->
					<h5 class="heading">General Information</h5>
				</center>
			</header>
			</td>
		</tr>
		<?php
			$surveyid=$_GET['id'];
			$chk = "checked";
			$sqlEdit = "select * from tbl_school_survey_maharashtra_gov where survey_id='$surveyid'";
			$resultEdit=mysql_query($sqlEdit);
			while($row = mysql_fetch_array($resultEdit)){
						extract($row);
			?>	
		
												<tr>
                                                    <td class="col-md-4">Name :</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtSchoolName" name="txtSchoolName" class="form-control" readonly value="<?php echo $school_name; ?>" >
													</td>
                                                </tr>
                                               
                                                <tr>
                                                    <td class="col-md-4">UDISE No :</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtudiseno" name="txtudiseno" maxlength="11" class="form-control" readonly value="<?php echo $udise_no; ?>" required onkeypress="return IsNumeric201(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error201" style="color: Red; display: none">* Input digits (0 - 9)</span>																
                                                    </td>
													
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Name of Head Teacher/Principal :</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtSchoolHead" name="txtSchoolHead" class="form-control" readonly value="<?php echo $head_teacher_name; ?>" >
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Phone Number :</td>
                                                    <td class="col-md-8">
														<input class="form-control" type="text" id="txtSchoolPhoneNo" name="txtSchoolPhoneNo" readonly maxlength="10" required onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $school_ph_no; ?>" />
														<span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">Email id :</td>
                                                    <td class="col-md-8"> <!-- onblur="checkEmail1(this.value)" -->
                                                     <input class="form-control" type="text" id="txtSchoolEmailID" name="txtSchoolEmailID" readonly value="<?php echo $school_email; ?>" >
													 <input type="checkbox" name="not_aval" id="not_aval" value="Not Available" onclick="showEmailNot(this)">
														&nbsp;Not Available&nbsp;&nbsp;
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">State :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolState" name="txtSchoolState" readonly value="<?php echo $school_state; ?>" >  
                                                    </td>
                                                </tr>
												<!-- new-->
												<tr>
                                                    <td class="col-md-4">District :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtDistrict" name="txtDistrict" readonly value="<?php echo $school_dist; ?>"  >  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Tehsil :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtTehsil" name="txtTehsil" readonly value="<?php echo $school_tehsil; ?>"  >  
                                                    </td>
                                                </tr>
												<!-- new-->
												<tr>
                                                    <td class="col-md-4">Village :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolVillage" name="txtSchoolVillage" readonly value="<?php echo $village; ?>" >  
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">Pin Code :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolPin" name="txtSchoolPin" readonly maxlength="6" required 
													 onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $school_pin_code; ?>" />
														<span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span> 
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Website (if any) :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtSchoolWebsite" name="txtSchoolWebsite" readonly value="<?php echo $school_website; ?>" >  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">School Category :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "Primary"><input type = "radio" name = "schoolcat" id = "Primary" disabled value = "Primary" <?php if($school_cat=='Primary'){echo $chk;} ?> />Primary (up to V)</label>&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "innerwheel"><input type = "radio" name = "schoolcat" id = "Elementary" disabled value = "Elementary" <?php if($school_cat=='Elementary'){echo $chk;} ?> />Elementary (up to VIII)</label></br>
														<label class="radio-inline" for = "rotaract"><input type = "radio" name = "schoolcat" id = "Secondary" disabled value = "Secondary" <?php if($school_cat=='Secondary'){echo $chk;} ?>  />Secondary (up to X)</label>
														<label class="radio-inline" for = "rotaract"><input type = "radio" name = "schoolcat" id = "SeniorSecondary" disabled value = "SeniorSecondary" <?php if($school_cat=='SeniorSecondary'){echo $chk;} ?> />Senior Secondary (up to XII)</label>
													 
                                                    </td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Medium of Instruction :</td>
                                                    <td class="col-md-8">
													<select class="form-control" id="mySelect" name="mySelect" onchange="showOthersInstruction()">
														<option value="-1">Select Language</option>
														<option value="Assamese">Assamese</option>
														<option value="Bengali">Bengali</option>
														<option value="Gujarati">Gujarati</option>
														<option value="Hindi">Hindi</option>
														<option value="Kannada">Kannada</option>
														<option value="Kashmiri">Kashmiri</option>
														<option value="Konkani">Konkani</option>
														<option value="Malayalam">Malayalam</option>
														<option value="Manipuri">Manipuri</option>
														<option value="Marathi">Marathi</option>
														<option value="Nepalese">Nepalese</option>
														<option value="Odia">Odia</option>
														<option value="Punjabi">Punjabi</option>
														<option value="Sanskrit">Sanskrit</option>
														<option value="Sindhi">Sindhi</option>
														<option value="Tamil">Tamil</option>
														<option value="Telugu">Telugu</option>
														<option value="Urdu">Urdu</option>
														<option value="English">English</option>
														<option value="Bodo">Bodo</option>
														<option value="Mising">Mising</option>
														<option value="Dogri">Dogri</option>
														<option value="Khasi">Khasi</option>
														<option value="Garo">Garo</option>
														<option value="Mizo">Mizo</option>
														<option value="Bhutia">Bhutia</option>
														<option value="Lepcha">Lepcha</option>
														<option value="Limboo">Limboo</option>
														<option value="Others">Others</option>
													</select>
                                                    </td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">
														<table id="idOther" style="display:none;">
															<tr>
																<td>Other Medium of Instruction :</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idOthertxt" style="display:none;">
															<tr>
																<td><input class="form-control" type="text" id="txtOtherMedIns" name="txtOtherMedIns">  </td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">
														<div class="form-group has-error" align="right">
                                                            
                                                        </div>
													</td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
															<!-- <button class="btn btn-primary" name="back" onClick="window.location = 'http://rotaryteach.org/Comprehensive_School_Survey/cssform1.php?flag=y&suid=<?php echo $_GET['suid']; ?>&userid=<?php echo $userid; ?>'">Back</button>
                                                            <button type="submit" class="btn btn-primary" name="submit">Next</button> -->
															<!--
															<button type="button" class="btn btn-primary" onClick="showBack('two')">Back</button>
															<button type="button" class="btn btn-primary" onClick="showDiv('three')">Next</button>
															-->
															
                                                        </div>
                                                    </td>
                                                </tr>
												</tbody>
												</table>
		</div>
		<div id="sumitthree">
		<table class="table">
        <tbody>	
		<tr>
			<td colspan="2" class="col-md-12">
			<header>
									<center>
										<!-- <h4 class="heading">DETAILS OF THE SURVEYED SCHOOL (step-3)</h4> -->
										<h5 class="heading">Teacher-Student Information</h5>
									</center>
								</header>
							</td>
		</tr>
		<tr>
                                                    <td class="col-md-4">Type of School :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "Girls"><input type = "radio" name = "schooltype" id = "schoolTypeGirls" disabled onchange="schoolType1()" value = "Girls" <?php if($school_type=='Girls'){echo $chk;} ?> />Girls</label>&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "Boys"><input type = "radio" name = "schooltype" id = "schoolTypeBoys" disabled onchange="schoolType2()" value = "Boys" <?php if($school_type=='Boys'){echo $chk;} ?> />Boys</label>
														<label class="radio-inline" for = "Co-Educational"><input type = "radio" name = "schooltype" id = "schoolTypeCoEdu" disabled onchange="schoolType3()" value = "Co-Educational" <?php if($school_type=='Co-Educational'){echo $chk;} ?>  />Co-Educational</label>
																											 
                                                    </td>
                                                </tr>
												
			<tr>												
                                                    <td class="col-md-4">No. of Students :
													
													</td>
                                                    <td class="col-md-8">
														<label id="girl">Girls:</label><input type="text" id="txtNoOfGirls" name="txtNoOfGirls" readonly class="form-control" maxlength="3" onblur="add1()" required onkeypress="return IsNumeric15(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $stud_girls; ?>" />
														<span id="error15" style="color: Red; display: none">* Input digits (0 - 9)</span>
														<label id="boy">Boys:</label><input type="text" id="txtNoOfBoys" name="txtNoOfBoys" readonly class="form-control" maxlength="3" onblur="add1()" required onkeypress="return IsNumeric16(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $stud_boys; ?>" />
														<span id="error16" style="color: Red; display: none">* Input digits (0 - 9)</span>
														<label id="boygirltotal">Total:</label><input type="text" id="txtTotalStudent" readonly name="txtTotalStudent" class="form-control" value="<?php echo $stud_total; ?>" readonly>
														
													</td>
                                                </tr>
			<!-- onclick="showMaleTeacherNotAval(this)" -->
	
												<tr>												
                                                    <td class="col-md-4">No. of Teachers :</td>
                                                    <td class="col-md-8">
														Male:&nbsp; ( If Not Available&nbsp;&nbsp; <input type="checkbox" name="not_aval_male_teacher" id="not_aval_male_teacher" readonly value="0" onclick="showMaleTeacherNotAval(this)"> )
														<input type="text" id="txtMale" name="txtMale" class="form-control" maxlength="3" onblur="add2()" required onkeypress="return IsNumeric17(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $teacher_male; ?>" readonly  />
														<span id="error17" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Female:&nbsp; ( If Not Available&nbsp;&nbsp; <input type="checkbox" name="not_aval_female_teacher" id="not_aval_female_teacher" readonly value="0" onclick="showFemaleTeacherNotAval(this)" > )										
														<input type="text" id="txtFemale" name="txtFemale" class="form-control" maxlength="3" onblur="add2()" required onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $teacher_femail; ?>" readonly />
														<span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Total:<input type="text" id="txtTotalTeacher" name="txtTotalTeacher" class="form-control" readonly value="<?php echo $teacher_total; ?>">
														
													</td>
                                                </tr>
                                                <tr style="display:none;">												
                                                    <td class="col-md-4">No. of Trained Teachers :</td>
                                                    <td class="col-md-8">
														<label >(Trained teachers refer to teachers who took pre-service and in-service training)</label>
														Male:&nbsp; ( If Not Available&nbsp;&nbsp; <input type="checkbox" name="not_aval_trained_male_teacher" id="not_aval_trained_male_teacher" value="0" onclick="showTrainedMaleTeacherNotAval(this)"> )
														<input type="text" id="txtTrainedMaleTeacher" name="txtTrainedMaleTeacher" class="form-control" value="<?php echo $tran_teacher_male; ?>" maxlength="3" onblur="add3()" required onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Female:&nbsp; ( If Not Available&nbsp;&nbsp; <input type="checkbox" name="not_aval_trained_female_teacher" id="not_aval_trained_female_teacher" value="0" onclick="showTrainedFemaleTeacherNotAval(this)" > )
														<input type="text" id="txtTrainedFemaleTeacher" name="txtTrainedFemaleTeacher" class="form-control" value="<?php echo $tran_teacher_femail; ?>" maxlength="3" onblur="add3()" required onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
														Total:<input type="text" id="txtTotalTrainedTeacher" name="txtTotalTrainedTeacher" class="form-control" value="<?php echo $tran_teacher_total; ?>" readonly>
														
													</td>
                                                </tr>
	
												<tr style="display:none;">												
                                                    <td class="col-md-4">Number of Differently abled students :</td>
                                                    <td class="col-md-8">														
														<label id="male">Male:&nbsp; ( If Not Available&nbsp;&nbsp; <input type="checkbox" name="chk_diff_abled_male" id="chk_diff_abled_male" value="0" onclick="showChk_diff_abled_male(this)"> )
														</label>
														
														<input type="text" id="txtNoDisabilityMale" name="txtNoDisabilityMale" class="form-control" value="<?php echo $dis_male; ?>" maxlength="3" onblur="add4()" required onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														<label id="female">Female:&nbsp; ( If Not Available&nbsp;&nbsp; <input type="checkbox" name="chk_diff_abled_female" id="chk_diff_abled_female" value="0" onclick="showChk_diff_abled_female(this)"> )
														</label>
														<input type="text" id="txtNoDisabilityFemale" name="txtNoDisabilityFemale" class="form-control" value="<?php echo $dis_female; ?>" maxlength="3" onblur="add4()" required onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														<label id="malefemaletotal">Total:</label><input type="text" id="txtTotalDisability" name="txtTotalDisability" class="form-control" value="<?php echo $dis_total; ?>" readonly>
													
														<label >Mention the number of differently abled students as per the following categories</label><br/>
														Vision:<input type="text" id="txtSeeing" name="txtSeeing" class="form-control" value="<?php echo $seeing; ?>" maxlength="3" required onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Hearing:<input type="text" id="txtHearing" name="txtHearing" class="form-control" value="<?php echo $hearing; ?>" maxlength="3" required onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Speech:<input type="text" id="txtSpeech" name="txtSpeech" class="form-control" value="<?php echo $speech; ?>" maxlength="3" required onkeypress="return IsNumeric11(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error11" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														 Movement:<input type="text" id="txtMoving" name="txtMoving" class="form-control" value="<?php echo $moving; ?>" maxlength="3" required onkeypress="return IsNumeric12(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error12" style="color: Red; display: none">* Input digits (0 - 9)</span>
														
														Mental Retardation:<input type="text" id="txtMentalRetardation" name="txtMentalRetardation" class="form-control" value="<?php echo $mental_retard; ?>" maxlength="3" required onkeypress="return IsNumeric13(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error13" style="color: Red; display: none">* Input digits (0 - 9)</span> 
														others:<input type="text" id="txtDisabilityothers" name="txtDisabilityothers" class="form-control" value="<?php echo $dis_other; ?>" maxlength="3" required onkeypress="return IsNumeric14(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error14" style="color: Red; display: none">* Input digits (0 - 9)</span>
													</td>
                                                </tr>
                                                
												<tr style="display:none;">
                                                    <td class="col-md-4">Is there any arrangement for supporting the students who have fallen behind their classes during/after school hours?</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "slowlearners" id = "yes" value = "yes" <?php if($slow_learners=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "slowlearners" id = "no" value = "no" <?php if($slow_learners=='no'){echo $chk;} ?> />No</label>														
                                                    </td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Is the school agreeable to accept volunteers to conduct co-curricular activities and help such children ?</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "curricularActivities" id = "yes" value = "yes" <?php if($conduct_co_curricular=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "curricularActivities" id = "no" value = "no" <?php if($conduct_co_curricular=='no'){echo $chk;} ?>  />No</label>														
                                                    </td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Existence of School Management Committee in Schools.</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "schoolMgm" onchange="schoolMgm1()" id = "yes" value = "yes" <?php if($ex_school_mgm_comm=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "schoolMgm" onchange="schoolMgm2()" id = "no" value = "no" <?php if($ex_school_mgm_comm=='no'){echo $chk;} ?> />No</label>														
                                                    </td>
                                                </tr>
												<!-- A -->
												<tr style="display:none;">
                                                    <td class="col-md-4">
														<table id="idA1" style="display:none;">
															<tr>
																<td>Is the SMC active ?</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idA2" style="display:none;">
															<tr>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "yesnoA1" id = "yes" value = "yes" <?php if($is_smc_active=='yes'){echo $chk;} ?> />Yes</label>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "yesnoA1" id = "no" value = "no" <?php if($is_smc_active=='no'){echo $chk;} ?> />No</label>														
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<!-- B -->
												<tr style="display:none;">
                                                    <td class="col-md-4">
														<table id="idB1" >
															<tr>
																<td>Is there a time frame for constituting the SMC ?</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idB2">
															<tr>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "yesnoB1" id = "yes" value = "yes" <?php if($time_fram_smc=='yes'){echo $chk;} ?> />Yes</label>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "yesnoB1" id = "no" value = "no" <?php if($time_fram_smc=='no'){echo $chk;} ?> />No</label>	
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<!-- C -->
												<tr style="display:none;">
                                                    <td class="col-md-4">
														<table id="idC1" style="display:none;">
															<tr>
																<td>Does the school have a School Development Plan for 2016-2017 ?</td>
															</tr>
														</table>
													</td>
                                                    <td class="col-md-8" >
														<table id="idC2" style="display:none;">
															<tr>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "yesnoC1" id = "yes" value = "yes" <?php if($school_dev_plan=='yes'){echo $chk;} ?>  />Yes</label>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "yesnoC1" id = "no" value = "no" <?php if($school_dev_plan=='no'){echo $chk;} ?> />No</label>	
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <!-- <button type="submit" class="btn btn-primary" name="submit">Next</button> -->
															<!--
															<button type="button" class="btn btn-primary" onClick="showBack('three')">Back</button>
															<button type="button" class="btn btn-primary" onClick="showDiv('four')">Next</button>
															-->
                                                        </div>
                                                    </td>
                                                </tr>
											</tbody>
											</table>
											
		</div>
		<div id="sumitfour">
		<table class="table">
                                            
            <tbody>	
		<tr style="display:none;">
			<td colspan="2" class="col-md-12">
			<header>
									<center>
										<!-- <h4 class="heading">DETAILS OF THE SURVEYED SCHOOL (step-4)</h4> -->
										<h5 class="heading">School Infrastructure Details</h5>
									</center>
								</header>
							</td>
		</tr>
											<tr style="display:none;">												
                                                    <td class="col-md-4">School Building Structure 
													<div class="tooltip1">&nbsp;&nbsp;&nbsp;<!--<img src="info.png">--><span style="color:#0645AD;"><b><i><u>More Info</u></i></b></span><span class="tooltiptext">
															<strong><u>School Building Structure</u></strong><br>
																<table style="border:1px solid black; color:#000000">
																	<tr style="border:1px solid black; color:#000000">
																		<td style="border:1px solid black; color:#000000"><b>&nbsp;&nbsp;&nbsp;Particulars&nbsp;&nbsp;&nbsp;</b></td>
																		<td style="border:1px solid black; color:#000000"><center><b>Description</b></center></td>
																	</tr>
																	<tr style="border:1px; color:#000000">
																		<td style="border:1px solid black; color:#000000">&nbsp;&nbsp;&nbsp;Good</td>
																		<td style="border:1px solid black; color:#000000">If the school has a concrete building with proper roof, wall, doors and windows, floor and the building is secure, then rate it as “Good”.</td>
																	</tr>
																	<tr style="border:1px; color:#000000">
																		<td style="border:1px solid black; color:#000000">&nbsp;&nbsp;&nbsp;Average</td>
																		<td style="border:1px solid black; color:#000000">If the school has any partial damage (30-50%) in the building wall, door and windows, floor, roof, then rate is as “Average”.</td>
																	</tr>
																	<tr style="border:1px; color:#000000">
																		<td style="border:1px solid black; color:#000000">&nbsp;&nbsp;&nbsp;Poor</td>
																		<td style="border:1px solid black; color:#000000">If the school has no concrete building, broken floor, no proper roof, doors and windows are missing, and then rate it as “Poor”.</td>
																	</tr>
																</table>
															 </span>
															 </div>
													:</td>
                                                    <td class="col-md-8">
													
														<label class="radio-inline" for = "Good"><input type = "radio" name = "schoolBuildStr" id = "Good" value = "Good" <?php if($school_build_stru=='Good'){echo $chk;} ?> />Good</label>
														<label class="radio-inline" for = "Average"><input type = "radio" name = "schoolBuildStr" id = "Average" value = "Average" <?php if($school_build_stru=='Average'){echo $chk;} ?> />Average</label>
														<label class="radio-inline" for = "Poor "><input type = "radio" name = "schoolBuildStr" id = "Poor" value = "Poor" <?php if($school_build_stru=='Poor'){echo $chk;} ?> />Poor</label>
														
													</td>
                                                </tr>
												<tr style="display:none;">												
                                                    <td class="col-md-4">Status of electricity supply :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "Constant"><input type = "radio" name = "statusEleSup" id = "Constant" value = "Constant" <?php if($status_ele_supply=='Constant'){echo $chk;} ?> />Constant</label>
														<label class="radio-inline" for = "Intermittent"><input type = "radio" name = "statusEleSup" id = "Intermittent" value = "Intermittent" <?php if($status_ele_supply=='Intermittent'){echo $chk;} ?> />Intermittent</label>
														<label class="radio-inline" for = "Non-existent"><input type = "radio" name = "statusEleSup" id = "Non-existent" value = "Non-existent" <?php if($status_ele_supply=='Non-existent'){echo $chk;} ?> />Non-existent</label>
													</td>
                                                </tr>
                                                <tr style="display:none;">												
                                                    <td class="col-md-4">Is the building secure against unauthorized entry during non-school hours?	</td>
                                                    <td class="col-md-8">
														<label >(Rooms are kept locked beyond school hours)</label><br/>
														<label class="radio-inline" for = "yes"><input type = "radio" name = "buildSecure" id = "yes" value = "yes" <?php if($kept_locked=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "buildSecure" id = "no" value = "no" <?php if($kept_locked=='no'){echo $chk;} ?> />No</label>
													</td>
                                                </tr>
												<tr style="display:none;">												
                                                    <td class="col-md-4">Availability of adequate and separate toilets for boys and girls :</td>
                                                    <td class="col-md-8">																												
														<label>(Adequate toilet refers to 1 toilet for every 30 to 50 students.)</label><br/><br/>
														<!-- <label id="toilet_boy">a) Toilet for Boys</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" id="toilet_boy_yes_lbl" for = "yes"><input type = "radio" name = "toiletforboys" id = "toilet_boy_yes" value = "yes" onClick="showToiletBoys1()" />Yes</label>
														<label class="radio-inline" id="toilet_boy_no_lbl" for = "no"><input type = "radio" name = "toiletforboys" id = "toilet_boy_no" value = "no" onClick="showToiletBoys2()" checked />No</label>
														-->
														<table id="tblIDboys">
															<tr>
																<td><label id="lbl_toilet_for_boys">a) Toilet for Boys</label></td>
																<td>
																<label id="lbl_toilet_for_boys_yes" class="radio-inline" for = "yes"><input type = "radio" name = "toiletforboys" id="inp_toilet_for_boys_yes" value = "yes" onchange="showToiletBoys1()" <?php if($toilet_for_boys=='yes'){echo $chk; } ?> />Yes</label>
																</td>
																<td>
																<label id="lbl_toilet_for_boys_no" class="radio-inline" for = "no"><input type = "radio" name = "toiletforboys" id = "inp_toilet_for_boys_no" value = "no" onchange="showToiletBoys2()" <?php if($toilet_for_boys=='no'){echo $chk;} ?> />No</label>																
																</td>
															</tr>
														</table>
														<!-- <label id="lbl_toilet_for_boys">a) Toilet for Boys</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label id="lbl_toilet_for_boys_yes" class="radio-inline" for = "yes"><input type = "radio" name = "toiletforboys" id="inp_toilet_for_boys_yes" value = "yes" onchange="showToiletBoys1()" />Yes</label>
														<label id="lbl_toilet_for_boys_no" class="radio-inline" for = "no"><input type = "radio" name = "toiletforboys" id = "inp_toilet_for_boys_no" value = "no" onchange="showToiletBoys2()" checked />No</label>
														--> 
														<br/>
														<table id="idA11" <?php if($toilet_for_boys=='yes'){ ?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
															<tr>
																<td>
																	How many are Functional :<input type="text" id="txtBoysFunctional" name="txtBoysFunctional" class="form-control" value="<?php echo $toilet_for_boys_func; ?>" maxlength="3" onblur="add10()" required onkeypress="return IsNumeric19(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error19" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	How many are Non Functional :<input type="text" id="txtBoysNonFunctional" name="txtBoysNonFunctional" class="form-control" value="<?php echo $toilet_for_boys_non_func; ?>" maxlength="3" onblur="add10()" required onkeypress="return IsNumeric20(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error20" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	Total:<input type="text" id="txtTotalBoys" name="txtTotalBoys" class="form-control" value="<?php echo $toilet_for_boys_total; ?>" readonly>	
																	
																</td>
															</tr>
														</table>
														<br/>
														<table id="tblIDgirls">
															<tr>
																<td><label id="lbl_toilet_for_girls">b) Toilet for Girls</label></td>
																<td>
																<label class="radio-inline" id="lbl_toilet_for_girls_yes" for = "yes"><input type = "radio" name = "toiletforgirls" id = "inp_toilet_for_girls_yes" value = "yes" onchange="showToiletGirls1()" <?php if($toilet_for_girls=='yes'){echo $chk;} ?> />Yes</label>
																</td>
																<td>
																<label class="radio-inline" id="lbl_toilet_for_girls_no" for = "no"><input type = "radio" name = "toiletforgirls" id = "inp_toilet_for_girls_no" value = "no" onchange="showToiletGirls2()" <?php if($toilet_for_girls=='no'){echo $chk;} ?> />No</label>													
																</td>
															</tr>
														</table>
														<!--
														<label id="lbl_toilet_for_girls">b) Toilet for Girls</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" id="lbl_toilet_for_girls_yes" for = "yes"><input type = "radio" name = "toiletforgirls" id = "inp_toilet_for_girls_yes" value = "yes" onchange="showToiletGirls1()" />Yes</label>
														<label class="radio-inline" id="lbl_toilet_for_girls_no" for = "no"><input type = "radio" name = "toiletforgirls" id = "inp_toilet_for_girls_no" value = "no" onchange="showToiletGirls2()" checked />No</label>													
														-->
														<br/>
														<table id="idB11" <?php if($toilet_for_girls=='yes'){ ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?> >
															<tr>
																<td>
																	How many are Functional :<input type="text" id="txtGirlsFunctional" name="txtGirlsFunctional" class="form-control" maxlength="3" onblur="add20()" required onkeypress="return IsNumeric21(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_girls_func; ?>" />
																	<span id="error21" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	How many are Non Functional :<input type="text" id="txtGirlsNonFunctional" name="txtGirlsNonFunctional" class="form-control" maxlength="3" onblur="add20()" required onkeypress="return IsNumeric22(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_girls_non_func; ?>" />
																	<span id="error22" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	Total:<input type="text" id="txtTotalGirls" name="txtTotalGirls" class="form-control" value="<?php echo $toilet_for_girls_total; ?>" readonly>	
																	
																</td>
															</tr>
														</table>
														<br/>
														<label>c) Toilet for Teachers</label>&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "toiletforteacher" id = "toiletforteacher_yes" value = "yes" onchange="showToiletTeacher1()" <?php if($toilet_for_teachers=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "toiletforteacher" id = "toiletforteacher_no" value = "no" onchange="showToiletTeacher2()" <?php if($toilet_for_teachers=='no'){echo $chk;} ?> />No</label>	
														<table id="idC11" <?php if($toilet_for_teachers=='yes'){ ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
															<tr>
																<td>
																	How many are Functional :<input type="text" id="txtTeacherFunctional" name="txtTeacherFunctional" class="form-control" maxlength="3" onblur="add30()" required onkeypress="return IsNumeric23(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_teachers_func; ?>" />
																	<span id="error23" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	How many are Non Functional :<input type="text" id="txtTeacherNonFunctional" name="txtTeacherNonFunctional" class="form-control" maxlength="3" onblur="add30()" required onkeypress="return IsNumeric24(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $toilet_for_teachers_non_func; ?>" />
																	<span id="error24" style="color: Red; display: none">* Input digits (0 - 9)</span>
																	Total:<input type="text" id="txtTotalTeachers" name="txtTotalTeachers" class="form-control" value="<?php echo $toilet_for_teachers_total; ?>" readonly>	
																	
																</td>
															</tr>
														</table>
														<br/>
													</td>
                                                </tr>
                                                
												<!-- dfkjsfkjfksjfks -->
												<tr style="display:none;">
                                                    <td class="col-md-4">Availability of clean and adequate drinking water for both students and teachers.</td>
                                                    <td class="col-md-8">
														<label>(Adequate drinking water facility refers to 1 water tap for every 10 students.)</label><br/>
														<label class="radio-inline" for = "yes"><input type = "radio" name = "drinkWater" id = "yes" value = "yes" <?php if($drink_water_stu_techer=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "drinkWater" id = "no" value = "no" <?php if($drink_water_stu_techer=='no'){echo $chk;} ?> />No</label>														
                                                    </td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Availability of Hand Washing Station</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "washStation" id = "washStation_yes" value = "yes" onchange="showWashStation1()" <?php if($hand_washing_stn=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "washStation" id = "washStation_no" value = "no" onchange="showWashStation2()" <?php if($hand_washing_stn=='no'){echo $chk;} ?> />No</label>														
														
														<table id="idWashStation" <?php if($hand_washing_stn=='yes'){ ?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?>>
															<tr>
																<td>
																<br/>
																Total Number of Hand Washing Station :<input type="text" id="txtTotalHandWash" name="txtTotalHandWash" class="form-control" value="<?php echo $total_hand_wash_stn; ?>" maxlength="3" required onkeypress="return IsNumeric25(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error25" style="color: Red; display: none">* Input digits (0 - 9)</span>	
																</td>
															</tr>
														</table>
													</td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">Facility of Library with Books</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "libBooks" id = "yes" value = "yes" onchange="showLibBooks1()" <?php if($library_with_book=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "libBooks" id = "no" value = "no" onchange="showLibBooks2()" <?php if($library_with_book=='no'){echo $chk;} ?> />No</label>														
														
														<table id="idlibBooks" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of Books :<input type="text" id="txtTotalLibBooks" name="txtTotalLibBooks" class="form-control" value="<?php echo $library_with_book_no; ?>" maxlength="10" required onkeypress="return IsNumeric26(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error26" style="color: Red; display: none">* Input digits (0 - 9)</span>	
																</td>
															</tr>
														</table>
													</td>
                                                </tr>
												<tr style="display:none;">												
                                                    <td class="col-md-4">What percentage of students has ?</td>
                                                    <td class="col-md-8">														
														a) Footwear Percentage(%) :<input type="text" id="txtFootwear" name="txtFootwear" class="form-control" value="<?php echo $footwear_per; ?>" maxlength="3" required onkeypress="return IsNumeric27(event);" ondrop="return false;" onpaste="return false;" onchange="percentChk1(this.value)" />
																	<span id="error27" style="color: Red; display: none">* Input digits (0 - 9)</span>
														b) School Bag Percentage(%) :<input type="text" id="txtSchoolBag" name="txtSchoolBag" class="form-control" value="<?php echo $school_bag_per; ?>" maxlength="3" required onkeypress="return IsNumeric28(event);" ondrop="return false;" onpaste="return false;" onchange="percentChk2(this.value)" />
																	<span id="error28" style="color: Red; display: none">* Input digits (0 - 9)</span>
														c) Uniform Percentage(%) <input type="text" id="txtUniform" name="txtUniform" class="form-control" value="<?php echo $uniform_per; ?>" maxlength="3" required onkeypress="return IsNumeric29(event);" ondrop="return false;" onpaste="return false;" onchange="percentChk3(this.value)"/>
																	<span id="error29" style="color: Red; display: none">* Input digits (0 - 9)</span>														
													</td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Availability of Benches</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "avai_benches" id = "yes" value = "yes" onchange="showBenches1()" <?php if($Availability_of_Benches=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "avai_benches" id = "no" value = "no" onchange="showBenches2()" <?php if($Availability_of_Benches=='no'){echo $chk;} ?> />No</label>														
														
														<table id="idAviBanches" <?php if($Availability_of_Benches=='yes'){echo 'style="display:block;"';} 
																						else {echo 'style="display:none;"';} ?>>
															<tr>
																<td>
																<br/>
																	Number of benches available in the school :<input type="text" id="txtTotalBenches" name="txtTotalBenches" class="form-control" value="<?php echo $no_benches; ?>" maxlength="5" required onkeypress="return IsNumeric30(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error30" style="color: Red; display: none">* Input digits (0 - 9)</span>	
																</td>
															</tr>
														</table>
													</td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Availability of Desks</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "avai_desks" id = "yes" value = "yes" onchange="showDesks1()" <?php if($Availability_of_Desk=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "avai_desks" id = "no" value = "no" onchange="showDesks2()" <?php if($Availability_of_Desk=='no'){echo $chk;} ?> />No</label>														
														
														<table id="idAviDesks" <?php if($Availability_of_Desk=='yes'){echo 'style="display:block;"';} 
																						else {echo 'style="display:none;"';} ?> >
															<tr>
																<td>
																<br/>
																	Number of desks available in the school :<input type="text" id="txtTotalDesks" name="txtTotalDesks" class="form-control" value="<?php echo $no_desks; ?>" maxlength="5" required onkeypress="return IsNumeric31(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error31" style="color: Red; display: none">* Input digits (0 - 9)</span>		
																</td>
															</tr>
														</table>
													</td>
                                                </tr>
												<!--
												<tr>												
                                                    <td class="col-md-4">Number of benches available in the school :</td>
                                                    <td class="col-md-8">														
														<input type="text" id="txtTotalBenches" name="txtTotalBenches" class="form-control" value="0" maxlength="5" required onkeypress="return IsNumeric30(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error30" style="color: Red; display: none">* Input digits (0 - 9)</span>													
													</td>
                                                </tr>
												
												<tr>												
                                                    <td class="col-md-4">Number of desks available in the school :</td>
                                                    <td class="col-md-8">														
														<input type="text" id="txtTotalDesks" name="txtTotalDesks" class="form-control" value="0" maxlength="5" required onkeypress="return IsNumeric31(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error31" style="color: Red; display: none">* Input digits (0 - 9)</span>													
													</td>
                                                </tr>
												-->
												<tr style="display:none;">												
                                                    <td class="col-md-4">Is there a separate room for ?</td>
                                                    <td class="col-md-8">	
														<label>a) Head Teacher </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "headTeacher" id = "yes" value = "yes" <?php if($head_teacher=='yes'){echo $chk;} ?>   />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "headTeacher" id = "no" value = "no" <?php if($head_teacher=='no'){echo $chk;} ?> />No</label>																												
														<!--
														onchange="showheadTeacher1()"
														onchange="showheadTeacher2()"
														<table id="idheadTeacher" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalChairs" name="txtTotalChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalTables" name="txtTotalTables" class="form-control" required>	
																</td>
															</tr>
														</table> -->
														<br/>
														<label>b) Stores (separate) </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "stores" id = "yes" value = "yes" <?php if($stores_separate=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "stores" id = "no" value = "no" <?php if($stores_separate=='no'){echo $chk;} ?> />No</label>																												
														<!--
														onchange="showStores1()"
														onchange="showStores2()" 
														
														<table id="idStroes" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalStoresChairs" name="txtTotalStoresChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalStoresTables" name="txtTotalStoresTables" class="form-control" required>	
																</td>
															</tr>
														</table> -->
														
														<br/>
														<label>c) Laboratory </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "laboratory" id = "yes" value = "yes" <?php if($laboratory=='yes'){echo $chk;} ?>  />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "laboratory" id = "no" value = "no"  <?php if($laboratory=='no'){echo $chk;} ?> />No</label>																												
														<!--
														onchange="showlaboratory1()"
														onchange="showlaboratory2()"
														<table id="idLaboratory" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalLaboratoryChairs" name="txtTotalLaboratoryChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalLaboratoryTables" name="txtTotalLaboratoryTables" class="form-control" required>	
																</td>
															</tr>
														</table>-->
														<br/>
														<label>d) Kitchen, only for mid-day meals </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "kitchen" id = "yes" value = "yes" <?php if($kitchen_mid_day=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "kitchen" id = "no" value = "no"  <?php if($kitchen_mid_day=='no'){echo $chk;} ?> />No</label>																												
														<!--
														onchange="showKitchen1()"
														onchange="showKitchen2()"
														<table id="idKitchen" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalKitchenChairs" name="txtTotalKitchenChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalKitchenTables" name="txtTotalKitchenTables" class="form-control" required>	
																</td>
															</tr>
														</table>
														-->
														<br/>
														<label>e) Indoor Games </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "IndoorGames" id = "yes" value = "yes" <?php if($indoor_games=='yes'){echo $chk;} ?>  />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "IndoorGames" id = "no" value = "no"  <?php if($indoor_games=='no'){echo $chk;} ?> />No</label>																												
														<!--
														onchange="showIndoorGames1()"
														onchange="showIndoorGames2()"
														<table id="idIndoorGames" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalIndoorGamesChairs" name="txtTotalIndoorGamesChairs" class="form-control" required>	
																	Number of tables :<input type="text" id="txtTotalIndoorGamesTables" name="txtTotalIndoorGamesTables" class="form-control" required>	
																</td>
															</tr>
														</table>
														-->
														<br/>
														<label>f) Other Teachers (Staff Room) </label>&nbsp;&nbsp;&nbsp;
														<label class="radio-inline" for = "yes"><input type = "radio" name = "StaffRoom" id = "yes" value = "yes" onchange="showStaffRoom1()" <?php if($staff_room=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "StaffRoom" id = "no" value = "no" onchange="showStaffRoom2()" <?php if($staff_room=='no'){echo $chk;} ?> />No</label>																												
														<table id="idStaffRoom" style="display:none;">
															<tr>
																<td>
																<br/>
																	Number of chairs :<input type="text" id="txtTotalStaffRoomChairs" name="txtTotalStaffRoomChairs" class="form-control" value="<?php echo $staff_room_no_chair; ?>" maxlength="5" required onkeypress="return IsNumeric32(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error32" style="color: Red; display: none">* Input digits (0 - 9)</span>		
																	Number of tables :<input type="text" id="txtTotalStaffRoomTables" name="txtTotalStaffRoomTables" class="form-control" value="<?php echo $staff_room_no_table; ?>" maxlength="5" required onkeypress="return IsNumeric33(event);" ondrop="return false;" onpaste="return false;" />
																	<span id="error33" style="color: Red; display: none">* Input digits (0 - 9)</span>		
																</td>
															</tr>
														</table>
														
														
													</td>
                                                </tr>
												<tr>												
                                                    <td class="col-md-4">Does the school have E-learning facility ?</td>
                                                    <td class="col-md-8">	
														<label>(E-Learning refers to Projector and software as per state board curriculum in vernacular languages with audio system.)</label><br/>
														<label class="radio-inline" for = "yes"><input type = "radio" name = "eLearning" id = "eLearning_yes" disabled value = "yes" onchange="showeLearning1()" <?php if($e_learning_fac=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "eLearning" id = "eLearning_no" disabled value = "no" onchange="showeLearning2()" <?php if($e_learning_fac=='no'){echo $chk;} ?>  />No</label>																												
														<br>
														<table id="ideLearning" <?php if($e_learning_fac=='yes'){ ?>style="display:block;" <?php } else { ?> style="display:none;" <?php } ?> >
															<tr colspan="2">
																<td>&nbsp;</td>
															</tr>
															<tr colspan="2">
																<td><b><i><u>Please tick the appropriate option</u></i></b></td>
															</tr>
															<tr colspan="2">
																<td>&nbsp;</td>
															</tr>
															<?php  
																	$eLearnOption = array_map('trim', explode(",", $ELearnningOption)); 
																?>
															<tr>
																<td style="width:50%"><input type="checkbox" name="chkELearn[]" value="Television" <?=(in_array('Television', $eLearnOption)?'checked="checked"':NULL)?> disabled >&nbsp;Television</td>
																<td style="width:50%"><input type="checkbox" name="chkELearn[]" value="Projector with ceiling mount" <?=(in_array('Projector with ceiling mount', $eLearnOption)?'checked="checked"':NULL)?> disabled>&nbsp;Projector with ceiling mount</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="chkELearn[]" value="Integrated projector" <?=(in_array('Integrated projector', $eLearnOption)?'checked="checked"':NULL)?> disabled >&nbsp;Integrated projector</td>
																<td><input type="checkbox" name="chkELearn[]" value="Integrated white boards" <?=(in_array('Integrated white boards', $eLearnOption)?'checked="checked"':NULL)?> disabled >&nbsp;Integrated white boards</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="chkELearn[]" value="Tablets" <?=(in_array('Tablets', $eLearnOption)?'checked="checked"':NULL)?> disabled >&nbsp;Tablets</td>
																<td><input type="checkbox" name="chkELearn[]" id="chkELearnOther" onclick="showELearn(this)" value="Others" <?=(in_array('chkELearnOther', $eLearnOption)?'checked="checked"':NULL)?> disabled >&nbsp;Others
																</td>
															</tr>
															
															<tr>
																<td>
																	<table id="idELearnOther" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtELearnOther" name="txtELearnOther" class="form-control" readonly >	
																			</td>
																		</tr>
																	</table>
																</td>
																
															</tr>
	
															<tr>
																<td>
																<br/>
																	how many functional units :<input type="text" id="txteLearning" name="txteLearning" class="form-control" value="<?php echo $e_learning_func_unit; ?>" maxlength="3" required onkeypress="return IsNumeric34(event);" ondrop="return false;" onpaste="return false;" readonly />
																	<span id="error34" style="color: Red; display: none">* Input digits (0 - 9)</span>	
																</td>
															</tr>
															<!-- New -->
															<tr>
																<td>
																<br/>
																	When was e-learning facility installed :<input type="text" id="txteLearningWhen" name="txteLearningWhen" class="form-control" value="<?php echo $e_learning_facility_installed; ?>" onkeypress="return restrictCharacters(event);" readonly />
																</td>
															</tr>
															<tr>
																<td>
																<br/>
																	What does an e-learning unit comprise of :<input type="text" id="txteLearningComprise" name="txteLearningComprise" class="form-control" value="<?php echo $e_learning_unit_comp; ?>" readonly  />
																</td>
															</tr>
															
															<tr style="display:none;">
																<td>
																<br/>
																	Date of installation :<input type="text" id="txteLearningDtInstallation" name="txteLearningDtInstallation" class="form-control" value="<?php echo $inst_date; ?>"  />
																</td>
															</tr>
															
															<!-- New -->
															
														</table>
													</td>
												</tr>
												
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <!-- <button type="submit" class="btn btn-primary" name="submit">Next</button> -->
															<!--
															<button type="button" class="btn btn-primary" onClick="showBack('four')">Back</button>
															<button type="button" class="btn btn-primary" onClick="showDiv('five')">Next</button>
															-->
                                                        </div>
                                                    </td>
                                                </tr>
												</tbody>
												</table>
		</div>
		<div id="sumitfive">
		<table class="table">
                                            
                                            <tbody>	
		<tr style="display:none;">
			<td colspan="2" class="col-md-12">
			<header>
									<center>
										<!-- <h4 class="heading">DETAILS OF THE SURVEYED SCHOOL (step-5)</h4> -->
										<h5 class="heading">Status of Physical Education</h5>
									</center>
								</header>
							</td>
		</tr>
												<tr style="display:none;">												
                                                    <td class="col-md-4">How many PE period are conducted in a week ?</td>
                                                    <td class="col-md-8">
													
														<table>
															<tr>
																<td style="width:25%;"></td>
																<td style="width:12%;">None</td>
																<td style="width:12%;">1 per week</td>
																<td style="width:12%;">2 per week</td>
																<td style="width:12%;">3 per week</td>
																<td style="width:12%;">4 per week</td>
																<td style="width:15%;">5 per week</td>
															</tr>
															<tr>
																<td>Upto 5th class</td>
																<td><input type = "radio" name = "row1" id = "none1" value = "none" <?php if($pe_period_upto5th=='none'){echo $chk;} ?>  /></td>
																<td><input type = "radio" name = "row1" id = "row1per1" value = "per1" <?php if($pe_period_upto5th=='per1'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row1" id = "row1per2" value = "per2" <?php if($pe_period_upto5th=='per2'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row1" id = "row1per3" value = "per3" <?php if($pe_period_upto5th=='per3'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row1" id = "row1per4" value = "per4" <?php if($pe_period_upto5th=='per4'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row1" id = "row1per4more" value = "per4more" <?php if($pe_period_upto5th=='per4more'){echo $chk;} ?> /></td>
															</tr>
															<tr>
																<td>6th ­ 10th class</td>
																<td><input type = "radio" name = "row2" id = "none2" value = "none" <?php if($pe_period_upto10th=='none'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row2" id = "row2per1" value = "per1" <?php if($pe_period_upto10th=='per1'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row2" id = "row2per2" value = "per2" <?php if($pe_period_upto10th=='per2'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row2" id = "row2per3" value = "per3" <?php if($pe_period_upto10th=='per3'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row2" id = "row2per4" value = "per4" <?php if($pe_period_upto10th=='per4'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row2" id = "row2per4more" value = "per4more" <?php if($pe_period_upto10th=='per4more'){echo $chk;} ?> /></td>
															</tr>
															<tr>
																<td>11th ­ 12th class</td>
																<td><input type = "radio" name = "row3" id = "none3" value = "none" <?php if($pe_period_upto12th=='none'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row3" id = "row3per1" value = "per1" <?php if($pe_period_upto12th=='per1'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row3" id = "row3per2" value = "per2" <?php if($pe_period_upto12th=='per2'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row3" id = "row3per3" value = "per3" <?php if($pe_period_upto12th=='per3'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row3" id = "row3per4" value = "per4" <?php if($pe_period_upto12th=='per4'){echo $chk;} ?> /></td>
																<td><input type = "radio" name = "row3" id = "row3per4more" value = "per4more" <?php if($pe_period_upto12th=='per4more'){echo $chk;} ?> /></td>
															</tr>
														</table>
														
													</td>
                                                </tr>
												<tr style="display:none;">												
                                                    <td class="col-md-4">No. of PE teachers :</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:25%;"><label class="radio-inline" for = "None"><input type = "radio" name = "peTeacher" id = "NonePE" value = "None" onchange="showOther5()" <?php if($no_pe_teacher=='None'){echo $chk;} ?> />None</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "One"><input type = "radio" name = "peTeacher" id = "OnePE" value = "One" onchange="showOther6()" <?php if($no_pe_teacher=='One'){echo $chk;} ?> />One</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "onetwo"><input type = "radio" name = "peTeacher" id = "onetwoPE" value = "1 - 2" onchange="showOther6()" <?php if($no_pe_teacher=='1 ­ 2'){echo $chk;} ?> />1 - 2</label></td>
																<td style="width:25%;"><label class="radio-inline" for = "Other"><input type = "radio" name = "peTeacher" id = "OtherPE" value = "Other" onchange="showOther7()" <?php if($no_pe_teacher=='Other'){echo $chk;} ?> />Other</label></td>
															</tr>
														</table>
														
														<br/>
														<table id="idpeTeacher" <?php if($no_pe_teacher=='Other') { ?> style="display:block;" <?php } else {?> style="display:none;" <?php } ?> >
															<tr>
																<td>
																	Other :<input type="text" id="txtpeOther" name="txtpeOther" class="form-control" value="<?php echo $no_pe_teacher_other; ?>" >	
																</td>
															</tr>
														</table>													 
													</td>
                                                </tr>
                                                <tr  id="peTeacherID1111111" style="display:none;">	
													<!-- New -->
													<td class="col-md-4">
														<label id="peTeacherID1" >Please mention how many on rolls/Contractual :</label>
													</td>
													<td class="col-md-8" >
														<input type="text" id="peTeacherID2" name="peTeacherID2" class="form-control" value="<?php echo $rolls_Contractual; ?>" >	
													</td>
													<!-- New -->
															<!--
															<td class="col-md-4"><label id="peTeacherID1" style="display:none;">What is the educational qualification of  PE teacher :</label></td>
															<td class="col-md-8" >
															<table width="100%" id="peTeacherID2" style="display:none;">
																<tr>
																	<td width="30%"><input type="checkbox" name="edu_qua_peTeacher[]" value="Graduate">
																		&nbsp;Graduate &nbsp;&nbsp;</td>
																	<td width="40%"><input type="checkbox" name="edu_qua_peTeacher[]" value="Post Graduate">
																		&nbsp;Post Graduate &nbsp;&nbsp;</td>
																	<td width="30%"><input type="checkbox" name="edu_qua_peTeacher[]" value="Retired Sport Player">
																		&nbsp;Retired Sport Player</td>
																</tr>
																<tr>
																	<td width="30%"><input type="checkbox" name="edu_qua_peTeacher[]" value="Diploma in Sports">
																		&nbsp;Diploma in Sports &nbsp;&nbsp;</td>
																	<td width="40%"><input type="checkbox" name="edu_qua_peTeacher[]" value="Bachelor in Physical Education">
																		&nbsp;Bachelor in Physical Education &nbsp;&nbsp;</td>
																	<td width="30%"><input type="checkbox" name="edu_qua_peTeacher[]" value="Other" id="chkOther" onclick="showPeTeacher(this)">
																		&nbsp;Other</td>
																</tr>
															</table>
																
																<table id="idPeTeacherOther" style="display:none;">
																	<tr>
																		<td>
																			Other :<input type="text" id="txtPeTeacherOther" name="txtPeTeacherOther" class="form-control">	
																		</td>
																	</tr>
																</table>
																
															</td>
															-->
														
                                                </tr>
												<tr id="peTeacherID_is" style="display:none;">	
													<!-- New -->
													<td class="col-md-4">
														<label id="peTeacherID1_is" >Is PE teacher  trained to conduct sport education in schools :</label>
													</td>
													<td class="col-md-8" >
														<!-- <input type="text" id="peTeacherID2_is" class="form-control" style="display:none;">-->
														<label class="radio-inline" for = "yes"><input type = "radio" name = "peSports_is" id = "yes" value = "yes" <?php if($pe_teacher_conduct_sport_edu=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "peSports_is" id = "no" value = "no" <?php if($pe_teacher_conduct_sport_edu=='no'){echo $chk;} ?> />No</label>
														
													</td>
													<!-- New -->
												</tr>
                                                
												<tr style="display:none;">
                                                    <td class="col-md-4">Does the school follow any prescribed curriculum of PE/Sports ?</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "yes"><input type = "radio" name = "peSports_curr" id = "yes" value = "yes" onchange="showPescribed1()" <?php if($curriculum_pe_sports=='yes'){echo $chk;} ?> />Yes</label>
														<label class="radio-inline" for = "no"><input type = "radio" name = "peSports_curr" id = "no" value = "no" onchange="showPescribed2()" <?php if($curriculum_pe_sports=='no'){echo $chk;} ?> />No</label>
														
														<table id="idPeSports" <?php if($curriculum_pe_sports=='yes'){echo 'style="display:block;"';} 
																						else {echo 'style="display:none;"';} ?> >
															<tr>
																<td>
																	who has prescribed it :<input type="text" id="txtPeSports" name="txtPeSports" class="form-control" value="<?php echo $who_has_prescrib_it; ?>" >	
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">What sports are played in the school (you may select more than one option)</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<?php  
																	$sportsPlay = array_map('trim', explode(",", $sports_played_in_school)); 
																?>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Athletics" <?=(in_array('Athletics', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Athletics</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Kho-Kho" <?=(in_array('Kho-Kho', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Kho-Kho</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Kabaddi" <?=(in_array('Kabaddi', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Kabaddi</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Volleyball" <?=(in_array('Volleyball', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Volleyball</td>
																<td style="width:20%"><input type="checkbox" name="sportPlayed[]" value="Judo" <?=(in_array('Judo', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Judo</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Handball" <?=(in_array('Handball', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Handball</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Football" <?=(in_array('Football', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Football</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Skating" <?=(in_array('Skating', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Skating</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Table tennis" <?=(in_array('Table tennis', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Table tennis</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Lawn tennis" <?=(in_array('Lawn tennis', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Lawn tennis</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Badminton" <?=(in_array('Badminton', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Badminton</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Basketball" <?=(in_array('Basketball', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Basketball</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Wrestling" <?=(in_array('Wrestling', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Wrestling</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Hockey" <?=(in_array('Hockey', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Hockey</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Yoga" <?=(in_array('Yoga', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Yoga</td>
															</tr>
															<tr>																
																<td><input type="checkbox" name="sportPlayed[]" value="Chess" <?=(in_array('Chess', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Chess</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Carom" <?=(in_array('Carom', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Carom</td>
																<td><input type="checkbox" name="sportPlayed[]" value="Gymnastics" <?=(in_array('Gymnastics', $sportsPlay)?'checked="checked"':NULL)?> >&nbsp;Gymnastics</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">What sports infrastructure available at the school ?</td>
                                                    <td class="col-md-8">
																		
														<table>
															<tr>
																<?php  
																$sports = array_map('trim', explode(",", $sports_infra)); 
																?>
																
																<td style="width:50%"><input type="checkbox" name="sportInfra[]" value="One Playground" <?=(in_array('One Playground', $sports)?'checked="checked"':NULL)?>   >&nbsp;One Playground</td>
																<td style="width:50%"><input type="checkbox" name="sportInfra[]" value="Separate playground for all sports" <?=(in_array('Separate playground for all sports', $sports)?'checked="checked"':NULL)?> >&nbsp;Separate playground for all sports</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="sportInfra[]" value="Room for indoor sports" <?=(in_array('Room for indoor sports', $sports)?'checked="checked"':NULL)?> >&nbsp;Room for indoor sports</td>
																<td><input type="checkbox" name="sportInfra[]" value="All equipment for sports" <?=(in_array('All equipment for sports', $sports)?'checked="checked"':NULL)?> >&nbsp;All equipment for sports</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sportInfra[]" value="Gym" <?=(in_array('Gym', $sports)?'checked="checked"':NULL)?> >&nbsp;Gym</td>
																<td><input type="checkbox" name="sportInfra[]" id="chkSportsInfraOther" onclick="showSportsInfraOther(this)" value="Others" <?=(in_array('Others', $sports)?'checked="checked"':NULL)?> >&nbsp;Others
																</td>
															</tr>
															<tr>
																<td>
																	<table id="idSportsInfraOther" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtSportsInfraOther" name="txtSportsInfraOther" class="form-control" value="<?php echo $sports_infra_other; ?>" >	
																			</td>
																		</tr>
																	</table>
																</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">How much has the school spend on sport & physical education development of student annually</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td><label class="radio-inline" for = "Less than 1 lac"><input type = "radio" name = "sportPhy" id = "Less_than_1_lac" value = "Less than 1 lac" <?php if($spend_on_sports=='Less than 1 lac'){echo $chk;} ?> />Less than 1 lac</label></td>
																<td><label class="radio-inline" for = "Up to 5 lacs"><input type = "radio" name = "sportPhy" id = "Up_to_5_lacs" value = "Up to 5 lacs" <?php if($spend_on_sports=='Up to 5 lacs'){echo $chk;} ?> />Up to 5 lacs</label></td>
															</tr>
															<tr>
																<td><label class="radio-inline" for = "5 lac ­ 10 lacs"><input type = "radio" name = "sportPhy" id = "5_lac_10_lacs" value = "5 lac ­ 10 lacs" <?php if($spend_on_sports=='5 lac ­ 10 lacs'){echo $chk;} ?> />5 lac ­ 10 lacs</label></td>
																<td><label class="radio-inline" for = "More than 10 lac"><input type = "radio" name = "sportPhy" id = "More_than_10_lac" value = "More than 10 lac" <?php if($spend_on_sports=='More than 10 lac'){echo $chk;} ?> />More than 10 lac</label></td>
															</tr>
															<tr>
																<td><label class="radio-inline" for = "No Budget for PE and sports"><input type = "radio" name = "sportPhy" id = "No_Budget_for_PE_and_sports" value = "No Budget for PE and sports" <?php if($spend_on_sports=='No Budget for PE and sports'){echo $chk;} ?> />No Budget for PE and sports</label></td>
																<td></td>
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">What are the major challenges faced in promoting PED in school </td>
                                                    <td class="col-md-8">
														<table>
															<?php  
																$promoped = array_map('trim', explode(",", $maj_chall_faced_ped)); 
															?>
															<tr>
																<td style="width:50%"><input type="checkbox" name="promotPED[]" value="Availability of fund" <?=(in_array('Availability of fund', $promoped)?'checked="checked"':NULL)?> >&nbsp;Availability of fund</td>
																<td style="width:50%"><input type="checkbox" name="promotPED[]" value="Lack of interest in students" <?=(in_array('Lack of interest in students', $promoped)?'checked="checked"':NULL)?> >&nbsp;Lack of interest in students</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of interest in parents" <?=(in_array('Lack of interest in parents', $promoped)?'checked="checked"':NULL)?> >&nbsp;Lack of interest in parents</td>
																<td><input type="checkbox" name="promotPED[]" value="Lack of availability of space/playground" <?=(in_array('Lack of availability of space/playground', $promoped)?'checked="checked"':NULL)?> >&nbsp;Lack of availability of space/playground</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of infrastructure" <?=(in_array('Lack of infrastructure', $promoped)?'checked="checked"':NULL)?> >&nbsp;Lack of infrastructure</td>
																<td><input type="checkbox" name="promotPED[]" value="Impact academics in negative manner" <?=(in_array('Impact academics in negative manner', $promoped)?'checked="checked"':NULL)?> >&nbsp;Impact academics in negative manner
																</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="promotPED[]" value="Lack of Trained PE teachers" <?=(in_array('Lack of Trained PE teachers', $promoped)?'checked="checked"':NULL)?> >&nbsp;Lack of Trained PE teachers</td>
																<td><input type="checkbox" name="promotPED[]" id="chkPromotPEDOther" onclick="showPromotPEDOther(this)" value="Others" <?=(in_array('Others', $promoped)?'checked="checked"':NULL)?> >&nbsp;Others
																</td>
															</tr>
															<tr>
																<td>
																	<table id="idpromotPED" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtSportsInfraOther2" name="txtSportsInfraOther2" class="form-control" value="<?php echo $maj_chall_faced_ped_other; ?>" >	
																			</td>
																		</tr>
																	</table>
																</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">If the challenges suggested by you are addressed by external agency are you willing to promote physical education in school</td>
                                                    <td class="col-md-8">
														<table id="idPeSports">
															<tr>
																<td style="width:35%;">
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "peSports" id = "yes" value = "yes" <?php if($promote_phy_edu=='yes'){echo $chk;} ?> />Yes</label>															
																</td>
																<td style="width:35%;">
																	<label class="radio-inline" for = "no"><input type = "radio" name = "peSports" id = "no" value = "no" <?php if($promote_phy_edu=='no'){echo $chk;} ?>  />No</label>														
																</td>
																<td style="width:30%;">
																	<label class="radio-inline" for = "maybe"><input type = "radio" name = "peSports" id = "maybe" value = "maybe" <?php if($promote_phy_edu=='maybe'){echo $chk;} ?> />Maybe</label>														
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>												
												<tr style="display:none;">
                                                    <td class="col-md-4">Is there a sport report card for each student ?</td>
                                                    <td class="col-md-8">
														<table id="idPeSports">
															<tr>
																<td style="width:50%;">
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "peSportsCard" id = "yes" value = "yes" <?php if($is_sport_card=='yes'){echo $chk;} ?> />Yes</label>															
																</td>
																<td style="width:50%;">
																	<label class="radio-inline" for = "no"><input type = "radio" name = "peSportsCard" id = "no" value = "no" <?php if($is_sport_card=='no'){echo $chk;} ?>  />No</label>														
																</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Did the school participate in sports competition this year ?</td>
                                                    <td class="col-md-8">
														<table id="idPeSports">
															<tr>
																<td width="40%">
																	<label>Inter School &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>															
																</td>
																<td width="30%">
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "interSchool" id = "yes" value = "yes" <?php if($Inter_School=='yes'){echo $chk;} ?> />Yes</label>															
																</td>
																<td width="30%">
																	<label class="radio-inline" for = "no"><input type = "radio" name = "interSchool" id = "no" value = "no" <?php if($Inter_School=='no'){echo $chk;} ?> />No</label>														
																</td>
															</tr>
														
															<tr>
																<td>
																	<label>District level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "districtLevel" id = "yes" value = "yes" <?php if($District_level=='yes'){echo $chk;} ?> />Yes</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "districtLevel" id = "no" value = "no" <?php if($District_level=='no'){echo $chk;} ?> />No</label>														
																</td>
															</tr>
														
															<tr>
																<td>
																	<label>State Level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "stateLevel" id = "yes" value = "yes" <?php if($State_Level=='yes'){echo $chk;} ?> />Yes</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "stateLevel" id = "no" value = "no" <?php if($State_Level=='no'){echo $chk;} ?> />No</label>														
																</td>
															</tr>
														
															<tr>
																<td>
																	<label>National level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "nationalLevel" id = "yes" value = "yes" <?php if($National_level=='yes'){echo $chk;} ?> />Yes</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "nationalLevel" id = "no" value = "no" <?php if($National_level=='no'){echo $chk;} ?> />No</label>														
																</td>
															</tr>
														
															<tr>
																<td>
																	<label>International level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "internationalLevel" id = "yes" value = "yes" <?php if($International_level=='yes'){echo $chk;} ?> />Yes</label>															
																</td>
																<td>
																	<label class="radio-inline" for = "no"><input type = "radio" name = "internationalLevel" id = "no" value = "no" <?php if($International_level=='no'){echo $chk;} ?> />No</label>														
																</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>		
												<!-- New  -->
												<tr style="display:none;">
                                                    <td class="col-md-4">Name the three most popular sports among middle & high school students.</td>
                                                    <td class="col-md-8">
														1. <input type="text" id="txtPopularSports1" name="txtPopularSports1" class="form-control" value="<?php echo $popular_sprt1; ?>" >
														2. <input type="text" id="txtPopularSports2" name="txtPopularSports2" class="form-control" value="<?php echo $popular_sprt2; ?>" >
														3. <input type="text" id="txtPopularSports3" name="txtPopularSports3" class="form-control" value="<?php echo $popular_sprt3; ?>" >
                                                    </td>
                                                </tr>
												<tr style="display:none;">
                                                    <td class="col-md-4">In your opinion ­ should sports/ physical activity be part of the curriculum in schools ?  Why ?</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td width="25%">
																	<label class="radio-inline" for = "yes"><input type = "radio" name = "peSportsOpinion" id = "yes" value = "yes" checked onchange="showSportsOpinion1()" <?php if($is_sprt_part_curri=='yes'){echo $chk;} ?> />Yes</label>
																</td>
																<td width="10%">Why</td>
																<td width="65%">
																	<input type="text" width="100%" id="txtSportsOpinion1" name="txtSportsOpinion1" class="form-control" value="<?php echo $is_sprt_part_curri_yes; ?>" >
																</td>
															</tr>
															
															<tr>
																<td width="25%">
																	<label class="radio-inline" for = "no"><input type = "radio" name = "peSportsOpinion" id = "no" value = "no" onchange="showSportsOpinion2()" <?php if($is_sprt_part_curri=='no'){echo $chk;} ?> />No</label>
																</td>
																<td width="10%">Why</td>
																<td width="65%">
																	<input type="text" width="100%" id="txtSportsOpinion2" name="txtSportsOpinion12" class="form-control" readonly value="<?php echo $is_sprt_part_curri_no; ?>" >
																</td>
															</tr>															
														</table>
														
                                                    </td>
                                                </tr>
												<!-- New  -->
												
												<tr style="display:none;">
                                                    <td class="col-md-4">Who fund sport activities in schools</td>
                                                    <td class="col-md-8">
														<table>
															<tr>
																<td style="width:50%"><input type="checkbox" name="sportfund[]" value="Self-funded">&nbsp;Self-funded</td>
																<td style="width:50%"><input type="checkbox" name="sportfund[]" value="Government funded">&nbsp;Government funded</td>
																
															</tr>
															<tr>
																<td><input type="checkbox" name="sportfund[]" value="Trust funded">&nbsp;Trust funded</td>
																<td><input type="checkbox" name="sportfund[]" value="NGO funded">&nbsp;NGO funded</td>
															</tr>
															<tr>
																<td><input type="checkbox" name="sportfund[]" value="Corporate">&nbsp;Corporate</td>
																<td><input type="checkbox" name="sportfund[]" id="chkSportFundOther" onclick="showSportFund(this)" value="Others">&nbsp;Others
																</td>
															</tr>
															<tr>
																<td>
																	<table id="idSportFundOther" style="display:none;">
																		<tr>
																			<td colspan="2">
																				Other :<input type="text" id="txtSportFundOther" name="txtSportFundOther" class="form-control" >	
																			</td>
																		</tr>
																	</table>
																</td>
																
															</tr>
														</table>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Any other information that is important but not covered above</td>
                                                    <td class="col-md-8">
														<textarea class="form-control" rows="5" id="otherInfo" name="otherInfo" readonly ><?php echo $any_other_info_not_covered; ?></textarea>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Name of the person submitting this form</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtNameOfPerson" name="txtNameOfPerson" class="form-control" value="<?php echo $name_who_fill_form; ?>" required readonly>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Designation of the person submitting this form</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtDesigOfPerson" name="txtDesigOfPerson" class="form-control" value="<?php echo $desig_who_fill_form; ?>" required readonly>
                                                    </td>
                                                </tr>
								<?php } ?>	
												<tr>
									<td colspan="2" class="col-md-12">
										<header>
											<center>
												<h5 class="heading">RILM admin Entery Part</h5>
											</center>
										</header>
									</td>
								</tr>
								<tr style="display:none;">
									<td class="col-md-4">survey id</td>
									<td class="col-md-8">
										<input type="text" readonly id="txtsurveyid" name="txtsurveyid" class="form-control" value="<?php echo $_GET['id']; ?>" >
									</td>
								</tr>
								<?php
									$surverid=$_GET['id'];
									$sqlunit2="Select * from tbl_E_Learn_Maharashtra_unit2 where survey_id='$surveyid'";
									$res_unit2 = mysql_query($sqlunit2);
									while($rowUnit2 = mysql_fetch_array($res_unit2)){
										extract($rowUnit2);
								?>
								<tr>												
									<td class="col-md-4">Select your identity :</td>
									<td class="col-md-8">
										<label class="radio-inline" for = "rotary"><input type = "radio" name = "areyoua" id = "rotary" disabled value = "Rotary" disabled <?php if($rilm_identity=='Rotary'){echo $chk;} ?> />Rotary</label>
										<label class="radio-inline" for = "innerwheel"><input type = "radio" name = "areyoua" id = "innerwheel" disabled value = "Inner Wheel" disabled <?php if($rilm_identity=='Inner Wheel'){echo $chk;} ?> />Inner Wheel</label>
									</td>	
									
								</tr>
								
								<tr>
									<td class="col-md-4">RI District :</td>
									<td class="col-md-8">
										<select class="form-control" id="ddDistrict" name="ddDistrict" onchange='showClub(this.value)' readonly  >
										 <option value="<?php echo $distirct; ?>"><?php echo $distirct; ?></option>
										</select>																
									</td>
									
								</tr>
								<tr>
									<td class="col-md-4">Name of Club :</td>
									<td class="col-md-8">
										<select class="form-control" id="ddClub" name="ddClub" readonly >
											<option value="<?php echo $club; ?>"><?php echo $club; ?></option>								
										</select>
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Date of installation :</td>
									<td class="col-md-8">
										<input type="text" id="txtDtOfInstallation" name="txtDtOfInstallation" class="form-control" onkeypress="return restrictCharacters(event);" readonly value="<?php echo $dt_installation; ?>" />
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Company/Make</td>
									<td class="col-md-8">
										<input type="text" id="txtCompanyMake" name="txtCompanyMake" class="form-control" maxlength="100" readonly value="<?php echo $company_make; ?>"  >
									</td>
								</tr>
								<tr>
									<td class="col-md-4">TV Model</td>
									<td class="col-md-8">
										<input type="text" id="txtTVModel" name="txtTVModel" class="form-control" maxlength="100" readonly value="<?php echo $tv_model; ?>" >
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Rotary contact person name</td>
									<td class="col-md-8">
										<input type="text" id="txtRotaryContactPerName" name="txtRotaryContactPerName" class="form-control" maxlength="100" readonly value="<?php echo $name; ?>" >
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Rotary contact person mobile</td>
									<td class="col-md-8">
										<input type="text" id="txtRotaryContactPerMobNo" name="txtRotaryContactPerMobNo" class="form-control" maxlength="10" readonly onkeypress="return IsNumeric202(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $mobile; ?>" />
														<span id="error202" style="color: Red; display: none">* Input digits (0 - 9)</span>	
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Rotary contact person email id</td>
									<td class="col-md-8">
										<input type="text" id="txtRotaryContactPerEmail" name="txtRotaryContactPerEmail" class="form-control" maxlength="100" onblur="checkEmail1(this.value)" readonly value="<?php echo $email; ?>" >
									</td>
								</tr>
								<?php
									}
								?>
								
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
															<!-- <button class="btn btn-primary" name="back4" onClick="return finalValidate();" onClick="showBack('five')">Back</button> -->
                                                            <a href="dashboardadmin.php"><button type="button" class="btn btn-primary">Back</button></a>
                                                        </div>
                                                    </td>
                                                </tr>
		
    </form> 
	
                                            </tbody>
                                        </table>
</div>										
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-2"></div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->
    </div>
	</div>
	<br/>
	<br/>
	<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
</div>
<!-- Wrapper End -->
</body>
</html>
