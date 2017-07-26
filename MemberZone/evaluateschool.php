<?php 
session_start();
if(!isset($_SESSION["userid"]))
{
	header("Location: TElogout.php");
}
$userid= $_SESSION["userid"];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Teacher Evaluation</title>

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



</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
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
                            <td width="100%" valign="top" >
                                <h1>School Selection for Teacher Evaluation </h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
<br />

<div id="evaluationformforstudent" style="padding:0 7px; margin:10px 0 0 0; "> 
<input type="hidden" id="hdnuserid" name="hdnuserid" value="<?php echo $userid;?>" />

<strong>From how many Schools are you Evaluating Teachers? :</strong>  
<select id="noofschool" name="noofschool" onchange="fillschoolcontainer(this.value);">
<option value="">Select</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
<div id="tblschoolinfo"></div>

<br />
<p style="text-align:center; padding:0; margin:0">
<input type="button" name="btnSave" id="btnSave" value="SUBMIT" onclick="saveRecord();" title="Submit detail to Register" style="background:#0099FF; text-shadow:0 1px 1px #000000; padding:10px 50px; color:#ffffff; font-weight:bold; cursor:pointer; border-radius:5px; border:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; letter-spacing:1px"/>
</p>

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

function fillschoolcontainer(cntno) {
$("#tblschoolinfo").html('');
if(cntno!=''){
	var str ="<table border='1' bordercolor='#CCCCCC' cellpadding='5' cellspacing='0' width='100%' style='text-align: center; color:#666666; font-family:Arial, Helvetica, sans-serif; border-collapse:collapse; font-size:12px;margin-top:15px' align='center'><tr style='font-weight:bold; color:#000000;background:#e1e1e1'><td>School Type</td><td>School Name</td><td>Address of the School</td><td>City</td><td>State</td></tr>";
	for(var i =1; i<=cntno; i++) {
		 str += "<tr>";
	  	str += "<td><select id='choSchoolType"+i+"' name='choSchoolType"+i+"'><option value=''>Select</option><option value='Govt. School'>Govt. School</option><option value='Zilla Parishad'>Zilla Parishad</option><option value='Gram Panchayat'>Gram Panchayat</option><option value='Municipal School'>Municipal School</option></select>";
	str += "<td><input type='text' id='txtschoolname"+i+"' name='txtschoolname"+i+"' /></td>"; 
	
	str += "<td><textarea id='txtschooladdr"+i+"' name='txtschooladdr"+i+"' ></textarea></td>";
	 str += "<td><input type='text' id='txtcity"+i+"' name='txtcity"+i+"' /></td>";
	 
	 str += "<td><select id='txtState"+i+"' name='txtState"+i+"'>"
	 str += "<option value=''>Select</option>"
	  str += "<option value='Andhra Pradesh'>Andhra Pradesh</option>"
      str += "<option value='Arunachal Pradesh'>Arunachal Pradesh</option>"
      str += "<option value='Assam'>Assam</option>"
       str += "<option value='Bihar'>Bihar</option>"
       str += "<option value='Chhattisgarh'>Chhattisgarh</option>"
       str += "<option value='Goa'>Goa</option>"
        str += "<option value='Gujarat'>Gujarat</option>"
       str += "<option value='Haryana'>Haryana</option>"
        str += "<option value='Himachal Pradesh'>Himachal Pradesh</option>"
         str += "<option value='Jammu and Kashmir'>Jammu and Kashmir</option>"
        str += "<option value='Jharkhand'>Jharkhand</option>"
         str += "<option value='Karnataka'>Karnataka</option>"
        str += "<option value='Kerala'>Kerala</option>"
        str += "<option value='Madhya Pradesh'>Madhya Pradesh</option>"
        str += "<option value='Maharashtra'>Maharashtra</option>"
         str += "<option value='Manipur'>Manipur</option>"
        str += "<option value='Meghalaya'>Meghalaya</option>"
         str += "<option value='Mizoram'>Mizoram</option>"
         str += "<option value='Nagaland'>Nagaland</option>"
        str += "<option value='Orissa'>Orissa</option>"
         str += "<option value='Punjab'>Punjab</option>"
         str += "<option value='Rajasthan'>Rajasthan</option>"
         str += "<option value='Sikkim'>Sikkim</option>"
          str += "<option value='Tamil Nadu'>Tamil Nadu</option>"
         str += "<option value='Tripura'>Tripura</option>"
         str += "<option value='Uttar Pradesh'>Uttar Pradesh</option>"
         str += "<option value='Uttarakhand'>Uttarakhand</option>"
         str += "<option value='West Bengal'>West Bengal</option>"
         str += "<option value='Union Territories'>Union Territories</option>"
          str += "<option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>"
         str += "<option value='Chandigarh'>Chandigarh</option>"
        str += "<option value='Dadar and Nagar Haveli'>Dadar and Nagar Haveli</option>"
         str += "<option value='Daman and Diu'>Daman and Diu</option>"
         str += "<option value='Delhi'>Delhi</option>"
          str += "<option value='Lakshadweep'>Lakshadweep</option>"
          str += "<option value='Pondicherry'>Pondicherry</option>" 
	 str += " </select></td></tr>";
	 
	 
	 }
	  str += "</table>";
	 $("#tblschoolinfo").append(str);
	 }

}

function validation() {

if($("#noofschool").val()=='') {
	alert("Please select nos of school.")
	$("#noofschool").focus();
			return false;
}
else
{
var cntno =$("#noofschool").val(); 
	for(var i=1; i<=cntno; i++) {
			if($("#choSchoolType"+i).val()=='')
			{
				alert("Please select school type.")
				$("#choSchoolType"+i).focus();
						return false;
			}	
			if($.trim($("#txtschoolname"+i).val())=='')
			{
				alert("Enter school name.")
				$("#txtschoolname"+i).focus();
						return false;
			}
			if($.trim($("#txtschooladdr"+i).val())=='')
			{
				alert("Enter school address.")
				$("#txtschooladdr"+i).focus();
						return false;
			}
			if($.trim($("#txtcity"+i).val())=='')
			{
				alert("Enter city.")
				$("#txtcity"+i).focus();
						return false;
			}
			if($("#txtState"+i).val()=='')
			{
				alert("Select state.")
				$("#txtState"+i).focus();
						return false;
			}
	}

}

return true;
}



function saveRecord() {

		var counter = $("#noofschool").val();
if(!validation()) {
return false;
}
		//alert(counter)
			var schooltype	=[];
			var schoolname	=[];
			var schooladdr	=[];
			var city	=[];
			var state	=[];

			for(var i=1; i<=counter; i++)
			{
			//alert(i)
				schooltype.push($("#choSchoolType"+i).val());
				schoolname.push($("#txtschoolname"+i).val());
				schooladdr.push($("#txtschooladdr"+i).val());
				city.push($("#txtcity"+i).val());
				state.push($("#txtState"+i).val());
				
			}
			 var pars = 'schooltype='+schooltype+'&schoolname='+schoolname+'&schooladdr='+schooladdr+'&city='+city+'&state='+state+'&userid='+$("#hdnuserid").val()
		//alert(pars)
			$.ajax({                                      
			  url: 'addschoolInfo.php',                     
			  data: pars,
			  type:"POST",
				dataType: 'text',
				success: function(data)         
				{
				alert(data)
				window.location = "teacherEvaluationForm.php";

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






