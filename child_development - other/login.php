<?php
session_start();
ob_start();
include 'include/config.php';
session_unset();

$getDet = mysql_fetch_array(mysql_query("select * from tbl_donar_master where donar_id='".$_REQUEST['id']."'"));
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

    <?php
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

	$sql="Select * from tbl_admin where `email` ='$email' and `password` ='$password' and `status` = 'Active' and (`type`='donor' or `type`='Honorary')";

	//echo $sql;
	$query=mysql_query($sql);
	$count = mysql_num_rows($query);
	if($count>0){

		while($data = mysql_fetch_array($query)){

			if($data['status'] == 'Active'){
				$_SESSION['username'] = $data['username'];
				$_SESSION['uid'] = $data['id'];
				$_SESSION['type'] = $data['type'];
				$_SESSION['email'] = $data['email'];

				if ($data['type']=='donor'){

					if($data['email']=="donor_admin@gmail.com"){

						header('location:http://rotaryteach.org/donor/donor_admin.php');
					}else{
						header('location:tagged_by.php');
					}
				}else{
				?>
				<script type="text/javascript">
					window.location = 'tagged_by_honor.php';
				</script>
				<?php
				}
			}
		}
	}else{
		echo '
		<script>
		alert("Please check your Username / Password.");
		window.location.href="http://rotaryteach.org/child_development/other/login.php";
		</script>
		';

		} 
	}
 
	elseif($action=="create"){

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
			}else{
				$mesg_1 = "This Email ID is not registered in our Records.";
			}
		}else{
 			$mesg_1 = "User Email Already Created";
		}
	}
}
?>

		<div class="form-box" id="login-box">
            <div class="header">
			<img src="img/logo1.png" width="50"align="left">&nbsp;&nbsp;Sign In
			<!--<h4>If you have donated for Asha Kiran and have received email from RILM to know progress of your sponsored child, 
			create an account here.</h4> -->
			</div>
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

					<button type="button" class="btn bg-olive btn-block" onclick=" window.open('http://rotaryteach.org/donor/donor_forgot_pwd.php','_blank')">Forgot Password</button>

					<a href="http://rotaryteach.org/donor/register.php?id=<?= $getDet['donar_id'] ?>&fn=<?= $getDet['first_name'] ?>&ln=<?= $getDet['last_name'] ?>&eml=<?= $getDet['donar_email'] ?>&dis=<?= $getDet['donar_district'] ?>&clb=<?= $getDet['donar_club'] ?>"><input type="button" name="registerBtn" id="registerBtn" value="Register" class="btn bg-olive btn-block" /></a>
				</div>
			</form>
        </div>
		


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>