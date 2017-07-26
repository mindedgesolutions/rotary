<?php
session_start();
ob_start();
//include('include/config1.php');
include('include/config.php');
/*if (!isset($_SESSION['username'])) {
header ("Location: dashboard.php");
}*/
date_default_timezone_set('Asia/Calcutta');		
$msg="";
$fname = $_GET['fn'];
$lname = $_GET['ln'];
$eml = $_GET['eml'];
$id = $_GET['id'];
$dist = $_GET['dis'];
$club = $_GET['clb'];

if(isset($_REQUEST['registerBtn'])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$idfk = $_POST['txtid'];
	$status = 'Active';
	$type = 'donor';
	$createDate = date('d/m/y');
	$username = $firstname.' '.$lastname ;
	//$pwd = FLOOR((RAND( )*8999));
	$pwd = mt_rand(1000, 9999);
	
	$check = mysql_num_rows(mysql_query("select * from tbl_admin where email='".$email."' and type='donor'"));

	if ($check==0){

		$sql="insert into tbl_admin(username, password, firstname, lastname, email, type, create_date, status, center_name, idfk, state, block) values('$username','$pwd','$firstname','$lastname','$email','$type','$createDate','$status','','$idfk','','')";

		$result=mysql_query($sql);

		$sqlupd = "Update tbl_donar_master set donar_email='$email' where donar_id='$idfk'";
		$r_result=mysql_query($sqlupd);


		if($result){
			//take pk from tbl_admin and update tbl_donar_master table field idfk
			$sqlpk = "select id from tbl_admin where type='donor' and status='Active' and email='$email'";
			$result_pk = mysql_query($sqlpk);
			$count = mysql_num_rows($result_pk);

			if($count>0){
				while($rowCount = mysql_fetch_array($result_pk)){
					extract($rowCount);
				}
				//echo '<script>alert('.$id.');</script>';
			}
		
			$sender_email = 'Donor Credentials';
	    
			$contact_email = $_POST["email"];
			$contact_content = "Dear Sir/Madam,\n\n Your Log In details are as follows. \n
			User ID=$contact_email  AND  Password=$pwd \n\n Thanks & Regards \n\n Rotary India Literacy Mission \n 145 Sarat Bose Road \n Kolkata - 700 026";   
	    
	    	// send mail
		    if(mail($contact_email,$sender_email,$contact_content)){
				echo '<script>
						alert("Please check your email and get your credentials");
						window.location.href="http://rotaryteach.org/child_development/other/login.php";
						</script>
						';
			}else{
				echo '<script>
						alert("Please try again !!!");
						window.location.href="http://rotaryteach.org/donor/register.php";
						</script>
						';
			}
		}
	}else{
	?>
	<script type="text/javascript">
		alert('You are already registered');
		window.location = '../child_development/other/login.php?id=<?= $idfk ?>';
	</script>
	<?php
	}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donor</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
function checkEmail(){

	var email = $('#email').val();

	if (email==''){

		alert('We do not have your Email address. Without Email address registration process cannot be completed. Please contact Admin and update your Email address. We apologise for inconvenience');
		return false;
	}
}
</script>

</head>

<body>
<!-- Wrapper Start --> 

<div class="loginwrapper">
<header>       	
    <p>Donor Registration Form</p>
</header>
	<span class="circle"></span>
	<div class="loginone">
    	
        <form action="#" method="post" onsubmit="return checkEmail()">
        	<div class="username">
				First Name 
				<input type="text" class="form-control" readonly style="display:none;" id="txtid" name="txtid" value="<?php echo $id; ?>"/>
        		<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $fname; ?>" readonly />
                
            </div>
            <div class="username">
				Last name
            	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lname; ?>" readonly />
                
            </div>            
			<div class="username">
				District
            	<input type="text" class="form-control" id="txtDistrict" name="txtDistrict" value="<?php echo $dist; ?>" readonly />
                
            </div>            
			<div class="username">
				Club
            	<input type="text" class="form-control" id="txtClub" name="txtClub" value="<?php echo $club; ?>" readonly />
                
            </div>            
			
			
			<div class="email">
				Email
            	<input type="text" class="form-control" id="email" name="email" value="<?php echo $eml; ?>" readonly />
            </div>            
            <center><input type="submit" class="btn btn-primary style2" name="registerBtn" style="width: 50%;" value="Register Me" /></center>
        </form>        
 </div>
</div>
<!-- Wrapper End    -->
<?php

?>


</body>
</html>
