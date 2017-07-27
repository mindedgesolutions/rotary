<?php
include("../connection.php");

	
	function  findexts($filename) {
		$ext1 = split("[/\\.]", $filename) ;
		$n = count($ext1)-1; 
		$exts = $ext1[$n]; 
		return strtoupper($exts);
	}
	
	 function FileNewname($filename)
	{
		$dt=date("Y-m-d-h-i-s");
		$newname=$dt.".".strtolower(findexts($filename));
		return $newname;
	}


$msg ="";
if(isset($_POST["btnsave"]))
{
$error = 0;
$subcategoryid = $_POST["chosubcategory"];
$projdesc = mysqli_real_escape_string($link,$_POST["txtprojdesc"]);
$state = $_POST["chostate"];
$city = $_POST["txtcity"];
$district = $_POST["txtdistrict"];
$club = $_POST["txtclub"];
$projectvenue = $_POST["txtprojvenue"];
$unitsupplied = $_POST["txtunitsupply"];
$beneficiaryno = $_POST["txtbeneficiariesno"];
$partnerorg = $_POST["txtpartnerorg"];
$outlay = $_POST["txtoutlay"];
$projectdate = $_POST["txtprojdt"];
$projcontact =mysqli_real_escape_string($link,$_POST["txtprojcontactdetail"]);



$img1= $_FILES["uploadimg1"]["name"];
$img2= $_FILES["uploadimg2"]["name"];
$img3= $_FILES["uploadimg3"]["name"];
$img4= $_FILES["uploadimg4"]["name"];


$newimg1 ="";
$newimg2 ="";
$newimg3 ="";
$newimg4 ="";

	if($img1!='')  { 
	$newimg1 = FileNewname($img1);	 
	if($_FILES["uploadImg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uploadimg1"]["tmp_name"], "upload/" . $newimg1);
		 }
	 }


	if($img2!='')  { 
	$newimg2 = FileNewname($img2);	 
	if($_FILES["uploadImg2"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uploadimg2"]["tmp_name"], "upload/" . $newimg2);
		 }
	 }
	if($img3!='')  { 
	$newimg3 = FileNewname($img3);	 
	if($_FILES["uploadImg3"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uploadimg3"]["tmp_name"], "upload/" . $newimg3);
		 }
	 }
	 
	if($img4!='')  { 
	$newimg4 = FileNewname($img4);	 
		if($_FILES["uploadImg1"]["error"]==0 ) {
			 move_uploaded_file($_FILES["uploadimg4"]["tmp_name"], "upload/" . $newimg4);
		 }
	 }
	 
	
	 $query = "INSERT INTO clubproject(subcategoryid, projdesc, state, city, district, club, projectvenue, unitsupplied, beneficiaryno, partnerorg, outlay, projectdate, projcontact, img1, img2, img3, img4) values(".$subcategoryid.", '".$projdesc."', '".$state."', '".$city."', '".$district."', '".$club."', '".$projectvenue."', ".$unitsupplied.", ".$beneficiaryno.", '".$partnerorg."', '".$outlay."', '".$projectdate."', '".$projcontact."', '".$newimg1."', '".$newimg2."', '".$newimg3."', '".$newimg4."');";


		if(mysqli_query($link,$query))
		{
		$msg = "Project Successfully Added";
		}
	
	
	 
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

<link href="../button/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/jquery-calendar.css" />

<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../js/jquery-calendar.js"></script>

<script type="text/javascript">
$(document).ready(function () {
$('.calendarFocus').calendar();
});


function categorylist()
{
str ="<select id='chocategory' name='chocategory' onchange='dispsubcategory(this.value)'><option value=''>Select</option>";	
$.ajax({                                      
      url: 'categorylist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["id"]+"'>"+data[i]["category"]+"</option>";
				}
			}			 
			 str = str+"</select>";
			 
			$("#spancategory").html(str);
		}
	});
}


function dispsubcategory(val)
{
str ="<select id='chosubcategory' name='chosubcategory'><option value=''>Select</option>";	
	var pars ='categoryid='+val;
$.ajax({                                      
      url: 'subcategorylist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["id"]+"'>"+data[i]["subcategory"]+"</option>";
				}
			}			 
			 str = str+"</select>";
			 
			$("#spansubcategory").html(str);
		}
	});
}


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

	if($.trim($("#chocategory").val())==''){
		alert("Please select category.");
		$("#chocategory").focus();
		return false;
	
	}
	if($.trim($("#chosubcategory").val())==''){
		alert("Please select subcategory.");
		$("#chosubcategory").focus();
		return false;
	}
	if($.trim($("#txtprojdesc").val())==''){
		alert("Please enter project description.");
		$("#txtprojdesc").focus();
		return false;
	}
	if($.trim($("#chostate").val())==''){
		alert("Please select state.");
		$("#chostate").focus();
		return false;
	}
	if($.trim($("#txtprojvenue").val())==''){
		alert("Please enter project venue name.");
		$("#txtprojvenue").focus();
		return false;
	}
	if($.trim($("#txtunitsupply").val())==''){
		alert("Please enter No. of unit supplied.");
		$("#txtunitsupply").focus();
		return false;
	}
	if($.trim($("#txtoutlay").val())==''){
		alert("Please enter outlay.");
		$("#txtoutlay").focus();
		return false;
	}
	if($.trim($("#txtprojdt").val())==''){
		alert("Please enter project date.");
		$("#txtprojdt").focus();
		return false;
	}
	if(!$('#chkagree').is(':checked')) {
		alert("Please accept declaration.");
		return false;
	}
		
	return true
}

