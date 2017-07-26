<?php
//include("../connection.php");

$db_hostname = '192.185.36.129';
$db_username = 'rotary32_teach2';
$db_password = 'info123';
$db_database = 'rotary32_teach2';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);

//$volunttype = $_POST['volunttype'];
//$volunttype = 'Rotarian';
//$idfk=$_POST['NGOname'];
//$arr = array();
//$query = "SELECT concat(firstname,' ', midname,' ',lastname) as  name, rotaryDistrict, rotaryClubname, email FROM registration WHERE type='".$volunttype."';";
$query = "SELECT id,center_name FROM tbl_admin where idfk='".$idfk."'";
 
if(isset($_REQUEST["drp"]))
{
   $val=$_REQUEST["drp"];
$query = "SELECT id,center_name FROM tbl_admin where idfk='$val'";
    // Execute it, or return the error message if there's a problem.
    $result = mysql_query($query) or die(mysql_error());

    $dropdown = "<select name='ddCenter'>";
    while($row = mysql_fetch_assoc($result)) {

    $dropdown .= "\r\n<option value='{$row['name']}'>{$row['name']}</option>";
    }
    $dropdown .= "\r\n</select>";
}
?>
