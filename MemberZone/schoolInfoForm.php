<?php
$refapplicationno = $_POST["hdnrefapplicationno"];
//$refapplicationno = 'refno1';
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

function calculatetotal(classforsum, idfordisplay){

        $("."+classforsum).each(function() {
 
            $(this).keyup(function(){
                calculateSum(classforsum,idfordisplay);
            });
        });
 
    }
 
    function calculateSum(classforsum,idfordisplay) {
 
        var sum = 0;
        //iterate through each textboxes and add the values
        $("."+classforsum).each(function() {
 
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#"+idfordisplay).val(sum.toFixed(2));
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
                            <td valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Grant Application</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="1" bordercolor="#999999" cellpadding="7" cellspacing="0" width="100%" align="center" style="text-align:left; color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; border-collapse:collapse">
<form name="frmgrantapp1" action="" method="post">
<input type="hidden" name="hdnrefapplicationno" id="hdnrefapplicationno" value="<?php echo $refapplicationno; ?>"/>
<tr>
  <td colspan="5">
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
        <tr>
            <td width="80%"><strong>Does the school have a School Management Committee (SMC), as required under the RTE Act?</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="18%"><input type="radio" name="hasSMC" value="Yes"/>
              Yes &nbsp;
              <input type="radio" name="hasSMC" value="No"/>
              No </td>
        </tr>
        <tr>
            <td><strong>If 'yes', is the SMC functioning regularly? (Ask the parents of several students of the school)</strong></td>
            <td><strong>:</strong></td>
            <td><input type="radio" name="isSMCwork" value="Yes"/>
              Yes &nbsp;
              <input type="radio" name="isSMCwork" value="No"/>
              No </td>
        </tr>
        <tr>
          <td><strong>Has the school prepared an Annual Development Plan (ADP) for 2014-15 or 2015-16, as required under the RTE Act?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="isADPprepare" value="Yes"/>
            Yes &nbsp;
            <input type="radio" name="isADPprepare" value="No"/>
            No </td>
        </tr>
        <tr>
          <td colspan="3">
          <strong>If ‘yes’, briefly describe the facilities envisaged in the ADP corresponding to those under the Happy Schools Project</strong> :<br />
          <select name="select" id="select" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px; margin-top:5px">
            <option value="">Select</option>
            <option value="Repairs, Painting of School Building and Security Measures in the Premises">Repairs, Painting of School Building and Security Measures in the Premises</option>
            <option value="Clean and Hygienic Separate Toilets for Boys and Girls">Clean and Hygienic Separate Toilets for Boys and Girls</option>
            <option value="Safe and Adequate Drinking Water Facilities">Safe and Adequate Drinking Water Facilities</option>
            <option value="A Functioning Library">A Functioning Library</option>
            <option value="Uniforms and Footwear">Uniforms and Footwear</option>
            <option value="Play Materials and Sports Equipment">Play Materials and Sports Equipment</option>
            <option value="Benches and Desks">Benches and Desks</option>
            <option value="Well-maintained Space for Teaching Staff">Well-maintained Space for Teaching Staff</option>
          </select>
          </td>
          </tr>
        
        <tr>
          <td><strong>Mention the year of the ADP</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" name="txtADPYr" id="txtADPYr"  onkeypress="inputNumber(event,this.value,false);"  maxlength="4" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
    </table>  </td>
</tr>

<tr height="7">
  <td colspan="5" style="border-left:1px solid #FFFFFF; border-right:1px solid #FFFFFF"></td>
</tr>

<tr>
<td width="15%"><strong>Name of School </strong></td>
<td width="2%"><strong>:</strong></td>              
<td width="83%" colspan="3"><input type="text" name="txtschoolname" id="txtschoolname" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
</tr>
<tr>
    <td colspan="5">
    	<strong style="color:#000000">School Address :</strong><br />
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
        <td width="14%"><strong>State</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="84%"><input type="text" name="txtstate" id="txtstate" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
        <td><strong>District</strong></td>
        <td><strong>:</strong></td>
        <td><input type="text" name="txtdistrict" id="txtdistrict" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
        <td><strong>Village / Town</strong></td>
        <td><strong>:</strong></td>
        <td><input type="text" name="txtvillage" id="txtvillage" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
        <td><strong>PIN</strong></td>
        <td><strong>:</strong></td>
        <td><input type="text" name="txtpin" id="txtpin" onkeypress="inputNumber(event,this.value,false);"  maxlength="7" style="width:99%;background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
        </tr>
        </table>        </td>
</tr>


<tr>
  <td colspan="5">
  	<strong style="color:#000000">School Type :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td width="4%"><input type="radio" name="schooltype" value="Primary"/></td>
            <td width="26%">Primary (Class I – V)</td>
            <td width="4%"><input type="radio" name="schooltype" value="Elementary"/></td>
            <td width="32%">Elementary (Class I – VIII)</td>
            <td width="4%"><input type="radio" name="schooltype" value="Secondary"/></td>
            <td width="30%">Secondary (Class I – X)</td>
        </tr>
    </table>  </td>
  </tr>

<tr>
  <td colspan="5">
  	<strong style="color:#000000">No. of Students :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td width="7%"><strong>Boys</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="18%"><input type="text" name="txtnoofboysstud" id="txtnoofboysstud" size="10" class="student" onkeyup="calculatetotal('student','txtnooftotalstud')"  onkeypress="inputNumber(event,this.value,false);"  maxlength="7" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
            <td width="5%"><strong>Girls</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="14%"><input type="text" name="txtnoofgirlsstud" id="txtnoofgirlsstud" size="10"  class="student" onkeyup="calculatetotal('student','txtnooftotalstud')" onkeypress="inputNumber(event,this.value,false);"  maxlength="7" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
            <td width="16%"><strong>Total No. of Students</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="34%"><input type="text" name="txtnooftotalstud" id="txtnooftotalstud" size="10"   onkeypress="inputNumber(event,this.value,false);"  maxlength="7" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
        </tr>
    </table>  </td>
</tr>

<tr>
<td colspan="5">
	<strong style="color:#000000">No. of Teachers :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td width="6%"><strong>Male</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="13%"><input type="text" name="txtnoofmaleteach" id="txtnoofmaleteach" size="10" class="teacher" onkeyup="calculatetotal('teacher','txtnooftotalteach')" onkeypress="inputNumber(event,this.value,false);"  maxlength="5" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
            <td width="8%"><strong>Female</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="12%"><input type="text" name="txtnooffemaleteach" id="txtnooffemaleteach" size="10"  class="teacher" onkeyup="calculatetotal('teacher','txtnooftotalteach')"  onkeypress="inputNumber(event,this.value,false);"  maxlength="5" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
            <td width="15%"><strong>Head Teacher</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="12%"><input type="text" name="txtnoofheadteach" id="txtnoofheadteach" size="10"  class="teacher" onkeyup="calculatetotal('teacher','txtnooftotalteach')" onkeypress="inputNumber(event,this.value,false);"  maxlength="5" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
            <td width="14%"><strong>Total Teacher</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="12%"><input type="text" name="txtnooftotalteach" id="txtnooftotalteach" size="10"   onkeypress="inputNumber(event,this.value,false);"  maxlength="5" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
        </tr>
    </table></td>
</tr>


<tr>
<td colspan="5">
<strong style="color:#000000">No. of Trained Teachers :</strong><br />
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
  <tr>
    <td width="8%"><strong>Male</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="15%"><input type="text" name="txtnoofmaletrainedteach" id="txtnoofmaletrainedteach" size="10"  onkeypress="inputNumber(event,this.value,false);"  maxlength="5" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
    <td width="10%"><strong>Female</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="15%"><input type="text" name="txtnooffemaletrainedteach" id="txtnooffemaletrainedteach" size="10"   onkeypress="inputNumber(event,this.value,false);"  maxlength="5" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
    <td width="16%"><strong>Trained Head Teacher</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="30%"><input type="radio" name="istrainedhead" value="Yes"/>Yes &nbsp; <input type="radio" name="istrainedhead" value="No"/>No</td>
  </tr>
</table></td>
</tr>

<tr>
<td colspan="5">
	<strong style="color:#000000">School Building (Current Status) :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td width="34%"><strong>Structure</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="64%"><input type="radio" name="optstructure" value="Good"/>
              Good &nbsp;
              <input type="radio" name="optstructure" value="Average"/>
              Average&nbsp;
              <input type="radio" name="optstructure" value="Poor"/>
              Poor</td>
        </tr>
        <tr>
            <td colspan="3">
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="3" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse">
<tr bgcolor="#f5f5f5">
<td style="text-align:center; font-weight:bold">Part of Structure</td>
<td style="text-align:center; font-weight:bold">Extent of Damage</td>
</tr>
<tr><td><strong>Roof</strong></td>
<td><input type="radio" name="roofdamageextend" value="Below 50%"/>Below 50% &nbsp;
<input type="radio" name="roofdamageextend" value="Above 50%"/>Above 50%</td></tr>
<tr><td><strong>Floor</strong></td>
<td><input type="radio" name="floordamageextend" value="Below 50%"/>Below 50% &nbsp;
<input type="radio" name="floordamageextend" value="Above 50%"/>Above 50%</td></tr>
<tr><td><strong>Walls</strong></td>
<td><input type="radio" name="wallsdamageextend" value="Below 50%"/>Below 50% &nbsp;
<input type="radio" name="Wallsdamageextend" value="Above 50%"/>Above 50%</td></tr>
<tr><td><strong>Doors and Windows</strong></td>
<td><input type="radio" name="doordamageextend" value="Below 50%"/>Below 50% &nbsp;
<input type="radio" name="doordamageextend" value="Above 50%"/>Above 50%</td></tr>
</table>            </td>
            </tr>
        <tr>
          <td><strong>Total no. of rooms in the School Building</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" id="txtnoofroom" name="txtnoofroom" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
          <td><strong>No. of class rooms</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" id="txtnoofclassroom" name="txtnoofclassroom" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
          <td><strong>Is there a separate room for</strong></td>
          <td><strong>:</strong></td>
          <td>
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="3" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse">
<tr>
<td width="50%"><strong>Head Teacher</strong></td>
<td width="2%"><strong>:</strong></td>
<td width="48%"><input type="radio" name="isroomforheadteach" value="Yes"/>Yes &nbsp; <input type="radio" name="isroomforheadteach" value="No"/>No</td>
</tr>
<tr>
  <td><strong>Teaching staff</strong></td>
  <td><strong>:</strong></td>
  <td><input type="radio" name="isroomforteachstaff" value="Yes"/>Yes &nbsp; <input type="radio" name="isroomforteachstaff" value="No"/>No</td>
  </tr>
<tr>
<td><strong>Stores (separate)</strong></td>
<td><strong>:</strong></td>
<td><input type="radio" name="isseperatestore" value="Yes"/>Yes &nbsp; <input type="radio" name="isseperatestore" value="No"/>No</td>
</tr>
<tr>
  <td><strong>Stores (along with the Head Teacher's room)</strong></td>
  <td><strong>:</strong></td>
  <td><input type="radio" name="isstorewithheadteacherroom" value="Yes"/>Yes &nbsp; <input type="radio" name="isstorewithheadteacherroom" value="No"/>No</td>
  </tr>
<tr>
<td><strong>Laboratory</strong></td>
<td><strong>:</strong></td>
<td><input type="radio" name="islaboratory" value="Yes"/>Yes &nbsp; <input type="radio" name="islaboratory" value="No"/>No</td>
</tr>
<tr>
  <td><strong>Kitchen only, for cooking mid-day meals</strong></td>
  <td><strong>:</strong></td>
  <td><input type="radio" name="iskitchenformidmeal" value="Yes"/>Yes &nbsp; <input type="radio" name="iskitchenformidmeal" value="No"/>No</td>
  </tr>
<tr>
<td><strong>Kitchen and space for eating mid-day meals</strong></td>
<td><strong>:</strong></td>
<td><input type="radio" name="isspaceforeatmeal" value="Yes"/>Yes &nbsp; <input type="radio" name="islaboratory" value="No"/>No</td>
</tr>
</table>          </td>
        </tr>
        <tr>
          <td><strong>Is there electricity supply?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="isprovideelectricity" value="Yes"/>Yes &nbsp; <input type="radio" name="isprovideelectricity" value="No"/>No</td>
        </tr>
        <tr>
          <td><strong>Is the building secure against unauthorized entry during non-school hours?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="isunauthorizedsecure" value="Yes"/>Yes &nbsp; <input type="radio" name="isunauthorizedsecure" value="No"/>No</td>
        </tr>
        <tr>
          <td><strong>Is there an open play ground?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="isopenplaygrnd" value="Yes"/>Yes &nbsp; <input type="radio" name="isopenplaygrnd" value="No"/>No</td>
        </tr>
        <tr>
          <td><strong>Is any sporting equipment available?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="hassportingequip" value="Yes"/>Yes &nbsp; <input type="radio" name="hassportingequip" value="No"/>No</td>
        </tr>
        <tr>
          <td><strong>Is any indoor game or play equipment available?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="hasindoorgame" value="Yes"/>Yes &nbsp; <input type="radio" name="hasindoorgame" value="No"/>No</td>
        </tr>
    </table></td>
</tr>
<tr>
<td colspan="5">
	<strong style="color:#000000">Medium of Instruction :</strong><br />
    <table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td><strong>1st Language</strong></td>
            <td><strong>:</strong></td>
            <td><input type="text" id="txt1stlanguage" name="txt1stlanguage" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
            <td><strong>2nd Language</strong></td>
            <td><strong>:</strong></td>
            <td><input type="text" id="txt2ndlanguage" name="txt2ndlanguage" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
            <td><strong>3rd Language</strong></td>
            <td><strong>:</strong></td>
            <td><input type="text" id="txt3rdlanguage" name="txt3rdlanguage" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
    </table></td>
</tr>


<tr height="7">
  <td colspan="5" style="border-left:1px solid #FFFFFF; border-right:1px solid #FFFFFF"></td>
</tr>

<tr>
<td colspan="5">
	<strong style="color:#000000">Continuous and Comprehensive Evaluation (CCE)</strong><br />
    <table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td><strong>Please ask the Head Teacher (in the absence of Head Teacher, the senior-most teacher) if he/she has heard of CCE for students</strong></td>
            <td><strong>:</strong></td>
            <td><input type="radio" name="hasheardCCEforstudent" value="Yes"/>Yes &nbsp; <input type="radio" name="hasheardCCEforstudent" value="No"/>No</td>
        </tr>
        <tr>
            <td><strong>If ‘yes’, please ask him/her whether any booklet or instructions on CCE has been received</strong></td>
            <td><strong>:</strong></td>
            <td><input type="radio" name="isbookletreceived" value="Yes"/>
              Yes &nbsp;
              <input type="radio" name="isbookletreceived" value="No"/>
              No</td>
        </tr>
        <tr>
          <td><strong>If again ‘yes’, please ask him/her to show the booklet and briefly summarize what it says</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="isbookletsummarize" value="Yes"/>
            Yes &nbsp;
            <input type="radio" name="isbookletsummarize" value="No"/>
            No</td>
        </tr>
        <tr>
          <td><strong>Is there any arrangement for helping lagging children with their studies during/after school hours?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="hasarrangelaggingchild" value="Yes"/>
            Yes &nbsp;
            <input type="radio" name="hasarrangelaggingchild" value="No"/>
            No</td>
        </tr>
        <tr>
          <td><strong>If there is no such arrangement, please ascertain if the school plans to start such supplemental teaching and if so, when</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" name="txtstartyrforlaggingchild" id="txtstartyrforlaggingchild" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
          <td><strong>Are there computers in the school?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="hascomputer" value="Yes"/>
            Yes &nbsp;
            <input type="radio" name="hascomputer" value="No"/>
            No</td>
        </tr>
        <tr>
          <td><strong>If ‘yes’, how many functioning computers are there?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" name="txtnoofcomputer" id="txtnoofcomputer" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
          <td><strong>Are there e-learning facilities available at the school?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="haselearning" value="Yes"/>
            Yes &nbsp;
            <input type="radio" name="haselearning" value="No"/>
            No</td>
        </tr>
        <tr>
          <td><strong>If, ‘yes’, please describe the e-learning facilities available</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" name="txtelearning" id="txtelearning" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
          <td><strong>Are there any physically or mentally challenged children in the school?</strong></td>
          <td><strong>:</strong></td>
          <td><input type="radio" name="ismentalstud" value="Yes"/>
            Yes &nbsp;
            <input type="radio" name="ismentalstud" value="No"/>
            No</td>
        </tr>
        <tr>
          <td><strong>If 'yes', please briefly describe the facilities for teaching such children and the nature of training of the teacher/s in charge</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" name="txtfacilityformentalstud" id="txtfacilityformentalstud" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
        <tr>
          <td><strong>If 'no', please ascertain if the school is willing to take in such children and the type of assistance it needs to teach such children</strong></td>
          <td><strong>:</strong></td>
          <td><input type="text" name="txtwillingformentalstud" id="txtwillingformentalstud" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
    </table></td>
</tr>

<tr>
<td colspan="5" align="center" style="border-left:1px solid #FFFFFF; border-right:1px solid #FFFFFF; border-bottom:1px solid #FFFFFF">
<input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  style="cursor:pointer; border-radius:3px" class="login" />
<input type="button" name="btn_submit" id="btn_submit" value="Next"  style="cursor:pointer; border-radius:3px;" onclick="saveGrantApplication();" class="login" /></td>
</tr>
</form>         
</table>
<form name="nextfrm" id="nextfrm" action="schoolSpecificFeatureForm.php" method="post">
<input type="hidden" id="hdnrefapplicationno" name="hdnrefapplicationno" value="<?php echo $refapplicationno;?>" />
</form>     
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
	
	function validation(){
	
		
		
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
			  url: 'updateGrantApplication1.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
			//	alert(JSON.stringify(data))
				if(data["success"]==1)
				{
				//alert(data["msg"])
				
				$("#nextfrm").submit();
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






