<?php
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('include/title.php'); ?></title>
<!-- Css Files -->
<?php include('include/favicon.php'); ?>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="http://rotaryteach.org/css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/color.css" rel="stylesheet">
<link href="css/dl-menu.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet"> 
<link href="css/prettyphoto.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="css/menu_v.css" rel="stylesheet" type="text/css" />

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
.table-data{
  height: 40px;
  line-height: 40px;
  text-align: center;
  color: #4a4a4a;
}
.pagination_no{
  float: left;
  margin: 7px 0 0 0;
}
.search_box{
  float: right;
  margin: 0 0 15px 0;
}
#jumpTo{
  width: 90px;
  text-align: center;
  margin: 0 5px 0 0;
}
.pageNumActive{
    border: none;
    border-radius: 3px;
    padding: 3px 8px;
    background-color: #286090;
    color: #fff;
    font-weight: 500;
}

.paginationNumbers a{
    color: #000;
    text-decoration: none;
    padding: 3px 8px;
    background-color: #bfbfbf;
    border-radius: 3px;
    border: none;
}

.paginationNumbers a:hover{
    background-color: #286090;
    color: #fff;
}
</style>

<script type="text/javascript">
/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}
function jumpToPage(){
    var lastPage = $('#lastPage').val();
    var jumpTo = $('#jumpTo').val();
    var pathname = window.location.pathname;
    
    if (Number(jumpTo) > Number(lastPage)){
        window.location.href = pathname + '?pn=' + lastPage;
    }else{
        window.location.href = pathname + '?pn=' + jumpTo;
    }
}
function getClub(){
  var rotary_district = $('#rotary_district').val();

  $.ajax({
    url: 'get-club-name.php',
    type: 'post',
    data: 'rotary_district=' + rotary_district,
    success: function(f){

      $('#rotary_club').html(f);
    }
  })
}
</script>

</head>



