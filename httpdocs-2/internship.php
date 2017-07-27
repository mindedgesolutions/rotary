<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internship | <?php include('include/title.php'); ?></title>

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
                  <h1>Internship</h1>
                  <p></p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Internship</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 20px 0px 30px 0px; ">
          <div class="container">
            <div class="row">

        	 <div class="col-md-12">
          <div class="as-donation-form">
                  <h2>Personal Details</h2>
                  <ul class="row">
                    <li class="col-md-6"> <input type="text" placeholder="First Name:" name="fname"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Last Name:" name="lname"> </li>
                    <li class="col-md-6"><input type="text" placeholder="Email:" name="email"></li>
                    <li class="col-md-6"> <input type="text" placeholder="Phone:" name="phone"> </li>
                  </ul>
                  <h2>Educational Details</h2>
                  <ul class="row">
                    <li class="col-md-6"> <input type="text" placeholder="Your Institute :"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Degree Pursuing:"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Discipline (Area of Study) "> </li>
                    <li class="col-md-6"> 
                    <select name="greet">
                        <option value="">Year of Study currently </option>
                        <option value="1">1st year</option>
                        <option value="2">2st year</option>
                        <option value="3">3st year</option>
                        <option value="4">4st year</option>
                        <option value="5">5st year</option>
                    </select>
                    </li>
                    <li class="col-md-6"> Upload Resume <input type="file" name="file"> </li>
                    <li class="col-md-6"><input type="text" placeholder="Cumulative Performance so far (CPI or % so far)" name="cpi"></li>
                  </ul>
                  <h2>Internship Application Details</h2>
                  <ul class="row">
                    <li class="col-md-12"> <input type="text" placeholder="Project Title" name="pro_title"> </li>
                    <li class="col-md-12"> <textarea name="reason" cols="134" rows="6" placeholder="Your reasons for choosing the project"></textarea></li>
                    <li class="col-md-12">Preferred Area of Internship &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    <input type="checkbox" name="program">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br><input type="checkbox" name="brand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Brand & Communications</li>
                    <li class="col-md-12"> 
                    <textarea name="reason" cols="134" rows="6" placeholder="Purpose of seeking internship with Rotary India Literacy Mission [250 words]"></textarea> 
                    </li>
                    <li class="col-md-12"> 
                    <input type="text" placeholder="How did you come to know about this internship?" name="know_how">
                    </li>
                    <li class="col-md-3"></li>
                    <li class="col-md-9"><input type="submit" value="Submit" class="as-bgcolor"></li>
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
    <?php include('include/search-model.php'); ?>
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