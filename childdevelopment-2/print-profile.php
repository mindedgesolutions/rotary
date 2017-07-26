<?php
include 'include/config.php';

$getDet = mysql_fetch_array(mysql_query("select * from tbl_child_profile_card where child_id='".$_REQUEST['id']."'"));

$ngoName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$getDet['create_by']."'"));

if ($getDet['previously_study']=='A'){

    $pre_study = 'The Child is between age group 7 to 14 yrs';
}else if ($getDet['previously_study']=='B'){

    $pre_study = 'Child who has never been to School';
}else if ($getDet['previously_study']=='C'){

    $pre_study = 'Child who is not attending school fro more than 45days without information to school';
}else if ($getDet['previously_study']=='D'){

    $pre_study = "Child who is a laggard (e.g The Child's age is 12 years but can read text of only Class II & III etc)";
}

$address = explode(',', $getDet['street']);
$address_1 = $address[0];
$address_2 = $address[1];
$address_3 = $address[2];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Child Profile</title>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<script type="text/javascript" src="assets/js/jquery.js"></script>

<script type="text/javascript">
function PrintDiv() {

    document.getElementById("print").style.visibility = "hidden";
    var divToPrint = document.getElementById('divToPrint');

    var popupWin = window.open('', '_blank', 'width=300,height=500');

    popupWin.document.open();
    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    popupWin.document.close();

    javascript:parent.jQuery.fancybox.close();
}

function closeWindow(){
    window.top.close();
}
</script>

</head>


<body>

<div id="divToPrint">
    <div style="width: 90%;height: auto;min-height: 200px;margin: 0 5%;box-sizing: border-box;border: 1px solid #757575;font-family: 'Roboto', sans-serif;box-sizing: border-box;padding: 10px;">

        <center>

        <table width="100%">
            <tr>
                <td width="80%">
                    <table width="100%" border="0" style="border-collapse: collapse;">
                        <tr style="height: 40px;">
                            <td width="20%" style="padding: 0 10px;font-size: 13px;">NGO Name : </td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= strtoupper($ngoName['center_name']) ?> &nbsp;&nbsp;&nbsp;(Joined On : <?= $getDet['create_date'] ?>)</td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Child Name : </td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= strtoupper($getDet['child_name']) ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Gender : </td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= strtoupper($getDet['child_gender']) ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Child Age : </td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['child_dob'] ?></td>
                        </tr>
                    </table>
                </td>

                <td width="20%">
                    <table width="100%" border="0" style="border-collapse: collapse;">
                        <tr style="height: 140px; text-align: center;">
                            <td width="100%" style="vertical-align: top;"><img height='140' width='140' src='http://rotaryteach.org/child_development/upload/<?= $getDet["child_photo"] ?>' alt="No Image"></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2" width="100%">
                    <table width="100%" border="1" style="border-collapse: collapse;">
                        <tr style="height: 40px;">
                            <td width="40%" style="padding: 0 10px;font-size: 13px;">Father's Name : </td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['child_father_name'] ?></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Mother's Name</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['child_mother_name'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Child's Guardian [if other than parent]</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['child_guardian_name'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Occupation of Father/Mother/Guardian</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['occupation'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;line-height: 18px;font-size: 13px;">Child has previously studied upto which standard/class?</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $pre_study ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">State</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['state'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">City</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['city'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Address - 1</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $address_1 ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Address - 2</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $address_2.', '.$address_3 ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Category</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['category'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Differently Abled</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['Differently_Abled'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Reading Ability</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['Learning_Disabilities'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Basic Calculation</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['basic_calculation'] ?></td>
                        </tr>

                        <tr style="height: 40px;">
                            <td style="padding: 0 10px;font-size: 13px;">Reason No School</td>
                            <td style="padding: 0 10px;font-size: 13px;"><?= $getDet['reason_no_school'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        </center>
        
    </div>
</div>


<div style="text-align: center;">
<input name="print" id="print" type="button" value="Print" style="margin: 10px 5px 10px 0; cursor:pointer; height:30px; width:70px; background-color:#01305e; color:#CCCCCC; border:0px;" onclick="PrintDiv()" />


<input name="back" id="back" type="button" value="Close" style="margin: 10px 0 10px 5px; cursor:pointer; height:30px; width:70px; background-color:#01305e; color:#CCCCCC; border:0px;" onclick="closeWindow()" />
</div>

</body>
</html>