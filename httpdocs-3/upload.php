<?php

$new_image_name =trim($_GET["fl"]); 
//move_uploaded_file($_FILES["file"]["tmp_name"], "/uploads/".$new_image_name . ".jpg");
move_uploaded_file($_FILES["file"]["tmp_name"], "../clubprojects/projectupload/" . $new_image_name);
?>