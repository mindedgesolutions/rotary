<?php
include('../../include/config.php');

if ($_FILES['eval_form']['size'] < 2000000){

	$disDate = date('Y-m-d', strtotime($_REQUEST['distDate']));

	$extension = explode('.', $_FILES["eval_form"]["name"]);
    $exten = $extension[1];

    if ($exten=='jpg' || $exten=='jpeg' || $exten=='pdf'){

		$folderNo = explode('/', $_REQUEST['projectId']);
		$folder = $folderNo[1];

		$fnm = $_FILES['eval_form']['name'];
		$dst = 'documents/'.$folder.'/'.$fnm;

		$upload = move_uploaded_file($_FILES['eval_form']['tmp_name'], $dst);

		$check = mysql_num_rows(mysql_query("select * from project_temp_teacher_support_nation where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

		if ($check > 0){

			$update = "update project_temp_teacher_support_nation set evaluation_form='".$dst."', award_date='".$disDate."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";

			mysql_query($update);
		}else{

			$insert = "insert into project_temp_teacher_support_nation(project_no, evaluation_form, sln, award_date) values('".$_REQUEST['projectId']."', '".$dst."', '".$_REQUEST['sln']."', '".$disDate."')";

			mysql_query($insert);
		}
		echo '<span style="color:#ff0000;">Document has been saved</span>';
	}else{

		echo '<span style="color:#ff0000;">Invalid file extension</span>';
	}
}else{

	echo '<span style="color:#ff0000;">Document size is too large</span>';
}