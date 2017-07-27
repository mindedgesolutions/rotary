<?php
include("../connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
<title>Welcome - Rotary Projects</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<!--<link href="css/header_area.css" rel="stylesheet" type="text/css" />-->
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
<!--<script type="text/javascript" src="../js/jquery.min.js"></script>-->

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>




	<script>
		//!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

<!--<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>-->
	<!--<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />-->
 <!--	<link rel="stylesheet" href="style.css" />-->

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

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

function districtlist()
{
var str = "";
$.ajax({                                      
      url: '../districtlist.php',                     
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

function dispclub(val)
{
		var str = "<option value=''>Select</option>";
	var pars ='dist='+val;

$.ajax({                                      
      url: '../clublist.php',                     
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

function dispprojectproposal(val)
{
	var str = "<option value=''>Select</option>";
	var pars ='club='+val;

$.ajax({                                      
      url: 'proposallist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["id"]+"'>"+data[i]["projectname"]+"</option>";
				}
			}
			$("#choproject").empty();
			$("#choproject").append(str);			 
		}
	});
}

</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body onload="districtlist();">
<center>
<div style="background:url(../images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(../images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        <!----------------------- LOGO AREA START --------------------->
        <?php include("../logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("../menu_area.html")?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <?php include("../header_area.html")?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="http://rotaryteach.org/images/h_top_l.png" /></td>
                <td style="background:url(http://rotaryteach.org/images/h_top.png)"></td>
                <td width="8"><img src="http://rotaryteach.org/images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(http://rotaryteach.org/images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                              <h1>Search for volunteer Id</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                               
                                <p class="text">
                                	<fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;</legend>
                        					<p style="padding:7px 0 0 0; margin:0">
                                                
                                                <table width="98%" border="0" cellspacing="0" cellpadding="5" align="right" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color:#333333">
                                                    
                                                    <tr>
                                                        <td><strong>Volunteer Type</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
															<select id="chovolunteers" name="chovolunteers" class="button" style="width:30%; cursor:pointer; color:#333333; font-weight:bold">
																<option value="">Select</option>
																<option value="All">All</option>
																<option value="Rotarian">Rotarian</option>
																<option value="Inner Wheel Member">Inner Wheel Member</option>
																<option value="Rotaractor">Rotaractor</option>
																<option value="Interactor">Interactor</option>
																<option value="RCCMember">RCC Member</option> 
																<option value="Others">Others</option>
															</select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>District</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                             <select id="chodistrict" name="chodistrict" onchange="dispclub(this.value);" class="button" style="width:30%; cursor:pointer; color:#333333; font-weight:bold">
                        <option value="">Select</option>
                        </select>
                                                        </td>
                                                    </tr>   
													 <tr>
                                                        <td><strong>Club</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                         <select id="choclub" name="choclub" onchange="" class="button" style="width:30%; cursor:pointer; color:#333333; font-weight:bold">
															<option value="">Select</option>
														</select>
                                                        </td>
                                                    </tr>   
													 <tr>
                                                        <td><strong>Volunteer Name</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><input type="text" id="txtvolunteername" name="txtvolunteername"  width="50%" /></td>
                                                    </tr>
													                                  
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="button" id="btngo" name="btngo" value="Search" class="login" onclick="searchvolunteer()"/>&nbsp;<input type="button" id="btnreset" name="btnreset" value="Close"  class="login" onclick="javascript: window.close()"/>
                                                        </td>
                                                    </tr>
                                                    <tr height="5"><td colspan="3"></td></tr>
                                                </table>                                                
  <div id="volunteerContainer" style="display:none"></div>
                                                
                                			</p>
                                	</fieldset>
                                    <br />
                                   
                                </p>
                                
							</td>
							<td width="20">&nbsp;</td>
							<td width="210" valign="top">
								<?php include("../inner_right.html")?>
							</td>
						</tr>
					</table>


                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("../footer_area.html")?>
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(http://rotaryteach.org/images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="http://rotaryteach.org/images/h_bottom_l.png" /></td>
                <td style="background:url(http://rotaryteach.org/images/h_bottom.png)"></td>
                <td width="8"><img src="http://rotaryteach.org/images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>
	<!--<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>-->

<script type="text/javascript">

function searchvolunteer()
{
	if($('#chovolunteers').val()=='')
	{
		alert("Please select volunteer type.")	
		return false;
	}
	
	if($('#txtvolunteername').val()=='')
	{
		alert("Please enter volunteer name.")	
		return false;
	}
	
	var val = $('#chovolunteers').val();
	if(val=='')
	{
	$("#volunteerContainer").hide();
	return false;
	}
		$("#volunteerContainer").hide();
	
	
	var str="<table width='100%' border='1' bordercolor='#999999' cellpadding='2' cellspacing='0' style='text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333' align='left'>";	
	if(val=='All') {
	str = str+"<tr><td colspan='14' align='center' style='background:#f5f5f5'><h1 style='text-align:center; font-size:18px; margin-top:7px'>All Volunteers</h1></td></tr>";}
	else {
		str = str+"<tr><td colspan='14' align='center' style='background:#f5f5f5'><h1 style='text-align:center; font-size:18px; margin-top:7px'>Volunteers from "+val+"</h1></td></tr>";
		}

	str = str+"<tr>";
	/*str = str+"<td style='text-align:center'><strong>Sl. No.</strong></td>";*/
	str = str+"<td style='text-align:center'><strong>Id</strong></td>";
	str = str+"<td style='text-align:center'><strong>Name</strong></td>";
	str = str+"<td style='text-align:center'><strong>Rotary Dist.</strong></td>";
	str = str+"<td style='text-align:center'><strong>Rotary<br />Club</strong></td>";
	str = str+"<td style='text-align:center'><strong>Address</strong></td>";
	str = str+"<td style='text-align:center'><strong>Phone</strong></td>";
	str = str+"<td style='text-align:center'><strong>City</strong></td>";
	str = str+"<td style='text-align:center'><strong>Email</strong></td>";
	str = str+"<td style='text-align:center'><strong>Volunteer<br />Area</strong></td>";
	str = str+"<td style='text-align:center'><strong>Work<br />Area</strong></td>";
	str = str+"<td style='text-align:center'><strong>Registerd<br />On</strong></td>";
	
	str = str+"</tr>";


	var pars ='volunttype='+val+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val()+'&name='+$('#txtvolunteername').val()
	var statuslinktext="";
	$.ajax({                                      
		  url: 'volunteerslist.php',                     
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
					str = str+"<td>"+data[i]["id"]+"</td>";
					str = str+"<td>"+data[i]["name"]+"</td>";
					str = str+"<td style='text-align:center'><strong>"+data[i]["rotaryDistrict"]+"</strong></td>";
					str = str+"<td style='text-align:center'>"+data[i]["rotaryClubname"]+"</td>";
					str = str+"<td>"+data[i]["address"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["phone"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["city"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["email"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["volunteerArea"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["workarea"]+"</td>";
					str = str+"<td style='text-align:center'>"+data[i]["registeredon"]+"</td>";
									str = str+"</tr>";
				}
			}
			else
			{
			 str = str+"<tr><td colspan='11' style='border-bottom:1px solid #cccccc; color:#cc3300'>Record not found.</td></tr>";	
			 }
			 
			 str = str+"</table>";

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






