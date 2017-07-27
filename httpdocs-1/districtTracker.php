<?php
session_start();
include("connection.php");
if(!isset($_SESSION["user"]))
{
	header("Location: detailviewlogin.php");
}

$query = "SELECT id, district, DG, DLCC, PDG, if(nobookcommited=0,'',nobookcommited) as nobookcommited,if(volunteercommited=0,'',volunteercommited) as volunteercommited,  if(educatechild=0,'',educatechild) as educatechild,if(vocationalcenter=0,'',vocationalcenter) as vocationalcenter,if(adopthighschool=0,'',adopthighschool) as adopthighschool,if(urbanadultliteracy=0,'',urbanadultliteracy) as urbanadultliteracy,if(educateilliterates=0,'',educateilliterates) as educateilliterates ,if(elearningcenter=0,'',elearningcenter) as elearningcenter FROM districttracker;"; 

$query = $query."SELECT district ,sum(NoOfbook) as noofbookcllected FROM `book` group by district;";

$query = $query."SELECT rotaryDistrict as district ,count(id) as noofvolunteers FROM `registration` group by rotaryDistrict;";

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
		
$bookarr = array();
$volunteerarr = array();
$bookcommit =array();
$volunteercommited = array();
$educatechild = array();
$vocationalcenter = array();
$adopthighschool =array();
$urbanadultliteracy =array();
$educateilliterates = array(); 
$elearningcenter = array();

