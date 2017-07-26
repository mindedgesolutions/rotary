<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
//$_SESSION['username'];
$_SESSION['ngo_name'];
//$_SESSION['type'];
//$_SESSION['uid'];

$uid = $_SESSION['uid'];
$ngo_user_name = $_SESSION['username'];
$type=$_SESSION['type'];

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

<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" /> 


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
  <div > 
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
    <!-- Content Section Start -->
    <br>
  <?php  
	//echo 'First Name : '. $_SESSION['first_name'] . '<br/>';
	//echo 'User Name : '. $_SESSION['username'] . '<br/>';
	//echo 'NGO Name : '. $_SESSION['ngo_name'] . '<br/>';
	//echo 'Type : '. $_SESSION['type'] . '<br/>';
	//echo 'ID : '. $_SESSION['uid'] . '<br/>';
	//echo 'Center Name : '. $_SESSION['center_name'];
	
	?>
	<div class="container">
								
				
	<div class="col-sm-12"><center><h1>Child Development</h1></center></div>
	<!-- RILM Login -->
	<?php
	if($type=='RILM'){
	?>
		<div class="container">
								
				<form action="" method="post"> 
					<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:10px; padding : 5px;">Search</div>
				
					<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
						<div class="form-group" >
							<br/>									
							<select class="form-control" id="selNgo" name="selNgo" >
							<option value="">-- Select NGO --</option>
							<?php		
							$sql="select username,center_name from tbl_admin where type='NGO' and center_name!='' and status='Active' order by center_name;";
							$result = mysql_query($sql);
							while($row = mysql_fetch_array($result)) {
							?>
							<option value="<?= $row['username'] ?>" <?php if ($row['username']==$_REQUEST['selNgo']){echo 'selected';} ?>><?= $row['center_name'] ?></option>
							<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
						<div class="form-group" >
						<br/>									
							<input class="btn btn-primary" type="submit" name="searchBtn" value="Search" />
						</div>
					</div>
				</form>
				<br/>
		</div>
		<div class="container">
			<div class="row">
				<form action='' method='post'>
					<div class="col-sm-12">
						<?php
						if (isset($_REQUEST['searchBtn'])){

							$i=1;
							$createdBy=$_POST['selNgo'];
							//find out examtype of selected NGO
							$sql="Select * from tbl_admin where username ='$createdBy'";
							$query=mysql_query($sql);
							while($data = mysql_fetch_array($query)){
								$examtype=$data['examtype'];
							}	
							//count no of child of selected NGO
							$sql = "SELECT count(*) as total FROM tbl_child_profile_card WHERE create_by = '$createdBy'";
							$result = mysql_query($sql);
							$data= mysql_fetch_assoc($result);
							$child_progress_card = $data['total'];

							//first Quater
							$sql = "Select distinct(child_id) from quarter_1 where create_by = '$createdBy'";
							$ans = mysql_query($sql);
							$quarter1 = mysql_num_rows($ans);

							//Second Quater
							$sql = "Select distinct(child_id) from quarter_2 where create_by = '$createdBy'";
							$ans = mysql_query($sql);
							$quarter2 = mysql_num_rows($ans);

							//third Quater
							$sql = "Select distinct(child_id) from quarter_3 where create_by = '$createdBy'";
							$ans = mysql_query($sql);
							$quarter3 = mysql_num_rows($ans);

							//four Quater
							$sql = "Select distinct(child_id) from quarter_4 where create_by = '$createdBy'";
							$ans = mysql_query($sql);
							$quarter4 = mysql_num_rows($ans);
							
						?>
					</div>
				</form>
			</div>
<div class="row"> 					
    <!-- SALE PART-->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $child_progress_card; ?>
				</h3>
				<p>
					Total Child 
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>	
</div>
<?php if($examtype=="Quarterly"){ ?>
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $quarter1; ?>
				</h3>
				<p>
					Quarter - 1
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $quarter2; ?>
				</h3>
				<p>
					Quarter - 2
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $quarter3; ?>
				</h3>
				<p>
					Quarter - 3
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $quarter4; ?>
				</h3>
				<p>
					Quarter - 4
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>   
</div>
<?php } ?>
<?php if($examtype=="Monthly"){ ?>
	<!--
	<div class="form-group" >
		<select class="form-control" id="year" name="year" >
			<?php 
			$currentDt = date("Y");
			//for ( $i = date("Y"); $i > date("Y")-5; $i-- )
			//{
			//  echo('<option value="'.$i.'">'.$i.'</option>');
			//}
			//$currentDt = $_POST['yesr'];
			?>	
		</select>
	</div>
	-->
<?php
	//January
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='January' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$jan = mysql_num_rows($ans);

	//February
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='February' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$feb = mysql_num_rows($ans);

	//March
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='March' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$mar = mysql_num_rows($ans);
	//April
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='April' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$apr = mysql_num_rows($ans);
	
	//May
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='May' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$may = mysql_num_rows($ans);

	//June
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='June' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$june = mysql_num_rows($ans);

	//July
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='July' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$july = mysql_num_rows($ans);
	//August
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='August' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$august = mysql_num_rows($ans);
	
	//September
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='September' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$sep = mysql_num_rows($ans);

	//October
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='October' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$oct = mysql_num_rows($ans);

	//November
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='November' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$nov = mysql_num_rows($ans);
	//December
	$sql = "Select distinct(stud_id) from tbl_Asha_Kirn_Children_Marks_Dtl where monname='December' and year='$currentDt' and create_by = '$createdBy'";
	$ans = mysql_query($sql);
	$dec = mysql_num_rows($ans);
?>	
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $jan; ?>
				</h3>
				<p>
					January, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $feb; ?>
				</h3>
				<p>
					February, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $mar; ?>
				</h3>
				<p>
					March, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $apr; ?>
				</h3>
				<p>
					April, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>   
</div>		
<!-- 2nd row -->
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $may; ?>
				</h3>
				<p>
					May, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $june; ?>
				</h3>
				<p>
					June, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $july; ?>
				</h3>
				<p>
					July, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $august; ?>
				</h3>
				<p>
					August, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>   
</div>

<!-- 3rd row -->
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $sep; ?>
				</h3>
				<p>
					September, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $oct; ?>
				</h3>
				<p>
					October, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $nov; ?>
				</h3>
				<p>
					November, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3 style="color:#ffffff;">
				  <?php echo $dec; ?>
				</h3>
				<p>
					December, <?php echo $currentDt; ?>
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios7-cart-outline"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>   
</div>	
	
<?php } ?>

	
<?php
	}
	?>
						
		</div>
	<?php
		}
	?>
	<!-- NGO Login -->
	<?php
	if($type=='NGO'){
	?>
	
	<?php
		}
	?>
							
								
	</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

      </div>
    </div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  
	  <?php
	  include('include/footer.php');
	  ?>
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
