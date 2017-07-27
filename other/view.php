<?php include('../include/config.php'); ?>

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

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/dot-luv/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/js/lightbox-plus-jquery.min.js"></script>

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
.img_div{
  width: 100px;
  height: 100px;
  margin: 10px;
  border: 1px solid #ccc;
  float: left;
  text-align: center;
}
.img_div img{
  width: 100%;
  height: 100%;
  text-align: center;
  color: #757575;
  font-size: 90%;
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
        <div class="as-topstrip as-bgcolor" style="background-color: #009dff;">
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
                  <?php include('../../../include/navigation_mem.php'); ?>
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

            <div class="header-text"><h3>Project Details : Other</h3></div>

            <?php
            $getDet = mysql_fetch_array(mysql_query("select * from project_others where project_no='".base64_decode($_REQUEST['prno'])."'"));
            ?>

            <table>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Title : </td>
                <td width="40%">
                  <input type="text" name="project_title" id="project_title" value="<?= $getDet['project_title'] ?>" readonly class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Description : </td>
                <td width="40%">
                  <textarea class="form-control" name="project_description" id="project_description" readonly style="height: 100px;resize: none;"><?= urldecode($getDet['project_description']) ?></textarea>
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Venue : </td>
                <td width="40%">
                  <input type="text" name="project_venue" id="project_venue" value="<?= $getDet['project_venue'] ?>" readonly class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of Units Supplied : </td>
                <td width="40%"><input type="text" name="unit_supplied" id="unit_supplied" value="<?= $getDet['units_supplied'] ?>" readonly class="form-control" /></td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of Beneficiaries : </td>
                <td width="40%"><input type="text" name="beneficiary" id="beneficiary" value="<?= $getDet['beneficiary'] ?>" readonly class="form-control" /></td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Partner Organization / Agency : </td>
                <td width="40%"><input type="text" name="partner_org" id="partner_org" value="<?= $getDet['partner'] ?>" readonly class="form-control" /></td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Outlay : </td>
                <td width="40%">
                  <input type="text" name="outlay" id="outlay" value="<?= $getDet['outlay'] ?>" readonly class="form-control" style="width: 70%;" />
                  <span style="color: #757575;padding: 0 0 0 5px;">(In Rupee)</span>
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Date : </td>
                <td width="40%">
                  <input type="text" name="project_date" id="project_date" value="<?= date('d-m-Y', strtotime($getDet['project_date'])) ?>" class="form-control" readonly />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Contact Details : </td>
                <td width="40%">
                  <input type="text" name="contact_details" id="contact_details" value="<?= $getDet['contact_details'] ?>" readonly class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Email ID : </td>
                <td width="40%">
                  <input type="text" name="Email" id="Email" value="<?= $getDet['email'] ?>" readonly class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <table style="margin: 20px 0 0 0;">
              <tr><td width="100%" colspan="3" style="background-color: #4a4a4a;color: #fff;box-sizing: border-box;padding: 0 20px;">Uploaded Images</td></tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <?php
            for ($img = 1; $img <= 25; $img++){

              if ($getDet['image_'.$img]!=''){
            ?>
            <div class="img_div">
                <a href="<?= $getDet['image_'.$img] ?>" data-lightbox="<?= $getDet['image_'.$img] ?>" data-title=""><img src="<?= $getDet['image_'.$img] ?>" alt="No Image" /></a>
            </div>

            <?php }} ?>

            <table style="margin: 30px 0 0 0;">
              <tr>
                <td width="100%" colspan="3" style="text-align: center;">
                  <input type="button" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Close" onclick="window.close()" />    
                </td>
              </tr>
            </table>

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