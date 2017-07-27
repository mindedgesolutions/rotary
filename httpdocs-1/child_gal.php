<?php include('include/config-2.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Child Development | <?php include('include/title.php'); ?></title>

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

    <style type="text/css">
    .thumb-div-1{
      height: 250px;
      overflow: hidden;
    }
    </style>
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
                  <h1>RILM Child Development</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="teacher_gal.php#">Child Development</a></li>
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
				<div class="as-fancytitle"><h2>Child Development</h2></div>
                <div class="as-fancy-divider-wrap">
                  <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> <span class="as-third-dote"></span> </div>
                </div>
                <div class="as-gallery">
                  <ul class="row gallery">

                    <?php
                    $query_getDevelop = mysql_query("select * from image_master where gallery_type='Child Development' and status='activate' order by SLN desc");
                    while ($getDevelop = mysql_fetch_array($query_getDevelop)){
                    ?>
                    
                    <li class="col-md-3">
                      <figure>
                        <div class="thumb-div-1">
                          <img src="backend-cms/<?= $getDevelop['image'] ?>" alt="<?= urldecode($getDevelop['image_name']) ?>" style="height: 250px;width: 100%;" />
                        </div>
                        <figcaption>
                          <div class="as-galleryinfo">
                            <h3><?= strtoupper(urldecode($getDevelop['image_header'])) ?></h3>
                          </div>
                          <div class="as-gallery-icon">
                            <a href="backend-cms/<?= $getDevelop['image'] ?>" data-rel="prettyPhoto[gallery1]" title="" class="as-bgcolorhover">
                            <i class="fa fa-search-plus"></i></a>
                            
                          </div>
                        </figcaption>
                      </figure>
                    </li>
                    
                    <?php } ?>
                                        
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