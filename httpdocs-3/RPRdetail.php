<?php
session_start();
if(!isset($_SESSION["user"]))
{
	header("Location: detailviewlogin.php");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<link href="button/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://www.rotaryteach.org/js/jquery.min.js"></script>
	
	<script type="text/javascript" src="clubprojects/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="clubprojects/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="clubprojects/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

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
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div style="padding:0 15px; margin:0">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
      <table width="100%" border="0" cellspacing="0" cellpadding="10" align="center" style="margin-top:5px; margin-bottom:7px; background:#FFFFFF; border-radius:5px; box-shadow:0 0 3px #000000">
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td align="left" valign="bottom"><h1>Toolkit Order Details for Rotary India Global Dream</h1></td>
                            <td align="right"><div align="right"><a href="viewDetail.php" class="login">Back</a><a href="logout.php" class="login">Logout</a></div></td>
                        </tr>
                    </table>
                    
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:5px"></div>
                    
                    <p class="text" style="padding-top:12px; margin-top:0">
                    

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Filter your search :</h1>
<div style="background:#CCCCCC; height:2px; margin-bottom:10px"></div>

<form action="CSV/RPRDetailCSV.php" name="frm1" method="post">  
                                                <table width="98%" border="0" cellspacing="0" cellpadding="5" align="right" style="text-align:left; font-family:Arial, Helvetica, sans-serif; color:#333333">
                                                    
                                                  
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
                                                            <input type="button" id="btngo" name="btngo" value="Search" onclick="dispProjects();" class="login" />&nbsp;<input type="submit" id="btncsv" name="btncsv" value="Download CSV"  class="login" />
                                                        </td>
                                                    </tr>
                                                    <tr height="5"><td colspan="3"></td></tr>
                                                </table> 
												</form>
<br />

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Total Record : <span id="totalrec"></span></h1>
<div style="background:#CCCCCC; height:2px"></div>

<div id="projectResult" ></div>


                    </p>
                                            

                    
                    <!----------------------- FOOTER AREA START------------------------>
                                         <?php include("footer_area.html");?>

                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>

<script type="text/javascript">



function districtlist(val)
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
      url: 'clublistforRPR.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
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

/*`id`, `RotDistrict`, `SchoolName`, `SchoolCity`, `SchoolCityPin`, `Address`, `City`, `State`, `Pin`, `shipAddress`, `shipCity`, `shipState`, `shipPin`, `NoAsamia`, `NoMarathi`, `NoBangla`, `NoOdia`, `NoEnglish`, `NoPunjabi`, `NoGujarati`, `NoUrdu`, `NoHindi`, `NoTamil`, `NoKannada`, `NoTelugu`, `NoNepali`, `NoManipuri`, `costAsamia`, `costMarathi`, `costBangla`, `costOdia`, `costEnglish`, `costPunjabi`, `costGujarati`, `costUrdu`, `costHindi`, `costNepali`, `costManipuri`, `costTamil`, `costKannada`, `costTelugu`, `TotalToolkit`, `Totalcost`, `DDImg1`, `DDImg2`, `DDImg3`, `DDImg4`, `DDImg5`, `SCFImg`, `Cheque1`, `amount1`, `chequedate1`, `bankbranch1`, `Cheque2`, `amount2`, `chequedate2`, `bankbranch2`, `Cheque3`, `amount3`, `chequedate3`, `bankbranch3`, `Cheque4`, `amount4`, `chequedate4`, `bankbranch4`, `Cheque5`, `amount5`, `chequedate5`, `bankbranch5`, `ClubNames`, `name`, `desig`, `email`, `Mob`, `submitted`
*/

function dispProjects(){
var str = '<table width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#cccccc" style="border-collapse:collapse; font-size:11px; font-family:Arial, Helvetica, sans-serif; background:#FFFFFF" align="center">';
	str = str+'<tr height="20px"><td style="text-align:center; font-weight:bold; background:#eaeaea">Sl. No.</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Id</td><td style="text-align:center; font-weight:bold; background:#eaeaea">District</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Club</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Shipping Address</td><td style="text-align:center; font-weight:bold; background:#eaeaea">School</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Total Toolkit</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Total Cost</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Date</td><td style="text-align:center; font-weight:bold; background:#eaeaea">DD</td><td  style="text-align:center; font-weight:bold; background:#eaeaea">School Commitment Form</td><td  style="text-align:center; font-weight:bold; background:#eaeaea">Toolkit Detail</td></tr>';
	var pars ='dist='+$('#chodistrict').val()+'&club='+$('#choclub').val();
//alert(pars)
$.ajax({                                      
      url: 'AdminPanel/RPRlist.php',                     
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
					str = str+'<td style="text-align:center;">'+data[i]["id"]+'</td>';
					str = str+'<td>'+data[i]["RotDistrict"]+'</td>';
					str = str+'<td>'+data[i]["ClubNames"]+'</td>';
					str = str+'<td>'+data[i]["shipAddress"]+', City- '+data[i]["shipCity"]+', State- '+data[i]["shipState"]+', Pin- '+data[i]["shipPin"]+'</td>';
					str = str+'<td>'+data[i]["SchoolName"]+'</td>';
					str = str+'<td>'+data[i]["TotalToolkit"]+'</td>';
					str = str+'<td>'+data[i]["Totalcost"]+'</td>';
					str = str+'<td style="text-align:center;">'+data[i]["submitted"]+'</td>';
					
					if(data[i]["DDImg1"]!='' || data[i]["DDImg2"]!='' || data[i]["DDImg3"]!='' || data[i]["DDImg4"]!='' || data[i]["DDImg5"]!='') 					{
					str = str+'<td style="text-align:center;" class="link"><a href="javascript: void(0)" onclick="displimg('+data[i]["id"]+');" title="Click here to view Image">DD</a></td>';
					}
					else
					{
					str = str+'<td style="text-align:center;" class="link">&nbsp;</td>';
					}
					if(data[i]["SCFImg"]!='') 					{
					str = str+'<td style="text-align:center;" class="link"><a href="javascript: void(0)" onclick="displSCFimg('+data[i]["id"]+');" title="Click here to view School Commitment Form">SCF</a></td>';
					}
					else
					{
					str = str+'<td style="text-align:center;" class="link">&nbsp;</td>';
					}
					str = str+'<td style="text-align:center;" class="link"><a href="javascript: void(0)" onclick="displcontent('+data[i]["id"]+');" title="Click here to view Toolkit Detail">Toolkit Detail</a></td>';
					
						 
					
					str = str+'</tr>';
				}
			
			}
			
			str = str+"</table>";
			$("#projectResult").html(str);
					 
		}
	});

}


