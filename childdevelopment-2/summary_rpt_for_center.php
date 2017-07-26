<?php
session_start();
ob_start();

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$i=1;

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
<link href="assets/css/jquery.multiselect.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>

<link rel="stylesheet" href="https://css-tricks.com/examples/ResponsiveTables/css/style.css">
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height: 60px;
		 background-color:#32343b;
		}
</style>
<style>
    
	/*
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

		 tr { border: 1px solid #ccc; }
		
		td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
		}

		/*
		Label the data
		*/
		td:nth-of-type(1):before { content: "Child ID"; }
		td:nth-of-type(2):before { content: "Child Name"; }
		td:nth-of-type(3):before { content: "Edu. Status"; }
		td:nth-of-type(4):before { content: "Number of days Present"; }
		td:nth-of-type(5):before { content: "% of Attendance"; }
		td:nth-of-type(6):before { content: "Local Language Grade"; }
		td:nth-of-type(7):before { content: "English Grade"; }
		td:nth-of-type(8):before { content: "Math Grade"; }
		td:nth-of-type(9):before { content: "Environmental Studies Grade"; }
		td:nth-of-type(10):before { content: "Holistic Development Grade"; }
		td:nth-of-type(11):before { content: "Details"; }
	}

	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body {
			padding: 0;
			margin: 0;
			width: 320px; }
		}

	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body {
			width: 495px;
		}
	}
.headercol
	{
		background-color : #b8d1f3;
	}
	.altcol
	{
		background-color : #dae5f4;
	}
	</style>	
</head>

<body>
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
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<div>
			<h1 style="color:#ffffff; text-align:center;">Summary Report </h1>
            <font color="#F4F3F3" style="float:right;">Report -> Summary</font>
		</div>
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
<div class="container">
<br/>
<?php
$db_hostname = '192.185.36.129';
$db_username = 'rotary32_teach2';
$db_password = 'info123';
$db_database = 'rotary32_teach2';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
?>

<form action="" method="post">  
<!-- Month: <input type="text" name="term" /><br />   -->
<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Search</div>
		<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;"><b>From,</b>
			<div class="form-group" style="padding-bottom:75px;">
				<div class="col-sm-6">
					Month:<select class="form-control" id="selMonth" name="selMonth" >
						<option value="">Select Month</option>
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>
				<div class="col-sm-6">
					Year:<select class="form-control" id="selYear" name="selYear" >
					<option value="">Select Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
					</select>				
				</div>
			</div>
		</div>

		<div class="col-sm-6" style="border : 1px solid #303238;margin-top : 0px;"><b>To,</b>
			<div class="form-group" style="padding-bottom:75px;"> 
				<div class="col-sm-6">
					Month:<select class="form-control" id="selMonth" name="selMonthto" >
					<option value="">Select Month</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
					</select>
				</div>
				<div class="col-sm-6">
					Year:<select class="form-control" id="selYear" name="selYearto" >
					<option value="">Select Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
					</select>				
				</div>		
			</div>
		</div>
		<div class="col-sm-12" align="center" style="height : 35px; color: #ffffff; margin-top:30px; padding : 5px;">
			<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="submit" value="Search" />
		</div>		
	</form> 				 
</div>


<div class="container">
<div class="col-sm-12">

<?php
if (!empty($_REQUEST['selMonth'])) {
//container
//$selMonthfrom = mysql_real_escape_string($_REQUEST['selMonth']);     
//$selYearfrom = mysql_real_escape_string($_REQUEST['selYear']);   

$selMonthfrom = $_POST['selMonth'];     
$selYearfrom = $_POST['selYear'];    
$indexfrom=$selYearfrom.$selMonthfrom;
//$selMonthto = mysql_real_escape_string($_REQUEST['selMonthto']);     
//$selYearto = mysql_real_escape_string($_REQUEST['selYearto']);     
$selMonthto = $_POST['selMonthto'];     
$selYearto = $_POST['selYearto'];     
$indexto=$selYearto.$selMonthto;

//echo ($indexfrom);
//echo ($indexto);

$sql = "SELECT a.monname as monname,a.year as year,a.stud_id as studid,b.child_name as childname,a.edustatus as edustatus,
		a.llgrad as llgrad,a.enggrad as enggrad,a.mathgrad as mathgrad,a.envstudgrad as envstudgrad,a.holdevgrad as holdevgrad,a.monthindex as monthindex 
		from tbl_Asha_Kirn_Children_Marks_Dtl a, tbl_child_profile_card b where a.stud_id=b.child_id
		and a.monthindex>=$indexfrom and a.monthindex<=$indexto
		and b.centerid='". $_SESSION['uid'] ."' order by a.stud_id";
			
$r_query = mysql_query($sql); 

echo "<table width='90%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
						      <thead>
								  <tr>
									  <th width='5%' style='background-color:#1980cf; text-align:center;'>Sl. No.</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center;'>Child ID</th>
									  <th width='20%' style='background-color:#1980cf; text-align:center;'>Child Name</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center;'>Month Name</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center;'>Year</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center;'>Edu Status</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center;'>Local Language Grade</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center;'>English Grade</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center;'>Math Grade</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center;'>Environmental Studies Grade</th>
									  <th width='10%' style='background-color:#1980cf; text-align:center;'>Holistic Development Grade</th>
								  </tr>
							  </thead>
							  ";
while ($row = mysql_fetch_array($r_query)){  

//while($row = $result->fetch_assoc()){
if ($i%2==0) 
	{
echo "
		<tr class='headercol'>
			<td>".$i."</td>
			<td>".$row["studid"]."</td>
			<td>".$row["childname"]."</td>			
			<td>".$row["monname"]."</td>
			<td>".$row["year"]."</td>
			<td>".$row["edustatus"]."</td>			
			<td style='text-align:center;'>".$row["llgrad"]."</td>	
			<td style='text-align:center;'>".$row["enggrad"]."</td>
			<td style='text-align:center;'>".$row["mathgrad"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad"]."</td>	
			<td style='text-align:center;'>".$row["holdevgrad"]."</td>		
		</tr>
	  ";
	}
	else
	{
		echo "
		<tr class='altcol'>
			<td>".$i."</td>
			<td>".$row["studid"]."</td>
			<td>".$row["childname"]."</td>			
			<td>".$row["monname"]."</td>
			<td>".$row["year"]."</td>
			<td>".$row["edustatus"]."</td>			
			<td style='text-align:center;'>".$row["llgrad"]."</td>	
			<td style='text-align:center;'>".$row["enggrad"]."</td>
			<td style='text-align:center;'>".$row["mathgrad"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad"]."</td>	
			<td style='text-align:center;'>".$row["holdevgrad"]."</td>		
		</tr>
	  ";
	}
$startingID = $row["studid"];
$i=$i+1;
}  

}
?>

<!--Footer Start-->

<!--Footer End--> 

</div>

</div>
	
</div>

      </div>
	  
    </div>
<br/>
  	
    
    <!-- Wrapper End --> 
  
</body>
</html>
