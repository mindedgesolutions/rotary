<?php
//include("connection.php");



$dbName='rotary32_teach';
	$dbHost='103.227.62.215';
	$dbUser='mindedgeteach1';
	$dbPass='SuHiNa@1979';
	
/*$dbName='rotary32_teach';
$dbHost='localhost';
$dbUser='root';
$dbPass=''; */

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());

/*$dbConn = mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
$db = mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());*/

//////////////////////////////////// TEACHER SUPPORT IMAGE ////////////////////////////

/*$sql = "SELECT img2 FROM `clubproject` WHERE `categoryid`='1'";
$result1 = mysql_query($sql);
$teacher2 = mysql_num_rows($result1);

$sql = "SELECT img3 FROM `clubproject` WHERE `categoryid`='1'";
$result1 = mysql_query($sql);
$teacher3 = mysql_num_rows($result1);

$sql = "SELECT img4 FROM `clubproject` WHERE `categoryid`='1'";
$result1 = mysql_query($sql);
$teacher4 = mysql_num_rows($result1);

$total_teacher = $teacher1 + $teacher2 + $teacher3 + $teacher4;
//////////////////////////////////// E-LEARNING IMAGE ////////////////////////////
$sql = "SELECT img1 FROM `clubproject` WHERE `categoryid`='2'";
$result1 = mysql_query($sql);
$el1 = mysql_num_rows($result1);

$sql = "SELECT img2 FROM `clubproject` WHERE `categoryid`='2'";
$result1 = mysql_query($sql);
$el2 = mysql_num_rows($result1);

$sql = "SELECT img3 FROM `clubproject` WHERE `categoryid`='2'";
$result1 = mysql_query($sql);
$el3 = mysql_num_rows($result1);

$sql = "SELECT img4 FROM `clubproject` WHERE `categoryid`='2'";
$result1 = mysql_query($sql);
$el4 = mysql_num_rows($result1);

$total_el = $el1 + $el2 + $el3 + $el4;
//////////////////////////////////// ADULT LITERACY IMAGE ////////////////////////////
$sql = "SELECT img1 FROM `clubproject` WHERE `categoryid`='3'";
$result1 = mysql_query($sql);
$al1 = mysql_num_rows($result1);

$sql = "SELECT img2 FROM `clubproject` WHERE `categoryid`='3'";
$result1 = mysql_query($sql);
$al2 = mysql_num_rows($result1);

$sql = "SELECT img3 FROM `clubproject` WHERE `categoryid`='3'";
$result1 = mysql_query($sql);
$al3 = mysql_num_rows($result1);

$sql = "SELECT img4 FROM `clubproject` WHERE `categoryid`='3'";
$result1 = mysql_query($sql);
$al4 = mysql_num_rows($result1);

$total_al = $al1 + $al2 + $al3 + $al4;
//////////////////////////////////// CHILD DEVELOPMENT IMAGE ////////////////////////////
$sql = "SELECT img1 FROM `clubproject` WHERE `categoryid`='4'";
$result1 = mysql_query($sql);
$ch1 = mysql_num_rows($result1);

$sql = "SELECT img2 FROM `clubproject` WHERE `categoryid`='4'";
$result1 = mysql_query($sql);
$ch2 = mysql_num_rows($result1);

$sql = "SELECT img3 FROM `clubproject` WHERE `categoryid`='4'";
$result1 = mysql_query($sql);
$ch3 = mysql_num_rows($result1);

$sql = "SELECT img4 FROM `clubproject` WHERE `categoryid`='4'";
$result1 = mysql_query($sql);
$ch4 = mysql_num_rows($result1);

$total_ch = $ch1 + $ch2 + $ch3 + $ch4;
//////////////////////////////////// HAPPY SCHOOL IMAGE ////////////////////////////
$sql = "SELECT img1 FROM `clubproject` WHERE `categoryid`='5'";
$result1 = mysql_query($sql);
$hp1 = mysql_num_rows($result1);

$sql = "SELECT img2 FROM `clubproject` WHERE `categoryid`='5'";
$result1 = mysql_query($sql);
$hp2 = mysql_num_rows($result1);

$sql = "SELECT img3 FROM `clubproject` WHERE `categoryid`='5'";
$result1 = mysql_query($sql);
$hp3 = mysql_num_rows($result1);

$sql = "SELECT img4 FROM `clubproject` WHERE `categoryid`='5'";
$result1 = mysql_query($sql);
$hp4 = mysql_num_rows($result1);

$total_hp = $hp1 + $hp2 + $hp3 + $hp4;
//////////////////////////////////// OTHERS IMAGE ////////////////////////////
$sql = "SELECT img1 FROM `clubproject` WHERE `categoryid`='6'";
$result1 = mysql_query($sql);
$ot1 = mysql_num_rows($result1);

$sql = "SELECT img2 FROM `clubproject` WHERE `categoryid`='6'";
$result1 = mysql_query($sql);
$ot2 = mysql_num_rows($result1);

$sql = "SELECT img3 FROM `clubproject` WHERE `categoryid`='6'";
$result1 = mysql_query($sql);
$ot3 = mysql_num_rows($result1);

$sql = "SELECT img4 FROM `clubproject` WHERE `categoryid`='6'";
$result1 = mysql_query($sql);
$ot4 = mysql_num_rows($result1);

$total_ot = $ot1 + $ot2 + $ot3 + $ot4;
//////////////////////////////////// LIBRARY IMAGE ////////////////////////////
$sql = "SELECT img1 FROM `clubproject` WHERE `categoryid`='7'";
$result1 = mysql_query($sql);
$lb1 = mysql_num_rows($result1);

$sql = "SELECT img2 FROM `clubproject` WHERE `categoryid`='7'";
$result1 = mysql_query($sql);
$lb2 = mysql_num_rows($result1);

$sql = "SELECT img3 FROM `clubproject` WHERE `categoryid`='7'";
$result1 = mysql_query($sql);
$lb3 = mysql_num_rows($result1);

$sql = "SELECT img4 FROM `clubproject` WHERE `categoryid`='7'";
$result1 = mysql_query($sql);
$lb4 = mysql_num_rows($result1);

$total_lb = $lb1 + $lb2 + $lb3 + $lb4;*/

?>
<?php
$id = $_GET["id"];
$sql = "SELECT title,img1,img2,img3,img4,if(img1_caption is null, '', img1_caption) as img1_caption,if(img2_caption is null, '', img2_caption) as img2_caption,if(img3_caption is null, '', img3_caption) as img3_caption,if(img4_caption is null, '', img4_caption) as img4_caption FROM `clubproject` WHERE `id`='" . $id . "'";
$result1 = mysql_query($sql);
while($data = mysql_fetch_array($result1)){
	extract($data);
?>
<?php echo $img1. '^' . $img1_caption .'|'. $img2 . '^' . $img2_caption.'|'. $img3 . '^' . $img3_caption .'|'. $img4 . '^' . $img4_caption. '|' . $title  ; ?>
<?php
}
?>