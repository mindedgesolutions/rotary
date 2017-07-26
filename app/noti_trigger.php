<?php
$dbName='rotary32_teach';
$dbHost='103.227.62.215';
$dbUser='mindedgeteach1';
$dbPass='SuHiNa@1979';

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary | Trigger Notification</title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<style type="text/css">
body{
    height: 100%;
    margin: 0px;
    padding: 0px;
    font-family: Ubuntu;
}
.header{
	width: 100%;
	height: auto;
	background-color: #222;
}
.header h3{
	margin: 0;
	padding: 20px;
	color: #fff;
	font-weight: normal;
	font-size: 18px;
	word-spacing: 8px;
	text-align: center;
}
.content-table{
	width: 80%;
	height: auto;
	float: left;
	margin: 40px 10% 100px 10%;
	color: #4a4a4a;
	font-size: 15px;
}
.table-tr{
	height: 50px;
}
#selectAll{
	float: right;
	border: none;
}
#receiverType{
	width: 96%;
    height: 36px;
    float: left;
    box-sizing: border-box;
    padding: 3px 8px 3px 10px;
    outline: none;
    border: 1px solid #a3a3a3;
    color: #757575;
    margin: 3px 2%;
}
#notiMsg{
	width: 96%;
    height: 80px;
    float: left;
    box-sizing: border-box;
    padding: 10px;
    outline: none;
    border: 1px solid #a3a3a3;
    color: #757575;
    margin: 3px 2%;
    resize: none;
}
#submitBtn{
	width: 15%;
    height: 40px;
    background-color: #2980b9;
    border: 1px solid #fff;
    color: #fff;
    border-radius: 5px;
    font-size: 100%;
    cursor: pointer;
    word-spacing: 2px;
    outline: none;
    transition: all 0.3s linear;
}
#submitBtn:hover{
	background-color: #034872;
}
</style>

<script type="text/javascript">
/*-------------------Select / Unselect All--------------------------*/
$(function(){
   $('#rotarySelectAll').click(function(){
       $('.rotaryDist').prop('checked', this.checked);
   });

   $('#innerSelectAll').click(function(){
       $('.innerDist').prop('checked', this.checked);
   });
});

function showDiv(){

	var receiverType = $('#receiverType').val();

	if (receiverType=='Rotarian'){

		$('#show_rotary').fadeIn('300');
		$('#show_inner').hide();
	}else if (receiverType=='Inner Wheel Member'){

		$('#show_rotary').hide();
		$('#show_inner').fadeIn('300');
	}else{

		$('#show_rotary').hide();
		$('#show_inner').hide();
	}
}
function validateData(){

	var receiverType = $('#receiverType').val();
	var notiMsg = $('#notiMsg').val();

	if (receiverType==''){
		alert('Select receiver');
		return false;
	}else if (notiMsg==''){
		alert('Enter notification message');
		return false;
	}
}
</script>
</head>


