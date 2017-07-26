<?php
include('include/config.php');
$q = intval($_GET['q']);
//$q='3000';
$dataVal='';
$dataShow='Select Club';
$sql="select DISTINCT(club_name) from all_district WHERE district_code = '".$q."'";
$result = mysql_query($sql);
 echo '<option value="'.$dataVal.'">'.$dataShow.'</option>';
while($row = mysql_fetch_array($result)) {
 $data=$row['club_name'];
?>
 <option value="<?= $data ?>" ><?= $data ?></option>;
<?php
}
?>