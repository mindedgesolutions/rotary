<?php
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Primer Order Form </title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
  
<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

 <link rel="stylesheet" type="text/css" href="js/jquery.datepick.css"> 
  
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
  

<script type="text/javascript">


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

function showUser(str) {
    if (str == "") {
        document.getElementById("txtRotDistrict").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtRotDistrict").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_user_009.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script type="text/javascript">
function showUser1(str) {
    if (str == "") {
        document.getElementById("txtClubName").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtClubName").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_user_009.php?p="+str,true);
		alert(str)
        xmlhttp.send();
    }
}
</script>

<!--function catlist()
{
var str = "";
$.ajax({                                      
      url: 'catlist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["category"]+"'>"+data[i]["category"]+"</option>";
				}
			}			 
			 	$("#txtRotCat").append(str);
		}
	});
}

function disp_dist(val)
{
	var str = "<option value=''>Select</option>";
	var pars ='status='+val;
	alert(pars);

$.ajax({                                      
      url: 'dist_list.php?status='+ pars,                    
      data: pars,
	  type:"get",
		dataType: 'json',
		success: function(data) 
      	{
			if(data.length>0)
			{
				for(var i=1; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["district_code"]+"'>"+data[i]["district_code"]+"</option>";
				alert(str);
				}
			}
			$("#txtRotDistrict").empty();
			$("#txtRotDistrict").append(str);			 
		}
	});
}

/*function districtlist()
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
}*/

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
				for(var i=1; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["club"]+"'>"+data[i]["club"]+"</option>";
				alert(str);
				}
			}
			$("#txtClubName").empty();
			$("#txtClubName").append(str);			 
		}
	});
}-->
</script>	

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	color: #800000;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!-- 

function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=350,left = 363,top = 144');");
}

// -->

</script>


</head>

<body onload="initcost();">
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!-- --------------------- LOGO AREA START ------------------- -->
        <?php include("logo_area.html") ?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("menu_area.html") ?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
       
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
                            <td width="100%" valign="top" >
                                <h1 align="left">Primer Order Form for Swabhiman</h1>
                              
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;" class="auto-style1">
									</div>
									
						        

<div id="form" style="padding:0 7px; margin:10px 0 0 0; "> 
<form name="frm" action="saveRPRForm.php" method="post"  onsubmit="return validation();"enctype="multipart/form-data">

<table border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; border-collapse:collapse; font-size:12px" align="center">
<tr>
	<td width="41%"><strong>Category <span style="color:#FF0000">*</span></strong></td>
	<td  width="3%" align="center"><strong>:</strong></td>
    <td  width="56%">
    <select name="txtRotCat" onchange="showUser(this.value)" id="txtRotCat">
     <option>Category</option>
     <?php
	 $sql= "select DISTINCT `category` from type";
	 $result = mysqli_query($link,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$data=$row['category'];
	echo '<option value="'.$data.'">'.$data.'</option>';
	} 
	?>
       </select>
    <!--<select id='txtRotCat' name='txtRotCat' onchange='disp_dist(this.value)'> 
    <option value="">Select</option>
    </select>-->
    </td>
</tr>
<tr>
	<td width="41%"><strong>District <span style="color:#FF0000">*</span></strong></td>
	<td  width="3%" align="center"><strong>:</strong></td>
    <td  width="56%">
    <select id='txtRotDistrict' name='txtRotDistrict' onchange="showUser1(this.value)"> 
    <option value="">Select</option>
    </select>
    </td>
</tr>
<tr>
	<td><strong>Name of person ordering <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict">
	<input type="text" id="txtname" name="txtname" style="width:99%"/></td>
</tr>

<tr>
    <td><strong>Address <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtAddress" name="txtAddress" size="50px" style="width:99%" /></td>
</tr>
<tr>
    <td><strong>City <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtCity" name="txtCity" size="50px" style="width:99%" /></td>
</tr>
<tr>
    <td><strong>State <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict">
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
    <td><strong>Pin <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict">
	<input type="text" id="txtPin" name="txtPin" size="50px" onKeyPress="inputNumber(event,this.value,false);"  maxlength="6" style="width:40%" /></td>
</tr>
<tr>
	<td><strong>Mobile No <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtMob" name="txtMob" maxlength="10"  onKeyPress="inputNumber(event,this.value,false);" style="width:40%"/></td>
</tr>
<tr>
	<td><strong>Email <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict">
	<input type="text" id="txtemail" name="txtemail" style="width: 296px"/></td>
