<?php
session_start();
ob_start();
include('include/config.php');
session_unset();

/*if (!isset($_SESSION['username'])) {
header ("Location: dashboard.php");
}*/

$msg="";
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];

$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];

if($action=="login"){
$sql="Select * from tbl_admin where email ='$email' and password ='$password'";
//echo $sql;
$query=mysql_query($sql);
while($data = mysql_fetch_array($query)){

if($data['status'] == 'Active'){
	$_SESSION['first_name'] = $data['firstname'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['center_name'] = $data['center_name'];
	$_SESSION['ngo_name'] = $data['center_name'];
	$_SESSION['uid'] = $data['id'];
	$_SESSION['idfk'] = $data['idfk'];
	$_SESSION['type'] = $data['type'];
	$_SESSION['examtype'] = $data['examtype'];
	header('location:dashboard.php');
  }
 else{
  $msg = "Please check your Username / Password.";
 } 
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
			<img src="img/logo1.png" width="50"align="left">&nbsp;&nbsp;NGO/Center Sign In</div>
            <form action="index.php?action=login" method="post">
                <div class="body bg-gray">
                <p><?php echo $msg; ?></p>
                    <!--<div class="form-group">
                        <select class="form-control" name="type">
                        <option value="">Select NGO</option>
						<?php 
                        //$sql=mysql_query("select DISTINCT type from tbl_admin");
                        //while($row = mysql_fetch_array($sql))
                        //{
						//$type=$row['type'];
                        ?>
                        <option value="<?php //echo $type; ?>"><?php //echo $data; ?></option>
                        <?php
                         //} 
                       ?>  
                        </select>
                    </div>  -->
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Login </button>  
                </div>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>