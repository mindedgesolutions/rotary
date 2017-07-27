<?php
include("connection.php");
	function  findexts($filename) {
		$ext1 = split("[/\\.]", $filename) ;
		$n = count($ext1)-1; 
		$exts = $ext1[$n]; 
		return strtoupper($exts);
	}
	
	 function FileNewname($filename,$imgname)
	{
		$dt=date("Y-m-d-h-i-s");
		$newname=$dt.".".strtolower(findexts($filename));
		return $imgname."_".$newname;
	}






if(isset($_POST["btnSave"])) {
$district = $_POST["txtRotDistrict"];
$club= $_POST["txtClubName"];
$personname= $_POST["txtpersonname"];
$mobno= $_POST["txtmob"];
$email= $_POST["txtemail"];
$schoolname = $_POST["txtschoolname"];
$schooladdr = $_POST["txtschooladdr"];
$teachername = $_POST["txtteachername"];
$gender = $_POST["chogender"];
$awarddt = $_POST["txtawarddt"];

$aboutteacher= $_POST["aboutteacher"];
$teacherimage=  $_FILES["teacherimg"]["name"];

$newimg ="";
//die($query);

if($teacherimage!='')  { 
	$newimg = FileNewname($teacherimage,'teacherimage');	 
	if($_FILES["teacherimg"]["error"]==0 ) {
		 move_uploaded_file($_FILES["teacherimg"]["tmp_name"], "upload/" . $newimg);
		 }
	 }



$insertqry = "INSERT INTO nonevaluatedteacher (district,club,personname,mobile,email,schoolname,schooladdress, teachername,gender,aboutteacher,teacherimage,awarddt, submitdt) VALUES ('".$district."','".$club."','".$personname."','".$mobno."','".email."','".schoolname."','".schooladdr."','".$teachername."','".$gender."','".$aboutteacher."','".$newimg."','".$awarddt."','".date('d-m-Y')."');";

//die($insertqry);


	if(mysqli_query($link,$insertqry)) {
		$msg = "Successfully saved.";
		} 
		else
		{
		$msg = "Try again.";
		}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Teacher Evaluation</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<link href="js/jquery.datepick.css" rel="stylesheet" type="text/css" />

<!--<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>-->

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

/*$(function() {
    setInterval( "slideSwitch()", 5000 );
});*/

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

	
function validation(){
	
    if($("#txtRotDistrict").val()=='') {
	alert("Choose Rotary District");
		$("#txtRotDistrict").focus();
		return false;
	}
	if($("#txtClubName").val()=='' )
	{
		alert("Enter Club Name.");
			$("#txtClubName").focus();
			return false;
	}

	if($("#txtpersonname").val()=='' )
	{
		alert("Enter name of person filling form.");
			$("#txtpersonname").focus();
			return false;
	}
	if($.trim($("#txtMob").val())!="" && ($("#txtMob").val()).length <10) 
	{
		alert("Mobile No must have 10 digit.");
		$("#txtMob").focus();
		return false;
	}
	
	/*if($.trim($("#txtemail").val())=="")
	{
		alert("Enter your  Email address.");
		$("#txtemail").focus();
		return false;
	}*/
	if($.trim($("#txtemail").val())!="")
	{
		  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 if(!expr.test($.trim($("#txtemail").val())))
		 {
		 	alert("Invalid Email!");
			$("#txtemail").focus();
			return false;
		 }
	}
	
	if($("#txtschoolname").val()=="") 
	{
		alert("Enter school Name.");
		$("#txtschoolname").focus();
		return false;
	}
	
	
	if($.trim($("#txtteachername").val())=="") 
	{
		alert("Enter Teacher Name.");
		$("#txtteachername").focus();
		return false;
	}
	if($("#chogender").val()=="") 
	{
		alert("Enter Gender of Teacher.");
		$("#chogender").focus();
		return false;
	}
return true;
}



function districtlist()
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
			 	$("#txtRotDistrict").append(str);
		}
	});
}

function dispclub(val)
{
	var str = "<option value=''>Select</option>";
	var pars ='dist='+val;

$.ajax({                                      
      url: 'clublist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["club"]+"'>"+data[i]["club"]+"</option>";
				}
			}
			$("#txtClubName").empty();
			$("#txtClubName").append(str);			 
		}
	});
}