</tr>
<tr>
	<td><strong>Designation <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><select id="chodesig" name="chodesig">
				<option value="">Select</option>
				<option value="DG">DG</option>
				<option value="ZLC">ZLC</option>
				<option value="DLCC">DLCC</option>
				<option value="DALCC">DALCC</option>
				<option value="Program Co-ordinator RIGD">Program Co-ordinator RIGD</option>
				<option value="PDG">PDG</option>
				<option value="DGE">DGE</option>
				<option value="DGN">DGN</option>
				<option value="Club President">Club President</option>
				<option value="Rotarian">Rotarian</option>
				<option value="Inner Wheel Member">Inner Wheel Member</option>
				<option value="Rotaractor">Rotaractor</option>
				<option value="Other">Other</option>
	</select></td>
</tr>
<tr>
	<td><strong>Name of Club <span style="color:#FF0000">*</span></strong></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict">
    <input type="text" id="txtClubName" name="txtClubName" style="width: 99%" />
    <!--<select id="txtClubName" name="txtClubName" style="width:99%">
    <option value="">Select</option>
    </select>--></td>
</tr>

<tr>
	<td><strong>Name of School <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict">
	<input type="text" id="txtSchoolName" name="txtSchoolName" style="width: 99%" /></td>
</tr>

<tr>
	<td><strong>City <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict">
	<input type="text" id="txtSchoolCity" name="txtSchoolCity" style="width: 279px" /></td>
</tr>
<tr>
	<td><strong>Pin Code <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtSchoolCityPin" name="txtSchoolCityPin"  size="50px" onKeyPress="inputNumber(event,this.value,false);"  maxlength="6"/></td>
</tr>

<tr>
	<td colspan="3" class="auto-style2"><strong>Address where toolkits are to be sent (Preferably of the person who is ordering)
	</strong></td>
</tr>

<tr>
    <td><strong>Address <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtshipAddress" name="txtshipAddress" size="50px" /></td>
</tr>
<tr>
    <td><strong>City <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtshipCity" name="txtshipCity" size="50px" /></td>
</tr>
<tr>
    <td><strong>State <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict">
    <select id="txtshipState" name="txtshipState" >
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
            <option value="Telengana">Telengana</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
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
    <td><strong>Pin <span style="color:#FF0000">*</span></strong></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict">
	<input type="text" id="txtshipPin" name="txtshipPin" size="50px" onKeyPress="inputNumber(event,this.value,false);"  maxlength="6" style="width: 140px" /></td>
</tr>


