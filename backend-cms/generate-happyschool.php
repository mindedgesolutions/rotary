<?php
include 'include/config-2.php';

$select = "select max(SLN) as SLN from image_master";
$result=mysql_query($select);
$row=mysql_fetch_array($result);

$date = date('Y-m-d');

if($row['SLN']==0)
{
    $aid = "IMG/".$date."/0001";
}
else
{
    $NewSLN=$row['SLN']+1;
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
    $aid = "IMG/".$date."/".($NewSLN);
}
$insert = "insert into image_master(SLN, image_id, gallery_type) values('', '".$aid."', 'Happy School')";
mysql_query($insert);
?>
<script type="text/javascript">
	window.location = 'add-edit-happyschool.php?imgid=<?= base64_encode($aid) ?>';
</script>