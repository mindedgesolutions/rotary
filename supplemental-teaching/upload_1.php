<?php
include('../../include/config.php');

if ($_FILES['img_1']['size'] < 2000000){

	$extension = explode('.', $_FILES["img_1"]["name"]);
    $exten = $extension[1];

    if ($exten=='jpg' || $exten=='jpeg'){

		$folderNo = explode('/', $_REQUEST['prno']);
		$folder = $folderNo[1];

		$fnm = $_FILES['img_1']['name'];
		$dst = 'images/'.$folder.'/'.$fnm;

		$upload = move_uploaded_file($_FILES['img_1']['tmp_name'], $dst);

		$check = mysql_num_rows(mysql_query("select * from project_teacher_support_supplement_master where project_no='".$_REQUEST['prno']."'"));

		if ($check > 0){

			$update = "update project_teacher_support_supplement_master set image_1='".$dst."' where project_no='".$_REQUEST['prno']."'";

			mysql_query($update);
		}else{

			$insert = "insert into project_teacher_support_supplement_master(project_no, image_1) values('".$_REQUEST['prno']."', '".$dst."')";

			mysql_query($insert);
		}
		echo '<span style="color:#ff0000;">Image has been saved</span>';
	}else{

		echo '<span style="color:#ff0000;">Invalid file extension</span>';
	}
}else{

	echo '<span style="color:#ff0000;">Image size is too large</span>';
}