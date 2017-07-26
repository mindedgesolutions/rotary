<?php
include("connection.php");
$msg="";

	
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




if(isset($_POST["btn_submit"]))
{
$orderarr = array('DG'=>1,'DGE'=>2,'DGN'=>3,'DGND'=>4,'DLCC'=>5,'T-Subcommittee Chairman'=>6,'E-Subcommittee Chairman'=>7,'A-Subcommittee Chairman'=>8,'C-Subcommittee Chairman'=>9,'H-Subcommittee Chairman'=>10,'Volunteer Management Committee Chairman'=>11,'Fund Raising Committee Chairman'=>12,'Public Relations Committee Chairman'=>13,'District Communication Officer'=>14,'Other'=>15);
$district =$_POST["cbodistrict"];
$cborole = $_POST["chorole"];

if($cborole=="Other")
$role = $_POST["txtrole"];
else
$role = $cborole;

foreach($orderarr as $orderkey=>$orderval)
{
	if($cborole==$orderkey)
	{
		$order = $orderval;
	}
}

$name = $_POST["txtname"];
$contact = $_POST["txtcontact"];
$email = $_POST["txtemail"];

$img= $_FILES["txtimage"]["name"];
$newimg ="";
//die($query);

if($img!='')  { 
	$newimg = FileNewname($img,'Photo');	 
	if($_FILES["txtimage"]["error"]==0 ) {
		 move_uploaded_file($_FILES["txtimage"]["tmp_name"], "upload/" . $newimg);
		 }
	 }

if($_POST["hdnInfomode"]>0) {
$query  = "Update info set  name='".$name."', mobNo='".$contact."', email='".$email."', if($newimg='',image=image,image='".$newimg."') where id=".$_POST["hdnInfomode"]." ;";

}
else
{
	
	
$query  = "INSERT INTO info(district, role, name, mobNo, email, image,serialorder) VALUES ('".$district."','".$role."','".$name."','".$contact."','".$email."','".$newimg."',".$order.");";
	
}

//die($query);
		if(mysqli_query($link,$query))
		{
		$msg = "Thank You";
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


function validation() {
	
	if($.trim($("#cbodistrict").val())==''){
		alert("Please Choose district.");
		$("#cbodistrict").focus();
		return false;
	}
	
	if($.trim($("#chorole").val())==''){
		alert("Please Choose Role.");
		$("#chorole").focus();
		return false;
	}
	if($.trim($("#chorole").val())=='Other' && $.trim($("#txtrole").val())==''){
		alert("Please Enter Role.");
		$("#txtrole").focus();
		return false;
	}
		
	if($.trim($("#txtname").val())==''){
		alert("Please enter name.");
		$("#txtname").focus();
		return false;
	}
	
	if($.trim($("#txtcontact").val())==''){
		alert("Please enter mobile No.");
		$("#txtcontact").focus();
		return false;
	}
	if($.trim($("#txtemail").val())==''){
		alert("Please enter your email.");
		$("#txtemail").focus();
		return false;
	}
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
	return true;	
	
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
</style>

</head>

<body onload="districtlist();">
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
                                <h1>T-E-A-C-H Program District Literacy Team</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                <div style="margin-bottom:10px" class="auto-style1">
									Only the District Literacy Team Members 
									selected by DG are required to upload their 
									details with photographs here.</div>
                                <form id="infofrm" name="infofrm" action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
                                <input type="hidden" name="hdnInfomode" id="hdnInfomode" value="" />
                                	  <table border="0" cellpadding="0" cellspacing="5" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
                                      	<tr>
                                        	<td width="33%"><strong>District <span style="color:#ff0000">*</span></strong></td>
                                            <td width="3%"><strong>:</strong></td>
                                            <td width="64%">
                                            	<select id="cbodistrict" name="cbodistrict" onchange="resetrole()" >
                                            		<option value="">Select</option>
                                            	</select></td>
                                        </tr>
                                        
                                          <tr>
                                            <td><strong>Designation <span style="color:#ff0000">*</span></strong></td>
                                            <td><strong>:</strong></td>              
                                            <td>
                                                <select id="chorole" name="chorole" onchange="showroleinput(this.value);displayallInfo();" >
                                                <option value="">Select</option>
                                               	<option value="DG">DG</option> 
                                               	<option value="DGE">DGE</option> 
                                               	<option value="DGN">DGN</option> 
                                               	<option value="DGND">DGND</option> 
                                               	<option value="DLCC">DLCC</option> 
                                               	<option value="T-Subcommittee Chairman">T-Subcommittee Chairman</option> 
                                               	<option value="E-Subcommittee Chairman">E-Subcommittee Chairman</option> 
                                               	<option value="A-Subcommittee Chairman">A-Subcommittee Chairman</option> 
                                               	<option value="C-Subcommittee Chairman">C-Subcommittee Chairman</option> 
                                               	<option value="H-Subcommittee Chairman">H-Subcommittee Chairman</option> 
                                               	<option value="Volunteer Management Committee Chairman">Volunteer Management Committee Chairman</option>
                                               	<option value="Fund Raising Committee Chairman">Fund Raising Committee Chairman</option>
                                               	<option value="Public Relations Committee Chairman">Public Relations Committee Chairman</option>
                                               	<option value="District Communication Officer">District Communication Officer</option>
                                               	<option value="Other">Other (To be decided by DG/DLCC)</option> 
                                                </select>
                                                <input type="text" id="txtrole" name="txtrole" style="display:none" value="" />
                                            </td>
                                         </tr>
                                        
                                         <tr>
                                            <td><strong>Name <span style="color:#ff0000">*</span></strong></td>
                                            <td><strong>:</strong></td>              
                                            <td>
                                              <input type="text" id="txtname" name="txtname"  maxlength="100"/>
                                            </td>
                                         </tr>
                                          
                                          <tr>
                                            <td><strong>Mobile No. <span style="color:#ff0000">*</span></strong> </td>
                                            <td><strong>:</strong></td>              
                                            <td>
                                                <input type="text" id="txtcontact" name="txtcontact"  maxlength="16"  />
                                            </td>
                                         </tr>
                                          <tr>
                                            <td><strong>Email <span style="color:#ff0000">*</span></strong></td>
                                            <td><strong>:</strong></td>              
                                            <td>
                                                <input type="text" id="txtemail" name="txtemail" size="50" maxlength="100"  />
                                            </td>
                                         </tr>
                                         <tr>
                                         	<td><strong>Picture</strong></td>
                                         	<td><strong>:</strong></td>   
                                            <td><input type="file" name="txtimage" id="txtimage" /></td>
                                         </tr>
                                         
                                          <tr>
                                            <td colspan="3" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Save" />&nbsp;<input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></td><!-- onclick="cancelInfo()"-->
                                         </tr>
                                      </table>                               
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
			 	$("#cbodistrict").append(str);
		}
	});
}

