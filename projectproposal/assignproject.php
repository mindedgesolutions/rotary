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
</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body onload="displayrequest();">
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
                              <h1>Apply for Project Proposal</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                               
                                <p class="text">
                                	<fieldset style="border:1px solid #990000; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:Arial, Helvetica, sans-serif; padding: 0; background:#f5f5f5;">
                        				<legend style="font-weight:bold; color:#990000; font-style:italic; font-size:12px">&nbsp;&nbsp;Request for Assigning Project  &nbsp;&nbsp;</legend>
										 No of volunteer need - <span id="noofvolunteer"></span>
                        					<p style="padding:7px 0 0 0; margin:0">
                                              <div id="projectreq"></div>
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
	

function displayrequest() {
	var str ="";
	var projectid="<?php echo $_GET["project"];?>"
	var pars ='id='+projectid; 
	var	volunteercnt =0; 

	$.ajax({                                      
      url: 'disprequestrecord.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		
		success: function(data)         
      	{
		str =str+"<table border='1' cellpadding='1' cellspacing='1'>";
		 str =str+"<tr><td>Name</td><td>District</td><td>Club</td><td>Email</td><td>Contact</td><td>Status</td><td>Apply Date</td><td>&nbsp;</td></tr>";

			for(var i=0; i<data.length; i++){
			if(data[i]["status"]=='Accept') {
			volunteercnt = volunteercnt+1;
			}
			str = str+"<tr>";
			str = str+"<td>"+data[i]["name"]+"</td>";
			str = str+"<td>"+data[i]["rotaryDistrict"]+"</td>";
			str = str+"<td>"+data[i]["rotaryClubname"]+"</td>";
			str = str+"<td>"+data[i]["email"]+"</td>";
			str = str+"<td>"+data[i]["contact"]+"</td>";
			str = str+"<td>"+data[i]["status"]+"</td>";
			str = str+"<td>"+data[i]["applydt"]+"</td>";
			str = str+"<td><a href='javascript: void(0)' onclick=updatestatus('Accept',"+data[i]["volunteerid"]+")>Accept</a>&nbsp;<a href='javascript: void(0)' onclick=updatestatus('Reject',"+data[i]["volunteerid"]+")>Reject</a>&nbsp;<a href='javascript: void(0)' onclick=updatestatus('Report',"+data[i]["volunteerid"]+")>Report</a></td>";
			str = str+"</tr>";
			}
		//
		str = str+"</table>";
	$("#projectreq").html(str)					 
	//alert(data[0]["noofpersonneeded"])
		reqvolunteer = (data[0]["noofpersonneeded"]-volunteercnt);
	$("#noofvolunteer").html(reqvolunteer)					 
		}
	});
}

function updatestatus(status,volunteerid) {
	var pars ='updatestatus='+status+'&project='+"<?php echo $_GET["project"];?>"+'&volunteer='+volunteerid ;
	
$.ajax({                                      
      url: 'updateapplicantstatus.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
		alert(data["msg"])
		displayrequest();
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






