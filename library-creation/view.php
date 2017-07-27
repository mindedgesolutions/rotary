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
input[type='radio']{
  margin: 10px 0 0 0;
  float: left;
}
label{
  margin: 0 15px 0 5px;
  float: left;
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

            <div class="header-text"><h3>Project Details : Library Creation</h3></div>

            <?php
            $getDet = mysql_fetch_array(mysql_query("select * from project_library where project_no='".base64_decode($_REQUEST['prno'])."'"));
            ?>

            <table>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Title <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="project_title" id="project_title" value="<?= $getDet['project_title'] ?>" readonly class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Description <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <textarea class="form-control" name="project_description" id="project_description" style="height: 100px;resize: none;" readonly><?= urldecode($getDet['project_description']) ?></textarea>
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Venue <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="project_venue" id="project_venue" readonly value="<?= $getDet['project_venue'] ?>" class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="100%" colspan="3">
                  <table width="100%" style="background-color: #ededed;">
                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Type of school where library is being created : </td>
                      <td width="60%">
                        <input type="radio" name="school_type" id="type_1" <?php if($getDet['school_type']=='Government School'){echo 'checked';} ?> disabled ><label for="type_1">Government School</label>

                        <input type="radio" name="school_type" id="type_2" <?php if($getDet['school_type']=='Municipal School'){echo 'checked';} ?> disabled ><label for="type_2">Municipal School</label>

                        <input type="radio" name="school_type" id="type_3" <?php if($getDet['school_type']=='ZillaParishad School'){echo 'checked';} ?> disabled ><label for="type_3">ZillaParishad School</label>

                        <input type="radio" name="school_type" id="type_4" <?php if($getDet['school_type']=='Panchayat School'){echo 'checked';} ?> disabled ><label for="type_4">Panchayat School</label>

                        <input type="radio" name="school_type" id="type_5" <?php if($getDet['school_type']=='Govt. Aided School'){echo 'checked';} ?> disabled ><label for="type_5">Govt. Aided School</label>

                        <input type="radio" name="school_type" id="type_6" <?php if($getDet['school_type']=='Other'){echo 'checked';} ?> disabled ><label for="type_6">Other</label>

                        <?php if($getDet['school_type_other']!=''){ ?><input type="text" name="school_type_other" id="school_type_other" class="form-control" style="width: 200px;height: 30px;float: left;" value="<?= $getDet['school_type_other'] ?>" readonly ><?php } ?>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Name of the School where library is being created : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="school_name" id="school_name" class="form-control" value="<?= $getDet['school_name'] ?>" readonly >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Address of the school : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="school_address" id="school_address" class="form-control" value="<?= urldecode($getDet['school_address']) ?>" readonly >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Select the kind of library being created : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="library_type" id="lib_1" <?php if($getDet['library_type']=='Traditional Library'){echo 'checked';} ?> disabled><label for="lib_1">Traditional Library</label>

                        <input type="radio" name="library_type" id="lib_2" <?php if($getDet['library_type']=='Classroom library'){echo 'checked';} ?> disabled><label for="lib_2">Classroom library</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Traditional Library managed by a librarian : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="librarian_type" id="libn_1" <?php if($getDet['librarian_present']=='yes'){echo 'checked';} ?> disabled><label for="libn_1">Yes</label>

                        <input type="radio" name="librarian_type" id="libn_2" <?php if($getDet['librarian_present']=='no'){echo 'checked';} ?> disabled><label for="libn_2">No</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Number of books in the library : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="books_no" id="books_no" class="form-control" value="<?= $getDet['books_no'] ?>" readonly >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">How were the books sorted for creating library : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="book_sorting" id="sort_1" <?php if($getDet['book_sorting']=='GROW BY'){echo 'checked';} ?> disabled><label for="sort_1">GROW BY</label>

                        <input type="radio" name="book_sorting" id="sort_2" <?php if($getDet['book_sorting']=='Other'){echo 'checked';} ?> disabled><label for="sort_2">Other (Please specify)</label>

                        <?php if($getDet['book_sorting_other']!=''){ ?><input type="text" name="book_sorting_other" id="book_sorting_other" class="form-control" style="width: 200px;height: 30px;float: left;" value="<?= $getDet['book_sorting_other'] ?>" readonly /><?php } ?>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Number of students to be benefitted by this library : </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="benefitted_student" id="benefitted_student" class="form-control" value="<?= $getDet['benefitted_students'] ?>" readonly >
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Are students allowed to take books home ? </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="allowed_home" id="allow_1" <?php if($getDet['books_allowed']=='yes'){echo 'checked';} ?> disabled><label for="allow_1">Yes</label>

                        <input type="radio" name="allowed_home" id="allow_2" <?php if($getDet['books_allowed']=='no'){echo 'checked';} ?> disabled><label for="allow_2">No</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <tr>
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">Is the library created being monitored ? </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="radio" name="lib_monitored" id="monitored_1" <?php if($getDet['library_monitored']=='yes'){echo 'checked';} ?> disabled><label for="monitored_1">Yes</label>

                        <input type="radio" name="lib_monitored" id="monitored_2" <?php if($getDet['library_monitored']=='no'){echo 'checked';} ?> disabled><label for="monitored_2">No</label>
                      </td>
                    </tr>

                    <tr><td colspan="2" style="height: 20px;"></td></tr>

                    <?php if($getDet['monitored_who']!=''){ ?>
                    <tr id="other_row">
                      <td width="40%" style="color: #757575;text-align: right;padding: 0 15px 0 5px;">If yes, who is monitoring the library ? </td>
                      <td width="60%" style="padding: 0 15px 0 0;">
                        <input type="text" name="lib_monitored_val" id="lib_monitored_val" class="form-control" value="<?= $getDet['monitored_who'] ?>" readonly >
                      </td>
                    </tr>
                    <?php } ?>

                    <tr><td colspan="2" style="height: 10px;"></td></tr>
                  </table>
                </td>
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
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Outlay <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="outlay" id="outlay" value="<?= $getDet['outlay'] ?>" readonly class="form-control" style="width: 70%;" />
                  <span style="color: #757575;padding: 0 0 0 5px;">(In Rupee)</span>
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Project Date <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="project_date" id="project_date" value="<?= date('d-m-Y', strtotime($getDet['project_date'])) ?>" class="form-control" readonly="readonly" />
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
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Email ID <span style="color: #ff0000;">*</span> : </td>
                <td width="40%">
                  <input type="text" name="Email" id="Email" value="<?= $getDet['email'] ?>" readonly class="form-control" />
                </td>
                <td width="35%">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <table style="margin: 20px 0 0 0;">
              <tr><td width="100%" colspan="3" style="background-color: #4a4a4a;color: #fff;box-sizing: border-box;padding: 0 20px;">Upload Images</td></tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>
            </table>

            <?php for ($img = 1; $img <= 25; $img++){ ?>

            <div class="img_div">
                <a href="<?= $getDet['image_'.$img] ?>" data-lightbox="<?= $getDet['image_'.$img] ?>" data-title=""><img src="<?= $getDet['image_'.$img] ?>" alt="No Image" /></a>
            </div>

            <?php } ?>

            <table style="margin: 20px 0 0 0;">
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