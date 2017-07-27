<?php
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project View | <?php include('include/title.php'); ?></title>

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
	
	<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>




	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 <!--	<link rel="stylesheet" href="style.css" />-->

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
</script>
  </head>
  <body onload="categorylist();">

    <!--// Main Wrapper //-->
     <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" class="as-absolute">

      <!--// TopStrip //-->
        <div class="container-fluid" style="padding-left : ; padding-right : 0;">
          <div>
            <?php include('include/top_head_mem.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container-fluid">
          <div class="as-header-bar">
            
              <?php include('include/logo.php'); ?>
              <div class="col-md-12">
					<?php include('include/navigation_mem.php'); ?>
					<?php include('include/responsive-menu.php'); ?>
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
                  <h1>Project View</h1>
                  
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="projectView.php">Project View</a></li>
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
						<div class="as-detail-editor">
						 <h1>View Club Project</h1>
						 
						 <fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;Filter your search&nbsp;&nbsp;</legend>
                        					<p style="padding:7px 0 0 0; margin:0">
                                                
                                                <table width="98%" border="0" cellspacing="0" cellpadding="5" align="right" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color:#333333">
                                                    <tr>
                                                        <td width="21%"><strong>Category</strong></td>
                                                        <td width="2%"><strong>:</strong></td>
                                                        <td width="77%">
                                                        <select id="chocateg" name="chocateg" onchange="districtlist(this.value);"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px"><!--onchange="subcategorylist(this.value)"-->
                                                            <option value="">Select</option>
                                                        </select>
                                                        </td>
                                                    </tr>
                                                   <!-- <tr>
                                                        <td><strong>Sub Category</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="chosubcateg" name="chosubcateg" onchange="districtlist(this.value);" style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>-->
                                                    <tr>
                                                        <td><strong>Rotary District</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="chodistrict" name="chodistrict" onchange="dispclub(this.value)"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Rotary Club of</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="choclub" name="choclub"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>                                        
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="button" id="btngo" name="btngo" value="Search" onclick="dispProjects();" class="login" />&nbsp;<input type="button" id="btnreset" name="btnreset" value="Reset" onclick="resetView()" class="login" />
                                                        </td>
                                                    </tr>
                                                    <tr height="5"><td colspan="3"></td></tr>
                                                </table>                                                
                                                  
                                			</p>
                                	</fieldset>
									<div id="projectResult"></div>
						</div>
					</div>
				</div>
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
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
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