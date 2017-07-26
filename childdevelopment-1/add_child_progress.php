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

<style type="text/css">
.content-header{
  margin: 0 0 20px 0;
}
.content-header h1{
  font-size: 16px;
  margin: 0;
  font-weight: normal;
  text-align: center;
}
#quarter{
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
}
.btn-holder{
  width: 100%;
  height: auto;
  float: left;
  margin: 60px 0;
  text-align: center;
}
.container{
	margin-bottom:20px;
}
</style>

<script type="text/javascript">
function validateForm(){

  var quarter = $('#quarter').val();

  if (quarter==''){

    alert('Select a quarter');
    return false;
  }
}
</script>
</head>
<body>

<div class="wrapper">
<?php include('include/header.php'); ?>

    <section class="content-header">
      <h1 style="padding: 0 10px;"></h1>
    </section>
	<div class="container">
		<div class="row">
		<div class="col-sm-12">
      <form action="progress-redirection-page.php" method="post" style="height:300px;" onsubmit="return validateForm()">

      <input type="hidden" name="pid" id="pid" value="<?= $_REQUEST['pid'] ?>">

      <select class="form-control" id="quarter" name="quarter" >
        <option value="">-- Please Select --</option>

        <option value="quarter1">Quarter - 1</option>
        <option value="quarter2">Quarter - 2</option>
        <option value="quarter3">Quarter - 3</option>
        <option value="quarter4">Quarter - 4</option>
      </select>

      <div class="btn-holder">
        <input type="submit" class="btn btn-primary" name="submitBtn" id="submitBtn" value="SUBMIT">

        <a href="child_progress_report.php"><input type="button" class="btn btn-primary" name="backBtn" id="backBtn" value="BACK TO LIST" style="margin-left: 5px;"></a>
      </div>
      </form>
	  </div>
	  </div>
	  </div>
<?php
    include('include/footer.php');
    ?>
  </div>
  <!-- Wrapper End --> 
  
    
 

</body>
</html>