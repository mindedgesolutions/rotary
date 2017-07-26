<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$ngoname = $_SESSION['ngo_name'];
$_SESSION['type'];
$i=1;
?>
<!DOCTYPE HTML>
<html>
<head>
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

<!--<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />-->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
.headercol
	{
		background-color : #b8d1f3;
	}
	.altcol
	{
		background-color : #dae5f4;
	}		
	.pad
	{
		padding-left:5px;
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
				  <div class="row">
					<div class="col-md-4">
						<?php include('include/child_header.php'); ?>
					</div>
					<div class="col-md-4">
						<h1 style="color:#ffffff; text-align:center;">Delete Child Profile</h1>
					</div>
					<div class="col-md-4">
						<font color="#F4F3F3" style="float:right;">Home -> Master -> Delete Child Profile</font>
					</div>
				  </div>
				  <div class="clearfix"></div>
				</header>
				<!-- Right Section Header End --> 
				<!-- Content Section Start  -->
			</div>
	<section class="content">
	<div class="row">
					<div class="col-md-12">
				
						 <?php
							//live database
							$db_database='rotary32_teach2';
							$db_hostname='103.227.62.215';
							$db_username='rotary32_teach2';
							$db_password='Rotary@2016'; 
							// Database Connection String
							$con = mysql_connect($db_hostname,$db_username,$db_password);
							if (!$con)
							  {
							  die('Could not connect: ' . mysql_error());
							  }
							mysql_select_db($db_database, $con);
							?>	
					</div>
					<div class="col-md-12">
						<div class="box box-primary">						
							<div class="box-body">
								<div class="form-group">
									<center>
										<?php
											$ngoName=$_POST['NGOname'];
											$centerid=$_POST['ddCenter'];
											$ngo_name=$_POST['txtNGOName'];
											$centername=$_POST['txtCenterName'];
											$ngoid=$_SESSION['uid'];
															

												if ($ngoid!='') {
										?>	
						
										<?php
											$sql="select child_id,child_photo,child_name,child_dob,child_father_name,city from tbl_child_profile_card_temp where ngoid='". $ngoid ."' and status_b='t'";	
											//echo $sql;
											$r_query = mysql_query($sql);
											$count = mysql_num_rows($r_query);
											//echo $count;
											if($r_query)
											{
											if($count>0)
											{											
										?>
										<br/>
										<form action="#" method="post">
										<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
											<thead>				
												<tr>
													<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
													<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child ID</th>
													<th width='25%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
													<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Age</th>
													<th width='25%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Father Name</th>
													<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>City</th>
													<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Delete</th>
												</tr>
											</thead>
										<?php 
											while ($row = mysql_fetch_array($r_query)){  						
												if ($i%2==0) 
												{
													echo "
													<tr class='headercol'>
														<td class='pad'>".$i."</td>
														<td class='pad'><img height='100' width='100' src='../child_development/upload/".$row["child_photo"]."'></td>
														<td class='pad'>".$row["child_name"]."</td>
														<td class='pad'>".$row["child_dob"]."</td>
														<td class='pad'>".$row["child_father_name"]."</td>				
														<td class='pad'>".$row["city"]."</td>
														<td class='pad' style='text-align:center;'><input type='checkbox' name='check_list[]' value=".$row["child_id"]." id='chk".$i."'></td>
													</tr>";
												}
												else
												{
													echo "
													<tr class='altcol'>
														<td class='pad'>".$i."</td>
														<td class='pad'><img height='100' width='100' src='../child_development/upload/".$row["child_photo"]."'></td>
														<td class='pad'>".$row["child_name"]."</td>
														<td class='pad'>".$row["child_dob"]."</td>
														<td class='pad'>".$row["child_father_name"]."</td>				
														<td class='pad'>".$row["city"]."</td>
														<td class='pad' style='text-align:center;'><input type='checkbox' name='check_list[]' value=".$row["child_id"]." id='chk".$i."'></td>
													</tr>";
												}
												$i=$i+1;
												}
										?>
										</table>
										
									</center>
								</div>
							</div>				
						</div>
					</div>										
					<div class="col-md-12">
						<!-- <center><button type="button" class="btn btn-primary">Delete</button></center> -->
						<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Delete</button></center>
						<?php
							}
								else
								{
									echo "No Record Found";
								}
							}
						}
							?>
						<div class="modal" id="myModal1" role="dialog">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header" style="border : 0; ">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body" style="background-color: #FFFFFF;">
									<div class="row">										
										<div style="padding-left : 5px; padding-right : 5px;">
											<p align="justify">
												<center><h1>Are you sure want to delete the records.</h1></center>
											</p>
										</div>										
									</div>
								</div>
								<div class="modal-footer" style="border : 0;">
									<input class="btn btn-primary" type="submit" name="submit" value="Yes">
									<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
								</div>
							  </div>
							</div>
						</div>
					</form>
							<?php
							if(isset($_POST['submit'])){//to run PHP script on submit
							if(!empty($_POST['check_list'])){
							// Loop to store and display values of individual checked checkbox.
							//foreach($_POST['check_list'] as $selected){
							//echo $selected.",";
							//}
							$cheks = implode("','", $_POST['check_list']);
							$sql = "delete from tbl_child_profile_card_temp where child_id in ('$cheks')";
							$result = mysql_query($sql) or die(mysql_error());
							mysql_close();
							if($result){
								echo '
								<script>
								window.location.href="delete_new_child_list.php";
								</script>
								';
								//header ("Location: add_new_child.php");	
							}

							//$sqlDel = "Delete from tbl_child_profile_card_temp where child_id='$selected'";
							//$del_query = mysql_query($sqlDel); 
							}
							}
							
							?>	
					</div>
					
	</div>   
	</section> 
	</div>

</div>
  
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->

</body>
</html>
