<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$ngoname=$_SESSION['ngo_name'];
$_SESSION['type'];

?>
<!DOCTYPE HTML>
<html>
<head>
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

<!--<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />-->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
function IsNumeric1(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error1").style.display = ret ? "none" : "inline";
			return ret;
		}

function showCenter(str) {
    if (str == "") {
        document.getElementById("ddCenter").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ddCenter").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_center_list.php?q="+str,true);
        xmlhttp.send();
    }
}

function checkAge(){
	var child_age = $('#child_age').val();

	if (child_age!='' && child_age < 7 || child_age!='' && child_age > 14){

		alert('Age has to be between 7 years and 14 years');
		document.getElementById('child_age').value = '';
	}
}
</script>

<style type="text/css">
#thumb-output img{
	width: 100%;
	height: 100%;
}
</style>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper" style="margin: -100px 0 0 0;">
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
	  <div>
			<h1 style="color:#ffffff; text-align:center;">Add New Child Profile</h1>
            <font color="#F4F3F3" style="float:right;">Home -> Master -> Child Profile</font>
		</div>
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<!--<div align="Centre" style="margin-left:400px;">
			<h1 style="color:#ffffff;"></h1>
		</div>-->
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
	<section class="content">
      <div class="row">
		<div class="col-md-12">
         
         <!-- form start 
         <div class="box-header">
           <h3 class="box-title"><center>Add New Child Profile</center></h3>
         </div><!-- /.box-header -->
		 <?php
			//$db_hostname = '192.185.36.129';
			//$db_username = 'rotary32_teach2';
			//$db_password = 'info123';
			//$db_database = 'rotary32_teach2';

		 	/*-----------Previously mentioned connection-------------*/
			/*$db_database='rotary32_teach2';
			$db_hostname='103.227.62.215';
			$db_username='rotary32_teach2';
			$db_password='Rotary@2016'; 
			// Database Connection String
			$con = mysql_connect($db_hostname,$db_username,$db_password);
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }

			mysql_select_db($db_database, $con);*/
			/*-----------Previously mentioned connection-------------*/
			?>
         <form action="newchildsave.php" method="post" id="" role="form" enctype="multipart/form-data" autocomplete="off">
           <div class="col-md-6">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">					
							<label>NGO</label>
							<input type="text" class="form-control" id="txtngo" name="txtngo" value="<?php echo $ngoname; ?>" readonly>
							<?php
								/* $sql = "SELECT id,center_name FROM tbl_admin WHERE type='NGO'";
								$result = mysql_query($sql);
								echo "<select class='form-control' width='100%' id='NGOname' name='NGOname' onchange='showCenter(this.value)'>";
								//echo "<option value="">Select</option>";
								echo "<option value=''>Select NGO</option>";
								while ($row = mysql_fetch_array($result)) {
									
									echo "<option value='" . $row['id'] . "'>" . $row['center_name'] . "</option>";
								}
								echo "</select>"; */
							?>	
							</div>				
					</div>
					<!--
						<div class="box-body">
							<div class="form-group">	
								<label for="exampleInputPassword1">Select Center</label>
								<select class="form-control" id="ddCenter" name="ddCenter">
									<option value="">Select Center</option>
									
									</select>						
							</div>
						</div>
					-->					
					<div class="box-body">
						<div class="form-group">	
							<label>Child Photo</label>
							<input type="file" id="exampleInputFile" name="child_image" required />

							<div id="thumb-output" style="width: 100px;height: 100px;"></div>			
						</div>
					</div>	
					<div class="box-body">
						<div class="form-group">	
							<label>Child Name</label>
							<input type="text" class="form-control" id="child_name" name="child_name" required />			
						</div>
					</div>	
					<div class="box-body">
						<div class="form-group">	
							<label for="exampleInputFile">Gender</label><br/>
							<label class="radio-inline" for = "male"><input type = "radio" name = "gender" id = "gender" value = "Male" checked="checked" />Male</label>
							<label class="radio-inline" for = "female"><input type = "radio" name = "gender" id = "gender" value = "Female" />Female</label>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Child Age</label>

							<input type="text" class="form-control" ID="child_age" name="child_age" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" onblur="checkAge()" maxlength="2"/>

							<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>							
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
							<label>Father's Name</label>
							<input type="text" class="form-control" ID="father_name" name="father_name" />	
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							 <label>Mother's Name</label>
							 <input type="text" class="form-control" ID="mother_name" name="mother_name"/>	
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							 <label>Child's Guardian [if other than parent]</label>
							 <input type="text" class="form-control" ID="child_gaurdian" name="child_gaurdian"/>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							 <label>Occupation of Father/Mother/Guardian</label>
							 <input type="text" class="form-control" ID="occupation" name="occupation"/>
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">							
							<label>Child has previously studied upto which standard/class?</label><br>

							<label class="radio-inline" for = "male"><input type="radio" ID="studied" name="studied" value="A" checked="checked" />A. The Child is between age group 7 to 14 yrs</label><br>

							<label class="radio-inline" for = "female"><input type="radio" ID="studied" name="studied" value="B"/>B. Child who has never been to School</label><br>

							<label class="radio-inline" for = "male"><input type="radio" ID="studied" name="studied" value="C"/>C. Child who is not attending school fro more than 45days without information to school</label><br>

							<label class="radio-inline" for = "female"><input type="radio" ID="studied" name="studied" value="D"/>D. Child who is a laggard (e.g The Child's age is 12 years but can read text of only Class II & III etc)</label><br>
						</div>						
					</div>
				</div>
		   </div>
           <div class="col-md-6">
				<div class="box box-primary">

					<div class="box-body">
						<div class="form-group">	
							<label>State</label>
							<?php
							$sql = "SELECT id,state FROM tbl_states";
							$result = mysql_query($sql);
							echo "<select class='form-control' width='100%' id='ddState' name='ddState'>";
							echo "<option value=' '>Select State</option>";
							while ($row = mysql_fetch_array($result)) {
							echo "<option value='" . $row['state'] . "'>" . $row['state'] . "</option>";
							}
							echo "</select>";
							?>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>City</label>
							<input type="text" class="form-control" ID="city" name="city" required />
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
							<label>Address - 1</label>
							<input type="text" class="form-control" ID="address_1" name="address_1" required />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
							<label>Address - 2</label>
							<input type="text" class="form-control" ID="address_2" name="address_2" required />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
						 	<label>Category</label>
						 	
							<select class='form-control' width='100%' id='category' name='category' required >
							<option value=''>-- Please Select --</option>

							<option value='SC'>SC</option>
							<option value='ST'>ST</option>
							<option value='OBC'>OBC</option>
							<option value='Minority'>Minority</option>
							<option value='General'>General</option>

							</select>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Differently Abled</label>
							
							<select class='form-control' width='100%' id='DifferentlyAbled' name='DifferentlyAbled' required >
							<option value=''>-- Please Select --</option>

							<option value='NA'>Not Applicable</option>
							<option value='Hearing Impairedness'>Hearing Impairedness</option>
							<option value='Visually Impaired'>Visually Impaired</option>
							<option value='Mobility Issue'>Mobility Issue</option>
							<option value='Others'>Others</option>

							</select>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Reading Ability</label>
							
							<select class='form-control' width='100%' id='LearningDisabilities' name='LearningDisabilities' required >
							<option value=''>-- Please Select --</option>

							<option value='Excellent'>Excellent</option>
							<option value='Good'>Good</option>
							<option value='Moderate'>Moderate</option>
							<option value='Poor'>Poor</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>Basic Calculation</label>
						 	
							<select class='form-control' width='100%' id='basic_calculation' name='basic_calculation' required >
							<option value=''>-- Please Select --</option>

							<option value='Excellent'>Excellent</option>
							<option value='Good'>Good</option>
							<option value='Moderate'>Moderate</option>
							<option value='Poor'>Poor</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>Reason for not going to school</label>
						 	
							<textarea name="reason_no_school" id="reason_no_school" class="form-control" style="height: 100px;resize: none;"></textarea>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>&nbsp;</label>
						 	<div style="height: 93px;"></div>
						</div>
					</div>
				</div>

				</div>
		   </div>
		   
           <div class="col-md-12">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">						
							<center>
								<label for="exampleInputPassword1"></label><br/>
								<button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
							</center>			
						</div>
					</div>				
				</div>
		   </div>
         </form>
		</div>
        
       </div>   <!-- /.row -->
    </section>
      </div>
    </div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  
	  <?php
	  include('include/footer.php');
	  ?>
  <!-- Sidebar Navigation End --> 
	
	
  </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-----------To stop form submit on ENTER key press------------>
<script>
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>
<!-----------To stop form submit on ENTER key press------------>

<!-----------To show image before upload------------>

<script>
$(document).ready(function(){
    $('#exampleInputFile').on('change', function(){ //on file input change
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
					 $('#submitBtn').show();
					//URL representing the file's data.
                }
				else {
					 $('#submitBtn').hide();
					alert('Invalid file type');
				}
            });
           
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
</script>
<!-----------To show image before upload------------>

</body>
</html>