<tr>
	<td colspan="3">
		<table width="100%" border="0" cellpadding="2" cellspacing="2">
		<tr><td colspan="3"><strong>Toolkits required</strong> (Minimum 50 or in multiples of 50 per language)</td></tr>
		<tr><td><strong>Language</strong></td><td><strong>Number Required</strong></td><td><strong>Total Cost</strong><td></tr>
		<!--<tr>
			<td>Asamia </td><td><select id="txtNoAsamia" name="txtNoAsamia" class="totalAsamia" onchange="calculatetotalcost('totalAsamia','Asamiacost');">
			<option value="">Select</option>
            <option value="25">25</option>
			<option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option>
			</select>
		 </td>
		<td><input type="text" readonly="readonly" id="Asamiacost" name="Asamiacost"  class="totalcost"  /><td>
		</tr>-->
		<tr>
			<td>Bangla  </td><td>
			<select id="txtNoBangla" name="txtNoBangla" class="totalBangla" onchange="calculatetotalcost('totalBangla','Banglacost');">
			<option value="">Select</option>
			<!--<option value="25">25</option>-->
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option>
			</select>
			</td><td><input type="text" readonly="readonly"  id="Banglacost" name="Banglacost"  class="totalcost" /><td>
		</tr>
		
		<tr>
			<td>Gujarati  </td><td><select id="txtNoGujarati" name="txtNoGujarati" class="totalGujarati" onchange="calculatetotalcost('totalGujarati','Gujaraticost')" >
			<option value="">Select</option>
			<!--<option value="25">25</option>-->
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select>
			</td><td><input type="text" readonly="readonly"  id="Gujaraticost" name="Gujaraticost"  class="totalcost" /><td>
		</tr>
		<tr>
			<td>Hindi  </td><td><select  id="txtNoHindi" name="txtNoHindi" class="totalHindi" onchange="calculatetotalcost('totalHindi','Hindicost')"  ><option value="">Select</option>
			<!--<option value="25">25</option>-->
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Hindicost" name="Hindicost"  class="totalcost" /><td>
		</tr>
		<tr>
			<td>Kannada  </td>
            <td><select id="txtNoKannada" name="txtNoKannada" class="totalKannada"  onchange="calculatetotalcost('totalKannada','Kannadacost')" \ ><option value="">Select</option>
			<!--<option value="25">25</option>-->
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Kannadacost" name="Kannadacost"  class="totalcost" /><td>
		</tr>
		<!--<tr>
			<td>Manipuri  </td><td><select id="txtNoManipuri" name="txtNoManipuri" class="totalManipuri"  onchange="calculatetotalcost('totalManipuri','Manipuricost')" onfocus="disableautocompletion(this.id);" >
			<option value="">Select</option>
			<option value="25">25</option>
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option>
			</select></td><td><input type="text" readonly="readonly"  id="Manipuricost" name="Manipuricost"  class="totalcost" /><td>
		</tr>-->
		<tr>
			<td>Marathi  </td><td><select id="txtNoMarathi" name="txtNoMarathi" class="totalMarathi"  onchange="calculatetotalcost('totalMarathi','Marathicost')"  ><option value="">Select</option>
			<!--<option value="25">25</option>-->
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option>
			</select></td><td><input type="text" readonly="readonly"  id="Marathicost" name="Marathicost"  class="totalcost" /><td>
		</tr>
		<!--<tr>
			<td>Nepali  </td><td><select id="txtNoNepali" class="totalNepali" name="txtNoNepali"  onchange="calculatetotalcost('totalNepali','Nepalicost')" >
			<option value="">Select</option>
			<option value="25">25</option>
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Nepalicost" name="Nepalicost"  class="totalcost" /><td>
		</tr>-->

		<tr>
			<td>Odia   </td><td><select id="txtNoOdia" name="txtNoOdia" class="totalOdia" onchange="calculatetotalcost('totalOdia','Odiacost')"  ><option value="">Select</option>
			<!--<option value="25">25</option>-->
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Odiacost" name="Odiacost"  class="totalcost" /><td>
		</tr>
		<!--<tr>
			<td>Punjabi  </td><td><select id="txtNoPunjabi" name="txtNoPunjabi" class="totalPunjabi" onchange="calculatetotalcost('totalPunjabi','Punjabicost')"  ><option value="">Select</option>
			<option value="25">25</option>
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Punjabicost" name="Punjabicost"  class="totalcost" /><td>
		</tr>-->
		<!--<tr>
			<td>Urdu  </td><td><select id="txtNoUrdu" name="txtNoUrdu" class="totalUrdu"  onchange="calculatetotalcost('totalUrdu','Urducost')"  >
			<option value="">Select</option>
			<option value="25">25</option>
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Urducost" name="Urducost"  class="totalcost" /><td>
		</tr>-->
		<!--<tr>
			<td>Tamil  </td>
            <td><select id="txtNoTamil" name="txtNoTamil" class="totalTamil" onchange="calculatetotalcost('totalTamil','Tamilcost')" ><option value="">Select</option>
			<option value="25">25</option>
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Tamilcost" name="Tamilcost"  class="totalcost" /><td>
		</tr>-->
		<tr>
			<td>Telugu  </td>
            <td><select id="txtNoTelugu" name="txtNoTelugu" class="totalTelugu" onchange="calculatetotalcost('totalTelugu','Telugucost')"><option value="">Select</option>
			<!--<option value="25">25</option>-->
            <option value="50">50</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="250">250</option>
			<option value="300">300</option>
			<option value="350">350</option>
			<option value="400">400</option>
			<option value="450">450</option>
			<option value="500">500</option>
			<option value="550">550</option>
			<option value="600">600</option>
			<option value="650">650</option>
			<option value="700">700</option>
			<option value="750">750</option>
			<option value="800">800</option>
			<option value="850">850</option>
			<option value="900">900</option>
			<option value="950">950</option>
			<option value="1000">1000</option>
			<option value="1100">1100</option>
			<option value="1200">1200</option>
			<option value="1300">1300</option>
			<option value="1400">1400</option>
			<option value="1500">1500</option>
			<option value="1600">1600</option>
			<option value="1700">1700</option>
			<option value="1800">1800</option>
			<option value="1900">1900</option>
			<option value="2000">2000</option></select></td><td><input type="text" readonly="readonly"  id="Telugucost" name="Telugucost"  class="totalcost" /><td>
		</tr>
		<tr>
			<td>Grand Total  </td><td><input type="text" id="txtTotalToolkit" name="txtTotalToolkit"  onblur="totalToolkit() " maxlength="7" /></td><td><input type="text" id="Grandtotalcost" name="Grandtotalcost"  class="Grandtotalcost" onblur="estimatetotal('totalcost','Grandtotalcost'); estimatetotal('totalcost','txttotalammoutpaid')" /><td>
		</tr>
		</table>
	</td>
</tr>

