<?php
session_start();
ob_start();
include('include/config.php');
$msg="";
$mesg_1 = "";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

$name = $_POST['name'];
$email = $_POST['email2'];
$u_email = $email;
$password = $_POST['password'];
$dt = date('d/m/Y');

if($action=="login"){
$sql="Select * from tbl_admin where `email` ='$email' and `password` ='$password' and `status` = 'Active' and `type` = 'Other'";
//echo $sql;
$query=mysql_query($sql);
while($data = mysql_fetch_array($query)){

if($data['status'] == 'Active'){
	$_SESSION['username'] = $data['username'];
	$_SESSION['uid'] = $data['id'];
	$_SESSION['type'] = $data['type'];
	$_SESSION['email'] = $data['email'];
	header('location:tagged_by.php');
  }
 else{
  $msg = "Please check your Username / Password.";
   } 
  }
 }
 
 
elseif($action=="create")
{
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
$sql_create = "Insert into tbl_admin values(NULL,'$name','$password','$name','','$email','Other','$dt','Active','$ngo_name')";
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
	$mesg_1 = "This Email ID is not registered in our Records.";
}
}
else{
 $mesg_1 = "User Email Already Created";
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
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">
			<center><img src="img/logo1.png" width="80"></center>
            <!--<h5><strong>Attn. District Governers and Inner Wheel Chairs Update Asha Kiran Donor details here</strong>
            <a href="donor.php" style="color:#F00;">click here.</a>
            </h5>-->
            <h4>If you have donated for Asha Kiran and have received email from RILM to know progress of your sponsored child, create an account here.</h4>
			
            </div>
            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Sign In</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Create Account</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                     <form action="login.php?action=login" method="post">
                                        <div class="body bg-gray">
                                        <p><?php echo $msg; ?></p>
                                        <p style="color:#A81518;"><?php echo $mesg_1; ?></p>
                                            <div class="form-group">
                                                <input type="text" name="email2" class="form-control" placeholder="Email"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                                            </div>          
                                            <div class="form-group">
                                                
                                          </div>
                                        </div>
                                        <div class="footer">                                                               
                                            <button type="submit" class="btn bg-olive btn-block">Sign In  </button>  
                                        </div>
                                    </form>   
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                     <form action="login.php?action=create" method="post">
                                        <div class="body bg-gray">
                                        <p><?php echo $msg; ?></p>
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Name"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email2" class="form-control" placeholder="Email"/>
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
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div>
            <!---->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>