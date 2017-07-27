<?php
include('../include/config.php');
include 'push-vendor.php';

$grant = mysql_fetch_array(mysql_query("select * from project_master where project_no='".base64_decode($_REQUEST['prno'])."'"));

$hardware_rowcount = mysql_num_rows(mysql_query("select * from grant_vendor_details where grant_no='".$grant['grant_no']."' and hardware_vendor_name!=''"));

$software_rowcount = mysql_num_rows(mysql_query("select * from grant_vendor_details where grant_no='".$grant['grant_no']."' and software_vendor_name!=''"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('../../../include/title.php'); ?></title>
<!-- Css Files -->
<?php include('../../../include/favicon.php'); ?>

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../../../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/owl.carousel.css" rel="stylesheet">
<link href="../css/color.css" rel="stylesheet">
<link href="../css/dl-menu.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet"> 
<link href="../css/prettyphoto.css" rel="stylesheet">
<link href="../css/responsive.css" rel="stylesheet">
<link href="../css/menu_v.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.form-div{
  width: 100%;
  height: auto;
  float: left;
  margin: 25px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  color: #4a4a4a;
  font-size: 90%;
  padding: 15px 15px 0 15px;
}
.table-head{
  background-color: #333;
  color: #fff;
  text-align: center;
}
.header-text{
  width: 100%;
  height: 60px;
  float: left;
}
.header-text h3{
  font-weight: 600;
  color: #757575;
  word-spacing: 5px;
  position: relative;
  text-align: center;
}
.header-text h3:after{
  content: '';
  height: 2px;
  width: 4%;
  position: absolute;
  background: #757575;
  top: 30px;
  left: 48%;
}
</style>

<script>
function myFunction(){
  var myWindow = window.open("district_option.php", "", "top=200, left=500, width=400, height=400");
}
function CloseAndRefresh(){
  opener.location.reload(true);
  self.close();
}
/*-----------------------Letter without space-------------------------*/
function lettersOnly(input){
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex, "");
}

/*-----------------------Letter with space-------------------------*/
function letterswithspace(input){
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}

/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}

/*-------------------No Special Character--------------------------*/
function numberDecimal(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}
function showTable(){
  var prno = $('#prno').val();

  $.ajax({

    url: 'show_vendor_table.php',
    type: 'post',
    data: 'prno=' + prno,
    success: function(f){

      $('#vendor_table').html(f);
      $('#buttons').show();
    }
  })
}
function goToNextPage(){

  var prno = $('#prno').val();
  var grantNo = $('#grantNo').val();
  var prno_enc = $('#prno_enc').val();
  var folderno_enc = $('#folderno_enc').val();

  $.ajax({

    url: 'check-and-redirect.php',
    type: 'post',
    data: 'prno=' + prno + '&grantNo=' + grantNo,
    success: function(f){

      window.location = 'funding-details.php?prno=' + prno_enc + '&folderno=' + folderno_enc;
    }
  })
}
</script>   

</head>
<body style="padding-right:0px;">

  <input type="hidden" name="prno" id="prno" value="<?= base64_decode($_REQUEST['prno']) ?>" />
  <input type="hidden" name="prno_enc" id="prno_enc" value="<?= $_REQUEST['prno'] ?>" />
  <input type="hidden" name="folderno_enc" id="folderno_enc" value="<?= $_REQUEST['folderno'] ?>" />
  <input type="hidden" name="grantNo" id="grantNo" value="<?= $grant['grant_no'] ?>" />

  <!--// Main Wrapper //-->
  <div class="as-mainwrapper">

    <!--// Header //-->
    <header id="as-header" >

        <!--// TopStrip //-->
      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-topstrip as-bgcolor">
          <?php include('../include/top-head.php'); ?>
        </div>
      </div>
      <!--// TopStrip //-->

      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-header-bar">
          <div class="row">
            <div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
              <div class="col-md-2">
                <a style="float:left;" href="index.php" class="logo1"><img src="../images/logo2.png" alt=""></a>
              </div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('../include/navigation_mem.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('../include/responsive-menu.php'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>

    </header>

    <!--// Header class="as-section-right" //-->
    <div class="as-main-content">

      <!--// MainSection //-->
      <div class="row">
        <div class="col-md-12">

          <div class="col-md-1"></div>

          <div class="col-md-10" style="margin: 50px 0;">

            <div class="header-text"><h3>Vendor Details</h3></div>

            <form action="" method="post">

            <table>
                <tr>
                  <td width="15%" style="color: #757575;">Confirm grant no : </td>
                  <td width="35%"><input type="text" name="grant_no" id="grant_no" value="<?= $grant['grant_no'] ?>" class="form-control" readonly="readonly" /></td>
                  <td width="50%"><input type="button" name="grntBtn" id="grntBtn" value="Confirm" class="btn btn-primary" onclick="showTable();" style="margin: 0 0 0 15px;" /></td>
                </tr>
            </table>

            <span id="vendor_table"></span>

            <table id="buttons" style="margin: 40px 0 0 0;display: none;">
                <tr>
                  <td style="text-align: center;">
                    <a href="edit.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>"><input type="button" name="backBtn" id="backBtn" value="Go Back" class="btn btn-primary" style="width: 80px;margin: 0 20px 0 0;" /></a>

                    <input type="button" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" style="width: 80px;" onclick="goToNextPage()" />
                  </td>
                </tr>
            </table>

            </form>

          </div>
        </div>
      </div>
    </div>

    <!--// MainSection //-->

  </div>


  <!--// Footer //-->
  <div class="as-footer">
    <div class="container">
      <?php include('../include/footer.php'); ?>
    </div>
    <?php include('../include/copy-right.php'); ?>
  </div>
  <!--// Footer //-->
  <div class="clearfix"></div>
    
  <!--// Main Wrapper //-->

    <!-- Search Modal -->
    <?php //include('include/search-model.php'); ?>
    <!-- Search Modal -->
    <!-- jQuery (necessary for JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/modernizr.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dlmenu.js"></script>
    <script src="../js/flexslider-min.js"></script>
    <script src="../js/goalProgress.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.prettyphoto.js"></script>
    <script src="../js/waypoints-min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/newsticker.js"></script>
    <script src="../js/parallex.js"></script>
    <script src="../js/styleswitch.js"></script>
    <script src="../js/functions.js"></script>
    <script>
      // NewsTicker
      'use strict';
        var options = {
          newsList: "#as-news",
          startDelay: 10,
          placeHolder1: ""
        }
        jQuery().newsTicker(options);
    </script>
  </body>
</html>