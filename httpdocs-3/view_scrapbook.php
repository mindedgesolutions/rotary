<?php include('include/config_rigd.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scrapbook |
<?php include('include/title.php'); ?>
</title>

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
              <?php //include('include/search-bar.php'); ?>
            </div>
            <?php include('include/responsive-menu.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--// Header //-->
  
  <div class="as-minheader"> <span class="full-pattren"></span>
    <div class="as-minheader-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="as-page-title">
              <h1>Scrapbook</h1>
              <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>--> 
            </div>
          </div>
          <div class="col-md-3">
            <ul class="as-breadcrumb">
              <form action="view_scrapbook.php?action=login" method="post" enctype="">
                <input type="text" name="search" value="" placeholder="Enter Your First Name">
                <input type="submit" name="submit" value="Submit" class="dt-sc-button small">
              </form>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--// Main Content //-->
  <div class="as-main-content">
    <div class="as-main-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
             <?php
			   if(isset($_REQUEST['action'])){
			   $action = $_REQUEST['action'];	
			   $fname = $_POST['search'];
					
			   if($action=="login"){
			   $sql = "Select * from sp_tbl_user where first_name = '$fname'";
			   $result = mysql_query($sql);
				while($data = mysql_fetch_array($result)){
				extract($data);				
			 ?>
            <div class="as-gallery">
                  <ul class="row gallery">
                    <li class="col-md-3">
                     <?php 
					   if($image_url != ''){
				      ?>
                      <figure><a href="scrapbook_new/index.php?user_id=<?php echo $user_id; ?>" target="_blank" class="as-gallery-thumb">
                      <img src="upload/UserProfileImage/<?php echo $image_url; ?>" alt=""></a></figure>
                      <div class="as-causes-text">
                        <div class="as-causes-info">
                          <h4>
                          <a href="scrapbook_new/index.php?user_id=<?php echo $user_id; ?>" target="_blank">Name: <?php echo $first_name .' '. $last_name; ?> </a>
                          </h4>
                          <h5>
                          <a href="scrapbook_new/index.php?user_id=<?php echo $user_id; ?>" target="_blank">Institute: <?php echo $institute_name; ?> </a>
                          </h5>
                          <p></p>
                        </div>
                      </div>
                     <?php
					   }
					  else{
					 ?>
                      <figure><a href="scrapbook_new/index.php?user_id=<?php echo $user_id; ?>" target="_blank"><img src="images/Man1.png" alt=""></a></figure>
                      <div class="as-causes-text">
                        <div class="as-causes-info">
                          <h4>
                          <a href="scrapbook_new/index.php?user_id=<?php echo $user_id; ?>" target="_blank">Name: <?php echo $first_name .' '. $last_name; ?> </a>
                          </h4>
                          <h5>
                          <a href="scrapbook_new/index.php?user_id=<?php echo $user_id; ?>" target="_blank">Institute: <?php echo $institute_name; ?> </a>
                          </h5>
                          <p></p>
                        </div>
                      </div>
                     <?php
					  }
					?>
                    </li>
                  </ul>
                </div>
            
            <?php
			  }
			 }
			}
		   ?>
          </div>
        </div>
        
        <!--// MainSection //--> 
      </div>
    </div>
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