<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Rotary T-E-A-C-H</title>

<meta name="google-site-verification" content="OHugEoWM0ZVX5R5ecueMwmLkBqx42a7xXgRbDEg9L50" />

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<!--<link href="css/header_area.css" rel="stylesheet" type="text/css" />-->
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
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


<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript">
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48156858-1', 'rotaryteach.org');
  ga('send', 'pageview');

</script>


<style type="text/css">

.book{
border:1px solid #74bf36; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 15px 10px; text-decoration:none; text-align:center; font-weight:bold; color: #000000;
background-color: #8ed058; background-image: linear-gradient(to bottom, #8ed058, #7bb64b);
 }

</style>

</head>

<body>
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START -------------------->
		<?php include 'logo_area.html';?>
        
        <!----------------------- LOGO AREA END ---------------------->
        
        <!----------------------- MENU AREA START -------------------->
		<?php include 'mzone_menu_area.html';?>
        
        <!----------------------- MENU AREA END ---------------------->
        
        <!----------------------- HEADER AREA START ------------------>
		<?php include 'header_area.html';?>
        
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ----------------->
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="images/h_top_l.png" /></td>
                <td style="background:url(images/h_top.png)"></td>
                <td width="8"><img src="images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:10px">
                        <tr>
                            <td width="650" valign="top">
                                

                                <!--<h1>&nbsp;</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>-->
                                
                                <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="text-align:center; margin-bottom:25px">
                                    <tr>
                                        <td style="background:#c24747; box-shadow:0 0 2px #666666; border:1px solid #FFFFFF" valign="bottom" width="15%">
                                            <div class="T">
                                                <h2 style="margin:0; padding:0">
                                                    <a href="teacher_support.shtml" style="font-size:16px; margin:0; padding:9px 14px 10px 14px"><font style="color:#000000;">T</font>eacher Support</a>
                                                </h2>
                                            </div>
                                        </td>
                                        <td width="1%"></td>
                                        <td style="background:#3bb377; box-shadow:0 0 2px #666666; border:1px solid #FFFFFF" valign="bottom" width="15%">
                                            &nbsp;<div class="E">
                                                <h2 style="margin:0; padding:0">
                                                    <a href="elearning.shtml" style="font-size:16px; margin:0; padding:9px 27px 10px 27px"><font style="color:#000000;">E</font>-Learning</a>
                                                </h2>
                                            </div>
                                        </td>
                                        <td width="1%"></td>
                                        <td style="background:#e2674a; box-shadow:0 0 2px #666666; border:1px solid #FFFFFF" valign="bottom" width="15%">
                                            &nbsp;<div class="A">
                                                <h2 style="margin:0; padding:0">
                                                    <a href="adult_literacy.shtml" style="font-size:16px; margin:0; padding:9px 21px 10px 20px"><font style="color:#000000">A</font>dult Literacy</a>
                                                </h2>
                                            </div>
                                        </td>
                                        <td width="1%"></td>
                                        <td style="background:#37c7dc; box-shadow:0 0 2px #666666; border:1px solid #FFFFFF" valign="bottom" width="15%">
                                            &nbsp;<div class="C">
                                                <h2 style="margin:0; padding:0">
                                                    <a href="child_development.shtml" style="font-size:16px; margin:0; padding:9px 7px 10px 7px"><font style="color:#000000">C</font>hild Development</a>
                                                </h2>
                                            </div>
                                        </td>
                                        <td width="1%"></td>
                                        <td style="background:#cc6699; box-shadow:0 0 2px #666666; border:1px solid #FFFFFF" valign="bottom" width="15%">
                                            &nbsp;<div class="H">
                                                <h2 style="margin:0; padding:0">
                                                    <a href="happy_schools.shtml" style="font-size:16px; margin:0; padding:9px 19px 10px 18px"><font style="color:#000000">H</font>appy Schools</font></a>
                                                </h2>
                                            </div>
                                        </td>
                                    </tr>
                                </table>-->
                                
<!--#include file="button.html" -->


                                
                                <h6 style="padding:0; margin:0">"Rotarians pledge to eradicate illiteracy from India."</h6>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:7px"></div>