</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
.auto-style1 {
	text-align: center;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!-- 

function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=350,left = 363,top = 144');");
}

// -->

</script>


</head>

<body onload="districtlist();">
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
                            <td width="100%" valign="top" >
                                <h1 align="left"> Evaluation Form for &quot;Nation Builder&quot; Award (Outstanding Teacher Award) 
								- For Non - Evaluated Teachers</h1>
                              
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;" class="auto-style1">
									</div>
									
						          <div style="margin:15px 0 10px 0; line-height:18px; color:#CC0000; text-align:justify">
									<?php echo $msg; ?>
							  </div>

<div id="evaluationform" style="padding:0 7px; margin:10px 0 0 0; "> 
<form name="frm" action="nonEvaluateTeacher.php" method="post" onsubmit="return validation();" enctype="multipart/form-data">

<table border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; border-collapse:collapse; font-size:12px" align="center">
<tr style="background:#f5f5f5">
	<td width="52%">Rotary District<span style="color:#FF0000">*</span></td>
	<td  width="3%" align="center"><strong>:</strong></td>
    <td  width="45%"><select id='txtRotDistrict' name='txtRotDistrict' onchange='dispclub(this.value)'>
    <option value="">Select</option>
    </select>
    </td>
</tr>
<tr>
	<td>Rotary Club<span style="color:#FF0000">*</span></td>
	<td align="center"><strong>:</strong></td>
    <td class="spandistrict"><select id="txtClubName" name="txtClubName"><option value="">Select</option></select></td>
</tr>

<tr style="background:#f5f5f5">
	<td>Name of the Person filling form<span style="color:#FF0000">*</span></td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtpersonname" name="txtpersonname" /></td>
</tr>

<tr>
	<td>Mobile No</td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtmob" name="txtmob" maxlength="10"  onKeyPress="inputNumber(event,this.value,false);"/></td>
</tr>
<tr style="background:#f5f5f5">
	<td>Email</td>
	<td align="center">:</td>
    <td class="spandistrict"><input type="text" id="txtemail" name="txtemail" /></td>
</tr>


<tr>
<td >Name of School<span style="color:#FF0000">*</span></td>
<td width="3%">:</td>
<td><input type="text" id="txtschoolname" name="txtschoolname" /></td>
</tr>
<tr style="background:#f5f5f5">
<td >Address of School</td>
<td width="3%">:</td>
<td><textarea id="txtschooladdr" name="txtschooladdr"></textarea></td>
</tr>

<tr>
<td>Teacher Name<span style="color:#FF0000">*</span></td>
<td>:</td>
<td><input type="text" id="txtteachername" name="txtteachername" style="width:99%" /></td>
</tr>
<tr style="background:#f5f5f5">
<td>Gender<span style="color:#FF0000">*</span></td>
<td>:</td>
<td><select id="chogender" name="chogender" ><option value="">Select</option><option value="Male">Male</option><option value="Female">Female</option></select></td>
</tr>

<tr>
<td>Write about the teacher (Maximum in 1000 characters)</td>
<td>:</td>
<td>
<textarea id="aboutteacher" name="aboutteacher" style="width: 279px; height: 102px"></textarea></td>
</tr>
<tr style="background:#f5f5f5">
<td>Upload Photo of the Teacher</td>
<td>:</td>
<td><input type="file" id="teacherimg" name="teacherimg" /></td>
</tr>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.datepick.js"></script>
<script>
$(function() {
    $( "#txtawarddt" ).datepick({dateFormat: 'dd-mm-yyyy'});
  });
</script>
<tr>
<td>Date of Award Given</td>
<td>:</td>
<td><input type="text" id="txtawarddt" name="txtawarddt" /></td>
</tr>

<tr style="background:#f5f5f5">
	<td colspan="3" align="center">
    	<input type="submit" name="btnSave" id="btnSave" value="SUBMIT" title="Submit detail to Register" style="background:#0099FF; text-shadow:0 1px 1px #000000; padding:10px 50px; color:#ffffff; font-weight:bold; cursor:pointer; border-radius:5px; border:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; letter-spacing:1px"/>    </td>
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

<script type="text/javascript">

function allowsubmit(obj) {
document.getElementById("btnSave").disabled=!obj.checked

}


	/*Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});*/
</script>


</body>
</html>






