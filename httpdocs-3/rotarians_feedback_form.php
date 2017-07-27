<?php
include("connection.php");
$connect = @mysql_connect('192.185.36.129','rotary32_teach2','info123');
$db = @mysql_select_db('rotary32_teach2');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach - Download Forms</title>
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
<!-- TOP MENU END-->

<link href="button/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
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

</script>

<style type="text/css">
#slideshow {
	position:relative;
	height:152px
}
#slideshow IMG {
	position:absolute;
	top:0;
	left:0;
	z-index:8;
	opacity:0.0
}
#slideshow IMG.active {
	z-index:10;
	opacity:1.0
}
#slideshow IMG.last-active {
	z-index:9
}
.theader { border:1px solid #7d99ca; font-size:12px; text-align:center; font-family:arial, helvetica, sans-serif; padding: 8px 0; text-decoration:none; font-weight:bold; color: #FFFFFF; background-color: #a5b8da; background-image: linear-gradient(to bottom, #a5b8da, #7089b3); margin-top:20px; text-shadow:0 1px 1px #333333 }

.lb a { border:1px solid #15aeec; font-size:12px;font-family:arial, helvetica, sans-serif; padding:5px; text-decoration:none; font-weight:bold; color: #FFFFFF; 
background-color: #49c0f0; background-image: linear-gradient(to bottom, #49c0f0, #2CAFE3); display:block; text-align:center }

.lb a:hover { border:1px solid #1090c3; background-color: #1ab0ec; background-image: linear-gradient(to bottom, #1ab0ec, #1a92c2) }
.auto-style1 { background-repeat: no-repeat; background-position: left center }

</style>
<script type="text/javascript">
function loadXMLDoc(district_code)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('txtclubforother').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","club.php?district_code="+ district_code);
	//alert(district_code);
	xmlhttp.send();
}
</script>
</head>

<body>
<center>
  <div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
    <div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">
      <div id="wrapper"> 
        
        <!----------------------- LOGO AREA START ---------------------> 
        <?php include("logo_area.html"); ?>
        <!----------------------- LOGO AREA END -----------------------> 
        
        <!----------------------- MENU AREA START ---------------------> 
        <?php include("menu_area.html"); ?>
        <!----------------------- MENU AREA END -----------------------> 
        
        <!----------------------- HEADER AREA START ------------------> 
        <!--include file="header_area.html"--> 
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
            <td style="background:#FFFFFF" valign="top"><table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                <tr>
                  <td width="650" valign="top"><!--include file="button.html"-->
                    
                    <h1>Rotarians / Inner Wheel Feedback Form</h1>
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                    <div class="text">
                    <form action="rotarians_feedback_form.php" method="post" enctype="multipart/form-data">
                      <table width="100%" border="0">
                      <tr>
                        <td colspan="2" align="right"><div align="right"><a href="Feedback form of Rotarian (Asha Kiran Centre).docx" class="login">Download Form</a></div></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"><img src="images/Asha-Kiran.png" /></td>
                      </tr>
                      
                      <tr>
                        <td>1. Date of Visit:</td>
                        <td><input type="text" name="date_of_visit"  /></td>
                      </tr>
                      <tr>
                        <td>2. Name of NGO:</td>
                        <td>
                        <select name="ngo">
                        <option value="" selected="selected">Select</option>
                        <?php 
							$sql= mysql_query("select * from tbl_ngo");
							while($row = mysql_fetch_array($sql))
							{
							$data=$row['name_partner_ngo'];
							?>
							<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
							<?php
							 } 
						   ?>
                        </select>
                        </td>
                      </tr>
                      <tr>
                        <td>3. Name of Centre:</td>
                        <td><input type="text" name="name_of_center"  /></td>
                      </tr>
                      <tr>
                        <td>4. Location of Centre:</td>
                        <td><input type="text" name="location_of_center"  /></td>
                      </tr>
                      <tr>
                        <td>5. Name of person interacted at the centre:</td>
                        <td><input type="text" name="person_interacted"  /></td>
                      </tr>
                       <tr>
                        <td>6. Total number of children in the centre:</td>
                        <td><input type="text" name="total_children"  /></td>
                      </tr>
                       <tr>
                        <td>7. Number of children reviewed:</td>
                        <td><input type="text" name="children_reviewed"  /></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>[Note: Minimum 10 or 20% children (whichever is higher) to be reviewed].</strong></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>Instructions:</strong> Please provide rating based on your observation during the field visit. 
                        <strong>(Excellent	 10	 9	8	7	6	5	4	3	2	1	Poor).</strong></td>
                      </tr>
                      <tr>
                        <td>a. There is a happy atmosphere in the centre</td>
                        <td><input type="text" name="point_1"  /></td>
                      </tr>
                      <tr>
                        <td>b. Class room is well decorated with chart papers & child activities (Ex. Drawings, picture chart etc.)</td>
                        <td><input type="text" name="point_2"  /></td>
                      </tr>
                      <tr>
                        <td>c. Children are actively participating in any of the activities</td>
                        <td><input type="text" name="point_3"  /></td>
                      </tr>
                      <tr>
                        <td>d. Progress of the children </td>
                        <td><input type="text" name="point_4"  /></td>
                      </tr>					
                      <tr>
                        <td>e. Teacher is supportive & child friendly</td>
                        <td><input type="text" name="point_5"  /></td>
                      </tr>
                      <tr>
                       <td>f. The centre is clean and tidy</td>
                        <td><input type="text" name="point_6"  /></td>
                      </tr>
                      <tr>
                       <td>g. How much this centre is safe for children (Ex. Pond, open wire/switch board etc.)</td>
                        <td><input type="text" name="point_7"  /></td>
                      </tr>
                      <tr>
                       <td>h. Monthly Parent Teacher meeting / Community mobilization part is done by the teacher</td>
                        <td><input type="text" name="point_8"  /></td>
                      </tr>
                      <tr>
                       <td>i. Response of the Partner representative’s for the queries raised during the field visit</td>
                        <td><input type="text" name="point_9"  /></td>
                      </tr>
                      <tr>
                       <td>j. Active participation of the local community</td>
                        <td><input type="text" name="point_10"  /></td>
                      </tr>
                       <tr>
                       <td>k. Do you find Asha Kiran…a ray of hope programme making a difference in a life of children (YES/ NO)</td>
                        <td>
                        <select name="point_11">
                        <option value="" selected="selected">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                        </td>
                      </tr>	
                      <tr>
                       <td>8. * Please use this section to add any further comments / suggestions / recommendations: </td>
                       <td><textarea cols="30%" rows="5"></textarea></td>
                      </tr>  
                      <tr>
                       <td>9. Documents reviewed: </td>
                       <td><textarea cols="30%" rows="5"></textarea></td>
                      </tr>  
                      <tr>
                       <td colspan="2"><strong>Contact details of Rotarian:</strong></td>
                      </tr>
                      <tr>
                       <td>Full Name:</td>
                       <td><input type="text" name="full_name" /></td>
                      </tr>  
                      <tr>
                       <td>District:</td>
                       <td>
                       <select name="district" id="district_code" onChange="loadXMLDoc(this.value);">
                        <option value="" selected="selected">Select</option>
                        <?php 
							$sql= mysql_query("select distinct `district` from districtclub_rotary");
							while($row = mysql_fetch_array($sql))
							{
							$data=$row['district'];
							?>
							<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
							<?php
							 } 
						   ?>
                       </select>
                       </td>
                      </tr> 
                      <tr>
                       <td>Club:</td>
                       <td>
                       <select id="txtclubforother" name="txtclubforother">
                         <option value="">Select</option>
                       </select>
                       </td>
                      </tr> 
                      <tr>
                       <td>Email:</td>
                       <td><input type="text" name="email" /></td>
                      </tr>   
                      <tr>
                       <td>Mobile:</td>
                       <td><input type="text" name="mobile" /></td>
                      </tr>  
                      <tr>
                       <td colspan="2" align="center" height="52"><input type="submit" name="submit" value="Submit" class="login" /></td>
                      </tr>    
                    </table>
					</form>
                      
                      
                      
                      
                      
                      
                      
                    </div>
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
</body>
</html>
