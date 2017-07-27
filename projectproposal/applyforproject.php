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
<link rel="stylesheet" type="text/css" href="http://rotaryteach.org/clubprojects/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!-- FONT -->
<!--<script type="text/javascript" src="../js/jquery.min.js"></script>-->

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>




	<script>
		//!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

<!--<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>-->
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
      url: 'projectdistrictlist.php',                     
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
      url: 'projectclublist.php',                     
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


function validation() {
	if($.trim($("#choproject").val())==''){
	alert("Please choose project.");
	$("#choproject").focus();
	return false;
	}
	if($.trim($("#txtvolunteerid").val())==''){
	alert("Please enter volunteer Id.");
	$("#txtvolunteerid").focus();
	return false;
	}

	if($.trim($("#txtvolunteeremail").val())==''){
	alert("Please enter email.");
	$("#txtvolunteeremail").focus();
	return false;
	}
	if($.trim($("#txtvolunteeremail").val())!="")
	{
		  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 if(!expr.test($.trim($("#txtvolunteeremail").val())))
		 {
		 	alert("Invalid Email!");
			$("#txtvolunteeremail").focus();
			return false;
		 }
	}
	
	$.ajax({                                      
      url: 'chkbeforeapply.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data["success"]==0)
			{
			alert(data["msg"])
			return false;
			}
		}
	});

	
	return true;
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
                              <h1>Volunteers - Apply for Project Requirements</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                               
                                <p class="text">
                                	<fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;Upload Project Proposal &nbsp;&nbsp;</legend>
                        					<p style="padding:7px 0 0 0; margin:0">
                                               <form id="applyform" name="applyform" action="" method="post"> 
                                                <table width="98%" border="0" cellspacing="0" cellpadding="5" align="right" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color:#333333" class="link">
                                                    
                                                    <tr>
                                                        <td><strong>District <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="chodistrict" name="chodistrict" onchange="dispclub(this.value)"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Club <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="choclub" name="choclub" onchange="dispprojectproposal(this.value)"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>                                                        </td>
                                                    </tr>   
													 <tr>
                                                        <td><strong>Project <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="choproject" name="choproject"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
															<a href="javascript: void(0)" onclick="displcontent();" title="Click here to view Detail">View project detail</a>                                                        </td>
                                                    </tr>   
													 <tr>
                                                        <td><strong>Volunteer Id <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><input type="text" id="txtvolunteerid" name="txtvolunteerid"  width="50%" /> <a href="searchvolunteerid.php" target="_blank">Search</a></td>
                                                    </tr>
													 <tr>
                                                        <td><strong>Email <span style="color:#ff0000">*</span></strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td> <input type="text" id="txtvolunteeremail" name="txtvolunteeremail"  width="50%" /> </td>
                                                    </tr>   
													<tr>
                                                        <td><strong>Contact No.</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td><input type="text" id="txtvolunteercontact" name="txtvolunteercontact" maxlength="15"  onkeypress="inputNumber(event,this.value,false);"  width="50%" /></td>
                                                    </tr>  
													                                 
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="button" id="btngo" name="btngo" value="Apply" class="login" onclick="applyforproject()"/>&nbsp;<input type="reset" id="btnreset" name="btnreset" value="Reset"  class="login" />                                                        </td>
                                                    </tr>
                                                    <tr height="10"><td colspan="3"></td></tr>
                                                    <tr><td colspan="3" style="text-align:left; font-style:italic; color:#000000">
														<strong style="color:#CC0000">Note :</strong> Kindly use the "Search" link above to search for your volunteer ID.</td></tr>
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

	<script type="text/javascript" src="http://rotaryteach.org/clubprojects/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="http://rotaryteach.org/clubprojects/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<script type="text/javascript">
	

function displcontent() {
	if($('#choproject').val()=='')
	{
		alert("Please choose project.")
		return false
	}
	
	var pars ='id='+$('#choproject').val(); 
	$.ajax({                                      
      url: 'dispproposalcontent.php',                     
      data: pars,
	  type:"post",
		dataType: 'text',
		success: function(data)         
      	{
			if(data.length>0) 
			{
				 $.fancybox(data); 
		
			}
								 
		}
	});
	// return false;
}

function applyforproject()
{
if(!validation())
{
	return false;
}

	var pars =$("form").serialize();
$.ajax({                                      
      url: 'applyforproposal.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
		//alert(JSON.stringify(data))
		if(data["success"]==1)
		{
		alert(data["msg"])
		document.getElementById("applyform").reset();
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