<tr>
	<td><strong>Total amount to be paid <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict">
    <input type="text" id="txttotalammoutpaid" name="txttotalammoutpaid"  readonly="readonly" onKeyPress="inputNumber(event,this.value,false);" maxlength="5"/></td>
</tr>

<tr>
	<td colspan="3"><strong>Note :-</strong> 
Payment by Demand Draft / Pay Order / Cheque / RTGS payable at Kolkata has to be made in favour of “<strong>RSAS A/C Literacy Mission</strong>” and to be sent by Courier / Speed Post to Rotary India Literacy Mission – 145, Sarat Bose Road, Kolkata – 700026.
<br /><br />
For RTGS : <br />
Name: RSAS A/C Literacy Mission.<br />
Account Number: 037201003120.<br />
Bank: Icici Bank.<br />
Ifsc: ICIC0000372.<br />
Branch: 95, sarat bose road, kolkata 700026.<br />
<strong>In case of RTGS, NEFT please email us the scanned copy of the bank slip along with a cover letter to  admin@rotaryteach.org</strong> 
</td>
</tr>

<tr><td colspan="3">	<input type="hidden" id="hdncnt" name="hdncnt"  value="2" style="width:99%"/>
<div id="TextBoxesGroup"><div id="TextBoxDiv1"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" style="background-color:#999999">&nbsp;</td></tr>
<tr>
	<td><strong>DD / Pay Order No. / Cheque / RTGS No.<!--<span style="color:#FF0000">*</span>--></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtCheque1" name="txtCheque1" onblur="estimatetotal('totalcost','Grandtotalcost'); estimatetotal('totalcost','Grandtotalcost')" /></td>
</tr>

<tr>
	<td><strong>Amount <!--<span style="color:#FF0000">*</span>--></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtamount1" name="txtamount1" onKeyPress="inputNumber(event,this.value,true);" maxlength="10"/></td>
</tr>
<tr>
	<td><strong>Date<!--<span style="color:#FF0000">*</span>--></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtdate1" name="txtdate1" onfocus="dispcalender('txtdate1')"/></td>
</tr>


<tr>
	<td><strong>Bank Name<!--<span style="color:#FF0000">*</span>--></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtbankbranch1" name="txtbankbranch1"/></td>
</tr>

<tr>
	<td><strong>Attach Scanned copy of DD / Pay Order / Cheque / RTGS No.<!--<span style="color:#FF0000">*</span>--></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="file" id="txtDDcopy1" name="txtDDcopy1"/></td>
</tr>
</table></div></div></td></tr>

<tr><td colspan="3"><input type='button' value='Add More DD' id='addButton' onclick="AddmoreDD()"/>
<input type='button' value='Remove DD' id='removeButton' onclick="removeDD()"/> </td></tr>

<!--<tr><td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" style="background-color:#999999">&nbsp;</td></tr>
<tr>
	<td><strong>DD / Pay Order No.<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtCheque1" name="txtCheque1" onblur="estimatetotal('totalcost','Grandtotalcost'); estimatetotal('totalcost','Grandtotalcost')" /></td>
</tr>

<tr>
	<td><strong>Amount <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtamount1" name="txtamount1"    onKeyPress="inputNumber(event,this.value,true);" maxlength="10"/></td>
</tr>
<tr>
	<td><strong>Date<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtdate1" name="txtdate1"/></td>
</tr>


<tr>
	<td><strong>Bank Name<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtbankbranch1" name="txtbankbranch1"/></td>
</tr>

<tr>
	<td><strong>Attach Scanned copy of DD / Pay Order<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="file" id="txtDDcopy1" name="txtDDcopy1"/></td>
</tr>
</table></td></tr>
<tr><td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" style="background-color:#999999">&nbsp;</td></tr>
<tr>
	<td><strong>DD / Pay Order No.<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtCheque2" name="txtCheque2" onblur="estimatetotal('totalcost','Grandtotalcost'); estimatetotal('totalcost','Grandtotalcost')" /></td>
</tr>

<tr>
	<td><strong>Amount <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtamount2" name="txtamount2"    onKeyPress="inputNumber(event,this.value,true);" maxlength="10"/></td>
</tr>
<tr>
	<td><strong>Date<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtdate2" name="txtdate2"/></td>
</tr>


<tr>
	<td><strong>Bank Name<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtbankbranch2" name="txtbankbranch2"/></td>
</tr>

<tr>
	<td><strong>Attach Scanned copy of DD / Pay Order<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="file" id="txtDDcopy2" name="txtDDcopy2"/></td>
