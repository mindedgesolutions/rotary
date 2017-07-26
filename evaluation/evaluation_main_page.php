<?php
//session_start();
//ob_start();

include('include/config02.php');
include 'include/session_check.php';

$_SESSION['uid'];
$_SESSION['prof_type'];
$_SESSION['district'];
//$_SESSION['username'];
$_SESSION['name'];
$_SESSION['mobile'];

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
				<h3 style="color:#ffffff; text-align:center;">Self Evaluation System for <?php echo $head; ?></h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;">Home --> <?php echo $head; ?> Evaluation</h5>
				</div>
			</div>
		</div>
		
        <!-- User Section Start -->
        
        <!-- Header Top Navigation End -->
        <div class="clearfix"></div>
      </header>
      <!-- Right Section Header End --> 
      <!-- Content Section Start -->  
  <?php /* 
	echo 'User Name : '. $_SESSION['first_name'] .'<br/>';
	echo 'NGO Name : '. $_SESSION['ngo_name'] .'<br/>';
	echo 'Type : '. $_SESSION['type'] .'<br/>';
	echo 'ID : '. $_SESSION['uid'] .'<br/>';
	*/

//echo 'ID : '. $_SESSION['uid'] .'<br/>';
//echo 'type : '. $_SESSION['prof_type'] .'<br/>';
//echo 'username : '. $_SESSION['username'] .'<br/>';
//echo 'name : '. $_SESSION['name'] .'<br/>';
//echo 'mobile : '. $_SESSION['mobile'] .'<br/>';

	?>


<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
						<div class="contents">
							<!--  <a class="togglethis">Toggle</a> -->
							<section class="boxpadding">
								<div class="contents">

							<!--  <a class="togglethis">Toggle</a> -->
							<section class="boxpadding">
							<?php  
							//$sqlAns = "select id,quest_master_id_fk,ans_no,ans_desc,ans_marks from tbl_question_ans_master where quest_master_id_fk='$id'";
							$sqlAns = "select id,eval_type_no,from_date,to_date from tbl_evaluation_master where eval_type_name='$stype' and deleted_b='n'";
							//$resultAns = $conn->query($sqlAns);

							//
							$resultAns = mysql_query($sqlAns);						
							$count4=mysql_num_rows($resultAns);
							if ($count4 > 0) {
							while($rowAns = mysql_fetch_array($resultAns)){
								extract($rowAns);
								$curentDate = date('Ymd'); // on 4th may 2016, would have been 20160504
								$dtBegin = date_format(date_create_from_format('d/m/Y', $from_date), 'Ymd');
								$dtEnd = date_format(date_create_from_format('d/m/Y', $to_date), 'Ymd');

								?>
							<div class="col-md-3">
								<blockquote>
								<?php
									if($curentDate >= $dtBegin && $curentDate <= $dtEnd){
								?>
										<a href="evaluation_entry_form.php?smbt=99&stype=<?php echo $stype; ?>&eval_type_no=<?php echo $eval_type_no; ?>"><?php echo $eval_type_no; ?></a><br/>
										<font size="2">(<?php echo $from_date ?> &nbsp;to&nbsp;<?php echo $to_date ?>)</font>
								<?php	
									}
									else
									{
								?>
										<a href="evaluation_entry_form.php?smbt=-1&stype=<?php echo $stype; ?>&eval_type_no=<?php echo $eval_type_no; ?>"><?php echo $eval_type_no ?></a><br/>
										<font size="2">(<?php echo $from_date ?> &nbsp;to&nbsp;<?php echo $to_date ?>)</font>
								<?php 
									}
								?>																
								</blockquote>	
							</div>	
							<?php
							 }
							 $i=$i+1;
							}
							?>
								<div class="clearfix"></div>
							</section>
						</div>
							</section>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br/>


      </div>
    </div>
    <!-- Wrapper End --> 
	
	


<br/>
  <!-- Logo Start -->
  <div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
  </div>
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
