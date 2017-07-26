<?php
include('include/config.php');
//include('include/session_check.php');

$msg="";
if(isset($_POST['update'])){
	
$id = $_POST['id'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];	
foreach($id as $key => $value){
$sql="Update tbl_donar_master_no_email set `donar_email` = '$email[$key]', `donar_contact` ='$mobile[$key]' where `donar_id` = '$id[$key]'";
//echo $sql;
$query = mysql_query($sql); 
if($query){
	$msg = "Data Updated.";
 }
}
}
?>

<!DOCTYPE html>
<html class="bg-black">
<head>
<meta charset="UTF-8">
<title>Child Development |</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-black">
<div class="form-box1" id="login-box">
  <div class="header">
    <center>
      <img src="img/logo1.png" width="80">
    </center>
    <h4><strong>Attn. District Governors :</strong> To help us tag Asha Kiran Donors from your district to the children they are sponsoring. Please fill up this 
    <strong>Email and Mobile number </strong>and submit.</h4>
  </div>
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li><a href="#tab_1" data-toggle="tab">Update Details for Rotarians</a></li>
      <li><a href="#tab_2" data-toggle="tab">Update Details for Inner Wheel</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        
          <div class="body bg-gray">
            <p><?php echo $msg; ?></p>
            <form action="donor.php" name="tagged" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
          <tr>
            <td width="396">
            <select name="district" class="form-control" id="district" onChange="loadXMLDoc(this.value);">
            <option value="">Select District</option>
            <?php 
		    $sql=mysql_query("Select DISTINCT donar_district from tbl_donar_master_no_email WHERE first_name !='' AND donar_email = '' AND donar_district != '' ORDER BY donar_district");
			while($row = mysql_fetch_array($sql))
			{
			$data=$row['donar_district'];
			if(strlen($data) == 4){
			?>
			<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
			<?php
			}
			 } 
		   ?>
            </select>
            </td>
            <td width="410">
            <select name="club" class="form-control" id="club">
            <!--<option value="">Select Club</option>-->
            </select>
            </td>
            <!--<td width="410">
            <select name="name" class="form-control" id="name">
            <option value="">Select Name</option>
            </select>
            </td>-->
            <td width="55"></td>
            <td width="115"><input type="submit" name="submit" value="Search" class="btn btn-success"></td>
          </tr>
        </table>
		</form>
            <?php
			if(isset($_POST['submit'])){
			$district = $_POST['district'];
			$club = $_POST['club'];
			//$name = $_POST['name'];
			$sql = "SELECT * from tbl_donar_master_no_email where donar_district = '$district' AND donar_email = '' ORDER BY first_name";
			$result = mysql_query($sql);
			while($data23 = mysql_fetch_array($result)){
			 extract($data23);
			}
			?>
			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
				<td>
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td colspan="3"><p>District :<?php echo $donar_district; ?></p></td>
                  </tr>
                  <tr>
                     <td colspan="3"><p>Club  : <?php echo $donar_club; ?></p></td>
                    </tr>
					  <tr>
						<td width="14%"><p>Donor Name</p></td>
						<td width="14%"><p>Donor Email</p></td>
                        <td width="14%"><p>Donor Mobile</p></td>
					  </tr>
				   </table>
				</td>
			  </tr>
			  <tr>
				<td>
				<form method="post" enctype="multipart/form-data" action="donor.php">
				   <div style="width:100%; height:253px; overflow:auto;">
					 
					 <table cellspacing="0" cellpadding="1" border="1" width="100%" >
					   
					   <?php
					    $sql = "SELECT * from tbl_donar_master_no_email where donar_district = '$district' AND donar_email = '' ORDER BY first_name";
						$result = mysql_query($sql);
						while($data = mysql_fetch_array($result)){
							extract($data);
						?>
						 <tr>
							<td width="19%"><p><?php echo $first_name.' '.$last_name; ?></p></td>
							<td width="50%"><input type="text" name="email[]" value="<?php if(isset($donar_email)){echo $donar_email;}?>" class="form-control" required></td>
							<td width="31%"><input type="text" name="mobile[]" value="<?php if(isset($donar_contact)){echo $donar_contact;}?>" class="form-control"></td>
							<input type="hidden" name="id[]" value="<?php echo $donar_id; ?>">
					   </tr> 
						<?php
						 }
						?>
					 </table>
				   </div>
				   <center><input type="submit" name="update" value="Update" class="btn btn-success">  </center>
				</form>
				</td>
			  </tr>
			</table>
			<?php
			}
			?>
          </div>
          
        </form>
      </div>
      
      <div class="tab-pane" id="tab_2">
      <div class="tab-pane active" id="tab_1">
        
          <div class="body bg-gray">
            <p><?php echo $msg; ?></p>
            <form action="donor.php" name="tagged" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
          <tr>
            <td width="396">
            <select name="district" class="form-control" id="district_iw" onChange="loadXMLDoc2(this.value);">
            <option value="">Select District</option>
            <?php 
		    $sql=mysql_query("Select DISTINCT donar_district from tbl_donar_master_no_email WHERE first_name !='' AND donar_email = '' AND donar_district != '' ORDER BY donar_district");
			while($row = mysql_fetch_array($sql))
			{
			$data=$row['donar_district'];
			if(strlen($data) == 3){
			?>
			<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
			<?php
			}
			 } 
		   ?>
            </select>
            </td>
            <td width="410">
            <select name="club" class="form-control" id="club_iw">
            <!--<option value="">Select Club</option>-->
            </select>
            </td>
            <!--<td width="410">
            <select name="name" class="form-control" id="name">
            <option value="">Select Name</option>
            </select>
            </td>-->
            <td width="55"></td>
            <td width="115"><input type="submit" name="submit" value="Search" class="btn btn-success"></td>
          </tr>
        </table>
		</form>
            <?php
			if(isset($_POST['submit'])){
			$district = $_POST['district'];
			$club = $_POST['club'];
			//$name = $_POST['name'];
			$sql = "SELECT * from tbl_donar_master_no_email where donar_district = '$district' AND donar_email = '' ORDER BY first_name";
			$result = mysql_query($sql);
			while($data23 = mysql_fetch_array($result)){
			 extract($data23);
			}
			?>
			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
				<td>
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td colspan="3"><p>District :<?php echo $donar_district; ?></p></td>
                  </tr>
                  <tr>
                     <td colspan="3"><p>Club  : <?php echo $donar_club; ?></p></td>
                    </tr>
					  <tr>
						<td width="14%"><p>Donor Name</p></td>
						<td width="14%"><p>Donor Email</p></td>
                        <td width="14%"><p>Donor Mobile</p></td>
					  </tr>
				   </table>
				</td>
			  </tr>
			  <tr>
				<td>
				<form method="post" enctype="multipart/form-data" action="donor.php">
				   <div style="width:100%; height:253px; overflow:auto;">
					 
					 <table cellspacing="0" cellpadding="1" border="1" width="100%" >
					   
					   <?php
					    $sql = "SELECT * from tbl_donar_master_no_email where donar_district = '$district' AND donar_email = '' ORDER BY first_name";
						$result = mysql_query($sql);
						while($data = mysql_fetch_array($result)){
							extract($data);
						?>
						 <tr>
							<td width="19%"><p><?php echo $first_name.' '.$last_name; ?></p></td>
							<td width="50%"><input type="text" name="email[]" value="<?php if(isset($donar_email)){echo $donar_email;}?>" class="form-control" required></td>
							<td width="31%"><input type="text" name="mobile[]" value="<?php if(isset($donar_contact)){echo $donar_contact;}?>" class="form-control"></td>
							<input type="hidden" name="id[]" value="<?php echo $donar_id; ?>">
					   </tr> 
						<?php
						 }
						?>
					 </table>
				   </div>
				   <center><input type="submit" name="update" value="Update" class="btn btn-success">  </center>
				</form>
				</td>
			  </tr>
			</table>
			<?php
			}
			?>
          </div>
          
        </form>
      </div>
      </div>
      <!-- /.tab-pane --> 
    </div>
    <!-- /.tab-content --> 
  </div>
  <!----> 
</div>
<script type="text/javascript">
function loadXMLDoc(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('club').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_district.php?id="+id);
	xmlhttp.send();
}
</script>
<script type="text/javascript">
function loadXMLDoc2(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('club_iw').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_district.php?id="+id);
	//alert(id);
	xmlhttp.send();
}
</script>

<script type="text/javascript">
/*function loadXMLDoc1(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('name').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_name.php?id="+id);
	xmlhttp.send();
}*/
</script>



<!-- jQuery 2.0.2 --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>