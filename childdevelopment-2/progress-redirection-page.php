<?php
include('include/config.php');

if ($_REQUEST['quarter']=='quarter1'){

	$check1 = mysql_num_rows(mysql_query("select * from quarter_1 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	$check2 = mysql_num_rows(mysql_query("select * from quarter_11 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	if ($check1=='' && $check2==''){
?>
<script type="text/javascript">
window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= base64_encode($_REQUEST['quarter']) ?>';
</script>
<?php }else{ ?>
<script type="text/javascript">
alert('Child entry exists');
window.location = 'add_child_progress.php?pid=<?= $_REQUEST['pid'] ?>';
</script>
<?php
}}else if ($_REQUEST['quarter']=='quarter2'){

	$check1 = mysql_num_rows(mysql_query("select * from quarter_2 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	$check2 = mysql_num_rows(mysql_query("select * from quarter_22 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	if ($check1=='' && $check2==''){
?>
<script type="text/javascript">
window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= base64_encode($_REQUEST['quarter']) ?>';
</script>
<?php }else{ ?>
<script type="text/javascript">
alert('Child entry exists');
window.location = 'add_child_progress.php?pid=<?= $_REQUEST['pid'] ?>';
</script>
<?php
}}else if ($_REQUEST['quarter']=='quarter3'){

	$check1 = mysql_num_rows(mysql_query("select * from quarter_3 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	$check2 = mysql_num_rows(mysql_query("select * from quarter_33 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	if ($check1=='' && $check2==''){
?>
<script type="text/javascript">
window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= base64_encode($_REQUEST['quarter']) ?>';
</script>
<?php }else{ ?>
<script type="text/javascript">
alert('Child entry exists');
window.location = 'add_child_progress.php?pid=<?= $_REQUEST['pid'] ?>';
</script>
<?php
}}else if ($_REQUEST['quarter']=='quarter4'){

	$check1 = mysql_num_rows(mysql_query("select * from quarter_4 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	$check2 = mysql_num_rows(mysql_query("select * from quarter_44 where child_id='".base64_decode($_REQUEST['pid'])."'"));

	if ($check1=='' && $check2==''){
?>
<script type="text/javascript">
window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= base64_encode($_REQUEST['quarter']) ?>';
</script>
<?php }else{ ?>
<script type="text/javascript">
alert('Child entry exists');
window.location = 'add_child_progress.php?pid=<?= $_REQUEST['pid'] ?>';
</script>
<?php }} ?>