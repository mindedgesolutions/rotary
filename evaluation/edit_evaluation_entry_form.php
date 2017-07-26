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
$j=1;
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
			var minAns=null;
				for(var i=1; i<=tot; i++)
				{
					minAns=minAns+document.getElementById('txtAnsID' + i).value;
					QuesIDansID=QuesIDansID + document.getElementById('txtQuesID' + i).value + '#' + document.getElementById('txtAnsID' + i).value + '|';
				}
				QuesIDansID1=QuesIDansID.substring(4);			
				document.getElementById('txtQueIDmarksID').value = QuesIDansID1;
				if(minAns=='null')
				{
					alert('Please select minmum one answer');
					return false;
				}				
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
  <?php include('include/mainnav.php'); $stype=$_GET['stype'];
  $eval_type_no = $_GET['eval_type_no'];
  ?>
  
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
				<?php include('include/child_header.php'); 
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
				<h3 style="color:#ffffff; text-align:center;">Edit Self Evaluation Form for <?php echo $head; ?></h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;">Home --> Evaluation --> <?php echo $head; ?></h5>
				</div>
			</div>
		</div>
        <!-- User Section Start -->
        
        <!-- User Section End --> 
        
        <!-- Search Section Start -->
                
        <!-- Header Top Navigation End -->
        <div class="clearfix"></div>
      </header>
	  
    <br>
<?php  
	$smbt=$_GET['smbt'];
	$district=$_SESSION['district'];
	$sqlFrmExpir = "select from_date,to_date from tbl_evaluation_master where eval_type_name='$stype' and eval_type_no='$eval_type_no'";
	$resultFrmExpir = mysql_query($sqlFrmExpir);
	$count9 = mysql_num_rows($resultFrmExpir);
	if ($count9 > 0) {
	while($row9 = mysql_fetch_array($resultFrmExpir)) {
		extract($row9);
	}
	}
	/*
	$curentDate = date('Ymd'); // on 4th may 2016, would have been 20160504
	$dtBegin = date_format(date_create_from_format('d/m/Y', $from_date), 'Ymd');
	$dtEnd = date_format(date_create_from_format('d/m/Y', $to_date), 'Ymd');
	echo ($curentDate >= $dtBegin && $curentDate <= $dtEnd) ? "" : "<script>window.location.href='http://rotaryteach.org/evaluation/error.php'</script>";
	*/
	?>

<form  class="form-horizontal" name="frm" id="frm" onsubmit="return GetTextValue();" action="upd_evaluation_entry_form.php" method="get" enctype="multipart/form-data">

<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
					<div class="contents">
						<input type="hidden" id="txtName" name="txtName" value="<?php echo $_SESSION['name']; ?>" />
						<input type="hidden" id="txtMobNo" name="txtMobNo" value="<?php echo $_SESSION["mobile"]; ?>" />
						<input type="hidden" id="txtDistrict" name="txtDistrict" value="<?php echo $_SESSION["district"]; ?>" />
						
						<!--  <a class="togglethis">Toggle</a> -->
						<!--<section class="boxpadding">
						
							<div class="col-md-4">
								<blockquote>
									<label>Name</label>
									<input type="text" width="100%" id="txtName" name="txtName" value="<?php echo $_SESSION['name']; ?>" required/>
								</blockquote>
							</div>	
							<div class="col-md-4">
								<blockquote>
									<label>Mobile No</label>
									<input type="text" width="100%" id="txtMobNo" name="txtMobNo" value="<?php echo $_SESSION["mobile"]; ?>" required/>
								</blockquote>	
								
							</div>
							<div class="col-md-4">
								<blockquote>
									<label>District</label>
									<input type="text" width="100%" id="txtDistrict" name="txtDistrict" value="<?php echo $_SESSION["district"]; ?>" readonly required/>
								</blockquote>	
								
							</div>
						
							<div class="clearfix"></div>
						</section>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- if district exist in database then it will open for edit mode -->

<!-- edit mode closed -->
	
<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
					<!-- <a class="closethis">Close</a> -->
					<center>
					<header>
						<?php  
						
						
						$sql = "select * from tbl_evaluation_master where eval_type_name='$stype' and eval_type_no='$eval_type_no'";
						
							$result = mysql_query($sql);
							$count2=mysql_num_rows($result);
							if ($count2 > 0) {
							while($row = mysql_fetch_array($result)) {
								extract($row);
							}
							}
						?>
						<h3 class="heading"><?php echo $eval_type_desc; ?><br/><br/><?php echo $eval_type_no; ?><br/><br/><u>(<?php echo $from_date ?> &nbsp;to&nbsp;<?php echo $to_date ?>)</u><h3>
						<!-- <h1 class="heading">You are representing your district, the success of your district depends upon you.</h1> -->
						<?php if ($smbt == '-1') { ?>
						<h5>You may submit your answers between the date range mentioned.</h5>
						<?php } ?>
					</header>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>		

