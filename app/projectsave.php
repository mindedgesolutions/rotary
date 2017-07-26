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

	$state = trim($_GET["state"]);
	$pdate = trim($_GET["pdate"]);
	$pcate = trim($_GET["pcate"]);
	$pname = trim($_GET["pname"]);
	$pdesc = trim($_GET["pdesc"]);
	$pvenue = trim($_GET["pvenue"]);
	$pno = trim($_GET["pno"]);
	$ppeople = trim($_GET["ppeople"]);
	$pvalue = trim($_GET["pvalue"]);
	$img1 = trim($_GET["img1"]);
	$img2 = trim($_GET["img2"]);
	$img3 = trim($_GET["img3"]);
	$img4 = trim($_GET["img4"]);

	$img1_caption = trim($_GET["img1c"]);
	$img2_caption = trim($_GET["img2c"]);
	$img3_caption = trim($_GET["img3c"]);
	$img4_caption = trim($_GET["img4c"]);


/*if(isset($_GET["btnSave"]))
{*/
$type = 'Others';
$firstname = trim($_GET["token"]);
$did = trim($_GET["did"]);

$query = "INSERT INTO clubproject(state,categoryid , title,projdesc,projectvenue,unitsupplied,beneficiaryno,outlay,projectdate,img1,img2,img3,img4,projectstatus,deleted,submitted,img1_caption,img2_caption,img3_caption,img4_caption,proj_type) values ('".$state."','".$pcate."','" . $pname . "','" . $pdesc . "','" . $pvenue . "','" . $pno . "','" . $ppeople . "','" . $pvalue . "','" . $pdate . "','" . $img1 . "','" . $img2 . "','" . $img3 . "','" . $img4 . "','1','0','" . $date_of . "','" . $img1_caption . "','" . $img2_caption . "','" . $img3_caption . "','" . $img4_caption . "','mob');";
//echo $query;
//die($query);

	$res = mysqli_query($link,$query);






//}
//die("sas");
//print_r($_FILES);
echo 'save'
?>
