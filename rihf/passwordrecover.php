<?php	 	
session_start();
include("admin/includes/connect.php"); 
if($_POST['Submit']=="Submit")
{
 $query=mysql_fetch_array(mysql_query("select * from login where email='".$_REQUEST['email']."'"));
 if($query['type']=='Individual' || $query['type']=='Rotarian' )
 {
   $result=mysql_fetch_array(mysql_query("select * from nonorg where email='".$_REQUEST['email']."' "))
   $name=$result['name'];
 }
 else
 {
   $result=mysql_fetch_array(mysql_query("select * from reg_org where email='".$_REQUEST['email']."' "))
   $name=$result['name'];
 }
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: support@rihf.org\n";
$headers .= "To: ".$_REQUEST['email']."\n";
$headers .= "X-Priority: 1\n"; 
$headers .= "Reply-To: support@rihf.org\n";

$sendTo2=$_REQUEST['email'];
$subject2="Thank you for registering with us at RIHF";

$message2 = "<table><tr><td>Dear $name,</td></tr><tr><td>&nbsp;</td></tr><tr><td>Thank you for visiting our website and registering with us. Kindly verify your registration by clicking on the link below:<br /><br /><a href='http://rihf.org/verify.php?vc=$uniqueID&em=$email'>http://www.rihf.org/verify_me</a></td></tr><tr><td>&nbsp;</td></tr><tr><td>Thank You for your time.</td></tr><tr><td>&nbsp;</td></tr><tr><td>Kind regards,</td></tr><tr><td>System Support</td></tr><tr><td>&nbsp;</td></tr><tr><td>RIHF</td></tr><tr><td><img src='http://rihf.org/images/elogo.jpg'></td></tr><tr><td>&nbsp;</td></tr><tr><td>Tel: :+91 33 24863434/35<br />Fax:+91 33 24863436<br />E-mail: support@rihf.org<br />Or visit our website: www.rihf.org</td></tr></table>";

  if(@mail($sendTo2, $subject2, $message2, $headers))
  {
header("location:signup_status.php?msg=1&nam=$name");
  }
}
?>
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
<style type="text/css" media="screen">
.style1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style3 {font-size: 14px}
.style5 {color:#8eae14;}
.style6 {color:#8eae14; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px;}
-->
</style>
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
    <td height="382" align="left" valign="top" bgcolor="#FFFFFF" style="padding-top:50px; padding-left:12px; padding-right:12px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                <td align="left" valign="top" style="padding:10px"><a href="donate.php"><img src="images/donate.jpg"/></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">Password Recover</span><br /><br /> 
			

  
        </td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top"><table width="292" height="149" border="0" cellpadding="0" cellspacing="0">
 <form name="frm1" action="" method="post">
  <tr>
    <td width="88" height="36">Email</td>
    <td width="204"><input type="text" name="email" style="width:200px; border:thin #669900 dotted;" id="email"/></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
	<td><input type="submit" name="Submit" value="Submit" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
  </tr>
  </form>
  
</table></td>
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