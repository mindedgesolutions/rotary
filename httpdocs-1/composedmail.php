<?php
session_start();
if(!isset($_SESSION["user"]))
{
	header("Location: detailviewlogin.php");
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<link href="button/style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>

<script type="text/javascript">


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

$(function() {
    setInterval( "slideSwitch()", 5000 );
});


function validation() {
	
	if($.trim($("#txtuname").val())==''){
		alert("Username can not be blank.");
		$("#txtuname").focus();
		return false;
	}
	if($.trim($("#txtpwd").val())==''){
		alert("Password can not be blank.");
		$("#txtpwd").focus();
		return false;
	}
	//return true;	
	
}

</script>

</head>

<body>
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        
        <!----------------------- CONTENT AREA START ------------------>
        
        <table width="906" border="0" cellspacing="0" cellpadding="7" align="center" style="margin-top:5px; margin-bottom:7px; background:#FFFFFF; border-radius:5px; box-shadow:0 0 3px #000000">
            <tr>
                <td>
                
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td valign="top">
                                
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left"><h1 style="padding:0; margin:0">Compose/Send 
										Email </h1></td>
                                        <td align="right"><a href="viewDetail.php" class="login">Back</a><a href="logout.php" class="login">Logout</a></td>
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                
                                <br />
                                
                             <!--   <div style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-weight:bold; background:#f5f5f5; box-shadow:0 0 2px #cccccc; padding:7px 0; border-radius:5px; color:#CC0000">
                                	Click on the respective sections below to view relevant details 
									with Mobile No and Email Id.
                                </div>-->
                                
                                <div style="margin:0 0 10px 0; line-height:18px; color:#CC0000; text-align:justify">
									<?php echo $msg; ?>
                                </div>
                              
								<br />
                                
<style type="text/css">

.red {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #CC0000; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999;transition: 300ms ease-in-out; font-style:normal
}
.red:hover { background-color: #990000 }

.yellow {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #FF6600; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999;transition: 300ms ease-in-out; font-style:normal
}
.yellow:hover { background-color: #c24e00 }

.green {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #009933; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999;transition: 300ms ease-in-out; font-style:normal
}
.green:hover { background-color: #005f20 }

.blue {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #0066FF; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999; transition: 300ms ease-in-out; font-style:normal
}
.blue:hover { background-color: #0053d0 }

.vio {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #db59c1; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999; transition: 300ms ease-in-out; font-style:normal
}
.vio:hover { background-color: #970071 }

.vio {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #CC0099; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999; transition: 300ms ease-in-out; font-style:normal
}
.vio:hover { background-color: #9d0076 }

.blue1 {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #1515d9; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999; transition: 300ms ease-in-out; font-style:normal
}
.blue1:hover { background-color: #010187}

.pink {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #FF0066; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999;transition: 300ms ease-in-out; font-style:normal 
}
.pink:hover { background-color: #b20047 }

.grey {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #3b528f; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999; transition: 300ms ease-in-out; font-style:normal
}
.grey:hover { background-color: #1a2b58}

.orr {
/*-webkit-border-radius: 7px; -moz-border-radius: 7px;border-radius: 7px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.5);font-weight:bold; color: #FFFFFF; text-align:center; background: #CC3300; text-decoration:none; border:1px solid #FFFFFF; box-shadow:0 0 3px #999999; transition: 300ms ease-in-out; font-style:normal
}
.orr:hover { background-color: #ca4b13 }
</style>

<table width="900" border="0" cellspacing="0" cellpadding="0" align="center" style="text-align:center">
<tr>
    <td width="405">
        <a href="Mail/mailtovolunteer.php" style="text-decoration:none">
            <div class="red">
            	<img src="images/volunteer.png" height="45" style="margin-bottom:8px" border="0" />
                <p style="padding:7px 0 0 0; margin:0; border-top:1px dashed #e0e0e0">Email to<br />Volunteers</p>
            </div>
        </a>
    </td>
	<td width="30"></td>
	
	<td width="405">
        <a href="Mail/mailtoliteracyteam.php" style="text-decoration:none">
            <div class="green">
            	<img src="images/lit-team.png" height="45" style="margin-bottom:8px" border="0" />
                <p style="padding:7px 0 0 0; margin:0; border-top:1px dashed #e0e0e0">Email to<br />District Literacy Team</p>
            </div>
        </a>
    </td>
	<td width="30"></td>
	<td width="405">
       <a href="Mail/mailtonationalcommitee.php" style="text-decoration:none">
            <div class="blue1">
            	<img src="images/view-n-c-member.png" height="45" style="margin-bottom:8px" border="0" />
                <p style="padding:7px 0 0 0; margin:0; border-top:1px dashed #e0e0e0">Email to<br />National Committee Members</p>
            </div>
        </a>
    </td>
	<td width="30"></td>
	
	<td width="405">
         <a href="Mail/mailtoDG.php" style="text-decoration:none">
            <div class="pink">
            	<img src="images/view-dg.png" height="45" style="margin-bottom:8px" border="0" />
                <p style="padding:7px 0 0 0; margin:0; border-top:1px dashed #e0e0e0">Email to<br />District Governors</p>
            </div>
        </a>
    </td>
</tr>

<tr height="12"><td colspan="7"></td></tr>

<tr>
    
	<td width="405">
        <a href="Mail/mailtoDLCC.php" style="text-decoration:none">
            <div class="grey">
            	<img src="images/volunteer.png" height="45" style="margin-bottom:8px" border="0" />
                <p style="padding:7px 0 0 0; margin:0; border-top:1px dashed #e0e0e0">Email to<br />
				DLCC</p>
            </div>
        </a>
    </td>
</tr>

<!--<tr height="12"><td colspan="7"></td></tr>

<tr>
    <td width="405">
        <a href="ZLC.php" style="text-decoration:none">-->
          <!--  <div class="orr">
            	<img src="images/volunteer.png" height="60" style="margin-bottom:8px" />
                <p style="padding:7px 0 0 0; margin:0; border-top:1px dashed #e0e0e0">ZLC Details</p>
            </div>-->
        <!--</a>
    </td>
	<td width="30"></td>
	<td width="405">&nbsp;
        
    </td>
	<td width="30"></td>
	<td width="405">&nbsp;
        
    </td>
	<td width="30"></td>
	<td width="405">&nbsp;
        
    </td>
</tr>-->
</table>
            
            					<br />

<!--<table border="0" cellpadding="5" cellspacing="0" width="70%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
<tr>
<td>
<a href="">View Volunteers</a><br />
<a href="">View Books Collection List</a><br />
<a href="">View Literacy Team</a><br />
<a href="">View Projects</a><br />
<a href="">View Progress Tracker</a><br />
<a href="">View National Commitee Member</a><br />
<a href="">View District Governer</a><br />
<a href="">View DLCC Members</a><br />
<a href="">View ZLC Member </a> 
</td>
</tr>
</table>-->
                  
    						</td>
						</tr>
					</table>
                    
                    <br />
                    
                    <!----------------------- FOOTER AREA START------------------------>
						<?php include("footer_area.html");?>
                    <!----------------------- FOOTER AREA END-------------------------->
                
                </td>
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






