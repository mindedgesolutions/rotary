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



	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="../clubprojects/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="../clubprojects/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="../clubprojects/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
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

		/*$("a[rel=image_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});*/
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

</head>

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
                    
                    <p class="text" style="padding-top:12px; margin-top:0">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
    	<td align="right"><div align="right"><a href="Panel.php" class="login">Back to Admin Panel</a><a href="logout.php" class="login">Logout</a></div></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
    	<td align="left">
        	
               <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                              <p class="text">
                              <fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;Filter your search&nbsp;&nbsp;</legend>
                        					<p style="padding:7px 0 0 0; margin:0">
                                                
                                                <table width="98%" border="0" cellspacing="0" cellpadding="5" align="right" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color:#333333">
                                                    <tr>
                                                        <td width="21%"><strong>Category</strong></td>
                                                        <td width="2%"><strong>:</strong></td>
                                                        <td width="77%">
                                                        <select id="chocateg" name="chocateg"  onchange="districtlist(this.value);" style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px"><!--onchange="subcategorylist(this.value)"-->
                                                            <option value="">Select</option>
                                                        </select>
                                                        </td>
                                                    </tr>
                                                   <!-- <tr>
                                                        <td><strong>Sub Category</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="chosubcateg" name="chosubcateg" onchange="districtlist(this.value);" style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>-->
                                                    <tr>
                                                        <td><strong>Rotary District</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="chodistrict" name="chodistrict" onchange="dispclub(this.value)"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Rotary Club of</strong></td>
                                                        <td><strong>:</strong></td>
                                                        <td>
                                                            <select id="choclub" name="choclub"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                    </tr>                                        
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="button" id="btngo" name="btngo" value="Search" onclick="dispProjects();" class="login" />&nbsp;<input type="button" id="btnreset" name="btnreset" value="Reset" onclick="resetView()" class="login" />
                                                        </td>
                                                    </tr>
                                                    <tr height="5"><td colspan="3"></td></tr>
                                                </table>                                                
                                                  
                                			</p>
                                	</fieldset>
                                    <br />
                                    <div id="projectResult"></div>
                                </p>
                                
							</td>
							
						</tr>
					</table>




    	</td>
    </tr>
</table>


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

function categorylist()
{
var str = "";
$.ajax({                                      
      url: '../categorylist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["categoryid"]+"'>"+data[i]["category"]+"</option>";
				}
			}			 
			 	$("#chocateg").append(str);
		}
	});	
}

/*function subcategorylist(val)
{
var str = "";
var pars = 'categid='+val;
$.ajax({                                      
      url: '../subcategorylist.php',                     
      data:pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["subcategoryid"]+"'>"+data[i]["subcategory"]+"</option>";
				}
			}	
				$("#chosubcateg").children('option:not(:first)').remove();	
				$("#chodistrict").children('option:not(:first)').remove();
				$("#choclub").children('option:not(:first)').remove();	
			 	$("#chosubcateg").append(str);
		}
	});	
}*/

function districtlist(val)
{
var str = "";
var pars = 'categid='+val
$.ajax({                                      
      url: '../districtlistforview.php',                     
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
				$("#chodistrict").children('option:not(:first)').remove();	
				$("#choclub").children('option:not(:first)').remove();	
			 	$("#chodistrict").append(str);
		}
	});
}


function dispclub(val)
{
	var str = "";
	var pars ='dist='+val;
	var selected='';
$.ajax({                                      
      url: '../clublistforview.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
				//str=str+"<option value=''>Select</option>";
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["club"]+"'" +selected+">"+data[i]["club"]+"</option>";
				}
			}
			$("#choclub").children('option:not(:first)').remove();	
			$("#choclub").append(str);			 
		}
	});
}


