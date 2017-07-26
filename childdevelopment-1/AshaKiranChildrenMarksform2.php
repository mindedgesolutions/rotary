<?php
session_start();
ob_start();
include('include/config.php');
$_SESSION['selmonth'] = $_POST['selMonth'];
$_SESSION['selyear'] = $_POST['selYear'];
$_SESSION['centerid'] = $_POST['ddCenter'];
echo $_SESSION['selmonth'];
header ("Location: AshaKiranChildrenMarksEntry.php");

?>
