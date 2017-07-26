
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

 <link rel="stylesheet" type="text/css" href="js/jquery.datepick.css"> 
  
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
  
  <script type="text/javascript">


/*function slideSwitch() {
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
*/

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


function changetoword(amountval,displaycntrl) {
    var junkVal=amountval;
    junkVal=Math.floor(junkVal);
    var obStr=new String(junkVal);
    numReversed=obStr.split("");
    actnumber=numReversed.reverse();

    if(Number(junkVal) >=0){
        //do nothing
    }
    else{
        alert('wrong Number cannot be converted');
        return false;
    }
    if(Number(junkVal)==0){
        //document.getElementById(displaycntrl).value=obStr+''+'Rupees Zero Only';
		 document.getElementById(displaycntrl).value='';
        return false;
    }
    if(actnumber.length>9){
        alert('Oops!!!! the Number is too big to covertes');
        return false;
    }

    var iWords=["Zero", " One", " Two", " Three", " Four", " Five", " Six", " Seven", " Eight", " Nine"];
    var ePlace=['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
    var tensPlace=['dummy', ' Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety' ];

    var iWordsLength=numReversed.length;
    var totalWords="";
    var inWords=new Array();
    var finalWord="";
    j=0;
    for(i=0; i<iWordsLength; i++){
        switch(i)
        {
        case 0:
            if(actnumber[i]==0 || actnumber[i+1]==1 ) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            inWords[j]=inWords[j]+' Only';
            break;
        case 1:
            tens_complication();
            break;
        case 2:
            if(actnumber[i]==0) {
                inWords[j]='';
            }
            else if(actnumber[i-1]!=0 && actnumber[i-2]!=0) {
                inWords[j]=iWords[actnumber[i]]+' Hundred and';
            }
            else {
                inWords[j]=iWords[actnumber[i]]+' Hundred';
            }
            break;
        case 3:
            if(actnumber[i]==0 || actnumber[i+1]==1) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                inWords[j]=inWords[j]+" Thousand";
            }
            break;
        case 4:
            tens_complication();
            break;
        case 5:
            if(actnumber[i]==0 || actnumber[i+1]==1) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                inWords[j]=inWords[j]+" Lakh";
            }
            break;
        case 6:
            tens_complication();
            break;
        case 7:
            if(actnumber[i]==0 || actnumber[i+1]==1 ){
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            inWords[j]=inWords[j]+" Crore";
            break;
        case 8:
            tens_complication();
            break;
        default:
            break;
        }
        j++;
    }

    function tens_complication() {
        if(actnumber[i]==0) {
            inWords[j]='';
        }
        else if(actnumber[i]==1) {
            inWords[j]=ePlace[actnumber[i-1]];
        }
        else {
            inWords[j]=tensPlace[actnumber[i]];
        }
    }
    inWords.reverse();
    for(i=0; i<inWords.length; i++) {
        finalWord+=inWords[i];
    }
    document.getElementById(displaycntrl).value=finalWord;
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
			$("#txtRotClubName").empty();
			$("#txtRotClubName").append(str);			 
		}
	});
}
function displayfee(val) 
{
/*$('#regisfeetr').show();
$('#feefor').html('For '+val);*/
var currentdt= new Date();
var dateVar1 = "2014-12-31";
var dateVar2 = "2015-01-15";
var dateVar3 = "2015-01-31";

var dsplit1 = dateVar1.split("-");
var dt1=new Date(dsplit1[0],dsplit1[1]-1,dsplit1[2]);	
var dsplit2 = dateVar2.split("-");
var dt2=new Date(dsplit2[0],dsplit2[1]-1,dsplit2[2]);

var dsplit3 = dateVar3.split("-");
var dt3=new Date(dsplit3[0],dsplit3[1]-1,dsplit3[2]);
	//rotdaterange,rotregistrationfee
	if(val=='Rotarian'){
		if(currentdt<=dt2){
		$('#rotregistrationfee').val(6000);
		//$('#rotdaterange').html('Upto 15 Dec, 2015');
		}
		else if(currentdt>dt2 || currentdt<=dt3 ){
		$('#rotregistrationfee').val(7000);
		//$('#rotdaterange').html('16 Jan to 31 Jan, 2015');
		}
		else if(currentdt>dt3){
		$('#rotregistrationfee').val(8000);
		//$('#rotdaterange').html('After 31 Jan, 2015');
		}
	
	}
	if(val=='Guest'){
		if(currentdt<=dt2){
		$('#guestregistrationfee').val(6000);
		//$('#guestdaterange').html('Upto 15 Dec, 2015');
		}
		else if(currentdt>dt2 || currentdt<=dt3 ){
		$('#guestregistrationfee').val(7000);
		//$('#guestdaterange').html('16 Jan to 31 Jan, 2015');
		}
		else if(currentdt>dt3){
		$('#guestregistrationfee').val(8000);
		//$('#guestdaterange').html('After 31 Jan, 2015');
		}
	
	}
	
		if(val=='IWM'){
		var selectedcateg =$('input[name=txtcategbelong]:checked').val();
		if(selectedcateg=='Rotaractor') {
			if(currentdt<=dt2){
			$('#IWMregistrationfee').val(2500);
			//$('#IWMdaterange').html('Upto 15 Dec, 2015');
			}
			else if(currentdt>dt2 || currentdt<=dt3 ){
			$('#IWMregistrationfee').val(2750);
			//$('#IWMdaterange').html('16 Jan to 31 Jan, 2015');
			}
			else if(currentdt>dt3){
			$('#IWMregistrationfee').val(3000);
			//$('#IWMdaterange').html('After 31 Jan, 2015');
			}
		}
		else if(selectedcateg=='Inner Wheel Member') 
		{
			if(currentdt<=dt2){
			$('#IWMregistrationfee').val(4000);
			//$('#IWMdaterange').html('Upto 15 Dec, 2015');
			}
			else if(currentdt>dt2 || currentdt<=dt3 ){
			$('#IWMregistrationfee').val(7000);
			//$('#IWMdaterange').html('16 Jan to 31 Jan, 2015');
			}
			else if(currentdt>dt3){
			$('#IWMregistrationfee').val(8000);
			//$('#IWMdaterange').html('After 31 Jan, 2015');
			}
		}
		else if(selectedcateg=='Spouse') 
		{
			if(currentdt<=dt2){
			$('#IWMregistrationfee').val(3500);
			//$('#IWMdaterange').html('Upto 15 Jan, 2015');
			}
			else if(currentdt>dt2 || currentdt<=dt3 ){
			$('#IWMregistrationfee').val(7000);
			//$('#IWMdaterange').html('16 Jan to 31 Jan, 2015');
			}
			else if(currentdt>dt3){
			$('#IWMregistrationfee').val(8000);
			//$('#IWMdaterange').html('After 31 Jan, 2015');
			}
		}
		else
		{
			$('#IWMregistrationfee').val('');
			//$('#IWMdaterange').html('');

		
		}
	}
	//calculatetotalregisfee();

	}

