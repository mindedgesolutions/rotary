<?php
session_start();
ob_start();
include('include/config.php');
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

<style>
.footer{
	position: absolute;
	bottom: 0;
	width:100%;
	height:50px;
	background-color:#32343b;
}
.tbl a:hover{
	text-decoration: underline;
}
#load_screen{
	background: #000;
	opacity: 0.8;
	position: fixed;
	z-index: 999;
	top: 0;
	left: 0;
	width: 100%;
	height: 2000px;
}
#loading{
	color: #0098f7;
	width: 80%;
	height: 30px;
	margin: 300px 10%;
	font-size: 120%;
	text-align: center;
}
</style>

<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.searchabledropdown-1.0.8.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#txtMemberFirstName").searchable();
});
</script>

<script type="text/javascript">
window.addEventListener('load', function(){
	var load_screen = document.getElementById('load_screen');
	document.body.removeChild(load_screen);
})
function minChar(par){
	if (par!='' && par.length < 3){

		alert("Please enter at least 3 characters");
		document.getElementById('donor_details').value = '';
		return false;
	}
}
function validateForm(){
	var donor_details = $('#donor_details').val();

	if (donor_details==''){
		alert("Please enter donor's name or club");
		return false;
	}
}
</script>
</head>

<body>

<div id="load_screen"><div id="loading">It may take a while to load the page as it consists of data of thousands of children. Thank you for your patience</div></div>

<div class="wrapper">
	<header> 
		
		<div class="logo"> <a href="#"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a></div>

		<div class="text-holder" style="width: 40%;margin: 20px 0 0 20%;float: left;">
		<h3 style="color:#ffffff; text-align:center;">Welcome Asha Kiran Donors!</h3>
		<h6 style="color:#ffffff; text-align:center;">
			<i>Step 1: Search for Your Record </br>
			Step 2: Login to see the performance of the child you sponsored.</i>
		</h6>
		</div>
	  
	  <div class="clearfix"></div>
	  <!-- Sidebar Navigation End --> 
	</header>


<div class="structure-row alone"> 
    <!-- Right Section Start -->
    <div class="right-sec"> 
<br/>
<section class="content" style="padding-left:20px; padding-right:20px;">
	<!-- Small boxes (Stat box) -->
	
	<div class="box-body">
	<fieldset>
		<legend>Donor Data Search</legend>


	<form action="" method="post" onsubmit="return validateForm()">

	<div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				<label>Search by Donor Name / Donor Club</label>
				<input type="text" class="form-control" name="donor_details" id="donor_details" value="<?php if ($_REQUEST['donor_details']!=''){echo $_REQUEST['donor_details'];}else{echo '';} ?>" onblur='minChar(this.value)' />
			</div>

			<div class="col-sm-6">
				<label>&nbsp;</label>
				<div class="box-footer" style="text-align : left;">
					<input type="submit" name="submitBtn" class="btn btn-primary" value="Search" style="width: 80px;" />

					<a href="donor-child-list.php"><input type="button" name="resetBtn" class="btn btn-primary" value="Reset" style="width: 80px;margin: 0 0 0 15px;" /></a>
				</div>
			</div>
        </div>

        <div class="row"><div class="col-sm-12"></div></div>

    </div>

    </form>
          
		<div class="box-footer clearfix">
			Donated for Asha Kiran but your name is not in tagged list?<a href='http://rotaryteach.org/donor/not_in_tagged_list.php'><font style="color:#357ebd;"><b><u><i>CLICK HERE.</i></u></b></font></a><br/><br/>
		</div>


		<table border="0" cellspacing="0" cellpadding="0" width="100%" class="tbl">
			<thead>
				<td width="25%"><p style="font-size: 15px;text-align: center;"><b>Donor Name</b></p></td>
				<td width="30%"><p style="font-size: 15px;text-align: center;"><b>Donor Club</b></p></td>
				<td width="20%"><p style="font-size: 15px;text-align: center;"><b>No. of Children</b></p></td>
				<td width="15%"><p style="font-size: 15px;text-align: center;"><b>View Child Details</b></p></td>
			</thead>

			<?php
			if (isset($_REQUEST['submitBtn'])){

				if ($_REQUEST['donor_details']!=''){

					$query_donorId = mysql_query("select donar_id, first_name, last_name, donar_club from tbl_donar_master where first_name like '%".$_REQUEST['donor_details']."%' or last_name like '%".$_REQUEST['donor_details']."%' or donar_club like '%".$_REQUEST['donor_details']."%'");

					while ($donorId = mysql_fetch_array($query_donorId)){
						
						$getCount = mysql_fetch_array(mysql_query("select count(child_id) as count from tbl_child_selected_tagging where donar_id='".$donorId['donar_id']."'"));
					?>
					<tr class="tdl">
						<td><p style="color:#0d9429; min-width : 2%;text-align: center;"><?= $donorId['first_name'].' '.$donorId['last_name'] ?></p></td>
						<td><p style="color:#0d9429;text-align: center;"><?php echo $donorId['donar_club']; ?></p></td>
				        <td><p style="color:#0d9429; overflow-wrap: break-word;text-align: center;"><?= $getCount['count'] ?></p></td>
						<td>
							<p style="color:#0d9429;text-align: center;">
							<a href="http://rotaryteach.org/child_development/other/login.php?id=<?= $donorId['donar_id'] ?>" style="color: #1760cc;font-weight: 600; word-spacing: 3px;" target="_blank">View Details</a>
							</p>
						</td>
					</tr>

					<?php
					}
				}
			}else{

				$query_getDet = mysql_query("select donar_id, first_name, last_name, donar_club from tbl_donar_master order by first_name asc");
				while ($getDet = mysql_fetch_array($query_getDet)){

					$getCount = mysql_fetch_array(mysql_query("select count(child_id) as count from tbl_child_selected_tagging where donar_id='".$getDet['donar_id']."'"));
				?>
				<tr class="tdl">
					<td><p style="color:#0d9429; min-width : 2%;text-align: center;"><?= $getDet['first_name'].' '.$getDet['last_name'] ?></p></td>
					<td><p style="color:#0d9429;text-align: center;"><?php echo $getDet['donar_club']; ?></p></td>
			        <td><p style="color:#0d9429; overflow-wrap: break-word;text-align: center;"><?= $getCount['count'] ?></p></td>
					<td>
						<p style="color:#0d9429;text-align: center;">
						<a href="http://rotaryteach.org/child_development/other/login.php?id=<?= $getDet['donar_id'] ?>" style="color: #1760cc;font-weight: 600; word-spacing: 3px;" target="_blank">View Details</a>
						</p>
					</td>
				</tr>
				<?php
				}
			}
			?>

		</table>

		</div>
	</div>

	</form>
</section>
	 
   
	  

	</div>

	<br/>
	<br/>
	<div class="footer clearfix">
		<?php include('include/footer.php'); ?>
	</div>
	



  <!-- Logo Start -->
  
  <!-- Sidebar Navigation End --> 
	
	
 

</body>
</html>