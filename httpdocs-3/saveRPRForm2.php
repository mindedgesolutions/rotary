<?php 
include("connection.php");

	
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

$msg = "";
 	$RotDistrict = $_POST["txtRotDistrict"];
	   $name =$_POST["txtname"]; 
	$Address  = $_POST["txtAddress"];
 	$City  = $_POST["txtCity"];
 	$State  = $_POST["txtState"];
 	$Pin  = $_POST["txtPin"];
   $email = $_POST["txtemail"];
   $Mob = $_POST["txtMob"];
      $desig = $_POST["chodesig"];
    $ClubNames =$_POST["txtClubName"];

	$SchoolName=$_POST["txtSchoolName"]; 
	$SchoolCity=$_POST["txtSchoolCity"]; 
	
	$SchoolCityPin=$_POST["txtSchoolCityPin"]; 
	$shipAddress=$_POST["txtshipAddress"]; 
	$shipCity=$_POST["txtshipCity"]; 
	$shipState=$_POST["txtshipState"];
	
	$shipPin=$_POST["txtshipPin"];
	$NoAsamia = $_POST["txtNoAsamia"];
   $NoMarathi =$_POST["txtNoMarathi"]; 
   $NoBangla = $_POST["txtNoBangla"];
   $NoOdia =  $_POST["txtNoOdia"];
   $NoPunjabi =$_POST["txtNoPunjabi"]; 
   $NoGujarati = $_POST["txtNoGujarati"];
   $NoUrdu = $_POST["txtNoUrdu"];
   $NoHindi = $_POST["txtNoHindi"];
   $NoNepali = $_POST["txtNoNepali"];
   $NoManipuri = $_POST["txtNoManipuri"];
   $NoTamil =  $_POST["txtNoTamil"];
   $NoKannada = $_POST["txtNoKannada"];
   $NoTelugu =  $_POST["txtNoTelugu"];

	$costAsamia = $_POST["Asamiacost"];
   $costMarathi =$_POST["Marathicost"]; 
   $costBangla = $_POST["Banglacost"];
   $costOdia =  $_POST["Odiacost"];
   $costPunjabi =$_POST["Punjabicost"]; 
   $costGujarati = $_POST["Gujaraticost"];
   $costUrdu = $_POST["Urducost"];
   $costHindi = $_POST["Hindicost"];
   $costNepali = $_POST["Nepalicost"];
   $costManipuri = $_POST["Manipuricost"];
   $costTamil =  $_POST["Tamilcost"];
   $costKannada = $_POST["Kannadacost"];
   $costTelugu =  $_POST["Telugucost"];
$TotalToolkit =  $_POST["txtTotalToolkit"];
	 
$Totalcost =  $_POST["Grandtotalcost"];
   $Cheque1 = $_POST["txtCheque1"];
   $amount1 =$_POST["txtamount1"]; 
   $chequedate1 = $_POST["txtdate1"];
   $bankbranch1 =$_POST["txtbankbranch1"];



$getidqry	=	"SELECT MAX(id) as lastid FROM RARFormdata;";

$idresult = mysqli_query($link,$getidqry);

if($idresult)
{
		while($row = mysqli_fetch_assoc($idresult))
		{
		$getid[] = $row;
		}
}

$nextid = ($getid[0]["lastid"]+1);

   
   $uploadDD1= $_FILES["txtDDcopy1"]["name"];
	$DDimg1 = "";
   	if($uploadDD1!='')  { 
		$DDimg1 = FileNewname($uploadDD1,'DD1_'.$nextid);	 
		if($_FILES["txtDDcopy1"]["error"]==0 ) {
			 move_uploaded_file($_FILES["txtDDcopy1"]["tmp_name"], "Cheque/" . $DDimg1);
			 }
		}
		
		
   $uploadDD2= $_FILES["txtDDcopy2"]["name"];
	$DDimg2 = "";
   	if($uploadDD2!='')  { 
		$DDimg2 = FileNewname($uploadDD2,'DD2_'.$nextid);	 
		if($_FILES["txtDDcopy2"]["error"]==0 ) {
			 move_uploaded_file($_FILES["txtDDcopy2"]["tmp_name"], "Cheque/" . $DDimg2);
			 }
		}
		
   $uploadDD3= $_FILES["txtDDcopy1"]["name"];
	$DDimg3 = "";
   	if($uploadDD3!='')  { 
		$DDimg3 = FileNewname($uploadDD3,'DD3_'.$nextid);	 
		if($_FILES["txtDDcopy3"]["error"]==0 ) {
			 move_uploaded_file($_FILES["txtDDcopy3"]["tmp_name"], "Cheque/" . $DDimg3);
			 }
		}
		
   $uploadDD4= $_FILES["txtDDcopy4"]["name"];
	$DDimg4 = "";
   	if($uploadDD4!='')  { 
		$DDimg4 = FileNewname($uploadDD4,'DD4_'.$nextid);	 
		if($_FILES["txtDDcopy4"]["error"]==0 ) {
			 move_uploaded_file($_FILES["txtDDcopy4"]["tmp_name"], "Cheque/" . $DDimg4);
			 }
		}
		
   $uploadDD5= $_FILES["txtDDcopy5"]["name"];
	$DDimg5 = "";
   	if($uploadDD5!='')  { 
		$DDimg5 = FileNewname($uploadDD5,'DD5_'.$nextid);	 
		if($_FILES["txtDDcopy5"]["error"]==0 ) {
			 move_uploaded_file($_FILES["txtDDcopy5"]["tmp_name"], "Cheque/" . $DDimg5);
			 }
		}
		
		
		
   $uploadSCF= $_FILES["txtSCFcopy"]["name"];
