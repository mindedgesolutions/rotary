<?php
include("connection.php");

$query = "SELECT id, district, DG, DLCC, PDG, if(nobookcommited=0,'',nobookcommited) as nobookcommited,  if(volunteercommited=0,'',volunteercommited) as volunteercommited, if(educatechild=0,'',educatechild) as educatechild,if(vocationalcenter=0,'',vocationalcenter) as vocationalcenter,if(adopthighschool=0,'',adopthighschool) as adopthighschool,if(urbanadultliteracy=0,'',urbanadultliteracy) as urbanadultliteracy,if(educateilliterates=0,'',educateilliterates) as educateilliterates ,if(elearningcenter=0,'',elearningcenter) as elearningcenter FROM districttracker;"; 


$query = $query."SELECT district ,sum(NoOfbook) as noofbookcllected FROM `book` group by district;";

$query = $query."SELECT rotaryDistrict as district ,count(id) as noofvolunteers FROM `registration` where deleted=0  group by rotaryDistrict;";

$query = $query."SELECT count(id) as totalothervolunteer FROM `registration` where rotaryDistrict not in (SELECT distinct district FROM districttracker) and deleted=0";
//$query = $query."SELECT `type` as rotariantype,count(id) as totalvolunteer FROM `registration`  where `type`<>'' and `type`<>'Rotarian'  and deleted=0 group by `type`;";

	$arr=null;
	$cnt=-1;
	$arrcnt=-1;
	$assoc=array("DTInfo","bookInfo","volunteerInfo","volunteertype");

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
		
$bookarr = array();
$volunteerarr = array();
$volunteerexpectarr = array();

for($i=0; $i<count($arr["DTInfo"]); $i++) {
	$volunteerexpectarr[] = $arr["DTInfo"][$i]["volunteercommited"];

	for($j=0; $j<count($arr["bookInfo"]); $j++) {
		if(	$arr["DTInfo"][$i]["district"]==$arr["bookInfo"][$j]["district"]) {
		$bookarr[$arr["DTInfo"][$i]["district"]] = $arr["bookInfo"][$j]["noofbookcllected"];
		}
	}
	for($k=0; $k<count($arr["volunteerInfo"]); $k++) {
		if($arr["DTInfo"][$i]["district"]==$arr["volunteerInfo"][$k]["district"]) {
		$volunteerarr[$arr["DTInfo"][$i]["district"]] = $arr["volunteerInfo"][$k]["noofvolunteers"];
		}
	}
	
}

$totalbook = array_sum($bookarr);
/*$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
	}
}*/

//print_r($volunteerexpectarr);

//print_r($bookarr["2980"]);

// print_r($arr["volunteertype"]);
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

