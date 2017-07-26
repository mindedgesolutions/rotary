<?php
include 'include/config-2.php';

$check = mysql_fetch_array(mysql_query("select * from video_master where video_id='".base64_decode($_REQUEST['vid_id'])."'"));

if ($check['video']!=''){

	$update = "update video_master set video_header='".$_REQUEST['video_title']."', status='".$_REQUEST['status']."' where video_id='".base64_decode($_REQUEST['vid_id'])."'";

	mysql_query($update);

}else{

	echo 1;
}