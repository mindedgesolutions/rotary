<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
include("admin/includes/connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
                <td align="center" valign="top" style="padding:0px"><a href="donate.php"><img src="images/donate.jpg"/></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<?php $image=mysql_fetch_array(mysql_query("select * from rihf_content where page_title='".$_REQUEST['type']."' "));?>
          <tr>
            <td align="left" valign="top"><span class="heading1"><?php echo $image['page_name']; ?></span></td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top"><a name="top"></a>&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" valign="top"><div align="left" style="border:3px solid #fff; -webkit-box-shadow: #B3B3B3 0px 0px 10px;-moz-box-shadow: #B3B3B3 0px 0px 10px; box-shadow: #B3B3B3 0px 0px 10px; width:400px; height:243px;">
				  <?php $image1=mysql_fetch_array(mysql_query("select * from rihf_content_pic where page_title='".$_REQUEST['type']."' "));?>
				  <?=(!empty($image1['text_details']))? '<img src="uploads/content/thumbs/'.$image1['text_details'].'" width="400" height="243">' : ''?>				  
				  </div></td>
                  <td width="210" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				   <?php $query=mysql_query("select * from rihf_content where page_title='".$_REQUEST['type']."' ");
				     while($res=mysql_fetch_array($query))
					 { 
				   ?>
				   
                    <tr>
                      <td align="left" valign="middle"><a href="#<?php echo $res['text_heading']; ?>" class="right_menu"><?php echo substr($res['text_heading'],0,25); ?></a></td>
                    </tr>
					<?php } ?>
                  </table></td>
                </tr>
              </table>
              </td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<?php $query1=mysql_query("select * from rihf_content where page_title='".$_REQUEST['type']."' ");
				  while($res1=mysql_fetch_array($query1))
				  { 
				  ?>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top" class="text">
<span class="heading3"><a name="<?php echo $res1['text_heading']; ?>"></a><?php echo $res1['text_heading']; ?></span><br /><br /><?php echo $res1['text_dscription']; ?> </td>
                    <td width="50" align="right" valign="bottom"><a href="#top" class="read_more">Top</a></td>
                  </tr>
                </table></td>
              </tr>
			  <?php } ?>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <?php include("includes/footer.php"); ?>
</table>
</body>
</html>