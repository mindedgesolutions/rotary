<?php 
session_start();
include("admin/includes/connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary India Humanity Foundation</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
	<!--<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	<script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/lightbox.js"></script>
-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
function showlight_box(id)
{  
      
		document.getElementById('imageId').innerHTML=id;
		document.getElementById('lightbox').style.height=document.body.clientHeight+'px';
		document.getElementById('lightbox').style.width=document.body.clientWidth+'px';
		
		
}
//$.noConflict();
  jQuery(document).ready(function($) {
  
  
	 jQuery.fn.center = function () {
	   this.css("position","absolute");
	   this.css("top", (($(window).height() - this.outerHeight()) / 2) + 
												   $(window).scrollTop() + "px");
	   this.css("left", (($(window).width() - this.outerWidth()) / 2) + 
												   $(window).scrollLeft() + "px");
	   return this;
	}
	
	$(document).ready(function(){
		$("a#show-panel").click(function(){
		
		
         

			$("#lightbox-panel").center();
			$("#lightbox, #lightbox-panel").fadeIn(600);
			$("#lightbox").css({opacity:.7});
		})
		$("a#close-panel").click(function(){
			$("#lightbox, #lightbox-panel").fadeOut(600);
		})
		$("a#close_div").click(function(){
			$("#lightbox, #lightbox-panel").fadeOut(600);
		})
	})
 });
</script>

<style>

#lightbox {
			
display:none;
background:#000000;
-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=75)";
filter:alpha(opacity=75);
opacity:0.75;
position:absolute;
top:0px;
left:0px;
min-width:100%;
min-height:100%;
z-index:1000;
 	}

#lightbox-panel {
			
background: none repeat scroll 0 0 #FFFFFF;
display: none;
/*left: 50%;
top: 215px;
margin-left: -425px;*/
padding: 10px 15px;
position: absolute;
width: 277px;
height:272px;
z-index: 1001;
-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;
-webkit-box-shadow: #000 0px 0px 5px;-moz-box-shadow: #000 0px 0px 5px; box-shadow: #000 0px 0px 5px;

}

.caption  {
			
font-size:12px;
color:#666666;
font-weight:600;
float:left;
pad
}
#close-panel{

/*color : #000000;
text-decoration : none;
*/float:right;
background-image:url(images/close.gif);
background-repeat:no-repeat;
height:22px; width:22px;
margin-top:-25px;
margin-right:-25px;

}


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
              <tr>
                <td height="26" align="right" valign="middle" background="images/slaider_top.jpg" style="background-repeat:no-repeat"><table width="50%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="71%" align="right" valign="middle" style="padding:0px 5px;" class="link1"><a href="#">Login</a> | <a href="#">Register</a></td>
                    <td width="3%" align="right" valign="middle" style="padding:0px 5px;"><a href="#"><img src="images/in.jpg" width="20" height="21" border="0" /></a></td>
                    <td width="8%" align="right" valign="middle" style="padding:0px 5px;"><a href="#"><img src="images/twitter.jpg" width="20" height="21" border="0" /></a></td>
                    <td width="8%" align="right" valign="middle" style="padding:0px 5px;"><a href="#"><img src="images/rss_feed.jpg" width="20" height="21" border="0" /></a></td>
                    <td width="10%" align="right" valign="middle" style="padding-right:10px; padding-left:5px;"><a href="#"><img src="images/stumble_upon.jpg" width="20" height="21" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top"><img src="images/top_slider.jpg" width="726" height="271" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="48" align="left" valign="middle" bgcolor="#36342e" style="padding:2px 0px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="middle"><a class="top_nav" href="#">Saving Little <br />Hearts</a></td>
            <td width="2" align="left" valign="middle"><img src="images/spacer.gif" width="2" height="1" /></td>
            <td align="left" valign="middle"><a href="#" class="top_nav">Mission<br />Vision</a></td>
            <td width="2" align="left" valign="middle"><img src="images/spacer.gif" width="2" height="1" /></td>
            <td align="left" valign="middle"><a href="#" class="top_nav">Project<br />Green Magic</a></td>
            <td width="2" align="left" valign="middle"><img src="images/spacer.gif" width="2" height="1" /></td>
            <td align="left" valign="middle"><a href="#" class="top_nav">Project<br />DIGNITY</a></td>
            <td width="2" align="left" valign="middle"><img src="images/spacer.gif" width="2" height="1" /></td>
            <td align="left" valign="middle"><a href="#" class="top_nav">SHAYAM & <br />SAHELI CENTRES</a></td>
            <td width="2" align="left" valign="middle"><img src="images/spacer.gif" width="2" height="1" /></td>
            <td align="left" valign="middle"><a href="#" class="top_nav">SHELTER<br />Kit</a></td>
            <td width="2" align="left" valign="middle"><img src="images/spacer.gif" width="2" height="1" /></td>
            <td align="left" valign="middle"><a href="#" class="top_nav">OTHER<br />PROJECTS</a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="382" align="left" valign="top" bgcolor="#FFFFFF" style="padding-top:50px; padding-left:12px; padding-right:12px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="210" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="middle"><a href="./" class="left_menu">Home</a></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><a href="#" class="left_menu">About Us</a></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="39" align="left" valign="middle"><img src="images/spacer.gif" width="39" height="1" /></td>
                    <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" valign="middle"><a href="#" class="left_menu2">Our Team</a></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle"><a href="#" class="left_menu2">BOARD OF TRUSTECS</a></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><a href="#" class="left_menu">Donate</a></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><a href="#" class="left_menu">Volunteer</a></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><a href="gallery.php" class="left_menu">Gallery</a></td>
              </tr>
            </table></td>
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
                <td align="center" valign="top" style="padding:10px"><img src="images/friend_of_rihf.jpg" width="189" height="141" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">SAVING LITTLE HEARTS</span></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="gallery_pic">
			<?php $query=mysql_query("select * from multi_image where album_id='".$_REQUEST['id']."'"); 
			  while($res=mysql_fetch_array($query))
			  {
			?>
			<a href="javascript:" id="show-panel" onclick="showlight_box(<?php echo $res['image_id']; ?>);" ><img src="party/<?php echo $res['slate_image']; ?>" width="141" height="141" /></a>
			<?php } ?>
			</td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="61" align="left" valign="middle" background="images/footer_bg.jpg" style="background-repeat:no-repeat; padding-left:9px; padding-right:15px;"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td width="50%" align="left" valign="middle" class="footer"><a href="#">Contact Us</a> | <a href="#">Sitemap</a> | <a href="#">Careers</a> | <a href="#">Blog</a> | <a href="#">Pressroom</a></td>
        <td width="50%" align="right" valign="middle">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<!--Lightbox login panel-->
<div style="display:none;" id="lightbox-panel">
<a id="close-panel" href="javascript:"></a>
<div id="imageId" style="display:none;"></div> 
<?php preg_match('/\<div id\=[\"]{0,1}ad_content[\"]{0,1}\>(.*?)\<\/div\>/s', $content['imageId'], $matches);
    $content['imageId'] = $matches[1];
	echo $matches[1];
	 ?>
     
	</div>
			         
<!-- /panel -->
<a id="close_div" href="javascript:"><div style="display: none;" id="lightbox"></div>
</a>

<!--End lightbox login panel	-->

</body>
</html>