function dispProjects(){
var str = '<table width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#cccccc" style="border-collapse:collapse; font-size:11px; font-family:Arial, Helvetica, sans-serif; background:#FFFFFF" align="center">';
	str = str+'<tr height="20px"><td style="text-align:center; font-weight:bold; background:#eaeaea">Sl. No.</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Id</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Title</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Category</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Venue</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Date</td><td style="text-align:center; font-weight:bold; background:#eaeaea">View</td><td style="text-align:center; font-weight:bold; background:#eaeaea">&nbsp;</td></tr>';
	var pars ='categid='+$("#chocateg").val()+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val();

$.ajax({                                      
      url: 'projectslist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				//alert(JSON.stringify(data))
				for(var i=0; i<data.length; i++)
				{
					str = str+'<tr height="20px">';
					str = str+'<td style="text-align:center;">'+(i+1)+'</td>';
					str = str+'<td style="text-align:center;">'+data[i]["projectid"]+'</td>';
					str = str+'<td>'+data[i]["title"]+'</td>';
					str = str+'<td>'+data[i]["category"]+'</td>';
					//str = str+'<td>'+data[i]["subcategory"]+'</td>';
					str = str+'<td>'+data[i]["projectvenue"]+'</td>';
					str = str+'<td style="text-align:center;">'+data[i]["projectdate"]+'</td>';
					
					if(data[i]["img1"]!='' || data[i]["img2"]!='' || data[i]["img3"]!='' || data[i]["img4"]!='') 					{
					str = str+'<td style="text-align:center;" class="link"><a href="javascript: void(0)" onclick="displimg('+data[i]["projectid"]+');" title="Click here to view Image">Image</a>&nbsp;&nbsp;&nbsp;<a href="javascript: void(0)" onclick="displcontent('+data[i]["projectid"]+');" title="Click here to view Detail">Detail</a></td>';
					}
					else
					{
					str = str+'<td style="text-align:center;" class="link"><a href="javascript: void(0)" onclick="displcontent('+data[i]["projectid"]+');" title="Click here to view Detail">Detail</a></td>';
					}
					
					if(data[i]["projectstatus"]==1){
						title = 'Deactivate';
						statuslinktext = '../images/yes.jpg';
					}
					 else {
						title = 'Activate';
						 statuslinktext = '../images/no.jpg';
					 }
						 
					str = str+"<td style='text-align:center'><input type='hidden' id='hdnstatus_"+data[i]["projectid"]+"' name='hdnstatus_"+data[i]["projectid"]+"' value='"+data[i]["projectstatus"]+"'/><img  id='statuslink_"+data[i]["projectid"]+"' title='"+title+"' style='cursor:pointer' src='"+statuslinktext+"' href='javascript: void(0)' onclick='updtstatus("+data[i]["projectid"]+")' />&nbsp;<img src='../images/del.jpg' title='Delete' style='cursor:pointer'  onclick='deleteproject("+data[i]["projectid"]+")' /></td>";
					
					str = str+'</tr>';
				}
			
			}
			
			//<a rel="image_group" href="'+data[i]["img1"]+'">image</a> &nbsp;&nbsp;<div id="imgcontainer" style="display: none"><a rel="image_group" href="'+data[i]["img1"]+'" ><img alt="" src="'+data[i]["img1"]+'" /></a></div>
			str = str+"</table>";
			$("#projectResult").html(str);
					 
		}
	});

}


function resetView() {
	$("#chocateg").val('');
	$("#chosubcateg").children('option:not(:first)').remove();
	$('#chodistrict').children('option:not(:first)').remove();
	$('#choclub').children('option:not(:first)').remove();
	$("#projectResult").html('');
}

function displimg(val) {
	var _items = [];
	var pars ='id='+val;
	$.ajax({                                      
      url: '../clubprojects/dispimg.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0) 
			{
				for(var i=1; i<=4; i++ ) {
					if(data[0]["img"+i]!='') {
				 _items.push({'href' : 'projectupload/'+data[0]["img"+i], 'title' : data[0]["title"]});
					}
				}s
					$.fancybox(_items,
								{
								
								'padding': 0,
								'transitionIn': 'elastic',
								'transitionOut': 'elastic',
								'type' : 'image',
								'changeFade' : 0,
								'overlayOpacity': 0.8,
								'overlayColor': '#000000'
								}
								
								);				 
			}
		}
	});
	 return false;
}



function displcontent(val) {
	
	var pars ='id='+val; 
	$.ajax({                                      
      url: '../clubprojects/dispcontent.php',                     
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
	 return false;
}

function updtstatus(rowid) {
var statusval = $("#hdnstatus_"+rowid).val();
	$.ajax({                                      
      url: 'changestatus.php',                     
      data: 'id='+rowid+'&statusval='+statusval+'&for=project',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data["status"]==1) {
			$("#statuslink_"+rowid).attr("src","../images/yes.jpg");
			$("#hdnstatus_"+rowid).val(1)
			}
			else
			{
			$("#hdnstatus_"+rowid).val(0)
			$("#statuslink_"+rowid).attr("src","../images/no.jpg");
			}			 
		}
	});


}

function deleteproject(rowid) {
	
	if(!confirm('Are you sure?')) return;	
	//alert(rowid)
	$.ajax({                                      
      url: 'deleterecord.php',                     
      data: 'id='+rowid+'&from=project',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data["result"]==1)		 
			{
				dispProjects();
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






