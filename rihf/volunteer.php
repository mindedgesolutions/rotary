<?php
session_start();
include("admin/includes/connect.php"); 
//--------------------------------------------------
$name=$_REQUEST['name'];
$ad1=$_REQUEST['ad1'];
$ad2=$_REQUEST['ad2'];
$occupation=$_REQUEST['occup'];
$assign=$_REQUEST['assignstate'];
$duration=$_REQUEST['radiobutton'];
$msg=$_REQUEST['message'];
$date=$_REQUEST['day'];
$month=$_REQUEST['month'];
$year=$_REQUEST['year'];
//--------------------------------------------------
if($_REQUEST[ln]!="")
{
$lcc=$_REQUEST[lcc];
$lctc=$_REQUEST[lctc];
$ln=$_REQUEST[ln];
$land=$lcc."".$lctc."".$ln;
}
else
{
$land=0;
}
//--------------------------------------------------------------------------
$final_interest = array();
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");

$comapre = array();
array_push($comapre, "doctor");
array_push($comapre, "nurse");
array_push($comapre, "paramedic");
array_push($comapre, "psychiatrist");
array_push($comapre, "general");

$interest=$_POST['interest'];
$how_many = count($interest);
if($how_many>0)
{

for ($i=0; $i<5; $i++) 
{
 for($j=0;$j<$how_many;$j++)
  {
   if($comapre[$i]==$interest[$j])
      {
	   $final_interest[$i]="yes";
	  }
  }
}

}
//---------------------------------------------------------------------------

