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


/*if(isset($_GET["btnSave"]))
{*/
$type = 'Others';
$firstname = trim($_GET["token"]);

$query = "INSERT INTO user_token(token_id) values('".$firstname."');";
//echo $query;
//die($query);

	$res = mysqli_query($link,$query);

	
	
	}
	

//}
//die("sas");
//print_r($_FILES);
echo 'save'
?>
