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
		
		
 .col-xs-3 {
    width: 25%;

	.line {
    position: absolute;
    left: 0;
    top: 0.5em;
    height: 2px;
    width: 100%;
    background-color: red;
    display: block;
}​
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
        <h3 style="color:#ffffff; text-align:center;">Summary Self Evaluation Report for all <?php echo $head; ?>s</h3>
      </div>
      <div class="col-xs-4" >
        <h5 style="color:#ffffff; text-align:right;">Home --> Report --> Summary All <?php echo $head; ?></h5>
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
<div>
<div class="contents">
<!--  <a class="togglethis">Toggle</a> -->


<?php	

$sql = "select a.id,a.exam_no,a.district,a.memname,a.exam_date,
		sum((select c.ans_marks from tbl_question_ans_master c where c.id=b.quest_ans_master_pk)) as marks
		from tbl_eva_exam_header a, tbl_eva_exam_details b
		where a.id=b.header_id_fk and a.exam_no='$stype' group by a.district";
//order by a.district;		
$r_query = mysql_query($sql); 
?>
<center>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 sec-box">
<div class="row">
<div class="col-md-3 col-xs-3" style="width : width: 25%;"><b>Sl. No.</b></div>
<div class="col-md-3 col-xs-3" style="width : width: 25%;"><b>District</b></div>
<div class="col-md-3 col-xs-3" style="width : width: 25%;"><b>Name</b></div>
<div class="col-md-3 col-xs-3" style="width : width: 25%;"><b>Total Marks</b></div>
<span class="line"></span>
</div>




<?php while ($row = mysql_fetch_array($r_query)){  ?>

<div class="row">
<div class="col-md-3 col-xs-3"><?php echo $i; ?></div>
<div class="col-md-3 col-xs-3"><?php echo $row["district"]; ?></div>
<div class="col-md-3 col-xs-3"><?php echo $row["memname"]; ?></div>
<div class="col-md-3 col-xs-3"><?php echo $row["marks"]; ?></div>
<span class="line"></span>
</div>



<?php
	$i=$i+1;
	} 
?>
</div>
<div class="col-md-3"></div>
</div>
</center>
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
