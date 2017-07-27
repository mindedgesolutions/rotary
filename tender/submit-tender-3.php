<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from tender_registration_details where uid='".base64_decode($_REQUEST['uid'])."'"));

$tenderDet = mysql_fetch_array(mysql_query("select * from tender_master where tender_no='".base64_decode($_REQUEST['tno'])."' and uid='".base64_decode($_REQUEST['uid'])."'"));

$confirm = mysql_fetch_array(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));
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

function checkDoc(){

  var tno = $('#tno').val();
  var tid = $('#tid').val();
  var uid = $('#uid').val();

  $.ajax({

    url: 'check-documents.php',
    type: 'post',
    data: 'tno=' + tno,
    success: function(f){

      if (f==1){

        alert('Please upload all required documents');
        return false;
      }else{

        alert('Your tender has been submitted successfully');
        //window.location = 'print_tender.php?tno=' + tno;
        window.location = 'index.php';
      }
    }
  })
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
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">


<input type="hidden" name="tno" id="tno" value="<?= base64_decode($_REQUEST['tno']) ?>" />
<input type="hidden" name="tid" id="tid" value="<?= base64_decode($_REQUEST['tid']) ?>" />
<input type="hidden" name="uid" id="uid" value="<?= base64_decode($_REQUEST['uid']) ?>" />

 <?php include('include/header.php'); ?>
 
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Submit Tender : Part - III</li>
        <span style="float: right;">IFB / Tender No. <?= "<b>".base64_decode($_REQUEST['tid'])."</b>" ?></span>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">


      <?php
      //--------------For first upload-----------------//
      if (isset($_REQUEST['submitBtn1'])){

        if($_FILES["file1"]["size"] > 0){

        $extension1 = explode('.', $_FILES["file1"]["name"]);
        $exten1 = $extension1[1];

        if ($exten1=='jpg' || $exten1=='JPG' || $exten1=='PDF' || $exten1=='pdf'){
          

          $fnm1 = $_FILES['file1']['name'];
          $dst1 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm1;

          $upload1 = move_uploaded_file($_FILES['file1']['tmp_name'], $dst1);


          $check1 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check1==0){

            $insert1 = "insert into tender_documents(SLN, tender_no, tender_id, quotation_letter_head) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst1."')";

            mysql_query($insert1);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update1 = "update tender_documents set quotation_letter_head='".$dst1."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update1);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }

      //--------------For second upload-----------------//
      if (isset($_REQUEST['submitBtn2'])){

        if($_FILES["file2"]["size"] > 0){

        $extension2 = explode('.', $_FILES["file2"]["name"]);
        $exten2 = $extension2[1];

        if ($exten2=='jpg' || $exten2=='JPG' || $exten2=='PDF' || $exten2=='pdf'){
          

          $fnm2 = $_FILES['file2']['name'];
          $dst2 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm2;

          $upload2 = move_uploaded_file($_FILES['file2']['tmp_name'], $dst2);


          $check2 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check2==0){

            $insert2 = "insert into tender_documents(SLN, tender_no, tender_id, address_proof) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst2."')";

            mysql_query($insert2);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update2 = "update tender_documents set address_proof='".$dst2."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update2);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }

      //--------------For third upload-----------------//
      if (isset($_REQUEST['submitBtn3'])){

        if($_FILES["file3"]["size"] > 0){

        $extension3 = explode('.', $_FILES["file3"]["name"]);
        $exten3 = $extension3[1];

        if ($exten3=='jpg' || $exten3=='JPG' || $exten3=='PDF' || $exten3=='pdf'){
          

          $fnm3 = $_FILES['file3']['name'];
          $dst3 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm3;

          $upload3 = move_uploaded_file($_FILES['file3']['tmp_name'], $dst3);


          $check3 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check3==0){

            $insert3 = "insert into tender_documents(SLN, tender_no, tender_id, registration_certificate) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst3."')";

            mysql_query($insert3);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update3 = "update tender_documents set registration_certificate='".$dst3."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update3);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }

      //--------------For fourth upload-----------------//
      if (isset($_REQUEST['submitBtn4'])){

        if($_FILES["file4"]["size"] > 0){

        $extension4 = explode('.', $_FILES["file4"]["name"]);
        $exten4 = $extension4[1];

        if ($exten4=='jpg' || $exten4=='JPG' || $exten4=='PDF' || $exten4=='pdf'){
          

          $fnm4 = $_FILES['file4']['name'];
          $dst4 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm4;

          $upload4 = move_uploaded_file($_FILES['file4']['tmp_name'], $dst4);


          $check4 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check4==0){

            $insert4 = "insert into tender_documents(SLN, tender_no, tender_id, pan) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst4."')";

            mysql_query($insert4);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update4 = "update tender_documents set pan='".$dst4."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update4);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }

      //--------------For fifth upload-----------------//
      if (isset($_REQUEST['submitBtn5'])){

        if($_FILES["file5"]["size"] > 0){

        $extension5 = explode('.', $_FILES["file5"]["name"]);
        $exten5 = $extension5[1];

        if ($exten5=='jpg' || $exten5=='JPG' || $exten5=='PDF' || $exten5=='pdf'){
          

          $fnm5 = $_FILES['file5']['name'];
          $dst5 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm5;

          $upload5 = move_uploaded_file($_FILES['file5']['tmp_name'], $dst5);


          $check5 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check5==0){

            $insert5 = "insert into tender_documents(SLN, tender_no, tender_id, tan) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst5."')";

            mysql_query($insert5);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update5 = "update tender_documents set tan='".$dst5."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update5);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }

      //--------------For sixth upload-----------------//
      /*if (isset($_REQUEST['submitBtn6'])){

        if($_FILES["file6"]["size"] > 0){

        $extension6 = explode('.', $_FILES["file6"]["name"]);
        $exten6 = $extension6[1];

        if ($exten6=='jpg' || $exten6=='JPG' || $exten6=='PDF' || $exten6=='pdf'){
          

          $fnm6 = $_FILES['file6']['name'];
          $dst6 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm6;

          $upload6 = move_uploaded_file($_FILES['file6']['tmp_name'], $dst6);


          $check6 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check6==0){

            $insert6 = "insert into tender_documents(SLN, tender_no, tender_id, cin) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst6."')";

            mysql_query($insert6);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update6 = "update tender_documents set cin='".$dst6."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update6);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }*/

      //--------------For sixth upload-----------------//
      if (isset($_REQUEST['submitBtn6'])){

        if($_FILES["file6"]["size"] > 0){

        $extension6 = explode('.', $_FILES["file6"]["name"]);
        $exten6 = $extension6[1];

        if ($exten6=='jpg' || $exten6=='JPG' || $exten6=='PDF' || $exten6=='pdf'){
          

          $fnm6 = $_FILES['file6']['name'];
          $dst6 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm6;

          $upload6 = move_uploaded_file($_FILES['file6']['tmp_name'], $dst6);


          $check6 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check6==0){

            $insert6 = "insert into tender_documents(SLN, tender_no, tender_id, past_client) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst6."')";

            mysql_query($insert6);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update6 = "update tender_documents set past_client='".$dst6."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update6);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }

      //--------------For seventh upload-----------------//
      if (isset($_REQUEST['submitBtn7'])){

        if($_FILES["file7"]["size"] > 0){

        $extension7 = explode('.', $_FILES["file7"]["name"]);
        $exten7 = $extension7[1];

        if ($exten7=='jpg' || $exten7=='JPG' || $exten7=='PDF' || $exten7=='pdf'){
          

          $fnm7 = $_FILES['file7']['name'];
          $dst7 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm7;

          $upload7 = move_uploaded_file($_FILES['file7']['tmp_name'], $dst7);


          $check7 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check7==0){

            $insert7 = "insert into tender_documents(SLN, tender_no, tender_id, service_tax_certificate) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst7."')";

            mysql_query($insert7);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update7 = "update tender_documents set service_tax_certificate='".$dst7."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update7);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }

      //--------------For seventh upload-----------------//
      if (isset($_REQUEST['submitBtn8'])){

        if($_FILES["file8"]["size"] > 0){

        $extension8 = explode('.', $_FILES["file8"]["name"]);
        $exten8 = $extension8[1];

        if ($exten8=='jpg' || $exten8=='JPG' || $exten8=='PDF' || $exten8=='pdf'){
          

          $fnm8 = $_FILES['file8']['name'];
          $dst8 = 'tender_docs/'.base64_decode($_REQUEST['tno']).'/'.$fnm8;

          $upload8 = move_uploaded_file($_FILES['file8']['tmp_name'], $dst8);


          $check8 = mysql_num_rows(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

          if ($check8==0){

            $insert8 = "insert into tender_documents(SLN, tender_no, tender_id, product_brochure) values('', '".base64_decode($_REQUEST['tno'])."', '".base64_decode($_REQUEST['tid'])."', '".$dst8."')";

            mysql_query($insert8);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }else{

            $update8 = "update tender_documents set product_brochure='".$dst8."' where tender_no='".base64_decode($_REQUEST['tno'])."'";

            mysql_query($update8);
          ?>
          <script type="text/javascript">
            alert('Uploaded successfully');
            window.location = "submit-tender-3.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>";
          </script>
          <?php
          }
          }else{
          ?>
          <script>
          alert("Document file type not supported");
          </script>
          <?php
          } 

        }else{
        ?>
        <script>
        alert("Please select a file to upload");
        </script>
        <?php
        }
      }
      ?>

      <form action="" method="post" enctype="multipart/form-data">

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

        <tr><td colspan="2">&nbsp;</td></tr>

        <tr>
          <td colspan="2">
            <table class="col-sm-12">
              <tr>
                <td class="col-sm-6">&nbsp;</td>
                <td class="col-sm-6" colspan="3" style="color: #428bca; word-spacing: 3px;">
                  .jpg AND .pdf FILES ONLY<br /><br />
                  Documents should be signed and stamped by respective authority of the organisation
                </td>
              </tr>

              <tr><td colspan="2" style="height: 40px;"></td></tr>

              <tr>
                <td class="col-sm-6">Registration Certificate : </td>
                <td class="col-sm-3">
                  <input type="file" name="file3" />
                </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn3" id="submitBtn3" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['registration_certificate']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>

              <tr><td colspan="2" style="height: 20px;"></td></tr>

              <tr>
                <td class="col-sm-6">Address Proof : </td>
                <td class="col-sm-3">
                  <input type="file" name="file2" />
                </td>
                <td class="col-sm-1"> 
                  <input type="submit" name="submitBtn2" id="submitBtn2" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['address_proof']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>

              <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td class="col-sm-6">PAN : </td>
                <td class="col-sm-3">
                  <input type="file" name="file4" />
                </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn4" id="submitBtn4" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['pan']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>

              <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td class="col-sm-6">Service TAX Registration Certificate : </td>
                <td class="col-sm-3">
                  <input type="file" name="file7" />
                </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn7" id="submitBtn7" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['service_tax_certificate']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>

              <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td class="col-sm-6">TAN Registration Certificate : </td>
                <td class="col-sm-3">
                  <input type="file" name="file5" />
                </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn5" id="submitBtn5" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['tan']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>

              <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td class="col-sm-6">Quotation (on Letterhead of organisation) : </td>
                <td class="col-sm-3">
                  <input type="file" name="file1" />
                  </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn1" id="submitBtn1" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['quotation_letter_head']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>

				      <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td class="col-sm-6">Product Brochure : </td>
                <td class="col-sm-3">
                  <input type="file" name="file8" />
                </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn8" id="submitBtn8" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['product_brochure']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>

              <tr><td colspan="2" style="height: 10px;"></td></tr>

              <!--<tr>
                <td class="col-sm-6">CIN : </td>
                <td class="col-sm-3">
                  <input type="file" name="file6" />
                </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn6" id="submitBtn6" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['cin']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>-->

              <tr>
                <td class="col-sm-6">List of Past Clients/Customers : </td>
                <td class="col-sm-3">
                  <input type="file" name="file6" />
                </td>
                <td class="col-sm-1">
                  <input type="submit" name="submitBtn6" id="submitBtn6" class="btn btn-primary" value="Upload" />
                </td>
                <td class="col-sm-2" style="color: #00ce6b;"><?php if($confirm['past_client']==''){echo '';}else{echo 'Document is saved';}  ?></td>
              </tr>
            </table>
          </td>
        </tr>

        <tr><td colspan="2" style="height: 40px;"></td></tr>

        <tr>
          <td class="col-sm-6" ></td>
            <td class="col-sm-6" style="float:left;">
			<a href="submit-tender-2.php?tid=<?= $_REQUEST['tid'] ?>&uid=<?= $_REQUEST['uid'] ?>&tno=<?= $_REQUEST['tno'] ?>"><input type="button" name="backBtn" id="backBtn" class="btn btn-primary" value="Back" style="margin-right: 10px;" /></a>


            <input type="button" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Submit Tender" onclick="checkDoc()" />
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