<br />

<!--<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td width="38%" valign="top" style="padding:10px; background:#0033FF; color:#ffffff; line-height:18px; text-align: left; font-family:Arial, Helvetica, sans-serif; box-shadow:0 0 3px #666666; border:1px solid #FFFFFF; font-weight:bold">
            <div style="text-align:center; background:#ffffff; padding:5px; margin:0 0 7px 0; border-bottom:1px solid #999999; color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px">
                <table width="68%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-size:15px">
                    <tr>
                        <td><img src="images/newsflash.gif" width="130" /></td>
                    </tr>
                    <tr>
                        <td>SUMMIT REGISTRATION UPDATE</td>
                    </tr>
                </table>
            </div>
            <ul style="text-align:left; list-style:disc; margin:15px 0 0 0; padding:0 0 0 15px">
                <li style="margin-bottom:15px">No payment by Cheque will be accepted any further.</li>
                <li style="margin-bottom:15px">Bank Draft (DD) upto dated <u>7th Feb</u> can be accepted at existing rate which should reach Kolkata latest by <u>9th Feb</u>.</li>
                <li style="margin-bottom:15px">Online Registration through website at old rate will be accepted till <u>9th Feb</u>.</li>
                <li style="margin-bottom:15px">From 10th Feb onwards, only Spot Registration at Pune will be accepted by Cash / Bank Draft.</li>
                <li style="margin-bottom:15px"><font style="color:#FF99FF">Check and remember your Registration Serial Number from the Uploaded Excel Sheet at Summit Website.</font></li>
                <li style="margin-bottom:15px"><font style="color:#FF99FF">Please carry valid Photo ID Card at Registration Counter at Pune to receive Name Batch.</font></li>
                
                <li style="margin-bottom:15px">
                	<a href="sals/Literacy_Programme_Final.pdf" target="_blank" style="color:#FFFF00; text-decoration:none; background:url(sals/images/pdf_icon.png) left center no-repeat; padding:0 0 0 25px">Click here to Download Final Summit Programme 2015</a>
                </li>
            </ul>
        </td>
        <td width="62%" align="right"><img src="sals/ignite-program.jpg" width="396" /></td>
    </tr>
</table>

<br />-->

<!--<p style="background:#def5ff; padding:7px 10px; margin:0 0 15px 0">
<marquee scrollamount="3" direction="left" style="padding:0; margin: 0;" onmouseover="this.stop();" onmouseout="this.start();" class="link">
Click on the <strong>"Volunteer Link"</strong> above to Submit Requirement for volunteer for projects.
</marquee>
</p>-->

<!--<div style="padding:15px; margin:15px 0 10px 0; text-align:justify; background:#f5f5f5; box-shadow:0 0 3px #666666; border-radius:5px; font-family:Arial, Helvetica, sans-serif; line-height:18px">

Rotary International’s successful “End Polio” program that resulted in eradication of polio, totally from India and from nearly 99% of the world, has motivated the <b>Rotarians in South Asia</b> to adopt <b>"Rotary’s Total Literacy Mission"</b>. In India, the <b>Rotary India Literacy Mission</b> wishes to achieve the literacy goals through its <b>T-E-A-C-H program :</b>

<p style="font-weight:bold; margin:10px 0 7px 0; padding:0 0 0 25px; font-style:italic">T - Teacher Support</p>
<p style="font-weight:bold; margin:7px 0; padding:0 0 0 25px; font-style:italic">E - E-Learning</p>
<p style="font-weight:bold; margin:7px 0; padding:0 0 0 25px; font-style:italic">A - Adult Literacy</p>
<p style="font-weight:bold; margin:7px 0; padding:0 0 0 25px; font-style:italic">C - Child Development</p>
<p style="font-weight:bold; margin:7px 0 10px 0; padding:0 0 0 25px; font-style:italic">H - Happy Schools</p>

Thus, the <b>"T-E-A-C-H Program" includes five "projects"</b>, each with specific focus but inter-linked with the others in objective and content so as to contribute to the program goal of Total Literacy accompanied with improvement in learning outcomes of primary/elementary education and spread of adult literacy in various parts of the country.

