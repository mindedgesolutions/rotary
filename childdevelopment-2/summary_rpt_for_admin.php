<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

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

<script type="text/javascript">
function showNGO(str)
{
	var textHolderNGO = center_name.options[center_name.selectedIndex].text
	document.getElementById("txtNGOName").value = textHolderNGO;
}
function showFromMonth(str)
{
	var textHolderFromMonth = selMonth.options[selMonth.selectedIndex].text
	document.getElementById("txtFromMonth").value = textHolderFromMonth;
}
function showFromYear(str)
{
	var textFromYear = selYear.options[selYear.selectedIndex].text
	document.getElementById("txtFromYear").value = textFromYear;
}
function showToMonth(str)
{
	var textToMonth = selMonthto.options[selMonthto.selectedIndex].text
	document.getElementById("txtToMonth").value = textToMonth;
}
function showToYear(str)
{
	var textToYear = selYearto.options[selYearto.selectedIndex].text
	document.getElementById("txtToYear").value = textToYear;
}
		
</script>	
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
/*
$db_hostname = '103.227.62.215';
$db_username = 'rotary32_teach2';
$db_password = 'Rotary@2016';
$db_database = 'rotary32_teach2';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
*/
?>

<form action="" method="post">  
<!-- Month: <input type="text" name="term" /><br />   -->
<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Search</div>
		<div class="col-sm-2" style="border : 1px solid #303238;margin-top : 0px;"><b>NGO</b>
		<input type="text" id="txtNGOName" readonly name="txtNGOName" style="display:none;">
		<input type="text" id="txtFromMonth" readonly name="txtFromMonth" style="display:none;">
		<input type="text" id="txtFromYear" readonly name="txtFromYear" style="display:none;">
		<input type="text" id="txtToMonth" readonly name="txtToMonth" style="display:none;">
		<input type="text" id="txtToYear" readonly name="txtToYear" style="display:none;">
							
			<div class="form-group" style="padding-bottom:75px;">
				<div class="col-sm-12">
<?php
$sql = "SELECT id,center_name FROM tbl_admin WHERE type='NGO' and center_name!='' and status='Active' order by center_name";
$result = mysql_query($sql);

echo "<select class='form-control' width='100%' id='center_name' name='center_name' onchange='showNGO(this.value)'>";
echo '<option value="">Select NGO</option>';
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['id'] . "'>" . $row['center_name'] . "</option>";
}
echo "</select>";
?>				
				</div>
			</div>
		</div>
		
		<div class="col-sm-5" style="border : 1px solid #303238;margin-top : 0px;"><b>From,</b>
			<div class="form-group" style="padding-bottom:75px;">
				<div class="col-sm-6">
					Month:<select class="form-control" id="selMonth" name="selMonth" onchange="showFromMonth(this.value)">
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
					Year:<select class="form-control" id="selYear" name="selYear" onchange="showFromYear(this.value)">
					<option value="">Select Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
					</select>				
				</div>
			</div>
		</div>

		<div class="col-sm-5" style="border : 1px solid #303238;margin-top : 0px;"><b>To,</b>
			<div class="form-group" style="padding-bottom:75px;"> 
				<div class="col-sm-6">
					Month:<select class="form-control" id="selMonthto" name="selMonthto" onchange="showToMonth(this.value)">
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
					Year:<select class="form-control" id="selYearto" name="selYearto" onchange="showToYear(this.value)">
					<option value="">Select Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
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
	$ngo_name=$_POST['txtNGOName'];
	$fromMonth=$_POST['txtFromMonth'];
	$fromYear=$_POST['txtFromYear'];
	$toMonth=$_POST['txtToMonth'];
	$toYear=$_POST['txtToYear'];
?>	
		<table width='100%' border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
		<thead>
		<tr>
		  <th style='background-color:#1980cf; text-align:center; color:#ffffff;'><b>NGO Name</b></th>
		  <th style='background-color:#1980cf; text-align:center; color:#ffffff;'><b>From Month</b></th>
		  <th style='background-color:#1980cf; text-align:center; color:#ffffff;'><b>From Year</b></th>
		  <th style='background-color:#1980cf; text-align:center; color:#ffffff;'><b>To Month</b></th>
		  <th style='background-color:#1980cf; text-align:center; color:#ffffff;'><b>To Year</b></th>
		</tr>
		</thead>
		<tr>
		  <td style='text-align:center;'><?php echo $ngo_name; ?></td>
		  <td style='text-align:center;'><?php echo $fromMonth; ?></td>
		  <td style='text-align:center;'><?php echo $fromYear; ?></td>
		  <td style='text-align:center;'><?php echo $toMonth; ?></td>
		  <td style='text-align:center;'><?php echo $toYear; ?></td>
		</tr>
	 
	</table>
<?php

$selMonthfrom = $_POST['selMonth'];     
$selYearfrom = $_POST['selYear'];    
$indexfrom=$selYearfrom.$selMonthfrom;
//$selMonthto = mysql_real_escape_string($_REQUEST['selMonthto']);     
//$selYearto = mysql_real_escape_string($_REQUEST['selYearto']);     
$selMonthto = $_POST['selMonthto'];     
$selYearto = $_POST['selYearto'];     
$indexto=$selYearto.$selMonthto;

$ngoid=$_POST['center_name'];
//echo ($indexfrom);
//echo ($indexto);

