<?php
session_start();
ob_start();
include('include/config.php');
$msg="";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

$email = $_POST['email'];
$password = $_POST['password'];

if($action=="signup"){
$query = "SELECT * FROM tbl_admin WHERE email ='$email'";
echo $query; 
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
if($num_rows == 1 ){

$ques = "SELECT * from tbl_donar_master";
$res = mysql_query($ques);
while($docu = mysql_fetch_array($res)){
	extract($docu);
}	

if($donar_email == '$email'){
echo $donar_email;
echo $u_email;
$sql_create = "Insert into tbl_admin values(NULL,'$name','$password','$name','','$email','donor','$dt','Active','','','','')";
$query1 = mysql_query($sql_create);

$sqll = "Select * from tbl_admin where email = '$email'";
$query=mysql_query($sql);
while($data = mysql_fetch_array($query)){
	extract($data);
}

$_SESSION['username'] = $name;
$_SESSION['uid'] = $id;
$_SESSION['type'] = 'Other';
$_SESSION['email'] = $email;
//header('location:tagged_by.php');
}
else{
	$msg = "This Email ID is not registered in our Records.";
}
}
else{
 $msg = "User Email Already Created";
}
}

}
?>

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Child Development Admin | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">			
			<center><img src="img/logo1.png" width="80"></center>
            <h4>If you have donated for Asha Kiran and have received email from RILM to know progress of your sponsored child, create an account here.</h4>
			</div>
            <form action="signup.php?action=signup" method="post">
				<div class="body bg-gray">
				<p><?php echo $msg; ?></p>
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Name"/>
					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Email"/>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password"/>
					</div>       
					<div class="form-group">
						<input type="password" name="password2" class="form-control" placeholder="Confirm Password"/>
					</div>        
					<div class="form-group">
						
				  </div>
				</div>
				<div class="footer">                                                               
					<button type="submit" class="btn bg-olive btn-block">Sign Up </button>  
				</div>
			</form> 
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>