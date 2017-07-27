<?php
session_start();
include("connection.php");
if(!isset($_SESSION["user"]))
{
	header("Location: detailviewlogin.php");
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


function validation() {
if($('#chodistrict').val()=='')
	{
		alert("Please select district.")	
		return false;
	}
return true;
}

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
border:1px solid #d1dcdf; font-size:12px; font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; font-weight:bold; color: #FFFFFF; text-align:center; color:#0f475a; background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
</style>

</head>

<body onload="districtlist()">
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
                            <td align="left" valign="bottom"><h1>Literacy Team Details</h1></td>
                            <td align="right"><div align="right"><a href="viewDetail.php" class="login">Back</a><a href="logout.php" class="login">Logout</a></div></td>
                        </tr>
                    </table>
                    
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:5px"></div>
                    
                    <p class="text" style="padding-top:12px; margin-top:0">
                    

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Filter your search :</h1>
<div style="background:#CCCCCC; height:2px; margin-bottom:10px"></div>

<form name="frm" action="CSV/AdministratorCSV.php" method="post" onsubmit="return validation();">
<table width="100%" border="0" cellspacing="0" cellpadding="3" style="text-align:left; color:#333333; font-size:12px; font-family:Arial, Helvetica, sans-serif" align="center">
<tr>
<td width="10%"><strong>District</strong></td>
<td width="1%" align="center"><strong>:</strong></td>
<td width="89%">
<select id="chodistrict" name="chodistrict" class="button" style="width:20%; cursor:pointer; color:#333333; font-weight:bold; padding:7px 0 7px 4px">
<option value="">Select</option>
<option value="All">All</option>
</select>
</td>
</tr>
<?php 
		$query = "SELECT distinct role from info;";
		$result = mysqli_query($link,$query);
		
		if($result)
		{
			if(mysqli_affected_rows($link)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
				$arr[] = $row;
				}
			}
		}


?>
<tr>
<td width="10%"><strong>Designation</strong></td>
<td width="1%" align="center"><strong>:</strong></td>
<td width="89%">
<select id="chodesign" name="chodesign" class="button" style="width:20%; cursor:pointer; color:#333333; font-weight:bold; padding:7px 0 7px 4px">
<option value="">Select</option>
<?php foreach($arr as $desig){ ?>
<option value="<?php echo $desig["role"];?>"><?php echo $desig["role"];?></option>
<?php } ?>
</select>
</td>
</tr>

<tr>
<td></td>
<td></td>
<td align="left"><input type="button" value="Search" id="btnsearch" onclick="dispLieracyTeam();" class="login"/>&nbsp;<input type="submit" id="btncsv" name="btncsv" value="Download CSV"  class="login" /></td>
</tr>
</table>
</form>
<br />

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Total Record : <span id="totalrec"></span></h1>
<div style="background:#CCCCCC; height:2px"></div>

<div id="literacytemContainer" style="display:none"></div>


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


function districtlist()
{
//alert(275)
var str = "";
$.ajax({                                      
      url: 'AdminPanel/districtlistfromInfo.php',                     
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
			 	$("#chodistrict").append(str);
		}
	});
}


function dispLieracyTeam()
{
	if($('#chodistrict').val()=='')
	{
		alert("Please select district.")	
		return false;
	}
	
	var val = $('#chodistrict').val();
	if(val=='')
	{
	$("#literacytemContainer").hide();
	return false;
	}
		$("#literacytemContainer").hide();
	
	
	var str="<table width='100%' border='1' bordercolor='#d1dcdf' cellpadding='5' cellspacing='0' style='text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333; margin-top:7px'>";	
	if(val=='All') {
	str = str+"<tr><td colspan='14' align='center' class='th'>All Literacy Team</td></tr>";}
	else {
		str = str+"<tr><td colspan='14' align='center' class='th'>Literacy Team from "+val+"</td></tr>";
		}

	str = str+"<tr>";
	str = str+"<td class='theader'><strong>Sl. No.</strong></td>";
	str = str+"<td class='theader'><strong>Id</strong></td>";
	str = str+"<td class='theader'><strong>District</strong></td>";
	str = str+"<td class='theader'><strong>Name</strong></td>";
	str = str+"<td class='theader'><strong>Designation</strong></td>";
	str = str+"<td class='theader'><strong>Phone</strong></td>";
	str = str+"<td class='theader'><strong>Email</strong></td>";
	str = str+"</tr>";


	var pars ='district='+$('#chodistrict').val()+'&role='+$('#chodesign').val();
	                                
	$.ajax({                                      
		  url: 'AdminPanel/Administratorlist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)      
      	{
		//alert(JSON.stringify(data))
			if(data.length>0)
			{
				
				for(var i=0; i<data.length; i++)
				{
				j=i+1;
					str = str+"<tr>";
					str = str+"<td style='text-align:center'>"+j+"</td>";
					str = str+"<td>"+data[i]["id"]+"</td>";
					str = str+"<td>"+data[i]["district"]+"</td>";
					str = str+"<td>"+data[i]["name"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["role"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["mobNo"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["email"]+"</td>";
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
			$("#literacytemContainer").show();
			$("#literacytemContainer").html(str);
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






