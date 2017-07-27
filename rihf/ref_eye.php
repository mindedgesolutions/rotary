<?php
session_start();
include("admin/includes/connect.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary India Humanity Foundation</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script src="functions1.js" type="text/javascript"></script>
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
<script type="text/javascript" language="javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

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
		src:  '<?php echo $searchNode->getAttribute('path'); ?>'
		
		
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
<style type="text/css" media="screen">
.style1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style5 {color:#8eae14;}
.style6 {color:#8eae14; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px;}
.style3 {color: #FF0000;}
.style33 {color: #000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;}
.style22 {
	color: #1B325E;
	font-weight: bold;
}
.style21 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>			
</head>

<body onload="MM_preloadImages('images/ref_g_2.jpg','images/ref_e_2.jpg')">
<div style="position:fixed; float:right; right:0; z-index:100; width:42px; margin-top:111px;"><a href="#"><img src="images/story_of_the_month.jpg" border="0"  title="Story of The Month"/></a></div>
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
               <?php include("includes/header.php"); ?>
              <tr>
                <td align="left" valign="top"><div id="crossslide" style="width:726px; height:271px"><img src="flashshow/progress.gif"  /></div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
       <?php include("includes/menu.php"); ?>
    </table></td>
  </tr>
  <tr>
    <td height="382" align="left" valign="top" bgcolor="#FFFFFF" style="padding-top:50px; padding-left:12px; padding-right:12px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="210" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
             <?php include("includes/left-menu.php"); ?>
          </tr>
          <tr>
            <td height="24" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top">
				<div style="width:210px; height:61px; top: 150px; left:5px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:22px; text-align:justify;"><a href="ref_heart.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/ref_g_2.jpg',1)"><img src="images/ref_g_1.jpg" name="Image10" width="211" height="58" border="0" id="Image10" /></a></div>
<div style="width:210px; height:61px; top: 237px; left: 11px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:22px; text-align:justify;"><a href="ref_eye.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11','','images/ref_e_2.jpg',1)"><img src="images/ref_e_1.jpg" name="Image11" width="211" height="58" border="0" id="Image11" /></a></div>
				<div style="width:210px; height:107px; top: 307px; left: 11px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:22px; text-align:justify; background-image:url(images/mybase.jpg)">
  <table width="159" height="99" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="21"><img src="images/pointer2.jpg" width="10" height="10" /></td>
      <td width="138"><a href="javascript:myhome();" style="text-decoration:none;"><span style="color:#FFFFFF;">My Home</span></a></td>
    </tr>
    <tr>
      <td><img src="images/pointer2.jpg" width="10" height="10" /></td>
      <td><a href="javascript:myset('<?php echo $type;?>');" style="text-decoration:none;"><span style="color:#FFFFFF;">Account Settings</span></a></td>
    </tr>
    <tr>
      <td><img src="images/pointer2.jpg" width="10" height="10" /></td>
      <td><a href="logout.php" style="text-decoration:none;"><span style="color:#FFFFFF;">Logout</span></a></td>
    </tr>
  </table>
</div>
				</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top">
  <div style="width:700px; height:600px; top: 0px; left: 238px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;" id="ctnt">
  <form action="ins_eye_case.php" method="post" enctype="multipart/form-data" name="frm1">
  <table width="694" height="452" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"> <span class="style6">Save Eye </span></td>
  </tr>
  <tr>
    <td width="176">Patient's name </td>
    <td width="231"><input type='text' name='name' style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">&nbsp;</td>
  </tr>
  <tr>
    <td width="176">Address (line 1) </td>
    <td width="231"><input type='text' name='ad1' style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">&nbsp;</td>
  </tr>
   <tr>
    <td width="176">Address (line 2) </td>
    <td width="231"><input type='text' name='ad2' style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">&nbsp;</td>
  </tr>
  <tr>
    <td width="176">City</td>
    <td width="231"><input type='text' name='city' style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">&nbsp;</td>
  </tr>
  <tr>
    <td width="176">Age</td>
    <td width="231"><input type='text' name='age' style='width:50px; border:thin #669900 dotted;'/></td>
    <td width="287">&nbsp;</td>
  </tr>
  <tr>
    <td width="176">Sex </td>
    <td width="231"><input name='radiobutton' type='radio' value='Male' style='border:thin #669900 dotted;'/> Male <input name='radiobutton' type='radio' value='Female' style='border:thin #669900 dotted;'/> Female</td>
    <td width="287">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"> <span class="style6">Upload documents</span></td>
  </tr>
   <tr>
    <td width="176">Photograph</td>
    <td width="231"><input type="file" name="file1" style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">Max file size:500 KB </td>
  </tr>
   <tr>
    <td width="176">Doctor's prescription</td>
    <td width="231"><input type="file" name="file2" style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">Max file size:500 KB</td>
  </tr>
   <tr>
    <td width="176">Cardiologist's report</td>
    <td width="231"><input type="file" name="file3" style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">Max file size:1 MB</td>
  </tr>
   <tr>
    <td width="176">Pathological reports</td>
    <td width="231"><input type="file" name="file4" style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">Max file size:1 MB </td>
  </tr>
   <tr>
    <td width="176">ECG</td>
    <td width="231"><input type="file" name="file5" style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">Max file size:2 MB </td>
  </tr>
   <tr>
    <td width="176">Scans (eg MRI)</td>
    <td width="231"><input type="file" name="file6" style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">Max file size:2 MB </td>
  </tr>
   <tr>
    <td width="176">Quotations & Admission details of hospitals</td>
    <td width="231"><input type="file" name="file7" style='width:204px; border:thin #669900 dotted;'/></td>
    <td width="287">Max file size:1 MB</td>
  </tr>
   <tr>
    <td height="44" colspan="3"><input name="ps" type="checkbox" value="yes" style='border:thin #669900 dotted;'/> Did he/she have any previous surgery</td>
  </tr>
   <tr>
    <td height="44" colspan="3" align="center"><input name="submit" type="submit" value="SUBMIT" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
  </tr>
</table>
 </form>
  </div>
			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
 <?php include("includes/footer.php"); ?>
</table>
</body>
</html>
