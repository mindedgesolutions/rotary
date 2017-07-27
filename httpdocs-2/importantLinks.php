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
.link li{
	text-align:left;
	padding-bottom:15px; 
	margin-bottom:15px; 
	border-bottom:1px dashed #CCCCCC;
}
a:-webkit-any-link {
    color: -webkit-link;
    text-decoration: underline;
    cursor: auto;
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

      </header><!--// Header class="as-section-right" //-->
	  
	   <div class="as-minheader">
     
        <div class="as-minheader-wrap" style="background-color: rgba(0,0,0,0.50);!important">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Important Links</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="downloadForms.php">Important Links</a></li>
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
	<div class="col-md-12">
		<ul class="link">
			<li>
				<a href="http://www.schoolreportcards.in" title="" target="_blank">www.schoolreportcards.in</a> - A Comprehensive database on Elementary Education in India.
			</li>
			<li>
				<a href="http://www.schoolreportcards.in" title="" target="_blank">www.rotary.org</a> - The website of Rotary International.
			</li>
			<li>
				<a href="http://www.schoolreportcards.in" title="" target="_blank">www.mhrd.gov.in</a> - The website of Ministry of HRD, Govt. of India.
			</li>
			<li>
				<a href="http://www.asercentre.org" target="_blank">www.asercentre.org</a> - The Website of ASER Centre, publishers of the ASER Report [PRATHAM Report]
			</li>
			<li>
				<a href="http://www.ncert.nic.in/" target="_blank">www.ncert.nic.in</a> - The Website of National Council of Educational Research and Training (NCERT)
			</li>
			<li>
				<a href="http://www.visualeducation.in" target="_blank">www.visualeducation.in</a> - Free E-Learning Modules as per Curriculum for Teachers and Students.
			</li>
			<li>
				<a href="http://www.nsdcindia.org" target="_blank">www.nsdcindia.org</a> - Website of National Skill Development Corporation, a pioneering Public Private partnership.
			</li>
			<li>
				<a href="http://msme.gov.in" target="_blank">www.msme.gov.in</a> - Website of Ministry of Micro, Small &amp; Medium Enterprises having National MSME Trainee database and other related information.
			</li>
			<li >
				<a href="http://www.nlm.nic.in/listofslma.htm" title="" target="_blank">www.nlm.nic.in/listofslma.htm</a> - Address of State Literacy Mission.
			</li>
		</ul>
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
    </div>
    <!--// Main Wrapper //-->

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