<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
.footer {
	bottom: 0;
	width:100%;
	height: 60px;
	background-color:#32343b;
}
</style>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
<header> 
  <!-- Logo Start -->
  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
  <!-- Logo End --> 
  <!-- Sidebar Navigation Start -->
  <?php include('include/mainnav.php'); ?>
  <div class="clearfix"></div>
  <!-- Sidebar Navigation End --> 
</header>
<div class="structure-row alone"> 
  <!-- Right Section Start -->
  <div class="right-sec"> 
    <!-- Right Section Header Start -->
    <header> 
      <!-- User Section Start -->
      <?php include('include/child_header.php'); ?>
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<!--<div align="Centre" style="margin-left:400px;">
			<h1 style="color:#ffffff;"></h1>
		</div>-->
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start style="min-height: 800px;" -->
    <div class="container">
   <div class="row">
   		<div class="col-sm-2"></div>
           		<div class="col-sm-8 col-xs-12" >
                <form class="form-horizontal" name="frm" id="frm" action="AshaKiranChildrenMarksform2.php" method="post" enctype="multipart/form-data" >
				<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px; 	margin-right: auto; margin-left: auto;">
                <b>Select Month and Year</b>
                </div>
				<div class="col-sm-12" style="border : 1px solid #303238;margin-top : 0px;">
	
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile"><b>Month:</b></label>
					  <select class="form-control" id="selMonth" name="selMonth" required>
						<option value="" selected="selected">Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
						</select>
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile"><b>Year:</b></label>
					  <select class="form-control" id="selYear" name="selYear" required>
						<option value="">Select Year</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
						</select>
					  </div>
				  </div>
				 <?php
					$type=$_SESSION['type'];
				 	if($type=='NGO') { ?> 
				 
				  <div class="form-group" >
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile"><b>Center:</b></label>

					  <select class='form-control' width='100%' id='ddCenter' name='ddCenter' required>
					  	<option value=''>-- Select Center --</option>
					  	<?php
							$ngoid=$_SESSION['uid'];
							$sql = "SELECT id,center_name FROM tbl_admin where idfk='" . $ngoid ."'";
							$result = mysql_query($sql);
							while ($row = mysql_fetch_array($result)) {
						?>

							<option value='<?php echo $row['id']; ?>'><?php echo $row['center_name']; ?></option>
							
						<?php
						}
						?>
						<option value="0">Not in Center</option>
						</select>
					  </div>
				  </div>
				 <?php } ?> 
				 
				 <div class="form-group">
					 <div class="col-sm-11s" align="center">
<!--						<input class="btn btn-default" style="background-color: #134B96;" type="submit" value="Search" />  -->
							
						<input class="btn" style="color: #ffffff; background-color: #003c6a; margin:15px 0 20px 0;" type="submit" value="Proceed" />
					</div>
				  </div>
				 	
    <!-- Wrapper End --> 
	
  </div>
  			</form>
                </div>
           		
       
           
    
      </div>
	  
    </div>
    <!-- Wrapper End --> 
	<div class="footer" style="margin-top: 20px;">
	  <?php
	  include('include/footer.php');
	  ?>
	 </div>
	



  <!-- Logo Start -->
  
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
