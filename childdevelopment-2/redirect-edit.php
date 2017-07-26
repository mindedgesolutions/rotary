<?php
session_start();
ob_start();
include('include/config.php');

$check = mysql_num_rows(mysql_query("select * from asha_kiran_center_rating where assessment_id='".base64_decode($_SESSION['assessment_id'])."'"));

if ($check > 0){
?>
<script type="text/javascript">
window.location = 'center-rating-edit.php?assessid=<?= $_SESSION['assessment_id'] ?>';
</script>
<?php
}