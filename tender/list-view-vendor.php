<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

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

<script>
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

 <?php include('include/header.php'); ?>
    
    <?php include 'pagination_vendor.php'; ?>

    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vendor List</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

      <table class="col-sm-12" border="1" style="border-collapse: collapse;text-align: center;">
        <tr class="table-tr" style="background-color:#1980cf;color:#ffffff;">
          <td class="col-sm-2">Vendor ID</td>
          <td class="col-sm-3">Organization Name</td>
          <td class="col-sm-3">Contact Person</td>
          <td class="col-sm-2">Mobile No.</td>
          <td class="col-sm-2">Closing Date</td>
        </tr>

        <?php
        $query_getDet = mysql_query("select * from tender_registration_details where user_type='vendor' and organization_name!='' order by uid desc $limit");
        while ($getDet = mysql_fetch_array($query_getDet)){
        ?>
        <tr class="table-tr">
          <td class="col-sm-2"><?= $getDet['uid'] ?></td>

          <td class="col-sm-3"><?= strtoupper(urldecode($getDet['organization_name'])) ?></td>

          <td class="col-sm-3"><?= strtoupper($getDet['contact_person']) ?></td>

          <td class="col-sm-2"><?= $getDet['mobile_no'] ?></td>

          <td class="col-sm-2"><?= date('d-m-Y', strtotime($getDet['closing_date'])) ?></td>
        </tr>
        <?php } ?>
      </table>

      <?php
        $rowNum = mysql_fetch_array(mysql_query("select count(uid) as rowCount from tender_registration_details where user_type='vendor'"));

        if ($rowNum['rowCount'] > 10){
      ?>

      <div class="pagination" style="margin-top: 50px;">
        <div style="float: left; color:#2288f1; margin-right: 50px;"><?php echo $paginationDisplay; ?></div>
        
        <div style="line-height: 32px; float: right;">
           <input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" name="jumpBtn" id="jumpBtn" value="Go To Page" onclick="jumpToPage()" class="jump" />


          <input type="text" name="jumpTo" id="jumpTo" placeholder="Page No" onkeyup="numbersOnly(this)" style="border: 1px solid; height: 30px; border-radius: 3px; width: 100px; text-align: center; margin-right: 10px;" />
           
        </div>

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