function calculatetotalregisfee(resfee,noofdelegates,displayid) {
        var multiple = 1;
	var regisfee = parseFloat($('#'+resfee).val())
	var noofdelegate  =  parseInt($('#'+noofdelegates).val())
	
	if(!isNaN(regisfee) && !isNaN(noofdelegate)) {
	
                multiple *= (regisfee*noofdelegate);
	$('#'+displayid).val(multiple);
		
            }
			
			displaygrandtotal();
}
function displaygrandtotal() {
var totalsum = 0;
var rottotal =parseInt($("#txtrotTotal").val());
if(!isNaN(rottotal))
totalsum +=rottotal;

var IWMTotal =parseInt($("#txtIWMTotal").val()); 
if(!isNaN(IWMTotal))
totalsum +=IWMTotal;


var guestTotal =parseInt($("#txtguestTotal").val());
if(!isNaN(guestTotal))
totalsum +=guestTotal;
$("#Totalregfee").val(totalsum);
changetoword(totalsum,'txtTotalinwords'); 
changetoword(totalsum,'txttoaltpay')
}

function changeDistrict(val) {

	if(val=='Rotarian') {
		$('#Rotariantr').toggle();
		if($('input[name=txtbelong1]:checked').length<=0){
			$('#Rotariantr').find('input:text').each(
            function() {
                $(this).val('');
            });
			}
	}
	if(val=='IWM') {
	$('#IWMtr').toggle();
	if($('input[name=txtbelong2]:checked').length<=0){
			$('#IWMtr').find('input:text').each(
            function() {
                $(this).val('');
            });
			}
	}
	if(val=='Guest') {
	$('#othertr').toggle();
	if($('input[name=txtbelong3]:checked').length<=0){
			$('#othertr').find('input:text').each(
            function() {
                $(this).val('');
            });
			}
	}

displayfee(val);
}

