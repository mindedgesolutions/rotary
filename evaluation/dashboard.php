<?php
//session_start();
//ob_start();

include('include/config02.php');
include 'include/session_check.php';

$_SESSION['uid'];
$_SESSION['prof_type'];
$_SESSION['district'];
$_SESSION['name'];
$_SESSION['mobile'];
$_SESSION['email'];

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
.table-tr{
	height: 40px;
	text-align: center;
	font-size: 100%;
	word-spacing: 5px;
	background-color: #363941;
	color: #fff;
}
.table-tr-row{
	height: 30px;
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
				<?php include('include/child_header.php'); $stype=$_SESSION['prof_type']; ?>
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
							<div class="col-md-12">
								<center>
								<label style="font-size:15px;">Evaluation of your performance is critical to the success of the TEACH Program.</label><br/> 
								<label style="font-size:15px;">Please undertake self-evaluation by selecting the relevant form from the <i>Evaluation</i> menu option.</label>
								</center>
								
							</div>
							<div class="clearfix"></div>
						</section>

						<table width="90%" border="1" style="border-collapse: collapse;margin: 0 5% 40px 5%;">
							<tr class="table-tr">
								<td width="5%">Sl No.</td>
								<td width="40%">Tasks</td>
								<td width="25%">Timeline</td>
								<td width="15%">Marks Obtained</td>
								<td width="15%">Total Marks</td>
							</tr>
						<?php
							
							//$query_getDet = mysql_query("select eval_type_no,from_date,to_date,part_desc from tbl_evaluation_master where eval_type_name='$stype'");
							
							$query_getDet = mysql_query("select a.id, a.eval_type_no,a.from_date,a.to_date,a.part_desc,b.quest_desc,SUM(b.quest_marks) as qustMarks
															from tbl_evaluation_master as a, tbl_question_master as b
															where a.id=b.evaluation_id_fk and a.eval_type_name='$stype' group by a.eval_type_no order by a.id");
							
							while ($getDet = mysql_fetch_array($query_getDet)){
									extract($getDet);
								//$getExam = mysql_fetch_array(mysql_query("select * from tbl_eva_exam_header where user_id_fk='".$_SESSION['uid']."' and evalu_type_no='Part-".$getDet['SLN']."'"));
							?>
							<tr class="table-tr-row">
								<td style="text-align: center;"><?= $getDet['eval_type_no'] ?></td>

								<td style="padding: 0 0 0 10px;"><?= $getDet['part_desc'] ?></td>

								<!-- <td style="text-align: center;word-spacing: 5px;"><?= date('d/m/Y', strtotime($getDet['from_date'])).' to '.date('d/m/Y', strtotime($getDet['to_date'])) ?></td>  -->
								<td style="text-align: center;word-spacing: 5px;"><?= $getDet['from_date'].' to '.$getDet['to_date'] ?></td> 
								<td>
								<?php 
									 $query_getDet_user = mysql_query("select sum(tbl_question_ans_master.ans_marks) as umarks
									from tbl_eva_exam_header inner join tbl_eva_exam_details on tbl_eva_exam_header.id=tbl_eva_exam_details.header_id_fk
									inner join tbl_question_ans_master 
									on tbl_eva_exam_details.quest_ans_master_pk=tbl_question_ans_master.id
									where evalu_type_no = '$eval_type_no' and tbl_eva_exam_header.user_id_fk='".$_SESSION['uid']."' and tbl_eva_exam_header.exam_no='$stype'");
									while ($getDetuser = mysql_fetch_array($query_getDet_user)){

										?>

									<?= $getDetuser['umarks'] ?>

									<?php
									}
									?>

								
								
								
								</td>
								<td style="padding: 0 0 0 10px;"><?= $getDet['qustMarks'] ?></td>
							</tr>
							<?php } ?>
						</table>
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
