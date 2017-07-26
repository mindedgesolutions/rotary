<?php
session_start();
//header("Content-Type:application/json");
$captcha=trim($_POST['captchastr']);
if($_SESSION['captchaval']==$captcha)
{
	//$msg = '{"msg":"1"}';
	$msg = array("msg"=>"1");
}
else
{
	//$msg =  '{"msg":"invalid captcha."}';
	$msg = array("msg"=>"invalid captcha.");
}
echo json_encode($msg);



?>