<?php
session_start();
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
.auto-style1 {
	color: #FF0000;
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
                            <td align="left" valign="bottom"><h1>Books Collection List</h1></td>
                            <td align="right"><div align="right"><a href="viewDetail.php" class="login">Back</a><a href="logout.php" class="login">Logout</a></div></td>
                        </tr>
                    </table>
                    
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:5px"></div>
                    
                    <p class="text" style="padding-top:12px; margin-top:0">




<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Filter your search :
<span class="auto-style1">[In order to view all data Click on "Search" without 
selecting any option from the filters below]</span></h1>
<div style="background:#CCCCCC; height:2px; margin-bottom:10px"></div>

<form action="CSV/bookcollectionCSV.php" name="frm" method="post">

<table width="100%" border="0" cellspacing="0" cellpadding="3" style="text-align:left; color:#333333; font-size:12px; font-family:Arial, Helvetica, sans-serif" align="center">
<tr>
<td width="10%"><strong>District</strong></td>
<td width="1%" align="center"><strong>:</strong></td>
<td width="89%">
<select id="chodistrict" name="chodistrict" onchange="dispclub(this.value);" class="button" style="width:20%; cursor:pointer; color:#333333; font-weight:bold; padding:7px 0 7px 4px">
<option value="">Select</option>
</select>
</td>
</tr>
<tr>
<td><strong>Club</strong></td>
<td align="center"><strong>:</strong></td>
<td>
<select id="choclub" name="choclub" onchange="" class="button" style="width:20%; cursor:pointer; color:#333333; font-weight:bold; padding:7px 0 7px 4px">
<option value="">Select</option>
</select>
</td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
<td></td>
<td></td>
<td align="left"><input type="button" value="Search" id="btnsearch" onclick="dispbook();" class="login"/>&nbsp;<input type="submit" id="btncsv" name="btncsv" value="Download CSV"  class="login" /></td>
</tr>
</table>

</form>
<br />

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Total Record : <span id="totalrec"></span></h1>
<div style="background:#CCCCCC; height:2px"></div>
<div id="bookContainer" style="display:none"></div>


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
	
var str = "<option value=''>Select</option>";
var pars="";
$.ajax({                                      
      url: 'AdminPanel/districtlistforbook.php',                     
      data: pars,
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
			 	$("#chodistrict").empty();
				$("#chodistrict").append(str);
		}
	});
}


function dispclub(val)
{
	var str = "<option value=''>Select</option>";
	var pars ='volunteertype='+$('#chovolunteers').val()+'&dist='+val;
	
$.ajax({                                      
      url: 'AdminPanel/clublistforbook.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["club"]+"'>"+data[i]["club"]+"</option>";
				}
			}
			$("#choclub").empty();
			$("#choclub").append(str);			 
		}
	});
}


function dispbook()
{
	var str="<table width='100%' border='1' bordercolor='#7d99ca' cellpadding='5' cellspacing='0' style='text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333; margin-top:7px'>";	

	str = str+"<tr>"
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>Id</strong></td>";
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>District</strong></td>";
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>Club</strong></td>";
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>Name</strong></td>";
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>Contact No</strong></td>";
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>Email</strong></td>";
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>No of Book</strong></td>";
	str = str+"<td style='text-align:center;background:#f5f5f5'><strong>Submit Date</strong></td>";
	str = str+"</tr>";

	var pars ='dist='+$('#chodistrict').val()+'&club='+$('#choclub').val();
	//alert(pars)                                
	$.ajax({                                      
		  url: 'AdminPanel/BookList.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)      
      	{
			
			if(data.length>0)
			{
				
				for(var i=0; i<data.length; i++)
				{
				//j=i+1;
					str = str+"<tr>";
					str = str+"<td>"+data[i]["id"]+"</td>";
					str = str+"<td style='text-align:center'><strong>"+data[i]["district"]+"</strong></td>";
					str = str+"<td style='text-align:center'>"+data[i]["club"]+"</td>";
					str = str+"<td>"+data[i]["name"]+"</td>";
					str = str+"<td>"+data[i]["contactno"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["email"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["Noofbook"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["submitdt"]+"</td>";
				}
			}
			else
			{
			 str = str+"<tr><td colspan='14' style='border-bottom:1px solid #cccccc; color:#cc3300'>Record not found.</td></tr>";	
			 }
			 
			 str = str+"</table>";
			 
			//setVisibility('sub2', 'inline');
			$("#totalrec").html(data.length)
			$("#bookContainer").show();
			$("#bookContainer").html(str);
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






