<?php
include('../include/config.php');

$check = mysql_num_rows(mysql_query("select * from project_adult_literacy where project_no='".base64_decode($_SESSION['prno'])."'"));

if ($check > 0){
?>
<script type="text/javascript">
window.location = 'edit.php?prno=<?= $_SESSION['prno'] ?>&folderno=<?= $_SESSION['folderno'] ?>';
</script>
<?php
}
?>