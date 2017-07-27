<?php
include('include/config.php');
session_start();

include('volunteer_session_check.php');

$id = $_GET['ver'];
$query = "Select * from volunteer_form where vol_id = '$id'";
$res = mysql_query($query);
while($data = mysql_fetch_array($res)){
	extract($data);
}
SESSION_START();
$_SESSION['form_volunteer_exist'] = 'abc';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Volunteer Form |
    <?php include('include/title.php'); ?>
    </title>

	<!-- Css Files -->
	<?php include('include/favicon.php'); ?>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="css/color.css" rel="stylesheet">
	<link href="css/dl-menu.css" rel="stylesheet">
	<link href="css/flexslider.css" rel="stylesheet">
	<link href="css/prettyphoto.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	

	<script type="text/javascript">
    function popUp(URL) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=350,left = 363,top = 144');");
    } 
	</script>
    <script type="text/javascript">
    function popUp1(URL) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=350,left = 363,top = 144');");
    } 
	</script>
    <script type="text/javascript">
    function popUp2(URL) {
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=350,left = 363,top = 144');");
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
.tooltip2 {
    position: relative;
    display: inline-block;
}

.tooltip2 .tooltiptext {
    visibility: hidden;
    width: 350px;
    background-color: #7c7b7a;
    color: #fff;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: -5px;
    right: 105%; 
}

.tooltip2 .tooltiptext::after {
    content: " ";
    position: absolute;
    top: 100%; /* At the bottom of the tooltip */
    left: 50%;
    margin-left: -5px;
    border-color: black transparent transparent transparent;
}
.tooltip2:hover .tooltiptext {
    visibility: visible;
	padding:8px;
}
</style>
<style>
.tooltip1 {
        display: '';
    }
	.tooltip2 {
        display: '';
    }
	.as-footer {
		display: '';
	}
	.as-absolute{
		display: '';
	}
	.as-breadcrumb {
		display: '';
	}
@media only screen and (max-width: 500px) {
    .tooltip1 {
        display: none;
    }
	.tooltip2 {
        display: none;
    }
	.as-footer {
		display: none;
	}
	.as-absolute{
		display: none;
	}
	.as-breadcrumb {
		display: none;
	}
}
</style>
<script>
function validateForm() {
	
    var c1 = document.getElementById("c1").value;
	var c2 = document.getElementById("c2").value;
	var c3 = document.getElementById("c3").value;
	var c4 = document.getElementById("c4").value;
	var c5 = document.getElementById("c5").value;
	var c6 = document.getElementById("c6").value;
	var c7 = document.getElementById("c7").value;
	var c8 = document.getElementById("c8").value;
	var c9 = document.getElementById("c9").value;
	var c10 = document.getElementById("c10").value;
	var c11 = document.getElementById("c11").value;
	var c12 = document.getElementById("c12").value;
	var c13 = document.getElementById("c13").value;
    if (c1 == "" || c2 == "" || c3 == "" || c4 == "" || c5 == "" || c6 == "" || c7 == "" || c8 == "" || c9 == "" || c10 == "" || c11 == "" || c12 == "" || 
	c13 == "") {
        alert("Please Select any areas of work.");
        return false;
    }
}

</script>
<style>
.box {
  position: relative;
  background: #f4f4f4;
  border-top: 2px solid #c1c1c1;
  margin-bottom: 20px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  width: 100%;
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
}
.box.box-primary {
	border-top-color: #3c8dbc;
}

</style>
<script>

function valthisform()
{
	var c1=document.getElementById("txt1").value;
	if(c1=="teacher_train")
	{
		var checkboxsQualification=document.getElementsByName("qualification[]");
		var okay=false;
		for(var i=0,l=checkboxsQualification.length;i<l;i++)
		{
			if(checkboxsQualification[i].checked)
			{
				okay=true;
				break;
			}
		}
		if(okay)
		{
			//alert("Thank you for checking a checkbox");
			var hiddenform = document.getElementById("txtYes").value;
			  if(hiddenform == "Yes")
			  {
				var checkboxstraning=document.getElementsByName("traning[]");
				var okay=false;
				for(var i=0,l=checkboxstraning.length;i<l;i++)
				{
					if(checkboxstraning[i].checked)
					{
						okay=true;
						break;
					}
				}
				if(okay)
				{
					
					var checkboxsdays=document.getElementsByName("week[]");
					var okaydays=false;
					for(var i=0,l=checkboxsdays.length;i<l;i++)
					{
						if(checkboxsdays[i].checked)
						{
							okaydays=true;
							break;
						}
					}
					if(okaydays)
					{
						//alert("Thank you for checking a checkbox");week
						var othertxt=document.getElementById("txtOther").value;
						if (othertxt == "Other"){
							var othermsg = document.getElementById("txtPassportNumber2").value;
							if(othermsg==""){
								alert("Please specify other details");
								return false;
							}
						}
					}
					else {
						alert("Please select the days of the week on which you are available");
						return false;
					}
					
				}
				
				else {
					alert("Please select the topics on which you can take up 4-6 hours training? (You may select more than one option.)");
					return false;
				}	
							
			}
				
		}
		else {
			alert("Please select your qualification");
			return false;
		}	
	
					
	}
	//2nd checkbox validation
	
	var c4=document.getElementById("txt4").value;
	if(c4=="supplment_teach")
	{
		var checkboxs=document.getElementsByName("class[]");
		var okay=false;
		for(var i=0,l=checkboxs.length;i<l;i++)
		{
			if(checkboxs[i].checked)
			{
				okay=true;
				break;
			}
		}
		if(okay)
		{
			//alert("Thank you for checking a checkbox");activity
			var checkboxs=document.getElementsByName("activity[]");
				var okay=false;
				for(var i=0,l=checkboxs.length;i<l;i++)
				{
					if(checkboxs[i].checked)
					{
						okay=true;
						break;
					}
				}
				if(okay)
				{
					//alert("Thank you for checking a checkbox");activity
					var checkboxsdays=document.getElementsByName("week_01[]");
					var okaydays=false;
					for(var i=0,l=checkboxsdays.length;i<l;i++)
					{
						if(checkboxsdays[i].checked)
						{
							okaydays=true;
							break;
						}
					}
					if(okaydays)
					{
						//alert("Thank you for checking a checkbox");week
						var cocurricular=document.getElementById("txtActivity").value;
						if (cocurricular == "curricular activity"){
							var cocurricular_msg = document.getElementById("co_activity02").value;
							if(cocurricular_msg==""){
								alert("Please specify your previous experience in teaching");
								return false;
							}
						}
						var oriented_txt=document.getElementById("txtOriented").value;
						if (oriented_txt == "oriented activities"){
							var othermsg = document.getElementById("co_activity03").value;
							if(othermsg==""){
								alert("Please specify what kind of subject support would you like to provide?");
								return false;
							}
						}
						
					}
					else {
						alert("Please select the days of the week on which you are available");
						return false;
					}
				}
				else {
					alert("Please select your activities?");
					return false;
				}	
		}
		else {
			alert("Please select the class which you would like to teach?");
			return false;
		}	
		
	}
	//Child Screening Validation ....
	var c3=document.getElementById("txtchild_screen").value;
	if(c3=="child_screen")
	{
		var checkboxs=document.getElementsByName("week_screen[]");
		var okay=false;
		for(var i=0,l=checkboxs.length;i<l;i++)
		{
			if(checkboxs[i].checked)
			{
				okay=true;
				break;
			}
		}
		if(okay)
		{
			//alert("Thank you for checking a checkbox");activity
		}
		else {
			alert("Please select the days of the week on which you are available?");
			return false;
		}	
		
	}
	//Child Screening Validation ....
	var c6=document.getElementById("txtExtra_Curricular_Activities").value;
	if(c6=="curricular_activity")
	{
		var checkboxs=document.getElementsByName("week_07[]");
		var okay=false;
		for(var i=0,l=checkboxs.length;i<l;i++)
		{
			if(checkboxs[i].checked)
			{
				okay=true;
				break;
			}
		}
		if(okay)
		{
			//alert("Thank you for checking a checkbox");time_extra_curricu
				var checkboxs1=document.getElementsByName("time_extra_curricu[]");
				var okay1=false;
				for(var i=0,l=checkboxs1.length;i<l;i++)
				{
					if(checkboxs1[i].checked)
					{
						okay1=true;
						break;
					}
				}
				if(okay1)
				{
					//alert("Thank you for checking a checkbox");time_extra_curricu
				}
				else {
					alert("Please select your preferred time slot (You may select more than one)");
					return false;
				}	
		}
		else {
			alert("Please select the days of the week on which you are available");
			return false;
		}	
		
	}	
	
	//Volunteer Teacher For Functional Literacy ....
	var c2=document.getElementById("txtVoln_Teacher_For_Func_Literacy").value;
	if(c2=="volunteer_teacher")
	{
		var checkboxs=document.getElementsByName("extra_activity_conduct[]");
		var okay=false;
		var count=0;
		for(var i=0,l=checkboxs.length;i<l;i++)
			{
				if(checkboxs[i].checked)
				{
					count=count+1;
					if(count=="2")
					{
						okay=true;
						break;
					}					
				}				
			}
					
		if(okay)
		{
			
			//alert("Thank you for checking a checkbox");time_extra_curricu
			var othertxt2=document.getElementById("txt_extra_curricular_activities").value;
			if (othertxt2 == "Other extra activity"){
				var othermsg2 = document.getElementById("txtPassportNumber").value;
				if(othermsg2==""){
					alert("Please specify other details");
					return false;
				}
			}
			
				var checkboxs1=document.getElementsByName("week1[]");
				var okay1=false;
				for(var i=0,l=checkboxs1.length;i<l;i++)
				{
					if(checkboxs1[i].checked)
					{
						okay1=true;
						break;
					}
				}
				if(okay1)
				{
					//alert("Thank you for checking a checkbox");time_volunteer_teacher
					var checkboxs2=document.getElementsByName("time[]");
					var okay2=false;
					for(var i=0,l=checkboxs2.length;i<l;i++)
					{
						if(checkboxs2[i].checked)
						{
							okay2=true;
							break;
						}
					}
					if(okay2)
					{
						//alert("Thank you for checking a checkbox");time_volunteer_teacher
					}
					else {
						alert("Please select your preferred time slot :(You may select more than one)");
						return false;
					}	
				
				}
				else {
					alert("Please select the days of the week on which you are available");
					return false;
				}	
			
				
		}
		else {
			alert("Please select two extra-curricular activities that you would like to conduct aside from teaching.");
			return false;
		}	
		
	}	
	
	//teacher traning at asha kiran 
	var c16=document.getElementById("txt_teacher_traning_at_asha_kiran").value;
	if(c16=="teacher_traning_at_asha_kiran")
	{
		var checkboxs=document.getElementsByName("teacher_training_qualification[]");
		var okay=false;
		var radioboxs=document.getElementsByName("yearsExpInTeachTraining[]");
		var radioOkay=false;
		var chkWeek=document.getElementsByName("teacherTrainingweek[]");
		var weekokay=false;
		var weekcount=0;
		var count=0;
		var radiocount=0;
		
		if(document.getElementById("training_teacher_name").value=="")
		{
			alert("Please Input Name");
			document.getElementById("training_teacher_name").focus();
			return false;
		}
		else if(document.getElementById("training_teacher_address").value=="")
		{
			alert("Please Input Address");
			document.getElementById("training_teacher_address").focus();
			return false;
		}
		else if(document.getElementById("training_teacher_city").value=="")
		{
			alert("Please Input City");
			document.getElementById("training_teacher_city").focus();
			return false;
		}
		else if(document.getElementById("training_teacher_pin_code").value=="")
		{
			alert("Please Input Pin Code");
			document.getElementById("training_teacher_pin_code").focus();
			return false;
		}
		else if(document.getElementById("training_teacher_mob_no").value=="")
		{
			alert("Please Input Mobile No");
			document.getElementById("training_teacher_mob_no").focus();
			return false;
		}
		else if(document.getElementById("training_teacher_email").value=="")
		{
			alert("Please Input Email");
			document.getElementById("training_teacher_email").focus();
			return false;
		}
		else if(document.getElementById("selectEduQualification").value=="")
		{
			alert("Please Input Educational Qualification");
			document.getElementById("selectEduQualification").focus();
			return false;
		}
		
		for(var i=0,l=checkboxs.length;i<l;i++)
			{
				if(checkboxs[i].checked)
				{
					count=count+1;
					if(count=="1")
					{
						okay=true;
						break;
					}					
				}				
			}
					
		if(okay)
		{
			if(document.getElementById("teachTraningExpYes").checked)
			{
				if(document.getElementById("train_mgm_cls").value=="")
				{
					alert("Do you think you are eligible to take up training on classroom management skills of the teachers who are teaching Hindi/Bengali, English and Mathematics ?");
					document.getElementById("train_mgm_cls").focus();
					return false;
				}
				else {	
					for(var i=0,l=radioboxs.length;i<l;i++)
						{
							if(radioboxs[i].checked)
							{
								radiocount=radiocount+1;
								if(radiocount=="1")
								{
									radioOkay=true;
									break;
								}					
							}				
						}
					if(radioOkay)
					{
						if(document.getElementById("training_exp_detail").value=="")
						{
							alert("Please provide details of the experience you have in conducting trainings on these topics.");
							document.getElementById("training_exp_detail").focus();
							return false;
						}
						//var chkWeek=document.getElementsByName("teacherTrainingweek[]");
						//var weekokay=false;
						//var weekcount=0;
						else{
							for(var i=0,l=chkWeek.length;i<l;i++)
								{
									if(chkWeek[i].checked)
									{
										weekcount=weekcount+1;
										if(weekcount=="1")
										{
											weekokay=true;
											break;
										}					
									}				
								}
							if(weekokay)
							{
								//teachr_training_hours
								if(document.getElementById("teachr_training_hours").value=="")
								{
									alert("Please mention total hours in a month that you would be able to volunteer for such training");
									document.getElementById("teachr_training_hours").focus();
									return false;
								}
							}
							else{
								alert("Please select the days of the week on which you are available");
								return false;
							}
						}
					}
					else {
						alert("How many years of experience do you have on teacher training ?");
						return false;
					}
				}
			}
				
		}
		else {
			alert("Please select your qualification.");
			return false;
		}
		
		
	}
	
	//Supplemental Educative Sessions ....
	var c5=document.getElementById("txt_educative_session").value;
	if(c5=="educative_session")
	{
		var checkboxs=document.getElementsByName("week_06[]");
		var okay=false;
		for(var i=0,l=checkboxs.length;i<l;i++)
			{
				if(checkboxs[i].checked)
				{				
					okay=true;
					break;									
				}				
			}
					
		if(okay)
		{
			//time
			var checkboxs=document.getElementsByName("time_06[]");
			var okay=false;
			for(var i=0,l=checkboxs.length;i<l;i++)
				{
					if(checkboxs[i].checked)
					{				
						okay=true;
						break;									
					}				
				}
						
			if(okay)
			{
					
			}
			else {
				alert("Please select your preferred time slot :(You may select more than one)");
				return false;
			}	
			
		}
		else {
			alert("Please select the days of the week on which you are available");
			return false;
		}	
		
	}	
	
	form.submit();
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

function selectOther(){
	var other = document.getElementById("selectState").value;
	//alert(other); trOtherState,lblOtherState,txtOtherState
	if(other=="Others")
	{
		document.getElementById("trOtherState").style.display="block";
		
	}
	else{
		document.getElementById("trOtherState").style.display="none";
	}
}	

function numbersOnly(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}	

function ValidateEmail(Email){
    var email=$('#training_teacher_email').val();

    if(email!='')
    {
        var email_valid= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!email_valid.test(email)){
            alert("Not a valid email"); 
            document.getElementById('training_teacher_email').value = '';
			document.getElementById('training_teacher_email').focus();
            return false;
        }
        
    }
}
</script>		
	</head>
	<body>

<!--// Main Wrapper //-->
<div class="as-mainwrapper"> 
      
      <!--// Header //-->
      <header id="as-header" >

        <!--// TopStrip //-->
        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-topstrip as-bgcolor">
            <?php include('include/top-head.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-header-bar">
            <div class="row">
			<div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
				<div class="col-md-2">
					<a style="float:left;" href="index.php" class="logo1"><img src="images/logo2.png" alt=""></a>
				</div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('include/navigation_new.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
			  </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header //-->

      <div class="as-minheader">
       
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Volunteer Registration</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Volunteer Registration</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--// Main Content //-->
      <div class="as-main-content"> 
    
    <!--// MainSection //-->
    <div class="as-main-section">
          <div class="container">
        <div class="row">
              <div class="col-md-12">
            <div class="as-detail-editor">
                  <br>
                  
                  
                  
                  <!--<table width="100%" border="1">
                <tbody>
                      <tr>
                    <td style="font-weight:bold;">Name : <?php echo $name; ?></td>
                    <td style="font-weight:bold;">District : <?php echo $rotary_district; ?></td>
                    <?php
					if($vol_cat == 'Other'){
					?>
                    
                    <?php
					}
					else{
					?>
                    <td style="font-weight:bold;">Club Name: <?php echo $club; ?></td>
                    <?php
					}
					?>
                  </tr>
                      <tr>
                    <td style="font-weight:bold;">Mobile : <?php echo $mobile; ?></td>
                    <td style="font-weight:bold;">Email : <?php echo $email; ?></td>
                    <td style="font-weight:bold;">Type : <?php echo $vol_cat; ?></td>
                  </tr>
                    </tbody>
              </table>-->
              <?php
					if(isset($_POST['submit'])){
                    $c1 = $_POST['c1'];
                    $c2 = $_POST['c2'];
                    $c3 = $_POST['c3'];
                    $c4 = $_POST['c4'];
					$c5 = $_POST['c5'];
					$c6 = $_POST['c6'];
					
					$c7 = $_POST['c7'];
					$c8 = $_POST['c8'];
					$c9 = $_POST['c9'];
					$c10 = $_POST['c10'];
					$c11 = $_POST['c11'];
					$c12 = $_POST['c12'];
					
					$c13 = $_POST['c13'];
					$c16 = $_POST['c16'];
					
					///////////////////////// Teacher support /////////////////////////////////////////////
					if($c1 == 'teacher_train' && $c1!=''){$chosenText1='Teacher Training';}
					if($c4 == 'supplment_teach' && $c4!=''){$chosenText2='Supplemental Teaching';}
					if($c3 == 'child_screen' && $c3!=''){$chosenText3='Child Screening';}
					
					if($c2 == 'volunteer_teacher' && $c2!=''){$chosenText4='Volunteer Teacher for Functional Literacy';}
					if($c5 == 'educative_session' && $c5!=''){$chosenText5='Supplemental Educative Sessions';}
					if($c6 == 'curricular_activity' && $c6!=''){$chosenText6='Extra Curricular Activities';}
					if($c7 == 'graphic_design' && $c7!=''){$chosenText7='Graphic Design';}
					if($c8 == 'content_write' && $c8!=''){$chosenText8='Content Writing and Editing';}
					if($c9 == 'audio_production' && $c9!=''){$chosenText9='Audio Visual Productions';}
					if($c10 == 'photography' && $c10!=''){$chosenText10='photography';}
					if($c11 == 'social_media' && $c11!=''){$chosenText11='Social Media Communications';}
					if($c12 == 'it_dev' && $c12!=''){$chosenText12='IT Development';}
					if($c13 == 'fund_raise' && $c13!=''){$chosenText13='Help Raise Funds';}
					if($c16 == 'teacher_traning_at_asha_kiran' && $c16!=''){$chosenText16='Training of Teachers at the Asha Kiran Centres';}
		   ?>
		   <div class="row">
					<div class="col-md-12">
						<div class="box box-primary">						
							<div class="box-body">
								<div class="form-group">
									<br/> 
										<input type="text" id="txt1" name="txt1" readonly style="display:none;" value=<?php echo $c1; ?> >
										<input type="text" id="txtYes" name="txtYes" readonly style="display:none;" value='' >
										<input type="text" id="txtOther" name="txtOther" readonly style="display:none;" value='' >
										
										<input type="text" id="txt4" name="txt4" readonly style="display:none;" value=<?php echo $c4; ?> >
										<input type="text" id="txtActivity" name="txtActivity" readonly style="display:none;" value='' >
										<input type="text" id="txtOriented" name="txtOriented" readonly style="display:none;" value='' >
										
										<input type="text" id="txtchild_screen" name="txtchild_screen" readonly style="display:none;" value=<?php echo $c3; ?>>
										<input type="text" id="txtExtra_Curricular_Activities" readonly style="display:none;" name="txtExtra_Curricular_Activities" value=<?php echo $c6; ?>>
										
										<input type="text" id="txtVoln_Teacher_For_Func_Literacy" readonly style="display:none;" name="txtVoln_Teacher_For_Func_Literacy" value=<?php echo $c2; ?>>
										<input type="text" id="txt_extra_curricular_activities" readonly style="display:none;" name="txt_extra_curricular_activities" value=''>
										
										<input type="text" id="txt_educative_session" readonly style="display:none;" name="txt_educative_session" value=<?php echo $c5; ?>>
										<input type="text" id="txt_teacher_traning_at_asha_kiran" readonly style="display:none;" name="txt_teacher_traning_at_asha_kiran" value=<?php echo $c16; ?>>
										
									<h2 style="text-align:left">You have chosen to Volunteer for :</h2>
									<div id="div1" <?php if($c1 == 'teacher_train' && $c1!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText1; ?></div>
									<div id="div2" <?php if($c4 == 'supplment_teach' && $c4!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText2; ?></div>
									<div id="div3" <?php if($c3 == 'child_screen' && $c3!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText3; ?></div>
									<div id="div6" <?php if($c6 == 'curricular_activity' && $c6!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText6; ?></div>
									<div id="div4" <?php if($c2 == 'volunteer_teacher' && $c2!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText4; ?></div>
									<div id="div5" <?php if($c5 == 'educative_session' && $c5!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText5; ?></div>
									<div id="div13" <?php if($c13 == 'fund_raise' && $c13!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText13; ?></div>
									<div id="div7" <?php if($c7 == 'graphic_design' && $c7!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText7; ?></div>
									<div id="div8" <?php if($c8 == 'content_write' && $c8!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText8; ?></div>									
									<div id="div9" <?php if($c9 == 'audio_production' && $c9!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText9; ?></div>
									<div id="div10" <?php if($c10 == 'photography' && $c10!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText10; ?></div>
									<div id="div11" <?php if($c11 == 'social_media' && $c11!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText11; ?></div>
									<div id="div12" <?php if($c12 == 'it_dev' && $c12!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText12; ?></div>
									<div id="div16" <?php if($c16 == 'teacher_traning_at_asha_kiran' && $c16!='')
															{echo 'style="display:block;"';}
														else{echo 'style="display:none;"';}
															?>><?php echo $chosenText16; ?></div>
															
									<br/>
								</div>
							</div>				
						</div>
					</div>
				</div>
                  <br>
                  <br>
                  <!--<form action="vertical_form.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
                    <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td align="center"><strong>Teacher Support</strong></td>
                          <td align="center"><strong>Adult Literacy</strong></td>
                          
                        </tr>
                       
                    <tr>
                      <td><input type="checkbox" name="c1" value="teacher_train" id="c1">
                      Teacher Training <div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
                         <strong><u>Teacher Training</u></strong><br>
                         A Teacher Trainer will be responsible for training of teachers from government schools as per the requirement of Rotary/Inner Wheel
                         Clubs. Our training structure includes at least a one day 4-6 hour training for teachers followed by a Refresher Training after 1.5
                         months.  
                         </span>
                         </div></td>
                      <td><input type="checkbox" name="c2" value="volunteer_teacher" id="c2">
                      Volunteer Teacher for Functional Literacy<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
                         <strong><u>Volunteer Teacher for Functional Literacy</u></strong><br>
                         A volunteer teacher would have the opportunity to mentor and take functional literacy classes for adult learners in Swabhiman 
                         Centres.
                         </span>
                         </div></td>
                         <?php
							 if($vol_cat == 'Other'){
						 }
						 else{
						 ?>
						
				   	     <?php
						   }
						 ?>
                        </tr>
                        
                    	<tr>
                          <td><input type="checkbox" name="c4" value="supplment_teach" id="c4">
                        Supplemental Teaching<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
                         <strong><u>Supplemental Teaching</u></strong><br>
                         Supplemental teaching requires volunteer to take up co-scholastic activities in government schools to provide students exposure to 
                         creative activities and subject-oriented support. 
                         </span>
                         </div></td>
                          <td><input type="checkbox" name="c5" value="educative_session"  id="c5">
                        Supplemental Educative Sessions<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
                         <strong><u>Supplemental Educative Sessions</u></strong><br>
                         Aimed at awareness generation on relevant topics and skill building for adult learners, this initiative is geared to educate and
                         engage them in different workshops that will add value to their lives.  
                         </span>
                         </div></td>
                          
                        </tr>
                        <tr><td align="center"><strong>Child Development</strong></td>
                        
                        <?php
							 if($vol_cat == 'Rotarian' || $vol_cat == 'Inner Wheel'){
						 ?>
                         <td><input type="checkbox" name="c13" value="fund_raise" id="c13">&nbsp;&nbsp;<strong>Fundraising</strong></td>
                         <?php
						}
						 else{
						 ?>
						 
				   	     <?php
						   }
						 ?>
                        </tr>
                        <tr> <td><input type="checkbox" name="c3" value="child_screen" id="c3">
						 Child Screening <div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
                         <strong><u>Child Screening</u></strong><br>
                         Undertake a screening process for the out-of-school children who will be provided bridge classes in the Asha Kiran Centres before 
                         mainstreaming into Government/Government-Aided Schools. Screening is a full-day activity.
                         </span>
                         </div>
                         </td></tr>
                         <tr><td><input type="checkbox" name="c6" value="curricular_activity" id="c6">
                        Extra Curricular Activities<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
                         <strong><u>Extra Curricular Activities</u></strong><br>
                         Undertake co-curricular activities to add value to the bridge classes undertaken for out-of-school children in RILM’s 
                         Asha Kiran Centres for bridge classes geared to sending children back to school.   
                         </span>
                         </div></td></tr>
                        <tr>
                          <td align="center" colspan="2"><strong>Communications</strong></td>
                          <?php
							 if($vol_cat == 'Rotarian' || $vol_cat == 'Inner Wheel'){
						 ?>
                         
                         <?php
						}
						 else{
						 ?>
						 
				   	     <?php
						   }
						 ?> 
                        </tr>
                        
                        <tr>
                        <td colspan="2">
                         <table>
                         <tr>
                          <td><input type="checkbox" name="c7" value="graphic_design" id="c7">&nbsp;&nbsp;Graphic Design</td>
                          <td><input type="checkbox" name="c8" value="content_write" id="c8">&nbsp;&nbsp;Content Writing and Editing</td>
                          <td><input type="checkbox" name="c9" value="audio_production" id="c9">&nbsp;&nbsp;Audio Visual Productions</td>
                         </tr>
                         
                         <tr>
                          <td><input type="checkbox" name="c10" value="photography" id="c10">&nbsp;&nbsp;Photography</td>
                          <td><input type="checkbox" name="c11" value="social_media" id="c11">&nbsp;&nbsp;Social Media Communications</td>
                          <td><input type="checkbox" name="c12" value="it_dev" id="c12">&nbsp;&nbsp;IT Development</td>
                         </tr>
                         
                         </table>
                        </td>
                        </tr> 
                    	<table class="table-responsive">
                         <tr>
                          <td align="center">
                         <div class="as-donation-form">
                         <ul class="row">
                          <li class="col-md-12"><input type="submit" value="Next" class="as-bgcolor" name="submit" style="text-align:center;"></li>
                         </ul>
                         </div>
                          </td>
                         </tr> 
                        </table> 

                  </tbody>
                    </table>
                 </form>-->
              
<!-- <form action="1.php" method="post" enctype="multipart/form-data" name="full_form" id="form" > -->
<form action="submit_form.php" method="post" enctype="multipart/form-data" name="full_form" id="form" >
<!-- <form action="submit_form.php" method="post" enctype="multipart/form-data" name="full_form" id="form" onsubmit="return checkCheckBox(this)"> -->
                <?php
					///////////////////////// Teacher support /////////////////////////////////////////////
					if($c1 == 'teacher_train' && $c1!=''){
					?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">					
                    <h2>Teacher Support</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Teacher Training </strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select your qualification :</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="qualification[]" value="Academician">
                        &nbsp;Academician<br>
                        <input type="checkbox" name="qualification[]" value="Educationist" >
                        &nbsp;Educationist<br>
                        <input type="checkbox" name="qualification[]" value="Teacher">
                        &nbsp;Teacher<br>
                        <input type="checkbox" name="qualification[]" value="Professor">
                        &nbsp;Professor<br>
                        <input type="checkbox" name="qualification[]" value="Teacher Trainer">
                        &nbsp;Teacher Trainer<br>
                        <input type="checkbox" name="qualification[]" value="Teacher at training school or colleges">
                        &nbsp;Teacher at training school or colleges<br>
                        <input type="checkbox" name="chkPassport1" value="Other" id="chkPassport1" onclick="ShowHideDiv1(this)" >
                        &nbsp;Other
                        <div id="dvPassport1" style="display: none">
                         Others (Please specify): <input type="text" id="txtPassportNumber1" name="qualification[]" style="width:500px;"/>
                        </div>
                        </td>
                        </tr>
                    <tr>
                          <td colspan="2">Do you have any prior experience in Teacher Training ?</td>
                        </tr>
                    <tr>
                          <td colspan="2">
                          <input type="radio" name="yes" value="Yes" onClick="show_more1()" id="hmm" required>
                        &nbsp; Yes
                        <input type="radio" name="no" value="No" onClick="redirect()">
                        &nbsp; No</td>
                        </tr>
                    <tr>
                          <td colspan="2"><table style="display:none;" id="show_val">
                              <tr>
                              <td colspan="2">Please select the topics on which you can take up 4-6 hours training? (You may select more than one option.):
                              </td>
                            </tr>
                              <tr >
                              <td><input type="checkbox" name="traning[]" value="Child and Adolescent Developmnet">
                                  &nbsp;Child and Adolescent Development
                                  <input type="checkbox" name="traning[]" value="Classrom Management">
                                  &nbsp;Classroom Management
                                  <input type="checkbox" name="traning[]" value="Assessment and Evaluation Studies">
                                  &nbsp;Assessment and Evaluation Studies
                                  <input type="checkbox" name="traning[]" value="Awareness about children with disabilities">
                                  &nbsp;
                                  Awareness about Children with Disabilities
                                  <input type="checkbox" name="traning[]" value="Gender Sensivity">
                                  &nbsp;Gender Sensitivity
                                  <input type="checkbox" name="traning[]" value="Non Violent Discipline">
                                  &nbsp;Non Violent Discipline
                                  <input type="checkbox" name="traning[]" value="Human Rights">
                                  &nbsp;Human Rights
                                  <input type="checkbox" name="traning[]" value="Hygiene and Sanitation">
                                  &nbsp;Hygiene and Sanitation
                                  <input type="checkbox" name="traning[]" value="Creative Pedagogy">
                                  &nbsp;Creative Pedagogy
                                  <input type="checkbox" name="traning[]" value="Life Skills Education">
                                  &nbsp;Life Skills Education
                                  <input type="checkbox" name="traning[]" value="Creative Thinking and Problem Solving">
                                  &nbsp;Creative Thinking and Problem Solving
                                  <input type="checkbox" name="traning[]" value="Student Leadership and Personal Development ">
                                  &nbsp;
                                  Student Leadership and Personal Development 
                                  <input type="checkbox" name="" value="Other" id="chkPassport2" onclick="ShowHideDiv2(this)" >
                                  &nbsp;Other
                                  <div id="dvPassport2" style="display: none">
                                  Please specify: <input type="text" id="txtPassportNumber2" name="traning[]" />
                                  </div>
                                  
                                  </td>
                            </tr>
                              <tr>
                              <td colspan="2">How many years of experience do you have for the topic/topics selected by you?</td>
                            </tr>
                              <tr >
                              <td colspan="2"><input type="radio" name="experience" value="3-5 years" required>
                                  &nbsp;3-5 years
                                  <input type="radio" name="experience" value="5-10 years" required>
                                  &nbsp;5-10 years
                                  <input type="radio" name="experience" value="More than 10 years" required>
                                  &nbsp;More than 10 years </td>
                            </tr>
                              <tr>
                              <td colspan="2">Please provide details of the experience you have in conducting trainings on these topics. </td>
                            </tr>
                              <tr>
                              <td colspan="2"><textarea name="exp_detail" class="form-control" required ></textarea></td>
                            </tr>
                              <tr>
                              <td colspan="2">Please select the days of the week on which you are available</td>
                            </tr>
                              <tr>
                              <td colspan="2"><input type="checkbox" name="week[]" value="Monday">
                                  &nbsp;Monday
                                  <input type="checkbox" name="week[]" value="Tuesday">
                                  &nbsp;Tuesday
                                  <input type="checkbox" name="week[]" value="Wednesday">
                                  &nbsp;Wednesday
                                  <input type="checkbox" name="week[]" value="Thursday">
                                  &nbsp;Thursday
                                  <input type="checkbox" name="week[]" value="Friday">
                                  &nbsp;Friday
                                  <input type="checkbox" name="week[]" value="Saturday">
                                  &nbsp;Saturday
                                  <input type="checkbox" name="week[]" value="Sunday">
                                  &nbsp;Sunday
                                  <input type="checkbox" name="week[]" value="Any Day">
                                  &nbsp;Any Day</td>
                            </tr>
                              <tr>
                              <td colspan="2">Please mention total hours in a month that you would be able to volunteer for such training</td>
                            </tr>
                              <tr>
                              <td colspan="2"><input type="text" name="hours" value="" class="form-control" maxlength="3" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
							  
							  </td>
                            </tr>
                              <tr>
                              <td colspan="2">Geographical area of work*</td>
                            </tr>
                            <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district" value="" class="form-control" required></td>
                            </tr>
                            <tr>
                              <td>City &nbsp;&nbsp;&nbsp;
                                  <input type="text" name="city" value="" class="form-control" required></td>
                            </tr>
                              <tr>
                              <td>State &nbsp;&nbsp;&nbsp;
                                  <select name="state"required>
                                  <?php 
								$sql=mysql_query("select DISTINCT state from states");
								while($row = mysql_fetch_array($sql))
								{
								$data=$row['state'];
								?>
                                  <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                                  <?php
								 } 
							   ?>
                                </select>
                                </td>
                            </tr>
                            </table>
                            </td>
                        </tr>
                  </tbody>
                  <td align="center"><input type="hidden" name="teacher_train" value="teacher_train" ></td>
                  <td align="center"><input type="hidden" name="type_teacher_train" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_teacher_train" value="<?php echo $vol_id; ?>" ></td>
                </table>
				</div>
			</div>
		</div>
	</div>
</div>
                <?php	
					 }
					if($c4 == 'supplment_teach' && $c4!=''){
					?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">						
                    <h2>Teacher Support</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Supplemental Teaching </strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Which Class would you like to teach?  :</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="class[]" value="1-3">
                        &nbsp;Classes 1-3
                        <input type="checkbox" name="class[]" value="4-6">
                        &nbsp;Classes 4-6
                        <input type="checkbox" name="class[]" value="7-9">
                        &nbsp;Classes 7-9</td>
                        </tr>
                    <tr>
                          <td colspan="2">Which of the following would you like to take up?	(Select one or both)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="activity[]" value="curricular activity" onClick="show_more01()" id="activity">
                        &nbsp; Co-Curricular activities
                        <input type="checkbox" name="activity[]" value="oriented activities" onClick="show_more02()" id="oriented">
                        &nbsp; Subject-oriented activities
                        <!--<input type="radio" name="activity" value="both" onClick="show_more03()" id="both">
                        &nbsp; Both--></td>
                        </tr>
                    <tr>
                          <td colspan="2"><table style="display:none;" id="activity01">
                              <tr>
                              <td colspan="2">What would you like to teach in co-curricular activities?</td>
                            </tr>
                              <tr>
                              <td colspan="2"><select name="co_activity01">
                              <option value="Dance">Dance</option>
                              <option value="Music">Music</option>
                              <option value="Art & Drawing">Art & Drawing</option>
                              <option value="Sports">Sports</option>
                              <option value="Other">Other</option>
                              </select>
                              <div id="">
                              
                              </div>
                              </td>
                            </tr>
                              <tr>
                              <td colspan="2">Do you have any previous experience in teaching this? Please provide details. (100 words)</td>
                            </tr>
                              <tr>
                              <td colspan="2"><textarea name="co_activity02" id="co_activity02" class="form-control" ></textarea></td>
                            </tr>
                            </table>
                        <table style="display:none;" id="show_val02">
                              <tr>
                            <td colspan="2">What kind of subject support would you like to provide? </td>
                          </tr>
                              <tr>
                            <td colspan="2"><select name="subject">
                                <option value="Science in Everyday Life">Science in Everyday Life</option>
                                <option value="Mental Maths/ Vedic Ganit/ Abacus">Mental Maths/ Vedic Ganit/ Abacus</option>
                                <option value="Reading to Children">Reading to Children</option>
                                <option value="Spelling">Spelling</option>
                                <option value="Creative Writing">Creative Writing</option>
                                <option value="General Knowledge and Current Affairs">General Knowledge and Current Affairs</option>
                              </select></td>
                          </tr>
                              <tr>
                            <td colspan="2">Do you have any previous experience in teaching this? Please provide details. (100 words)</td>
                          </tr>
                              <tr>
                            <td colspan="2"><textarea name="co_activity03" id="co_activity03" class="form-control" ></textarea></td>
                          </tr>
                            </table>
                        <!--<table style="display:none;" id="show_val03">
                              <tr>
                            <td colspan="2">What would you like to teach in co-curricular activities? </td>
                          </tr>
                              <tr>
                            <td colspan="2"><textarea name="teach_co_activity" class="form-control"></textarea></td>
                          </tr>
                              <tr>
                            <td colspan="2">Do you have any previous experience in teaching this? Please provide details. (100 words)</td>
                          </tr>
                              <tr>
                            <td colspan="2"><textarea name="co_activity04" class="form-control"></textarea></td>
                          </tr>
                            </table>--></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select the days of the week on which you are available</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="week_01[]" value="Monday">
                        &nbsp;Monday
                        <input type="checkbox" name="week_01[]" value="Tuesday">
                        &nbsp;Tuesday
                        <input type="checkbox" name="week_01[]" value="Wednesday">
                        &nbsp;Wednesday
                        <input type="checkbox" name="week_01[]" value="Thursday">
                        &nbsp;Thursday
                        <input type="checkbox" name="week_01[]" value="Friday">
                        &nbsp;Friday
                        <input type="checkbox" name="week_01[]" value="Saturday">
                        &nbsp;Saturday
                        <input type="checkbox" name="week_01[]" value="Sunday">
                        &nbsp;Sunday
                        <input type="checkbox" name="week_01[]" value="Any Day">
                        &nbsp;Any Day</td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select your preferred time slot</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="hours_02" value="" class="form-control"required></td>
                        </tr>
                    <tr>
                          <td colspan="2">Geographical area of work*</td>
                        </tr>
                        <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district_03" value="" class="form-control"required></td>
                            </tr>
                    <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_05" value="" class="form-control"required></td>
                        </tr>
                    <tr>
                          <td>State &nbsp;&nbsp;&nbsp;
                        <select name="state_05">
                              <?php 
								$sql=mysql_query("select DISTINCT state from states");
								while($row = mysql_fetch_array($sql))
								{
								$data=$row['state'];
								?>
                              <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                              <?php
								 } 
							   ?>
                            </select></td>
                        </tr>
                        <td align="center"><input type="hidden" name="supplment_teach" value="supplment_teach" ></td>
                  <td align="center"><input type="hidden" name="type_supplment_teach" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_supplment_teach" value="<?php echo $vol_id; ?>" ></td>
                        
                  </tbody>
                    </table>
					</div>
			</div>
		</div>
	</div>
</div>
                <?php	
				///////////////////////// Teacher support End /////////////////////////////////////////////
				
				///////////////////////// Adult Literacy  /////////////////////////////////////////////
					 }
					if($c2 == 'volunteer_teacher' && $c2!=''){
					?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">						
                    <h2>Adult Literacy</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Volunteer Teacher For Functional Literacy</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Do you have any previous experience in teaching? Please provide details. (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="previous_experience_02" class="form-control" required ></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Select two extra-curricular activities that you would like to conduct aside from teaching.</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="extra_activity_conduct[]" value="Financial Literacy">
                        &nbsp;Financial Literacy
                        <input type="checkbox" name="extra_activity_conduct[]" value="Menstrual Hygiene ">
                        &nbsp;Menstrual Hygiene
                        <input type="checkbox" name="extra_activity_conduct[]" value="Awareness on Government Entitlements">
                        &nbsp;Awareness on Government Entitlements
                        <input type="checkbox" name="extra_activity_conduct[]" value="Reproductive Health">
                        &nbsp;Reproductive Health
                        <input type="checkbox" name="extra_activity_conduct[]" value="Vocational Skill Development">
                        &nbsp;Vocational Skill Development
                        <input type="checkbox" name="extra_activity_conduct[]" value="Community Development">
                        &nbsp;Community Development
                        <input type="checkbox" name="extra_activity_conduct[]" value="Environmental Awareness">
                        &nbsp;Environmental Awareness
                        <input type="checkbox" name="extra_activity_conduct[]" value="Gender Sensitization">
                        &nbsp;Gender Sensitization
                        <input type="checkbox" name="extra_activity_conduct[]" value="Other extra activity" id="chkPassport" onclick="ShowHideDiv(this)" >
                        &nbsp;Other
                        <div id="dvPassport" style="display: none">
                         Specify: <input type="text" id="txtPassportNumber" name="txtPassportNumber"/>
                        </div>
                        </td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select the days of the week on which you are available</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="week1[]" value="Monday">
                        &nbsp;Monday
                        <input type="checkbox" name="week1[]" value="Tuesday">
                        &nbsp;Tuesday
                        <input type="checkbox" name="week1[]" value="Wednesday">
                        &nbsp;Wednesday
                        <input type="checkbox" name="week1[]" value="Thursday">
                        &nbsp;Thursday
                        <input type="checkbox" name="week1[]" value="Friday">
                        &nbsp;Friday
                        <input type="checkbox" name="week1[]" value="Saturday">
                        &nbsp;Saturday
                        <input type="checkbox" name="week1[]" value="Sunday">
                        &nbsp;Sunday
                        <input type="checkbox" name="week1[]" value="Any Day">
                        &nbsp;Any Day</td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select your preferred time slot :(You may select more than one)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="time[]" value="0700 hours to 0900 hours">
                        &nbsp;07.00 hours to 09.00 hours
                        <input type="checkbox" name="time[]" value="1700 hours  to 1900 hours">
                        &nbsp;17.00 hours  to 19.00 hours
                        <input type="checkbox" name="time[]" value="1900 hours to 2100 hours">
                        &nbsp;19.00 hours to 21.00 hours </td>
                        </tr>
                    <tr>
                          <td colspan="2">Geographical area of work*</td>
                        </tr>
                        <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district_01" value="" class="form-control" required></td>
                            </tr>
                    <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_01" value="" class="form-control" required></td>
                        </tr>
                    <tr>
                          <td>State &nbsp;&nbsp;&nbsp;
                        <select name="state_01">
                              <?php 
								$sql=mysql_query("select DISTINCT state from states");
								while($row = mysql_fetch_array($sql))
								{
								$data=$row['state'];
								?>
                              <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                              <?php
								 } 
							   ?>
                            </select></td>
                        </tr>
                  <td align="center"><input type="hidden" name="volunteer_teacher" value="volunteer_teacher" ></td>
                  <td align="center"><input type="hidden" name="type_volunteer_teacher" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_volunteer_teacher" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>
					</div>
			</div>
		</div>
	</div>
</div>
                <?php	
					 }					 
					if($c5 == 'educative_session' && $c5!=''){
					?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">					
                    <h2>Adult Literacy</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Supplemental Educative Sessions</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention the name of the topic on which you would like to take training/awareness building sessions (10 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="building_sessions_06" class="form-control" required></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please provide a brief description of this training/awareness session (scope, methodology and duration). (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="methodology_session_06" class="form-control" required></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Do you have any previous experience in conducting such trainings/awareness session? Please provide details. (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="previous_experience_06" class="form-control" required></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select the days of the week on which you are available</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="week_06[]" value="Monday">
                        &nbsp;Monday
                        <input type="checkbox" name="week_06[]" value="Tuesday">
                        &nbsp;Tuesday
                        <input type="checkbox" name="week_06[]" value="Wednesday">
                        &nbsp;Wednesday
                        <input type="checkbox" name="week_06[]" value="Thursday">
                        &nbsp;Thursday
                        <input type="checkbox" name="week_06[]" value="Friday">
                        &nbsp;Friday
                        <input type="checkbox" name="week_06[]" value="Saturday">
                        &nbsp;Saturday
                        <input type="checkbox" name="week_06[]" value="Sunday">
                        &nbsp;Sunday
                        <input type="checkbox" name="week_06[]" value="Any Day">
                        &nbsp;Any Day</td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select your preferred time slot :(You may select more than one)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="time_06[]" value="0700 hours to 0900 hours">
                        &nbsp;07.00 hours to 09.00 hours
                        <input type="checkbox" name="time_06[]" value="1700 hours  to 1900 hours">
                        &nbsp;17.00 hours  to 19.00 hours
                        <input type="checkbox" name="time_06[]" value="1900 hours to 2100 hours">
                        &nbsp;19.00 hours to 21.00 hours </td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention total weekly hours that you would be able to volunteer :</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="weekly_hour" value="" class="form-control" maxlength="3" required onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>
						  
						  </td>
                        </tr>
                    <tr>
                          <td colspan="2">Geographical area of work*</td>
                        </tr>
                     <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district_04" value="" class="form-control" required></td>
                            </tr>
                      <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_06" value="" class="form-control" required></td>
                        </tr>
                    <tr>
                          <td>State &nbsp;&nbsp;&nbsp;
                        <select name="state_06">
                              <?php 
								$sql=mysql_query("select DISTINCT state from states");
								while($row = mysql_fetch_array($sql))
								{
								$data=$row['state'];
								?>
                              <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                              <?php
								 } 
							   ?>
                            </select></td>
                        </tr> 
                        <td align="center"><input type="hidden" name="educative_session" value="educative_session" ></td>
                  <td align="center"><input type="hidden" name="type_educative_session" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_educative_session" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>
					</div>
			</div>
		</div>
	</div>
</div>
                <?php
				///////////////////////// Adult Literacy End /////////////////////////////////////////////	
					 }
				///////////////////////// Child Screen ////// /////////////////////////////////////////////	 
					 if($c3 == 'child_screen' && $c3!=''){
					?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">					
                    <h2>Child Development</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Child Screening</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select the days of the week on which you are available</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="week_screen[]" value="Monday">
                        &nbsp;Monday
                        <input type="checkbox" name="week_screen[]" value="Tuesday">
                        &nbsp;Tuesday
                        <input type="checkbox" name="week_screen[]" value="Wednesday">
                        &nbsp;Wednesday
                        <input type="checkbox" name="week_screen[]" value="Thursday">
                        &nbsp;Thursday
                        <input type="checkbox" name="week_screen[]" value="Friday">
                        &nbsp;Friday
                        <input type="checkbox" name="week_screen[]" value="Saturday">
                        &nbsp;Saturday
                        <input type="checkbox" name="week_screen[]" value="Sunday">
                        &nbsp;Sunday
                        <input type="checkbox" name="week_screen[]" value="Any Day">
                        &nbsp;Any Day</td>
                        </tr>
                    <tr>
                          <td colspan="2">Geographical area of work*</td>
                        </tr>
                     <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district_02" value="" class="form-control" required></td>
                            </tr>
                    <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_02" value="" class="form-control" required></td>
                        </tr>
                    <tr>
                          <td>State &nbsp;&nbsp;&nbsp;
                        <select name="state_02">
                              <?php 
								$sql=mysql_query("select DISTINCT state from states");
								while($row = mysql_fetch_array($sql))
								{
								$data=$row['state'];
								?>
                              <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                              <?php
								 } 
							   ?>
                            </select></td>
                        </tr>
                  <td align="center"><input type="hidden" name="child_screen" value="child_screen" ></td>
                  <td align="center"><input type="hidden" name="type_child_screen" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_child_screen" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>
					</div>
			</div>
		</div>
	</div>
</div>
                <?php	
				///////////////////////// Child Screen ////// ///////////////////////////////////////////////
				///////////////////////// Extra Activity ////// /////////////////////////////////////////////	
					 }
					 if($c6 == 'curricular_activity' && $c6!=''){
					?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">					
                    <h2>Child Development</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Extra-Curricular Activities</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">What would you like to teach in co-curricular activities? Please specify 2 such activities</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="cocurricular_activities_teach" class="form-control" required></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Do you have any previous experience in teaching this? Please provide details. (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="previous_experience_cocurricular" class="form-control" required></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select the days of the week on which you are available</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="week_07[]" value="Monday">
                        &nbsp;Monday
                        <input type="checkbox" name="week_07[]" value="Tuesday">
                        &nbsp;Tuesday
                        <input type="checkbox" name="week_07[]" value="Wednesday">
                        &nbsp;Wednesday
                        <input type="checkbox" name="week_07[]" value="Thursday">
                        &nbsp;Thursday
                        <input type="checkbox" name="week_07[]" value="Friday">
                        &nbsp;Friday
                        <input type="checkbox" name="week_07[]" value="Saturday">
                        &nbsp;Saturday
                        <input type="checkbox" name="week_07[]" value="Sunday">
                        &nbsp;Sunday
                        <input type="checkbox" name="week_07[]" value="Any Day">
                        &nbsp;Any Day</td>
                        </tr>
                    <tr>
                          <td colspan="2">Please select your preferred time slot :(You may select more than one)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="checkbox" name="time_extra_curricu[]" value="0700 hours to 0800 hours">
                        &nbsp;07.00 hours to 08.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="0800 hours to 0900 hours">
                        &nbsp;08.00 hours to 09.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="0900 hours to 1000 hours">
                        &nbsp;09.00 hours to 10.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="1000 hours to 1100 hours">
                        &nbsp;10.00 hours to 11.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="1100hours to 1200 hours">
                        &nbsp;11.00 hours to 12.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="1500 hours to 1600 hours">
                        &nbsp;15.00 hours to 16.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="1600 hours to 1700 hours">
                        &nbsp;16.00 hours to 17.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="1700 hours to 1800 hours">
                        &nbsp;17.00 hours to 18.00 hours
                        <input type="checkbox" name="time_extra_curricu[]" value="1800 hours to 1900 hours">
                        &nbsp;18.00 hours to 19.00 hours </td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention total weekly hours that you would be able to volunteer :</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="weekly_hour" value="" class="form-control" maxlength="3" required onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
						  
						  </td>
                        </tr>
                    <tr>
                          <td colspan="2">Geographical area of work*</td>
                        </tr>
                        <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district_05" value="" class="form-control" required></td>
                            </tr>
                    <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_08" value="" class="form-control" required></td>
                        </tr>
                    <tr>
                          <td>State &nbsp;&nbsp;&nbsp;
                        <select name="state_08">
                              <?php 
								$sql=mysql_query("select DISTINCT state from states");
								while($row = mysql_fetch_array($sql))
								{
								$data=$row['state'];
								?>
                              <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                              <?php
								 } 
							   ?>
                            </select></td>
                        </tr>
                        <td align="center"><input type="hidden" name="curricular_activity" value="curricular_activity" ></td>
                        <td align="center"><input type="hidden" name="type_curricular_activity" value="<?php echo $vol_type; ?>" ></td>
                        <td align="center"><input type="hidden" name="id_curricular_activity" value="<?php echo $vol_id; ?>" ></td> 
                  </tbody>
                    </table> 
				</div>
			</div>
		</div>
	</div>
</div>
                <?php
				///////////////////////// Extra Activity End /////////////////////////////////////////////////////////////////		
				///////////////////////// Communication Start ////////////////////////////////////////////////////////////////		
					 }
//new task
if($c16 == 'teacher_traning_at_asha_kiran' && $c16!=''){
					?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">					
                    <h2>Child Development</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Training of Teachers at the Asha Kiran Centres</strong></td>
                        </tr>
                    <tr>
                          <td style="width:30%">Name :</td>
						  <td style="width:70%"><input type="text" class="form-control" id="training_teacher_name" name="training_teacher_name"> </td>
                    </tr>
					<tr>
                          <td style="width:30%">Address :</td>
						  <td style="width:70%"><input type="text" class="form-control" id="training_teacher_address" name="training_teacher_address"> </td>
                    </tr>
					<tr>
                          <td style="width:30%">City :</td>
						  <td style="width:70%"><input type="text" class="form-control" id="training_teacher_city" name="training_teacher_city"> </td>
                    </tr>
					<tr>
                          <td style="width:30%">State :</td>
						  <td style="width:70%">
							<select id="selectState" name="selectState" onchange="selectOther()">
								<option value="Bihar">Bihar</option>
								<option value="Delhi">Delhi</option>
								<option value="Orissa">Orissa</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="West Bengal">West Bengal</option>
								<option value="Others">Others</option>
							</select>
						  </td>
                    </tr>
					<tr id="trOtherState" style="display:none;" >						
						<td colspan="2" style="text-align:right; width:100%;" >
							<table width="100%">
								<tr>
									<td>Other State :</td>
									<td><input type="text" class="form-control" id="txt_other_state" name="txt_other_state"></td>
								</tr>
							</table>
						</td>						
					</tr>
                    <tr>
                          <td style="width:30%">Pin Code :</td>
						  <td style="width:70%"><input type="text" class="form-control" id="training_teacher_pin_code" name="training_teacher_pin_code" onkeyup="return numbersOnly(this)" maxlength="6"> </td>
                    </tr>
					<tr>
                          <td style="width:30%">Mobile Number :</td>
						  <td style="width:70%"><input type="text" class="form-control" id="training_teacher_mob_no" name="training_teacher_mob_no" onkeyup="return numbersOnly(this)" maxlength="10"> </td>
                    </tr>
					<tr>
                          <td style="width:30%">E-mail :</td>
						  <td style="width:70%"><input type="text" class="form-control" id="training_teacher_email" name="training_teacher_email" onblur="return ValidateEmail(this.value)"> </td>
                    </tr>
					<tr>
                          <td style="width:30%">Educational Qualification :</td>
						  <td style="width:70%">
							<select id="selectEduQualification" name="selectEduQualification">
								<option value="">Choose an Item</option>
								<option value="Professional">Professional</option>
								<option value="Doctorate">Doctorate</option>
								<option value="Post Graduate">Post Graduate</option>
								<option value="Graduate">Graduate</option>
								<option value="Higher Secondary">Higher Secondary</option>
							</select>
						  </td>
                    </tr>
					
					
                    <tr>
                          <td colspan="2">Please select your qualification</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="teacher_training_qualification[]" value="Academician">
                        &nbsp;Academician &nbsp;&nbsp;
                        <input type="checkbox" name="teacher_training_qualification[]" value="Educationist">
                        &nbsp;Educationist &nbsp;&nbsp;
                        <input type="checkbox" name="teacher_training_qualification[]" value="Teacher">
                        &nbsp;Teacher &nbsp;&nbsp;
                        <input type="checkbox" name="teacher_training_qualification[]" value="Professor">
                        &nbsp;Professor &nbsp;&nbsp;
                        <input type="checkbox" name="teacher_training_qualification[]" value="Teacher Trainer">
                        &nbsp;Teacher Trainer &nbsp;&nbsp;
                        <input type="checkbox" name="teacher_training_qualification[]" value="Teacher at training schools or colleges">
                        &nbsp;Teacher at training schools or colleges &nbsp;&nbsp;
                        <input type="checkbox" name="teacher_training_qualification[]" value="Others" onclick="ShowHideDivTeacherTraining(this)">
                        &nbsp;Others
						<div id="dvOtherTeacherTraining" style="display: none">
                         Others (Please specify): <input type="text" id="txtOtherTeacherTraining" name="txtOtherTeacherTraining" style="width:500px;"/>
                        </div>
						</td>
                        </tr>
                    <tr>
                          <td style="width:35%">Do you have any prior experience in Teacher Training ?</td>
						  <td style="width:65%">
							<input type="radio" name="teachTraningExp" id="teachTraningExpYes" value="Yes" onclick="showTeacherTraingExpYes()" >&nbsp; Yes &nbsp;&nbsp;&nbsp;
							<input type="radio" name="teachTraningExp" id="teachTraningExpNo" value="No" onclick="showTeacherTraingExpNo()" checked>&nbsp; No
						  </td>
                    </tr>
					
					<!--
						<input type="radio" name="yes" value="Yes" onClick="show_more1()" id="hmm" required>
                        &nbsp; Yes
                        <input type="radio" name="no" value="No" onClick="redirect()">
                        &nbsp; No
					-->
<!-- new -->
<tr>
  <td colspan="2">
    <table style="display:none;" id="training_class_mgm">
	  <tr>
		<td colspan="2">
			Do you think you are eligible to take up training on classroom management skills of the teachers who are teaching Hindi/Bengali, English and Mathematics ? 
		</td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea name="train_mgm_cls" id="train_mgm_cls" class="form-control" ></textarea>
		</td>
	  </tr>
	  
	  <tr>
			<td colspan="2">How many years of experience do you have on teacher training ?</td>
	  </tr>
	  <tr >
	  <td colspan="2"><input type="radio" name="yearsExpInTeachTraining[]" id="yearsExpInTeachTrainingID1" value="3-5 years" onclick="teachingExp(this.value)" >
		  &nbsp;3-5 years
		  <input type="radio" name="yearsExpInTeachTraining[]" id="yearsExpInTeachTrainingID2" value="5-10 years" onclick="teachingExp(this.value)" >
		  &nbsp;5-10 years
		  <input type="radio" name="yearsExpInTeachTraining[]" id="yearsExpInTeachTrainingID3" value="More than 10 years" onclick="teachingExp(this.value)" >
		  &nbsp;More than 10 years <input type="text" id="txtTeachExp" name="txtTeachExp" value="" readonly style="display:none;"></td>
	</tr>
	  
	  
	  <tr>
			<td colspan="2">Please provide details of the experience you have in conducting trainings on these topics.</td>
	  </tr>
	  
	  <tr>
			<td colspan="2"><textarea name="training_exp_detail" id="training_exp_detail" class="form-control" ></textarea></td>
	  </tr>
	  
	  <tr>
			<td colspan="2">Please select the days of the week on which you are available</td>
	  </tr>
	  
	  <tr>
		  <td colspan="2"><input type="checkbox" id="teacherTrainingweek1" name="teacherTrainingweek[]" value="Monday">
		  &nbsp;Monday
		  <input type="checkbox" id="teacherTrainingweek2" name="teacherTrainingweek[]" value="Tuesday">
		  &nbsp;Tuesday
		  <input type="checkbox" id="teacherTrainingweek3" name="teacherTrainingweek[]" value="Wednesday">
		  &nbsp;Wednesday
		  <input type="checkbox" id="teacherTrainingweek4" name="teacherTrainingweek[]" value="Thursday">
		  &nbsp;Thursday
		  <input type="checkbox" id="teacherTrainingweek5" name="teacherTrainingweek[]" value="Friday">
		  &nbsp;Friday
		  <input type="checkbox" id="teacherTrainingweek6" name="teacherTrainingweek[]" value="Saturday">
		  &nbsp;Saturday
		  <input type="checkbox" id="teacherTrainingweek7" name="teacherTrainingweek[]" value="Sunday">
		  &nbsp;Sunday
		  <input type="checkbox" id="teacherTrainingweek8" name="teacherTrainingweek[]" value="Any Day">
		  &nbsp;Any Day</td>
	  </tr>
	
	  <tr>
	  <td colspan="2">Please mention total hours in a month that you would be able to volunteer for such training</td>
	</tr>
	  <tr>
		  <td colspan="2">
			<input type="text" name="teachr_training_hours" id="teachr_training_hours" value="" class="form-control" maxlength="3" onkeyup="return numbersOnly(this)" />
		  </td>
	  </tr>
	</table>
	</td>
</tr>
<!-- end new -->					
					
                        <td align="center"><input type="hidden" name="teacher_traning_at_asha_kiran" value="teacher_traning_at_asha_kiran" ></td>
                        <td align="center"><input type="hidden" name="type_teacher_traning_at_asha_kiran" value="<?php echo $vol_type; ?>" ></td>
                        <td align="center"><input type="hidden" name="id_master_pk" value="<?php echo $vol_id; ?>" ></td> 
                  </tbody>
                    </table> 
				</div>
			</div>
		</div>
	</div>
</div>
                <?php
				///////////////////////// Extra Activity End /////////////////////////////////////////////////////////////////		
				///////////////////////// Communication Start ////////////////////////////////////////////////////////////////		
					 }
//new task end



					 
				if(($c7 == 'graphic_design' || $c8 == 'content_write' || $c9 == 'audio_production' || $c10 == 'photography' || $c11 == 'social_media' ||
				$c12 == 'it_dev')){
			    ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">				
                <h2>Communications</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>
                          <?php
						  $chkn = $c7 . ',' . $c8 . ',' . $c9 . ',' . $c10 . ',' . $c11 . ',' . $c12 ;
						   
                          if($c7 == 'graphic_design'){
						  ?>
                          Graphic Design <?php echo $comma; ?>
                          <?php
						  }
						  if($c8 == 'content_write'){
						  ?>
                          Content Writing and Editing
                          <?php
						  }
						  if($c9 == 'audio_production'){
						  ?>
                          Audio Visual Productions
                          <?php
						  }
						  if($c10 == 'photography'){
						  ?>
                          Photography
                          <?php
						  }
						  if($c11 == 'social_media'){
						  ?>
                          Social Media Communications
                          <?php
						  }
						  if($c12 == 'it_dev'){
						  ?>
                          IT Development
                          <?php
						  }
						  ?>
                          </strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention your relevant qualifications </td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="commu_quali" value="" class="form-control" required></td>
                        </tr>
                        
                    <tr>
                          <td colspan="2">How many years of experience do you have on the area of work selected by you? </td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="experience_commu" value="" class="form-control" maxlength="3" required onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>
						  
						  </td>
                        </tr>
                  <td align="center"><input type="hidden" name="for_what" value="<?php echo $chkn; ?>"></td>         
                  <td align="center"><input type="hidden" name="commu" value="commu"></td>
                  <td align="center"><input type="hidden" name="type_commu" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_commu" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>
					</div>
			</div>
		</div>
	</div>
</div>
                <?php
				}
				elseif(($c7 == 'graphic_design' && $c8 == 'content_write' && $c9 == 'audio_production' && $c10 == 'photography' && $c11 == 
					'social_media' && $c12 == 'it_dev')){
				?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">				
                <h2>Communications</h2>		 
				<table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>
                          <?php
						  $chkn = $c7 . ',' . $c8 . ',' . $c9 . ',' . $c10 . ',' . $c11 . ',' . $c12 ;
						  
                          if($c7 == 'graphic_design'){
						  ?>
                          Graphic Design
                          <?php
						  }
						  if($c8 == 'content_write'){
						  ?>
                          Content Writing and Editing
                          <?php
						  }
						  if($c9 == 'audio_production'){
						  ?>
                          Audio Visual Productions
                          <?php
						  }
						  if($c10 == 'photography'){
						  ?>
                          Photography
                          <?php
						  }
						  if($c11 == 'social_media'){
						  ?>
                          Social Media Communications
                          <?php
						  }
						  if($c12 == 'it_dev'){
						  ?>
                          IT Development
                          <?php
						  }
						  ?>
                          </strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention your relevant qualifications </td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="commu_quali" value="" class="form-control"></td>
                        </tr>
                        
                    <tr>
                          <td colspan="2">How many years of experience do you have on the area of work selected by you? </td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="experience_commu" value="" class="form-control"></td>
                        </tr>
                  <td align="center"><input type="hidden" name="for_what" value="<?php echo $chkn; ?>"></td>          
                  <td align="center"><input type="hidden" name="commu" value="commu" ></td>
                  <td align="center"><input type="hidden" name="type_commu" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_commu" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>		 
					</div>
			</div>
		</div>
	</div>
</div>
				<?php
				///////////////////////// Communication End ///////////////////////////////////////////////////////////////			 
				}
				 if($c13 == 'fund_raise' && $c13!=''){
				///////////////////////// Fund Raise Start ///////////////////////////////////////////////////////////////		
                ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">					
                <h2>Fundraising</h2>	
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Fund Raising</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention your relevant qualifications </td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="fund_quali" value="" class="form-control" required></td>
                        </tr>
                        
                    <tr>
                     <td colspan="2">How many years of fundraising experience do you have? </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="experience_fund" value="" class="form-control" maxlength="3" required onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
					 
					 </td>
                   </tr> 
                   <tr>
                     <td colspan="2">What is the highest amount you have raised earlier for any development project? </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="amt_fund" value="" class="form-control" maxlength="10" required onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
					 
					 </td>
                   </tr>
                   <tr>
                     <td colspan="2">Mention the year </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="year_fund" value="" class="form-control" maxlength="4" required onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
					 
					 </td>
                   </tr>
                   <tr>
                     <td colspan="2">From where did you raise the amount ? </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="where_raise_fund" value="" class="form-control" required></td>
                   </tr>
                  <td align="center"><input type="hidden" name="fund_raise" value="fund_raise" ></td>
                  <td align="center"><input type="hidden" name="type_fund_raise" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_fund_raise" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>
					</div>
			</div>
		</div>
	</div>
</div>
                <?php
				///////////////////////// Fund Raise End ///////////////////////////////////////////////////////////////		
				 }
				?>
                <!--<table width="100%">
                  <tbody>
                    <tr>
                      <td colspan="3">You will need references from 3 individuals to register as a volunteer. 
              		  <a href="documents/Reference Template.docx" target="_blank"><strong>Click here</strong></a> for suggested template of the same.
                      </td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">Please upload your references:</td>
                    </tr>
                    <tr>
                      <td>Reference 1</td>
                      <td>Reference 2</td>
                      <td>Reference 3</td>
                    </tr>
                    <tr>
                      <td><input type="file" name="ref_1" value="" class="form-control" required></td>
                      <td><input type="file" name="ref_2" value="" class="form-control" required></td>
                      <td><input type="file" name="ref_3" value="" class="form-control" required></td>
                    </tr>
                  </tbody>
                </table>-->
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">						
			<div class="box-body">
				<div class="form-group">   
             <table width="100%" border="1">
             <tbody>
             <tr>
              <td colspan="2"><input type="checkbox" value="0" name="agree" required>
              By clicking here I acknowledge and agree that I have read through the 
              <a href="javascript:popUp2('term_condition.html')" style="text-decoration:underline; color:#4557E3;">Terms and Conditions 
              </a> as well as details of areas of work as above.
              </td>
             </tr>         
                    <tr>
                       <input type="hidden" name="person_id" value="<?php echo $_GET['ver']; ?>">
                       <input type="hidden" name="person_email_id" value="<?php echo $email; ?>">
                       
                       <td align="center"><input type="submit" name="submit" onClick="return valthisform();" class="btn btn-primary" value="Confirm" ></td>
                    </tr>
                  </tbody>
             </table>
			 </div>
			</div>
		</div>
	</div>
</div>
              </form>
                  <?php
					}
				  ?>
                </div>
          </div>
            </div>
      </div>
        </div>
    <!--// MainSection //--> 
    
  </div>
      
      <!--// Footer //-->
      <div class="as-footer">
    <div class="container">
          <?php include('include/footer.php'); ?>
        </div>
    <?php include('include/copy-right.php'); ?>
  </div>
      <!--// Footer //-->
      <div class="clearfix"></div>
    </div>
<!--// Main Wrapper //--> 

<!-- Search Modal -->
<?php include('include/search-model.php'); ?>
<!-- Search Modal --> 
<script language=JavaScript>
<!--

//Accept terms & conditions script (by InsightEye www.insighteye.com)
//Visit JavaScript Kit (http://javascriptkit.com) for this script & more.

function checkCheckBox(f){
if (f.agree.checked == false )
{
alert('Please read and check Terms & Conditions to continue.');
return false;
}else
return true;
}
//-->
</script>

<script>  
	function redirect(){
		alert('Thank you for your interest in volunteering with us but we are are currently seeking volunteers with prior experience. Please select another category.');
		window.location.href='vertical_section.php?ver=<?php echo $id; ?>';
	}
	function show_more1()
	{
	  var form = document.getElementById("hmm").value;
	  document.getElementById("txtYes").value = form;
	  if(form == "Yes"){
		 document.getElementById('show_val').style.display = ''; 
	  }
	  else{
		 document.getElementById('show_val').style.display = "none";  
	  }
	}
	
	function showTeacherTraingExpYes()
	{
		var getchkval = document.getElementById("teachTraningExpYes").value;
		if(getchkval=="Yes"){
			document.getElementById("training_class_mgm").style.display = 'block';
		}
		//alert(getchkval);
	}
	function showTeacherTraingExpNo()
	{
		var getchkval = document.getElementById("teachTraningExpNo").value;
		//alert(getchkval);
		if(getchkval=="No"){
			document.getElementById("train_mgm_cls").value="";
			//id="teacherTrainingweek1"
			document.getElementById("yearsExpInTeachTrainingID1").checked=false;
			document.getElementById("yearsExpInTeachTrainingID2").checked=false;
			document.getElementById("yearsExpInTeachTrainingID3").checked=false;
			document.getElementById("training_exp_detail").value="";
			document.getElementById("teacherTrainingweek1").checked=false;
			document.getElementById("teacherTrainingweek2").checked=false;
			document.getElementById("teacherTrainingweek3").checked=false;
			document.getElementById("teacherTrainingweek4").checked=false;
			document.getElementById("teacherTrainingweek5").checked=false;
			document.getElementById("teacherTrainingweek6").checked=false;
			document.getElementById("teacherTrainingweek7").checked=false;
			document.getElementById("teacherTrainingweek8").checked=false;
			document.getElementById("teachr_training_hours").value="";
			document.getElementById("txtTeachExp").value="";
			document.getElementById("training_class_mgm").style.display = 'none';
		}
	  
	}
	
	function teachingExp(val)
	{
		document.getElementById("txtTeachExp").value="";
		document.getElementById("txtTeachExp").value=val;
	}	 
  
	///////////////////////////////////////////////////////////////////////////////////
	
	function show_more01()
	{
	  var form = document.getElementById("activity").value;
	  //alert(form);
	  /* if(form == "curricular activity"){
		 document.getElementById('activity01').style.display = ''; 
	  }
	  else{
		 document.getElementById('activity01').style.display = "none";  
	  }*/
	  
	  //
	  if(form == "curricular activity"){
		if(document.getElementById("activity").checked) {
			var otherval = document.getElementById("activity").value;
			document.getElementById("txtActivity").value = otherval;
			document.getElementById('activity01').style.display = '';
			}
		else{
			document.getElementById("txtActivity").value ="";
			document.getElementById("co_activity02").value ="";
			document.getElementById('activity01').style.display = "none";
		}
	  }
	}
	function show_more02()
	{
	  var form1 = document.getElementById("oriented").value;
	  if(form1 == "oriented activities"){
		if(document.getElementById("oriented").checked) {
			var otherval1 = document.getElementById("oriented").value;
			document.getElementById("txtOriented").value = otherval1;
			document.getElementById('show_val02').style.display = '';
			}
		else{
			document.getElementById("txtOriented").value ="";
			document.getElementById("co_activity03").value ="";
			document.getElementById('show_val02').style.display = "none";
		}
	  }
	  //alert(form);
	  /* if(form == "oriented activities"){
		 document.getElementById('show_val02').style.display = ''; 
	  }
	  else{
		 document.getElementById('show_val02').style.display = "none";  
	  } */
	  	  
	}
	function show_more03()
	{
	  var form = document.getElementById("both").value;
	  if(form == "both"){
		 document.getElementById('show_val03').style.display = ''; 
	  }
	  else{
		 document.getElementById('show_val03').style.display = "none";  
	  }
	}
</script> 

 <script type="text/javascript">
    function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
		
		if(document.getElementById("chkPassport").checked) {
			var otherval = document.getElementById("chkPassport").value;
			document.getElementById("txt_extra_curricular_activities").value = otherval;
			}
		else{
			document.getElementById("txt_extra_curricular_activities").value ="";
			document.getElementById("txtPassportNumber").value ="";
		}
		
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
	 function ShowHideDiv1(chkPassport1) {
        var dvPassport = document.getElementById("dvPassport1");
        dvPassport.style.display = chkPassport1.checked ? "block" : "none";
    }
	function ShowHideDivTeacherTraining(chkPassport1) {
        var dvPassport = document.getElementById("dvOtherTeacherTraining");
        dvPassport.style.display = chkPassport1.checked ? "block" : "none";
    }
	 function ShowHideDiv2(chkPassport2) {
        var dvPassport = document.getElementById("dvPassport2");
		
		if(document.getElementById("chkPassport2").checked) {
			var otherval = document.getElementById("chkPassport2").value;
			document.getElementById("txtOther").value = otherval;
			}
		else{
			document.getElementById("txtOther").value ="";
			document.getElementById("txtPassportNumber2").value ="";
		}
        dvPassport.style.display = chkPassport2.checked ? "block" : "none";
    }
</script>



<!-- jQuery (necessary for JavaScript plugins) --> 
<script src="script/jquery.min.js"></script> 
<script src="script/modernizr.js"></script> 
<script src="script/bootstrap.min.js"></script> 
<script src="script/jquery.dlmenu.js"></script> 
<script src="script/flexslider-min.js"></script> 
<script src="script/goalProgress.min.js"></script> 
<script src="script/jquery.countdown.min.js"></script> 
<script src="script/jquery.prettyphoto.js"></script> 
<script src="script/waypoints-min.js"></script> 
<script src="script/owl.carousel.min.js"></script> 
<script src="script/newsticker.js"></script> 
<script src="script/parallex.js"></script> 
<script src="script/styleswitch.js"></script> 
<script src="script/functions.js"></script>
</body>
</html>