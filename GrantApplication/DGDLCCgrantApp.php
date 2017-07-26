<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />

<!--<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>-->

<link href="../button/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>


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
			 	$("#txtDistrict").append(str);
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
			
			$("#txtClub").empty();
			$("#listofapplication").html('');
			$("#txtClub").append(str);			 
		}
	});
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
<div style="background:url(../images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(../images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("../logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
         <?php include("../menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
          <?php include("../header_area.html");?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="../images/h_top_l.png" /></td>
                <td style="background:url(../images/h_top.png)"></td>
                <td width="8"><img src="../images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(../images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Applications</h1>
                                     	</td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                
                				<div class="auto-style1">
									
                              
<br class="auto-style2" />

<style>
.hed1 {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
 .hed {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
 .hed:hover { border:1px solid #b6c7cc;
 background-color: #d4dee1; color: #0066FF;
 background-image: linear-gradient(to bottom, #d4dee1, #a9c0c8);
 }
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	color: #FF0000;
}
</style>
								</div>
            <p style="padding:15px 15px 0 15px; margin:0"><span style="color:#FF0000; font-size:14px; font-weight:bold"><?php echo $msg;?></span>
               
                <table border="0" cellpadding="5" cellspacing="0" width="90%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
				 <tr>
                    <td colspan="3"><a href="javascript: void(0)" onclick="applicationlist('all');">View All</a>
					</td>
                </tr>				
				 <tr>
                    <td width="30%"><strong><span>District </span><span style="color:#ff0000">*</span></strong></td>
                    <td width="2%"><strong>:</strong></td>              
                    <td>
					<select id='txtDistrict' name='txtDistrict'  onchange='dispclub(this.value)'>
						<option value="">Select</option>
						</select>
					</td>
                </tr>
				
				 <tr>
                    <td><strong>Club <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>
                    <td><select id="txtClub" name="txtClub" onchange="applicationlist('filter');"><option value="">Select</option></select>
					</td>
                </tr>
				
				<tr><td colspan="3"><div id="listofapplication"></div></td></tr>
               
               
                </table>                               
              
                </form>
				<form name="frmapprove" id="frmapprove" method="post" action="goforAdminapproval.php">
					<input type="hidden" name="hdnrefappno" id="hdnrefappno" />
					<input type="hidden" name="hdnapproveby" id="hdnapproveby" />
				</form> 
				<form name="frmpdf" id="frmpdf" method="post" action="pagetopdf.php" target="_blank">
					<input type="hidden" name="hdnpdfrefappno" id="hdnpdfrefappno" />
				</form> 				  
            </p>            
		<!--</td>
	</tr>
</table>-->
           
        
    						</td>
    						<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("../inner_right.html");?>
                            </td>
						</tr>
					</table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
                     <?php include("../footer_area.html");?>
					
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
          
    </div> 

    
    
</div>
</div>
</center>
	<script type="text/javascript" src="../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>


<script type="text/javascript">



/*
	Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});*/
	
	function validation()
	{
	
		if($.trim($("#txtDistrict").val())==''){
			alert("Please choose district.");
			$("#txtDistrict").focus();
			return false;
		}
		if($.trim($("#txtClub").val())==''){
			alert("Please choose club.");
			$("#txtClub").focus();
			return false;
		}
	return true;
	
	}
	
	function applicationlist(viewval){

if(viewval=='filter') {	
	if(!validation())
			{
				return false;
			}
		
			 pars ='district='+$("#txtDistrict").val()+'&club='+$("#txtClub").val()
	}
	else if(viewval=='all') {	

			 pars ='district=all'
	}
		
		var str = ""
						str =str+"<table border='1' cellpadding='2' width='100%' align='center' ><tr>";
						str =str+"<td>Applications</td>";
						str =str+"<td>District</td>";
						str =str+"<td>Club</td>";
						str =str+"<td>Images</td>";
						str =str+"<td>Approved By DLCC</td>";
						str =str+"<td>Approved By DG</td>";
						str =str+"<td>Approved By CEO of RILM</td>";
						str =str+"<td>Approved By Chairman of RILM</td>";
						str =str+"</tr>";
		$.ajax({                                      
			  url: 'getApplication.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
				
				if(data.length>0) {	
					for(var i=0; i<data.length; i++){
						var funct = "viewApplication('"+data[i]["refappno"]+"')"
						var imgfunct = "viewApplicationImage('"+data[i]["refappno"]+"')"
						
						if(data[i]["approvebyDLCC"]=='Yes')
						var DLCCapprovefunct = ""
						else
						var DLCCapprovefunct = "goforapprove('"+data[i]["refappno"]+"','DLCC')"
						
						if(data[i]["approvebyDG"]=='Yes')
						var DGapprovefunct = ""
						else
						var DGapprovefunct = "goforapprove('"+data[i]["refappno"]+"','DG')"
						
						if(data[i]["approvebyRILMCEO"]=='Yes') 
						var RILMCEOapprovefunct = ""
						else
						var RILMCEOapprovefunct = "goforapprove('"+data[i]["refappno"]+"','RILMCEO')"
						
						if(data[i]["approvebyRILMCP"]=='Yes') 
						var RILMCPapprovefunct = ""
						else
						var RILMCPapprovefunct = "goforapprove('"+data[i]["refappno"]+"','RILMCP')"
						
						str =str+"<tr>";
						str =str+"<td>"+(i+1)+". <a href='javascript: void(0)' onclick="+funct+">"+data[i]["refappno"]+"</a></td>";
						str =str+"<td>"+data[i]["district"]+"</td>";
						str =str+"<td>"+data[i]["club"]+"</td>";
						/*str =str+"<td>"+(i+1)+". <a href='javascript: void(0)' onclick="+imgfunct+">Images</a></td>";*/
						str =str+"<td><a href='javascript: void(0)' onclick="+imgfunct+">Images</a></td>";
						str =str+"<td><a href='javascript: void(0)' onclick="+DLCCapprovefunct+">"+data[i]["approvebyDLCC"]+"</a></td>";
						str =str+"<td><a href='javascript: void(0)' onclick="+DGapprovefunct+">"+data[i]["approvebyDG"]+"</a></td>";
						if(data[i]["approvebyDG"]=='Yes' && data[i]["approvebyDLCC"]=='Yes') {
						str =str+"<td><a href='javascript: void(0)' onclick="+RILMCEOapprovefunct+">"+data[i]["approvebyRILMCEO"]+"</a></td>";
						str =str+"<td><a href='javascript: void(0)' onclick="+RILMCPapprovefunct+">"+data[i]["approvebyRILMCP"]+"</a></td>";
						}
						else {
						str =str+"<td>&nbsp;</td>";
						str =str+"<td>&nbsp;</td>";
						}
						str =str+"</tr>";
						}
					}
					else
					{
					str =str+"<tr><td colspan='8' style='color:red'>Application are not found</td></tr>";
					}
			$("#listofapplication").html(str);
				}
			});
			
	}
		
	function viewApplication(refno) {
				$('#hdnpdfrefappno').val(refno);
				$("#frmpdf").submit();
	}
	

	function goforapprove(refno,approveby)
	{
			if(!confirm('Want to Approved this application?')) return;
				$('#hdnrefappno').val(refno);
				$('#hdnapproveby').val(approveby);
				$('#frmapprove').submit();
	}

	function viewApplicationImage(refno) {
	var _items = [];
	var pars ='refappno='+refno;
	$.ajax({                                      
      url: 'dispimg.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0) 
			{
				for(var i=0; i<=34; i++ ) {
					if(data[0][i]!='') {
				 _items.push({'href' : 'grantAppImgUpload/'+data[0][i]});
					}
				}
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
	
	
</script>


</body>
</html>






