<?php
include('../include/config.php');

$rowCount = mysql_fetch_array(mysql_query("select count(id) as rowcount, projector_or_tv from project_elearning where project_no='".base64_decode($_REQUEST['prno'])."'"));

$check_grant = mysql_num_rows(mysql_query("select * from project_master where project_no='".base64_decode($_REQUEST['prno'])."' and grant_no!=''"));

$checkNum = mysql_fetch_array(mysql_query("select * from project_elearning_vendor_details where project_no='".base64_decode($_REQUEST['prno'])."'"));
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

<script type="text/javascript" src="source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css" media="screen" />

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
function openFancyBox(par){
  var sln = par;
  var prno = $('#prno').val();
  var schoolName = $('#schoolName'+par).val();
  var schoolId = $('#schoolId'+par).val();
  var schoolCity = $('#schoolCity'+par).val();
  var schoolState = $('#schoolState'+par).val();
  var schoolType = $('#schoolType'+par).val();
  var schoolNo = $('#schoolNo').val();
  var projector = $('#projector').val();
  var folderno = $('#folderno').val();

  $(document).ready(function() {
    $.fancybox({
    openEffect: 'elastic',
    closeEffect: 'elastic',
    prevEffect: 'fade',
    nextEffect: 'fade',
    fitToView: false,
    closeBtn : false,
    maxWidth: 700,
    maxHeight: 600,
    padding: 0,
    type: 'iframe',
    scrolling: 'no',
    href: 'view-school-details.php?sln=' + sln + '&schoolId=' + schoolId + '&schoolName=' + encodeURIComponent(schoolName) + '&schoolCity=' + encodeURIComponent(schoolCity) + '&schoolState=' + schoolState + '&schoolType=' + schoolType + '&prno=' + prno + '&schoolNo=' + schoolNo + '&projector=' + projector + '&folderno=' + folderno,
    /*'afterClose':function () {
         href: '../mycart/registration_success.php',
        }, */
        'afterClose': function(){
      },
    });
  });
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
          <?php include('../../../include/top-head.php'); ?>
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

            <div class="header-text"><h3>Project Details : E-Learning</h3></div>

            <table>
              <tr>
                <td width="15%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of Schools : </td>
                <td width="35%"><input type="text" name="schoolNo" id="schoolNo" value="<?= $rowCount['rowcount'] ?>" class="form-control" readonly="readonly" /></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
              
              <tr>
                <td width="15%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Medium of Teaching : </td>
                <td width="35%">
                  <select name="projector" id="projector" class="form-control" disabled="disabled">
                    <option value="">-- Please Select --</option>

                    <option value="projector" <?php if ($rowCount['projector_or_tv']=='projector'){echo 'selected';} ?>>Projector</option>
                    <option value="tv" <?php if ($rowCount['projector_or_tv']=='tv'){echo 'selected';} ?>>Television</option>
                  </select>
                </td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <table border="1" style="border-collapse: collapse;">
              <tr class="table-head">
                <td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;">School ID</td>
                <td style="line-height: 18px;width: 23%;height: 50px;line-height: 50px;font-size: 90%;">School Name</td>
                <td style="line-height: 18px;width: 17%;height: 50px;line-height: 50px;font-size: 90%;">City/Village</td>
                <td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;">State</td>
                <td style="line-height: 18px;width: 20%;height: 50px;line-height: 50px;font-size: 90%;">School Details</td>
              </tr>

              <?php
                $i = 1;

                $query_getDet = mysql_query("select * from project_elearning where project_no='".base64_decode($_REQUEST['prno'])."'");
                while ($getDet = mysql_fetch_array($query_getDet)){
              ?>
              <tr class="table-row">
                <td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="schoolId<?= $i ?>" id="schoolId<?= $i ?>" value="<?php if ($getDet['school_id']!=''){echo $getDet['school_id'];}else{echo '';} ?>" readonly="readonly" class="form-control" />
                </td>

                <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="schoolName<?= $i ?>" id="schoolName<?= $i ?>" value="<?php if ($getDet['school_name']!=''){echo urldecode($getDet['school_name']);}else{echo '';} ?>" readonly="readonly" class="form-control" onkeyup="letterswithspace(this)" />
                </td>

                <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="schoolCity<?= $i ?>" id="schoolCity<?= $i ?>" value="<?php if ($getDet['school_city']!=''){echo $getDet['school_city'];}else{echo '';} ?>" readonly="readonly" class="form-control" />
                </td>

                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <select name="schoolState<?= $i ?>" id="schoolState<?= $i ?>" disabled="disabled" class="form-control" style="margin: 8px 0;">
                    <option value="">-- Please Select --</option>

                    <?php
                    $query_state = mysql_query("select * from states");
                    while ($state = mysql_fetch_array($query_state)){
                    ?>
                    <option value="<?= $state['state'] ?>" <?php if ($state['state']==$getDet['school_state']){echo 'selected';} ?>><?= $state['state'] ?></option>
                    <?php } ?>
                  </select>
                </td>

                <td style="line-height: 18px;width: 20%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
                  <input type="button" name="fancyBtn" id="fancyBtn" value="View Details" class="btn btn-primary" onclick="openFancyBox(<?= $i ?>)" />
                </td>
              </tr>
              <?php $i++;} ?>
            </table>

            <?php if ($check_grant > 0){ ?>

            <table>
              <tr>
                <td width="100%" style="text-align: center;font-size: 18px;font-weight: 600;color: #757575;">Hardware Vendor Details</td>
              </tr>
            </table>

            <table border="1" style="border-collapse: collapse;">
              <tr class="table-head">
                <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Vendor Name</td>
                <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Projector Model No.</td>
                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;">Total Units</td>
                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;">Total Cost</td>
                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;">Action</td>
              </tr>

              <?php
              $sln_hdw = 1;

              $query_getHdw = mysql_query("select * from project_elearning_vendor_details where project_no='".base64_decode($_REQUEST['prno'])."' and hardware_vendor_name!=''");

              while ($getHdw = mysql_fetch_array($query_getHdw)){
              ?>
              <tr class="table-row">
                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="hdw_vendor_name<?= $sln_hdw ?>" id="hdw_vendor_name<?= $sln_hdw ?>" value="<?= $getHdw['hardware_vendor_name'] ?>" class="form-control" onkeyup="nospecial(this)" />
                </td>

                <input type="hidden" name="dbid<?= $sln_hdw ?>" id="dbid<?= $sln_hdw ?>" value="<?= $getHdw['id'] ?>" />

                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="projector_model_no<?= $sln_hdw ?>" id="projector_model_no<?= $sln_hdw ?>" value="<?= $getHdw['projector_model_no'] ?>" class="form-control" onkeyup="nospecial(this)" />
                </td>

                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="hdw_total_unit<?= $sln_hdw ?>" id="hdw_total_unit<?= $sln_hdw ?>" value="<?= $getHdw['hardware_total_unit'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
                </td>

                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="hdw_total_cost<?= $sln_hdw ?>" id="hdw_total_cost<?= $sln_hdw ?>" value="<?= $getHdw['hardware_total_cost'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
                </td>

                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
                  <input type="button" name="hdw_saveBtn<?= $sln_hdw ?>" id="hdw_saveBtn<?= $sln_hdw ?>" value="Save Details" class="btn btn-primary" onclick="saveHdwDet(<?= $sln_hdw ?>)" />
                </td>
              </tr>
              <?php $sln_hdw++;} ?>
            </table>

            
            <table>
              <tr>
                <td width="100%" style="text-align: center;font-size: 18px;font-weight: 600;color: #757575;">Software Vendor Details</td>
              </tr>
            </table>

            <table border="1" style="border-collapse: collapse;">
              <tr class="table-head">
                <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Vendor Name</td>
                <td style="line-height: 18px;width: 25%;height: 50px;line-height: 50px;font-size: 90%;">Language</td>
                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;">Total Units</td>
                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;">Total Cost</td>
                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;">Action</td>
              </tr>

              <?php
              $sln_sftw = 1;

              $query_getSftw = mysql_query("select * from project_elearning_vendor_details where project_no='".base64_decode($_REQUEST['prno'])."' and software_vendor_name!=''");

              while ($getSftw = mysql_fetch_array($query_getSftw)){
              ?>
              <tr class="table-row">
                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="sftw_vendor_name<?= $sln_sftw ?>" id="sftw_vendor_name<?= $sln_sftw ?>" value="<?= $getSftw['software_vendor_name'] ?>" class="form-control" onkeyup="nospecial(this)" />
                </td>

                <input type="hidden" name="dbid_sft<?= $sln_sftw ?>" id="dbid_sft<?= $sln_sftw ?>" value="<?= $getSftw['id'] ?>" />

                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="language<?= $sln_sftw ?>" id="language<?= $sln_sftw ?>" value="<?= $getSftw['language'] ?>" class="form-control" onkeyup="nospecial(this)" />
                </td>

                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="sftw_total_unit<?= $sln_sftw ?>" id="sftw_total_unit<?= $sln_sftw ?>" value="<?= $getSftw['software_total_unit'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
                </td>

                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="sftw_total_cost<?= $sln_sftw ?>" id="sftw_total_cost<?= $sln_sftw ?>" value="<?= $getSftw['software_total_cost'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
                </td>

                <td style="line-height: 18px;width: 16.66666%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
                  <input type="button" name="sftw_saveBtn<?= $sln_sftw ?>" id="sftw_saveBtn<?= $sln_sftw ?>" value="Save Details" class="btn btn-primary" onclick="saveSftwDet(<?= $sln_sftw ?>)" />
                </td>
              </tr>
              <?php $sln_sftw++;} ?>
            </table>

            <?php } ?>

            <?php
            $fundDet = mysql_fetch_array(mysql_query("select rotary_fund, international_fund, global_grant, external_support, corporate_support, other_funding, description from project_elearning where project_no='".base64_decode($_REQUEST['prno'])."'"));

            $total = $fundDet['rotary_fund'] + $fundDet['international_fund'] + $fundDet['global_grant'] + $fundDet['external_support'] + $fundDet['corporate_support'] + $fundDet['other_funding'];

            $totalAmt = number_format($total, 2, '.', '');
            ?>
            <table>
              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Rotary/IW/District Fund (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 60px;line-height: 60px;font-size: 90%;text-align: center;">
                  <input type="text" name="rotary_fund" id="rotary_fund" value="<?php if ($fundDet['rotary_fund']==''){echo '';}else{echo $fundDet['rotary_fund'];} ?>" class="form-control" style="width: 90%;" readonly="readonly" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">International Funding Collaboration (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="international_fund" id="international_fund" value="<?php if ($fundDet['international_fund']==''){echo '';}else{echo $fundDet['international_fund'];} ?>" class="form-control" style="width: 90%;" readonly="readonly" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Rotary Global Grant Support (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="global_grant" id="global_grant" value="<?php if ($fundDet['global_grant']==''){echo '';}else{echo $fundDet['global_grant'];} ?>" class="form-control" style="width: 90%;" readonly="readonly" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">External Support through RILM</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="external_support" id="external_support" value="<?php if ($fundDet['external_support']==''){echo '';}else{echo $fundDet['external_support'];} ?>" class="form-control" style="width: 90%;" readonly="readonly" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Corporate Support</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="corporate_support" id="corporate_support" value="<?php if ($fundDet['corporate_support']==''){echo '';}else{echo $fundDet['corporate_support'];} ?>" class="form-control" style="width: 90%;" readonly="readonly" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Any other agency/individual funding (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="other_fund" id="other_fund" value="<?php if ($fundDet['other_funding']==''){echo '';}else{echo $fundDet['other_funding'];} ?>" class="form-control" style="width: 90%;" readonly="readonly" />
                </td>

                <td style="width: 30%">&nbsp;</td>
              </tr>

              <tr>
                <td style="width: 30%;height: 60px;font-size: 90%;line-height: 60px;text-align: right;color: #757575;word-spacing: 3px;">Total (INR)</td>

                <td style="line-height: 18px;width: 40%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="text" name="total" id="total" value="<?= number_format($total, 2, '.', '') ?>" class="form-control" style="width: 90%;" readonly="readonly" />
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
                  <textarea style="width: 100%;height: 120px;resize: none;float: left;" class="form-control" name="comments" id="comments" readonly="readonly" ><?= urldecode($fundDet['description']) ?></textarea>
                </td>
              </tr>
            </table>

            <table style="margin: 40px 0 0 0;">
              <tr>
                <td style="text-align: center;">
                  <input type="button" name="submitBtn" id="submitBtn" value="Close" class="btn btn-primary" style="width: 80px;" onclick="window.close()" />
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
  </body>
</html>