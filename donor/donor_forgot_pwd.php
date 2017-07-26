<?php
session_start();
ob_start();

include('include/config.php');
date_default_timezone_set('Asia/Calcutta');		
$msg="";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];
if($action=="forgetpwd"){

$email = $_POST['txtEmail'];
$type = "donor";
$status = "Active";

$sql="Select password from tbl_admin where email='$email' and type='$type' and status='$status'";
$result=mysql_query($sql);
$count = mysql_num_rows($result);
if($count>0){
		while($rowAns = mysql_fetch_array($result)) {
		extract($rowAns);
		
	$sender_email = 'Donor Password';
    
    $contact_email = $email;
    $contact_content = "Dear Sir/Madam,\n\n Your login ID and Password is as follow. \n
	User ID=$contact_email  AND  Password=$password \n\n Thanks & Regards \n\n Rotary India Literacy Mission \n 145 Sarat Bose Road \n Kolkata - 700 026";   
    
    // send mail
    if(mail($contact_email,$sender_email,$contact_content))
	{
		echo '<script>
				alert("Please check your email and get your Password");
				window.location.href="http://rotaryteach.org/donor/donor_register.php";
				</script>
				';
	}else{
		echo '<script>
				alert("Please try again !!!");
				window.location.href="http://rotaryteach.org/donor/donor_forgot_pwd.php";
				</script>
				';
	}
		
}

}
else{
	echo '<script>
				alert("This email id does not exist !!!");
				window.location.href="http://rotaryteach.org/donor/donor_forgot_pwd.php";
				</script>
				';
}
}
}
?>

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Child Development Admin | Forgot Password</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">
		<div class="form-box" id="login-box">
            <div class="header">
			<img src="img/logo1.png" width="50"align="left">&nbsp;&nbsp;Forgot Password
			<h4>Write your email id and press submit button</h4>
			</div>
            
			<form action="donor_forgot_pwd.php?action=forgetpwd" method="post">
				<div class="body bg-gray">
				<p><?php echo $msg; ?></p>
				<p style="color:#A81518;"><?php echo $mesg_1; ?></p>
					<div class="form-group">
						<input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email"/>
					</div>
					
				</div>
				<div class="footer">                                                               
					<input type="submit" class="btn btn-primary style2" value="Submit" />
				</div>
			</form>   
        </div>
		


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>