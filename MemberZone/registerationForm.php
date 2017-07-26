<?php session_start();?>
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

function getOption(val) {

//window.open("registerationForm.php?for="+val,"_blank");

	/*if(val=='Rotarian') {
	$("#registerform").show();
	$("#labeldist").show();
	$("#labelclub").show();
	$("#rotarianStatus").show();
	}
	else
	{
	
	$("#registerform").show();
	$("#labeldist").hide();
	$("#labelclub").hide();
	$("#rotarianStatus").hide();
	}*/
}


function validation(){


	if($.trim($("#txtfirstName").val())=="") 
	{
		alert("Enter your Name.");
		$("#txtfirstName").focus();
		return false;
	}
	if($.trim($("#txtlastName").val())=="") 
	{
		alert("Enter your Last Name.");
		$("#txtlastName").focus();
		return false;
	}
	if("<?php echo $_GET["for"]?>"!='Inner Wheel Member' && "<?php echo $_GET["for"]?>"!='Others')
	{
		if($("#txtRotDistrict").val()=='') {
		alert("Choose Rotary District");
			$("#txtRotDistrict").focus();
			return false;
		}
	}
	
	if("<?php echo $_GET["for"]?>"=='Inner Wheel Member'  && $("#txtInnerwheelRotDistrict").val()=='' )
	{
		if($("#txtInnerwheelRotDistrict").val()=='') {
		alert("Enter District of Inner Wheel Member");
			$("#txtInnerwheelRotDistrict").focus();
			return false;
		}
	}
	
	if($.trim($("#txtRotDistrict").val())!="" && ($("#txtRotDistrict").val()).length !=4) {
				alert("Rotary District must be four digit");
				$("#txtRotDistrict").focus();
				return false;
		}
if($.trim($("#txtInnerwheelRotDistrict").val())!="" && ($("#txtInnerwheelRotDistrict").val()).length !=3) {
				alert("Inner Wheel District must be three digit");
				$("#txtInnerwheelRotDistrict").focus();
				return false;
		}

if("<?php echo $_GET["for"]?>"!='Others' && $("#txtClubName").val()=='' )
{
	alert("Enter Club Name.");
		$("#txtClubName").focus();
		return false;
}

		

	if($.trim($("#txtCountry").val())=="") 
	{
		alert("Choose country.");
		$("#txtCountry").focus();
		return false;
	}
	
	if($.trim($("#txtCity").val())=="") 
	{
		alert("Enter City.");
		$("#txtCity").focus();
		return false;
	}
	if($.trim($("#txtState").val())=="") 
	{
		alert("Choose State.");
		$("#txtState").focus();
		return false;
	}	
	
	if($.trim($("#txtPin").val())=="") 
	{
		alert("Enter Pin code.");
		$("#txtPin").focus();
		return false;
	}	
	
	if($.trim($("#txtMob").val())=="") 
	{
		alert("Enter Mobile No.");
		$("#txtMob").focus();
		return false;
	}
	if($.trim($("#txtMob").val())!="" && ($("#txtMob").val()).length <10) 
	{
		alert("Mobile No must have 10 digit.");
		$("#txtMob").focus();
		return false;
	}
	
	if($.trim($("#txtEmail").val())=="")
	{
		alert("Enter your  Email address.");
		$("#txtEmail").focus();
		return false;
	}
	if($.trim($("#txtEmail").val())!="")
	{
		  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 if(!expr.test($.trim($("#txtEmail").val())))
		 {
		 	alert("Invalid Email!");
			$("#txtEmail").focus();
			return false;
		 }
	}
	
	 if($('.voluntarea:checked').length ==0)
		{
		alert("Please choose area to volunteer.");
		return false;
		}
		
	if($.trim($("#nosofhours").val())=="") 
	{
		alert("Enter How much time do you wish to volunteer.");
		$("#nosofhours").focus();
		return false;
	}
	 if($('input[name=optVolnttime]:checked').length<=0)
		{
		alert("Please checked Day or Week.");
		return false;
		}
 
	if($.trim($("#nosofmonthstowork").val())=="") 
	{
		alert("Enter how many months do you wish to work.");
		$("#nosofmonthstowork").focus();
		return false;
	}
	
	 if($('input[name=optmonthworktype]:checked').length<=0)
		{
		alert("Please checked Continoue or In Phase.");
		return false;
		}
	if($('.workarea:checked').length ==0)	
		{
		alert("Please choose geographical area of work.");
		return false;
		}

if("<?php echo $_GET["for"]?>"=='RCCMember' && $("#txtRCCName").val()=='' )
{
	alert("Enter name of RCC memeber");
		$("#txtRCCName").focus();
		return false;
}
	
			if(document.getElementById("txtcaptcha").value.trim()=="")
		{
			alert("Please Enter Captcha value.");
			document.getElementById("txtcaptcha").focus();
			return false;
		}
	
		$.ajax({
					type: "POST",
					url: "captchavalid.php", 
					data:"captchastr="+document.getElementById("txtcaptcha").value,
					dataType:'json',
					success: function(obj)
							{
						
								if(obj.msg=="1")
								{
									document.forms["frm"].submit();	
									return true;
								}
								else
								{
									
									$("input#txtcaptcha").val("");
									$("input#txtcaptcha").focus();
									return false;
								}
							},
					error: function()
							{
								alert("Error occured");
							}
				 });	

	
return false;
}
function showexper(val) {
$('#projectName').val('');
$('#experianceDetail').val('');
$('#explocation').val('');
$('#contactperson').val('');
$('#partneragency').val('');
$('#expcontact').val('');

if(val=='Yes') 
$('#experianceInfo').show()
else
$('#experianceInfo').hide()

}

