<?php
session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 

function _generateRandom($length=6)
{
	$_rand_src = array(
		array(48,57) //digits
		, array(97,122) //lowercase chars
//		, array(65,90) //uppercase chars
	);
	srand ((double) microtime() * 1000000);
	$random_string = "";
	for($i=0;$i<$length;$i++){
		$i1=rand(0,sizeof($_rand_src)-1);
		$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
	}
	return $random_string;
}

$im = @imagecreatefromjpeg("captcha.jpg"); 
$rand1 = _generateRandom(3);
//$text_width = imagefontwidth(16);
//$text_height = imagefontheight(16);rand(0,255), rand(0,255), rand(0,255)
ImageString($im, 5, 2, 2, $rand1[0]." ", ImageColorAllocate ($im,0,0,0 ));
ImageString($im, 5, 11, 2, $rand1[1]." ", ImageColorAllocate ($im, 0,0,0));
ImageString($im, 5, 20, 2, $rand1[2]." ", ImageColorAllocate ($im, 0,0,0));

$rand2 = _generateRandom(3);
//$_SESSION['captcha'] = $rand1[0].$rand2[0].$rand1[1].$rand2[1].$rand1[2].$rand2[2];
$_SESSION['captchaval'] = $rand1[0].$rand1[1].$rand1[2].$rand2[0].$rand2[1].$rand2[2];
ImageString($im, 5, 21, 2, " ".$rand2[0], ImageColorAllocate ($im, 0,0,0));
ImageString($im, 5, 30, 2, " ".$rand2[1], ImageColorAllocate ($im, 0,0,0));
ImageString($im, 5, 39, 2, " ".$rand2[2], ImageColorAllocate ($im, 0,0,0));

Header ('Content-type: image/jpeg');
imagejpeg($im,NULL,100);
ImageDestroy($im);
//print_r($_SESSION['captcha']);
?>