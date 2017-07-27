<?php
session_start();
include("admin/includes/connect.php"); 
$email=$_SESSION['uid'];
$query=mysql_query("select * from login where email='$email'");
$rec=mysql_fetch_array($query);
$type=$rec['type'];
if($type!="Organization")
{
$query1=mysql_query("select * from nonorg where email='$email'");
}
else
{
$query1=mysql_query("select * from reg_org where email='$email'");
}
$rec1=mysql_fetch_array($query1);
$name=$rec1['name'];
//------------------------------------------------------------------------------------------------------------------------
$query2="SELECT * FROM heart_case where ref='$email' ORDER BY ref_no DESC"; 
$result2=mysql_query($query2);
$nr2=mysql_num_rows($result2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--


-->
</style>
</head>
<body>
<div style="position:relative; width:702px; height:550px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:22px; text-align:justify;">
 <span class="style6">Welcome <?php echo $name;?></span><br />
 <div style="position:absolute; width:433px; height:auto; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:22px; text-align:justify; top: 32px;"><img src="images/poster3.jpg" /></div>
</div>
  

   

</body>
</html>
