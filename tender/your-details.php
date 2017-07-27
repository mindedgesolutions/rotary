<?php include 'include/config.php'; ?>
<?php include 'include/session_check.php'; ?>

<?php
$getData = mysql_fetch_array(mysql_query("select * from tender_registration_details where uid='".base64_decode($_REQUEST['uid'])."'"));
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
    $("#closing_date").datepicker({
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

function checkLogin(){

  var login_id = $('#login_id').val();

  if (login_id!=''){

    $.ajax({

      url: 'check-loginid.php',
      type: 'post',
      data: 'login_id=' + login_id,
      success: function(f){

        if (f==1){

          alert('Login ID exists. Please enter a different login ID.');
          document.getElementById('login_id').value = '';
          return false;
        }
      }
    })
  }
}

function idLength(){

  var login_id = $('#login_id').val();

  if (login_id!='' && login_id.length < 3){

    alert('Login ID must be of minimum 4 characters');
    document.getElementById('login_id').value = '';
    return false;
  }else{

    checkLogin();
  }
}

function passLength(){

  var password = $('#password').val();

  if (password!='' && password.length < 3){

    alert('Password must be of minimum 4 characters');
    document.getElementById('password').value = '';
    return false;
  }
}

function passMatch(){

  var password = $('#password').val();
  var confirm_password = $('#confirm_password').val();

  if (password!='' && confirm_password!='' && password !== confirm_password){

    alert('Passwords do not match. Please try again');
    document.getElementById('confirm_password').value = '';
    return false;
  }
}

function checkOTP(){

  var mobno = $('#mobno').val();
  var otp = $('#otp').val();

  if (otp!=''){

    $.ajax({

      url: 'check-otp.php',
      type: 'post',
      data: 'mobno=' + mobno + '&otp=' + otp,
      success: function(f){

        if (f==1){

          alert('OTP does not match');
          document.getElementById('otp').value = '';
        }
      }
    })
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
#closing_date:hover{
  cursor: pointer;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">

  <input type="hidden" name="mobno" id="mobno" value="<?= base64_decode($_REQUEST['mno']) ?>" />

 <?php include('include/header.php'); ?>
 
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Your Details</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

      <?php
      if (isset($_REQUEST['submitBtn'])){

        $closing_date = date('Y-m-d', strtotime($_REQUEST['closing_date']));

        $updateDet = "update tender_registration_details set organization_name='".urlencode($_REQUEST['org_name'])."', contact_person='".$_REQUEST['contact_name']."', login_id='".$_REQUEST['login_id']."', password='".urlencode($_REQUEST['password'])."', closing_date='".$closing_date."' where mobile_no='".base64_decode($_REQUEST['mno'])."'";

        mysql_query($updateDet);
      ?>
      <script type="text/javascript">
        alert('Details have been saved. Please login using your credentials');
        window.location = 'login.php';
      </script>
      <?php
      }
      ?>

      <form action="" method="post">

      <table class="col-sm-12">
        <tr>
          <td class="col-sm-6">Mobile No.</td>
          <td class="col-sm-6"><input type="text" name="verification_no" id="verification_no" class="form-control" value="<?= $getData['mobile_no'] ?>" /></td>
        </tr>
		<tr><td colspan="2" style="height: 10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Organization Name : </td>
          <td class="col-sm-6">
            <input type="text" name="org_name" id="org_name" class="form-control" value="<?= ucwords(urldecode($getData['organization_name'])) ?>" required />
          </td>
        </tr>
		<tr><td colspan="2" style="height: 10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Contact Person : </td>
          <td class="col-sm-6">
            <input type="text" name="contact_name" id="contact_name" class="form-control" value="<?= ucwords($getData['contact_person']) ?>" onkeyup="letterswithspace(this)" required />
          </td>
        </tr>
		<tr><td colspan="2" style="height: 10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Login ID : </td>
          <td class="col-sm-6">
            <input type="text" name="login_id" id="login_id" class="form-control" value="<?= $getData['login_id'] ?>" readonly="readonly" />
          </td>
        </tr>
		<tr><td colspan="2" style="height: 10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Password : </td>
          <td class="col-sm-6">
            <input type="password" name="password" id="password" class="form-control" value="<?= $getData['password'] ?>" readonly="readonly" />
          </td>
        </tr>
		<tr><td colspan="2" style="height: 10px;"></td></tr>
        <tr>
          <td class="col-sm-6">Bid Submission Closing Date : </td>
          <td class="col-sm-6">
            <input type="text" name="closing_date" id="closing_date" class="form-control" value="<?= date('d-m-Y', strtotime($getData['closing_date'])) ?>" readonly="readonly" required />
          </td>
        </tr>

        <tr><td colspan="2" style="height: 20px;"></td></tr>

        <tr>
           <td class="col-sm-6"></td>
            <td class="col-sm-6"><input type="submit" name="submitBtn" id="submitBtn" value="Submit" class="btn btn-primary" />
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