<?php
session_start();
include("../connection.php");
if(!isset($_SESSION["user"]))
{
	header("Location: detailviewlogin.php");
}

?>
<?php
$msg= "";
function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
	if ( $filename != ''){	
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
	}
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
        $msg = "Your message has been sent successfully."; // or use booleans here
    } else {
       $msg= "Error in sending mail, try again!";
    }
	return $msg;
}


$emailarr = $_POST["chkemails"];


if(isset($_POST["save"])) {

if(move_uploaded_file($_FILES["uploaddoc"]["tmp_name"],
          "uploadattach/" . $_FILES["uploaddoc"]["name"]))
       $file=fopen("uploadattach/".$_FILES["uploaddoc"]["name"], 'r');
	   
$emails = implode(',',$emailarr );
// multiple recipients
/*$to  = 'sanjuchou27@gmail.com' . ', '; // note the comma
$to .= 'sanjuchou2010@yahoo.com';*/
$to = $emails;
// subject
$my_file =$_FILES["uploaddoc"]["name"];
$my_path = $_SERVER['DOCUMENT_ROOT']."/Mail/uploadattach/";
$my_name = "ADMIN";
$my_mail = $_POST["txtFrom"];
$my_replyto = $_POST["txtFrom"];
$my_subject = $_POST["txtSubject"];


$my_message =$_POST["mailContent"];
$message=mail_attachment($my_file, $my_path,$to, $my_mail, $my_name, $my_replyto, $my_subject, $my_message);

//echo $_FILES["uploaddoc"]["name"];

}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel - Rotary T-E-A-C-H</title>

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
<script language="javascript" type="text/javascript" src="http://rotaryteach.org/AdminPanel/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">


		var isupdateChanged	=	false;
//------------------Tinymce ------------------------------------
			tinyMCE.init({
				// General options
				mode : "exact",
				elements : "mailContent",
				theme : "advanced",
				plugins : "advlink",
		
				// Theme options
				theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor,|,bullist,numlist,|,link,unlink,anchor,code",
				theme_advanced_buttons2 :'',
				theme_advanced_buttons3 :'',
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,
		
				content_css : "css/content.css"
				
				});
				
function validation(){

			if($('.chkemail:checkbox:checked').length == 0){
				alert("Please select at least one email.")
				return false;
			
			}
							
	if($.trim($("#txtSubject").val())==''){
		alert("Please enter subject of mail.");
		$("#txtSubject").focus();
		return false;
	
	}
	
	if($.trim($("#txtFrom").val())==''){
		alert("Please enter email in From.");
		$("#txtFrom").focus();
		return false;
	}
	if($.trim($("#txtFrom").val())!="")
	{
		  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 if(!expr.test($.trim($("#txtFrom").val())))
		 {
		 	alert("Invalid Email in From!");
			$("#txtFrom").focus();
			return false;
		 }
	}
	
	if(tinyMCE.get("mailContent").getContent().trim()=='')
	{
		alert("Please enter mail message.")
		return false;
	}
	return true
}

function districtlist(val)
{
var str = "<option value=''>Select</option>";
	var pars ='volunteertype='+val;
$.ajax({                                      
      url: 'http://rotaryteach.org/AdminPanel/districtlistforsearch.php',                     
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
      url: 'http://rotaryteach.org/AdminPanel/clublistforsearch.php',                     
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
	var str="<table cellspacing='0' cellpadding='3' border='0' width='100%' align='center' style='text-align:left'>";	
	str = str+"<tr><td colspan='3'></td></tr>";
	str = str+"<tr><td width='10%' style='border-bottom:1px solid #cccccc; font-style:italic; font-size:11px; color:#999999'><input type='checkbox'  name='select_all' id='select_all' onclick='ckeckUncheck()' title='Select All'/>Select All</td><td style='border-bottom:1px solid #cccccc'><em><strong>Name</strong></em></td><td style='border-bottom:1px solid #cccccc'><em><strong>Email</strong></em></td></tr>";
	
	var VolntAreaitems = [];
$("input[name='choVolntArea[]']:checked").each(function(){VolntAreaitems.push($(this).val());});
var WorkArea = [];
$("input[name='choWorkArea[]']:checked").each(function(){WorkArea.push($(this).val());});

	var pars ='volunttype='+val+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val()+'&state='+$('#txtState').val()+'&city='+$('#txtcity').val()+'&pin='+$('#txtpin').val()+'&voluntarea='+VolntAreaitems+'&workarea='+WorkArea;

	//alert(pars)
	//var pars ='volunttype='+val;
	$.ajax({                                      
      url: 'http://rotaryteach.org/AdminPanel/volunteerslist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<tr><td style='border-bottom:1px solid #cccccc'><input type='checkbox'  class='chkemail' name='chkemails[]' value='"+data[i]["email"]+"'></td><td style='border-bottom:1px solid #cccccc'>"+data[i]["name"]+"</td><td style='border-bottom:1px solid #cccccc'>"+data[i]["email"]+"</td></tr>";
				}
			}
			else
			{
			 str = str+"<tr><td style='border-bottom:1px solid #cccccc'>&nbsp;</td><td colspan='2' style='border-bottom:1px solid #cccccc; color:#cc3300'>Record not found.</td></tr>";	
			 }
			 
			 str = str+"</table>";
			 
			//setVisibility('sub2', 'inline');
			$("#volunteerContainer").show();
			$("#volunteerContainer").html(str);
		}
	});

}


