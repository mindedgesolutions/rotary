<?php include('include/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('../../include/title.php'); ?></title>
<!-- Css Files -->
<?php include('../../include/favicon.php'); ?>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="../../css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/color.css" rel="stylesheet">
<link href="css/dl-menu.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet"> 
<link href="css/prettyphoto.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="css/menu_v.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dlmenu.js"></script>
<script src="js/flexslider-min.js"></script>
<script src="js/goalProgress.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.prettyphoto.js"></script>
<script src="js/waypoints-min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/newsticker.js"></script>
<script src="js/parallex.js"></script>
<script src="js/styleswitch.js"></script>
<script src="js/functions.js"></script>

<script type="text/javascript" src="e-learning/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="e-learning/source/jquery.fancybox.css" media="screen" />

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
  color: #4a4a4a;
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
.details_tr{
  background-color: #f2f2f2;
}
.details_tr:nth-of-type(even){
  background-color: #d6d6d6;
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
          <?php include('include/top-head.php'); ?>
        </div>
      </div>
      <!--// TopStrip //-->

      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-header-bar">
          <div class="row">
            <div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
              <div class="col-md-2">
                <a style="float:left;" href="index.php" class="logo1"><img src="images/logo2.png" alt=""></a>
              </div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('include/navigation_mem.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

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

            <?php
            $info = mysql_fetch_array(mysql_query("select * from clubproject where id='".base64_decode($_REQUEST['prno'])."'"));

            if ($info['categoryid']=='1'){ $project_type = 'Teacher Support';}
            else if ($info['categoryid']=='2'){ $project_type = 'E-Learning';}
            else if ($info['categoryid']=='3'){ $project_type = 'Adult Literacy';}
            else if ($info['categoryid']=='4'){ $project_type = 'Child Development';}
            else if ($info['categoryid']=='5'){ $project_type = 'Happy Schools';}
            else if ($info['categoryid']=='6'){ $project_type = 'Other';}
            else if ($info['categoryid']=='7'){ $project_type = 'Library Creation';}
            ?>

            <div class="header-text"><h3>Project Details : <?= $project_type ?></h3></div>

            <table>
              <tr class="details_tr">
                <td width="25%" style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">District : </td>
                <td width="25%" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['district'] ?></td>
                <td width="50%">&nbsp;</td>
              </tr>

              
              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Club Name : </td>
                <td style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['club'] ?></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">City : </td>
                <td style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['city'] ?></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">State : </td>
                <td style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['state'] ?></td>
                <td width="50%">&nbsp;</td>
              </tr>

               <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Project Title : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['title'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Project Description : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 5px 15px 5px 0;line-height: 20px;"><?= $info['projdesc'] ?></td>
              </tr>
            </table>

            <table style="margin: 40px 0 0 0;">
              <tr class="details_tr">
                <td width="25%" style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">No of Schools : </td>
                <td width="25%" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['no_school'] ?></td>
                <td width="50%">&nbsp;</td>
              </tr>

              
              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">No of Teachers Evaluated : </td>
                <td style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['teacher_evaluated'] ?></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">No of Teachers Awarded : </td>
                <td style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['teacher_awarded'] ?></td>
                <td width="50%">&nbsp;</td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Name of Schools : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 5px 15px 5px 0;line-height: 24px;"><?= $info['name_schools'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Venue : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['projectvenue'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Contact Details : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 5px 15px 5px 0;line-height: 20px;"><?= $info['projcontact'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Unit Supplied : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['unitsupplied'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Beneficiary No : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['beneficiaryno'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Partner Organization / Agency : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['partnerorg'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Outlay : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;">Rs. <?= $info['outlay'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Project Date : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= $info['projectdate'] ?></td>
              </tr>

              <tr class="details_tr">
                <td style="color: #4a4a4a;text-align: right;padding: 0 15px 0 0;">Project Submitted on : </td>
                <td width="75%" colspan="2" style="color: #4a4a4a;text-align: left;padding: 0 15px 0 0;"><?= date('d-m-Y', strtotime($info['submitted'])) ?></td>
              </tr>
            </table>

            <?php
            for ($img = 1; $img <= 25; $img++){

          		if ($info['img'.$img]!=''){
            ?>
            <div class="img_div">
                <a href="projectupload/<?= $info['img'.$img] ?>" data-lightbox="<?= 'projectupload/'.$info['img'.$img] ?>" data-title=""><img src="<?= 'projectupload/'.$info['img'.$img] ?>" alt="No Image" /></a>
            </div>

            <?php }} ?>

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