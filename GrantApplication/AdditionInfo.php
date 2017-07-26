<?php
session_start();
include("../connection.php");

if(!isset($_SESSION["grantAppuserid"]))
{
	header("Location: grantApplicationIndex.php");
}

$grantAppuserid  =$_SESSION["grantAppuserid"];

$refappno = $_GET["refappno"];
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



	function loadgrantAdditionInfo() {
	
				var pars ="refappno=<?php echo $refappno;?>"

		$.ajax({                                      
			  url: 'getAdditionInfo.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
					
					startmonthyr1 =  data[0]["startmonthyr1"].split("/")
					startmonthyr2 =  data[0]["startmonthyr2"].split("/")
					startmonthyr3 =  data[0]["startmonthyr3"].split("/")
					startmonthyr4 =  data[0]["startmonthyr4"].split("/")
					startmonthyr5 =  data[0]["startmonthyr5"].split("/")
					startmonthyr6 =  data[0]["startmonthyr6"].split("/")
					startmonthyr7 =  data[0]["startmonthyr7"].split("/")
					startmonthyr8 =  data[0]["startmonthyr8"].split("/")
					
						endmonthyr1 =  data[0]["endmonthyr1"].split("/")
					endmonthyr2 =  data[0]["endmonthyr2"].split("/")
					endmonthyr3 =  data[0]["endmonthyr3"].split("/")
					endmonthyr4 =  data[0]["endmonthyr4"].split("/")
					endmonthyr5 =  data[0]["endmonthyr5"].split("/")
					endmonthyr6 =  data[0]["endmonthyr6"].split("/")
					endmonthyr7 =  data[0]["endmonthyr7"].split("/")
					endmonthyr8 =  data[0]["endmonthyr8"].split("/")
					
				$("#startmm1").val(startmonthyr1[0])
					$("#startmm2").val(startmonthyr2[0])
					$("#startmm3").val(startmonthyr3[0])
					$("#startmm4").val(startmonthyr4[0])
					$("#startmm5").val(startmonthyr5[0])
					$("#startmm6").val(startmonthyr6[0])
					$("#startmm7").val(startmonthyr7[0])
					$("#startmm8").val(startmonthyr8[0])
					
					$("#startyr1").val(startmonthyr1[1])
					$("#startyr2").val(startmonthyr2[1])
					$("#startyr3").val(startmonthyr3[1])
					$("#startyr4").val(startmonthyr4[1])
					$("#startyr5").val(startmonthyr5[1])
					$("#startyr6").val(startmonthyr6[1])
					$("#startyr7").val(startmonthyr7[1])
					$("#startyr8").val(startmonthyr8[1])
					
					$("#endmm1").val(endmonthyr1[0])
					$("#endmm2").val(endmonthyr2[0])
					$("#endmm3").val(endmonthyr3[0])
					$("#endmm4").val(endmonthyr4[0])
					$("#endmm5").val(endmonthyr5[0])
					$("#endmm6").val(endmonthyr6[0])
					$("#endmm7").val(endmonthyr7[0])
					$("#endmm8").val(endmonthyr8[0])
					
					$("#endyr1").val(endmonthyr1[1])
					$("#endyr2").val(endmonthyr2[1])
					$("#endyr3").val(endmonthyr3[1])
					$("#endyr4").val(endmonthyr4[1])
					$("#endyr5").val(endmonthyr5[1])
					$("#endyr6").val(endmonthyr6[1])
					$("#endyr7").val(endmonthyr7[1])
					$("#endyr8").val(endmonthyr8[1])
					
					for(var i=1; i<=8; i++) {
					$("#txtresponsibles"+i).val(data[0]["responsibles"+i])
					}
					$("#txtsustain1").val(data[0]["sustain1"])
					$("#txtsustain2").val(data[0]["sustain2"])
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

<body onload="loadgrantAdditionInfo();">
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
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0; font-size:18px">Part-D : Additional Information for Grant Application Approval</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px">
<form name="frmgrantapp" action="saveAdditionalInfo.php" method="post">
        <input type="hidden" id="hdngrantuserid" name="hdngrantuserid" value="<?php echo $grantAppuserid; ?>" />
        <input type="hidden" id="hdnrefappno" name="hdnrefappno" value="<?php echo $refappno; ?>" />
        <tr height="30">
            <td colspan="4"><strong>Execution Modalities :</strong></td>
        </tr>
        <tr>
        <td colspan="4"><strong>Outline your Project Implementation Schedule :</strong>
            <table width="100%" align="center" cellpadding="5" cellspacing="0" border="1" bordercolor="#e0e0e0" style="text-align:left; border-collapse:collapse; margin-top:3px">
                <tr bgcolor="#f5f5f5">
                <td width="5%" align="center"><strong>Sr. No.</strong></td>
                <td width="42%" align="center"><strong>Activity</strong></td>              
                <td width="20%" align="center"><strong>Duration</strong><br />MM/YYYY to MM/YYYY</td>
                <td width="33%" align="center"><strong>Responsible Parties (Club members and others)</strong></td>
                </tr>
                
                <?php
                
             $existADPqry = "SELECT HSADPs FROM grantAppEligible WHERE refappno='$refappno';" ;
                $ADPresult = mysqli_query($link,$existADPqry);
                $existADP[] = mysqli_fetch_assoc($ADPresult);
                    
                $ADPqry = "SELECT * FROM HSADPList WHERE id  in(".$existADP[0]["HSADPs"].");";
                $result = mysqli_query($link,$ADPqry);
                while($row = mysqli_fetch_assoc($result))
                {
                    $ADParr[] = $row;
                }
                
                for($i=0; $i<count($ADParr); $i++) {
        
        ?>
        
                <tr>
                <td><?php echo ($i+1);?><input type="hidden" name="SDP_<?php echo ($i+1)?>" id="SDP_<?php echo ($i+1) ?>" value="<?php echo $ADParr[$i]["id"] ?>" /></td>
                <td><?php echo $ADParr[$i]["facility"]?></td>              
                <td><select name="startmm<?php echo ($i+1)?>" id="startmm<?php echo ($i+1)?>" >
                <option value="">MM</option>
                <?php for($m=1; $m<=12; $m++) {?><option value="<?php echo $m?>"><?php echo str_pad($m, 2, "0", STR_PAD_LEFT)?></option><?php }?>
                </select>
                &nbsp;<select id="startyr<?php echo ($i+1)?>" name="startyr<?php echo ($i+1)?>" >
                        <option value="">YYYY</option>	
                        <?php for($y=2014; $y<=2020; $y++) {?><option value="<?php echo $y?>"><?php echo $y?></option><?php }?>
                </select>
                <br /> to <br />
                <select  name="endmm<?php echo ($i+1)?>" id="endmm<?php echo ($i+1)?>" >
                <option value="">MM</option>
                <?php for($m=1; $m<=12; $m++) {?><option value="<?php echo $m?>"><?php echo str_pad($m, 2, "0", STR_PAD_LEFT)?></option><?php }?>
                </select>
                &nbsp;<select id="endyr<?php echo ($i+1)?>" name="endyr<?php echo ($i+1)?>" > 
                        <option value="">YYYY</option>	
                        <?php for($y=2014; $y<=2020; $y++) {?><option value="<?php echo $y?>"><?php echo $y?></option><?php }?>
                    </select>						</td>
                <td><textarea name="txtresponsibles<?php echo ($i+1)?>" id="txtresponsibles<?php echo ($i+1)?>" rows="4" style="width:98%" ></textarea></td>
                </tr>
                 <?php } ?>
            </table>					</td>
        </tr>
        <tr>
          <td colspan="4">With respect to Responsible Parties please list out partnerships entered into with other Rotary Clubs, Rotaract Clubs, Rotary Community Corps, NGOs, Inner Wheel Clubs, Corporates or individuals.</td>
        </tr>
        <tr>
            <td colspan="4"><strong>Sustainability :</strong></td>
        </tr>
        
         <tr>
           <td width="2%" valign="top"><strong>1.</strong></td>
            <td width="58%" valign="top">
                <strong>How will the club and the school ensure maintenance of the physical facilities created under this project.</strong><br />
                <br />
                <strong>Note :</strong> State how club would<br />
                <ul style="text-align:justify; list-style:lower-alpha; margin:5px 0 0 0; padding:0 10px 0 20px">
                    <li style="margin-bottom:7px; line-height:18px">
                        Mobilize the SMC / school authorities / local authorities / parent-teacher groups / students to ensure maintenance and upkeep of the installed facilities,                            </li>
                    <li style="margin-bottom:7px; line-height:18px">ensure resource allocation for periodic future maintenance and upkeep</li>
                </ul>                    </td>
            <td width="2%" valign="top"><strong>:</strong></td>              
            <td width="38%" valign="top"><textarea name="txtsustain1" id="txtsustain1" rows="7" style="width:100%" ></textarea></td>
        </tr>
        
        <tr>
          <td valign="top"><strong>2.</strong></td>
            <td valign="top">
                <strong>How will you measure your impact? </strong><em>(250 charecters)</em><br /><br />
                <strong>Note :</strong> Club may state<br />
                <ul style="text-align:justify; list-style:lower-alpha; margin:5px 0 0 0; padding:0 10px 0 20px">
                    <li style="margin-bottom:7px; line-height:18px">
                        the role of Club members and Volunteers as well as teachers, students, local authorities, members of the SMC, in conducting post-completion assessments / surveys to assess parameters like improvement in students attendance, teacher punctuality, general satisfaction about the facilities and similar indicators                            </li>
                    <li style="margin-bottom:7px; line-height:18px">how club would see that such impact assessment would inform further plans of sustainability</li>
                </ul>                    </td>
            <td valign="top"><strong>:</strong></td>              
            <td valign="top"><textarea name="txtsustain2" id="txtsustain2" rows="7" style="width:100%" ></textarea></td>
        </tr>
         
        <tr>
          <td valign="top"><strong>3.</strong></td>
          <td valign="top" colspan="3">
            <strong>Essential Terms</strong><br />
            Before submitting this RILM grant application, Club and District should agree to some essential terms : 
            <ul style="text-align:justify; list-style: lower-roman; margin:5px 0 0 0; padding:0 10px 0 20px">
                <li style="margin-bottom:10px; line-height:18px">
                    No Rotarian who has a vested interest in the activity (e.g., an employee or board member of a cooperating organization, owner of a store where project goods will be purchased, trustee of a school that a student plans to attend) may serve on the grant committee. If any potential conflict of interest exists, disclose it here.                        </li>
                <li style="margin-bottom:10px; line-height:18px">
                    All information contained in this application is, to the best of our knowledge, true and accurate and we intend to implement the activities as presented in this application.                        </li>
                <li style="margin-bottom:10px; line-height:18px">The Club / District agrees to undertake these activities as a Club / District.</li>
                <li style="margin-bottom:10px; line-height:18px">RILM may use information contained in this application to promote the activities by various means.</li>
                <li style="margin-bottom:10px; line-height:18px">
                    We agree to share information on best practices when asked, and RILM may provide our contact information to other Rotarians who may wish advice on implementing similar activities.                        </li>
                <li style="margin-bottom:10px; line-height:18px">
                    RILM will reimburse its share of the grant only after completion of the project, project upload and submission of accounts audited by a chartered accountant, construction quality certificate by a chartered engineer and a report of satisfactory performance by the Chairperson of the School Management Committee (SMC).                        </li>
                <li style="margin-bottom:7px; line-height:18px">
                    T the best of our knowledge and belief, except as disclosed above, neither we nor any person with whom we have or had a personal or business relationship are engaged, or intend to engage, in benefiting from RILM grant funds or have any interest that may represent a potential competing or conflicting interest. A conflict of interest is defined as a situation in which a Rotarian. in relationship to an outside organization, is in a position to influence the spending of RILM grant funds, or influence decisions in ways that could lead directly or indirectly to financial gain for the Rotarian, a business colleague, or his or her family, or give inproper advantage to others to the detriment of RILM.                        </li>
            </ul>                  </td>
          </tr>
        <tr>
          <td></td>
            <td colspan="3" align="center">
                <input type="submit" name="btn_submit" id="btn_submit" value="Save"  class="login" style="cursor:pointer; border-radius:3px;" onclick="saveGrantApplication();" /> &nbsp;&nbsp; <input type="reset" name="btn_reset" id="btn_reset" value="Cancel"  class="login" style="cursor:pointer; border-radius:3px" />
                </td>
            </tr>
</form>         
</table>
<form name="nextfrm" id="nextfrm" action="schoolSpecificFeatureForm.php" method="post">
	<input type="hidden" name="hdnrefapplicationno" id="hdnrefapplicationno" value="<?php echo $refappno;?>"/>

</form>  
        
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
		
</script>


</body>
</html>






