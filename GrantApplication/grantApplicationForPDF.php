<?php
include("../connection.php");

$query = "SELECT HSADPs FROM grantAppEligible WHERE refappno='".$refappno."';";

$query = $query."SELECT * FROM `registrationForGrantapp` where refappno='".$refappno."';";		



$query = $query."SELECT GA.`refappno`,`granttitle`,  GA.`belongto`,GA.`district`, `qualifstatus` FROM `grantApplication` GA JOIN registrationForGrantapp RG ON RG.refappno=GA.refappno WHERE  GA.refappno='".$refappno."';";

$query = $query."SELECT GI.`refappno`, `hasSMC`, `isSMCwork`, `isADPprepare`, `ADPYr`, `ADPfacility`,schooladdress,`schoolname`, `addrstate`, `addrdistrict`, `village`, `pin`, `schooltype`, `noofboysstud`, `noofgirlsstud`, `nooftotalstud`, `noofmaleteach`, `nooffemaleteach`, `noofheadteach`, `nooftotalteach`, `noofmaletrainedteach`, `nooffemaletrainedteach`, `istrainedhead`, `optstructure`, `roofdamageextend`, `floordamageextend`, `Wallsdamageextend`, `doordamageextend`, `noofroom`, `noofclassroom`, `isroomforheadteach`, `isroomforteachstaff`, `isseperatestore`, `isstorewithheadteacherroom`, `islaboratory`, `iskitchenformidmeal`, `isspaceforeatmeal`, `isprovideelectricity`, `isunauthorizedsecure`, `isopenplaygrnd`, `hassportingequip`, `hasindoorgame`, `language1`, `language2`, `language3`, `hasheardCCEforstudent`, `isbookletreceived`, `isbookletsummarize`, `hasarrangelaggingchild`, `startyrforlaggingchild`, `hascomputer`, `noofcomputer`, `haselearning`, `elearning`, `ismentalstud`, `facilityformentalstud`, `willingformentalstud` FROM `grantappSchoolinfo` GI JOIN registrationForGrantapp RG ON RG.refappno=GI.refappno WHERE GI.refappno='".$refappno."';";
//die($query);

$query = $query. "SELECT SF.`refappno`, `isneedrepair`, `roofarea`, `rateforroof`, `costforroof`, `floorarea`, `rateforfloor`, `costforfloor`, `wallarea`, `rateforwall`, `costforwall`, `doorarea`, `ratefordoor`, `costfordoor`, `totalcost`, `isneedpaint`, `areaforpaint`, `costforpaint`, `painttype`, `hasbenches`, `existingbench`, `needbench`, `costforbench`, `existingdesk`, `needdesk`, `costfordesk`, `existingbenchdesk`, `needbenchdesk`, `costforbenchdesk`, `hassafewater`, `waterfacility`, `costtomakewatersafe`,`hasclentoilet`, `hasgirltoilet`, `urinalforgirls`, `toiletforgirls`, `hasboytoilet`, `urinalforboys`, `toiletforboys`, `hasteachertoilet`, `urinalforteacher`, `toiletforteacher`, `existingboystoilet`, `requireboystoilet`, `boystoiletcost`, `existinggirlstoilet`, `requiregirlstoilet`, `girlstoiletcost`, `existingteachertoilet`, `requireteachertoilet`, `teachertoiletcost`, `totaltoiletcost`, `haslibrary`, `isstuduselibrary`, `libbooktype`, `libbookexisting`, `libbookneed`, `libbookcost`, `bookalmirahexisting`, `bookalmirahneed`, `libalmirahcost`, `isgovtprovideuniform`, `reasonfornonsupplyuniform`, `uniformunitreq`, `uniformunitcost`, `uniformtotalcost`, `footwearunitreq`, `footwearunitcost`, `footweartotalcost`, `bothunitreq`, `bothunitcost`, `bothtotalcost`, `isspaceforteacher`, `availspacedetail`, `facilityinspaceforteacher`, `costforprovidefacility`, `costforprovidetable`,`hasindoorgamefacility`, `listindoorgamefacility`, `reqindoorgamefacility`, `costofindoorgamefacility`, `costforhappyschool`,administrativecost,totalprojectcost,clubcontribute, othercontribute, RILMcontribute,totalcontribution FROM schoolspecificfeature SF  JOIN grantAppEligible GAE ON GAE.refappno=SF.`refappno`  WHERE  SF.refappno='".$refappno."';";

