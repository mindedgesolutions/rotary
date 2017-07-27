<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

<?php
$masterDet = mysql_fetch_array(mysql_query("select * from tender_master where tender_no='".$_REQUEST['tno']."'"));
echo $t = "select * from tender_master where tender_no='".$_REQUEST['tno']."'";
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
/*-------------------Mobile No format & DB existence check-------------------*/
function mobnumber1(verification_no)
{  
  var mobile_no1=$('#verification_no').val();

  if(mobile_no1!='')
  {
    var mobno1 = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    if(verification_no.value.match(mobno1))  
    {  
        $.ajax({
        url:'check-mobile.php',
        type:'POST',
        data: 'mobile_no1=' + mobile_no1,
        success:function(f)
        {
          if(f==1)
          {
            alert('Mobile No. exists');
            document.getElementById('verification_no').value = '';
            return false;
          }
        }
      })
    }  
    else  
    {  
      alert('Not a valid mobile no.');
      document.getElementById('verification_no').value = '';
      return false;
    }  
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
 
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Submit Tender : Part - IV</li>
        <span style="float: right;">IFB / Tender No. <?= "<b>".$masterDet['tender_id']."</b>" ?></span>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

      

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