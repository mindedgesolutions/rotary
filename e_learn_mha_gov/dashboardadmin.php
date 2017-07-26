<?php
session_start();
ob_start();
include('include/config.php');
$userid=$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];
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
	.tdl td:nth-of-type(1):before { content: "Donor Name"; }
	.tdl td:nth-of-type(2):before { content: "Email"; }
	.tdl td:nth-of-type(3):before { content: "Mobile"; }
	.tdl td:nth-of-type(4):before { content: "District"; }
	.tdl td:nth-of-type(5):before { content: "Club"; }
	.tdl td:nth-of-type(6):before { content: "Status"; }
	
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
				<?php include('include/child_header.php'); $stype=$_GET['stype']; ?>
				</div>
				<div class="col-xs-4">
				<h3 style="color:#ffffff; text-align:center;">Comprehensive School Survey Form</h3>
				</div>
				<div class="col-xs-4" >
				<!-- <a href="http://rotaryteach.org/Comprehensive_School_Survey/dashboard.php"><h5 style="color:#ffffff; text-align:right;">Home</h5></a>-->
				</div>
			</div>
		</div>
		
        <!-- User Section Start -->
        
        <!-- Header Top Navigation End -->
        <div class="clearfix"></div>
      </header>
    

<!-- GRID -->

<?php 
$sql = "select survey_id,userid,name,village,email,school_name,ph_no
		from tbl_school_survey_maharashtra_gov where final_submission='yes'";
//order by a.district;		
$r_query = mysql_query($sql); 
$count1=mysql_num_rows($r_query);
if($count1>0){ 
?>
<script type="text/javascript">document.getElementById('divID').style.display = 'none';</script>

<div style="margin-left:25px;"><a href="export_excel.php"><input type="button" class="btn btn-primary" name="to_excel" id="to_excel" value="EXPORT TO EXCEL"></a></div>
<br/>			
			<div class="form-group" style="padding-left:25px; padding-right:25px;">
                          <table border="0" cellspacing="0" cellpadding="0"  width="100%" class="tbl">
                                 <thead>
									<td width="5%"><p style="font-size: 15px;"><b>Sl.No.</b></p></td>
									<td width="20%"><p style="font-size: 15px;"><b>Name</b></p></td>       
									<td width="10%"><p style="font-size: 15px;"><b>Contact No</b></p></td>
									<td width="30%"><p style="font-size: 15px;"><b>Village</b></p></td>
									<td width="25%"><p style="font-size: 15px;"><b>School Name</b></p></td>
									<td width="5%"><p style="font-size: 15px;"><b>View</b></p></td>
									<td width="5%"><p style="font-size: 15px;"><b>Add</b></p></td>
                                  </thead>                                                                               
		  <?php
		  while($row = mysql_fetch_array($r_query)){
		  extract($row);
		  
		  ?>
	    <tr class="tdl">
		<td><p style="color:#0d9429;"><?php echo $i;  ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $name;  ?></p></td>       
		<td><p style="color:#0d9429;"><?php echo $ph_no; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $village; ?></p></td>   
		<td><p style="color:#0d9429;"><?php echo $school_name; ?></p></td> 
		<td><p><a href='http://rotaryteach.org/e_learn_mha_gov/view_e_learn_mh_gov_1_2.php?id=<?php echo $survey_id; ?>'><font style="color:#357ebd;"><b><u>View</u></b></font></a></p></td>   		
		<td><p><a href='http://rotaryteach.org/e_learn_mha_gov/addUnit2_e_learn_mh_gov_1_2.php?id=<?php echo $survey_id; ?>'><font style="color:#357ebd;"><b><u>Add</u></b></font></a></p></td>   		
        
		</tr>
             <?php
			 $i=$i+1;
			}
			 ?>	
                          
						
						  </table>
						    </div>
						
					
				
						  
<?php } ?>

<!-- GRID -->





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
