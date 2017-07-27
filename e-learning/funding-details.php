<?php
include('../include/config.php');

$grantNo = mysql_fetch_array(mysql_query("select grant_no from project_master where project_no='".base64_decode($_REQUEST['prno'])."'"));

$getDet = mysql_fetch_array(mysql_query("select * from project_elearning where project_no='".base64_decode($_REQUEST['prno'])."'"));

$total = $getDet['rotary_fund'] + $getDet['international_fund'] + $getDet['global_grant'] + $getDet['external_support'] + $getDet['corporate_support'] + $getDet['other_funding'];
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
  width: 10%;
  position: absolute;
  background: #edb542;
  top: 30px;
  left: 45%;
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
/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}

function wordCount(input){
  var words = input.value.match(/\S+/g).length;

  if (words > 300) {

    var trimmed = $(input).val().split(/\s+/, 300).join(" ");
    $(input).val(trimmed + " ");
  }
  else{
    $('#comments').text(300-words);
  }
}
function validateData(){

  var rotary_fund = $('#rotary_fund').val();

  if (rotary_fund==''){

    alert('Please enter the amount of Rotary/IW/District Fund');
    return false;
  }
}
function showTotal(){

  var rotary_fund = $('#rotary_fund').val();
  var international_fund = $('#international_fund').val();
  var global_grant = $('#global_grant').val();
  var external_support = $('#external_support').val();
  var corporate_support = $('#corporate_support').val();
  var other_fund = $('#other_fund').val();

  var $total = Number(rotary_fund) + Number(international_fund) + Number(global_grant) + Number(external_support) + Number(corporate_support) + Number(other_fund);

  $('#total').val($total);
}
</script>   

</head>
<body style="padding-right:0px;">

  <input type="hidden" name="prno" id="prno" value="<?= base64_decode($_REQUEST['prno']) ?>" />
  <input type="hidden" name="folderno" id="folderno" value="<?= base64_decode($_REQUEST['folderno']) ?>" />

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

            <div class="header-text"><h3>Funding Details : E-Learning</h3></div>

            <form action="" method="post" onsubmit="return validateData()">

            <table>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Rotary/IW/District Fund (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 60px;line-height: 60px;font-size: 90%;text-align: center;">
                  <input type="text" name="rotary_fund" id="rotary_fund" value="<?php if ($getDet['rotary_fund']==''){echo '';}else{echo $getDet['rotary_fund'];} ?>" class="form-control" style="width: 90%;" onkeyup="numbersOnly(this)" onchange="showTotal()" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">International Funding Collaboration (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="international_fund" id="international_fund" value="<?php if ($getDet['international_fund']==''){echo '';}else{echo $getDet['international_fund'];} ?>" class="form-control" style="width: 90%;" onkeyup="numbersOnly(this)" onchange="showTotal()" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Rotary Global Grant Support (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="global_grant" id="global_grant" value="<?php if ($getDet['global_grant']==''){echo '';}else{echo $getDet['global_grant'];} ?>" class="form-control" style="width: 90%;" onkeyup="numbersOnly(this)" onchange="showTotal()" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">External Support through RILM</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="external_support" id="external_support" value="<?php if ($getDet['external_support']==''){echo '';}else{echo $getDet['external_support'];} ?>" class="form-control" style="width: 90%;" onkeyup="numbersOnly(this)" onchange="showTotal()" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Corporate Support</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="corporate_support" id="corporate_support" value="<?php if ($getDet['corporate_support']==''){echo '';}else{echo $getDet['corporate_support'];} ?>" class="form-control" style="width: 90%;" onkeyup="numbersOnly(this)" onchange="showTotal()" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Any other agency/individual funding (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="other_fund" id="other_fund" value="<?php if ($getDet['other_funding']==''){echo '';}else{echo $getDet['other_funding'];} ?>" class="form-control" style="width: 90%;" onkeyup="numbersOnly(this)" onchange="showTotal()" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Total (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="total" id="total" value="<?= number_format($total, 2, '.', '') ?>" class="form-control" style="width: 90%;" onkeyup="numbersOnly(this)" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>
            </table>

            <table style="margin: 30px 0 0 0;">
              <tr>
                <td style="line-height: 18px;width: 14%;height: 40px;padding: 10px 0 0 0;color: #757575;">SHORT DESCRIPTION <span style="font-size: 12px;">(maximum 300 words)</span></td>
              </tr>

              <tr>
                <td width="100%">
                  <textarea style="width: 100%;height: 120px;resize: none;float: left;" class="form-control" name="comments" id="comments" onkeyup="wordCount(this)"><?= strtoupper(urldecode($getDet['description'])) ?></textarea>
                </td>
              </tr>
            </table>

            <table style="margin: 40px 0 0 0;">
              <tr>
                <td style="text-align: center;">
                  <?php if ($grantNo['grant_no'] != ''){ ?>

                  <a href="edit-vendor-details.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>"><input type="button" name="backBtn" id="backBtn" value="Go Back" class="btn btn-primary" style="width: 80px;margin: 0 20px 0 0;" /></a>

                  <?php }else{ ?>

                  <a href="edit.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>"><input type="button" name="backBtn" id="backBtn" value="Go Back" class="btn btn-primary" style="width: 80px;margin: 0 20px 0 0;" /></a>

                  <?php } ?>

                  <input type="submit" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" style="width: 80px;" />
                </td>
              </tr>
            </table>

            </form>


            <?php
            if (isset($_REQUEST['submitBtn'])){

              $update = "update project_elearning set rotary_fund='".$_REQUEST['rotary_fund']."', international_fund='".$_REQUEST['international_fund']."', global_grant='".$_REQUEST['global_grant']."', external_support='".$_REQUEST['external_support']."', corporate_support='".$_REQUEST['corporate_support']."', other_funding='".$_REQUEST['other_fund']."', description='".urlencode($_REQUEST['comments'])."' where project_no='".base64_decode($_REQUEST['prno'])."'";

              mysql_query($update);

              $updateMaster = "update project_master set status='complete' where project_no='".base64_decode($_REQUEST['prno'])."'";

              mysql_query($updateMaster);
              
            ?>
            <script type="text/javascript">
            alert('Your project has been uploaded successfully');
            window.location = '../index.php';
            </script>
            <?php
            }
            ?>
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