function showisteacher(val) {
$('#teachlevel').val('');
$('#teachlang').val('');

if(val=='Yes') 
$('#teachInfo').show()
else
$('#teachInfo').hide()

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
                                <h1>Volunteer Registration (For <?php echo $_GET["for"];?>)</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
  <?php if($_GET["for"]=="Others") {?>                              
<span style="font-weight:bold; color:#FF0000; font-size:14px">You need to be minimum 18 years of age to register as volunteer.</span>
<?php }?>

<br />
<form name="frm" action="registration.php" method="post" enctype="multipart/form-data" ><!--onsubmit="return validation();"-->

<div id="registerform" style="padding:0 7px; margin:10px 0 0 0"> 
<table border="0" cellpadding="0" cellspacing="5" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
<input type="hidden" name="optrotarion" id="optrotarion" value="<?php echo $_GET["for"]?>" />
<tr>
    <td width="40%"><strong>First Name</strong><span style="color:#FF0000">*</span></td>
    <td width="2%" align="center"><strong>:</strong></td>
    <td width="58%"><input type="text" id="txtfirstName" name="txtfirstName"  size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr>
    <td width="40%"><strong>Middle Name</strong></td>
    <td width="2%" align="center"><strong>:</strong></td>
    <td width="58%"><input type="text" id="txtmidName" name="txtmidName"  size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>

<tr>
    <td width="40%"><strong>Last Name</strong><span style="color:#FF0000">*</span></td>
    <td width="2%" align="center"><strong>:</strong></td>
    <td width="58%"><input type="text" id="txtlastName" name="txtlastName"  size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>
<?php if($_GET["for"]!='Inner Wheel Member') { 
if($_GET["for"]=='Others') {$disttext= "<strong>Which rotary area you belong to</strong>"; }
else {
$disttext= '<strong>Rotary District</strong><span style="color:#FF0000">*</span>';
}
?>
<tr id="labeldist">
    <td><?php echo $disttext;?></td>
    <td align="center"><strong>:</strong></td>
    <td class="spandistrict"><select id='txtRotDistrict' name='txtRotDistrict' onchange='dispclub(this.value)'>
    <option value="">Select</option>
    </select>
    </td><!--<input type="text" id="txtRotDistrict" name="txtRotDistrict" onKeyPress="inputNumber(event,this.value,false);"  maxlength="4" size="50px" style="width:40%; border:1px solid #CCCCCC; line-height:20px; height:20px" />-->
</tr>
<tr><td colspan="3"></td></tr>

<?php } else if($_GET["for"]=='Inner Wheel Member') {?>
<tr id="labelinnerdist">
    <td><strong>Inner Wheel District</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <!--<td class="spandistrict"><select id='txtDistrict' name='txtDistrict' onchange='dispclub(this.value)'>
    <option value="">Select</option>
    </select></td>-->
    <td><input type="text" id="txtInnerwheelRotDistrict" name="txtInnerwheelRotDistrict" onKeyPress="inputNumber(event,this.value,false);"  maxlength="3" size="40px" style="width:50%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
   
</tr>
<tr><td colspan="3"></td></tr>
<?php } ?>

<?php  if($_GET["for"]=='RCCMember') {?>
<tr id="labelclub">
    <td><strong>Name of RCC</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="txtRCCName" name="txtRCCName" size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>

<?php } ?>

<?php 
if($_GET["for"]!='Others') {
		if($_GET["for"]=='Rotarian') 
			$clublabel = 'Rotary Club of';
		else if($_GET["for"]=='Inner Wheel Member')
			$clublabel = 'Inner Wheel Club of';
		else if($_GET["for"]=='Rotaractor')
			$clublabel = 'Rotaractor Club of';
		else if($_GET["for"]=='Interactor')
			$clublabel = 'Interactor Club of';
		else if($_GET["for"]=='RCCMember')
			$clublabel = 'Sponsoring Rotary Club';
			


?>
<tr id="labelclub">
    <td><strong><?php echo $clublabel;?></strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <?php if($_GET["for"]=='Rotarian' || $_GET["for"]=='RCCMember') { ?>
    <select id="txtClubName" name="txtClubName"><option value="">Select</option></select>
	<?php } else {?>
    
    <input type="text" id="txtClubName" name="txtClubName" size="25px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
    <?php } ?></td>
</tr>
<tr><td colspan="3"></td></tr>
<?php } ?>
<tr>
    <td><strong>Country</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td>
    	<select id="txtCountry" name="txtCountry"><!-- onchange="chkcountry(this.value)"-->
        <option value=''>Select</option>
        <option value='Afghanistan'>Afghanistan</option>
<option value='Aland Islands'>Aland Islands</option>
<option value='Albania'>Albania</option>
<option value='Algeria'>Algeria</option>
<option value='American Samoa'>American Samoa</option>
<option value='Andorra'>Andorra</option>
<option value='Angola'>Angola</option>
<option value='Anguilla'>Anguilla</option>
<option value='Antarctica'>Antarctica</option>
<option value='Antigua And Barbuda'>Antigua And Barbuda</option>
<option value='Argentina'>Argentina</option>
<option value='Armenia'>Armenia</option>
<option value='Aruba'>Aruba</option>
<option value='Australia'>Australia</option>
<option value='Austria'>Austria</option>
<option value='Azerbaijan'>Azerbaijan</option>
<option value='Bahamas'>Bahamas</option>
<option value='Bahrain'>Bahrain</option>
<option value='Bangladesh'>Bangladesh</option>
<option value='Barbados'>Barbados</option>
<option value='Belarus'>Belarus</option>
<option value='Belgium'>Belgium</option>
<option value='Belize'>Belize</option>
<option value='Benin'>Benin</option>
<option value='Bermuda'>Bermuda</option>
<option value='Bhutan'>Bhutan</option>
<option value='Bolivia'>Bolivia</option>
<option value='Bosnia And Herzegovina'>Bosnia And Herzegovina</option>
<option value='Botswana'>Botswana</option>
<option value='Bouvet Island'>Bouvet Island</option>
<option value='Brazil'>Brazil</option>
<option value='British Indian Ocean Territory'>British Indian Ocean Territory</option>
<option value='Brunei Darussalam'>Brunei Darussalam</option>
<option value='Bulgaria'>Bulgaria</option>
<option value='Burkina Faso'>Burkina Faso</option>
<option value='Burundi'>Burundi</option>
<option value='Cambodia'>Cambodia</option>
<option value='Cameroon'>Cameroon</option>
<option value='Canada'>Canada</option>
<option value='Cape Verde'>Cape Verde</option>
<option value='Cayman Islands'>Cayman Islands</option>
<option value='Central African Republic'>Central African Republic</option>
<option value='Chad'>Chad</option>
<option value='Chile'>Chile</option>
<option value='China'>China</option>
<option value='Christmas Island'>Christmas Island</option>
<option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands</option>
<option value='Colombia'>Colombia</option>
<option value='Comoros'>Comoros</option>
<option value='Congo'>Congo</option>
<option value='Congo, The Democratic Republic Of The'>Congo, The Democratic Republic Of The</option>
<option value='Cook Islands'>Cook Islands</option>
<option value='Costa Rica'>Costa Rica</option>
<option value='Cote D'Ivoire'>Cote D'Ivoire</option>
<option value='Croatia'>Croatia</option>
<option value='Cuba'>Cuba</option>
<option value='Cyprus'>Cyprus</option>
<option value='Czech Republic'>Czech Republic</option>
<option value='Denmark'>Denmark</option>
<option value='Djibouti'>Djibouti</option>
<option value='Dominica'>Dominica</option>
<option value='Dominican Republic'>Dominican Republic</option>
<option value='Ecuador'>Ecuador</option>
<option value='Egypt'>Egypt</option>
<option value='El Salvador'>El Salvador</option>
<option value='Equatorial Guinea'>Equatorial Guinea</option>
<option value='Eritrea'>Eritrea</option>
<option value='Estonia'>Estonia</option>
<option value='Ethiopia'>Ethiopia</option>
<option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas)</option>
<option value='Faroe Islands'>Faroe Islands</option>
<option value='Fiji'>Fiji</option>
<option value='Finland'>Finland</option>
<option value='France'>France</option>
<option value='French Guiana'>French Guiana</option>
<option value='French Polynesia'>French Polynesia</option>
<option value='French Southern Territories'>French Southern Territories</option>
<option value='Gabon'>Gabon</option>
<option value='Gambia'>Gambia</option>
<option value='Georgia'>Georgia</option>
<option value='Germany'>Germany</option>
<option value='Ghana'>Ghana</option>
<option value='Gibraltar'>Gibraltar</option>
<option value='Greece'>Greece</option>
<option value='Greenland'>Greenland</option>
<option value='Grenada'>Grenada</option>
<option value='Guadeloupe'>Guadeloupe</option>
<option value='Guam'>Guam</option>
<option value='Guatemala'>Guatemala</option>
<option value='Guernsey'>Guernsey</option>
<option value='Guinea'>Guinea</option>
<option value='Guinea-Bissau'>Guinea-Bissau</option>
<option value='Guyana'>Guyana</option>
<option value='Haiti'>Haiti</option>
<option value='Heard Island And Mcdonald Islands'>Heard Island And Mcdonald Islands</option>
<option value='Holy See (Vatican City State)'>Holy See (Vatican City State)</option>
<option value='Honduras'>Honduras</option>
<option value='Hong Kong'>Hong Kong</option>
<option value='Hungary'>Hungary</option>
<option value='Iceland'>Iceland</option>
<option value='India' selected="selected">India</option>
<option value='Indonesia'>Indonesia</option>
<option value='Iran, Islamic Republic Of'>Iran, Islamic Republic Of</option>
<option value='Iraq'>Iraq</option>
<option value='Ireland'>Ireland</option>
<option value='Isle Of Man'>Isle Of Man</option>
<option value='Israel'>Israel</option>
<option value='Italy'>Italy</option>
<option value='Jamaica'>Jamaica</option>
<option value='Japan'>Japan</option>
<option value='Jersey'>Jersey</option>
<option value='Jordan'>Jordan</option>
<option value='Kazakhstan'>Kazakhstan</option>
<option value='Kenya'>Kenya</option>
<option value='Kiribati'>Kiribati</option>
<option value='Korea, Democratic People'S Republic Of'>Korea, Democratic People'S Republic Of</option>
<option value='Korea, Republic Of'>Korea, Republic Of</option>
<option value='Kuwait'>Kuwait</option>
<option value='Kyrgyzstan'>Kyrgyzstan</option>
<option value='Lao People'S Democratic Republic'>Lao People'S Democratic Republic</option>
<option value='Latvia'>Latvia</option>
<option value='Lebanon'>Lebanon</option>
<option value='Lesotho'>Lesotho</option>
<option value='Liberia'>Liberia</option>
<option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya</option>
<option value='Liechtenstein'>Liechtenstein</option>
<option value='Lithuania'>Lithuania</option>
<option value='Luxembourg'>Luxembourg</option>
<option value='Macao'>Macao</option>
<option value='Macedonia, The Former Yugoslav Republic Of'>Macedonia, The Former Yugoslav Republic Of</option>
<option value='Madagascar'>Madagascar</option>
<option value='Malawi'>Malawi</option>
<option value='Malaysia'>Malaysia</option>
<option value='Maldives'>Maldives</option>
<option value='Mali'>Mali</option>
<option value='Malta'>Malta</option>
<option value='Marshall Islands'>Marshall Islands</option>
<option value='Martinique'>Martinique</option>
<option value='Mauritania'>Mauritania</option>
<option value='Mauritius'>Mauritius</option>
<option value='Mayotte'>Mayotte</option>
<option value='Mexico'>Mexico</option>
<option value='Micronesia, Federated States Of'>Micronesia, Federated States Of</option>
<option value='Moldova, Republic Of'>Moldova, Republic Of</option>
<option value='Monaco'>Monaco</option>
<option value='Mongolia'>Mongolia</option>
<option value='Montserrat'>Montserrat</option>
<option value='Morocco'>Morocco</option>
<option value='Mozambique'>Mozambique</option>
<option value='Myanmar'>Myanmar</option>
<option value='Namibia'>Namibia</option>
<option value='Nauru'>Nauru</option>
<option value='Nepal'>Nepal</option>
<option value='Netherlands'>Netherlands</option>
<option value='Netherlands Antilles'>Netherlands Antilles</option>
<option value='New Caledonia'>New Caledonia</option>
<option value='New Zealand'>New Zealand</option>
<option value='Nicaragua'>Nicaragua</option>
<option value='Niger'>Niger</option>
<option value='Nigeria'>Nigeria</option>
<option value='Niue'>Niue</option>
<option value='Norfolk Island'>Norfolk Island</option>
<option value='Northern Mariana Islands'>Northern Mariana Islands</option>
<option value='Norway'>Norway</option>
<option value='Oman'>Oman</option>
<option value='Pakistan'>Pakistan</option>
<option value='Palau'>Palau</option>
<option value='Palestinian Territory, Occupied'>Palestinian Territory, Occupied</option>
<option value='Panama'>Panama</option>
<option value='Papua New Guinea'>Papua New Guinea</option>
<option value='Paraguay'>Paraguay</option>
<option value='Peru'>Peru</option>
<option value='Philippines'>Philippines</option>
<option value='Pitcairn'>Pitcairn</option>
<option value='Poland'>Poland</option>
<option value='Portugal'>Portugal</option>
<option value='Puerto Rico'>Puerto Rico</option>
<option value='Qatar'>Qatar</option>
<option value='Reunion'>Reunion</option>
<option value='Romania'>Romania</option>
<option value='Russian Federation'>Russian Federation</option>
<option value='Rwanda'>Rwanda</option>
<option value='Saint Helena'>Saint Helena</option>
<option value='Saint Kitts And Nevis'>Saint Kitts And Nevis</option>
<option value='Saint Lucia'>Saint Lucia</option>
<option value='Saint Pierre And Miquelon'>Saint Pierre And Miquelon</option>
<option value='Saint Vincent And The Grenadines'>Saint Vincent And The Grenadines</option>
<option value='Samoa'>Samoa</option>
<option value='San Marino'>San Marino</option>
<option value='Sao Tome And Principe'>Sao Tome And Principe</option>
<option value='Saudi Arabia'>Saudi Arabia</option>
<option value='Senegal'>Senegal</option>
<option value='Serbia And Montenegro'>Serbia And Montenegro</option>
<option value='Seychelles'>Seychelles</option>
<option value='Sierra Leone'>Sierra Leone</option>
<option value='Singapore'>Singapore</option>
<option value='Slovakia'>Slovakia</option>
<option value='Slovenia'>Slovenia</option>
<option value='Solomon Islands'>Solomon Islands</option>
<option value='Somalia'>Somalia</option>
<option value='South Africa'>South Africa</option>
<option value='South Georgia And The South Sandwich Islands'>South Georgia And The South Sandwich Islands</option>
<option value='Spain'>Spain</option>
<option value='Sri Lanka'>Sri Lanka</option>
<option value='Sudan'>Sudan</option>
<option value='Suriname'>Suriname</option>
<option value='Svalbard And Jan Mayen'>Svalbard And Jan Mayen</option>
<option value='Swaziland'>Swaziland</option>
<option value='Sweden'>Sweden</option>
<option value='Switzerland'>Switzerland</option>
<option value='Syrian Arab Republic'>Syrian Arab Republic</option>
<option value='Taiwan, Province Of China'>Taiwan, Province Of China</option>
<option value='Tajikistan'>Tajikistan</option>
<option value='Tanzania, United Republic Of'>Tanzania, United Republic Of</option>
<option value='Thailand'>Thailand</option>
<option value='Timor-Leste'>Timor-Leste</option>
<option value='Togo'>Togo</option>
<option value='Tokelau'>Tokelau</option>
<option value='Tonga'>Tonga</option>
<option value='Trinidad And Tobago'>Trinidad And Tobago</option>
<option value='Tunisia'>Tunisia</option>
<option value='Turkey'>Turkey</option>
<option value='Turkmenistan'>Turkmenistan</option>
<option value='Turks And Caicos Islands'>Turks And Caicos Islands</option>
<option value='Tuvalu'>Tuvalu</option>
<option value='Uganda'>Uganda</option>
<option value='Ukraine'>Ukraine</option>
<option value='United Arab Emirates'>United Arab Emirates</option>
<option value='United Kingdom'>United Kingdom</option>
<option value='United States'>United States</option>
<option value='United States Minor Outlying Islands'>United States Minor Outlying Islands</option>
<option value='Uruguay'>Uruguay</option>
<option value='Uzbekistan'>Uzbekistan</option>
<option value='Vanuatu'>Vanuatu</option>
<option value='Venezuela'>Venezuela</option>
<option value='Viet Nam'>Viet Nam</option>
<option value='Virgin Islands, British'>Virgin Islands, British</option>
<option value='Virgin Islands, U.S.'>Virgin Islands, U.S.</option>
<option value='Wallis And Futuna'>Wallis And Futuna</option>
<option value='Western Sahara'>Western Sahara</option>
<option value='Yemen'>Yemen</option>
<option value='Zambia'>Zambia</option>
<option value='Zimbabwe'>Zimbabwe</option>

        </select>
    
   <!-- <input type="text" id="txtCountry" name="txtCountry" size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />--></td>