</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
.auto-style1 {
	color: #FF0000;
}
.auto-style2 {
	font-size: medium;
}
</style>

</head>

<body onload="districtlist()">
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
                                       	  <h1 style="padding:0; margin:0">Online Registration for 
										  Rotary South Asia Literacy Summit, 
										  2015</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
<form name="frmSALregistration" id="frmSALregistration" action="SaveSALregistration.php" method="post" enctype="multipart/form-data">
<tr>
    <td style="color:#0099FF">
        <strong>1. <input type="checkbox" name="txtbelong1" id="txtbelong1" value="Rotarian" onclick="changeDistrict(this.value)"/>Rotarian</strong></td>
</tr>
<tr id="Rotariantr" style="display:none;">
	<td>
        <table width="100%" border="0" bordercolor="#cccccc" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse; border:1px solid #CCCCCC; background:#f5f5f5">
            <tr>
                <td width="12%"><strong>First Name<span style="color:#ff0000">*</span></strong></td>
                <td width="2%"><strong>:</strong></td>
                <td colspan="4"><input type="text" id="txtrotarianname" name="txtrotarianname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>Family Name<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td colspan="4"><input type="text" id="txtrotfamilyname" name="txtrotfamilyname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>R.I. District<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td width="53%">
                    <select id='txtRotDistrict' name='txtRotDistrict'  onchange='dispclub(this.value)'>
                        <option value="">Select</option>
                    </select>                </td>
                <td width="9%"><strong>Club <span style="color:#ff0000">*</span></strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="22%"><select id="txtRotClubName" name="txtRotClubName"><option value="">Select</option></select> </td>
            </tr>
            <tr>
                <td><strong>Call Name<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td colspan="4"><input type="text" id="txtrotariancallaname" name="txtrotariancallaname" style="width:60%"/> </td>
                </tr>
            <tr>
                <td><strong>Classification<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td colspan="4"><input type="text" id="txtclassification" name="txtclassification" style="width:60%"/> </td>
                </tr>
            <tr style="background-color:#e0e0e0">
                <td colspan="6"><strong>Position Held <span class="auto-style1">[Click Only One]</span> : </strong></td>
            </tr>
            <tr>
                <td  colspan="6">
                    <input type="checkbox" name="positionheld[]" value="Rotarian"/>Rotarian &nbsp;
                    <input type="checkbox" name="positionheld[]" value="Club President"/>Club President &nbsp;
                    <input type="checkbox" name="positionheld[]" value="CLCC"/>CLCC &nbsp;
                    <input type="checkbox" name="positionheld[]" value="DLCC"/>DLCC &nbsp;
                    <input type="checkbox" name="positionheld[]" value="DL Team"/>DL Team &nbsp;
                    <input type="checkbox" name="positionheld[]" value="DG"/>DG &nbsp; 
                    <input type="checkbox" name="positionheld[]" value="DGE"/>DGE &nbsp;
                    <input type="checkbox" name="positionheld[]" value="DGN"/>DGN &nbsp;
                    <input type="checkbox" name="positionheld[]" value="PDG"/>PDG &nbsp;
                    <input type="checkbox" name="positionheld[]" value="PP"/>PP &nbsp;
                    <input type="checkbox" name="positionheld[]" value="RILM - NCM"/>RILM - NCM 
                    <input type="checkbox" name="positionheld[]" value="Other"/>Other&nbsp;                </td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><strong>:</strong></td>
                <td colspan="4"><input type="text" id='txtRotAddr' name='txtRotAddr' size="70" style="width:99%"/></td>
                </tr>
            <tr>
                <td><strong>City<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" id='txtRotcity' name='txtRotcity'  style="width:60%"/></td>
                <td><strong>State<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" id='txtRotstate' name='txtRotstate' style="width:60%" /></td>
            </tr>
            <tr>
                <td><strong>Pin<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" id='txtRotpin' name='txtRotpin' maxlength="6"  onKeyPress="inputNumber(event,this.value,false);"  style="width:60%"/></td>
                <td><strong>Country<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" id='txtRotcountry' name='txtRotcountry' style="width:60%" /></td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" id='txtRotphone' name='txtRotphone' maxlength="12"  onKeyPress="inputNumber(event,this.value,false);" style="width:60%"/></td>
            <td><strong>Mobile<span style="color:#ff0000">*</span></strong></td>
            <td><strong>:</strong></td>
            <td><input type="text" id='txtRotmob' name='txtRotmob' maxlength="12"  onKeyPress="inputNumber(event,this.value,false);" style="width:60%"/></td>
            </tr>
            <tr>
                <td><strong>Email<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" id='txtRotemail' name='txtRotemail'  style="width:80%"/></td>
                <td colspan="3"><input type="radio"  name='rotfoodhabit' value="Veg"/>
                  Veg.&nbsp;
                  <input type="radio"  name='rotfoodhabit' value="Non Veg"/>
                  Non Veg.</td>
            </tr>
            <tr>
                <td colspan="6"  style=" border:#999999 1px solid">
                    <table width="100%" border="1" bordercolor="#cccccc" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse">
                        <tr>
                            <td colspan="4" style="text-align:center; font-weight:bold; color:#000000; text-transform:uppercase; background:#e0e0e0">Registration Fees <span id="feefor"></span></td>
                        </tr>
                        <tr>
                            <td width="14%"><strong><span id="rotdaterange">&nbsp;</span></strong></td>
                            <td width="18%"><input type="text" id="rotregistrationfee" name="rotregistrationfee" readonly="readonly" style="width:70%"/></td>
                            <td width="51%">
                                <strong>No. of Delegates Registered :</strong> <em>(Please Enter "1")</em> <input type="text" name="rotnoofdelegate" id="rotnoofdelegate" onblur="calculatetotalregisfee('rotregistrationfee','rotnoofdelegate','txtrotTotal')" onKeyPress="inputNumber(event,this.value,false);"  />                            </td>
                            <td width="17%"><strong>Total :</strong> <input type="text" name="txtrotTotal" id="txtrotTotal" readonly="readonly"  onKeyPress="inputNumber(event,this.value,false);" style="width:65%" /></td>
                        </tr>
                    </table>                </td>
            </tr>
        </table>	</td>
