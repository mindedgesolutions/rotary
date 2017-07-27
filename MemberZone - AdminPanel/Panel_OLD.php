<?php
session_start();
include("../connection.php");
if($_SESSION["user"]!='Admin') {
header("location: index.php");
}
else {
$qry = "Select id, type,concat(firstname,' ',if(midname<>'',midname,''),' ',if(lastname<>'',lastname,'')) as  name, rotaryDistrict, rotaryClubname, address, phone,city, email, volunteerArea, nosofhours, timeIn, rotarystatus, workarea, experience, experienceDetail, img1, img2, date_format(submitted,'%d %b, %Y') as registeredon  from registration where type='".$_GET["type"]."' order by submitted desc;";
//die($qry);
$res = mysqli_query($link,$qry);

while($row=mysqli_fetch_array($res))
{
$result[]=$row;
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


<link href="../button/style.css" rel="stylesheet" type="text/css" />




<script type="text/javascript" src="../jquery-1.2.6.min.js"></script>

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
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }

.button
{
	border:1px solid #d7dada; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding:12px 5px; text-decoration:none; color: #333333;
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
        
        
        <!----------------------- CONTENT AREA START ------------------>
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
                    <h1>Volunteer List</h1>
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                    
                    <p class="text" style="padding-top:0; margin-top:0">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td align="left">
        	<div style="padding:10px 0;">
                <a href="Panel.php?type=rotarian" class="login1">Volunteers List from Rotarian</a>&nbsp;<a href="Panel.php?type=other" class="login1">Volunteers List from Others</a>
            </div>
        </td>
        <td align="right"><div align="right"><a href="logout.php" class="login">Logout</a></div></td>
    </tr>
</table>


<div style="padding:10px 0; font-weight:bold">
	<h1 style="color:#CC3300; font-size:18px">Total Record : <?php echo count($result); ?></h1>
</div>
<table width="100%" border="1" bordercolor="#999999" cellpadding="2" cellspacing="0" style="text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:11px; border-collapse:collapse; color:#333333" align="left">

<?php if($_GET["type"]=='rotarian') { ?>
<tr height="35">
	<td colspan="13" align="center" style="background:#f5f5f5">
    	<h1 style="text-align:center; font-size:18px; margin-top:7px">Volunteers from Rotarian / Inner Wheel Member / Rotaractor / Interactor / RCC Member</h1>
    </td>
</tr>
<tr>
<td style="text-align:center"><strong>Sl. No.</strong></td>
<td style="text-align:center"><strong>Name</strong></td>
<td style="text-align:center"><strong>Rotary Dist.</strong></td>
<td style="text-align:center"><strong>Rotary<br />Club</strong></td>
<td style="text-align:center"><strong>Address</strong></td>
<td style="text-align:center"><strong>Phone</strong></td>
<td style="text-align:center"><strong>City</strong></td>
<td style="text-align:center"><strong>Email</strong></td>
<td style="text-align:center"><strong>Volunteer<br />Area</strong></td>
<td style="text-align:center"><strong>Working<br />Hours</strong></td>
<td style="text-align:center"><strong>Rotary<br />Status</strong></td>
<td style="text-align:center"><strong>Work<br />Area</strong></td>
<td style="text-align:center"><strong>Registerd<br />On</strong></td>
</tr>

<?php 
$i=1;
if(count($result)>0) {
foreach($result as $val) { 
?>

<tr>
<td style="text-align:center"><?php echo $i; ?></td>
<td><?php echo $val["name"]; ?></td>
<td style="text-align:center"><?php echo $val["rotaryDistrict"]; ?></td>
<td style="text-align:center"><?php echo $val["rotaryClubname"]; ?></td>
<td><?php echo $val["address"]; ?></td>
<td style="text-align:center"><?php echo $val["phone"]; ?></td>
<td style="text-align:center"><?php echo $val["city"]; ?></td>
<td style="text-align:center"><?php echo $val["email"]; ?></td>
<td style="text-align:center"><?php echo $val["volunteerArea"]; ?></td>
<td style="text-align:center"><?php echo $val["nosofhours"]." hrs in ".$val["timeIn"]; ?></td>
<td style="text-align:center"><?php echo $val["rotarystatus"]; ?></td>
<td style="text-align:center"><?php echo $val["workarea"]; ?></td>
<td style="text-align:center"><?php echo $val["registeredon"]; ?></td>
</tr>

<?php 
$i=$i+1;
}
}
else { ?>
<tr><td colspan="13" align="center">Record Not Found.</td></tr>
<?php }
} 
else
{
?>
<tr height="35">
	<td colspan="10" align="center" style="background:#f5f5f5"><h1 style="text-align:center; font-size:18px; margin-top:7px">Other Volunteers</h1></td>
</tr>
<tr>
<td style="text-align:center"><strong>Sl. No.</strong></td>
<td style="text-align:center"><strong>Name</strong></td>
<td style="text-align:center"><strong>Address</strong></td>
<td style="text-align:center"><strong>Phone</strong></td>
<td style="text-align:center"><strong>City</strong></td>
<td style="text-align:center"><strong>Email</strong></td>
<td style="text-align:center"><strong>volunteer Area</strong></td>
<td style="text-align:center"><strong>Working Hours</strong></td>
<td style="text-align:center"><strong>Work Area</strong></td>
<td style="text-align:center"><strong>Registerd On</strong></td>
</tr>

<?php 
$i=1;
if(count($result)>0) {
foreach($result as $val) { ?>

<tr>
<td style="text-align:center"><?php echo $i; ?></td>
<td><?php echo $val["name"]; ?></td>
<td><?php echo $val["address"]; ?></td>
<td style="text-align:center"><?php echo $val["phone"]; ?></td>
<td style="text-align:center"><?php echo $val["city"]; ?></td>
<td style="text-align:center"><?php echo $val["email"]; ?></td>
<td style="text-align:center"><?php echo $val["volunteerArea"]; ?></td>
<td style="text-align:center"><?php echo $val["nosofhours"]." hrs in ".$val["timeIn"]; ?></td>
<td style="text-align:center"><?php echo $val["workarea"]; ?></td>
<td style="text-align:center"><?php echo $val["registeredon"]; ?></td>
</tr>

<?php 
$i=$i+1;

}
}
else { ?>
<tr><td colspan="10" align="center">Record Not Found.</td></tr>
<?php
}
}

?>
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
</body>
</html>

<?php } ?>