</tr>
<tr><td colspan="3"></td></tr>

<tr>
    <td><strong>Address</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="txtAddress" name="txtAddress" size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>City</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="txtCity" name="txtCity" size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>State</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td>
    <span id="indiaState">
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
    
    </span>
	<!--<span id="otherCountryState" style="display:block">    
    <input type="text" id="txtState" name="txtState" size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" />
    </span>-->
    </td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>Pin</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="txtPin" name="txtPin" size="50px" onKeyPress="inputNumber(event,this.value,false);"  maxlength="6" style="width:40%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>

<tr><td colspan="3"></td></tr>
<!--<tr>
    <td><strong>Phone</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="txtPhone" name="txtPhone" maxlength="15" size="50px" style="width:40%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>Mobile 1</strong></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="txtMob1" name="txtMob1" maxlength="15" size="50px" style="width:40%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>-->
<tr>
    <td><strong>Mobile</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td>+91 <input type="text" id="txtMob" name="txtMob" maxlength="10" onKeyPress="inputNumber(event,this.value,false);" size="50px" style="width:40%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>Email</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="txtEmail" name="txtEmail" size="50px" style="width:100%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>Upload your Picture </strong></td>
    <td align="center"><strong>:</strong></td>
    <td style="cursor:pointer"><input type="file" name="uploadImg" id="uploadImg" style="color:#999999; font-style:italic; cursor:pointer"/></td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td valign="top"><strong>Choose your area to volunteer</strong><span style="color:#FF0000">*<br>
	<strong>[Please read the details of each area carefully by clicking on each 
	area before applying. You may choose one or more or all areas to volunteer for]</strong></span></td>
    <td valign="top" align="center"><strong>:</strong></td>
    <td class="link">
    	<input type="checkbox" class="voluntarea" name="choVolntArea[]" value="Teacher Support" /><A HREF="javascript:popUp('t.htm')"><strong>Teacher Support</strong></a><br />
     	<input type="checkbox"  class="voluntarea" name="choVolntArea[]" value="E-Learning" /><A HREF="javascript:popUp('e.htm')"><strong>E-Learning</strong></a><br />
    	<input type="checkbox" class="voluntarea" name="choVolntArea[]" value="Adult Literacy" /><A HREF="javascript:popUp('a.htm')"><strong>Adult Literacy</strong></a><br />
    	<input type="checkbox"  class="voluntarea" name="choVolntArea[]" value="Child Development" /><A HREF="javascript:popUp('c.htm')"><strong>Child Development</strong></a><br />
   		<input type="checkbox"  class="voluntarea" name="choVolntArea[]" value="Happy Schools" /><A HREF="javascript:popUp('h.htm')"><strong>Happy Schools</strong></a><br />
    	<input type="checkbox"  class="voluntarea" name="choVolntArea[]" value="workprogram" /><A HREF="javascript:popUp('o.htm')"><strong>Organisational Work</strong></a><br />
    	<input type="checkbox"  class="voluntarea" name="choVolntArea[]" value="fundraising" /><A HREF="javascript:popUp('f.htm')"><strong>Fund Raising</strong></a>
    </td>