<style>
.hed {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
.auto-style1 {
	text-decoration: underline;
}
.auto-style2 {
	color: #FF0000;
}
</style>

</head>

<body onload="districtlist();">
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
                                        <td align="left" style="width: 42%">
                                       	  <h1 style="padding:0; margin:0">Progress Tracker - District Wise</h1>
                                        </td>
                                        <td width="29%" align="right">
                                            <a href="districtTrackerlogin.php" style="color:#ffffff; text-decoration:none" title="">
<div style="float:right; font-size:12px; background:#43a40e; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #43a40e, #2f8004); margin-right:5px; font-family:Arial, Helvetica, sans-serif">
                                                    UPLOAD DISTRICT GOALS
                                                </div>
                                          </a>
                                      </td>
                                        <td width="25%" align="right">
                                            <a href="viewdistricttrackerzonewise.php" style="color:#ffffff; text-decoration:none" title="">
<div style="float:right; font-size:12px; background:#FF0000; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #ff0000, #d70000); font-family:Arial, Helvetica, sans-serif">
                                                    VIEW DATA ZONE WISE
                                                </div>
                                          </a>
                                      </td>
                                  </tr>
                                </table>
                                
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                
								<div style="margin:15px 0 10px 0; line-height:18px; color:#000000; font-family:Arial, Helvetica, sans-serif; text-align:justify">
                                	You can view District Wise Project Goals and Achievements here.
                                    <br />
                                    <br />
                                    Click "Upload District Goals" to upload project 
									district goals for your Zone / District.
                                	<br><br><span class="auto-style2">
                                    <u><strong>Click on a District</strong></u><strong> to know details of 
									Expectations/Achievements for each District.
                                    <br></strong>
                                    <u><strong>Click on </strong></u> 
									<span class="auto-style1"><strong>the No of 
									Books Collected / No of Volunteers 
									Registered</strong></span><strong> 
									against any District to view Clubwise 
									collection / registration data.</strong></span></div>
                  <!--  <div style="margin:10px">
                   		<strong> District : </strong>
                   		<select id="cbodistrict" name="cbodistrict" onchange="getassocdesig(this.value)" >
                     		 <option value="">Select</option>
                        </select>
                    </div> -->       
                                <div id="showdetail" style="margin-top:20px">
                               <table width="100%" cellpadding="5" cellspacing="0" align="center" border="1" bordercolor="#CCCCCC" style="text-align: center; font-family:arial; font-size:12px; background:#ffffff; border-collapse:collapse" class="link">

                                  	<tr class="hed">
                                    	<td width="13%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">District</td>
                                    	<!--<td width="22%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of<br />Books Committed</td>-->
                                    	<td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of<br />Books Collected</td>
                                    	<!--<td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of<br />Volunteers Expected(Goal)</td>-->
                                    	<td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of<br />Volunteers Registered</td>
									    <td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">Identification of No. of Children at RISK (<em>Expected</em>)</td>
									    <td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">Identification of No. of Children at RISK (<em>Achieved</em>)</td>
									    <td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of Vocational Centres to be started (<em>Expected</em>)</td>
									    <td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of Vocational Centres to be started (<em>Achieved</em>)</td>
									    <td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of Happy Schools<br />to be Adopted (<em>Expected</em>)</td>
									    <td width="29%" style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of Happy Schools Adopted (<em>Achieved</em>)</td>
								      <!--	<td style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of Adoption for happy schools</td>
										<td style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of urban adult literacy centers Start</td>
										<td style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">Educate No. of adult illiterates (urban and rural)</td>
										<td style="font-weight:bold; text-align:center; color:#0066CC; border-bottom:1px solid#99abb1">No. of e-learning centers start</td>-->
                                	</tr>

                                <?php foreach($arr["DTInfo"] as $record)  { ?>
									<tr>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">
                                        	<a href="viewdistrictTrackerDetail.php?district=<?php echo $record["district"]; ?>" style="color:maroon"><?php echo $record["district"]; ?></a>                                        </td>
                                    	 <!--<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold;  background:#fffff1">
											<?php echo $record["nobookcommited"]; ?>
                                        </td>-->
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">
                                            <a href="bookdetailrecord.php?district=<?php echo $record["district"]; ?>">
                                                <?php echo $bookarr[$record["district"]]; ?>                                            </a>                                        </td>
                                    	<!--<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold;  background:#fffff1">
											<?php echo $record["volunteercommited"]; ?>
                                        </td>-->
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff"> <a href="volunteerdetailrecord.php?district=<?php echo $record["district"]; ?>">
											<?php echo $volunteerarr[$record["district"]]; ?></a>                                        </td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#f1f9ff">&nbsp;</td>
                                      <!--	<td><?php echo $record["adopthighschool"]; ?></td>
                                    	<td><?php echo $record["urbanadultliteracy"]; ?></td>
                                    	<td><?php echo $record["educateilliterates"]; ?></td>
                                    	<td><?php echo $record["elearningcenter"]; ?></td>-->
                                	</tr>
                                <?php } ?>
								<tr>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">Total</td>
                                    	<!--<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#FFCCFF">
											<?php //echo $record["nobookcommited"]; ?>
                                        </td>-->
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">
											<?php echo array_sum($bookarr); ?>                                        </td>
                                    	<!--<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#FFCCFF">
											<?php echo array_sum($volunteerexpectarr); ?>
                                        </td>-->
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">
											<?php echo array_sum($volunteerarr); ?>                                        </td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold; background:#66FF99">&nbsp;</td>
                                    <!--	<td><?php echo $record["adopthighschool"]; ?></td>
                                    	<td><?php echo $record["urbanadultliteracy"]; ?></td>
                                    	<td><?php echo $record["educateilliterates"]; ?></td>
                                    	<td><?php echo $record["elearningcenter"]; ?></td>-->
                                	</tr>
									<?php //for($i=1; $i<count($arr["volunteertype"]); $i++) { ?>
									<tr>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">Others</td>
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>
                                    	<!--<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>-->
                                    	<td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold"><a href="othervolunteerrecord.php" target="_blank"><?php  echo $arr["volunteertype"][0]["totalothervolunteer"]; ?></a>                                        </td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>
                                        <td style="font-family:'Courier New', Courier, monospace; font-size:14px; font-weight:bold">&nbsp;</td>
                                      <!--	<td><?php echo $record["adopthighschool"]; ?></td>
                                    	<td><?php echo $record["urbanadultliteracy"]; ?></td>
                                    	<td><?php echo $record["educateilliterates"]; ?></td>
                                    	<td><?php echo $record["elearningcenter"]; ?></td>-->
                                	</tr>
									<?php //} ?>
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

/*function districtlist()
{
var str = "";
$.ajax({                                      
      url: 'districttrackerlist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["district"]+"'>"+data[i]["district"]+"</option>";
				}
			}
			 	$("#cbodistrict").append(str);
		}
	});
}*/


/*function getassocdesig(districtval){
	
	var pars = 'district='+districtval
	var str = "";
	$.ajax({                                      
		  url: 'getDesigbyDistrict.php',                     
		  data: pars,
		  type:"post",
			dataType: 'json',
			success: function(data)         
			{
				if(data.length>0)
				{
					str = str+"<div style='padding:0 0 0 15px; text-align:center; line-height:18px'>"
					str = str+"<img src='dgpics/"+data[0]["district"]+"DG.jpg' width='100' style='border:1px solid #999999; padding:1px; margin-bottom:9px' /><br>"+"<strong>District Governer : </strong>"+data[0]["DG"]+"<br /><br />";
					str = str+"</div>";	
					str = str+"<div style='padding:0 0 0 15px; line-height:22px'>"
					str = str+"<strong>District Literacy Committee Chairman : </strong>"+data[0]["DLCC"]+"<br />";					
					str = str+"<strong>Zonal Literacy Co-ordinators : </strong>"+data[0]["PDG"]+"<br />";
					str = str+"<strong>No. of Books Commited : </strong>"+data[0]["nobookcommited"]+"<br />";
					str = str+"<strong>No. of Books Collected : </strong>"+data[0]["nobookcollected"]+"<br />";
					str = str+"<strong>No. of Volunteers Commited : </strong>"+data[0]["volunteercommited"]+"<br />";
					str = str+"<strong>No. of Volunteers Registered : </strong>"+data[0]["volunteerregister"]+"<br />";
					str = str+"</div>";	
				}
					$("#showdetail").html(str);
				
			}
		});
}*/



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






