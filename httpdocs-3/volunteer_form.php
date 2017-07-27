<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer Form | <?php include('include/title.php'); ?></title>

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
    <link href="css/owl.carousel.css" rel="stylesheet">
    
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

    
  </head>
  <body>

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
        
        <!--// MainSection //-->
        <div class="as-main-section">
        <br>
        <br>
          <div class="container">
            <div class="row">
             <div class="col-md-12">
              <div class="as-detail-editor">
                  <h2 style="text-align:center"><strong>VOLUNTEER FOR T-E-A-C-H IN INDIA!</strong></h2><br>
                    <br>
                       You are a :
                       <div class="as-donation-form">
                       <form action="" method="post">
                       <ul class="row">
                    	<li class="col-md-22">
                         <input type ="radio" name="r1" value="rotarian" onchange="window.location.href ='volunteer_fill_form.php?ver=Rotarian'">&nbsp;&nbsp;	
                         Rotarian
                        </li>
                        <li class="col-md-22">
                         <input type ="radio" name="r1" value="iwc" onchange="window.location.href ='volunteer_fill_form.php?ver=Inner Wheel'">&nbsp;&nbsp;
                         Inner Wheel Member
                        </li>
                        <li class="col-md-22">
                         <input type ="radio" name="r1" id="form3" value="rotaract" onchange="window.location.href ='volunteer_fill_form.php?ver=Rotaract'">
                         &nbsp;&nbsp;Rotaractor
                        </li>
                        <li class="col-md-22">
                         <input type ="radio" name="r1" id="form4" value="rcc_volunteer" onchange="window.location.href ='volunteer_fill_form.php?ver=RCC'">
                         &nbsp;&nbsp;RCC
                        </li>
                        <li class="col-md-22">
                         <input type ="radio" name="r1" value="other" onchange="window.location.href ='volunteer_fill_form.php?ver=Other'">&nbsp;&nbsp;Other
                        </li>
                       </ul>
                       </form>
					   <br/>
					   <br/>
					   <br/>
					   <br/>
					   
                       </div>
                       
                       
                       
                       
                       
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
	<script type="text/javascript">
	function show_more1()
	{
	  var form = document.getElementById("hmm").value;
	  alert(form);
	  if(form == "yes"){
		 document.getElementById('show_val').style.display = ''; 
	  }
	  else if(form == "no"){
		 document.getElementById('show_val').style.display = "none";  
	  }
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