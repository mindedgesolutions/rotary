<?php
include('include/config.php');

$district = array("303", "306", "313", "314", "317");
$count = count($district);
?>
<table border="1" style="border-collapse: collapse;">
<?php
for ($i=1; $i<$count; $i++){

	$query_getClub = mysql_query("select * from all_district where district_code='".$district[$i]."'");
	while ($getClub = mysql_fetch_array($query_getClub)){

	?>
	<tr>
		<td><?= $district[$i] ?></td>
		<td><?= $getClub['club_name'] ?></td>
	</tr>
	<?php
	}
}
?>
</table>