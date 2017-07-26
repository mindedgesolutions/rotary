<?php
include('include/config.php');
session_start();

$_SESSION['click_uid'] = $_REQUEST['uid'];
$_SESSION['click_ngo'] = $_REQUEST['ngo'];

?>
<script>
window.location = "child_approved.php?uid=<?= $_SESSION['click_uid'] ?>&ngo=<?= $_SESSION['click_ngo'] ?>";
//window.location = "child_approved.php";
</script>