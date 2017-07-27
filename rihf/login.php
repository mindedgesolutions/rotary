<?php	 	
session_start();
include("admin/includes/connect.php"); 
if(isset($_SESSION['uid']) && $_SESSION['uid']!="")
{
header("location:my_home.php?ht=home");
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
            <td align="left" valign="top"><span class="heading2">Login to your account</span><br /><br /> 
			<?php	 	
  if(isset($_REQUEST['msg']) & $_REQUEST['msg']==1)
  {
  echo "Sorry Invalid userid or password";
  }
  elseif(isset($_REQUEST['msg']) & $_REQUEST['msg']==2)
  {
  echo "Sorry Your account is still unverified. Kindly verify your account by clicking on the link in the email that you had received from us after your registration.<br>If you have deleted the email or have not received it kindly <a href='resend_code.php'><span class='style6'><b>click here</b></span></a> to resend it again.";
  }
  elseif(isset($_REQUEST['msg']) & $_REQUEST['msg']==3)
  {
  echo "Kindly login to your account to refer a case. In case you do not have an account with us, do kindly register with us first.";
  }
   ?>	

  
</td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top"><table width="292" height="149" border="0" cellpadding="0" cellspacing="0">
 <form name="frm1" action="log_me.php" method="post">
  <tr>
    <td width="88" height="36">Email</td>
    <td width="204"><input type="text" name="email" style="width:200px; border:thin #669900 dotted;" id="email"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="pass" style="width:200px; border:thin #669900 dotted;" id="pass"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td><input type="submit" name="Submit" value="Submit" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
  </tr>
  </form>
  <tr>
    <td><a href="register.php" style="text-decoration:none;"><b>New User</b></a></td>
    <td align="right"><a href="password_recovery.php" style="text-decoration:none;"><b>Forgot password?</b></a></td>
  </tr>
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