</tr>

<tr height="5"><td></td></tr>

<tr>
    <td style="color:#0099FF">
        <strong>2.<input type="checkbox" name="txtbelong2" id="txtbelong2" value="IWM" onclick="changeDistrict(this.value)"/>Inner Wheel Member, Rotaractor, Spouse</strong></td>
</tr>
<tr id="IWMtr" style="display:none;">
    <td>
        <table width="100%" border="0" bordercolor="#cccccc" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse; border:1px solid #CCCCCC; background:#f5f5f5">
            <tr>
                <td colspan="4"><strong>Category : </strong>
                    <input type="radio" name="txtcategbelong" value="Inner Wheel Member" onclick="displayfee('IWM')"/>Inner Wheel Member &nbsp;
                    <input type="radio" name="txtcategbelong" value="Rotaractor" onclick="displayfee('IWM')"/>Rotaractor &nbsp; 
                    <input type="radio" name="txtcategbelong" value="Spouse" onclick="displayfee('IWM')"/>Spouse&nbsp;                </td>
            </tr>						
            <tr>
                <td width="12%"><strong>First Name<span style="color:#ff0000">*</span></strong></td>
                <td width="2%"><strong>:</strong></td>
                <td colspan="2"><input type="text" id="txtIWMfirstname" name="txtIWMfirstname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>Family Name<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><input type="text" id="txtIWMfamilyname" name="txtIWMfamilyname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>Call Name<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><input type="text" id="txtIWMcallname" name="txtIWMcallname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>R.I. / I.W. District</strong></td>
                <td><strong>:</strong></td>
                <td width="42%"><input type="text" id="txtIWMdistrict" name="txtIWMdistrict" style="width:99%"/></td>
                <td width="44%"><strong>Club / City :</strong> <input type="text" id="txtIWMclubname" name="txtIWMclubname"/> </td>
            </tr>
            <tr>
                <td><strong>Country</strong></td>
                <td><strong>:</strong></td>
                <td><input type="text" id="txtIWMcountry" name="txtIWMcountry" style="width:60%"/></td>
                <td><input type="radio"  name="IWMfoodhabit" value="Veg"/> Veg. &nbsp; <input type="radio"  name="IWMfoodhabit" value="Non Veg"/> Non Veg.</td>
            </tr>
            <tr>
                <td colspan="4" style=" border:#999999 1px solid">
                    <table width="100%" border="1" bordercolor="#cccccc" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse">
                        <tr>
                            <td colspan="4" style="text-align:center; font-weight:bold; color:#000000; text-transform:uppercase; background:#e0e0e0">Registration Fees <span id="feefor"></span></td>
                        </tr>
                        <tr>
                          <td width="14%"><span id="IWMdaterange">&nbsp;</span></td>
                            <td width="18%"><input type="text" id="IWMregistrationfee" name="IWMregistrationfee" readonly="readonly"  style="width:70%"/></td>
                            <td width="51%"><strong>No. of Delegates Registered : </strong> <em>(Please Enter "1")</em> <input type="text" name="IWMnoofdelegate" id="IWMnoofdelegate" onblur="calculatetotalregisfee('IWMregistrationfee','IWMnoofdelegate','txtIWMTotal')"   onKeyPress="inputNumber(event,this.value,false);" /></td>
                            <td width="17%"><strong>Total :</strong> <input type="text" name="txtIWMTotal" id="txtIWMTotal" readonly="readonly"  onKeyPress="inputNumber(event,this.value,false);"  style="width:65%" /></td>
                        </tr>
                    </table>                </td>
            </tr>
        </table>    </td>
