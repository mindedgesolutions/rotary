<?php
session_start();
//include("../connection.php");
if(!isset($_SESSION["grantAppuserid"]))
{
	header("Location: grantApplicationIndex.php");
}

$grantAppuserid  =$_SESSION["grantAppuserid"];

$refapplicationno = $_POST["hdnrefapplicationno"];
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
		//alert(sum.toFixed(2))
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#"+idfordisplay).val(sum.toFixed(2));
    }

function disableautocompletion(id1){ 
	 var passwordControl=document.getElementById(id1);
	 passwordControl.setAttribute("autocomplete","off");
}

function calculatetotalcost(classformultiply, idfordisplay){

        $("."+classformultiply).each(function() {
 
            $(this).keyup(function(){
                calculateMulti(classformultiply,idfordisplay);
            });
        });
 
    }
	
	function estimatetotal(classforadd,idfordisplay) {
	
			var add = 0;
                $("."+classforadd).each(function() {
		 if(!isNaN(this.value) && this.value.length!=0) {	
                    add += parseFloat($(this).val());
				}
                });
		 $("#"+idfordisplay).val(add.toFixed(2));
	
	}
 
    function calculateMulti(classformultiply,idfordisplay) {
 
        var multiple = 1;
        //iterate through each textboxes and add the values
        $("."+classformultiply).each(function() {
 
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                multiple *= parseFloat(this.value);
		
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#"+idfordisplay).val(multiple.toFixed(2));
    }

	function opendiv(cntrval,opencntrlid) {
	if(cntrval=='Yes') {
		$('#'+opencntrlid).show();
	}
		else {
		$('#'+opencntrlid).find('input:text').each(
				function() {
					$(this).val('');
				});
		$('#'+opencntrlid).hide();
		}
	}
	
	function loadSDP(){
					var pars ="refappno=<?php echo $refapplicationno;?>"
		$.ajax({                                      
			  url: 'getSDP.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
					var SDParr = (data[0]["ADPfacility"]).split(',');
					for(var i=0; i<SDParr.length; i++) {
						$('.SDP_'+SDParr[i]).show()
						if(SDParr[i]==1) {
						$("input[name=isneedrepair][value='Yes']").attr('checked', 'checked');
						opendiv('Yes','repairneed');
						$("input[name=isneedpaint][value='Yes']").attr('checked', 'checked');
						opendiv('Yes','needpaint');
						}
						if(SDParr[i]==2) {
						$("input[name=hasbenches][value='No']").attr('checked', 'checked');
						}
						if(SDParr[i]==3) {
						$("input[name=hassafewater][value='No']").attr('checked', 'checked');
						}
						if(SDParr[i]==4) {
						$("input[name=hasclentoilet][value='No']").attr('checked', 'checked');
						}
						if(SDParr[i]==5) {
						$("input[name=haslibrary][value='No']").attr('checked', 'checked');
						}
						if(SDParr[i]==6) {
						$("input[name=isgovtprovideuniform][value='No']").attr('checked', 'checked');
						}
						if(SDParr[i]==7) {
						$("input[name=isspaceforteacher][value='No']").attr('checked', 'checked');
						}
						if(SDParr[i]==8) {
						$("input[name=hasindoorgamefacility][value='No']").attr('checked', 'checked');
						}
					}
				}
			});
	}
	
	
	function loadInfo() {
				var pars ="refappno=<?php echo $refapplicationno;?>"
		$.ajax({                                      
			  url: 'getSchoolfeatureInfo.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
				$("input[name=isneedrepair][value=" + data[0]["isneedrepair"] + "]").attr('checked', 'checked');
				opendiv(data[0]["isneedrepair"],'repairneed');

				$("#roofarea").val( data[0]["roofarea"]);
				$("#rateforroof").val( data[0]["rateforroof"]);
				$("#costforroof").val( data[0]["costforroof"]);
				$("#hdnimgroofcost").val( data[0]["imgroofcost"]);
				
				$("#floorarea").val( data[0]["floorarea"]);
				$("#rateforfloor").val( data[0]["rateforfloor"]);
				$("#costforfloor").val( data[0]["costforfloor"]);
				$("#hdnimgfloorcost").val( data[0]["imgfloorcost"]);

				$("#wallarea").val( data[0]["wallarea"]);
				$("#rateforwall").val( data[0]["rateforwall"]);
				$("#costforwall").val( data[0]["costforwall"]);
				$("#hdnimgwallcost").val( data[0]["imgwallcost"]);

				$("#doorarea").val( data[0]["doorarea"]);
				$("#ratefordoor").val( data[0]["ratefordoor"]);
				$("#costfordoor").val( data[0]["costfordoor"]);
				$("#hdnimgdoorcost").val( data[0]["imgdoorcost"]);

				$("#totalcost").val( data[0]["totalcost"]);
				$("input[name=isneedpaint][value=" + data[0]["isneedpaint"] + "]").attr('checked', 'checked');
				opendiv(data[0]["isneedpaint"],'needpaint');
				
				$("#txtareaforpaint").val( data[0]["areaforpaint"]);
				$("#txtcostforpaint").val( data[0]["costforpaint"]);
				
				$("#hdnimgpaintcost").val( data[0]["imgpaintcost"]);
				$("#txtpainttype").val( data[0]["painttype"]);
				
				$("#hdnrepaireimg1").val( data[0]["repaireimg1"]);
				$("#hdnrepaireimg2").val( data[0]["repaireimg2"]);
				
				$("input[name=hasbenches][value=" + data[0]["hasbenches"] + "]").attr('checked', 'checked');
				
			/*	if(data[0]["hasbenches"]=='Yes')
				opendiv('No','benchdetail')
				else if(data[0]["hasbenches"]=='No')
				opendiv('Yes','benchdetail')*/
				
				$("#txtexistingbench").val( data[0]["existingbench"]);
				$("#txtneedbench").val( data[0]["needbench"]);
				$("#txtcostforbench").val( data[0]["costforbench"]);
				$("#hdnimgbenchcost").val( data[0]["imgbenchcost"]);


				$("#txtexistingdesk").val( data[0]["existingdesk"]);
				$("#txtneeddesk").val( data[0]["needdesk"]);
				$("#txtcostfordesk").val( data[0]["costfordesk"]);
				$("#hdnimgdeskcost").val( data[0]["imgdeskcost"]);


				$("#txtexistingbenchdesk").val( data[0]["existingbenchdesk"]);
				$("#txtneedbenchdesk").val( data[0]["needbenchdesk"]);
				$("#txtcostforbenchdesk").val( data[0]["costforbenchdesk"]);
				$("#hdnimgbenchdeskcost").val( data[0]["imgbenchdeskcost"]);

				$("#hdnbenchimg1").val( data[0]["benchimg1"]);
				$("#hdnbenchimg2").val( data[0]["benchimg2"]);


				$("input[name=hassafewater][value=" + data[0]["hassafewater"] + "]").attr('checked', 'checked');
				/*if(data[0]["hassafewater"]=='Yes')
				opendiv('No','waterfacility')
				else if(data[0]["hassafewater"]=='No')
				opendiv('Yes','waterfacility')*/

				$("#txtwaterfacility").val( data[0]["waterfacility"]);
				$("#txtcosttomakewatersafe").val( data[0]["costtomakewatersafe"]);
				
				$("#hdnimgwatersafecost").val( data[0]["imgwatersafecost"]);
				$("#hdnwaterfacilityimg1").val( data[0]["waterfacilityimg1"]);
				$("#hdnwaterfacilityimg2").val( data[0]["waterfacilityimg2"]);

				$("input[name=hasgirltoilet][value=" + data[0]["hasgirltoilet"] + "]").attr('checked', 'checked');
				opendiv(data[0]["hasgirltoilet"],'girltoiletcondition')

				$("#txturinalforgirls").val( data[0]["urinalforgirls"]);
				$("#txttoiletforgirls").val( data[0]["toiletforgirls"]);

				$("input[name=hasboytoilet][value=" + data[0]["hasboytoilet"] + "]").attr('checked', 'checked');
				opendiv(data[0]["hasboytoilet"],'boytoiletcondition');
				$("#txturinalforboys").val( data[0]["urinalforboys"]);
				$("#txttoiletforboys").val( data[0]["toiletforboys"]);


				$("input[name=hasteachertoilet][value=" + data[0]["hasteachertoilet"] + "]").attr('checked', 'checked');
				 opendiv(data[0]["hasteachertoilet"],'teachertoiletcondition'); 

				$("#txturinalforteacher").val( data[0]["urinalforteacher"]);
				$("#txttoiletforteacher").val( data[0]["toiletforteacher"]);


				$("#txtexistingboystoilet").val( data[0]["existingboystoilet"]);
				$("#txtrequireboystoilet").val( data[0]["requireboystoilet"]);
				$("#txtboystoiletcost").val( data[0]["boystoiletcost"]);
				$("#hdnimgboystoiletcost").val( data[0]["imgboystoiletcost"]);

				$("#txtexistinggirlstoilet").val( data[0]["existinggirlstoilet"]);
				$("#txtrequiregirlstoilet").val( data[0]["requiregirlstoilet"]);
				$("#txtgirlstoiletcost").val( data[0]["girlstoiletcost"]);
				$("#hdnimggirlstoiletcost").val( data[0]["imggirlstoiletcost"]);

				$("#txtexistingteachertoilet").val( data[0]["existingteachertoilet"]);
				$("#txtrequireteachertoilet").val( data[0]["requireteachertoilet"]);
				$("#txtteachertoiletcost").val( data[0]["teachertoiletcost"]);
				$("#hdnimgteachtoiletcost").val( data[0]["imgteachtoiletcost"]);

				$("#txttotaltoiletcost").val( data[0]["totaltoiletcost"]);

				$("#hdnhygienicimg1").val( data[0]["hygienicimg1"]);
				$("#hdnhygienicimg2").val( data[0]["hygienicimg2"]);


				$("input[name=haslibrary][value=" + data[0]["haslibrary"] + "]").attr('checked', 'checked');

				$("#isstuduselibrary").val( data[0]["isstuduselibrary"]);
				$("#libbooktype").val( data[0]["libbooktype"]);
				$("#libbookexisting").val( data[0]["libbookexisting"]);
				$("#libbookneed").val( data[0]["libbookneed"]);
				$("#libbookcost").val( data[0]["libbookcost"]);
				$("#hdnimgbookcost").val( data[0]["imgbookcost"]);

				$("#hdnlibimg1").val( data[0]["libimg1"]);
				$("#hdnlibimg2").val( data[0]["libimg2"]);
				$("#bookalmirahexisting").val( data[0]["bookalmirahexisting"]);
				$("#bookalmirahneed").val( data[0]["bookalmirahneed"]);
				$("#libalmirahcost").val( data[0]["libalmirahcost"]);
				$("#hdnimgalmirahcost").val( data[0]["imgalmirahcost"]);


				$("input[name=isgovtprovideuniform][value=" + data[0]["isgovtprovideuniform"] + "]").attr('checked', 'checked');

				$("#reasonfornonsupplyuniform").val( data[0]["reasonfornonsupplyuniform"]);
				$("#uniformunitreq").val(data[0]["uniformunitreq"]);
				$("#uniformunitcost").val(data[0]["uniformunitcost"]);
				$("#uniformtotalcost").val(data[0]["uniformtotalcost"]);
				$('#hdnimguniformcost').val(data[0]["imguniformcost"])
				
				$("#footwearunitreq").val( data[0]["footwearunitreq"]);
				$("#footwearunitcost").val( data[0]["footwearunitcost"]);
				$("#footweartotalcost").val( data[0]["footweartotalcost"]);
				$('#hdnimgfootwearcost').val(data[0]["imgfootwearcost"])
				
				$("#hdnuniformimg1").val( data[0]["uniformimg1"]);
				$("#hdnuniformimg2").val( data[0]["uniformimg2"]);

				$("input[name=isspaceforteacher][value=" + data[0]["isspaceforteacher"] + "]").attr('checked', 'checked');

				$("#availspacedetail").val( data[0]["availspacedetail"]);
				$("#facilityinspaceforteacher").val( data[0]["facilityinspaceforteacher"]);
				
				$("#costforprovidefacility").val( data[0]["costforprovidefacility"]);
				$('#hdnimgspaceprovidecost').val(data[0]["imgspaceprovidecost"])

				$("#costforprovidetable").val( data[0]["costforprovidetable"]);
				$('#hdnimgtablecost').val(data[0]["imgtablecost"])
				
				
				$("#hdnspaceimg1").val( data[0]["spaceimg1"]);
				$("#hdnspaceimg2").val( data[0]["spaceimg2"]);
				$("input[name=hasindoorgamefacility][value=" + data[0]["hasindoorgamefacility"] + "]").attr('checked', 'checked');
			//	$("#listindoorgamefacility").val( data[0]["listindoorgamefacility"]);
				$("#reqindoorgamefacility").val( data[0]["reqindoorgamefacility"]);
			//	$("#costofindoorgamefacility").val( data[0]["costofindoorgamefacility"]);
				$("#costofindoorgamefacility").val( data[0]["costofindoorgamefacility"]);
				$('#hdnimgindoorgamecost').val(data[0]["imgindoorgamecost"])
				$("#hdnsportequipimg1").val( data[0]["sportequipimg1"]);
				$("#hdnsportequipimg2").val( data[0]["sportequipimg2"]);

				$("#costforhappyschool").val( data[0]["costforhappyschool"]);
				$("#administrativecost").val( data[0]["administrativecost"]);
				$("#totalprojectcost").val( data[0]["totalprojectcost"]);
				$("#clubcontribute").val( data[0]["clubcontribute"]);
				$("#othercontribute").val( data[0]["othercontribute"]);
				
				$("#RILMcontribute").val( data[0]["RILMcontribute"]);
				
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
	color: #FF0000;
	text-align: center;
}
.auto-style2 {
	color: #FF0000;
}
</style>

</head>

<body onload="loadSDP(); loadInfo()">
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
                            <td valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Part - 
										  C : Proposed Activity Details</h1>
										  <p style="padding:0; margin:0">&nbsp;</p>
										  <p style="padding:0; margin:0" class="auto-style2">
										  <strong>[While you fill in this form, 
										  please also upload a minimum of 1 and 
										  a maximum of 2 pictures against each 
										  facility / service to show the 
										  existing condition / absence of each 
										  facility / service being provided. 
										  Also, for each selected activity, 
										  please provide quotation from selected 
										  vendor]</strong></p>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px" class="auto-style1">
									<strong><br></strong></div>
                                
<table border="1" bordercolor="#999999" cellpadding="7" cellspacing="0" width="100%" align="center" style="text-align:left; color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; border-collapse:collapse">
<form id="frmgrantapp2" name="frmgrantapp2" action="updateGrantApplication2.php" method="post" enctype="multipart/form-data">
   				<input type="hidden" id="hdngrantuserid" name="hdngrantuserid" value="<?php echo $grantAppuserid; ?>" />
				<input type="hidden" name="hdnrefapplicationno" id="hdnrefapplicationno" value="<?php echo $refapplicationno; ?>"/>
<tr class="SDP_1" style="display:none">
    <td colspan="3">
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
            <tr>
                <td width="29%"><strong>Does the school building need repairs?</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="69%"><input type="radio" name="isneedrepair" value="Yes" onclick="opendiv(this.value,'repairneed')" />
                  Yes &nbsp;
                  <input type="radio" name="isneedrepair" value="No" onclick="opendiv(this.value,'repairneed')" />
                  No</td>
            </tr>
            <tr id="repairneed" style="display:none">
                <td colspan="3">
                	<strong>If 'yes', please describe the type of repairs needed to :</strong><br />
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
<tr bgcolor="#f5f5f5">
<td>&nbsp;</td>
<td><strong>Approx. area (sq. ft.)</strong></td>
<td><strong>Rate (Rs. per sq. ft.)</strong></td>
<td><strong>Estimated total cost (Rs.)</strong></td>
</tr>
<tr>
<td><strong>Roof</strong></td>
<td><input type="text" id="roofarea" name="roofarea"  onKeyPress="inputNumber(event,this.value,true);" class="roof" onfocus="disableautocompletion(this.id);" onkeyup="calculatetotalcost('roof','costforroof')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="rateforroof" name="rateforroof"  onfocus="disableautocompletion(this.id);"  onKeyPress="inputNumber(event,this.value,true);" class="roof" onkeyup="calculatetotalcost('roof','costforroof')" onblur = "estimatetotal('repaircost','totalcost')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="costforroof" name="costforroof" class="repaircost" readonly="readonly" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />
<input type="file" name="imgroofcost" id="imgroofcost"/><input type="hidden" id="hdnimgroofcost" name="hdnimgroofcost"  />
</td>
</tr>
<tr>
<td><strong>Floor</strong></td>
<td><input type="text" id="floorarea" name="floorarea" onfocus="disableautocompletion(this.id);"  onKeyPress="inputNumber(event,this.value,true);" class="floor" onkeyup="calculatetotalcost('floor','costforfloor')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="rateforfloor" name="rateforfloor"  onblur = "estimatetotal('repaircost','totalcost')" onfocus="disableautocompletion(this.id);" onKeyPress="inputNumber(event,this.value,true);" class="floor" onkeyup="calculatetotalcost('floor','costforfloor')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="costforfloor" name="costforfloor"  class="repaircost" readonly="readonly"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />
<input type="file" name="imgfloorcost" id="imgfloorcost"/><input type="hidden" id="hdnimgfloorcost" name="hdnimgfloorcost"  />
</td>
</tr>
<tr>
<td><strong>Walls</strong></td>
<td><input type="text" id="wallarea" name="wallarea" onKeyPress="inputNumber(event,this.value,true);" onfocus="disableautocompletion(this.id);"  class="wall" onkeyup="calculatetotalcost('wall','costforwall')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
<td><input type="text" id="rateforwall" name="rateforwall" onfocus="disableautocompletion(this.id);"  onKeyPress="inputNumber(event,this.value,true);" class="wall" onkeyup="calculatetotalcost('wall','costforwall')"  onblur = "estimatetotal('repaircost','totalcost')"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="costforwall" name="costforwall" class="repaircost"  readonly="readonly" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />
<input type="file" name="imgwallcost" id="imgwallcost"/><input type="hidden" id="hdnimgwallcost" name="hdnimgwallcost"  />
</td>
</tr>
<tr>
<td><strong>Doors and Windows</strong></td>
<td><input type="text" id="doorarea" name="doorarea"  onfocus="disableautocompletion(this.id);"  onKeyPress="inputNumber(event,this.value,true);" class="door" onkeyup="calculatetotalcost('door','costfordoor')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="ratefordoor" name="ratefordoor"  onfocus="disableautocompletion(this.id);"  onKeyPress="inputNumber(event,this.value,true);" class="door" onkeyup="calculatetotalcost('door','costfordoor')"  onblur = "estimatetotal('repaircost','totalcost')"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="costfordoor" name="costfordoor"  class="repaircost"  readonly="readonly" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  />
<input type="file" name="imgdoorcost" id="imgdoorcost"/><input type="hidden" id="hdnimgdoorcost" name="hdnimgdoorcost"  />
</td>
</tr>
<tr>
<td><strong>Estimated total cost (Rs.)</strong></td>
<td colspan="3"><input type="text" id="totalcost" name="totalcost"  onKeyPress="inputNumber(event,this.value,true);"  readonly="readonly" onblur="estimatetotal('repaircost','totalcost')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
</tr>
</table>				
</td>
			</tr>
<tr>
<td colspan="3">
	<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
        <tr>
            <td width="29%"><strong>Does the school building need painting?</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="69%"><input type="radio" name="isneedpaint" value="Yes" onclick="opendiv(this.value,'needpaint')"/>
Yes &nbsp;
<input type="radio" name="isneedpaint" value="No" onclick="opendiv(this.value,'needpaint')"/>
No</td>
        </tr>
        <tr id="needpaint" style="display:none">
            <td colspan="3">
                <strong>If 'yes', please describe the following :</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
    <tr>
        <td width="30%"><strong>Total area (sq. ft.) needing painting</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="68%"><input type="text" name="txtareaforpaint" id="txtareaforpaint"  onfocus="disableautocompletion(this.id);"  onkeypress="inputNumber(event,this.value,true);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /> </td>
    </tr>
    <tr>
        <td><strong>Estimated total  cost of painting (Rs.)</strong></td>
        <td><strong>:</strong></td>
        <td><input type="text" name="txtcostforpaint" id="txtcostforpaint"  onfocus="disableautocompletion(this.id);"   onkeypress="inputNumber(event,this.value,true);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp; &nbsp;<input type="file" name="imgpaintcost" id="imgpaintcost"/><input type="hidden" id="hdnimgpaintcost" name="hdnimgpaintcost"  /></td>
    </tr>
    <tr>
        <td><strong>Type of Paint </strong></td>
        <td><strong>:</strong></td>
        <td><select id="txtpainttype" name="txtpainttype">
			<option value="">Select</option>
			<option value="Lime">Lime</option>
			<option value="Distemper">Distemper</option>
			<option value="Plastic">Plastic</option>
			<option value="Other">Other</option>
		</select>
		</td>
    </tr>
</table>            
</td>
    </tr>

    </table></td>
</tr>

<tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="repaireimg1" name="repaireimg1"  /><input type="text" id="hdnrepaireimg1" name="hdnrepaireimg1" readonly="readonly"/></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="repaireimg2" name="repaireimg2"  /><input type="text" id="hdnrepaireimg2" name="hdnrepaireimg2" readonly="readonly"/></td>
</tr>
        </table>
    </td>

</tr>


<tr  class="SDP_2" style="display:none">
<td colspan="3">
	<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
        <tr>
            <td width="56%"><strong>Does the school building have sufficient benches and desks in each class room?</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="42%"><input type="radio" name="hasbenches" value="No"/>No</td><!-- checked="checked"-->
        </tr>
        <tr id="benchdetail">
            <td colspan="3">
            	<strong>If 'no', please give the details :</strong><br />
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
<tr bgcolor="#f5f5f5">
<td>&nbsp;</td>
<td><strong>No. of existing units</strong></td>
<td><strong>No. of units being provided</strong></td>
<td><strong>Estimated total cost (Rs.)</strong></td>
</tr>
<tr>
<td ><strong>Benches</strong></td>
<td><input type="text" id="txtexistingbench" name="txtexistingbench"  onfocus="disableautocompletion(this.id);"   onkeypress="inputNumber(event,this.value,false);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtneedbench" name="txtneedbench"  onfocus="disableautocompletion(this.id);"   onkeypress="inputNumber(event,this.value,false);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtcostforbench" name="txtcostforbench"  onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgbenchcost" id="imgbenchcost"/><input type="hidden" name="hdnimgbenchcost" id="hdnimgbenchcost"/></td>
</tr>
<tr>
<td ><strong>Desks</strong></td>
<td><input type="text" id="txtexistingdesk" name="txtexistingdesk" onfocus="disableautocompletion(this.id);"   onkeypress="inputNumber(event,this.value,false);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtneeddesk" name="txtneeddesk"  onfocus="disableautocompletion(this.id);"  onkeypress="inputNumber(event,this.value,false);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtcostfordesk" name="txtcostfordesk"  onkeypress="inputNumber(event,this.value,true);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgdeskcost" id="imgdeskcost"/><input type="hidden" name="hdnimgdeskcost" id="hdnimgdeskcost"/></td>
</tr>
<tr>
<td ><strong>Bench-Desk sets</strong></td>
<td><input type="text" id="txtexistingbenchdesk" name="txtexistingbenchdesk" onfocus="disableautocompletion(this.id);"  onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtneedbenchdesk" name="txtneedbenchdesk"  onfocus="disableautocompletion(this.id);" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtcostforbenchdesk" name="txtcostforbenchdesk" onfocus="disableautocompletion(this.id);"  onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgbenchdeskcost" id="imgbenchdeskcost"/>
<input type="hidden" name="hdnimgbenchdeskcost" id="hdnimgbenchdeskcost"/></td>
</tr>
<tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="benchimg1" name="benchimg1"  /><input type="text" id="hdnbenchimg1" name="hdnbenchimg1" readonly="readonly" /></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="benchimg2" name="benchimg2"  /><input type="text" id="hdnbenchimg2" name="hdnbenchimg2" readonly="readonly" /></td>
</tr>

</table>            </td>
        </tr>
    </table></td>
</tr>

<tr class="SDP_3" style="display:none">
<td colspan="3"><table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="56%"><strong>Does the school have adequate and safe drinking water supply?</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="42%">
      <input type="radio" name="hassafewater" value="No"/>No</td><!-- checked="checked"-->
  </tr>
  <tr id="waterfacility">
    <td colspan="3"><br />
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
          
          <tr>
            <td width="52%" ><strong>A descriptive account of the existing facility</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="46%">
			<input type="text" name="txtwaterfacility" id="txtwaterfacility" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px; width: 357px; height: 31px;" /></td>
            </tr>
          <tr>
            <td ><strong>Is the water potable (safe)?</strong></td>
            <td><strong>:</strong></td>
            <td><input type="radio" name="isportablewater" value="Yes"/>
Yes &nbsp;
<input type="radio" name="isportablewater" value="No"/>
No</td>
            </tr>
          <tr>
            <td ><strong>Estimated total cost to ensure safe and adequate drinking water supply</strong></td>
            <td><strong>:</strong></td>
            <td><input type="text" name="txtcosttomakewatersafe" id="txtcosttomakewatersafe"  onfocus="disableautocompletion(this.id);"  onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgwatersafecost" id="imgwatersafecost"/><input type="hidden" id="hdnimgwatersafecost" name="hdnimgwatersafecost"  /></td>
            </tr>
		<tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="waterfacilityimg1" name="waterfacilityimg1"  /><input type="text" id="hdnwaterfacilityimg1" name="hdnwaterfacilityimg1" readonly="readonly" /></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="waterfacilityimg2" name="waterfacilityimg2"  /><input type="text" id="hdnwaterfacilityimg2" name="hdnwaterfacilityimg2" readonly="readonly" /></td>
</tr>

      </table></td>
  </tr>
</table></td>
</tr>
<tr class="SDP_4" style="display:none">
<td colspan="3">
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td colspan="3"><strong>Does the school have Clean and Hygienic Toilet Facility:</strong>
		<input type="radio" name="hasclentoilet" value="No" />No<!-- checked="checked"-->
  	</td>
	</tr>
  <tr>
    <td colspan="3"><strong>Does the school have :</strong><br />
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
          <tr>
            <td width="44%" ><strong>Separate toilet for girls in usable* condition</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="54%"><input type="radio" name="hasgirltoilet" value="Yes"  onclick="opendiv(this.value,'girltoiletcondition')"/>Yes &nbsp;
							<input type="radio" name="hasgirltoilet" value="No"  onclick="opendiv(this.value,'girltoiletcondition')"/>No</td>
          </tr>
          <tr id="girltoiletcondition" style="display:none">
            <td colspan="3" >
            <strong>If ‘yes’,</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
                <tr>
                <td width="38%"><strong>No. of urinals</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="60%"><input type="text" name="txturinalforgirls" id="txturinalforgirls"  onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
                </tr>
                <tr>
                <td><strong>No. of toilet seats</strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" name="txttoiletforgirls" id="txttoiletforgirls"  onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
                </tr>
                </table>            </td>
            </tr>
          <tr>
            <td ><strong>Separate toilet for boys in usable* condition</strong></td>
            <td><strong>:</strong></td>
            <td><input type="radio" name="hasboytoilet" value="Yes"  onclick="opendiv(this.value,'boytoiletcondition')"/>
Yes &nbsp;
<input type="radio" name="hasboytoilet" value="No"  onclick="opendiv(this.value,'boytoiletcondition')"/>
No</td>
          </tr>
          <tr id="boytoiletcondition" style="display:none">
            <td colspan="3">
            	<strong>If ‘yes’,</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
                <tr>
                <td width="38%"><strong>No. of urinals</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="60%"><input type="text" name="txturinalforboys" id="txturinalforboys" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
                </tr>
                <tr>
                <td><strong>No. of toilet seats</strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" name="txttoiletforboys" id="txttoiletforboys" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
                </tr>
                </table>            </td>
            </tr>
          <tr>
            <td ><strong>Separate  toilet for Teachers in usable* condition</strong></td>
            <td><strong>:</strong></td>
            <td><input type="radio" name="hasteachertoilet" value="Yes" onclick="opendiv(this.value,'teachertoiletcondition')"/>
Yes &nbsp;
<input type="radio" name="hasteachertoilet" value="No" onclick="opendiv(this.value,'teachertoiletcondition')"/>
No</td>
          </tr>
          <tr id="teachertoiletcondition" style="display:none">
            <td colspan="3">
            	<strong>If ‘yes’,</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
                <tr>
                <td width="38%"><strong>No. of urinals</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="60%"><input type="text" name="txturinalforteacher" id="txturinalforteacher" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
                </tr>
                <tr>
                <td><strong>No. of toilet seats</strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" name="txttoiletforteacher" id="txttoiletforteacher"  onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
                </tr>
                </table>            </td>
            </tr>
      </table>     </td>
  </tr>
  <tr>
    <td colspan="3"><strong>In case there are no usable toilets at all or there are common toilets for boys, girls and teachers, please assess and record, separately the number of toilets to be constructed</strong><strong> :</strong><br />
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
<tr bgcolor="#f5f5f5">
<td>&nbsp;</td>
<td><strong>No. of existing toilets</strong></td>
<td><strong>No. additional units to be provided</strong></td> 
<td><strong>Estimated cost of additional toilets (Rs.)</strong></td>
</tr>
<tr>
<td><strong>Boys</strong></td>
<td><input type="text" id="txtexistingboystoilet" name="txtexistingboystoilet"  onkeypress="inputNumber(event,this.value,false);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtrequireboystoilet" name="txtrequireboystoilet"  onkeypress="inputNumber(event,this.value,false);" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td> 
<td><input type="text" id="txtboystoiletcost" name="txtboystoiletcost"    onblur="estimatetotal('toiletcost','txttotaltoiletcost')"  onkeypress="inputNumber(event,this.value,true);" class="toiletcost"   style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgboystoiletcost" id="imgboystoiletcost"/><input type="hidden" name="hdnimgboystoiletcost" id="hdnimgboystoiletcost"/>
</td>
</tr>
<tr>
<td><strong>Girls</strong></td>
<td><input type="text" id="txtexistinggirlstoilet" name="txtexistinggirlstoilet" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtrequiregirlstoilet" name="txtrequiregirlstoilet" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td> 
<td><input type="text" id="txtgirlstoiletcost" name="txtgirlstoiletcost"  onkeypress="inputNumber(event,this.value,true);" class="toiletcost"    onblur="estimatetotal('toiletcost','txttotaltoiletcost')"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imggirlstoiletcost" id="imggirlstoiletcost"/><input type="hidden" name="hdnimggirlstoiletcost" id="hdnimggirlstoiletcost"/></td>
</tr>
<tr>
<td><strong>Teacher</strong></td>
<td><input type="text" id="txtexistingteachertoilet" name="txtexistingteachertoilet" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" id="txtrequireteachertoilet" name="txtrequireteachertoilet" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td> 
<td><input type="text" id="txtteachertoiletcost" name="txtteachertoiletcost" onkeypress="inputNumber(event,this.value,true);" class="toiletcost"   onblur="estimatetotal('toiletcost','txttotaltoiletcost')"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgteachtoiletcost" id="imgteachtoiletcost"/><input type="hidden" name="hdnimgteachtoiletcost" id="hdnimgteachtoiletcost"/></td>
</tr>
<tr>
<td><strong>Total cost</strong></td>
<td colspan="3"><input type="text" id="txttotaltoiletcost" name="txttotaltoiletcost" readonly="readonly"  onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
</tr>

<tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="hygienicimg1" name="hygienicimg1"  /><input type="text" id="hdnhygienicimg1" name="hdnhygienicimg1" readonly="readonly" /></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="hygienicimg2" name="hygienicimg2"  /><input type="text" id="hdnhygienicimg2" name="hdnhygienicimg2" readonly="readonly" /></td>
</tr>


</table>     </td>
  </tr>
</table>
</td>
</tr>
<tr  class="SDP_5" style="display:none">
<td colspan="3">
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="42%"><strong>Does the school have a functioning  library with books</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="56%"><input type="radio" name="haslibrary" value="No"/>No</td><!-- checked="checked"-->
  </tr>
  <tr>
    <td><strong>Do the students use the library (ask students, in particular) : </strong></td>
    <td><strong>:</strong></td>
    <td><input type="radio" name="isstuduselibrary" value="Yes"/>
Yes &nbsp;
<input type="radio" name="isstuduselibrary" value="No"/>
No</td>
  </tr>
  <tr>
    <td><strong>Briefly describe the type of books available in the library</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" name="libbooktype" id="libbooktype" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
  </tr>
  <tr>
    <td colspan="3">
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
<tr bgcolor="#f5f5f5">
<td width="33%"><strong>Existing Number of Books</strong></td>
<td width="33%"><strong>No. of books to be provided</strong></td>
<td width="34%"><strong>Estimated Cost of setting up a useful library (Rs.)</strong></td>
</tr>
<tr>
<td><input type="text" name="libbookexisting" id="libbookexisting"  onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" name="libbookneed" id="libbookneed" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
<td><input type="text" name="libbookcost" id="libbookcost" onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  />&nbsp;<input type="file" name="imgbookcost" id="imgbookcost"/><input type="hidden" name="hdnimgbookcost" id="hdnimgbookcost"/></td>
</tr>
<tr bgcolor="#f5f5f5">
<td width="33%"><strong>Existing Number of almirah/book hangars</strong></td>
<td width="33%"><strong>No. of almirahs/book hangers to be provided</strong></td>
<td width="34%"><strong>Estimated Cost of procuring almirahs/book hangers(Rs.)</strong></td>
</tr>
<tr>
<td><input type="text" name="bookalmirahexisting" id="bookalmirahexisting"  onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
<td><input type="text" name="bookalmirahneed" id="bookalmirahneed" onkeypress="inputNumber(event,this.value,false);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
<td><input type="text" name="libalmirahcost" id="libalmirahcost" onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  />&nbsp;<input type="file" name="imgalmirahcost" id="imgalmirahcost"/><input type="hidden" name="hdnimgalmirahcost" id="hdnimgalmirahcost"/></td>
</tr>

<tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="libimg1" name="libimg1"  /><input type="text" id="hdnlibimg1" name="hdnlibimg1" readonly="readonly" /></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="libimg2" name="libimg2"  /><input type="text" id="hdnlibimg2" name="hdnlibimg2" readonly="readonly" /></td>
</tr>


</table>    </td>
    </tr>
</table></td>
</tr>
<tr class="SDP_6" style="display:none">
<td colspan="3"><table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="55%" style="height: 50px"><strong>Is the Government supplying school students uniforms and footwear free of cost</strong></td>
    <td width="2%" style="height: 50px"><strong>:</strong></td>
    <td width="43%" style="height: 50px"><input type="radio" name="isgovtprovideuniform" value="No"/>No</td><!-- checked="checked"-->
  </tr>
  <tr>
    <td><strong></strong></td>
    <td><strong>:</strong></td>
   <!-- <td><input type="text" name="reasonfornonsupplyuniform" id="reasonfornonsupplyuniform" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>-->
  </tr>
  
  <tr>
    <td colspan="3">
    <strong>Cost of supplying to each student of (classes I to VIII)</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
      <tr bgcolor="#f5f5f5">
        <td >&nbsp;</td>
        <td ><strong>No. of units </strong></td>
        <td ><strong>Cost (Rs. per unit)</strong></td>
        <td ><strong>Estimated total cost (Rs.) </strong></td>
      </tr>
	  
      <tr>
        <td ><strong>Uniforms </strong></td>
        <td ><input type="text" id="uniformunitreq" name="uniformunitreq"   onfocus="disableautocompletion(this.id);"  onkeypress="inputNumber(event,this.value,false);" class="uniform" onkeyup="calculatetotalcost('uniform','uniformtotalcost')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        <td ><input type="text" id="uniformunitcost" name="uniformunitcost"  onfocus="disableautocompletion(this.id);"   onkeypress="inputNumber(event,this.value,false);" class="uniform" onkeyup="calculatetotalcost('uniform','uniformtotalcost')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        <td ><input type="text" id="uniformtotalcost" name="uniformtotalcost" onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imguniformcost" id="imguniformcost"/>
		<input type="hidden" name="hdnimguniformcost" id="hdnimguniformcost"/></td>
      </tr>
	  
      <tr>
        <td ><strong>Footwear (2 pairs) </strong></td>
        <td ><input type="text" id="footwearunitreq" name="footwearunitreq"  onfocus="disableautocompletion(this.id);"   onkeypress="inputNumber(event,this.value,false);" class="footwear" onkeyup="calculatetotalcost('footwear','footweartotalcost')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        <td ><input type="text" id="footwearunitcost" name="footwearunitcost"  onfocus="disableautocompletion(this.id);"  onkeypress="inputNumber(event,this.value,false);" class="footwear" onkeyup="calculatetotalcost('footwear','footweartotalcost')" style="background:#ffffee; border: 1px solid #cccccc; line-height:22px"  /></td>
        <td ><input type="text" id="footweartotalcost" name="footweartotalcost" onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgfootwearcost" id="imgfootwearcost"/>
		<input type="hidden" name="hdnimgfootwearcost" id="hdnimgfootwearcost"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="uniformimg1" name="uniformimg1"  /><input type="text" id="hdnuniformimg1" name="hdnuniformimg1" readonly="readonly" /></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="uniformimg2" name="uniformimg2"  /><input type="text" id="hdnuniformimg2" name="hdnuniformimg2" readonly="readonly" /></td>
</tr>


</table></td>
</tr>
<tr class="SDP_7" style="display:none">
<td colspan="3">
	<strong>Space for Teachers :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
      
      <tr>
        <td width="55%" ><strong>Is the space/room for teachers sufficient?</strong></td>
        <td width="2%" ><strong>:</strong></td>
        <td width="43%" ><input type="radio" name="isspaceforteacher" value="No"/>No</td><!-- checked="checked"-->
        </tr>
      <tr>
        <td >&nbsp;</td>
        <td ><strong>:</strong></td>
     <!--   <td ><input type="text" id="availspacedetail" name="availspacedetail" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>-->
        </tr>
      <tr>
        <td ><strong>What are the facilities available in this space/room?</strong></td>
        <td ><strong>:</strong></td>
        <td ><input type="text" id="facilityinspaceforteacher" name="facilityinspaceforteacher" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
        </tr>
      <tr>
        <td ><strong>Estimated total cost (Rs.) of creating and equipping adequate space for teachers</strong></td>
        <td ><strong>:</strong></td>
        <td ><input type="text" id="costforprovidefacility" name="costforprovidefacility" onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgspaceprovidecost" id="imgspaceprovidecost"/>
		<input type="hidden" name="hdnimgspaceprovidecost" id="hdnimgspaceprovidecost"/>
		</td>
      </tr>
      <tr>
        <td ><strong>Estimated total cost (Rs.) of procuring facilities (tables/chairs/light/others) for teachers</strong></td>
        <td ><strong>:</strong></td>
        <td ><input type="text" id="costforprovidetable" name="costforprovidetable" onkeypress="inputNumber(event,this.value,true);"  style="background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgtablecost" id="imgtablecost"/>
		<input type="hidden" name="hdnimgtablecost" id="hdnimgtablecost"/></td>
      </tr>
	    <tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="spaceimg1" name="spaceimg1"  /><input type="text" id="hdnspaceimg1" name="hdnspaceimg1" readonly="readonly" /></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="spaceimg2" name="spaceimg2"  /><input type="text" id="hdnspaceimg2" name="hdnspaceimg2" readonly="readonly" /></td>
</tr>

    </table></td>
</tr>
<tr  class="SDP_8" style="display:none">
<td colspan="3"><table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="52%"><strong>Are indoor sports/games facilities available in the school </strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="46%"><input type="radio" name="hasindoorgamefacility" value="No"/>No</td> checked="checked"
  </tr>
  <!--<tr>
    <td><strong>If “yes”, list facilities available/to be upgraded</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="listindoorgamefacility" name="listindoorgamefacility" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>
  </tr>-->
  <tr>
    <td>&nbsp;</td>
    <td><strong>:</strong></td>
   <!-- <td><input type="text" id="reqindoorgamefacility" name="reqindoorgamefacility" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td>-->
  </tr>
  <tr>
    <td><strong>Estimated cost of Indoor sports/games facilities (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="costofindoorgamefacility" name="costofindoorgamefacility" onkeypress="inputNumber(event,this.value,true);"  style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" />&nbsp;<input type="file" name="imgindoorgamecost" id="imgindoorgamecost"/><input type="hidden" name="hdnimgindoorgamecost" id="hdnimgindoorgamecost"/></td>
  </tr>
  	    <tr>
<td><strong>Upload Image I</strong></td>
<td colspan="3"><input type="file" id="sportequipimg1" name="sportequipimg1"  /><input type="text" id="hdnsportequipimg1" name="hdnsportequipimg1" readonly="readonly" /></td>
</tr>
<tr>
<td><strong>Upload Image II</strong></td>
<td colspan="3"><input type="file" id="sportequipimg2" name="sportequipimg2"  /><input type="text" id="hdnsportequipimg2" name="hdnsportequipimg2" readonly="readonly" /></td>
</tr>

  
</table></td>
</tr>
 <!-- <tr>
    <td><strong>Total estimated cost for the school to be converted into a Happy School (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="costforhappyschool" name="costforhappyschool"  onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" onblur="totalcostforHS()"/></td>
  </tr>-->

  <tr>
    <td><strong>Total estimated cost for the school to be converted into a Happy School (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="costforhappyschool" name="costforhappyschool"  onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" onblur="totalcostforHS()"/></td>
  </tr>

  <tr>
    <td><strong>Add: Administrative Cost (Rs.) [<span style="font-size:9.0pt;line-height:107%;
font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;
color:black;mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:
AR-SA">upto maximum 5% of the Project Cost]</span></strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="administrativecost" name="administrativecost"  onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" onblur="funtotalprojectcost()"/></td>
  </tr>
  <tr>
    <td><strong>Total ProjectCost (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="totalprojectcost" name="totalprojectcost"  readonly="readonly" onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td>
  </tr>
    <tr>
    <td colspan="3"><strong>Mode of Finance</strong></td>
  </tr>

  
    <tr>
    <td colspan="3"><table>
		<tr><td><strong>(a)	Club Contribution</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="clubcontribute" name="clubcontribute" class="contribution" onkeyup="estimatetotal('contribution','Totalcontribute')" onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td></tr>
		<tr><td><strong>(b)	Contribution from other sources </strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="othercontribute" name="othercontribute"  class="contribution"  onkeyup="estimatetotal('contribution','Totalcontribute')"  onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px" /></td></tr>
		<tr><td><strong>(c) Grant Requested from RILM </strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="RILMcontribute" name="RILMcontribute"  class="contribution"  onkeyup="estimatetotal('contribution','Totalcontribute')"  onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td></tr>
			<tr><td><strong>(d) Total Contribution </strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" id="Totalcontribute" name="Totalcontribute" readonly="readonly"  onkeypress="inputNumber(event,this.value,true);" style="width:99%; background:#ffffee; border: 1px solid #cccccc; line-height:22px"/></td></tr>

	</table></td>
  </tr>

<tr>
<td colspan="3" align="center" style="border-left:1px solid #FFFFFF; border-right:1px solid #FFFFFF; border-bottom:1px solid #FFFFFF">
<input type="reset" name="btn_reset" id="btn_reset" value="Cancel" class="login" style="cursor:pointer; border-radius:3px" />
<input type="button" name="btn_submit" id="btn_submit" value="Next" class="login" style="cursor:pointer; border-radius:3px;" onclick="saveGrantApplication();" /> 
<input type="button" name="btn_back" id="btn_back" value="Back" class="login" style="cursor:pointer; border-radius:3px;" onclick="goback();" /> 
</td>
</tr>
</form>         
</table>
<form name="backfrm" id="backfrm" action="schoolInfoForm.php" method="post">
	<input type="hidden" name="hdnrefapplicationno" id="hdnrefapplicationno" value="<?php echo $refapplicationno;?>"/>

</form>  
        
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
	
	function converttonumber(val)
	{
	
	 if(isNaN(val) || val=='') 
	 return 0;
	 else
	  return val;
	
	}
	function totalcostforHS(){
	var sum=0;
     sum += parseFloat(converttonumber($('#totalcost').val()))+parseFloat(converttonumber($('#txtcostforpaint').val()))+parseFloat(converttonumber($('#txtcostforbench').val()))+parseFloat(converttonumber($('#txtcostfordesk').val()))+parseFloat(converttonumber($('#txtcostforbenchdesk').val()))+parseFloat(converttonumber($('#txtcosttomakewatersafe').val()))+parseFloat(converttonumber($('#txttotaltoiletcost').val()))+parseFloat(converttonumber($('#libbookcost').val()))+parseFloat(converttonumber($('#libalmirahcost').val()))+parseFloat(converttonumber($('#uniformtotalcost').val()))+parseFloat(converttonumber($('#footweartotalcost').val()))+parseFloat(converttonumber($('#costforprovidefacility').val()))+parseFloat(converttonumber($('#costforprovidetable').val()))+parseFloat(converttonumber($('#costofindoorgamefacility').val()));
     $('#costforhappyschool').val(sum.toFixed(2))     
//	alert(sum)
	}
	
	function validation() {
	
		if($('input[name="isneedrepair"]:checked').val()!='Yes' && $('input[name="isneedpaint"]:checked').val()!='Yes')
		{
				alert("Please choose either school need repair or need paint or both.")
				return false;
				$('#repaireimg1').focus()
		}
		if($('input[name="isneedrepair"]:checked').val()=='Yes' &&  ($('#totalcost').val()=='' || $('#totalcost').val()==0))
		{
				alert("Total cost for repairing should not be blank.")
				return false;
				$('#totalcost').focus()
		}
		
		if(($.trim($('#costforroof').val())!='' && $.trim($('#costforroof').val())!=0) && ($('#imgroofcost').val()=='' && $('#hdnimgroofcost').val()=='')) {
				alert("Please attach quotation for roof repairing.")
				return false;
				$('#imgroofcost').focus()
		}
		
		if(($.trim($('#costforfloor').val())!='' && $.trim($('#costforfloor').val())!=0) && ($('#imgfloorcost').val()=='' && $('#hdnimgfloorcost').val()=='')) {
				alert("Please attach quotation for floor repairing.")
				return false;
				$('#imgfloorcost').focus()
		}
		
		if(($.trim($('#costforwall').val())!='' && $.trim($('#costforwall').val())!=0) && ($('#imgwallcost').val()=='' && $('#hdnimgwallcost').val()=='')) {
				alert("Please attach quotation for wall repairing.")
				return false;
				$('#imgroofcost').focus()
		}
		
		if(($.trim($('#costfordoor').val())!='' && $.trim($('#costfordoor').val())!=0) && ($('#imgdoorcost').val()=='' && $('#hdnimgdoorcost').val()=='')) {
				alert("Please attach quotation for door repairing.")
				return false;
				$('#imgdoorcost').focus()
		}
		
		if($('input[name="isneedrepair"]:checked').val()=='Yes' || $('input[name="isneedpaint"]:checked').val()=='Yes')
		{
			if(($('#repaireimg1').val()=='' && $('#repaireimg2').val()=='') && ($('#hdnrepaireimg1').val()=='' && $('#hdnrepaireimg2').val()=='')) {
				alert("Please Upload at least one image which need repair.")
				return false;
				$('#repaireimg1').focus()
			}
		}
		if($('input[name="isneedpaint"]:checked').val()=='Yes' &&  $('#txtcostforpaint').val()=='')
		{
				alert("Total cost for Painting should not be blank.")
				return false;
				$('#txtcostforpaint').focus()
		}
		
	if(($.trim($('#txtcostforpaint').val())!='' && $('#txtcostforpaint').val()!=0) && ($('#imgpaintcost').val()=='' && $('#hdnimgpaintcost').val()==''))
		{
				alert("Please attach quotation for paint.")
				return false;
				$('#imgpaintcost').focus()
		}
		
		if($('input[name="hasbenches"]:checked').val()=='No')
		{
			if($('#benchimg1').val()=='' && $('#benchimg2').val()=='' && ($('#hdnbenchimg1').val()=='' && $('#hdnbenchimg2').val()=='')) {
				alert("Please Upload at least one image for condition of benches.")
				return false;
				$('#benchimg1').focus()
			}
			
			if(($.trim($('#txtcostforbench').val())=='' || $.trim($('#txtcostforbench').val())==0) && ($.trim($('#txtcostfordesk').val())=='' ||  $.trim($('#txtcostfordesk').val())==0) && ($.trim($('#txtcostforbenchdesk').val())=='' || $.trim($('#txtcostforbenchdesk').val())==0))
			{
				alert("Please enter cost for required bench,desk or both.")
				return false;
				$('#txtcostforbench').focus()
			}
			
			if(($.trim($('#txtcostforbench').val())!='' && $.trim($('#txtcostforbench').val())!=0) &&  ($('#imgbenchcost').val()=='' && $('#hdnimgbenchcost').val()==''))
			{
				alert("Please attach quotation for required bench.")
				return false;
				$('#imgbenchcost').focus()
			}
			if(($.trim($('#txtcostfordesk').val())!='' && $.trim($('#txtcostfordesk').val())!=0)  &&  ($('#imgdeskcost').val()=='' && $('#hdnimgdeskcost').val()==''))
			{
				alert("Please attach quotation for required desk.")
				return false;
				$('#imgdeskcost').focus()
			}
			
			if(($.trim($('#txtcostforbenchdesk').val())!='' && $.trim($('#txtcostforbenchdesk').val())!=0) &&  ($('#imgbenchdeskcost').val()=='' && $('#hdnimgbenchdeskcost').val()==''))
			{
				alert("Please attach quotation for required bench and desk.")
				return false;
				$('#imgbenchdeskcost').focus()
			}
			
			
		}
		if($('input[name="hassafewater"]:checked').val()=='No')
		{
			if($.trim($('#txtcosttomakewatersafe').val())=='' || $.trim($('#txtcosttomakewatersafe').val())==0)
			{
				alert("Please enter cost for make water safe.")
				return false;
				$('#txtcosttomakewatersafe').focus()
			}
			if(($.trim($('#txtcosttomakewatersafe').val())!='' && $.trim($('#txtcosttomakewatersafe').val())!=0) && ($('#imgwatersafecost').val()=='' && $('#hdnimgwatersafecost').val()==''))
			{
				alert("Please attach quotation for make water safe.")
				return false;
				$('#imgwatersafecost').focus()
			}
		
			if($('#waterfacilityimg1').val()=='' && $('#waterfacilityimg2').val()=='' && ($('#hdnwaterfacilityimg1').val()=='' && $('#hdnwaterfacilityimg2').val()=='')) {
				alert("Please Upload at least one image of water facility.")
				return false;
				$('#waterfacilityimg1').focus()
			}
			
			
		}
		if($('input[name="hasclentoilet"]:checked').val()=='No')
		{
			if(($.trim($('#txtboystoiletcost').val())=='' || $('#txtboystoiletcost').val()==0) && ($.trim($('#txtgirlstoiletcost').val())=='' ||  $('#txtgirlstoiletcost').val()==0) && ($.trim($('#txtteachertoiletcost').val())=='' || $('#txtteachertoiletcost').val()==0))
			{
				alert("Please enter cost for hygienic toilet condition.")
				return false;
				$('#txtcostforbench').focus()
			}

		
			if($.trim($('#txttotaltoiletcost').val())=='' || $.trim($('#txttotaltoiletcost').val())==0) {
				alert("Toilet maintenance cost should not be blank.")
				return false;
				$('#txttotaltoiletcost').focus()
			}
			
			if(($.trim($('#txtboystoiletcost').val())!='' && $.trim($('#txtboystoiletcost').val())!=0) && ($('#imgboystoiletcost').val()=='' && $('#hdnimgboystoiletcost').val()=='')) {
				alert("Please attach quotation for boy's toilet.")
				return false;
				$('#imgboystoiletcost').focus()
			}
		
			if(($.trim($('#txtgirlstoiletcost').val())!='' && $.trim($('#txtgirlstoiletcost').val())!=0) && ($('#imggirlstoiletcost').val()=='' && $('#hdnimggirlstoiletcost').val()=='')) {
				alert("Please attach quotation for girl's toilet.")
				return false;
				$('#imggirlstoiletcost').focus()
			}
			if(($.trim($('#txtteachertoiletcost').val())!='' && $.trim($('#txtteachertoiletcost').val())!=0) && ($('#imgteachtoiletcost').val()=='' && $('#hdnimgteachtoiletcost').val()=='')) {
				alert("Please attach quotation for teacher's toilet.")
				return false;
				$('#imggirlstoiletcost').focus()
			}
			if($('#hygienicimg1').val()=='' && $('#hygienicimg2').val()=='' && ($('#hdnhygienicimg1').val()=='' && $('#hdnhygienicimg2').val()=='')) {
				alert("Please Upload at least one image for showing hygienic condition of school.")
				return false;
				$('#hygienicimg1').focus()
			}
			
		}
		if($('input[name="haslibrary"]:checked').val()=='No')
		{
			if(($.trim($('#libbookcost').val())=='' || $('#libbookcost').val()==0) && ($.trim($('#libalmirahcost').val())=='' ||  $('#libalmirahcost').val()==0))
			{
				alert("Please enter cost for book or almirah in library.")
				return false;
				$('#txtcostforbench').focus()
			}
		if(($.trim($('#libbookcost').val())!='' && $.trim($('#libbookcost').val())!=0) && ($('#imgbookcost').val()=='' && $('#hdnimgbookcost').val()=='')) {
				alert("Please attach quotation for book in library.")
				return false;
				$('#imgbookcost').focus()
			}
			
			if(($.trim($('#libalmirahcost').val())!='' && $.trim($('#libalmirahcost').val())!=0) && ($('#imgalmirahcost').val()=='' && $('#hdnimgalmirahcost').val()=='')) {
				alert("Please attach quotation for almirah in library.")
				return false;
				$('#imgalmirahcost').focus()
			}
		
			if($('#libimg1').val()=='' && $('#libimg2').val()=='' && ($('#hdnlibimg1').val()=='' && $('#hdnlibimg2').val()=='')) {
				alert("Please Upload at least one image of library.")
				return false;
				$('#libimg1').focus()
			}
		}
		
		if($('input[name="isgovtprovideuniform"]:checked').val()=='No')
		{
		
			if(($.trim($('#uniformtotalcost').val())=='' || $('#uniformtotalcost').val()==0) && ($.trim($('#footweartotalcost').val())=='' ||  $('#footweartotalcost').val()==0))
			{
				alert("Please enter cost for uniform or footwear.")
				return false;
			}
			
			if(($.trim($('#uniformtotalcost').val())!='' && $.trim($('#uniformtotalcost').val())!=0) && ($('#imguniformcost').val()=='' && $('#hdnimguniformcost').val()=='')) {
				alert("Please attach quotation to provide univorm.")
				return false;
				$('#imguniformcost').focus()
			}
			if(($.trim($('#footweartotalcost').val())!='' && $.trim($('#footweartotalcost').val())!=0) && ($('#imgfootwearcost').val()=='' && $('#hdnimgfootwearcost').val()=='')) {
				alert("Please attach quotation to provide univorm.")
				return false;
				$('#imgfootwearcost').focus()
			}
			
			if($('#uniformimg1').val()=='' && $('#uniformimg2').val()=='' && ($('#hdnuniformimg1').val()=='' && $('#hdnuniformimg2').val()=='')) {
				alert("Please Upload at least one image for need of uniform.")
				return false;
				$('#uniformimg1').focus()
			}
		}
		
		
		if($('input[name="isspaceforteacher"]:checked').val()=='No')
		{
			if(($.trim($('#costforprovidefacility').val())=='' || $('#costforprovidefacility').val()==0) && ($.trim($('#costforprovidetable').val())=='' ||  $('#costforprovidetable').val()==0))
			{
				alert("Please enter cost for provide facility or provide table.")
				return false;
			}

			if(($.trim($('#costforprovidefacility').val())!='' && $.trim($('#costforprovidefacility').val())!=0) && ($('#imgspaceprovidecost').val()=='' && $('#hdnimgspaceprovidecost').val()=='')) {
				alert("Please attach quotation to provide space facility.")
				return false;
				$('#imgspaceprovidecost').focus()
			}
			
			if(($.trim($('#costforprovidetable').val())!='' && $.trim($('#costforprovidetable').val())!=0 ) && ($('#imgtablecost').val()=='' && $('#hdnimgtablecost').val()=='')) {
				alert("Please attach quotation to provide table.")
				return false;
				$('#imgtablecost').focus()
			}
		
			if($('#spaceimg1').val()=='' && $('#spaceimg2').val()=='' && ($('#hdnspaceimg1').val()=='' && $('#hdnspaceimg2').val()=='')) {
				alert("Please Upload at least one image for teacher space.")
				return false;
				$('#spaceimg1').focus()
			}
		}
		
		if($('input[name="hasindoorgamefacility"]:checked').val()=='No')
		{
			if(($.trim($('#costofindoorgamefacility').val())=='' || $('#costofindoorgamefacility').val()==0))
			{
				alert("Please enter cost for indoor game facility.")
				return false;
			}
		
			if(($.trim($('#costofindoorgamefacility').val())!='' && $.trim($('#costofindoorgamefacility').val())!=0) && ($('#imgindoorgamecost').val()=='' && $('#hdnimgindoorgamecost').val()=='')) {
				alert("Please attach quotation to provide indoor game facility.")
				return false;
				$('#imgindoorgamecost').focus()
			}
			
			if($('#sportequipimg1').val()=='' && $('#sportequipimg2').val()=='' && ($('#hdnsportequipimg1').val()=='' && $('#hdnsportequipimg2').val()=='')) {
				alert("Please Upload at least one image for game facility.")
				return false;
				$('#sportequipimg1').focus()
			}
		}
		if($.trim($('#costforhappyschool').val())=='' ||  isNaN($('#costforhappyschool').val()) ) {
		alert("Total cost for making Happy School should not be blank.")
		return false;
		$('#costforhappyschool').focus()
		}
		if($.trim($('#administrativecost').val())=='' ||   isNaN($('#administrativecost').val())) {
		alert("please enter administrative cost.")
		return false;
		$('#administrativecost').focus()
		}
		if($.trim($('#clubcontribute').val())==''  || $.trim($('#clubcontribute').val())==0 ||  isNaN($('#clubcontribute').val())) {
		alert("please enter contribution of club.")
		return false;
		$('#clubcontribute').focus()
		}
		if($.trim($('#othercontribute').val())=='' || $.trim($('#othercontribute').val())==0 ||  isNaN($('#othercontribute').val())) {
		alert("please enter contribution from other.")
		return false;
		$('#othercontribute').focus()
		}
		if($.trim($('#RILMcontribute').val())==''  || $.trim($('#RILMcontribute').val())==0 ||  isNaN($('#RILMcontribute').val())) {
		alert("please enter Grant Requested from RILM .")
		return false;
		$('#RILMcontribute').focus()
		}
		
		//if(!isNaN(($('#totalprojectcost').val()) && !isNaN($('#Totalcontribute').val()) ) {
			if($.trim($('#totalprojectcost').val())!=$.trim($('#Totalcontribute').val()) ) {
			alert("Total project cost and total contribution must be same.")
			return false;
			}
		//}
		
		return true;
	
	}
	
	function funtotalprojectcost(){
		estimatetotal('repaircost','totalcost'),
		estimatetotal('toiletcost','txttotaltoiletcost')
		totalcostforHS();
		
		var projectcost = parseFloat(converttonumber($('#administrativecost').val()))+parseFloat(converttonumber($('#costforhappyschool').val()))
	 $('#totalprojectcost').val(projectcost.toFixed(2))
	}

function saveGrantApplication() {
		if(!validation()){
			return false;
		}
		funtotalprojectcost()
			$("#frmgrantapp2").submit()
	}

	
	function goback()
	{
	$("#backfrm").submit();
	}
	
</script>


</body>
</html>






