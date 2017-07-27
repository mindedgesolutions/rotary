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
<script language="javascript" type="text/javascript" src="http://rotaryteach.org/AdminPanel/tiny_mce/tiny_mce.js"></script>




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

		var isupdateChanged	=	false;
//------------------Tinymce ------------------------------------
			tinyMCE.init({
				// General options
				mode : "exact",
				elements : "txtprojectdesc",
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

function validation() {

	if($.trim($("#txtprojectname").val())==''){
	alert("Please enter project name.");
	$("#txtprojectname").focus();
	return false;
	}
	if($.trim($("#txtprojectloc").val())==''){
	alert("Please enter project location.");
	$("#txtprojectloc").focus();
	return false;
	}
	if($.trim($("#txtaddress").val())==''){
	alert("Please enter project address.");
	$("#txtaddress").focus();
	return false;
	}
	
	if($.trim($("#chodistrict").val())==''){
	alert("Please choose district.");
	$("#chodistrict").focus();
	return false;
	}
	if($.trim($("#choclub").val())==''){
	alert("Please choose club.");
	$("#choclub").focus();
	return false;
	}
	if(tinyMCE.get("txtprojectdesc").getContent().trim()=='')
	{
		alert("Please enter project description.")
		return false;
	}
	if($.trim($("#txtusername").val())==''){
	alert("Please enter username.");
	$("#txtusername").focus();
	return false;
	}
	if($.trim($("#txtpwd").val())==''){
	alert("Please enter password.");
	$("#txtpwd").focus();
	return false;
	}
	if($.trim($("#txtemail").val())==''){
	alert("Please enter email.");
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
	if($.trim($("#txtnoofperson").val())==''){
	alert("Please enter no of volunteer required.");
	$("#txtnoofperson").focus();
	return false;
	}
	/*	if($.trim($("#txtprojectuploadedby").val())==''){
	alert("project uploaded by whom.");
	$("#txtprojectuploadedby").focus();
	return false;
	}
	*/
	return true


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
                              <h1>Project Requirement Upload</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                               
                                <p class="text">
                                	<fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;Upload Project Requirement &nbsp;&nbsp;</legend>
                        					<p style="padding:7px 0 0 0; margin:0">
                                              <form id="frm" name="frm" action="projectproposal.php" method="post">  
                                                <table width="98%" border="0" cellspacing="0" cellpadding="5" align="right" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color:#333333">
                                                    <tr>
                                                        <td width="44%"><strong>Name of Project <span style="color:#ff0000">*</span></strong></td>
                                                      <td width="2%"><strong>:</strong></td>
                                                      <td width="54%"><input type="text" id="txtprojectname" name="txtprojectname" style="width:96%" /> </td>
                                                  </tr>
													 <tr>
                                                        <td><strong>Location of Project <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><input type="text" id="txtprojectloc" name="txtprojectloc"  style="width:96%" /> </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Address <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><input type="text" id="txtaddress" name="txtaddress"  style="width:96%" /> </td>
                                                    </tr>
													
													<tr>
                                                        <td><strong>District <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="chodistrict" name="chodistrict" onchange="dispclub(this.value)"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Club <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="choclub" name="choclub"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px" tabindex="3">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>   
													<tr>
                                                        <td><strong>City</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><input type="text" id="txtcity" name="txtcity" style="width:96%" /> </td>
                                                    </tr> 
													
													<tr>
                                                        <td><strong>State</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><input type="text" id="txtstate" name="txtstate" style="width:96%" /> </td>
                                                    </tr> 
													
													 <tr>
                                                        <td><strong>Project Requirements Details <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
													 <tr>
                                                       
                                                        <td colspan="3"> <textarea  id="txtprojectdesc" name="txtprojectdesc" rows="8" cols="40" style="width:98%"></textarea> </td>
                                                    </tr>   
													
													<!--<tr>
                                                        <td><strong>Project Uploaded By</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txtprojectuploadedby" name="txtprojectuploadedby"  width="50%" /> </td>
                                                    </tr> 
													  
													<tr>
                                                        <td><strong>Contact No.</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txtcontact" name="txtcontact"  width="50%"  onKeyPress="inputNumber(event,this.value,false);" maxlength="12"/> </td>
                                                    </tr>
													<tr>
                                                        <td><strong>Date</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txtprojectdate" name="txtprojectdate"  width="50%" /> </td>
                                                    </tr> -->
													<tr>
                                                        <td><strong>Username <span style="color:#ff0000">*</span><br /><em>(To check Project proposals by volunteers)</em></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txtusername" name="txtusername" style="width:96%" /> </td>
                                                    </tr>
													<tr>
                                                        <td><strong>Password <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="password" id="txtpwd" name="txtpwd" style="width:96%" /> </td>
                                                    </tr>
													<tr>
                                                        <td><strong>Email <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txtemail" name="txtemail" style="width:96%" /> </td>
                                                    </tr>
													<tr>
                                                        <td><strong>No. of Volunteers Required <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txtnoofperson" name="txtnoofperson"  style="width:12%" onKeyPress="inputNumber(event,this.value,false);" maxlength="3"/> </td>
                                                    </tr>
													<tr>
                                                        <td><strong>Time Frame for Project Completion <em>(in days)</em></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txttime" name="txttime" style="width:12%"  onKeyPress="inputNumber(event,this.value,false);" maxlength="5"/> </td>
                                                    </tr> 
													<tr>
                                                        <td><strong>No. of Hours Required per Day From Volunteer</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txthours" name="txthours" style="width:8%"  onKeyPress="inputNumber(event,this.value,true);" maxlength="2"/> </td>
                                                    </tr>                                        
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="button" id="btngo" name="btngo" value="Submit" class="login" onclick="saveprojectproposal()"/>&nbsp;<input type="reset" id="btnreset" name="btnreset" value="Reset"  class="login" />
                                                        </td>
                                                    </tr>
                                                    <tr height="5"><td colspan="3"></td></tr>
                                                </table>                                                
                                                 </form> 
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

function saveprojectproposal() {

if(!validation())
{
	return false;
}

	var pars =$("form").serialize()+'&projdesc='+escape(tinyMCE.get("txtprojectdesc").getContent().trim());
alert(pars)
$.ajax({                                      
      url: 'addproposal.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
		if(data["success"]==1)
		{
		alert(data["msg"])
		document.getElementById("frm").reset();
		}
		else
		{
		alert(data["msg"])
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
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});
</script>


</body>
</html>






