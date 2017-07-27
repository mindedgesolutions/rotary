<?php
include("connection.php");
$msg="";



if(isset($_POST["btn_submit"]))
{
$district =$_POST["cbodistrict"];
$club = $_POST["choclub"];
$noofbook = $_POST["bookuploaded"];
$name = $_POST["txtname"];
$contact = $_POST["txtcontact"];
$email = $_POST["txtemail"];

	
$query  = "INSERT INTO book(district, club, name, contactno, email,Noofbook,submitdt) VALUES ('".$district."','".$club."','".$name."','".$contact."','".$email."',".$noofbook.",'".date('Y-m-d h:i:s')."');";
	

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
	
	if($.trim($("#choclub").val())==''){
		alert("Please Choose club.");
		$("#choclub").focus();
		return false;
	}
	if($.trim($("#bookuploaded").val())=='' ){
		alert("Please Enter No of book uploaded.");
		$("#bookuploaded").focus();
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
          <?php /*?><?php include("header_area.html");?><?php */?>
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
                                <h1>Book Collection Upload</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                <div style="min-height:400px">
                                <div style="color:#ff0000; margin-bottom:10px"><?php echo $msg; ?></div>
                                <form id="bookfrm" name="bookfrm" action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
                                <input type="hidden" name="hdnbookno" id="hdnbookno" value="" />
                                	  <table border="0" cellpadding="0" cellspacing="5" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
                                      	<tr>
                                        	<td width="33%"><strong>District <span style="color:#ff0000">*</span></strong></td>
                                            <td width="3%"><strong>:</strong></td>
                                            <td width="64%">
                                            	<select id="cbodistrict" name="cbodistrict" onchange="dispclub(this.value);" >
                                            		<option value="">Select</option>
                                            	</select></td>
                                        </tr>
                                        
                                          <tr>
                                            <td><strong>Club <span style="color:#ff0000">*</span></strong></td>
                                            <td><strong>:</strong></td>              
                                            <td>
                                                <select id="choclub" name="choclub" onchange="getbookcount(this.value)" >
												<option value="">Select</option>
												</select>

                                            </td>
                                         </tr>
                                         <tr>
                                            <td><strong>Book collected till date</strong></td>
                                            <td><strong>:</strong></td>              
                                            <td>
                                                <input type="text" name="bookcollected" id="bookcollected"  readonly="readonly" />

                                            </td>
                                         </tr>
										 
										  <tr>
                                            <td><strong>No. of Books uploaded today <span style="color:#ff0000">*</span></strong></td>
                                            <td><strong>:</strong></td>              
                                            <td>
                                                <input type="text" name="bookuploaded" id="bookuploaded"   />

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
                                            <td colspan="3" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Save" />&nbsp;<input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></td>
                                         </tr>
                                      </table>                               
                                </form>             
                                </div>
                            </td>
                            <!--<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            	<?php /*?><?php include("inner_right.html");?><?php */?>
                            </td>-->
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
			$("#choclub").empty();
			$("#choclub").append(str);			 
		}
	});
}


function getbookcount(clubval)
{
var pars ='club='+clubval;
	$("#bookcollected").val(0);
	$("#hdnbookno").val(0);	
$.ajax({                                      
      url: 'getbookcount.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				$("#bookcollected").val(data[0]["bookcnt"]);
				$("#hdnbookno").val(data[0]["bookcnt"]);
				
			}
						 
		}
	});

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






