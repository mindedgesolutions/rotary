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
	        <li class="active">Bid Closing Date</li>
	      </ol>
		</section>

		<div class="container">
    		<div class="row">

		    <div class="col-sm-12">
		    <a href="add-edit-bidding-date.php"><input type="button" name="addBtn" id="addBtn" class="btn btn-primary" value="Add Closing Date" /></a>
		    </div>

      		<div class="col-sm-12">

	      	<table class="col-sm-12" border="1" style="border-collapse: collapse;text-align: center;">
	        <tr class="table-tr" style="background-color:#1980cf;color:#ffffff;">
	          <td class="col-sm-4">Bid Closing Date</td>
	          <td class="col-sm-4">Updated On</td>
	          <td class="col-sm-2">Status</td>
	          <td class="col-sm-2">Action</td>
	        </tr>

	        <?php
	          $sln=1;
	          $check = mysql_num_rows(mysql_query("select * from tender_bid_date"));

	          if ($check > 0){
		          $query_getDet = mysql_query("select * from tender_bid_date order by SLN desc");
		          while ($getDet = mysql_fetch_array($query_getDet)){

		          	if ($getDet['bid_closing_date'] < date('Y-m-d')){

		          		$status = '<span style="color: #b30000;">EXPIRED</span>';
		          	}else{

		          		$status = '<span style="color: #008000;">ON-TIME</span>';
		          	}
          	?>
	          <tr class="table-tr">
	            <td class="col-sm-4"><?= date('d-m-Y', strtotime($getDet['bid_closing_date'])) ?></td>

	            <td class="col-sm-4"><?= date('d-m-Y', strtotime($getDet['declare_date'])) ?></td>

	            <td class="col-sm-2"><?= $status ?></td>

	            <td class="col-sm-2">
	            	<a href="add-edit-bidding-date.php?pid=<?= $getDet['SLN'] ?>"><input type="button" name="editBtn" id="editBtn" class="btn btn-primary" value="Edit" style="width: 60px;margin: 0 10px 0 0;" /></a>
	            </td>
	          </tr>
	          <?php $sln++;}}else{ ?>
	          <tr class="table-tr">
	            <td class="col-sm-12" colspan="3">NO RECORD FOUND</td>
	   		  </tr>
	          <?php } ?>
      		</table>
			</div>
			</div>
		</div>

		<?php include('include/footer.php'); ?>
</body>
</html>