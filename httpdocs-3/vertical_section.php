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

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer | <?php include('include/title.php'); ?></title>

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

    <!-- Color Css Files Start -->
    <!-- Color Css Files End -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
function chkValidation(){
	if(document.getElementById("c1").checked) {
			var txtVal = document.getElementById("c1").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c4").checked) {
			var txtVal = document.getElementById("c4").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c2").checked) {
			var txtVal = document.getElementById("c2").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c3").checked) {
			var txtVal = document.getElementById("c3").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c5").checked) {
			var txtVal = document.getElementById("c5").value;
			document.getElementById("txtValues").value = txtVal;
			}
	
	else if(document.getElementById("c6").checked) {
			var txtVal = document.getElementById("c6").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c7").checked) {
			var txtVal = document.getElementById("c7").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c8").checked) {
			var txtVal = document.getElementById("c8").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c9").checked) {
			var txtVal = document.getElementById("c9").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c10").checked) {
			var txtVal = document.getElementById("c10").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c11").checked) {
			var txtVal = document.getElementById("c11").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c12").checked) {
			var txtVal = document.getElementById("c12").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c13").checked) {
			var txtVal = document.getElementById("c13").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else if(document.getElementById("c16").checked) {
			var txtVal = document.getElementById("c16").value;
			document.getElementById("txtValues").value = txtVal;
			}
	else{
		document.getElementById("txtValues").value = "";
	}
}
function validateForm() {
	var test_txt = document.getElementById("txtValues").value;
	if(test_txt=="")
    {
        alert("Please select at least 1 area of work.");
        return false;
    }
	else
	{
		form.submit();
	}
}
</script>
	
  </head>
  <body>

    <!-- Color Switcher -->
    <!-- Color Switcher -->

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
        <div class="as-main-section">
          <div class="container">
            <div class="row">

            <div class="col-md-4">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<br/>                  
							<table width="100%">
								<tbody>
									<tr>
										<td width="30%"><b>Name</b></td>
										<td width="70%"><?php echo $name; ?></td>
									</tr>
									<tr>
										<td width="30%"><b>Mobile</b></td>
										<td width="70%"><?php echo $mobile; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>				
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<br/>                  
							<table width="100%">
								<tbody>
									<tr>
										<td width="30%"><b>District</b></td>
										<td width="70%"><?php echo $rotary_district; ?></td>
									</tr>
									<tr>
										<td width="30%"><b>Email</b></td>
										<td width="70%"><?php echo $email; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>				
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<br/>                  
							<table width="100%">
								<tbody>
									<tr>
										<td width="30%"><b>Club Name</b></td>
										<?php
										if($vol_cat == 'Other'){
										?>
										
										<?php
										}
										else{
										?>
										<td width="70%"><?php echo $club; ?></td>
										<?php
										}
										?>
									</tr>
									<tr>
										<td width="30%"><b>Type</b></td>
										<td width="70%"><?php echo $vol_cat; ?></td>
									</tr>
								</tbody>
							</table>						
						</div>
					</div>				
				</div>
			</div>

              
            </div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<br/> 
								<input type="text" id="txtValues" name="txtValues" value="" readonly style="display:none;">
							<h2 style="text-align:center">You must select one or more of the following Areas of Work in order to register as a Volunteer.</h2>
							<br/>
						</div>
					</div>				
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<br/> 
<form action="vertical_form.php?ver=<?php echo $_GET['ver']; ?>" method="post" enctype="multipart/form-data" name="myForm">
<!-- <form action="vertical_form_test11.php?ver=<?php echo $_GET['ver']; ?>" method="post" enctype="multipart/form-data" name="myForm">	-->
							<h2 style="text-align:left">Teacher Support</h2>
								<input type="checkbox" name="c1" value="teacher_train" id="c1" onClick="chkValidation()">
									Teacher Training <div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
									<strong><u>Teacher Training</u></strong><br>
									 A Teacher Trainer will be responsible for training of teachers from government schools as per the requirement of Rotary/Inner Wheel
									 Clubs. Our training structure includes at least a one day 4-6 hour training for teachers followed by a Refresher Training after 1.5
									 months.  
									 </span>
									 </div><br/>
									<input type="checkbox" name="c4" value="supplment_teach" id="c4" onClick="chkValidation()">
									  Supplemental Teaching<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
										 <strong><u>Supplemental Teaching</u></strong><br>
										 Supplemental teaching requires volunteer to take up co-scholastic activities in government schools to provide students exposure to 
										 creative activities and subject-oriented support. 
										 </span>
										 </div>
						</div>
						
						<div class="form-group">
							<br/> 							
							<h2 style="text-align:left">Child Development</h2>
								<input type="checkbox" name="c3" value="child_screen" id="c3" onClick="chkValidation()">
								 Child Screening <div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
								 <strong><u>Child Screening</u></strong><br>
								 Undertake a screening process for the out-of-school children who will be provided bridge classes in the Asha Kiran Centres before 
								 mainstreaming into Government/Government-Aided Schools. Screening is a full-day activity.
								 </span>
								 </div><br/>
									<input type="checkbox" name="c6" value="curricular_activity" id="c6" onClick="chkValidation()">
									Extra Curricular Activities<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
									 <strong><u>Extra Curricular Activities</u></strong><br>
									 Undertake co-curricular activities to add value to the bridge classes undertaken for out-of-school children in RILM’s 
									 Asha Kiran Centres for bridge classes geared to sending children back to school.   
									 </span>
									 </div>
								<br/>
									<input type="checkbox" name="c16" value="teacher_traning_at_asha_kiran" id="c16" onClick="chkValidation()">
									Training of Teachers at the Asha Kiran Centres<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
									 <strong><u>Training of Teachers at the Asha Kiran Centres</u></strong><br>
									 We need volunteers to train the teachers of the Asha Kiran Centres. The training would focus on Classroom Management skills of the teachers who are teaching multi grade Hindi, English, Bengali and Mathematics to the children enrolled in the AshaKiran Centre.  
									 </span>
									 </div>
						</div>
						
						<div class="form-group">
							<br/> 							
							<h2 style="text-align:left">Adult Literacy</h2>
								<input type="checkbox" name="c2" value="volunteer_teacher" id="c2" onClick="chkValidation()">
								  Volunteer Teacher for Functional Literacy<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
									 <strong><u>Volunteer Teacher for Functional Literacy</u></strong><br>
									 A volunteer teacher would have the opportunity to mentor and take functional literacy classes for adult learners in Swabhiman 
									 Centres.
									 </span>
									 </div><br/>
									 <?php
									if($vol_cat == 'Other'){
									 }
									 else{
									 ?>
									
									 <?php
									   }
									 ?>
									<input type="checkbox" name="c5" value="educative_session"  id="c5" onClick="chkValidation()">
										Supplemental Educative Sessions<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
										 <strong><u>Supplemental Educative Sessions</u></strong><br>
										 Aimed at awareness generation on relevant topics and skill building for adult learners, this initiative is geared to educate and
										 engage them in different workshops that will add value to their lives.  
										 </span>
										 </div>
						</div>
					</div>				
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<br/> 	
							<?php
							 if($vol_cat == 'Rotarian' || $vol_cat == 'Inner Wheel'){
							?>
							<h2 style="text-align:left">Fundraising</h2>
							<?php
							}
							 else{
							 ?>
							 
							 <?php
							   }
							 ?>
								<input type="checkbox" name="c13" value="fund_raise" id="c13" onClick="chkValidation()">
								  Help Raise Funds<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
									 <strong><u>Help Raise Funds</u></strong><br>
									 Help us to raise funds for the T-E-A-C-H
									 </span>
									 </div><br/>
						</div>
						
						<div class="form-group">
							<br/> 							
							<h2 style="text-align:left">Communications</h2>
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
								<input type="checkbox" name="c7" value="graphic_design" id="c7" onClick="chkValidation()">&nbsp;&nbsp;Graphic Design<br/>
								<input type="checkbox" name="c8" value="content_write" id="c8" onClick="chkValidation()">&nbsp;&nbsp;Content Writing and Editing<br/>
								<input type="checkbox" name="c9" value="audio_production" id="c9" onClick="chkValidation()">&nbsp;&nbsp;Audio Visual Productions<br/>
								<input type="checkbox" name="c10" value="photography" id="c10" onClick="chkValidation()">&nbsp;&nbsp;Photography<br/>
								<input type="checkbox" name="c11" value="social_media" id="c11" onClick="chkValidation()">&nbsp;&nbsp;Social Media Communications<br/>
								<input type="checkbox" name="c12" value="it_dev" id="c12" onClick="chkValidation()">&nbsp;&nbsp;IT Development<br/><br/><br/>
						</div>
					</div>				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<center>
							<br/>
								<input type="submit" value="Next" class="btn btn-primary" name="submit" onClick="return validateForm();" style="text-align:center;">
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
 </form>		
 <?php
					/*if(isset($_POST['submit'])){
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
					
					$c13 = $_POST['c13'];*/
		   ?>
               <form action="summitform/submit_form.php" method="post" enctype="multipart/form-data" name="full_form" id="form" onsubmit="return checkCheckBox(this)">
                <?php
					///////////////////////// Teacher support /////////////////////////////////////////////
					if($c1 == 'teacher_train' && $c1!=''){
					?>
                    <!--<h2>Teacher Support</h2>-->
                <!--<table width="100%" border="1">
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
                        <input type="checkbox" name="qualification[]" value="Educationist" required>
                        &nbsp;Educationist<br>
                        <input type="checkbox" name="qualification[]" value="Teacher"required>
                        &nbsp;Teacher<br>
                        <input type="checkbox" name="qualification[]" value="Professor"required>
                        &nbsp;Professor<br>
                        <input type="checkbox" name="qualification[]" value="Teacher Trainer"required>
                        &nbsp;Teacher Trainer<br>
                        <input type="checkbox" name="qualification[]" value="Teacher at training school or colleges"required>
                        &nbsp;Teacher at training school or colleges<br>
                        <input type="checkbox" name="" value="Other" id="chkPassport1" onclick="ShowHideDiv1(this)" >
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
                          <input type="radio" name="yes" value="Yes" onClick="show_more1()" id="hmm">
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
                              <td><input type="checkbox" name="traning[]" value="Child and Adolescent Developmnet"required>
                                  &nbsp;Child and Adolescent Development
                                  <input type="checkbox" name="traning[]" value="Classrom Management"required>
                                  &nbsp;Classroom Management
                                  <input type="checkbox" name="traning[]" value="Assessment and Evaluation Studies"required>
                                  &nbsp;Assessment and Evaluation Studies
                                  <input type="checkbox" name="traning[]" value="Awareness about children with disabilities"required>
                                  &nbsp;
                                  Awareness about Children with Disabilities
                                  <input type="checkbox" name="traning[]" value="Gender Sensivity"required>
                                  &nbsp;Gender Sensitivity
                                  <input type="checkbox" name="traning[]" value="Non Violent Discipline"required>
                                  &nbsp;Non Violent Discipline
                                  <input type="checkbox" name="traning[]" value="Human Rights"required>
                                  &nbsp;Human Rights
                                  <input type="checkbox" name="traning[]" value="Hygiene and Sanitation"required>
                                  &nbsp;Hygiene and Sanitation
                                  <input type="checkbox" name="traning[]" value="Creative Pedagogy">
                                  &nbsp;Creative Pedagogy
                                  <input type="checkbox" name="traning[]" value="Life Skills Education">
                                  &nbsp;Life Skills Education
                                  <input type="checkbox" name="traning[]" value="Creative Thinking and Problem Solving">
                                  &nbsp;Creative Thinking and Problem Solving
                                  <input type="checkbox" name="traning[]" value="Student Leadership and Personal Development "required>
                                  &nbsp;
                                  Student Leadership and Personal Development 
                                  <input type="checkbox" name="" value="Other" id="chkPassport2" onclick="ShowHideDiv2(this)" >
                                  &nbsp;Other
                                  <div id="dvPassport2" style="display: none">
                                  Please specify: <input type="text" id="txtPassportNumber2" name="traning[]"/>
                                  </div>
                                  
                                  </td>
                            </tr>
                              <tr>
                              <td colspan="2">How many years of experience do you have for the topic/topics selected by you?</td>
                            </tr>
                              <tr >
                              <td colspan="2"><input type="radio" name="experience" value="3-5 years">
                                  &nbsp;3-5 years
                                  <input type="radio" name="experience" value="5-10 years">
                                  &nbsp;5-10 years
                                  <input type="radio" name="experience" value="More than 10 years">
                                  &nbsp;More than 10 years </td>
                            </tr>
                              <tr>
                              <td colspan="2">Please provide details of the experience you have in conducting trainings on these topics. </td>
                            </tr>
                              <tr>
                              <td colspan="2"><textarea name="exp_detail" class="form-control"></textarea></td>
                            </tr>
                              <tr>
                              <td colspan="2">Please select the days of the week on which you are available</td>
                            </tr>
                              <tr>
                              <td colspan="2"><input type="checkbox" name="week[]" value="Monday">
                                  &nbsp;Monday
                                  <input type="checkbox" name="week[]" value="Tuesday"required>
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
                                  <input type="checkbox" name="week[]" value="Any Day"required>
                                  &nbsp;Any Day</td>
                            </tr>
                              <tr>
                              <td colspan="2">Please mention total hours in a month that you would be able to volunteer for such training</td>
                            </tr>
                              <tr>
                              <td colspan="2"><input type="text" name="hours" value="" class="form-control"></td>
                            </tr>
                              <tr>
                              <td colspan="2">Geographical area of work*</td>
                            </tr>
                            <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district" value="" class="form-control"required></td>
                            </tr>
                            <tr>
                              <td>City &nbsp;&nbsp;&nbsp;
                                  <input type="text" name="city" value="" class="form-control"required></td>
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
                </table>-->
                <?php	
					 }
					if($c4 == 'supplment_teach' && $c4!=''){
					?>
                    <h2>Teacher Support</h2>
                <!--<table width="100%" border="1">
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
                          <td colspan="2"><input type="checkbox" name="activity" value="curricular activity" onClick="show_more01()" id="activity">
                        &nbsp; Co-Curricular activities
                        <input type="checkbox" name="activity" value="oriented activities" onClick="show_more02()" id="oriented">
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
                              <td colspan="2"><textarea name="co_activity02" class="form-control"></textarea></td>
                            </tr>
                            </table>
                        <table style="display:none;" id="show_val02">
                              <tr>
                            <td colspan="2">What kind of subject support would you like to provide? </td>
                          </tr>
                              <tr>
                            <td colspan="2"><select name="subject[]">
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
                            <td colspan="2"><textarea name="co_activity03" class="form-control"required></textarea></td>
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
                          <td colspan="2"><input type="checkbox" name="week_01[]" value="Monday"required>
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
                    </table>-->
                <?php	
				///////////////////////// Teacher support End /////////////////////////////////////////////
				
				///////////////////////// Adult Literacy  /////////////////////////////////////////////
					 }
					if($c2 == 'volunteer_teacher' && $c2!=''){
					?>
                    <h2>Adult Literacy</h2>
                <!--<table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Volunteer Teacher For Functional Literacy</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Do you have any previous experience in teaching? Please provide details. (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="previous_experience_02" class="form-control"></textarea></td>
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
                        <input type="checkbox" name="" value="Other" id="chkPassport" onclick="ShowHideDiv(this)" >
                        &nbsp;Other
                        <div id="dvPassport" style="display: none">
                         Specify: <input type="text" id="txtPassportNumber" name="extra_activity_conduct[]"/>
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
                        &nbsp;0700 hours to 0900 hours
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
                                  <input type="text" name="district_01" value="" class="form-control"></td>
                            </tr>
                    <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_01" value="" class="form-control"></td>
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
                    </table>--> 
                <?php	
					 }					 
					if($c5 == 'educative_session' && $c5!=''){
					?>
                    <h2>Adult Literacy</h2>
                <!--<table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Supplemental Educative Sessions</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention the name of the topic on which you would like to take training/awareness building sessions (10 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="building_sessions_06" class="form-control"></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please provide a brief description of this training/awareness session (scope, methodology and duration). (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="methodology_session_06" class="form-control"></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Do you have any previous experience in conducting such trainings/awareness session? Please provide details. (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="previous_experience_06" class="form-control"></textarea></td>
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
                        &nbsp;0700 hours to 0900 hours
                        <input type="checkbox" name="time_06[]" value="1700 hours  to 1900 hours">
                        &nbsp;17.00 hours  to 19.00 hours
                        <input type="checkbox" name="time_06[]" value="1900 hours to 2100 hours">
                        &nbsp;19.00 hours to 21.00 hours </td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention total weekly hours that you would be able to volunteer :</td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="weekly_hour" value="" class="form-control"></td>
                        </tr>
                    <tr>
                          <td colspan="2">Geographical area of work*</td>
                        </tr>
                     <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district_04" value="" class="form-control"></td>
                            </tr>
                      <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_06" value="" class="form-control"></td>
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
                    </table>-->
                <?php
				///////////////////////// Adult Literacy End /////////////////////////////////////////////	
					 }
				///////////////////////// Child Screen ////// /////////////////////////////////////////////	 
					 if($c3 == 'child_screen' && $c3!=''){
					?>
                    <h2>Child Development</h2>
                <!--<table width="100%" border="1">
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
                                  <input type="text" name="district_02" value="" class="form-control"></td>
                            </tr>
                    <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_02" value="" class="form-control"></td>
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
                    </table>-->
                <?php	
				///////////////////////// Child Screen ////// ///////////////////////////////////////////////
				///////////////////////// Extra Activity ////// /////////////////////////////////////////////	
					 }
					 if($c6 == 'curricular_activity' && $c6!=''){
					?>
<!--/*                    <h2>Child Development</h2>
                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Extra-Curricular Activities</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">What would you like to teach in co-curricular activities? Please specify 2 such activities</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="cocurricular_activities_teach" class="form-control"></textarea></td>
                        </tr>
                    <tr>
                          <td colspan="2">Do you have any previous experience in teaching this? Please provide details. (100 words)</td>
                        </tr>
                    <tr>
                          <td colspan="2"><textarea name="previous_experience_cocurricular" class="form-control"></textarea></td>
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
                        &nbsp;11.00hours to 12.00 hours
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
                          <td colspan="2"><input type="text" name="weekly_hour" value="" class="form-control"></td>
                        </tr>
                    <tr>
                          <td colspan="2">Geographical area of work*</td>
                        </tr>
                        <tr>
                              <td>District [Geographical District area that you wish to work]&nbsp;&nbsp;&nbsp;
                                  <input type="text" name="district_05" value="" class="form-control"></td>
                            </tr>
                    <tr>
                          <td>City &nbsp;&nbsp;&nbsp;
                        <input type="text" name="city_08" value="" class="form-control"></td>
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
                    </table>*/-->  
                <?php
				///////////////////////// Extra Activity End /////////////////////////////////////////////////////////////////		
				///////////////////////// Communication Start ////////////////////////////////////////////////////////////////		
					 }
				if(($c7 == 'graphic_design' || $c8 == 'content_write' || $c9 == 'audio_production' || $c10 == 'photography' || $c11 == 'social_media' ||
				$c12 == 'it_dev')){
			    ?>
<!--                <h2>Communications</h2>
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
                          <td colspan="2"><input type="text" name="commu_quali" value="" class="form-control"></td>
                        </tr>
                        
                    <tr>
                          <td colspan="2">How many years of experience do you have on the area of work selected by you? </td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="experience_commu" value="" class="form-control"></td>
                        </tr>
                  <td align="center"><input type="hidden" name="for_what" value="<?php echo $chkn; ?>"></td>         
                  <td align="center"><input type="hidden" name="commu" value="commu"></td>
                  <td align="center"><input type="hidden" name="type_commu" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_commu" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>-->
                <?php
				}
				elseif(($c7 == 'graphic_design' && $c8 == 'content_write' && $c9 == 'audio_production' && $c10 == 'photography' && $c11 == 
					'social_media' && $c12 == 'it_dev')){
				?>
                <h2>Communications</h2>		 
<!--				<table width="100%" border="1">
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
                    </table>-->		 
		 
				<?php
				///////////////////////// Communication End ///////////////////////////////////////////////////////////////			 
				}
				 if($c13 == 'fund_raise' && $c13!=''){
				///////////////////////// Fund Raise Start ///////////////////////////////////////////////////////////////		
                ?>
                <h2>Fundraising</h2>	
<!--                <table width="100%" border="1">
                      <tbody>
                    <tr>
                          <td colspan="2" align="center"><strong>Fund Raising</strong></td>
                        </tr>
                    <tr>
                          <td colspan="2">Please mention your relevant qualifications </td>
                        </tr>
                    <tr>
                          <td colspan="2"><input type="text" name="fund_quali" value="" class="form-control"></td>
                        </tr>
                        
                    <tr>
                     <td colspan="2">How many years of fundraising experience do you have? </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="experience_fund" value="" class="form-control"></td>
                   </tr> 
                   <tr>
                     <td colspan="2">What is the highest amount you have raised earlier for any development project? </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="amt_fund" value="" class="form-control"></td>
                   </tr>
                   <tr>
                     <td colspan="2">Mention the year </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="year_fund" value="" class="form-control"></td>
                   </tr>
                   <tr>
                     <td colspan="2">From where did you raise the amount ? </td>
                    </tr>
                    <tr>
                     <td colspan="2"><input type="text" name="where_raise_fund" value="" class="form-control"></td>
                   </tr>
                  <td align="center"><input type="hidden" name="fund_raise" value="fund_raise" ></td>
                  <td align="center"><input type="hidden" name="type_fund_raise" value="<?php echo $vol_type; ?>" ></td>
                  <td align="center"><input type="hidden" name="id_fund_raise" value="<?php echo $vol_id; ?>" ></td>
                  </tbody>
                    </table>-->
                
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
   
            <!-- <table width="100%" border="1">
             <tbody>
             <tr>
              <td colspan="2"><input type="checkbox" value="0" name="agree">
              By clicking here I acknowledge and agree that I have read through the 
              <a href="javascript:popUp2('term_condition.html')" style="text-decoration:underline; color:#4557E3;">Terms and Conditions 
              </a> as well as details of areas of work as above.
              </td>
             </tr>         
                    <tr>
                       <input type="hidden" name="person_id" value="<?php echo $_GET['ver']; ?>">
                       <input type="hidden" name="person_email_id" value="<?php echo $email; ?>">
                       
                       <td align="center"><input type="submit" name="submit" value="Confirm"></td>
                    </tr>
                  </tbody>
             </table>-->
              </form>
                  <?php
					//}
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
	  if(form == "Yes"){
		 document.getElementById('show_val').style.display = ''; 
	  }
	  else{
		 document.getElementById('show_val').style.display = "none";  
	  }
	}
	///////////////////////////////////////////////////////////////////////////////////
	
	function show_more01()
	{
	  var form = document.getElementById("activity").value;
	  //alert(form);
	  if(form == "curricular activity"){
		 document.getElementById('activity01').style.display = ''; 
	  }
	  else{
		 document.getElementById('activity01').style.display = "none";  
	  }
	}
	function show_more02()
	{
	  var form = document.getElementById("oriented").value;
	  //alert(form);
	  if(form == "oriented activities"){
		 document.getElementById('show_val02').style.display = ''; 
	  }
	  else{
		 document.getElementById('show_val02').style.display = "none";  
	  }
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
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
	 function ShowHideDiv1(chkPassport1) {
        var dvPassport = document.getElementById("dvPassport1");
        dvPassport.style.display = chkPassport1.checked ? "block" : "none";
    }
	 function ShowHideDiv2(chkPassport2) {
        var dvPassport = document.getElementById("dvPassport2");
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