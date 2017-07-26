<?php include 'include/config-2.php'; ?>

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

function deleteArticle(par){

  var dbsln = $('#dbsln'+par).val();

  if (confirm("Sure you wish to delete this article?")){

    $.ajax({

      url: 'delete-future-art.php',
      type: 'post',
      data: 'dbsln=' + dbsln,
      success: function(f){

        alert('Article has been deleted');
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
</style>

</head>

<body>
<!-- Wrapper Start -->

<div class="wrapper">

 <?php include('include/header.php'); ?>
    
    <?php include 'pagination_future.php'; ?>

    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add/Edit Future Activities</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">

    <div class="col-sm-12">
    <a href="generate-future-id.php"><input type="button" name="addBtn" id="addBtn" class="btn btn-primary" value="Add Activity" /></a>
    </div>

      <div class="col-sm-12">

      <table class="col-sm-12" border="1" style="border-collapse: collapse;text-align: center;">
        <tr class="table-tr" style="background-color:#1980cf;color:#ffffff;">
          <td class="col-sm-2">Publish Date</td>
          <td class="col-sm-5">Article Header</td>
          <td class="col-sm-2">Article Image</td>
          <td class="col-sm-1">Status</td>
          <td class="col-sm-2">Action</td>
        </tr>

        <?php
        $checkRow = mysql_num_rows(mysql_query("select * from future_act where article_id!=''"));

        if ($checkRow > 0){

          $sln=1;

          $query_getDet = mysql_query("select * from future_act where article_id!='' order by SLN desc $limit");
          while ($getDet = mysql_fetch_array($query_getDet)){

            $date = explode('/', $getDet['article_id']);
            $getDate = $date[1];

            if ($getDet['status']=='activate'){$status = 'ACTIVE';}else{$status = 'DEACTIVE';}
          ?>
          <tr class="table-tr">
            <td class="col-sm-2"><?= date('d-m-Y', strtotime($getDate)) ?></td>

            <input type="hidden" name="dbsln<?= $sln ?>" id="dbsln<?= $sln ?>" value="<?= $getDet['SLN'] ?>" />

            <td class="col-sm-5"><?= strtoupper(urldecode($getDet['article_header'])) ?></td>

            <td class="col-sm-2" style="padding: 8px 0;">
              <img src="<?= $getDet['image'] ?>" alt="<?= $getDet['image_name'] ?>" width="50" height="50" />
            </td>

            <td class="col-sm-1"><?= $status ?></td>

            <td class="col-sm-2">
              <a href="add-edit-future.php?aid=<?= base64_encode($getDet['article_id']) ?>"><input type="button" name="editBtn" id="editBtn" class="btn btn-primary" value="Edit" style="width: 60px;margin: 0 10px 0 0;" /></a>

              <input type="button" name="delBtn" id="delBtn" class="btn btn-primary" onclick="deleteArticle('<?= $sln ?>')" value="Delete" />
            </td>
          </tr>
          <?php $sln++;}}else{ ?>
          <tr class="table-tr">
            <td class="col-sm-12" colspan="5">There is no record available</td>
          </tr>
          <?php } ?>
      </table>

      <?php
        $rowNum = mysql_fetch_array(mysql_query("select count(SLN) as rowCount from future_act where article_id!=''"));

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