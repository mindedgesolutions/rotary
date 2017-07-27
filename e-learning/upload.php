<?php
include('../include/config.php');

if ($_FILES['file']['name']!=''){

	$fnm = $_FILES['file']['name'];
	$dst = 'images/'.$fnm;

	$upload = move_uploaded_file($_FILES['file']['tmp_name'], $dst);
	echo '<img src="'.$dst.'" height="150" width="150" class="img-thumbnail">';
}