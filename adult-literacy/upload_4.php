<?php
include('../include/config.php');

if ($_FILES['img_4']['size'] < 2000000){

	$extension = explode('.', $_FILES["img_4"]["name"]);
    $exten = $extension[1];

    if ($exten=='jpg' || $exten=='jpeg'){

		$folderNo = explode('/', $_REQUEST['projectId']);
		$folder = $folderNo[1];

		$fnm = $_FILES['img_4']['name'];
		$dst = 'images/'.$folder.'/'.$fnm;

		$upload = move_uploaded_file($_FILES['img_4']['tmp_name'], $dst);

		$check = mysql_num_rows(mysql_query("select * from project_temp_adult_literacy where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

		if ($check > 0){

			$update = "update project_temp_adult_literacy set image_4='".$dst."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";

			mysql_query($update);
		}else{

			$insert = "insert into project_temp_adult_literacy(project_no, image_4, sln) values('".$_REQUEST['projectId']."', '".$dst."', '".$_REQUEST['sln']."')";

			mysql_query($insert);
		}
		echo '<span style="color:#ff0000;">Image has been saved</span>';
	}else{

		echo '<span style="color:#ff0000;">Invalid file extension</span>';
	}
}else{

	echo '<span style="color:#ff0000;">Image size is too large</span>';
}