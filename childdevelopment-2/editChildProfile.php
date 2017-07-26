<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
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
#thumb-output{
	width: 100px;
	height: 100px;
}

#thumb-output img{
	width: 100%;
	height: 100%;
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
	  <div>
			<h1 style="color:#ffffff; text-align:center;">Edit Child Profile</h1>
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
					$id = $_REQUEST['id'];
					
					$servername = "103.227.62.215";
					$username = "mindedgeteach2";
					$password = "SuHiNa@1979";
					$dbname = "rotary32_teach2";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					
					//$sql = "SELECT happyschoolID,district,name,club,projectYear FROM tblHappySchoolMaster where happyschoolID='".$id."'";
					$sql = "SELECT child_photo,child_name,child_gender,child_dob,child_father_name,child_mother_name,child_guardian_name,previously_study,
							street,city,block,state,category,Differently_Abled,Learning_Disabilities,create_by,create_date,status,approval,type,tagged,
							ngoid,centerid,basic_calculation,reason_no_school,occupation FROM tbl_child_profile_card_temp WHERE child_id='".$id."'";
					$result = $conn->query($sql);
					//echo $result->num_rows;
					
					if ($result->num_rows > 0) {
						
						// output data of each row    '<a href="fulltext.php?'.$row['happyschoolID'].'">'
						
						while($row = $result->fetch_assoc()) {
						extract($row);

						$address = explode(',', $row['street']);
						$address_1 = $address[0];
						$address_2 = substr($address[1], 1);
			?>
         <form action="editchildsave.php"  method="post" id="" role="form" enctype="multipart/form-data">
           <div class="col-md-6">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">					
							<label>NGO Name</label>
							<input type="text" class="form-control" id="child_id" name="child_id" style="display:none;" value="<?php echo $id; ?>" readonly />
							<input type="text" class="form-control" id="NGOname" name="NGOname" style="display:none;" value="<?php echo $row["ngoid"]; ?>" readonly />
							<input type="text" class="form-control" id="NGOnameView" name="NGOnameView" value="<?php 
								$sql1="Select center_name from tbl_admin where id='" .$ngoid. "'";
								$result1 = $conn->query($sql1);
								if ($result1->num_rows > 0) {
									while($row1 = $result1->fetch_assoc()) {
									extract($row1);
									}
								}
								echo $center_name; 
								?>" readonly />
							</div>				
					</div>
					<!--
					<div class="box-body">
						<div class="form-group">	
							<label for="exampleInputPassword1">Center Name</label>
							<input type="text" class="form-control" id="ddCenter" name="ddCenter" style="display:none;" value="<?php //echo $row["centerid"]; ?>" readonly />
							<input type="text" class="form-control" id="ddCenterView" name="ddCenterView" value="<?php 
								/*
								$sql2="Select center_name from tbl_admin where id='" .$centerid. "'";
								$result2 = $conn->query($sql2);
								if ($result2->num_rows > 0) {
									while($row2 = $result2->fetch_assoc()) {
									extract($row2);
									}
								}
								echo $center_name; */
								?>" readonly />
						</div>
					</div>
					-->
					<div class="box-body">
						<div class="form-group">	
							<label>Child Image</label>
							<input type="text" class="form-control" id="child_image" style="display:none;" name="child_image" value="<?php echo $row["child_photo"]; ?>" readonly />
							<img height="220" width="200" src="http://rotaryteach.org/child_development/upload/<?php echo $child_photo; ?>">
							
						</div>
					</div>	
					<div class="box-body">
						<div class="form-group">	
							<label>New Child Image</label>
							<input type="file" id="exampleInputFile" name="new_child_image" />

							<div id="thumb-output"></div>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Child Name</label>
							<input type="text" class="form-control" id="child_name" name="child_name" value="<?php echo $row["child_name"]; ?>" required />			
						</div>
					</div>	
					<div class="box-body">
						<div class="form-group">
							<?php
								if($child_gender=="Male")
								{
									$male="checked=checked";
								}
								else
								{
									$male="";
								}
								if($child_gender=="Female")
								{
									$female="checked=checked";
								}
								else
								{
									$female="";
								}

							?>
							<label for="exampleInputFile">Gender</label><br/>
							<label class="radio-inline" for = "male"><input type = "radio" name = "gender" id = "gender" value = "Male" <?php echo $male; ?> />Male</label>
							<label class="radio-inline" for = "female"><input type = "radio" name = "gender" id = "gender" value = "Female" <?php echo $female; ?> />Female</label>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Child Age</label>
							<input type="text" class="form-control" ID="child_age" name="child_age" onblur="checkAge()" value="<?php echo $row["child_dob"]; ?>" required >						
							<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>							
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
							<label>Father's Name</label>
							<input type="text" class="form-control" ID="father_name" name="father_name" value="<?php echo $row["child_father_name"]; ?>" >	
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							 <label>Mother's Name</label>
							 <input type="text" class="form-control" ID="mother_name" name="mother_name" value="<?php echo $row["child_mother_name"]; ?>" />	
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
							 <label>Child's Guardian [if other than parent]</label>
							 <input type="text" class="form-control" ID="child_gaurdian" name="child_gaurdian" value="<?php echo $row["child_guardian_name"]; ?>" />
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
							 <label>Occupation of Father/Mother/Guardian</label>
							 <input type="text" class="form-control" ID="occupation" name="occupation" value="<?php echo $row["occupation"]; ?>" />
						</div>
					</div>

				</div>
		   </div>
           <div class="col-md-6">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group">
							<?php
								if($previously_study=="A")
								{
									$a="checked=checked";
								}
								else
								{
									$a="";
								}
								if($previously_study=="B")
								{
									$b="checked=checked";
								}
								else
								{
									$b="";
								}
								if($previously_study=="C")
								{
									$c="checked=checked";
								}
								else
								{
									$c="";
								}
								if($previously_study=="D")
								{
									$d="checked=checked";
								}
								else
								{
									$d="";
								}

							?>
							<label>Child has previously studied upto which standard/class?</label><br>
							<label class="radio-inline" for = "male"><input type="radio" ID="studied" name="studied" value="A" <?php echo $a; ?> />A. The Child is between age group 7 to 14 yrs</label><br>
							<label class="radio-inline" for = "female"><input type="radio" ID="studied" name="studied" value="B" <?php echo $b; ?> />B. Child who has never been to School</label><br>
							<label class="radio-inline" for = "male"><input type="radio" ID="studied" name="studied" value="C" <?php echo $c; ?> />C. Child who is not attending school fro more than 45days without information to school</label><br>
							<label class="radio-inline" for = "female"><input type="radio" ID="studied" name="studied" value="D" <?php echo $d; ?> />D. Child who is a laggard (e.g The Child's age is 12 years but can read text of only Class II & III etc)</label><br>
						</div>						
					</div>
					
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputFile">State:</label>

								<select class='form-control' width='100%' id='ddState' name='ddState'>
								<option value=" ">-- Select State --</option>
								<?php
								$sql = "SELECT id,state FROM tbl_states";
								$result = mysql_query($sql);
								while ($row1 = mysql_fetch_array($result)){
								?>
									<option value=<?= $row1['state'] ?> <?php if ($row1['state']==$row['state']){echo 'selected';} ?>><?= $row1['state'] ?></option>
								<?php
								}
								?>
								</select>
							 <!--
							 <label>State</label>
							 <input type="text" class="form-control" ID="ddState" name="ddState" style="display:none;" value="<?php echo $row["state"]; ?>" readonly/>
							 <input type="text" class="form-control" ID="ddState1" name="ddState1" value="<?php 
								//$sql3="Select state from tbl_states where id='" .$state. "'";
								//$result3 = $conn->query($sql3);
								//if ($result3->num_rows > 0) {
								//	while($row3 = $result3->fetch_assoc()) {
								//	extract($row3);
								//	}
								//}
								//echo $state; 
								?>" readonly />								
								-->
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
							 <label>City</label>
							<input type="text" class="form-control" ID="city" name="city" value="<?php echo $row["city"]; ?>" />
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
							<label>Address - 1</label>
							<input type="text" class="form-control" ID="address_1" name="address_1" value="<?= $address_1 ?>" required />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
							<label>Address - 2</label>
							<input type="text" class="form-control" ID="address_2" name="address_2" value="<?= $address_2 ?>" required />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
						 	<label>Category</label>
						 	
							<select class='form-control' width='100%' id='category' name='category' required >
							<option value=''>-- Please Select --</option>

							<option value='SC' <?php if ($row['category']=='SC'){echo 'selected';} ?>>SC</option>
							<option value='ST' <?php if ($row['category']=='ST'){echo 'selected';} ?>>ST</option>
							<option value='OBC' <?php if ($row['category']=='OBC'){echo 'selected';} ?>>OBC</option>
							<option value='Minority' <?php if ($row['category']=='Minority'){echo 'selected';} ?>>Minority</option>
							<option value='General' <?php if ($row['category']=='General'){echo 'selected';} ?>>General</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
							<label>Differently Abled</label>
							
							<select class='form-control' width='100%' id='DifferentlyAbled' name='DifferentlyAbled' required >
							<option value=''>-- Please Select --</option>

							<option value='NA' <?php if ($row['Differently_Abled']=='NA'){echo 'selected';} ?>>Not Applicable</option>
							<option value='Hearing Impairedness' <?php if ($row['Differently_Abled']=='Hearing Impairedness'){echo 'selected';} ?>>Hearing Impairedness</option>
							<option value='Visually Impaired' <?php if ($row['Differently_Abled']=='Visually Impaired'){echo 'selected';} ?>>Visually Impaired</option>
							<option value='Mobility Issue' <?php if ($row['Differently_Abled']=='Mobility Issue'){echo 'selected';} ?>>Mobility Issue</option>
							<option value='Others' <?php if ($row['Differently_Abled']=='Others'){echo 'selected';} ?>>Others</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
							<label>Reading Ability</label>
							
							<select class='form-control' width='100%' id='LearningDisabilities' name='LearningDisabilities' required >
							<option value=''>-- Please Select --</option>

							<option value='Excellent' <?php if ($row['Learning_Disabilities']=='Excellent'){echo 'selected';} ?>>Excellent</option>
							<option value='Good' <?php if ($row['Learning_Disabilities']=='Good'){echo 'selected';} ?>>Good</option>
							<option value='Moderate' <?php if ($row['Learning_Disabilities']=='Moderate'){echo 'selected';} ?>>Moderate</option>
							<option value='Poor' <?php if ($row['Learning_Disabilities']=='Poor'){echo 'selected';} ?>>Poor</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>Basic Calculation</label>
						 	
							<select class='form-control' width='100%' id='basic_calculation' name='basic_calculation' required >
							<option value=''>-- Please Select --</option>

							<option value='Excellent' <?php if ($row['Learning_Disabilities']=='Excellent'){echo 'selected';} ?>>Excellent</option>
							<option value='Good' <?php if ($row['Learning_Disabilities']=='Good'){echo 'selected';} ?>>Good</option>
							<option value='Moderate' <?php if ($row['Learning_Disabilities']=='Moderate'){echo 'selected';} ?>>Moderate</option>
							<option value='Poor' <?php if ($row['Learning_Disabilities']=='Poor'){echo 'selected';} ?>>Poor</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>Reason for not going to school</label>
						 	
							<textarea name="reason_no_school" id="reason_no_school" class="form-control" style="height: 100px;resize: none;"><?= $row['reason_no_school'] ?></textarea>
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
		 <?php
			}
					} else {
						echo "No Record Found";
					}
					//$conn->close();
					
			?>
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

</body>
</html>