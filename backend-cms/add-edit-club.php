<?php include 'include/config-2.php'; ?>
<?php include 'include/config-3.php'; ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from all_district where club_name='".base64_decode($_REQUEST['cname'])."'"));

if (base64_decode($_REQUEST['cname'])==''){

  $district_code = '';
}else{

  $district_code = $getDet['district_code'];
}
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
/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}
</script>

<style type="text/css">

.container{
  margin-bottom:20px;
  min-height: 350px;
}
.table-tr{
  height: 60px;
  line-height: 60px;
}
#thumb-output{
  width: 250px;
  height: 250px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  margin: 15px 0 0 0;
}
#thumb-output img{
  width: 100%;
  height: 100%;
}
#article_content{
  resize: none;
  height: 120px;
}
</style>

</head>

<body>
<!-- Wrapper Start -->

<div class="wrapper">

 <?php include('include/header.php'); ?>
    
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add/Edit Club Details</li>
      </ol>
    </section>

  <div class="container">
    <div class="row">

      <div class="col-sm-12">

      <?php
      $confirmMsg = '';

      if (isset($_REQUEST['addBtn'])){

        $checkAll = mysql_num_rows(mysql_query("select * from all_district where club_name='".base64_decode($_REQUEST['cname'])."'"));

        $checkIW = mysql_num_rows(mysql_query("select * from iwdistrictclub where IWclub='".base64_decode($_REQUEST['cname'])."'"));

        if ($checkAll == 0){

          $getMax = mysql_fetch_array(mysql_query("select max(dist_id) as did from all_district"));

          $maxId = $getMax['did'] + 1;

          $insertAll = "insert into rotary32_teach2.all_district(dist_id, district_code, club_name, status) values('".$maxId."', '".$_REQUEST['district_code']."', '".$_REQUEST['club_name']."', '".$_REQUEST['category']."')";

          mysql_query($insertAll);

          $insertAll2 = "insert into rotary32_teach.all_district_club(dist_id, district_code, club_name, status) values('', '".$_REQUEST['district_code']."', '".$_REQUEST['club_name']."', '".$_REQUEST['category']."')";

          mysql_query($insertAll2);
        }else{

          $updateAll = "update rotary32_teach2.all_district set district_code='".$_REQUEST['district_code']."', club_name='".$_REQUEST['club_name']."', status='".$_REQUEST['category']."' where club_name='".base64_decode($_REQUEST['cname'])."'";

          mysql_query($updateAll);

          $updateAll2 = "update rotary32_teach.all_district_club set district_code='".$_REQUEST['district_code']."', club_name='".$_REQUEST['club_name']."', status='".$_REQUEST['category']."' where club_name='".base64_decode($_REQUEST['cname'])."'";

          mysql_query($updateAll2);
        }

        if ($_REQUEST['category']=='Inner Wheel'){

          if ($checkIW == 0){

            $insertIW = "insert into rotary32_teach2.iwdistrictclub(id, IWdistrict, IWclub, category) values('', '".$_REQUEST['district_code']."', '".$_REQUEST['club_name']."', '".$_REQUEST['category']."')";

            mysql_query($insertIW);

            $insertIW2 = "insert into rotary32_teach.IWDistrictClub(id, IWdistrict, IWclub) values('', '".$_REQUEST['district_code']."', '".$_REQUEST['club_name']."')";

            mysql_query($insertIW2);
          }else{

            $updateIW = "update rotary32_teach2.iwdistrictclub set IWdistrict='".$_REQUEST['district_code']."', IWclub='".$_REQUEST['club_name']."', category='".$_REQUEST['category']."' where IWclub='".base64_decode($_REQUEST['cname'])."'";

            mysql_query($updateIW);

            $updateIW2 = "update rotary32_teach.iwdistrictclub set IWdistrict='".$_REQUEST['district_code']."', IWclub='".$_REQUEST['club_name']."' where IWclub='".base64_decode($_REQUEST['cname'])."'";

            mysql_query($updateIW2);
          }
        }
      ?>
      <script type="text/javascript">
        alert('Details have been updated successfully');
        window.location = 'list-view-all-club.php';
      </script>
      <?php
      }
      ?>

      <form action="" method="post" autocomplete="off">

      <table width="100%">
        <tr class="table-tr">
          <td class="col-sm-4">Select Category : </td>
          <td class="col-sm-8">

            <select class="form-control" name="category" id="category">

              <option value="Rotary" <?php if ($getDet['status']=='Rotary'){echo 'selected';} ?>>Rotary</option>

              <option value="Inner Wheel" <?php if ($getDet['status']=='Inner Wheel'){echo 'selected';} ?>>Inner Wheel</option>

              <option value="Rotaract" <?php if ($getDet['status']=='Rotaract'){echo 'selected';} ?>>Rotaract</option>

            </select>

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">District Code : </td>
          <td class="col-sm-8">

            <input type="text" name="district_code" id="district_code" class="form-control" value="<?= $district_code ?>" onkeyup="numbersOnly(this)" required />

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">Club Name : </td>
          <td class="col-sm-8">

            <input type="text" name="club_name" id="club_name" class="form-control" value="<?= $getDet['club_name'] ?>" required />

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-12" colspan="2"></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-12" colspan="2" style="text-align: center;">

            <input type="submit" name="addBtn" id="addBtn" class="btn btn-primary" value="Add/Edit Details" />

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