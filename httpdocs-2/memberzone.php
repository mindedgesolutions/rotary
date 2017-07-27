<?php
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php include('include/title.php'); ?></title>
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
	 <!-- <link href="menu_v.css" rel="stylesheet" type="text/css" />-->
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
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsiveTest.php'); ?>

              </div>
			  </div>
            </div>
          </div>
        </div>

      </header>

      <!--// Header class="as-section-right" //-->
<div class="as-main-content">

<!--// MainSection //-->
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-10">
					<p align="justify">Rotary in India through <b>“Rotary India Literacy Mission”</b> has embarked upon one of the most 
					comprehensive programs on Total Literacy and Quality Education. This mission wishes to achieve the literacy 
					goals through its comprehensive program called <b>T-E-A-C-H:</b></p><br/>
					<b>T</b> – Teacher Support<br/><br/>
					<b>E</b> – E-learning<br/><br/>
					<b>A</b> – Adult Literacy<br/><br/>
					<b>C</b> – Child Development<br/><br/>
					<b>H</b> – Happy School <br/><br/>
					<p align="justify">Each of these programs with specific focus is inter-linked with the others in objective and content,
					accompanied with improvement in learning outcome of primary education and spread of adult literacy in various
					parts of the country. <br/><br/>
					Understanding the enormity of the task, we have decided to adopt, in implementing <b>T-E-A-C-H,</b> a strategy 
					of meaningful co-operation with all actors in the field, by forging strong partnerships with the Government, 
					Corporate, National/ State specific Non-Governmental Organisations as well as international organisations 
					working in various segments of this country wide endeavour. 
					</p>
					<br />
			
					<p style="text-align:left; font-weight:bold; margin:0 0 7px 0">WHAT DOES T-E-A-C-H DO ?</p>
					<br/>
					<p align="justify">
						<b>*</b> Train and recognize outstanding teachers in primary / elementary schools <br><br>
						<b>*</b> Establish E-Learning Centers in schools <br><br>
						<b>*</b> Educate adult non-literates across the country <br><br>
						<b>*</b> Send children back to school <br><br>
						<b>*</b> Upgrading elementary schools to Happy Schools to curtail student dropouts <br><br>
                
					</p>
			</div>
			<div class="col-md-2">
				<center>
					<a href="http://www.rotaryteach.org/TEACH Brochure 16-17.pdf" target="_blank" title="T-E-A-C-H Brochure">
					<img src="images/TEACH_brochure-1.jpg" alt="T-E-A-C-H Brochure" width="200" border="0" align="center" style="margin:0 0 0px 0px; padding:1px; border:1px solid
					 #333333"></a>
					<br/>
					<!--
					<ul class="vert1">
						<li><a href="http://rotaryteach.org/teacher_support.php"></a></li>
					</ul>
					<ul class="vert2">
						<li><a href="http://rotaryteach.org/elearning.php"></a></li>
					</ul>
					<ul class="vert3">
						<li><a href="http://rotaryteach.org/adult_literacy.php"></a></li>
					</ul>
					<ul class="vert4">
						<li><a href="http://rotaryteach.org/child_development.php"></a></li>
					</ul>
					<ul class="vert5">
						<li><a href="http://rotaryteach.org/happy_schools.php"></a></li>
					</ul>
					<br/>
					-->
					<p style="padding:0; margin:0; text-align: center">
						<a href="http://www.rotaryteach.org/inner_wheel.shtml" style="text-decoration:none" title="Inner Wheel Organization">
							<img src="http://rotaryteach.org/images/inner-wheel_logo.png" width="85" border="0">
						</a>
						<a href="http://www.rotaryteach.org/rotaract.shtml" style="text-decoration:none" title="Rotaractor Organization">
							<img src="http://rotaryteach.org/images/rotaract_logo.png" width="80" border="0">
						</a>
					</p>

				</center>
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