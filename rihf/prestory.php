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
.style3 {font-size: 14px}
.style33 {font-size: 12px; font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif; color:#0066CC;}
.style34 {font-size: 12px; font-family:Verdana, Arial, Helvetica, sans-serif; color:#0066CC;}
.style35 {color: #999999}
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
            <td align="left" valign="top"><span class="heading1">STORY OF THE </span> <span class="heading2">PREVIOUS MONTH</span>
			<br />
          <br />
  <table width="694" border="0" cellspacing="0" cellpadding="0">
  <?php
	$currmonth=date('m', mktime());
	 $curryear=date('Y', mktime()); 
	
    $query2=mysql_query("select * from `rihf_story` where `text_month`!= $currmonth and `text_year`< $curryear+1"); 
   if(mysql_num_rows($query2))
   { ?>
  <tr>
    <td>
  <?php	
  while($rec4=mysql_fetch_array($query2))
  {
  ?>
  <table width="694" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><span class="heading1"><?php echo $rec4['text_heading'];?></span><span class="heading2">(<?php echo $rec4['page_name']; ?>)</span><br /><span class="style34"><?php echo $rec4['text_date']."/".$rec4['text_month']."/".$rec4['text_year'];?></span></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $rec4['text_dscription'];?></td>
  </tr>
  <tr>
    <td colspan="2"><span class="style35">-----------------------------------------------------------------------------------------------------------------------------------------</span></td>
  </tr>
</table>
<?php
}

?>
</td>
  </tr>
  <?php }else{ ?>
  <tr><td>There is no record of this month</td></tr>
  <?php } ?>
</table>
</td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
 <?php include("includes/footer.php"); ?>
</table>
</body>
</html>
