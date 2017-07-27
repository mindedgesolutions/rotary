<?php
include("connection.php");

$district = $_GET["district"];

$query = "SELECT id, district, DG, DLCC, PDG, if(nobookcommited=0,'',nobookcommited) as nobookcommited,  if(volunteercommited=0,'',volunteercommited) as volunteercommited,if(educatechild=0,'',educatechild) as educatechild,if(vocationalcenter=0,'',vocationalcenter) as vocationalcenter,if(adopthighschool=0,'',adopthighschool) as adopthighschool,if(urbanadultliteracy=0,'',urbanadultliteracy) as urbanadultliteracy,if(educateilliterates=0,'',educateilliterates) as educateilliterates ,if(elearningcenter=0,'',elearningcenter) as elearningcenter FROM districttracker WHERE district='".$district."';";

$query = $query."SELECT district ,sum(NoOfbook) as noofbookcllected FROM `book` WHERE district='".$district."' group by district;";

$query = $query."SELECT rotaryDistrict as district ,count(id) as noofvolunteers FROM `registration`  WHERE rotaryDistrict='".$district."' and deleted=0 group by rotaryDistrict;";

	$arr=null;
	$cnt=-1;
	$arrcnt=-1;
	$assoc=array("DTInfo","bookInfo","volunteerInfo");

		if(mysqli_multi_query($link,$query))
		{
			do
			{
				if($result=mysqli_use_result($link))
				{
					$cnt=-1;	
					$arrcnt=$arrcnt+1;
					while($row=mysqli_fetch_assoc($result))
					{
						$cnt=$cnt+1;
						$arr[$assoc[$arrcnt]][$cnt]=$row;
					}
					
					mysqli_free_result($result);
				}
					
			}while (mysqli_more_results($link) && mysqli_next_result($link));

		}
		



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<link href="button/style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>

<script type="text/javascript">


function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});


	
	

