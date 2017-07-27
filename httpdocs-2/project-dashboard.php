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
<style>
.main-navigation > .firstUl > .menuFirst > .menuFirstLink{
  color: #EDB542;
  padding-right:10px;
  padding-left:10px;
  padding-top:0px;
  padding-bottom:0px;
}
.main-navigation .firstUl .menuFirst{
  border-right: 1px solid #EDB542;
  height: 20px;
}
.main-navigation .firstUl {
  margin-top: 6%;
}
.type-div{
	width: 100%;
	height: auto;
	box-sizing: border-box;
	padding: 10px 15px;
	background-color: #003172;
	color: #fff;
	float: left;
	cursor: pointer;
}
.dist-div{
	width: 100%;
	height: auto;
	box-sizing: border-box;
	padding: 10px 15px;
	background-color: #0059ad;
	color: #fff;
	margin: 1px 0;
	float: left;
	cursor: pointer;
}
.dist-div:nth-child(even){
  background-color: #3b8ddb;
}
.club-div{
	width: 100%;
	height: auto;
	box-sizing: border-box;
	padding: 10px 15px;
	background-color: #e8e8e8;
	color: #000;
	margin: 1px 0;
	float: left;
}
.club-div:nth-child(even){
  background-color: #bfbfbf;
}
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

function showDistrict(par){

	if ($('#dist_div_container'+par).css('display') == 'none'){

		$('#dist_div_container'+par).fadeIn('2000');
	}else{

		$('#dist_div_container'+par).hide();
	}
}

function showClub(par){

	if ($('#club_div_container'+par).css('display') == 'none'){

		$('#club_div_container'+par).fadeIn('2000');
	}else{

		$('#club_div_container'+par).hide();
	}
}
</script>
</head>

