<?php
include('include/config.php');
$msg = "";

if(isset($_GET['link'])){
$link = $_GET['link'];
$sql = "Select * from tbl_donar_master where donar_id = '$link'";
$res = mysql_query($sql);
while($data = mysql_fetch_array($res)){
	extract($data);
}
$donar_name = $first_name .' '. $last_name;
$another = 'website@rotaryteach.org';	
$to = $donar_email.','.$another; // Email address of the Receiver.
$subject = "View your Asha Kiran Child";
$message = '<p>Dear Donor,
</p>
<p>Greetings from Rotary India Literacy Mission!</br></br>
</p>
<p>We thank you for generously contributing towards the Asha Kiran program and helping to send out of school children back to school.</br>
</p>
<p>To see the child/children that you have sponsored, follow the link : </p>
<p>http://www.rotaryteach.org/child_development/other/  or visit the ‘My Asha Kiran Child’ tab on our website.</br></br>
</p>
<p>Once you visit the link/website you have to create an account with your name and email id as mentioned below:</br>
</p>
<p> Name:'.$donar_name.'</br>
</p>
<p>Email- '.$donar_email.'</br>
</p>
<p>Now only you can access the details of the child that you have sponsored under Asha Kiran. We thank you once more for investing in the future of a child through Asha Kiran. You are indeed doing good in this world by supporting Asha Kiran… a ray of hope program. </br></br>
</p>
<p>Regards,</br>
</p>
<p>Team Asha Kiran,</br>
</p>
<p>Rotary India Literacy Mission. </p>
';
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	// More headers
	$headers .= 'From: Rotary India Literacy Mission <info@rotarytech.org>'. "\r\n";
	$send_contact = mail($to,$subject,$message,$headers);
	echo "<script>alert('Mail send Successfully, please check your Inbox / Spam Folder.')</script>";
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
    
    <!--<h4><strong>Attn. District Governors :</strong> To help us tag Asha Kiran Donors from your district to the children they are sponsoring. Please fill up this 
    <strong>Email and Mobile number </strong>and submit.</h4>-->
  </div>
  <div class="nav-tabs-custom">
    <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
        
          <div class="body bg-gray">
            <p><?php echo $msg; ?></p>
            <form action="rotary.php" name="tagged" method="post" enctype="multipart/form-data">
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
                        <td><a href="rotary.php?link=<?php echo $donar_id; ?>">Resend Link</a></td>
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