<?php
include("../connection.php");
	$msg = "";
if(isset($_POST["btn_submit"])) {
	$username = $_POST["txtuname"];
	$pwd =  $_POST["txtpwd"];
	$loginqry = "SELECT id FROM projectproposal WHERE username='".$username."' and pwd='".$pwd."';";

	$result = mysqli_query($link,$loginqry);

		$row[] = mysqli_fetch_assoc($result);
		
		if($row[0]["id"]>0) {
			header("Location: assignproject.php?project=".$row[0]["id"]);
			}
			
		else{
		$msg = "Invalid Username or Password!";
		}
}
//echo "2334".$msg;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
<title>Welcome - Rotary Projects</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<!--<link href="css/header_area.css" rel="stylesheet" type="text/css" />-->
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
<!--<script type="text/javascript" src="../js/jquery.min.js"></script>-->

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>




	<script>
		//!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

<!--<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>-->
 <!--	<link rel="stylesheet" href="style.css" />-->

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');



    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body>
<center>
<div style="background:url(../images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(../images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        <!----------------------- LOGO AREA START --------------------->
        <?php include("../logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("../menu_area.html")?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <?php include("../header_area.html")?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="http://rotaryteach.org/images/h_top_l.png" /></td>
                <td style="background:url(http://rotaryteach.org/images/h_top.png)"></td>
                <td width="8"><img src="http://rotaryteach.org/images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(http://rotaryteach.org/images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                              <h1>Login for Volunteer Requests</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                <div style="margin:15px 0 10px 0; line-height:18px; color:#CC0000; " class="auto-style1">
									<strong>
									<?php echo $msg; ?>
									</strong></div>
                                <p class="text">
                                	<fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				
<p style="padding:15px 0 0 0; margin:0">
    <form id="frmlogin" name="frmlogin" action="loginforAssign.php" method="post" onsubmit="return validation()">
        <table border="0" cellpadding="5" cellspacing="0" width="70%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-top:15px">
            <tr>
                <td width="24%" style="background:url(../images/user.png) left center no-repeat; padding:0 0 0 20px"><strong>Username <span style="color:#ff0000">*</span></strong></td>
                <td width="4%"><strong>:</strong></td>
                <td width="72%"><input type="text" id="txtuname" name="txtuname" style="width:100%" value="<?php echo $username;?>"/></td>
            </tr>
            <tr>
                <td style="background:url(../images/lock.png) left center no-repeat; padding:0 0 0 20px"><strong>Password <span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>              
                <td><input type="password" id="txtpwd" name="txtpwd" style="width:100%" value="<?php echo $pwd;?>"/></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" name="btn_submit" id="btn_submit" value="Login"  style="cursor:pointer; border-radius:3px;" class="login" />
                </td>
            </tr>
            <TR height="10"><td colspan="3"></td></TR>
            <TR><td colspan="3" style="text-align:left; color:#000000">Kindly use your Login information that you selected when you uploaded your project requirements.  </td></TR>
        </table>                               
    </form> 
    
</p>
                                	</fieldset>
                                    <br />
                                   
                                </p>
                                
							</td>
							<td width="20">&nbsp;</td>
							<td width="210" valign="top">
								<?php include("../inner_right.html")?>
							</td>
						</tr>
					</table>


                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("../footer_area.html")?>
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(http://rotaryteach.org/images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="http://rotaryteach.org/images/h_bottom_l.png" /></td>
                <td style="background:url(http://rotaryteach.org/images/h_bottom.png)"></td>
                <td width="8"><img src="http://rotaryteach.org/images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>
<script type="text/javascript">
	

	Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});
</script>


</body>
</html>






