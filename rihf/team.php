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
<script language="javascript"> 
function toggle(id) 
{
 var i;
 for(i=1;i<5;i++)
 {
   if(i==id)
   {
     if(document.getElementById(i).style.display == "none")
	 {
      document.getElementById(i).style.display = "block";
	  }
	  else
	  {
	   document.getElementById(i).style.display = "none";
	  }
   }
   else
   {
    document.getElementById(i).style.display = "none";
   }
 }

} 
</script>	
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
             <?php include("includes/left-menu.php"); ?>
          </tr>
          <tr>
            <td height="24" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top" style="padding:0px"><a href="donate.php"><img src="images/donate.jpg"/></a>
				
				</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">OUR</span> <span class="heading2">TEAM</span></td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><a href="javascript:toggle(4);"><img src="team/Sushmita Dasgupta pic.jpg" width="141" height="141" border="0" /></a></td>
                    <td align="left" valign="top"><strong class="album_heading">Sushmita Dasgupta</strong><br />
					Designation: Sr Program Manager<br />Email: sushmita.dasgupta@rihf.org<br /><br />
					<div id="4" style="display: none">Sushmita Dasgupta has worked in the development sector for the last 10 years. A post-graduate in
English Literature from Jadavpur University, she moved from the Corporate sector to Action Aid, Asia,
where she worked in the anti-trafficking unit, in Delhi and China. Thereafter, she worked in the areas of
child education and HIV AIDS in Delhi and Kolkata. In RIHF since January 2011, she looks after the <a href="http://rihf.org/content.php?type=SavingLittleHearts" style="text-decoration:none;">Saving
Little Hearts</a> and <a href="http://rihf.org/content.php?type=MissionVision" style="text-decoration:none;" >Mission Vision</a> projects. Her targets are 3 surgeries a day, for needy children with
Congenital Heart Disease, and setting up of 10 eye hospitals in 2012.</div>
						</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><a href="javascript:toggle(1);"><img src="team/Preeta pic.jpg" width="141" height="141" border="0" /></a></td>
                    <td align="left" valign="top"><strong class="album_heading">Preeta Ghoshal</strong><br />
					          Designation: Sr Program Manager<br />Email: preeta.ghoshal@rihf.org<br /><br />
							  <div id="1" style="display: none">Preeta Ghoshal completed her Bachelors in English from St Xavier’s College, Calcutta University following which she graduated from Cardiff University with a Master’s degree in International
Journalism. Since then she has worked in both print and electronic media in editorial roles. She also
had a brief stint working in film production. Having done voluntary teaching work for underprivileged
children in the past she was always interested in working in the development sector and that is what
led her to join Rotary India Humanity Foundation (RIHF), where she currently works as a Senior Program
Manager and looks after the projects <a href="http://rihf.org/content.php?type=ShayamSaheliCentres" style=" text-decoration:none;">Swayam & Saheli Centres</a> , <a href="http://rihf.org/content.php?type=ShelterKit" style="text-decoration:none;">Shelter Kit</a> and Communication.</div>
                      </td>
                  </tr>
                </table></td>
              </tr>
			  <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><a href="javascript:toggle(3);"><img src="team/Sunayana pic.jpg" width="141" height="141" border="0" /></a></td>
                    <td align="left" valign="top"><strong class="album_heading">Sunayana Sen</strong><br />
					Designation: Program Manager<br />Email: sunayana.sen@rihf.org<br /><br />
					<div id="3" style="display: none">Sunayana Sen graduated from the University of Calcutta with a Master's degree in International
Human Rights, after completing a Bachelors programme in Psychology from Sophia College, Mumbai.
Motivated by her interest in the development sector, she interned and worked with several NGOs across
the country before joining Rotary India Humanity Foundation (RIHF) as Program Manager. At RIHF,
Sunayana is involved in 'Communication' and <a href="http://rihf.org/content.php?type=ProjectGreenMagic" style="text-decoration:none;">Project Green Magic</a>.</div>
					</td>
                  </tr>
                </table></td>
              </tr>
			  <tr>
                <td align="left" valign="top" class="inner_bot"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                  <tr>
                    <td width="141" align="left" valign="top" class="album_pic"><a href="javascript:toggle(2);"><img src="team/Subhabrata pic.jpg" width="141" height="141" border="0" /></a></td>
                    <td align="left" valign="top"><strong class="album_heading">Subhabrata Dasgupta</strong><br />
					          Designation: Program Manager<br />Email: s.dasgupta@rihf.org<br /><br />
							  <div id="2" style="display: none">Subhabrata Dasgupta is a science graduate and post graduate in HR. He has worked for more than 21
years in the field of HR, Personnel, Administration, Welfare and Industrial Relations in various sectors.
Having a proven track record of extensive interaction with people from different walks of life, he
responded to his heart's desire to do something tangible for society and joined Rotary India Humanity
Foundation recently. He looks after <a href="http://rihf.org/content.php?type=ProjectGreenMagic" style="text-decoration:none;">Project Green Magic</a> and <a href="http://rihf.org/content.php?type=ProjectDignity" style="text-decoration:none;">Project Dignity</a>.</div>
                      </td>
                  </tr>
                </table></td>
              </tr>
              
              
            </table></td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
  </tr>
  <?php	 include("includes/footer.php"); ?>
</table>
</body>
</html>