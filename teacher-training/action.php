<?php
include('../../include/config.php');

$prno = $_REQUEST['prno'];
$folderNo_enc = $_REQUEST['folderNo_enc'];
$trainingType = $_REQUEST['trainingType'];

if ($_REQUEST['other_id_1']!=''){ $other = $_REQUEST['other_id_1'];}
else if ($_REQUEST['other_id_2']!=''){ $other = $_REQUEST['other_id_2'];}
else if ($_REQUEST['other_id_3']!=''){ $other = $_REQUEST['other_id_3'];}
else if ($_REQUEST['other_id_4']){ $other = $_REQUEST['other_id_4'];}
else if ($_REQUEST['other_id_5']){ $other = $_REQUEST['other_id_5'];}
else if ($_REQUEST['other_id_6']){ $other = $_REQUEST['other_id_6'];}
else if ($_REQUEST['other_id_7']){ $other = $_REQUEST['other_id_7'];}
else if ($_REQUEST['other_id_8']){ $other = $_REQUEST['other_id_8'];}

$volDet = mysql_num_rows(mysql_query("select * from project_temp_teacher_support_training where project_no='".$_REQUEST['prno']."'"));

if ($volDet > 0){

	$checkImage = mysql_fetch_array(mysql_query("select image_1, image_2, image_3 from project_teacher_support_training_master where project_no='".$_REQUEST['prno']."'"));

	if ($checkImage['image_1']!='' || $checkImage['image_2']!='' || $checkImage['image_3']!=''){

		$training_topic = implode(',', $_REQUEST['check_result']);

		$update = "update project_teacher_support_training_master set upload_date='".date('Y-m-d')."', training_type='".$trainingType."', training_partner='".$_REQUEST['training_Partner']."', other='".$_REQUEST['other_training_partner']."', training_topic='".$training_topic."', other_training_topic='".$other."', training_hours='".$_REQUEST['trainingHours']."', training_days='".$_REQUEST['trainingDays']."', training_description='".$_REQUEST['trainingDesc']."', training_cost='".$_REQUEST['trainingCost']."' where project_no='".$_REQUEST['prno']."'";

		mysql_query($update);

		$query_getDet = mysql_query("select * from project_temp_teacher_support_training where project_no='".$_REQUEST['prno']."'");

		while ($getDet = mysql_fetch_array($query_getDet)){

			$insertDet = "insert into project_teacher_support_training_details(project_no, no_schools, sln, school_id, school_name, school_type, city, state, teacher_name_1, student_no_1, teacher_name_2, student_no_2, total_teacher, total_student) values('".$_REQUEST['prno']."', '".$getDet['no_schools']."', '".$getDet['sln']."', '".$getDet['school_id']."', '".$getDet['school_name']."', '".$getDet['school_type']."', '".$getDet['city']."', '".$getDet['state']."', '".$getDet['teacher_name_1']."', '".$getDet['student_no_1']."', '".$getDet['teacher_name_2']."', '".$getDet['student_no_2']."', '".$getDet['total_teacher']."', '".$getDet['total_student']."')";

			mysql_query($insertDet);
		}

		$updateMaster = "update project_master set status='complete' where project_no='".$_REQUEST['prno']."'";

		mysql_query($updateMaster);
	?>
	<script type="text/javascript">
	alert('Project has been saved successfully');
	window.location.href = '../../index.php';
	</script>
	<?php
	}else{
	?>
	<script type="text/javascript">
	alert('Please upload related images');
	window.location.href = 'index.php?prno=<?= base64_encode($_REQUEST['prno']) ?>&folderno=<?= $_REQUEST['folderno'] ?>';
	</script>
	<?php
	}
}else{
?>
<script type="text/javascript">
alert('Please enter details of schools participated');
window.location.href = 'index.php?prno=<?= base64_encode($_REQUEST['prno']) ?>&folderno=<?= $_REQUEST['folderno'] ?>';
</script>
<?php
}