function ckeckUncheck() {  
    var checkboxes = $('#select_all').closest('form').find(':checkbox');
    if($('#select_all').is(':checked')) {
        checkboxes.attr('checked', 'checked');
    } else {
        checkboxes.removeAttr('checked');
    }
}	
	

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
	border:1px solid #d7dada;/* -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;*/font-size:12px;font-family:arial, helvetica, sans-serif; padding:7px 5px; text-decoration:none; color: #333333; margin:0;
	background-color: #f4f5f5; background-image: -webkit-gradient(linear, left top, left bottom, from(#f4f5f5), to(#dfdddd));
	background-image: -webkit-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: -moz-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: -ms-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: -o-linear-gradient(top, #f4f5f5, #dfdddd);
	background-image: linear-gradient(to bottom, #f4f5f5, #dfdddd);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#f4f5f5, endColorstr=#dfdddd);
}

.login
{
	border:1px solid #15aeec; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 50px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF; margin:0 5px 0 0;
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
</style>

<center>

<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">


        <br />
        <!----------------------- LOGO AREA START --------------------->
         <?php include("../logo_area.html");?>
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
                    <h1>Compose Message</h1>
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                    
                    <p class="text">
                        <table width="80%" border="0" cellspacing="0" cellpadding="5" align="center" style="text-align:left">
                        <tr><td align="right"><div align="right"><a href="../composedmail.php" class="login">Back to Panel</a><a href="../logout.php" class="login">Logout</a></div></td></tr>
                        	<tr>
                        		<td>
                                
                                	<div style="text-align:center; margin-bottom:15px">
                                    	<h1 style="text-align:center; color:#CC3300; font-size:18px"><?php echo $message;?></h1>
                                    </div>
                                    <table width="40%" border="0" cellspacing="0" cellpadding="0" style="text-align:left; margin-bottom:10px">
                                        <tr>
                                            <td width="8%"></td>
                                            <td width="25%"><strong>Volunteer Type</strong></td>
                                            <td width="2%"><strong>:</strong></td>
                                            <td width="66%">
                                                <select id="chovolunteers" name="chovolunteers"  onchange="districtlist(this.value);" class="button" style="width:100%; cursor:pointer; color:#333333; font-weight:bold">
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
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										  <td width="8%"></td>
										<td width="25%"><strong>District</strong></td>
										<td  width="2%"><strong>:</strong></td>
										<td width="66%">
										<select id="chodistrict" name="chodistrict" onchange="dispclub(this.value);" class="button" style="cursor:pointer; color:#333333; font-weight:bold; padding:7px 0 7px 4px">
										<option value="">Select</option>
										</select>
										</td>
										</tr>
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										  <td width="8%"></td>
										<td width="25%"><strong>Club</strong></td>
										<td  width="2%"><strong>:</strong></td>
										<td width="66%">
										<select id="choclub" name="choclub" onchange="" class="button" style="cursor:pointer; color:#333333; font-weight:bold; padding:7px 0 7px 4px">
										<option value="">Select</option>
										</select>
										</td>
										</tr>
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										  <td width="8%"></td>
										<td width="25%"><strong>State</strong></td>
										<td width="2%"><strong>:</strong></td>
										<td width="66%">
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
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										  <td width="8%"></td>
										<td width="25%"><strong>City</strong></td>
										<td width="2%"><strong>:</strong></td>
										<td width="66%">
										<input type="text" id="txtcity" name="txtcity" style="color:#333333; font-weight:bold; line-height:22px; height:22px" />
										</td>
										</tr>
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										  <td width="8%"></td>
										<td width="25%"><strong>Pin</strong></td>
										<td width="2%"><strong>:</strong></td>
										<td width="66%">
										<input type="text" id="txtpin" name="txtpin" maxlength="6"  onKeyPress="inputNumber(event,this.value,false);" style="color:#333333; font-weight:bold; line-height:22px; height:22px" />
										</td>
										</tr>
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										  <td width="8%"></td>
										<td width="25%" valign="top"><strong>Volunteer Area</strong></td>
										<td valign="top" width="2%"><strong>:</strong></td>
										<td width="66%">
										<input type="checkbox" name="choVolntArea[]" value="Teacher Support" />Teacher Support &nbsp;<input type="checkbox" name="choVolntArea[]" value="E-Learning" />E-Learning &nbsp;<input type="checkbox" name="choVolntArea[]" value="Adult Literacy" />Adult Literacy &nbsp;<input type="checkbox" name="choVolntArea[]" value="Child Development" />Child Development &nbsp;<input type="checkbox" name="choVolntArea[]" value="Happy Schools" />Happy Schools &nbsp;<input type="checkbox" name="choVolntArea[]" value="workprogram" />Organisational Work &nbsp;<input type="checkbox" name="choVolntArea[]" value="fundraising" />Fund Raising
										</td>
										</tr>
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										  <td width="8%"></td>
										<td width="25%" valign="top"><strong>Geographical area of work</strong></td>
										<td  width="2%" valign="top" align="center"><strong>:</strong></td>
										<td width="66%">
										<input type="checkbox" name="choWorkArea[]" value="Hometown" />Home Town &nbsp;<input type="checkbox" name="choWorkArea[]" value="Revenue district" />Revenue District &nbsp;<input type="checkbox"  name="choWorkArea[]" value="State" />State &nbsp;<input type="checkbox"  name="choWorkArea[]" value="Country" />Country &nbsp;<input type="checkbox"  name="choWorkArea[]" value="Rotary District" />Rotary District
										</td>
										</tr>
										<tr><td colspan="4">&nbsp;</td></tr>
										<tr>
										<td></td>
										<td></td>
										<td align="left"><input type="button" value="Search" id="btnsearch" onclick="dispVolunteers();" class="login"/></td>
										</tr>
                                    </table>
                    
                                    <form name="frm" id="frm" action="" method="post" enctype="multipart/form-data" onsubmit="return validation();">
                                        
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:left; margin-bottom:15px;">
                                            <tr>
                                                <td width="3%"></td>
                                                <td width="10%" valign="top"></td>
                                                <td width="1%" valign="top"></td>
                                                <td width="86%" valign="top">
                                                	<div id="volunteerContainer" style="border:#cccccc 1px solid; height:200px; overflow:scroll; border-bottom:none; width:100%; display:none; margin: 0; padding:0" ></div>
                                                </td>
                                            </tr>
                                            <tr height="15"><td colspan="4"></td></tr>
                                        	<tr>
                                                <td></td>
                                                <td><strong>Subject</strong></td>
                                                <td><strong>:</strong></td>
                                                <td>
                                                	<!--<div class="button"><strong>Message</strong></div>-->
                                                	<input type="text" id="txtSubject" name="txtSubject" size="50" style="border:1px solid #cccccc; line-height:22px; height:22px" />
                                                </td>
                                            </tr>
                                        	<tr height="15"><td colspan="4"></td></tr>
											<tr>
                                                <td></td>
                                                <td><strong>Mail From</strong></td>
                                                <td><strong>:</strong></td>
                                                <td>
                                                	<!--<div class="button"><strong>Message</strong></div>-->
                                                	<input type="text" id="txtFrom" name="txtFrom" size="50" style="border:1px solid #cccccc; line-height:22px; height:22px" />
                                                </td>
                                            </tr>
                                        	<tr height="15"><td colspan="4"></td></tr>
                                            <tr>
                                                <td valign="top"></td>
                                                <td valign="top"><strong>Mail Message</strong></td>
                                                <td valign="top"><strong>:</strong></td>
                                                <td valign="top">
                                                	<!--<div class="button"><strong>Message</strong></div>-->
                                                	<textarea id="mailContent" name="mailContent" style="width:100%"></textarea>
                                                </td>
                                            </tr>
                                            <tr height="15"><td colspan="4"></td></tr>
                                            <tr>
                                                <td></td>
                                                <td><strong>Attachment</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="file" name="uploaddoc" id="uploaddoc" style="cursor:pointer" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="4"></td></tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><input type="submit" name="save" value="Send" class="login" title="Click here to send mail." /></td>
                                            </tr>
                                        </table>
                                        
                                        
                                    </form>
                                
                                </td>
                        	</tr>
                        </table> 
                    </p>                                            
                    
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
	Cufon.replace('h6', {hover: true});
	//Cufon.replace('h7');
</script>
</body>
</html>
