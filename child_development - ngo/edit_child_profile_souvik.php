<?php
session_start();
ob_start();
include('include/config.php');
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


	

$moved = move_uploaded_file($image['tmp_name'], "../upload/". $image_name);

if ($moved){
?>
  <script type="text/javascript">
    alert('Data have been updated successfully');
    window.location = 'child_profile.php';
  </script>
<?php
}else{
?>
  <script type="text/javascript">
    alert('There occured some error. Please try after some time');
    window.location = 'child_profile.php';
  </script>
<?php
}

$sql = "Select * from tbl_child_profile_card where child_id = '$child_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['child_photo'];
//$image_name=$pd_img_02; (COMMENETED BY RAJESH 27/03/2017)
}

/* RAJESH 27/03/2017
//present image
$new_child_image = $_FILES['new_child_image'];
$image_name= basename($_FILES['new_child_image']['name']);
$image_name1= time().basename($_FILES['new_child_image']['name']);
move_uploaded_file($new_child_image['tmp_name'], "../child_development/upload/". $image_name1);

//previous image checking
$sql1 = "Select * from tbl_child_profile_card where child_id = '$id'";
$result1 = mysql_query($sql1);
while($data = mysql_fetch_array($result1)){
$pd_img_02 = $data['child_photo'];
}
*/

//commented for testing on 27/03/2017

$sql = "Update tbl_child_profile_card SET child_photo = IF('$image_name'='$newTime','$pd_img_02','$image_name') where child_id = '$child_id'";




//echo $sql;
$answer = mysql_query($sql);
//header('location:child_profile.php');
  }
  
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin | Dashboard</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="dashboard.php" class="logo">
<!-- Add the class icon to your logo image or logo icon to add the margining -->
Super Admin </a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
<span class="icon-bar"></span> <span class="icon-bar"></span> </a>
<div class="navbar-right">
  <?php include('include/user_account.php'); ?>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image"> <img src="img/avatar5.png" class="img-circle" alt="User Image" /> </div>
    <div class="pull-left info">
      <p>Hello, <?php echo ucfirst($_SESSION['username']); ?></p>
      </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <?php include('include/side_menu.php'); ?>
</section>
<!-- /.sidebar -->
</aside>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> Child Profile <small>Control panel</small> </h1>
  <ol class="breadcrumb">
    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Child Profile</li>
  </ol>
