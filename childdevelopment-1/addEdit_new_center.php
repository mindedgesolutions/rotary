<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];
$i=1;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
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

<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:60px;
		 background-color:#32343b;
		}
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
<div class="wrapper">
	<header>
	  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
	  <?php include('include/mainnav.php'); ?>
	  <div class="clearfix"></div>
	</header>
	<div class="structure-row alone"> 
		<div class="right-sec"> 
			<header> 
			  <?php include('include/child_header.php'); ?>
				<div>
					<h1 style="color:#ffffff; text-align:center;">Center List</h1>
					<font color="#F4F3F3" style="float:right;">Master -> Center</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
			<div class="container">
				<?php
				/*
				$db_hostname = '103.227.62.215';
				$db_username = 'rotary32_teach2';
				$db_password = 'Rotary@2016';
				$db_database = 'rotary32_teach2';

				// Database Connection String
				$con = mysql_connect($db_hostname,$db_username,$db_password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

				mysql_select_db($db_database, $con);
				*/
				?>
				<div class="col-sm-12" align="left" style="height : 35px; color: #ffffff; margin-top:10px; margin-left:10px; padding : 5px;">
						<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" value="Add New Center" onClick="Javascript:window.location.href = 'http://rotaryteach.org/childdevelopment/add_new_center.php';" />
				</div>
				<!--
				<form action="" method="post"> 
					<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:10px; padding : 5px;">Search</div>
						<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
							<div class="form-group" style="padding-bottom:75px;"> 
								<div class="col-sm-12">
									Type:<select class="form-control" id="selType" name="selType" >
											<option value="">Select Type</option>
											<option value="NGO">NGO</option>
											<option value="center">Center</option> 
										</select>
								</div>
								
							</div>
						</div>
						<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
							<div class="form-group" style="padding-bottom:75px;">
								<div class="col-sm-12"><br/>
									<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="submit" value="Search" />
								</div>
							</div>
						</div>						
						<br/>			
				</form>-->
				<br/>
			</div>
			<!--Record Searching End-->
		</div>
	</div>
	<br/>
<div class="container">
<div class="col-sm-12">

<?php
//$type=$_POST['selType'];
//if($type=="center"){$type1="Center";}
//if($type=="NGO"){$type1="NGO";}
//echo ($indexfrom);
//echo ($type);
$type="Center";
//if (!empty($type)) {

//$type=$_POST['selType'];

//echo ($indexfrom);
//echo ($type);
$ngoid=$_SESSION['uid'];
$sql="select id,username,firstname,lastname,email,password,center_name from tbl_admin where idfk='". $ngoid ."' and type='center'";

			
$r_query = mysql_query($sql); 

echo "<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
						      <thead>
								
								  <tr>
									  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
									  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>User Name</th>
									  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>First Name</th>
									  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Last Name</th>
									  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>E-Mail</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Password</th>
									  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>" .$type. " Name</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Edit</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Tag</th>
								  </tr>
							  </thead>
							  ";
while ($row = mysql_fetch_array($r_query)){  

//while($row = $result->fetch_assoc()){
if ($i%2==0) 
	{
echo "
		<tr class='headercol'>
			<td class='pad'>".$i."</td>
			<td class='pad'>".$row["username"]."</td>
			<td class='pad'>".$row["firstname"]."</td>
			<td class='pad'>".$row["lastname"]."</td>
			<td class='pad'>".$row["email"]."</td>
			<td class='pad'>".$row["password"]."</td>
			<td class='pad'>".$row["center_name"]."</td>

			<td class='pad' style='text-align:center;'><a href=edit_new_center.php?id=".$row["id"]." style='color:#2288f1;' >Edit</a></td>

			<td class='pad' style='text-align:center;'><a href=child_tag_with_center.php?id=" .$row["id"]. " style='color:#2288f1;' >Child Tag</a></td>
		</tr>
	  ";
	}
	else
	{
		echo "
		<tr class='altcol'>
			<td class='pad'>".$i."</td>
			<td class='pad'>".$row["username"]."</td>
			<td class='pad'>".$row["firstname"]."</td>
			<td class='pad'>".$row["lastname"]."</td>
			<td class='pad'>".$row["email"]."</td>		
			<td class='pad'>".$row["password"]."</td>
			<td class='pad'>".$row["center_name"]."</td>

			<td class='pad' style='text-align:center;'><a href=edit_new_center.php?id=".$row["id"]." style='color:#2288f1;' >Edit</a></td>

			<td class='pad' style='text-align:center;'><a href=child_tag_with_center.php?id=" .$row["id"]. " style='color:#2288f1;' >Child Tag</a></td>
		</tr>
	  ";
	}
$i=$i+1;
}  
echo "</table>";

?>
<br/>
</div>

</div>
<!--	<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>	-->
</div>



	

</body>
</html>
