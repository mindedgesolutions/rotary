<?php
session_start();
include("../connection.php");
if(!isset($_SESSION["grantAppuserid"]))
{
	header("Location: grantApplicationLogin.php");
}

$grantAppuserid  =1

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<link href="../button/style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>

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

function districtlist()
{
var str = "";
$.ajax({                                      
      url: '../districtlist.php',                     
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


function changeDistrict(val) {

var selected =$('input[name=txtbelong]:checked').val();

//alert(selected)
if(selected==val) {
	if(val=='Rotary' || val=='Rotaract' ) {
		$('#districttr').show();
		$('#rotdistrict').show();
		$('#innerdistrict').hide();
	}
	else if(val=='Inner Wheel') {
		$('#districttr').show();
		$('#innerdistrict').show();
		$('#rotdistrict').hide();
	}
}
	else
	{
		$('#districttr').hide();
		$('#innerdistrict').hide();
		$('#rotdistrict').hide();
	
	}

}

	function loadgrantAppInfo() {
	
				var pars ="grantuserid=<?php echo $grantAppuserid;?>"
			//alert(pars)
		$.ajax({                                      
			  url: 'getelementoryInfo.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
			
						$("#txtgranttitle").val( data[0]["granttitle"]);
						$("input[name=txtbelong][value=" + data[0]["belongto"] + "]").attr('checked', 'checked');
						changeDistrict(data[0]["belongto"]);
						if(data[0]["belongto"]=='Rotary' || data[0]["belongto"]=='Rotaractor')
						$("#txtRotDistrict").val( data[0]["district"]);
						else 
						$("#txtinnerdistrict").val( data[0]["district"]);
						$("input[name=qualifstatus][value=" + data[0]["qualifstatus"] + "]").attr('checked', 'checked');
						
						if(data[0]["appstatus"]!='Draft') {
							$("#btn_submit").attr("disabled", true);
						}
				}
			});
	}
</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body onload="districtlist();loadgrantAppInfo();">
<center>
<div style="background:url(../images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(../images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("../logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
         <?php include("../menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
          <?php include("../header_area.html");?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="../images/h_top_l.png" /></td>
                <td style="background:url(../images/h_top.png)"></td>
                <td width="8"><img src="../images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(../images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Grant Application</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
<form name="frmgrantapp" action="" method="post">
   				<input type="hidden" id="hdngrantuserid" name="hdngrantuserid" value="<?php echo $_SESSION["grantAppuserid"]; ?>" />
                <tr>
                    <td width="30%" style=" padding:0 0 0 20px"><strong>Grant Title <span style="color:#ff0000">*</span></strong></td>
                    <td width="4%"><strong>:</strong></td>
                    <td width="66%"><select id="txtgranttitle" name="txtgranttitle">
									<option value="">Select</option>
									<!--<option value="Volunteer Honorarium (VH)">Volunteer Honorarium (VH)</option>
									<option value="DIET">DIET</option>
									<option value="E-Learning (EL)">E-Learning (EL)</option>
									<option value="Child Development (CD)">Child Development (CD)</option>-->
									<option value="Happy School (HS)">Happy School (HS)</option>
									</select>
					</td>
                </tr>
                <!--<tr>
                    <td style=" padding:0 0 0 20px"><strong>Status <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="radio" name="txtstatus" value="Draft"/>Draft &nbsp;
						<input type="radio" name="txtstatus" value="Submitted"/>Submitted &nbsp;
						<input type="radio" name="txtstatus" value="Approved"/>Approved   </td>
                </tr>-->
				 <tr>
                    <td style=" padding:0 0 0 20px"><strong>You are from <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="radio" name="txtbelong" value="Rotary" onclick="changeDistrict(this.value)"/>Rotary &nbsp;
						<input type="radio" name="txtbelong" value="Inner Wheel" onclick="changeDistrict(this.value)"/>Inner Wheel &nbsp;
						<input type="radio" name="txtbelong" value="Rotaract" onclick="changeDistrict(this.value)"/>Rotaract   </td>
                </tr>
				
				 <tr id="districttr" style="display:none">
                    <td style=" padding:0 0 0 20px"><strong><span>District Number </span><span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td>
					<span id="rotdistrict" style="display:none"><select id='txtRotDistrict' name='txtRotDistrict' >
						<option value="">Select</option>
						</select></span>
						
					<span id="innerdistrict"  style="display:none"><input type="text" name="txtinnerdistrict" id="txtinnerdistrict"  onKeyPress="inputNumber(event,this.value,false);"  maxlength="4" />
					</span>
					</td>
                </tr>
				 
				
				<!-- <tr>
                    <td style=" padding:0 0 0 20px"><strong>District Number  <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtdistrict" id="txtdistrict"  onKeyPress="inputNumber(event,this.value,false);"  maxlength="4" /> </td>
                </tr>-->
				
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>TRF Qualification Status of Club / District  <span style="color:#ff0000">*</span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="radio" name="qualifstatus" value="Qualified"/>Qualified &nbsp;
						<input type="radio" name="qualifstatus" value="Not Qualified"/>Not Qualified &nbsp;
                </tr>
				
				
				
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="button" name="btn_submit" id="btn_submit" value="Save"  class="hed" style="cursor:pointer; border-radius:3px;" onclick="saveGrantApplication();" /> 
                        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="hed" style="cursor:pointer; border-radius:3px" />&nbsp;&nbsp;
					</td>
				</tr>
</form>         
</table>
<!--<form name="nextfrm" id="nextfrm" action="schoolInfoForm.php" method="post">
	<input type="hidden" name="hdnrefapplicationno" id="hdnrefapplicationno" value=""/>

</form> --> 
        
    						</td>
    						<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php include("../inner_right.html");?>
                            </td>
						</tr>
					</table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
                     <?php include("../footer_area.html");?>
					
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
	
	function validation(){
	
		if($("#txtgranttitle").val()==''){
		alert("Please choose grant title.");
		$("#txtgranttitle").focus();
		return false;
		}
		/*if($('input[name=txtstatus]:checked').length<=0)
		{
		alert("Please choose status.");
		return false;
		}*/
		if($('input[name=txtbelong]:checked').length<=0)
		{
		alert("Please choose from where you belong.");
		return false;
		}
		
		if($('input[name=txtbelong]:checked').val()=='Rotary' || $('input[name=txtbelong]:checked').val()=='Rotaract')
		{
			if($("#txtRotDistrict").val()==''){
			alert("Please choose district number.");
			$("#txtRotDistrict").focus();
			return false;
			}
			
		}
		else if($('input[name=txtbelong]:checked').val()=='Inner Wheel' )
		{
			if($("#txtinnerdistrict").val()==''){
			alert("Please enter district number.");
			$("#txtinnerdistrict").focus();
			return false;
			}
		}
		if($('input[name=qualifstatus]:checked').length<=0)
		{
		alert("Please choose Qualification status under the TRF.");
		return false;
		}
		if($('input[name=qualifstatus]:checked').val()=='Not Qualified')
		{
		alert("you must get your Club/District qualified under the TRF.");
		return false;
		}
		
		return true;
	}
	
	function saveGrantApplication() {
		if(!validation())
		{
			return false;
		}
		
			var pars =$("form").serialize();
			//alert(pars)
		$.ajax({                                      
			  url: 'submitGrantApplication.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
				
				if(data["success"]==1)
				{
				alert(data["msg"])
				//$('#hdnrefapplicationno').val(data["refno"]);
				//$("#nextfrm").submit();
				}
				else
				{
				alert(data["msg"])
				}
				}
			});
	}
	
</script>


</body>
</html>






