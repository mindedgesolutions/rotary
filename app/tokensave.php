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


/*if(isset($_GET["btnSave"]))
{*/
$type = 'Others';
$firstname = trim($_GET["token"]);
$did = trim($_GET["did"]);
$user_id=trim($_GET["userid"]);

$query = "INSERT INTO user_token(token_id , device_id,user_id) values('".$firstname."','" . $did . "','" .$user_id. "');";
//echo $query;
//die($query);

	$res = mysqli_query($link,$query);






//}
//die("sas");
//print_r($_FILES);
echo 'save'
?>