function resetrole(){
$("#chorole").val('');	
}

function showroleinput(cboval) {
	if(cboval=='Other') {
		$("#txtrole").val('');
		$("#txtrole").show();
	}
	else
	{
		$("#txtrole").hide();
	}
}

function displayallInfo() {
		var pars ='district='+$("#cbodistrict").val()+'&role='+$("#chorole").val();
		
	if($("#chorole").val()!='Other') {
		$.ajax({                                      
		  url: 'getInfo.php',                     
		  data: pars,
		  type:"post",
			dataType: 'json',
			success: function(data)         
			{
				if(data.length>0)
				{
					 $("#cbodistrict").prop( "disabled", true );
					$("#chorole").prop( "disabled", true );
					$("#hdnInfomode").val(data[0]["id"]);	
					$("#txtname").val(data[0]["name"]);	
					$("#txtcontact").val(data[0]["mobNo"]);
					$("#txtemail").val(data[0]["email"]);	
				}
			}
		});
	}
}

function cancelInfo() {
	
					 $("#cbodistrict").prop( "disabled", false );
					$("#chorole").prop( "disabled", false );
					$("#chorole").val('');
					 $("#cbodistrict").val('');
					$("#hdnInfomode").val('');	
					$("#txtname").val('');	
					$("#txtcontact").val('');
					$("#txtemail").val('');	
	
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






