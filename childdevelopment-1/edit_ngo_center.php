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
    if(re.test(str))
	{
		validateEmail();
    }else{

    	alert("Please enter a valid email address");
     	document.getElementById('txtEmail').value = '';
    }
}

function validateEmail(){

	var txtEmail = $('#txtEmail').val();

	if (txtEmail!=''){

		$.ajax({
			url: 'check-email-ngo.php',
			type: 'post',
			data: 'txtEmail=' + txtEmail,
			success: function(f){

				if (f==1){

					alert('This email address exists');
					document.getElementById('txtEmail').value = '';
				}
			}
		})
	}
}
</script>
</head>

<body>
<div class="wrapper">
	<header>
	  <div class="logo"> <a href="edit-child-tagging-dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
	  <?php include('include/mainnav.php'); ?>
	  <div class="clearfix"></div>
	</header>
	<div class="structure-row alone"> 
		<div class="right-sec"> 
			<header> 
			  <?php include('include/child_header.php'); ?>
				<div>
					<h1 style="color:#ffffff; text-align:center;">Edit NGO Details</h1>
					<font color="#F4F3F3" style="float:right;">Master -> NGO/Center -> Edit NGO Details</font>
				</div>
			  <div class="clearfix"></div>
			</header>
			<!--Record Searching Start--> 
			<div class="container">
			<?php

					date_default_timezone_set("Asia/Kolkata");
					
					//monname
					//$lastday=31;
					
					//$sql = "SELECT happyschoolID,district,name,club,projectYear FROM tblHappySchoolMaster where happyschoolID='".$id."'";
					//$sql = "SELECT a.id as id,a.password as password,a.firstname as firstname,a.lastname as lastname,a.email as email,a.type as type,
					//a.center_name as center_name,a.idfk as idfk, a.state as state,a.block as block, b.state as statename
					//		from tbl_admin a, tbl_states b where a.state=b.id and a.id='".$id."'";
					
					//Current code//

					/*$sql = "SELECT a.id as id,a.password as password,a.firstname as firstname,a.lastname as lastname,a.email as email,a.type as type,
								a.center_name as center_name,a.idfk as idfk, 
								(select center_name from tbl_admin where id=(select idfk from tbl_admin where id='".$id."')) as ngoname, 
								a.state as state,a.block as block, b.state as statename
								from tbl_admin a, tbl_states b where a.state=b.id and a.id='".$id."'";
							
					$result = $conn->query($sql);*/

					//Current code//

					$sql = "select * from tbl_admin where id='".$_REQUEST['id']."'";

					$result = mysql_query($sql);
					
					$row = mysql_fetch_array($result);
							
			?>
				<form name="frm" id="frm" action="ngocenteredit.php" method="post" enctype="multipart/form-data" >
					<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:10px; padding : 5px;"><b>Edit NGO Details</b></div>
					<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
							<div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
								<div class="form-group" style="padding-bottom:75px;">
										<div class="col-sm-12">
											<b>Type:</b>
											<input type="text" class="form-control" id="selType" readonly name="selType" value="<?php echo $row["type"]; ?>"  />
												<!--
												<select class="form-control" id="selType" readonly name="selType" onchange="showDiv(this)">
													<option value="center" <?php if($row["type"]=='center'){ echo "selected";} ?>>Center</option>
													<option value="NGO" <?php if($row["type"]=='NGO'){ echo "selected";} ?>>NGO</option>
												</select> -->
												<input type="text" class="form-control" id="pkid" style="display:none;" readonly name="pkid" value="<?php echo $row["id"]; ?>"  />
										</div>
										<style>
											#divNGO{
													<?php
													  if($row["type"]=='NGO'){
														  echo 'display:none';
													  }
													?>
												  }
											#lblCenter{
													<?php
													  if($row["type"]=='NGO'){
														  echo 'display:none';
													  }
													?>
												  }
											#lblNGO1{
													<?php
													  if($row["type"]=='center'){
														  echo 'display:none';
													  }
													?>
												  }
										</style>
										<div id="divNGO" name="divNGO" class="col-sm-12">
											<label id="lblNGO" name="lblNGO" for="exampleInputFile" >Name of the NGO:</label>
											<input type="text" class="form-control" id="txtNGO" readonly name='txtNGO' value="<?php echo $row["ngoname"]; ?>" />
										</div>
										<div id="divCenter" name="divCenter" class="col-sm-12">
											<label id="lblCenter" name="lblCenter" for="exampleInputFile" >Name of the Center:</label>
											<label id="lblNGO1" name="lblNGO1" for="exampleInputFile" >Name of the NGO:</label>
											<input type="text" class="form-control" id="txtCenterName" name="txtCenterName" required value="<?php echo $row["center_name"]; ?>" />
										</div>
										<div id="divPerson" name="divPerson" class="col-sm-12">
											<label for="exampleInputFile">Contact Person First Name:</label>
											<input type="text" class="form-control" id="txtFirstName" name="txtFirstName" required value="<?php echo $row["firstname"]; ?>" readonly />
										</div>
										<div class="col-sm-12">
											<label for="exampleInputFile">Contact Person Last Name:</label>
											<input type="text" class="form-control" id="txtLastName" name="txtLastName" value="<?php echo $row["lastname"]; ?>" readonly />
										</div>
										<div class="col-sm-12">
											<label for="exampleInputFile">Contact Person Email (This will be the User ID):</label>
											<input type="text" class="form-control" id="txtEmail" name="txtEmail" required onblur="checkEmail(this.value)" value="<?php echo $row["email"]; ?>"/>
										</div>
										<div class="col-sm-12" style="display:none;">
											<label for="exampleInputFile">Password:</label>
											<input type="password" class="form-control" id="txtPassword" name="txtPassword" required value="<?php echo $row["password"]; ?>"/>
										</div>
										
										<div class="col-sm-12">
											<label for="exampleInputFile">State:</label>
											
											<select class='form-control' width='100%' id='ddState' name='ddState'>
											<?php
												$sqlState = "SELECT * FROM tbl_states";
												$resultState = mysql_query($sqlState);
												while ($state = mysql_fetch_array($resultState)) {
											?>
												<option value='<?= $state['id'] ?>' <?php if ($state['id']==$row['state']){echo 'selected';} ?>><?= $state['state'] ?></option>;
											<?php	
											}
											?>
											</select>

											<input type="text" class="form-control" id="txtidfk" name="txtidfk" readonly style="display:none;" value="<?php echo $row["idfk"]; ?>"/>

											
										</div>
										<div class="col-sm-12">
											<label for="exampleInputFile">Block:</label>
											<input type="text" class="form-control" id="txtBlock" name="txtBlock" value="<?php echo $row["block"]; ?>" />
										</div>


										<div class="col-sm-12">
											<label for="exampleInputFile">Type of Examination:</label>
											
											<select class="form-control" id="examType" name="examType" required>
													<option value="">-- Please Select --</option>

													<option value="Monthly" <?php if ($row['examtype']=='Monthly'){echo 'selected';} ?>>Monthly</option>
													<option value="Quarterly" <?php if ($row['examtype']=='Quarterly'){echo 'selected';} ?>>Quarterly</option>
												</select>

											<input type="text" class="form-control" id="txtidfk" name="txtidfk" readonly style="display:none;" value="<?php echo $row["idfk"]; ?>"/>

											
										</div>


										<div class="col-sm-12">
											<button type="submit" class="btn" style="color: #ffffff; background-color: #003c6a;">Submit</button>
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