<body style="padding-right:0px;">

  <?php include 'pagination-list.php'; ?>

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
            <a style="float:left;" href="../../index.php" class="logo1"><img src="http://rotaryteach.org/images/logo2.png" alt=""></a>
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
      <!--// Header //-->

      <div class="as-minheader">
       
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Project List</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Project List</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-div">
              <form action="" method="post">
              <table>
                <tr>
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Project Category : </td>
                  <td width="30%">
                    <select name="projectType" id="projectType" class="form-control">
                      <option value="">-- Please Select --</option>

                      <option value="1" <?php if($_REQUEST['projectType']=='1'){echo 'selected';} ?>>Teacher Support</option>
                      <option value="2" <?php if($_REQUEST['projectType']=='2'){echo 'selected';} ?>>E-Learning</option>
                      <option value="3" <?php if($_REQUEST['projectType']=='3'){echo 'selected';} ?>>Adult Literacy</option>
                      <option value="5" <?php if($_REQUEST['projectType']=='5'){echo 'selected';} ?>>Happy Schools</option>
                      <option value="6" <?php if($_REQUEST['projectType']=='6'){echo 'selected';} ?>>Other</option>
                      <option value="7" <?php if($_REQUEST['projectType']=='7'){echo 'selected';} ?>>Library Creation</option>
                    </select>
                  </td>

                  <td width="10%">&nbsp;</td>

                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Reg. Email / Mobile No : </td>
                  <td width="30%">
                    <input type="text" name="searchBy" id="searchBy" value="<?= $_REQUEST['searchBy'] ?>" class="form-control" />
                  </td>
                </tr>

                <tr><td colspan="5" style="height: 20px;"></td></tr>

                <tr>
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Select District : </td>
                  <td width="30%">
                    <select name="rotary_district" id="rotary_district" class="form-control" onchange="getClub()">
                      <option value="">-- Please Select --</option>

                      <?php
                      $query_getDist = mysql_query("select * from all_district_club where active='yes' group by district_code order by status desc");
                      while ($getDist = mysql_fetch_array($query_getDist)){
                      ?>
                      <option value="<?= $getDist['district_code'] ?>"><?= $getDist['district_code'] ?></option>
                      <?php } ?>
                    </select>
                  </td>

                  <td width="10%">&nbsp;</td>

                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Select Club : </td>
                  <td width="30%">
                    <select name="rotary_club" id="rotary_club" class="form-control">
                      <option value="">-- Please Select --</option>

                    </select>
                  </td>
                </tr>

                <tr><td colspan="5" style="height: 20px;"></td></tr>

                <tr>
                  <td width="100%" colspan="5" style="text-align: center;">
                    <input type="submit" name="submitBtn" id="submitBtn" value="Search" class="btn btn-primary" style="margin: 0 15px 0 0;width: 80px;" />

                    <a href="project-list.php"><input type="button" name="resetBtn" id="resetBtn" value="Reset" class="btn btn-primary" style="width: 80px;" /></a>
                  </td>
                </tr>
              </table>
              </form>
            </div>

            <?php if (isset($_REQUEST['submitBtn'])){ ?>

            <div class="form-div">
              <table border="1" style="border-collapse: collapse;">
                <tr class="table-head">
                  <td width="10%">District</td>
                  <td width="24%">Club</td>
                  <td width="20%">Category</td>
                  <td width="10%">Submitted On</td>
                  <td width="24%">Submitted By</td>
                  <td width="12%">Action</td>
                </tr>

                <?php
                $i = 1;

                if (isset($_REQUEST['submitBtn'])){

                  if ($_REQUEST['projectType']!='' || $_REQUEST['searchBy']!='' || $_REQUEST['rotary_district']!='' || $_REQUEST['rotary_club']!=''){

                    $query = "select * from project_master where project_no!='' and ";

                    if ($_REQUEST['projectType']!=''){

                      $query = $query."project_category='".$_REQUEST['projectType']."' and";

                    }
                    if ($_REQUEST['searchBy']!=''){

                      $query = $query." (phone_no like '%".$_REQUEST['searchBy']."%' or email like '%".$_REQUEST['searchBy']."%') and";

                    }
                    if ($_REQUEST['rotary_district']!=''){

                      $query = $query." district_code='".$_REQUEST['rotary_district']."' and";

                    }
                    if ($_REQUEST['rotary_club']!=''){

                      $query = $query." club_name='".$_REQUEST['rotary_club']."' and";
                    }
                    $query = $query." status='complete' group by project_no order by id desc";
                    $query_getDet = mysql_query($query);
                  }else{

                    $query = "select * from project_master where status='complete' order by id desc $limit";
                    $query_getDet = mysql_query($query);
                  }
                }else{

                  $query = "select * from project_master where status='complete' order by id desc $limit";
                  $query_getDet = mysql_query($query);
                }

                while ($getDet = mysql_fetch_array($query_getDet)){

                  $getCategory = mysql_fetch_array(mysql_query("select * from category where id='".$getDet['project_category']."'"));
                  $folder = explode('/', $getDet['project_no']);
                  $folderno = $folder[1];

                  /*-------Path according to project category-------*/
                  if ($getDet['project_category']=='1'){

                    if ($getDet['project_subcategory']=='Nation Builder Award'){

                      $path = 'teacher-support/nation-builder-award';
                    }else if ($getDet['project_subcategory']=='Teacher Training'){

                      $path = 'teacher-support/teacher-training';
                    }else if ($getDet['project_subcategory']=='Supplemental Teaching'){

                      $path = 'teacher-support/supplemental-teaching';
                    }
                    
                  }else if ($getDet['project_category']=='2'){

                    $path = 'e-learning';
                  }else if ($getDet['project_category']=='3'){

                    $path = 'adult-literacy';
                  }else if ($getDet['project_category']=='5'){

                    $path = 'happy-school';
                  }else if ($getDet['project_category']=='6'){

                    $path = 'other';
                  }else if ($getDet['project_category']=='7'){

                    $path = 'library-creation';
                  }
                  /*-------Path according to project category-------*/
                ?>
                <tr>
                  <td class="table-data"><?= $getDet['district_code'] ?></td>

                  <input type="hidden" name="prno<?= $i ?>" id="prno<?= $i ?>" value=<?= $getDet['project_no'] ?> />

                  <td class="table-data" style="line-height: 20px;padding: 8px 0;"><?= strtoupper($getDet['club_name']) ?></td>

                  <td class="table-data"><?= strtoupper($getCategory['category']) ?></td>

                  <td class="table-data"><?php if($getDet['upload_date']=='0000-00-00'){echo 'N/A';}else{echo date('d-m-Y', strtotime($getDet['upload_date']));} ?></td>

                  <td class="table-data"><?= strtoupper($getDet['name']) ?></td>

                  <td class="table-data" style="padding-bottom: 4px;">

                    <?php
                    $check_table = mysql_fetch_array(mysql_query("select pr_id from project_master where project_no='".$getDet['project_no']."'"));

                    if ($check_table['pr_id']=='0'){
                    ?>

                    <?php if ($getDet['project_category']=='3'){ ?>

                        <a target="_blank" href="<?= $path ?>/edit.php?prno=<?= base64_encode($getDet['project_no']) ?>&folderno=<?= base64_encode($folderno) ?>" ><input type="button" name="actionBtn" id="actionBtn" value="View Project" class="btn btn-primary" />

                      <?php }else{ ?>

                        <a target="_blank" href="<?= $path ?>/view.php?prno=<?= base64_encode($getDet['project_no']) ?>&folderno=<?= base64_encode($folderno) ?>"><input type="button" name="actionBtn" id="actionBtn" value="View Project" class="btn btn-primary" />
                        
                     <?php } ?>
                      
                    <?php }else{ ?>

                      <a target="_blank" href="view_predet.php?prno=<?= base64_encode($check_table['pr_id']) ?>" ><input type="button" name="actionBtn" id="actionBtn" value="View Project" class="btn btn-primary" />

                    <?php } ?>
                  </td>
                </tr>
                <?php $i++;} ?>
              </table>
            </div>

            <?php } ?>

            <!--

            <?php
            $rowNum = mysql_num_rows(mysql_query("select * from project_master where status='complete'"));

            if ($rowNum > 10 && !isset($_REQUEST['submitBtn'])){
            ?>
            <div class="form-div">
              <div class="pagination_no"><?php echo $paginationDisplay; ?></div>
              
              <div class="search_box">
                <input type="text" name="jumpTo" id="jumpTo" placeholder="Page No" onkeyup="numbersOnly(this)" class="form-control" />

                <input type="button" name="jumpBtn" id="jumpBtn" value="Go To" onclick="jumpToPage()" class="btn btn-primary" />
              </div>
            </div>
            <?php } ?>

            -->
          </div>
        </div>
      </div>


  <div class="col-md-12" style="height: 50px;"></div>

  <!--// Footer //-->
  <div class="as-footer">
    <div class="container">
      <?php include('include/footer.php'); ?>
    </div>
    <?php include('include/copy-right.php'); ?>
  </div>
  <!--// Footer //-->
  <div class="clearfix"></div>
    
  <!--// Main Wrapper //-->

    <!-- Search Modal -->
    <?php //include('include/search-model.php'); ?>
    <!-- Search Modal -->
    <!-- jQuery (necessary for JavaScript plugins) -->
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