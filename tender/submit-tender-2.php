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

/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}
/*----------------------Whole Numbers only-------------------------*/
function wholenumbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}

function showDetails(){

  var product_id = $('#product_id').val();

  if (product_id!=''){

    document.getElementById('cost_wo_vat').value = '';
    document.getElementById('vat').value = '';
    document.getElementById('service_tax').value = '';
    document.getElementById('unit_cost').value = '';
    document.getElementById('delivery_time').value = '';

    $("#detailsRow").fadeIn('slow');
    $("#btnRow").fadeIn('slow');
  }else{

    $("#detailsRow").fadeOut('fast');
    $("#btnRow").fadeOut('fast');
  }
}

function calculatePrice1(){

  var total = 0;
  var cost_wo_vat = $('#cost_wo_vat').val();
  var vat = $('#vat').val();
  var service_tax = $('#service_tax').val();

  if (cost_wo_vat!=''){

    total = Number(cost_wo_vat) + Number(vat) + Number(service_tax);
    $('#unit_cost').val(total);
  }
}

function calculatePrice2(){

  var total = 0;
  var cost_wo_vat = $('#cost_wo_vat').val();
  var vat = $('#vat').val();
  var service_tax = $('#service_tax').val();

  if (cost_wo_vat==''){

    alert('Per unit cost is missing');
  }else{

    total = Number(cost_wo_vat) + Number(vat) + Number(service_tax);
    $('#unit_cost').val(total);
  }
}

function calculatePrice3(){

  var total = 0;
  var cost_wo_vat = $('#cost_wo_vat').val();
  var vat = $('#vat').val();
  var service_tax = $('#service_tax').val();

  if (cost_wo_vat==''){

    alert('Per unit cost is missing');
  }else if (vat==''){

    alert('VAT is missing');
  }else if (service_tax==''){

    alert('Service TAX is missing');
  }else if (cost_wo_vat!='' && vat!='' && service_tax!=''){

    total = Number(cost_wo_vat) + Number(vat) + Number(service_tax);
    $('#unit_cost').val(total);
  }
}

