<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
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
					<h1 style="color:#ffffff; text-align:center;">Child List for Approval</h1>
					<font color="#F4F3F3" style="float:right;">Master -> Child Approve</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
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
										<input class="btn btn-primary" type="submit" value="Search" />
									</div>
								</div>
				</form>
				<br/>
			</div>
			<!--Record Searching End-->
		</div>
	</div>

	<br/>
	
<div class="container">
	<div class="row">
		<form action='#' method='post'>
		<div class="col-sm-12">

		<?php
		$createdBy=$_POST['selNgo'];
		if (!empty($createdBy)) {

		//$sql="select id,username,firstname,lastname,email,center_name from tbl_admin where type='". $type ."'";			
		/*
		$sql1="select center_name from tbl_admin where type='NGO' and username='". $createdBy ."'";
		$s_result = mysql_query($sql1); 
		while($row = mysql_fetch_array($s_result)){
					extract($row);
		}
		echo "NGO : ".$center_name;
		*/
		$sql="select child_id, child_photo, child_name, child_gender, child_dob, child_father_name, 
		child_mother_name, child_guardian_name, name_partner_ngo, create_by, create_date
		FROM tbl_child_profile_card_temp where create_by='". $createdBy ."' and status_b='t'";

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
											  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Image</th>
											  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
											  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Gender</th>
											  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>DOB/Age</th>
											  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Father Name</th>
											  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Mother Name</th>
											  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>View</th>
											  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Approve</th>
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
					<td class='pad'><img height='100' width='100' src='http://rotaryteach.org/child_development/upload/".$row["child_photo"]."'></td>
					<td class='pad'>".$row["child_name"]."</td>
					<td class='pad'>".$row["child_gender"]."</td>
					<td class='pad'>".$row["child_dob"]."</td>
					<td class='pad'>".$row["child_father_name"]."</td>				
					<td class='pad'>".$row["child_mother_name"]."</td>
					<td class='pad' style='text-align:center;'><a href=viewChildProfile.php?id=" .$row["child_id"]. " target='_blank' style='color: #2288f1;' >View</a></td>
					<td class='pad' style='text-align:center;'><input type='checkbox' name='check_list[]' value=".$row["child_id"]." id='chk".$i."'></td>
				</tr>
			  ";
			}
			else
			{
				echo "
				<tr class='altcol'>
					<td class='pad'>".$i."</td>
					<td class='pad'><img height='100' width='100' src='http://rotaryteach.org/child_development/upload/".$row["child_photo"]."'></td>
					<td class='pad'>".$row["child_name"]."</td>
					<td class='pad'>".$row["child_gender"]."</td>
					<td class='pad'>".$row["child_dob"]."</td>
					<td class='pad'>".$row["child_father_name"]."</td>				
					<td class='pad'>".$row["child_mother_name"]."</td>
					<td class='pad' style='text-align:center;'><a href=viewChildProfile.php?id=" .$row["child_id"]. " target='_blank' style='color: #2288f1;' >View</a></td>
					<td class='pad' style='text-align:center;'><input type='checkbox' name='check_list[]' value=".$row["child_id"]." id='chk".$i."'></td>
				</tr>
			  ";
			}
		$i=$i+1;
		} 
			echo "</table>";
			echo "</div>";
			echo "<br/>";
			echo "<div class='col-md-12'>";
			echo "<center><input class='btn btn-primary' type='submit' name='submit' value='Approved'></center>";
			echo "</div>";
		}
		else
		{
			echo "<br/>";
			echo "-- No Record found --";
		}
		}
		echo "</form>";
		
		}
		
		
		?>

		

	</div>
	<?php
		if(isset($_POST['submit'])){//to run PHP script on submit
		if(!empty($_POST['check_list'])){
		$cheks = implode("','", $_POST['check_list']);
		//$sql = "delete from tbl_child_profile_card_temp where child_id in ('$cheks')";
		$sql = "update tbl_child_profile_card_temp set status_b='a' where child_id in ('$cheks')";
		//$result = mysql_query($sql) or die(mysql_error());
		$result = mysql_query($sql);
		//mysql_close();
		if($result){
			$sqlIns = "insert into tbl_child_profile_card (child_photo,child_name,child_gender,child_dob,child_father_name,
			child_mother_name,child_guardian_name,previously_study,address,street,city,state,pin,name_partner_ngo, 
			ngo_representative,ngo_contact,create_by,create_date,status,approval,type,tagged,ngoid,centerid, 
			dateofRegularization,block,category,Differently_Abled,Learning_Disabilities,taggedid,taggeddate)
			select 
			child_photo,child_name,child_gender,child_dob,child_father_name,child_mother_name,child_guardian_name,previously_study,
			address,street,city,state,pin,name_partner_ngo,ngo_representative,ngo_contact,create_by,create_date,status,approval,
			type,tagged,ngoid,centerid,dateofRegularization,block,category,Differently_Abled,Learning_Disabilities,'0','0'
			from tbl_child_profile_card_temp where status_b='a' and child_id in ('$cheks')";
			
			$resultIns = mysql_query($sqlIns) or die(mysql_error());
			mysql_close();
			if($resultIns){
			echo '
			<script>
			alert("Data Successfully Approved");
			window.location.href="child_approve.php";
			</script>
			';
			}
		}
		}
		}
		
	?>	

</div>
</div>
</body>
</html>
