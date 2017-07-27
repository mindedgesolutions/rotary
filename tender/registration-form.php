<?php include 'include/config.php'; ?>

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
/*function mobnumber1(verification_no)
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
}*/
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

 <?php include('include/header-reg.php'); ?>
 
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Registration Form</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

      <?php
      if (isset($_REQUEST['submitBtn'])){

        if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', $_REQUEST['verification_no'])){

          $checkDB = mysql_num_rows(mysql_query("select * from tender_registration_details where mobile_no='".$_REQUEST['verification_no']."' and status='verified'"));

          if ($checkDB == 0){

            $status = "Inactive";
            $createDate = date('d/m/y');
            $otpno = mt_rand(1000, 9999);
            $mobno = "91".$_REQUEST['verification_no'];

            $user="mobel"; //your username
            $password="welcome123"; //your password
            $mobilenumbers=$mobno;//"919831960329"; //enter Mobile numbers comma seperated
            $message = "OTP is" . $otpno; //enter Your Message
            $senderid="mindeg"; //Your senderid
            $messagetype="N"; //Type Of Your Message
            $DReports="Y"; //Delivery Reports
            $url="http://www.smscountry.com/SMSCwebservice_Bulk.aspx";
            $message = urlencode($message);

            $ch = curl_init();
            if (!$ch){die("Couldn't initialize a cURL handle");}
            $ret = curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt ($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt ($ch, CURLOPT_POSTFIELDS,
            "User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
            $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //If you are behind proxy then please uncomment below line and provide your proxy ip with port.
            // $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
            $curlresponse = curl_exec($ch); // execute
            if(curl_errno($ch))
            echo 'curl error : '. curl_error($ch);
            if (empty($ret)) {
            // some kind of an error happened
            die(curl_error($ch));
            curl_close($ch); // close cURL handler
            } else {
            $info = curl_getinfo($ch);
            curl_close($ch); // close cURL handler
            //echo "";
            //echo $curlresponse; //echo "Message Sent Succesfully" ;
            }

            $check = mysql_num_rows(mysql_query("select * from tender_registration_details where mobile_no='".$_REQUEST['verification_no']."'"));

            if ($check==0){

              $insert = "insert into tender_registration_details(uid, mobile_no, otp) values('', '".$_REQUEST['verification_no']."', '".$otpno."')";

              mysql_query($insert);
            ?>
            <script type="text/javascript">
              alert('OTP has been sent');
              window.location = 'registration-form-2.php?mno=<?= base64_encode($_REQUEST['verification_no']) ?>';
            </script>
            <?php
            }else{

              $update = "update tender_registration_details set otp='".$otpno."' where mobile_no='".$_REQUEST['verification_no']."'";

              mysql_query($update);
            ?>
            <script type="text/javascript">
              alert('OTP has been sent');
              window.location = 'registration-form-2.php?mno=<?= base64_encode($_REQUEST['verification_no']) ?>';
            </script>
            <?php
            }
          }else{

          ?>
          <script type="text/javascript">
            alert('Mobile No. exists.');
            window.location = 'registration-form.php';
          </script>
          <?php
          }
        }else{

        ?>
        <script type="text/javascript">
          alert('This is an invalid mobile no.');
          window.location = 'registration-form.php';
        </script>
        <?php
        }
      }
      ?>

      <form id="e" action="" method="post" autocomplete="off">

      <table class="col-sm-12">
        <tr>
          <td class="col-sm-4">Enter Mobile No.</td>
          <td class="col-sm-8"><input type="text" name="verification_no" id="verification_no" class="form-control" value="" onkeyup="numbersOnly(this)" onblur="mobnumber1(verification_no)" required /></td>
        </tr>
		<tr><td colspan="2" style="height: 20px;"></td></tr>
        <tr>
		<td class="col-sm-4"></td>
            <td class="col-sm-8"><input type="submit" name="submitBtn" id="submitBtn" value="Submit" class="btn btn-primary" /></td>
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