function deleteProduct(par){

  var dbsln = $('#dbsln'+par).val();
  var result = confirm("Want to delete?");

  if (result){

    $.ajax({

      url: 'delete-product.php',
      type: 'post',
      data: 'dbsln=' + dbsln,
      success: function(f){

        alert('Product has been deleted');
        window.location.reload();
      }
    })
  }else{

    alert('Action is cancelled');
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
#thumb-output img{
  width: 100%;
  height: 100%;
}
.btnHolder{
  width: 100%;
  height: auto;
  margin: 50px 0 20px 0;
  text-align: center;
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
        <li class="active">Submit Tender : Part - II</li>
        <span style="float: right;">IFB / Tender No. <?= "<b>".base64_decode($_REQUEST['tid'])."</b>" ?></span>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">


      <?php

      if (isset($_REQUEST['submitBtn'])){

        if($_FILES["product_img"]["size"] > 0){

        $extension = explode('.', $_FILES["product_img"]["name"]);
        $exten = $extension[1];

        if ($exten=='jpg' || $exten=='JPG' || $exten=='JPEG'){
          

          $fnm = $_FILES['product_img']['name'];
          $dst = 'tender_product_images/'.base64_decode($_REQUEST['tno']).'/'.$fnm;

          $upload = move_uploaded_file($_FILES['product_img']['tmp_name'], $dst);


          $check = mysql_num_rows(mysql_query("select * from tender_details where tender_no='".base64_decode($_REQUEST['tno'])."' and product_code='".$_REQUEST['product_id']."'"));

          if ($check==0){

            $insert = "insert into tender_details(SLN, tender_no, tender_id, product_code, price_wo_vat, vat, service_tax, total_price, est_delivery_date, product_image) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$_REQUEST['product_id']."', '".$_REQUEST['cost_wo_vat']."', '".$_REQUEST['vat']."', '".$_REQUEST['service_tax']."', '".$_REQUEST['unit_cost']."', '".$_REQUEST['delivery_time']."', '".$dst."')";

            mysql_query($insert);

            if (!file_exists('tender_docs/'.base64_decode($_REQUEST['tno']))){
              mkdir('tender_docs/'.base64_decode($_REQUEST['tno']), 0777, true);
            }
          ?>
          <script type="text/javascript">
            alert('Data has been saved');
            window.location = 'submit-tender-2.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>';
          </script>
          <?php
          }else{

            $update = "update tender_details set price_wo_vat='".$_REQUEST['cost_wo_vat']."', vat='".$_REQUEST['vat']."', service_tax='".$_REQUEST['service_tax']."', total_price='".$_REQUEST['unit_cost']."', est_delivery_date='".$_REQUEST['delivery_time']."', product_image='".$dst."' where tender_no='".base64_decode($_REQUEST['tno'])."' and product_code='".$_REQUEST['product_id']."'";

            mysql_query($update);
          ?>
          <script type="text/javascript">
            alert('Data have been saved');
            window.location = 'submit-tender-2.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>';
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Image file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select an image for the product");
        </script>
        <?php
        }
      }
      ?>

      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

      <table class="col-sm-12">
        <tr>
          <td class="col-sm-6">Organization Name : </td>
          <td class="col-sm-6"><?= strtoupper(urldecode($getDet['organization_name'])); ?></td>
        </tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Phone No. : </td>
          <td class="col-sm-6"><?= $getDet['mobile_no'] ?></td>
        </tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Representative's Name : </td>
          <td class="col-sm-6"><?= strtoupper($getDet['contact_person']) ?></td>
        </tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
        <tr>
          <td class="col-sm-6">TAN : </td>
          <td class="col-sm-6"><?= $tenderDet['tan_no'] ?></td>
        </tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
        <tr>
          <td class="col-sm-6">PAN : </td>
          <td class="col-sm-6"><?= $tenderDet['pan_no'] ?></td>
        </tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Service Registration No. : </td>
          <td class="col-sm-6"><?= $tenderDet['tax_reg_no'] ?></td>
        </tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
        <tr><td colspan="2" style="border-bottom: 1px solid #ccc;"></td></tr>

        <tr>
          <td class="col-sm-6">Select Product : </td>
          <td class="col-sm-6" style="padding-top:10px;padding-bottom:10px;"> 
            <select name="product_id" id="product_id" onchange="showDetails()" class="form-control">
              <option value="">-- Please Select --</option>

              <?php
              $query_product = mysql_query("select * from tender_product_master where status='active'");
              while ($getProduct = mysql_fetch_array($query_product)){
              ?>

              <option value="<?= $getProduct['product_id'] ?>"><?= strtoupper(urldecode($getProduct['product_name'])) ?></option>

              <?php } ?>
            </select>

          </td>
        </tr>

        <tr><td colspan="2" style="border-bottom: 1px solid #ccc;"></td></tr>

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
          <td colspan="2">

          <div class="col-sm-12" style="display: none;" id="detailsRow">

            <table class="col-sm-12">
              <tr>
                <td class="col-sm-3">Per Unit Cost : </td>
                <td class="col-sm-3"><input type="text" name="cost_wo_vat" id="cost_wo_vat" class="form-control" onkeyup="numbersOnly(this)" onblur="calculatePrice1()" value="" required /></td>

                <td class="col-sm-3">VAT : </td>
                <td class="col-sm-3"><input type="text" name="vat" id="vat" class="form-control" onkeyup="numbersOnly(this)" onblur="calculatePrice2()" value="" required /></td>
              </tr>
			   <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td class="col-sm-3">Service TAX : </td>
                <td class="col-sm-3"><input type="text" name="service_tax" id="service_tax" class="form-control" onkeyup="numbersOnly(this)" onblur="calculatePrice3()" value="" required /></td>

                <td class="col-sm-3">Total Unit Cost : </td>
                <td class="col-sm-3"><input type="text" name="unit_cost" id="unit_cost" class="form-control" value="" readonly="readonly" /></td>
              </tr>
				<tr><td colspan="2" style="height: 10px;"></td></tr>
              <tr >
                <td class="col-sm-3" style="vertical-align: top;">Estimated Del. Days : </td>
                <td class="col-sm-3" style="vertical-align: top;"><input type="text" name="delivery_time" id="delivery_time" class="form-control" onkeyup="wholenumbersOnly(this)" value="" required /></td>

                <td class="col-sm-3" style="vertical-align: top;">Product Image : </td>
                <td class="col-sm-3">
                  <input type="file" id="exampleInputFile" name="product_img" required />

                  <div id="thumb-output" style="width: 100px;height: 100px;border: 1px solid #ccc;"></div>
                </td>
              </tr>
            </table>

            </div>

          </td>            
        </tr>

        <tr><td colspan="2" style="height: 40px;"></td></tr>

        <tr>
          <td colspan="2" style="text-align: center;">
            <div style="display: none;" id="btnRow">

            <input type="submit" name="submitBtn" id="submitBtn" value="Add To List" class="btn btn-primary" />

            </div>
          </td>
        </tr>
      </table>

      </form>

      <?php
      $checkRow = mysql_num_rows(mysql_query("select * from tender_details where tender_no='".base64_decode($_REQUEST['tno'])."'"));

      if ($checkRow > 0){
      ?>

      <table class="col-sm-12" border="1" style="border-collapse: collapse;text-align: center;">
        <tr style="background-color:#1980cf;color:#ffffff;">
          <td class="col-sm-4">Product</td>
          <td class="col-sm-1">Unit Cost</td>
          <td class="col-sm-1">VAT</td>
          <td class="col-sm-1">Service TAX</td>
          <td class="col-sm-1">Total Cost</td>
          <td class="col-sm-1">Est. Del.</td>
          <td class="col-sm-2">Image</td>
          <td class="col-sm-1">Action</td>
        </tr>
        <?php
        $i = 1;

        $query_tenderDet = mysql_query("select * from tender_details where tender_no='".base64_decode($_REQUEST['tno'])."' order by SLN desc");

        while ($tenderDet = mysql_fetch_array($query_tenderDet)){

          $prdName = mysql_fetch_array(mysql_query("select * from tender_product_master where product_id='".$tenderDet['product_code']."'"));
        ?>
        <tr>
          <td class="col-sm-4"><?= strtoupper(urldecode($prdName['product_name'])) ?></td>

          <input type="hidden" name="dbsln<?= $i ?>" id="dbsln<?= $i ?>" value="<?= $tenderDet['SLN'] ?>" />

          <td class="col-sm-1"><?= $tenderDet['price_wo_vat'] ?></td>

          <td class="col-sm-1"><?= $tenderDet['vat'] ?></td>

          <td class="col-sm-1"><?= $tenderDet['service_tax'] ?></td>

          <td class="col-sm-1"><?= $tenderDet['total_price'] ?></td>

          <td class="col-sm-1"><?= $tenderDet['est_delivery_date'] ?></td>

          <td class="col-sm-2"><img src="<?= $tenderDet['product_image'] ?>" width="75" height="75" /></td>

          <td class="col-sm-1" style="text-align: center;">
            <input type="button" name="delBtn" id="delBtn" value="Delete" class="btn btn-primary" onclick="deleteProduct(<?= $i ?>)" />
          </td>
        </tr>
        <?php $i++;} ?>
      </table>

      <div class="col-sm-12">
		<div class="col-sm-4"></div>
		<div class="col-sm-4" align="middle">
        <a href="submit-tender.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>"><input type="button" name="backBtn" id="backBtn" class="btn btn-primary" value="Back" style="margin-right: 10px;" /></a>


        <a href="submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>"><input type="button" name="proceedBtn" id="proceedBtn" class="btn btn-primary" value="Proceed" /></a>
		</div>
		<div class="col-sm-4"></div>
      </div>

      <?php } ?>
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


<script>
$(document).ready(function(){
  $('#exampleInputFile').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
      $('#thumb-output').html(''); //clear html of output element
      var data = $(this)[0].files; //this file data
      
      $.each(data, function(index, file){ //loop though each file
        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
          var fRead = new FileReader(); //new filereader
          fRead.onload = (function(file){ //trigger function on successful read
          return function(e) {
            var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
            $('#thumb-output').append(img); //append image to output element
          };
          })(file);
          fRead.readAsDataURL(file); //URL representing the file's data.
        }
      });
        
    }else{
      alert("Your browser doesn't support File API!"); //if File API is absent
    }
  });
});
</script>