</tr>

<tr height="5"><td></td></tr>

<tr>
    <td style="color:#0099FF">
        <strong>3.<input type="checkbox" name="txtbelong3" id="txtbelong3" value="Guest" onclick="changeDistrict(this.value)"/>Guest </strong>    </td>
</tr>
<tr id="othertr" style="display:none;">
    <td>
        <table width="100%" border="0" bordercolor="#cccccc" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse; border:1px solid #CCCCCC; background:#f5f5f5">
            <tr>
                <td width="12%"><strong>First Name <span style="color:#ff0000">*</span></strong></td>
                <td width="2%"><strong>:</strong></td>
                <td colspan="3"><input type="text" id="txtguestfirstname" name="txtguestfirstname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>Family Name<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td colspan="3"><input type="text" id="txtguestfamilyname" name="txtguestfamilyname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>Call Name<span style="color:#ff0000">*</span></strong></td>
                <td><strong>:</strong></td>
                <td colspan="3"><input type="text" id="txtguestcallname" name="txtguestcallname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>City</strong></td>
                <td><strong>:</strong></td>
                <td colspan="3"><input type="text" id="txtguestcityname" name="txtguestcityname" style="width:60%"/></td>
                </tr>
            <tr>
                <td><strong>Country</strong></td>
                <td><strong>:</strong></td>
                <td width="54%"><input type="text" id="txtguestcountry" name="txtguestcountry" style="width:97%"/></td>
                <td width="32%" colspan="2"><input type="radio"  name="otherguestfoodhabit" value="Veg"/> 
                  Veg. &nbsp; <input type="radio"  name="otherguestfoodhabit" value="Non Veg"/> Non Veg.</td>
            </tr>
            <tr>
                <td colspan="5">
                    <table width="100%" border="1" bordercolor="#cccccc" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse">
                        <tr>
                            <td colspan="4" style="text-align:center; font-weight:bold; color:#000000; text-transform:uppercase; background:#e0e0e0">Registration Fees <span id="feefor"></span></td>
                        </tr>
                        <tr>
                            <td width="14%"><strong><span id="guestdaterange">&nbsp;</span></strong></td>
                            <td width="18%"><input type="text" id="guestregistrationfee" name="guestregistrationfee" readonly="readonly" style="width:70%"/></td>
                            <td width="50%"><strong>No. of Delegates Registered : </strong> <em>(Please Enter "1")</em> <input type="text" name="guestnoofdelegate" id="guestnoofdelegate" onblur="calculatetotalregisfee('guestregistrationfee','guestnoofdelegate','txtguestTotal')"  onKeyPress="inputNumber(event,this.value,false);" /></td>
                            <td width="18%"><strong>Total :</strong> <input type="text" name="txtguestTotal" id="txtguestTotal" readonly="readonly"  onKeyPress="inputNumber(event,this.value,false);" style="width:65%" /></td>
                        </tr>
                    </table>                </td>
            </tr>
        </table>    </td>
