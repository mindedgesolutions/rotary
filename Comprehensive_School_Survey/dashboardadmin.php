<?php
session_start();
ob_start();
include('include/config.php');

$userid=$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];
$i=1;

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
.footer{
 position: absolute;
 bottom: 0;
 width:100%;
 height:60px;
 background-color:#32343b;
}
.table-tr{
	height: 50px;
	text-align: center;
}
</style>

<script>
function jumpToPage(){
    var lastPage = $('#lastPage').val();
    var jumpTo = $('#jumpTo').val();
    var pathname = window.location.pathname;
    
    if (Number(jumpTo) > Number(lastPage)){
        window.location.href = pathname + '?pn=' + lastPage;
    }else{
        window.location.href = pathname + '?pn=' + jumpTo;
    }
}
</script>

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
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-4">
					<?php include('include/child_header.php'); $stype=$_GET['stype']; ?>
					</div>
					<div class="col-xs-4">
					<h3 style="color:#ffffff; text-align:center;">Comprehensive School Survey Form</h3>
					</div>
					<div class="col-xs-4" >
					<!-- <a href="http://rotaryteach.org/Comprehensive_School_Survey/dashboard.php"><h5 style="color:#ffffff; text-align:right;">Home</h5></a>-->
					</div>
				</div>
			</div>

		<!-- User Section Start -->

		<!-- Header Top Navigation End -->
			<div class="clearfix"></div>
		</header>
    

<!-- GRID -->

<?php include 'survey-pagination.php'; ?>

<?php 
$check = mysql_num_rows(mysql_query("select * from tbl_school_survey where identity !=''"));
?>
<script type="text/javascript">document.getElementById('divID').style.display = 'none';</script>
	<?php if ($check > 0){ ?>
		<div style="margin: 20px 25px 0 25px;"><a href="export-excel.php"><input type="button" class="btn btn-primary" name="to_excel" id="to_excel" value="EXPORT TO EXCEL"></a></div>
<br/>
		<div class="form-group" style="padding-left:25px; padding-right:25px;">
			<table border="1" cellspacing="0" cellpadding="0"  width="100%" class="tbl" style="border-collapse: collapse;">
				<tr class="table-tr">
					<td width="45%"><b>School Name</b></td>
					<td width="15%"><b>Contact Person</b></td>
					<td width="10%"><b>Contact No</b></td>
					<td width="10%"><b>School Ph No</b></td>
					<td width="10%"><b>State</b></td>
					<td width="10%"><b>School Type</b></td>
				</tr>

				<?php
				$query_getDet = mysql_query("select * from tbl_school_survey where identity !='' $limit");
				while ($getDet = mysql_fetch_array($query_getDet)){
				?>

				<tr class="table-tr">
					<td><?= $getDet['school_name'] ?></td>
					<td><?= $getDet['name'] ?></td>
					<td><?= $getDet['ph_no'] ?></td>
					<td><?= $getDet['school_ph_no'] ?></td>
					<td><?= $getDet['school_state'] ?></td>
					<td><?= $getDet['school_type'] ?></td>
				</tr>

				<?php } ?>
			</table>

			<div class="pagination" style="margin: 40px 0 100px 0;">
				<div style="float: left; color:#2288f1; margin-right: 50px;"><?php echo $paginationDisplay; ?></div>

			    <div style="line-height: 32px; float: right;">
			      <input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" name="jumpBtn" id="jumpBtn" value="Go To Page" onclick="jumpToPage()" class="jump" />

			      <input type="text" name="jumpTo" id="jumpTo" placeholder="Enter Page No" onkeypress="return isNumberKey(event)" style="border: 1px solid; height: 30px; border-radius: 3px; width: 100px; text-align: center; margin-right: 10px;" />
			       
			    </div>

			</div>
	    </div>

    <?php } ?>

<!-- GRID -->





      </div>
    </div>
    <!-- Wrapper End --> 
	
	


<br/>
  <!-- Logo Start -->
  <div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
  </div>
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
