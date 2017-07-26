<?php
session_start();
ob_start();
$_SESSION['selmonth'] = $_POST['selMonth'];
$_SESSION['selyear'] = $_POST['selYear'];
echo $_SESSION['selmonth'];
//header ("Location: AshaKiranChildrenMarksEntry.php");

?>
