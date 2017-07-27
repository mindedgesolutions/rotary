<?php
$connect = @mysql_connect('192.185.36.129','rotary32_teach2','info123');
$db = @mysql_select_db('rotary32_teach2');

$data = $_GET['district_code'];
$sql=mysql_query("select * from districtclub_rotary where district='$data'");
$i=0;
while($row=mysql_fetch_array($sql))
{
$club=$row['club'];						
echo '<option value="'.$club.'">'.$club.'</option>';
$i++;
  }// End of while

?>