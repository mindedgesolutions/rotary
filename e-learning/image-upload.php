<?php
include('../include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('../../../include/title.php'); ?></title>
<!-- Css Files -->
<?php include('../../../include/favicon.php'); ?>

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../../../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/owl.carousel.css" rel="stylesheet">
<link href="../css/color.css" rel="stylesheet">
<link href="../css/dl-menu.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet"> 
<link href="../css/prettyphoto.css" rel="stylesheet">
<link href="../css/responsive.css" rel="stylesheet">
<link href="../css/menu_v.css" rel="stylesheet" type="text/css" />

</head>
<body style="padding-right:0px;">

<h3>Upload Image without page refresh</h3>

<!--<form method="post" id="uploadimage" enctype="multipart/form-data" action="">-->

<div class="form-group">
	<label>Select File : </label>

	<input type="file" name="file" id="file" />
</div>

<!--</form>-->

<span id="uploaded_image"></span>

<script src="../js/jquery.min.js"></script>
<script src="../js/modernizr.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dlmenu.js"></script>
<script src="../js/flexslider-min.js"></script>
<script src="../js/goalProgress.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.prettyphoto.js"></script>
<script src="../js/waypoints-min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/newsticker.js"></script>
<script src="../js/parallex.js"></script>
<script src="../js/styleswitch.js"></script>
<script src="../js/functions.js"></script>
<script>
$(document).ready(function(){
	$(document).on('change', '#file', function(){

		var property = document.getElementById('file').files[0];
		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if (jQuery.inArray(image_extension, ['png', 'jpg', 'jpeg']) == -1){

			alert('Invalid file extension. Please select an image');
		}
		var image_size = property.size;

		if (image_size > 2000000){

			alert('Image is too large. Please select an image of smaller size');
		}
		else{

			var form_data = new FormData();
			form_data.append('file', property);
			
			$.ajax({
				url: 'upload.php',
				type: 'post',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					$('#uploaded_image').html('<label class="text-success">Image uploading ...</label>');
				},
				success: function(data){
					$('#uploaded_image').html(data);
				}
			})
		}
	});
});
</script>
</body>
</html>