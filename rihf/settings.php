<?php
session_start();
include("admin/includes/connect.php"); 
$email=$_SESSION['uid'];
$query=mysql_query("select * from login where email='$email'");
$rec=mysql_fetch_array($query);
$type=$rec['type'];
//-----------------------------------------------------------
$health=$rec['health'];
$environment=$rec['environment'];
$education=$rec['education'];
$empowerment=$rec['empowerment'];
$disaster=$rec['disaster'];
$polio=$rec['polio'];
//-----------------------------------------------------------
if($type!="Organization")
{
$query1=mysql_query("select * from nonorg where email='$email'");
$rec1=mysql_fetch_array($query1);
$name=$rec1['name'];
$ad1=$rec1['ad1'];
$ad2=$rec1['ad2'];
$city=$rec1['city'];
$zip=$rec1['zip'];
$country=$rec1['country'];
$age=$rec1[age];
$sex=$rec1['sex'];
$ph_country=$rec1[ph_country];
$ph_city=$rec1[ph_city];
$ph_no=$rec1[ph_no];
$mobile_country=$rec1[mobile_country];
$mobile_no=$rec1[mobile_no];
$qualification=$rec1['qualification'];

$query2=mysql_query("select * from newsletter where id_em='$email'");
$nn=mysql_num_rows($query2);
if($nn>0)
{
$news="yes";
}
else
{
$news="no";
}
$recem=mysql_fetch_array($query2);
$atem=$recem['email'];

$query2=mysql_query("select * from sms_cust where id_em='$email'");
$nn=mysql_num_rows($query2);
if($nn>0)
{
$sms="yes";
}
else
{
$sms="no";
}
?>
<form name="frm1" action="update_reg.php" method="post" onsubmit="return nr();">
<table cellpadding='0' cellspacing='0' width='693'>
<tr><td width='300'>Name<span class='style3'>*</span></td><td width='200'><input type='text' name='name'  style='width:200px; border:thin #669900 dotted;' value="<?php echo $name;?>"/></td><td id='err_name' width='200' align='right'>&nbsp;</td></tr><tr><td height='33'>Address (Line 1)<span class='style3'>*</span></td><td><input type='text' name='ad1' style='width:200px; border:thin #669900 dotted;' value="<?php echo $ad1;?>"/></td><td id='err_ad1' align='right'>&nbsp;</td></tr><tr><td height='33'>Address (Line 2)</td><td><input type='text' name='ad2' style='width:200px; border:thin #669900 dotted;' value="<?php echo $ad2;?>"/></td><td id='err_ad2'>&nbsp;</td></tr><tr><td height='33'>City<span class='style3'>*</span></td><td><input type='text' name='city' style='width:200px; border:thin #669900 dotted;' value="<?php echo $city;?>"/></td><td id='err_city' align='right'>&nbsp;</td></tr><tr><td height='33'>Zip<span class='style3'>*</span></td><td><input type='text' name='zip' style='width:200px; border:thin #669900 dotted;' value="<?php echo $zip;?>"/></td><td id='err_zip' align='right'>&nbsp;</td></tr><tr><td height='33'>Country<span class='style3'>*</span></td><td><select name='country' style='width:203px; border:thin #669900 dotted;'><option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='American Samoa'>American Samoa</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Anguilla'>Anguilla</option><option value='Antarctica'>Antarctica</option><option value='Antigua and Barbuda'>Antigua and Barbuda</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Aruba'>Aruba</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option alue='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegowina'>Bosnia and Herzegowina</option><option value='Botswana'>Botswana</option><option value='Bouvet Island'>Bouvet Island</option><option value='Brazil'>Brazil</option><option value='British Indian Ocean Territory'>British Indian Ocean Territory</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Cayman Islands'>Cayman Islands</option><option value='Central African Republic'>Central African Republic</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Christmas Island'>Christmas Island</option><option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Cook Islands'>Cook Islands</option><option value='Costa Rica'>Costa Rica</option><option value='Cote d'Ivoire'>Cote d'Ivoire</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Dem Rep of Congo'>Dem Rep of Congo</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='East Timor'>East Timor</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Estonia'>Estonia</option><option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas)</option><option value='Faroe Islands'>Faroe Islands</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='France, Metropolitan'>France, Metropolitan</option><option value='French Guiana'>French Guiana</option><option value='French Polynesia'>French Polynesia</option><option value='French Southern Territories'>French Southern Territories</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Gibraltar'>Gibraltar</option><option value='Greece'>Greece</option><option value='Greenland'>Greenland</option><option  value='Grenada'>Grenada</option><option value='Guadeloupe'>Guadeloupe</option><option value='Guam'>Guam</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option>  <option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Heard and Mc Donald Islands'>Heard and Mc Donald Islands</option><option value='Holy see (Vatican City State)'>Holy see (Vatican City State)</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India' selected='selected'>India</option>    <option value='Indonesia'>Indonesia</option><option value='Iran (Islamic Republic of)'>Iran (Islamic Republic of)</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Korea'>Korea</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macau'>Macau</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Martinique'>Martinique</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mayotte'>Mayotte</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova, Republic of'>Moldova, Republic of</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montserrat'>Montserrat</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='Netherlands Antilles'>Netherlands Antilles</option><option value='New Caledonia'>New Caledonia</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='Niue'>Niue</option><option value='Norfolk Island'>Norfolk Island</option><option value='Northern Mariana Islands'>Northern Mariana Islands</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Palestinian'>Palestinian</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option> <option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Pitcairn'>Pitcairn</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Puerto Rico'>Puerto Rico</option><option value='Qatar'>Qatar</option><option value='Reunion'>Reunion</option><option value='Romania'>Romania</option><option value='Russian Federation'>Russian Federation</option><option value='Rwanda'>Rwanda</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Saint Vincent and Grenadines'>Saint Vincent and the Grenadines</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome & Principe'>Sao Tome & Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Georgia'>South Georgia </option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='St. Helena'>St. Helena</option><option value='St. Pierre & Miquelon'>St. Pierre & Miquelon</option><option value='Sudan'>Sudan</option><option value='SuriName'>SuriName</option><option value='Svalbard & Jan Mayen'>Svalbard & Jan Mayen</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syrian Arab Republic'>Syrian Arab Republic</option><option value='Taiwan, Rep of China'>Taiwan, Rep China</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania Republic of</option><option value='Thailand'>Thailand</option><option value='Togo'>Togo</option><option value='Tokelau'>Tokelau</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option> <option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Turks and Caicos'>Turks and Caicos</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United Kingdom'>United Kingdom</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Virgin Islands (British)'>Virgin Islands (British)</option><option value='Virgin Islands (U.S.)'>Virgin Islands (U.S.)</option><option value='Wallis and Futuna Islands'>Wallis and Futuna Islands</option><option value='Western Sahara'>Western Sahara</option><option value='Yemen'>Yemen</option><option value='Yugoslavia'>Yugoslavia</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option><option value='(other)'>(other)</option></select></td><td id='err_country'>&nbsp;</td></tr><tr><td>Age<span class='style3'>*</span></td><td><input type='text' name='age' style='width:40px; border:thin #669900 dotted;' value="<?php echo $age;?>"/></td><td id='err_age' align='right'>&nbsp;</td></tr><tr><td height='32'>Sex<span class='style3'>*</span></td><td><input name='radiobutton' type='radio' value='Male' style='border:thin #669900 dotted;' <?php if($sex=="Male"){?> checked="checked"<?php }?>/> Male <input name='radiobutton' type='radio' value='Female' style='border:thin #669900 dotted;' <?php if($sex=="Female"){?> checked="checked"<?php }?>/> Female</td><td id='err_sex' align='right'>&nbsp;</td></tr><tr><td height='26'>Phone</td><td colspan='2'><table width='514' border='0' cellspacing='0' cellpadding='0'><tr><td width='167'>Country Code:&nbsp;&nbsp;<input type='text' name='lcc' style='width:50px; border:thin #669900 dotted;' <?php if($ph_country==0){?> value="" <?php }else{?>value="<?php echo $ph_country;?>"<?php }?>/></td><td width='139'>City Code:&nbsp;&nbsp;<input type='text' name='lctc' style='width:50px; border:thin #669900 dotted;' <?php if($ph_city==0){?> value="" <?php }else{?>value="<?php echo $ph_city;?>"<?php }?>/></td><td width='208'>No:&nbsp;&nbsp;<input type='text' name='ln' style='width:125px; border:thin #669900 dotted;' <?php if($ph_no==0){?> value="" <?php }else{?>value="<?php echo $ph_no;?>"<?php }?>/></td></tr></table></td></tr><tr><td height='26'>Mobile</td><td colspan='2'><table width='514' border='0' cellspacing='0' cellpadding='0'><tr><td width='168'>Country Code:&nbsp;&nbsp;<input type='text' name='mcc' style='width:50px; border:thin #669900 dotted;' <?php if($mobile_country==0){?> value="" <?php }else{?>value="<?php echo $mobile_country;?>"<?php }?>/></td><td width='346'>No:&nbsp;&nbsp;<input type='text' name='mn' style='width:125px; border:thin #669900 dotted;' <?php if($mobile_no==0){?> value="" <?php }else{?>value="<?php echo $mobile_no;?>"<?php }?>/></td></tr></table></td></tr><tr><td height='30'>Qualification<span class='style3'>*</span></td><td><select name='basic_stu' style='width:203px; border:thin #669900 dotted;'><option value='0'>---Select---</option><option value='B.A' <?php if($qualification=="B.A"){?> selected="selected"<?php }?>>B.A</option><option value='B.Arch' <?php if($qualification=="B.Arch"){?> selected="selected"<?php }?>>B.Arch</option><option value='B.B.A' <?php if($qualification=="B.B.A"){?> selected="selected"<?php }?>>B.B.A</option><option value='B.Com' <?php if($qualification=="B.Com"){?> selected="selected"<?php }?>>B.Com</option><option value='B.Ed' <?php if($qualification=="B.Ed"){?> selected="selected"<?php }?>>B.Ed</option><option value='B.Pharma' <?php if($qualification=="B.Pharma"){?> selected="selected"<?php }?>>B.Pharma</option><option value='B.Tech/B.E.' <?php if($qualification=="B.Tech/B.E."){?> selected="selected"<?php }?>>B.Tech/B.E.</option><option value='BCA' <?php if($qualification=="BCA"){?> selected="selected"<?php }?>>BCA</option><option value='BDS' <?php if($qualification=="BDS"){?> selected="selected"<?php }?>>BDS</option><option value='BHM' <?php if($qualification=="BHM"){?> selected="selected"<?php }?>>BHM</option><option value='CA' <?php if($qualification=="CA"){?> selected="selected"<?php }?>>CA</option><option value='CS' <?php if($qualification=="CS"){?> selected="selected"<?php }?>>CS</option><option value='Integrated PG' <?php if($qualification=="Integrated PG"){?> selected="selected"<?php }?>>Integrated PG</option><option value='LLM' <?php if($qualification=="LLM'"){?> selected="selected"<?php }?>>LLM</option><option value='M.A' <?php if($qualification=="M.A"){?> selected="selected"<?php }?>>M.A</option><option value='M.Arch' <?php if($qualification=="M.Arch"){?> selected="selected"<?php }?>>M.Arch</option><option value='M.Com' <?php if($qualification=="M.Com"){?> selected="selected"<?php }?>>M.Com</option><option value='M.Ed' <?php if($qualification=="M.Ed"){?> selected="selected"<?php }?>>M.Ed</option><option value='M.Pharma' <?php if($qualification=="M.Pharma"){?> selected="selected"<?php }?>>M.Pharma</option><option value='M.Sc' <?php if($qualification=="M.Sc"){?> selected="selected"<?php }?>>M.Sc</option><option value='M.Tech' <?php if($qualification=="M.Tech"){?> selected="selected"<?php }?>>M.Tech</option><option value='MPHIL' <?php if($qualification=="MPHIL"){?> selected="selected"<?php }?>>MPHIL</option><option value='Ph.D/Doctorate' <?php if($qualification=="Ph.D/Doctorate"){?> selected="selected"<?php }?>>Ph.D/Doctorate</option></select></td><td id='err_qual' align='right'></td></tr><tr>
    <td height="29" colspan="3" class="style2">Area of interest <span class="style4">(Check as applicable)</span> </td>
  </tr>
  <tr>
    <td height="28"><input type="checkbox" name="interest[]" value="health" style="border:thin #669900 dotted;" <?php if($health=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;Health</td>
    <td><input type="checkbox" name="interest[]" value="environment" style="border:thin #669900 dotted;"  <?php if($environment=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Environment</td>
    <td><input type="checkbox" name="interest[]" value="education" style="border:thin #669900 dotted;"  <?php if($education=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Education</td>
  </tr>
  <tr>
    <td height="29"><input type="checkbox" name="interest[]" value="empowerment" style="border:thin #669900 dotted;"  <?php if($empowerment=="yes"){?> checked="checked"<?php }?>/>      
      &nbsp; Empowerment</td>
    <td><input type="checkbox" name="interest[]" value="disaster" style="border:thin #669900 dotted;"  <?php if($disaster=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Disaster management </td>
    <td><input type="checkbox" name="interest[]" value="polio" style="border:thin #669900 dotted;"  <?php if($polio=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Polio eradication </td>
  </tr>
  <tr>
    <td colspan="3" id="bolka"><input type="checkbox" name="checkbox7" value="yes" style="border:thin #669900 dotted;" onclick="bolka();" <?php if($sms=="yes"){?> checked="checked"<?php }?>/>
      &nbsp;&nbsp;I would like to receive SMS alerts.</td>
  </tr>
  <tr>
    <td colspan="3" id="polka"><input type="checkbox" name="checkbox8" value="yes" style="border:thin #669900 dotted;" onclick="polka();" <?php if($news=="yes"){?> checked="checked"<?php }?>/>
      &nbsp;&nbsp;I would like to receive E newsletters & Emails.<?php if($news=="yes"){?>&nbsp;&nbsp;&nbsp;Alternate email:&nbsp;&nbsp;<input type="text" name="altem" style="width:204px; border:thin #669900 dotted;"<?php if($atem!=$email){?>value="<?php echo $atem;?>"<?php }?>/><?php }?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Update" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>
  <br />
  <form name="frm2" action="update_pass.php" method="post" onsubmit="return checkpass();">
  <table cellpadding='0' cellspacing='0' width='693'>
  <tr>
    <td height="29" colspan="3" class="style2">Change password</td>
  </tr>
  <tr>
    <td width="268" height="19" id="err_pass">&nbsp;</td>
	<td width="287" height="19" id="err_conpass">&nbsp;</td>
	<td width="136" height="19">&nbsp;</td>
  </tr>
  <tr>
    <td width="268" height="29">New password&nbsp;
    <input type='password' name='pass' style='width:150px; border:thin #669900 dotted;'/></td>
	<td width="287" height="29">Confirm password&nbsp;
    <input type='password' name='conpass' style='width:150px; border:thin #669900 dotted;'/></td>
	<td width="136" height="29"><input type="submit" name="Submit2" value="Update" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
  </tr>
  </table>
  </form>
<?php
}
else if($type=="Organization")
{
$query1=mysql_query("select * from reg_org where email='$email'");
$rec1=mysql_fetch_array($query1);
$name=$rec1['name'];
$type=$rec1['type'];
$ad1=$rec1['ad1'];
$ad2=$rec1['ad2'];
$city=$rec1['city'];
$zip=$rec1['zip'];
$country=$rec1['country'];
$ph_country=$rec1[ph_country];
$ph_city=$rec1[ph_city];
$ph_no=$rec1[ph_no];
$cp=$rec1['contact_person'];
$dp=$rec1['designation_contact'];
$hod=$rec1['hod'];
$dh=$rec1['desgnation_hod'];

$query2=mysql_query("select * from newsletter where id_em='$email'");
$nn=mysql_num_rows($query2);
if($nn>0)
{
$news="yes";
}
else
{
$news="no";
}
$recem=mysql_fetch_array($query2);
$atem=$recem['email'];
?>
<form name="frm1" action="update_reg.php" method="post" onsubmit="return rr();">
<table cellpadding='0' cellspacing='0' width='693'>
<tr><td width='300'>Name<span class='style3'>*</span></td><td width='200'><input type='text' name='name'  style='width:200px; border:thin #669900 dotted;' value="<?php echo $name;?>"/></td><td id='err_name' width='200' align='right'>&nbsp;</td></tr><tr><td width='300'>Kind of organization<span class='style3'>*</span></td><td width='225'><select name='kind' style='width:203px; border:thin #669900 dotted;' onchange='javascript:ctype();'><option value='Medical establishments' <?php if($type=="Medical establishments"){?> selected="selected"<?php }?>>Medical establishments</option><option value='Proprietorship' <?php if($type=="Proprietorship"){?> selected="selected"<?php }?>>Proprietorship</option><option value='Private Ltd' <?php if($type=="Private Ltd"){?> selected="selected"<?php }?>>Private Ltd</option><option value='MNC' <?php if($type=="MNC"){?> selected="selected"<?php }?>>MNC</option><option value='Public Sector' <?php if($type=="Public Sector"){?> selected="selected"<?php }?>>Public Sector</option><option value='NGO' <?php if($type=="NGO"){?> selected="selected"<?php }?>>NGO</option><option value='Government' <?php if($type=="Ph.D/Doctorate"){?> selected="selected"<?php }?>>Government</option><option value='ot' <?php if($type==""){?> selected="selected"<?php }?>>Other</option></select></td><td width='300' id='err_kind' style='visibility:hidden;'>Please specify&nbsp;<input type='text' name='oot' style='width:200px; border:thin #669900 dotted;'/></td></tr><tr><td height='33'>Address (Line 1)<span class='style3'>*</span></td><td><input type='text' name='ad1' style='width:200px; border:thin #669900 dotted;' value="<?php echo $ad1;?>"/></td><td id='err_ad1' align='right'>&nbsp;</td></tr><tr><td height='33'>Address (Line 2)</td><td><input type='text' name='ad2' style='width:200px; border:thin #669900 dotted;' value="<?php echo $ad2;?>"/></td><td id='err_ad2'>&nbsp;</td></tr><tr><td height='33'>City<span class='style3'>*</span></td><td><input type='text' name='city' style='width:200px; border:thin #669900 dotted;' value="<?php echo $city;?>"/></td><td id='err_city' align='right'>&nbsp;</td></tr><tr><td height='33'>Zip<span class='style3'>*</span></td><td><input type='text' name='zip' style='width:200px; border:thin #669900 dotted;' value="<?php echo $zip;?>"/></td><td id='err_zip' align='right'>&nbsp;</td></tr><tr><td height='33'>Country<span class='style3'>*</span></td><td><select name='country' style='width:203px; border:thin #669900 dotted;'><option value='Afghanistan'>Afghanistan</option><option value='Albania'>Albania</option><option value='Algeria'>Algeria</option><option value='American Samoa'>American Samoa</option><option value='Andorra'>Andorra</option><option value='Angola'>Angola</option><option value='Anguilla'>Anguilla</option><option value='Antarctica'>Antarctica</option><option value='Antigua and Barbuda'>Antigua and Barbuda</option><option value='Argentina'>Argentina</option><option value='Armenia'>Armenia</option><option value='Aruba'>Aruba</option><option value='Australia'>Australia</option><option value='Austria'>Austria</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahamas'>Bahamas</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Barbados'>Barbados</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Belize'>Belize</option><option value='Benin'>Benin</option><option value='Bermuda'>Bermuda</option><option alue='Bhutan'>Bhutan</option><option value='Bolivia'>Bolivia</option><option value='Bosnia and Herzegowina'>Bosnia and Herzegowina</option><option value='Botswana'>Botswana</option><option value='Bouvet Island'>Bouvet Island</option><option value='Brazil'>Brazil</option><option value='British Indian Ocean Territory'>British Indian Ocean Territory</option><option value='Brunei Darussalam'>Brunei Darussalam</option><option value='Bulgaria'>Bulgaria</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cambodia'>Cambodia</option><option value='Canada'>Canada</option><option value='Cape Verde'>Cape Verde</option><option value='Cayman Islands'>Cayman Islands</option><option value='Central African Republic'>Central African Republic</option><option value='Chad'>Chad</option><option value='Chile'>Chile</option><option value='China'>China</option><option value='Christmas Island'>Christmas Island</option><option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands</option><option value='Colombia'>Colombia</option><option value='Comoros'>Comoros</option><option value='Congo'>Congo</option><option value='Cook Islands'>Cook Islands</option><option value='Costa Rica'>Costa Rica</option><option value='Cote d'Ivoire'>Cote d'Ivoire</option><option value='Croatia'>Croatia</option><option value='Cuba'>Cuba</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Dem Rep of Congo'>Dem Rep of Congo</option><option value='Denmark'>Denmark</option><option value='Djibouti'>Djibouti</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='East Timor'>East Timor</option><option value='Ecuador'>Ecuador</option><option value='Egypt'>Egypt</option><option value='El Salvador'>El Salvador</option><option value='Estonia'>Estonia</option><option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas)</option><option value='Faroe Islands'>Faroe Islands</option><option value='Fiji'>Fiji</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='France, Metropolitan'>France, Metropolitan</option><option value='French Guiana'>French Guiana</option><option value='French Polynesia'>French Polynesia</option><option value='French Southern Territories'>French Southern Territories</option><option value='Gabon'>Gabon</option><option value='Gambia'>Gambia</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Ghana'>Ghana</option><option value='Gibraltar'>Gibraltar</option><option value='Greece'>Greece</option><option value='Greenland'>Greenland</option><option  value='Grenada'>Grenada</option><option value='Guadeloupe'>Guadeloupe</option><option value='Guam'>Guam</option><option value='Guatemala'>Guatemala</option><option value='Guinea'>Guinea</option>  <option value='Guinea-Bissau'>Guinea-Bissau</option><option value='Guyana'>Guyana</option><option value='Haiti'>Haiti</option><option value='Heard and Mc Donald Islands'>Heard and Mc Donald Islands</option><option value='Holy see (Vatican City State)'>Holy see (Vatican City State)</option><option value='Honduras'>Honduras</option><option value='Hong Kong'>Hong Kong</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='India' selected='selected'>India</option>    <option value='Indonesia'>Indonesia</option><option value='Iran (Islamic Republic of)'>Iran (Islamic Republic of)</option><option value='Iraq'>Iraq</option><option value='Ireland'>Ireland</option><option value='Israel'>Israel</option><option value='Italy'>Italy</option><option value='Jamaica'>Jamaica</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kenya'>Kenya</option><option value='Kiribati'>Kiribati</option><option value='Korea'>Korea</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Latvia'>Latvia</option><option value='Lebanon'>Lebanon</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania'>Lithuania</option><option value='Luxembourg'>Luxembourg</option><option value='Macau'>Macau</option><option value='Macedonia'>Macedonia</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mali'>Mali</option><option value='Malta'>Malta</option><option value='Marshall Islands'>Marshall Islands</option><option value='Martinique'>Martinique</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Mayotte'>Mayotte</option><option value='Mexico'>Mexico</option><option value='Micronesia'>Micronesia</option><option value='Moldova, Republic of'>Moldova, Republic of</option><option value='Monaco'>Monaco</option><option value='Mongolia'>Mongolia</option><option value='Montserrat'>Montserrat</option><option value='Morocco'>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Myanmar'>Myanmar</option><option value='Namibia'>Namibia</option><option value='Nauru'>Nauru</option><option value='Nepal'>Nepal</option><option value='Netherlands'>Netherlands</option><option value='Netherlands Antilles'>Netherlands Antilles</option><option value='New Caledonia'>New Caledonia</option><option value='New Zealand'>New Zealand</option><option value='Nicaragua'>Nicaragua</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='Niue'>Niue</option><option value='Norfolk Island'>Norfolk Island</option><option value='Northern Mariana Islands'>Northern Mariana Islands</option><option value='Norway'>Norway</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Palau'>Palau</option><option value='Palestinian'>Palestinian</option><option value='Panama'>Panama</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Paraguay'>Paraguay</option> <option value='Peru'>Peru</option><option value='Philippines'>Philippines</option><option value='Pitcairn'>Pitcairn</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Puerto Rico'>Puerto Rico</option><option value='Qatar'>Qatar</option><option value='Reunion'>Reunion</option><option value='Romania'>Romania</option><option value='Russian Federation'>Russian Federation</option><option value='Rwanda'>Rwanda</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Saint Vincent and Grenadines'>Saint Vincent and the Grenadines</option><option value='Samoa'>Samoa</option><option value='San Marino'>San Marino</option><option value='Sao Tome & Principe'>Sao Tome & Principe</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Senegal'>Senegal</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Singapore'>Singapore</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Solomon Islands'>Solomon Islands</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Georgia'>South Georgia </option><option value='Spain'>Spain</option><option value='Sri Lanka'>Sri Lanka</option><option value='St. Helena'>St. Helena</option><option value='St. Pierre & Miquelon'>St. Pierre & Miquelon</option><option value='Sudan'>Sudan</option><option value='SuriName'>SuriName</option><option value='Svalbard & Jan Mayen'>Svalbard & Jan Mayen</option><option value='Swaziland'>Swaziland</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Syrian Arab Republic'>Syrian Arab Republic</option><option value='Taiwan, Rep of China'>Taiwan, Rep China</option><option value='Tajikistan'>Tajikistan</option><option value='Tanzania'>Tanzania Republic of</option><option value='Thailand'>Thailand</option><option value='Togo'>Togo</option><option value='Tokelau'>Tokelau</option><option value='Tonga'>Tonga</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Tunisia'>Tunisia</option> <option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='Turks and Caicos'>Turks and Caicos</option><option value='Tuvalu'>Tuvalu</option><option value='Uganda'>Uganda</option><option value='Ukraine'>Ukraine</option><option value='United Arab Emirates'>United Arab Emirates</option><option value='United Kingdom'>United Kingdom</option><option value='United States'>United States</option><option value='Uruguay'>Uruguay</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vanuatu'>Vanuatu</option><option value='Venezuela'>Venezuela</option><option value='Viet Nam'>Viet Nam</option><option value='Virgin Islands (British)'>Virgin Islands (British)</option><option value='Virgin Islands (U.S.)'>Virgin Islands (U.S.)</option><option value='Wallis and Futuna Islands'>Wallis and Futuna Islands</option><option value='Western Sahara'>Western Sahara</option><option value='Yemen'>Yemen</option><option value='Yugoslavia'>Yugoslavia</option><option value='Zambia'>Zambia</option><option value='Zimbabwe'>Zimbabwe</option><option value='(other)'>(other)</option></select></td><td id='err_country'>&nbsp;</td></tr></tr><tr><td height='26'>Phone</td><td colspan='2'><table width='514' border='0' cellspacing='0' cellpadding='0'><tr><td width='167'>Country Code:&nbsp;&nbsp;<input type='text' name='lcc' style='width:50px; border:thin #669900 dotted;' <?php if($ph_country==0){?> value="" <?php }else{?>value="<?php echo $ph_country;?>"<?php }?>/></td><td width='139'>City Code:&nbsp;&nbsp;<input type='text' name='lctc' style='width:50px; border:thin #669900 dotted;' <?php if($ph_city==0){?> value="" <?php }else{?>value="<?php echo $ph_city;?>"<?php }?>/></td><td width='208'>No:&nbsp;&nbsp;<input type='text' name='ln' style='width:125px; border:thin #669900 dotted;' <?php if($ph_no==0){?> value="" <?php }else{?>value="<?php echo $ph_no;?>"<?php }?>/></td></tr></table></td></tr>
<tr><td height='37'>Contact Person <span class='style3'>*</span></td><td><input type='text' name='cp' style='width:200px; border:thin #669900 dotted;' value="<?php echo $cp;?>"/></td><td id='err_cp' align='right'></td></tr><tr><td height='34'>Designation <span class='style3'>*</span></td><td><input type='text' name='dp' style='width:200px; border:thin #669900 dotted;' value="<?php echo $dp;?>"/></td><td id='err_dp' align='right'></td></tr><tr><td height='30'>Head of the organization  <span class='style3'>*</span></td><td><input type='text' name='ho' style='width:200px; border:thin #669900 dotted;' value="<?php echo $hod;?>"/></td><td id='err_ho' align='right'></td></tr><tr><td height='34'>Designation <span class='style3'>*</span></td><td><input type='text' name='hd' style='width:200px; border:thin #669900 dotted;' value="<?php echo $dh;?>"/></td><td id='err_hd' align='right'></td></tr>
<tr>
    <td height="29" colspan="3" class="style2">Area of interest <span class="style4">(Check as applicable)</span> </td>
  </tr>
  <tr>
    <td height="28"><input type="checkbox" name="interest[]" value="health" style="border:thin #669900 dotted;" <?php if($health=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;Health</td>
    <td><input type="checkbox" name="interest[]" value="environment" style="border:thin #669900 dotted;"  <?php if($environment=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Environment</td>
    <td><input type="checkbox" name="interest[]" value="education" style="border:thin #669900 dotted;"  <?php if($education=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Education</td>
  </tr>
  <tr>
    <td height="29"><input type="checkbox" name="interest[]" value="empowerment" style="border:thin #669900 dotted;"  <?php if($empowerment=="yes"){?> checked="checked"<?php }?>/>      
      &nbsp; Empowerment</td>
    <td><input type="checkbox" name="interest[]" value="disaster" style="border:thin #669900 dotted;"  <?php if($disaster=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Disaster management </td>
    <td><input type="checkbox" name="interest[]" value="polio" style="border:thin #669900 dotted;"  <?php if($polio=="yes"){?> checked="checked"<?php }?>/>      &nbsp;&nbsp;&nbsp;Polio eradication </td>
  </tr>
 <tr>
    <td colspan="3" id="polka"><input type="checkbox" name="checkbox8" value="yes" style="border:thin #669900 dotted;" onclick="polka();" <?php if($news=="yes"){?> checked="checked"<?php }?>/>
      &nbsp;&nbsp;I would like to receive E newsletters & Emails.<?php if($news=="yes"){?>&nbsp;&nbsp;&nbsp;Alternate email:&nbsp;&nbsp;<input type="text" name="altem" style="width:204px; border:thin #669900 dotted;"<?php if($atem!=$email){?>value="<?php echo $atem;?>"<?php }?>/><?php }?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Update" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>
   <form name="frm2" action="update_pass.php" method="post" onsubmit="return checkpass();">
  <table cellpadding='0' cellspacing='0' width='693'>
  <tr>
    <td height="29" colspan="3" class="style2">Change password</td>
  </tr>
  <tr>
    <td width="268" height="19" id="err_pass">&nbsp;</td>
	<td width="287" height="19" id="err_conpass">&nbsp;</td>
	<td width="136" height="19">&nbsp;</td>
  </tr>
  <tr>
    <td width="268" height="29">New password&nbsp;
    <input type='password' name='pass' style='width:150px; border:thin #669900 dotted;'/></td>
	<td width="287" height="29">Confirm password&nbsp;
    <input type='password' name='conpass' style='width:150px; border:thin #669900 dotted;'/></td>
	<td width="136" height="29"><input type="submit" name="Submit2" value="Update" style="width:100px; height:20px; border:thin #669900 dotted;"/></td>
  </tr>
  </table>
  </form>
<?php
}
?>