if($_POST['Submit']=="Submit")
{
 
 $query=mysql_query("insert into `volunteer`(`name`,`ad1`,`ad2`,`phone`,`occupation`,`date`,`month`,`year`,`doctor`,`nurse`,`paramedic`,`psychiatrist`,`general`,`assignstate`,`duration`,`message`)values('$name','$ad1','$ad2','$land','$occupation','$date','$month','$year','$final_interest[0]','$final_interest[1]','$final_interest[2]','$final_interest[3]','$final_interest[4]','$assign','$duration','$msg')")or die(mysql_error());	
  if($query)
  {
   $headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= 'From:RIHF<'.$_REQUEST['name'].'>'."\r\n";		   
	$send_sub = $_REQUEST['name'].' Thank-you for your message!';
	$send_to = 'info@rihf.org ';
	//$send_to='sukanta.das@escaladesoft.com';
	$send_body='<table align="center" width="96%" border="0">
				 <tr>
					<td width="40%" align="right" style=" padding-right:10px;">
						<strong>Name:</strong>
						</td>
							<td width="60%" align="left" style=" padding-left:10px;">
								<strong>'.$name.'</strong>
							</td>
						</tr>						
						<tr>
							<td width="40%" align="right" style=" padding-right:10px;">
								<strong>Address:</strong>
							</td>
							<td width="40%" align="left" style=" padding-right:10px;">
								<strong>'.$ad1.$ad2.'.</strong>
							</td>
						</tr>
						<tr>
							<td width="40%" align="right" style=" padding-right:10px;">
								<strong>Phone No.:</strong>
							</td>
							<td width="40%" align="left" style=" padding-right:10px;">
								<strong>'.$land.'.</strong>
							</td>
						</tr>
						<tr>
							<td width="40%" align="right" style=" padding-right:10px;">
								<strong>Occupation:</strong>
							</td>
							<td width="40%" align="left" style=" padding-right:10px;">
								<strong>'.$occupation.'.</strong>
							</td>
						</tr>
						<tr>
							<td width="40%" align="right" style=" padding-right:10px;">
								<strong>Duration of volunteering:</strong>
							</td>
							<td width="40%" align="left" style=" padding-right:10px;">
								<strong>'.$duration.'.</strong>
							</td>
						</tr>
						<tr>
							<td width="40%" align="right" style=" padding-right:10px;">
								<strong>Comments:</strong>
							</td>
							<td width="40%" align="left" style=" padding-right:10px;">
								<strong>'.$msg.'.</strong>
							</td>
						</tr>
					</table>';
					
   @mail($send_to, $send_sub, stripslashes($send_body), $headers);
  header("location:signup_status.php?msg=4"); 
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary India Humanity Foundation</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="flashshow/jquery.js"></script>
<script type="text/javascript" language="javascript" src="flashshow/jquery.cross-slide.js"></script>
<script src="functions_volunteer.js" type="text/javascript"></script>
<script type="text/javascript"> 
$(function($) {
	$('#crossslide').crossSlide({
	 sleep: 2,
     fade: 1
	}, [
	<?php       
	 $file="homeslide.xml";
	 $xmlDoc = new DOMDocument(); 
     $xmlDoc->load($file); 
     $searchNode = $xmlDoc->getElementsByTagName( "slide" ); 
	 $numNode=$xmlDoc->getElementsByTagName( "slide" )->length;
	 $i=1;
     foreach( $searchNode as $searchNode ) 
     { ?>
	  {
		src:  '<?php echo $searchNode->getAttribute('path'); ?>'
		
		
	  }<?php 
			   if($numNode!=$i)
                {
	             echo ",";
	             }
	             $i++;
	               } ?>        
	]);
});
 
</script>
 
<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.innerfade.js"></script>
		<script type="text/javascript">
		 $.noConflict();
	 jQuery(document).ready(
				function(jQuery){
					jQuery('ul#portfolio').innerfade({
					    animationtype:'fade',
						speed: 2000,
						timeout: 3000,
						type: 'sequence',
						containerheight: '100px'
					});
			});
</script>
<link rel="stylesheet" href="css/reset.css"  type="text/css" media="all" />
<style type="text/css" media="screen, projection">
				@import url(css/jq_fade.css);
		</style>
<script type="text/javascript">
function hi(a)
{

if(a=="yes")
{

  document.getElementById('content').style.display="block";
 }
 else
 {
   document.getElementById('content').style.display="none";
 }
}
function assignpro()
{
 if(document.frm1.as.checked==true)
 {
  document.getElementById('assign').style.display="none";
 }
 else
 {
   document.getElementById('assign').style.display="block";
 }
}
</script>
<style type="text/css" media="screen">
.style2 {
	color: #91AF17;
	font-weight: bold;
}
.style3 {color: #FF0000}
.style4 {color: #000000; font-weight:normal;}
</style>
<script type="text/javascript" language="javascript">
function checkValidation()
{
  if(document.frm1.name.value=='')
  {
    alert("Please enter your name");
	document.frm1.name.focus();
	return false;
  }
  else if(document.frm1.ad1.value=='')
  {
    alert("Please enter your address");
	document.frm1.ad1.focus();
	return false;
  }
   else if(document.frm1.ln.value=='')
  {
    alert("Please enter your phone no");
	document.frm1.ln.focus();
	return false;
  }
   else if(document.frm1.occup.value=='')
  {
    alert("Please enter your Occupation");
	document.frm1.occup.focus();
	return false;
  }
   else if(document.frm1.condition.checked==false)
  {
    alert("Please tick on terms and conditions");
	document.frm1.condition.focus();
	return false;
  }
  else
  {
   return true;
  }
}
</script>			
</head>

<body>
<div style="position:fixed; float:right; right:0; z-index:100; width:42px; margin-top:111px;">&nbsp;</div>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="224" align="left" valign="top"><img src="images/logo.jpg" width="224" height="326" /></td>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="29" align="left" valign="top">&nbsp;</td>
              </tr>
               <?php include("includes/header.php"); ?>
              <tr>
                <td align="left" valign="top"><div id="crossslide" style="width:726px; height:271px"><img src="flashshow/progress.gif"  /></div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
       <?php include("includes/menu.php"); ?>
    </table></td>
  </tr>
  <tr>
    <td height="382" align="left" valign="top" bgcolor="#FFFFFF" style="padding-top:30px; padding-left:12px; padding-right:12px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="210" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
             <?php include("includes/left-menu.php"); ?>
          </tr>
          <tr>
            <td height="24" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top" style="padding:0px"><a href="donate.php"><img src="images/donate.jpg"/></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="20" align="left" valign="top"><img src="images/spacer.gif" width="20" height="1" /></td>
        <td align="left" valign="top" class="text"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top"><span class="heading1">VOLUNTEER</span><br />
We at RIHF look to you to help us make this programme a success. We urge you to come forward and volunteer to make a difference in the lives of those in need. As a volunteer you are expected to have hands on experience in the various projects that this programme has undertaken. Without the help of ordinary individuals like you, we cannot achieve the goal we have targeted.  Feel free to contact us if you think that you would be like to be a part of this mission to better lives and the environment.
<br /><br />
<form name="frm1" action="" method="post" onsubmit="return checkValidation();" >
<table width="694" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><span class="style2">Personal Information</span></td>
  </tr>
  <tr>
    <td width="169">Name</td>
    <td width="225"><input type="text" name="name" style="width:200px; border:thin #669900 dotted;" value="<?php echo $name;?>"/></td>
    <td width="300" id="err_name">&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Address (Line 1)</td>
    <td><input type="text" name="ad1" style="width:200px; border:thin #669900 dotted;" value="<?php echo $ad1;?>"/></td>
    <td id="err_ad1">&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Address (Line 2)</td>
    <td><input type="text" name="ad2" style="width:200px; border:thin #669900 dotted;" value="<?php echo $ad2;?>"/></td>
    <td>&nbsp;</td>
  </tr>
   <tr><td height='26'>Phone</td><td colspan='2'><table width='514' border='0' cellspacing='0' cellpadding='0'><tr><td width='167'>Country Code:&nbsp;&nbsp;<input type='text' name='lcc' style='width:50px; border:thin #669900 dotted;' value="<?php echo $ph_country;?>"/></td><td width='139'>City Code:&nbsp;&nbsp;<input type='text' name='lctc' style='width:50px; border:thin #669900 dotted;' value="<?php echo $ph_city;?>"/></td><td width='208'>No:&nbsp;&nbsp;<input type='text' name='ln' style='width:125px; border:thin #669900 dotted;' value="<?php echo $ph_no;?>"/></td></tr></table></td></tr>
  <tr>
    <td height="33">Occupation</td>
    <td><input type="text" name="occup" style="width:200px; border:thin #669900 dotted;" value="<?php echo $occup;?>"/></td>
    <td id="err_occ">&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Date of Birth</td>
    <td colspan="2">
	<select name="month" style="width:115px; border:1px solid #A2A2A2;  font-size:12px;border:thin #669900 dotted; outline:none;">
			                        <option value="" selected="selected" >- Select Month -</option>
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
								  <option value="05">May</option>
								  <option value="06">June</option>
								  <option value="07">July</option>
								  <option value="08">August</option>
								  <option value="09">September</option>
								  <option value="10">October</option>
								  <option value="11">November</option>
								  <option value="12">December</option>
                                  </select>                                 
								 <select name="day" style="width:70px; border:1px solid #A2A2A2; border:thin #669900 dotted; font-size:12px; outline:none;">                                    <option value="" selected="selected" >- Date -</option>
                                    <option value='01'>01</option>
                                    <option value='02'>02</option>
                                    <option value='03'>03</option>
                                    <option value='04'>04</option>
                                    <option value='05'>05</option>
                                    <option value='06'>06</option>
                                    <option value='07'>07</option>
                                    <option value='08'>08</option>
                                    <option value='09'>09</option>
                                    <option value='10'>10</option>
                                    <option value='11'>11</option>
                                    <option value='12'>12</option>
                                    <option value='13'>13</option>
                                    <option value='14'>14</option>
                                    <option value='15'>15</option>
                                    <option value='16'>16</option>
                                    <option value='17'>17</option>
                                    <option value='18'>18</option>
                                    <option value='19'>19</option>
                                    <option value='20'>20</option>
                                    <option value='21'>21</option>
                                    <option value='22'>22</option>
                                    <option value='23'>23</option>
                                    <option value='24'>24</option>
                                    <option value='25'>25</option>
                                    <option value='26'>26</option>
                                    <option value='27'>27</option>
                                    <option value='28'>28</option>
                                    <option value='29'>29</option>
                                    <option value='30'>30</option>
                                    <option value='31'>31</option>
                        </select>
								  <select name="year" style="width:70px; border:1px solid #A2A2A2; border:thin #669900 dotted; font-size:12px; outline:none;" >                                       <option value="" selected="selected" >- Year -</option>
								    <?php
									
					for($i=date("Y")-50;$i<=date("Y");$i++)
					{
					echo '<option value="'.$i.'">'.$i.'</option>';
					}
				?>
                                    
                                   </select>
	
	
	</td>
  </tr>
   <tr>
    <td height="29" colspan="3" class="style2">Fields Of Volunteer Service<span class="style4">(Tick any 2)</span> </td>
  </tr>
  <tr>
    <td height="28"><input type="checkbox" name="interest[]" value="doctor" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;Medical Aid- Doctor</td>
    <td><input type="checkbox" name="interest[]" value="nurse" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;&nbsp;Medical Aid- Nurse</td>
    <td><input type="checkbox" name="interest[]" value="paramedic" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;&nbsp;Medical Aid- Paramedic</td>
  </tr>
  <tr>
    <td height="28" colspan="2"><input type="checkbox" name="interest[]" value="psychiatrist" style="border:thin #669900 dotted;"/>      
      &nbsp; Trauma Care- Psychiatrist, Psychologist, Counsellor</td>
    <td><input type="checkbox" name="interest[]" value="general" style="border:thin #669900 dotted;"/>      &nbsp;&nbsp;&nbsp;General Volunteer</td>
    
  </tr>
  <tr>
    <td colspan="3">Are you willing to be assigned to relief projects across all parts of India?
     </td>
  </tr>
  <tr>
    <td height="26" colspan="2"><input type="checkbox" name="as" value="yes" style="border:thin #669900 dotted;" onclick="assignpro();"/>&nbsp; Yes</td>
    <td id="err_email">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3">
  <div id="assign" style="display:block;">
  <table>
  <tr>
    <td colspan="3">If no, specify at least 1 other state outside of your home state where you can be assigned
     </td>
  </tr>
  <tr>
    <td height="26" colspan="2"><input type="text" name="assignstate" style="width:200px; border:thin #669900 dotted;" value="<?php echo $assignstate;?>"/></td>
    <td id="err_assignstate">&nbsp;</td>
  </tr>
  </table>
  </div>
  </td>
  </tr>
   <tr>
    <td height="26" colspan="3">What is the duration of time you can commit to volunteering?</td>
	</tr>
	<tr>
    <td height="26" colspan="2">
	     <input name="radiobutton" type="radio" value="1week" style="border:thin #669900 dotted;" <?php if($duration=="1week"){?> checked="checked"<?php }?>/>
      1 week
        <input name="radiobutton" type="radio" value="2weeks" style="border:thin #669900 dotted;" <?php if($duration=="2weeks"){?> checked="checked"<?php }?>/> 
       2 weeks
	   <input name="radiobutton" type="radio" value="3weeks" style="border:thin #669900 dotted;" <?php if($duration=="3weeks"){?> checked="checked"<?php }?>/> 
       3 weeks
	   <input name="radiobutton" type="radio" value="4weeks" style="border:thin #669900 dotted;" <?php if($duration=="4weeks"){?> checked="checked"<?php }?>/> 
       4 weeks
	   </td>
    <td id="err_duration">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Do you have previous experience working in Disaster Management?
     </td>
  </tr>
  <tr>
    <td height="26" colspan="2"><input name="radiobutton1" type="radio" value="yes" style="border:thin #669900 dotted;" onclick="hi('yes');"/>
     Yes
        <input name="radiobutton1" type="radio" value="no" style="border:thin #669900 dotted;" onclick="hi('no');"/> 
        No </td>
    <td></td>
  </tr>
  <tr>
  <td height="26" colspan="3">
 <div id="content" style="display:none;">
 <table><tr>
    <td>Please provide details (within 50 words)</td>
    <td><textarea name="message" rows="4" style="width:200px; border:thin #669900 dotted;"><?php echo $message;?></textarea></td>
    <td id='err_message'>&nbsp;</td>
  </tr></table>
 </div>
 </td>
 </tr>
 <tr>
    <td height="26" colspan="3"><input type="checkbox" name="condition" id="condition" value="yes" style="border:thin #669900 dotted;" />&nbsp;Please tick on the box after agreeing to our terms and conditions</td>
    <td></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<div style="width:211px; height:58px; position:absolute; top:996px; left:317px; visibility:hidden;" id="tip1"><img src="images/tips1.png" /></div>
<div style="width:211px; height:58px; position:absolute; top:1026px; left:338px; visibility:hidden;" id="tip2"><img src="images/tips2.png" /></div>
<div style="width:211px; height:58px; position:absolute; top:1052px; left:324px; visibility:hidden;" id="tip3"><img src="images/tips3.png" /></div>
</td>
          </tr>
          <tr>
            <td height="26" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle">&nbsp;</div>
			</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
 <?php include("includes/footer.php"); ?>
</table>
</body>
</html>