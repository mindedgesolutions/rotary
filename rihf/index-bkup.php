<?php
session_start();
include("admin/includes/connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
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
		<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/easySlider1.5.js"></script>
<script type="text/javascript">
$(document).ready(function(){	
			$("#slider2").easySlider({
				controlsBefore:	'<p id="controls2">',
				controlsAfter:	'</p>',	
				auto:true,
				continuous:true,
				prevId: 'prevBtn2',
				nextId: 'nextBtn2'	
			});			
		});	
	</script>
	<style type="text/css">
	/* Easy Slider */
	#container{	
		margin:0 auto;
		position:relative;
		text-align:left;
		width:470px;
		background:#fff;		
		margin-bottom:2em;
		}	
#content{
		position:relative;
		}			

	#slider{}	
	#slider ul, #slider li, #slider2 ul, #slider2 li{
		margin:0;
		padding:0;
		list-style:none;
		}
	#slider li, #slider2 li{ 
		/* 
			define width and height of list item (slide)
			entire slider area will adjust according to the parameters provided here
		*/ 
		width:470px;
		height:241px;
		overflow:hidden; 
		}	

	#slider2 li{ 
		background:#f1f1f1;
		}		
	#slider2 li h2{ 
		margin:0 20px;
		padding-top:20px;
		}	
	#slider2 li p{ 
		margin:20px;
		}						
		
	p#controls, p#controls2{
		margin:0;
		position:relative;
		} 
	
	#prevBtn, #nextBtn, #prevBtn2, #nextBtn2{ 
		display:block;
		margin:0;
		overflow:hidden;
		text-indent:-8000px;		
		width:30px;
		height:77px;
		position:absolute;
		left:-30px;
		top:-160px;
		}	
	#nextBtn, #nextBtn2{ 
		left:470px;
		}														
	#prevBtn a, #nextBtn a, #prevBtn2 a, #nextBtn2 a{  
		display:block;
		width:30px;
		height:77px;
		background:url(images/btn_prev.gif) no-repeat 0 0;	
		}	
	#nextBtn a, #nextBtn2 a{ 
		background:url(images/btn_next.gif)no-repeat 0 0;	
		}												
.photo-meta-data1							{ background:url(images/transpBlack.png); padding: 10px; height: auto; 
											  margin-top: -0px;  z-index: 10000; color: white; width:452px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#000000; text-shadow:1px 1px 0px #fff; text-align:left; }

/* // Easy Slider */
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
            <td align="left" valign="top"><span class="heading1">Rotary</span> <span class="heading2">International</span> has been engaged in Humanitarian Service over the past 105 years. In India too, Rotarians through their Rotary Clubs, have made a difference in the lives of hundreds of thousands of people year after year. Rotary India Humanity Foundation was launched to further the reach of humanitarian activities in India, providing relief and succour to the Common Man. <a href="#" class="read_more">Read more</a></td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle">
			<div id="container">
			<div id="content">
				<div id="slider2">
				
			<ul>
			<?php $query=mysql_query("select * from rihf_news_content order by updtime"); 
			while($res=mysql_fetch_array($query))
			{
			?>				
				<li>
				<a href="news.php" style="text-decoration:none;">
				<table><tr><td><span class="photo-meta-data1"><?php echo $res['text_heading']; ?></span></td></tr>
				<tr><td><img src="<?php echo "uploads/news/".$res['text_details']; ?>" width="200" height="100" /></td></tr>
					<tr><td><p><?php echo substr($res['text_dscription'],0,200); ?></p><td></td>
					</table>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		</div>		
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
