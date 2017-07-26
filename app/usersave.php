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



	$date_of = date('Y-m-dh:i:s');

	$usertype = trim($_GET["utype"]);
	$state = trim($_GET["state"]);
	$dist = trim($_GET["dist"]);
	$pname = trim($_GET["pname"]);
	$pemail = trim($_GET["pemail"]);
	$pmobile = trim($_GET["pmobile"]);
	$cpwd = trim($_GET["cpwd"]);


/*if(isset($_GET["btnSave"]))
{*/


$query = "INSERT INTO user_master(user_pwd,user_emaiil,user_mobile,user_name,user_type,user_state,user_district,deleted_b,created_on) values ('".$cpwd."','".$pemail."','".$pmobile."','" . $pname . "','" . $usertype . "','" . $state . "','" . $dist . "','N','" . $date_of . "');";

//die($query);

	$res = mysqli_query($link,$query);






//}
//die("sas");
//print_r($_FILES);
//echo 'save'
?>
