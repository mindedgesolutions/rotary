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

<!-- FONT -->
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>




	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
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
</style>

</head>

<body onload="categorylist();">
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
                              <h1>View Club Project</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                               
                                <p class="text">
                                	<fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;Filter your search&nbsp;&nbsp;</legend>
                        					<p style="padding:7px 0 0 0; margin:0">
                                                
                                                <table width="98%" border="0" cellspacing="0" cellpadding="5" align="right" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color:#333333">
                                                    <tr>
                                                        <td width="21%"><strong>Category</strong></td>
                                                        <td width="2%"><strong>:</strong></td>
                                                        <td width="77%">
                                                        <select id="chocateg" name="chocateg" onchange="districtlist(this.value);"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px"><!--onchange="subcategorylist(this.value)"-->
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

function subcategorylist(val)
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
}

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
	str = str+'<tr height="20px"><td style="text-align:center; font-weight:bold; background:#eaeaea">Sl. No.</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Id</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Title</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Category</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Venue</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Date</td><td style="text-align:center; font-weight:bold; background:#eaeaea">View</td></tr>';
	var pars ='categid='+$("#chocateg").val()+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val();
//alert(pars)
$.ajax({                                      
      url: '../projectslist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
			//	alert(JSON.stringify(data))
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
      url: 'dispimg.php',                     
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
				}
				/*[
								{"title": "Image title 1", "href": "projectupload/"+data[0]["img1"]},
								{"title": "Image title 2", "href": "projectupload/"+data[0]["img2"]},
								{"title": "Image title 3", "href": "projectupload/"+data[0]["img3"]}
								]*/
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
      url: 'dispcontent.php',                     
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






