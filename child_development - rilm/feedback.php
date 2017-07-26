<?php
include('include/config.php');
if(isset($_POST['submit'])){

$email = $_POST['foo'];	

foreach($email as $value){
	
$to = $value; // Email address of the Receiver.
$subject = "View your Child";
$message = '
<html>
<head></head>
<body>
<p>Dear Donor,
</p>
<p>
  Greetings from Rotary India Literacy Mission!
</p>
<p>
  We thank you for generously contributing towards the Asha Kiran program and helping to send out of school children back to school.
</p>
<p>To see the child/children that you have sponsored, follow the link :</p>
<p>
  http://www.rotaryteach.org/child_development/other/ or visit the ‘My Asha Kiran Child’ tab on the top right of home page of our website www.rotaryteach.org.
</p>
<p>
  Once you visit the link/website you have to create an account with your email id registered with us as mentioned below. Please select a password of your choice and keep a note of that for log-in.
</p>
<p><strong>Email- '.$value.'</strong>
</p>
<p>Now only you can access the details of the child that you have sponsored under Asha Kiran. We thank you once more for investing in the future of a child through Asha Kiran. You are indeed doing good in this world by supporting Asha Kiran… a ray of hope program.</br>
</p>
<p>Regards,
</p>
<p>Team Asha Kiran,
  </br>
</p>
<p>Rotary India Literacy Mission. </p>
</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: Rotary Teach<info@rotaryteach.org>'. "\r\n";

$send_contact = mail($to,$subject,$message,$headers);	
	
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="feedback.php" method="post" enctype="multipart/form-data">
<table width="36%" border="0">
  <tr>
    <th width="42%" scope="col">Tagged NGO&nbsp;&nbsp;<select name="ngo">
    <?php
	$sql3 = "SELECT DISTINCT ngo FROM  tbl_child_selected_tagging";
	$result3 = mysql_query($sql3);
	while($row_catagory = mysql_fetch_array($result3)){
		 extract($row_catagory);
	?>
    <option value="<?php echo $ngo; ?>"><?php echo $ngo; ?></option>
    <?php
	}
	?>
    </select>
    </th>
    <th width="58%" scope="col"><input type="submit" name="submit" value="Submit" /></th>
  </tr>
</table>
</form>

<?php
if(isset($_POST['submit'])){
$ngo_name = $_POST['ngo'];
$sql3 = "SELECT * FROM  tbl_child_selected_tagging where ngo = '$ngo_name'";
$result3 = mysql_query($sql3);
?>
<form action="feedback.php" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
 <tr>
    <th scope="col" colspan="6">Donor Tagged till date..</th>
  </tr>
  <tr>
    <th scope="col">Date Of</th>
    <th scope="col">Donor District</th>
    <th scope="col">Donor Name</th>
    <th scope="col">Donor Email</th>
    <th scope="col">Tagged</th>
  </tr>
  <script language="JavaScript">
	function toggle(source) {
	  checkboxes = document.getElementsByName('foo[]');
	  for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	  }
	}
 </script>
 <input type="checkbox" onClick="toggle(this)" /> Toggle All<br/>
  <?php
	while($row_catagory = mysql_fetch_array($result3)){
	 extract($row_catagory);
	 $tagged_donor = $row_catagory['donar_id'];
	$sql1 = "SELECT DISTINCT first_name,last_name,donar_email,donar_district,tagged FROM  tbl_donar_master WHERE donar_id = '$tagged_donor' and tagged = 'yes'";
	$resu = mysql_query($sql1);
	while($ans = mysql_fetch_array($resu)){
	  extract($ans);
	  ?>
      
  <tr>
    <td><p><?php echo $date_of; ?></p></td>
    <td><p><?php echo $donar_district; ?></p></td>
    <td><p><?php echo $full_name = $first_name . $last_name; ?></p></td>
	<td><p><?php echo $donar_email; ?></p></td>
    <td><p><?php echo $tagged; ?></p></td>
    <td><p><input type="checkbox" name="foo[]" value="<?php echo $donar_email;?>"/></p></td>
  </tr>
  <?php
	   }
	 }// row_country end
   }
  ?>
  <tr><td colspan="4" align="center"><input type="submit" name="submit" value="Mail Send"></td></tr>
</table>
</form>
</body>
</html>