<body style="padding-right:0px;">

	<div id="load_screen"><div id="loading">Fetching data ...</div></div>

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

		<!--// Main Content //-->
		<div class="container" style="margin: 140px 0 50px 0;min-height: 600px;">
			<div class="row">
				<div class="col-md-12">


					<div class="col-md-12" style="margin: 40px 0 0 0;">
					    <div class="as-fancytitle"> <h2>Project Dashboard</h2> </div>
					    <div class="as-fancy-divider-wrap">
				      		<div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span>
					        <span class="as-third-dote"></span>
				      	</div>
					    </div>
				  	</div>

			  	<div class="col-md-12">
				  	<?php
				  	$i_type = 1;
		            $i_dist = 1;

		            $distCount = '';

				  	$query_type = mysql_query("select * from type");
				  	while ($type = mysql_fetch_array($query_type)){
				  	?>
				  	<div class="type-div" id="type_div" onclick="showDistrict(<?= $type['id'] ?>)">
				  		<img src="gallery/plus.png" id="plus_1" width="10" />
				  		<?= $type['category'] ?>
				  	</div>

				  	<div id="dist_div_container<?= $type['id'] ?>" style="display: none;">

		            <?php
		            $query_district = mysql_query("select district_code from all_district_club where status='".$type['category']."' group by district_code");
		            while ($district = mysql_fetch_array($query_district)){
		            ?>
				  	<div class="dist-div" id="district_div" onclick="showClub(<?= $district['district_code'] ?>)">
				  		<img src="gallery/plus.png" id="plus_2" width="10" />
				  		<?= $district['district_code'] ?>

	              		<table border="1" style="border-collapse: collapse;margin: 5px 0 0 0;">
			                <tr style="text-align: center;">
			                  <td width="14%">Teacher Support</td>
			                  <td width="11%">E-Learning</td>
			                  <td width="11%">Adult Literacy</td>
			                  <td width="18%">Child Development</td>
			                  <td width="12%">Happy Schools</td>
			                  <td width="11%">Other</td>
			                  <td width="14%">Library Creation</td>
			                </tr>

			                <?php
			                $total_teacher_dist = mysql_fetch_array(mysql_query("select count(id) as dCount_teacher from clubproject where categoryid='1' and district='".$district['district_code']."'"));

			                $total_elearning_dist = mysql_fetch_array(mysql_query("select count(id) as dCount_elearning from clubproject where categoryid='2' and district='".$district['district_code']."'"));

			                $total_adult_dist = mysql_fetch_array(mysql_query("select count(id) as dCount_adult from clubproject where categoryid='3' and district='".$district['district_code']."'"));

			                $total_childdev_dist = mysql_fetch_array(mysql_query("select count(id) as dCount_childdev from clubproject where categoryid='4' and district='".$district['district_code']."'"));

			                $total_happysc_dist = mysql_fetch_array(mysql_query("select count(id) as dCount_happysc from clubproject where categoryid='5' and district='".$district['district_code']."'"));

			                $total_other_dist = mysql_fetch_array(mysql_query("select count(id) as dCount_other from clubproject where categoryid='6' and district='".$district['district_code']."'"));

			                $total_libcr_dist = mysql_fetch_array(mysql_query("select count(id) as dCount_libcr from clubproject where categoryid='7' and district='".$district['district_code']."'"));
			                ?>

			                <tr style="text-align: center;">
								<td><?= $total_teacher_dist['dCount_teacher'] ?></td>
								<td><?= $total_elearning_dist['dCount_elearning'] ?></td>
								<td><?= $total_adult_dist['dCount_adult'] ?></td>
								<td><?= $total_childdev_dist['dCount_childdev'] ?></td>
								<td><?= $total_happysc_dist['dCount_happysc'] ?></td>
								<td><?= $total_other_dist['dCount_other'] ?></td>
								<td><?= $total_libcr_dist['dCount_libcr'] ?></td>
			                </tr>
						</table>
				  	</div>

				  	<div id="club_div_container<?= $district['district_code'] ?>" style="display: none;">

		            <?php
		            $query_club = mysql_query("select club_name from all_district_club where status='".$type['category']."' and district_code='".$district['district_code']."' group by club_name");
		            while ($club = mysql_fetch_array($query_club)){
		            ?>
			            <div class="club-div" id="club_div">
							<img src="gallery/plus.png" id="plus_2" width="10" />
							<?= $club['club_name'] ?>

							<table border="1" style="border-collapse: collapse;margin: 5px 0 0 0;">
				                <tr style="text-align: center;">
									<td width="14%">Teacher Support</td>
									<td width="11%">E-Learning</td>
									<td width="11%">Adult Literacy</td>
									<td width="18%">Child Development</td>
									<td width="12%">Happy Schools</td>
									<td width="11%">Other</td>
									<td width="14%">Library Creation</td>
				                </tr>

				                <?php
				                $total_teacher_club = mysql_fetch_array(mysql_query("select count(id) as cCount_teacher from clubproject where categoryid='1' and district='".$district['district_code']."' and club='".$club['club_name']."'"));

				                $total_elearning_club = mysql_fetch_array(mysql_query("select count(id) as cCount_elearning from clubproject where categoryid='2' and district='".$district['district_code']."' and club='".$club['club_name']."'"));

				                $total_adult_club = mysql_fetch_array(mysql_query("select count(id) as cCount_adult from clubproject where categoryid='3' and district='".$district['district_code']."' and club='".$club['club_name']."'"));

				                $total_childdev_club = mysql_fetch_array(mysql_query("select count(id) as cCount_childdev from clubproject where categoryid='4' and district='".$district['district_code']."' and club='".$club['club_name']."'"));

				                $total_happysc_club = mysql_fetch_array(mysql_query("select count(id) as cCount_happysc from clubproject where categoryid='5' and district='".$district['district_code']."' and club='".$club['club_name']."'"));

				                $total_other_club = mysql_fetch_array(mysql_query("select count(id) as cCount_other from clubproject where categoryid='6' and district='".$district['district_code']."' and club='".$club['club_name']."'"));

				                $total_libcr_club = mysql_fetch_array(mysql_query("select count(id) as cCount_libcr from clubproject where categoryid='7' and district='".$district['district_code']."' and club='".$club['club_name']."'"));
				                ?>

				                <tr style="text-align: center;">
									<td><?= $total_teacher_club['cCount_teacher'] ?></td>
									<td><?= $total_elearning_club['cCount_elearning'] ?></td>
									<td><?= $total_adult_club['cCount_adult'] ?></td>
									<td><?= $total_childdev_club['cCount_childdev'] ?></td>
									<td><?= $total_happysc_club['cCount_happysc'] ?></td>
									<td><?= $total_other_club['cCount_other'] ?></td>
									<td><?= $total_libcr_club['cCount_libcr'] ?></td>
				                </tr>
							</table>
						</div>

					<?php } ?>

					</div>

					<?php } ?>

					</div>

				  	<?php
				  	$i_dist++;
				  	$i_type++;
				  	}
				  	?>

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