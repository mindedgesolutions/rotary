<?php include('include/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('include/title.php'); ?></title>
<!-- Css Files -->
<?php include('include/favicon.php'); ?>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/color.css" rel="stylesheet">
<link href="css/dl-menu.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet">
<link href="css/prettyphoto.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<style type="text/css">
#load_screen{
	background: #000;
	opacity: 0.8;
	position: fixed;
	z-index: 999;
	top: 0;
	left: 0;
	width: 100%;
	height: 2000px;
}
#loading{
	color: #0098f7;
	width: 150px;
	height: 30px;
	margin: 300px auto;
}
</style>

<script type="text/javascript">
window.addEventListener('load', function(){
	var load_screen = document.getElementById('load_screen');
	document.body.removeChild(load_screen);
})
</script>

</head>

<body style="padding-right:0px;">

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" class="as-absolute" style="float: left;">

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
			                </div>

                			<?php include('include/responsive-menu.php'); ?>

              			</div>
        			</div>
            	</div>
          	</div>
        </div>

  	</header>
  	<!--// Header //-->

    <div id="load_screen"><div id="loading">Fetching data ...</div></div>
    
		<script type="text/javascript">
		window.location = 'project-dashboard.php';
		</script>

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
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="js/jquery.aCollapTable.min.js"></script>
	<script>
	$(document).ready(function(){
		$('.collaptable').aCollapTable({ 
			startCollapsed: true,
			addColumn: false,
			plusButton: '<span class="i">+</span>',
			minusButton: '<span class="i">-</span>'
		});
	});
	</script>

    <script>
      // NewsTicker
      'use strict';
        var options = {
          newsList: "#as-news",
          startDelay: 10,
          placeHolder1: ""
        }
        jQuery().newsTicker(options);
    </script>
  </body>
</html>