<?php
//include("connection.php");

$dbName='rotary32_teach';
$dbHost='192.185.36.129';
$dbUser='rotary32_teach';
$dbPass='info123'; 

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());


$sql = "SELECT * FROM clubproject where categoryid = '1'";
$result1 = mysql_query($sql);
$teacher = mysql_num_rows($result1);

$sql = "Select * from clubproject where categoryid = '2'";
$result2 = mysql_query($sql);
$elearning = mysql_num_rows($result2);

$sql = "Select * from clubproject where categoryid = '3'";
$result3 = mysql_query($sql);
$adult = mysql_num_rows($result3);

$sql = "Select * from clubproject where categoryid = '4'";
$result4 = mysql_query($sql);
$child = mysql_num_rows($result4);

$sql = "Select * from clubproject where categoryid = '5'";
$result5 = mysql_query($sql);
$happy = mysql_num_rows($result5);

$sql = "Select * from clubproject where categoryid = '6'";
$result6 = mysql_query($sql);
$other = mysql_num_rows($result6);

$sql = "Select * from clubproject where categoryid = '7'";
$result7 = mysql_query($sql);
$library = mysql_num_rows($result7);

$total = $teacher + $elearning + $adult + $child + $happy + $other + $library;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COUNT OF THE PROJECTS</title>
</head>

<body>
<table width="80%" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="28%"><strong>VERTICALS</strong></td>
    <td width="72%"><strong>COUNT OF</strong></td>
  </tr>
  
  <tr>
    <td width="28%"><strong>TEACHER SUPPORT</strong></td>
    <td width="72%"><strong><?php echo $teacher; ?></strong></td>
  </tr>
  
    <tr>
    <td><strong>E-LEARNING</strong></td>
    <td><strong><?php echo $elearning; ?></strong></td>
  </tr>


  <tr>
    <td><strong>ADULT LITERACY</strong></td>
    <td><strong><?php echo $adult; ?></strong></td>
  </tr>

  <tr>
    <td><strong>CHILD DEVELOPMENT</strong></td>
    <td><strong><?php echo $child; ?></strong></td>
  </tr>

  <tr>
    <td><strong>HAPPY SCHOOL</strong></td>
    <td><strong><?php echo $happy; ?></strong></td>
  </tr>

  <tr>
    <td><strong>OTHERS</strong></td>
    <td><strong><?php echo $other; ?></strong></td>
  </tr>

  <tr>
    <td><strong>LIBRARY CREATION</strong></td>
    <td><strong><?php echo $library; ?></strong></td>
  </tr>
  <tr>
    <td><strong>TOTAL</strong></td>
    <td><strong><?php echo $total; ?></strong></td>
  </tr>
</table>




</body>
</html>