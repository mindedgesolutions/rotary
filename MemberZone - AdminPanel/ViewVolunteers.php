<?php
session_start();
include("../connection.php");
if($_SESSION["user"]!='Admin') {
header("location: index.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Volunteer List - Rotary T-E-A-C-H</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<!--<link href="css/header_area.css" rel="stylesheet" type="text/css" />-->
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<!-- TOP MENU START-->
<!--<link rel="stylesheet" type="text/css" href="topmenu/ddsmoothmenu.css" />-->
<!--<script type="text/javascript" src="topmenu/jquery.min.js"></script>
<script type="text/javascript" src="topmenu/ddsmoothmenu.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "smoothmenu1",
	orientation: 'h',
	classname: 'ddsmoothmenu',
	contentsource: "markup"
})
</script>-->
<!-- TOP MENU END-->


<link href="../button/style.css" rel="stylesheet" type="text/css" />




<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>


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

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


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

.button
{
	border:1px solid #d7dada; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding:7px 5px; text-decoration:none; color: #333333;
	background-color: #f4f5f5; background-image: -webkit-gradient(linear, left top, left bottom, from(#f4f5f5), to(#dfdddd));
	background-image: -webkit-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: -moz-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: -ms-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: -o-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#f4f5f5, endColorstr=#dfdddd);
}

