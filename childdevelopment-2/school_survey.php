<?php
session_start();
ob_start();
//include('include/config.php');
$dbname="rotary32_teach";
$host="192.185.36.129";
$dbuname="rotary32_arindam";
$dbpass="info123";
$link=mysql_connect($host,$dbuname,$dbpass) or die("Can not connect SERVER."); 
$link2=mysql_select_db($dbname) or die("Can not connect SERVER.");

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
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
		document.getElementById('district').innerHTML=xmlhttp.responseText;
		alert(xmlhttp.responseText);
	}
	}
	xmlhttp.open("GET","volunteer_search.php?id="+id);
	xmlhttp.send();
}
</script>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
  <header> 
    <!-- Logo Start -->
    <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
    <!-- Logo End --> 
    <!-- Sidebar Navigation Start -->
    <?php include('include/mainnav.php'); ?>
    <div class="clearfix"></div>
    <!-- Sidebar Navigation End --> 
  </header>
  <div class="structure-row alone"> 
    <!-- Right Section Start -->
    <div class="right-sec"> 
      <!-- Right Section Header Start -->
      <header> 
        <!-- User Section Start -->
        <?php include('include/child_header.php'); ?>
        <div class="clearfix"></div>
      </header>
      <!-- Right Section Header End --> 
      <!-- Content Section Start -->
      <div class="content-section">
        <div class="container-liquid">
          <div class="row">
            <div class="col-xs-12">
              <div class="sec-box">
                <header>
                  <h2 class="heading">Registered Volunteer Search</h2>
                  <p>To search for volunteers, please select the category of volunteers and in case they are rotarians, select their district.</p>
                </header>
                
                <div class="contents">
                  <div class="col-xs-12">
                            <div class="sec-box">
                                <div class="contents boxpadding">
                                    <section>
                                        <div class="btn-group btn-group-justified">
                                        <form action="" method="post" enctype="multipart/form-data">
                                          <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-12" colspan="2">View Your Search</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="col-md-3">Category :</td>
                                                    <td class="col-md-9">
                                                     <select name="category" class="form-control" id="category" onChange="loadXMLDoc(this.value);">
                                                       <option value="">Select Category</option>
                                                       <?php 
														$sql1=mysql_query("select DISTINCT (vol_cat) from volunteer_form");
														while($row = mysql_fetch_array($sql1))
														{
														$data=$row['vol_cat'];
														?>
														<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
														<?php
														 } 
													   ?>
                                                     </select>
                                                    </td>
                                                </tr>  
                                                <!--<tr>
                                                    <td class="col-md-3">District :</td>
                                                    <td class="col-md-9">
                                                     <select name="district" class="form-control">
                                                       <option value="">Select District</option>
                                                     </select>
                                                    </td>
                                                </tr>--> 
                                                <tr>
                                                  <td class="col-md-12" align="center" colspan="2">
                                                  <input type="submit" class="btn btn-primary" name="submit" value="Search"></td>
                                                </tr> 
                                            </tbody>
                                          </table>
                                          </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
				  
                  <hr/>
                  
                  
                  <div class="col-xs-12">
                            <div class="sec-box">
                                <div class="contents boxpadding">
                                    <section>
                                        <div class="btn-group btn-group-justified">
                                          <div class="col-xs-12">
                            <div class="sec-box">
                                <header>
                                    <h2 class="heading">Search Result</h2>
                                </header>
                                <div class="contents">
                                    <section>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Rotary District</th>
                                                    <th>Respective Club</th>
                                                    <th>Full Name</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Rotarian</td>
                                                    <td>3291</td>
                                                    <td>Calcutta Mahanagar</td>
                                                    <td>Arindam Chatterjee</td>
                                                    <td>9836351952</td>
                                                    <td>chatterjeearindam52@yahoo.co.in</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                            </div>
                        </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                  
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row End --> 
        </div>
      </div>
    </div>
  </div>
  <!-- Wrapper End --> 
  <!-- Logo Start -->
  
  <?php
	  include('include/footer.php');
	  ?>
  <!-- Sidebar Navigation End --> 
  
</div>
</body>
</html>
