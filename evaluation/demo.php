<?php
session_start();
ob_start();
include('include/config02.php');
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
        <?php include('include/child_header.php'); $stype=$_GET['stype']; ?>
      </div>
      <div class="col-xs-4">
        <h3 style="color:#ffffff; text-align:center;">Self Evaluation System</h3>
      </div>
      <div class="col-xs-4" >
        <h5 style="color:#ffffff; text-align:right;">Home</h5>
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
    <div class="col-md-4">
      <blockquote>
        <label>District</label>
        <br/>
        <!-- <input type="text" width="100%" id="txtDistrict" name="txtDistrict" value="<?php echo $_SESSION["district"]; ?>" readonly required/> -->
        <input type="text" readonly style="display:none;" id="txtstype" name="txtstype" value="<?php echo $stype; ?>">
        <?php
										$sql = "SELECT distinct(district_code) as district FROM all_district";
										$result = mysql_query($sql);

										echo "<select width='100%' id='district' name='district'>";
										echo '<option value="">Select District</option>';
										while ($row = mysql_fetch_array($result)) {
											echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
										}
										echo "</select>";
									?>
      </blockquote>
    </div>
    <div class="col-md-4">
      <blockquote> <br/>
        <button type="submit" class="btn btn-primary" onClick="GetTextValue();">Search</button>
      </blockquote>
    </div>
  </div>
</form>
<?php
				$district=$_POST['district'];
				//$sqlAns ="SELECT user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist FROM tbl_eva_exam_header where id=(select id from tbl_eva_member_master where district=$district)";
				$sqlAns="SELECT id,user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist FROM tbl_eva_exam_header where user_id_fk=(select id from tbl_eva_member_master where district='$district') and exam_no='$stype'";
				//echo $sqlAns;
				$resultAns = mysql_query($sqlAns);
				$count=mysql_num_rows($resultAns);
				if ($count > 0) {
				while($rowAns = mysql_fetch_array($resultAns)) {
					extract($rowAns);
?>
<?php	
}
}
//echo ($indexfrom);
//echo ($district);
$sql = "select a.memname,a.exam_date,b.quest_master_pk,b.quest_ans_master_pk,
(select d.quest_desc from tbl_question_master d where d.id=b.quest_master_pk) as Question,
(select c.ans_desc from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as Ans,
(select c.ans_marks from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as marks
from tbl_eva_exam_header a, tbl_eva_exam_details b where a.id=b.header_id_fk and b.header_id_fk='". $id ."' order by b.quest_master_pk";
$r_query = mysql_query($sql); 
?>
<table class='table'>
<thead>
  <tr>
    <th width='5%'>Sl. No.</th>
    <th width='70%'>Question</th>
    <th width='20%'>Answer</th>
    <th width='5%%'>Marks</th>
  </tr>
</thead>
<?php while ($row = mysql_fetch_array($r_query)){  ?>
<tbody>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row["Question"]; ?></td>
						<td><?php echo $row["Ans"]; ?></td>			
						<td align='right'><?php echo $row["marks"]; ?></td>
					</tr>

<?php
$value=	$row["marks"]; 
			$sum += $value;	  
			$i=$i+1;
			} 
		if($sum>0)
		{
?>
<tr>
						<td colspan='3'><center><h2>Total Marks Obtained</h2></center></td>
						<td align='right'><h2><?php echo $sum; ?></h2></td>
					</tr>
<?php
}			
		else
		{
?>
<tr>
						<td colspan='3'><center><h2>!!! No Record Found !!!</h2></center></td>
					</tr>
					</tbody>
<?php
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

<?php
	  include('include/footer.php');
	  ?>
<!-- Sidebar Navigation End -->

</div>
</body>
</html>