<body>

	<?php
	if (isset($_REQUEST['submitBtn'])){

		//$rotDist = implode(',', $_REQUEST['rotaryVal']);
		//echo $rotDist;
		$truncate = mysql_query("truncate noti_trigger");
		
		if ($_REQUEST['receiverType']=='All'){

			$query_getToken1 = mysql_query("select * from user_token");
			while ($getToken1 = mysql_fetch_array($query_getToken1)){

				$insert1 = "insert into noti_trigger(SLN, token_id, message) values('', '".$getToken1['token_id']."', '".$_REQUEST['notiMsg']."')";

				mysql_query($insert1);
			}
		}else if ($_REQUEST['receiverType']=='Others'){

			$query_getOthers = mysql_query("select id from user_master where user_type='Others'");
			while ($getOthers = mysql_fetch_array($query_getOthers)){

				$getToken2 = mysql_fetch_array(mysql_query("select * from user_token where user_id='".$getOthers['id']."'"));

				if ($getToken2['token_id']!=''){

					$insert2 = "insert into noti_trigger(SLN, token_id, message) values('', '".$getToken2['token_id']."', '".$_REQUEST['notiMsg']."')";

					mysql_query($insert2);
				}
			}
		}else if ($_REQUEST['receiverType']=='Rotarian'){

			$rotCount = count($_REQUEST['rotaryVal']);
			$rotDist = $_REQUEST['rotaryVal'];

			for ($i=0; $i < $rotCount; $i++){

				//$rotDist[$i]
				$query_getRotarian = mysql_query("select id from user_master where user_type='Rotarian' and user_district='".$rotDist[$i]."'");
				while ($getRotarian = mysql_fetch_array($query_getRotarian)){

					$getToken3 = mysql_fetch_array(mysql_query("select * from user_token where user_id='".$getRotarian['id']."'"));

					if ($getToken3['token_id']!=''){

						$insert3 = "insert into noti_trigger(SLN, token_id, message) values('', '".$getToken3['token_id']."', '".$_REQUEST['notiMsg']."')";

						mysql_query($insert3);
					}
				}
			}
		}else if ($_REQUEST['receiverType']=='Inner Wheel Member'){

			$innCount = count($_REQUEST['innerVal']);
			$innDist = $_REQUEST['innerVal'];
			
			for ($i=0; $i < $innCount; $i++){
				
				$query_getInner = "select id from user_master where user_type='Inner Wheel Member' and user_district='".$innDist[$i]."'";
				$result_getInner = mysql_query($query_getInner);
				while ($getInner = mysql_fetch_array($result_getInner)){

					$getToken4 = mysql_fetch_array(mysql_query("select * from user_token where user_id='".$getInner['id']."'"));
					
					if ($getToken4['token_id']!=''){

						$insert4 = "insert into noti_trigger(SLN, token_id, message) values('', '".$getToken4['token_id']."', '".$_REQUEST['notiMsg']."')";

						mysql_query($insert4);
					}
				}
			}
		}
	?>
	<script type="text/javascript">
		alert('Notifications were sent');
		//window.location = 'noti_trigger.php';
	</script>
	<?php
	}
	?>

	<div class="header"><h3>Trigger Notification</h3></div>

	<form action="" method="post" onsubmit="return validateData()" autocomplete="off">

	<div class="content-table">
	<table width="100%">
		<tr class="table-tr">
			<td width="40%">Select Receiver Type : </td>
			<td width="60%">
				<select name="receiverType" id="receiverType" onchange="showDiv()">
					<option value="">-- Please Select --</option>

					<option value="All">All</option>
					<option value="Others">Others</option>
					<option value="Rotarian">Rotarian</option>
					<option value="Inner Wheel Member">Inner Wheel Member</option>
				</select>
			</td>
		</tr>

		<tr><td colspan="2" style="height: 20px;"></td></tr>

		<tr id="show_rotary" style="display: none;">
			<td colspan="2">
				<table width="100%" border="1" style="border-collapse: collapse;">
					<tr class="table-tr" style="background-color: #222;color: #fff;">
						<td colspan="4" style="padding: 0 0 0 10px;">
							Select Rotary Districts

							<span style="float: right;margin-right: 20px;">
								Select All
								<input type="checkbox" name="rotarySelectAll" id="rotarySelectAll" value="" style="margin-left: 10px;" />
							</span>
						</td>
					</tr>

					<tr class="table-tr">

						<?php
						$c1 = 0;
						$n1 = 4;
						$i1 = 1;

						$query_getDistrict1 = mysql_query("select distinct(user_district) from user_master where user_type='Rotarian'");
						while ($getDistrict1 = mysql_fetch_array($query_getDistrict1)){

							if($c1 % $n1 == 0 && $c1 != 0){
								echo '</tr><tr class="table-tr">';
							}
							$c1++;
						?>
						<td style="text-align: center;">
							<?= $getDistrict1['user_district'] ?>
							<input type="checkbox" class="rotaryDist" name="rotaryVal[]" value="<?= $getDistrict1['user_district'] ?>" style="margin-left: 20px;" />
						</td>

						<?php } ?>

					</tr>
				</table>
			</td>
		</tr>

		<tr id="show_inner" style="display: none;">
			<td colspan="2">
				<table width="100%" border="1" style="border-collapse: collapse;">
					<tr class="table-tr" style="background-color: #222;color: #fff;">
						<td colspan="4" style="padding: 0 0 0 10px;">
							Select Inner Wheel Districts

							<span style="float: right;margin-right: 20px;">
								Select All
								<input type="checkbox" name="innerSelectAll" id="innerSelectAll" value="" style="margin-left: 10px;" />
							</span>
						</td>
					</tr>

					<tr class="table-tr">

						<?php
						$c2 = 0;
						$n2 = 4;
						$i2 = 1;

						$query_getDistrict2 = mysql_query("select distinct(user_district) from user_master where user_type='Inner Wheel Member'");
						while ($getDistrict2 = mysql_fetch_array($query_getDistrict2)){

							if($c2 % $n2 == 0 && $c2 != 0){
								echo '</tr><tr class="table-tr">';
							}
							$c2++;
						?>
						<td style="text-align: center;">
							<?= $getDistrict2['user_district'] ?>
							<input type="checkbox" class="innerDist" name="innerVal[]" value="<?= $getDistrict2['user_district'] ?>" style="margin-left: 20px;" />
						</td>

						<?php } ?>

					</tr>
				</table>
			</td>
		</tr>

		<tr><td colspan="2" style="height: 40px;"></td></tr>

		<tr class="table-tr">
			<td width="40%" style="vertical-align: top;">Type Message : </td>
			<td width="60%">
				<textarea name="notiMsg" id="notiMsg"></textarea>
			</td>
		</tr>

		<tr><td colspan="2" style="height: 40px;"></td></tr>

		<tr style="text-align: center;">
			<td colspan="2">
				<input type="submit" name="submitBtn" id="submitBtn" value="Send Notification" />
			</td>
		</tr>
	</table>
	</div>

	</form>
</body>
</html>