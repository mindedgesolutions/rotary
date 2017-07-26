<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$ngoname=$_SESSION['ngo_name'];
$_SESSION['type'];

$getDet = mysql_fetch_array(mysql_query("select * from tbl_child_profile_card where child_id='".$_REQUEST['id']."'"));

$getNgo = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$getDet['create_by']."'"));

$address = explode(',', $getDet['street']);
$address_1 = $address[0];
$address_2 = $address[1];
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
           <div class="col-md-6">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">					
							<label>NGO</label>
							<input type="text" class="form-control" id="txtngo" name="txtngo" value="<?php echo $getNgo['center_name'] ?>" readonly="readonly" />
							</div>				
					</div>		
					<div class="box-body">
						<div class="form-group">	
							<label>Child Photo</label>
							<div id="thumb-output" style="width: 100px;height: 100px;">
								<img src="http://rotaryteach.org/child_development/upload/<?= $getDet['child_photo'] ?>">
							</div>
						</div>
					</div>	
					<div class="box-body">
						<div class="form-group">	
							<label>Child Name</label>
							<input type="text" class="form-control" id="child_name" name="child_name" value="<?= $getDet['child_name'] ?>" readonly="readonly" />			
						</div>
					</div>	
					<div class="box-body">
						<div class="form-group">	
							<label for="exampleInputFile">Gender</label><br/>
							<label class="radio-inline" for = "male"><input type = "radio" name = "gender" id = "gender" value = "Male" <?php if ($getDet['child_gender']=='Male'){echo 'checked';} ?> disabled />Male</label>

							<label class="radio-inline" for = "female"><input type = "radio" name = "gender" id = "gender" value = "Female" <?php if ($getDet['child_gender']=='Female'){echo 'checked';} ?> disabled />Female</label>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Child Age</label>

							<input type="text" class="form-control" ID="child_age" name="child_age" value="<?= $getDet['child_dob'] ?>" readonly="readonly" />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
							<label>Father's Name</label>
							<input type="text" class="form-control" ID="father_name" name="father_name" value="<?= $getDet['child_father_name'] ?>" readonly="readonly" />	
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							 <label>Mother's Name</label>
							 <input type="text" class="form-control" ID="mother_name" name="mother_name" value="<?= $getDet['child_mother_name'] ?>" readonly="readonly" />	
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							 <label>Child's Guardian [if other than parent]</label>
							 <input type="text" class="form-control" ID="child_gaurdian" name="child_gaurdian" value="<?= $getDet['child_guardian_name'] ?>" readonly="readonly" />
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							 <label>Occupation of Father/Mother/Guardian</label>
							 <input type="text" class="form-control" ID="occupation" name="occupation" value="<?= $getDet['occupation'] ?>" readonly="readonly" />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">							
							<label>Child has previously studied upto which standard/class?</label><br>

							<label class="radio-inline" for = "male"><input type="radio" ID="studied" name="studied" value="A" <?php if ($getDet['previously_study']=='A'){echo 'checked';} ?> disabled />A. The Child is between age group 7 to 14 yrs</label><br>

							<label class="radio-inline" for = "female"><input type="radio" ID="studied" name="studied" value="B" <?php if ($getDet['previously_study']=='B'){echo 'checked';} ?> disabled />B. Child who has never been to School</label><br>

							<label class="radio-inline" for = "male"><input type="radio" ID="studied" name="studied" value="C" <?php if ($getDet['previously_study']=='C'){echo 'checked';} ?> disabled />C. Child who is not attending school fro more than 45days without information to school</label><br>

							<label class="radio-inline" for = "female"><input type="radio" ID="studied" name="studied" value="D" <?php if ($getDet['previously_study']=='D'){echo 'checked';} ?> disabled />D. Child who is a laggard (e.g The Child's age is 12 years but can read text of only Class II & III etc)</label><br>
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
							?>
							<select class='form-control' width='100%' id='ddState' name='ddState' disabled="disabled">
							<option value=''>Select State</option>
							<?php while ($row = mysql_fetch_array($result)) { ?>
							<option value='<?= $row['state'] ?>' <?php if ($getDet['state']==$row['state']){echo 'selected';} ?>><?= $row['state'] ?></option>
							<?php } ?>
							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>City</label>
							<input type="text" class="form-control" ID="city" name="city" value="<?= $getDet['city'] ?>" readonly="readonly" />
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">
							<label>Address - 1</label>
							<input type="text" class="form-control" ID="address_1" name="address_1" value="<?= $address_1 ?>" readonly="readonly" />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
							<label>Address - 2</label>
							<input type="text" class="form-control" ID="address_2" name="address_2" value="<?= $address_2 ?>" readonly="readonly" />
						</div>
					</div>
					
					<div class="box-body">
						<div class="form-group">	
						 	<label>Category</label>
						 	
							<select class='form-control' width='100%' id='category' name='category' disabled="disabled" >
							<option value=''>-- Please Select --</option>

							<option value='SC' <?php if ($getDet['category']=='SC'){echo 'selected';} ?>>SC</option>
							<option value='ST' <?php if ($getDet['category']=='ST'){echo 'selected';} ?>>ST</option>
							<option value='OBC' <?php if ($getDet['category']=='OBC'){echo 'selected';} ?>>OBC</option>
							<option value='Minority' <?php if ($getDet['category']=='Minority'){echo 'selected';} ?>>Minority</option>
							<option value='General' <?php if ($getDet['category']=='General'){echo 'selected';} ?>>General</option>

							</select>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Differently Abled</label>
							
							<select class='form-control' width='100%' id='DifferentlyAbled' name='DifferentlyAbled' disabled="disabled" >
							<option value=''>-- Please Select --</option>

							<option value='NA' <?php if ($getDet['Differently_Abled']=='NA'){echo 'selected';} ?>>Not Applicable</option>
							<option value='Hearing Impairedness' <?php if ($getDet['Differently_Abled']=='Hearing Impairedness'){echo 'selected';} ?>>Hearing Impairedness</option>
							<option value='Visually Impaired' <?php if ($getDet['Differently_Abled']=='Visually Impaired'){echo 'selected';} ?>>Visually Impaired</option>
							<option value='Mobility Issue' <?php if ($getDet['Differently_Abled']=='Mobility Issue'){echo 'selected';} ?>>Mobility Issue</option>
							<option value='Others' <?php if ($getDet['Differently_Abled']=='Others'){echo 'selected';} ?>>Others</option>

							</select>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">	
							<label>Reading Ability</label>
							
							<select class='form-control' width='100%' id='LearningDisabilities' name='LearningDisabilities' disabled="disabled" >
							<option value=''>-- Please Select --</option>

							<option value='Excellent' <?php if ($getDet['LearningDisabilities']=='Excellent'){echo 'selected';} ?>>Excellent</option>
							<option value='Good' <?php if ($getDet['LearningDisabilities']=='Good'){echo 'selected';} ?>>Good</option>
							<option value='Moderate' <?php if ($getDet['LearningDisabilities']=='Moderate'){echo 'selected';} ?>>Moderate</option>
							<option value='Poor' <?php if ($getDet['LearningDisabilities']=='Poor'){echo 'selected';} ?>>Poor</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>Basic Calculation</label>
						 	
							<select class='form-control' width='100%' id='basic_calculation' name='basic_calculation' disabled="disabled" >
							<option value=''>-- Please Select --</option>

							<option value='Excellent' <?php if ($getDet['basic_calculation']=='Excellent'){echo 'selected';} ?>>Excellent</option>
							<option value='Good' <?php if ($getDet['basic_calculation']=='Good'){echo 'selected';} ?>>Good</option>
							<option value='Moderate' <?php if ($getDet['basic_calculation']=='Moderate'){echo 'selected';} ?>>Moderate</option>
							<option value='Poor' <?php if ($getDet['basic_calculation']=='Poor'){echo 'selected';} ?>>Poor</option>

							</select>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">	
						 	<label>Reason for not going to school</label>
						 	
							<textarea name="reason_no_school" id="reason_no_school" class="form-control" style="height: 100px;resize: none;" readonly="readonly"><?= $reason_no_school ?></textarea>
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
								
						</div>
					</div>				
				</div>
		   </div>

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

</body>
</html>