<div class="content-section">
	<div class="container-liquid">
		<div class="row">
		<?php  
			$sql = "select id,evaluation_id_fk,quest_no,quest_desc,quest_marks from tbl_question_master where evaluation_id_fk='$id'";
			//$result = $conn->query($sql);
			$result3 = mysql_query($sql);						
			$count3=mysql_num_rows($result3);
			if ($count3 > 0) {
			while($row3 = mysql_fetch_array($result3)) {
				extract($row3);
			?>
			<div class="col-xs-12">
				<div class="sec-box">
					<!-- <a class="closethis">Close</a> -->
					<header>
						<h3 class="heading"><?php echo $i; ?>.&nbsp;<?php echo $quest_desc; ?></h3>
						<input type="text" style="display:none;" readonly id="txtQuesID<?php echo $i; ?>" name="txtQuesID<?php echo $i; ?>" value="<?php echo $id; ?>">
						
					</header>
					
					<div class="contents">
						<!--  <a class="togglethis">Toggle</a> -->
						<section class="boxpadding">
						<?php  
						/* Check Anster */
						$quest_ans_master_pkPrev=0;
						$sqlAnsPrev="select * from tbl_eva_exam_details where quest_master_pk='$id' and header_id_fk in (select id from tbl_eva_exam_header where district='$district' and exam_no='$stype' and evalu_type_no='$eval_type_no')";
						
						$resultAnsPrev = mysql_query($sqlAnsPrev);
						$count4Prev=mysql_num_rows($resultAnsPrev);
						if ($count4Prev > 0) {
							while($rowAnsPrev = mysql_fetch_array($resultAnsPrev)){
								//extract($rowAnsPrev);
								$quest_ans_master_pkPrev=$rowAnsPrev['quest_ans_master_pk'];
							}
							
						}
						?>
						<input type="text" style="display:none;" readonly id="txtAnsID<?php echo $i; ?>" name="txtAnsID<?php echo $i; ?>" value="<?php echo $quest_ans_master_pkPrev; ?>">
						<?php
						
						/* Check Anster */
						$c='';
						$sqlAns = "select id,quest_master_id_fk,ans_no,ans_desc,ans_marks from tbl_question_ans_master where quest_master_id_fk='$id'";
						//$resultAns = $conn->query($sqlAns);						
						$resultAns = mysql_query($sqlAns);						
						$count4=mysql_num_rows($resultAns);
						if ($count4 > 0) {
						while($rowAns = mysql_fetch_array($resultAns)){
							extract($rowAns);
							if($quest_ans_master_pkPrev==$id){
									$c='checked=checked';
								}
								else{
									$c='';
								}
							
					    ?>
						
						<div class="col-md-6">
							<blockquote>
								<label class="radio-inline">
								<input type = "radio" name = "ans<?php echo $i; ?>" id = "ans<?php echo $i; ?>" onclick="getvalue(this,<?php echo $i; ?>)" value="<?php echo $id; ?>" <?php echo $c; ?> /><?php echo $ans_desc; ?>
								</label>
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
					
				</div>
			</div>
			<?php
			 }
			}
		?>
		</div>
	</div>
</div>
<?php
if ($smbt == '99') { ?>

<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
					<!-- <a class="closethis">Close</a> -->
					<center>
					<header>
     <?php
						$sql7 = "select id from tbl_eva_exam_header where district='$district' and exam_no='$stype' and evalu_type_no='$eval_type_no'";
						//echo $sql7;
						//$result = $conn->query($sql);
						$result7 = mysql_query($sql7);
						$count7=mysql_num_rows($result7);
						if ($count7 > 0) {
						while($row7 = mysql_fetch_array($result7)) {
							extract($row7);
						?>
     <input type="text" readonly style="display:none;"  id="txtstype" name="txtstype" value="<?php echo $stype; ?>">
					<input type="text" readonly style="display:none;" id="txt_evalu_type_no" name="txt_evalu_type_no" value="<?php echo $eval_type_no; ?>">
						<input type="text" readonly style="display:none;" id="txtHeaderIDFK" name="txtHeaderIDFK" value="<?php echo $id; ?>">
						<input type="text" readonly style="display:none;" id="txtIval" name="txtIval" value="<?php echo $i; ?>">
						<input type="text" readonly style="display:none;" id="txtQueIDmarksID" name="txtQueIDmarksID" value="">
						<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</header>
					</center>
					<?php
						}
						}
						?>
				</div>
			</div>
		</div>
	</div>
</div>			
<?php } ?>

<?php
if ($smbt == '-1') { ?>
<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
					<!-- <a class="closethis">Close</a> -->
					<center>
					<header>
					
					<input type="text"  style="display:none;" readonly id="txtstype" name="txtstype" value="<?php echo $stype; ?>">
					<input type="text"   style="display:none;" readonly id="txt_evalu_type_no" name="txt_evalu_type_no" value="<?php echo $eval_type_no; ?>">
						<input type="text" readonly style="display:none;" id="txtHeaderIDFK" name="txtHeaderIDFK" value="<?php echo $id; ?>">
						<input type="text"  style="display:none;" readonly  id="txtIval" name="txtIval" value="<?php echo $i; ?>">
						<input type="text"  style="display:none;" readonly id="txtQueIDmarksID" name="txtQueIDmarksID" value="">
						<button type="submit" class="btn btn-primary" name="submit" disabled>Submit</button>
					</header>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>			

<?php } ?>

</form>	
			
			<br/>
			<br/>
</div>
</div>			
<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
</div>
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
