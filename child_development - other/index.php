<?php
include('include/config.php');
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
    <!--<ul class="nav nav-tabs">
      <li><a href="#tab_1" data-toggle="tab">Details list Child Tagged for Rotarians</a></li>
      <li><a href="#tab_2" data-toggle="tab">Details list Child Tagged for Inner Wheel</a></li>
      <li><a href="#tab_3" data-toggle="tab">Details list Child Untagged</a></li>
    </ul>-->
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
          <div class="body bg-gray">
          <form action="" method="post">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td><input type="radio" name="r1" value="tagged" onclick="javascript: window.location.href = 'taggeddonor.php';" />&nbsp;&nbsp;&nbsp;List of Tagged Donors</td>
                <td><input type="radio" name="r1" value="untagged" onclick="javascript: window.location.href = 'untaggeddonor.php';" />&nbsp;&nbsp;&nbsp;List of Untagged Donors</td>
              </tr>
            </table>
		  </form>
          </div>
           
      </div>
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