</tr>
<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>How much time do you wish to volunteer</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="nosofhours" name="nosofhours" onKeyPress="inputNumber(event,this.value,false);" maxlength="4"  size="5px" style="width:10%; border:1px solid #CCCCCC; line-height:20px; height:20px" /> Nos. of Hours in a <input type="radio" name="optVolnttime" value="day" />Day&nbsp;<input type="radio" name="optVolnttime" value="week" />Week &nbsp;<!--<input type="radio"  name="optVolnttime" value="Month" />Month&nbsp;<input type="radio"  name="optVolnttime" value="year" />Year&nbsp;-->
    </td>
</tr>

<tr><td colspan="3"></td></tr>
<tr>
    <td><strong>For how many months do you wish to work</strong><span style="color:#FF0000">*</span></td>
    <td align="center"><strong>:</strong></td>
    <td><input type="text" id="nosofmonthstowork" name="nosofmonthstowork" onKeyPress="inputNumber(event,this.value,false);" maxlength="3"  size="5px" style="width:10%; border:1px solid #CCCCCC; line-height:20px; height:20px" /> <input type="radio" name="optmonthworktype" value="Continuous" />Continuous&nbsp;<input type="radio" name="optmonthworktype" value="In phases" />In phases &nbsp;
    </td>
</tr>

