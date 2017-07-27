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
<body>
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
                  <h1>PPTs</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="downloadPPT.php">PPTs</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="as-main-content">
<!--// MainSection //-->
<div class="row">
	<div class="col-md-12">		
			<h2 style="color:navy;text-align:left; font-size:25px;">Power Point Presentations</h2><br/>
			The following presentations to be used for Level 1, 2 & 3 training. These are the same presentations that were used during Ignite. 
	</div>
</div>
<center>
<div class="row">
	<div class="col-md-12" >
		<div style="border-top:1px solid #999999;border-bottom:2px solid #999999;height:6px;"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<!--
    <div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /> <a href="ppt_folder/18_04_2017/TEACH Project PPT_17-01-2017.pptx" style="padding:16px 0 16px 40px" title="T-E-A-C-H Overview">
            T-E-A-C-H overview 
        </a></div>
    -->

    <div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /> <a href="ppt_folder/06_06_2017/TEACH PPT.pptx" style="padding:16px 0 16px 40px" title="T-E-A-C-H Overview">
            TEACH OVERVIEW
        </a></div>

	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /> <a href="ppt_folder/18_04_2017/Teacher Support.pptx" style="padding:16px 0 16px 40px" title="Teacher Support">
            Teacher Support
        </a></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /><a href="ppt_folder/18_04_2017/E-Learning.pptx" style="padding:16px 0 16px 40px" title="T-E-A-C-H Overview">
            E-Learning
        </a></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /><a href="ppt_folder/18_04_2017/Adult Literacy.pptx" style="padding:16px 0 16px 40px" title="FINAL Role of  Volunteers in Happy Schools">
            Adult Literacy
        </a></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /><a href="ppt_folder/18_04_2017/Child Development.pptx" style="padding:16px 0 16px 40px" title="FINAL Role of  Volunteers in the Adult Literacy - AP">
            Child Development
        </a></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /><a href="ppt_folder/18_04_2017/Happy School.pptx" style="padding:16px 0 16px 50px" title="">
            Happy School
        </a></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /><a href="ppt_folder/18_04_2017/Volunteer Management.pptx" style="padding:16px 0 16px 50px" title="">
            Volunteer Managment
        </a></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		<div style="float:left;border-bottom:1px dashed #999999;" ><img src="images/ppt-d.png" /><a href="ppt_folder/18_04_2017/T-E-A-C-H Holistic Approach.pptx" style="padding:16px 0 16px 50px" title="">
             T-E-A-C-H Holistic Approach 
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