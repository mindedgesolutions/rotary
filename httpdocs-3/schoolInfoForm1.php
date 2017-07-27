<?php

//$refapplicationno = $_POST["hdnrefapplicationno"];
$refapplicationno = 'refno1';


//print_r($arr);

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
	
	function loadschoolInfo() {
	
				var pars ="refno=<?php echo $refapplicationno;?>"
			//alert(pars)
		$.ajax({                                      
			  url: 'getSchoolInfo.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
					//alert(data[0]["hasSMC"])
						$("input[name=hasSMC][value=" + data[0]["hasSMC"] + "]").attr('checked', 'checked');
						$("input[name=isSMCwork][value=" + data[0]["isSMCwork"] + "]").attr('checked', 'checked');
						$("input[name=isADPprepare][value=" + data[0]["isADPprepare"] + "]").attr('checked', 'checked');
						$("#txtADPYr").val( data[0]["ADPYr"]);
						
						$("#ADPfacility").val( data[0]["ADPfacility"]);
						
						$("#txtschoolname").val(data[0]["schoolname"])
						$("#txtstate").val(data[0]["addrstate"])
						$("#txtdistrict").val(data[0]["addrdistrict"])
						$("#txtvillage").val(data[0]["village"])
						$("#txtpin").val(data[0]["pin"])
						$("input[name=schooltype][value=" + data[0]["schooltype"] + "]").attr('checked', 'checked');

						$("#txtnoofboysstud").val(data[0]["noofboysstud"])
						$("#txtnoofgirlsstud").val(data[0]["noofgirlsstud"])
						$("#txtnooftotalstud").val(data[0]["nooftotalstud"])
						$("#txtnoofmaleteach").val(data[0]["noofmaleteach"])
						$("#txtnooffemaleteach").val(data[0]["nooffemaleteach"])
						$("#txtnoofheadteach").val(data[0]["noofheadteach"])
						$("#txtnooftotalteach").val(data[0]["nooftotalteach"])
						$("#txtnoofmaletrainedteach").val(data[0]["noofmaletrainedteach"])
						$("#txtnooffemaletrainedteach").val(data[0]["nooffemaletrainedteach"])
						$("input[name=istrainedhead][value=" + data[0]["istrainedhead"] + "]").attr('checked', 'checked');
						
						$("input[name=optstructure][value=" + data[0]["optstructure"] + "]").attr('checked', 'checked');
						$("#roofdamageextend").val(data[0]["roofdamageextend"])
						$("#floordamageextend").val(data[0]["floordamageextend"])
						$("#Wallsdamageextend").val(data[0]["Wallsdamageextend"])
						$("#doordamageextend").val(data[0]["doordamageextend"])
						$("#txtnoofroom").val(data[0]["noofroom"])
						$("#txtnoofclassroom").val(data[0]["noofclassroom"])
						$("input[name=isroomforheadteach][value=" + data[0]["isroomforheadteach"] + "]").attr('checked', 'checked');
						$("#isroomforheadteach").val(data[0]["isroomforheadteach"])
						$("input[name=isroomforteachstaff][value=" + data[0]["isroomforteachstaff"] + "]").attr('checked', 'checked');					
						$("input[name=isseperatestore][value=" + data[0]["isseperatestore"] + "]").attr('checked', 'checked');
						
						$("input[name=isstorewithheadteacherroom][value=" + data[0]["isstorewithheadteacherroom"] + "]").attr('checked', 'checked');
						$("input[name=islaboratory][value=" + data[0]["islaboratory"] + "]").attr('checked', 'checked');
						$("input[name=iskitchenformidmeal][value=" + data[0]["iskitchenformidmeal"] + "]").attr('checked', 'checked');
						$("input[name=isspaceforeatmeal][value=" + data[0]["isspaceforeatmeal"] + "]").attr('checked', 'checked');
						$("input[name=isprovideelectricity][value=" + data[0]["isprovideelectricity"] + "]").attr('checked', 'checked');
						$("input[name=isunauthorizedsecure][value=" + data[0]["isunauthorizedsecure"] + "]").attr('checked', 'checked');
						$("input[name=isopenplaygrnd][value=" + data[0]["isopenplaygrnd"] + "]").attr('checked', 'checked');
						$("input[name=hassportingequip][value=" + data[0]["hassportingequip"] + "]").attr('checked', 'checked');
						$("input[name=hasindoorgame][value=" + data[0]["hasindoorgame"] + "]").attr('checked', 'checked');
						
						$("#txt1stlanguage").val(data[0]["language1"] )
						$("#txt2ndlanguage").val(data[0]["language2"] )
						$("#txt3rdlanguage").val(data[0]["language3"] )
						$("input[name=hasheardCCEforstudent][value=" + data[0]["hasheardCCEforstudent"] + "]").attr('checked', 'checked');
						$("input[name=isbookletreceived][value=" + data[0]["isbookletreceived"] + "]").attr('checked', 'checked');
						$("input[name=isbookletsummarize][value=" + data[0]["isbookletsummarize"] + "]").attr('checked', 'checked');
						$("input[name=hasarrangelaggingchild][value=" + data[0]["hasarrangelaggingchild"] + "]").attr('checked', 'checked');

						$("#txtstartyrforlaggingchild").val(data[0]["startyrforlaggingchild"] )
						$("input[name=hascomputer][value=" + data[0]["hascomputer"] + "]").attr('checked', 'checked');

						$("#txtnoofcomputer").val(data[0]["noofcomputer"] )
						$("input[name=haselearning][value=" + data[0]["haselearning"] + "]").attr('checked', 'checked');
						$("#txtelearning").val(data[0]["elearning"])
						$("input[name=ismentalstud][value=" + data[0]["ismentalstud"] + "]").attr('checked', 'checked');
						$("#txtfacilityformentalstud").val(data[0]["facilityformentalstud"])
						$("#txtwillingformentalstud").val(data[0]["willingformentalstud"])
					//}
				
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

<body onload="loadschoolInfo()">
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
                                       	  <h1 style="padding:0; margin:0">Grant Application</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="0" cellpadding="1" cellspacing="1" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
<form name="frmgrantapp1" action="" method="post">
   <input type="hidden" name="hdnrefapplicationno" id="hdnrefapplicationno" value="<?php echo $refapplicationno; ?>"/>
                <tr>
                    <td width="30%" style=" padding:0 0 0 20px" colspan="3"><strong>Does the school have a School Management Committee (SMC), as required under the RTE Act? </strong>
                    <input type="radio" name="hasSMC" value="Yes"/>Yes &nbsp;
									<input type="radio" name="hasSMC" value="No"/>No
					</td>
                </tr>
                <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If 'yes', is the SMC functioning regularly? (Ask the parents of several students of the school) :</strong><input type="radio" name="isSMCwork" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isSMCwork" value="No"/>No 
					</td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Has the school prepared an Annual Development Plan (ADP) for 2014-15 or 2015-16, as required under the RTE Act?</strong>:</strong><input type="radio" name="isADPprepare" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isADPprepare" value="No"/>No 
					</td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If ‘yes’, briefly describe the facilities envisaged in the ADP corresponding to those under the Happy Schools Project :</strong></td>
                                
                   
                </tr>
				
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><select name="ADPfacility" id="ADPfacility" >
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
                    <td style=" padding:0 0 0 20px"><strong>Mention the year of the ADP</strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtADPYr" id="txtADPYr"  onKeyPress="inputNumber(event,this.value,false);"  maxlength="4" /> </td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px"><strong>Name of School </strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" name="txtschoolname" id="txtschoolname" /></td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>School Address :</strong></td>
                    
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>State:</strong><input type="text" name="txtstate" id="txtstate" />&nbsp;
					<strong>District:</strong><input type="text" name="txtdistrict" id="txtdistrict" />&nbsp;<br />
					<strong>Village/Town:</strong><input type="text" name="txtvillage" id="txtvillage" />&nbsp; <strong>PIN:</strong><input type="text" name="txtpin" id="txtpin"   onKeyPress="inputNumber(event,this.value,false);"  maxlength="7"/>&nbsp;</td>
                   
                    
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>School Type :</strong></td>
                    
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><input type="radio" name="schooltype" value="Primary"/>Primary (Class I – V)&nbsp;
						<input type="radio" name="schooltype" value="Elementary"/>Elementary (Class I – VIII)&nbsp;
						<input type="radio" name="schooltype" value="Secondary"/>Secondary (Class I – X)</td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>No. of Students (Boys) :</strong>             
                    <input type="text" name="txtnoofboysstud" id="txtnoofboysstud" size="10" class="student" onkeyup="calculatetotal('student','txtnooftotalstud')"  onKeyPress="inputNumber(event,this.value,false);"  maxlength="7"/>&nbsp;
					<strong>No. of Students (Girls) :</strong>             
                    <input type="text" name="txtnoofgirlsstud" id="txtnoofgirlsstud" size="10"  class="student" onkeyup="calculatetotal('student','txtnooftotalstud')" onKeyPress="inputNumber(event,this.value,false);"  maxlength="7"/>&nbsp;
					<strong>Total No. of Students :</strong>             
                    <input type="text" name="txtnooftotalstud" id="txtnooftotalstud" size="10"   onKeyPress="inputNumber(event,this.value,false);"  maxlength="7"/>&nbsp;
					</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>No. of Teachers :</strong></td>              
                   
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Male :</strong>             
                    <input type="text" name="txtnoofmaleteach" id="txtnoofmaleteach" size="10" class="teacher" onkeyup="calculatetotal('teacher','txtnooftotalteach')" onKeyPress="inputNumber(event,this.value,false);"  maxlength="5"/>&nbsp;
					<strong>Female :</strong>             
                    <input type="text" name="txtnooffemaleteach" id="txtnooffemaleteach" size="10"  class="teacher" onkeyup="calculatetotal('teacher','txtnooftotalteach')"  onKeyPress="inputNumber(event,this.value,false);"  maxlength="5"/>&nbsp;
					<strong>Head Teacher :</strong>             
                    <input type="text" name="txtnoofheadteach" id="txtnoofheadteach" size="10"  class="teacher" onkeyup="calculatetotal('teacher','txtnooftotalteach')" onKeyPress="inputNumber(event,this.value,false);"  maxlength="5"/>&nbsp;
					<strong>Total Teacher :</strong>             
                    <input type="text" name="txtnooftotalteach" id="txtnooftotalteach" size="10"   onKeyPress="inputNumber(event,this.value,false);"  maxlength="5"/>&nbsp;
					</td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>No. of Trained Teachers :</strong></td>              
                  
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Male :</strong>             
                    <input type="text" name="txtnoofmaletrainedteach" id="txtnoofmaletrainedteach" size="10"  onKeyPress="inputNumber(event,this.value,false);"  maxlength="5"/>&nbsp;
					<strong>Female :</strong>             
                    <input type="text" name="txtnooffemaletrainedteach" id="txtnooffemaletrainedteach" size="10"   onKeyPress="inputNumber(event,this.value,false);"  maxlength="5"/>&nbsp;
					<strong>Trained Head Teacher :</strong>             
                   <input type="radio" name="istrainedhead" value="Yes"/>Yes &nbsp;
						<input type="radio" name="istrainedhead" value="No"/>No
					</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>School Building (Current Status) :</strong></td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px"><strong>Structure </strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="radio" name="optstructure" value="Good"/>Good &nbsp;
						<input type="radio" name="optstructure" value="Average"/>Average&nbsp;
						<input type="radio" name="optstructure" value="Poor"/>Poor
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr><td>Part of Structure</td><td>Extent of Damage</td></tr>
						
						<tr><td>Roof</td><td><input type="radio" name="roofdamageextend" value="Below 50%"/>Below 50% &nbsp;
						<input type="radio" name="roofdamageextend" value="Above 50%"/>Above 50%</td></tr>
						<tr><td>Floor</td><td><input type="radio" name="floordamageextend" value="Below 50%"/>Below 50% &nbsp;
						<input type="radio" name="floordamageextend" value="Above 50%"/>Above 50%</td></tr>
						<tr><td>Walls</td><td><input type="radio" name="wallsdamageextend" value="Below 50%"/>Below 50% &nbsp;
						<input type="radio" name="Wallsdamageextend" value="Above 50%"/>Above 50%</td></tr>
						<tr><td>Doors and Windows</td><td><input type="radio" name="doordamageextend" value="Below 50%"/>Below 50% &nbsp;
						<input type="radio" name="doordamageextend" value="Above 50%"/>Above 50%</td></tr>
						</table> 
					</td>
                </tr>
				
				 <tr>
                    <td style=" padding:0 0 0 20px"><strong>Total no. of rooms in the School Building </strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" id="txtnoofroom" name="txtnoofroom"  />
						</td>
                </tr> <tr>
                    <td style=" padding:0 0 0 20px"><strong>No. of class rooms</strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="text" id="txtnoofclassroom" name="txtnoofclassroom"  />
						</td>
                </tr>
                <tr>
                    <td style=" padding:0 0 0 20px" colspan="3">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr><td colspan="4">Is there a separate room for</tr>
						
						<tr>
						<td>Head Teacher</td>
						<td><input type="radio" name="isroomforheadteach" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isroomforheadteach" value="No"/>No </td>
						<td>Teaching staff</td>
						<td><input type="radio" name="isroomforteachstaff" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isroomforteachstaff" value="No"/>No </td>
						</tr>
						<tr>
						<td>Stores (separate)</td>
						<td><input type="radio" name="isseperatestore" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isseperatestore" value="No"/>No </td>
						<td>Stores (along with the Head Teacher's room)</td>
						<td><input type="radio" name="isstorewithheadteacherroom" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isstorewithheadteacherroom" value="No"/>No </td>
						</tr>
						<tr>
						<td>Laboratory</td>
						<td><input type="radio" name="islaboratory" value="Yes"/>Yes &nbsp;
						<input type="radio" name="islaboratory" value="No"/>No </td>
						<td>Kitchen only, for cooking mid-day meals</td>
						<td><input type="radio" name="iskitchenformidmeal" value="Yes"/>Yes &nbsp;
						<input type="radio" name="iskitchenformidmeal" value="No"/>No </td>
						</tr>
						<tr>
						<td>Kitchen and space for eating mid-day meals</td>
						<td><input type="radio" name="isspaceforeatmeal" value="Yes"/>Yes &nbsp;
						<input type="radio" name="islaboratory" value="No"/>No </td>
						<td colspan="2">&nbsp;</td>
						</tr>
						</table> 
					</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Is there electricity supply?</strong></td>
                    <td><strong>:</strong></td>              
                    <td><input type="radio" name="isprovideelectricity" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isprovideelectricity" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Is the building secure against unauthorized entry during non-school hours?</strong> 								
						<input type="radio" name="isunauthorizedsecure" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isunauthorizedsecure" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Is there an open play ground?</strong> 								
						<input type="radio" name="isopenplaygrnd" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isopenplaygrnd" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Is any sporting equipment available?</strong> 								
						<input type="radio" name="hassportingequip" value="Yes"/>Yes &nbsp;
						<input type="radio" name="hassportingequip" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Is any indoor game or play equipment available?</strong> 								
						<input type="radio" name="hasindoorgame" value="Yes"/>Yes &nbsp;
						<input type="radio" name="hasindoorgame" value="No"/>No
						</td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Medium of Instruction</strong></td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>1st Language :</strong>
					<input type="text" id="txt1stlanguage" name="txt1stlanguage" />&nbsp;<strong>2nd Language :</strong>
					<input type="text" id="txt2ndlanguage" name="txt2ndlanguage" />&nbsp;<strong>3rd Language :</strong>
					<input type="text" id="txt3rdlanguage" name="txt3rdlanguage" /></td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Continuous and Comprehensive Evaluation (CCE)</strong></td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Please ask the Head Teacher (in the absence of Head Teacher, the senior-most teacher) if he/she has heard of CCE for students</strong>
						 <input type="radio" name="hasheardCCEforstudent" value="Yes"/>Yes &nbsp;
						<input type="radio" name="hasheardCCEforstudent" value="No"/>No
						</td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If ‘yes’, please ask him/her whether any booklet or instructions on CCE has been received</strong>
						 <input type="radio" name="isbookletreceived" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isbookletreceived" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If again ‘yes’, please ask him/her to show the booklet and briefly summarize what it says</strong>
						 <input type="radio" name="isbookletsummarize" value="Yes"/>Yes &nbsp;
						<input type="radio" name="isbookletsummarize" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Is there any arrangement for helping lagging children with their studies during/after school hours?</strong>
						 <input type="radio" name="hasarrangelaggingchild" value="Yes"/>Yes &nbsp;
						<input type="radio" name="hasarrangelaggingchild" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If there is no such arrangement, please ascertain if the school plans to start such supplemental teaching and if so, when</strong>
						 <input type="text" name="txtstartyrforlaggingchild" id="txtstartyrforlaggingchild" />
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Are there computers in the school?</strong>
					<input type="radio" name="hascomputer" value="Yes"/>Yes &nbsp;
						<input type="radio" name="hascomputer" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If ‘yes’, how many functioning computers are there?</strong>
						<input type="text" name="txtnoofcomputer" id="txtnoofcomputer" />
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Are there e-learning facilities available at the school?</strong>
					<input type="radio" name="haselearning" value="Yes"/>Yes &nbsp;
						<input type="radio" name="haselearning" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If, ‘yes’, please describe the e-learning facilities available</strong>
						<input type="text" name="txtelearning" id="txtelearning" />
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>Are there any physically or mentally challenged children in the school?</strong>
					<input type="radio" name="ismentalstud" value="Yes"/>Yes &nbsp;
						<input type="radio" name="ismentalstud" value="No"/>No
						</td>
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If 'yes', please briefly describe the facilities for teaching such children and the nature of training of the teacher/s in charge</strong>
					<input type="text" name="txtfacilityformentalstud" id="txtfacilityformentalstud" />
                </tr>
				<tr>
                    <td style=" padding:0 0 0 20px" colspan="3"><strong>If 'no', please ascertain if the school is willing to take in such children and the type of assistance it needs to teach such children</strong>
					<input type="text" name="txtwillingformentalstud" id="txtwillingformentalstud" />
                </tr>
				<tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="button" name="btn_submit" id="btn_submit" value="Next"  class="hed" style="cursor:pointer; border-radius:3px;" onclick="saveGrantApplication();" /> 
                        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="hed" style="cursor:pointer; border-radius:3px" />&nbsp;&nbsp;
					</td>
				</tr>
</form>         
</table>
  <form name="nextfrm" id="nextfrm" action="schoolSpecificFeatureForm.php" method="post">
  	<input type="hidden" id="hdnrefapplicationno" name="hdnrefapplicationno" value="<?php echo $refapplicationno;?>" />
  </form>     
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
				alert(data["msg"])
				
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