for($i=0; $i<count($arr["DTInfo"]); $i++) {

$bookcommit[]= $arr["DTInfo"][$i]["nobookcommited"];
$volunteercommited[]= $arr["DTInfo"][$i]["volunteercommited"];
$educatechild[]= $arr["DTInfo"][$i]["educatechild"];
$vocationalcenter[]= $arr["DTInfo"][$i]["vocationalcenter"];
$adopthighschool[]= $arr["DTInfo"][$i]["adopthighschool"];
$urbanadultliteracy[]= $arr["DTInfo"][$i]["urbanadultliteracy"];
$educateilliterates[]= $arr["DTInfo"][$i]["educateilliterates"];
$elearningcenter[]= $arr["DTInfo"][$i]["elearningcenter"];

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

.th {
border:1px solid #7d99ca; font-size:13px; font-family:arial, helvetica, sans-serif; padding: 12px 0 12px 0; text-decoration:none; font-weight:bold; color: #FFFFFF;
 background-color: #a5b8da; background-image: linear-gradient(to bottom, #a5b8da, #7089b3);
 }

.theader {
border:1px solid #d1dcdf; font-size:12px; font-family:arial, helvetica, sans-serif; padding: 10px 5px; text-decoration:none; font-weight:bold; color: #FFFFFF; text-align:center; color:#0f475a; background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
.auto-style1 {
	border-width: 1px;
	background-color: #FFCC00;
}
.auto-style2 {
	border-width: 1px;
	background-color: #FFCCCC;
}
.auto-style3 {
	border-width: 1px;
	background-color: #99FF99;
}
.auto-style4 {
	border-width: 1px;
	background-color: #FFFFCC;
}
.auto-style5 {
	border-width: 1px;
	background-color: #CCFF99;
}
</style>

</head>

<body>
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div style="padding:0 15px; margin:0">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
      <table width="100%" border="0" cellspacing="0" cellpadding="10" align="center" style="margin-top:5px; margin-bottom:7px; background:#FFFFFF; border-radius:5px; box-shadow:0 0 3px #000000">
            <tr>
                <td>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td align="left" valign="bottom"><h1>Progress Tracker</h1></td>
                            <td align="right"><div align="right"><a href="viewDetail.php" class="login">Back</a><a href="logout.php" class="login">Logout</a></div></td>
                        </tr>
                    </table>
                    
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:5px"></div>
					<form name="frm" action="CSV/districttrackerCSV.php" method="post">
                       <input type="submit" id="btncsv" name="btncsv" value="Download CSV"  class="login"  />
 					</form>
                    <p class="text" style="padding-top:12px; margin-top:0">

                    

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Total Records : <span id="totalrec"><?php echo count($arr["DTInfo"])?></span></h1>
<div style="background:#CCCCCC; height:2px"></div>

<table width='100%' border='1' bordercolor='#d1dcdf' cellpadding='5' cellspacing='0' style='text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333; margin-top:7px'>
<tr>
<td width="4%" class='theader'>District</td>
<!--<td class='theader'>DG Photo</td>-->
<!--<td class='theader'>District Governor </td>-->
<td width="6%" class='theader'>No. of Books Expected(Goal)</td>
<td width="5%" class='theader'>No. of Books Collected</td>
<td width="6%" class='theader'>No. of Volunteers Expected(Goal)</td>
<td width="6%" class='theader'>No. of Volunteers Registered</td>
<td width="6%" class='theader'>No. of Educate children at risk Expected(Goal)</td>
<td width="6%" class='theader'>No. of Educate children at risk achieved</td>
<td width="6%" class='theader'>No. of vocational centers to start Expected(Goal)</td>
<td width="6%" class='theader'>No. of vocational centers started</td>
<td width="6%" class='theader'>No. of Adoption for happy schools Expected(Goal)</td>
<td width="5%" class='theader'>No. of&nbsp; happy schools adopted</td>
<td width="7%" class='theader'>No. of urban adult literacy centers to Start 
Expected(Goal)</td>
<td width="5%" class='theader'>No. of urban adult literacy centers Started</td>
<td width="7%" class='theader'>No. of Educate<br />
  No. of adult illiterates (urban and rural) Expected(Goal)</td>
<td width="6%" class='theader'>No. of Educate<br />
  No. of adult illiterates (urban and rural)</td>
<td width="7%" class='theader'>No. of<br />
  e-learning centers to start Expected(Goal)</td>
<td width="6%" class='theader'>No. of<br />
  e-learning centers started</td>
</tr>

<?php foreach($arr["DTInfo"] as $record)  { ?>
<tr>
<td align="center" style="font-weight:bold; text-align:center" class="auto-style1"><?php echo $record["district"]; ?></td>
<!--<td align="center"><img src="../dgpics/<?php echo $record['district']."DG.jpg" ?>" width="60" style="border:1px solid #999999; padding:1px" /></td>-->
<!--<td><?php echo $record["DG"]; ?></td>-->
<td align="center" class="auto-style4"><?php echo $record["nobookcommited"]; ?></td>
<td align="center" class="auto-style5"><?php echo $bookarr[$record["district"]];; ?></td>
<td align="center" class="auto-style4"><?php echo $record["volunteercommited"]; ?></td>
<td align="center" class="auto-style5"><?php echo $volunteerarr[$record["district"]]; ?></td>
<td align="center" class="auto-style4"><?php echo $record["educatechild"]; ?></td>
<td align="center" class="auto-style5">&nbsp;</td>
<td align="center" class="auto-style4"><?php echo $record["vocationalcenter"]; ?></td>
<td align="center" class="auto-style5">&nbsp;</td>
<td align="center" class="auto-style4"><?php echo $record["adopthighschool"]; ?></td>
<td align="center" class="auto-style5">&nbsp;</td>
<td align="center" class="auto-style4"><?php echo $record["urbanadultliteracy"]; ?></td>
<td align="center" class="auto-style5">&nbsp;</td>
<td align="center" class="auto-style4"><?php echo $record["educateilliterates"]; ?></td>
<td align="center" class="auto-style5">&nbsp;</td>
<td align="center" class="auto-style4"><?php echo $record["elearningcenter"]; ?></td>
<td align="center" class="auto-style5">&nbsp;</td>
</tr>
<?php } ?>


<tr>
<td align="center" style="text-align:center" class="auto-style1">Total</td>
<td align="center" class="auto-style2"><strong><?php  echo array_sum($bookcommit); ?>
</strong></td>
<td align="center" class="auto-style3"><strong><?php echo array_sum($bookarr); ?>
</strong></td>
<td align="center" class="auto-style2"><strong><?php  echo array_sum($volunteercommited); ?>
</strong></td>
<td align="center" class="auto-style3"><strong><?php echo array_sum($volunteerarr); ?>
</strong></td>
<td align="center" class="auto-style2"><strong><?php echo array_sum($educatechild); ?>
</strong></td>
<td align="center" class="auto-style3"><strong></strong></td>
<td align="center" class="auto-style2"><strong><?php  echo array_sum($vocationalcenter); ?>
</strong></td>
<td align="center" class="auto-style3"><strong></strong></td>
<td align="center" class="auto-style2"><strong><?php  echo array_sum($adopthighschool); ?>
</strong></td>
<td align="center" class="auto-style3"><strong></strong></td>
<td align="center" class="auto-style2"><strong><?php  echo array_sum($urbanadultliteracy); ?>
</strong></td>
<td align="center" class="auto-style3"><strong></strong></td>
<td align="center" class="auto-style2"><strong><?php echo array_sum($educateilliterates); ?>
</strong></td>
<td align="center" class="auto-style3"><strong></strong></td>
<td align="center" class="auto-style2"><strong><?php echo array_sum($elearningcenter); ?>
</strong></td>
<td align="center" class="auto-style3"><strong></strong></td>
</tr>
</table>


                    </p>
                                            

                    
                    <!----------------------- FOOTER AREA START------------------------>
                                     <?php include("footer_area.html");?>
    
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
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






;
	str = str+"<td style='text-align:center'><strong>Registerd<br />On</strong></td>";
	str = str+"</tr>";

var VolntAreaitems = [];
$("input[name='choVolntArea[]']:checked").each(function(){VolntAreaitems.push($(this).val());});
var WorkArea = [];
$("input[name='choWorkArea[]']:checked").each(function(){WorkArea.push($(this).val());});

	var pars ='volunttype='+val+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val()+'&city='+$('#txtcity').val()+'&voluntarea='+VolntAreaitems+'&workarea='+WorkArea;
	var statuslinktext="";
	                                
	$.ajax({                                      
		  url: 'AdminPanel/volunteerslist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)      
      	{
			if(data.length>0)
			{
				
				for(var i=0; i<data.length; i++)
				{
				j=i+1;
					str = str+"<tr>";
					/*str = str+"<td style='text-align:center'>"+j+"</td>";*/
					str = str+"<td>"+data[i]["id"]+"</td>";
					str = str+"<td>"+data[i]["name"]+"</td>";
					str = str+"<td style='text-align:center'><strong>"+data[i]["rotaryDistrict"]+"</strong></td>";
					str = str+"<td style='text-align:center'>"+data[i]["rotaryClubname"]+"</td>";
					str = str+"<td>"+data[i]["address"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["phone"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["city"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["email"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["volunteerArea"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["nosofhours"]+" hrs in "+data[i]["timeIn"]+"</td>";
					/*str = str+"<td style='text-align:center'>"+data[i]["name"]+"</td>";*/
					str = str+"<td style='text-align:center'>"+data[i]["workarea"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["registeredon"]+"</td>";
					/*if(data[i]["volunteerstatus"]==1)
						statuslinktext = 'Deacativate';
						
					 else
						 statuslinktext = 'Activate';*/
					if(data[i]["volunteerstatus"]==1)
					{
						statuslinktext = '../images/yes.jpg';
						title = 'Deactivate';
					}
					 else
					 {
						 statuslinktext = '../images/no.jpg';
						 title = 'Activate';
					 }
					 
					
					str = str+"</tr>";
				}
			}
			else
			{
			 str = str+"<tr><td colspan='14' style='border-bottom:1px solid #cccccc; color:#cc3300'>Record not found.</td></tr>";	
			 }
			 
			 str = str+"</table>";
			 
			//setVisibility('sub2', 'inline');
			$("#totalrec").html(data.length)
			$("#volunteerContainer").show();
			$("#volunteerContainer").html(str);
		}
	});

}






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






