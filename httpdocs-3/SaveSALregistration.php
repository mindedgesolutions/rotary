<?php
include("connection.php");
//print_r($_POST)
	
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

$belong1 = trim($_POST["txtbelong1"]);
$rotarianname= trim($_POST["txtrotarianname"]); 
$rotfamilyname =  trim($_POST["txtrotfamilyname"]); 
$RotDistrict=$_POST["txtRotDistrict"]; 
$RotClubName=$_POST["txtRotClubName"]; 
$Rotcallaname=trim($_POST["txtrotariancallaname"]); 
$classification=trim($_POST["txtclassification"]); 
if(count($_POST["positionheld"])>0)
$positionheld=implode(',',$_POST["positionheld"]);
 
$RotAddr=trim($_POST["txtRotAddr"]); 
$Rotcity=trim($_POST["txtRotcity"]); 
$Rotstate=trim($_POST["txtRotstate"]); 
$Rotpin=trim($_POST["txtRotpin"]);
 
$Rotcountry=trim($_POST["txtRotcountry"]); 
$Rotphone=trim($_POST["txtRotphone"]); 
$Rotmob=trim($_POST["txtRotmob"]); 
$Rotemail=trim($_POST["txtRotemail"]); 
$rotfoodhabit=trim($_POST["rotfoodhabit"]);
 
$rotregistrationfee =(trim($_POST["rotregistrationfee"])!=''?trim($_POST["rotregistrationfee"]):0); 
$rotnoofdelegate =  (trim($_POST["rotnoofdelegate"])!=''? trim($_POST["rotnoofdelegate"]):0);
$rotTotalfee =   (trim($_POST["txtrotTotal"])!=''?trim($_POST["txtrotTotal"]):0);

$belong2 =  trim($_POST["txtbelong2"]);
$categbelong  =  trim($_POST["txtcategbelong"]);
$IWMfirstname =   trim($_POST["txtIWMfirstname"]);
$IWMfamilyname = trim($_POST["txtIWMfamilyname"]);
$IWMcallname = trim($_POST["txtIWMcallname"]);
$IWMdistrict= trim($_POST["txtIWMdistrict"]);
$IWMclubname= trim($_POST["txtIWMclubname"]);
$IWMcountry= trim($_POST["txtIWMcountry"]);
$IWMfoodhabit= trim($_POST["IWMfoodhabit"]);

$IWMregistrationfee= (trim($_POST["IWMregistrationfee"])!=''?trim($_POST["IWMregistrationfee"]):0);
$IWMnoofdelegate= (trim($_POST["IWMnoofdelegate"])!=''?trim($_POST["IWMnoofdelegate"]):0);
$IWMTotalfee= (trim($_POST["txtIWMTotal"])!=''?trim($_POST["txtIWMTotal"]):0);


$belong3 =  trim($_POST["txtbelong3"]);
$guestfirstname =   trim($_POST["txtguestfirstname"]);
$guestfamilyname = trim($_POST["txtguestfamilyname"]);
$guestcallname = trim($_POST["txtguestcallname"]);
$guestcityname= trim($_POST["txtguestcityname"]);

$guestcountry= trim($_POST["txtguestcountry"]);
$guestfoodhabit= trim($_POST["otherguestfoodhabit"]);

$guestregistrationfee= (trim($_POST["guestregistrationfee"])!=''?trim($_POST["guestregistrationfee"]):0);
$guestnoofdelegate= (trim($_POST["guestnoofdelegate"])!=''?trim($_POST["guestnoofdelegate"]):0);
$guestTotalfee= (trim($_POST["txtguestTotal"])!=''? trim($_POST["txtguestTotal"]):0);

$Totalregfee=trim($_POST["Totalregfee"]); 
$Totalinwords=trim($_POST["txtTotalinwords"]); 
$toaltpay=trim($_POST["txttoaltpay"]); 
$draftno=trim($_POST["txtdraftno"]); 
$draftdt=trim($_POST["txtdraftdt"]); 
$drawnon=trim($_POST["txtdrawnon"]); 
$paymentmode= trim($_POST["paymode"]);

