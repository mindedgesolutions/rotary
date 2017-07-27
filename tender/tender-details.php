<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

<?php
$masterDet = mysql_fetch_array(mysql_query("select * from tender_master where tender_no='".base64_decode($_REQUEST['tno'])."'"));

$docDet = mysql_fetch_array(mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'"));

$orgDet = mysql_fetch_array(mysql_query("select * from tender_registration_details where uid='".$masterDet['uid']."'"));
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

<style type="text/css">

.container{
  margin-bottom:20px;
  min-height: 350px;
}
.table-tr{
  height: 50px;
  line-height: 50px;
}
.btn-holder{
	margin-top:20px;
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
        <li class="active">Tender Details</li>
        <span style="float: right;">IFB/Tender No. <?= '<b>'.$masterDet['tender_id'].'</b>'; ?></span>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

      <table class="col-sm-12">
	   <tr><td colspan="2" style="height: 15px;"></td></tr>
        <tr class="table-tr">
          <td class="col-sm-6">Organization Name : </td>
          <td class="col-sm-6"><?= strtoupper(urldecode($orgDet['organization_name'])) ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Contact Person : </td>
          <td class="col-sm-6"><?= strtoupper($orgDet['contact_person']) ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Mobile No. : </td>
          <td class="col-sm-6"><?= $orgDet['mobile_no'] ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">PAN : </td>
          <td class="col-sm-6"><?= $masterDet['pan_no'] ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">TAN : </td>
          <td class="col-sm-6"><?= $masterDet['tan_no'] ?></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-6">Service Tax Registration No. : </td>
          <td class="col-sm-6"><?= $masterDet['tax_reg_no'] ?></td>
        </tr>

        <tr><td colspan="2" style="height: 15px;"></td></tr>

        <tr><td colspan="2" style="border-bottom: 1px solid #ccc;"></td></tr>

        <tr><td colspan="2" style="height: 15px;"></td></tr>

      </table>

      <table class="col-sm-12" border="1" style="text-align: center;">
        <tr class="table-tr" style="background-color:#1980cf;color:#ffffff;">
          <td class="col-sm-4">Product</td>
          <td class="col-sm-1">Unit Cost</td>
          <td class="col-sm-1">VAT</td>
          <td class="col-sm-1">Service TAX</td>
          <td class="col-sm-1">Total Cost</td>
          <td class="col-sm-1">Est. Del.</td>
          <td class="col-sm-2">Image</td>
        </tr>

        <?php
        $query_prdDet = mysql_query("select * from tender_details where tender_no='".base64_decode($_REQUEST['tno'])."'");
        while ($prdDet = mysql_fetch_array($query_prdDet)){

          $prdName = mysql_fetch_array(mysql_query("select * from tender_product_master where product_id='".$prdDet['product_code']."'"));

          $image = explode('/', $prdDet['product_image']);
          $imageName = $image[2];

        ?>
        <tr class="table-tr">
          <td class="col-sm-4" style="padding: 5px 0;line-height: 18px;"><?= strtoupper(urldecode($prdName['product_name'])) ?></td>

          <td class="col-sm-1"><?= $prdDet['price_wo_vat'] ?></td>

          <td class="col-sm-1"><?= $prdDet['vat'] ?></td>

          <td class="col-sm-1"><?= $prdDet['service_tax'] ?></td>

          <td class="col-sm-1"><?= $prdDet['total_price'] ?></td>

          <td class="col-sm-1"><?= $prdDet['est_delivery_date'] ?></td>

          <td class="col-sm-2" style="padding: 8px;">
            <a download="<?= $imageName ?>" href="<?= $prdDet['product_image'] ?>" title="Image">
              <img src="<?= $prdDet['product_image'] ?>" width="80" height="80" />
            </a>
          </td>
        </tr>
        <?php } ?>
      </table>

      <div style="border-bottom: 1px solid #ccc;margin: 30px 0;width: 100%;"></div>

      <table class="col-sm-12" border="1" style="text-align: center;">
        <tr class="table-tr" style="background-color:#1980cf;color:#ffffff;">
          <td class="col-sm-4" style="line-height: 18px;">Quotation on company’s letterhead</td>
          <td class="col-sm-1" style="line-height: 18px;">Address Proof</td>
          <td class="col-sm-1" style="line-height: 18px;">Registration Certificate</td>
          <td class="col-sm-1" style="line-height: 18px;">PAN</td>
          <td class="col-sm-1" style="line-height: 18px;">TAN</td>
          <td class="col-sm-1" style="line-height: 18px;">CIN</td>
          <td class="col-sm-2" style="line-height: 18px;">Service Tax Reg. Certificate</td>
          <td class="col-sm-1" style="line-height: 18px;">Product Brochure</td>
        </tr>

        <?php
        $query_docDet = mysql_query("select * from tender_documents where tender_no='".base64_decode($_REQUEST['tno'])."'");
        while ($docDet = mysql_fetch_array($query_docDet)){

          $document1 = explode('/', $docDet['quotation_letter_head']);
          $doc1 = $document1[2];

          $document2 = explode('/', $docDet['address_proof']);
          $doc2 = $document2[2];

          $document3 = explode('/', $docDet['registration_certificate']);
          $doc3 = $document3[2];

          $document4 = explode('/', $docDet['pan']);
          $doc4 = $document4[2];

          $document5 = explode('/', $docDet['tan']);
          $doc5 = $document5[2];

          $document6 = explode('/', $docDet['cin']);
          $doc6 = $document6[2];

          $document7 = explode('/', $docDet['service_tax_certificate']);
          $doc7 = $document7[2];

          $document8 = explode('/', $docDet['product_brochure']);
          $doc8 = $document8[2];
        ?>
        <tr class="table-tr">
          <td class="col-sm-4">
            <?php if ($doc1!=''){ ?>
            <a download="<?= $doc1 ?>" href="<?= $docDet['quotation_letter_head'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>

          <td class="col-sm-1">
            <?php if ($doc2!=''){ ?>
            <a download="<?= $doc2 ?>" href="<?= $docDet['address_proof'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>

          <td class="col-sm-1">
            <?php if ($doc3!=''){ ?>
            <a download="<?= $doc3 ?>" href="<?= $docDet['registration_certificate'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>

          <td class="col-sm-1">
            <?php if ($doc4!=''){ ?>
            <a download="<?= $doc4 ?>" href="<?= $docDet['pan'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>

          <td class="col-sm-1">
            <?php if ($doc5!=''){ ?>
            <a download="<?= $doc5 ?>" href="<?= $docDet['tan'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>

          <td class="col-sm-1">
            <?php if ($doc6!=''){ ?>
            <a download="<?= $doc6 ?>" href="<?= $docDet['cin'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>

          <td class="col-sm-2">
            <?php if ($doc7!=''){ ?>
            <a download="<?= $doc7 ?>" href="<?= $docDet['service_tax_certificate'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>

          <td class="col-sm-1">
            <?php if ($doc8!=''){ ?>
            <a download="<?= $doc8 ?>" href="<?= $docDet['product_brochure'] ?>" title="Doc">
              <img src="document.png" width="40" height="40" />
            </a>
            <?php }else{ ?>
            N/A;
            <?php } ?>
          </td>
        </tr>
        <?php } ?>
      </table>
      <div class="col-sm-12" height="30px"></div>
      <div class="btn-holder" class="col-sm-12" style="text-align: center;margin: 50px 0;">
        <a href="list-view-tender.php"><input type="button" name="backBtn" id="backBtn" value="Back To List" class="btn btn-primary" /></a>
      </div>

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