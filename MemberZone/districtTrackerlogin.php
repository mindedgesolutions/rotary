<?php
//include("connection.php");
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
	return true;	
	
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
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
         <?php include("menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
          <?php include("header_area.html");?>
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
                            <td width="650" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" width="43%">
                                       	  <h1 style="padding:0; margin:0">Progress Tracker Login</h1>
                                        </td>
                                        <td width="28%" align="right">
                                            <a href="viewdistricttrackerzonewise.php" style="color:#ffffff; text-decoration:none" title="">
<div style="float:right; font-size:12px; background:#43a40e; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #43a40e, #2f8004); margin-right:5px; font-family:Arial, Helvetica, sans-serif">
                                                    VIEW DATA ZONE WISE
                                            </div>
                                          </a>
                                      </td>
                                  <td width="29%" align="right">
                                            <a href="viewdistrictTracker1.php" style="color:#ffffff; text-decoration:none" title="">
<div style="float:right; font-size:12px; background:#FF0000; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #ff0000, #d70000); font-family:Arial, Helvetica, sans-serif">
                                                    VIEW DATA DISTRICT WISE
                                            </div>
                                    </a>
                                      </td>
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                
                                <div style="margin:15px 0 10px 0; line-height:18px; color:#CC0000; text-align:justify">
									<?php echo $msg; ?>
									DG / DLCC / ZLC can login to the Project Tracker Upload section with their allotted Username / Password and upload the Project Commitments for their respective Districts. In case you need to change your password, kindly click on the <em>"Change Password"</em> link given below.
                                	Contact RILM Office, Kolkata or Webmaster 
									for your Username / Password.<strong> 
									[Upload Commitments for 2014-2015 only]</strong></div>
                              
<br />

<style>
.hed1 {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
 .hed {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
 .hed:hover { border:1px solid #b6c7cc;
 background-color: #d4dee1; color: #0066FF;
 background-image: linear-gradient(to bottom, #d4dee1, #a9c0c8);
 }
</style>
<table border="0" cellpadding="5" cellspacing="0" width="70%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999;">
	<tr>
		<td class="hed1">LOGIN FORM</td>
  	</tr>
</table>
<table border="0" cellpadding="5" cellspacing="0" width="70%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
    <tr>
        <td>
            <p style="padding:15px 15px 0 15px; margin:0">
                <table border="0" cellpadding="5" cellspacing="0" width="90%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
                <tr>
                    <td width="30%" style="background:url(images/user.png) left center no-repeat; padding:0 0 0 20px"><strong>Username <span style="color:#ff0000">*</span></strong></td>
                    <td width="4%"><strong>:</strong></td>
                    <td width="66%"><input type="text" id="txtuname" name="txtuname" style="width:100%"/></td>
                </tr>
                <tr>
                    <td style="background:url(images/lock.png) left center no-repeat; padding:0 0 0 20px"><strong>Password <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="password" id="txtpwd" name="txtpwd" style="width:100%" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="button" name="btn_submit" id="btn_submit" value="Login" onclick="loginvalidation()" class="hed" style="cursor:pointer; border-radius:3px;" /> 
                        <input type="button" name="btn_reset" id="btn_reset" value="Cancel" onclick="cancelInfo()" class="hed" style="cursor:pointer; border-radius:3px" />&nbsp;&nbsp;|
                        <span class="link"><a href="changeDTLoginpassword.php"><strong>Change Password</strong></a></span>
                    </td>
                </tr>
                </table>                               
                <form id="DTLogin" name="DTLogin" action="districtTracker1.php" method="post" >
                <input type="hidden" id="userid" name="userid" />
                <input type="hidden" id="districtlist" name="districtlist"/>
                </form>  
            </p>            
		</td>
	</tr>
</table>
           
        
    						</td>
    						<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("inner_right.html");?>
                            </td>
						</tr>
					</table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
                     <?php include("footer_area.html");?>
					
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

<script type="text/javascript">

function loginvalidation()
{
if(validation()) {
var pars = 'uname='+$('#txtuname').val()+'&password='+$('#txtpwd').val()
$.ajax({                                      
      url: 'DTLoginValid.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			
			if(data.length==0)
			{
				alert("Invalid Username and Password. Try again.")
			}
			else
			{
			$("#userid").val(data[0]["id"]);
			$("#districtlist").val(data[0]["district"]);
			 $("#DTLogin").submit();
			}
			 	
		}
	});
	}
}



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






