<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-learning Online Form  | <?php include('include/title.php'); ?></title>

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

</style> 
<style>
table, thead, tr, td {
    border: 0px;
}
</style>  
<script>
function showElement()
{
	document.getElementById("digitalDiv").style.display="block";
	
}
function blockElement()
{
	document.getElementById("digitalDiv").style.display="none";
	
}

</script>
</head>
<body style="padding-right:0px;background-image:none;">
    <!-- Color Switcher -->
    <!-- Color Switcher -->

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header">

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

      <div class="as-minheader">
       
        <div class="as-minheader-wrap">
          <div class="container" >
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Online Form</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <!--
				<ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php#">E-learning Online Form</a></li>
                </ul>
				-->
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 sec-box">
				<div class="sec-box">               
                    <div class="contents">
                        <div class="table-box">
							<table class="table" style="border:0px;">
								<tbody>		
									<form class="form-horizontal" name="frm" id="frm" action="ins_school_survey.php" method="POST" enctype="multipart/form-data" >	
								<tr>
									<td colspan="2" class="col-md-12">
									<header>
										<center>
											<h4 class="heading">Online Form</h4>											
										</center>
									</header>
									</td>
								</tr>
								<tr>												
									<td class="col-md-4">UDISE code :</td>
									<td class="col-md-8">
										<input class="form-control" type="text" id="txtUDISEcode" name="txtUDISEcode">
									</td>
								</tr>
                                                
								<tr>
									<td class="col-md-4">School Name :</td>
									<td class="col-md-8">
										<input class="form-control" type="text" id="txtSchoolName" name="txtSchoolName">										
									</td>
									
								</tr>
								<tr>
									<td class="col-md-4">District :</td>
									<td class="col-md-8">
										<input type="text" class="form-control" name="txtDistrict" id="txtDistrict" />
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Tehsil :</td>
									<td class="col-md-8">
										<input type="text" class="form-control" name="txtTehsil" id="txtTehsil" />
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Village/ Pin code :</td>
									<td class="col-md-8">
									 <input type="text" class="form-control" name="txtVillPin" id="txtVillPin" />   
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Landmark :</td>
									<td class="col-md-8">
									 <input type="text" class="form-control" name="txtLandmark" id="txtLandmark" />  
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Name of Head master :</td>
									<td class="col-md-8">
									 <input type="text" class="form-control" name="txtHeadMasterName" id="txtHeadMasterName" />
									</td>
								</tr>
								

								<tr>
									<td class="col-md-4">Contact details of Head master :</td>
									<td class="col-md-8">
									 <input type="text" class="form-control" name="txtHeadMasterContactNo" id="txtHeadMasterContactNo" />
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Is school digital after 9th Jan’ 2016 :</td>
									<td class="col-md-8">
										<label class="radio-inline" for = "yes"><input type = "radio" name = "isDigital" id = "yes" value = "yes" onchange="showElement();" />Yes</label>
										<label class="radio-inline" for = "no"><input type = "radio" name = "isDigital" id = "no" value = "no" checked onchange="blockElement();" />No</label>									
									</td>
								</tr>													
								<tr>
									<td class="col-md-4">Details of equipment’s :</td>
									<td class="col-md-8">
									 <input type="text" class="form-control" name="txtLandmark" id="txtLandmark" />  
									</td>
								</tr>
								<tr>
									<td class="col-md-4">Date of Installation :</td>
									<td class="col-md-8">
									 <input type="text" class="form-control" name="txtLandmark" id="txtLandmark" />  
									</td>
								</tr>								
								<tr>
									<td class="col-md-4"></td>
									<td class="col-md-8">
										<div class="form-group has-error">
											<input type="submit" class="btn btn-primary" value="Submit" />
										</div>
									</td>
								</tr>
								</form>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
											
      <!--// Main Content // -->
     
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