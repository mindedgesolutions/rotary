<?php
include('../include/config.php');

$check = mysql_num_rows(mysql_query("select * from project_elearning where project_no='".$_SESSION['project_no']."'"));

if ($check > 0){
?>
<script type="text/javascript">
//window.location = ''
</script>
<?php
}