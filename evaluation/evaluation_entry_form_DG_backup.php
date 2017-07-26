<?php
session_start();
ob_start();
include('include/config.php');
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
            <font color="#F4F3F3" style="float:right;">Home --> Evaluation --> DG</font>
		</div>
      
      <div class="clearfix"></div>
    </header>
    <br>
  <?php/*  
	echo 'User Name : '. $_SESSION['first_name'] . '<br/>';
	echo 'NGO Name : '. $_SESSION['ngo_name'] . '<br/>';
	echo 'Type : '. $_SESSION['type'] . '<br/>';
	echo 'ID : '. $_SESSION['uid'] . '<br/>';
	echo 'Center Name : '. $_SESSION['center_name'];
	*/
	?>
<form class="form-horizontal" name="frm" id="frm" action="ins_evaluation_entry_form_DG.php" method="post" enctype="multipart/form-data" >

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
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- if district exist in database then it will open for edit mode -->
<?php
	$sqlDist = "select district from tbl_eva_exam_header where district='" .$_SESSION["district"]. "'";
		$resultDist = $conn->query($sqlDist);						
		if ($resultDist->num_rows > 0) {
		while($rowDIst = $resultDist->fetch_assoc()) {
			extract($rowDIst);
		}
			if($district)
			{
				echo 'get District : '. $district .'<br/>';
			}
			else
			{
				echo 'Login District : '. $_SESSION["district"] .'<br/>';
			}
		}
?>
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
						$sql = "select * from tbl_evaluation_master where eval_type_name='DG'";
							$result = $conn->query($sql);						
							if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								extract($row);
							}
							}
						?>
						<h1 class="heading"><?php echo $eval_type_desc; ?><h1>
						
						<!-- <h1 class="heading">You are representing your district, the success of your district depends upon you.</h1> -->
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
			$result = $conn->query($sql);						
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				extract($row);
			?>
			<div class="col-xs-12">
				<div class="sec-box">
					<!-- <a class="closethis">Close</a> -->
					<header>
						<h3 class="heading"><?php echo $quest_desc; ?></h3>
						<input type="text" style="display:none;" readonly id="txtQuesID<?php echo $i; ?>" name="txtQuesID<?php echo $i; ?>" value="<?php echo $id; ?>">
						<input type="text" style="display:none;" readonly id="txtAnsID<?php echo $i; ?>" name="txtAnsID<?php echo $i; ?>" value="">
					</header>
					
					<div class="contents">
						<!--  <a class="togglethis">Toggle</a> -->
						<section class="boxpadding">
						<?php  
						$sqlAns = "select id,quest_master_id_fk,ans_no,ans_desc,ans_marks from tbl_question_ans_master where quest_master_id_fk='$id'";
						$resultAns = $conn->query($sqlAns);						
						if ($resultAns->num_rows > 0) {
						while($rowAns = $resultAns->fetch_assoc()) {
							extract($rowAns);
					    ?>
						<div class="col-md-6">
							<blockquote>
								<label class="radio-inline"><input type = "radio" name = "ans<?php echo $i; ?>" id = "ans<?php echo $i; ?>" onclick="getvalue(this,<?php echo $i; ?>)" value="<?php echo $id; ?>" /><?php echo $ans_desc; ?></label>
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
<div class="content-section">
	<div class="container-liquid">
		<div class="row">
			<div class="col-xs-12">
				<div class="sec-box">
					<!-- <a class="closethis">Close</a> -->
					<center>
					<header>
						<input type="text" readonly style="display:none;" id="txtIval" name="txtIval" value="<?php echo $i; ?>">
						<input type="text" readonly style="display:none;" id="txtQueIDmarksID" name="txtQueIDmarksID" value="">
						<button type="submit" class="btn btn-primary" onClick="GetTextValue();">Submit</button>
					</header>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>			

</form>

		
</div>
</div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	  <?php
	  include('include/footer.php');
	  ?>
  <!-- Sidebar Navigation End --> 
	
	
  </div>

</body>
</html>
