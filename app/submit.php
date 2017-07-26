<?php
include "config.php";
include "payment.php";

class ProcessPayment {

	function __construct(){
		$this->paymentConfig = new payment_config();
	}

	function requestMerchant(){
		//$this->paymentConfig = new payment_config();
		$payment = new payment();
		$datenow = date("d/m/Y h:m:s");
		$tran = $_GET['tranid'];
		$modifiedDate = str_replace(" ", "%20", $datenow);
		$payment->url = $this->paymentConfig->Url;
		$postFields  = "";
		$postFields .= "&login=".$this->paymentConfig->Login;
		$postFields .= "&pass=".$this->paymentConfig->Password;
		$postFields .= "&ttype=NBFundTransfer";
		$postFields .= "&prodid=ASIA";
		$postFields .= "&amt=".$_GET['samt'];
		$postFields .= "&txncurr=".$this->paymentConfig->TxnCurr;
		$postFields .= "&txnscamt=".$this->paymentConfig->TxnScAmt;
		$postFields .= "&clientcode=".urlencode(base64_encode('007'));
		$postFields .= "&txnid=".$tran;
		$postFields .= "&date=".$modifiedDate;
		$postFields .= "&custacc=1234567890";
		$postFields .= "&ru=http://www.rotaryteach.org/app/response.php";
		// Not required for merchant
		//$postFields .= "&bankid=".$_POST['bankid'];

		$sendUrl = $payment->url."?".substr($postFields,1)."\n";

		//$this->writeLog($sendUrl);

		$returnData = $payment->sendInfo($postFields);
		$this->writeLog($returnData."\n");
		$xmlObjArray     = $this->xmltoarray($returnData);

		$url = $xmlObjArray['url'];
		$postFields  = "";
		$postFields .= "&ttype=NBFundTransfer";
		$postFields .= "&tempTxnId=".$xmlObjArray['tempTxnId'];
		$postFields .= "&token=".$xmlObjArray['token'];
		$postFields .= "&txnStage=1";
		$url = $payment->url."?".$postFields;

		//$this->writeLog($url."\n");
		//header("Location: ".$url);
		$servername = "103.227.62.215";
	$username = "rotary32_teach";
	$password = "Rotary@2016";
	$dbname= "rotary32_teach";
	$dt = "'".date('Y-m-d H:i:s')."'";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$pamt=$_GET['samt'];
	$prem="'".$_GET['srem']."'";
	$sname="'".$_GET['sname']."'";
	$semail="'".$_GET['semail']."'";
	$smob="'".$_GET['smob']."'";
	$puser_id="'".$_GET['userid']."'";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	$sql = "INSERT INTO wp_payment (pamt, prem,ptranid,pname,pemail,pcontact,puser_id,pdate)
		VALUES ($pamt, $prem,$tran,$sname,$semail,$smob,$puser_id,$dt)";

		if ($conn->query($sql) === TRUE) {
			echo $url;
		}

		$conn->close();


	}

	function writeLog($data){
		/*$fileName = date("Y-m-d").".txt";
		$fp = fopen("log/".$fileName, 'a+');
		$data = date("Y-m-d H:i:s")." - ".$data;
		fwrite($fp,$data);
		fclose($fp);*/
	}

	function xmltoarray($data){
		$parser = xml_parser_create('');
		xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, trim($data), $xml_values);
		xml_parser_free($parser);

		$returnArray = array();
		$returnArray['url'] = $xml_values[3]['value'];
		$returnArray['tempTxnId'] = $xml_values[5]['value'];
		$returnArray['token'] = $xml_values[6]['value'];

		return $returnArray;
	}
}

$processPayment = new ProcessPayment();
$processPayment->requestMerchant();
?>