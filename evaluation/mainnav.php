<?php
//session_start();
//ob_start();

$_SESSION['uid'];
$_SESSION['prof_type'];
$_SESSION['district'];
$_SESSION['club'];
$_SESSION['name'];
$_SESSION['mobile'];

$prof_type=$_SESSION['prof_type'];
?>
<nav class="topnavigation">
  <ul id="nav3">
    
	
	<?php
	if($prof_type=='admin'){
	?>
	<li><a href="dashboard.php">Home</a></li>
       
    	<li>
			<a href="#">Evaluation</a>
				<ul>
					<li><a href="evaluation_entry_form_ZLC.php?stype=DG">DG</a></li>
					<li><a href="evaluation_entry_form_ZLC.php?stype=ZLC">ZLC</a></li>
				</ul>
			
        </li>
    	<li>
			<a href="#">Report</a>
				<ul>
					<li><a href="District_wise_DG_rpt.php?stype=DG">District wise DG</a></li>
					<li><a href="District_wise_DG_rpt.php?stype=ZLC">District wise ZLC</a></li>
					
				</ul>
		</li>
    	<li><a href="logout.php">LOGOUT</a></li>
	<?php
	}
	?>
	<?php
	if($prof_type=='rotary'){
	?>
	<li><a href="dashboard.php">Home</a></li>
      
    	<li>
			<a href="#">Evaluation</a>
        	<ul>
				<li><a href="evaluation_entry_form_ZLC.php?stype=DG">DG</a></li>
				<li><a href="evaluation_entry_form_ZLC.php?stype=ZLC">ZLC</a></li>
			</ul>
        </li>
    	<li>
			<a href="#">Report</a>
				<ul>
					<li><a href="reportZLC.php?stype=DG">DG Report</a></li>
					<li><a href="reportZLC.php?stype=ZLC">ZLC Report</a></li>
				</ul>
		</li>
    	<li><a href="logout.php">LOGOUT</a></li>
	<?php
	}
	?>
	
  </ul>
  <div class="clearfix"></div>
</nav>
