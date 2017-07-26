<?php
include("../connection.php");

$arr = array();
$msg="";
$refappno = $_POST["hdnrefappno"];
$txtapproveby = $_POST["hdnapproveby"];

//echo $refappno." ".$approveby;

$query = "SELECT district, club,refappno FROM registrationForGrantapp WHERE refappno='".$refappno."';";

$result = mysqli_query($link,$query);
if($result) {
$arr[]=mysqli_fetch_assoc($result);
}

/*if(isset($_POST["btn_submit"])) {
if($approveby=='CP') {
$chkqry = "SELECT count(id)as avail FROM registrationForGrantapp WHERE district='".$_POST["txtDistrict"]."' and club='".$_POST["txtClub"]."' and  contactemail='".$_POST["txtemail"]."' and password='".$_POST["txtpwd"]."' and role='CP';";
}
else
{
$chkqry = "SELECT count(id)as avail FROM registrationForGrantapp WHERE district='".$_POST["txtDistrict"]."' and club='".$_POST["txtClub"]."' and refappno='".$_POST["txtrefno."]."' contactemail='".$_POST["txtemail"]."' and password='".$_POST["txtpwd"]."' and role='PCP';";
}

$chkresult = mysqli_query($link,$chkqry);
if($chkresult) {
$chkarr[]=mysqli_fetch_assoc($chkresult);
}

if($chkarr[0]["avail"]>0) {
if($approveby=='CP')
{
$query = "UPDATE grantAppEligible SET approvebyCP='Yes'  WHERE refappno='".$refappno."';";
}
else if($approveby=='PCP')
{
$query = "UPDATE grantAppEligible SET approvebyPCP='Yes'  WHERE refappno='".$refappno."';";
}
$result = mysqli_query($link,$query);

	if($result) {
			
			$PCQry ="SELECT district, club,contactname,contactemail FROM registrationForGrantapp WHERE district='".$_POST["txtDistrict"]."' and club='".$_POST["txtClub"]."' and role='CP';";
			
			$PCresult=mysqli_query($PCQry);
			if($PCresult)
			{
			$PCarr[]=mysqli_fetch_assoc($chkresult);
			}
	
			if($approveby=='PCP') {
			
				$to  = $PCarr[0]["contactemail"];
				$subject = 'Approval Notice of application '.$refappno;
				$message = '<html>';
				$message .= '<body>';
				$message .= '<p>Application no '.$refappno.' is approved by primary contact parson. This application is waiting for your approval</p>';
				$message .= '</body>';
				$message .= '</html>';
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: http://info@rotaryteach.org' . "\r\n";
		
					mail($to, $subject, $message, $headers);
			}
	
		header("location:grantApplicationIndex.php");
		}
	}
else
{
$msg = "Invalid login!";

}
}*/
		
//echo json_encode($arr);
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
          <?php include("../header_area.html");?>
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
                                       	  <h1 style="padding:0; margin:0">Login</h1>
                                     	</td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"><?php echo $msg;?></div>
                                
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
<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999;">
	<tr>
		<td class="hed1">LOGIN</td>
  	</tr>
</table>
<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
    <tr>
        <td>
            <p style="padding:15px 15px 0 15px; margin:0"><span style="color:#FF0000; font-size:14px; font-weight:bold"><?php echo $msg;?></span>
                <form id="frm" name="frm" action="" method="post" >
                <table border="0" cellpadding="5" cellspacing="0" width="90%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
				 <input type="hidden" id='txtDistrict' name='txtDistrict' value="<?php echo $arr[0]["district"]?>" />
				 <input type="hidden" id="txtClub" name="txtClub" value="<?php echo $arr[0]["club"]?>"/>
				 <input type="hidden" id="txtrefno" name="txtrefno" value="<?php echo $arr[0]["refappno"]?>"/>
				 <input type="hidden" id="hdnapproveby" name="hdnapproveby" value="<?php echo $txtapproveby?>"/>
				
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
                    <td>
                        <input type="button" name="btn_submit" id="btn_submit" value="Login"  class="hed" style="cursor:pointer; border-radius:3px;" onclick="goforapproval();" /> 
                        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="hed" style="cursor:pointer; border-radius:3px" />&nbsp;&nbsp;<br /><br />
						
                      
                    </td>
                </tr>
                </table>                               
              
                </form>
								  
            </p>            
		</td>
	</tr>
</table>
           
        
    						</td>
    						<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("../inner_right.html");?>
                            </td>
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
	

	function goforapproval() {
	
		if($.trim($("#txtemail").val())==''){
				alert("Please enter email.");
				$("#txtemail").focus();
				return false;
			}
		if($.trim($("#txtemail").val())!="")
		{
			  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			 if(!expr.test($.trim($("#txtemail").val())))
			 {
				alert("Invalid Email!");
				$("#txtemail").focus();
				return false;
			 }
		}
	if($.trim($("#txtpwd").val())==''){
		alert("Please enter passward.");
		$("#txtpwd").focus();
		return false;
	}
	
	var pars = 	$("form").serialize();
	//alert(pars)
			$.ajax({                                      
			  url: 'grantappapproval.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				
				success: function(data)         
				{
				//alert(JSON.stringify(data))
				if(data["status"]==1)
				{
					window.location="grantApplicationIndex.php";
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