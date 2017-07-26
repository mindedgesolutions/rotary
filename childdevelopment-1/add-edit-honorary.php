<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$i=1;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
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

<style>
.footer {
     position: absolute;
     bottom: 0;
     width:100%;
     height:60px;
     background-color:#32343b;
    }
.headercol
  {
    background-color : #b8d1f3;
  }
  .altcol
  {
    background-color : #dae5f4;
  }   
  .pad
  {
    padding-left:5px;
  }
</style>  
</head>

<body>
<div class="wrapper">
  <header>
    <div class="logo"> <a href="edit-child-tagging-dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
    <?php include('include/mainnav.php'); ?>
    <div class="clearfix"></div>
  </header>
  <div class="structure-row alone"> 
    <div class="right-sec"> 
      <header> 
        <?php include('include/child_header.php'); ?>
        <div>
          <h1 style="color:#ffffff; text-align:center;">Honorary Member List</h1>
          <font color="#F4F3F3" style="float:right;">Master -> Honorary Member List</font>
        </div>
        <div class="clearfix"></div>
      </header>
      <!--Record Searching Start--> 
      <div class="container">
        
        <div class="col-sm-12" align="left" style="height : 35px; color: #ffffff; margin-top:10px; margin-left:10px; padding : 5px;">
            <input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" value="Add New Hon. Member" onClick="Javascript:window.location.href = 'http://rotaryteach.org/childdevelopment/add-edit-honorary-member-details.php';" />
        </div>
        
        <br/>
      </div>
      <!--Record Searching End-->
    </div>
  </div>
  <br/>
<div class="container">
<div class="col-sm-12" style="padding-bottom: 100px;">

<?php
$type="NGO";
$sql="select * from honor_master where status='active'";

$r_query = mysql_query($sql);
?>
<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
  <thead>
    <tr style="text-align: center;">
      <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
      <th width='30%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Member Name</th>
      <th width='20%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Email</th>
      <th width='20%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Mobile No.</th>
      <th width='20%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Action</th>
    </tr>
  </thead>
<?php
while ($row = mysql_fetch_array($r_query)){  
if ($i%2==0){
?>
    <tr class='headercol'>
      <td class='pad' style="text-align: center;"><?= $i ?></td>

      <td class='pad' style="text-align: center;"><?= $row["name"] ?></td>

      <td class='pad' style="text-align: center;"><?= $row["email"] ?></td>

      <td class='pad' style="text-align: center;"><?= $row["mobile_no"] ?></td>

      <td class='pad' style="text-align:center;""><a href="add-edit-honorary-member-details.php?hid=<?= $row["SLN"] ?>">Edit</a></td>
    </tr>
  <?php
  }
  else
  {
  ?>
    <tr class='altcol'>
      <td class='pad' style="text-align: center;"><?= $i ?></td>

      <td class='pad' style="text-align: center;"><?= $row["name"] ?></td>

      <td class='pad' style="text-align: center;"><?= $row["email"] ?></td>

      <td class='pad' style="text-align: center;"><?= $row["mobile_no"] ?></td>

      <td class='pad' style="text-align:center;""><a href="add-edit-honorary-member-details.php?hid=<?= $row["SLN"] ?>">Edit</a></td>
    </tr>
  <?php
  }
$i=$i+1;
}
?>
</table>
<br/>
</div>

</div>

<?php
  include('include/footer.php');
?>

</div>

</body>
</html>