</section>
<!-- Main content -->
 <section class="content">
 <!-- Small boxes (Stat box) -->

 <form role="form" id="image_upload" action="edit_child_profile_souvik.php?action=edit" method="post" enctype="multipart/form-data">
 <div class="box-body">
     <?php echo $msg; ?>
     <!--<fieldset>-->
	  <legend>Child Data Information</legend> 
      <div class="form-group">
       <label>Child Image</label><span style="margin-left: 10px; color: #ff0000;">(Image size should not be more than 1 MB)</span>
       <!--<input type="file" id="exampleInputFile" name="child_image" />-->
	   <!--<input type="submit" id="btnimgsubmit" name="btnimgsubmit" />-->

      <input type="file" id="file_input" name="child_image" multiple />
      <div id="thumb-output"></div>

      <?php if ($child_photo!=''){ ?>
        <img src="../upload/<?php echo $child_photo; ?>" height="120" width="120" alt="No Image">
      <?php } ?>
      </div>


      <div class="form-group">
       <label>Child Name</label>
       <input type="text" class="form-control" placeholder="Child Name...." name="child_name" readonly="readonly" required value="<?php echo $child_name; ?>" />
      </div> 
      <div class="form-group" style="display: none;">
       <label>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
       <?php
	   $d = "";
	   $c = "";
	   $sql = "Select `child_gender` from tbl_child_profile_card where child_id = '$pid'";
	   $res = mysql_query($sql);
	   while($data = mysql_fetch_array($res)){
	   if($data['child_gender']=="Male"){
		 $c = "checked=checked";
		}
		elseif($data['child_gender']=="Female"){
		 $d = "checked=checked";	
		}
		else{
		 $c="";
		}
	   }
	   ?> 
       Male&nbsp;&nbsp;<input type="radio" class="form-control" name="gender" value="Male" <?php echo $c;?>/>&nbsp;&nbsp;
       Female&nbsp;&nbsp;<input type="radio" class="form-control" name="gender" value="Female" <?php echo $d;?>/>&nbsp;&nbsp;
      </div> 
      <div class="form-group">
       <label>Child DOB</label>
       <input type="text" class="form-control" placeholder="00/00/0000" name="child_dob" readonly="readonly" value="<?php echo $child_dob; ?>"/>
      </div> 
      <div class="form-group">
       <label>Father's Name</label>
       <input type="text" class="form-control" placeholder="Father Name..." name="father_name" readonly="readonly" value="<?php echo $child_father_name; ?>"/>
      </div> 
      <div class="form-group">
       <label>Mother's Name</label>
       <input type="text" class="form-control" placeholder="Mother Name..." name="mother_name" readonly="readonly" value="<?php echo $child_mother_name; ?>"/>
      </div> 
      <div class="form-group">
       <label>Child's Gaurdian [if other than parent]</label>
       <input type="text" class="form-control" placeholder="Child Gaurdian...." readonly="readonly" name="child_gaurdian" value="<?php echo $child_guardian_name; ?>"/>
      </div> 
      <div class="form-group" style="display: none;">
       <label>Child has previously studied upto which standard/class?</label>
       <br>
       A. The Child is between age group 7 to 14 yrs&nbsp;&nbsp;<input type="radio" class="form-control" name="studied" value="A" <?php if($previously_study=='A'){ echo "checked";} ?>/><br>
       B. Child who has never been to School&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="form-control" name="studied" value="B" <?php if($previously_study=='B'){ echo "checked";} ?>/><br>
       C. Child who is not attending school fro more than 45days without information to school&nbsp;&nbsp; 
       <input type="radio" class="form-control" name="studied" value="C" <?php if($previously_study=='C'){ echo "checked";} ?>/><br>
       D. Child who is a laggard (e.g The Child's age is 12 years but can read text of only Class II & III etc)&nbsp;&nbsp;
       <input type="radio" class="form-control" name="studied" value="D" <?php if($previously_study=='D'){ echo "checked";} ?>/>
      </div> 
      <div class="form-group">
       <label>Street / Village</label>
       <input type="text" class="form-control" readonly="readonly" placeholder="Street.." name="street" value="<?php echo $street; ?>"/>
      </div>
      <div class="form-group">
       <label>City / Block</label>
       <input type="text" class="form-control" readonly="readonly" placeholder="City /Block.." name="city" value="<?php echo $city; ?>"/>
      </div>  
      <div class="form-group">
       <label>State</label>
       <select name="state" class="form-control" disabled="disabled" >
        <option value="">Select State</option>
        <?php 
			$i=0;
			$sql_c="select * from tbl_states";
			$result_c= dbQuery($sql_c);
			while($row_c = dbFetchAssoc($result_c)){			
			
			if($row_c['state']== $state){
			$c='selected="selected"';
			} 
			else{
			$c="";
			} 			
	 		if($i%4==0){
   			echo '</tr><td>&nbsp;</td><tr>';
  			} ?>
            <option value="<?php echo $row_c['state'];?>" <?php echo $c; ?>><?php echo $row_c['state']; ?></option>
            <?php $i++; } ?>
       </select>
      </div>
      </fieldset>
      <fieldset>
      <legend>NGO Details</legend>
      <div class="form-group">
       <label>Partner NGO Organisation</label>
       <input type="text" class="form-control" readonly="readonly" placeholder="Partner NGO.." name="ngo_partner" required value="<?php echo $name_partner_ngo; ?>"/>
      </div>
      <input type="hidden" name="child_id" value="<?php echo $child_id; ?>">
      </fieldset>
     </div><!-- /.box-body -->
      <div class="box-footer">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
      </div>
     <!--</form>-->
     </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>

<script type="text/javascript">
function loadXMLDoc(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('sub_catagory').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_sub_cat.php?id="+id);
	xmlhttp.send();
}
</script>

<script type="text/javascript">
function loadXMLDoc1(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('club').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_sub.php?club="+id);
	xmlhttp.send();
}
</script>




<!-- ./wrapper -->
<!-- add new calendar event modal -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

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
                    fRead.readAsDataURL(file); //URL representing the file's data.
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