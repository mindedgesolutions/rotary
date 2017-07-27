<?php
session_start();
define('BASE_URL','http://rotaryteach.org/');
include("../connection.php");
$urlmsg ="";
if($_GET["urlmsg"])
{
$urlmsg = $_GET["urlmsg"];
}

$msg ="";
if(isset($_POST["btngo"]))
{
$user = $_POST["txtuser"];
$pwd = $_POST["txtpwd"];
	
	 $query = "SELECT * FROM clubproject WHERE username = '".$user."' and pwd='".$pwd."';";

	$result = mysqli_query($link,$query);

		if($result)
		{
		  while($row = mysqli_fetch_assoc($result))
			{
			$arr[] = $row;
			}
		}
if(count($arr)==0)
$msg =	"Invalid Username or Password!";
else
$_SESSION['user_nm'] = $user;
$_SESSION['pwd'] = $pwd;
header("location:http://rotaryteach.org/clubprojects/list_club_project.php");

	
}	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload New or Update | <?php include('include/title.php'); ?></title>

    <!-- Css Files -->
    <?php include('include/favicon.php'); ?>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/dl-menu.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/prettyphoto.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
  </head>
  <style>
  a.login1:-webkit-any-link {
    color: -webkit-link;
    text-decoration: underline;
    cursor: auto;
}
  </style>
  <body style="padding-right:0px;">
    <!-- Color Switcher -->
    <!-- Color Switcher -->

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" >

        <!--// TopStrip //-->
        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-topstrip as-bgcolor">
            <?php //include('include/top-head-new.php'); ?>
			<?php include('include/top-head.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-header-bar">
            <div class="row">
			<div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
				<div class="col-md-2">
					<a style="float:left;" href="index.php" class="logo1"><img src="images/logo2.png" alt=""></a>
				</div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
				  <?php include('include/navigation_mem.php'); ?>
                  <?php //include('include/navigation_new.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
			  </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header //-->

      <div class="as-minheader">
       
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Upload New or Update</h1>
                  
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="uploadNewOrUpdate.php">Upload New or Update</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="as-detail-editor">
							<p> Click on "<strong>New Project"</strong> to upload Project completed by your Club/District.</p>
							<p> Click on "<strong>Update Project</strong>" to Edit/Modify Completed Projects already uploaded by your Club/District.</p>
						<p style="text-align:center">
                                	<a href="clubprojects/clubProject.php?type=create&id=0" class="login1" style="border-radius:0; padding:12px 80px">New Project</a>&nbsp;&nbsp;
                                	<a href="javascript: void(0)" onclick="dispupdate();" class="login1" style="border-radius:0; padding:12px 80px">Update Project</a>
						</p> 

						<div id="enterpwd" style="display:none;">
                                    <form id="frm" name="frm" method="post" action="clubprojects/index.php" onsubmit="return validate();">
                                        <table width="78%" cellpadding="0" cellspacing="0" border="0" align="center" style="text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666; border:1px solid #7089b3">
                                            <tr><td colspan="4">&nbsp;</td></tr>
                                            <tr>
                                                <td width="2%"></td>
                                                <td width="25%"><strong>Enter Username</strong></td>
                                                <td width="3%"><strong>:</strong></td>
                                                <td><input type="text" id="txtuser" name="txtuser" style="width:90%; line-height:22px; height:22px; border-radius:3px; border:1px solid #cccccc" /></td>
                                            </tr>
                                            <tr height="5"><td colspan="4"></tr>
                                            <tr>
                                                <td></td>
                                                <td><strong>Enter Password</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="password" id="txtpwd" name="txtpwd" style="width:90%; line-height:22px; height:22px; border-radius:3px; border:1px solid #cccccc" /></td>
                                            </tr>
                                            <tr height="5"><td colspan="4"></td></tr>
                                            <tr>
                                                <td></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td><input type="submit" id="btngo" name="btngo" value="Update" style="background:#0099FF; color:#FFFFFF; padding:7px 25px; border:0; cursor:pointer" title="Click to Update Project"/><!-- onclick="validation()" onclick="goForUpdate();" --></td>
                                            </tr>
                                            <tr><td colspan="4">&nbsp;</td></tr>
                                        </table>
                                    </form>
                                </div>
								<div id="errmsg" style="display:none;">
							    <table width="78%" cellpadding="0" cellspacing="0" border="0" align="center" style="text-align:left; font-family:Arial, Helvetica, sans-serif;
                                font-size:12px; color:#666666">
                                   <tr><td colspan="4" style="text-align:center; font-weight:bold; color:#CC0000; padding:45px 0"><?php echo $msg;?></td></tr>
                                </table>
                                </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--// Footer //-->
      <div class="as-footer">
        <div class="container">
          <?php include('include/footer.php'); ?>
        </div>
        <?php include('include/copy-right.php'); ?>
      </div>
      <!--// Footer //-->
	<div class="clearfix"></div>
    </div>
    <!--// Main Wrapper //-->

    <!-- Search Modal -->
    <?php include('include/search-model.php'); ?>
    <!-- Search Modal -->

    <!-- jQuery (necessary for JavaScript plugins) -->
    <script src="script/jquery.min.js"></script>
    <script src="script/modernizr.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/jquery.dlmenu.js"></script>
    <script src="script/flexslider-min.js"></script>
    <script src="script/goalProgress.min.js"></script>
    <script src="script/jquery.countdown.min.js"></script>
    <script src="script/jquery.prettyphoto.js"></script>
    <script src="script/waypoints-min.js"></script>
    <script src="script/owl.carousel.min.js"></script>
    <script src="script/newsticker.js"></script>
    <script src="script/parallex.js"></script>
    <script src="script/styleswitch.js"></script>
    <script src="script/functions.js"></script>
	<script type="text/javascript">
function validate() {
	if($.trim($("#txtuser").val())==''){
		alert("Please enter username.");
		$("#txtuser").focus();
		return false;
	
	}
	if($.trim($("#txtpwd").val())==''){
		alert("Please enter password.");
		$("#txtpwd").focus();
		return false;
	
	}
	return true;
}


function dispupdate() {

$('#enterpwd').toggle()
$('#txtuser').val('');
$('#txtpwd').val('');
$('#errmsg').html('');

}
</script>
  </body>
</html>