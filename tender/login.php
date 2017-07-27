<?php
include('include/config.php');
session_unset();

if (isset($_REQUEST['submitBtn'])){

  $check = mysql_num_rows(mysql_query("select * from tender_registration_details where login_id='".$_REQUEST['login_id']."' and password='".urlencode($_REQUEST['password'])."' and status='verified'"));

  if ($check==0){

    $msg = 'Incorrect credentials';
  }else{

    $getDet = mysql_fetch_array(mysql_query("select * from tender_registration_details where login_id='".$_REQUEST['login_id']."' and password='".urlencode($_REQUEST['password'])."'"));

    $_SESSION['uid'] = $getDet['uid'];
    $_SESSION['login_id'] = $_REQUEST['login_id'];
    $_SESSION['user_type'] = $getDet['user_type'];
  ?>
  <script type="text/javascript">
    window.location = 'index.php';
  </script>
  <?php
  }
}
?>

<!DOCTYPE html>
<html class="bg-black">
  <head>
    <meta charset="UTF-8">
    <title>Rotary Tender | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <?php include('include/title.php'); ?>

    <?php include 'include/header-link.php'; ?>
  </head>
  


  <body>
<!-- Wrapper Start -->
 <div class="container">
 <div class="row">
			<div class="loginwrapper">
				<span class="circle"></span>
					<div class="loginone">
					  <header>
						  <!-- <a href="dashboard1.html"><img src="assets/images/logo.png" alt="" /></a> -->
							<p>Online Tender Module</p>
						</header>
       
		
		<div class="col-md-12">
        <form action="" method="post">

          <p style="color: #ff0000;text-align: center;"><?php echo $msg; ?></p>
          <div class="username">
            <input type="text" name="login_id" id="login_id" class="form-control" placeholder="Login ID" required />
                <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="password">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
                <i class="glyphicon glyphicon-lock"></i>
            </div>  
      <div>
            <input type="submit" class="btn btn-primary style2" name="submitBtn" value="Sign In" />
      
      </div>
      <div>
      <center>
      <a href="registration-form.php"><input type="button" class="btn btn-primary style2" value="Register" /></a>
      </center>
      </div>
    </form> 
	</div>
    </div>
	</div>
</div>
</div>


<!-- Wrapper End -->



</body>
</html>