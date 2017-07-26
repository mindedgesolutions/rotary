<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];

$getDet = mysql_fetch_array(mysql_query("select * from tbl_admin where id='".$_REQUEST['id']."'"));
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
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

<script type="text/javascript">
function checkPass(){
	var txtPassword = $('#txtPassword').val();

	if (txtPassword!=''){

		$.ajax({
			url: 'check-password.php',
			type: 'post',
			data: 'txtPassword=' + txtPassword,
			success: function(f){

				if (f==1){

					alert('This Password Has Already In Use. Please Select a Different Password');
					document.getElementById('txtPassword').value = '';
				}
			}
		})
	}
}
</script>
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
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:60px;
		 background-color:#32343b;
		}
.headercol
	{
		background-color : #b8d1f3;
	}
	.altcol
	{
		background-color : #dae5f4;
	}		
	.pad
	{
		padding-left:5px;
	}
</style>	
<script type="text/javascript">
function showDiv(select){
   if(select.value=="NGO"){
    document.getElementById('lblNGO').style.display = "none";
	document.getElementById('center_name').style.display = "none";
	document.getElementById('lblCenter').style.display = "none";
	document.getElementById('lblNGO1').style.display = "block";
   } else if(select.value=="center"){
	document.getElementById('lblNGO').style.display = "block";
	document.getElementById('center_name').style.display = "block";
	document.getElementById('lblCenter').style.display = "block";
	document.getElementById('lblNGO1').style.display = "none";
   }
} 

function checkEmail(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
	{
		alert("Please enter a valid email address");
         document.getElementById(txtEmail).focus();
    }
}
</script>
</head>

<body>
<div class="wrapper">
	<header>
	  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
	  <?php include('include/mainnav.php'); ?>
	  <div class="clearfix"></div>
	</header>
	<div class="structure-row alone"> 
		<div class="right-sec"> 
			<header> 
			  <?php include('include/child_header.php'); ?>
				<div>
					<h1 style="color:#ffffff; text-align:center;">Edit Center Details</h1>
					<font color="#F4F3F3" style="float:right;">Master -> Edit Center Details</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
			<div class="container">
			<?php
			/*
			$db_hostname = '103.227.62.215';
			$db_username = 'rotary32_teach2';
			$db_password = 'Rotary@2016';
			$db_database = 'rotary32_teach2';

			// Database Connection String
			$con = mysql_connect($db_hostname,$db_username,$db_password);
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }

			mysql_select_db($db_database, $con);
			*/
			?>


			<!---------------Edit query to update data starts---------------->

			<?php
			if (isset($_REQUEST['submitBtn'])){

				$username = $_REQUEST['txtFirstName'].' '.$_REQUEST['txtLastName'];

				$updateQry = "update tbl_admin set username='".$username."', password='".$_REQUEST['txtPassword']."', firstname='".$_REQUEST['txtFirstName']."', lastname='".$_REQUEST['txtLastName']."', email='".$_REQUEST['txtEmail']."', center_name='".$_REQUEST['txtCenterName']."', state='".$_REQUEST['ddState']."', block='".$_REQUEST['txtBlock']."' where id='".$_REQUEST['id']."'";

				$result = mysql_query($updateQry);
			?>
			<script>
				alert('Data Have Been Updated');
				window.location = 'addEdit_new_center.php';
			</script>
			<?php
			}
			?>

			<!---------------Edit query to update data ends---------------->


				<form name="frm" id="frm" action="" method="post" enctype="multipart/form-data" autocomplete="off"> 
					<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:10px; padding : 5px;"><b>Edit Center Details</b></div>
					<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
							<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
								<div class="form-group" style="padding-bottom:75px;">
										<div class="col-sm-12">
											<b>Type:</b><select class="form-control" id="selType" name="selType" readonly>
													<option value="NGO">Center</option>
												</select>
										</div>
										<!--
										<div id="divNGO" name="divNGO" class="col-sm-12">
											<label id="lblNGO" name="lblNGO" for="exampleInputFile">Select Name of the NGO:</label>
											<?php
												/*
												$sql = "SELECT id,center_name FROM tbl_admin WHERE type='NGO'";
												$result = mysql_query($sql);
												echo "<select class='form-control' width='100%' id='center_name' name='center_name'>";
												while ($row = mysql_fetch_array($result)) {
													echo "<option value='" . $row['id'] . "'>" . $row['center_name'] . "</option>";
												}
												echo "</select>";
												*/
											?>
										</div>
										-->
										
										<div id="divNGO" name="divNGO" class="col-sm-12">
											<!-- <label id="lblCenter" name="lblCenter" for="exampleInputFile" >Name of the Center:</label> -->
											<label id="lblNGO1" name="lblNGO1" for="exampleInputFile" >Name of the Center:</label>

											<input type="text" class="form-control" id="txtCenterName" name="txtCenterName" required value="<?= $getDet['center_name'] ?>" />


											<input type="text" class="form-control" id="ngoid" name="ngoid" readonly style="display:none;" value="<?php echo $_SESSION['uid']; ?>">
										</div>

										<div id="divCenter" name="divCenter" class="col-sm-12">
											<label for="exampleInputFile">Contact Person First Name:</label>

											<input type="text" class="form-control" id="txtFirstName" name="txtFirstName" required value="<?= $getDet['firstname'] ?>" />
										</div>

										<div class="col-sm-12">
											<label for="exampleInputFile">Contact Person Last Name:</label>
											<input type="text" class="form-control" id="txtLastName" name="txtLastName" value="<?= $getDet['lastname'] ?>" />
										</div>
										<div class="col-sm-12">
											<label for="exampleInputFile">Contact Person Email (This will be the User ID):</label>

											<input type="text" class="form-control" id="txtEmail" name="txtEmail" required onblur="checkEmail(this.value)" value="<?= $getDet['email'] ?>" />
										</div>
										<div class="col-sm-12">
											<label for="exampleInputFile">Password:</label>

											<input type="password" class="form-control" id="txtPassword" name="txtPassword" required value="<?= $getDet['password'] ?>" onblur="checkPass()" />
										</div>
										
										<div class="col-sm-12">
											<label for="exampleInputFile">State:</label>

											<select class='form-control' width='100%' id='ddState' name='ddState'>
													<option value=" ">-- Select State --</option>
											<?php
											$sql = "SELECT id,state FROM tbl_states";
											$result = mysql_query($sql);
											while ($row = mysql_fetch_array($result)){
											?>
												<option value=<?= $row['id'] ?> <?php if ($row['id']==$getDet['state']){echo 'selected';} ?>><?= $row['state'] ?></option>
											<?php
											}
											?>
											</select>
										</div>
										<div class="col-sm-12">
											<label for="exampleInputFile">Block:</label>
											<input type="text" class="form-control" id="txtBlock" name="txtBlock" value="<?= $getDet['block'] ?>" />
										</div>
										<div class="col-sm-12">
											<input type="submit" name="submitBtn" class="btn" style="color: #ffffff; background-color: #003c6a;" value="SUBMIT">

											<a href="addEdit_new_center.php"><input type="button" name="backBtn" class="btn" style="color: #ffffff; background-color: #003c6a;margin-left: 15px;" value="BACK"></a>
										</div>
										<div class="col-sm-12">
											<br/>
										</div>
								</div>
								
							</div>
						
						<div class="col-sm-2"></div>
					
					</div>
					
				</form>
				<br/>	
				<br/>
				<br/>
						
			</div>
			<!--Record Searching End-->
			<br/>
		</div>
		
	</div>
	<br/>

	<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
</div>



	

</body>
</html>
