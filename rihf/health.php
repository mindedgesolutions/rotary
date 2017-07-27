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
<style type="text/css">
.style5 {color:#8eae14;}
</style>	
</head>

<body>
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
                <td align="left" valign="top"><span class="heading1">Friends</span> <span class="heading2">Of RIHF</span></td>
              </tr>
              <tr>
                <td align="left" valign="top" style="padding:10px">
				<ul id="portfolio">
	<?php       
	 $file="friendslide.xml";
	 $xmlDoc = new DOMDocument(); 
     $xmlDoc->load($file); 
     $searchNode = $xmlDoc->getElementsByTagName( "slide" ); 
     foreach( $searchNode as $searchNode ) 
	 {
	 ?>
				<li>
				<a href="friends.php">
				<img src="<?php echo $searchNode->getAttribute('path'); ?>" width="189" height="141" />
				</a>
				</li>
				<?php } ?>
				</ul>
				</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">HEALTH</span> <br /><br />
  The unfortunate reality of India is that a large portion of its population is not financially stable. As a result of this, services like medical health are not easily accessible to them. Health problems due to poor living conditions are rampant with no proper treatment. Heart ailments occur often in the children of this country and without medical treatment, these conditions are fatal. Those in need of pacemakers are unable to purchase them because they cost too much. Physical deformities like cleft lip and hare lip go unattended as well. Visual impairment because of cataract plagues millions of our population. Most people cannot afford to get the medical attention they deserve. Prevention of Polio is an ongoing mission for Rotary so that one day Polio ceases to exist.<br /><br />
RIHF can help change that. Our mission is to reach out to as many people as possible and ensure proper medical help. Our goal is to set up eye hospitals and pacemaker banks as well as fund many heart surgeries for those who cannot afford to themselves. Eradication of polio has been a dream for Rotary for years. They plan to further their endeavours to make this dream a reality.
<br />
<br />
<ul style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; list-style:none; line-height:30px; left: -37px;">
<li><img src="images/bullets.jpg" width="6" height="20" />&nbsp;&nbsp;<a href="hearts.php" style="text-decoration:none;"><span class="style5">Saving Little Hearts</span></a></li>
<li><img src="images/bullets.jpg" width="6" height="20" />&nbsp;&nbsp;<a href="vision.php" style="text-decoration:none;"><span class="style5">Mission Vision</span></a></li>
<li><img src="images/bullets.jpg" width="6" height="20" />&nbsp;&nbsp;<a href="corrective.php" style="text-decoration:none;"><span class="style5">Corrective Surgeries</span></a></li>
<li><img src="images/bullets.jpg" width="6" height="20" />&nbsp;&nbsp;<a href="banks.php" style="text-decoration:none;"><span class="style5">Pacemaker Banks</span></a></li>
</ul>
</td>
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
 <?php include("includes/footer.php"); ?>
</table>
</body>
</html>
