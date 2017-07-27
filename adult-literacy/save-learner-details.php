<?php
include('../include/config.php');

if ($_FILES['learner_img']['size'] < 2000000){

	$extension = explode('.', $_FILES["learner_img"]["name"]);
    $exten = $extension[1];

    if ($exten=='jpg' || $exten=='jpeg'){

		$folderNo = explode('/', $_REQUEST['prno']);
		$folder = $folderNo[1];

		$fnm = $_FILES['learner_img']['name'];
		$dst = 'images/'.$folder.'/'.$fnm;

		$upload = move_uploaded_file($_FILES['learner_img']['tmp_name'], $dst);

		$check = mysql_num_rows(mysql_query("select * from project_adult_learner_details where project_no='".$_REQUEST['prno']."' and center_sln='".$_REQUEST['center_sln']."' and sln='".$_REQUEST['learner_sln']."'"));

		if ($check > 0){

			$update = "update project_adult_learner_details set learner_name='".$_REQUEST['learnerName']."', learner_age='".$_REQUEST['learnerAge']."', learner_gender='".$_REQUEST['learnerGender']."', learner_occupation='".$_REQUEST['learnerOcc']."', learner_category='".$_REQUEST['learnerCat']."', learner_address='".$_REQUEST['learnerAddress']."', learner_image='".$dst."' where project_no='".$_REQUEST['prno']."' and center_sln='".$_REQUEST['center_sln']."' and sln='".$_REQUEST['learner_sln']."'";

			mysql_query($update);
		}else{

			$insert = "insert into project_adult_learner_details(project_no, center_sln, sln, learner_name, learner_age, learner_gender, learner_occupation, learner_category, learner_address, learner_image) values('".$_REQUEST['prno']."', '".$_REQUEST['center_sln']."', '".$_REQUEST['learner_sln']."', '".$_REQUEST['learnerName']."', '".$_REQUEST['learnerAge']."', '".$_REQUEST['learnerGender']."', '".$_REQUEST['learnerOcc']."', '".$_REQUEST['learnerCat']."', '".$_REQUEST['learnerAddress']."', '".$dst."')";

			mysql_query($insert);
		}
	}
}