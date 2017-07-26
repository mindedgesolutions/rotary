<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';
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
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" /> 

<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/overcast/jquery-ui.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<style type="text/css">
.table_tr{
	height: 40px;
	background-color: #34363d;
	color: #fff;
	text-align: center;
}
.table_tr_details{
	height: 40px;
	background-color: #c4c4c4;
	color: #000;
	text-align: center;
}
.table_tr_details:nth-child(even){
	background-color: #e2e2e2;
}
</style>

<script type="text/javascript">
function deleteRecord(par){
	var dbsln = $('#dbsln'+par).val();
	var f = confirm('Do you wish to delete?');

	if (f==true){
		$.ajax({
			url: 'delete-evaluation-record.php',
			type: 'post',
			data: 'dbsln=' + dbsln,
			success: function(f){
				alert('Deleted successfully');
				window.location.reload();
			}
		})
	}
}
</script>

</head>

<body>

<div class="wrapper">
<header>
	<div class="logo"><a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a></div>
	<?php include('include/mainnav.php'); ?>
	<div class="clearfix"></div>
</header>

<div class="structure-row alone"> 
	<div> 
		<header> 
			<?php include('include/child_header.php'); ?>
			<div class="clearfix"></div>
		</header>
  
		<div class="container">
								
			<div class="col-sm-12"><center><h1>LIST VIEW : ASHA KIRAN CENTRE VISIT – RATING</h1></center></div>

			<div class="container">

				<div class="col-sm-12" id="form_section">
				<table width="100%" style="margin: 0 0 20px 0;">
					<tr>
						<td>
							<a href="center-rating.php?assessid="><input type="button" name="centerBtn" id="centerBtn" value="Add Assessment" class="btn btn-primary" /></a>
						</td>
					</tr>
				</table>

				<table width="100%" border="1" style="border-collapse: collapse;">
					<tr class="table_tr">
						<td width="22.5%">Organization Name</td>
						<td width="22.5%">Center Name</td>
						<td width="20%">State</td>
						<td width="12.5%">Visit Date</td>
						<td width="12.5%">Quarter</td>
						<td width="10%">Action</td>
					</tr>
					<?php
					$i = 1;

					$query_getDet = mysql_query("select * from asha_kiran_center_rating where status='complete'");
					while ($getDet = mysql_fetch_array($query_getDet)){

						$ngoName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where id='".$getDet['ngo']."'"));
						$centerName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where type='center' and idfk='".$getDet['ngo']."'"));

						if ($getDet['visiting_quarter']=='quarter_1'){
							$quarter = 'Quarter - I';
						}else if ($getDet['visiting_quarter']=='quarter_2'){
							$quarter = 'Quarter - II';
						}else if ($getDet['visiting_quarter']=='quarter_3'){
							$quarter = 'Quarter - III';
						}else if ($getDet['visiting_quarter']=='quarter_4'){
							$quarter = 'Quarter - IV';
						}
					?>
					<tr class="table_tr_details">
						<td><?= strtoupper($ngoName['center_name']) ?></td>
						<td><?php if($centerName['center_name']==''){echo 'N/A';}else{echo strtoupper($centerName['center_name']);} ?></td>
						<td><?= $getDet['state'] ?></td>
						<td><?= date('d-m-Y', strtotime($getDet['visit_date'])) ?></td>
						<td><?= $quarter ?></td>

						<input type="hidden" name="dbsln<?= $i ?>" id="dbsln<?= $i ?>" value="<?= $getDet['id'] ?>" />

						<td>
							<a href="center-rating-viewonly.php?assessid=<?= base64_encode($getDet['assessment_id']) ?>"><img src="viewBtn.png" height="25" style="cursor: pointer;margin: 0 15px 0 0;" /></a>

							<img src="deleteBtn.png" height="25" onclick="deleteRecord(<?= $i ?>)" style="cursor: pointer;" />
						</td>
					</tr>
					<?php $i++;} ?>
				</table>
				</div>
			</div>

		</div>
	</div>	

<?php include('include/footer.php'); ?>
	
	
</div>

</body>
</html>