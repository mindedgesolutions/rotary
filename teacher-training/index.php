<?php
include('../../include/config.php');

$folderNo_whole = explode('/', base64_decode($_REQUEST['prno']));
$folderNo = $folderNo_whole[1];

if (!file_exists('images/'.$folderNo)){
  mkdir('images/'.$folderNo, 0777, true);
}
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
/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}
function showTable(){
  var trainingType = $('#trainingType').val();
  var prno = $('#prno').val();
  var folderno = $('#folderno').val();

  if (trainingType==''){

    alert('Please select training type');
  }else{

    if (trainingType=='Teacher Training with RILM support'){

      $.ajax({

        url: 'show_table_1.php',
        type: 'post',
        data: 'trainingType=' + trainingType + '&prno=' + prno + '&folderno=' + folderno,
        success: function(f){

          $('#show_table').html(f);
        }
      })
    }else if (trainingType=='Independent Teacher Training'){

      $.ajax({

        url: 'show_table_2.php',
        type: 'post',
        data: 'trainingType=' + trainingType + '&prno=' + prno + '&folderno=' + folderno,
        success: function(f){

          $('#show_table').html(f);
        }
      })
    }
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

            <table>
              <tr>
                <td width="25%" style="color: #757575;text-align: right;padding: 0 15px 0 0;">Type of Teacher Training : </td>

                <td width="25%">
                  <select name="trainingType" id="trainingType" class="form-control" onchange="showTable()">
                    <option value="">-- Please Select --</option>

                    <!--<option value="Teacher Training with RILM support">Teacher Training with RILM support</option>-->
                    <option value="Independent Teacher Training">Independent Teacher Training</option>
                  </select>
                </td>

                <td width="50%">&nbsp;</td>
              </tr>
            </table>

            <span id="show_table"></span>
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