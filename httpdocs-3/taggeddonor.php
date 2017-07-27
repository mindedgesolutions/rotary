<?php
include('include/config.php');
$msg = "";
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
    
    <!--<h4><strong>Attn. District Governors :</strong> To help us tag Asha Kiran Donors from your district to the children they are sponsoring. Please fill up this 
    <strong>Email and Mobile number </strong>and submit.</h4>-->
  </div>
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li><a href="#tab_1" data-toggle="tab">Rotary</a></li>
      <li><a href="#tab_2" data-toggle="tab">Inner Wheel</a></li>
      <li><a href="#tab_3" data-toggle="tab">Others</a></li>
      

    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        
          <div class="body bg-gray">
            <p><?php echo $msg; ?></p>
            <form action="taggeddonor.php" name="tagged" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
          <tr>
            <td width="396">
            <select name="district" class="form-control" id="district" onChange="loadXMLDoc(this.value);">
            <option value="">Select District</option>
            <?php 
		    $sql=mysql_query("Select DISTINCT donar_district from tbl_donar_master where tagged = 'yes' ORDER BY donar_district");
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
			$sql = "Select * from tbl_donar_master where donar_district = '$district' AND donar_club = '$club' AND tagged = 'yes' ORDER BY first_name ";
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
					  
				   </table>
				</td>
			  </tr>
			  <tr>
				<td>
				   <div style="width:100%; height:253px; overflow:auto;">
					 
					 <table width="100%" border="0" cellspacing="2" cellpadding="2">
                     <tr>
						<td width="14%"><p>Donor Name</p></td>
						<td width="14%"><p>View Your Child</p></td>
                        <td width="14%"><p>Resend Link</p></td>
					  </tr>
                      <?php
					  if(isset($_POST['submit'])){
					   $district = $_POST['district'];
					   $club = $_POST['club'];  
					   $sql = "Select * from tbl_donar_master where donar_district = '$district' AND donar_club = '$club'  AND tagged = 'yes'";  
					   //echo $sql;
					   $result = mysql_query($sql);	  
					   while($data = mysql_fetch_array($result)){
						   extract($data);
					  ?>
                      <tr>
                        <!--<td><?php //echo $donar_club; ?></td>-->
                        <td><?php echo $first_name.' '.$last_name; ?></td>
                        <td><a href="http://rotaryteach.org/child_development/other/login.php">View Your Child</a></td>
                        <td><a href="child_tag_list.php?Link=<?php echo $donar_id; ?>">Resend Link</a></td>
                      </tr>
                      <?php
					  }
					  }
					  ?>
                    </table>
				   </div>
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
           <form action="taggeddonor.php" name="tagged" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
          <tr>
            <td width="396">
            <select name="district" class="form-control" id="district" onChange="loadXMLDoc2(this.value);">
            <option value="">Select District</option>
            <?php 
		    $sql=mysql_query("Select DISTINCT donar_district from tbl_donar_master where tagged = 'yes' ORDER BY donar_district");
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
            <td width="55"></td>
            <td width="115"><input type="submit" name="submit" value="Search" class="btn btn-success"></td>
          </tr>
        </table>
		</form>
            <?php
			if(isset($_POST['submit'])){
			$district = $_POST['district'];
			$club = $_POST['club'];
			$sql = "Select * from tbl_donar_master where donar_district = '$district' AND donar_club = '$club' AND tagged = 'yes' ORDER BY first_name";
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
					  
				   </table>
				</td>
			  </tr>
			  <tr>
				<td>
				   <div style="width:100%; height:253px; overflow:auto;">
					 
					 <table width="100%" border="0" cellspacing="2" cellpadding="2">
                     <tr>
						<td width="14%"><p>Donor Name</p></td>
						<td width="14%"><p>View Your Child</p></td>
                        <td width="14%"><p>Resend Link</p></td>
					  </tr>
                      <?php
					  if(isset($_POST['submit'])){
					   $district = $_POST['district'];
					   $club = $_POST['club'];  
					   $sql = "Select * from tbl_donar_master where donar_district = '$district' AND donar_club = '$club' AND tagged = 'yes' ";  
					   //echo $sql;
					   $result = mysql_query($sql);	  
					   while($data = mysql_fetch_array($result)){
						   extract($data);
					  ?>
                      <tr>
                        <!--<td><?php //echo $donar_club; ?></td>-->
                        <td><?php echo $first_name.' '.$last_name; ?></td>
                        <td><a href="http://rotaryteach.org/child_development/other/login.php">View Your Child</a></td>
                        <td><a href="taggeddonor.php?Link=<?php echo $donar_id; ?>">Resend Link</a></td>
                      </tr>
                      <?php
					  }
					  }
					  ?>
                    </table>
				   </div>
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
      
      <div class="tab-pane" id="tab_3">
      <div class="tab-pane active" id="tab_1">
        
          <div class="body bg-gray">
            <p><?php echo $msg; ?></p>
           <form action="taggeddonor.php" name="tagged" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
          <tr>
            <td width="396">
            <select name="district" class="form-control" id="district" onChange="loadXMLDoc3(this.value);">
            <option value="">Select District</option>
            <?php 
		    $sql=mysql_query("Select DISTINCT donar_district from tbl_donar_master where tagged = 'yes' and donor_club == '' ORDER BY donar_district");
			while($row = mysql_fetch_array($sql))
			{
			$data=$row['donar_district'];						
			//if(strlen($data) == 3){
			?>
			<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
			<?php
			//}
			 } 
		   ?>
            </select>
            </td>
            <td width="410">
            <select name="club" class="form-control" id="club_un">
            <!--<option value="">Select Club</option>-->
            </select>
            </td>
            <td width="55"></td>
            <td width="115"><input type="submit" name="submit" value="Search" class="btn btn-success"></td>
          </tr>
        </table>
		</form>
            <?php
			if(isset($_POST['submit'])){
			$district = $_POST['district'];
			$club = $_POST['club'];
			$sql = "Select * from tbl_donar_master where donar_district = '$district' AND donar_club = '$club' AND tagged = 'no' ORDER BY first_name";
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
					  
				   </table>
				</td>
			  </tr>
			  <tr>
				<td>
				   <div style="width:100%; height:253px; overflow:auto;">
					 
					 <table width="100%" border="0" cellspacing="2" cellpadding="2">
                     <tr>
						<td width="14%"><p>Donor Name</p></td>
						<td width="14%"><p>View Your Child</p></td>
					  </tr>
                      <?php
					  if(isset($_POST['submit'])){
					   $district = $_POST['district'];
					   $club = $_POST['club'];  
					   $sql = "Select * from tbl_donar_master where donar_district = '$district' AND donar_club = '$club' AND tagged = 'no' ";  
					   //echo $sql;
					   $result = mysql_query($sql);	  
					   while($data = mysql_fetch_array($result)){
						   extract($data);
					  ?>
                      <tr>
                        <!--<td><?php //echo $donar_club; ?></td>-->
                        <td><?php echo $first_name.' '.$last_name; ?></td>
                        <td><a href="http://rotaryteach.org/child_development/other/donor.php">View Your Child</a></td>
                       <!--<td><a href="child_tag_list.php?Link=<?php echo $donar_id; ?>">Resend Link</a></td>-->
                      </tr>
                      <?php
					  }
					  }
					  ?>
                    </table>
				   </div>
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
	xmlhttp.open("GET","ajax_district.php?di="+id);
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
	xmlhttp.open("GET","ajax_district.php?di="+id);
	//alert(id);
	xmlhttp.send();
}
</script>
<script type="text/javascript">
function loadXMLDoc3(id)
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
		document.getElementById('club_un').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_district.php?di="+id);
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