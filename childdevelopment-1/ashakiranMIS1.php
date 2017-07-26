<?php
session_start();

ob_start();
include('include/config.php');
include 'include/session_check.php';

$mesg = '';

$_SESSION['username'];
$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];
$_SESSION['uid'];

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

<form action="" method="post">  
<!-- Month: <input type="text" name="term" /><br />   -->
<div class="col-sm-12" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Search</div>
				  <div class="col-sm-12" style="border : 1px solid #303238;margin-top : 0px;">
				  <div class="form-group" style="padding-bottom:75px;">
					<div class="col-sm-3">
						Month:<select class="form-control" id="selMonth" name="selMonth" required >
							<option value="">Select Month</option>
								<option value="January" <?php if ($_REQUEST['selMonth']=='January'){echo 'selected';} ?> >January</option>
								<option value="February" <?php if ($_REQUEST['selMonth']=='February'){echo 'selected';} ?> >February</option>
								<option value="March" <?php if ($_REQUEST['selMonth']=='March'){echo 'selected';} ?> >March</option>
								<option value="April" <?php if ($_REQUEST['selMonth']=='April'){echo 'selected';} ?> >April</option>
								<option value="May" <?php if ($_REQUEST['selMonth']=='May'){echo 'selected';} ?> >May</option>
								<option value="June" <?php if ($_REQUEST['selMonth']=='June'){echo 'selected';} ?> >June</option>
								<option value="July" <?php if ($_REQUEST['selMonth']=='July'){echo 'selected';} ?> >July</option>
								<option value="August" <?php if ($_REQUEST['selMonth']=='August'){echo 'selected';} ?> >August</option>
								<option value="September" <?php if ($_REQUEST['selMonth']=='September'){echo 'selected';} ?> >September</option>
								<option value="October" <?php if ($_REQUEST['selMonth']=='October'){echo 'selected';} ?> >October</option>
								<option value="November" <?php if ($_REQUEST['selMonth']=='November'){echo 'selected';} ?> >November</option>
								<option value="December" <?php if ($_REQUEST['selMonth']=='December'){echo 'selected';} ?> >December</option>
							</select>
					</div>
					<div class="col-sm-3">
						Year:<select class="form-control" id="selYear" name="selYear" required >
						<option value="">Select Year</option>
							<option value="2016" <?php if ($_REQUEST['selYear']=='2016'){echo 'selected';} ?> >2016</option>
							<option value="2017" <?php if ($_REQUEST['selYear']=='2017'){echo 'selected';} ?> >2017</option>
							<option value="2018" <?php if ($_REQUEST['selYear']=='2018'){echo 'selected';} ?> >2018</option>
							<option value="2019" <?php if ($_REQUEST['selYear']=='2019'){echo 'selected';} ?> >2019</option>
							<option value="2020" <?php if ($_REQUEST['selYear']=='2020'){echo 'selected';} ?> >2020</option>
							<option value="2021" <?php if ($_REQUEST['selYear']=='2021'){echo 'selected';} ?> >2021</option>
							<option value="2022" <?php if ($_REQUEST['selYear']=='2022'){echo 'selected';} ?> >2022</option>
							<option value="2023" <?php if ($_REQUEST['selYear']=='2023'){echo 'selected';} ?> >2023</option>
							<option value="2024" <?php if ($_REQUEST['selYear']=='2024'){echo 'selected';} ?> >2024</option>
							<option value="2025" <?php if ($_REQUEST['selYear']=='2025'){echo 'selected';} ?> >2025</option>
						</select>		
						
					</div>
					<div class="col-sm-3">
					<?php
					//echo $type;
					//echo $_SESSION['uid'];
					 if($type=='NGO') { ?> 
					 
					  Center:<select class='form-control' width='100%' id='ddCenter' name='ddCenter' required>
						  	<option value=''>Select Center</option>
						  	<?php
								$ngoid=$_SESSION['uid'];
								$sql = "SELECT id,center_name FROM tbl_admin where idfk='" . $ngoid ."'";
								$result = mysql_query($sql);
								while ($row = mysql_fetch_array($result)) {
							?>
								<option value='<?php echo $row['id']; ?>' <?php if ($_REQUEST['ddCenter']==$row['id']){echo 'selected';} ?> ><?php echo $row['center_name']; ?></option>
							<?php
							}
							?>
							<option value="0">Not in Center</option>
							</select>
					 <?php } ?> 
					</div>

					<div class="col-sm-3">
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

if($type=='NGO'){ 
	$selCenter = mysql_real_escape_string($_REQUEST['ddCenter']);  
	$username =  $_SESSION['username'];

	$sql1 = "select child_id, child_name from tbl_child_profile_card 
	where create_by='$username' and centerid='".$selCenter."'"; 

	//where monname='".$selMonth."' AND year='".$selYear."' and create_by='$username' and centerid='".$selCenter."'"; 

$r_query1 = mysql_query($sql1); 

}
else if($type=='center'){
	$selCenter = $_SESSION['uid'];
	$username = "(select username from tbl_admin where id=(select idfk from tbl_admin where id='".$selCenter."'))";
	
	$sql1 = "select child_id, child_name from tbl_child_profile_card 
	where create_by=$username and centerid='".$selCenter."'"; 
/*
	 $sql1 = "select marksIDpk as marksid, stud_id, edustatus, llgrad as llgrad1,enggrad as enggrad1,mathgrad as mathgrad1,envstudgrad as envstudgrad1
,holdevgrad as holdevgrad1
,b.child_name as stud_name,b.child_id as child_id
from tbl_Asha_Kirn_Children_Marks_Dtl a inner join tbl_child_profile_card b 
on a.stud_id=b.child_id
where monname='".$selMonth."' AND year='".$selYear."' and b.create_by=$username and a.nameofcentre='".$selCenter."'   ";
*/
$r_query1 = mysql_query($sql1); 

}

