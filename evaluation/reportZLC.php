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
		if($stype=="evalu_dg")
			{
				$head = "DG";
			}
			if($stype=="evalu_zlc")
			{
				$head = "ZLC";
			}
		?>
      </div>
      <div class="col-xs-4">
        <h3 style="color:#ffffff; text-align:center;">Self Evaluation Report for <?php echo $head; ?></h3>
      </div>
      <div class="col-xs-4" >
        <h5 style="color:#ffffff; text-align:right;">Home --> Report --> <?php echo $head; ?></h5>
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

<input type="text" readonly style="display:none;" width="100%" id="txtDistrict" name="txtDistrict" value="<?php echo $_SESSION["district"]; ?>" readonly required/>
<input type="text" readonly style="display:none;" id="txtstype" name="txtstype" value="<?php echo $stype; ?>">
								
<div class="col-xs-12">
	<div class="sec-box">
		<h3><?php echo $head; ?> Report for District : &nbsp;<?php echo $_SESSION['district']; ?></h3>
		<h3>Name : &nbsp;<?php echo $_SESSION['name']; ?></h3><br/>
		
          	<table class='table'>
               <thead>

											  <tr>
											  <th width='10%'>Question No</th>
												  <th width='50%'>Question</th>
												  <th width='20%'>Answer</th>
												  <th width='10%' align='right'>Points Obtained</th>
												  <th width='10%' align='right'>Total Points</th>
											  </tr>
										  </thead>
		
		
		<?php
			$uid=$_SESSION['uid'];
			$sqlPart = "select eval_type_no from tbl_evaluation_master where eval_type_name='$stype' limit 1";

			//order by cast(substring(evalu_type_no,6,9) as UNSIGNED)
			$r_part = mysql_query($sqlPart);
			$countPart = mysql_num_rows($r_part);
			if($countPart>0){
				while($rowPart = mysql_fetch_array($r_part))
				{
					extract($rowPart);
					//echo $eval_type_no;
					$sqlpartid = "select eval_type_no,from_date,to_date,id as partid from tbl_evaluation_master where eval_type_name='$stype'";
					//echo $sqlpartid;
					$r_part_id = mysql_query($sqlpartid);
					$countpartid = mysql_num_rows($r_part_id);
					$curentDate = date('Ymd');
						$dtBegin = date_format(date_create_from_format('d/m/Y', $from_date), 'Ymd');
								$dtEnd = date_format(date_create_from_format('d/m/Y', $to_date), 'Ymd');
					?>

					<?php
					
					if($countpartid>0)
					{
						while($rowPartid = mysql_fetch_array($r_part_id))
						{
							extract($rowPartid);
							//echo $partid;
							//echo '<br/>';


							$sqlQuestion = "select id as questionID,quest_no,quest_desc,quest_marks from tbl_question_master where evaluation_id_fk='$partid'";


                            ?>

                                <tr>
					<td colspan="5" style="font-weight : bold;"><u><?php echo $eval_type_no; ?></i>&nbsp;(<?php echo $from_date; ?>&nbsp;to&nbsp;<?php echo $to_date; ?>)</u></td>

					</tr>

                                  
                            <?php


							/*$sqlQuestion = "select a.id as questionID,a.quest_no,a.quest_desc,a.quest_marks, 
							(select c.ans_desc from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as Ans,
							(select c.ans_marks from tbl_question_ans_master c where c.id=b.quest_ans_master_pk) as marks
							from tbl_question_master a, tbl_eva_exam_header d, tbl_eva_exam_details b
							where d.id=b.header_id_fk and b.header_id_fk='". $id ."' and a.evaluation_id_fk='$partid'";
						*/
							//from tbl_question_master a where a.evaluation_id_fk='$partid'";
							//echo $sqlQuestion;
							//echo '<br/>';
							$r_Question = mysql_query($sqlQuestion);
							$countQuestion = mysql_num_rows($r_Question);
                            ?>

                                 	
                            <?php
							
							
							if($countQuestion>0)
							{
								while($rowQuestion = mysql_fetch_array($r_Question)){
									extract($rowQuestion);									
									//echo $questionID; echo "-"; echo $quest_no; echo "-"; echo $quest_desc; echo "-"; echo $quest_marks;
									//echo "<br/>";
											
									$sqlHeader = "select quest_ans_master_pk from tbl_eva_exam_header inner join tbl_eva_exam_details
													on tbl_eva_exam_header.id=tbl_eva_exam_details.header_id_fk
													where tbl_eva_exam_header.user_id_fk='$uid'
													and tbl_eva_exam_details.quest_master_pk='$questionID'";
									$r_header = mysql_query($sqlHeader);
									$countHeader = mysql_num_rows($r_header);
									 	if($countHeader<1 ){
                                                          $totmarks= $totmarks + $quest_marks;
                                                          $totmarksobtained = $totmarksobtained + 0;

                                         ?>


									 		
									 	         <tr>
					<td><?php echo $quest_no; ?></td>
						<td><?php echo $quest_desc; ?></td>
						<td></td>
						<td align='right'>0</td>
						<td align='right'><?php echo $quest_marks; ?></td>
					</tr>
									 	
									 	<?php }
									
									if($countHeader>0){
										while($rowHeader = mysql_fetch_array($r_header)){
										extract($rowHeader);									
											//echo $quest_ans_master_pk;
											//echo "<br/>";
											$sqlAns = "select quest_master_id_fk,ans_no,ans_desc,ans_marks from tbl_question_ans_master where id='$quest_ans_master_pk'";
											$r_Ans = mysql_query($sqlAns);
											$countAns = mysql_num_rows($r_Ans);
											if($countAns>0){
													while($rowAns = mysql_fetch_array($r_Ans)){
													extract($rowAns);
													
													//echo $quest_master_id_fk; echo "-"; echo $ans_desc; echo "-"; echo $ans_marks;
													//echo "<br/>";

                                                       $totmarks= $totmarks + $quest_marks;
                                                          $totmarksobtained = $totmarksobtained + $ans_marks;
                                                    ?>

                                              <tr>
					<td><?php echo $quest_no; ?></td>
						<td><?php echo $quest_desc; ?></td>
						<td><?php echo $ans_desc; ?></td>
						<td align='right'><?php echo $ans_marks; ?></td>
						<td align='right'><?php echo $quest_marks; ?></td>
					</tr>

													
													<?php
													}

											}											
										}
									}
								}
							}
						}
					}
				}
			}
		
		?>
		
			<tr>
						<td colspan='3'><center><h2></h2></center></td>
						<td align='right'><h2><?php echo $totmarksobtained; ?></h2></td>
						<td align='right'><h2><?php echo $totmarks; ?></h2></td>
					</tr>
       </table>

    	

 	<?php
				$district=-12333;

				//$sqlAns="SELECT id,user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist,evalu_type_no FROM tbl_eva_exam_header where
				//user_id_fk=(select id from tbl_eva_member_master where district='$district') and exam_no='$stype'";
				$sqlAns="SELECT id,user_id_fk,exam_date,exam_no,memname,mobile_no,district as dist,evalu_type_no,cast(substring(evalu_type_no,6,9) as UNSIGNED) as part
				FROM tbl_eva_exam_header where user_id_fk=(select id from tbl_eva_member_master where district='$district') and exam_no='$stype' order by part";

				//echo $sqlAns;
				$resultAns = mysql_query($sqlAns);
				$count = mysql_num_rows($resultAns);
				if($count>0){
						while($rowAns = mysql_fetch_array($resultAns)) {
					extract($rowAns);
					//echo $id;
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
												  <th width='10%' align='right'>Points Obtained</th>
												  <th width='10%' align='right'>Total Points</th>
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
else
	{
?>
<!--<div class="col-md-12">
	<center>
		<br/><h2>!!! No Record Found !!!</h2>
	</center>
</div> -->	
<?php
}

?>      	
		
		</div>
	</div>
</div>

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

<!-- Sidebar Navigation End -->
<!--<div class="footer">
	  <?php
	  //include('include/footer.php');
	  ?>
  </div> -->
</div>

</body>
</html>
