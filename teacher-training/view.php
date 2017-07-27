<?php include('../../include/config.php'); ?>

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
input[type='checkbox']{
  float: left;
  margin: 14px 10px 0 5px;
}
label{
  color: #757575;
  font-size: 90%;
  float: left;
  margin: 5px 0 0 0;
}
</style>

<script type="text/javascript">
function openFancy(par){
  var sln = par;
  var prno = $('#prno').val();
  var no_schools = $('#no_schools').val();
  var trainingType = $('#trainingType').val();
  var schoolId = $('#schoolId'+par).val();
  var schoolName = $('#schoolName'+par).val();
  var schoolCity = $('#schoolCity'+par).val();
  var schoolState = $('#schoolState'+par).val();
  var schoolType = $('#schoolType'+par).val();

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
    href: 'view_table_details.php?sln=' + sln + '&prno=' + prno + '&no_schools=' + no_schools + '&trainingType=' + trainingType + '&schoolId=' + schoolId + '&schoolName=' + schoolName + '&schoolCity=' + schoolCity + '&schoolState=' + schoolState + '&schoolType=' + schoolType,
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

            <div class="header-text"><h3>Teacher Support : Teacher Training</h3></div>

            <?php
            $getDet = mysql_fetch_array(mysql_query("select * from project_master where project_no='".base64_decode($_REQUEST['prno'])."'"));

            $masterDet = mysql_fetch_array(mysql_query("select * from project_teacher_support_training_master where project_no='".base64_decode($_REQUEST['prno'])."'"));

            $topic = explode(',', $masterDet['training_topic']);

            $details = mysql_fetch_array(mysql_query("select no_schools from project_teacher_support_training_details where project_no='".base64_decode($_REQUEST['prno'])."'"));
            ?>

            <table>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Type of Teacher Training : </td>

                <td width="25%">
                  <select name="trainingType" id="trainingType" class="form-control" disabled="disabled" onchange="showTable()">
                    <option value="">-- Please Select --</option>

                    <!--<option value="Teacher Training with RILM support">Teacher Training with RILM support</option>-->
                    <option value="Independent Teacher Training" <?php if ($masterDet['training_type']=='Independent Teacher Training'){echo 'selected';} ?>>Independent Teacher Training</option>
                  </select>
                </td>

                <td width="50%">&nbsp;</td>
              </tr>
            </table>

            <table>
              <tr><td colspan="4" style="height: 15px;border-top: 1px solid #e0e0e0;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Who was involved in providing the training? : </td>

                  <td width="35%">
                  <select name="training_Partner" id="training_Partner" class="form-control" disabled="disabled">
                    <option value="">-- Please Select --</option>

                    <option value="Macmillan Publishers Pvt. Ltd." <?php if($masterDet['training_partner']=='Macmillan Publishers Pvt. Ltd.'){echo 'selected';} ?>>Macmillan Publishers Pvt. Ltd.</option>

                    <option value="Royal Society of Chemistry" <?php if($masterDet['training_partner']=='Royal Society of Chemistry'){echo 'selected';} ?>>Royal Society of Chemistry</option>

                    <option value="Indian Career Education and Development  Council" <?php if($masterDet['training_partner']=='Indian Career Education and Development  Council'){echo 'selected';} ?>>Indian Career Education and Development  Council</option>

                    <option value="Learning Links Foundation" <?php if($masterDet['training_partner']=='Learning Links Foundation'){echo 'selected';} ?>>Learning Links Foundation</option>

                    <option value="Aspiring Persona" <?php if($masterDet['training_partner']=='Aspiring Persona'){echo 'selected';} ?>>Aspiring Persona</option>

                    <option value="Zeal Education Trust" <?php if($masterDet['training_partner']=='Zeal Education Trust'){echo 'selected';} ?>>Zeal Education Trust</option>

                    <option value="Resource Person Radhika Gupte" <?php if($masterDet['training_partner']=='Resource Person Radhika Gupte'){echo 'selected';} ?>>Resource Person Radhika Gupte</option>

                    <option value="Resource Person Nitya Gopalalrishnan" <?php if($masterDet['training_partner']=='Resource Person Nitya Gopalalrishnan'){echo 'selected';} ?>>Resource Person Nitya Gopalalrishnan</option>

                    <option value="Others" <?php if($masterDet['training_partner']=='Others'){echo 'selected';} ?>>Others</option>
                  </select>
                </td>

                <td width="40%" colspan="2" style="text-align: right;"><span id="other_training_partner_span" style="display: none;color: #757575;">Other Partner : <input type="text" name="other_training_partner" id="other_training_partner" value="<?= $masterDet['other'] ?>" class="form-control" style="width: 50%;margin: 0 0 0 10px;" readonly="readonly" /></span></td>
              </tr>

              <tr><td colspan="4" style="height: 15px;"></td></tr>

              <?php if($masterDet['training_partner']=='Macmillan Publishers Pvt. Ltd.'){ ?>

              <tr id="mcmillan">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_1" value="Child and Adolescent Development" <?php if(in_array('Child and Adolescent Development', $topic)){echo 'checked';} ?> disabled /><label for="id_1">Child and Adolescent Development</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_2" <?php if(in_array('Curriculum', $topic)){echo 'checked';} ?> disabled value="Curriculum" /><label for="id_2">Curriculum</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_3" <?php if(in_array('Pedagogy', $topic)){echo 'checked';} ?> disabled value="Pedagogy" /><label for="id_3">Pedagogy</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_4" <?php if(in_array('Language Skills', $topic)){echo 'checked';} ?> disabled value="Language Skills" /><label for="id_4">Language Skills</label></td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_5" <?php if(in_array('Classroom Management', $topic)){echo 'checked';} ?> disabled value="Classroom Management" /><label for="id_5">Classroom Management</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_6" <?php if(in_array('Assessment and Evaluation Studies', $topic)){echo 'checked';} ?> disabled value="Assessment and Evaluation Studies" /><label for="id_6">Assessment and Evaluation Studies</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_7" <?php if(in_array('Life Skills Education', $topic)){echo 'checked';} ?> disabled value="Life Skills Education" /><label for="id_7">Life Skills Education</label></td>

                      <td width="25%">
                        <input type="checkbox" name="check_result[]" id="id_8" disabled value="Others" /><label for="id_8">Others</label><input type="text" name="other_id_1" id="other_id_1" value="<?= $masterDet['other_training_topic'] ?>" readonly="readonly" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php }else if ($masterDet['training_partner']=='Royal Society of Chemistry'){ ?>

              <tr id="royal" style="display: none;">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_9" <?php if(in_array('How to teach science effectively', $topic)){echo 'checked';} ?> disabled value="How to teach science effectively" /><label for="id_9">How to teach science effectively</label></td>

                      <td width="25%" colspan="3">
                        <input type="checkbox" name="check_result[]" id="id_10" disabled value="Others" /><label for="id_10">Others</label><input type="text" name="other_id_2" id="other_id_2" value="<?= $masterDet['other_training_topic'] ?>" readonly="readonly" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>
                      <td width="50%">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php }else if ($masterDet['training_partner']=='Indian Career Education and Development  Council'){ ?>

              <tr id="Indian" style="display: none;">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_11" <?php if(in_array('Strength based life coaching', $topic)){echo 'checked';} ?> disabled value="Strength based life coaching" /><label for="id_11">Strength based life coaching</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_12" <?php if(in_array('Using differentiated teaching', $topic)){echo 'checked';} ?> disabled value="Using differentiated teaching" /><label for="id_12">Using differentiated teaching</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_13" <?php if(in_array('Simple lesson plan methodologies', $topic)){echo 'checked';} ?> disabled value="Simple lesson plan methodologies" /><label for="id_13">Simple lesson plan methodologies</label></td>

                      <td width="25%" colspan="3">
                        <input type="checkbox" name="check_result[]" id="id_14" value="Others" /><label for="id_14">Others</label><input type="text" name="other_id_3" id="other_id_3" value="<?= $masterDet['other_training_topic'] ?>" readonly="readonly" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php }else if ($masterDet['training_partner']=='Learning Links Foundation'){ ?>

              <tr id="learning" style="display: none;">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_15" <?php if(in_array('Subject Enrichment', $topic)){echo 'checked';} ?> disabled value="Subject Enrichment" /><label for="id_15">Subject Enrichment</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_16" <?php if(in_array('Classroom Management', $topic)){echo 'checked';} ?> disabled value="Classroom Management" /><label for="id_16">Classroom Management</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_17" <?php if(in_array('Assessment in the class', $topic)){echo 'checked';} ?> disabled value="Assessment in the class" /><label for="id_17">Assessment in the class</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_18" <?php if(in_array('Classroom Transaction', $topic)){echo 'checked';} ?> disabled value="Classroom Transaction" /><label for="id_18">Classroom Transaction</label></td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%">
                        <input type="checkbox" name="check_result[]" id="id_19" value="Others" /><label for="id_19">Others</label><input type="text" name="other_id_4" id="other_id_4" value="<?= $masterDet['other_training_topic'] ?>" readonly="readonly" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>

                      <td width="75%" colspan="3">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php }else if ($masterDet['training_partner']=='Aspiring Persona'){ ?>

              <tr id="aspiring" style="display: none;">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="4" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_20" <?php if(in_array('Team Building', $topic)){echo 'checked';} ?> disabled value="Team Building" /><label for="id_20">Team Building</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_21" <?php if(in_array('Motivation', $topic)){echo 'checked';} ?> disabled value="Motivation" /><label for="id_21">Motivation</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_22" <?php if(in_array('Time Management', $topic)){echo 'checked';} ?> disabled value="Time Management" /><label for="id_22">Time Management</label></td>

                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_23" <?php if(in_array('Time Leadership', $topic)){echo 'checked';} ?> disabled value="Leadership" /><label for="id_23">Leadership</label></td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_24" <?php if(in_array('Perception and Attitude Building', $topic)){echo 'checked';} ?> disabled value="Perception and Attitude Building" /><label for="id_24">Perception and Attitude Building</label></td>

                      <td width="25%">
                        <input type="checkbox" name="check_result[]" id="id_25" value="Others" /><label for="id_25">Others</label><input type="text" name="other_id_5" id="other_id_5" value="<?= $masterDet['other_training_topic'] ?>" readonly="readonly" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>

                      <td width="50%" colspan="2">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php }else if ($masterDet['training_partner']=='Zeal Education Trust'){ ?>

              <tr id="zeal" style="display: none;">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="25%"><input type="checkbox" name="check_result[]" id="id_26" <?php if(in_array('Methods of teaching mathematics', $topic)){echo 'checked';} ?> disabled value="Methods of teaching mathematics" /><label for="id_26">Methods of teaching mathematics</label></td>

                      <td width="25%" colspan="3">
                        <input type="checkbox" name="check_result[]" id="id_27" value="Others" /><label for="id_27">Others</label><input type="text" name="other_id_6" id="other_id_6" value="<?= $masterDet['other_training_topic'] ?>" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>
                      <td width="50%">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php }else if ($masterDet['training_partner']=='Resource Person Radhika Gupte'){ ?>

              <tr id="radhika" style="display: none;">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="30%"><input type="checkbox" name="check_result[]" id="id_28" <?php if(in_array('Awareness on children with special needs', $topic)){echo 'checked';} ?> disabled value="Awareness on children with special needs" /><label for="id_28">Awareness on children with special needs</label></td>

                      <td width="25%" colspan="3">
                        <input type="checkbox" name="check_result[]" id="id_29" value="Others" /><label for="id_29">Others</label><input type="text" name="other_id_7" id="other_id_7" value="<?= $masterDet['other_training_topic'] ?>" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>
                      <td width="45%">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php }else if ($masterDet['training_partner']=='Resource Person Nitya Gopalalrishnan'){ ?>

              <tr id="nitya" style="display: none;">
                <td colspan="4">
                  <table border="1" style="border-collapse: collapse;">
                    <tr class="topic_tr">
                      <td width="100%" colspan="5" style="background-color: #4a4a4a; color: #fff; padding: 0 10px;">Training Topic</td>
                    </tr>
                    <tr class="topic_tr">
                      <td width="30%"><input type="checkbox" name="check_result[]" id="id_30" <?php if(in_array('Awareness on children with special needs', $topic)){echo 'checked';} ?> disabled value="Awareness on children with special needs" /><label for="id_30">Awareness on children with special needs</label></td>

                      <td width="25%" colspan="3">
                        <input type="checkbox" name="check_result[]" id="id_31" value="Others" /><label for="id_31">Others</label><input type="text" name="other_id_8" id="other_id_8" value="<?= $masterDet['other_training_topic'] ?>" readonly="readonly" class="form-control" style="float: left;width: 150px;margin: 2px 10px;height: 34px;" />
                      </td>
                      <td width="45%">&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>

              <?php } ?>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Number of Training Hours : </td>

                <td width="35%">
                  <input type="text" name="trainingHours" id="trainingHours" value="<?= $masterDet['training_hours'] ?>" class="form-control" readonly="readonly" />
                </td>

                <td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
              </tr>

              <tr><td colspan="4" style="height: 15px;"></td></tr>

              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Number of Training Days : </td>

                <td width="35%">
                  <input type="text" name="trainingDays" id="trainingDays" value="<?= $masterDet['training_days'] ?>" class="form-control" readonly="readonly" />
                </td>

                <td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
              </tr>

              <tr><td colspan="3" style="height: 15px;"></td></tr>

              <tr>
              <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Module and brief description (Max 100 words) : </td>

              <td width="35%">
                <textarea class="form-control" name="trainingDesc" id="trainingDesc" style="resize: none;height: 80px;width: 100%;font-size: 12px;" disabled><?= $masterDet['training_description'] ?></textarea>
              </td>

              <td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
            </tr>

            <tr><td colspan="4" style="height: 15px;"></td></tr>

            <tr>
              <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Total Cost Involved : </td>

              <td width="35%">
                <input type="text" name="trainingCost" id="trainingCost" value="<?= $masterDet['training_cost'] ?>" class="form-control" readonly="readonly" />
              </td>

              <td width="40%" colspan="2" style="text-align: right;">&nbsp;</td>
            </tr>

            <tr><td colspan="4" style="height: 15px;"></td></tr>

            <tr>
              <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">No. of schools participated : </td>

              <td width="35%">
                <input type="text" name="schoolsNo" id="schoolsNo" value="<?= $details['no_schools'] ?>" class="form-control" readonly="readonly" />
              </td>

              <td width="40%" colspan="2">&nbsp;</td>
            </tr>

            <tr><td colspan="4" style="height: 15px;"></td></tr>

            <tr>
              <td colspan="4">
                <table border="1" style="border-collapse: collapse;">
                  <tr class="table-head">
                    <td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;">Sr. No.</td>
                    <td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;">School ID</td>
                    <td style="line-height: 18px;width: 22%;height: 50px;line-height: 50px;font-size: 90%;">School Name</td>
                    <td style="line-height: 18px;width: 16%;height: 50px;line-height: 50px;font-size: 90%;">City/Village</td>
                    <td style="line-height: 18px;width: 20%;height: 50px;line-height: 50px;font-size: 90%;">State</td>
                    <td style="line-height: 18px;width: 16.5%;height: 50px;line-height: 50px;font-size: 90%;">School Type</td>
                    <td style="line-height: 18px;width: 12.5%;height: 50px;font-size: 90%;line-height: 50px;">Other Details</td>
                  </tr>

                  <?php
                  $i = 1;

                  $query_det = mysql_query("select * from project_teacher_support_training_details where project_no='".base64_decode($_REQUEST['prno'])."'");
                  while ($det = mysql_fetch_array($query_det)){
                  ?>
                  <tr class="table-row">
                    <td style="line-height: 18px;width: 5%;height: 50px;line-height: 50px;font-size: 90%;text-align: center;"><?= $det['sln'].'.' ?></td>

                    <td style="line-height: 18px;width: 8%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                      <input type="text" name="schoolId<?= $i ?>" id="schoolId<?= $i ?>" value="<?= $det['school_id'] ?>" readonly="readonly" class="form-control" />
                    </td>

                    <td style="line-height: 18px;width: 12%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                      <input type="text" name="schoolName<?= $i ?>" id="schoolName<?= $i ?>" readonly="readonly" class="form-control" value="<?= $det['school_name'] ?>" />
                    </td>

                    <td style="line-height: 18px;width: 15%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                      <input type="text" name="schoolCity<?= $i ?>" id="schoolCity<?= $i ?>" readonly="readonly" value="<?= $det['city'] ?>" class="form-control" />
                    </td>

                    <td style="line-height: 18px;width: 7%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;">
                      <select name="schoolState<?= $i ?>" id="schoolState<?= $i ?>" disabled="disabled" class="form-control" style="margin: 8px 0 0 0;">
                        <option value="">-- Please Select --</option>

                        <?php
                        $query_state = mysql_query("select * from states");
                        while ($state = mysql_fetch_array($query_state)){
                        ?>
                        <option value="<?= $state['state'] ?>" <?php if($state['state']==$det['state']){echo 'selected';} ?>><?= $state['state'] ?></option>
                        <?php } ?>
                      </select>
                    </td>

                    <td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
                      <select name="schoolType<?= $i ?>" id="schoolType<?= $i ?>" disabled="disabled" class="form-control" style="margin: 8px 0 0 0;">
                        <option value="">-- Please Select --</option>

                        <option value="Government" <?php if($det['school_type']=='Government'){echo 'selected';} ?>>Government</option>
                        <option value="Government-aided" <?php if($det['school_type']=='Government-aided'){echo 'selected';} ?>>Government-aided</option>
                      </select>
                    </td>

                    <td style="line-height: 18px;width: 8.5%;height: 50px;line-height: 50px;font-size: 90%;padding: 0 5px;text-align: center;">
                      <input type="button" name="endBtn" id="endBtn" value="Update Details" class="btn btn-primary" onclick="openFancy(<?= $i ?>)" />
                    </td>
                  </tr>
                  <?php $i++;} ?>
                </table>
              </td>
            </tr>

            <tr>
              <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 1 : </td>

              <td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
                <?php if($masterDet['image_1']!=''){ ?><img src="<?= $masterDet['image_1'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
              </td>
            </tr>

            <tr><td colspan="3" style="height: 15px;"></td></tr>

            <tr>
              <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 2 : </td>

              <td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
                <?php if($masterDet['image_2']!=''){ ?><img src="<?= $masterDet['image_2'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
              </td>
            </tr>

            <tr><td colspan="3" style="height: 15px;"></td></tr>

            <tr>
              <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;line-height: 18px;">Upload images - 3 : </td>

              <td width="75%" colspan="3" style="color: #757575;font-size: 90%;">
                <?php if($masterDet['image_3']!=''){ ?><img src="<?= $masterDet['image_3'] ?>" width='80' height='80' /><?php }else{ ?>N/A<?php } ?>
              </td>
            </tr>

            <tr><td colspan="3" style="height: 25px;"></td></tr>

            <tr>
              <td colspan="3" style="text-align: center;">
                <input type="button" name="otherSave" id="otherSave" value="Close" class="btn btn-primary" onclick="window.close()" />    
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