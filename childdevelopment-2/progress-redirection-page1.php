<?php
include('include/config.php');

if ($_REQUEST['quarter']=='quarter1'){

	$qid = 'quarter1';
?>
<script>
	window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= $_REQUEST['qid'] ?>';
</script>
<?php
}else if ($_REQUEST['quarter']=='quarter2'){

	if (date('m') < 4){
	?>
	<script type="text/javascript">
		alert('We are still in 1st Quarter. Please check.');
		window.location = 'add_child_progress.php?pid=<?= $_REQUEST['pid'] ?>';
	</script>
	<?php
	}else{

	$qid = 'quarter2';
	?>
	<script>
		window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= base64_encode($qid) ?>';
	</script>
	<?php
	}
}else if ($_REQUEST['quarter']=='quarter3'){

	if (date('m') < 7){
	?>
	<script type="text/javascript">
		alert('We are still in 2nd Quarter. Please check.');
		window.location = 'add_child_progress.php?pid=<?= $_REQUEST['pid'] ?>';
	</script>
	<?php
	}else{

	$qid = 'quarter3';
	?>
	<script>
		window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= base64_encode($qid) ?>';
	</script>
	<?php
	}
}else if ($_REQUEST['quarter']=='quarter4'){

	if (date('m') < 10){
	?>
	<script type="text/javascript">
		alert('We are still in 3rd Quarter. Please check.');
		window.location = 'add_child_progress.php?pid=<?= $_REQUEST['pid'] ?>';
	</script>
	<?php
	}else{

	$qid = 'quarter4';
	?>
	<script>
		window.location = 'progress-quarter.php?pid=<?= $_REQUEST['pid'] ?>&qid=<?= base64_encode($qid) ?>';
	</script>
	<?php
	}
}
?>