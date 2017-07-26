<?php
include("../connection.php");
$infoarr=array();
$district = $_POST["hdndistrict"];
$club = $_POST["hdnclub"];
$belongto = $_POST["hdnbelongto"];
$refno =$_POST["hdnrefno"];


$getInfoqry = "SELECT contactname as cpcontactname, contactemail as cpcontactemail FROM registrationForGrantapp WHERE district='".$district."' and club='".$club."' and role='CP' and belongto='".$belongto."';";
$inforesult = mysqli_query($link,$getInfoqry);
if($inforesult){
$infoarr[] = mysqli_fetch_assoc($inforesult);
}
if($refno!='') {
$getpcpInfoqry ="SELECT contactname, contactemail FROM registrationForGrantapp WHERE  district='".$district."' and club='".$club."' and refappno='".$refno."';" ;
$pcpresult = mysqli_query($link,$getpcpInfoqry);
if($pcpresult){
$pcpinfoarr[] = mysqli_fetch_assoc($pcpresult);
}

}
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

<body>
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
                                       	  <h1 style="padding:0; margin:0">Registration for Grant Application</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<div style="min-height:400px">
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
<form name="frmgrantappregist" id="frmgrantappregist" action="savegrantregistration.php" method="post"><!-- onsubmit="return validation();"-->
				<input type="hidden" name="hdntype" id="hdntype" value="<?php echo $_POST["hdntype"];?>"/>
   				<input type="hidden" name="hdnbelongto" id="hdnbelongto" value="<?php echo $_POST["hdnbelongto"];?>"/>
   				<input type="hidden" name="hdnrefappno" id="hdnrefappno" value="<?php echo $refno;?>"/>
				 <tr>
                    <td width="30%"><strong>District <span style="color:#ff0000">*</span></strong></td>
                    <td width="2%"><strong>:</strong></td>              
                    <td><input type="text" id="txtdistrict" name="txtdistrict" readonly="readonly" value="<?php echo $district;?>"  style="width:15%"/></td>
                </tr>
				 
				
				<tr>
					<td><strong>Club <span style="color:#FF0000">*</span></strong></td>
					<td ><strong>:</strong></td>
					<td><input type="text" id="txtClub" name="txtClub" size="25px"  readonly="readonly" value="<?php echo $club?>" style="width:60%" /></td>
				</tr>

				<tr>
                    <td><strong>Primary Contact Name <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtcontactname" id="txtcontactname" <?php if($pcpinfoarr[0]["contactname"]!='') echo 'readonly'?>  value="<?php echo $pcpinfoarr[0]["contactname"]?>" style="width:60%"/></td>
                </tr>
				<tr>
                    <td><strong>Primary Contact Email <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtcontactemail" id="txtcontactemail" <?php if($pcpinfoarr[0]["contactemail"]!='') echo 'readonly'?>  value="<?php echo $pcpinfoarr[0]["contactemail"]?>" style="width:60%"/></td>
                </tr>
				<tr>
                    <td><strong>Club President Name <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtcpname" id="txtcpname" <?php if($infoarr[0]["cpcontactname"]!='') echo 'readonly'?>  value="<?php echo $infoarr[0]["cpcontactname"]?>" style="width:60%"/></td>
                </tr>
				<tr>
                    <td><strong>Club President Email</strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtcpemail" id="txtcpemail" <?php if($infoarr[0]["cpcontactemail"]!='') echo 'readonly'?>  value="<?php echo $infoarr[0]["cpcontactemail"]?>" style="width:60%"/></td>
                </tr>
                <tr height="5">
                    <td align="center" colspan="3"></td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <input type="button" name="btn_submit" id="btn_submit" value="Register" style="cursor:pointer" onclick="saveRegistration();" class="button" />&nbsp;&nbsp;
                        <input type="button" name="btn_submit" id="btn_submit" value="Forgot Password" style="cursor:pointer; border-radius:3px;" onclick="forgotpwd();" class="button" /> &nbsp;&nbsp;
                        <input type="button" name="btn_reset" id="btn_reset" value="Cancel" style="cursor:pointer; border-radius:3px"  onclick="javascript: window.open('grantApplicationIndex.php','_self')" class="button" />
					</td>
				</tr>
</form>         
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
	
	function saveRegistration(){
		
		if($.trim($("#txtcontactname").val())==''){
		alert("Please enter primary contact name.");
		$("#txtcontactname").focus();
		return false;
		}
		
		if($.trim($("#txtcontactemail").val())==''){
		alert("Please enter primary contact email.");
		$("#txtcontactemail").focus();
		return false;
		}
		if($.trim($("#txtcontactemail").val())!="")
		{
			  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			 if(!expr.test($.trim($("#txtcontactemail").val())))
			 {
				alert("Invalid Email!");
				$("#txtcontactemail").focus();
				return false;
			 }
		}
		if(($.trim($("#txtcpname").val())!='' && $.trim($("#txtcpemail").val())=='') || ($.trim($("#txtcpname").val())=='' && $.trim($("#txtcpemail").val())!='')){
		alert("Please enter name and email of club president.");
		$("#txtcontactname").focus();
		return false;
		}
		
		if($.trim($("#txtcpemail").val())!="")
		{
			  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			 if(!expr.test($.trim($("#txtcpemail").val())))
			 {
				alert("Invalid Email for club president!");
				$("#txtcpemail").focus();
				return false;
			 }
		}

		$("#frmgrantappregist").submit();
					
	}
	
	
</script>


</body>
</html>






