<?php
include('../include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('../include/title.php'); ?></title>
<!-- Css Files -->
<?php include('../include/favicon.php'); ?>

<link href="http://rotaryteach.org/css/bootstrap.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/font-awesome.css" rel="stylesheet">
<link href="http://rotaryteach.org/style.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/owl.carousel.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/color.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/dl-menu.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/flexslider.css" rel="stylesheet"> 
<link href="http://rotaryteach.org/css/prettyphoto.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/responsive.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/menu_v.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.right_section{
  width: 70%;
  height: auto;
  float: left;
  margin: 40px 0 0 0;
  padding: 15px;
}
.left_section{
  width: 30%;
  height: auto;
  float: left;
  margin: 40px 0 0 0;
  padding: 15px;
  box-sizing: border-box;
  border-left: 1px dotted #494949;
}
.left_section h3, .right_section h3{
  color: #494949;
  font-size: 110%;
  position: relative;
}
.left_section h3:after, .right_section h3:after{
  content: '';
  height: 2px;
  width: 15%;
  position: absolute;
  background: #edb542;
  top: 30px;
  left: 0%;
}
.login_form{
  width: 100%;
  height: auto;
  float: left;
  margin: 20px 0 0 0;
}
.registration_form{
  width: 85%;
  height: auto;
  float: left;
  margin: 20px 0 0 0;
}
</style>

<script type="text/javascript">
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
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}
/*-------------------No Special Character--------------------------*/
function nospecial(input){
    var regex = /[^a-zA-Z0-9 ]/gi;
    input.value = input.value.replace(regex, "");
}

function CloseAndRefresh(){
  opener.location.reload(true);
  self.close();
}
function showLogin(){
  var username = $('#username').val();
  var password = $('#password').val();

  if (username!='' && password!=''){
    $('#loginBtn').fadeIn('1500');
  }else{
    $('#loginBtn').hide();
  }
}
function showTable(mobileNo){
  var mobile_No = $('#mobileNo').val();

  var mobno1 = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
  if(mobileNo.value.match(mobno1)){
    $.ajax({

      url: 'ajax/check-mobile.php',
      type: 'post',
      data: 'mobile_No=' + mobile_No,
      success: function(f){

        if (f==1){

          alert(mobile_No + ' is already registered');
          document.getElementById('mobileNo').value = '';
          return false;
        }else{

          $('#register_table').fadeIn('1500');
        }
      }
    })
  }else{

    alert(mobile_No + ' is not a valid mobile no');
    document.getElementById('mobileNo').value = '';
    $('#register_table').hide('');
  }
}
function showImage(){
  var password = $('#password').val();
  var confirm_password = $('#confirm_password').val();

  if (confirm_password==password){

    $('#confirm_wrong').hide();
    $('#confirm_right').show();
  }else if (confirm_password!='' && confirm_password!=password){

    $('#confirm_wrong').show();
    $('#confirm_right').hide();
  }else{

    $('#confirm_wrong').hide();
    $('#confirm_right').hide();
  }
}
function getClub(){
  var district = $('#district').val();

  if (district!=''){

    $.ajax({
      url: 'ajax/get-club.php',
      type: 'post',
      data: 'district=' + district,
      success: function(f){
        $('#club').html(f);
      }
    })
  }else{

    $('#club').html('');
  }
}
</script>

</head>