function readURL(input) {
var fileExtallow = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            if (input.files && input.files[0]) {
			
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
				var filesize = (input.files[0].size)/1024;
				var ext =input.files[0].type.split('/').pop();
			
				if(filesize>500)
				{
				alert("Image size must be less than 500kb.");
				$("#"+input.id).val('');
				return false;
				}
				if($.inArray(ext,fileExtallow) == -1) 
				{
				alert("Image type allow only jpeg, jpg, png, gif, bmp");
				$("#"+input.id).val('');
				return false;
				}
            }
        }
	
/*function Formsubmit()
{
	var $indexform = $('#frm');
	var pars=new FormData($('#frm')[0]);
	$.ajax({                                      
      url: 'SaveClubProject.php',                     
      data:pars, 
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.status==1)
			{
				alert(data.msg)
			}			 
		}
	});

}*/
/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

/*$('#uploadImg1').bind('change', function() {

  //this.files[0].size gets the size of your file.
  alert(this.files[0].size);

});*/

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
<body onload="categorylist();">
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
                    <h1>Club Project</h1>
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                    
                    <p class="text">
                        <table width="80%" border="0" cellspacing="0" cellpadding="5" align="center" style="text-align:left">
                        	<tr>
                        		<td>
                                
                                	<div style="text-align:center; margin-bottom:15px">
                                    	<h1 style="text-align:center; color:#CC3300; font-size:18px"><?php echo $msg;?></h1>
                                    </div>
                                   
                                    <form name="frm" id="frm" action="clubProject.php" method="post" enctype="multipart/form-data" onsubmit="return validation();">
                                        
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:left; margin-bottom:15px;">
                                            <tr>
                                                <td><strong><span style="color:#91042B">*</span>Category</strong></td>
                                                <td><strong>:</strong></td>
                                                <td>
                                                <span id="spancategory"><select id='chocategory' name='chocategory' ><option value=''>Select</option></select></span>
                                                </td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                        	<tr>
                                                <td><strong><span style="color:#91042B">*</span>Subcategory</strong></td>
                                                <td><strong>:</strong></td>
                                                <td>
                                                	<span id="spansubcategory"><select name="chosubcategory" id="chosubcategory"><option value="">Select</option></select></span>
                                                </td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                            <tr>
                                                <td valign="top"><span style="color:#91042B">*</span><strong>Project Description</strong></td>
                                                <td valign="top"><strong>:</strong></td>
                                                <td>
                                                	<textarea id="txtprojdesc" name="txtprojdesc"  maxlength='1000'  rows="5" cols="30"></textarea><br />(Maximum 1000 Character)
                                                </td>
                                            </tr>
                                        	<tr height="15"><td colspan="3"></td></tr>
                                            <tr>
                                                <td><span style="color:#91042B">*</span><strong>State</strong></td>
                                                <td><strong>:</strong></td>
                                                <td>
                                                	<select id="chostate" name="chostate">
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
                                            <tr height="15"><td colspan="3"></td></tr>
                                            <tr>
                                                <td><strong>City/Town/Village</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtcity" id="txtcity" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                            <tr>
                                                <td><strong>District</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtdistrict" id="txtdistrict" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                            <tr>
                                                <td><strong>Club</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtclub" id="txtclub" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                            <tr>
                                                <td><span style="color:#91042B">*</span><strong>Project Venue Name</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtprojvenue" id="txtprojvenue" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><span style="color:#91042B">*</span><strong>No of Units Supplied</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtunitsupply" id="txtunitsupply"  onKeyPress="inputNumber(event,this.value,false);" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><strong>No of Beneficiaries</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtbeneficiariesno" id="txtbeneficiariesno"  onKeyPress="inputNumber(event,this.value,false);" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><span style="color:#91042B">*</span><strong>Partnering Organization/Agency</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtpartnerorg" id="txtpartnerorg" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="4"></td></tr>
                                             <tr>
                                                <td><span style="color:#91042B">*</span><strong>Outlay</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtoutlay" id="txtoutlay"  onKeyPress="inputNumber(event,this.value,true);"  /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><span style="color:#91042B">*</span><strong>Project Date</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="text" name="txtprojdt" id="txtprojdt"  class="calendarFocus"/></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><strong>Project Contact Details</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><textarea id="txtprojcontactdetail" name="txtprojcontactdetail" maxlength='1000' rows="5" cols="30"></textarea><br />(Maximum 1000 Character)</td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><strong>Image1</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="file" name="uploadimg1" id="uploadimg1" onchange="readURL(this);" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><strong>Image2</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="file" name="uploadimg2" id="uploadimg2" onchange="readURL(this);" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><strong>Image3</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="file" name="uploadimg3" id="uploadimg3" onchange="readURL(this);"  /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                             <tr>
                                                <td><strong>Image4</strong></td>
                                                <td><strong>:</strong></td>
                                                <td><input type="file" name="uploadimg4" id="uploadimg4" onchange="readURL(this);" /></td>
                                            </tr>
                                            <tr height="15"><td colspan="3"></td></tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><input type="checkbox" name="chkagree" id="chkagree"  />(<strong><em>I agree that the content submitted by me are correct to my knowledge.</em></strong>)</td>
                                             </tr>
                                           <tr height="15"><td colspan="3"></td></tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><input type="submit" name="btnsave" value="Add" class="login" /></td><!--<input type="button" name="btnsave" value="Add" class="login" onclick="Formsubmit()" />-->
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