$query = $query. "SELECT  `refappno`, `facilityid1`, `facilityid2`, `facilityid3`, `facilityid4`, `facilityid5`, `facilityid6`, `facilityid7`, `facilityid8`, `startmonthyr1`, `startmonthyr2`, `startmonthyr3`, `startmonthyr4`, `startmonthyr5`, `startmonthyr6`, `startmonthyr7`, `startmonthyr8`, `endmonthyr1`, `endmonthyr2`, `endmonthyr3`, `endmonthyr4`, `endmonthyr5`, `endmonthyr6`, `endmonthyr7`, `endmonthyr8`, `responsibles1`, `responsibles2`, `responsibles3`, `responsibles4`, `responsibles5`, `responsibles6`, `responsibles7`, `responsibles8`, `sustain1`, `sustain2` FROM  `grantAppAdditionalInfo` WHERE refappno='".$refappno."';";

	$arr=null;
	$cnt=-1;
	$arrcnt=-1;
	$assoc=array("HSADPlist","PCPInfo","elementryInfo","schoolInfo","specificInfo","additionalInfo");
	

		if(mysqli_multi_query($link,$query))
		{
			do
			{
				if($result=mysqli_use_result($link))
				{
					$cnt=-1;	
					$arrcnt=$arrcnt+1;
					while($row=mysqli_fetch_assoc($result))
					{
						$cnt=$cnt+1;
						$arr[$assoc[$arrcnt]][$cnt]=$row;
					}
					
					mysqli_free_result($result);
				}
					
			}while(mysqli_more_results($link) && mysqli_next_result($link));
		}
		

$basicquery = "SELECT * FROM `registrationForGrantapp` WHERE role='CP' and district='".$arr["PCPInfo"][0]["district"]."' and club='".$arr["PCPInfo"][0]["club"]."';";