</div>-->
<div style="text-align:justify; line-height:18px; min-height:600px">

                <a href="http://www.rotaryteach.org/TEACH Brochure 16-17.pdf" target="_blank" title="T-E-A-C-H Brochure">
                <img src="images/TEACH_brochure-1.jpg" alt="T-E-A-C-H Brochure" width="180" border="0" align="right" style="margin:0 0 10px 15px; padding:1px; border:1px solid
                 #333333" /></a>
                Rotary in India through “Rotary India Literacy Mission” has embarked upon one of the most comprehensive programs on Total Literacy and Quality Education. This 
                mission wishes to achieve the literacy goals through its comprehensive program called T-E-A-C-H: 
                <br>
                <br>
                <strong>T</strong> – Teacher Support<br /><br />
                <strong>E</strong> – E-learning<br /><br />
                <strong>A</strong> – Adult Literacy<br /><br />
                <strong>C</strong> – Child Development<br /><br />
                <strong>H</strong> – Happy School
                <br>
                <br>
                Each of these programs with specific focus is inter-linked with the others in objective and content, accompanied with improvement in learning outcome of primary 
                education and spread of adult literacy in various parts of the country.
                <br>
                <br>
                Understanding the enormity of the task, we have decided to adopt, in implementing T-E-A-C-H, a strategy of meaningful co-operation with all actors in the field, by 
                forging strong partnerships with the Government, Corporate, National/ State specific Non-Governmental Organisations as well as international organisations working in
                various segments of this country wide endeavour.

                <br /><br />
                <p style="text-align:left; font-weight:bold; margin:0 0 7px 0">WHAT DOES T-E-A-C-H DO ?</p>
                <br>
                &nbsp;&nbsp;&nbsp;&diams;&nbsp;&nbsp;Training and recognising <strong>5,000</strong> outstanding teachers in primary / elementary schools this year.<br><br>
                &nbsp;&nbsp;&nbsp;&diams;&nbsp;&nbsp;Establishing <strong>10,000</strong> E-Learning Centers in schools this year.<br><br>
                &nbsp;&nbsp;&nbsp;&diams;&nbsp;&nbsp;Educating <strong>100,000</strong> adult non-literates across the country this year.<br><br>
                &nbsp;&nbsp;&nbsp;&diams;&nbsp;&nbsp;Sending <strong>100,000</strong> children back to school this year.<br><br>
                &nbsp;&nbsp;&nbsp;&diams;&nbsp;&nbsp;Upgrading <strong>1,000</strong> elementary schools to Happy Schools to curtail student dropouts this year.<br><br>
                
                      </div>
                                
                                <!--<h5 style="color:#1771b1; margin:25px 0 7px 0; font-size:18px; text-align:center">
                                    <u>RTE Anthem, Ministry of Human Resource Development</u>
                                </h5>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                <div style="margin:0 0 0 25px">
                                	<iframe style="border:2px solid #0099FF; padding:1px" width="600" height="300" src="//www.youtube.com/embed/h_vyk1XEYVE" frameborder="0" allowfullscreen></iframe>
                                </div>-->
                                
                                <!--<h5 style="color:#1771b1; margin:25px 0 7px 0; font-size:18px; text-align:center">
                                    <u>Raveena Tandon Thadani (Actress - Indian Film Industry)<br />Supports "Total Literacy by 2017"</u>
                                </h5>
                                <div style="margin:0 0 0 25px">
                                	<iframe width="600" height="350" src="//www.youtube.com/embed/DyziimW43dc" frameborder="0" allowfullscreen style="border:2px solid #0099FF; padding:1px"></iframe>
                                </div>-->
                                
                            </td>
                            <td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                                <!--#include file="inner_right.html"-->
                                <!--<p class="book">
                                    Books Collection Reported till date :<br><span id="bookcnt" style="color:#ff0000; text-shadow:none; font-weight:bold; font-size:18px; font-family:GeoSlab703 Md BT; text-shadow:1px 1px 0 #9ae35f"></span>
                                </p>
                                <br />
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
                                <p style="padding:0; margin:0; text-align:center">
                                    <a href="http://rotaryteach.org/registerationForm.php?for=Inner%20Wheel%20Member" target="_blank" style="text-decoration:none" title="Volunteer Registration (for Inner Wheel Member)">
                                        <img src="images/inner-wheel_logo.png" width="100" border="0" />
                                    </a>
                                    <a href="http://rotaryteach.org/registerationForm.php?for=Rotaractor" target="_blank" style="text-decoration:none" title="Volunteer Registration (for Rotaractor)">
                                        <img src="images/rotaract_logo.png" width="95" border="0" />
                                    </a>
                                </p>
                                
                                <br />
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
                                <p style="padding:0; margin:0; line-height:28px; font-weight:bold; text-align:center; background:#eaeaea; color:#990000">
                                    Photo Gallery
                                </p>
                                <p class="link" style="text-align:center; padding:0; margin:0">
                                    <a href="photo_gallery.shtml" style="font-size:12px; padding: 0; margin:0">
                                        <img src="images/photo_gallery.png" border="0" width="140" /><br />View full Photo Gallery.
                                    </a>
                                </p>
                                
                                <br />
                                
                                <p style="padding:0; margin:0; line-height:28px; font-weight:bold; text-align:center; background:#eaeaea; color:#990000">
                                    Video Gallery
                                </p>
                                <p class="link" style="text-align:center; padding:0; margin:10px 0 0 0">
                                    <a href="video_gallery.shtml" style="font-size:12px; padding: 0; margin:0">
                                        <img src="images/video_gallery1.png" border="0" width="150" style="margin-bottom:5px" /><br />View full Video Gallery.
                                    </a>
                                </p>
                                <br />
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
                                <p style="padding:0; margin:0; line-height:28px; font-weight:bold; text-align:center; background:#eaeaea; color:#990000">
                                    Connect with us on
                                </p>
                                <p style="padding:0; margin:7px 0 0 0; text-align:center">
                                    <a href="https://www.facebook.com/RotaryIndiaLiteracyMission" target="_blank" style="text-decoration:none" title="Connect with us on Facebook">
                                        <img src="images/facebook1.png" width="220" border="0" style="margin-bottom:5px" />
                                    </a>
                                    <br />
                                    <a href="https://twitter.com/rotaryteach" target="_blank" style="text-decoration:none" title="Connect with us on Twitter">
                                        <img src="images/twitter1.png" width="220" border="0" />
                                    </a>
                                    
                                </p>

                                
                                <style>
                                    #button1 {
                                        margin:3px 0 0 0;
                                        padding:10px 0;
                                        overflow: hidden;
                                        display: block;
                                        text-align: center;
                                        
                                        border:2px solid #baf887; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;
                                        font-size:12px;font-family:arial, helvetica, sans-serif; text-decoration:none; font-weight:bold; color: #FFFFFF;
                                        
                                        background-color: #a9db80; transition: all 300ms ease-in;
                                    box-shadow: 0 0 3px #000000;
                                    background-image: linear-gradient(to bottom, #a9db80, #96c56f);
                                }
                                    #button1:hover {
                                        border:2px solid #baf887;
                                        background-color: #8ed058; background-image: linear-gradient(to bottom, #8ed058, #7bb64b);
                                        }
                                </style>
                                <div style="margin-bottom:3px">
                                    &nbsp;</div>-->
                            </td>

                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<!--#include file="footer_area.html"-->
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
	Cufon.replace('h6', {hover: true});
	//Cufon.replace('h7');
</script>

<script type="text/javascript">

	function getbookcnt(){
		var pars=""	
		$.ajax({                                      
		  url: 'gettotalbookcount.php', 
		                      
		  data: pars,
		  type:"post",
			dataType: 'json',
			success: function(data)         
			{
				if(data.length>0)
				{
					$("#bookcnt").html(data[0]["bookcnt"]);
				}
			}
		});
	}

getbookcnt()	
</script>


</body>
</html>