</tr>

<tr height="5"><td></td></tr>

<tr>
    <td colspan="2">
        <table border="1" bordercolor="#cccccc" cellpadding="5" cellspacing="0" width="100%" align="center" style="border-collapse:collapse; text-align:left">
            <tr>
                <td colspan="6" style="text-align:center; font-weight:bold; color:#000000; text-transform:uppercase; background:#f5f5f5">Grand Total</td>
            </tr>
            <tr>
            <td width="18%">
                <strong>Registration Fees Total</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="21%"><input type="text" name="Totalregfee" id="Totalregfee"  readonly="readonly"  onkeypress="inputNumber(event,this.value,false);"/></td>
            <td width="14%"><strong>Rupees (in Words)</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="43%"><input type="text" name="txtTotalinwords" id="txtTotalinwords"  readonly="readonly" style="width:99%"/></td>
            </tr>
        </table>
	</td>
</tr>

<tr height="3"><td></td></tr>

<tr>
	<td colspan="2">
        <table border="1" bordercolor="#cccccc" cellpadding="5" cellspacing="0" width="100%" align="center" style="border-collapse:collapse; text-align:left">
            <tr>
                <td colspan="4" style="text-align:center; font-weight:bold; color:#000000; text-transform:uppercase; background:#f5f5f5" class="link">
                	<strong>Payment Detail</strong> - <a href="#a" onclick="toggle_visibility('list1');"><em><strong>Click to view Bank Detail</strong></em></a>
