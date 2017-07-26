<?php
session_start();
include("connection.php");
if(!isset($_SESSION["user"]))
{
	header("Location: detailviewlogin.php");
}

$query = "SELECT *  FROM DG;";

$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
	}
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


<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>

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

.th {
border:1px solid #d1dcdf; font-size:13px; font-family:arial, helvetica, sans-serif; padding: 12px 0 12px 0; text-decoration:none; text-shadow: 1px 1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #a5b8da; background-image: -webkit-gradient(linear, left top, left bottom, from(#a5b8da), to(#7089b3));
 background-image: -webkit-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -moz-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -ms-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -o-linear-gradient(top, #a5b8da, #7089b3);
 background-image: linear-gradient(to bottom, #a5b8da, #7089b3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a5b8da, endColorstr=#7089b3);
}

.theader {
border:1px solid #d1dcdf; font-size:12px; font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; font-weight:bold; color: #FFFFFF; text-align:center; color:#0f475a;
 background-color: #f2f5f6; background-image: -webkit-gradient(linear, left top, left bottom, from(#f2f5f6), to(#c8d7dc));
 background-image: -webkit-linear-gradient(top, #f2f5f6, #c8d7dc);
 background-image: -moz-linear-gradient(top, #f2f5f6, #c8d7dc);
 background-image: -ms-linear-gradient(top, #f2f5f6, #c8d7dc);
 background-image: -o-linear-gradient(top, #f2f5f6, #c8d7dc);
 background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#f2f5f6, endColorstr=#c8d7dc);
 }
</style>

</head>

<body>
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
                            <td align="left" valign="bottom"><h1>District Governors</h1></td>
                            <td align="right"><div align="right"><a href="viewDetail.php" class="login">Back</a><a href="logout.php" class="login">Logout</a></div></td>
                        </tr>
                    </table>
                    
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:5px"></div>
  					<form name="frm" action="CSV/DGlistCSV.php" method="post">
                       <input type="submit" id="btncsv" name="btncsv" value="Download CSV"  class="login"  />
 					</form>
                  
                    <p class="text" style="padding-top:12px; margin-top:0">




                 

<h1 style="color:#CC3300; font-size:18px; border-bottom:1px solid #CCCCCC; padding:0 0 5px 0; margin-bottom:1px">Total Records: <span id="totalrec"><?php echo count($arr)?></span></h1>
<div style="background:#CCCCCC; height:2px"></div>

<table width="100%" cellpadding="5" cellspacing="0" align="center" border="1" bordercolor="#CCCCCC" style="text-align:left; font-family:arial; font-size:12px; background:#ffffff; border-collapse:collapse; margin-top:7px">
<tr>
<td class="theader">District</td>
<td class="theader">District Governor</td>
<td class="theader">Phone</td>
<td class="theader">Email</td>
</tr>

<?php foreach($arr as $record)  { ?>
<tr>
<td align="center" style="font-weight:bold; text-align:center;"><?php echo $record["district"]; ?></td>
<td style="width: 325px"><?php echo $record["name"]; ?></td>
<td style="text-align:center"><?php echo $record["phone"];?></td> 
<td><?php echo $record["email"]; ?></td>
</tr>
<?php } ?>
</table>

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






