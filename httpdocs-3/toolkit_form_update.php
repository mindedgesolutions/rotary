<?php
session_start();
include("connection.php");
$msg = "";
$uniqueid = $_SESSION['uid'];
$sql = "Select * from RARFormdata where id = '$uniqueid'";	
$result = mysqli_query($link,$sql);
while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	extract($data);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$uniqueid = $_POST['uid'];
$name = $_POST['name'];
$received = $_POST['received'];
$distributed = $_POST['distributed'];
$stock = $_POST['stock'];
$registration = $_POST['registration'];
$teaching = $_POST['teaching'];
$scrapbook = $_POST['scrapbook'];
$learner = $_POST['learner'];

$sql = "Insert into rarformupdate values(NULL,'$uniqueid','$name','$received','$distributed','$stock','$registration','$teaching','$scrapbook','$learner')";
$res = mysqli_query($link,$sql);
if($res){
	$msg = "<center><b>Toolkit Utilization Form Updated.</b></center>";
	session_unset();
	session_destroy(); 
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toolkit Order Form </title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
  
<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

 <link rel="stylesheet" type="text/css" href="js/jquery.datepick.css"> 
  
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	color: #800000;
}
</style>
</head>

<body onload="districtlist();initcost();">
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
                            <td width="100%" valign="top" >
                                <h1 align="left">Update Utilization of Toolkit Order</h1>
                              
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;" class="auto-style1"></div>
								<div id="form" style="padding:0 7px; margin:10px 0 0 0; "> 
                                <?php echo $msg; ?>
                                <form action="toolkit_form_update.php" name="update" method="post">
                                <table width="100%" border="0">
                                  <tr>
                                    <td>The Unique ID provided to you </td>
                                    <td><?php echo $uniqueid; ?></td>
                                    <input type="hidden" name="uid" value="<?php echo $uniqueid; ?>"/>
                                  </tr>
                                  <tr>
                                    <td>Name of the person Ordered</td>
                                    <td><?php echo $name; ?></td>
                                    <input type="hidden" name="name" value="<?php echo $name; ?>" />
                                  </tr>
                                  <tr>
                                    <td>Number of toolkit sets received</td>
                                    <td><input type="text" name="received" placeholder="Toolkit sets received" /></td>
                                  </tr>
                                  <tr>
                                    <td>Number of toolkit sets distributed</td>
                                    <td><input type="text" name="distributed" placeholder="Toolkit sets distributed" /></td>
                                  </tr>
                                  <tr>
                                    <td>Number of toolkit sets in stock</td>
                                    <td><input type="text" name="stock" placeholder="Toolkit sets in stock" /></td>
                                  </tr>
                                  <tr>
                                    <td>Number of students made registration</td>
                                    <td><input type="text" name="registration" placeholder="Students made registration" /></td>
                                  </tr>
                                  <tr>
                                    <td>Number of students teaching an adult</td>
                                    <td><input type="text" name="teaching" placeholder="Students teaching an adult" /></td>
                                  </tr>
                                  <tr>
                                    <td>Number of students made scrapbook</td>
                                    <td><input type="text" name="scrapbook" placeholder="Students made scrapbook" /></td>
                                  </tr>
                                  <tr>
                                    <td>Number of children didn't found adult learner</td>
                                    <td><input type="text" name="learner" placeholder="Children didn't found adult learner" /></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"/></td>
                                  </tr>
                                  
                                </table>

                                </form>
                                
                                </div>
								</p>
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
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>


