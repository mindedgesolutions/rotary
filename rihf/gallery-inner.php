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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
		<?php $query=mysql_query("select * from rihf_album_management where album_id='".$_REQUEST['id']."'"); 
			  while($res=mysql_fetch_array($query)) { ?>	
			$("#various<?php echo $res['gallary_id']; ?>").fancybox({
				'titlePosition'		: 'inside'
				
			});
			<?php } ?>	
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
    <td height="382" align="left" valign="top" bgcolor="#FFFFFF" style="padding-top:30px; padding-left:12px; padding-right:12px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                <td align="left" valign="top" style="padding:0px"><a href="donate.php"><img src="images/donate.jpg"/></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<?php $result=mysql_fetch_array(mysql_query("select * from rihf_album_management where album_id='".$_REQUEST['id']."'")); ?>
          <tr>
            <td align="left" valign="top"><span class="heading1"><?php echo $result['title']; ?></span></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="gallery_pic">
			<?php $query=mysql_query("select * from rihf_album_management where album_id='".$_REQUEST['id']."'"); 
			  while($res=mysql_fetch_array($query))
			  {
			?>
			<a href="#inline<?php echo $res['gallary_id']; ?>" id="various<?php echo $res['gallary_id']; ?>"><img src="uploads/albumgallary/thumbs/<?php echo $res['gallary_image']; ?>" width="141" height="141" /></a>
			<?php } ?>
			</td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
  </tr>
  <?php include("includes/footer.php"); ?>
</table>
<?php $query=mysql_query("select * from rihf_album_management where album_id='".$_REQUEST['id']."'"); 
while($res=mysql_fetch_array($query))
{ ?>
       <div style="display: none;">
		<div id="inline<?php echo $res['gallary_id']; ?>" style="width:auto;height:auto;overflow:auto;">
		<table>
		<tr>
		<td><img src="uploads/albumgallary/thumbs/<?php echo $res['gallary_image']; ?>" width="800" height="600" /></td>
		<td align="left" valign="top"><span class="heading1"><?php echo $res['title']; ?></span><br /><br /><?php echo html_entity_decode(stripslashes($res['description'])); ?></td>
		</tr>
		</table>
		</div>
	</div>
<?php }?>

</body>
</html>