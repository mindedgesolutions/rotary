<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | <?php include('include/title.php'); ?></title>

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
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js">
      
      </script>
    <![endif]-->
  <style type="text/css">
  body,td,th {
	font-family: "Open Sans", sans-serif;
}
  </style>
  </head>
  <body>

    <!-- Color Switcher -->
    <!-- Color Switcher -->

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" class="as-absolute">

        <!--// TopStrip //-->
        <div class="container">
          <div class="as-topstrip as-bgcolor">
            <?php include('include/top-head.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container">
          <div class="as-header-bar">
            <div class="row">
              <?php include('include/logo.php'); ?>
              <div class="col-md-10">
                <div class="as-section-right">
                  <?php include('include/navigation.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header //-->

      <div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Contact Us</h1>
                  <p></p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 0px 0px 0px 0px; ">
          <div class="container">
            <div class="row">
             
              <div class="col-md-7">
                <div class="as-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1842.6947120738096!2d88.35046601431455!3d22.527080440318475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027730302f6e25%3A0x4ffb4bb71ef63eda!2sSkyline+Builders!5e0!3m2!1sen!2sin!4v1446546202923" height="322" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-md-2">
                <ul class="as-contact-info">
                  <li>
                    <i class="fa fa-phone as-bgcolor"></i>
                    <span>+91 33 2486 3434 / 35</span>
                  </li>
                  <li>
                    <i class="fa fa-envelope-o as-bgcolor"></i>
                    <a href="contact.html#">info@rotaryteach.org</a>
                  </li>
                  <li>
                    <i class="fa fa-globe as-bgcolor"></i>
                    <a href="contact.html#">www.rotaryteach.org</a>
                  </li>
                </ul>
           
                
                
                
                
              </div>
              <div class="col-md-3">
                <div class="as-strip-title"> <h2>OUR <span class="as-color">ADDRESS</span></h2> </div>
                <p>UPL LTD, UNIPHOS HOUSE,<br> 11TH ROAD, MADHU PARK, CD MARG, KHAR (WEST), <br>MUMBAI</p>
                <br>
                <p>Skyline House,<br> 145, Sarat Bose Road, <br>Kolkata, West Bengal <br> 700 026</p>
                <ul class="as-team-network">
                  <li><a class="fa fa-facebook" href="https://www.facebook.com/RotaryIndiaLiteracyMission" target = "_blank"></a></li>
                  <li><a class="fa fa-twitter" href="https://twitter.com/Rotaryteach" target = "_blank"></a></li>
                  <li><a class="fa fa-google-plus" href="https://plus.google.com/106259922397402646339/about" target = "_blank"></a></li>
                  <li><a class="fa fa-youtube" href="https://www.youtube.com/channel/UCc1H9uMZXPXabvNx75fftkg" target = "_blank"></a></li>
                </ul>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <div class="as-strip-title"> <h2>HAVE <span class="as-color">A QUERY?</span></h2> </div>
                <!--// Comment Form //-->
                <div class="as-form">
                  <form method="post" class="myform" action="process-form.htm">
                    <p> <input type="text" placeholder="Your Name" name="name" required> </p>
                    <p> <input type="text" placeholder="Email" name="email" required> </p>
                    <p> <input type="text" placeholder="Website" name="website" required> </p>
                    <p class="as-comment"> <textarea placeholder="Comment" name="Comment"></textarea> </p>
                    <p class="as-submit"> <input type="submit" value="Submit" class="as-bgcolor"> </p>
                    <span class="output_message"></span>
                  </form>
                </div>
                <!--// Comment Form //-->
              </div>
				<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="2" cellspacing="0" align="center" style="text-align: left; border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; font-size:11px; margin-bottom:10px">
<tr style="background:#f5f5f5; font-weight:bold; text-align:center">
<td><div align="center"><strong>Sl. No.</strong></div></td>
<!--<td><div align="center"><strong>Name</strong></div></td>-->
<td><div align="center"><strong>Designation</strong></div></td>
<td><div align="center"><strong>E-mail ID</strong></div></td>
</tr>
<td><div align="center">1</div></td>
<!--<td><div align="center">Jhilam Roychowdhury</div></td>-->
<td><div align="center">COO</div></td>
<td><div align="center"><a href="mailto:program@rotaryteach.org">aapga.singh@rotaryteach.org</a></div></td>
</tr>
<td><div align="center">2</div></td>
<!--<td><div align="center">Jhilam Roychowdhury</div></td>-->
<td><div align="center">Program Manager</div></td>
<td><div align="center"><a href="mailto:program@rotaryteach.org">program@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">3</div></td>
<!--<td><div align="center">Sanchita Halder</div></td>-->
<td><div align="center">Communications Manager</div></td>
<td><div align="center"><a href="mailto:communications@rotaryteach.org">communications@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">4</div></td>
<!--<td><div align="center">Dharmendra Kr Singh</div></td>-->
<td><div align="center">Accounts</div></td>
<td><div align="center"><a href="mailto:admin@rotaryteach.org">admin@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">5</div></td>
<!--<td><div align="center">Srijita Majumder</div></td>-->
<td><div align="center">Program Associate[Teacher Support]</div></td>
<td><div align="center"><a href="mailto:teachersupport@rotaryteach.org">teachersupport@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">6</div></td>
<!--<td><div align="center">Shaoni Mukherjee</div></td>-->
<td><div align="center">Program Associate[E-Learning]</div></td>
<td><div align="center"><a href="mailto:elearning@rotaryteach.org">elearning@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">7</div></td>
<!--<td><div align="center">Rakesh Prasad</div></td>-->
<td><div align="center">Program Executive[Adult Literacy]</div></td>
<td><div align="center"><a href="mailto:adultliteracy@rotaryteach.org">adultliteracy@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">8</div></td>
<!--<td><div align="center">Biplab Das</div></td>-->
<td><div align="center">Program Associate[Child Development]</div></td>
<td><div align="center"><a href="mailto:childdevelopment@rotaryteach.org">childdevelopment@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">9</div></td>
<!--<td><div align="center">Swati Mukherjee</div></td>-->
<td><div align="center">Program Associate[Happy School]</div></td>
<td><div align="center"><a href="mailto:happyschool@rotaryteach.org">happyschool@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">10</div></td>
<!--<td><div align="center">Grant</div></td>-->
<td><div align="center">Rotary Teach Grant</div></td>
<td><div align="center"><a href="mailto:grant@rotaryteach.org">grant@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">11</div></td>
<!--<td><div align="center">Partha Ghosh</div></td>-->
<td><div align="center">Program Associate (Creatives)</div></td>
<td><div align="center"><a href="mailto:ashakiran@rotaryteach.org">partha.ghosh83@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">12</div></td>
<td><div align="center">Travel</div></td>
<td><div align="center"><a href="mailto:travel@rotaryteach.org">travel@rotaryteach.org</a></div></td>
</tr>
<tr>
<td><div align="center">13</div></td>
<td><div align="center">Donation</div></td>
<td><div align="center"><a href="mailto:donation@rotaryteach.org">donation@rotaryteach.org</a></div></td>
</tr>
</table>
            </div>
          </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->
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
  </body>
</html>