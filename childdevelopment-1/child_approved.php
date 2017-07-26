<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid_enc'] = $_REQUEST['uid'];
$_SESSION['ngo_enc'] = $_REQUEST['ngo'];
$i=1;
$ngoName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".base64_decode($_REQUEST['uid'])."'"));
$examType = mysql_fetch_array(mysql_query("select examtype from tbl_admin where username='".base64_decode($_REQUEST['uid'])."'"));
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

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>

<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.searchabledropdown-1.0.8.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#childId").searchable();
});
function jumpToPage(){
	var uid = $('#uId').val();
	var ngoName = $('#ngoName').val();
    var lastPage = $('#lastPage').val();
    var jumpTo = $('#jumpTo').val();
    var pathname = window.location.pathname;
	//var pathname = window.location.href;
	//var ddngo = $('#selNgo').val();
    
    if (Number(jumpTo) > Number(lastPage)){
        window.location.href = pathname + '?uid=' + uid + '&ngo=' + ngoName + '&pn=' + lastPage;
    }else{
        window.location.href = pathname + '?uid=' + uid + '&ngo=' + ngoName + '&pn=' + jumpTo;
    }
}
</script>

<style>
.footer {
	position: absolute;
	bottom: 0;
	width:100%;
	height:60px;
	background-color:#32343b;
}
.headercol{
	background-color: #dae5f4;
}
.headercol:nth-of-type(odd){
	background-color: #b8d1f3;
}
.pad{
	padding-left:5px;
}
#childId{
	height: 20px;
}
</style>	
</head>

<body>
<input type="hidden" name="ngoName" id="ngoName" value=<?= $_REQUEST['ngo']?> >
<input type="hidden" name="uId" id="uId" value=<?= $_REQUEST['uid']?> >


<?php include 'pagination_child_approved.php'; ?>
<div class="wrapper">
	<header>
	  <div class="logo"> <a href="edit-child-tagging-dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
	  <?php include('include/mainnav.php'); ?>
	  <div class="clearfix"></div>
	</header>
	<div class="structure-row alone"> 
		<div class="right-sec"> 
			<header> 
			  <?php include('include/child_header.php'); 
				$ngoName['center_name'] = base64_decode($_SESSION['click_ngo']);
				?>
				<div>
					<h1 style="color:#ffffff; text-align:center;">Approved Child List of NGO : <?php echo $ngoName['center_name']; ?></h1>
					<font color="#F4F3F3" style="float:right;">Master -> Child Approve</font>
				</div>
			  <div class="clearfix"></div>
			</header>
		</div>
	</div>

	<br/>
	
	<div class="container">
								
		<form action="" method="post"> 
			<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:10px; padding : 5px;">Search</div>
				
					
			<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
				<div class="form-group" >
					<br/>									
					<select class="form-control" id="childId" name="childId" >
					<option value="">-- Select Child --</option>
					<?php		
					$sql="select child_id, child_name from tbl_child_profile_card where create_by='".base64_decode($_REQUEST['uid'])."' group by child_name order by child_name;";

					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?= $row['child_name'] ?>" <?php if ($row['child_name']==$_REQUEST['childId']){echo 'selected';} ?>><?= $row['child_name'] ?></option>
					<?php
					}
					?>
					</select>
				</div>
			</div>
			<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;">
				<div class="form-group" >
				<br/>									
					<input class="btn btn-primary" type="submit" name="searchBtn" value="Search" />

					<a href="child_approved.php?uid=<?= $_SESSION['uid_enc'] ?>&ngo=<?= $_SESSION['ngo_enc'] ?>"><input class="btn btn-primary" type="button" name="resetBtn" value="Reset" style="margin-left: 15px;" /></a>
				</div>
			</div>
		</form>
		<br/>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="padding-bottom: 100px;">
		
			<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>

				<thead>
					<tr>
					  
				  		<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Image</th>
						<th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
						<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Gender</th>
						<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>DOB/Age</th>
						<th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Father Name</th>
						<th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Mother Name</th>
						<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>View Profile</th>
						<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>View Marks</th>
					  
					</tr>
				</thead>

				<?php
				$i = 1;

				$checkRow = mysql_num_rows(mysql_query("select * from tbl_child_profile_card where create_by='".base64_decode($_REQUEST['uid'])."'"));

				if ($checkRow > 0){

					if (isset($_REQUEST['searchBtn'])){

						if ($_REQUEST['childId']!=''){

							$query_getDet = "select * from tbl_child_profile_card where create_by='".base64_decode($_REQUEST['uid'])."' and child_name='".$_REQUEST['childId']."'";

							$result_getDet = mysql_query($query_getDet);
						}

					}else{

						$query_getDet = "select * from tbl_child_profile_card where create_by='".base64_decode($_REQUEST['uid'])."' $limit";
						$result_getDet = mysql_query($query_getDet);
					}

					while ($getDet = mysql_fetch_array($result_getDet)){
				?>

				<tr class='headercol'>
					<td class='pad'><img height='100' width='100' src='http://rotaryteach.org/child_development/upload/<?= $getDet["child_photo"] ?>' alt='No Image'></td>

					<td class='pad'><?= $getDet["child_name"] ?></td>

					<td class='pad'><?= $getDet["child_gender"] ?></td>

					<td class='pad'><?= $getDet["child_dob"] ?></td>

					<td class='pad'><?= $getDet["child_father_name"] ?></td>

					<td class='pad'><?= $getDet["child_mother_name"] ?></td>

					<td class='pad' style='text-align:center;'><a href='viewChildProfile.php?id=<?= $getDet["child_id"] ?>' target='_blank' style='color: #2288f1;' >View</a></td>
					<?php if($examType['examtype']=='Quarterly') { ?>
					<td class='pad' style='text-align:center;'><a href='quarterly_report.php?pid=<?= $getDet["child_id"] ?>' target='_blank' style='color: #2288f1;' ><?php echo $examType['examtype']; ?></a></td>
					<?php } else { ?>
					<td class='pad' style='text-align:center;'><a href='#' style='color: #2288f1;' ><?php echo $examType['examtype']; ?></a></td>
					<?php } ?>
				</tr>

				<?php
					$i++;}

				}else{
				?>
				<tr class='headercol'>		
					<td class='pad' colspan="7">No record found</td>
				</tr>
				<?php
				}
				?>

				<tr><td colspan="10" style="height: 30px;"></td></tr>

				<!-----------Pagination---------->

				<?php if (!isset($_REQUEST['searchBtn'])){ ?>

				<tr>
					<td colspan="10">
						<div class="pagination" >
							<div style="float: left; color:#2288f1; margin-right: 50px;"><?php echo $paginationDisplay; ?></div>
							
							<div style="line-height: 32px; float: right;">
								<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" name="jumpBtn" id="jumpBtn" value="Go To Page" onclick="jumpToPage()" class="jump" />

								<input type="text" name="jumpTo" id="jumpTo" placeholder="Enter Page No" onkeypress="return isNumberKey(event)" style="border: 1px solid; height: 30px; border-radius: 3px; width: 100px; text-align: center; margin-right: 10px;" />
							</div>
						</div>
					</td>
				</tr>

				<?php } ?>

				<!-----------Pagination---------->

			</table>



		<div class="box-footer clearfix">
		 <ul class="pagination pagination-sm no-margin pull-right">
		 <?php echo $pagingLink; ?>
		 </ul>
		</div>

		</div>

	</div>

</div>
	<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
</div>
</body>
</html>
