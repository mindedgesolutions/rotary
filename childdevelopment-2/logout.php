<?php
session_start();
session_destroy();
unset($_SESSION['center_name']);
header("location:index.php");
?>