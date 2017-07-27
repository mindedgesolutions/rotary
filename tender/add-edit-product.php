<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from tender_product_master where product_id='".$_REQUEST['pid']."'"));

//echo 'xxx'.urldecode($getData['product_name']);
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
function validateForm(){

	var prdName = $('#prdName').val();

	if (prdName==''){

		alert('Enter product name');
		return false;
	}
}
</script>

<style type="text/css">
.table-tr{
	height: 50px;
}
</style>
</head>

<body>
	<div class="wrapper">
		<?php include('include/header.php'); ?>

		<section class="content-header">
	      <ol class="breadcrumb">
	        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Home</a></li>
	        <li class="active">Add/Edit Product</li>
	      </ol>
		</section>

		<div class="container">
    		<div class="row">

      		<div class="col-sm-12">

  			<?php
  			if (isset($_REQUEST['submitBtn'])){

  				if ($_REQUEST['pid']==''){

  					$insert = "insert into tender_product_master(product_id, product_name, status) values('', '".urlencode($_REQUEST['prdName'])."', '".$_REQUEST['status']."')";

  					mysql_query($insert);
  				?>
  				<script type="text/javascript">
  					alert('Product details have been added');
  					window.location = 'add_product.php';
  				</script>
  				<?php
  				}else{

  					$update = "update tender_product_master set product_name='".urlencode($_REQUEST['prdName'])."', status='".$_REQUEST['status']."' where product_id='".$_REQUEST['pid']."'";

  					mysql_query($update);
  				?>
  				<script type="text/javascript">
  					alert('Product details have been updated');
  					window.location = 'add_product.php';
  				</script>
  				<?php
  				}
  			}
  			?>

      		<form action="" method="post" autocomplete="off" onsubmit="return validateForm()">

      		<table class="col-sm-12">
		        <tr>
		          <td class="col-sm-6">Product Name : </td>
		          <td class="col-sm-6"><input type="text" name="prdName" id="prdName" class="form-control" value="<?= urldecode($getDet['product_name']) ?>" /></td>
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

        		<tr><td colspan="2" style="height: 20px;"></td></tr>

		        <tr>
		           <td class="col-sm-6"></td>
		            <td class="col-sm-6"><input type="submit" name="submitBtn" id="submitBtn" value="Submit" class="btn btn-primary" />
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