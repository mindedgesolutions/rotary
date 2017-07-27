<?php include('include/config-2.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media | <?php include('include/title.php'); ?></title>

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
                  <h1>RILM Media</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="media.php#">Media</a></li>
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
				<div class="as-fancytitle"> <h2>RILM T-E-A-C-H</h2> </div>
                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                </div>
                <div class="as-gallery">
                  <ul class="row gallery">
                    <?php
                    $query_getDet1 = mysql_query("select * from video_master where video_type='rilm_teach' and status='activate' order by SLN desc");
                    while ($getDet1 = mysql_fetch_array($query_getDet1)){

                      $ytCode1 = substr(urldecode($getDet1['video']), -11);
                    ?>
                    <li class="col-md-3">
                      <figure style="height: 350px;">
                      <div class="as-map">
                  		<iframe height="268" src="https://www.youtube.com/embed/<?= $ytCode1 ?>" frameborder="0" allowfullscreen></iframe>
                	  </div>
                      <p class="caption" style="text-align:center;"><?= $getDet1['video_header'] ?></p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
              
              <div class="col-md-12">
				<div class="as-fancytitle"><h2>Teacher Support</h2></div>
                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                </div> 
                <div class="as-gallery">
                  <ul class="row gallery">
                    <?php
                    $query_getDet2 = mysql_query("select * from video_master where video_type='teacher_support' and status='activate' order by SLN desc");
                    while ($getDet2 = mysql_fetch_array($query_getDet2)){

                      $ytCode2 = substr(urldecode($getDet2['video']), -11);
                    ?>
                    <li class="col-md-3">
                      <figure style="height: 350px;">
                      <div class="as-map">
                  		<iframe height="268" src="https://www.youtube.com/embed/<?= $ytCode2 ?>" frameborder="0" allowfullscreen></iframe>
                	  </div>
                      <p class="caption" style="text-align:center;"><?= $getDet2['video_header'] ?></p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
              
              <div class="col-md-12">
				<div class="as-fancytitle"> <h2>E-Learning</h2> </div>
                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                </div> 
                <div class="as-gallery">
                  <ul class="row gallery">
                  <?php
                  $query_getDet3 = mysql_query("select * from video_master where video_type='e_learning' and status='activate' order by SLN desc");
                  while ($getDet3 = mysql_fetch_array($query_getDet3)){

                    $ytCode3 = substr(urldecode($getDet3['video']), -11);
                  ?>
                  <li class="col-md-3">
                      <figure style="height: 350px;">
                      <div class="as-map">
                  		 <iframe height="268" src="https://www.youtube.com/embed/<?= $ytCode3 ?>" frameborder="0" allowfullscreen></iframe>
                	  </div>
                      <p class="caption" style="text-align:center;"><?= $getDet3['video_header'] ?></p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>

			  <div class="col-md-12">
				<div class="as-fancytitle"> <h2>Adult Literacy</h2> </div>
                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                </div> 
                <div class="as-gallery">
                  <ul class="row gallery">
                  <?php
                  $query_getDet4 = mysql_query("select * from video_master where video_type='adult_literacy' and status='activate' order by SLN desc");
                  while ($getDet4 = mysql_fetch_array($query_getDet4)){

                    $ytCode4 = substr(urldecode($getDet4['video']), -11);
                  ?>
                    <li class="col-md-3">
                      <figure style="height: 350px;">
                      <div class="as-map">
                  		<iframe height="268" src="https://www.youtube.com/embed/<?= $ytCode4 ?>" frameborder="0" allowfullscreen></iframe>
                	  </div>
                      <p class="caption" style="text-align:center;"><?= $getDet4['video_header'] ?></p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>

			  <div class="col-md-12">
				<div class="as-fancytitle"> <h2>Child Development</h2> </div>
                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                </div> 
                <div class="as-gallery">
                  <ul class="row gallery">
                  <?php
                  $query_getDet5 = mysql_query("select * from video_master where video_type='child_development' and status='activate' order by SLN desc");
                  while ($getDet5 = mysql_fetch_array($query_getDet5)){

                    $ytCode5 = substr(urldecode($getDet5['video']), -11);
                  ?>
                   <li class="col-md-3">
                      <figure style="height: 350px;">
                      <div class="as-map">
                  		<iframe height="268" src="https://www.youtube.com/embed/<?= $ytCode5 ?>" frameborder="0" allowfullscreen></iframe>
                	  </div>
                      <p class="caption" style="text-align:center;"><?= $getDet5['video_header'] ?></p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
              
              <div class="col-md-12">
				<div class="as-fancytitle" id="happy"> <h2>Happy School</h2> </div>
                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                </div> 
                <div class="as-gallery">
                  <ul class="row gallery">
                  <?php
                  $query_getDet6 = mysql_query("select * from video_master where video_type='happy_school' and status='activate' order by SLN desc");
                  while ($getDet6 = mysql_fetch_array($query_getDet6)){

                    $ytCode6 = substr(urldecode($getDet6['video']), -11);
                  ?>
                  <li class="col-md-3">
                      <figure style="height: 350px;">
                      <div class="as-map">
                  		 <iframe height="268" src="https://www.youtube.com/embed/<?= $ytCode6 ?>" frameborder="0" allowfullscreen></iframe>
                	  </div>
                      <p class="caption" style="text-align:center;"><?= $getDet6['video_header'] ?></p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
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
  </body>
</html>