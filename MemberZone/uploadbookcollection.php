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
<title>RILM - Member Zone - Book Collection Upload</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/top_menu.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />

<!-- FONT -->
<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

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

</head>

<body onload="districtlist();">

        
<!----------------------- LOGO AREA START --------------------->
<?php include("header.html");?>
<!----------------------- LOGO AREA END ----------------------->

<!----------------------- MENU AREA START --------------------->
 <?php include("top-menu.html");?>
<!----------------------- MENU AREA END ----------------------->
        


<div style="padding:0; margin:0; box-shadow:0 3px 2px #cccccc; border-bottom:4px solid #FFFFFF; background:url(images/bg_n.png)">
	<h1 style="padding:15px 0 7px 0; margin:0 auto; width:950px; text-align:left; text-transform:uppercase">Book Collection Upload</h1>
</div>

<div id="content-inner">
	<div id="body">
        <!--<div>
            <h1 style="padding:0 0 2px 0; margin:0; text-align:left; border-bottom:1px solid #ccc">Book Collection Upload</h1>
        </div>-->
        <br />
        <div class="link100" style="background:url(images/upload-book-collection1.jpg) bottom right no-repeat; padding:0 0 250px 0">
                    
            
<div style="color:#ff0000;"><?php echo $msg; ?></div>
<form id="bookfrm" name="bookfrm" action="" method="post" onsubmit="return validation();" enctype="multipart/form-data">
<input type="hidden" name="hdnbookno" id="hdnbookno" value="" />
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
    <tr>
        <td width="33%"><strong>District <span style="color:#ff0000">*</span></strong></td>
        <td width="3%"><strong>:</strong></td>
        <td width="64%">
            <select id="cbodistrict" name="cbodistrict" onchange="dispclub(this.value);" >
            	<option value="" style="padding:4px 12px">Select</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><strong>Club <span style="color:#ff0000">*</span></strong></td>
        <td><strong>:</strong></td>              
        <td>
            <select id="choclub" name="choclub" onchange="getbookcount(this.value)" >
            	<option value="" style="padding:4px 12px">Select</option>
            </select>        
        </td>
    </tr>
    <tr>
        <td><strong>Book collected till date </td>
        <td><strong>:</strong></td>              
        <td><input type="text" name="bookcollected" id="bookcollected"  readonly="readonly" style="height:27px; line-height:27px; border:none; box-shadow:inset 0 0 4px #cccccc; padding:0 0 0 7px" /></td>
    </tr>
    <tr>
        <td><strong>No. of Books uploaded today <span style="color:#ff0000">*</span></strong></td>
        <td><strong>:</strong></td>              
        <td><input type="text" name="bookuploaded" id="bookuploaded" style="height:27px; line-height:27px; border:none; box-shadow:inset 0 0 4px #cccccc; padding:0 0 0 7px" /></td>
    </tr>
    <tr>
        <td><strong>Name <span style="color:#ff0000">*</span></strong></td>
        <td><strong>:</strong></td>              
        <td><input type="text" id="txtname" name="txtname"  maxlength="100" style="width:60%; height:27px; line-height:27px; border:none; box-shadow:inset 0 0 4px #cccccc; padding:0 0 0 7px"/></td>
    </tr>
    <tr>
        <td><strong>Mobile No. <span style="color:#ff0000">*</span></strong> </td>
        <td><strong>:</strong></td>              
        <td><input type="text" id="txtcontact" name="txtcontact"  maxlength="16" style="height:27px; line-height:27px; border:none; box-shadow:inset 0 0 4px #cccccc; padding:0 0 0 7px" /></td>
    </tr>
    <tr>
        <td><strong>Email <span style="color:#ff0000">*</span></strong></td>
        <td><strong>:</strong></td>              
        <td><input type="text" id="txtemail" name="txtemail" size="50" maxlength="100" style="width:60%; height:27px; line-height:27px; border:none; box-shadow:inset 0 0 4px #cccccc; padding:0 0 0 7px" /></td>
    </tr>
    <tr><td colspan="3"></td></tr>
    <tr>
    	<td colspan="3" align="center">
        	<input type="submit" name="btn_submit" id="btn_submit" value="Save" class="btn" />&nbsp;<input type="reset" name="btn_reset" id="btn_reset" value="Cancel" class="btn" />
        </td>
    </tr>
</table>                               
</form>

            
        </div>
    </div>
</div>



<br />


<!----------------------- FOOTER AREA START------------------------>
 <?php include("footer.html");?>
<!----------------------- FOOTER AREA END-------------------------->  
    


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