<tr><td colspan="3"></td></tr>


<?php if($_GET["for"]=='Others') {?>
<tr>
    <td valign="top"><strong>How did you know about this program</strong></td>
    <td valign="top" align="center"><strong>:</strong></td>
    <td><textarea rows="3" cols="25" id="txthowknow" name="txthowknow" style="width:100%; border:1px solid #CCCCCC"></textarea>
    </td>
</tr>
<tr><td colspan="3"></td></tr>
<?php } ?>

<!--<tr id="rotarianStatus">
    <td valign="top"><strong>Choose your rotary status</strong></td>
    <td align="center" valign="top"><strong>:</strong></td>
    <td valign="top">
    <input type="radio" name="optStatus" value="Rotarian" />Rotarian<br />
    <input type="radio" name="optStatus" value="Rotary Family" />Rotary Family<br />
    <input type="radio"  name="optStatus" value="Inner Wheel Member" />Inner Wheel Member<br />
    <input type="radio"  name="optStatus" value="Rotractor" />Rotaractor<br />
    <input type="radio"  name="optStatus" value="RCC" />RCC<br />
    <input type="radio"  name="optStatus" value="Intractor" />Interactor
    </td>
</tr>
<tr><td colspan="3"></td></tr>
-->

<tr>
    <td valign="top"><strong>Geographical area of work</strong><span style="color:#FF0000">*</span></td>
    <td valign="top" align="center"><strong>:</strong></td>
    <td>
        <input type="checkbox" class="workarea" name="choWorkArea[]" value="Hometown" />Home Town<br />
        <input type="checkbox"  class="workarea" name="choWorkArea[]" value="Revenue district" />Revenue District<br />
        <input type="checkbox"   class="workarea" name="choWorkArea[]" value="State" />State<br />
        <input type="checkbox"   class="workarea" name="choWorkArea[]" value="Country" />Country<br />
        <input type="checkbox"  class="workarea" name="choWorkArea[]" value="Rotary District" />Rotary District
    </td>
