<?php
include('include/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Redundancy Check</title>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td>Donor ID</td>
    <td>Donor Club</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Donor Email</td>
  </tr>
  <?php
  $sql = "SELECT DISTINCT donar_id,donar_club,first_name,last_name,donar_email from tbl_donar_master";
  $result = mysql_query($sql);
  while($data = mysql_fetch_array($result)){
	  extract($data);
  ?>
  <tr>
    <td><?php echo $donar_id; ?></td>
    <td><?php echo $donar_club; ?></td>
    <td><?php echo $first_name; ?></td>
    <td><?php echo $last_name; ?></td>
    <td><?php echo $donar_email; ?></td>
  </tr>
  <?php
  }
  ?>
  
  
  
</table>

</body>
</html>