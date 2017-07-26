<?php
include('include/config.php');
$msg = "";
?>

<!DOCTYPE html>
<html class="bg-black">
<head>
<meta charset="UTF-8">
<title>Child Development |</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-black">
<div class="form-box1" id="login-box">
  <div class="header">
  <br>
  </div>
  <div class="nav-tabs-custom">
  <form action="taggeddonor.php" method="post" enctype="multipart/form-data">
  
  <table width="100%" border="1">
  <tbody>
    <tr>
      <td width="33%" align="center"><input type="radio" name="r1" value="rotarian" style="vertical-align:baseline;" onclick="window.open('rotary.php');">
      <strong><font color="#000000" style="font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;Rotary</font></strong></td>
      
      <td width="33%" align="center"><input type="radio" name="r1" value="innerwheel" style="vertical-align:baseline;" onclick="window.open('iwc.php');"> 
      <strong><font color="#000000" style="font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;IWC</font></strong> </td>
      
      <td width="33%" align="center"><input type="radio" name="r1" value="other" style="vertical-align:baseline;" onclick="window.open('other.php');">
      <strong><font color="#000000" style="font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;Others</font></strong></td>
      
      <td height="60"></td>
      
    </tr>
    
    

  </tbody>
</table>

  
  
  
    
  </form>
    
      <!-- /.tab-pane --> 
    </div>
    <!-- /.tab-content --> 
  </div>
  <!----> 
</div>
<script type="text/javascript">
function loadXMLDoc(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('club').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_district.php?di="+id);
	xmlhttp.send();
}
</script>
<script type="text/javascript">
function loadXMLDoc2(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('club_iw').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_district.php?di="+id);
	//alert(id);
	xmlhttp.send();
}
</script>
<script type="text/javascript">
function loadXMLDoc3(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('club_un').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_district.php?di="+id);
	xmlhttp.send();
}
</script>
<script type="text/javascript">
/*function loadXMLDoc1(id)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('name').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","ajax_name.php?id="+id);
	xmlhttp.send();
}*/
</script>



<!-- jQuery 2.0.2 --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>