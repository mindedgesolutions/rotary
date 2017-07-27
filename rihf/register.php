<?php	 	
session_start();
include("admin/includes/connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary India Humanity Foundation</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="flashshow/jquery.js"></script>
<script type="text/javascript" language="javascript" src="flashshow/jquery.cross-slide.js"></script>
<script type="text/javascript"> 
$(function($) {
	$('#crossslide').crossSlide({
	 sleep: 2,
     fade: 1
	}, [
	<?php	 	       
	 $file="homeslide.xml";
	 $xmlDoc = new DOMDocument(); 
     $xmlDoc->load($file); 
     $searchNode = $xmlDoc->getElementsByTagName( "slide" ); 
	 $numNode=$xmlDoc->getElementsByTagName( "slide" )->length;
	 $i=1;
     foreach( $searchNode as $searchNode ) 
     { ?>
	  {
		src:  '<?php	 	 echo $searchNode->getAttribute('path'); ?>'
		
		
	  }<?php	 	 
			   if($numNode!=$i)
                {
	             echo ",";
	             }
	             $i++;
	               } ?>        
	]);
});
 
</script>
 
<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.innerfade.js"></script>
		<script type="text/javascript">
		 $.noConflict();
	 jQuery(document).ready(
				function(jQuery){
					jQuery('ul#portfolio').innerfade({
					    animationtype:'fade',
						speed: 2000,
						timeout: 3000,
						type: 'sequence',
						containerheight: '100px'
					});
			});
</script>
<link rel="stylesheet" href="css/reset.css"  type="text/css" media="all" />
<style type="text/css" media="screen, projection">
				@import url(css/jq_fade.css);
</style>
<script src="functions.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
//-----------------------------------------------------AJAX---------------------------------------------
var xmlhttp = false;
//Check if we are using IE.
try {
//If the Javascript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
} catch (e) {
//If not, then use the older active x object.
try {
//If we are using Internet Explorer.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}

}
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
}
</script>
<script language="javascript" type="text/javascript">
function donate()
{
document.getElementById('donate').style.visibility = 'visible';
}
function donateout()
{
document.getElementById('donate').style.visibility = 'hidden';
}
function volunteer()
{
document.getElementById('volunteer').style.visibility = 'visible';
}
function volunteerout()
{
document.getElementById('volunteer').style.visibility = 'hidden';
}
function handshake()
{
document.getElementById('handshake').style.visibility = 'visible';
}
function handshakeout()
{
document.getElementById('handshake').style.visibility = 'hidden';
}
function showmovie()
{
document.getElementById('video').style.visibility = 'visible';
}
function showmovieout()
{
document.getElementById('video').style.visibility = 'hidden';
}//--------------------------------------------------------------
function do1()
{
var v = document.frm1.first.value;
if(v=="ot")
{
document.getElementById('ot1').style.visibility = 'visible';
}
else
{
document.getElementById('ot1').style.visibility = 'hidden';
}
}
//------------------------------------------------------------------
function do2()
{
var v = document.frm1.second.value;
if(v=="ot")
{
document.getElementById('ot2').style.visibility = 'visible';
}
else
{
document.getElementById('ot2').style.visibility = 'hidden';
}
}
//------------------------------------------------------------------
function do3()
{
var v = document.frm1.third.value;
if(v=="ot")
{
document.getElementById('ot3').style.visibility = 'visible';
}
else
{
document.getElementById('ot3').style.visibility = 'hidden';
}
}
//---------------------------------------------------------------------
function t1in()
{
document.getElementById('tip1').style.visibility = 'visible';
}
function t1out()
{
document.getElementById('tip1').style.visibility = 'hidden';
}
//----------------------------------------------------------------------
function t2in()
{
document.getElementById('tip2').style.visibility = 'visible';
}
function t2out()
{
document.getElementById('tip2').style.visibility = 'hidden';
}
//----------------------------------------------------------------------
function t3in()
{
document.getElementById('tip3').style.visibility = 'visible';
}
function t3out()
{
document.getElementById('tip3').style.visibility = 'hidden';
}
//----------------------------------------------------------------------
</script>
</head>

<body>
<div style="position:fixed; float:right; right:0; z-index:100; width:42px; margin-top:111px;">&nbsp;</div>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="224" align="left" valign="top"><img src="images/logo.jpg" width="224" height="326" /></td>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="29" align="left" valign="top">&nbsp;</td>
              </tr>
               <?php	 	 include("includes/header.php"); ?>
              <tr>
                <td align="left" valign="top"><div id="crossslide" style="width:726px; height:271px"><img src="flashshow/progress.gif"  /></div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
       <?php	 	 include("includes/menu.php"); ?>
    </table></td>
  </tr>
  <tr>
    <td height="382" align="left" valign="top" bgcolor="#FFFFFF" style="padding-top:30px; padding-left:12px; padding-right:12px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="210" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
             <?php	 	 include("includes/left-menu.php"); ?>
          </tr>
          <tr>
            <td height="24" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              
              <tr>
                <td align="left" valign="top" style="padding:0px"><a href="donate.php"><img src="images/donate.jpg"/></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">REGISTRATION</span> <br /><br />
<form name="frm1" action="reg.php" method="post" onsubmit="return check()">
<table width="694" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="203" height="32">User Type<span class="style3">*</span></td>
    <td width="278"><input name="radiobutton1" type="radio" value="Individual" style="border:thin #669900 dotted;" onclick="hi('no');"/>
      Individual 
        <input name="radiobutton1" type="radio" value="Rotarian" style="border:thin #669900 dotted;" onclick="hi('no');"/> 
        Rotarian <input name="radiobutton1" type="radio" value="Organization" style="border:thin #669900 dotted;" onclick="hi('or');"/> 
        Organization </td>
    <td width="213" id="err_utype">&nbsp;</td>
  </tr>
  <tr>
    <td height="26" colspan="3">
	<div id="ty"></div>
	</td>
  </tr>
  <tr>
    <td height="29" colspan="3" class="style2">Area of interest <span class="style4">(Check as applicable)</span> </td>
  </tr>
  <tr>
    <td height="28"><input type="checkbox" name="interest[]" value="health" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;Health</td>
    <td><input type="checkbox" name="interest[]" value="environment" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;&nbsp;Environment</td>
    <td><input type="checkbox" name="interest[]" value="education" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;&nbsp;Education</td>
  </tr>
  <tr>
    <td height="29"><input type="checkbox" name="interest[]" value="empowerment" style="border:thin #669900 dotted;"/>      
      &nbsp; Empowerment</td>
    <td><input type="checkbox" name="interest[]" value="disaster" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;&nbsp;Disaster management </td>
    <td><input type="checkbox" name="interest[]" value="polio" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;&nbsp;Polio eradication </td>
  </tr>
  <tr>
    <td colspan="3" id="bolka"><input type="checkbox" name="checkbox7" value="yes" style="border:thin #669900 dotted;" onclick="bolka();"/>
      &nbsp;&nbsp;I would like to receive SMS alerts.</td>
  </tr>
  <tr>
    <td colspan="3" id="polka"><input type="checkbox" name="checkbox8" value="yes" style="border:thin #669900 dotted;" onclick="polka();"/>
      &nbsp;&nbsp;I would like to receive E newsletters & Emails.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form></td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
 <?php	 	 include("includes/footer.php"); ?>
</table>
</body>
</html>