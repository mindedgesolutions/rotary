<?php
session_start();
ob_start();
include('include/config02.php');
$_SESSION['uid'];
$_SESSION['prof_type'];
$_SESSION['district'];
$_SESSION['club'];
$_SESSION['name'];
$_SESSION['mobile'];

?>
<?php
       $first_name=$_POST['txtMemberFirstName'];
       $last_name=$_POST['txtMemberLastName'];
$donar_email=$_POST['txtMemberEmail'];
$donar_contact=$_POST['txtMemberMobile'];
$sql="select * from tbl_donar_master where first_name like '%$first_name%'";
echo $sql;


?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asha Kiran Donor Entry Form</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:60px;
		 background-color:#32343b;
		}
		.help {
    display:none;
    font-size:90%;
}
input:focus + .help {
    display:inline-block;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<header>
	  <!-- Logo Start -->
	  <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
	  <!-- Logo End -->
	  <!-- Sidebar Navigation Start -->
	  <?php include('include/mainnav.php'); ?>

	  <div class="clearfix"></div>
	  <!-- Sidebar Navigation End -->
	</header>
	<div class="structure-row alone">
	<div class="right-sec">
		<header>
	  <div class="row">
			<div class="col-xs-12">
				<div class="col-xs-4">
				<?php include('include/child_header.php');?>
				</div>
				<div class="col-xs-4">
				<h3 style="color:#ffffff; text-align:center;">Asha Kiran Donor Entry Form</h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;">Home</h5>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
      </header>
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                       <!-- <div class="col-xs-12"> -->
					   <div class="col-md-2"></div>
					   <div class="col-md-8 sec-box">
                            <div class="sec-box">
                                <!-- <a class="closethis">Close</a> -->
                                <header>
									<center>
                                    <h4 class="heading">Please enter search details.</h4>
									</center>
								</header>
                                <div class="contents">
                                    <!-- <a class="togglethis">Toggle</a> -->
                                    <div class="table-box">
                                        <table class="table">

                                            <tbody>
	<form class="form-horizontal" name="frm" id="frm" action="master_data.php" method="post" enctype="multipart/form-data" >


                                                <tr>
                                                    <td class="col-md-4">First Name:</td>
                                                    <td class="col-md-8">
                                                       	<input type="text" id="txtMemberFirstName" name="txtMemberFirstName" class="form-control">

                                                    </td>

                                                </tr>
                                                 <tr>
                                                    <td class="col-md-4">Last Name:</td>
                                                    <td class="col-md-8">
                                                       	<input type="text" id="txtMemberLastName" name="txtMemberLastName" class="form-control">

                                                    </td>

                                                </tr>
                                                 <tr>
                                                    <td class="col-md-4">Mobile:</td>
                                                    <td class="col-md-8">
                                                       	<input type="text" id="txtMemberMobile" name="txtMemberMobile" class="form-control">

                                                    </td>

                                                </tr>
                                                  <tr>
                                                    <td class="col-md-4">Email:</td>
                                                    <td class="col-md-8">
                                                       	<input type="text" id="txtMemberEmail" name="txtMemberEmail" class="form-control">

                                                    </td>

                                                </tr>




												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <button type="submit" class="btn btn-primary" name="submit">Search</button>
                                                        </div>
                                                    </td>
                                                </tr>

    </form>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-2"></div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->
    </div>
	</div>
	<br/>
	<br/>
	<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
</div>
<!-- Wrapper End -->
</body>
</html>
