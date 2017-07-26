<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$msg = "";

if (!isset($_SESSION['username'])) {
header('Location: index.php');
}


if(isset($_GET['pid'])){
$pid =$_GET['pid'];
$sql = "Select * from  tbl_child_profile_card where child_id = '$pid'";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	extract($row);	
 }
}
//////////////////////// ADDITION ////////////////////////////////////////////////////////
if(isset($_REQUEST['submit'])){
$action=$_REQUEST['action'];

if($action == 'edit'){

$child_id = $_POST['child_id'];	
$child_name = ucfirst($_POST['child_name']);
$child_gender = $_POST['gender'];
$child_dob = $_POST['child_dob'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$child_gaurdian = $_POST['child_gaurdian'];
$child_study = $_POST['studied'];
$child_address = $_POST['address'];
$child_street = $_POST['street'];
$child_state = $_POST['state'];
$child_city = $_POST['city'];
$child_pin = $_POST['pin'];
$ngo_partner = $_POST['ngo_partner'];
$ngo_representative = $_POST['ngo_rep'];
$ngo_contact = $_POST['ngo_contact'];
$profile_createdby = $_SESSION['username'];
$create_date = date('d-m-Y');


/*
$image = $_FILES['child_image'];
$image_name= basename($_FILES['child_image']['name']);
move_uploaded_file($image['tmp_name'], "../upload/". $image_name);
*/
$image = $_FILES['child_image'];
$newTime = time();
$image_name= $newTime.basename($_FILES['child_image']['name']);


	

$moved = move_uploaded_file($image['tmp_name'], "../child_development/upload/". $image_name);

if ($moved){
	
	$sql = "Select * from tbl_child_profile_card where child_id = '$child_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['child_photo'];
}

$sql = "Update tbl_child_profile_card SET child_photo = IF('$image_name'='$newTime','$pd_img_02','$image_name') where child_id = '$child_id'";

//echo $sql;
$answer = mysql_query($sql);
if($answer) {
	?>
	<script type="text/javascript">
    alert('Data Updated Successfully');
    window.location = '../childdevelopment/approved_child_list.php';
  </script>
	<?php
}
else {
	?>
	<script type="text/javascript">
		alert('There occured some error. Please try after some time');
		window.location = '../childdevelopment/approved_child_list.php';
  </script>
  <?php
}
}	
}
}
?>
  
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
.thumb {
	max-height : 100px;
	max-width : 100px;
}
</style>	
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
<header> 
  <!-- Logo Start -->
  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
  <!-- Logo End --> 
  <!-- Sidebar Navigation Start -->
  <?php include('include/mainnav.php'); ?>
  <div class="clearfix"></div>
  <!-- Sidebar Navigation End --> 
</header>
<div class="structure-row alone"> 
  <!-- Right Section Start -->
  <div class="right-sec"> 
    <!-- Right Section Header Start -->
    <header> 
      <!-- User Section Start -->
      <?php include('include/child_header.php'); ?>
     
      <div class="clearfix"></div>
    </header>
    
    <br>
  <?php  
	//echo 'First Name : '. $_SESSION['first_name'] . '<br/>';
	//echo 'User Name : '. $_SESSION['username'] . '<br/>';
	//echo 'NGO Name : '. $_SESSION['ngo_name'] . '<br/>';
	//echo 'Type : '. $_SESSION['type'] . '<br/>';
	//echo 'ID : '. $_SESSION['uid'] . '<br/>';
	//echo 'Center Name : '. $_SESSION['center_name'];
	
	?>
	<div class="container">
								
				
	<section class="content">
 <!-- Small boxes (Stat box) -->

 <form role="form" id="image_upload" action="edit_child_profile_for_img.php?action=edit" method="post" enctype="multipart/form-data">
 <div class="box-body">
     <?php echo $msg; ?>
     <!--<fieldset>-->
	  <legend>Edit Child Image</legend> 
      <div class="form-group">
       <label>Child Image</label><span style="margin-left: 10px; color: #ff0000;">(Image size should not be more than 1 MB)</span>
       <!--<input type="file" id="exampleInputFile" name="child_image" />-->
	   <!--<input type="submit" id="btnimgsubmit" name="btnimgsubmit" />-->

      <input type="file" id="file_input" name="child_image"  accept=".png,.jpg" />
      <div id="thumb-output"></div>

      <?php if ($child_photo!=''){ ?>
        <img src="../child_development/upload/<?php echo $child_photo; ?>" height="120" width="120" alt="No Image" id="oldimg">
      <?php } ?>
      </div>
      <div class="form-group">
       <label>Child Name</label>
       <input type="text" class="form-control" placeholder="Child Name...." name="child_name" readonly="readonly" required value="<?php echo $child_name; ?>" />
		<input type="hidden" name="child_id" value="<?php echo $child_id; ?>">
	  </div> 
     </div><!-- /.box-body -->
      <div style="display:block;">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit" id="btnSave" />
      </div>
     </form>
     </section>
						
							
								
	</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

      </div>
    </div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  
	  <?php
	  include('include/footer.php');
	  ?>
  <!-- Sidebar Navigation End --> 
	
	
  </div>
<script>
$(document).ready(function(){
    $('#file_input').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            $('#thumb-output').html(''); //clear html of output element
            var data = $(this)[0].files; //this file data
            
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                        $('#thumb-output').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); 
					 $('#oldimg').hide();
					 $('#btnSave').show();
					//URL representing the file's data.
                }
				else {
					 $('#btnSave').hide();
					alert('Invalid file type');
				}
            });
           
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
</script>
</body>
</html>
