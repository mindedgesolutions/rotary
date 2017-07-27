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
$(function() {
    $("#project_date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2150",
        maxDate: '0',
        dateFormat: 'dd-mm-yy'
    });
});
function ValidateEmail(Email){
    var email=$('#Email').val();

    if(email!=''){
        var email_valid= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!email_valid.test(email)){

          alert('Invalid email address');
          document.getElementById('Email').value = '';
          return false;
        }
    }
}
function validateForm(){
  var project_title = $('#project_title').val();
  var project_description = $('#project_description').val();
  var project_venue = $('#project_venue').val();
  var outlay = $('#outlay').val();
  var project_date = $('#project_date').val();
  var Email = $('#Email').val();

  if (project_title==''){
    alert('Please enter project title');
    document.getElementById('project_title').focus();
    return false;
  }else if (project_description==''){
    alert("Please enter project description");
    document.getElementById('project_description').focus();
    return false;
  }else if (project_venue==''){
    alert("Please enter project venue");
    document.getElementById('project_venue').focus();
    return false;
  }else if (outlay==''){
    alert("Please enter outlay amount");
    document.getElementById('outlay').focus();
    return false;
  }else if (project_date==''){
    alert("Please select project date");
    document.getElementById('project_date').focus();
    return false;
  }else if (Email==''){
    alert("Please enter email address");
    document.getElementById('Email').focus();
    return false;
  }
}
function validateFile(par){
  
  var property = document.getElementById('file'+par).files[0];

  var image_name = property.name;
  var image_extension = image_name.split('.').pop().toLowerCase();

  if (jQuery.inArray(image_extension, ['png', 'jpg', 'jpeg', 'JPG', 'PNG']) == -1){

      alert('Invalid file extension. Please select an image (.jpg, .png only)');
      document.getElementById('file'+par).value = '';
  }
  var image_size = property.size;

  if (image_size > 900000){

      alert('Image is too large. Please select an image of smaller size');
      document.getElementById('file'+par).value = '';
  }
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
            if (isset($_REQUEST['submitBtn'])){

              $name_array = $_FILES['file_array']['name'];
              $tmp_name_array = $_FILES['file_array']['tmp_name'];

              for ($n = 1; $n <= 25; $n++){

                if ($name_array[$n]!=''){
                  $dst = 'images/'.base64_decode($_REQUEST['folderno']).'/'.$name_array[$n];
                }else{
                  $dst = '';
                }

                move_uploaded_file($tmp_name_array[$n], 'images/'.base64_decode($_REQUEST['folderno']).'/'.$name_array[$n]);

                $check = mysql_num_rows(mysql_query("select * from project_others where project_no='".base64_decode($_REQUEST['prno'])."'"));

                if ($check==0){

                  $insert_image = "insert into project_others(project_no, image_".$n.") values('".base64_decode($_REQUEST['prno'])."', '".$dst."')";

                  mysql_query($insert_image);
                }
                else{
                  $update_image = "update project_others set image_".$n."='".$dst."' where  project_no='".base64_decode($_REQUEST['prno'])."'";

                  mysql_query($update_image);
                }
              }

              $update_remaining = "update project_others set project_title='".$_REQUEST['project_title']."', project_description='".urlencode($_REQUEST['project_description'])."', project_venue='".$_REQUEST['project_venue']."', units_supplied='".$_REQUEST['unit_supplied']."', beneficiary='".$_REQUEST['beneficiary']."', partner='".$_REQUEST['partner_org']."', outlay='".$_REQUEST['outlay']."', project_date='".date('Y-m-d', strtotime($_REQUEST['project_date']))."', contact_details='".$_REQUEST['contact_details']."', email='".$_REQUEST['Email']."', submitted_on='".date('Y-m-d')."' where project_no='".base64_decode($_REQUEST['prno'])."'";

              mysql_query($update_remaining);

              $update_master = "update project_master set upload_date='".date('Y-m-d')."', status='complete' where project_no='".base64_decode($_REQUEST['prno'])."'";

              mysql_query($update_master);
            ?>
            <script type="text/javascript">
            alert('Project details have been saved successfully');
            window.location = '../index.php';
            </script>
            <?php
            }
            ?>

            <form action="" method="post" onsubmit="return validateForm()" enctype='multipart/form-data' autocomplete="off">

            <table>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Title <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="project_title" id="project_title" value="" onkeyup="nospecial(this)" class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Description <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <textarea class="form-control" name="project_description" id="project_description" style="height: 100px;resize: none;"></textarea>
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Venue <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="project_venue" id="project_venue" value="" onkeyup="nospecial(this)" class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of Units Supplied : </td>
                <td width="40%"><input type="text" name="unit_supplied" id="unit_supplied" value="" onkeyup="numbersOnly(this)" class="form-control" /></td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of Beneficiaries : </td>
                <td width="40%"><input type="text" name="beneficiary" id="beneficiary" value="" onkeyup="numbersOnly(this)" class="form-control" /></td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Partner Organization / Agency : </td>
                <td width="40%"><input type="text" name="partner_org" id="partner_org" value="" onkeyup="nospecial(this)" class="form-control" /></td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Outlay <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="outlay" id="outlay" value="" onkeyup="numbersOnly(this)" class="form-control" style="width: 70%;" />
                  <span style="color: #757575;padding: 0 0 0 5px;">(In Rupee)</span>
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Date <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="project_date" id="project_date" value="" class="form-control" readonly="readonly" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Contact Details : </td>
                <td width="40%">
                  <input type="text" name="contact_details" id="contact_details" value="" class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Email ID <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="Email" id="Email" value="" onblur="return ValidateEmail(Email)" class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <table style="margin: 20px 0 0 0;">
              <tr><td width="100%" colspan="3" style="background-color: #4a4a4a;color: #fff;box-sizing: border-box;padding: 0 20px;">Upload Images</td></tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <?php for ($i = 1; $i <= 25; $i++){ ?>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Image - <?= $i ?> : </td>
                <td width="40%">
                  <input type="file" name="file_array[]" id="file<?= $i ?>" value="" onchange="validateFile(<?= $i ?>)" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
              <?php } ?>

              <tr>
                <td width="100%" colspan="3" style="text-align: center;">
                  <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Save Project" />    
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