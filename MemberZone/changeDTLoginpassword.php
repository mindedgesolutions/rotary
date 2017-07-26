<?php
session_start();
include("connection.php");



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
	if($.trim($("#txtnewpwd").val())==''){
		alert("New Password can not be blank.");
		$("#txtnewpwd").focus();
		return false;
	}
	if($.trim($("#txtrenewpwd").val())==''){
		alert("Re-type new Password can not be blank.");
		$("#txtrenewpwd").focus();
		return false;
	}
	if($.trim($("#txtnewpwd").val())!='' && $.trim($("#txtrenewpwd").val())!=''){
		if($.trim($("#txtnewpwd").val())!=$.trim($("#txtrenewpwd").val())) {
		alert("New password does not match with Re-type password");
		$("#txtrenewpwd").focus();
		return false;
		}
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
                                <h1>Project Tracker Password Change</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                <div style="color:#ff0000; margin-bottom:10px"><?php echo $msg; ?></div>
                              
                                	  <table border="0" cellpadding="0" cellspacing="5" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
			
                <tr>
                    <td width="57%"><strong>Username <span style="color:#ff0000">*</span></strong></td>
                    <td width="3%"><strong>:</strong></td>
                    <td width="40%">
                       <input type="text" id="txtuname" name="txtuname"/></td>
                </tr>

                 
                  <tr>
                    <td><strong>Password <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="password" id="txtpwd" name="txtpwd" /></td>
                 </tr>
                 
				 <tr>
                    <td><strong>New Password <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="password" id="txtnewpwd" name="txtnewpwd" /></td>
                 </tr> 
				  <tr>
                    <td><strong>Re-Type New Password <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="password" id="txtrenewpwd" name="txtrenewpwd" /></td>
                 </tr> 
				 <tr>
                    <td colspan="3" align="center"><input type="button" name="btn_submit" id="btn_submit" value="Change" onclick="changePassword()" />&nbsp;<input type="button" name="btn_reset" id="btn_reset" value="Cancel" onclick="cancelInfo()" /></td>
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

	function changePassword() {
		if(validation()) {
	var pars = 'uname='+$('#txtuname').val()+'&password='+$('#txtpwd').val()+'&newpwd='+$('#txtnewpwd').val()
	$.ajax({                                      
		  url: 'changeDTPassword.php',                     
		  data: pars,
		  type:"post",
			dataType: 'json',
			success: function(data)         
			{
				/*alert(data.length)
				if(data.length>0)
				{*/
					if(data["status"]==0) {
						alert(data["msg"])
						return false;	
					}
					else if(data["status"]==1) {
					
						alert(data["msg"])
						window.location.href="districtTrackerlogin.php";
					}
					
				//}	
			}
		});
		}
	
	}
	function cancelInfo() {
	
	window.location.href="districtTrackerlogin.php";
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






