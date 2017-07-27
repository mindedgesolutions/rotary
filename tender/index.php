<?php
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

<script>

</script>

<style type="text/css">

.container{
  margin-bottom:20px;
  min-height: 350px;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">

 <?php include('include/header.php'); ?>
 
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      
      <?php
      $checkTender = mysql_num_rows(mysql_query("select * from tender_master where uid='".$_SESSION['uid']."'"));
      
      $tenderDet = mysql_fetch_array(mysql_query("select * from tender_master where uid='".$_SESSION['uid']."'"));
      ?>

      <?php if ($_SESSION['user_type']=='vendor'){ ?>

      <?php if ($checkTender == 0){ ?>

      <div style="text-align: center;font-size: 18px;"><a href="generate-tender-no.php">Click to Submit Your Tender</a></div>

      <?php }else{ ?>

      <div style="text-align: center;font-size: 18px;"><a href="submit-tender.php?tid=<?= base64_encode($tenderDet['tender_id']) ?>&uid=<?= base64_encode($_SESSION['uid']) ?>&tno=<?= base64_encode($tenderDet['tender_no']) ?>">Edit Tender Details</a></div>

      <?php } ?>

      <?php }else{ ?>

      <div style="text-align: center;font-size: 18px;"><a href="list-view-tender.php">View Submitted Tenders</a></div>

      <?php } ?>

      </div>
    </div>
  </div>
  <!-- Wrapper End --> 
  
  



  <!-- Logo Start -->
  
    <?php
    include('include/footer.php');
    ?>
  <!-- Sidebar Navigation End --> 
  
  
  </div>

</body>
</html>