echo "<table width='90%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
						      <thead>
								  <tr>
									<th width='2%' style='background-color:#1980cf;'>Sl. No.</th>
									  <th width='5%' style='background-color:#1980cf;'>Child ID</th>
									  <th width='25%' style='background-color:#1980cf;'>Child Name</th>
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
while ($row = mysql_fetch_array($r_query1)){  
	$sql2 = mysql_fetch_array(mysql_query("select edustatus, noofdayattend, percntofattendance, lllistskill, llspeakingskill, llreadingskill, llwritingskill, llagregate, llgrad, englistskill, engspeakingskill, engreadingskill, engwritingskill, engagregate, enggrad, mathprogarithmetic, mathanalyticalskill, mathegeoshape, mathagregate, mathgrad, envstudsocialknow, envstudnaturalenv, envstudcivicsense, envstudagregate, envstudgrad, holdevgenknow, holdevparticiactivities, holdevsociability, holdevleaderquility, holdevhealthhygiene, holdevagregate, holdevgrad, dtofregularisationinschool from tbl_Asha_Kirn_Children_Marks_Dtl where stud_id='".$row["child_id"]."' and monname='".$selMonth."' and year='".$selYear."'"));

	if ($i%2==0) 
	{
echo "
		<tr class='headercol'>
			<td>".$i."</td>
			<td>".$row["child_id"]."</td>
			<td>".$row["child_name"]."</td>
			<td>".$sql2["edustatus"]."</td>
			<td>".$sql2["noofdayattend"]."</td>
			<td>".$sql2["percntofattendance"]."</td>
			<td>".$sql2["lllistskill"]."</td>
			<td>".$sql2["llspeakingskill"]."</td>
			<td>".$sql2["llreadingskill"]."</td>
			<td>".$sql2["llwritingskill"]."</td>
			<td>".$sql2["llagregate"]."</td>
			<td><b>".$sql2["llgrad"]."</b></td>
			<td>".$sql2["englistskill"]."</td>
			<td>".$sql2["engspeakingskill"]."</td>
			<td>".$sql2["engreadingskill"]."</td>
			<td>".$sql2["engwritingskill"]."</td>
			<td>".$sql2["engagregate"]."</td>
			<td><b>".$sql2["enggrad"]."</b></td>
			<td>".$sql2["mathprogarithmetic"]."</td>
			<td>".$sql2["mathanalyticalskill"]."</td>
			<td>".$sql2["mathegeoshape"]."</td>
			<td>".$sql2["mathagregate"]."</td>
			<td><b>".$sql2["mathgrad"]."</b></td>
			<td>".$sql2["envstudsocialknow"]."</td>
			<td>".$sql2["envstudnaturalenv"]."</td>
			<td>".$sql2["envstudcivicsense"]."</td>
			<td>".$sql2["envstudagregate"]."</td>
			<td><b>".$sql2["envstudgrad"]."</b></td>
			<td>".$sql2["holdevgenknow"]."</td>
			<td>".$sql2["holdevparticiactivities"]."</td>
			<td>".$sql2["holdevsociability"]."</td>
			<td>".$sql2["holdevleaderquility"]."</td>
			<td>".$sql2["holdevhealthhygiene"]."</td>
			<td>".$sql2["holdevagregate"]."</td>
			<td><b>".$sql2["holdevgrad"]."</b></td>
			<td><b>".$sql2["dtofregularisationinschool"]."</b></td>
		</tr>
	  ";
	}
	else
	{
		echo "
		<tr class='altcol'>
			<td>".$i."</td>
			<td>".$row["child_id"]."</td>
			<td>".$row["child_name"]."</td>
			<td>".$sql2["edustatus"]."</td>
			<td>".$sql2["noofdayattend"]."</td>
			<td>".$sql2["percntofattendance"]."</td>
			<td>".$sql2["lllistskill"]."</td>
			<td>".$sql2["llspeakingskill"]."</td>
			<td>".$sql2["llreadingskill"]."</td>
			<td>".$sql2["llwritingskill"]."</td>
			<td>".$sql2["llagregate"]."</td>
			<td><b>".$sql2["llgrad"]."</b></td>
			<td>".$sql2["englistskill"]."</td>
			<td>".$sql2["engspeakingskill"]."</td>
			<td>".$sql2["engreadingskill"]."</td>
			<td>".$sql2["engwritingskill"]."</td>
			<td>".$sql2["engagregate"]."</td>
			<td><b>".$sql2["enggrad"]."</b></td>
			<td>".$sql2["mathprogarithmetic"]."</td>
			<td>".$sql2["mathanalyticalskill"]."</td>
			<td>".$sql2["mathegeoshape"]."</td>
			<td>".$sql2["mathagregate"]."</td>
			<td><b>".$sql2["mathgrad"]."</b></td>
			<td>".$sql2["envstudsocialknow"]."</td>
			<td>".$sql2["envstudnaturalenv"]."</td>
			<td>".$sql2["envstudcivicsense"]."</td>
			<td>".$sql2["envstudagregate"]."</td>
			<td><b>".$sql2["envstudgrad"]."</b></td>
			<td>".$sql2["holdevgenknow"]."</td>
			<td>".$sql2["holdevparticiactivities"]."</td>
			<td>".$sql2["holdevsociability"]."</td>
			<td>".$sql2["holdevleaderquility"]."</td>
			<td>".$sql2["holdevhealthhygiene"]."</td>
			<td>".$sql2["holdevagregate"]."</td>
			<td><b>".$sql2["holdevgrad"]."</b></td>
			<td><b>".$sql2["dtofregularisationinschool"]."</b></td>
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