</tr>
<!--<tr><td colspan="3"></td></tr>
<tr>
    <td valign="top"><strong>Have you been a teacher</strong></td>
    <td valign="top" align="center"><strong>:</strong></td>
    <td valign="top">
    	<input type="radio" name="isteacher" value="Yes" onclick="showisteacher(this.value)" />Yes &nbsp;<input type="radio" name="isteacher" value="No" onclick="showisteacher(this.value)"   />No
       
    </td>
</tr>
<tr id="teachInfo" style="display:none">
    <td colspan="3">
        <div> 
            <table style="text-align:left; border-collapse:collapse; background:#f5f5f5" border="1" bordercolor="#CCCCCC" width="100%" cellpadding="5" cellspacing="0" align="center">
                <tr>
                    <td><strong>Level of teaching experience</strong></td>
                    <td><strong>:</strong></td>
                    <td><select id="choteachlevel" name="choteachlevel">
                    	<option value="">Select</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Secondary">Secondary</option>
                        <option value="Higher Secondary">Higher Secondary</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><strong>Language proficiant in</strong></td>
                    <td valign="top"><strong>:</strong></td>
                    <td><input type="text" id="langProficiate" name="langProficiate" size="50px" style="width:99%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
                </tr>
            </table>
        </div>
    </td>
    </tr>-->

