<?php
include('../include/config.php');

if ($_FILES['img_3']['size'] < 2000000){

	$extension = explode('.', $_FILES["img_3"]["name"]);
    $exten = $extension[1];

    if ($exten=='jpg' || $exten=='jpeg'){

		$folderNo = explode('/', $_REQUEST['projectId']);
		$folder = $folderNo[1];

		$fnm = $_FILES['img_3']['name'];
		$dst = 'images/'.$folder.'/'.$fnm;

		$upload = move_uploaded_file($_FILES['img_3']['tmp_name'], $dst);

		$update = "update project_temp_adult_literacy set exam_image_3='".$dst."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";

		mysql_query($update);

		echo '<span style="color:#ff0000;">Image has been saved</span>';
	}else{

		echo '<span style="color:#ff0000;">Invalid file extension</span>';
	}
}else{

	echo '<span style="color:#ff0000;">Image size is too large</span>';
}