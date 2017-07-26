<?php
session_start();
include("../connection.php");
$msg = "";
$arr =array();
$resultarr =array();
$resultrolearr = array();
$refno = $_GET["refno"];
$query = "SELECT district, club,refappno FROM registrationForGrantapp WHERE refappno='".$_GET["refno"]."';";

$result = mysqli_query($link,$query);
if($result) {
$arr[]=mysqli_fetch_assoc($result);
}

/*
print_r($resultrolearr);*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<link href="../button/style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>


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

function districtlist()
{
var str = "";
$.ajax({                                      
      url: '../districtlist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["district"]+"'>"+data[i]["district"]+"</option>";
				}
			}			 
			 	$("#txtDistrict").append(str);
		}
	});
}


function dispclub(val)
{
	var str = "<option value=''>Select</option>";
	var pars ='dist='+val;

$.ajax({                                      
      url: '../clublist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["club"]+"'>"+data[i]["club"]+"</option>";
				}
			}
			$("#txtClub").empty();
			$("#txtClub").append(str);			 
		}
	});
}

function fillhidden() {

$('#hdndistrict').val($("#txtDistrict").val());
$('#hdnclub').val($("#txtClub").val());
}



</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body onload="districtlist()">
<center>
<div style="background:url(../images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(../images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("../logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
         <?php include("../menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
          <?php /*?><?php include("../header_area.html");?><?php */?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="../images/h_top_l.png" /></td>
                <td style="background:url(../images/h_top.png)"></td>
                <td width="8"><img src="../images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(../images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Grant 
										  Application Login</h1>
                                     	</td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                
                				<div class="auto-style1">
									
                              
<br class="auto-style2" />

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
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	color: #FF0000;
}
</style>
								</div>
<div style="min-height:400px">
<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999;">
	<tr>
		<td class="hed1">LOGIN</td>
  	</tr>
</table>
<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
    <tr>
        <td>
            <p style="padding:15px 15px 0 15px; margin:0"><span style="color:#FF0000; font-size:14px; font-weight:bold"><?php echo $msg;?></span>
                <form id="grantLogin" name="grantLogin" action="grantApplicationLogin.php" method="post" >
                <table border="0" cellpadding="5" cellspacing="0" width="90%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
				 <input type="hidden" id='txtDistrict' name='txtDistrict' value="<?php echo $arr[0]["district"]?>" />
				 <input type="hidden" id="txtClub" name="txtClub" value="<?php echo $arr[0]["club"]?>"/>
				 <input type="hidden" id="txtrefno" name="txtrefno" value="<?php echo $arr[0]["refappno"]?>"/>
				 
                <tr>
                    <td width="30%" style="background:url(images/user.png) left center no-repeat; padding:0 0 0 20px"><strong>Email <span style="color:#ff0000">*</span></strong></td>
                    <td width="4%"><strong>:</strong></td>
                    <td width="66%"><input type="text" id="txtemail" name="txtemail" style="width:100%"/></td>
                </tr>
                <tr>
                    <td style="background:url(images/lock.png) left center no-repeat; padding:0 0 0 20px"><strong>Password <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="password" id="txtpwd" name="txtpwd" style="width:100%"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="link">
                        <input type="button" name="btn_submit" id="btn_submit" value="Login"  class="hed" style="cursor:pointer; border-radius:3px;" onclick="gotologin();" /> 
                        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="hed" style="cursor:pointer; border-radius:3px" />&nbsp;&nbsp;<br /><br />
						<a href="javascript: void(0)" onclick="forgetPWD()">Forgot Password</a>&nbsp;&nbsp;/ &nbsp;&nbsp;<a href="javascript: void(0)" onclick="changePWD()">Change Password</a>
                      
                    </td>
                </tr>
                </table>                               
              
                </form>
				<form name="frmgrantapp" id="frmgrantapp" method="post" action="grantApplicationEligible.php">
					<input type="hidden" name="hdnrefno" id="hdnrefno"  value="<?php echo $arr[0]["refappno"]?>"/>
					<input type="hidden" name="hdndistrict" id="hdndistrict"  value="<?php echo $arr[0]["district"]?>"/>
					<input type="hidden" name="hdnclub" id="hdnclub"  value="<?php echo $arr[0]["club"]?>"/>
					<input type="hidden" name="hdnappuserid" id="hdnappuserid"  value=""/>
				</form> 
				<form name="frmgetPWD" id="frmgetPWD" method="post" action="forgetpassword.php">
					<input type="hidden" name="hdnrefno" id="hdnrefno"  value="<?php echo $arr[0]["refappno"]?>"/>
					<input type="hidden" name="hdndistrict" id="hdndistrict"  value="<?php echo $arr[0]["district"]?>"/>
					<input type="hidden" name="hdnclub" id="hdnclub"  value="<?php echo $arr[0]["club"]?>"/>
				</form> 
				<form name="frmchangePWD" id="frmchangePWD" method="post" action="changepassword.php">
					<input type="hidden" name="hdnrefno" id="hdnrefno"  value="<?php echo $arr[0]["refappno"]?>"/>
					<input type="hidden" name="hdndistrict" id="hdndistrict"  value="<?php echo $arr[0]["district"]?>"/>
					<input type="hidden" name="hdnclub" id="hdnclub"  value="<?php echo $arr[0]["club"]?>"/>
				</form> 				  
            </p>            
		</td>
	</tr>
</table>
 </div>          
        
    						</td>
    						<!--<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php /*?><?php include("../inner_right.html");?><?php */?>
                            </td>-->
						</tr>
					</table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
                     <?php include("../footer_area.html");?>
					
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(../images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="../images/h_bottom_l.png" /></td>
                <td style="background:url(../images/h_bottom.png)"></td>
                <td width="8"><img src="../images/h_bottom_r.png" /></td>
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
	
	function forgetPWD() {
	$("#frmgetPWD").submit();
	}

	function changePWD() {
	$("#frmchangePWD").submit();
	}


	function gotologin() {
	
		if($.trim($("#txtemail").val())==''){
				alert("Please enter your email.");
				$("#txtemail").focus();
				return false;
			}
		if($.trim($("#txtemail").val())!="")
		{
			  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			 if(!expr.test($.trim($("#txtemail").val())))
			 {
				alert("Invalid Email!. Your email is not registered or activated");
				$("#txtemail").focus();
				return false;
			 }
		}
	if($.trim($("#txtpwd").val())==''){
		alert("Please enter password.");
		$("#txtpwd").focus();
		return false;
	}
			var pars = 'email='+$("#txtemail").val()+'&pwd='+$("#txtpwd").val()+'&district='+$("#txtDistrict").val()+'&club='+$("#txtClub").val()
			$.ajax({                                      
			  url: 'loginvalidation.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
			//	alert(data["status"])
				if(data["status"]==1)
				{
					if(data["data"][0]["role"]=='CP')
					{
						$('#hdnappuserid').val(data["data"][0]["id"]);
						$('#frmgrantapp').submit();
					}
					else
					{
						if(data["data"][0]["refappno"]==$('#hdnrefno').val())
						{
						$('#hdnappuserid').val(data["data"][0]["id"]);
						$('#frmgrantapp').submit();
						}
						else
						{
						alert("Error Occured!")
						}
					}
				}
				else
				{
					alert(data["msg"])
				}
				}
			});

	}	
	
</script>


</body>
</html>






