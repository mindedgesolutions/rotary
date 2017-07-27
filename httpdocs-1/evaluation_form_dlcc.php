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

<script type="text/javascript" src="http://www.rotaryteach.org/js/jquery.min.js"></script>
	
	<script type="text/javascript" src="clubprojects/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="clubprojects/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="clubprojects/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>
<body onload="districtlist()">
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div style="padding:0 15px; margin:0">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <!--#include file="menu_area.html"-->
        <?php //include("menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
      <table width="100%" border="0" cellspacing="0" cellpadding="10" align="center" style="margin-top:5px; margin-bottom:7px; background:#FFFFFF; border-radius:5px; box-shadow:0 0 3px #000000">
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
    	               <td align="right"><div align="right"><a href="m-zone.shtml" class="login">Back</a></div></td>
                      </tr>
                        <tr>
                            <td align="left" valign="bottom"><h1>Evaluation Form</h1></td>
                            
                        </tr>
                    </table>
                    
                    <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-top:5px"></div>
                    
                  <p class="text" style="padding-top:12px; margin-top:0">
                    
                    <table width="100%" border="0">
                                  <tr>
                                    <td colspan="3"><strong>A. Introductory</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3"><strong>1. Name</strong></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;&nbsp; <strong>a. Literacy Zone Number</strong></td>
                                    <td colspan="3"><input type="text" name=""  /></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;&nbsp; <strong>b. RI District Number</strong></td>
                                    <td colspan="2"><input type="text" name=""  /></td>
                                  </tr>
                                  <tr>
                                    <td><strong>2. Total number of Rotary Clubs in the Dist.:</strong></td>
                                    <td colspan="2"><input type="text" name=""  /></td>
                                  </tr>
                                  <tr>
                                    <td><strong>3. Total number (approx) of Rotarians in the Dist.:</strong></td>
                                    <td colspan="2"><input type="text" name=""  /></td>
                                 </tr>
                                 
                                 
                                 <tr>
                                   <td colspan="3"><strong>B. Training & Orientation</strong></td>
                                 </tr>
                                 <tr>
                                    <td><strong>1. Date of the last National Orientation Program you attended: </strong></td>
                                    <td colspan="2"><input type="text" name=""  /> / <input type="text" name=""  /> / <input type="text" name=""  /></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3"><strong>2. If you could not attend the Orientation Program last held, reasons: [Box for 250 characters]</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3"><textarea cols="150" rows="5"></textarea></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><strong>3a. (i) Level I Training Program:</strong></td>
                                 </tr>
                                 <tr>
                                 <td>Date Prescribed</td>
                                 <td width="29%">Date Held</td>
                                 <td width="34%">Participant's Designation</td>
                                 </tr>
                                 
                                 <tr>
                                   <td>31st March</td>
                                   <td><input type="text" name="" /></td>
                                   <td>
                                   <select name="">
                                    <option value="" selected="selected">Select Designation</option>
                                    <option value="ZLC">ZLC</option>
                                    <option value="DG">DG</option>
                                    <option value="DLCC">DLCC</option>
                                    <option value="TEACH Chairperson">TEACH Chairperson</option>
                                    <option value="CLCC">CLCC</option>
                                   </select>
                                   </td>
                                 </tr>
                                 
                                 <tr>
                                   <td colspan="3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;(ii) Preformance Rating:</strong></td>
                                 </tr>
                                 <tr>
                                   <td>No delay & attendeance of those mandated > 80% -- AA <input type="checkbox" name="" /></td>
                                   <td>No delay & attendeance of those mandated > 60 - 80% -- AB <input type="checkbox" name="" /></td>
                                   <td>No delay & attendeance of those mandated < 60% -- AC <input type="checkbox" name="" /></td>
                                 </tr>
                                 <tr>
                                   <td>Delay & attendeance of those mandated > 80% -- BA <input type="checkbox" name="" /></td>
                                   <td>Delay & attendeance of those mandated > 60 - 80% -- BB <input type="checkbox" name="" /></td>
                                   <td>Delay & attendeance of those mandated < 60% -- BC <input type="checkbox" name="" /></td>
                                 </tr>
                                 
                                 <tr>
                                   <td colspan="3"><strong>3b. (i) Level II Training Program:</strong></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><strong><u>Traning Date:</u></strong></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Prescribed</strong></td>
                                   <td><strong>15th May</strong></td>
                                </tr>
                                <tr>
                                   <td><strong>Actual:</strong></td>
                                   <td><input type="text" name="" /></td>
                                 </tr>
                                 
                                 <tr>
                                   <td colspan="3"><strong><u>Attendance Details:</u></strong></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Club Presidents(no.)/percentage to total:</strong></td>
                                   <td><input type="text" name="" /></td>
                                </tr>
                                <tr>
                                   <td><strong>Club Presidents Elect(no.)/percentage to total:</strong></td>
                                   <td><input type="text" name="" /></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Incoming Club Literacy Committee Chairs Elect(no.) / percentage to total:</strong></td>
                                   <td><input type="text" name="" /></td>
                                 </tr>
                                 
                                 <tr>
                                   <td colspan="3"><strong><u>Remarks **:</u></strong></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><textarea cols="150" rows="5"></textarea></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3">
                                   [Remarks ** - Mention total traning duration, duration ofyourpresence, District level officers present, names of trainer, traning format, 
                                   feedback, etc]
                                   </td>
                                 </tr>
                                 <tr>
                                   <td><strong>(ii)</strong> Date of uploading compiled attendence sheet on www.rotaryteach.org:</td>
                                   <td colspan="2"><input type="text" name=""  /> / <input type="text" name=""  /> / <input type="text" name=""  /></td>
                                 </tr>
                                 <tr>
                                   <td><strong>(iii)</strong> Describe IW and Rotaract & RCC participation:</td>
                                   <td colspan="2"><textarea cols="80" rows="5"></textarea> [Min 500 Characters]</td>
                                 </tr>
                                 <!------------------------------------------------------------------------------------------------------------------->
                                 <tr>
                                   <td colspan="3"><strong>3c. Level III Training Program/District Literacy Seminar:</strong></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><strong><u>District No.:</u></strong></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><input type="text" name="" /></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><strong><u>Traning Date:</u></strong></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Prescribed</strong></td>
                                   <td><strong>1st June - 31st August</strong></td>
                                </tr>
                                <tr>
                                   <td><strong>Actual:</strong></td>
                                   <td><input type="text" name="" /></td>
                                 </tr>
                                 
                                 <tr>
                                   <td colspan="3"><strong><u>No of Participants:</u></strong></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Actual:</strong></td>
                                   <td><input type="text" name="" /></td>
                                </tr>
                                <tr>
                                   <td><strong>Rotarians:</strong></td>
                                   <td><input type="text" name="" /></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Others:</strong></td>
                                   <td><input type="text" name="" /></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Total:</strong></td>
                                   <td><input type="text" name="" /></td>
                                 </tr>
                                 
                                 <tr>
                                   <td colspan="3"><strong><u>Remarks</u> **:</strong></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><textarea cols="150" rows="5"></textarea></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3">
                                   [Remarks ** - Mention total traning duration, duration ofyourpresence, District level officers present, names of trainer, traning format, 
                                   feedback, etc]
                                   </td>
                                 </tr>
								
                                 <tr>
                                   <td colspan="3"><strong>C. <u>Appointments</u>:</strong></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><strong>Ensuring appointments of CLCCs and formation of all Club Level committee by each club President Elect.</strong></td>
                                 </tr> 
                                 <tr>
                                   <td colspan="3"><strong>i) No of Club finishing appoinments(before level II training / percentage to total):</strong></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Before Level II Traning</strong></td>
                                   <td><input type="text" name="" /></td>
                                </tr>
                                <tr>
                                   <td><strong>Actual:</strong></td>
                                   <td><input type="text" name="" /></td>
                                </tr>
                                <tr>
                                   <td><strong>Percentage:</strong></td>
                                   <td><input type="text" name="" readonly="readonly"/></td>
                                </tr> 
                                 
                                <tr>
                                   <td colspan="3"><strong>In case of delay, mention probable reasons [Not more than 100 words]:</strong></td>
                                 </tr>
                                 <tr>
                                   <td colspan="3"><textarea cols="150" rows="5"></textarea></td>
                                 </tr>  
                                  
                                <tr>
                                  <td colspan="3"><strong>D. <u>Goal Setting</u>:</strong></td>
                                </tr>  
                                <tr>
                                  <td colspan="3"><strong>4a. <u>Goal Set(During level II Training)</u>:</strong></td>
                                </tr> 
                                <tr>
                                   <td><strong>Total No of Clubs:</strong></td>
                                   <td colspan="2"><input type="text" name="" /></td>
                                </tr>
                                <tr>
                                   <td><strong>No of Clubs that have set their goals:</strong></td>
                                   <td colspan="2"><input type="text" name="" /></td>
                                </tr> 
                                
                                <tr>
                                  <td colspan="3"><strong>4b. <u>Date of uploading of compiled District goals for TEACH on www.rotaryteach.org</u>:</strong></td>
                                </tr> 
                                <tr>
                                   <td><strong>Date of goal uploaded:</strong></td>
                                   <td colspan="2"><input type="text" name="" /></td>
                                </tr>
                                <tr>
                                   <td><strong>If not in time, Reasons for delay (Max 100 words):</strong></td>
                                   <td colspan="2"><textarea cols="100" rows="5"></textarea></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="3"><strong>E. <u>Recruitment of Partners in service & others in RILM Projects</u>:</strong></td>
                                </tr>  
                                <tr>
                                <td><strong>Volunteer Categories</strong></td> 
                                <td><strong>Total No in the District</strong></td> 
                                <td><strong>Recruited in this quater</strong></td>
                                </tr>
                                <tr>
                                <td>Inner Wheel Members</td> 
                                <td><input type="text" name="" /></td> 
                                <td><input type="text" name="" /></td>
                                </tr>
                                
                                <tr>
                                <td>Rotaractors</td> 
                                <td><input type="text" name="" /></td> 
                                <td><input type="text" name="" /></td>
                                </tr>
                                
                                <tr>
                                <td>RCC</td> 
                                <td><input type="text" name="" /></td> 
                                <td><input type="text" name="" /></td>
                                </tr>
                                
                                <tr>
                                <td>Others</td> 
                                <td><input type="text" name="" /></td> 
                                <td><input type="text" name="" /></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="3"><strong>F. <u>Project planning, Implementation & Monitering *</u>:</strong></td>
                                </tr>  
                                <tr>
                                  <td colspan="3"><strong>5a. Planning and Implementation Status for the quater :</strong>&nbsp;&nbsp;<input type="text" name="" /></td>
                                </tr>  
                                 
                                
                                
                                
                                <tr>
                                 <td colspan="3">
                                 * This and the following parts of the report are to be filled in each quarter.
                                 </td>
                               </tr>
                               <tr>
                                 <td colspan="3">
                                 ** Thhe months of the quarter need to be mentioned here while filling in the report.
                                 </td>
                               </tr>
                               <tr>
                                  <td colspan="3"><strong>
                                  5b. Describe, club-wise & for district as a whole, steps taken by you during the qaurter for problem solving and implementation support: 
                                  [500 character box]</strong></td>
                                </tr> 
                                <tr>
                                   <td colspan="3"><textarea cols="150" rows="5"></textarea></td>
                                </tr>
                                <tr>
                                  <td colspan="3"><strong>G. <u>Volunteer Management</u>:</strong></td>
                                </tr> 
                                <tr>
                                  <td colspan="3"><strong>6. Describe, club-wise & for district as a whole, steps taken by you during the qaurter to help with volunteer 
                                  registration, training and deployment as per needs of the projects taken up:</strong></td>
                                </tr> 
                                <tr>
                                   <td colspan="3"><textarea cols="150" rows="5"></textarea></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="3"><strong>H. <u>Any Other Issue</u>:</strong></td>
                                </tr> 
                                <tr>
                                  <td colspan="3"><strong>7. Describe any issue calling for corrective action by Govn, . ZLC, with reasons for your recommendations: 
                                  [500 character box]</strong></td>
                                </tr> 
                                <tr>
                                   <td colspan="3"><textarea cols="150" rows="5"></textarea></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="3"><strong>Notes :</strong></td>
                                </tr> 
                                <tr>
                                  <td colspan="3"><strong>1. This is report is to be filled in electronic form for each quarter and sent by each DLCC by e-mail, by the 10th of the
                                   month following the quarter to the ZLC, Dist.Governor, Chairman, RILM and Chairman, Evaluation and Awards Committee.</strong></td>
                                </tr> 
                                <tr>
                                  <td colspan="3"><strong>
                                  2. Information in parts A to D need to be repeted in each qaurter, i.e., after the details have been furnished in the appropriate quarter.</strong>
                                  </td>
                                </tr> 
                                
                                <tr>
                                  <td><strong>Signature of DLCC - </strong></td>
                                  <td colspan="3"><input type="text" name="" /></td>
                                </tr> 
                                <tr>
                                  <td><strong>Name of DLCC - </strong></td>
                                  <td colspan="3"><input type="text" name="" /></td>
                                </tr> 
                                <tr>
                                  <td><strong>Term - </strong></td>
                                  <td colspan="3"><input type="text" name="" /></td>
                                </tr> 
                                <tr>
                                  <td><strong>Date - </strong></td>
                                  <td colspan="3"><input type="text" name="" /></td>
                                </tr> 
                                <tr>
                                  <td colspan="3" height="10"></td>
                                </tr>
                                
                                <tr>
                                  <td colspan="3" align="center"><input type="submit" id="btngo" name="submit_dlcc" value="Submit" class="login" /></td>
                                </tr> 
                                
                                 
                                </table>
                                </tr> 
                             </table>
                   </p> 
                    <!----------------------- FOOTER AREA START------------------------>
                                         <?php include("footer_area.html");?>

                    <!----------------------- FOOTER AREA END-------------------------->
              </td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>
</body>

</html>







