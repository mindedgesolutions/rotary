<?php
ob_start();
include("../connection.php");
$refappno  =$_POST["hdnpdfrefappno"];
//echo $refappno;
//$refappno  ='HS000002';

include "grantApplicationForPDF.php";

$template = ob_get_contents();
ob_end_clean();

include("../mpdf/mpdf.php");

$mpdf=new mPDF(); 
$mpdf->WriteHTML($template);

$mpdf->Output();
exit;

?>
