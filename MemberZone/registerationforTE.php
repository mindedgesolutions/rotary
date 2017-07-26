<?php 
include("connection.php");
$msg ="";
if(isset($_POST["btnSave"]))
{
$district = $_POST["txtRotDistrict"];
$club= $_POST["txtClubName"];
$schooltype= $_POST["choSchoolType"];
$name= $_POST["txtpersonname"];
$mobno= $_POST["txtmob"];
$username= $_POST["txtusername"];
$password= $_POST["txtpwd"];
$email= $_POST["txtemail"];
$schoolname= $_POST["txtschoolname"];
$schooladdr= $_POST["txtschooladdr"];
$city= $_POST["txtcity"];
$state= $_POST["txtState"];
$submitdt=date('d-m-Y');

$checkqry = "SELECT count(id) as avail FROM teacherevaluationuser WHERE username='".$username."';";
$result = mysqli_query($link,$checkqry);

		$row[] = mysqli_fetch_assoc($result);
		if($row[0]["avail"]>0) {
			$msg = "Username already exist. Please try with other username.";
		}
		else
		{
		$query = "insert into teacherevaluationuser(district,club,name,mobno,username,password,email,submitdt) values('".$district."','".$club."','".$name."','".$mobno."','".$username."','".$password."','".$email."','".$submitdt."');"; 
		
		if(mysqli_query($link,$query)) {
		$msg = "Thank you for registraion.";
		}
			
		
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Registration</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<!--<link href="css/header_area.css" rel="stylesheet" type="text/css" />-->
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

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


<!--<link href="button/style.css" rel="stylesheet" type="text/css" />-->




<!--<script type="text/javascript" src="../js/jquery-1.2.6.min.js"></script>-->

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



function validation(){
	
	if($("#txtRotDistrict").val()=='') {
	alert("Choose Rotary District");
		$("#txtRotDistrict").focus();
		return false;
	}
	if($("#txtClubName").val()=='' )
	{
		alert("Enter Club Name.");
			$("#txtClubName").focus();
			return false;
	}


	/*if($("#choSchoolType").val()=='' )
	{
		alert("Choose School Type.");
			$("#choSchoolType").focus();
			return false;
	}*/

	if($("#txtpersonname").val()=='' )
	{
		alert("Enter name of person filling form.");
			$("#txtpersonname").focus();
			return false;
	}
	/*if($.trim($("#txtMob").val())=="") 
	{
		alert("Enter Mobile No.");
		$("#txtMob").focus();
		return false;
	}*/
	if($.trim($("#txtMob").val())!="" && ($("#txtMob").val()).length <10) 
	{
		alert("Mobile No must have 10 digit.");
		$("#txtMob").focus();
		return false;
	}
	if($("#txtusername").val()=='' )
	{
		alert("Enter Username.");
			$("#txtusername").focus();
			return false;
	}
	
	if($("#txtpwd").val()=='' )
	{
		alert("Enter Password.");
			$("#txtpwd").focus();
			return false;
	}
	
	if($.trim($("#txtemail").val())=="")
	{
		alert("Enter your  Email address.");
		$("#txtemail").focus();
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
	/*if($.trim($("#txtschoolname").val())=="") 
	{
		alert("Enter School Name.");
		$("#txtschoolname").focus();
		return false;
	}
	if($.trim($("#txtschooladdr").val())=="") 
	{
		alert("Enter School Address.");
		$("#txtschooladdr").focus();
		return false;
	}	
	
	if($.trim($("#txtcity").val())=="") 
	{
		alert("Enter City.");
		$("#txtcity").focus();
		return false;
	}
	if($.trim($("#txtState").val())=="") 
	{
		alert("Choose State.");
		$("#txtState").focus();
		return false;
	}	
	*/
return true;
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
/*function chkcountry(val) {

if(val=='India') {
	$('#indiaState').show()
	$('#otherCountryState').hide();
}
else
{
	$('#indiaState').hide()
	$('#otherCountryState').show();

}
}*/


function newcaptcha()
{
var c_currentTime = new Date();
var c_miliseconds = c_currentTime.getTime();

document.getElementById('cptchimg').src = 'captcha.php?x='+ c_miliseconds;
}


</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
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

<body onload="districtlist();">
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
        <?php include("header_area.html") ?>
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
                                <h1>Registration for Teacher Evaluation</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
								
								<span style="font-size:14px; font-weight:bold; color:#FF0000"><?php echo $msg;?></span> 
<br />

<div id="registerform" style="padding:0 7px; margin:10px 0 0 0"> 
<form name="frm" action="registerationforTE.php" method="post" enctype="multipart/form-data" onsubmit="return validation();">
<table border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; border-collapse:collapse; font-size:12px" align="center">

<tr>
	<td width="35%"><strong>Rotary District</strong><span style="color:#FF0000">*</span></td>
	<td width="3%" align="center"><strong>:</strong></td>
    <td width="62%" class="spandistrict"><select id='txtRotDistrict' name='txtRotDistrict' onchange='dispclub(this.value)'>
    <option value="">Select</option>
    </select>
    </td>
</tr>
<tr>
	<td><strong>Rotary Club</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><select id="txtClubName" name="txtClubName"><option value="">Select</option></select></td>
</tr>

<!--<tr>
	<td><strong>Select School type </strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><select id="choSchoolType" name="choSchoolType">
	<option value="">Select</option>
	<option value="Govt. School">Govt. School</option>
	<option value="Zilla Parishad">Zilla Parishad</option>
	<option value="Gram Panchayat">Gram Panchayat</option>
	<option value="Municipal School">Municipal School</option>
	</select></td>
</tr>-->

<tr>
	<td><strong>Name of the Person filling the form</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtpersonname" name="txtpersonname" style="width:99%" /></td>
</tr>

<tr>
	<td><strong>Mobile No.</strong></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtmob" name="txtmob" maxlength="10"  onKeyPress="inputNumber(event,this.value,false);" style="width:99%"/></td>
</tr>

<tr>
	<td><strong>Username</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtusername" name="txtusername" style="width:99%" /></td>
</tr>

<tr>
	<td><strong>Password</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="password" id="txtpwd" name="txtpwd" style="width:99%" /></td>
</tr>
<tr>
	<td><strong>Email</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtemail" name="txtemail" style="width:99%" /></td>
</tr>

<!--<tr>
	<td><strong>Name of the School</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtschoolname" name="txtschoolname" /></td>
</tr>
<tr>
	<td><strong>Address of the School</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><textarea id="txtschooladdr" name="txtschooladdr" ></textarea></td>
</tr>
<tr>
	<td><strong>city</strong><span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><input type="text" id="txtcity" name="txtcity" /></td>
</tr>


<tr>
    <td><strong>State</strong><span style="color:#FF0000">*</span></td>
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
</tr>-->
<tr>
	<td colspan="3" align="center">
    	<input type="submit" name="btnSave" id="btnSave" value="SUBMIT" title="Submit detail to Register" style="background:#0099FF; text-shadow:0 1px 1px #000000; padding:10px 50px; color:#ffffff; font-weight:bold; cursor:pointer; border-radius:5px; border:0; font-family:Arial, Helvetica, sans-serif; font-size:14px; letter-spacing:1px" class="link"/> &nbsp;<a href="loginforTE.php" style="color:#CC0000; font-weight:bold; font-size:14px">Login</a>
    </td>
</tr>


</table>
</form>
</div>
</p>
								

                            </td>
                            <td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("inner_right.html") ?>
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

<script type="text/javascript">

function allowsubmit(obj) {
document.getElementById("btnSave").disabled=!obj.checked

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






