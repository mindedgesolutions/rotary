<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['form_volunteer_exist']) > 3){
?>
<script>
	window.location = 'http://rotaryteach.org/vertical_form_test_11.php';
</script>
<?php
}else{
	
}

include('include/config.php');
include('include/config-2.php');

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 30; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}

if(!isset($_SESSION['userId'])){
  $_SESSION['userId'] = $randomString;
  
}else{

  $checkSession = mysql_num_rows(mysql_query("select * from rotary32_teach2.traffic_master where user_session='".$_SESSION[userId]."'"));

  if ($checkSession == 0){

    $insertQry = "insert into rotary32_teach2.traffic_master(SLN, url, user_session, visit_time) values('', 'http://rotaryteach.org/', '".$_SESSION[userId]."', '".date('Y-m-d H:i:s')."')";

    mysql_query($insertQry);
  }
}
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
  
    
  <!-- <link href="css/imagehover.css" rel="stylesheet" media="all"> -->
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
<style>
.main-navigation > .firstUl > .menuFirst > .menuFirstLink{
  color: #EDB542;
  padding-right:10px;
  padding-left:10px;
  padding-top:0px;
  padding-bottom:0px;

}
.main-navigation .firstUl .menuFirst{
  border-right: 1px solid #EDB542;
  height: 20px;
}

.main-navigation .firstUl {
margin-top: 6%;
}
</style> 

</head>
<body style="padding-right:0px;">
    <!-- Color Switcher -->
    <!-- Color Switcher -->

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" class="as-absolute" >

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
          <?php include('include/navigation_new.php'); ?>
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
      <!--// Header //-->

      <!--// MainBanner //-->
      <!--<div class="as-mainbanner" style="margin-top : 180px;">
        <?php //include('include/liveStreaming.php'); ?>
      </div>-->
    
    <div class="as-mainbanner" style="margin-top : 10px;">
        <?php include('include/banner.php'); ?>
      </div>
      <!--// MainBanner //-->

      <!--// Main Content //-->
      <div class="as-main-content">

        <!--// MainSection //-->
        <!--<div class="as-main-section as-ticker" style=" padding: 25px 0px 15px 0px; margin-top: -50px; ">
          <div class="container">
            <div class="row">
              
              <?php //include('include/latest-news.php'); ?>
            </div>
          </div>
        </div>-->
        <!--// MainSection //-->
    <!-- Live Streaming -->
    <!--<div class="as-main-section" style=" padding: 10px 0px 0px 0px; ">
          <div class="container">
            <?php //include('include/liveStreaming.php'); ?>
          </div>
        </div>-->
    <!-- Live Streaming -->
        <!--// Video Section //-->
      <div class="as-main-section" style=" padding: 10px 0px 0px 0px; ">
        <div class="container">
            <?php include('include/video-section.php'); ?>
          </div>
        </div>
        <!--// Video Section //-->
        <!--//Banner //-->
        <div class="as-main-section" style=" padding: 10px 0px 0px 0px; ">
          <div class="container">
            <?php include('include/past-activities.php'); ?>
          </div>
        </div>
        <!--// Banner //-->
    
        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 10px 0px 0px 0px; ">
          <div class="container">
            <?php //include('include/tabs1.php'); ?>
      <?php //include('include/Current_Activities_new.php'); ?>
      <?php include('include/present-activities.php'); ?>
          </div>
        </div>
        <!--// MainSection //-->
    
     <!--// Up Comming //-->
        <div class="as-main-section" style=" padding: 10px 0px 0px 0px; ">
          <div class="container">
      <?php //include('include/up_comming_new.php'); ?>
      <?php include('include/future-activities.php'); ?>
      
          </div>
        </div>
        <!--// Up Comming //-->

        <!--<div class="as-main-section" style=" padding: 0px 0px 50px 0px; ">
          <div class="container">
            <div class="row">
              
       <?php include('include/cause.php'); ?>

            </div>
          </div>
        </div>-->
        
        
        <!--// MainSection //-->
         <?php include('include/no_of_doing.php'); ?>
        <!--// MainSection //-->

        <!--// MainSection //-->
        <div class="as-main-section" style=" ">
          <div class="container-fluid">
            <div class="row">

        <?php include('include/gallery.php'); ?>

            </div>
          </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 50px 0px 20px 0px; ">
          <div class="container">
            <div class="row">
              
        <?php //include('include/volunteer.php'); ?>
            </div>
          </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->
        <?php //include('include/our-reach.php'); ?>
        <!--// MainSection //-->

        <!--// MainSection //-->
        <?php //include('include/testimonial.php'); ?>
        <!--// MainSection //-->

        <!--// Our Shop //-->
        <?php //include('include/shop.php'); ?>
        <!--// Our Shop //-->

        <!--// MainSection //-->
       <!--no of doing-->
        <!--// MainSection //-->

        <!--// Sponcer //-->
        <!--
		<div class="as-main-section" style=" padding: 38px 0px 50px 0px; ">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <div class="as-fancytitle"><h2>OUR PARTNERS</h2></div>

                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> 
                  <span class="as-third-dote"></span> </div>
                </div>
              </div>
              <?php include('include/sponser.php'); ?>
              
            </div>
          </div>
        </div>
        -->
		<!--// Sponcer //-->

        <!--// MainSection //-->
        <?php include('include/extra-part.php'); ?>
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