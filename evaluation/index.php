<?php
include('include/config02.php');
session_unset();

$msg="";
if(isset($_REQUEST['action'])){

    $action=$_REQUEST['action'];
    $userid = $_POST['txtUserID'];
    $password = $_POST['password'];

    if($action=="login"){

        $sql = mysql_num_rows(mysql_query("select * from tbl_admin where email ='$userid' and password ='$password'"));
        
        if ($sql == 0){

            $msg = "Incorrect credentials";
        }else{

            $data = mysql_fetch_array(mysql_query("select * from tbl_admin where email='".$userid."' and password='".$password."'"));
            $idfk = $data['idfk'];
            $sql1="Select * from tbl_eva_member_master where id ='$idfk'";
            $query1=mysql_query($sql1);
            while($data1 = mysql_fetch_array($query1)){

                $_SESSION['uid'] = $data1['id'];
                $_SESSION['prof_type'] = $data1['prof_type'];
                $_SESSION['district'] = $data1['district'];
                $_SESSION['name'] = $data1['name'];
                $_SESSION['mobile'] = $data1['mobile'];
                $_SESSION['zd_fk'] = $data1['zd_fk'];
                $_SESSION['email'] = $userid;
    
            ?>
            <script type="text/javascript">
                window.location = 'dashboard.php';
            </script>
            <?php
            }
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evaluation</title>
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
</head>

<body>
<!-- Wrapper Start -->
<div id="logDiv" class="loginwrapper">
	<span class="circle"></span>
	<div class="loginone">
    	<header>
            <p>Enter your credentials to login to your account</p>
        </header>
        <form action="index.php?action=login" method="post">
            <div class="username" style="text-align: center;">
                <span style="color: #cc0707;"><?= $msg ?></span>
            </div>
        	<div class="username">
        		<input type="text" class="form-control" id="txtUserID" name="txtUserID" placeholder="Enter your username" />
                <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="password">
            	<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" />
                <i class="glyphicon glyphicon-lock"></i>
            </div>            
            <input type="submit" class="btn btn-primary style2" name="submitBtn" value="Sign In" />
        </form>
    </div>
</div>
<!-- Wrapper End -->



</body>
</html>