function resetView() {
	$('#chodistrict').children('option:not(:first)').remove();
	$('#choclub').children('option:not(:first)').remove();
	$("#projectResult").html('');
}

function displimg(val) {
	//alert(val)
	var _items = [];
	var pars ='id='+val;
	$.ajax({                                      
      url: 'AdminPanel/RPRimg.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
		//alert(JSON.stringify(data))
			if(data.length>0) 
			{
				for(var i=1; i<=5; i++ ) {
					if(data[0]["DDImg"+i]!='') {
				 _items.push({'href' : 'Cheque/'+data[0]["DDImg"+i]});
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


function displSCFimg(val) {
	//alert(val)
	var _items = [];
	var pars ='id='+val;
	$.ajax({                                      
      url: 'AdminPanel/RPRimg.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
		//alert(JSON.stringify(data))
			if(data.length>0) 
			{
				
					if(data[0]["SCFImg"]!='') {
				 _items.push({'href' : 'Cheque/'+data[0]["SCFImg"]});	
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
function displcontent(val) {
	var pars ='id='+val; 
	$.ajax({                                      
      url: 'AdminPanel/dispRPRcontent.php',                     
      data: pars,
	  type:"post",
		dataType: 'text',
		success: function(data)         
      	{
//		alert(data)
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






