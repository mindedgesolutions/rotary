<?php
include("connection.php");

$query = "SELECT id,concat(firstname,' ',ifnull(midname,''),' ',ifnull(lastname,'')) as name,`type`,city,date_format(submitted,'%d-%m-%Y') as regisdt FROM `registration` where rotaryDistrict not in (SELECT distinct district FROM districttracker) and deleted=0 ORDER BY `type` asc,id asc;";

$query = $query."SELECT count(id) as totalothervolunteer FROM `registration` where rotaryDistrict not in (SELECT distinct district FROM districttracker) and deleted=0";
	$arr=null;
	$cnt=-1;
	$arrcnt=-1;
	$assoc=array("volunteerInfo","volunteerCnt");

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
          <?php include("header_area.html");?>
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
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Progress Tracker - Club Wise 
										  Volunteers Registered</h1>
                                        </td>
                                        
                                  </tr>
                                </table>
                                
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                
								<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px; margin-top:10px">
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
                       
                                <div id="showdetail" style="margin-top:20px">
                               <table width="100%" cellpadding="5" cellspacing="0" align="center" border="1" bordercolor="#CCCCCC" style="text-align: center; font-family:arial; font-size:12px; background:#ffffff; border-collapse:collapse" class="link">

                                  	<tr>
                                    	<td width="9%" style="background:#f5f5f5; font-weight:bold; text-align:center; width:12%">Id</td>
                                   	  <td width="18%" style="background:#f5f5f5; font-weight:bold; text-align:center; width:22%">Name</td>
                                   	  <td width="18%" style="background:#f5f5f5; font-weight:bold; text-align:center; width:22%">Volunteer type</td>
									  <td width="20%" style="background:#f5f5f5; font-weight:bold; text-align:center; width:22%">City</td>
										<td style="background:#f5f5f5; font-weight:bold; text-align:center; width:22%">Date</td>
                               	 </tr>


                                <?php foreach($arr["volunteerInfo"] as $record)  { ?>
									<tr>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">
                                        	<?php echo $record["id"]; ?>
                                        </td>
                                    	
                                    	<td style="font-weight:bold"><?php echo $record["name"]; ?>
                                        </td>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold;  background:#fffff1">
											<?php echo $record["type"]; ?>
                                        </td>
                               
										<td style="font-weight:bold">
											<?php echo $record["city"]; ?>
                                        </td>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">
											<?php echo $record["regisdt"]; ?>
                                        </td>
                                	</tr>
                                <?php } ?>
								
									<tr>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">Total</td>
                                    	
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99"><?php echo $arr["volunteerCnt"][0]["totalothervolunteer"]; ?>
                                        </td>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold;  background:#fffff1">&nbsp;</td>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
										<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold;  background:#fffff1">&nbsp;</td>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
                                	</tr>
                                </table>
                                </div>
                            </td>
                            <td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            <?php include("inner_right.html");?>
                            </td>
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







