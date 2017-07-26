<?php
session_start();

ob_start();
include('include/config.php');
include 'include/session_check.php';

$mesg = '';


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
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<link rel="stylesheet" href="https://css-tricks.com/examples/ResponsiveTables/css/style.css">
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
	
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>

</head>

<body style='font-family: Droid Sans, sans-serif;'>
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
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<div>
			<h1 style="color:#ffffff; text-align:center;">Asha Kiran(MIS)</h1>
            <font color="#F4F3F3" style="float:right;">Report -> MIS</font>
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
				  <div class="col-sm-12" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group" style="padding-bottom:75px;">
					<div class="col-sm-4">
						Month:<select class="form-control" id="selMonth" name="selMonth" >
							<option value="">Select Month</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
					</div>
					<div class="col-sm-4">
						Year:<select class="form-control" id="selYear" name="selYear" >
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
					<div class="col-sm-4">
<!--						<input class="btn btn-default" style="background-color: #134B96;" type="submit" value="Search" />  -->
						<br/>
						<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="submit" value="Search" />
					</div>
				  </div> 
				  </div>
				 
</div>

</form> 

<div class="container">
<br>

<?php
if (!empty($_REQUEST['selMonth'])) {

//$term = mysql_real_escape_string($_REQUEST['term']);     
$selMonth = mysql_real_escape_string($_REQUEST['selMonth']);     
$selYear = mysql_real_escape_string($_REQUEST['selYear']);     
							  
echo "<table width='50%' border='1px dashed' style='font-family: Droid Sans, sans-serif; overflow:scroll;'>
		<thead>
		<tr style='color-#ffffff;'>
		  <td style='color-#ffffff;'><b>NGO Name</b></td>
		  <td style='color-#ffffff;'><b>Center Name</b></td>
		  <td style='color-#ffffff;'><b>State</b></td>
		  <td style='color-#ffffff;'><b>District</b></td>
		  <td style='color-#ffffff;'><b>Block</b></td>
		  <td style='color-#ffffff;'><b>Month</b></td>
		  <td style='color-#ffffff;'><b>Year</b></td>
		</tr>
		</thead>
		<tr>
		  <td>".$_SESSION['ngo_name']."</td>
		  <td>".$_SESSION["center_name"]."</td>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td>".$selMonth."</td>
		  <td>".$selYear."</td>
		</tr>
	 
	</table>";

//$selMonth = 'January';     
//$selYear = '2016';     

//$sql = "SELECT a.marksIDpk as marksid, a.stud_id as stud_id,b.child_name as stud_name,a.edustatus as edustatus,a.noofdayattend as noofdayattend1, 
		//a.percntofattendance as percntofattendance1,a.llgrad as llgrad1,a.enggrad as enggrad1,a.mathgrad as mathgrad1,a.envstudgrad as envstudgrad1,
		//a.holdevgrad as holdevgrad1 FROM 
		//tbl_child_profile_card b left join tbl_Asha_Kirn_Children_Marks_Dtl a on a.stud_id=b.child_id  
		//where monname='".$selMonth."' AND year='".$selYear."'"; 
		//<th width='10%' style='background-color:#1980cf;'>ID</th> 
		//<td>".$row["marksid"]."</td>
$sql = "SELECT
		(select marksIDpk from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as marksid,
		(select stud_id from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as stud_id,
		(select edustatus from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as edustatus,
		(select noofdayattend from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as noofdayattend,
		(select percntofattendance from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as percntofattendance,
		(select lllistskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as lllistskill,
		(select llspeakingskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as llspeakingskill,
		(select llreadingskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as llreadingskill,
		(select llwritingskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as llwritingskill,
		(select llagregate from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as llagregate,
		(select llgrad from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as llgrad,
		(select englistskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as englistskill,		
		(select engspeakingskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as engspeakingskill,		
		(select engreadingskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as engreadingskill,		
		(select engwritingskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as engwritingskill,		
		(select engagregate from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as engagregate,		
		(select enggrad from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as enggrad,		
		(select mathprogarithmetic from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as mathprogarithmetic,		
		(select mathanalyticalskill from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as mathanalyticalskill,		
		(select mathegeoshape from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as mathegeoshape,		
		(select mathagregate from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as mathagregate,		
		(select mathgrad from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as mathgrad,		
		(select envstudsocialknow from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as envstudsocialknow,		
		(select envstudnaturalenv from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as envstudnaturalenv,		
		(select envstudcivicsense from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as envstudcivicsense,		
		(select envstudagregate from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as envstudagregate,		
		(select envstudgrad from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as envstudgrad,		
		(select holdevgenknow from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as holdevgenknow,		
		(select holdevparticiactivities from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as holdevparticiactivities,		
		(select holdevsociability from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as holdevsociability,		
		(select holdevleaderquility from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as holdevleaderquility,	
		(select holdevhealthhygiene from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as holdevhealthhygiene,	
		(select holdevagregate from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as holdevagregate,		
		(select holdevgrad from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as holdevgrad,		
		(select dtofregularisationinschool from tbl_Asha_Kirn_Children_Marks_Dtl a where a.stud_id=b.child_id and a.monname='".$selMonth."' AND a.year='".$selYear."' AND a.create_by = '" . $_SESSION['username'] ."') as dtofregularisationinschool,			
		b.child_name as stud_name,b.child_id as child_id FROM tbl_child_profile_card b where b.create_by='". $_SESSION['username'] ."' order by b.child_name";
	
$r_query = mysql_query($sql); 

echo "<table width='90%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
						      <thead>
								<tr>
									  <th colspan='6' style='background-color:#1980cf;'></th>
									  <th colspan='6' valign='middle' style='background-color:#1980cf; text-align:center'>Local Language</th>
									  <th colspan='6' valign='middle' style='background-color:#1980cf; text-align:center'>Knowledge in English</th>
									  <th colspan='5' valign='middle' style='background-color:#1980cf; text-align:center'>Knowledge in Math</th>
									  <th colspan='5' valign='middle' style='background-color:#1980cf; text-align:center'>Environmental Studies (EVS)</th>
									  <th colspan='7' valign='middle' style='background-color:#1980cf; text-align:center'>Holistic Development</th>
									  <th colspan='3' valign='middle' style='background-color:#1980cf; text-align:center'>Others</th>
								</tr>
								  <tr>
									  <th style='background-color:#1980cf;'>Sl. No.</th>
									  <th style='background-color:#1980cf;'>Child ID</th>
									  <th style='background-color:#1980cf;'>Child Name</th>
									  <th style='background-color:#1980cf;'> Edu. Status</th>
									  <th style='background-color:#1980cf;'>Number of days attend during the month</th>
									  <th style='background-color:#1980cf;'>% of Attendance</th>
									  
									  <th style='background-color:#1980cf;'>Listening Skill</th>
									  <th style='background-color:#1980cf;'>Speaking Skill</th>
									  <th style='background-color:#1980cf;'>Reading Skill</th>
									  <th style='background-color:#1980cf;'>Writing Skill</th>
									  <th style='background-color:#1980cf;'>Total %</th>
									  <th style='background-color:#1980cf;'>Grade</th>
									  
									  <th style='background-color:#1980cf;'>Listening Skill</th>
									  <th style='background-color:#1980cf;'>Speaking Skill</th>
									  <th style='background-color:#1980cf;'>Reading Skill</th>
									  <th style='background-color:#1980cf;'>Writing Skill</th>
									  <th style='background-color:#1980cf;'>Total %</th>
									  <th style='background-color:#1980cf;'>Grade</th>
									  
									  <th style='background-color:#1980cf;'>Progress in Arithmetic</th>
									  <th style='background-color:#1980cf;'>Analytical Skill</th>
									  <th style='background-color:#1980cf;'>Understanding of Geometrical shapes & concept</th>
									  <th style='background-color:#1980cf;'>Total %</th>
									  <th style='background-color:#1980cf;'>Grade</th>
									  
									  <th style='background-color:#1980cf;'>Social knowledge</th>
									  <th style='background-color:#1980cf;'>Natural Environmental knowledge</th>
									  <th style='background-color:#1980cf;'>Civic Sense</th>
									  <th style='background-color:#1980cf;'>Total %</th>
									  <th style='background-color:#1980cf;'>Grade</th>
									  
									  <th style='background-color:#1980cf;'>General Knowledge</th>
									  <th style='background-color:#1980cf;'>Participation in Activities</th>
									  <th style='background-color:#1980cf;'>Sociability</th>
									  <th style='background-color:#1980cf;'>Leadership Quality</th>
									  <th style='background-color:#1980cf;'>Health & Hygiene</th>
									  <th style='background-color:#1980cf;'>Total %</th>
									  <th style='background-color:#1980cf;'>Grade</th>
									  
									  <th style='background-color:#1980cf;'>Date of regularisation in school</th>
									  
									  
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
			<td>".$row["child_id"]."</td>
			<td>".$row["stud_name"]."</td>
			<td>".$row["edustatus"]."</td>
			<td>".$row["noofdayattend"]."</td>			
			<td>".$row["percntofattendance"]."</td>			
			<td>".$row["lllistskill"]."</td>			
			<td>".$row["llspeakingskill"]."</td>			
			<td>".$row["llreadingskill"]."</td>			
			<td>".$row["llwritingskill"]."</td>			
			<td>".$row["llagregate"]."</td>			
			<td>".$row["llgrad"]."</td>			
			<td>".$row["englistskill"]."</td>			
			<td>".$row["engspeakingskill"]."</td>			
			<td>".$row["engreadingskill"]."</td>			
			<td>".$row["engwritingskill"]."</td>			
			<td>".$row["engagregate"]."</td>			
			<td>".$row["enggrad"]."</td>			
			<td>".$row["mathprogarithmetic"]."</td>			
			<td>".$row["mathanalyticalskill"]."</td>			
			<td>".$row["mathegeoshape"]."</td>			
			<td>".$row["mathagregate"]."</td>			
			<td>".$row["mathgrad"]."</td>			
			<td>".$row["envstudsocialknow"]."</td>			
			<td>".$row["envstudnaturalenv"]."</td>			
			<td>".$row["envstudcivicsense"]."</td>
			<td>".$row["envstudagregate"]."</td>			
			<td>".$row["envstudgrad"]."</td>			
			<td>".$row["holdevgenknow"]."</td>			
			<td>".$row["holdevparticiactivities"]."</td>
			<td>".$row["holdevsociability"]."</td>
			<td>".$row["holdevleaderquility"]."</td>
			<td>".$row["holdevhealthhygiene"]."</td>
			<td>".$row["holdevagregate"]."</td>			
			<td>".$row["holdevgrad"]."</td>
			<td>".$row["dtofregularisationinschool"]."</td>			
		</tr>
	  ";
	}
	else
	{
		echo "
		<tr class='altcol'>
			<td>".$i."</td>
			<td>".$row["child_id"]."</td>
			<td>".$row["stud_name"]."</td>
			<td>".$row["edustatus"]."</td>
			<td>".$row["noofdayattend"]."</td>			
			<td>".$row["percntofattendance"]."</td>			
			<td>".$row["lllistskill"]."</td>			
			<td>".$row["llspeakingskill"]."</td>			
			<td>".$row["llreadingskill"]."</td>			
			<td>".$row["llwritingskill"]."</td>			
			<td>".$row["llagregate"]."</td>			
			<td>".$row["llgrad"]."</td>			
			<td>".$row["englistskill"]."</td>			
			<td>".$row["engspeakingskill"]."</td>			
			<td>".$row["engreadingskill"]."</td>			
			<td>".$row["engwritingskill"]."</td>			
			<td>".$row["engagregate"]."</td>			
			<td>".$row["enggrad"]."</td>			
			<td>".$row["mathprogarithmetic"]."</td>			
			<td>".$row["mathanalyticalskill"]."</td>			
			<td>".$row["mathegeoshape"]."</td>			
			<td>".$row["mathagregate"]."</td>			
			<td>".$row["mathgrad"]."</td>			
			<td>".$row["envstudsocialknow"]."</td>			
			<td>".$row["envstudnaturalenv"]."</td>			
			<td>".$row["envstudcivicsense"]."</td>
			<td>".$row["envstudagregate"]."</td>			
			<td>".$row["envstudgrad"]."</td>			
			<td>".$row["holdevgenknow"]."</td>			
			<td>".$row["holdevparticiactivities"]."</td>
			<td>".$row["holdevsociability"]."</td>
			<td>".$row["holdevleaderquility"]."</td>
			<td>".$row["holdevhealthhygiene"]."</td>			
			<td>".$row["holdevagregate"]."</td>			
			<td>".$row["holdevgrad"]."</td>
			<td>".$row["dtofregularisationinschool"]."</td>			
		</tr>
	  ";
	}
$i=$i+1;
}  

}
?>

</div>
</div>
<?php
//include('include/footer.php');
?>	  	  
      </div>
    </div>
	</div>
    
    <!-- Wrapper End --> 
  <br/>
</body>
</html>
