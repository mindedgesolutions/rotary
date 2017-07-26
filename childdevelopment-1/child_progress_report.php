<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['username'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];

if (base64_decode($_REQUEST['createdBy'])==''){

  $ngo_user_name = $_SESSION['username'];
  $_SESSION['createdBy'] = $_SESSION['username'];
}else{

  $ngo_user_name = base64_decode($_REQUEST['createdBy']);
  $_SESSION['createdBy'] = base64_decode($_REQUEST['createdBy']);
}

$child = '';
$rowsPerPage = 20;

//$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
//$pagingLink = getPagingLink($sql, $rowsPerPage);

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>

<script>
function jumpToPage(){
    var lastPage = $('#lastPage').val();
    var jumpTo = $('#jumpTo').val();
    var createdBy = $('#createdBy').val();
    var pathname = window.location.pathname;
    
    if (Number(jumpTo) > Number(lastPage)){
        window.location.href = pathname + '?createdBy=' + createdBy +  '&pn=' + lastPage;
    }else{
        window.location.href = pathname + '?createdBy=' + createdBy +  '&pn=' + jumpTo;
    }
}
</script>

<style type="text/css">
.table-header{
  background-color: #32333a;
  text-align: center;
  color: #fff;
  vertical-align: middle;
  line-height: 30px;
}
.table-row{
    height: auto;
    background-color: #b8d1f3;
    text-align: center;
    color: #000;
    min-height: 45px;
}