$basicresult = mysqli_query($link,$basicquery);
if($basicresult) {
$basicarr[]=mysqli_fetch_assoc($basicresult);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>

</head>

<body>
<center>
<div>
<div >

    <div>        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
          
            <tr>
                <td style="background:url(../images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="100%" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Basic Application Info</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px;box-shadow:0 0 0px #999999; border:0px solid #FFFFFF">
                <tr>
                    <td width="30%" style=" padding:0 0 0 20px"><strong>Application No. </strong></td>
                    <td width="4%"><strong>:</strong></td>
                    <td width="66%">
					<?php echo $arr["PCPInfo"][0]["refappno"];?>
					
					</td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px"><strong>District</strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $arr["PCPInfo"][0]["district"] ?></tr>
				
				 <tr id="districttr">
                    <td style=" padding:0 0 0 20px"><strong><span>Club </span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $arr["PCPInfo"][0]["club"] ?>
					</td>
                </tr>
				 
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Contact Preson Name </strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $arr["PCPInfo"][0]["contactname"] ?></td>
                </tr>
				
					<tr>
                    <td style=" padding:0 0 0 20px"><strong>Contact Preson email </strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $arr["PCPInfo"][0]["contactemail"] ?></td>
                </tr>
					<tr>
                    <td style=" padding:0 0 0 20px"><strong>Club President name </strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $basicarr[0]["contactname"] ?></td>
                </tr>
				
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>Club President email </strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $basicarr[0]["contactemail"] ?></td>
                </tr>

		
                
</table>


    						</td>
    						<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            </td>
						</tr>
					</table>
                    
                </td>
               
            </tr>
			<tr>
                <td style="background:url(../images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="100%" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">Grant Application</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="0" cellpadding="5" cellspacing="0" width="100%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px;box-shadow:0 0 0px #999999; border:0px solid #FFFFFF">
                <tr>
                    <td width="30%" style=" padding:0 0 0 20px"><strong>Grant Title </strong></td>
                    <td width="4%"><strong>:</strong></td>
                    <td width="66%">
					<?php echo $arr["elementryInfo"][0]["granttitle"];?>
					
					</td>
                </tr>
				 <tr>
                    <td style=" padding:0 0 0 20px"><strong>You are from</strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $arr["elementryInfo"][0]["belongto"];?></tr>
				
				 <tr id="districttr">
                    <td style=" padding:0 0 0 20px"><strong><span>District Number </span></strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $arr["elementryInfo"][0]["district"];?>
					</td>
                </tr>
				 
				<tr>
                    <td style=" padding:0 0 0 20px"><strong>TRF Qualification Status of Club / District </strong></td>
                    <td><strong>:</strong></td>              
                    <td><?php echo $arr["elementryInfo"][0]["qualifstatus"];?></td>
                </tr>
				
				
				
                
</table>


    						</td>
    						<td width="20">&nbsp;</td>
                            <td width="210" valign="top">
                            </td>
						</tr>
					</table>
                    
                </td>
               
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
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
                                       	  <h1 style="padding:0; margin:0">School Information</h1>
                                        </td>
                                    
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px">								</div>
 
									<table border="1" bordercolor="#999999" cellpadding="7" cellspacing="0" width="100%" align="center" style="text-align:left; color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; border-collapse:collapse">
									<tr>
<td width="15%"><strong>Name of School </strong></td>
<td width="2%"><strong>:</strong></td>              
<td width="83%" colspan="3"><?php echo $arr["schoolInfo"][0]["schooladdress"]?></td>
</tr>
<tr>
    <td colspan="5">
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px"> 
		<tr>
        <td width="14%"><strong>School Address</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="84%"><?php echo $arr["schoolInfo"][0]["schooladdress"]?></td>
        </tr>
        <tr>
        <td width="14%"><strong>State</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="84%"><?php echo $arr["schoolInfo"][0]["addrstate"]?></td>
        </tr>
        <tr>
        <td><strong>District</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["schoolInfo"][0]["addrdistrict"]?></td>
        </tr>
        <tr>
        <td><strong>Village / Town</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["schoolInfo"][0]["village"]?></td>
        </tr>
        <tr>
        <td><strong>PIN</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["schoolInfo"][0]["pin"]?></td>
        </tr>
        </table>        </td>
</tr>
<tr>
  <td colspan="5">
  	<strong style="color:#000000">School Type :</strong>
			<?php if($arr["schoolInfo"][0]["schooltype"]=='Primary') echo "Primary (Class I – V)";
					else if($arr["schoolInfo"][0]["schooltype"]=='Elementary') echo "Elementary (Class I – VIII)";
					else if($arr["schoolInfo"][0]["schooltype"]=='Secondary') echo "Secondary (Class I – X)";?></td>
  </tr>


<tr>
  <td colspan="5">
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
        <tr>
            <td width="80%"><strong>Does the school have a School Management Committee (SMC), as required under the RTE Act?</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="18%"><?php echo $arr["schoolInfo"][0]["hasSMC"]?> </td>
        </tr>
        <tr id="SMCwork">
            <td><strong>If 'yes', is the SMC functioning regularly? (Ask the parents of several students of the school)</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["schoolInfo"][0]["isSMCwork"];?> </td>
        </tr>
        <tr>
          <td><strong>Has the school prepared an Annual Development Plan (ADP) for 2014-15 or 2015-16, as required under the RTE Act?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["isADPprepare"];?> </td>
        </tr>
		<?php if($arr["schoolInfo"][0]["isADPprepare"]=='Yes') { ?>
        <tr>
          <td colspan="3" id="ADPlist" >
          <strong>If ‘yes’, briefly describe the facilities envisaged in the ADP corresponding to those under the Happy Schools Project</strong> :<br />
		  
		  		<?php
						/*$existADPqry = "SELECT HSADPs FROM grantAppEligible WHERE refappno='$refappno';" ;
						$ADPresult = mysqli_query($link,$existADPqry);
						$existADP[] = mysqli_fetch_assoc($ADPresult);*/
							
					 	$ADPqry = "SELECT * FROM HSADPList WHERE id  in(".$arr["schoolInfo"]["ADPfacility"].");";
						$result = mysqli_query($link,$ADPqry);
						while($row = mysqli_fetch_assoc($result))
						{
							$ADParr[] = $row;
						}
						
						foreach($ADParr as $ADPval) {
				
				echo $ADPval["facility"];?> &nbsp;<br />
					 <?php } ?>
          </td>
          </tr>
        <?php } ?>
        <tr>
          <td><strong>Mention the year of the ADP</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["ADPYr"]?></td>
        </tr>
    </table>  </td>
</tr>

<tr height="7">
  <td colspan="5" style="border-left:1px solid #FFFFFF; border-right:1px solid #FFFFFF"></td>
</tr>




<tr>
  <td colspan="5">
  	<strong style="color:#000000">No. of Students :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td width="7%"><strong>Boys</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="18%"><?php echo $arr["schoolInfo"][0]["noofboysstud"]?></td>
            <td width="5%"><strong>Girls</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="14%"><?php echo $arr["schoolInfo"][0]["noofgirlsstud"]?></td>
            <td width="16%"><strong>Total No. of Students</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="34%"><?php echo $arr["schoolInfo"][0]["nooftotalstud"]?></td>
        </tr>
    </table>  </td>
</tr>

<tr>
<td colspan="5">
	<strong style="color:#000000">No. of Teachers :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td width="6%"><strong>Male</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="13%"><?php echo $arr["schoolInfo"][0]["noofmaleteach"]?></td>
            <td width="8%"><strong>Female</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="12%"><?php echo $arr["schoolInfo"][0]["nooffemaleteach"]?></td>
            <td width="15%"><strong>Head Teacher</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="12%"><?php echo $arr["schoolInfo"][0]["noofheadteach"]?></td>
            <td width="14%"><strong>Total Teacher</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="12%"><?php echo $arr["schoolInfo"][0]["nooftotalteach"]?></td>
        </tr>
    </table></td>
</tr>


<tr>
<td colspan="5">
<strong style="color:#000000">No. of Trained Teachers :</strong><br />
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
  <tr>
    <td width="8%"><strong>Male</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="15%"><?php echo $arr["schoolInfo"][0]["noofmaletrainedteach"]?></td>
    <td width="10%"><strong>Female</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="15%"><?php echo $arr["schoolInfo"][0]["nooffemaletrainedteach"]?></td>
    <td width="16%"><strong>Trained Head Teacher</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="30%"> <?php echo $arr["schoolInfo"][0]["istrainedhead"];?></td>
  </tr>
</table></td>
</tr>

<tr>
<td colspan="5">
	<strong style="color:#000000">School Building (Current Status) :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td width="34%"><strong>Structure</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="64%"><?php echo $arr["schoolInfo"][0]["optstructure"]?></td>
        </tr>
        <tr>
            <td colspan="3">
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="3" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse">
<tr bgcolor="#f5f5f5">
<td style="text-align:center; font-weight:bold">Part of Structure</td>
<td style="text-align:center; font-weight:bold">Extent of Damage</td>
</tr>
<tr><td><strong>Roof</strong></td>
<td><?php echo $arr["schoolInfo"][0]["roofdamageextend"]?></td></tr>
<tr><td><strong>Floor</strong></td>
<td><?php echo $arr["schoolInfo"][0]["floordamageextend"]?></td></tr>
<tr><td><strong>Walls</strong></td>
<td><?php echo $arr["schoolInfo"][0]["Wallsdamageextend"]?></td></tr>
<tr><td><strong>Doors and Windows</strong></td>
<td> <?php echo $arr["schoolInfo"][0]["doordamageextend"]?></td></tr>
</table>            </td>
            </tr>
        <tr>
          <td><strong>Total no. of rooms in the School Building</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["noofroom"]?></td>
        </tr>
        <tr>
          <td><strong>No. of class rooms</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["noofclassroom"]?></td>
        </tr>
        <tr>
          <td><strong>Is there a separate room for</strong></td>
          <td><strong>:</strong></td>
          <td>
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="3" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse">
<tr>
<td width="50%"><strong>Head Teacher</strong></td>
<td width="2%"><strong>:</strong></td>
<td width="48%"> <?php echo $arr["schoolInfo"][0]["isroomforheadteach"]?></td>
</tr>
<tr>
  <td><strong>Teaching staff</strong></td>
  <td><strong>:</strong></td>
  <td><?php echo $arr["schoolInfo"][0]["isroomforteachstaff"]?></td>
  </tr>
<tr>
<td><strong>Stores (separate)</strong></td>
<td><strong>:</strong></td>
<td><?php echo $arr["schoolInfo"][0]["isseperatestore"]?></td>
</tr>
<tr>
  <td><strong>Stores (along with the Head Teacher's room)</strong></td>
  <td><strong>:</strong></td>
  <td><?php echo $arr["schoolInfo"][0]["isstorewithheadteacherroom"]?></td>
  </tr>
<tr>
<td><strong>Laboratory</strong></td>
<td><strong>:</strong></td>
<td><?php echo $arr["schoolInfo"][0]["islaboratory"]?></td>
</tr>
<tr>
  <td><strong>Kitchen only, for cooking mid-day meals</strong></td>
  <td><strong>:</strong></td>
  <td><?php echo $arr["schoolInfo"][0]["iskitchenformidmeal"]?></td>
  </tr>
<tr>
<td><strong>Kitchen and space for eating mid-day meals</strong></td>
<td><strong>:</strong></td>
<td><?php echo $arr["schoolInfo"][0]["isspaceforeatmeal"]?></td>
</tr>
</table>          </td>
        </tr>
        <tr>
          <td><strong>Does the school have power supply (electricity/solar/others)?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["isprovideelectricity"]?></td>
        </tr>
        <tr>
          <td><strong>Is the building secure against unauthorized entry during non-school hours?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["isunauthorizedsecure"]?></td>
        </tr>
        <tr>
          <td><strong>Is there an open play ground?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["isopenplaygrnd"]?></td>
        </tr>
        <tr>
          <td><strong>Is any sporting equipment available?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["hassportingequip"]?></td>
        </tr>
        <tr>
          <td><strong>Is any indoor game or play equipment available?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["hasindoorgame"]?></td>
        </tr>
    </table></td>
</tr>
<tr>
<td colspan="5">
	<strong style="color:#000000">Medium of Instruction :</strong><br />
    <table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td><strong>1st Language</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["schoolInfo"][0]["language1"]?></td>
            <td><strong>2nd Language</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["schoolInfo"][0]["language2"]?></td>
            <td><strong>3rd Language</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["schoolInfo"][0]["language3"]?></td>
        </tr>
    </table></td>
</tr>


<tr height="7">
  <td colspan="5" style="border-left:1px solid #FFFFFF; border-right:1px solid #FFFFFF"></td>
</tr>
<tr>
<td colspan="5">
	<strong style="color:#000000">Continuous and Comprehensive Evaluation (CCE)</strong><br />
    <table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
        <tr>
            <td><strong>Please ask the Head Teacher (in the absence of Head Teacher, the senior-most teacher) if he/she has heard of CCE for students</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["schoolInfo"][0]["hasheardCCEforstudent"]?></td>
        </tr>
		<?php if($arr["schoolInfo"][0]["hasheardCCEforstudent"]=='Yes') {?>
        <tr id="bookletreceived">
            <td><strong>If ‘yes’, please ask him/her whether any booklet or instructions on CCE has been received</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["schoolInfo"][0]["isbookletreceived"]?> </td>
        </tr>
		<?php } ?>
		<?php if($arr["schoolInfo"][0]["isbookletreceived"]=='Yes') {?>
        <tr id="bookletsummarize">
          <td><strong>If again ‘yes’, please ask him/her to show the booklet and briefly summarize what it says</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["isbookletsummarize"]?></td>
        </tr>
		<?php } ?>
        <tr>
          <td><strong>Is there any arrangement for helping lagging children with their studies during/after school hours?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["hasarrangelaggingchild"]?></td>
        </tr>
        <tr>
          <td><strong>If there is no such arrangement, please ascertain if the school plans to start such supplemental teaching and if so, when</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["startyrforlaggingchild"]?></td>
        </tr>
        <tr>
          <td><strong>Are there computers in the school?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["hascomputer"]?></td>
        </tr>
		<?php if($arr["schoolInfo"][0]["hascomputer"]=='Yes') {?>
        <tr id="noofcomputer" >
          <td><strong>If ‘yes’, how many functioning computers are there?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["noofcomputer"]?></td>
        </tr>
		<?php } ?>
        <tr>
          <td><strong>Are there e-learning facilities available at the school?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["haselearning"]?></td>
        </tr>
		<?php if($arr["schoolInfo"][0]["haselearning"]=='Yes') {?>
        <tr id="elearning">
          <td><strong>If, ‘yes’, please describe the e-learning facilities available</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["elearning"]?></td>
        </tr>
		<?php } ?>
        <tr>
          <td><strong>Are there any physically or mentally challenged children in the school?</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["ismentalstud"]?></td>
        </tr>
		<?php if($arr["schoolInfo"][0]["ismentalstud"]=='Yes') {?>
        <tr id="facilityformentalstud">
          <td><strong>If 'yes', please briefly describe the facilities for teaching such children and the nature of training of the teacher/s in charge</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["facilityformentalstud"]?></td>
        </tr>
		<?php }
		if($arr["schoolInfo"][0]["ismentalstud"]=='No') {
		 ?>
        <tr id="willingformentalstud">
          <td><strong>If 'no', please ascertain if the school is willing to take in such children and the type of assistance it needs to teach such children</strong></td>
          <td><strong>:</strong></td>
          <td><?php echo $arr["schoolInfo"][0]["willingformentalstud"]?></td>
        </tr>
		<?php } ?>
    </table></td>
</tr>

</table>
								
									
    						</td>
						</tr>
					</table>
                    
                  
				  
                </td>
                <td style="background:url(../images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="../images/h_bottom_l.png" /></td>
                <td style="background:url(../images/h_bottom.png)"></td>
                <td width="8"><img src="../images/h_bottom_r.png" /></td>
            </tr>
        </table>
          
		  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
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
                                       	  <h1 style="padding:0; margin:0">Part - C : Proposed Activity Details</h1>
                                        </td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999; margin-bottom:10px"></div>
                                
<table border="1" bordercolor="#999999" cellpadding="7" cellspacing="0" width="100%" align="center" style="text-align:left; color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; border-collapse:collapse">
<?php 
$SDPArray=explode(',',$arr["HSADPlist"][0]["HSADPs"]);
if(in_array('1',$SDPArray)) { 
 ?>
<tr class="SDP_1">
    <td colspan="3">
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
            <tr>
                <td width="29%"><strong>Does the school building need repairs?</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="69%"><?php echo $arr["specificInfo"][0]["isneedrepair"]?></td>
            </tr>
			<?php if($arr["specificInfo"][0]["isneedrepair"]=='Yes') { ?>
            <tr id="repairneed">
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
<td><?php echo $arr["specificInfo"][0]["roofarea"]?></td>
<td><?php echo $arr["specificInfo"][0]["rateforroof"]?></td>
<td><?php echo $arr["specificInfo"][0]["costforroof"]?></td>
</tr>
<tr>
<td><strong>Floor</strong></td>
<td><?php echo $arr["specificInfo"][0]["floorarea"]?></td>
<td><?php echo $arr["specificInfo"][0]["rateforfloor"]?></td>
<td><?php echo $arr["specificInfo"][0]["costforfloor"]?></td>
</tr>
<tr>
<td><strong>Walls</strong></td>
<td><?php echo $arr["specificInfo"][0]["wallarea"]?></td>
<td><?php echo $arr["specificInfo"][0]["rateforwall"]?></td>
<td><?php echo $arr["specificInfo"][0]["costforwall"]?></td>
</tr>
<tr>
<td><strong>Doors and Windows</strong></td>
<td><?php echo $arr["specificInfo"][0]["doorarea"]?></td>
<td><?php echo $arr["specificInfo"][0]["ratefordoor"]?></td>
<td><?php echo $arr["specificInfo"][0]["costfordoor"]?></td>
</tr>
<tr>
<td><strong>Estimated total cost (Rs.)</strong></td>
<td colspan="3"><?php echo $arr["specificInfo"][0]["totalcost"]?></td>
</tr>
</table>				
</td>
			</tr>
<?php 
}

?>
<tr>
<td colspan="3">
	<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
        <tr>
            <td width="29%"><strong>Does the school building need painting?</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="69%"><?php echo $arr["specificInfo"][0]["isneedpaint"]?></td>

        </tr>
<?php
if($arr["specificInfo"][0]["isneedpaint"]=='Yes') {
?>
        <tr id="needpaint">
            <td colspan="3">
                <strong>If 'yes', please describe the following :</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
    <tr>
        <td width="30%"><strong>Total area (sq. ft.) needing painting</strong></td>
        <td width="2%"><strong>:</strong></td>
        <td width="68%"><?php echo $arr["specificInfo"][0]["areaforpaint"]?></td>
    </tr>
    <tr>
        <td><strong>Estimated total  cost of painting (Rs.)</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["specificInfo"][0]["costforpaint"]?></td>
    </tr>
    <tr>
        <td><strong>Type of Paint </strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["specificInfo"][0]["painttype"]?></td>
    </tr>
</table>            
</td>
    </tr>
<?php } ?>
    </table></td>
</tr>


        </table>
    </td>

</tr>

<?php } if(in_array('2',$SDPArray)) {  ?>
<tr  class="SDP_2" >
<td colspan="3">
	<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
        <tr>
            <td width="56%"><strong>Does the school building have sufficient benches and desks in each class room?</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="42%"><?php echo $arr["specificInfo"][0]["hasbenches"]?> </td>
        </tr>
<?php
if($arr["specificInfo"][0]["hasbenches"]=='No') {
?>		
        <tr id="benchdetail" >
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
<td><?php echo $arr["specificInfo"][0]["existingbench"]?></td>
<td><?php echo $arr["specificInfo"][0]["needbench"]?></td>
<td><?php echo $arr["specificInfo"][0]["costforbench"]?></td>
</tr>
<tr>
<td ><strong>Desks</strong></td>
<td><?php echo $arr["specificInfo"][0]["existingdesk"]?></td>
<td><?php echo $arr["specificInfo"][0]["needdesk"]?></td>
<td><?php echo $arr["specificInfo"][0]["costfordesk"]?></td>
</tr>
<tr>
<td ><strong>Bench-Desk sets</strong></td>
<td><?php echo $arr["specificInfo"][0]["existingbenchdesk"]?></td>
<td><?php echo $arr["specificInfo"][0]["needbenchdesk"]?></td>
<td><?php echo $arr["specificInfo"][0]["costforbenchdesk"]?></td>
</tr>

</table>            </td>
        </tr>
		<?php } ?>
    </table></td>
</tr>
<?php } if(in_array('3',$SDPArray)) {  ?>
<tr class="SDP_3">
<td colspan="3"><table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="56%"><strong>Does the school have adequate and safe drinking water supply?</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="42%"><?php echo $arr["specificInfo"][0]["hassafewater"]?> </td>
  </tr>
  <?php
if($arr["specificInfo"][0]["hassafewater"]=='No') {
?>
  <tr id="waterfacility">
    <td colspan="3"><strong>If 'no', please give the details :</strong><br />
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
          
          <tr>
            <td width="52%" ><strong>A descriptive account of the existing facility</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="46%"><?php echo $arr["specificInfo"][0]["waterfacility"]?></td>
            </tr>
          <tr>
            <td ><strong>Is the water potable (safe)?</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["specificInfo"][0]["hassafewater"]?></td>
            </tr>
          <tr>
            <td ><strong>Estimated total cost to ensure safe and adequate drinking water supply</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["specificInfo"][0]["costtomakewatersafe"]?></td>
            </tr>
		


      </table></td>
  </tr>

<?php } ?>
</table></td>
</tr>
<?php } if(in_array('4',$SDPArray)) {  ?>
<tr class="SDP_4">
<td colspan="3">
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td colspan="3"><strong>Does the school have Clean and Hygienic Toilet Facility: </strong><?php echo $arr["specificInfo"][0]["hasclentoilet"]?>
  	</td>
	</tr> 
  <tr>
    <td colspan="3"><strong>Does the school have :</strong><br />
        <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
          <tr>
            <td width="44%" ><strong>Separate toilet for girls in usable* condition</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td width="54%"><?php echo $arr["specificInfo"][0]["hasgirltoilet"]?></td>
          </tr>
		  <?php
if($arr["specificInfo"][0]["hasgirltoilet"]=='Yes') {
?>
          <tr id="girltoiletcondition">
            <td colspan="3" >
            <strong>If ‘yes’,</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
                <tr>
                <td width="38%"><strong>No. of urinals</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="60%"><?php echo $arr["specificInfo"][0]["urinalforgirls"]?></td>
                </tr>
                <tr>
                <td><strong>No. of toilet seats</strong></td>
                <td><strong>:</strong></td>
                <td><?php echo $arr["specificInfo"][0]["toiletforgirls"]?></td>
                </tr>
                </table>            </td>
            </tr>
			
			<?php } ?>
          <tr>
            <td ><strong>Separate toilet for boys in usable* condition</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["specificInfo"][0]["hasboytoilet"]?></td>
          </tr>
<?php
if($arr["specificInfo"][0]["hasgirltoilet"]=='Yes') {
?>
          <tr id="boytoiletcondition">
            <td colspan="3">
            	<strong>If ‘yes’,</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
                <tr>
                <td width="38%"><strong>No. of urinals</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="60%"><?php echo $arr["specificInfo"][0]["urinalforboys"]?></td>
                </tr>
                <tr>
                <td><strong>No. of toilet seats</strong></td>
                <td><strong>:</strong></td>
                <td><?php echo $arr["specificInfo"][0]["toiletforboys"]?></td>
                </tr>
                </table>            </td>
            </tr>
			<?php } ?>
          <tr>
            <td ><strong>Separate  toilet for Teachers in usable* condition</strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $arr["specificInfo"][0]["hasteachertoilet"]?></td>
          </tr>
		  <?php
if($arr["specificInfo"][0]["hasteachertoilet"]=='Yes') {
?>
          <tr id="teachertoiletcondition" >
            <td colspan="3">
            	<strong>If ‘yes’,</strong><br />
                <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
                <tr>
                <td width="38%"><strong>No. of urinals</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td width="60%"><?php echo $arr["specificInfo"][0]["urinalforteacher"]?></td>
                </tr>
                <tr>
                <td><strong>No. of toilet seats</strong></td>
                <td><strong>:</strong></td>
                <td><?php echo $arr["specificInfo"][0]["urinalforteacher"]?></td>
                </tr>
                </table>            </td>
            </tr>
			<?php } ?>
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
<td><?php echo $arr["specificInfo"][0]["existingboystoilet"]?></td>
<td><?php echo $arr["specificInfo"][0]["requireboystoilet"]?></td> 
<td><?php echo $arr["specificInfo"][0]["boystoiletcost"]?></td>
</tr>
<tr>
<td><strong>Girls</strong></td>
<td><?php echo $arr["specificInfo"][0]["existinggirlstoilet"]?></td>
<td><?php echo $arr["specificInfo"][0]["requiregirlstoilet"]?></td> 
<td><?php echo $arr["specificInfo"][0]["girlstoiletcost"]?></td>
</tr>
<tr>
<td><strong>Teacher</strong></td>
<td><?php echo $arr["specificInfo"][0]["existingteachertoilet"]?></td>
<td><?php echo $arr["specificInfo"][0]["requireteachertoilet"]?></td> 
<td><?php echo $arr["specificInfo"][0]["teachertoiletcost"]?></td>
</tr>
<tr>
<td><strong>Total cost</strong></td>
<td colspan="3"><?php echo $arr["specificInfo"][0]["totaltoiletcost"]?></td>
</tr>


</table>     </td>
  </tr>
</table>
</td>
</tr>
<?php } if(in_array('5',$SDPArray)) {  ?>
<tr  class="SDP_5">
<td colspan="3">
<table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="42%"><strong>Does the school have a functioning  library with books</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="56%"><?php echo $arr["specificInfo"][0]["haslibrary"]?></td>
  </tr>
  <tr>
    <td><strong>Do the students use the library (ask students, in particular) : </strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["isstuduselibrary"]?></td>
  </tr>
  <tr>
    <td><strong>Briefly describe the type of books available in the library</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["libbooktype"]?></td>
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
<td><?php echo $arr["specificInfo"][0]["libbookexisting"]?></td>
<td><?php echo $arr["specificInfo"][0]["libbookneed"]?></td>
<td><?php echo $arr["specificInfo"][0]["libbookcost"]?></td>
</tr>
<tr bgcolor="#f5f5f5">
<td width="33%"><strong>Existing Number of almirah/book hangars</strong></td>
<td width="33%"><strong>No. of almirahs/book hangers to be provided</strong></td>
<td width="34%"><strong>Estimated Cost of procuring almirahs/book hangers(Rs.)</strong></td>
</tr>
<tr>
<td><?php echo $arr["specificInfo"][0]["bookalmirahexisting"]?></td>
<td><?php echo $arr["specificInfo"][0]["bookalmirahneed"]?></td>
<td><?php echo $arr["specificInfo"][0]["libalmirahcost"]?></td>
</tr>


</table>    </td>
    </tr>
</table></td>
</tr>
<?php } 
if(in_array('6',$SDPArray)) {  ?>
<tr class="SDP_6">
<td colspan="3"><table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="55%"><strong>Is the Government supplying school students uniforms and footwear free of cost</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="43%"><?php echo $arr["specificInfo"][0]["isgovtprovideuniform"]?></td>
  </tr>
  <tr>
    <td><strong>If 'no' please briefly state the reasons for non-supply of uniforms and footwear</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["reasonfornonsupplyuniform"]?></td>
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
        <td ><?php echo $arr["specificInfo"][0]["uniformunitreq"]?></td>
        <td ><?php echo $arr["specificInfo"][0]["uniformunitcost"]?></td>
        <td ><?php echo $arr["specificInfo"][0]["uniformtotalcost"]?></td>
      </tr>
      <tr>
        <td ><strong>Footwear (2 pairs) </strong></td>
        <td ><?php echo $arr["specificInfo"][0]["footwearunitreq"]?></td>
        <td ><?php echo $arr["specificInfo"][0]["footwearunitcost"]?></td>
        <td ><?php echo $arr["specificInfo"][0]["footweartotalcost"]?></td>
      </tr>
    </table></td>
  </tr>
 

</table></td>
</tr>
<?php } if(in_array('7',$SDPArray)) {  ?>
<tr class="SDP_7">
<td colspan="3">
	<strong>Space for Teachers :</strong><br />
    <table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse; margin-top:7px">
      
      <tr>
        <td width="55%" ><strong>Is the space/room for teachers sufficient?</strong></td>
        <td width="2%" ><strong>:</strong></td>
        <td width="43%" ><?php echo $arr["specificInfo"][0]["isspaceforteacher"]?></td>
        </tr>
      <tr>
        <td><strong>If “no”, describe details of availability of space</strong></td>
        <td><strong>:</strong></td>
        <td>"<?php echo $arr["specificInfo"][0]["availspacedetail"]?></td>
        </tr>
      <tr>
        <td><strong>What are the facilities available in this space/room?</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["specificInfo"][0]["facilityinspaceforteacher"]?></td>
        </tr>
      <tr>
        <td><strong>Estimated total cost (Rs.) of creating and equipping adequate space for teachers</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["specificInfo"][0]["costforprovidefacility"]?></td>
      </tr>
      <tr>
        <td><strong>Estimated total cost (Rs.) of procuring facilities (tables/chairs/light/others) for teachers</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $arr["specificInfo"][0]["costforprovidetable"]?></td>
      </tr>
	    

    </table></td>
</tr>
<?php } if(in_array('8',$SDPArray)) {  ?>
<tr  class="SDP_8" >
<td colspan="3"><table width="100%" border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="5" align="center" style="text-align:left; border-collapse:collapse">
  <tr>
    <td width="52%"><strong>Are indoor sports/games facilities available in the school </strong></td>
    <td width="2%"><strong>:</strong></td>
    <td width="46%"><?php echo $arr["specificInfo"][0]["hasindoorgamefacility"]?></td>
  </tr>
  <tr>
    <td><strong>If “yes”, list facilities available/to be upgraded</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["listindoorgamefacility"]?></td>
  </tr>
  <tr>
    <td><strong>If “no”,  list facilities to be provided </strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["reqindoorgamefacility"]?></td>
  </tr>
  <tr>
    <td><strong>Estimated cost of Indoor sports/games facilities (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["costofindoorgamefacility"]?></td>
  </tr>
  	   

  
</table></td>
</tr>
<?php } ?>
  <tr>
    <td><strong>Total estimated cost for the school to be converted into a Happy School (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["costforhappyschool"]?></td>
  </tr>

  <tr>
    <td><strong>Add: Administrative Cost (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["administrativecost"]?></td>
  </tr>
  <tr>
    <td><strong>Total ProjectCost (Rs.)</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["totalprojectcost"]?></td>
  </tr>
    <tr>
    <td colspan="3"><strong>Mode of Finance</strong></td>
  </tr>

  
    <tr>
    <td colspan="3"><table>
		<tr><td><strong>(a)	Club Contribution</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["clubcontribute"]?></td></tr>
		<tr><td><strong>(b)	Contribution from other sources </strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["othercontribute"]?></td></tr>
		<tr><td><strong>(c) Grant Requested from RILM </strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["RILMcontribute"]?></td></tr>
	<tr><td><strong>(d) Total Contribution </strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $arr["specificInfo"][0]["totalcontribution"]?></td></tr>
	</table></td>
  </tr>

</table>

        
	</td>
</tr>
</table>
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
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
                <td><?php echo ($i+1);?></td>
                <td><?php echo $ADParr[$i]["facility"]?></td>   
				          
                <td><?php if($arr["additionalInfo"][0]["startmonthyr".($i+1)]!='' && $arr["additionalInfo"][0]["startmonthyr".($i+1)]!='/') {?><?php echo $arr["additionalInfo"][0]["startmonthyr".($i+1)]." to ". $arr["additionalInfo"][0]["endmonthyr".($i+1)] ?><?php }?></td>
                <td><?php echo $arr["additionalInfo"][0]["responsibles".($i+1)]?></td>
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
            <td width="38%" valign="top"><?php echo $arr["additionalInfo"][0]["sustain1"]?></td>
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
            <td valign="top"><?php echo $arr["additionalInfo"][0]["sustain2"]?></td>
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
            <td colspan="3" align="center">&nbsp;
                </td>
            </tr>
</table>
    						</td>
    						
						</tr>
					</table>
                    
                </td>
                <td style="background:url(../images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="../images/h_bottom_l.png" /></td>
                <td style="background:url(../images/h_bottom.png)"></td>
                <td width="8"><img src="../images/h_bottom_r.png" /></td>
            </tr>
        </table>
    </div> 

    
    
</div>
</div>
</center>

</body>
</html>