.login
{
	border:1px solid #15aeec; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 30px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF; margin:0 5px 0 0;
	background-color: #49c0f0; background-image: -webkit-gradient(linear, left top, left bottom, from(#49c0f0), to(#2CAFE3));
	background-image: -webkit-linear-gradient(top, #49c0f0, #2CAFE3);
	background-image: -moz-linear-gradient(top, #49c0f0, #2CAFE3);
	background-image: -ms-linear-gradient(top, #49c0f0, #2CAFE3);
	background-image: -o-linear-gradient(top, #49c0f0, #2CAFE3);
	background-image: linear-gradient(to bottom, #49c0f0, #2CAFE3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#49c0f0, endColorstr=#2CAFE3);
}
.login:hover
{
	border:1px solid #1090c3;
	background-color: #1ab0ec; background-image: -webkit-gradient(linear, left top, left bottom, from(#1ab0ec), to(#1a92c2)); cursor:pointer;
	background-image: -webkit-linear-gradient(top, #1ab0ec, #1a92c2);
	background-image: -moz-linear-gradient(top, #1ab0ec, #1a92c2);
	background-image: -ms-linear-gradient(top, #1ab0ec, #1a92c2);
	background-image: -o-linear-gradient(top, #1ab0ec, #1a92c2);
	background-image: linear-gradient(to bottom, #1ab0ec, #1a92c2);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#1ab0ec, endColorstr=#1a92c2);
}

.login1{
	border:1px solid #7d99ca; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 12px 25px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
	background-color: #a5b8da; background-image: -webkit-gradient(linear, left top, left bottom, from(#a5b8da), to(#7089b3));
	background-image: -webkit-linear-gradient(top, #a5b8da, #7089b3);
	background-image: -moz-linear-gradient(top, #a5b8da, #7089b3);
	background-image: -ms-linear-gradient(top, #a5b8da, #7089b3);
	background-image: -o-linear-gradient(top, #a5b8da, #7089b3);
	background-image: linear-gradient(to bottom, #a5b8da, #7089b3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a5b8da, endColorstr=#7089b3);
}

.login1:hover{
	border:1px solid #5d7fbc;
	background-color: #819bcb; background-image: -webkit-gradient(linear, left top, left bottom, from(#819bcb), to(#536f9d));
	background-image: -webkit-linear-gradient(top, #819bcb, #536f9d);
	background-image: -moz-linear-gradient(top, #819bcb, #536f9d);
	background-image: -ms-linear-gradient(top, #819bcb, #536f9d);
	background-image: -o-linear-gradient(top, #819bcb, #536f9d);
	background-image: linear-gradient(to bottom, #819bcb, #536f9d);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#819bcb, endColorstr=#536f9d);
}
</style>

<center>



        <br />
        <!----------------------- LOGO AREA START --------------------->
        <div id="logo_area" style="padding:0; margin:0 0 4px 0">        
            <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td width="1%"></td>
                    <td>
                        <div style="float:left; margin:0 15px 0 0">
                            <a href="../index.shtml" title="Go to Rotary T-E-A-C-H Home">
                                <img src="../images/logo.jpg" alt="Logo" height="70" border="0" style="border:1px solid #FFFFFF; padding:1px; box-shadow:0 0 4px #000000" />
                            </a>
                        </div>
                        <div style="float:left;">
                            <h4>Rotary's T-E-A-C-H Programme</h4>
                            <div style="border-bottom:1px solid #0099FF; border-top:1px solid #0099FF; padding:0; margin:3px 0 7px 0; height:2px"></div>
                            <h5>A Rotary Initiative of Total Literacy & Quality Education</h5>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!----------------------- LOGO AREA END ----------------------->
        
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:25px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="../images/h_top_l.png" /></td>
                <td style="background:url(../images/h_top.png)"></td>
                <td width="8"><img src="../images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(../images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">                                
					<br />
                    <h1>Volunteer List</h1>
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                    
                    <p class="text" style="padding-top:12px; margin-top:0">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
    	<td align="right"><div align="right"><a href="Panel.php" class="login">Back to Admin Panel</a><a href="logout.php" class="login">Logout</a></div></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
    	<td align="left">
        	
            <table width="82%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                	<td>
                        <fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        <legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;Filter your search&nbsp;&nbsp;</legend>
                        <p>
                        <table width="99%" border="0" cellspacing="0" cellpadding="0" style="text-align:left; color:#333333; font-size:12px; font-family:Arial, Helvetica, sans-serif" align="center">
                        <tr>
                        <td width="17%"><strong>Volunteer Type</strong></td>
                        <td width="1%" align="center"><strong>:</strong></td>
                        <td width="82%">
                        <select id="chovolunteers" name="chovolunteers" onchange="districtlist(this.value);" class="button" style="width:30%; cursor:pointer; color:#333333; font-weight:bold">
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
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                        <td><strong>District</strong></td>
                        <td align="center"><strong>:</strong></td>
                        <td>
                        <select id="chodistrict" name="chodistrict" onchange="dispclub(this.value);" class="button" style="width:30%; cursor:pointer; color:#333333; font-weight:bold">
                        <option value="">Select</option>
                        </select>
                        </td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                        <td><strong>Club</strong></td>
                        <td align="center"><strong>:</strong></td>
                        <td>
                        <select id="choclub" name="choclub" onchange="" class="button" style="width:30%; cursor:pointer; color:#333333; font-weight:bold">
                        <option value="">Select</option>
                        </select>
                        </td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                        <td><strong>City</strong></td>
                        <td align="center"><strong>:</strong></td>
                        <td>
                        <input type="text" id="txtcity" name="txtcity" style="width:30%; color:#333333; font-weight:bold; line-height:22px; height:22px" />
                        </td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                        <td valign="top"><strong>Volunteer Area</strong></td>
                        <td valign="top" align="center"><strong>:</strong></td>
                        <td>
                        <input type="checkbox" name="choVolntArea[]" value="Teacher Support" />Teacher Support &nbsp;<input type="checkbox" name="choVolntArea[]" value="E-Learning" />E-Learning &nbsp;<input type="checkbox" name="choVolntArea[]" value="Adult Literacy" />Adult Literacy &nbsp;<input type="checkbox" name="choVolntArea[]" value="Child Development" />Child Development &nbsp;<input type="checkbox" name="choVolntArea[]" value="Happy Schools" />Happy Schools &nbsp;<input type="checkbox" name="choVolntArea[]" value="workprogram" />Organisational Work &nbsp;<input type="checkbox" name="choVolntArea[]" value="fundraising" />Fund Raising
                        </td>
                        </tr> 
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                        <td valign="top"><strong>Geographical area of work</strong></td>
                        <td valign="top" align="center"><strong>:</strong></td>
                        <td>
                        <input type="checkbox" name="choWorkArea[]" value="Hometown" />Home Town &nbsp;<input type="checkbox" name="choWorkArea[]" value="Revenue district" />Revenue District &nbsp;<input type="checkbox"  name="choWorkArea[]" value="State" />State &nbsp;<input type="checkbox"  name="choWorkArea[]" value="Country" />Country &nbsp;<input type="checkbox"  name="choWorkArea[]" value="Rotary District" />Rotary District
                        </td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                        <td colspan="3" align="center"><input type="button" value="Search" id="btnsearch" onclick="dispVolunteers();" class="login"/></td>
                        </tr>
                        </table> 
                        </p>
                        </fieldset>
                    </td>
                </tr>
            </table>




    	</td>
    </tr>
</table>


<div style="padding:10px 0; font-weight:bold">
	<h1 style="color:#CC3300; font-size:18px">Total Record : <span id="totalrec"></span></h1>
</div>
<div id="volunteerContainer" style="display:none"></div>


                    </p>
                                            

                    
                    <!----------------------- FOOTER AREA START------------------------>
                    
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(../images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="../images/h_bottom_l.png" /></td>
                <td style="background:url(../images/h_bottom.png)"></td>
                <td width="8"><img src="../images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          


    
    

</center>


<script type="text/javascript">



function districtlist(val)
{
var str = "<option value=''>Select</option>";
	var pars ='volunteertype='+val;
$.ajax({                                      
      url: 'districtlistforsearch.php',                     
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
      url: 'clublistforsearch.php',                     
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
	
	
	var str="<table width='100%' border='1' bordercolor='#999999' cellpadding='2' cellspacing='0' style='text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333' align='left'>";	
	if(val=='All') {
	str = str+"<tr><td colspan='14' align='center' style='background:#f5f5f5'><h1 style='text-align:center; font-size:18px; margin-top:7px'>All Volunteers</h1></td></tr>";}
	else {
		str = str+"<tr><td colspan='14' align='center' style='background:#f5f5f5'><h1 style='text-align:center; font-size:18px; margin-top:7px'>Volunteers from "+val+"</h1></td></tr>";
		}

	str = str+"<tr>";
	str = str+"<td style='text-align:center'><strong>Sl. No.</strong></td>";
	str = str+"<td style='text-align:center'><strong>Id</strong></td>";
	str = str+"<td style='text-align:center'><strong>Name</strong></td>";
	str = str+"<td style='text-align:center'><strong>Rotary Dist.</strong></td>";
	str = str+"<td style='text-align:center'><strong>Rotary<br />Club</strong></td>";
	str = str+"<td style='text-align:center'><strong>Address</strong></td>";
	str = str+"<td style='text-align:center'><strong>Phone</strong></td>";
	str = str+"<td style='text-align:center'><strong>City</strong></td>";
	str = str+"<td style='text-align:center'><strong>Email</strong></td>";
	str = str+"<td style='text-align:center'><strong>Volunteer<br />Area</strong></td>";
	str = str+"<td style='text-align:center'><strong>Working<br />Hours</strong></td>";
	/*str = str+"<td style='text-align:center'><strong>Rotary<br />Status</strong></td>";*/
	str = str+"<td style='text-align:center'><strong>Work<br />Area</strong></td>";
	str = str+"<td style='text-align:center'><strong>Registerd<br />On</strong></td>";
	str = str+"<td style='text-align:center'>&nbsp;</td>";
	str = str+"</tr>";

var VolntAreaitems = [];
$("input[name='choVolntArea[]']:checked").each(function(){VolntAreaitems.push($(this).val());});
var WorkArea = [];
$("input[name='choWorkArea[]']:checked").each(function(){WorkArea.push($(this).val());});

	var pars ='volunttype='+val+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val()+'&city='+$('#txtcity').val()+'&voluntarea='+VolntAreaitems+'&workarea='+WorkArea;
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
					str = str+"<td style='text-align:center'>"+j+"</td>";
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
					 
					str = str+"<td style='text-align:center'><input type='hidden' id='hdnstatus_"+data[i]["id"]+"' name='hdnstatus_"+data[i]["id"]+"' value='"+data[i]["volunteerstatus"]+"'/><img  id='statuslink_"+data[i]["id"]+"' title='"+title+"'  style='cursor:pointer' src='"+statuslinktext+"' href='javascript: void(0)' onclick='updtstatus("+data[i]["id"]+")' />&nbsp;<img src='../images/del.jpg' title='Delete' style='cursor:pointer' onclick='deletevolunteer("+data[i]["id"]+")' /></td>";
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



function updtstatus(rowid) {
var statusval = $("#hdnstatus_"+rowid).val();
	$.ajax({                                      
      url: 'changestatus.php',                     
      data: 'id='+rowid+'&statusval='+statusval+'&for=volunteer',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			//alert(data["status"])
			if(data["status"]==1) {
			//	$("#statuslink_"+rowid).attr("title", 'Deactivate');
			//$("#statuslink_"+rowid).title('Deactivate')	;
			$("#statuslink_"+rowid).attr("src","../images/yes.jpg");
			$("#hdnstatus_"+rowid).val(1)
			}
			else
			{
			//$("#statuslink_"+rowid).title('Activate');
			$("#statuslink_"+rowid).attr("src","../images/no.jpg");
			$("#hdnstatus_"+rowid).val(0)
			}			 
		}
	});


}

function deletevolunteer(rowid) {
	
	if(!confirm('Are you sure?')) return;	
	$.ajax({                                      
      url: 'deleterecord.php',                     
      data: 'id='+rowid+'&from=volunteer',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data["result"]==1)		 
			{
				dispVolunteers();
			}
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
	Cufon.replace('h6', {hover: true});
	//Cufon.replace('h7');
</script>
</body>
</html>

