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
				</ul></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">SHELter</span> <span class="heading2">Kit</span></td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top"><a name="top"></a>&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" valign="top"><div align="left" style="border:3px solid #fff; -webkit-box-shadow: #B3B3B3 0px 0px 10px;-moz-box-shadow: #B3B3B3 0px 0px 10px; box-shadow: #B3B3B3 0px 0px 10px; width:472px; height:243px;"><img src="images/bottom_slider.jpg" width="472" height="243" /></div></td>
                  <td width="210" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left" valign="middle"><a href="#1" class="left_menu">Introduction</a></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><a href="#2" class="left_menu">Brief History</a></td>
                    </tr>

                    <tr>
                      <td align="left" valign="middle"><a href="#3" class="left_menu">Contents</a></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><a href="#4" class="left_menu">Distribution</a></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><a href="#5" class="left_menu">Future Plan</a></td>
                    </tr>
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
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top" class="text">
<span class="heading3"><a name="1"></a>INTRODUCTION</span><br />RIHF’s relationship with disaster management began after the tsunami of 2005 with a simple text message by PDG Shekhar Mehta to about 500 contacts on his cell phone. The overwhelming response to this seemingly ordinary message were 40 tonnes of relief material donated by various Rotary Clubs and individual donors that was soon dispatched to the ravaged Andaman and Nicobar Islands.The relief and rehabilitation work to help the unfortunate tsunami victims was followed by further aid work in earthquake-hit Jammu and Kashmir and it was around this time that the idea of assembling composite shelter boxes was first conceptualized.The floods in Bihar that displaced an estimated 2.5 million people, was when these composite Shelter Kits were distributed by RIHF.The kits or boxes contain a range of utility products for people who have lost everything and have to build their lives afresh.</td>
                    <td width="50" align="right" valign="bottom"><a href="#top" class="read_more">Top</a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top" class="text"><span class="heading3"><a name="2"></a>BRIEF HISTORY</span><br />
                      Shelter boxes were earlier imported from England. During the Kashmir earthquake, 70 such boxes had been flown in to Srinagar from the United Kingdom. These unique boxes contain an all-season tent large enough to accommodate ten people. The boxes also contain sleeping bags, water cans, water purifiers, and a cooking stove among other utility goods. These 70 kits were equipped to accommodate 700 people for over a month during which time their houses could be rebuilt.The cost of a single shelter box imported from England was $1100. During the Bihar floods however, RIHF assembled similar such kits using locally sourced materials for a much subsidized price of $100. Encouraged by the assistance shelter kits have provided to disaster victims, we have decided to make Shelter Kits a permanent programme of our organization. Around 500 shelter kits will be stocked across India at all times, so that when disaster strikes, the kits can be sent to the affected areas within 48 hours of the calamity. Our aim is to help disaster victims not just in India but also in Pakistan, Sri Lanka, Bangladesh, Bhutan, Nepal, Myanmar and other neighboring countries.</td>
                    <td width="50" align="right" valign="bottom"><a href="#top" class="read_more">Top</a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top" class="text"><span class="heading3"><a name="3"></a>CONTENTS</span><br /><br />
                     <ul><li>A trunk to act as container for all materials</li><li>2 pcs tarpaulin- 1 as floor cover &amp; another as roof cover</li><li>4 blankets and 4 sheets of linen</li><li>4 stainless steel plates and 4 stainless steel glasses</li><li>1 kerosene stove and 1 lantern</li><li>1 jerrycan for water and 1 jerrycan for kerosene</li><li>3 cooking utensils with 3 serving spoons</li><li>500 chlorine tablets</li><li>1 bucket and 1 mug</li><li>2 sets of clothes for men and women</li><li>Candles, match boxes</li><li>Soap and tooth powder</li><li>1 mosquito net</li></ul><div>Over 2000 Shelter kits have been distributed across India. Whether it was in flood-ravaged Bihar or in Kashmir crumbling under a devastating earthquake, RIHF has been providing relief to thousands of disaster victims, helping them to restart their lives.<br /><br><center><b>Distribution Of Shelter Kits Across India</b><br /><br /><img src="images/map.jpg"></center></td>
                    <td width="50" align="right" valign="bottom"><a href="#top" class="read_more">Top</a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top" class="text"><span class="heading3"><a name="4"></a>DISTRIBUTION</span><br />
                      90 Shelter Kits sents to Sikkim Earthquake Victims    
                      2012-05-19	
                      September 18, 2011 was a perfect day gone wrong. A massive earthquake measuring 6.9 on the Richter scale hit India, Bangladesh, Bhutan, Nepal and south-Tibet. The worst-hit region was Sikkim in northeast India. An estimated 100 people are said to have been killed in the earthquake while thousands of others were left homeless. </td>
                    <td width="50" align="right" valign="bottom"><a href="#top" class="read_more">Top</a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top" class="text"><span class="heading3"><a name="5"></a>FUTURE PALN</span><br />
                      90 Shelter Kits sents to Sikkim Earthquake Victims    
                      2012-05-19	
                      September 18, 2011 was a perfect day gone wrong. A massive earthquake measuring 6.9 on the Richter scale hit India, Bangladesh, Bhutan, Nepal and south-Tibet. The worst-hit region was Sikkim in northeast India. An estimated 100 people are said to have been killed in the earthquake while thousands of others were left homeless. </td>
                    <td width="50" align="right" valign="bottom"><a href="#top" class="read_more">Top</a></td>
                  </tr>
                </table></td>
              </tr>
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
