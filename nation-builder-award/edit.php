<?php
include('../../include/config.php');

$details = mysql_fetch_array(mysql_query("select no_schools, award_date from project_teacher_support_nation where project_no='".base64_decode($_REQUEST['prno'])."'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('../../../../include/title.php'); ?></title>
<!-- Css Files -->
<?php include('../../../../include/favicon.php'); ?>

<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../../../css/font-awesome.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/owl.carousel.css" rel="stylesheet">
<link href="../../css/color.css" rel="stylesheet">
<link href="../../css/dl-menu.css" rel="stylesheet">
<link href="../../css/flexslider.css" rel="stylesheet"> 
<link href="../../css/prettyphoto.css" rel="stylesheet">
<link href="../../css/responsive.css" rel="stylesheet">
<link href="../../css/menu_v.css" rel="stylesheet" type="text/css" />

<script src="../../js/jquery.min.js"></script>
<script src="../../js/modernizr.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.dlmenu.js"></script>
<script src="../../js/flexslider-min.js"></script>
<script src="../../js/goalProgress.min.js"></script>
<script src="../../js/jquery.countdown.min.js"></script>
<script src="../../js/jquery.prettyphoto.js"></script>
<script src="../../js/waypoints-min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/newsticker.js"></script>
<script src="../../js/parallex.js"></script>
<script src="../../js/styleswitch.js"></script>
<script src="../../js/functions.js"></script>

<script type="text/javascript" src="source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css" media="screen" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/dot-luv/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

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
.table-head{
  background-color: #333;
  color: #fff;
  text-align: center;
}
</style>

<script>
$(function() {
    $("#distDate").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2150",
        maxDate: '0',
        dateFormat: 'dd-mm-yy'
    });
});
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
function nospecial(input){
  var regex = /[^a-zA-Z0-9 ]/gi;
  input.value = input.value.replace(regex, "");
}
function openFancyBox(par){
  var sln = par;
  var prno = $('#prno').val();
  var schoolId = $('#schoolId'+par).val();
  var schoolName = $('#schoolName'+par).val();
  var schoolType = $('#schoolType'+par).val();
  var no_teacher_evaluated = $('#no_teacher_evaluated'+par).val();
  var no_teacher_awarded = $('#no_teacher_awarded'+par).val();
  var subject = $('#subject'+par).val();
  var distDate = $('#distDate').val();
  var schoolNo = $('#schoolNo').val();

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
    href: 'upload_image.php?sln=' + sln + '&prno=' + prno + '&schoolId=' + schoolId + '&schoolName=' + encodeURIComponent(schoolName) + '&schoolType=' + schoolType + '&no_teacher_evaluated=' + no_teacher_evaluated + '&no_teacher_awarded=' + no_teacher_awarded + '&subject=' + subject + '&distDate=' + distDate + '&schoolNo=' + schoolNo,
    /*'afterClose':function () {
         href: '../mycart/registration_success.php',
        }, */
        'afterClose': function(){
      },
    });
  });
}
function saveCenter(){

  var prno = $('#prno').val();
  var prno_enc = $('#prno_enc').val();
  var folderno = $('#folderNo_enc').val();
  var schoolNo = $('#schoolNo').val();

  $.ajax({
    url: 'save-school-info.php',
    type: 'post',
    data: 'prno=' + prno + '&schoolNo=' + schoolNo,
    success: function(f){

      if (f==1){
        alert('Please fill all the information before you proceed');
      }else{
        alert('Project details saved successfully');
        window.location = '../../index.php';
      }
    }
  })
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
          <?php include('../../include/top-head.php'); ?>
        </div>
      </div>
      <!--// TopStrip //-->

      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-header-bar">
          <div class="row">
            <div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
              <div class="col-md-2">
                <a style="float:left;" href="index.php" class="logo1"><img src="../../images/logo2.png" alt=""></a>
              </div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('../../include/navigation_mem.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('../../include/responsive-menu.php'); ?>

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

            <div class="header-text"><h3>Project Details : Nation Builder Award</h3></div>

            <table>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Date of award distribution : </td>
                <td width="25%"><input type="text" name="distDate" id="distDate" value="<?= date('d-m-Y', strtotime($details['award_date'])) ?>" readonly="readonly" class="form-control" /></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Number of Schools observed : </td>
                <td width="25%"><input type="text" name="schoolNo" id="schoolNo" value="<?= $details['no_schools'] ?>" onkeyup="numbersOnly(this)" class="form-control" /></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <table border="1" style="border-collapse: collapse;">
              <tr class="table-head">
                <td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
                <td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">School ID</td>
                <td style="line-height: 18px;width: 17%;height: 50px;line-height: 50px;font-size: 90%;">School Name</td>
                <td style="line-height: 18px;width: 14%;height: 50px;line-height: 50px;font-size: 90%;">School Type</td>
                <td style="line-height: 18px;width: 12%;height: 50px;line-height: 18px;font-size: 90%;padding: 8px 0 0 0;">No. of Teachers Evaluated</td>
                <td style="line-height: 18px;width: 12%;height: 50px;line-height: 18px;font-size: 90%;padding: 8px 0 0 0;">No. of Teachers Awarded</td>
                <td style="line-height: 18px;width: 11%;height: 50px;line-height: 50px;font-size: 90%;">Subject Taught</td>
                <td style="line-height: 18px;width: 21%;height: 50px;line-height: 18px;font-size: 90%;padding: 8px 0 0 0;">Documents / Images</td>
              </tr>

              <?php
              $i = 1;

              $query_getDet = mysql_query("select * from project_teacher_support_nation where project_no='".base64_decode($_REQUEST['prno'])."'");
              while ($getDet = mysql_fetch_array($query_getDet)){
              ?>
              <tr class="table-row">
                <td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

                <td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="schoolId<?= $i ?>" id="schoolId<?= $i ?>" value="<?= $getDet['school_id'] ?>" class="form-control" />
                </td>

                <td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="schoolName<?= $i ?>" id="schoolName<?= $i ?>" value="<?= urldecode($getDet['school_name']) ?>" class="form-control" onkeyup="letterswithspace(this)" />
                </td>

                <td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <select name="schoolType<?= $i ?>" id="schoolType<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;">
                    <option value="">-- Select --</option>

                    <option value="Government" <?php if ($getDet['school_type']=='Government'){echo 'selected';} ?>>Government</option>
                    <option value="Government-aided" <?php if ($getDet['school_type']=='Government-aided'){echo 'selected';} ?>>Government-aided</option>
                  </select>
                </td>

                <td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="no_teacher_evaluated<?= $i ?>" id="no_teacher_evaluated<?= $i ?>" value="<?= $getDet['teacher_evaluated'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
                </td>

                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="no_teacher_awarded<?= $i ?>" id="no_teacher_awarded<?= $i ?>" value="<?= $getDet['teacher_awarded'] ?>" class="form-control" onkeyup="numbersOnly(this)" />
                </td>

                <td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="subject<?= $i ?>" id="subject<?= $i ?>" value="<?= $getDet['subject_taught'] ?>" class="form-control" onkeyup="letterswithspace(this)" />
                </td>

                <td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;">
                  <input type="button" name="showImg<?= $i ?>" id="showImg<?= $i ?>" value="Upload" class="btn btn-primary" onclick="openFancyBox(<?= $i ?>)" />
                </td>
              </tr>
              <?php $i++;} ?>
            </table>

<table style="margin: 40px 0 0 0;">
  <tr>
    <td style="text-align: center;">
      <input type="button" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" style="width: 80px;" onclick="saveCenter()" />
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
      <?php include('../../include/footer.php'); ?>
    </div>
    <?php include('../../include/copy-right.php'); ?>
  </div>
  <!--// Footer //-->
  <div class="clearfix"></div>
    
  <!--// Main Wrapper //-->
  </body>
</html>