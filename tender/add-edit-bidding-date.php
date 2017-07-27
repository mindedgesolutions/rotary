<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from tender_bid_date where SLN='".$_REQUEST['pid']."'"));
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

<?php include 'include/header-link.php'; ?>

<script type="text/javascript">
$(function(){
    
    $( "#bidDate" ).datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: 0,
        dateFormat: 'dd-mm-yy',
    });
});

function validateForm(){

	var bidDate = $('#bidDate').val();

	if (bidDate==''){

		alert('Enter bid closing date');
		return false;
	}
}
</script>

<style type="text/css">
.table-tr{
	height: 50px;
}
#bidDate:hover{
	cursor: pointer;
}
</style>
</head>

<body>
	<div class="wrapper">
		<?php include('include/header.php'); ?>

		<section class="content-header">
	      <ol class="breadcrumb">
	        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Home</a></li>
	        <li class="active">Add/Edit Bidding Closing Date</li>
	      </ol>
		</section>

		<div class="container">
    		<div class="row">

      		<div class="col-sm-12">

  			<?php
  			if (isset($_REQUEST['submitBtn'])){

  				$date = date('Y-m-d', strtotime($_REQUEST['bidDate']));

  				if ($_REQUEST['pid']==''){

  					$insert = "insert into tender_bid_date(SLN, bid_closing_date, declared_by, declare_date, status) values('', '".$date."', '".$_SESSION['login_id']."', '".date('Y-m-d')."', '".$_REQUEST['status']."')";

  					mysql_query($insert);
  				?>
  				<script type="text/javascript">
  					alert('Bid closing date has been added');
  					window.location = 'bid-closing-date.php';
  				</script>
  				<?php
  				}else{

  					$update = "update tender_bid_date set bid_closing_date='".$date."', status='".$_REQUEST['status']."' where SLN='".$_REQUEST['pid']."'";

  					mysql_query($update);
  				?>
  				<script type="text/javascript">
  					alert('Bid closing date has been updated');
  					window.location = 'bid-closing-date.php';
  				</script>
  				<?php
  				}
  			}
  			?>

      		<form action="" method="post" autocomplete="off" onsubmit="return validateForm()">

      		<table class="col-sm-12">
		        <tr>
		          <td class="col-sm-6">Bidding Date : </td>
		          <td class="col-sm-6"><input type="text" name="bidDate" id="bidDate" class="form-control" value="<?php if ($_REQUEST['pid']==''){echo 'Select Date';}else{echo date('d-m-Y', strtotime($getDet['bid_closing_date']));} ?>" readonly="readonly" /></td>
		        </tr>

        		<tr><td colspan="2" style="height: 20px;"></td></tr>

        		<tr>
		          <td class="col-sm-6">Status : </td>
		          <td class="col-sm-6">
		          	<select name="status" id="status" class="form-control">
		          		<option value="active">Activate</option>
		          		<option value="deactive">Deactivate</option>
		          	</select>
		          </td>
		        </tr>

        		<tr><td colspan="2" style="height: 40px;"></td></tr>

		        <tr>
		            <td class="col-sm-12" colspan="2" style="text-align: center;">
		            	<a href="bid-closing-date.php"><input type="button" name="backBtn" id="backBtn" value="Back To List" class="btn btn-primary" style="margin: 0 15px 0 0;" /></a>

		            	<input type="submit" name="submitBtn" id="submitBtn" value="Submit" class="btn btn-primary" />
		          </td>
		        </tr>
  			</table>

  			</form>

			</div>
			</div>
		</div>

		<?php include('include/footer.php'); ?>
</body>
</html>