</tr>
</table></td></tr>
<tr><td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" style="background-color:#999999">&nbsp;</td></tr>
<tr>
	<td><strong>DD / Pay Order No.<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtCheque3" name="txtCheque3" onblur="estimatetotal('totalcost','Grandtotalcost'); estimatetotal('totalcost','Grandtotalcost')" /></td>
</tr>

<tr>
	<td><strong>Amount <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtamount3" name="txtamount3"    onKeyPress="inputNumber(event,this.value,true);" maxlength="10"/></td>
</tr>
<tr>
	<td><strong>Date<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtdate3" name="txtdate3"/></td>
</tr>


<tr>
	<td><strong>Bank Name<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtbankbranch3" name="txtbankbranch3"/></td>
</tr>

<tr>
	<td><strong>Attach Scanned copy of DD / Pay Order<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="file" id="txtDDcopy3" name="txtDDcopy3"/></td>
</tr>
</table></td></tr>
<tr><td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" style="background-color:#999999">&nbsp;</td></tr>
<tr>
	<td><strong>DD / Pay Order No.<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtCheque4" name="txtCheque4" onblur="estimatetotal('totalcost','Grandtotalcost'); estimatetotal('totalcost','Grandtotalcost')" /></td>
</tr>

<tr>
	<td><strong>Amount <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtamount4" name="txtamount4"    onKeyPress="inputNumber(event,this.value,true);" maxlength="10"/></td>
</tr>
<tr>
	<td><strong>Date<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtdate4" name="txtdate4"/></td>
</tr>


<tr>
	<td><strong>Bank Name<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtbankbranch4" name="txtbankbranch4"/></td>
</tr>

<tr>
	<td><strong>Attach Scanned copy of DD / Pay Order<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="file" id="txtDDcopy4" name="txtDDcopy4"/></td>
</tr>
</table></td></tr>
<tr><td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="3" style="background-color:#999999">&nbsp;</td></tr>
<tr>
	<td><strong>DD / Pay Order No.<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtCheque5" name="txtCheque5" onblur="estimatetotal('totalcost','Grandtotalcost'); estimatetotal('totalcost','Grandtotalcost')" /></td>
</tr>

<tr>
	<td><strong>Amount <span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtamount5" name="txtamount5"    onKeyPress="inputNumber(event,this.value,true);" maxlength="10"/></td>
</tr>
<tr>
	<td><strong>Date<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtdate5" name="txtdate5"/></td>
</tr>


<tr>
	<td><strong>Bank Name<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtbankbranch5" name="txtbankbranch5"/></td>
</tr>

<tr>
	<td><strong>Attach Scanned copy of DD / Pay Order<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="file" id="txtDDcopy5" name="txtDDcopy5"/></td>
</tr>
</table></td></tr>-->

<tr>
	<td><strong>Attach Scanned copy of Filled up
	<a href="http://www.rotaryteach.org/Global_Dream/School%20Commitment%20Form.pdf" target="_blank">School Commitment Form</a> [Attach image files only(jpg/gif)]<span style="color:#FF0000">*</span></strong></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="file" id="txtSCFcopy" name="txtSCFcopy"/></td>
</tr>

<tr>
	<td colspan="3" align="center">
    	<input type="submit" name="btnSave" id="btnSave" value="SUBMIT" title="Submit detail to Register" style="background:#0099FF; text-shadow:0 1px 1px #000000; padding:10px 50px; color:#ffffff; font-weight:bold; cursor:pointer; border-radius:5px; border:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; letter-spacing:1px"/>    </td>
</tr>
</table>
</form>

</div>


</p>
								

                            </td>
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("footer_area.html") ?>
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
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>

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
	
	function dispcalender(id) {
	$('#'+id).datepick({dateFormat: 'dd-mm-yyyy'}); 
	
	}
	 //$('#txtdate1,#txtdate2,#txtdate3,#txtdate4,#txtdate5').datepick({dateFormat: 'dd-mm-yyyy'}); 
	 
