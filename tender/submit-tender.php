<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from tender_registration_details where uid='".base64_decode($_REQUEST['uid'])."'"));

$tenderDet = mysql_fetch_array(mysql_query("select * from tender_master where tender_no='".base64_decode($_REQUEST['tno'])."' and uid='".base64_decode($_REQUEST['uid'])."'"));
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

<?php include 'include/header-link.php'; ?>

<script type="text/javascript">
$(function() {
    $("#inc_date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2150",
        maxDate: '0',
        dateFormat: 'dd-mm-yy'
    });
});

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

function restrictFifteen(){

  var service_reg_no = $('#service_reg_no').val();

  if (service_reg_no.length > 15){

    alert('Incorrect format');
    document.getElementById('service_reg_no').value = '';
  }
}

function restrictTen(){

  var tan_no = $('#tan_no').val();
  var pan_no = $('#pan_no').val();

  if (tan_no.length > 10 || pan_no.length > 10){
    
    alert('Incorrect format');
    document.getElementById('tan_no').value = '';
  }
}
</script>

<style type="text/css">
.container{
  margin-bottom:20px;
  min-height: 350px;
}
.table-tr{
  height: 50px;
  line-height: 50px;
}
#inc_date:hover{
  cursor: pointer;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">

 <?php include('include/header.php'); ?>
 
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Submit Tender : Part - I</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

      <?php
      if (isset($_REQUEST['submitBtn'])){

        $inc_date = date('Y-m-d', strtotime($_REQUEST['inc_date']));

          $update = "update tender_master set tan_no='".$_REQUEST['tan_no']."', pan_no='".$_REQUEST['pan_no']."', tax_reg_no='".$_REQUEST['service_reg_no']."', created_on='".$inc_date."', reg_no='".$_REQUEST['registration_no']."', cin_no='".$_REQUEST['cin_no']."' where tender_no='".base64_decode($_REQUEST['tno'])."' and uid='".$_SESSION['uid']."'";

          mysql_query($update);

          if (!file_exists('tender_product_images/'.base64_decode($_REQUEST['tno']))){
              mkdir('tender_product_images/'.base64_decode($_REQUEST['tno']), 0777, true);
            }

        ?>
        <script type="text/javascript">
          window.location = 'submit-tender-2.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>';
        </script>
        <?php
      }
      ?>

      <form action="" method="post" autocomplete="off">

      <table class="col-sm-12">
        <tr class="table-tr">
          <td class="col-sm-6">Organization Name : </td>
          <td class="col-sm-6"><?= strtoupper(urldecode($getDet['organization_name'])); ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Phone No. : </td>
          <td class="col-sm-6"><?= $getDet['mobile_no'] ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Representative's Name : </td>
          <td class="col-sm-6"><?= strtoupper($getDet['contact_person']) ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Date of Organization incorporation : </td>
          <td class="col-sm-6">

            <?php if($tenderDet['created_on']=='0000-00-00'){$date = '';}else{$date = date('d-m-Y', strtotime($tenderDet['created_on']));}
            ?>

            <input type="text" name="inc_date" id="inc_date" class="form-control" value="<?= $date ?>" readonly="readonly" required />
          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Tender ID : </td>
          <td class="col-sm-6"><?= base64_decode($_REQUEST['tno']) ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">IFB / Tender No. : </td>
          <td class="col-sm-6"><?= base64_decode($_REQUEST['tid']) ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">CIN No : </td>
          <td class="col-sm-6">
            <input type="text" name="cin_no" id="cin_no" class="form-control" onkeyup="nospecial(this)" value="<?= $tenderDet['cin_no'] ?>" required />
          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Registration No : </td>
          <td class="col-sm-6">
            <input type="text" name="registration_no" id="registration_no" class="form-control" onkeyup="nospecial(this)" value="<?= $tenderDet['reg_no'] ?>" required />
          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">TAN : </td>
          <td class="col-sm-6">
            <input type="text" name="tan_no" id="tan_no" class="form-control" onkeyup="nospecial(this)" value="<?= $tenderDet['tan_no'] ?>" required maxlength="10" />
          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">PAN : </td>
          <td class="col-sm-6">
            <input type="text" name="pan_no" id="pan_no" class="form-control" onkeyup="nospecial(this)" value="<?= $tenderDet['pan_no'] ?>" required maxlength="10" />
          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Service Tax Registration No : </td>
          <td class="col-sm-6">
            <input type="text" name="service_reg_no" id="service_reg_no" class="form-control" onkeyup="nospecial(this)" value="<?= $tenderDet['tax_reg_no'] ?>" required maxlength="15" />
          </td>
        </tr>

        <tr><td colspan="2" style="height: 20px;"></td></tr>

        <tr>
           <td class="col-sm-6"></td>
            <td class="col-sm-6"><input type="submit" name="submitBtn" id="submitBtn" value="Proceed" class="btn btn-primary" />
          </td>
        </tr>
      </table>

      </form>

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