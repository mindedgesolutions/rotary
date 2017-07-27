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
input[type='radio']{
  margin: 10px 0 0 0;
  float: left;
}
label{
  margin: 0 15px 0 5px;
  float: left;
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
  var school_type = $('input[name=school_type]:checked').val();
  var school_type_other = $('#school_type_other').val();
  var book_sorting = $('input[name=book_sorting]:checked').val();
  var book_sorting_other = $('#book_sorting_other').val();
  var lib_monitored = $('input[name=lib_monitored]:checked').val();
  var lib_monitored_val = $('#lib_monitored_val').val();

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
  }else if (school_type=='Other' && school_type_other==''){
    alert("Please enter type of school where library is being created");
    document.getElementById('school_type_other').focus();
    return false;
  }else if (book_sorting=='Other' && book_sorting_other==''){
    alert("Please enter how were the books sorted for creating library");
    document.getElementById('book_sorting_other').focus();
    return false;
  }else if (lib_monitored=='yes' && lib_monitored_val==''){
    alert("Please enter Please enter if the library created being monitored");
    document.getElementById('lib_monitored_val').focus();
    return false;
  }
}
function showOther_1(){
  var school_type = $('input[name=school_type]:checked').val();

  if (school_type=='Other'){

    $('#school_type_other').fadeIn('500');
  }else{

    $('#school_type_other').hide();
  }
}
function showOther_2(){
  var book_sorting = $('input[name=book_sorting]:checked').val();

  if (book_sorting=='Other'){

    $('#book_sorting_other').fadeIn('500');
  }else{

    $('#book_sorting_other').hide();
  }
}
function showOther_3(){
  var lib_monitored = $('input[name=lib_monitored]:checked').val();

  if (lib_monitored=='yes'){

    $('#other_row').fadeIn('500');
  }else{

    $('#other_row').hide();
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

            <div class="header-text"><h3>Project Details : Library Creation</h3></div>

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

                $check = mysql_num_rows(mysql_query("select * from project_library where project_no='".base64_decode($_REQUEST['prno'])."'"));

                if ($check==0){

                  $insert_image = "insert into project_library(project_no, image_".$n.") values('".base64_decode($_REQUEST['prno'])."', '".$dst."')";

                  mysql_query($insert_image);
                }
                else{
                  $update_image = "update project_library set image_".$n."='".$dst."' where  project_no='".base64_decode($_REQUEST['prno'])."'";

                  mysql_query($update_image);
                }
              }

              $update_remaining = "update project_library set project_title='".$_REQUEST['project_title']."', project_description='".urlencode($_REQUEST['project_description'])."', project_venue='".$_REQUEST['project_venue']."', school_type='".$_REQUEST['school_type']."', school_type_other='".$_REQUEST['school_type_other']."', school_name='".$_REQUEST['school_name']."', school_address='".urlencode($_REQUEST['school_address'])."', library_type='".$_REQUEST['library_type']."', librarian_present='".$_REQUEST['librarian_type']."', books_no='".$_REQUEST['books_no']."', book_sorting='".$_REQUEST['book_sorting']."', book_sorting_other='".$_REQUEST['book_sorting_other']."', benefitted_students='".$_REQUEST['benefitted_student']."', books_allowed='".$_REQUEST['allowed_home']."', library_monitored='".$_REQUEST['lib_monitored']."', monitored_who='".$_REQUEST['lib_monitored_val']."', units_supplied='".$_REQUEST['unit_supplied']."', beneficiary='".$_REQUEST['beneficiary']."', partner='".$_REQUEST['partner_org']."', outlay='".$_REQUEST['outlay']."', project_date='".date('Y-m-d', strtotime($_REQUEST['project_date']))."', contact_details='".$_REQUEST['contact_details']."', email='".$_REQUEST['Email']."', submitted_on='".date('Y-m-d')."' where project_no='".base64_decode($_REQUEST['prno'])."'";

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
                <td width="100%" colspan="3">
                  <table width="100%" style="background-color: #e5e5e5;">
                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Type of school where library is being created : </td>
                      <td width="60%">
                        <input type="radio" name="school_type" id="type_1" onclick="showOther_1()" value="Government School"><label for="type_1">Government School</label>

                        <input type="radio" name="school_type" id="type_2" onclick="showOther_1()" value="Municipal School"><label for="type_2">Municipal School</label>

                        <input type="radio" name="school_type" id="type_3" onclick="showOther_1()" value="ZillaParishad School"><label for="type_3">ZillaParishad School</label>

                        <input type="radio" name="school_type" id="type_4" onclick="showOther_1()" value="Panchayat School"><label for="type_4">Panchayat School</label>

                        <input type="radio" name="school_type" id="type_5" onclick="showOther_1()" value="Govt. Aided School"><label for="type_5">Govt. Aided School</label>

                        <input type="radio" name="school_type" id="type_6" onclick="showOther_1()" value="Other"><label for="type_6">Other</label>

                        <input type="text" name="school_type_other" id="school_type_other" class="form-control" style="width: 200px;height: 30px;float: left;display: none;" value="" onkeyup="nospecial(this)" >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Name of the School where library is being created : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="school_name" id="school_name" class="form-control" value="" onkeyup="nospecial(this)" >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Address of the school : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="school_address" id="school_address" class="form-control" value="" >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Select the kind of library being created : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="library_type" id="lib_1" value="Traditional Library"><label for="lib_1">Traditional Library</label>

                        <input type="radio" name="library_type" id="lib_2" value="Classroom library"><label for="lib_2">Classroom library</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Traditional Library managed by a librarian : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="librarian_type" id="libn_1" value="yes"><label for="libn_1">Yes</label>

                        <input type="radio" name="librarian_type" id="libn_2" value="no"><label for="libn_2">No</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Number of books in the library : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="books_no" id="books_no" class="form-control" value="" onkeyup="numbersOnly(this)" >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">How were the books sorted for creating library : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="book_sorting" id="sort_1" onclick="showOther_2()" value="GROW BY"><label for="sort_1">GROW BY</label>

                        <input type="radio" name="book_sorting" id="sort_2" onclick="showOther_2()" value="Other"><label for="sort_2">Other (Please specify)</label>

                        <input type="text" name="book_sorting_other" id="book_sorting_other" class="form-control" style="width: 200px;height: 30px;float: left;display: none;" value="" onkeyup="nospecial(this)" />
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Number of students to be benefitted by this library : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="benefitted_student" id="benefitted_student" class="form-control" value="" onkeyup="numbersOnly(this)" >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Are students allowed to take books home ? </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="allowed_home" id="allow_1" value="yes"><label for="allow_1">Yes</label>

                        <input type="radio" name="allowed_home" id="allow_2" value="no"><label for="allow_2">No</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Is the library created being monitored ? </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="lib_monitored" id="monitored_1" onclick="showOther_3()" value="yes"><label for="monitored_1">Yes</label>

                        <input type="radio" name="lib_monitored" id="monitored_2" onclick="showOther_3()" value="no"><label for="monitored_2">No</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr id="other_row" style="display: none;">
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">If yes, who is monitoring the library ? </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="lib_monitored_val" id="lib_monitored_val" class="form-control" value="" onkeyup="nospecial(this)" >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 10px;"></td></tr>
                  </table>
                </td>
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