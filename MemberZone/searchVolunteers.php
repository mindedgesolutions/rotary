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


<link href="button/style.css" rel="stylesheet" type="text/css" />




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

function dispVolunteers(val)
{
if(val=='')
{
$("#volunteerContainer").hide();
return false;
}
	$("#volunteerContainer").hide();
	var str="<table width='100%' border='1' bordercolor='#999999' cellpadding='2' cellspacing='0' style='text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333' align='left'>";	
	/*if(val=='All') {
	str = str+"<tr><td colspan='13' align='center' style='background:#f5f5f5'><h1 style='text-align:center; font-size:18px; margin-top:7px'>All Volunteers</h1></td></tr>";}
	else {
		str = str+" <tr><td colspan='13' align='center' style='background:#f5f5f5'><h1 style='text-align:center; font-size:18px; margin-top:7px'>Volunteers from "+val+"</h1></td></tr>";
		}*/

	str = str+"<thead><tr>";
	str = str+"<td style='text-align:center'><strong>Sl. No.</strong></td>";
	str = str+"<td style='text-align:center'><strong>Name</strong></td>";
	str = str+"<td style='text-align:center'><strong>Rotary Dist.</strong></td>";
	str = str+"<td style='text-align:center'><strong>Rotary Club</strong></td>";
	str = str+"<td style='text-align:center'><strong>State</strong></td>";
	str = str+"<td style='text-align:center'><strong>City</strong></td>";
	str = str+"</tr></thead>";
	str = str+"<tbody style='height: 100px; display: block; overflow: auto; '>";
	
	var pars ='volunttype='+val;
	$.ajax({                                      
      url: 'AdminPanel/volunteerslist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)      
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				j=i+1;
					str = str+" <tr>";
					str = str+"<td style='text-align:center'>"+j+"</td>";
					str = str+"<td>"+data[i]["name"]+"</td>";
					str = str+"<td style='text-align:left'><strong>"+data[i]["rotaryDistrict"]+"</strong></td>";
					str = str+"<td style='text-align:left'>"+data[i]["rotaryClubname"]+"</td>";
					str = str+"<td style='text-align:left'>"+data[i]["state"]+"</td>";
					str = str+"<td style='text-align:left'>"+data[i]["city"]+"</td>";
					str = str+"</tr>";
				}
			}
			else
			{
			 str = str+"<tr><td colspan='13' style='border-bottom:1px solid #cccccc; color:#cc3300'>Record not found.</td></tr>";	
			 }
			 
			 str = str+"</tbody></table>";
			 
			//setVisibility('sub2', 'inline');
			$("#totalrec").html(data.length)
			$("#volunteerContainer").show();
			$("#volunteerContainer").html(str);
		}
	});

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
</style>

</head>

<body>
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
                                
<br />

<table width="60%" border="0" cellspacing="0" cellpadding="0" style="text-align:left; margin-bottom:10px">
                                        <tr>
                                            <td width="8%">&nbsp;</td>
                                            <td width="25%"><strong>Volunteer Type</strong></td>
                                            <td width="2%"><strong>:</strong></td>
                                            <td width="66%">
                                                <select id="chovolunteers" name="chovolunteers" onchange="dispVolunteers(this.value);" class="button" style="width:100%; cursor:pointer; color:#333333; font-weight:bold">
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
                                    </table>
                                    
                              <div style="padding:10px 0; font-weight:bold">
	<h1 style="color:#CC3300; font-size:18px">Total Record : <span id="totalrec"></span></h1>
</div>
<div id="volunteerContainer" style="display:none; height:250px;"></div>



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