$newimg2 = "";

   	if($uploadSCF!='')  { 
		$newimg2 = FileNewname($uploadSCF,'SCF_'.$nextid);	 
		if($_FILES["txtSCFcopy"]["error"]==0 ) {
			 move_uploaded_file($_FILES["txtSCFcopy"]["tmp_name"], "Cheque/" . $newimg2);
			 }
		}


   $qry= "INSERT INTO RARFormdata(`id`, `RotDistrict`, `SchoolName`, `SchoolCity`,`SchoolCityPin`, `Address`, `City`, `State`, `Pin`, `shipAddress`, `shipCity`, `shipState`, `shipPin`, `NoAsamia`, `NoMarathi`, `NoBangla`, `NoOdia`, `NoPunjabi`, `NoGujarati`, `NoUrdu`, `NoHindi`, `NoTamil`, `NoKannada`, `NoTelugu`, `NoNepali`, `NoManipuri`, `costAsamia`, `costMarathi`, `costBangla`, `costOdia`,  `costPunjabi`, `costGujarati`, `costUrdu`, `costHindi`, `costNepali`, `costManipuri`, `costTamil`, `costKannada`, `costTelugu`, `TotalToolkit`, `Totalcost`, `DDImg1`, `DDImg2`, `DDImg3`, `DDImg4`, `DDImg5`, `SCFImg`, `Cheque1`, `amount1`, `chequedate1`, `bankbranch1`,`Cheque2`, `amount2`, `chequedate2`, `bankbranch2`,`Cheque3`, `amount3`, `chequedate3`, `bankbranch3`,`Cheque4`, `amount4`, `chequedate4`, `bankbranch4`,`Cheque5`, `amount5`, `chequedate5`, `bankbranch5`, `ClubNames`, `name`, `desig`, `email`, `Mob`, `submitted`) VALUES(".$nextid.",'".$RotDistrict."','".$SchoolName."','".$SchoolCity."','".$SchoolCityPin."','".$Address."', '".$City."', '".$State."', '".$Pin."', '".$shipAddress."', '".$shipCity."', '".$shipState."', '".$shipPin."','".$NoAsamia."','".$NoMarathi."','".$NoBangla."','".$NoOdia."','".$NoPunjabi."','".$NoGujarati."','".$NoUrdu."','".$NoHindi."','".$NoTamil."','".$NoKannada."','".$NoTelugu."',   '".$NoNepali."', '".$NoManipuri."', '".$costAsamia."', '".$costMarathi."', '".$costBangla."', '".$costOdia."',  '".$costPunjabi."', '".$costGujarati."', '".$costUrdu."', '".$costHindi."', '".$costNepali."', '".$costManipuri."', '".$costTamil."', '".$costKannada."', '".$costTelugu."', '".$TotalToolkit."', '".$Totalcost."', '".$DDimg1."','".$DDimg2."','".$DDimg3."','".$DDimg4."','".$DDimg5."', '".$newimg2."','".$Cheque1."','".$amount1."','".$chequedate1."','".$bankbranch1."','".$Cheque2."','".$amount2."','".$chequedate2."','".$bankbranch2."','".$Cheque3."','".$amount3."','".$chequedate3."','".$bankbranch3."','".$Cheque4."','".$amount4."','".$chequedate4."','".$bankbranch4."','".$Cheque5."','".$amount5."','".$chequedate5."','".$bankbranch5."','".$ClubNames."','".$name."','".$desig."','".$email."','".$Mob."','".date('d-m-Y')."'); ";
   
  die($qry);
   
   $result = mysqli_query($link,$qry);
	if($result)
	{
		$msg = "Thank you for submitting your requirement. Please contact RILM office at Kolkata for timely delivery of materials.";
	}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Teacher Evaluation</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
  
<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

 <link rel="stylesheet" type="text/css" href="js/jquery.datepick.css"> 
  
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
</head>

<body onLoad="districtlist();">
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!-- --------------------- LOGO AREA START ------------------- -->
        <?php include("logo_area.html") ?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("menu_area.html") ?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
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
                            <td width="100%" valign="top" >
                                <h1 align="left">Reading Packs Requisition Form </h1>
                              
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;" class="auto-style1">
									</div>
									
						          <div style="margin:15px 0 10px 0; line-height:18px; color:#CC0000; text-align:justify">
									<?php echo $msg; ?>
							  </div>



</p>
								

                            </td>
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("footer_area.html") ?>
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

