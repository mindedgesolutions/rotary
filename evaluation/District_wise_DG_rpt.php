<?php
//session_start();
//ob_start();
include('include/config02.php');
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
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:60px;
		 background-color:#32343b;
		}
</style>	
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
  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-4">
        <?php include('include/child_header.php'); $stype=$_GET['stype']; 
		$eval_type_no = $_GET['eval_type_no'];
		$zd_fk = $_GET['id'];
		if($stype=="evalu_dg")
			{
				$head = "DG";
			}
			if($stype=="evalu_zlc")
			{
				$head = "ZLC";
			}
			if($stype=="evalu_dlcc")
			{
				$head = "DLCC";
			}
		?>
      </div>
      <div class="col-xs-4">
        <h3 style="color:#ffffff; text-align:center;">Self Evaluation Report for <?php echo $head; ?></h3>
      </div>
      <div class="col-xs-4" >
        <h5 style="color:#ffffff; text-align:right;">Home --> Report --> District wise <?php echo $head; ?></h5>
      </div>
    </div>
  </div>
  
  <!-- User Section Start --> 
  
  <!-- Header Top Navigation End -->
  <div class="clearfix"></div>
</header>
<!-- Right Section Header End --> 
<!-- Content Section Start -->
<div class="content-section">
<div class="container-liquid">
<div class="row">
<div class="col-xs-12">
<div class="sec-box">
<div class="contents">
<!--  <a class="togglethis">Toggle</a> -->

<form action="" method="post" enctype="multipart/form-data" >
  <div class="col-md-12">
    <div class="col-md-6">
      <blockquote>
        <h3><label>Please Select a District to view its performance.</label></h3>
        
        <!-- <input type="text" width="100%" id="txtDistrict" name="txtDistrict" value="<?php echo $_SESSION["district"]; ?>" readonly required/> -->
        <input type="text" readonly style="display:none;" id="txtstype" name="txtstype" value="<?php echo $stype; ?>">
        <?php
				
				if($zd_fk)
				{
					$sql = "select distinct(zd_name) as district from tbl_zd_details where zd_parent_fk='$zd_fk' and evalu_type='$stype'";
					$result = mysql_query($sql);
					echo "<select width='100%' id='district' name='district' required>";
					echo '<option value="">Select District</option>';
					while ($row = mysql_fetch_array($result)) {
						echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
					}
					echo "</select>";					
				}
				
				else{
					$sql = "select distinct(district) as district from tbl_eva_member_master where prof_type='$stype'";
					$result = mysql_query($sql);
					echo "<select width='100%' id='district' name='district' required>";
					echo '<option value="">Select District</option>';
					while ($row = mysql_fetch_array($result)) {
						echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
					}
					echo "</select>";
				}					
		?>
      </blockquote>
    </div>
    <div class="col-md-6">
      <blockquote> <br/>
        <button type="submit" class="btn btn-primary" name="submit" onClick="GetTextValue();">Search</button>
      </blockquote>
    </div>
  </div>
  
</form>
<?php
if(isset($_POST['submit']))
{							
	
	$district=$_POST['district'];
	//$district=$_SESSION['district'];
	$sqlAns="SELECT id,user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist,evalu_type_no,cast(substring(evalu_type_no,6,9) as UNSIGNED) as part 
				FROM tbl_eva_exam_header where user_id_fk in (select id from tbl_eva_member_master where district='$district') and exam_no='$stype' order by part";
				
	//$sqlAns="SELECT id,user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist,evalu_type_no,cast(substring(evalu_type_no,6,9) as UNSIGNED) as part 
	//FROM tbl_eva_exam_header where user_id_fk=(select id from tbl_eva_member_master where district='$district') and exam_no='$stype' order by part";
	//echo $sqlAns;
	$resultAns = mysql_query($sqlAns);
	$count = mysql_num_rows($resultAns);
	if($count>0){
			while($rowAns = mysql_fetch_array($resultAns)) {
		extract($rowAns);
?>
		
		<div class="contents">
		<?php	
				$sql = "select a.memname,a.exam_date,b.quest_master_pk,b.quest_ans_master_pk,a.evalu_type_no,
						(select d.quest_no from tbl_question_master d where d.id=b.quest_master_pk) as Questionno, 
						(select d.quest_desc from tbl_question_master d where d.id=b.quest_master_pk) as Question,
						(select c.ans_desc from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as Ans,
						(select d.quest_marks from tbl_question_master d where d.id=b.quest_master_pk) as total_points,
						(select c.ans_marks from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as marks
						from tbl_eva_exam_header a, tbl_eva_exam_details b
						where a.id=b.header_id_fk and b.header_id_fk='". $id ."' order by Questionno";
				//echo $sql;
				//b.quest_master_pk	
				//,substring(a.evalu_type_no,6,9) as part,
				$r_query = mysql_query($sql); 
			?>
			<section>
			
			<table class='table'>
				<thead>
					<?php
						$sqlDate = "select id,from_date,to_date from tbl_evaluation_master where eval_type_name='$stype' and eval_type_no='$evalu_type_no' and deleted_b='n'";
						$resultDate = mysql_query($sqlDate);						
							$count4=mysql_num_rows($resultDate);
							if ($count4 > 0) {
							while($rowDate = mysql_fetch_array($resultDate)){
								extract($rowDate);
					?>
					
					<tr><h5><u><i><?php echo $evalu_type_no; ?></i>&nbsp;(<?php echo $from_date; ?>&nbsp;to&nbsp;<?php echo $to_date; ?>)</u></h5></tr>
					<?php
							}
							}
					?>
				</thead>
				
										  <thead>
											
											  <tr>
												  <th width='10%'>Question No</th>
												  <th width='50%'>Question</th>
												  <th width='20%'>Answer</th>
												  <th width='10%'>Points Obtained</th>
												  <th width='10%'>Total Points</th>
											  </tr>
										  </thead>
			<?php							  
			
			while ($row = mysql_fetch_array($r_query)){
					$question = $row["Question"];
					$finalQuestion = substr( $question, 0, -11 );
			?>			
					<tbody>
					<tr>
						<td><?php echo $row["Questionno"]; ?></td>
						<td><?php echo $finalQuestion; ?></td>
						<td><?php echo $row["Ans"]; ?></td>	
						<td align='right'><?php echo $row["marks"]; ?></td>
						<td align='right'><?php echo $row["total_points"]; ?></td>	
					</tr>
					
			<?php 
			$value=	$row["marks"]; 
			$sum += $value;
			
			$pointsVal = $row["total_points"]; 
			$totalSum += $pointsVal;
			
			$i=$i+1;
			} 
			}
		if($sum>0)
		{
			?>		
					
					<tr>
						<td colspan='3'><center><h2></h2></center></td>						
						<td align='right'><h2><?php echo $sum; ?></h2></td>
						<td align='right'><h2><?php echo $totalSum; ?></h2></td>
					</tr>
					</tbody>
				</table>	
			</section>
<?php
}				
}
///////


///////

	else
	{
?>
<div class="col-md-12">
	<center>
        <h3><label>Self Evaluation Report for District : <?php echo $_POST['district']; ?></label></h3>
		<br/><h2>!!! No Record Found !!!</h2>
	</center>
</div>	
<?php
}
}
?>                    			                    			

</table>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Wrapper End --> 

<!-- Logo Start -->
<br/>
<br/>
<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
  </div>
<!-- Sidebar Navigation End -->

</div>
</body>
</html>