<style type="text/css">
a { color:#0099FF; font-weight: normal; text-decoration:none; text-decoration:underline; text-transform:none }
a:hover { color:#333333}
</style>

<script type="text/javascript">
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>
<div id="list1" style="display:none; background:#f5f5f5; padding:20px 15px; margin-top:12px; position:absolute; width:819px; border:1px solid #FFFFFF; box-shadow:0 0 5px #000000; text-align:justify; border:5px solid #ffffff">
<strong><em style="color:#CC3300">IMPORTANT :</em> The delegates are required to make online payment first to the Summit bank account before filling up the online Registration Form as below :</strong><br />
<table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="5" align="center" style="text-align:left; margin-top:7px; font-weight:bold; border-collapse:collapse; text-transform:none">
<tr bgcolor="#ffffff">
<td width="20%">Name of Account</td>
<td width="2%">:</td>
<td width="78%">Rotary South Asia Literacy Summit 2015</td>
</tr>
<tr>
<td>Name of the Bank</td>
<td>:</td>
<td>IDBI Bank</td>
</tr>
<tr bgcolor="#ffffff">
<td>IDBI Bank Branch</td>
<td>:</td>
<td>Aundh, Pune</td>
</tr>
<tr>
<td>Account Number</td>
<td>:</td>
<td>1314104000018638</td>
</tr>
<tr bgcolor="#ffffff">
<td>IFSC Code</td>
<td>:</td>
<td>IBKL0001314</td>
</tr>
</table>
</div>
                </td>
            </tr>
            <tr>
                <td width="15%"><strong>Rupees (in Words) </strong></td>
                <td width="2%"><strong>:</strong></td>
                <td colspan="2"><input type="text" name="txttoaltpay"  readonly="readonly" id="txttoaltpay" size="70" style="width:99%" /></td>
            </tr>
            <tr>
                <td><strong>Payment Mode</strong></td>
                <td><strong>:</strong></td>
                <td colspan="2"><input type="radio" name="paymode" value="Cash" checked="checked" />Cash &nbsp; <input type="radio" name="paymode" value="Bank Transfer" /> Bank Transfer &nbsp; <input type="radio" name="paymode" value="Cheque/Draft" /> Cheque/Draft</td>
            </tr>
            <tr>
                <td colspan="4">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" style="text-align:left">
                        <tr>
                            <td width="13%"><strong>Cheque/Draft No.</strong></td>
                            <td width="2%"><strong>:</strong></td>
                            <td width="21%"><input type="text" name="txtdraftno" id="txtdraftno" style="width:99%"/></td>
                            <td width="5%"><strong>Dated</strong></td>
                            <td width="2%"><strong>:</strong></td>
                            <td width="18%"><input type="text" name="txtdraftdt" id="txtdraftdt" style="width:99%" /></td>
                            <td width="8%"><strong>Drawn on</strong></td>
                            <td width="2%"><strong>:</strong></td>
                            <td width="29%"><input type="text" name="txtdrawnon" id="txtdrawnon" style="width:99%" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <strong>Transaction Id. : </strong><em>(For Cash/Bank Transfer mention Transaction ID)</em>&nbsp; <input type="text" name="txttransactionid" id="txttransactionid" style="width:55%"/>
                </td>
            </tr>
            <tr>
                <td colspan="4"><strong>Deposited Bank Name and Branch : </strong><input type="text" name="txtbankname" id="txtbankname" style="width:74%" /></td>
            </tr>
            <tr>
                <td colspan="3"><strong>Date of Deposit : </strong>        <input type="text" name="txtissuedt" id="txtissuedt" /></td>
                <td width="52%"><strong>Time of Deposit : </strong><input type="text" name="txtissuetime" id="txtissuetime" /></td>
            </tr>
            <tr>
                <td colspan="4">
                    <strong>Upload Scan copy of Deposit /  Transaction Slip : </strong><input type="file" name="txtuploadcheque" id="txtuploadcheque" style="cursor:pointer;"/>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
<td align="center">
<input type="button" name="btn_submit" id="btn_submit" value="Register" class="login" style="cursor:pointer; border-radius:3px;" onclick="saveRegistration();" title="Click to register" /> 
<input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="login" style="cursor:pointer; border-radius:3px" title="Click to cancel" /></td>
</tr>
</form>         
</table>
        
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
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>
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

	 $('#txtdraftdt,#txtdrawnon,#txtissuedt').datepick({dateFormat: 'dd-mm-yyyy'}); 

	function validation(){
	
		
		if($('input[name=txtbelong1]:checked').val()=='Rotarian')
		{
		
			if($("#txtrotarianname").val()==''){
			alert("Please Enter First Name.");
			$("#txtrotarianname").focus();
			return false;
			}

			if($("#txtrotfamilyname").val()==''){
			alert("Please Enter Family Name.");
			$("#txtrotfamilyname").focus();
			return false;
			}
			if($("#txtRotDistrict").val()==''){
			alert("Please choose district number.");
			$("#txtRotDistrict").focus();
			return false;
			}
			if($.trim($('#txtRotClubName').val())=='')
			{
			alert("Please enter club.");
			$("#txtRotClubName").focus();
			return false;
			}	
			if($("#txtrotariancallaname").val()==''){
			alert("Please Enter Call Name.");
			$("#txtrotariancallaname").focus();
			return false;
			}
			if($("#txtclassification").val()==''){
			alert("Please Enter Classification.");
			$("#txtclassification").focus();
			return false;
			}
			if($('input[name="positionheld[]"]:checked').length<=0)
			{
			alert("Please choose Position held.");
			return false;
			}
			/*if($("#txtRotAddr").val()==''){
			alert("Please Enter Address.");
			$("#txtRotAddr").focus();
			return false;
			}*/
			if($("#txtRotcity").val()==''){
			alert("Please Enter City.");
			$("#txtRotcity").focus();
			return false;
			}

			if($("#txtRotstate").val()==''){
			alert("Please Enter State.");
			$("#txtRotstate").focus();
			return false;
			}
			if($("#txtRotpin").val()==''){
			alert("Please Enter Pin.");
			$("#txtRotpin").focus();
			return false;
			}
			if($("#txtRotcountry").val()==''){
			alert("Please Enter Country.");
			$("#txtRotcountry").focus();
			return false;
			}
			if($.trim($("#txtRotmob").val())=="")
			{
			alert("Please Enter Mobile No.");
			$("#txtRotmob").focus();
			return false;
			}

			if($.trim($("#txtRotemail").val())=="")
			{
			alert("Please Enter Email.");
			$("#txtRotemail").focus();
			return false;
			}
			
			if($.trim($("#txtRotemail").val())!="")
			{
			  var expr = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			 if(!expr.test($.trim($("#txtRotemail").val())))
			 {
				alert("Invalid Email!");
				$("#txtRotemail").focus();
				return false;
			 }
			}
			if($.trim($("#rotregistrationfee").val())=="")
			{
			alert("Please Enter Registration Fee for rotarian.");
			$("#rotregistrationfee").focus();
			return false;
			}
			if($.trim($("#rotnoofdelegate").val())=="")
			{
			alert("Please Enter no. of Delegates.");
			$("#rotnoofdelegate").focus();
			return false;
			}
			
		}
		
		
	 if($('input[name=txtbelong2]:checked').val()=='IWM' )
		{
			if($('input[name=txtcategbelong]:checked').length<=0){
			alert("Please choose category.");
			return false;
			}
			
			if($("#txtIWMfirstname").val()==''){
			alert("Please Enter First Name.");
			$("#txtIWMfirstname").focus();
			return false;
			}
	
		if($("#txtIWMfamilyname").val()==''){
			alert("Please Enter Family Name.");
			$("#txtIWMfamilyname").focus();
			return false;
			}
		if($("#txtIWMcallname").val()==''){
			alert("Please Enter Call Name.");
			$("#txtIWMcallname").focus();
			return false;
			} 
			if($("#IWMregistrationfee").val()==''){
			alert("Please Enter Registration Fee.");
			$("#IWMregistrationfee").focus();
			return false;
			}
			if($("#IWMnoofdelegate").val()==''){
			alert("Please Enter No. of Delegates.");
			$("#IWMnoofdelegate").focus();
			return false;
			}
		}	

	 if($('input[name=txtbelong3]:checked').val()=='Guest' ) {
			
			if($("#txtguestfirstname").val()==''){
			alert("Please Enter First Name.");
			$("#txtguestfirstname").focus();
			return false;
			}
	
			if($("#txtguestfamilyname").val()==''){
			alert("Please Enter Family Name.");
			$("#txtguestfamilyname").focus();
			return false;
			}
			if($("#txtguestcallname").val()==''){
			alert("Please Enter Call Name.");
			$("#txtguestcallname").focus();
			return false;
			} 
			if($("#guestregistrationfee").val()==''){
			alert("Please Enter Registration Fee for Guest.");
			$("#IWMregistrationfee").focus();
			return false;
			}
			if($("#guestnoofdelegate").val()==''){
			alert("Please Enter No. of Delegates for Guest.");
			$("#guestnoofdelegate").focus();
			return false;
			}	

		}

			if($("#Totalregfee").val()==''){
			alert("Please enter total amount of payment");
			$("#Totalregfee").focus();
			return false;
			}
				/*if($("#txtdraftno").val()==''){
			alert("Please Enter Cheque/Draft No.");
			$("#txtdraftno").focus();
			return false;
			}
				if($("#txtdraftdt").val()==''){
			alert("Please enter Date");
			$("#txtdraftdt").focus();
			return false;
			}	

			if($('input[name=paymode]:checked').length<=0)
			{
			alert("Please choose mode of payment.");
			return false;
			}
	
			
				if($("#txttransactionid").val()==''){
			alert("Please enter Transaction Id.");
			$("#txttransactionid").focus();
			return false;
			}
				
				if($("#txtdrawnon").val()==''){
			alert("Please enter Drawn On.");
			$("#txtdrawnon").focus();
			return false;
			}
				if($("#txtbankname").val()==''){
			alert("Please enter Bank Name and Branch.");
			$("#txtbankname").focus();
			return false;
			}
			
				
				if($("#txtissuedt").val()==''){
			alert("Please enter Issue date.");
			$("#txtissuedt").focus();
			return false;
			}	
				if($("#txtissuetime").val()==''){
			alert("Please enter Issue time.");
			$("#txtissuetime").focus();
			return false;
			}	
			*/	
				
	
		displaygrandtotal();
		
		return true;
	}
	function saveRegistration(){
		if(!validation()) {
			return false;
		}
		
		$("#frmSALregistration").submit();
	}
	
</script>


</body>
</html>






