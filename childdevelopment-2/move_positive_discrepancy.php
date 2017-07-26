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

<script type="text/javascript">
function numbersForDate(input){
    var regex = /[^0-9-/]/gi;
    input.value = input.value.replace(regex, "");
}

function numbersOnly(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}
</script>

<style type="text/css">
.content-wrapper{
  height: auto;
  padding: 15px;
}
.content-header{
  width: 100%;
  float: left;
  padding: 10px;
  border: 1px solid #ccc;
}
.content-header h1{
  height: auto;
  margin: 0;
  font-size: 18px;
  word-spacing: 5px;  
}
.content-content{
  width: 100%;
  height: auto;
  float: left;
  margin: 15px 0;
  border-bottom: 1px solid #ccc;
}
.child-image{
  width: 15%;
  height: auto;
  float: left;
  box-sizing: border-box;
  padding: 5px;
  border: 1px solid #ccc;
}
.child-image img{
  width: 100%;
  height: auto;
}
.child-desc{
  width: 83%;
  height: auto;
  float: left;
  margin: 0 0 0 2%;
}
.sub-desc{
  width: 50%;
  height: auto;
  float: left;
  line-height: 20px;
  margin: 5px 0;
  box-sizing: border-box;
  padding: 10px;
}
.sub-desc h2{
  margin: 0;
  font-size: 13px;
  float: left;
  font-weight: normal;
  color: #6d6f75;
  line-height: 20px;
}
.data{
  margin: 0 0 0 15px;
  padding-bottom:15px;
}
.other-details{
  width: 41.5%;
  height: 100px;
  float: left;
  box-sizing: border-box;
  padding: 10px;
}
.other-details h1{
  font-size: 13px;
  font-weight: normal;
  color: #6d6f75;
  line-height: 20px;
}
.table-div{
  width: 100%;
  height: 100px;
  float: left;
  margin: 20px 0%;
}
.table-header{
  height: 45px;
  line-height: 35px;
  background-color: #32333a;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}
.table-header:nth-of-type(odd){
    background-color: #000;
}
.table-row{
  height: 45px;
  line-height: 35px;
  text-align: center;
  text-transform: uppercase;
  color: #000;
}
.btn-holder{
  height: auto;
  float: left;
  margin: 20px 5%;
}
.dataLabel{
	padding-right:10px;
	padding-bottom:15px;
}
</style>

</head>

<body>

<form action="" method="post">
<input type="submit" name="submitBtn" id="submitBtn" value="Submit" />
</form>


<?php
if (isset($_REQUEST['submitBtn'])){

  $query_getDonor = mysql_query("select donar_id, amount_no_child from tbl_donar_master");
  while ($getDonor = mysql_fetch_array($query_getDonor)){

    $getCount = mysql_fetch_array(mysql_query("select count(child_id) as childNo from tbl_child_selected_tagging where donar_id='".$getDonor['donar_id']."'"));

    $difference = floor($getDonor['amount_no_child'] - $getCount['childNo']);

    if ($difference > 0){

      $move = "insert into tmp_positive_discrepancy(donor_id, first_name, last_name, amount_no_child, actual_count) values('".$getDonor['donar_id']."', '', '', '".$getDonor['amount_no_child']."', '".$getCount['childNo']."')";

      mysql_query($move);
    }
  }
}
?>

<?php //include 'include/footer.php'; ?>


<!-- ./wrapper -->
<!-- add new calendar event modal -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
</body>
</html>