<body style="padding-right:0px;">

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
            <a style="float:left;" href="../index.php" class="logo1"><img src="http://rotaryteach.org/images/logo2.png" alt=""></a>
          </div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('../include/navigation_new.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('../include/responsive-menu.php'); ?>

              </div>
        </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header //-->

      <div class="as-minheader">
       
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Project Upload</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="../index.php">Home</a></li>
                  <li><a href="#">Member Login</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="right_section">
              <h3>New member? Register with us</h3>

              <div class="registration_form">
                <table>
                  <tr style="height: 50px;">
                    <td width="100%"><input type="text" name="mobileNo" id="mobileNo" value="" placeholder="Enter Mobile No." class="form-control" onchange="return showTable(mobileNo)" onkeyup="numbersOnly(this)" ></td>
                  </tr>

                  <tr>
                    <td>
                      <div class="register_table" id="register_table" style="display: none;">
                      <table>
                        <tr style="height: 50px;">
                          <td width="94%" colspan="3">
                            <select name="userType" id="userType" class="form-control">
                              <option value="">-- Select User Type --</option>

                              <option value="donor">Donor</option>
                              <option value="evalu_dg">Evaluation DG</option>
                              <option value="evalu_dlcc">Evaluation DLCC</option>
                              <option value="evalu_zlc">Evaluation ZLC</option>
                            </select>
                          </td>
                          <td width="6%">&nbsp;</td>
                        </tr>

                        <tr style="height: 50px;">
                          <td width="45%">
                            <select name="district" id="district" class="form-control" onchange="getClub()">
                              <option value="">-- Select District --</option>
                              <?php
                              $query_district = mysql_query("select distinct(district_code) from all_district_club where active='yes'");
                              while ($district = mysql_fetch_array($query_district)){
                              ?>
                              <option value="<?= $district['district_code'] ?>"><?= $district['district_code'] ?></option>
                              <?php } ?>
                            </select>
                          </td>

                          <td width="4%">&nbsp;</td>

                          <td width="45%">
                            <select name="club" id="club" class="form-control">
                              <option value="">-- Select Club --</option>
                            </select>
                          </td>

                          <td width="6%">&nbsp;</td>
                        </tr>

                        <tr style="height: 50px;">
                          <td>
                            <input type="text" name="first_name" id="first_name" value="" placeholder="Enter first name" class="form-control">
                          </td>

                          <td>&nbsp;</td>

                          <td>
                            <input type="text" name="last_name" id="last_name" value="" placeholder="Enter last name" class="form-control">
                          </td>

                          <td>&nbsp;</td>
                        </tr>

                        <tr style="height: 50px;">
                          <td colspan="3"><input type="text" name="email" id="email" value="" placeholder="Enter Email Address" class="form-control" ></td>
                          <td>&nbsp;</td>
                        </tr>

                        <tr style="height: 50px;">
                          <td colspan="3"><input type="password" name="password" id="password" value="" placeholder="Enter Password" class="form-control" ></td>
                          <td>&nbsp;</td>
                        </tr>

                        <tr style="height: 50px;">
                          <td colspan="3">
                            <input type="password" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Password" class="form-control" onkeyup="showImage()" >

                            <td>
                              <span id="confirm_wrong" style="display: none;"><img src="wrong.png" style="height: 25px;width: auto;margin: 0 0 0 15px;"></span>

                              <span id="confirm_right" style="display: none;"><img src="right.png" style="height: 25px;width: auto;margin: 0 0 0 15px;"></span>
                            </td>
                          </td>
                        </tr>

                        <tr><td colspan="4" style="height: 20px;"></td></tr>

                        <tr style="height: 50px;">
                          <td colspan="3" style="text-align: right;">
                            <input type="button" name="submitBtn" id="submitBtn" value="Register" class="btn btn-primary" style="width: 100px;margin: 0 10px 0 0;" />

                            <input type="button" name="resetBtn" id="resetBtn" value="Reset" class="btn btn-primary" style="width: 100px;" />
                          </td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                      </div>
                    </td>
                  </tr>

                  

                  <tr style="height: 50px;">
                    <td colspan="2">
                      
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="left_section">
              <h3>Login to your account</h3>

              <div class="login_form">
                <table>
                  <tr style="height: 50px;">
                    <td><input type="text" name="username" id="username" value="" placeholder="Enter Username" class="form-control"></td>
                  </tr>

                  <tr style="height: 50px;">
                    <td><input type="password" name="password" id="password" value="" placeholder="Enter Password" class="form-control" ></td>
                  </tr>

                  <tr style="height: 50px;">
                    <td>
                      <input type="button" name="loginBtn" id="loginBtn" value="Login" class="btn btn-primary" style="width: 100px;" />
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

  <div class="col-md-12" style="height: 50px;"></div>

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
    <script src="http://rotaryteach.org/js/jquery.min.js"></script>
    <script src="http://rotaryteach.org/js/modernizr.js"></script>
    <script src="http://rotaryteach.org/js/bootstrap.min.js"></script>
    <script src="http://rotaryteach.org/js/jquery.dlmenu.js"></script>
    <script src="http://rotaryteach.org/js/flexslider-min.js"></script>
    <script src="http://rotaryteach.org/js/goalProgress.min.js"></script>
    <script src="http://rotaryteach.org/js/jquery.countdown.min.js"></script>
    <script src="http://rotaryteach.org/js/jquery.prettyphoto.js"></script>
    <script src="http://rotaryteach.org/js/waypoints-min.js"></script>
    <script src="http://rotaryteach.org/js/owl.carousel.min.js"></script>
    <script src="http://rotaryteach.org/js/newsticker.js"></script>
    <script src="http://rotaryteach.org/js/parallex.js"></script>
    <script src="http://rotaryteach.org/js/styleswitch.js"></script>
    <script src="http://rotaryteach.org/js/functions.js"></script>
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