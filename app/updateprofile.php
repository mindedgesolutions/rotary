<?php


	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/

	

$dbname="rotary32_teach";
	$host="103.227.62.215";
	$dbuname='mindedgeteach1';
	$dbpass="SuHiNa@1979";



	$link=mysqli_connect($host,$dbuname,$dbpass,$dbname) or die("Can not connect DATABASE.");





	$userid = trim($_GET["uid"]);
	$pname = trim($_GET["pmname"]);
	$pmemail = trim($_GET["pmemail"]);



/*if(isset($_GET["btnSave"]))
{*/

$query = "Update user_master set user_name='" .$pname . "', user_emaiil='" .$pmemail. "' where  Id='" .$userid ."'";


//die($query);

$res = mysqli_query($link,$query);




//}
//die("sas");
//print_r($_FILES);
//echo 'save'
?>
