<?php
include('include/config.php');
ob_start();
session_start();
$email_donor = $_SESSION['email'];
$total_amt = $_SESSION['total_amt'];

$sql = "Select * from wisdom_donation where email = '$email_donor'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
	extract($data);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Payment</title>
<style>
 /* The Modal (background) */
.modal {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
	background-image:url(images/online_pay_back.jpg);
	background-repeat:no-repeat;
}

/* Modal Content/Box */
.modal-content {
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    width: 50%; /* Could be more or less, depending on screen size */
}
</style>
</head>

<body>
<div id="myModal" class="modal">
 <div class="modal-content">
    <p><form action="merchant-3/submit.php" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2" align="center">
    <input type="image" src="images/pay.jpg" name="submit"></td>
    <input type="hidden" name="amount_online" value="<?php echo $total_amt; ?>">
    <input type="hidden" name="email_online" value="<?php echo $email_donor; ?>">
    <input type="hidden" name="name_online" value="<?php echo $name; ?>">
    <input type="hidden" name="phone_online" value="<?php echo $phone; ?>">
    <input type="hidden" name="product" value="ASIA">
    <input type="hidden" name="TType" value="NBFundTransfer">
    <input type="hidden" name="clientcode" value="18143">
    <input type="hidden" name="AccountNo" value="1234567890">
    <input type="hidden" name="ru" value="http://rotaryteach.org/merchant/response.php">
    <input type="hidden" name="bookingid" value="100001"/>
  </tr>
</table>
</form></p>
  </div>

</div>
</body>
</html>