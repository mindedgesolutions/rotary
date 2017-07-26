<?php
include 'include/config-2.php';

$fileName = $_FILES['file1']['name'];
$fileTmpLoc = $_FILES['file1']['tmp_name'];
$fileType = $_FILES['file1']['type'];
$fileSize = $_FILES['file1']['size'];
$fileErrorMsg = $_FILES['file1']['error'];

if (!empty($fileName)){

	if ($fileSize < 10000000){

		$extension = explode('.', $fileName);
        $exten = $extension[1];

        if ($exten=='mp4' || $exten=='MP4'){

          	$dst = 'videos/'.$fileName;

        	$upload = move_uploaded_file($fileTmpLoc, 'videos/'.$fileName);

        	$update = "update video_master set video='".$dst."' where video_id='".base64_decode($_REQUEST['vid_id'])."'";

        	mysql_query($update);

        	echo '<p style="margin: 0;color: #ce011e;">File has been uploaded</p>';
        }else{

        	echo 3;
        }
	}else{
		echo 2;
	}
}else{

	echo 1;
}