</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body>
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
         <?php include("menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
          <?php /*?><?php include("header_area.html");?><?php */?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="images/h_top_l.png" /></td>
                <td style="background:url(images/h_top.png)"></td>
                <td width="8"><img src="images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                    
                    
                        <tr>
                            <td width="650" valign="top">
                                <h1>Project Tracker - District Details</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                 				
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:25px; margin-top:5px">
                                    <tr>
                                        <td width="33%">
                                            <a href="districtTrackerlogin.php" style="color:#ffffff; text-decoration:none" title="">
                                            	<div style="font-size:12px; background:#FF0000; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #43a40e, #2f8004); font-family:Arial, Helvetica, sans-serif; text-align:center">UPLOAD COMMITMENTS</div>
                                            </a>
                                        </td>
                                        <td width="1%"></td>
                                        <td width="32%">
                                            <a href="viewdistricttrackerzonewise.php" style="color:#ffffff; text-decoration:none" title="">
                                            	<div style="font-size:12px; background:#FF0000; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #ff0000, #d70000); font-family:Arial, Helvetica, sans-serif; text-align:center">VIEW DATA ZONE WISE</div>
                                            </a>
                                        </td>
                                        <td width="1%"></td>
                                        <td width="33%">
                                            <a href="viewdistrictTracker1.php" style="color:#ffffff; text-decoration:none" title="">
                                            	<div style="font-size:12px; background:#FF0000; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #ff0000, #d70000); font-family:Arial, Helvetica, sans-serif; text-align:center">VIEW DATA DISTRICT WISE</div>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                
                                <div id="showdetail">
                            		<div style='padding:0 0 0 15px; text-align:center; line-height:18px'>
									<!--<img src='dgpics/<?php //echo $arr["DTInfo"][0]["district"]."DG.jpg"; ?>' width='100' style='border:1px solid #999999; padding:1px; margin-bottom:9px' /><br><br />-->
									</div>	
									<div style="padding:0; margin:15px 0 0 0"> 
<fieldset style="border:1px solid #999999; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0 10px 0 10px; margin-top:10px">
	<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;DISTRICT&nbsp;&nbsp;</legend>
    <p style="padding:0 10px 10px 10px; margin:0">
    	
<table width="100%" border="0" cellspacing="0" cellpadding="5" style="text-align:left; font-family:Verdana, Arial, Helvetica, sans-serif; color:#333333">
<tr>
<td width="42%"><strong>District</strong></td>
<td width="2%"><strong>:</strong></td>
<td width="56%"><?php echo $arr["DTInfo"][0]["district"];?></td>
</tr>
<tr>
<td><strong>District Governer</strong></td>
<td><strong>:</strong></td>
<td><?php echo $arr["DTInfo"][0]["DG"];?></td>
</tr>
<tr>
<td><strong>District Literacy Committee Chairman</strong></td>
<td><strong>:</strong></td>
<td><?php echo $arr["DTInfo"][0]["DLCC"];?></td>
</tr>
<tr>
<td><strong>Zonal Literacy Co-ordinator</strong></td>
<td><strong>:</strong></td>
<td><?php echo $arr["DTInfo"][0]["PDG"];?></td>
</tr>
</table>
        
    </p>
</fieldset>   

<br />

<style>
.hed {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
</style>

<table width="100%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="7" align="center" style="border-collapse:collapse; text-align:left; font-family:Arial, Helvetica, sans-serif">
<tr class="hed">
<td style="font-weight:bold; text-align: left; color:#0066CC">Projects</td>
<td style="font-weight:bold; text-align:center; color:#0066CC">Commitments</td>
<td style="font-weight:bold; text-align:center; color:#0066CC">Achievements</td>
</tr>
<tr>
  <td><strong>No. of Books</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["nobookcommited"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><a href="bookdetailrecord.php?district=<?php echo $arr["DTInfo"][0]["district"] ?>"><?php echo $arr["bookInfo"][0]["noofbookcllected"];?></a></span></td>
</tr>
<tr>
  <td><strong>No. of Volunteers</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["volunteercommited"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><a href="volunteerdetailrecord.php?district=<?php echo $arr["DTInfo"][0]["district"]; ?>"><?php echo $arr["volunteerInfo"][0]["noofvolunteers"];?></a></span></td>
</tr>
<tr>
  <td><strong>No. of Children at Risk to be Educated</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["educatechild"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px">
    <?php //echo $arr["bookInfo"][0]["noofbookcllected"];?>
  </span></td>
</tr>
<tr>
  <td><strong>No. of Vocational Centers to be started</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["vocationalcenter"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px">
    <?php //echo $arr["volunteerInfo"][0]["noofvolunteers"];?>
  </span></td>
</tr>
<tr>
  <td><strong>No. of Adoption of Happy Schools</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["adopthighschool"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px">
    <?php //echo $arr["bookInfo"][0]["noofbookcllected"];?>
  </span></td>
</tr>
<tr>
  <td><strong>No. of Urban Adult Literacy Centers to be started</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["urbanadultliteracy"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px">
    <?php //echo $arr["volunteerInfo"][0]["noofvolunteers"];?>
  </span></td>
</tr>
<tr>
  <td><strong>No. of Adult Illiterates (Urban and Rural) to be Educated</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["educateilliterates"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px">
    <?php // echo $arr["volunteerInfo"][0]["noofvolunteers"];?>
  </span></td>
</tr>
<tr>
  <td><strong>No. of E-learning Centers to be started</strong></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#fffff1"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px"><?php echo $arr["DTInfo"][0]["elearningcenter"];?></span></td>
  <td style="font-weight:bold; color:#990000; font-style:italic; font-size:12px; text-align:center; background:#f1f9ff"><span style="font-family:'Courier New', Courier, monospace; font-weight:bold; color:#CC0000; font-size:14px">
    <?php //echo $arr["bookInfo"][0]["noofbookcllected"];?>
  </span></td>
</tr>
</table>

								  </div>	
                                </div>
                            </td>
                            <!--<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php /*?><?php include("inner_right.html");?><?php */?>
                            </td>-->
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
                     <?php include("footer_area.html");?>
					
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="images/h_bottom_l.png" /></td>
                <td style="background:url(images/h_bottom.png)"></td>
                <td width="8"><img src="images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>

<script type="text/javascript">






	Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});
</script>


</body>
</html>






