<?php
include("connection.php");
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

function validation() {

	if($.trim($("#cbodistrict").val())==''){
		alert("Please Choose district.");
		$("#cbodistrict").focus();
		return false;
	}
	
	return true;
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
.auto-style1 {
	text-align: center;
}
.auto-style2 {
	color: #FF0000;
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
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" width="60%">
                                        	<h1 style="padding:0; margin:0">T-E-A-C-H Program District Literacy Team</h1>
                                        </td>
                                        <td align="right">
                                          <a href="administratorInfo.php" style="color:#ffffff; text-decoration:none" title="Click Here to Upload your T-E-A-C-H Program District Literacy Team Details">
                                               <!-- 
                                               <div style="float:right; font-size:12px; background:#FF0000; padding:7px 15px; border-radius:3px; font-weight:bold; box-shadow:0 1px 0 #333333;background-image: linear-gradient(to bottom, #ff0000, #d70000);">
                                                    UPLOAD YOUR TEAM DETAILS
                                                </div>-->
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;" class="auto-style1">
									<br></div>
								<form name="frm" id="frm" method="post" action="" onsubmit="return validation();" >
                                	  <table border="0" cellpadding="0" cellspacing="5" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-top:7px">
                                      	<tr>
                                        	<td colspan="3" style="width: 98%">
												<!--<br />
                                                <p class="link" style="padding:0; margin:0 0 30px 0">
                                                    <a href="District Literacy Team.pdf" target="_blank" style="background:url(../images/pdf.png) left center no-repeat; padding:16px 0 16px 42px; font-size:13px" title="Click to view the District Literacy Team">
                                                        District Literacy Team
                                                    </a>
                                                </p>-->
                                                
                                                <p style="text-align:center; padding:0; margin:0 0 25px 0"><img src="images/District-Literacy-Team.jpg" width="550" /></p>
                                                

<style type="text/css">
a.list { color:#990000; font-weight: normal; text-decoration:none; text-decoration: none; display:block; background:#e0e0e0; padding:7px 0 7px 5px }
a.list:hover { color:#333333}
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

<a href="#a" onclick="toggle_visibility('list1');" class="list"><strong>+ District Governor</strong></a>
<div id="list1" style="display:none; border:1px solid #e0e0e0; padding: 5px 15px;">
    <ul style="margin:5px 0 0 0; padding:0; list-style:none; text-align: justify; color:#000000; line-height:18px">
        <li style="margin-bottom:10px">
            <p style="text-align:left; font-weight:bold; padding:0; margin:0 0 7px 0; text-decoration:underline">Role and Responsibilities</p>
            The District Governor (DG) is like the Conductor of a symphony orchestra, the kingpin of all activities that the Rotary Clubs in her/his District take up in a Rotary Year. The Rotary Clubs in a District execute various programs under the guidance and leadership of the DG.
            <br /><br />
            In view of this multifarious role of a DG, only the most essential are listed below as the role and responsibilities of the DG in respect of T-E-A-C-H :
            
            <ul style="text-align: justify; list-style:lower-roman; margin:7px 0 0 0; padding:0 0 0 25px">
                <li style="margin-bottom:10px">To attend the Orientation program conducted by the Executive Committee of Rotary India Literacy Mission (RILM) each year</li>
                <li style="margin-bottom:10px">
                    To appoint (or continue the appointment of) the District Literacy Team consisting of the District Literacy Committee Chair (DLCC) and Chairs & Members of Committees for 
                    <ul style="text-align:left; list-style: disc; margin:7px 0 0 0; padding:0 0 0 30px">
                        <li style="margin-bottom:5px">Teacher Support Committee</li>
                        <li style="margin-bottom:5px">E-Learning Committee</li>
                        <li style="margin-bottom:5px">Adult Literacy Committee</li>
                        <li style="margin-bottom:5px">Child Development Committee</li>
                        <li style="margin-bottom:5px">Happy Schools Committee</li>
                        <li style="margin-bottom:5px">Volunteer Management Committee</li>
                        <li style="margin-bottom:5px">Fundraising Committee</li>
                        <li style="margin-bottom:5px">Communications Officer, before the Orientation program</li>
                    </ul>
                </li>
                <li style="margin-bottom:10px">To ensure that the Level I training program for the District is organized in consultation with the Zonal Literacy Coordinator (ZLC) before or on the due date (30th April each year) and all mandated participants actually attend the training</li>
                <li style="margin-bottom:10px">To ensure that the Level II training program is organized by the DLCC before or on the due date (31st May each year) and attended by the Club Presidents Elect and Club Literacy Committee Chairs of at least 60% of the Clubs in the District</li>
                <li style="margin-bottom:10px">To ensure that the Level III training program (District Literacy Seminar) is organized by the DLCC during the due period (15th May – 31st August each year)</li>
                <li style="margin-bottom:10px">To raise per capita contribution from each Rotary Club member in the District at the agreed rate and credit the amount by 30th September each year to the RILM account</li>
                <li style="margin-bottom:10px">To assist the National Fundraising Committee for Retail Donations in collecting funds for T-E-A-C-H. 40% of these collections can be retained by the District for T-E-A-C-H implementation</li>
                <li style="margin-bottom:10px">Set goals and reconfirm goals through discussion with each Club</li>
                <li style="margin-bottom:10px">Regularly motivate Clubs to achieve their goals</li>
                <li style="margin-bottom:10px">Create awareness of and publicize the RILM programs and news from time to time through Governors Monthly Letter (GML) etc.</li>
                <li style="margin-bottom:10px">Conduct sessions on RILM and T-E-A-C-H at Assistant Governors Trainings (AGTs), Presidents Elect Trainings (PETs), Secretary Elects Trainings (SETs), District Assembly, District Conference, etc.</li>
                <li style="margin-bottom:10px">Respond to information requests of RILM Office & ZLC on a priority basis</li>
            </ul>
            In addition to the above, the DG is expected to ensure all activities as enumerated for DLCC (for details read below).            
        </li>
    </ul>
</div>

<a href="#a" onclick="toggle_visibility('list2');" class="list" style="margin-top:5px"><strong>+ District Literacy Committee Chair (DLCC)</strong></a>
<div id="list2" style="display:none; border:1px solid #e0e0e0; padding: 5px 15px;">
    <ul style="margin:5px 0 0 0; padding:0; list-style:none; text-align: justify; color:#000000; line-height:18px">
        <li style="margin-bottom:10px">
            <p style="text-align:left; font-weight:bold; padding:0; margin:0 0 7px 0; text-decoration:underline">Role and Responsibilities</p>
            
            <ul style="text-align: justify; list-style:lower-roman; margin:7px 0 0 0; padding:0 0 0 25px">
                <li style="margin-bottom:10px">
                	To attend the Literacy Orientation Program and Literacy Summit each year, thoroughly understand the T-E-A-C-H program as well as the related Central, State and local government policies, programs and initiatives and also ensure maxi-mum participation of delegates from the District in the Literacy Summit
                </li>
                <li style="margin-bottom:10px">
                    To ensure formation of all District level committees with the approval of the DGE well before the scheduled date of Level I Training Program
                </li>
                <li style="margin-bottom:10px">
                	To assist the Zonal Literacy Coordinator (ZLC), District Governor (DG)/District Governor Elect (DGE) in organizing and conducting Level I Training Program by/ before the due date and ensure participation of all mandated participants
                </li>
                <li style="margin-bottom:10px">
                	To ensure appointment of Club Literacy Committee Chairs (CLCCs) and formation of all Club level committees by each Club President Elect well before the scheduled date of Level II Training Program
                </li>
                <li style="margin-bottom:10px">
                	To assist the District Governor (DG)/District Governor Elect (DGE) in organizing and conducting Level II Training Program by/before the due date and ensure participation of all mandated participants
                </li>
                <li style="margin-bottom:10px">
                	To ensure filling up of Club goal forms during Level II Training Program and com-pile District goals based thereon and upload the latter on the website
                </li>
                <li style="margin-bottom:10px">
                	To assist the District Governor (DG)/District Governor Elect (DGE) in organizing and conducting Level III Training Program during the time slot prescribed for this purpose and ensure participation of all mandated participants
                </li>
                <li style="margin-bottom:10px">
                	To ensure participation of Inner Wheel Clubs in the District, Rotaractors and Rotary Community Corps (RCC) members in training at the District/Club level
                </li>
                <li style="margin-bottom:10px">
                	To encourage and motivate each Club to :
                	<ul style="text-align:left; list-style: disc; margin:7px 0 0 0; padding:0 0 0 30px">
                        <li style="margin-bottom:5px">upload grant applications/programs before and after completion</li>
                        <li style="margin-bottom:5px">register & train volunteers according to needs of Club’s planned programs,</li>
                        <li style="margin-bottom:5px">organize events to publicize important achievements under T-E-A-C-H,</li>
                        <li style="margin-bottom:5px">mobilize funds for program implementation</li>
                        <li style="margin-bottom:5px">visit and study the website www.rotaryteach.org regularly</li>
                    </ul>
                </li>
                <li style="margin-bottom:10px">
                	To trouble-shoot for Clubs and District program committees with all concerned, including government officials at the revenue District and state levels
                </li>
                <li style="margin-bottom:10px">
                	To take all steps, including trouble-shooting with other stakeholders and government officials, in consultation/collaboration with ZLC, DG/DGE, Chairs of District level program committee, Club Presidents and CLCCs so as to ensure that the District Goals are achieved
                </li>
                <li style="margin-bottom:10px">
                	To prepare and furnish annual, quarterly and other reports as required from time to time 
                </li>
            </ul>         
        </li>
    </ul>
</div>

<a href="#a" onclick="toggle_visibility('list3');" class="list" style="margin-top:5px"><strong>+ Club President</strong></a>
<div id="list3" style="display:none; border:1px solid #e0e0e0; padding: 5px 15px;">
    <ul style="margin:5px 0 0 0; padding:0; list-style:none; text-align: justify; color:#000000; line-height:18px">
        <li style="margin-bottom:10px">
            <p style="text-align:left; font-weight:bold; padding:0; margin:0 0 7px 0; text-decoration:underline">Role and Responsibilities</p>
            The Rotary Club is the organization that is at the centre of all activities relating to implementation of program in the T-E-A-C-H program and the Club President/President Elect (CP/CPE) is the key figure who, in collaboration with the Club Literacy Committee Chair (CLCC) and Members (CLCMs) is expected to plan, select, execute, supervise and report on the program specific activities that they choose to take up.
            <br /><br />
            Keeping this in view, the role and responsibilities of the CP/CPE are defined as follows :

            <ul style="text-align: justify; list-style:lower-roman; margin:7px 0 0 0; padding:0 0 0 25px">
                <li style="margin-bottom:10px">
                	To appoint the CLCC and Club Literacy Committee Members well before the Level II training program (expected to be held by 31st May each year) so that all of them (along with the CP/CPE) can participate fully in that training program
                </li>
                <li style="margin-bottom:10px">
                	To attend the Level II training program organized by the District Governor/Governor Elect (DG/DGE) and the District Literacy Committee Chair (DLCC), along with the CLCC and CLCMs, and fully understand each program/component of the T-E-A-CH program as well as its funding and reporting aspects
                </li>
                <li style="margin-bottom:10px">
                	To motivate members of the Club to attend in large numbers the Level III training program (District Literacy Seminar) as and when it is held by the District leader-ship (expected during 15th May - 31st August each year) 
                </li>
                <li style="margin-bottom:10px">
                	To study the www.rotaryteach.org website carefully and download all information, forms, etc., that are necessary for implementation of the selected program.
                </li>
                <li style="margin-bottom:10px">
                	To familiarize himself and all members of the Club Literacy Committee with the “how to” guidelines of each activity/program of T-E-A-C-H, grant application forms for various programs as well as the quarterly progress report formats 
                </li>
                <li style="margin-bottom:10px">
                	Based on the training and information so gathered, to decide, well before the beginning of the Rotary Year (RY), the T-E-A-C-H activities/programs that the Club will like to take up during the year and plan for timely implementation of each so that they can be all completed in all respects before the end of the RY
                </li>
                <li style="margin-bottom:10px">
                	To tie up arrangements for the necessary mobilization and training of volunteers and Club members, funds and other inputs for implementation all selected activi-ties and sequence them appropriately 
                </li>
                <li style="margin-bottom:10px">
                	To explore and finalize partnerships with other organizations and non-governmental organizations (NGOs) where such partnership will be essential for imple-mentation of any selected set of activities
                </li>                
                <li style="margin-bottom:10px">
                	To tie up funding, including grants from Rotary India Literacy Mission (RILM) for each selected activity
                </li>
                <li style="margin-bottom:10px">
                	To do the following : 
                    <ul style="text-align:left; list-style: disc; margin:7px 0 0 0; padding:0 0 0 30px">
                        <li style="margin-bottom:5px">get the selected activities executed properly</li>
                        <li style="margin-bottom:5px">send quarterly progress reports to the DLCC</li>
                        <li style="margin-bottom:5px">upload information on the website (wherever so indicated)</li>
                        <li style="margin-bottom:5px">complete the programs</li>
                        <li style="margin-bottom:5px">finalize accounts</li>
                        <li style="margin-bottom:5px">get necessary certification of accounts done</li>
                        <li style="margin-bottom:5px">send program completion reports to DLCC and also upload them on the website</li>
                    </ul>
                </li>
			</ul>    
        </li>
    </ul>
</div>

<a href="#a" onclick="toggle_visibility('list4');" class="list" style="margin-top:5px"><strong>+ Club Literacy Committee Chair (CLCC)</strong></a>
<div id="list4" style="display:none; border:1px solid #e0e0e0; padding: 5px 15px;">
    <ul style="margin:5px 0 0 0; padding:0; list-style:none; text-align: justify; color:#000000; line-height:18px">
        <li style="margin-bottom:10px">
            <p style="text-align:left; font-weight:bold; padding:0; margin:0 0 7px 0; text-decoration:underline">Role and Responsibilities</p>
            The Rotary Club is the organization that is at the centre of all activities relating to implementation of program in the T-E-A-C-H program and the Club President/President Elect (CP/CPE) is the key figure who, in collaboration with the Club Literacy Committee Chair (CLCC) and Members (CLCMs) is expected to plan, select, execute, supervise and report on the program specific activities that they choose to take up.
            <br /><br />
            Keeping this in view, the role and responsibilities of the CP/CPE are defined as follows :

            <ul style="text-align: justify; list-style:lower-roman; margin:7px 0 0 0; padding:0 0 0 25px">
                <li style="margin-bottom:10px">
                	To assist the Club President (CP)/President Elect (CPE) with selection of members of the Club Literacy Committee before the due date of the Level II training program
                </li>
                <li style="margin-bottom:10px">
                	To attend the Level II training program organized by the DG/DGE & District Literacy Committee Chair (DLCC)
                </li>
                <li style="margin-bottom:10px">
                	To assist CP/CPE and DLCC in mobilizing/motivating members of the Rotary Club to participate in the Level III training program (District Literacy Seminar) 
                </li>
                <li style="margin-bottom:10px">
                	To decide, in consultation with the Club Literacy Committee members and with the approval of the CP & CPE, the programs under T-E-A-C-H to be taken up by the Club, well before the beginning of the Rotary Year
                </li>
                <li style="margin-bottom:10px">
                	To study the website www.rotaryteach.org and cull out all relevant information and various forms necessary for implementation of the selected programs
                </li>
                <li style="margin-bottom:10px">
                	To fill in and upload, in consultation with the Primary Contact (if not himself/her-self the Primary Contact nominated by the CP/CPE) the relevant grant application form/s for the activities/programs for which the Club wishes to avail of Rotary India Literacy Mission (RILM) grant
                </li>
                <li style="margin-bottom:10px">
                	To follow up with the DLCC for authorization of the grant application forms uploaded by the Club till each application is approved
                </li>
                <li style="margin-bottom:10px">
                	To plan and execute the selected activities/programs after tying up funds that will have to be raised by the Club for this purpose
                </li>
                <li style="margin-bottom:10px">
                	To oversee the execution of various programs taken up by the Club in association with other members of the Club Literacy Committee and ensure periodical reporting using the prescribed form/s 
                </li>
                <li style="margin-bottom:10px">
                	To ensure proper accounting of all funds spent on selected programs, certification of accounts and works as required under the RILM guidelines and claiming of grants due from RILM
                </li>
                <li style="margin-bottom:10px">
                	To resolve issues that may arise in course of implementation of programs with the advice of the CP, DLCC, etc.
                </li>
			</ul>    
        </li>
    </ul>
</div>
<br />                                                
                                            </td>
                                        </tr>                                      
                                      	<tr>
                                        	<td class="auto-style2" colspan="3" style="width: 98%">
											  <p>&nbsp;</p>
										    <p>&nbsp;</p>
                                            <h2 align="center"><strong><a href="dteam1617.shtml">Please CLICK HERE for District Team 2016-2017 Details</a></strong></h2>
                                            <br />
										    <h2 align="center"><strong><a href="dteam1516.shtml">Please CLICK HERE for District Team 2015-2016 Details</a></strong></h2>
                                            <br />
										    <h2 align="center"><strong><a href="Article/2016-17 District Vertical Chair Details.xlsx">Please CLICK HERE for District Vertical Chair Details 2016-17 </a></strong></h2>
                                            </td>
                                        </tr>      
                                                                          
                                      	<tr style="background:#f5f5f5;">
                                        	<!--<td width="20%" style="padding:5px; color:#000000; border-bottom:#e0e0e0 1px solid"><strong>Select District 
                                            <span style="color:#ff0000">*</span></strong></td>
                                            <td width="2%" style="padding:5px; text-align:center; border-bottom:#e0e0e0 1px solid"><strong>:</strong></td>
                                            <td width="78%" style="padding:5px; border-bottom:#e0e0e0 1px solid">
                                            	<select id="cbodistrict" name="cbodistrict" onchange="showrecord()" style="width:20%; padding:3px 2px" >
                                            		<option value="">-- Select District --</option>
                                            	</select>
                                        	</td>-->
                                        </tr>                                        
                                          <!--<tr>
                                            <td colspan="3" align="center"><input type="submit" name="btnsearch" id="btnsearch" value="Search" /></td>
                                         </tr>-->
                                      </table>                               
                                </form>
                                <div id="showdetail"></div>
                                 
                               <?php /*?><table cellpadding="5" cellspacing="4" style="text-align:center"><tr>
                               <?php $count = 0; 
							
							   foreach($arr as $arrval) {
								    if ($count && $count % 3 == 0) echo '</tr><tr>';
                                ?>
                               		<td align="center" style="margin:20px; text-align:center">
                                    <img src="upload/<?php echo $arrval["image"];?>" width="150" height="120" /><br />hhhh
									<?php echo $arrval["name"];?><br />
                                    <?php echo $arrval["role"];?><br />
								  	
                                    </td>
                             <?php        
      					 		 $count++;
							   }
							 
							?>
                              </tr></table> <?php */?>           
                                
                            </td>
                            <!--<td width="20">&nbsp;</td>
                            <td width="210" valign="top">-->
                            	<?php /*?><?php include("inner_right.html");?><?php */?>
                            <!--</td>-->
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
str = str+"<option value='All'>All</option>";
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


function showrecord(){

var str ="";
$.ajax({                                      
      url: 'Administratorlist.php',                     
      data: 'district='+$("#cbodistrict").val(),
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
		//alert(JSON.stringify(data))
			if(data.length>0)
			{
				str =str+'<table width="100%" cellpadding="5" cellspacing="5" align="center" border="0" style="text-align:left; font-family:arial; font-size:12px; background:#ffffff"><tr>';
				
                    var count = 0; 
				 for(var i=0; i<data.length; i++)
					{  
								    if (count && count % 3 == 0) 
									str = str+"</tr><tr>";
                              		str = str+'<td style="line-height:18px; background:#f5f5f5" valign="top">'
									if(data[i]["image"] !='') {
                                    str = str+'<div style="text-align:center"><img src="upload/'+data[i]["image"] +'" width="140" height="170" style="border:1px solid #666666; padding:1px; margin:3px 0 5px 0" /></div>';
									}
									else
									{
                                    str = str+'<div style="text-align:center"><img src="upload/noimage.jpg" width="140" height="170" style="border:1px solid #666666; padding:1px; margin:3px 0 5px 0" /></div>';
									}
									str = str+'<strong>District :</strong> '+data[i]["district"]+'<br />'
									str = str+'<strong>Name :</strong> '+data[i]["name"]+'<br />'
									str = str+'<strong>Desig :</strong> '+data[i]["role"]+'<br />'
									str = str+'<strong>Contact No. :</strong> '+data[i]["mobNo"]+'<br />'
									str = str+'<strong>Email :</strong> '+data[i]["email"]+'<br />'
                                   str = str+'</td>'
                                    
                                  
      					 			 count = count+1;
									 }
	                               str = str+'</tr></table>'
			
				
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






