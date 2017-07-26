<?php 
include("connection.php");
if(isset($_POST["btn_submit"])) {
$belongto = $_POST["txtbelong"];
if($belongto=='Rotarian' || $belongto=='Rotaractor')
{
$district=$_POST["txtRotDistrict"];
$club = $_POST["txtClubName"];
}
else {
$district=$_POST["txtinnerdistrict"];
$club = $_POST["txtClubNameforother"];
}

$contactname = $_POST["txtcontactname"];
$contactno=$_POST["txtcontactno"];
$contactemail=$_POST["txtcontactemail"];
$username=$_POST["txtusername"];
$pwd=$_POST["txtpassword"];
$appstatus="Draft";

$query = "INSERT INTO registrationForGrantapp(`belongto`, `district`, `club`, `contactname`, `contactno`, `contactemail`, `username`, `password`, `appstatus`) VALUES('".$belongto."','".$district."','".$club."','".$contactname."','".$contactno."','".$contactemail."','".$username."','".$pwd."','".$appstatus."')";
//die($query);

$result = mysqli_query($link,$query);
if($result)
{
	header("location: grantApplicationLogin.php");
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

function districtlist()
{
var str = "";
$.ajax({                                      
      url: 'districtlist.php',                     
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
			 	$("#txtRotDistrict").append(str);
		}
	});
}
function dispclub(val)
{
	var str = "<option value=''>Select</option>";
	var pars ='dist='+val;

$.ajax({                                      
      url: 'clublist.php',                     
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
			$("#txtClubName").empty();
			$("#txtClubName").append(str);			 
		}
	});
}


function changeDistrict(val) {

var selected =$('input[name=txtbelong]:checked').val();
$('#txtRotDistrict').val('');
$("#txtClubName").val('');
$('#txtinnerdistrict').val('');
$("#txtClubNameforother").val('');

if(selected==val) {
	if(val=='Rotarian' || val=='Rotaractor' ) {
		$('#districttr').show();
		$('#clubtr').show();
		$('#rotdistrict').show();
		$('#rotclub').show();
		$('#innerdistrict').hide();
		$('#innerclub').hide();
	}
	else if(val=='Inner Wheel Member') {
		$('#districttr').show();
		$('#clubtr').show();
		$('#innerdistrict').show();
		$('#innerclub').show();
		$('#rotdistrict').hide();
		$('#rotclub').hide();
	}
}
	else
	{
		$('#districttr').hide();
		$('#clubtr').hide();
		$('#innerdistrict').hide();
		$('#innerclub').hide();
		$('#rotdistrict').hide();
		$('#rotclub').hide();
	
	}

}


</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body onload="districtlist()">
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
                                       	  <h1 style="padding:0; margin:0">Registration for Grant Application</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
<form name="frmgrantappregist" action="grantApplicationRegistration.php" method="post" onsubmit="return validation();">
   
   				 <tr>
                    <td style=" padding:0 0 0 20px"><strong>You are <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="radio" name="txtbelong" value="Rotarian" onclick="changeDistrict(this.value)"/>Rotarian &nbsp;
						<input type="radio" name="txtbelong" value="Inner Wheel Member" onclick="changeDistrict(this.value)"/>Inner Wheel Member &nbsp;
						<input type="radio" name="txtbelong" value="Rotaractor" onclick="changeDistrict(this.value)"/>Rotaractor   </td>
                </tr>
				
				 <tr id="districttr" style="display:none">
                    <td style=" padding:0 0 0 20px"><strong><span>District Number </span><span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td>
					<span id="rotdistrict" style="display:none"><select id='txtRotDistrict' name='txtRotDistrict'  onchange='dispclub(this.value)'>
						<option value="">Select</option>
						</select></span>
						
					<span id="innerdistrict"  style="display:none"><input type="text" name="txtinnerdistrict" id="txtinnerdistrict"  onKeyPress="inputNumber(event,this.value,false);"  maxlength="4" />
					</span>
					</td>
                </tr>
				 
				
				<tr id="clubtr"  style="display:none">
					<td style=" padding:0 0 0 20px"><strong>Club</strong><span style="color:#FF0000">*</span></td>
					<td ><strong>:</strong></td>
					<td>
					<span id="rotclub" style="display:none">
					<select id="txtClubName" name="txtClubName"><option value="">Select</option></select>
					</span>
					<span id="innerclub" style="display:none">
					<input type="text" id="txtClubNameforother" name="txtClubNameforother" size="25px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
					</span></td>
				</tr>

				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Primary Contact Name <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtcontactname" id="txtcontactname"/>   </td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Primary Contact No. <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtcontactno" id="txtcontactno" onKeyPress="inputNumber(event,this.value,false);"  maxlength="12"/>   </td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Primary Contact Email  </strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtcontactemail" id="txtcontactemail"/>   </td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Username <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtusername" id="txtusername"/>   </td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Password <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="password" name="txtpassword" id="txtpassword"/>   </td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Re-type Password <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="password" name="txtrepassword" id="txtrepassword"/>   </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="btn_submit" id="btn_submit" value="Registered"  class="hed" style="cursor:pointer; border-radius:3px;" onclick="saveRegistration();" /> 
                        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="hed" style="cursor:pointer; border-radius:3px" />&nbsp;&nbsp;
					</td>
				</tr>
