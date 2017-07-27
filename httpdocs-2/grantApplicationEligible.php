<?php
session_start();
include("connection.php");
if(!isset($_SESSION["grantAppuserid"]))
{
	header("Location: grantApplicationLogin.php");
}
$grantappuserid = $_SESSION["grantAppuserid"];
	$msg = "";
	$checkavailqry = "SELECT count(`grantappuserid`) as avail FROM grantAppEligible WHERE grantappuserid=$grantappuserid ;";
	$availresult = mysqli_query($link,$checkavailqry);
		while($availrow = mysqli_fetch_assoc($availresult))
		{
			$availarr[] = $availrow;
		}
		
		if($availarr[0]["avail"]>0) {
			header("location: grantApplicationIndex.php");
		}
else {
if(isset($_POST["btn_submit"])) {
$hasSMC= $_POST["hasSMC"];
$isSMCwork= $_POST["isSMCwork"];
$isADPprepare= $_POST["isADPprepare"];
$ADPYr = $_POST["txtADPYr"];
$ADPfacility = implode(",",$_POST["ADPgroup"]);
 
 		$query = "INSERT INTO grantAppEligible(`grantappuserid`, `hasSMC`, `isSMCwork`, `hasADP`, `HSADPs`, `ADPyr`) VALUES ($grantappuserid,'".$hasSMC."','".$isSMCwork."','".$isADPprepare."','".$ADPfacility."','".$ADPYr."');";

	$qryresult = mysqli_query($link,$query);
	if($qryresult)
	{
		header("location: grantApplicationIndex.php");
	}
	else
	{
		$msg = "Error occured, Please try again.";
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

function checkvalid() {
		if($('input[name="ADPgroup[]"]:checked').length>3)
		{
		alert("You are not Eligible for grant application.");
		return false;
		}
	
	return true;	

function opendiv(cntrval,opencntrlid) {
if(cntrval=='Yes')
$('#'+opencntrlid).show();
else
$('#'+opencntrlid).hide();
}

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
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
         <?php include("menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
          <?php include("header_area.html");?>
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
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Eligiblity Check for Grant Application</h1>
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
<table border="0" cellpadding="5" cellspacing="0" width="90%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999;">
	<tr>
		<td class="hed1">Check Eligiblity</td>
  	</tr>
</table>
<table border="0" cellpadding="5" cellspacing="0" width="90%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
    <tr>
        <td>
            <p style="padding:15px 15px 0 15px; margin:0"><span style="color:#FF0000; font-size:14px; font-weight:bold"><?php echo $msg;?></span>
                <form id="grantappeligible" name="grantappeligible" action="grantApplicationEligible.php" method="post" onsubmit="return checkvalid();">
                <table border="0" cellpadding="5" cellspacing="0" width="90%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:14px">
				<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
			<tr>
            <td width="80%"><strong>Does the school have a School Management Committee (SMC), as required under the RTE Act?</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="18%"><input type="radio" name="hasSMC" value="Yes" onclick="opendiv(this.value,'SMCwork')"  />
              Yes &nbsp;
              <input type="radio" name="hasSMC" value="No"  onclick="opendiv(this.value,'SMCwork')"  />
              No </td>
        </tr>
        <tr id="SMCwork" style="display:none">
            <td><strong>If 'yes', is the SMC functioning regularly? (Ask the parents of several students of the school)</strong></td>
            <td><strong>:</strong></td>
            <td><input type="radio" name="isSMCwork" value="Yes" />
              Yes &nbsp;
              <input type="radio" name="isSMCwork" value="No"  />
              No </td>
        </tr>
        <tr> 
          <td><strong>Has the school prepared an Annual Development Plan (ADP) for 2014-15 or 2015-16, as required under the RTE Act?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="isADPprepare" value="Yes" onclick="opendiv(this.value,'ADPlist')"   />
            Yes &nbsp;
            <input type="radio" name="isADPprepare" value="No"  onclick="opendiv(this.value,'ADPlist')"   />
            No </td>
        </tr>
          <tr>
                    <td colspan="3" id="ADPlist" style="display:none">
					 <strong>If ‘yes’, briefly describe the facilities envisaged in the ADP corresponding to those under the Happy Schools Project</strong> :<br />
					 <?php 
					 
					  
					 	$ADPqry = "SELECT * FROM HSADPList;";
						
						$result = mysqli_query($link,$ADPqry);
						while($row = mysqli_fetch_assoc($result))
						{
							$ADParr[] = $row;
						}
						foreach($ADParr as $ADPval) {
					 ?>
					 <input type="checkbox" name="ADPgroup[]" value="<?php echo $ADPval["id"];?>"  />&nbsp;<?php echo $ADPval["facility"];?> &nbsp;<br />
					 <?php } 
					 	//}
					 ?>
					</td>
                </tr>
        
        <tr>
          <td><strong>Mention the year of the ADP</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" name="txtADPYr" id="txtADPYr"  onkeypress="inputNumber(event,this.value,false);"   maxlength="4" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
    </table>
              
               
                <tr>
                    
                    <td>
                        <input type="submit" name="btn_submit" id="btn_submit" value="Save"  class="hed" style="cursor:pointer; border-radius:3px;" /> 
                        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="hed" style="cursor:pointer; border-radius:3px" />
                      
                    </td>
                </tr>
                </table>                               
              
                </form>  
            </p>            
		</td>
	</tr>
</table>
           
        
    						</td>
    						<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("inner_right.html");?>
                            </td>
						</tr>
					</table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
                     <?php include("footer_area.html");?>
					
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






