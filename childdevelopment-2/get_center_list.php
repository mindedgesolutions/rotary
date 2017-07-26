<?php
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

$q = intval($_GET['q']);
$sql="SELECT id,center_name FROM tbl_admin WHERE idfk = '".$q."'";
$result = mysql_query($sql);
echo '<option value="">Select Center</option>';
while($row = mysql_fetch_array($result)) {
 extract($row);
 
 echo '<option value="'.$id.'">'.$center_name.'</option>';
}
?>