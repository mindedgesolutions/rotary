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
<script src="functions_volunteer.js" type="text/javascript"></script>
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
<script type="text/javascript">
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
//------------------------------------------------------------
function hi(a)
{
var v=a;

if(v=="cash")
{
var obj=document.getElementById('dh1');
var obj1=document.getElementById('dh2');
obj.innerHTML="Select area of donation";
obj1.innerHTML="";
document.getElementById('cashd').style.visibility = 'visible';
document.getElementById('kindd').style.visibility = 'hidden';
document.getElementById('amt').style.visibility = 'visible';
document.getElementById('pay').style.visibility = 'visible';
document.getElementById('cur').style.visibility = 'visible';
document.getElementById('oth').style.visibility = 'hidden';
}
else
{
var obj=document.getElementById('dh2');
var obj1=document.getElementById('dh1');
obj.innerHTML="Select kind of donation";
obj1.innerHTML="";
document.getElementById('cashd').style.visibility = 'hidden';
document.getElementById('kindd').style.visibility = 'visible';
document.getElementById('amt').style.visibility = 'hidden';
document.getElementById('pay').style.visibility = 'hidden';
document.getElementById('cur').style.visibility = 'hidden';
}
}
//---------------------------------------------------------------
function ot1()
{

var v = document.frm1.d.value;
if(v=="ot")
{
document.getElementById('oth').style.visibility = 'visible';
}
else
{
document.getElementById('oth').style.visibility = 'hidden';
}

}
</script>
<style type="text/css" media="screen">
.style1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style2 {
	color: #91AF17;
	font-weight: bold;
}
.style3 {color: #FF0000}
.style4 {color: #000000; font-weight:normal;}
-->
</style>			
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
                <td align="left" valign="top" style="padding:0px"><a href="donate.php"><img src="images/donate.jpg"/></a>
				</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">DONATE</span><br /><br />
             Contributions may be sent to: <br /><br />

Account Name: Rotary India Humanity Foundation<br />
Account number: 31317807754<br />
IFS Code: SBIN0006770<br />
Bank Name: State Bank of India<br />
Bank Branch: Sarat Bose Road<br />
Bank Address: 145A Sarat Bose Road. Kolkata 700026. India<br />   

</td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle">&nbsp;</div>
			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
 <?php	 	 include("includes/footer.php"); ?>
</table>
</body>
</html>