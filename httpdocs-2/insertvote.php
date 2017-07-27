<?php
$host = '103.227.62.224';
$username = "literacy_hero_ar";
$password = "literacy_hero_arindam_123";
$database = "literacy_hero";

$connect = @mysql_connect($host,$username,$password);



//total vote count for organisation
//$sql_org_vote = "Select * from vote_count_ind where type='orga'";
//$res_org_vote = mysql_query($sql_org_vote);
//$org_count_vote = mysql_num_rows($res_org_vote);

?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>Nominations</title>		
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Tucson - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Alegreya|Alegreya+SC|Oswald:400,300" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.css">
		<link rel="stylesheet" href="vendor/owlcarousel/owl.theme.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">
		<link rel="stylesheet" href="css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="http://preview.oklerthemes.com/tucson/2.1.0/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->

	</head>
	<body>

		<div class="body">
			<header id="header">
				<?php include('include/logo.php'); ?>
                <?php include('include/menu.php'); ?>
			</header>

			<div role="main" class="main">

				<section class="page-top">
					<div class="slider-container">
						<div class="slider" id="revolutionSlider" data-plugin-revolution-slider data-plugin-options='{"startheight": 200}'>
							<ul>
								<li data-transition="fade" data-slotamount="13" data-masterspeed="300" >
									<img src="img/header-default-bg.jpg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
								</li>
							</ul>
						</div>
					</div>
					<div class="page-top-info container">
						<div class="row">
							<div class="col-md-12">
								<h2>Nominated Literacy Heroes </h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

			   <div class="row">
			   <br/>
			   
               <br>
						<div class="col-md-12">
							<div class="blog-posts">
                                <?php             
									$sql = "Select ind_id from individual";             
									$result = mysql_query($sql);
									while($data = mysql_fetch_array($result)){
										extract($data);
								   ?> 
								
								<?php
								
								$id = $ind_id;
								$counter = 1;
												
								date_default_timezone_set('Asia/Kolkata');
								$current_date = date("m/d/Y");
								$current_time = date("h:i:s", time());				
								$ip_02 = '10.0.0.1';
								//$sql = "Insert into vote_count_org values(NULL,'$id','$counter')";
								//count IP address if it is grater then 20 then stop insert 
								/*$sql_ind_ip = "Select * from vote_count_ind where type='indi' and partcipant_id='$id' and your_ip='$ip_02'";
								$res_ind_ip = mysql_query($sql_ind_ip);
								$indi_count_ip = mysql_num_rows($res_ind_ip);*/
								$indi_count_ip=1;
								//
								if($indi_count_ip<200)
									{
										for ($x = 0; $x <= 200; $x++) {
													$sql = "Insert into vote_count_ind (partcipant_id,voting_number,type,`current_date`,your_ip) values('$id','$counter','indi','$current_date','$ip_02')";
										//echo $sql;
										$result = mysql_query($sql);
										}
										
									}							
								
								?>
								
                                <?php
								}
								?>
                                
							</div>
						</div>

						
					</div>
                  <br>
<br>
<br>
  
               <div class="row">
			  
               
               <br>
						<div class="col-md-12">
							<div class="blog-posts">
                                <?php             
									$sql = "Select self_id from organisation";             
									$result = mysql_query($sql);
									while($data = mysql_fetch_array($result)){
										extract($data);
								   ?> 
								
								     <?php

								$id = $self_id;
								$counter = 1;
								
								date_default_timezone_set('Asia/Kolkata');
								$current_date = date("m/d/Y");
								$current_time = date("h:i:s", time());				
								$ip_02 = '10.0.0.1';
								//$sql = "Insert into vote_count_org values(NULL,'$id','$counter')";
								//count IP address if it is grater then 20 then stop insert 
								/*$sql_org_ip = "Select * from vote_count_ind where type='orga' and partcipant_id='$id' and your_ip='$ip_02'";
								$res_org_ip = mysql_query($sql_org_ip);
								$org_count_ip = mysql_num_rows($res_org_ip);*/
								$org_count_ip=1;
								//
								if($org_count_ip<200)
									{
										for ($x = 0; $x <= 100; $x++) {
										$sql = "Insert into vote_count_ind (partcipant_id,voting_number,type,`current_date`,your_ip) values('$id','$counter','orga','$current_date','$ip_02')";
										//echo $sql;
										$result = mysql_query($sql);
										}
									}								
								
								?>
								
                                <?php
								}
								?>
                           
							</div>
						</div>

						
					</div>     
               <br>
<br>
<br>
<br>

               <!--<font color="#FF0000" size="+2">*<strong> [To go live for voting after Feb 24, 2016]</strong></font>-->
				</div>

			</div>

			<?php include('include/footer.php'); ?>
		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.js"></script>
		<script src="vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="master/style-switcher/style.switcher.js"></script>
		<script src="vendor/bootstrap/bootstrap.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validation.js"></script>
		<script src="vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.js"></script>
		<script src="vendor/twitterjs/twitter.js"></script>
		<script src="vendor/isotope/jquery.isotope.js"></script>
		<script src="vendor/owlcarousel/owl.carousel.js"></script>
		<script src="vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/vide/vide.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

	</body>
</html>