function AddmoreDD()
{
 
   var counter =  parseInt($("#hdncnt").val());
 	var moreoptionstr = "";
	if(counter>5){
            alert("Only 5 DD allow");
            return false;
	}   

	/*var newTextBoxDiv = $(document.createElement('div'))
	 .attr("id", 'TextBoxDiv' + counter);*/
	var dtfunct = "dispcalender('txtdate"+counter+"')";	 
	moreoptionstr =moreoptionstr+'<div id="TextBoxDiv'+counter+'">';
	moreoptionstr =moreoptionstr+'<table width="100%" border="0" cellpadding="0" cellspacing="0">';
moreoptionstr =moreoptionstr+'<tr><td colspan="3" style="background-color:#999999">&nbsp;</td></tr>';
moreoptionstr =moreoptionstr+'<tr><td><strong>DD / Pay Order No. / Cheque<span style="color:#FF0000">*</span></strong></td><td align="center">:</td><td class="spandistrict"><input type="text" id="txtCheque'+counter+'" name="txtCheque'+counter+'" /></td></tr>';
moreoptionstr =moreoptionstr+'<tr><td><strong>Amount <span style="color:#FF0000">*</span></strong></td><td align="center">:</td><td class="spandistrict"><input type="text" id="txtamount'+counter+'" name="txtamount'+counter+'" onKeyPress="inputNumber(event,this.value,true);" maxlength="10"/></td></tr>';
moreoptionstr =moreoptionstr+'<tr><td><strong>Date<span style="color:#FF0000">*</span></strong></td><td align="center">:</td><td class="spandistrict"><input type="text" id="txtdate'+counter+'" name="txtdate'+counter+'" onfocus="'+dtfunct+'"   /></td></tr>';
moreoptionstr =moreoptionstr+'<tr><td><strong>Bank Name<span style="color:#FF0000">*</span></strong></td><td align="center">:</td><td class="spandistrict"><input type="text" id="txtbankbranch'+counter+'" name="txtbankbranch'+counter+'"/></td></tr>'

moreoptionstr =moreoptionstr+'<tr><td><strong>Attach Scanned copy of DD / Pay Order / Cheque<span style="color:#FF0000">*</span></strong></td><td align="center">:</td><td class="spandistrict"><input type="file" id="txtDDcopy'+counter+'" name="txtDDcopy'+counter+'"/></td></tr>'

moreoptionstr =moreoptionstr+'</table></div>'	 
 
	//newTextBoxDiv.after().html(moreoptionstr);
////newTextBoxDiv.append(moreoptionstr);
// moreoptionstr.appendTo("#TextBoxesGroup");
 $("#TextBoxesGroup").append(moreoptionstr);
 
 	counter =counter+1;
  $("#hdncnt").val(counter);

 
}
    function removeDD() {
   var counter = $("#hdncnt").val();
	
	if(counter==2){
          alert("No more DD to remove");
          return false;
       }   
 
	counter=counter-1;
   $("#hdncnt").val(counter);

        $("#TextBoxDiv" + counter).remove();
 
    }

	function disableautocompletion(id1){ 
	 var passwordControl=document.getElementById(id1);
	 passwordControl.setAttribute("autocomplete","off");
}


function calculatetotalcost(classformultiply, idfordisplay){

        $("."+classformultiply).each(function() {
 
            $(this).change(function(){
                calculateMulti(classformultiply,idfordisplay);
            });
        });
		totalToolkit();
    }

