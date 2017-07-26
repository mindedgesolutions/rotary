<?php
	/*$dbname="rotary";
	$host="office-3";
	$dbuname="root";
	$dbpass="tiger";*/


	$dbname="rotary32_teach";
	$host="localhost";
	$dbuname="root";
	$dbpass="";


	
	$dbname="rotary32_teach";
	$host="103.227.62.215";
	$dbuname='mindedgeteach1';
	$dbpass="SuHiNa@1979";

	$link=mysqli_connect($host,$dbuname,$dbpass,$dbname) or die("Can not connect DATABASE.");

$beneficiary_total = 0;
$outlay_total = 0;

$beneficiary_tt = 0;
$outlay_tt = 0;

$beneficiary_el = 0;
$outlay_el = 0;

$beneficiary_al = 0;
$outlay_al = 0;

$beneficiary_al = 0;
$outlay_al = 0;

$beneficiary_ch = 0;
$outlay_ch = 0;

$beneficiary_hs = 0;
$outlay_hs = 0;

$sql = "Select * from clubproject";
$res = mysqli_query($link,$sql);
$count_nba = mysqli_num_rows($res);
while($data = mysqli_fetch_array($res)){
	extract($data);
if($title = 'Nation Builder Awards' && $categoryid == 1){
$beneficiary_total = $beneficiary_total + $beneficiaryno;
$outlay_total = $outlay_total + intval($outlay);
}
if($title != 'Nation Builder Awards'  && $categoryid == 1){
$beneficiary_tt = $beneficiary_tt + $beneficiaryno;
$outlay_tt = $outlay_tt + intval($outlay);
 }
if($categoryid == 2){
$beneficiary_el = $beneficiary_el + $beneficiaryno;
$outlay_el = $outlay_el + intval($outlay);
}
if($categoryid == 3){
$beneficiary_al = $beneficiary_al + $beneficiaryno;
$outlay_al = $outlay_al + intval($outlay);
}
if($categoryid == 4){
$beneficiary_ch = $beneficiary_ch + $beneficiaryno;
$outlay_ch = $outlay_ch + intval($outlay);
}
if($categoryid == 5){
$beneficiary_hs = $beneficiary_hs + $beneficiaryno;
$outlay_hs = $outlay_hs + intval($outlay);
}
}
?>
<table width="43%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><strong>Teacher Support</strong></td>
  </tr>
  <!-------------------------- Nation Builder Awards -------------------------------------------------------->
  <tr>
    <td width="33%">Total No of NBA : </td>
    <td width="67%"><?php echo $count_nba; ?>
    </td>
  </tr>
  <tr>
    <td width="33%">Total Impact : </td>
    <td width="67%"><?php echo $beneficiary_total; ?></td>
  </tr>
  <tr>
    <td>Total Value : </td>
    <td><?php echo intval($outlay_total); ?></td>
  </tr>
  <!-------------------------- Teacher Trained -------------------------------------------------------->
  <tr>
    <td width="33%">Total No of TT : </td>
    <td width="67%"><?php echo $count_nba; ?>
    </td>
  </tr>
  <tr>
    <td width="33%">Total Impact on TT: </td>
    <td width="67%"><?php echo $beneficiary_tt; ?></td>
  </tr>
  <tr>
    <td>Total Value of TT: </td>
    <td><?php echo intval($outlay_tt); ?></td>
  </tr>
</table>
<table width="43%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><strong>E-Learning</strong></td>
  </tr>
  <!-------------------------- Nation Builder Awards -------------------------------------------------------->
  <tr>
    <td width="33%">Total No of EL : </td>
    <td width="67%"><?php echo $count_nba; ?>
    </td>
  </tr>
  <tr>
    <td width="33%">Total Impact : </td>
    <td width="67%"><?php echo $beneficiary_el; ?></td>
  </tr>
  <tr>
    <td>Total Value : </td>
    <td><?php echo intval($outlay_el); ?></td>
  </tr>
</table>
<table width="43%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><strong>Adult Literacy</strong></td>
  </tr>
  <!-------------------------- Nation Builder Awards -------------------------------------------------------->
  <tr>
    <td width="33%">Total No of AL : </td>
    <td width="67%"><?php echo $count_nba; ?>
    </td>
  </tr>
  <tr>
    <td width="33%">Total Impact : </td>
    <td width="67%"><?php echo $beneficiary_al; ?></td>
  </tr>
  <tr>
    <td>Total Value : </td>
    <td><?php echo intval($outlay_al); ?></td>
  </tr>
</table>
<table width="43%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><strong>Child Development</strong></td>
  </tr>
  <!-------------------------- Nation Builder Awards -------------------------------------------------------->
  <tr>
    <td width="33%">Total No of CH : </td>
    <td width="67%"><?php echo $count_nba; ?>
    </td>
  </tr>
  <tr>
    <td width="33%">Total Impact : </td>
    <td width="67%"><?php echo $beneficiary_ch; ?></td>
  </tr>
  <tr>
    <td>Total Value : </td>
    <td><?php echo intval($outlay_ch); ?></td>
  </tr>
</table>
<table width="43%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><strong>Happy School</strong></td>
  </tr>
  <!-------------------------- Nation Builder Awards -------------------------------------------------------->
  <tr>
    <td width="33%">Total No of HS : </td>
    <td width="67%"><?php echo $count_nba; ?>
    </td>
  </tr>
  <tr>
    <td width="33%">Total Impact : </td>
    <td width="67%"><?php echo $beneficiary_hs; ?></td>
  </tr>
  <tr>
    <td>Total Value : </td>
    <td><?php echo intval($outlay_hs); ?></td>
  </tr>
</table>