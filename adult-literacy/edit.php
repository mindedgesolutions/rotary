<?php
include('../include/config.php');

$centerNo = mysql_num_rows(mysql_query("select * from project_adult_literacy where project_no='".base64_decode($_REQUEST['prno'])."'"));
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
function nospecial(input){
  var regex = /[^a-zA-Z0-9 ]/gi;
  input.value = input.value.replace(regex, "");
}
function openFancyBox_start(par){
  var sln = par;
  var prno = $('#prno').val();
  var centerId = $('#centerId'+par).val();
  var centerName = $('#centerName'+par).val();
  var centerCity = $('#centerCity'+par).val();
  var centerState = $('#centerState'+par).val();
  var centerNo = $('#centerNo').val();
  var no_adult_learner = $('#no_adult_learner'+par).val();
  var teachingLanguage = $('#teachingLanguage'+par).val();
  var primerUsed = $('#primerUsed'+par).val();

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
    href: 'session_start_details.php?sln=' + sln + '&centerId=' + centerId + '&centerName=' + encodeURIComponent(centerName) + '&centerCity=' + centerCity + '&centerState=' + centerState + '&prno=' + prno + '&centerNo=' + centerNo + '&no_adult_learner=' + no_adult_learner + '&teachingLanguage=' + teachingLanguage + '&primerUsed=' + primerUsed,
    /*'afterClose':function () {
         href: '../mycart/registration_success.php',
        }, */
        'afterClose': function(){
      },
    });
  });
}
function openFancyBox_end(par){
  var sln = par;
  var prno = $('#prno').val();
  var centerId = $('#centerId'+par).val();
  var centerName = $('#centerName'+par).val();
  var centerCity = $('#centerCity'+par).val();
  var centerState = $('#centerState'+par).val();
  var centerNo = $('#centerNo').val();
  var no_adult_learner = $('#no_adult_learner'+par).val();
  var teachingLanguage = $('#teachingLanguage'+par).val();
  var primerUsed = $('#primerUsed'+par).val();

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
    href: 'session_end_details.php?sln=' + sln + '&centerId=' + centerId + '&centerName=' + encodeURIComponent(centerName) + '&centerCity=' + centerCity + '&centerState=' + centerState + '&prno=' + prno + '&centerNo=' + centerNo + '&no_adult_learner=' + no_adult_learner + '&teachingLanguage=' + teachingLanguage + '&primerUsed=' + primerUsed,
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

            <div class="header-text"><h3>Project Details : Adult Literacy</h3></div>

            <table>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of Adult Literacy Centres : </td>
                <td width="25%"><input type="text" name="centerNo" id="centerNo" value="<?= $centerNo ?>" onkeyup="numbersOnly(this)" class="form-control" /></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <table border="1" style="border-collapse: collapse;">
              <tr class="table-head">
                <td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
                <td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">Center ID</td>
                <td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;">Center Name</td>
                <td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;">City/Village</td>
                <td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;">State</td>
                <td style="line-height: 18px;width: 10%;height: 50px;font-size: 90%;padding: 8px 0 0 0;">No. of Adult Learner</td>
                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;">Teaching Language</td>
                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;">Primer Used</td>
                <td style="line-height: 50px;width: 11%;height: 50px;font-size: 90%;">Start Session</td>
                <td style="line-height: 50px;width: 11%;height: 50px;font-size: 90%;">End Session</td>
              </tr>

              <?php
                $i = 1;

                $upload_date = mysql_fetch_array(mysql_query("select * from project_master where project_no='".base64_decode($_REQUEST['prno'])."'"));

                $expDate = date('Y-m-d', strtotime("+10 day", strtotime($upload_date['upload_date'])));/*---Change +10--*/

                $query_getDet = mysql_query("select * from project_adult_literacy where project_no='".base64_decode($_REQUEST['prno'])."'");
                while ($getDet = mysql_fetch_array($query_getDet)){
              ?>
              <tr class="table-row">
                <td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $i.'.' ?></td>

                <td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="centerId<?= $i ?>" id="centerId<?= $i ?>" value="<?= $getDet['center_id'] ?>" class="form-control" <?php if (date('Y-m-d') > $expDate){echo 'disabled';} ?> />
                </td>

                <td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="centerName<?= $i ?>" id="centerName<?= $i ?>" value="<?= urldecode($getDet['center_name']) ?>" class="form-control" onkeyup="letterswithspace(this)" <?php if (date('Y-m-d') > $expDate){echo 'disabled';} ?> />
                </td>

                <td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="centerCity<?= $i ?>" id="centerCity<?= $i ?>" value="<?= $getDet['city'] ?>" class="form-control" onkeyup="letterswithspace(this)" <?php if (date('Y-m-d') > $expDate){echo 'disabled';} ?> />
                </td>

                <td style="line-height: 18px;width: 18%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <select name="centerState<?= $i ?>" id="centerState<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;" <?php if (date('Y-m-d') > $expDate){echo 'disabled';} ?>>
                    <option value="">-- Select --</option>

                    <?php
                    $get_state = mysql_query("select * from states");
                    while ($state = mysql_fetch_array($get_state)){
                    ?>
                    <option value="<?= $state['state'] ?>" <?php if($state['state']==$getDet['state']){echo 'selected';} ?>><?= $state['state'] ?></option>
                    <?php } ?>
                  </select>
                </td>

                <td style="line-height: 18px;width: 10%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="no_adult_learner<?= $i ?>" id="no_adult_learner<?= $i ?>" value="<?= $getDet['no_adult_learner'] ?>" class="form-control" onkeyup="numbersOnly(this)" <?php if (date('Y-m-d') > $expDate){echo 'disabled';} ?> />
                </td>

                <td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <input type="text" name="teachingLanguage<?= $i ?>" id="teachingLanguage<?= $i ?>" value="<?= $getDet['teaching_language'] ?>" class="form-control" onkeyup="letterswithspace(this)" <?php if (date('Y-m-d') > $expDate){echo 'disabled';} ?> />
                </td>

                <td style="line-height: 18px;width: 7%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                  <select name="primerUsed<?= $i ?>" id="primerUsed<?= $i ?>" class="form-control" style="margin: 8px 0 0 0;" <?php if (date('Y-m-d') > $expDate){echo 'disabled';} ?>>
                    <option value="">-- Select --</option>

                    <option value="RILM Primer" <?php if ($getDet['primer_type']=='RILM Primer'){echo 'selected';} ?>>RILM Primer</option>
                    <option value="SRC Primer" <?php if ($getDet['primer_type']=='SRC Primer'){echo 'selected';} ?>>SRC Primer</option>
                    <option value="Other" <?php if ($getDet['primer_type']=='Other'){echo 'selected';} ?>>Other</option>
                  </select>
                </td>

                <td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
                  <input type="button" name="startBtn" id="startBtn" value="Update" class="btn btn-primary" onclick="openFancyBox_start(<?= $i ?>)" <?php if (date('Y-m-d') > $expDate){echo 'disabled';}else{echo 'enabled';} ?> />
                </td>

                <td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
                  <input type="button" name="endBtn" id="endBtn" value="Update" class="btn btn-primary" onclick="openFancyBox_end(<?= $i ?>)" <?php if (date('Y-m-d') > $expDate){echo 'enabled';}else{echo 'disabled';} ?> />
                </td>
              </tr>
              <?php $i++;} ?>
            </table>

            <table style="margin: 40px 0 0 0;">
            <tr>
            <td style="text-align: center;">
            
              <a href="funding-details.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>"><input type="button" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" style="width: 80px;" /></a>
            
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