<tr><td colspan="3"></td></tr>
<tr>
    <td valign="top"><strong>Have you experience with similar work</strong></td>
    <td valign="top" align="center"><strong>:</strong></td>
    <td valign="top">
    	<input type="radio" name="experiance" value="Yes" onclick="showexper(this.value)" />Yes &nbsp;<input type="radio" name="experiance" value="No" onclick="showexper(this.value)"   />No
       
    </td>
</tr>
<tr id="experianceInfo" style="display:none">
    <td colspan="3">
        <div> 
            <table style="text-align:left; border-collapse:collapse; background:#f5f5f5" border="1" bordercolor="#CCCCCC" width="100%" cellpadding="5" cellspacing="0" align="center">
                <tr>
                    <td><strong>Name of project</strong></td>
                    <td><strong>:</strong></td>
                    <td><input type="text" id="projectName" name="projectName" size="50px" style="width:99%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
                </tr>
                <tr>
                    <td valign="top"><strong>Description</strong></td>
                    <td valign="top"><strong>:</strong></td>
                    <td><textarea id="experianceDetail" name="experianceDetail" rows="8" cols="20"  style="width:98%; border:1px solid #CCCCCC"></textarea></td>
                </tr>
                <tr>
                    <td><strong>Location</strong></td>
                    <td><strong>:</strong></td>
                    <td><input type="text" id="explocation" name="explocation" size="50px" style="width:99%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
                </tr>
                <tr>
                    <td><strong>Contact Person</strong></td>
                    <td><strong>:</strong></td>
                    <td><input type="text" id="contactperson" name="contactperson" size="50px" style="width:99%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
                </tr>
                <tr>
                    <td><strong>Partner Agencies Involved</strong> <em>(if any)</em></td>
                    <td><strong>:</strong></td>
                    <td><input type="text" id="partneragency" name="partneragency" size="50px" style="width:99%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
                </tr>
                <tr>
                    <td><strong>Contact Detail</strong></td>
                    <td><strong>:</strong></td>
                    <td><input type="text" id="expcontact" name="expcontact" size="50px" style="width:99%; border:1px solid #CCCCCC; line-height:20px; height:20px" /></td>
                </tr>
                <tr>
                    <td><strong>Upload your Project Picture 1</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td style="cursor:pointer"><input type="file" name="uploadprojImg1" id="uploadprojImg1" style="color:#999999; font-style:italic; cursor:pointer"/></td>
                </tr>
                <tr>
                    <td><strong>Upload your Project Picture 2</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td style="cursor:pointer"><input type="file" name="uploadprojImg2" id="uploadprojImg2" style="color:#999999; font-style:italic; cursor:pointer"/></td>
                </tr>
            </table>
        </div>
    </td>
    </tr>