$sql = "select a.centreid as centreid,b.center_name as centername,
count(case when a.llgrad = 'A' then 1 end) llgrad_A,
count(case when a.llgrad = 'B' then 1 end) llgrad_B,
count(case when a.llgrad = 'C' then 1 end) llgrad_C,
count(case when a.llgrad = 'D' then 1 end) llgrad_D,
count(case when a.enggrad = 'A' then 1 end) enggrad_A,
count(case when a.enggrad = 'B' then 1 end) enggrad_B,
count(case when a.enggrad = 'C' then 1 end) enggrad_C,
count(case when a.enggrad = 'D' then 1 end) enggrad_D,
count(case when a.mathgrad = 'A' then 1 end) mathgrad_A,
count(case when a.mathgrad = 'B' then 1 end) mathgrad_B,
count(case when a.mathgrad = 'C' then 1 end) mathgrad_C,
count(case when a.mathgrad = 'D' then 1 end) mathgrad_D,
count(case when a.envstudgrad = 'A' then 1 end) envstudgrad_A,
count(case when a.envstudgrad = 'B' then 1 end) envstudgrad_B,
count(case when a.envstudgrad = 'C' then 1 end) envstudgrad_C,
count(case when a.envstudgrad = 'D' then 1 end) envstudgrad_D,
count(case when a.holdevgrad = 'A' then 1 end) holdevgrad_A,
count(case when a.holdevgrad = 'B' then 1 end) holdevgrad_B,
count(case when a.holdevgrad = 'C' then 1 end) holdevgrad_C,
count(case when a.holdevgrad = 'D' then 1 end) holdevgrad_D
from tbl_Asha_Kirn_Children_Marks_Dtl a
left join tbl_admin b
on a.create_by=b.username
where a.nameofngo='". $ngoid ."' and a.monthindex>=$indexfrom and a.monthindex<=$indexto
group by a.centreid";
/*
on a.centreid=b.id
where a.nameofngo='". $ngoid ."' and a.monthindex>=$indexfrom and a.monthindex<=$indexto
group by a.centreid";
*/
			
$r_query = mysql_query($sql); 

echo "<table width='90%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
						      <thead>
								<tr>
									<th colspan='3' valign='middle' style='background-color:#1980cf; text-align:center'></th>
									<th colspan='23' valign='middle' style='background-color:#1980cf; text-align:center'>No. of Students Scoring Grade Subject Wise.</th>
								</tr>
								  <tr>
									  <th colspan='3' style='background-color:#1980cf;'></th>
									  <th colspan='4' valign='middle' style='background-color:#1980cf; text-align:center'>Local Language</th>
									  <th colspan='4' valign='middle' style='background-color:#1980cf; text-align:center'>Knowledge in English</th>
									  <th colspan='4' valign='middle' style='background-color:#1980cf; text-align:center'>Knowledge in Math</th>
									  <th colspan='4' valign='middle' style='background-color:#1980cf; text-align:center'>Environmental Studies (EVS)</th>
									  <th colspan='4' valign='middle' style='background-color:#1980cf; text-align:center'>Holistic Development</th>
								  </tr>
								  <tr>
									  <th width='5%' style='background-color:#1980cf; text-align:center;'>Sl. No.</th>
									  <th width='5%' style='background-color:#1980cf; text-align:center;'>Center ID</th>
									  <th width='30%' style='background-color:#1980cf; text-align:center;'>Center Name</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>A</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>B</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>C</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>D</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>A</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>B</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>C</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>D</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>A</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>B</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>C</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>D</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>A</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>B</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>C</th>
									  <th width='3%' style='background-color:#1980cf; text-align:center;'>D</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>A</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>B</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>C</th>
									  <th width='3%' style='background-color:#87CEFA; text-align:center;'>D</th>
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
			<td>".$row["centreid"]."</td>
			<td>".$row["centername"]."</td>				
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_A"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_B"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_C"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_D"]."</td>	
			<td style='text-align:center;'>".$row["enggrad_A"]."</td>
			<td style='text-align:center;'>".$row["enggrad_B"]."</td>
			<td style='text-align:center;'>".$row["enggrad_C"]."</td>
			<td style='text-align:center;'>".$row["enggrad_D"]."</td>
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_A"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_B"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_C"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_D"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_A"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_B"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_C"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_D"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_A"]."</td>		
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_B"]."</td>		
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_C"]."</td>		
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_D"]."</td>		
		</tr>
	  ";
	}
	else
	{
		echo "
		<tr class='altcol'>
			<td>".$i."</td>
			<td>".$row["centreid"]."</td>
			<td>".$row["centername"]."</td>				
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_A"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_B"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_C"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["llgrad_D"]."</td>	
			<td style='text-align:center;'>".$row["enggrad_A"]."</td>
			<td style='text-align:center;'>".$row["enggrad_B"]."</td>
			<td style='text-align:center;'>".$row["enggrad_C"]."</td>
			<td style='text-align:center;'>".$row["enggrad_D"]."</td>
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_A"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_B"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_C"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["mathgrad_D"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_A"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_B"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_C"]."</td>	
			<td style='text-align:center;'>".$row["envstudgrad_D"]."</td>	
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_A"]."</td>		
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_B"]."</td>		
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_C"]."</td>		
			<td style='text-align:center; background-color:#87CEFA;'>".$row["holdevgrad_D"]."</td>		
		</tr>
	  ";
	}
$startingID = $row["studid"];
$i=$i+1;
}  
echo "</table>";
}
?>
<br/>
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
