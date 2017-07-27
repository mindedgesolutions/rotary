<?php
include('../include/config.php');

$folderNo = base64_decode($_REQUEST['folderno']);

if ($_REQUEST['subtype']=='Nation Builder Award'){

	if (!file_exists('nation-builder-award/images/'.$folderNo)){
		mkdir('nation-builder-award/images/'.$folderNo, 0777, true);
	}

	if (!file_exists('nation-builder-award/documents/'.$folderNo)){
		mkdir('nation-builder-award/documents/'.$folderNo, 0777, true);
	}
?>
<script type="text/javascript">
window.location = 'nation-builder-award/index.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>';
</script>
<?php
}else if ($_REQUEST['subtype']=='Teacher Training'){

	if (!file_exists('teacher-training/images/'.$folderNo)){
		mkdir('teacher-training/images/'.$folderNo, 0777, true);
	}

	if (!file_exists('teacher-training/documents/'.$folderNo)){
		mkdir('teacher-training/documents/'.$folderNo, 0777, true);
	}
?>
<script type="text/javascript">
window.location = 'teacher-training/index.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>';
</script>
<?php
}else if ($_REQUEST['subtype']=='Supplemental Teaching'){

	if (!file_exists('supplemental-teaching/images/'.$folderNo)){
		mkdir('supplemental-teaching/images/'.$folderNo, 0777, true);
	}

	if (!file_exists('supplemental-teaching/documents/'.$folderNo)){
		mkdir('supplemental-teaching/documents/'.$folderNo, 0777, true);
	}
?>
<script type="text/javascript">
window.location = 'supplemental-teaching/index.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>';
</script>
<?php
}