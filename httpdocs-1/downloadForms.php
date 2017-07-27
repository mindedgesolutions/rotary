<?php
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rotary Teach - National Committee</title>
    <!-- Css Files -->
    <?php include('include/favicon.php'); ?>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/dl-menu.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet"> 
    <link href="css/prettyphoto.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!-- Color Css Files Start -->
    <!-- Color Css Files End -->
<script>
function myFunction() {
    var myWindow = window.open("district_option.php", "", "top=200, left=500, width=400, height=400");
}
function CloseAndRefresh() 
  {
     opener.location.reload(true);
     self.close();
  }
</script>   

</head>
<style>
.row{
	margin:25px;
}
.headingH2{
	padding:20px;
	text-align:center;
}
.headingH3{
	padding:20px;
	text-align:left;
}
p{
	text-align:left;
}
.headingH4{
	text-align:center;
	padding:10px;
	text-decoration:underline;
}
li{
	text-align:left;
}
.headingTab{
	border:1px solid #7d99ca;
	font-size:15px;
	text-align:center; 
	padding: 20px 0; 
	text-decoration:none; 
	font-weight:bold; 
	color: #FFFFFF; 
	background-color: #a5b8da; 
	background-image: linear-gradient(to bottom, #a5b8da, #7089b3); 
	text-shadow:0 1px 1px #333333
}
.downFormBtn{
	padding:5px;
	margin:15px;
	background-color:#37B5E8;
	color:#ffffff;
}
.as-minheader-wrap{
	padding:0px 0px!important;
}
</style>
  <body style="padding-right:0px;">
    <!-- Color Switcher -->
    <!-- Color Switcher -->

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" >

        <!--// TopStrip //-->
        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-topstrip as-bgcolor">
            <?php //include('include/top-head-new.php'); ?>
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
				  <?php include('include/navigation_mem.php'); ?>
                  <?php //include('include/navigation_new.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
			  </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header class="as-section-right" //-->
	  
	   <div class="as-minheader">
     
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Download Forms</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="downloadForms.php">Download Forms</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="as-main-content">
<!--// MainSection //-->
<center>
<br/>

<div class="row">
	<div class="col-md-12" >
		<p style="font-style:italic;color:#red;">Click on the Form No. to get the form.</p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="headingTab">Comprehensive Survey Form</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td style="width:30%;">Form No.</td>
				<td style="width:70%">Form Description</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<!-- <div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/School Survey Form (Final).pdf" target="_blank" title="Comprehensive Survey Form">R 1.1</a></div> -->
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Offline School Survey Form (R1.1)_18_03_17.pdf" target="_blank" title="Comprehensive Survey Form">R 1.1</a></div>
				</td>
				<td style="width:70%">Comprehensive School Survey Form</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="headingTab">T - Teacher Support</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td style="width:30%;">Form No.</td>
				<td style="width:70%">Form Description</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Guidelines, Nation Builder Award 2016.pdf" target="_blank" >NBA Guideline</a></div>
				</td>
				<td style="width:70%">Nation Builder Award Guideline</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Teacher Evaluation form NB 1.1.pdf" target="_blank" >NB1.1</a></div>
				</td>
				<td style="width:70%">Evaluation Sheet to be filled by a Student for Nation Builder Award</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Teacher Evaluation form NB 2.1.pdf" target="_blank" >NB2.1</a></div>
				</td>
				<td style="width:70%">Evaluation Sheet to be filled by the Principal/Head Teacher for Nation Builder Award</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Teacher Evaluation form NB 3.1.pdf" target="_blank">NB3.1</a></div>
				</td>
				<td style="width:70%">Compilation Sheet for Nation Builder Award</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/(DIET)InformationSheetFormNo.T6.pdf" target="_blank" >T6</a></div>
				</td>
				<td style="width:70%">District Institute of Education and Training (DIET) Information</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="headingTab">E-Learning</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td style="width:30%;">Form No.</td>
				<td style="width:70%">Form Description</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="e-learning.pdf" target="_blank" title="E-learning Grant Application Form">EL1</a></div>
				</td>
				<td style="width:70%">E-Learning Grant Application Form</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Requirement letter from District Authority.pdf" target="_blank" title="Requirement letter from District Authority">EL1.1</a></div>
				</td>
				<td style="width:70%">Requirement letter from District Authority</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Requirement letter from School Principal.pdf" target="_blank" title="Requirement letter from School Principal">EL2.1</a></div>
				</td>
				<td style="width:70%">Requirement letter from School Principal</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Pre Installation Baseline Data for E-learning.pdf" target="_blank" title="Pre Installation Baseline Data for E-learning">EL8.1</a></div>
				</td>
				<td style="width:70%">Pre Installation Baseline Data for E-learning</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Requirement letter from School Principal.pdf" target="_blank" title="Follow Up Visit Form- Rotarian and IW">EL6.1</a></div>
				</td>
				<td style="width:70%">Follow Up Visit Form- Rotarian and IW</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Follow Up Visit Form- RILMO and Cadre.pdf" target="_blank" title="Follow Up Visit Form- RILMO and Cadre">EL7.1(a)</a></div>
				</td>
				<td style="width:70%">Follow Up Visit Form- RILMO and Cadre</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Feedback forms for Students.pdf" target="_blank" title="Feedback Forms for Students">EL7.1(b)</a></div>
				</td>
				<td style="width:70%">Feedback Forms for Students</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Feedback forms for Teachers.pdf" target="_blank" title="Feedback Forms for Teachers">EL7.1(c)</a></div>
				</td>
				<td style="width:70%">Feedback Forms for Teachers</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Feedback Forms for Parents.pdf" target="_blank" title="Feedback Forms for Parents">EL7.1(d)</a></div>
				</td>
				<td style="width:70%">Feedback Forms for Parents</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="headingTab">A - Adult Literacy</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td style="width:30%;">Form No.</td>
				<td style="width:70%">Form Description</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Adult Literacy Learner Profile Card.pdf" target="_blank" title="Adult Literacy Learner Profile Card">Draft</a></div>
				</td>
				<td style="width:70%">Adult Literacy Learner Profile Card</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Monitoring Visit Form- Rotarian and Inner Wheel.pdf" target="_blank" title="Monitoring Visit Form- Rotarian and Inner Wheel">Draft</a></div>
				</td>
				<td style="width:70%">Monitoring Visit Form- Rotarian and Inner Wheel</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Monitoring Visit Form- RILMO & Cadre.pdf" target="_blank" title="Monitoring Visit Form- RILMO & Cadre">Draft</a></div>
				</td>
				<td style="width:70%">Monitoring Visit Form- RILMO & Cadre</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="headingTab">C - Child Development</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td style="width:30%;">Form No.</td>
				<td style="width:70%">Form Description</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Survey Form for Out of School Children.pdf" target="_blank" title="Survey Form for Out of School Children">C1</a></div>
				</td>
				<td style="width:70%">Survey Form for Child Development Project</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Child Profile Card.pdf" target="_blank" title="Child Profile Card">C2</a></div>
				</td>
				<td style="width:70%">Child Profile Card</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Progress_Report_Card.pdf" target="_blank" title="Progress Report Card">C3</a></div>
				</td>
				<td style="width:70%">Progress Report Card</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="headingTab">H - Happy Schools</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td style="width:30%;">Form No.</td>
				<td style="width:70%">Form Description</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="happy_school.pdf" target="_blank">H4</a></div>
				</td>
				<td style="width:70%">Happy School Grant Application Form</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="download-FORMS/Child Profile Card.pdf" target="_blank" title="Child Profile Card">C2</a></div>
				</td>
				<td style="width:70%">Child Profile Card</td>
			</tr>
			<tr>
				<td style="width:30%;">
					<div><img src="images/pdf.png" /><a class="downFormBtn" href="documents/WIZDOM LIBRARY DONATION FORM.docx" target="_blank">WL 1.1</a></div>
				</td>
				<td style="width:70%">Wizdoms Libraries Application Form</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div style="float:left;"><img src="images/pdf.png" /><a href="Goal Form 2016-17.pdf" title="Club Goals Form" target="_blank">
            <font color="#666666">Click here to Download</font> Club Goals Form 2016-17 <em style="color:#999999; font-weight:normal">(PDF Presentation)</em>
        </a></div>
	</div>
</div>
<!--// MainSection //-->
</center>
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
    
    <!--// Main Wrapper //-->
</div>
    <!-- Search Modal -->
    <?php //include('include/search-model.php'); ?>
    <!-- Search Modal -->
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
    <script>
      // NewsTicker
      'use strict';
        var options = {
          newsList: "#as-news",
          startDelay: 10,
          placeHolder1: ""
        }
        jQuery().newsTicker(options);
    </script>
  </body>
</html>