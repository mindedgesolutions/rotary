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
<?php echo $teacher . $elearning . $adult . $child. $happy . $other. $library ?>

