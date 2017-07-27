<?php
include("connection.php");

/*$query = "SELECT id, district, DG, DLCC, PDG, ifnull(nobookcommited,'') as nobookcommited, ifnull(nobookcollected,'') as nobookcollected, ifnull(volunteercommited,'') as volunteercommited, ifnull(volunteerregister,'') as volunteerregister FROM districtTracker;"; 
$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
	}
}*/

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
                                <h1>District Tracker</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                    <div style="margin:10px">
                   		<strong> District : </strong>
                   		<select id="cbodistrict" name="cbodistrict" onchange="getassocdesig(this.value)" >
                     		 <option value="">Select</option>
                        </select>
                    </div>        
                                <div id="showdetail">
                                <?php /*?><table width="100%" cellpadding="5" cellspacing="5" align="center" border="1" style="text-align:left; font-family:arial; font-size:12px; background:#ffffff">
                                  	<tr>
                                    	<td>District</td>
                                    	<td>DG Photo</td>
                                    	<td>District Governor </td>
                                    	<td>No. of Books Commited</td>
                                    	<td>No. of Books Collected</td>
                                    	<td>No. of Volunteers Commited</td>
                                    	<td>No. of Volunteers Registered</td>
                                	</tr>

                                <?php foreach($arr as $record)  { ?>
                                	<tr>
                                    	<td><?php echo $record["district"]; ?></td>
                                    	<td><img src="dgpics/<?php echo $record["district"]." ".$record["DG"]?>" width="" height="" /></td>
                                    	<td><?php echo $record["DG"]; ?></td>
                                    	<td><?php echo $record["nobookcommited"]; ?></td>
                                    	<td><?php echo $record["nobookcollected"]; ?></td>
                                    	<td><?php echo $record["volunteercommited"]; ?></td>
                                    	<td><?php echo $record["volunteerregister"]; ?></td>
                                	</tr>
                                <?php } ?>
                                </table><?php */?>
                                </div>
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
      url: 'districttrackerlist.php',                     
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


function getassocdesig(districtval){
	
	var pars = 'district='+districtval
	var str = "";
	$.ajax({                                      
		  url: 'getDesigbyDistrict.php',                     
		  data: pars,
		  type:"post",
			dataType: 'json',
			success: function(data)         
			{
				if(data.length>0)
				{
					str = str+"<div style='padding:0 0 0 15px; text-align:center; line-height:18px'>"
					str = str+"<img src='dgpics/"+data[0]["district"]+"DG.jpg' width='100' style='border:1px solid #999999; padding:1px; margin-bottom:9px' /><br>"+"<strong>District Governer : </strong>"+data[0]["DG"]+"<br /><br />";
					str = str+"</div>";	
					str = str+"<div style='padding:0 0 0 15px; line-height:22px'>"
					str = str+"<strong>District Literacy Committee Chairman : </strong>"+data[0]["DLCC"]+"<br />";					
					str = str+"<strong>Zonal Literacy Co-ordinators : </strong>"+data[0]["PDG"]+"<br />";
					str = str+"<strong>No. of Books Commited : </strong>"+data[0]["nobookcommited"]+"<br />";
					str = str+"<strong>No. of Books Collected : </strong>"+data[0]["nobookcollected"]+"<br />";
					str = str+"<strong>No. of Volunteers Commited : </strong>"+data[0]["volunteercommited"]+"<br />";
					str = str+"<strong>No. of Volunteers Registered : </strong>"+data[0]["volunteerregister"]+"<br />";
					str = str+"</div>";	
				}
					$("#showdetail").html(str);
				
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






