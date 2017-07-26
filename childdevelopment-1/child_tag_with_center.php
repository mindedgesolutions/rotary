<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];
$username=$_SESSION['username'];
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
					<h1 style="color:#ffffff; text-align:center;">Tag Child with Center</h1>
					<font color="#F4F3F3" style="float:right;">Master -> Center</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
			<div class="container">
				<?php
				/*$db_hostname = '103.227.62.215';
				$db_username = 'rotary32_teach2';
				$db_password = 'Rotary@2016';
				$db_database = 'rotary32_teach2';

				// Database Connection String
				$con = mysql_connect($db_hostname,$db_username,$db_password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

				mysql_select_db($db_database, $con);*/
				$centerid=$_GET['id'];
				$sqlCenterName="Select center_name from tbl_admin where id='". $centerid ."'";
				//echo $sqlCenterName;
				$result = mysql_query($sqlCenterName);
				if($result){
					while($row = mysql_fetch_array($result)) {
					extract($row);
				}
				}
				?>
				
				<br/>
			</div>
			<!--Record Searching End-->
		</div>
	</div>
	<br/>
<div class="container">
<div class="col-sm-12">
<form action="#" method="post">
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


$sql="select child_id,child_photo,child_name,child_gender,child_dob,child_father_name from tbl_child_profile_card where create_by='". $username ."' and centerid='0'";
			
$r_query = mysql_query($sql); 
$count = mysql_num_rows($r_query);
		//echo $count;
	if($r_query)
	{
	if($count>0)
	{
echo "<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
						      <thead>
								
								  <tr>
									  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Image</th>
									  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Gender</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Date of Birth/Age</th>
									  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Father Name</th>
									   <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Select</th>
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
			<td class='pad'><img height='100' width='100' src='../child_development/upload/".$row["child_photo"]."'></td>
			<td class='pad'>".$row["child_name"]."</td>
			<td class='pad'>".$row["child_gender"]."</td>
			<td class='pad'>".$row["child_dob"]."</td>
			<td class='pad'>".$row["child_father_name"]."</td>
			<td class='pad' style='text-align:center;'><input type='checkbox' name='check_list[]' value=".$row["child_id"]." id='chk".$i."'></td>
			
		</tr>
	  ";
	}
	else
	{
		echo "
		<tr class='altcol'>
			<td class='pad'>".$i."</td>
			<td class='pad'><img height='100' width='100' src='../child_development/upload/".$row["child_photo"]."'></td>
			<td class='pad'>".$row["child_name"]."</td>
			<td class='pad'>".$row["child_gender"]."</td>
			<td class='pad'>".$row["child_dob"]."</td>
			<td class='pad'>".$row["child_father_name"]."</td>
			<td class='pad' style='text-align:center;'><input type='checkbox' name='check_list[]' value=".$row["child_id"]." id='chk".$i."'></td>
		</tr>
	  ";
	}
$i=$i+1;
}  
echo "</table>";

?>
<div class="col-sm-12" align="left" style="height : 35px; color: #ffffff; margin-top:10px; margin-left:10px; padding : 5px;">
<center>
<input class="btn btn-primary" type="submit" name="submit" value="Tag with Center -> <?php echo $center_name; ?>" /> 
</center>
</div>
<?php
}
else
{
	echo "No Record Found";
}
	}
?>
</form>
<?php
	if(isset($_POST['submit'])){//to run PHP script on submit
	if(!empty($_POST['check_list'])){
	$cheks = implode("','", $_POST['check_list']);
	
	//$sql = "update tbl_child_profile_card set centerid='". $centerid ."' where ngoid='". $ngoid ."' and child_id in ('$cheks')";
	
	$sql = "update tbl_child_profile_card set centerid='". $centerid ."' where create_by='". $username ."' and child_id in ('$cheks')";
	
	echo $sql;
	$result = mysql_query($sql);
	if($result){
		echo '
		<script>
		alert("Child Successfully taged with center");
		window.location.href="child_tag_with_center.php";
		</script>
		';
	}
	}
	}
	
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
