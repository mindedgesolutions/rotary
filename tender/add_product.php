<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

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
function activateProduct(par){

	var dbsln = $('#dbsln'+par).val();
	var c = confirm("Do you wish to activate this product?");

	if (c==true){

		$.ajax({
			url: 'activate-product.php',
			type: 'POST',
			data: 'dbsln=' + dbsln,
			success: function(f){

				alert('Product has been activated');
				window.location.reload();
			}
		})
	}else{

		alert('Action is cancelled');
	}
}

function deactivateProduct(par){

	var dbsln = $('#dbsln'+par).val();
	var c = confirm("Do you wish to deactivate this product?");

	if (c==true){

		$.ajax({
			url: 'deactivate-product.php',
			type: 'POST',
			data: 'dbsln=' + dbsln,
			success: function(f){

				alert('Product has been deactivated');
				window.location.reload();
			}
		})
	}else{

		alert('Action is cancelled');
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
		    <a href="add-edit-product.php"><input type="button" name="addBtn" id="addBtn" class="btn btn-primary" value="Add Product" /></a>
		    </div>

      		<div class="col-sm-12">

	      	<table class="col-sm-12" border="1" style="border-collapse: collapse;text-align: center;">
	        <tr class="table-tr" style="background-color:#1980cf;color:#ffffff;">
	          <td class="col-sm-8">Product Name</td>
	          <td class="col-sm-1">Status</td>
	          <td class="col-sm-3">Action</td>
	        </tr>

	        <?php
	          $sln=1;

	          $query_getDet = mysql_query("select * from tender_product_master order by product_id desc");
	          while ($getDet = mysql_fetch_array($query_getDet)){
          	?>
	          <tr class="table-tr">
	            <td class="col-sm-8"><?= urldecode($getDet['product_name']) ?></td>

	            <input type="hidden" name="dbsln<?= $sln ?>" id="dbsln<?= $sln ?>" value="<?= $getDet['product_id'] ?>" />

	            <td class="col-sm-1"><?= strtoupper($getDet['status']) ?></td>

	            <td class="col-sm-3">
	            	<a href="add-edit-product.php?pid=<?= $getDet['product_id'] ?>"><input type="button" name="editBtn" id="editBtn" class="btn btn-primary" value="Edit" style="width: 60px;margin: 0 10px 0 0;" /></a>

	            	<?php if ($getDet['status']!='active'){ ?>

	            	<input type="button" name="actBtn" id="actBtn" class="btn btn-primary" value="Activate" onclick="activateProduct(<?= $sln ?>)" />

	            	<?php }else{ ?>

	              	<input type="button" name="deactBtn" id="deactBtn" class="btn btn-primary" value="Deactivate" onclick="deactivateProduct(<?= $sln ?>)" />

	              	<?php } ?>

	            </td>
	          </tr>
	          <?php $sln++;} ?>
      		</table>
			</div>
			</div>
		</div>

		<?php include('include/footer.php'); ?>
</body>
</html>