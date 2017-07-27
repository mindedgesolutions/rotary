<?php 
include('include/config.php');
ob_start();
session_start();
$email_donor = $_SESSION['email'];
$total_amt = $_SESSION['total_amt'];

$sql = "Select * from wisdom_donation where email = '$email_donor'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
	extract($data);
}
if(isset($_POST['submit'])) {
$branch_name = $_POST['branch_name'];
$trans_date = $_POST['trans_date'];
$cheque_dd = $_POST['cheque_dd'];
$amt = $_POST['amt'];
$wid = $_POST['wid']; 
$type = $_POST['type'];
$utr_neft = $_POST['utr_neft'];
$trans_id = $_POST['trans_id'];

if($type == 'cash'){
$query = "Insert into wisdom_payment values(NULL,'$wid','$type','$branch_name','$trans_date','$amt','$utr_neft','$cheque_dd')"; 
$result = mysql_query($query); 
header('location:index.php');
}
if($type == 'cheque'){
$query = "Insert into wisdom_payment values(NULL,'$wid','$type','$branch_name','$trans_date','$amt','$utr_neft','$cheque_dd')"; 
$result = mysql_query($query); 
header('location:index.php');
}
if($type == 'neft'){
$query = "Insert into wisdom_payment values(NULL,'$wid','$type','$branch_name','$trans_date','$amt','$utr_neft','$cheque_dd')"; 
$result = mysql_query($query); 
header('location:index.php');
}
if($type == 'online'){
$query = "Insert into wisdom_payment values(NULL,'$wid','$type','$branch_name','$trans_date','$amt','$utr_neft','$cheque_dd','$trans_id')"; 
$result = mysql_query($query); 
header('location:index.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Happy School |
    <?php include('include/title.php'); ?>
    </title>

	<!-- Css Files -->
	<?php include('include/favicon.php'); ?>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="css/color.css" rel="stylesheet">
	<link href="css/dl-menu.css" rel="stylesheet">
	<link href="css/flexslider.css" rel="stylesheet">
	<link href="css/prettyphoto.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<style>
.box {
	padding: 20px;
	display: none;
	margin-top: 20px;
	border: 1px solid #000;
}
</style>
	</head>
	<body>

<!-- Color Switcher --> 
<!-- Color Switcher --> 

<!--// Main Wrapper //-->
<div class="as-mainwrapper"> 
      
      <!--// Header //-->
      <header id="as-header" class="as-absolute"> 
    
    <!--// TopStrip //-->
    <div class="container">
          <div class="as-topstrip as-bgcolor">
        <?php include('include/top-head.php'); ?>
      </div>
        </div>
    <!--// TopStrip //-->
    
    <div class="container">
          <div class="as-header-bar">
        <div class="row">
              <?php include('include/logo.php'); ?>
              <div class="col-md-10">
            <div class="as-section-right">
                  <?php include('include/navigation.php'); ?>
                </div>
            <?php include('include/responsive-menu.php'); ?>
          </div>
            </div>
      </div>
        </div>
  </header>
      <!--// Header //-->
      
      <div class="as-minheader"> <span class="full-pattren"></span>
    <div class="as-minheader-wrap">
          <div class="container">
        <div class="row">
              <div class="col-md-8">
            <div class="as-page-title">
                  <h1>Wisdom Libraries Online Donation Form</h1>
                </div>
          </div>
              <div class="col-md-4">
            <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Wisdom Libraries Donation Form </a></li>
                </ul>
          </div>
            </div>
      </div>
        </div>
  </div>
      
      <!--// Main Content //-->
      <div class="as-main-content">
    <div class="as-main-section">
          <div class="container">
        <div class="row">
              <div class="col-md-12">
            	
                  <table width="100%" border="0">
                <tr>
                   <td colspan="8" align="center"><strong>Donation Information</strong></td>
                </tr>
                <tr>
                      <td><strong>Donation to RILM</strong></td>
                      <td colspan="7"><input type="text" name="total_amt" value="<?php echo $_SESSION['total_amt']; ?>" readonly id="grand_02" class="form-control"/></td>
                    </tr>
                
                <tr>
                <td><strong>Payment Method</strong></td>
                <td><input type="radio" name="r1" value="cash" id="">&nbsp;&nbsp;&nbsp;Cash</td>
                <td><input type="radio" name="r1" value="cheque" id="">&nbsp;&nbsp;&nbsp;Cheque</td>
                <td><input type="radio" name="r1" value="neft" id="">&nbsp;&nbsp;&nbsp;NEFT</td>
                <td><input type="radio" name="r1" value="online" onclick="window.open('online_payment.php','popUpWindow','height=400,width=600,left=10,top=10,,scrollbars=yes,menubar=no'); return false;">
                &nbsp;&nbsp;&nbsp;Online</td>
                </tr>
                
                <tr>
                 <td></td>
                 <td colspan="7">
                 <form action="wisdom_libraries_payment.php" method="post" enctype="multipart/form-data">
                 <div class="cash box">
                 <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td>Bank Branch Name:</td>
                    <td>Transaction Date:</td>
                    <td>Amount:</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="branch_name" value="" class="form-control"></td>
                    <td><input type="text" name="trans_date" value="" class="form-control"></td>
                    <td><input type="text" name="amt" value="<?php echo $total_amt; ?>" class="form-control"></td>
                    <input type="hidden" name="wid" value="<?php echo $wid; ?>">
                    <input type="hidden" name="type" value="cash">
                  </tr>
                  <tr><td colspan="5" align="center"><input type="submit" name="submit" value="Submit"></td></tr>
                </table>
                 </div>
                </form>
				<form action="wisdom_libraries_payment.php" method="post" enctype="multipart/form-data">
                 <div class="cheque box">
                 <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td>Bank Name:</td>
                    <td>Cheque No / DD.:</td>
                    <td>Transaction Date:</td>
                    <td>Amount:</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="branch_name" value="" class="form-control"></td>
                    <td><input type="text" name="cheque_dd" value="" class="form-control"></td>
                    <td><input type="text" name="trans_date" value="" class="form-control"></td>
                    <td><input type="text" name="amt" value="<?php echo $total_amt; ?>" class="form-control"></td>
                    <input type="hidden" name="wid" value="<?php echo $wid; ?>">
                    <input type="hidden" name="type" value="cheque">
                  </tr>
                  <tr><td colspan="5" align="center"><input type="submit" name="submit" value="Submit"></td></tr>
                </table>
                </div>
                </form>
                <form action="wisdom_libraries_payment.php" method="post" enctype="multipart/form-data">
                 <div class="neft box">
                 <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td>UTR No.:</td>
                    <td>Transaction Date:</td>
                    <td>Amount:</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="utr_neft" value="" class="form-control"></td>
                    <td><input type="text" name="trans_date" value="" class="form-control"></td>
                    <td><input type="text" name="amt" value="<?php echo $total_amt; ?>" class="form-control"></td>
                    <input type="hidden" name="wid" value="<?php echo $wid; ?>">
                    <input type="hidden" name="type" value="neft">
                  </tr>
                  <tr><td colspan="5" align="center"><input type="submit" name="submit" value="Submit"></td></tr>
                </table>
                </div>
                </form>
                
                <form action="wisdom_libraries_payment.php" method="post" enctype="multipart/form-data">
                 <div class="online box">
                 <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td>Transaction No:</td>
                    <td>Amount:</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="trans_no" value="" class="form-control"></td>
                    <td><input type="text" name="amt" value="<?php echo $total_amt; ?>" class="form-control"></td>
                    <input type="hidden" name="wid" value="<?php echo $wid; ?>">
                    <input type="hidden" name="type" value="online">
                  </tr>
                  <tr><td colspan="5" align="center"><input type="submit" name="submit" value="Submit"></td></tr>
                </table>
                </div>
                </form>
                </td>
               </tr>
              </table>
              </div>
            </div>
      </div>
        </div>
  </div>
      
      <!--// Footer //-->
      <div class="as-footer">
    <div class="container">
          <?php include('include/footer.php'); ?>
        </div>
    <?php include('include/copy-right.php'); ?>
  </div>
      <!--// Footer //-->
      <div class="clearfix"></div>
    </div>
<!--// Main Wrapper //--> 

<!-- Search Modal -->
<?php include('include/search-model.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="cash"){
            $(".box").not(".cash").hide();
            $(".cash").show();
        }
        if($(this).attr("value")=="cheque"){
            $(".box").not(".cheque").hide();
            $(".cheque").show();
        }
        if($(this).attr("value")=="dd"){
            $(".box").not(".dd").hide();
            $(".dd").show();
        }
		if($(this).attr("value")=="neft"){
            $(".box").not(".neft").hide();
            $(".neft").show();
        }
		if($(this).attr("value")=="online"){
            $(".box").not(".online").hide();
            $(".online").show();
        }
    });
});
</script> 
<!-- Search Modal --> 
<!--<script language="javascript">
    function grand2() {
          var col_1 = document.getElementById('ri_fund_1').value;
		  var col_2 = document.getElementById('int_fund_1').value;
		  var col_3 = document.getElementById('ri_gg_1').value;
		  var col_4 = document.getElementById('corp_fun_1').value;
		  var col_5 = document.getElementById('other_fun_1').value;
		  var col_6 = document.getElementById('ri_fund_2').value;
		  var col_7 = document.getElementById('int_fund_2').value;
		  var col_8 = document.getElementById('ri_gg_2').value;
		  var col_9 = document.getElementById('corp_fun_2').value;
		  var col_10 = document.getElementById('other_fun_2').value;
		  var col_11 = document.getElementById('grand_01').value;
          var result = parseInt(col_1) + parseInt(col_2) + parseInt(col_3) + parseInt(col_4) + parseInt(col_5) + parseInt(col_6) + parseInt(col_7) + parseInt(col_8) + parseInt(col_9) + parseInt(col_10) + parseInt(col_11);
          if (!isNaN(result)) {
             document.getElementById('grand_02').value = result;
          }
        }
</script> --> 

<!-- jQuery (necessary for JavaScript plugins) --> 
<script src="script/jquery.min.js"></script> 
<script src="script/modernizr.js"></script> 
<script src="script/bootstrap.min.js"></script> 
<script src="script/jquery.dlmenu.js"></script> 
<script src="script/flexslider-min.js"></script> 
<script src="script/goalProgress.min.js"></script> 
<script src="script/jquery.countdown.min.js"></script> 
<script src="script/jquery.prettyphoto.js"></script> 
<script src="script/waypoints-min.js"></script> 
<script src="script/owl.carousel.min.js"></script> 
<script src="script/newsticker.js"></script> 
<script src="script/parallex.js"></script> 
<script src="script/styleswitch.js"></script> 
<script src="script/functions.js"></script>
</body>
</html>