<?php	 	
session_start();
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
            <td align="left" valign="top"><span class="heading1">BOARD</span> <span class="heading2">OF TRUSTEES</span></td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><img src="trust/Shekhar Mehta.jpg" width="141" height="141" border="0" /></td>
                    <td align="left" valign="top"><strong class="album_heading">Name: Shekhar Mehta</strong><br />
                             RI District: 3291<br />Email: ridshekhar@gmail.com</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><img src="trust/Kamal Sanghvi.JPG" width="141" height="141" border="0" /></td>
                    <td align="left" valign="top"><strong class="album_heading">Name: Kamal Sanghvi</strong><br />
                            RI District: 3250<br />Email: kamalsanghvi@hotmail.com</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><img src="trust/Ravi Vadlamani.jpg" width="141" height="141" border="0" /></td>
                    <td align="left" valign="top"><strong class="album_heading">Name: Ravi Vadlamani</strong><br />
                      RI District: 3150<br />Email: dg3150@rediffmail.com
						</td>
                  </tr>
                </table></td>
              </tr>
               <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><img src="trust/Dr Mahesh Kotbagi.JPG" width="141" height="141" border="0" /></td>
                    <td align="left" valign="top"><strong class="album_heading">Name: Mahesh Kotbagi</strong><br />
                       RI District: 3131<br />Email: mahesh@kotbagihospital.org</td>
                  </tr>
                </table></td>
              </tr>
			  <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><img src="trust/Dr Manoj Desai.jpg" width="141" height="141" border="0" /></td>
                    <td align="left" valign="top"><strong class="album_heading">Name: Manoj Desai</strong><br />
                        RI District: 3060<br />Email: pdgmanoj@yahoo.com</td>
                  </tr>
                </table></td>
              </tr>
			  <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><img src="trust/Gulam Vahanvaty.JPG" width="141" height="141" border="0" /></td>
                    <td align="left" valign="top"><strong class="album_heading">Name: Gulam A Vahanvaty</strong><br />
                      RI District:3140<br />Email: gulamv@vsnl.com</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
  </tr>
  <?php	 	 include("includes/footer.php"); ?>
</table>
</body>
</html>