function calculateMulti(classformultiply,idfordisplay) {
        //iterate through each textboxes and add the values
 var multiple ='';      
   $("."+classformultiply).each(function() {
 
			
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
       		    multiple =100;
               multiple *= parseFloat(this.value);
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
		if(multiple!='')
        $("#"+idfordisplay).val(multiple.toFixed(2));
		else
		$("#"+idfordisplay).val('');
	//	}
    }



	function estimatetotal(classforadd,idfordisplay) {
	
			var add = 0;
                $("."+classforadd).each(function() {
		 if(!isNaN(this.value) && this.value.length!=0) {	
                    add += parseFloat($(this).val());
				}
                });
		 $("#"+idfordisplay).val(add.toFixed(2));
	
	}
	
	function converttonumber(val)
	{
	
	 if(isNaN(val) || val=='') 
	 return 0;
	 else
	  return val;
	
	}
	
	function totalToolkit(){
		var NoofToolkit = parseFloat(converttonumber($('#txtNoAsamia').val()))+parseFloat(converttonumber($('#txtNoBangla').val()))+parseFloat(converttonumber($('#txtNoGujarati').val()))+parseFloat(converttonumber($('#txtNoHindi').val()))+parseFloat(converttonumber($('#txtNoKannada').val()))+parseFloat(converttonumber($('#txtNoManipuri').val()))+parseFloat(converttonumber($('#txtNoMarathi').val()))+parseFloat(converttonumber($('#txtNoNepali').val()))+parseFloat(converttonumber($('#txtNoOdia').val()))+parseFloat(converttonumber($('#txtNoPunjabi').val()))+parseFloat(converttonumber($('#txtNoUrdu').val()))+parseFloat(converttonumber($('#txtNoTamil').val()))+parseFloat(converttonumber($('#txtNoTelugu').val()))
		
	 $('#txtTotalToolkit').val(NoofToolkit)
		
		 $('#Grandtotalcost').val((NoofToolkit*100).toFixed(2))	 
		 $('#txttotalammoutpaid').val((NoofToolkit*100).toFixed(2))
	}
	
function initcost(){
//calculatetotalcost('totalAsamia','Asamiacost');
calculatetotalcost('totalBangla','Banglacost');
calculatetotalcost('totalGujarati','Gujaraticost');
calculatetotalcost('totalHindi','Hindicost');
calculatetotalcost('totalKannada','Kannadacost');
//calculatetotalcost('totalManipuri','Manipuricost');
calculatetotalcost('totalMarathi','Marathicost');
//calculatetotalcost('totalNepali','Nepalicost');
calculatetotalcost('totalOdia','Odiacost');
//calculatetotalcost('totalPunjabi','Punjabicost');
//calculatetotalcost('totalUrdu','Urducost');
//calculatetotalcost('totalTamil','Tamilcost');
calculatetotalcost('totalTelugu','Telugucost');
}


	 	
function validation(){
	
    if($("#txtRotDistrict").val()=='') {
	alert("Choose Rotary District");
		$("#txtRotDistrict").focus();
		return false;
	}
	if($("#txtname").val()=='' )
	{
		alert("Enter Name.");
			$("#txtname").focus();
			return false;
	}
	if($("#txtAddress").val()=='' )
	{
		alert("Enter Address.");
			$("#txtAddress").focus();
			return false;
	}
	if($("#txtCity").val()=='' )
	{
		alert("Enter City.");
			$("#txtCity").focus();
			return false;
	}
	if($("#txtState").val()=='' )
	{
		alert("Enter State.");
			$("#txtState").focus();
			return false;
	}
	
	if($("#txtPin").val()=='' )
	{
		alert("Enter Pin.");
			$("#txtPin").focus();
			return false;
	}
	
	if($.trim($("#txtMob").val())=="")
	{
		alert("Enter Contact NO.");
		$("#txtMob").focus();
		return false;
	}
		
	if($.trim($("#txtMob").val())!="" && ($("#txtMob").val()).length <10) 
	{
		alert("Mobile No must have 10 digit.");
		$("#txtMob").focus();
		return false;
	}
	if($.trim($("#txtemail").val())!="")
	{
		  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 if(!expr.test($.trim($("#txtemail").val())))
		 {
		 	alert("Invalid Email!");
			$("#txtemail").focus();
			return false;
		 }
	}
	if($("#chodesig").val()=='' )
	{
		alert("Choose Designation  .");
			$("#chodesig").focus();
			return false;
	}

	if($("#txtClubName").val()=='' )
	{
		alert("Enter Club Name.");
			$("#txtClubName").focus();
			return false;
	}

	if($("#txtSchoolName").val()=='' )
	{
		alert("Enter Name of School.");
			$("#txtSchoolName").focus();
			return false;
	}
	
	if($("#txtSchoolCity").val()=='' )
	{
		alert("Enter City of School.");
			$("#txtSchoolCity").focus();
			return false;
	}
	
	if($("#txtSchoolCityPin").val()=='' )
	{
		alert("Enter Pin Code.");
			$("#txtSchoolCityPin").focus();
			return false;
	}
	
	if($("#txtshipAddress").val()=='' )
	{
		alert("Enter Address where toolkits are to be sent.");
			$("#txtshipAddress").focus();
			return false;
	}
	if($("#txtshipCity").val()=='' )
	{
		alert("Enter City where toolkits are to be sent.");
			$("#txtshipCity").focus();
			return false;
	}
	if($("#txtshipState").val()=='' )
	{
		alert("Enter State where toolkits are to be sent.");
			$("#txtshipState").focus();
			return false;
	}
	
	if($("#txtshipPin").val()=='' )
	{
		alert("Enter Pin where toolkits are to be sent.");
			$("#txtshipPin").focus();
			return false;
	}


	if($("#Grandtotalcost").val()=='' )
	{
		alert("Enter Total Cost of toolkit.");
			$("#Grandtotalcost").focus();
			return false;
	}
	/*if($("#txtCheque1").val()=='' )
	{
		alert("Enter DD / Pay Order No.");
			$("#txtCheque1").focus();
			return false;
	}
	
	if($("#txtamount1").val()=='' )
	{
		alert("Enter Amount of DD / Pay Order No.");
			$("#txtamount1").focus();
			return false;
	}
	if($("#txtdate1").val()=='' )
	{
		alert("Enter Date of Cheque.");
			$("#txtdate1").focus();
			return false;
	}
	
	if($("#txtbankbranch1").val()=='' )
	{
		alert("Enter Bank  & Branch.");
			$("#txtbankbranch1").focus();
			return false;
	}
	if($("#txtDDcopy1").val()=='' )
	{
		alert("Upload scanned copy of DD / Pay Order No.");
			$("#txtDDcopy1").focus();
			return false;
	}*/
	
	if($("#txtCheque2").val()!='' || $("#txtamount2").val()!='' || $("#txtdate2").val()!='' || $("#txtbankbranch2").val()!='' || $("#txtDDcopy2").val()!='')
	{
	
	if($("#txtCheque2").val()=='') {
		alert("Enter DD / Pay Order No.");
			$("#txtCheque2").focus();
			return false;
	}
	
	if($("#txtamount2").val()=='' )
	{
		alert("Enter Amount of DD / Pay Order No.");
			$("#txtamount2").focus();
			return false;
	}
	if($("#txtdate2").val()=='' )
	{
		alert("Enter Date of Cheque.");
			$("#txtdate2").focus();
			return false;
	}
	
	if($("#txtbankbranch2").val()=='' )
	{
		alert("Enter Bank  & Branch.");
			$("#txtbankbranch2").focus();
			return false;
	}
	if($("#txtDDcopy2").val()=='' )
	{
		alert("Upload scanned copy of DD / Pay Order No.");
			$("#txtDDcopy2").focus();
			return false;
	}
}

	if($("#txtCheque3").val()!='' || $("#txtamount3").val()!='' || $("#txtdate3").val()!='' || $("#txtbankbranch3").val()!='' || $("#txtDDcopy3").val()!='')
	{
	
	if($("#txtCheque3").val()=='') {
		alert("Enter DD / Pay Order No.");
			$("#txtCheque3").focus();
			return false;
	}
	if($("#txtamount3").val()=='' )
	{
		alert("Enter Amount of DD / Pay Order No.");
			$("#txtamount3").focus();
			return false;
	}
	if($("#txtdate3").val()=='' )
	{
		alert("Enter Date of Cheque.");
			$("#txtdate3").focus();
			return false;
	}
	
	if($("#txtbankbranch3").val()=='' )
	{
		alert("Enter Bank  & Branch.");
			$("#txtbankbranch3").focus();
			return false;
	}
	if($("#txtDDcopy3").val()=='' )
	{
		alert("Upload scanned copy of DD / Pay Order No.");
			$("#txtDDcopy3").focus();
			return false;
	}
}	
	if($("#txtCheque4").val()!='' || $("#txtamount4").val()!='' || $("#txtdate4").val()!='' || $("#txtbankbranch4").val()!='' || $("#txtDDcopy4").val()!='')
	{
	
	if($("#txtCheque4").val()=='') {
		alert("Enter DD / Pay Order No.");
			$("#txtCheque4").focus();
			return false;
	}
	if($("#txtamount4").val()=='' )
	{
		alert("Enter Amount of DD / Pay Order No.");
			$("#txtamount4").focus();
			return false;
	}
	if($("#txtdate4").val()=='' )
	{
		alert("Enter Date of Cheque.");
			$("#txtdate4").focus();
			return false;
	}
	
	if($("#txtbankbranch4").val()=='' )
	{
		alert("Enter Bank  & Branch.");
			$("#txtbankbranch4").focus();
			return false;
	}
	if($("#txtDDcopy4").val()=='' )
	{
		alert("Upload scanned copy of DD / Pay Order No.");
			$("#txtDDcopy4").focus();
			return false;
	}
}	
	if($("#txtCheque5").val()!='' || $("#txtamount5").val()!='' || $("#txtdate5").val()!='' || $("#txtbankbranch5").val()!='' || $("#txtDDcopy5").val()!='')
	{
	
	if($("#txtCheque5").val()=='') {
		alert("Enter DD / Pay Order No.");
			$("#txtCheque5").focus();
			return false;
	}
	if($("#txtamount5").val()=='' )
	{
		alert("Enter Amount of DD / Pay Order No.");
			$("#txtamount5").focus();
			return false;
	}
	if($("#txtdate5").val()=='' )
	{
		alert("Enter Date of Cheque.");
			$("#txtdate5").focus();
			return false;
	}
	
	if($("#txtbankbranch5").val()=='' )
	{
		alert("Enter Bank  & Branch.");
			$("#txtbankbranch5").focus();
			return false;
	}
	if($("#txtDDcopy5").val()=='' )
	{
		alert("Upload scanned copy of DD / Pay Order No.");
			$("#txtDDcopy5").focus();
			return false;
	}
}		
	if($("#txtSCFcopy").val()=='' )
	{
		alert("Upload Scanned copy of School Contract Form .");
			$("#txtSCFcopy").focus();
			return false;
	}
	
totalToolkit();
return true;

}

</script>


</body>
</html>






