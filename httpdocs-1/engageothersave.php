<?php


	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/
	
	$dbname="rotary32_teach";
	$host="192.185.36.129";
	$dbuname="rotary32_teach";
	$dbpass="info123";
	

	
	
	
	$link=mysqli_connect($host,$dbuname,$dbpass,$dbname) or die("Can not connect DATABASE.");
	
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


/*if(isset($_POST["btnSave"]))
{*/
$type = 'Others';
$firstname = trim($_POST["cfname"]);
$midname = '';
$lastname = trim($_POST["clname"]);

$rotaryDistrict = '';
$RCCname = '';
$rotaryClubname = '';
$txtAddress = $_POST["caddress1"] . $_POST["caddress2"]
$address=mysqli_real_escape_string($link,$_POST["txtAddress"]);
$city = trim($_POST["ccity"]);
$email = trim($_POST["cemail"]);

/*$phone = trim($_POST["txtPhone"]);
$mob1 = trim($_POST["txtMob1"]);*/
$mob= "91".trim($_POST["cmobile"]);

$state= trim($_POST["cstate"]);
 $pin= trim($_POST["cpincode"]);
 $country= trim($_POST["ccountry"]);
$volunteerArea = trim($_POST["VolntArea"]); 
$nosofhours= $_POST["chour"];


$noofmonth = 0;
$workmodeinmonth='day';

 $howknow= '';

$timeIn = '';
//$rotarystatus = $_POST["optStatus"];
/*$isteacher = $_POST["isteacher"]; 
$teachlevel = $_POST["choteachlevel"]; 
$langProficiate = $_POST["langProficiate"];*/ 


$workarea = $_POST["workarea"];

$experience = '';
$experienceDetail= '';
$projectname = '';
$explocation = '';
$contactperson = '';
$partneragency = '';
$projectname = '';

$expcontact = '';

$innerWheelDistrict = '';

$query = "INSERT INTO registration(type, firstname, midname, lastname, rotaryDistrict,RCCname,innerWheelDistrict, rotaryClubname, address, mobile1,city, state, pin, country, email,rotarianImg, volunteerArea, nosofhours,noofmonth,workmodeinmonth, timeIn, howknow, rotarystatus, workarea, experience, projectname, explocation, contactperson, partneragency, expcontact, experienceDetail,  submitted ) values('".$type."','".$firstname."','".$midname."','".$lastname."','".$rotaryDistrict."','".$RCCname."','".$innerWheelDistrict."','".$rotaryClubname."','".$address."','".$mob."','".$city."','".$state."','".$pin."','".$country."','".$email."','".$newrotarianimg."','".$volunteerArea."',".$nosofhours.",".$noofmonth.",'".$workmodeinmonth."','".$timeIn."','".$howknow."','".$rotarystatus."','".$workarea."','".$experience ."','".$projectname ."','".$explocation."','".$contactperson ."','".$partneragency ."','".$expcontact ."','".$experienceDetail ."','".date('Y-m-d h:i:s')."');";
//echo $query;
//die($query);

	$res = mysqli_query($link,$query);

	if($res)
	{	
	$from = "volunteer@rotaryteach.org";
	$to= $from.",".$email;
	$subject = "Thank you for registration.";
	$header = "From: ".$from."\r\n";
	$body="";
	$body=$body."Name: ".$firstname." ".$midname." ".$lastname."\r\n";	
	$body=$body."Rotary District: ".$rotaryDistrict."\r\n";	
	$body=$body."Rotary Clubname: ".$rotaryClubname."\r\n";	
	$body=$body."Address: ".$address.", State: ".$state.", Country: ".$country. ", Pin: ".$pin.", phone: ".$phone."\r\n";
	$body=$body."Volunteer Area: ".$volunteerArea."\r\n";
	$body=$body."Working Hours: ".$nosofhours." hrs in a ".$timeIn."\r\n";
	$body=$body."Volunteer Area: ".$volunteerArea."\r\n";
	$body=$body."Workarea: ".$workarea."\r\n";
		$newmsg=rawurldecode($body);
	$msg = "Thank you for your registration. We will get back to you shortly.";
	
	 mail($to,$subject,$newmsg,$header);
	
	}
	

//}
//die("sas");
//print_r($_FILES);
echo 'save'
?>