.table-row:nth-of-type(odd){
    background-color: #dae5f4;
}
.container-fluid{
  min-height:100px;
}
.logo{
  padding-top:10px;
  padding-left:10px;
}
div.clearfix{
  display:none;
}
.pagination{
  padding-left:20px;
}
.container{
  margin-bottom:20px;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">

<input type="hidden" name="createdBy" id="createdBy" value="<?= base64_encode($_SESSION['createdBy']) ?>" />

 <?php include('include/header.php'); ?>
 <?php include 'child-progress-pagination.php'; ?>
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Child Report Card</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">
    <div class="col-sm-12">

    <table width="100%" style="margin: 0 0 20px 0;">
      <tr>
        <td width="2%"><div style="width: 100%;height: 20px;background-color: #ed6161;"></div></td>
        <td width="8%" style="padding: 0 4px;">Not Updated</td>
        <td width="2%">&nbsp;</td>
        <td width="2%"><div style="width: 100%;height: 20px;background-color: #2c72b1;"></div></td>
        <td width="8%" style="padding: 0 4px;">Updated</td>
        <td width="78%"></td>
      </tr>
    </table>

    <table width="100%" border="1" style="border-collapse: collapse;">
        
        <tr class="table-header">
          <td class="col-sm-1" >Child Image</td>
          <td class="col-sm-2" >Child Name</td>
          <td class="col-sm-2" >Center</td>
          <td class="col-sm-1" >NGO Partner</td>
          <td class="col-sm-4" >Status</td>
          <td class="col-sm-1" >Action</td>
        </tr>
    
        <?php
          $i = 0;
          $sql_getDet = "SELECT * FROM  tbl_child_profile_card where create_by = '$ngo_user_name' ORDER BY child_name $limit";
          $result_getDet = mysql_query($sql_getDet);

          while($getDet = mysql_fetch_array($result_getDet)){
        ?>
        <tr class="table-row">
          <td  class="col-sm-1" style="padding: 10px 0;"><img src="../child_development/upload/<?php echo $getDet['child_photo']; ?>" height="50" width="50" alt="no image"/></td>

          <td class="col-sm-2"><?php echo ucfirst($getDet['child_name']).' ('.$getDet['child_id'].')'; ?></td>

          <td class="col-sm-2"><?php echo ucfirst($getDet['street']); ?></td>

          <td class="col-sm-2"><?php echo ucfirst($getDet['name_partner_ngo']); ?></td>

          <td class="col-sm-4" style="padding: 5px 0;">

          <a target="_blank" href="quarterly_report.php?pid=<?php echo $getDet['child_id']; ?>"><button class="btn btn-success btn-sm">View</button></a>
          &nbsp;
          
          <?php
          $check1 = mysql_num_rows(mysql_query("select * from quarter_1 where child_id='".$getDet['child_id']."'"));

          $check11 = mysql_num_rows(mysql_query("select * from quarter_11 where child_id='".$getDet['child_id']."'"));

          if ($check1 > 0 || $check11 > 0){
            $color = 'style="background-color: #2c72b1;border: 1px solid #2c72b1;"';
          }else{
            $color = 'style="background-color: #ed6161;border: 1px solid #ed6161;"';
          }
          ?>
          <button class="btn btn-success" <?= $color ?> disabled>Qtr1</button>
          &nbsp;

          <?php
          $check2 = mysql_num_rows(mysql_query("select * from quarter_2 where child_id='".$getDet['child_id']."'"));

          $check22 = mysql_num_rows(mysql_query("select * from quarter_22 where child_id='".$getDet['child_id']."'"));

          if ($check2 > 0 || $check22 > 0){
            $color = 'style="background-color: #2c72b1;border: 1px solid #2c72b1;"';
          }else{
            $color = 'style="background-color: #ed6161;border: 1px solid #ed6161;"';
          }
          ?>
          <button class="btn btn-success" <?= $color ?> disabled>Qtr2</button>
          &nbsp;

          <?php
          $check3 = mysql_num_rows(mysql_query("select * from quarter_3 where child_id='".$getDet['child_id']."'"));

          $check33 = mysql_num_rows(mysql_query("select * from quarter_33 where child_id='".$getDet['child_id']."'"));

          if ($check3 > 0 || $check33 > 0){
            $color = 'style="background-color: #2c72b1;border: 1px solid #2c72b1;"';
          }else{
            $color = 'style="background-color: #ed6161;border: 1px solid #ed6161;"';
          }
          ?>
          <button class="btn btn-success" <?= $color ?> disabled>Qtr3</button>
          &nbsp;

          <?php
          $check4 = mysql_num_rows(mysql_query("select * from quarter_4 where child_id='".$getDet['child_id']."'"));

          $check44 = mysql_num_rows(mysql_query("select * from quarter_44 where child_id='".$getDet['child_id']."'"));

          if ($check4 > 0 || $check44 > 0){
            $color = 'style="background-color: #2c72b1;border: 1px solid #2c72b1;"';
          }else{
            $color = 'style="background-color: #ed6161;border: 1px solid #ed6161;"';
          }
          ?>
          <button class="btn btn-success" <?= $color ?> disabled>Qtr4</button>
          &nbsp;
          </td>

          <td class="col-sm-1">
            <a href="add_child_progress.php?pid=<?php echo base64_encode($getDet['child_id']); ?>"><button class="btn btn-success">Add Report</button></a>
          </td>
        </tr>
    
      <?php
      $i++;}
      ?>
   
      <tr>
      <td class="col-sm-12" height="30" colspan="6">&nbsp;</td>
      </tr>
   
   
      <tr>
        <td colspan="6">
          <div class="pagination" >
            <div style="float: left; color:#2288f1; margin-right: 50px;"><?php echo $paginationDisplay; ?></div>

            <div style="line-height: 32px; float: right;">
              <input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" name="jumpBtn" id="jumpBtn" value="Go To Page" onclick="jumpToPage()" class="jump" />

              <input type="text" name="jumpTo" id="jumpTo" placeholder="Enter Page No" onkeypress="return isNumberKey(event)" style="border: 1px solid; height: 30px; border-radius: 3px; width: 100px; text-align: center; margin-right: 10px;" />
               
            </div>

        </div>
        </td>
      </tr>
    </div>
   </table>
   </div>
   </div>
   </div>
  <!-- Wrapper End --> 
  
  



  <!-- Logo Start -->
  
    <?php
    include('include/footer.php');
    ?>
  <!-- Sidebar Navigation End --> 
  
  
  </div>

</body>
</html>