<?php
session_start();
ob_flush();
include('include/config.php'); 
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$sql = "Select * from sp_tbl_share_your_journey where user_id = '$user_id'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
while($data = mysql_fetch_array($result)){
extract($data);	
}
$mesg = "";
////////////////////////////////////// Insert Section ///////////////////////////////////////////////////////////////////
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

if($action=="insert_journey"){
$id = $_POST['id'];
$journey = $_POST['journey'];

$image = $_FILES['file'];
$image_name= basename($_FILES['file']['name']);
move_uploaded_file($image['tmp_name'], "upload/UserShareJourneyImage/". $image_name);
	
$sql = "Insert into sp_tbl_share_your_journey value(NULL,'$id','$journey','','','','')";
//echo $sql;
$result = mysql_query($sql);
if($result){
$sql = "Select * from sp_tbl_share_your_journey where user_id = '$id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$journey_ids = $data['id'];
}	
$sql = "Insert into sp_tbl_share_your_journey_images values(NULL,'$journey_ids','$image_name','')";	
//echo $sql;
$result = mysql_query($sql);	
header('location:share_journey.php');
  }
 }
}
//////////////////////////////////////////// Update Section ///////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

if($action=="edit_journey"){
$id = $_POST['id'];
$journey_id = $_POST['journey_id'];
$journey = $_POST['journey'];

$image = $_FILES['file'];
$image_name= basename($_FILES['file']['name']);
move_uploaded_file($image['tmp_name'], "upload/UserShareJourneyImage/". $image_name);
	
$sql = "Select * from sp_tbl_share_your_journey_images where journey_id = '$journey_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['image_url'];
}	
$sql = "Update sp_tbl_share_your_journey set description1 = '$journey' where user_id = '$id'";
//echo $sql;
$result = mysql_query($sql);
if($result){
$sql = "Update sp_tbl_share_your_journey_images set image_url = IF('$image_name'='','$pd_img_02','$image_name') where journey_id = '$journey_id'";	
//echo $sql;
$result = mysql_query($sql);	
header('location:share_journey.php');
  }
 }
}
?>
<!DOCTYPE HTML>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title>Rotary India Global Dream- </title>
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/shortcodes.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--prettyPhoto-->
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />   
<!--[if IE 7]>
<link href="css/font-awesome-ie7.css" rel="stylesheet" type="text/css">
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--Fonts-->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bubblegum+Sans' rel='stylesheet' type='text/css'>
<!--jquery-->
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--Digital Book Code	-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--Digital Book Code-->
</head>
<body id="back_cover">
	<!--wrapper starts-->
    <div class="wrapper">
        <!--header starts-->
        <?php include('include/header.php'); ?>
        <!--header ends-->
        <!--main starts-->
        <div id="main">
        	<!--breadcrumb-section starts-->
            <div class="breadcrumb-section">
            	<div class="container">
                	<h1>Share your Journey</h1>
                    <div class="breadcrumb">
                        <a href="index.php">Home</a>
                        <span class="fa fa-angle-double-right"></span>
                        <span class="current">Share your Journey</span>
                    </div>
                </div>
            </div>
            <!--breadcrumb-section ends-->
            <!--container starts-->
            <div class="container">
            	<!--primary starts-->
            	<section id="primary" class="with-sidebar">
               	<aside class="widget widget_recent_entries">
                    	<!--dt-sc-tabs-container starts-->            
                        <div class="dt-sc-tabs-container">
                            <ul class="dt-sc-tabs">
                              <li><a href="share_journey.php#">Share your Journey</a></li> 
                            </ul>
                            <div class="dt-sc-tabs-content">
                                <h5><a href="#">Share your Journey</a></h5>
                                <?php
								 if($count != 0){
								?>
                                <form class="journey" name="form" method="post" enctype="multipart/form-data" action="share_journey.php?action=edit_journey">
                                <table>
                                <tr>
                                <td width="36%" valign="top">
                                <table width="96%">
                                <tbody>
                                <?php
								$sql = "Select * from sp_tbl_share_your_journey_images where journey_id = '$id'";
								$result = mysql_query($sql);
								while($data = mysql_fetch_array($result)){
								extract($data);	
								}
								?>
                                	<tr>
                                        <td colspan="2">
                                        <img src="upload/UserShareJourneyImage/<?php echo $image_url; ?>" style="border:#000 medium solid;" alt="" height="200">
                                        </td>
                                    </tr>

                                </tbody>
                                </table>
                                </td>
                                <td width="64%" valign="top">
                                <table>
                                <tbody>
                                    <tr>
                                        <td width="29%"><p id="text">New Image</p></td>
                                        <td width="71%" colspan="2"><input id="image" name="file" type="file" value="<?php echo $image_url; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td width="29%" valign="top"><p id="text">Share the Journey</p></td>
                                        <td width="71%" colspan="2">
                                        <textarea cols="5" rows="8" id="address" name="journey"><?php echo $description1; ?></textarea>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="journey_id" value="<?php echo $id; ?>">
                                    <tr>
                                        <td colspan="3" align="center"><input name="submit_form" type="submit" class="dt-sc-button medium" value="Submit"></td>
                                    </tr>
                                </tbody>
                            	</table>
                                </td>
                                </tr>
                                </table>
                                </form>
                                <?php
								 }
								 else{
								?>
                                <form class="journey" name="form" method="post" enctype="multipart/form-data" action="share_journey.php?action=insert_journey">
                                <table>
                                <tr>
                                <!--<td width="36%" valign="top">
                                <table width="96%">
                                <tbody>
                                <?php
								$sql = "Select * from sp_tbl_share_your_journey_images where journey_id = '$id'";
								$result = mysql_query($sql);
								while($data = mysql_fetch_array($result)){
								extract($data);	
								}
								?>
                                	<tr>
                                        <td colspan="2">
                                        <img src="upload/UserShareJourneyImage/<?php echo $image_url; ?>" style="border:#000 medium solid;" alt="" height="200">
                                        </td>
                                    </tr>

                                </tbody>
                                </table>
                                </td>-->
                                <td width="64%" valign="top">
                                <table>
                                <tbody>
                                    <tr>
                                        <td width="29%"><p id="text">New Image</p></td>
                                        <td width="71%" colspan="2"><input id="image" name="file" type="file" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td width="29%" valign="top"><p id="text">Share the Journey</p></td>
                                        <td width="71%" colspan="2">
                                        <textarea cols="5" rows="8" id="address" name="journey"></textarea>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                    <tr>
                                        <td colspan="3" align="center"><input name="submit_form" type="submit" class="dt-sc-button medium" value="Submit"></td>
                                    </tr>
                                </tbody>
                            	</table>
                                </td>
                                </tr>
                                </table>
                                </form>
                                <?php
								 }
								?>
                            </div>
                        </div>
                        <!--dt-sc-tabs-container ends-->
                    </aside>
                </section>
                <!--primary ends-->
                
                <!--secondary starts-->
                <section id="secondary">
                	<aside class="widget widget_categories">
                    	<h3 class="widgettitle" style="color:#FFF;">Menu</h3>
                        <ul>
                        	<li>
                            	<a href="dashboard.php" style="color:#FFF;">My Profile</a>
                            </li>
                            <li>
                            	<a href="create.php" style="color:#FFF;">Create Your Scrapbook</a>
                            </li>
                            <li>
                            	<a href="learner_profile.php" style="color:#FFF;">Learner Profile</a>
                            </li>
                            <li>
                            	<a href="daily_log.php" style="color:#FFF;">Daily Log</a>
                            </li>
                            <li>
                            	<a href="creative_work.php" style="color:#FFF;">Creative Work</a>
                            </li>
                            <li>
                            	<a href="share_journey.php" style="color:#FFF;">Share Your Journey</a>
                            </li>
                            <li>
                            	<a href="logout.php" style="color:#FFF;">Logout</a>
                            </li>
                        </ul>
                    </aside>
                    
                </section>
                <!--secondary ends-->
            </div>
            <!--container ends-->
        </div>
        <!--main ends-->
        
        <!--footer starts-->
        <?php include('include/footer.php'); ?>
        <!--footer ends-->
        
    </div>
    <!--wrapper ends-->
    <a href="dashboard.php" title="Go to Top" class="back-to-top">To Top ↑</a>
    <!--Java Scripts-->
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-migrate.min.js"></script>

    
	<script type="text/javascript" src="js/jquery.tabs.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery-easing-1.3.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.inview.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>
    <script type="text/javascript" src="js/jquery.tipTip.minified.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
    <script type="text/javascript" src="js/twitter/jquery.tweet.min.js"></script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>  
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/shortcodes.js"></script>        
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript">
			$(function() {
				var $mybook 		= $('#mybook');
				var $bttn_next		= $('#next_page_button');
				var $bttn_prev		= $('#prev_page_button');
				var $loading		= $('#loading');
				var $mybook_images	= $mybook.find('img');
				var cnt_images		= $mybook_images.length;
				var loaded			= 0;
				//preload all the images in the book,
				//and then call the booklet plugin

				$mybook_images.each(function(){
					var $img 	= $(this);
					var source	= $img.attr('src');
					$('<img/>').load(function(){
						++loaded;
						if(loaded == cnt_images){
							$loading.hide();
							$bttn_next.show();
							$bttn_prev.show();
							$mybook.show().booklet({
								name:               null,                            // name of the booklet to display in the document title bar
								width:              800,                             // container width
								height:             500,                             // container height
								speed:              600,                             // speed of the transition between pages
								direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
								startingPage:       0,                               // index of the first page to be displayed
								easing:             'easeInOutQuad',                 // easing method for complete transition
								easeIn:             'easeInQuad',                    // easing method for first half of transition
								easeOut:            'easeOutQuad',                   // easing method for second half of transition

								closed:             true,                           // start with the book "closed", will add empty pages to beginning and end of book
								closedFrontTitle:   null,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
								closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
								closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
								closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
								covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

								pagePadding:        10,                              // padding for each page wrapper
								pageNumbers:        true,                            // display page numbers on each page

								hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
								overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
								tabs:               false,                           // adds tabs along the top of the pages
								tabWidth:           60,                              // set the width of the tabs
								tabHeight:          20,                              // set the height of the tabs
								arrows:             false,                           // adds arrows overlayed over the book edges
								cursor:             'pointer',                       // cursor css setting for side bar areas

								hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
								keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
								next:               $bttn_next,          			// selector for element to use as click trigger for next page
								prev:               $bttn_prev,          			// selector for element to use as click trigger for previous page

								menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
								pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
								chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

								shadows:            true,                            // display shadows on page animations
								shadowTopFwdWidth:  166,                             // shadow width for top forward anim
								shadowTopBackWidth: 166,                             // shadow width for top back anim
								shadowBtmWidth:     50,                              // shadow width for bottom shadow

								before:             function(){},                    // callback invoked before each page turn animation
								after:              function(){}                     // callback invoked after each page turn animation
							});
							Cufon.refresh();
						}
					}).attr('src',source);
				});
				
			});
        </script>
</body>
</html>
