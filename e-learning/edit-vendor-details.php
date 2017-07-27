<?php
include('../include/config.php');
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
</style>

<script type="text/javascript">
function saveHdwDet(par){

  var prno = $('#prno').val();
  var dbid = $('#dbid'+par).val();
  var hdw_vendor_name = $('#hdw_vendor_name'+par).val();
  var projector_model_no = $('#projector_model_no'+par).val();
  var hdw_total_unit = $('#hdw_total_unit'+par).val();
  var hdw_total_cost = $('#hdw_total_cost'+par).val();

  if (hdw_vendor_name==''){

    alert('Vendor name cannot be empty');
    document.getElementById('hdw_vendor_name'+par).focus();

  }else if (projector_model_no==''){

    alert('Projector Model no. cannot be empty');
    document.getElementById('projector_model_no'+par).focus();

  }else if (hdw_total_unit==''){

    alert('No. of units cannot be empty');
    document.getElementById('hdw_total_unit'+par).focus();

  }else if (hdw_total_cost==''){

    alert('Total cost cannot be empty');
    document.getElementById('hdw_total_unit'+par).focus();

  }else{

    $.ajax({

      url: 'edit-hardware-vendor.php',
      type: 'post',
      data: 'prno=' + prno + '&dbid=' + dbid + '&hdw_vendor_name=' + encodeURIComponent(hdw_vendor_name) + '&projector_model_no=' + projector_model_no + '&hdw_total_unit=' + hdw_total_unit + '&hdw_total_cost=' + hdw_total_cost,
      success: function(f){

        alert('Data saved successfully');
      }
    })
  }
}

function saveSftwDet(par){

  var prno = $('#prno').val();
  var dbid_sft = $('#dbid_sft'+par).val();
  var sftw_vendor_name = $('#sftw_vendor_name'+par).val();
  var language = $('#language'+par).val();
  var sftw_total_unit = $('#sftw_total_unit'+par).val();
  var sftw_total_cost = $('#sftw_total_cost'+par).val();

  if (sftw_vendor_name==''){

    alert('Vendor name cannot be empty');
    document.getElementById('sftw_vendor_name'+par).focus();

  }else if (language==''){

    alert('Language cannot be empty');
    document.getElementById('language'+par).focus();

  }else if (sftw_total_unit==''){

    alert('No. of units cannot be empty');
    document.getElementById('sftw_total_unit'+par).focus();

  }else if (sftw_total_cost==''){

    alert('No. of units cannot be empty');
    document.getElementById('sftw_total_cost'+par).focus();

  }else{

    $.ajax({

      url: 'edit-software-vendor.php',
      type: 'post',
      data: 'prno=' + prno + '&dbid_sft=' + dbid_sft + '&sftw_vendor_name=' + encodeURIComponent(sftw_vendor_name) + '&language=' + language + '&sftw_total_unit=' + sftw_total_unit + '&sftw_total_cost=' + sftw_total_cost,
      success: function(f){

        alert('Data saved successfully');
      }
    })
  }
}
</script>

</head>
<body style="padding-right:0px;">

  <input type="hidden" name="prno" id="prno" value="<?= base64_decode($_REQUEST['prno']) ?>" />
  <input type="hidden" name="prno_enc" id="prno_enc" value="<?= $_REQUEST['prno'] ?>" />
  <input type="hidden" name="folderno_enc" id="folderno_enc" value="<?= $_REQUEST['folderno'] ?>" />

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


            <table id="buttons" style="margin: 40px 0 0 0;">
              	<tr>
	                <td style="text-align: center;">
	                  <a href="edit.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>"><input type="button" name="backBtn" id="backBtn" value="Go Back" class="btn btn-primary" style="width: 80px;margin: 0 20px 0 0;" /></a>

	                  <a href="funding-details.php?prno=<?= $_REQUEST['prno'] ?>&folderno=<?= $_REQUEST['folderno'] ?>"><input type="button" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" style="width: 80px;" />
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

  </body>
</html>