<!--<tr>
	<td colspan="3">
    <div id="experianceInfo"  style="border:#666666 solid 2px;display:none" > 
    Name of project : <input type="text" id="projectName" name="projectName" size="50px" /><br />
    Description :<textarea id="experianceDetail" name="experianceDetail" rows="8" cols="20" style="width:50%; border:1px solid #CCCCCC"></textarea><br  />
        Location : <input type="text" id="explocation" name="explocation" size="50px" /><br />
       Contact Person : <input type="text" id="contactperson" name="contactperson" size="50px" /><br />
        Partner agencies involved (if any) : <input type="text" id="partneragency" name="partneragency" size="50px" /><br />
        Contact detail : <input type="text" id="expcontact" name="expcontact" size="50px" />
        
      
       </div>
    </td></tr>-->
 
<tr>
    <td></td>
    <td></td>
    <td style="cursor:pointer" class="link"><input type="checkbox" name="agree" id="agree" onclick="allowsubmit(this)"/><strong>By 
	clicking here I </strong>
	acknowledge and agree that i have read through the <A HREF="javascript:popUp('d.htm')"><strong>Disclaimer</strong> </a>&nbsp;as well as details of 
	areas of work as above.</td>
</tr>
<tr height="10"><td colspan="3"></td></tr>
<tr>
    <td></td>
    <td></td>
    <td style="cursor:pointer"><img src="captcha.php" alt="captcha image" id="cptchimg" /><br />
        <input type="text" name="txtcaptcha" id="txtcaptcha" maxlength="6" />&nbsp;
        <img src="refresh.jpg" width="20" id="resetcaptcha" title="Click here to change image text"  onclick="newcaptcha()" /><br>
	<strong>Please enter the digits shown in the box above to submit your 
	application</strong></td>
</tr>
<tr height="20"><td colspan="3"></td></tr>
<tr>
	<td colspan="3" align="center">
    	<input type="button" name="btnSave" id="btnSave" value="SUBMIT" title="Submit detail to Register" onclick="validation();" disabled="disabled" style="background:#0099FF; text-shadow:0 1px 1px #000000; padding:10px 50px; color:#ffffff; font-weight:bold; cursor:pointer; border-radius:5px; border:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; letter-spacing:1px"/>
    </td>
</tr>

</table>
</div>
</form>
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






