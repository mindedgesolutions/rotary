<?php


	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/
	
	$dbname="rotary32_teach";
	$host="192.185.36.129";
	$dbuname="rotary32_teach";
	$dbpass="info123";
	
	$link=mysqli_connect($host,$dbuname,$dbpass,$dbname) or die("Can not connect DATABASE.");
	
	function  findexts($filename) {
		$ext1 = split("[/\\.]", $filename) ;
		$n = count($ext1)-1; 
		$exts = $ext1[$n]; 
		return strtoupper($exts);
	}
	
	 function FileNewname($filename)
	{
		$dt=date("Y-m-d-h-i-s");
		$newname=$dt.".".strtolower(findexts($filename));
		return $newname;
	}


if(isset($_POST["btnSave"]))
{
$type = $_POST["optrotarion"];
$name = trim($_POST["txtName"]);
$rotaryDistrict = trim($_POST["txtRotDistrict"]);
$rotaryClubname = trim($_POST["txtClubName"]);
$address=mysqli_real_escape_string($link,$_POST["txtAddress"]);
$city = trim($_POST["txtCity"]);
$email = trim($_POST["txtEmail"]);
$phone = trim($_POST["txtPhone"]);

$volunteerArea = implode(",",$_POST["choVolntArea"]);

if($_POST["nosofhours"]=='') {
$nosofhours= 0;
}
else { 
$nosofhours= $_POST["nosofhours"];
}

$timeIn = $_POST["optVolnttime"];
$rotarystatus = $_POST["optStatus"];
$workarea = implode(",",$_POST["choWorkArea"]);
$experience = $_POST["experiance"];
$experienceDetail= mysqli_real_escape_string($link,$_POST["experianceDetail"]);
$img1= $_FILES["uploadImg1"]["name"];
$img2= $_FILES["uploadImg2"]["name"];

$newimg1 ="";
$newimg2 ="";


	if($img1!='')  { 
	$newimg1 = FileNewname($img1);	 
	if($_FILES["uploadImg1"]["error"]==0 ) {
		 move_uploaded_file($_FILES["uploadImg1"]["tmp_name"], "upload/" . $newimg1);
	 }
		 else
		 {
			$msg = "Error in image uploading.";
		 }
	 }
	 
	if($img2!='' ) {
	$newimg2 = FileNewname($img2);
	if($_FILES["uploadImg2"]["error"]==0) {
		 move_uploaded_file($_FILES["uploadImg2"]["tmp_name"], "upload/" . $newimg2);
		 }
	 else {
		 $msg = "Error in image uploading.";
		 }
	 }

$query = "INSERT INTO registration(type, name, rotaryDistrict, rotaryClubname, address,phone, city, email, volunteerArea, nosofhours, timeIn, rotarystatus, workarea, experience, experienceDetail, img1, img2,submitted) values('".$type."','".$name."','".$rotaryDistrict."','".$rotaryClubname."','".$address."','".$phone."','".$city."','".$email."','".$volunteerArea."',".$nosofhours.",'".$timeIn."','".$rotarystatus."','".$workarea."','".$experience ."','".$experienceDetail ."','".$newimg1."','".$newimg2."','".date('Y-m-d h:i:s')."');";

//die($query);

	$res = mysqli_query($link,$query);

	if($res)
	{

	
	$from = "sanjuchou2010@yahoo.com";
	$to="sanjuchou27@gmail.com";
	$subject = "Thank you for registration.";
	$header = "From: ".$from."\r\n";
	$body="";
	$body=$body."Name: ".$firstName." ".$midName." ".$lastName."\r\n";	
	$body=$body."Rotary District: ".$rotaryDistrict."\r\n";	
	$body=$body."Rotary Clubname: ".$rotaryClubname."\r\n";	
	$body=$body."Address: ".$address.", State: ".$state.", Country: ".$country. ", Pin: ".$pin.", phone: ".$phone."\r\n";
	$body=$body."Volunteer Area: ".$volunteerArea."\r\n";
	$body=$body."Working Hours: ".$nosofhours." hrs in a ".$timeIn."\r\n";
	$body=$body."Volunteer Area: ".$volunteerArea."\r\n";
	$body=$body."Workarea: ".$workarea."\r\n";
		$newmsg=rawurldecode($body);
	$msg = "Thank you for your registration. We will get back to you shortly.";
	
	 mail($to,$subject,$newmsg,$header);
	
	}

}
//die("sas");
//print_r($_FILES);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Adult Literacy</title>

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

function inputNumber(e,val,allowdecimal)
{
    var key=(window.event) ? event.keyCode : e.charCode || 0;
	
	if(allowdecimal==true)
	{
		if(key==0 || key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57))
	    {	
		    if(key==46)
		    {
			    if(val.indexOf(".")!=-1)
			    {
				    if(window.event)
				    {
					    event.returnValue=false
				    }
				    else
				    {
					    e.preventDefault()
				    }
			    }
		    }
	    }      
	    else
	    {
		    if(window.event)
		    {
			    event.returnValue=false
		    }
		    else
		    {
			    e.preventDefault()
		    }
	    }
	}
	else
	{
		if(key==0 || key == 8 || key == 9 || (key >= 48 && key <= 57))
		{	
			
		}      
		else
		{
			if(window.event)
			{
				event.returnValue=false
			}
			else
			{
				e.preventDefault()
			}
		}
	}
}

/*function getOption(val) {
	if(val=='rotarian') {
	$("#registerform").show();
	$("#labeldist").show();
	$("#labelclub").show();
	$("#rotarianStatus").show();
	}
	else
	{
	
	$("#registerform").show();
	$("#labeldist").hide();
	$("#labelclub").hide();
	$("#rotarianStatus").hide();
	}
}*/

</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body onload="getOption('rotarian')">
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html")?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("menu_area.html")?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <?php include("header_area.html")?>
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
                                <h1>Volunteer Registration</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                <p class="text" style="text-align:center">
                                	<br />
                                    <img src="images/thankyou.jpg" />
									<h1 style="text-align:center; color:#CC3300; font-size:20px; padding:0; margin:0"><?php echo $msg;?></h1>
                                </p>
                            </td>
                            <td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("inner_right.html")?>
                            </td>
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("footer_area.html")?>
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






