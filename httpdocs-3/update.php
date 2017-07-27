<?php
ob_start();
include("connection.php");
$id = $_GET['isp'];

$sql = "Select * from registration where id = '$id'";
//echo $sql;
$result = mysqli_query($link,$sql);
while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	extract($data);
}

$mesg = '';
if(isset($_POST['btnSave'])){
$txtMob = $_POST['txtMob'];
$txtEmail = $_POST['txtEmail'];	
$txtName = $_POST['name'];
$id = $_POST['id'];

$sql = "UPDATE registration SET email = '$txtEmail', mobile1 = '$txtMob' where id = '$id'";
//echo $sql;
$result1 = mysqli_query($link,$sql);
if($result1){
$to =   'volunteers@rotaryteach.org'; // Email address of the Receiver.
		$subject = "Confirmed Volunteers";
		$message = '
		<html>
		<head></head>
		<body>
		<table>
		<tr>
		<td>
		Name : '.$txtName.' <br />
		Mobile : '.$txtMob.' <br />
		Email : '.$txtEmail.' <br />
		</td>
		</tr>
		</table>
		</body>
		</html>
		';
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		// More headers
		$headers .= 'From:Volunteer<volunteer@rotaryteach.org>'. "\r\n";
		$send_contact = mail($to,$subject,$message,$headers);
			
	header('location:thankyou.php');
 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Volunteer with Us</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
  
<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

 <link rel="stylesheet" type="text/css" href="js/jquery.datepick.css"> 
  
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	color: #800000;
}
</style>
</head>

<body onload="districtlist();initcost();">
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!-- --------------------- LOGO AREA START ------------------- -->
        <?php include("logo_area.html") ?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("menu_area.html") ?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
       
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="images/h_top_l.png" /></td>
                <td style="background:url(images/h_top.png)"></td>
                <td width="8"><img src="images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="100%" valign="top" >
                                <h1 align="left">Please update your details</h1>
                              
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;" class="auto-style1"></div>
								<div id="form" style="padding:0 7px; margin:10px 0 0 0; "> 
                                 <form name="frm" action="update.php" method="post" enctype="multipart/form-data" >
								   <div id="registerform" style="padding:0 7px; margin:10px 0 0 0"> 
                                    <table width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
                                    <tr>
                                        <td width="40%"><strong>Volunteer Name</strong><span style="color:#FF0000">*</span></td>
                                        <td width="2%" align="center"><strong>:</strong></td>
                                        <td width="58%"><?php echo $full_name = $firstname.' '.$midname.' '.$lastname; ?></td>
                                    </tr>
                                    <tr><td colspan="3"></td></tr>
                                    <tr>
                                        <td><strong>Mobile</strong><span style="color:#FF0000">*</span></td>
                                        <td align="center"><strong>:</strong></td>
                                        <td>+91 
                                        <input type="text" name="txtMob" style="width:40%; border:1px solid #CCCCCC;line-height:20px; height:20px" value="<?php echo $mobile1; ?>"/>
                                        </td>
                                    </tr>
                                    <tr><td colspan="3"></td></tr>
                                    <tr>
                                        <td><strong>Email</strong><span style="color:#FF0000">*</span></td>
                                        <td align="center"><strong>:</strong></td>
                                        <td><input type="email" name="txtEmail" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" 
                                        value="<?php echo $email;?>"/>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="name" value="<?php echo $full_name = $firstname.' '.$midname.' '.$lastname; ?>" />
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <tr><td colspan="3"></td></tr>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <input type="submit" name="btnSave" id="btnSave" value="UPDATE" title="Submit detail to Register" style="background:#0099FF;padding:10px 50px; color:#ffffff; font-weight:bold; border-radius:5px; border:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; letter-spacing:1px"/>
                                        </td>
                                    </tr>

</table>
</div>
</form>
                                </div>
								</p>
                            </td>
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("footer_area.html") ?>
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="images/h_bottom_l.png" /></td>
                <td style="background:url(images/h_bottom.png)"></td>
                <td width="8"><img src="images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>


