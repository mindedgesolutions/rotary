<?php
$dbname="rotary32_teach";
$host="192.185.36.129";
$dbuname="rotary32_arindam";
$dbpass="info123";
$link=mysql_connect($host,$dbuname,$dbpass) or die("Can not connect SERVER."); 
$link2=mysql_select_db($dbname) or die("Can not connect DATABASE.");

$data=$_GET['id'];

$sql= "select * from volunteer_form where vol_cat='$data'";
$result = mysql_query($sql);
 while($row=mysql_fetch_array($result))
 {
  $district=$row['rotary_district'];
  if($data == 'Rotarian' || $data == 'Inner Wheel' || $data == 'Rotaract' || $data == 'RCC'){
 ?>
 <tr>
  <td class="col-md-3">District :</td>
  <td class="col-md-9">
  <select name="district" class="form-control">
   <option value="<?php echo $district; ?>"><?php echo $district; ?></option>';
 </select>
  </td>
</tr>   
<?php 
  }
  else{
	  
  }
 }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
  