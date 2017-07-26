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

function inputNumber(e,val,allowdecimal)
{
    var key=(window.event) ? event.keyCode : e.charCode || 0;
	
	if(allowdecimal==true)
	{
		if(key==0 || key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57))
	    {	
		    if(key==46)
		    {
			    if(val.indexOf(".")!=-1)
			    {
				    if(window.event)
				    {
					    event.returnValue=false
				    }
				    else
				    {
					    e.preventDefault()
				    }
			    }
		    }
	    }      
	    else
	    {
		    if(window.event)
		    {
			    event.returnValue=false
		    }
		    else
		    {
			    e.preventDefault()
		    }
	    }
	}
	else
	{
		if(key==0 || key == 8 || key == 9 || (key >= 48 && key <= 57))
		{	
			
		}      
		else
		{
			if(window.event)
			{
				event.returnValue=false
			}
			else
			{
				e.preventDefault()
			}
		}
	}
}


function validation() {
if($('#chovolunteers').val()=='')
	{
		alert("Please select volunteer type.")	
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
                            <td align="left" valign="bottom"><h1>Volunteers Registered</h1></td>
                            <td align="right"><div align="right"><a href="viewDetail.php" class="login">Back</a><a href="logout.php" class="login">Logout</a></div></td>
                        </tr>
                    </table>
                    
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:5px"></div>
                    
                    <p class="text" style="padding-top:12px; margin-top:0">




<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Filter your search :</h1>
<div style="background:#CCCCCC; height:2px; margin-bottom:10px"></div>

<form action="CSV/volunteersCSV.php" name="frm1" id="frm1" method="post" onsubmit="return validation()">
<table width="100%" border="0" cellspacing="0" cellpadding="3" style="text-align:left; color:#333333; font-size:12px; font-family:Arial, Helvetica, sans-serif" align="center">
<tr>
<td width="17%"><strong>Volunteer Type</strong></td>
<td width="1%" align="center"><strong>:</strong></td>
<td width="82%">
<select id="chovolunteers" name="chovolunteers" onchange="districtlist(this.value);" class="button" style="width:20%; cursor:pointer; color:#333333; font-weight:bold; padding:7px 0 7px 4px">
<option value="">Select</option>
<option value="All">All</option>
<option value="Rotarian">Rotarian</option>
<option value="Inner Wheel Member">Inner Wheel Member</option>
<option value="Rotaractor">Rotaractor</option>
<!--<option value="Interactor">Interactor</option>-->
<option value="RCCMember">RCC Member</option> 
<option value="Others">Others</option>
</select>
</td>
</tr>
<tr>
<td><strong>District</strong></td>
<td align="center"><strong>:</strong></td>
<td>
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
<tr>
<td><strong>State</strong></td>
<td align="center"><strong>:</strong></td>
<td>
 <select id="txtState" name="txtState" >
                <option value="">Select</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Orissa">Orissa</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
            <option value="Union Territories">Union Territories</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Pondicherry">Pondicherry</option>    
    </select>
</td>
</tr>
<tr>
<td><strong>City</strong></td>
<td align="center"><strong>:</strong></td>
<td>
<input type="text" id="txtcity" name="txtcity" style="width:20%; color:#333333; font-weight:bold; line-height:22px; height:22px" />
</td>
</tr>
<tr>
<td><strong>Pin</strong></td>
<td align="center"><strong>:</strong></td>
<td>
<input type="text" id="txtpin" name="txtpin" maxlength="6"  style="width:20%; onKeyPress="inputNumber(event,this.value,false);"  color:#333333; font-weight:bold; line-height:22px; height:22px" />
</td>
</tr>

<tr>
<td valign="top"><strong>Volunteer Area</strong></td>
<td valign="top" align="center"><strong>:</strong></td>
<td>
<input type="checkbox" name="choVolntArea[]" value="Teacher Support" />Teacher Support &nbsp;<input type="checkbox" name="choVolntArea[]" value="E-Learning" />E-Learning &nbsp;<input type="checkbox" name="choVolntArea[]" value="Adult Literacy" />Adult Literacy &nbsp;<input type="checkbox" name="choVolntArea[]" value="Child Development" />Child Development &nbsp;<input type="checkbox" name="choVolntArea[]" value="Happy Schools" />Happy Schools &nbsp;<input type="checkbox" name="choVolntArea[]" value="workprogram" />Organisational Work &nbsp;<input type="checkbox" name="choVolntArea[]" value="fundraising" />Fund Raising
</td>
</tr> 
<tr>
<td valign="top"><strong>Geographical area of work</strong></td>
<td valign="top" align="center"><strong>:</strong></td>
<td>
<input type="checkbox" name="choWorkArea[]" value="Hometown" />Home Town &nbsp;<input type="checkbox" name="choWorkArea[]" value="Revenue district" />Revenue District &nbsp;<input type="checkbox"  name="choWorkArea[]" value="State" />State &nbsp;<input type="checkbox"  name="choWorkArea[]" value="Country" />Country &nbsp;<input type="checkbox"  name="choWorkArea[]" value="Rotary District" />Rotary District
</td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
<td></td>
<td></td>
<td align="left"><input type="button" value="Search" id="btnsearch" onclick="dispVolunteers();" class="login"/><input type="submit" id="btncsv" name="btncsv" value="Download CSV"  class="login" /></td>
</tr>
</table> 
</form>
<br />

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Total Records : <span id="totalrec"></span></h1>
<div style="background:#CCCCCC; height:2px"></div>

<div id="volunteerContainer" style="display:none"></div>


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

function districtlist(val)
{
var str = "<option value=''>Select</option>";
	var pars ='volunteertype='+val;
$.ajax({                                      
      url: 'AdminPanel/districtlistforsearch.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
	//	alert(419)
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
      url: 'AdminPanel/clublistforsearch.php',                     
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
function dispVolunteers()
{
	if($('#chovolunteers').val()=='')
	{
		alert("Please select volunteer type.")	
		return false;
	}
	
	var val = $('#chovolunteers').val();
	if(val=='')
	{
	$("#volunteerContainer").hide();
	return false;
	}
		$("#volunteerContainer").hide();
	
	
	var str="<table width='100%' border='1' bordercolor='#7d99ca' cellpadding='5' cellspacing='0' style='text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333; margin-top:7px'>";	
	if(val=='All') {
	str = str+"<tr height='35'><td colspan='14' align='center' class='th'>All Volunteers</td></tr>";}
	else {
		str = str+"<tr height='35'><td colspan='14' align='center' class='th'>Volunteers from "+val+"</td></tr>";
		}

	str = str+"<tr>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Id</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Name</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Rotary Dist.</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Rotary<br />Club</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Address</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Phone</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>City</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Email</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Volunteer<br />Area</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Working<br />Hours</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Work<br />Area</strong></td>";
	str = str+"<td style='text-align:center; background:#f5f5f5'><strong>Registerd<br />On</strong></td>";
	str = str+"</tr>";

var VolntAreaitems = [];
$("input[name='choVolntArea[]']:checked").each(function(){VolntAreaitems.push($(this).val());});
var WorkArea = [];
$("input[name='choWorkArea[]']:checked").each(function(){WorkArea.push($(this).val());});

	var pars ='volunttype='+val+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val()+'&state='+$('#txtState').val()+'&city='+$('#txtcity').val()+'&pin='+$('#txtpin').val()+'&voluntarea='+VolntAreaitems+'&workarea='+WorkArea;
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


</script>

<script type="text/jscript">

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