$transactionid=trim($_POST["txttransactionid"]); 
$bankname=trim($_POST["txtbankname"]); 
//$bankbranch=trim($_POST["txtbankbranch"]); 
$issuedt=trim($_POST["txtissuedt"]); 
$issuetime=trim($_POST["txtissuetime"]); 

$uploadcheque= $_FILES["txtuploadcheque"]["name"];



$getidqry	=	"SELECT MAX(id) as lastid FROM SALRegistration;";

$idresult = mysqli_query($link,$getidqry);

if($idresult)
{
		while($row = mysqli_fetch_assoc($idresult))
		{
		$getid[] = $row;
		}
}

$nextid = ($getid[0]["lastid"]+1);
$newimg1 = "";

$regisno = 'SALRegis'.$nextid;
	if($uploadcheque!='')  { 
		$newimg1 = FileNewname($uploadcheque,'cheque');	 
		if($_FILES["txtuploadcheque"]["error"]==0 ) {
			 move_uploaded_file($_FILES["txtuploadcheque"]["tmp_name"], "Cheque/" . $newimg1);
			 }
		}
$query = "INSERT INTO SALRegistration(`belong1`, `rotarianname`, `rotfamilyname`,`RotDistrict`, `RotClubName`, `Rotcallaname`, `classification`, `positionheld`, `RotAddr`, `Rotcity`, `Rotstate`, `Rotpin`, `Rotcountry`, `Rotphone`, `Rotmob`, `Rotemail`, `rotfoodhabit`, `rotregistrationfee`, `rotnoofdelegate`, `rotTotalfee`, `belong2`, `categbelong`, `IWMfirstname`, `IWMfamilyname`, `IWMcallname`, `district`, `clubcityname`, `IWMcountry`,`IWMfoodhabit`, `IWMregistrationfee`, `IWMnoofdelegate`, `IWMTotalfee`, `belong3`, `guestfirstname`, `guestfamilyname`, `guestcallname`, `guestcityname`, `guestcountry`, `guestfoodhabit`, `guestregistrationfee`, `guestnoofdelegate`, `guestTotalfee`, `grandtotalfee`, `Totalinwords`, `toaltpay`, `draftno`, `draftdt`, `drawnon`, `paymentmode`,`transactionid`,`bankname`,`issuedt`,`issuetime`,`uploadcheque`,`submitdt`, `regisno`) VALUES ('".$belong1."', '".$rotarianname."','".$rotfamilyname."','".$RotDistrict."','".$RotClubName."','".$Rotcallaname."','".$classification."','".$positionheld."','".$RotAddr."','".$Rotcity."','".$Rotstate."','".$Rotpin."','".$Rotcountry."','".$Rotphone."','".$Rotmob."','".$Rotemail."','".$rotfoodhabit."',".$rotregistrationfee.",".$rotnoofdelegate.",".$rotTotalfee.",'".$belong2."' ,'".$categbelong."','".$IWMfirstname ."','".$IWMfamilyname."','".$IWMcallname."','".$IWMdistrict."','".$IWMclubname."','".$IWMcountry."','".$IWMfoodhabit."',".$IWMregistrationfee.",".$IWMnoofdelegate.",".$IWMTotalfee.",'".$belong3."','".$guestfirstname."','".$guestfamilyname."','".$guestcallname."','".$guestcityname."','".$guestcountry."','".$guestfoodhabit."',".$guestregistrationfee.",".$guestnoofdelegate.",".$guestTotalfee.",".$Totalregfee.",'".$Totalinwords."','".$toaltpay."','".$draftno."','".$draftdt."','".$drawnon."','".$paymentmode."','".$transactionid."','".$bankname."','".$issuedt."','".$issuetime."','".$newimg1."','".date('Y-m-d')."' ,'".$regisno."');";

//die($query);
$result = mysqli_query($link,$query);
	if($result)
	{
		header("location: SALregisThanks.php?regisno=$regisno");
	}
?>