</form>         
</table>
 
        
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
	
	function validation(){
	
		
		if($('input[name=txtbelong]:checked').length<=0)
		{
		alert("Please choose from where you belong.");
		return false;
		}
		
		if($('input[name=txtbelong]:checked').val()=='Rotarian' || $('input[name=txtbelong]:checked').val()=='Rotaractor')
		{
			if($("#txtRotDistrict").val()==''){
			alert("Please choose district number.");
			$("#txtRotDistrict").focus();
			return false;
			}
			if($.trim($('#txtClubName').val())=='')
			{
			alert("Please enter club.");
			$("#txtClubName").focus();
			return false;
			}	
		}
		else if($('input[name=txtbelong]:checked').val()=='Inner Wheel Member' )
		{
			if($("#txtinnerdistrict").val()==''){
			alert("Please enter district number.");
			$("#txtinnerdistrict").focus();
			return false;
			}
			if($.trim($('#txtClubNameforother').val())=='')
			{
			alert("Please enter club.");
			$("#txtClubNameforother").focus();
			return false;
			}
		}
		
	
		if($.trim($('#txtcontactname').val())=='')
		{
		alert("Please enter Contact Person Name.");
		$("#txtcontactname").focus();
		return false;
		}
		if($.trim($('#txtcontactno').val())=='')
		{
		alert("Please enter Contact No.");
		$("#txtcontactno").focus();
		return false;
		}
		
		if($.trim($("#txtcontactemail").val())!="")
		{
			  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			 if(!expr.test($.trim($("#txtcontactemail").val())))
			 {
				alert("Invalid Email!");
				$("#txtcontactemail").focus();
				return false;
			 }
		}
		
		if($.trim($('#txtusername').val())=='')
		{
		alert("Please enter Username.");
		$("#txtusername").focus();
		return false;
		}
		
		if($.trim($('#txtpassword').val())=='')
		{
		alert("Please enter Password.");
		$("#txtpassword").focus();
		return false;
		}
		if($.trim($('#txtrepassword').val())=='')
		{
		alert("Please Re-type Password.");
		$("#txtrepassword").focus();
		return false;
		}
		if($.trim($('#txtpassword').val())!=$.trim($('#txtrepassword').val()))
		{
		alert("Password is not matched.");
		$("#txtrepassword").focus();
		return false;
		}
		return true;
	}
	
	/*function saveRegistration() {
		if(!validation())
		{
			return false;
		}
		
			var pars =$("form").serialize();
			alert(pars)
		$.ajax({                                      
			  url: 'saveRegistration.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
				
				if(data["success"]==1)
				{
				alert(data["msg"])
				
				//$('#hdnrefapplicationno').val(data["refno"]);
				//$("#nextfrm").submit();
				}
				else
				{
				alert(data["msg"])
				}
				}
			});
	}*/
	
</script>


</body>
</html>






