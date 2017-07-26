<?php
//session_start();
//ob_start();

include('include/config.php');
include 'include/session_check.php';

$_SESSION['uid'];
$_SESSION['prof_type'];
$_SESSION['district'];
$_SESSION['club'];
$_SESSION['name'];
$_SESSION['mobile'];
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
<script>
function getvalue(temp,i)
{
var controlid="txtAnsID"+i;
var controlVal=temp.value;
//alert(controlVal);
document.getElementById(controlid).value=controlVal;
}

function GetTextValue() {
			document.getElementById('txtQueIDmarksID').value="";
			var tot=document.getElementById('txtIval').value-1;
			var QuesIDansID=null;
				for(var i=1; i<=tot; i++)
				{
					QuesIDansID=QuesIDansID + document.getElementById('txtQuesID' + i).value + '#' + document.getElementById('txtAnsID' + i).value + '|';
				}
				QuesIDansID1=QuesIDansID.substring(4);			
				document.getElementById('txtQueIDmarksID').value = QuesIDansID1;							
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
<div class="structure-row"> 
	<div class="right-sec"> 
  <!-- Right Section Start -->
  
    <!-- Right Section Header Start -->
    <header> 
      <!-- User Section Start -->
      <?php include('include/child_header.php'); ?>
		<div>
			<h1 style="color:#ffffff; text-align:center;"></h1>
            <font color="#F4F3F3" style="float:right;">Home --> Evaluation --> DG Report</font>
		</div>
      
      <div class="clearfix"></div>
    </header>
    <br>
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
<form action="" method="post" enctype="multipart/form-data" >

<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
					<div class="contents">
						<!--  <a class="togglethis">Toggle</a> -->
						<section class="boxpadding">
							<div class="col-md-4">
								<blockquote>
									<label>District</label><br/>
									<input type="text" width="100%" id="txtDistrict" name="txtDistrict" value="<?php echo $_SESSION["district"]; ?>" readonly required/>
								</blockquote>	
							</div>
							<div class="col-md-4">
								<blockquote>
								<br/>
									<button type="submit" class="btn btn-primary" onClick="GetTextValue();">Search</button>
								</blockquote>	
								
							</div>
						
							<div class="clearfix"></div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- if district exist in database then it will open for edit mode -->

<!-- edit mode closed -->
	
<div class="col-xs-12">
	<div class="sec-box">
		<?php
				$district=$_SESSION['district'];
				//$sqlAns ="SELECT user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist FROM tbl_eva_exam_header where id=(select id from tbl_eva_member_master where district=$district)";
				$sqlAns="SELECT id,user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist FROM tbl_eva_exam_header where user_id_fk=(select id from tbl_eva_member_master where district='$district')";
				//echo $sqlAns;
				$resultAns = $conn->query($sqlAns);						
				if ($resultAns->num_rows > 0) {
				while($rowAns = $resultAns->fetch_assoc()) {
					extract($rowAns);
		?>
		<header>
			<h2 class="heading">
			<center>DG Report for District:<?php echo $dist ?><br/>
			(Name:<?php echo $memname ?> and Exam Date:<?php echo $exam_date ?>)
			</center>
			</h2>
		</header>
		<div class="contents">
		<?php	
				}
				}
				//echo ($indexfrom);
				//echo ($district);

				$sql = "select a.memname,a.exam_date,b.quest_master_pk,b.quest_ans_master_pk,
						(select d.quest_desc from tbl_question_master d where d.id=b.quest_master_pk) as Question,
						(select c.ans_desc from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as Ans,
						(select c.ans_marks from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as marks
						from tbl_eva_exam_header a, tbl_eva_exam_details b
						where a.id=b.header_id_fk and b.header_id_fk='". $id ."'";
						
							
				$r_query = mysql_query($sql); 
			
			echo "<section>";
			echo "<table class='table table-condensed'>
										  <thead>
											  <tr>
												  <th width='5%'>Sl. No.</th>
												  <th width='70%'>Question</th>
												  <th width='20%'>Answer</th>
												  <th width='5%%'>Marks</th>
											  </tr>
										  </thead>
										  ";
			
			while ($row = mysql_fetch_array($r_query)){  
			
			//while($row = $result->fetch_assoc()){

			echo "
					<tbody>
					<tr>
						<td>".$i."</td>
						<td>".$row["Question"]."</td>
						<td>".$row["Ans"]."</td>			
						<td align='right'>".$row["marks"]."</td>
					</tr>
					</tbody>
				  ";
			$value=	$row["marks"]; 
			$sum += $value;	  
			$i=$i+1;
			} 
		if($sum>0)
		{
			echo "
					<tbody>
					<tr>
						<td colspan='3'><center><h2>Total Marks Obtained</h2></center></td>
						<td align='right'><h2>".$sum."</h2></td>
					</tr>
					</tbody>
				  ";
			echo "</section>";
		}			
		else
		{
			echo "
					<tbody>
					<tr>
						<td colspan='3'><center><h2>!!! No Record Found !!!</h2></center></td>
					</tr>
					</tbody>
				  ";
			echo "</section>";
		}
			
			
?>
		</div>
	</div>
</div>				

</form>

		
</div>
</div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	  
	  
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
