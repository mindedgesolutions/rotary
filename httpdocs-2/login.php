<?php
session_start();
ob_flush();
include('include/config_rigd.php'); 
$msg="";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

$user_name = $_POST['user'];
$password = $_POST['password'];

if($action=="login"){	
$sql = "Select * from sp_tbl_user where user_name = '$user_name' and password = '$password' and user_type = 'admin'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){

if($data['is_active'] == '1'){
	$_SESSION['user_name'] = $data['user_name'];
	$_SESSION['user_id'] = $data['user_id'];
	header('location:dashboard.php');
  }
 else{
  $msg = "Please check your Username / Password.";
   } 
  }
 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rotary Scrapbook Login | <?php include('include/title.php'); ?></title>

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

      <div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Scrapbook Login</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="login.php#">Scrapbook Login</a></li>
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
                <div class="as-team-detail">
                  <table>
                        <thead>
                            <tr>
                            <th colspan="2" align="center">Sign In</th>
                            <th width="10%" align="right"><a href="newuser.php" style="color:#FFF;">New User</a></th>
                            </tr>
                        </thead>
                        <form action="login.php?action=login" method="post" enctype="multipart/form-data" name="">
                        <tbody>
                            <tr>
                                <td width="22%"><p id="text">User Name</p></td>
                                <td colspan="2"><input id="name" name="user" type="text" placeholder="User Name" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Password</p></td>
                                <td colspan="2"><input id="name" name="password" type="password" placeholder="Password" required class="form-control"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" align="center"><input name="submit" type="submit" class="dt-sc-button medium" value="Submit"></td>
                            </tr>
                         </tbody>
                         </form>
                      </table>
                  
                  
                  
                  
                  
                  
                </div>
				<div class="clearfix"></div>
				<br>
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