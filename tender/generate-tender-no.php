<?php
include 'include/config.php';

$select = "select max(tender_no) as tender_no from tender_master";
$result=mysql_query($select);
$row=mysql_fetch_array($result);

$currentYr = date('y');

if (date('m')<=01)
{
	$year = ($currentYr-1)."-".$currentYr;
}
else
{
	$year = $currentYr."-".($currentYr+1);
}

if($row['tender_no']==0)
{
    $tNo = '1';
    $tId = "R/T/".$year."/0001";
}
else
{
    $NewSLN=$row['tender_no']+1;
    $NewSLN_length=strlen($NewSLN);

    if($NewSLN_length==1)
    {
        $NewSLN = "000".$NewSLN;
    }
    else if($NewSLN_length==2)
    {
        $NewSLN = "00".$NewSLN;
    }
    else if($NewSLN_length==3)
    {
        $NewSLN = "0".$NewSLN;
    }
    else
    {
        $NewSLN = $NewSLN;
    }
    $tId = "R/T/".$year."/".($NewSLN);
    $tNo = $row['tender_no'] + 1;
}
    $insert = "insert into tender_master(tender_no, tender_id, tender_date, uid) values('".$tNo."', '".$tId."', '".date('Y-m-d')."', '".$_SESSION['uid']."')";

    mysql_query($insert);
?>
<script>
    window.location = 'submit-tender.php?tid=<?php echo base64_encode($tId); ?>&uid=<?php echo base64_encode($_SESSION['uid']); ?>&tno=<?php echo base64_encode($tNo); ?>';
</script>