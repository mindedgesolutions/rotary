<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
$rowsPerPage = 50000;
$sbm=$_POST['submit'];
$count1 = -1;
if (strcmp($sbm,"Search")==0)
{
	$cnt=1;
	$first_name=$_POST['txtMemberFirstName'];
	$last_name=$_POST['txtMemberLastName'];
	$donar_email=$_POST['txtMemberEmail'];
	$donar_contact=$_POST['txtMemberMobile'];
	$district=$_POST['district'];
	$club=$_POST['club'];

	$clubName = mysql_fetch_array(mysql_query("select donar_club from tbl_donar_master where donar_club like '%".$club."%'"));

	$_SESSION['clubName'] = $clubName['donar_club'];

	$sql="select * from tbl_donar_master where first_name !='' and  1=1";
	if (strlen($first_name)>0)
	{
		 $sql=$sql . "  and first_name like '%$first_name%' or last_name like '%$first_name%'";
	}
	if (strlen($donar_contact)>0)
	{
		 $sql=$sql . " and donar_contact like '%$donar_contact%'";
	}
	if (strlen($donar_email)>0)
	{
		 $sql=$sql . " and donar_email like '%$donar_email%'";
	}
	if($district!='-1' && $club!='-1')
	{
		$sql=$sql . " and donar_district='$district' and donar_club='$club'";
	}
	if($district!="-1")
	{
		$sql=$sql . " and donar_district like '%$district%'";
	}
	$sql=$sql . " order by first_name";

	$result = dbQuery(getPagingQuery($sql, $rowsPerPage));
	$pagingLink = getPagingLink($sql, $rowsPerPage);

	$count1=mysql_num_rows($result);
}


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
	height:50px;
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
<script type="text/javascript">
function showClub(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getClub.php?q="+str,true);
        xmlhttp.send();
    }
}
function showSearchOption(){

	$('#advanced_search').toggle('500');
}
</script>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<header> 
	  <!-- Logo Start -->
		
		<div class="logo"> <a href="#"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a></div>

		<div class="text-holder" style="width: 40%;margin: 20px 0 0 20%;float: left;">
		<h3 style="color:#ffffff; text-align:center;">Welcome Asha Kiran Donors!</h3>
		<h6 style="color:#ffffff; text-align:center;">
			<i>Step 1: Search for Your Record </br>
			Step 2: Login to see the performance of the child you sponsored.</i>
		</h6>
		</div>
				
	  <!-- Logo End <div class="logo"> <a href="#"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div> --> 
	  <!-- Sidebar Navigation Start -->
	  <?php //include('include/mainnav.php'); ?>
	  
	  <div class="clearfix"></div>
	  <!-- Sidebar Navigation End --> 
	</header>


<div class="structure-row alone"> 
    <!-- Right Section Start -->
    <div class="right-sec"> 
<br/>
<section class="content" style="padding-left:20px; padding-right:20px;">
 <!-- Small boxes (Stat box) -->
 <form role="form" action="donor_register.php" method="post" enctype="multipart/form-data">
 <div class="box-body">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Donor Data Search</legend>

	<div class="form-group">
        <div class="row">
			<div class="col-sm-4">
				<label>Donor Name</label>
				<input type="text" class="form-control" name="txtMemberFirstName" id="txtMemberFirstName" value="<?php if ($_REQUEST['txtMemberFirstName']!=''){echo $_REQUEST['txtMemberFirstName'];}else{echo '';} ?>" />
			</div>
			<div class="col-sm-4">
				<label>Contact No</label>
				<input type="text" class="form-control" name="txtMemberMobile" id="txtMemberMobile" value="<?php if ($_REQUEST['txtMemberMobile']!=''){echo $_REQUEST['txtMemberMobile'];}else{echo '';} ?>" />
			</div>
			<div class="col-sm-4">
				<label>Email</label>
				<input type="text" class="form-control" name="txtMemberEmail" id="txtMemberEmail" value="<?php if ($_REQUEST['txtMemberEmail']!=''){echo $_REQUEST['txtMemberEmail'];}else{echo '';} ?>" />
			</div>
        </div>

        <div class="row"><div class="col-sm-12"></div></div>

        <div class="row">
			<div class="col-sm-12">
				<span style="cursor: pointer;color: #3276b1;font-size: 14px;font-weight: 600;font-style: italic;" onclick="showSearchOption()">Advanced Search<img src="plus.png" style="height: 12px;margin: 0 0 3px 5px;" /></span>
			</div>
        </div>

		<div class="row" id="advanced_search" <?php if ($_REQUEST['district']!=''){ ?>style="display: block;"<?php }else{ ?>style="display:none;"<?php } ?>>
			<div class="col-sm-4">
				<label>District</label>
					<select name="district" class="form-control" onchange="showClub(this.value)" id="district" >
						<option value="">Select District</option>
						<?php 
						$sql1=mysql_query("select distinct(district_code) from all_district;");
						while($row = mysql_fetch_array($sql1))
						{
						$data=$row['district_code'];
						?>
						<option value="<?php echo $data; ?>" <?php if ($_REQUEST['district']==$data){echo 'selected';} ?>><?php echo $data; ?></option>
						<?php
						 } 
						?>
					</select>
                         
				</div>
				<div class="col-sm-4">
					<label>Club</label>
					<select name="club" class="form-control" id="txtHint" >
						<option value="">Select Club</option>
					</select>
				</div>

				<?php if($_REQUEST['club']!=''){ ?>

				<div class="col-sm-4" style="margin: 40px 0 0 0;">
					<label>(Club : </label>
					<?= $_REQUEST['club'].')' ?>
				</div>

				<?php } ?>

			</div>
			<div class="row" style="margin-top : 10px;">
				<div class="col-sm-12">
					<div class="box-footer" style="text-align : center;">
						<input type="submit" name="submit" class="btn btn-primary" value="Search" style="width: 80px;" />

						<a href="donor_register.php"><input type="button" name="resetBtn" class="btn btn-primary" value="Reset" style="width: 80px;margin: 0 0 0 15px;" /></a>
					</div>
				</div>
			</div>
        </div>
          
			<div class="box-footer clearfix">
							<font style="font-size: 15px;">
							Donated for Asha Kiran but your name is not in tagged list?<a href='http://rotaryteach.org/donor/not_in_tagged_list.php'><font style="color:#357ebd;"><b><u><i>CLICK HERE.</i></u></b></font></a><br/><br/>			 
			 </font>
			</div>
			
			<?php if($count1>0){ ?>
			
                <div class="form-group">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" class="tbl">
                                 <thead>
									<td width="25%"><p style="font-size: 15px;"><b>Donor Name</b></p></td>
									<td width="30%"><p style="font-size: 15px;"><b>Email</b></p></td>
									<td width="15%"><p style="font-size: 15px;"><b>Mobile</b></p></td>
									<td width="10%"><p style="font-size: 15px;"><b>District</b></p></td>
									<td width="10%"><p style="font-size: 15px;"><b>Club</b></p></td>       
									<td width="10%"><p style="font-size: 15px;"><b>Status</b></p></td>
		
                                  </thead>                                                                               
		  <?php
		  while($row = mysql_fetch_array($result)){
		  extract($row);
		  if (strlen($donar_contact)<1) {
			  $donar_contact="-";
			  
		  }
		   if (strlen($donar_email)<1) {
			  $donar_email="-";
			  
		  }
		  if (strlen($donar_club)<1) {
			  $donar_club="-";
			  
		  }
		  
		  ?>
	    <tr class="tdl">
        <td><p style="color:#0d9429;"><?php echo $first_name .' '. $last_name;  ?></p></td>
        <td><p style="color:#0d9429; overflow-wrap: break-word;"><?php echo $donar_email; ?></p></td>
        <td><p style="color:#0d9429; min-width : 2%;"><?php echo $donar_contact; ?></p></td>
		<td><p style="color:#0d9429;"><?php echo $donar_district; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $donar_club; ?></p></td>        
    <!--    <td><p style="color:#0d9429;"><a href='register.php?id=<?php echo $donar_id; ?>&fn=<?php echo $first_name; ?>&ln=<?php echo $last_name; ?>&eml=<?php echo $donar_email; ?>'><b>Register</b></a></p></td>
          <td><p style="color:#0d9429;"><a href='http://rotaryteach.org/child_development/other/login.php?id=<?php echo $donar_id; ?>'><b>Login</b></a></p></td>
        -->
		<td><p style="color:#0d9429;">
		<?php
			$search_email="select * from tbl_admin where email='$donar_email' and type='donor' and status='Active'";
			$result1 = mysql_query($search_email);
			
				$count = mysql_num_rows($result1);
				//echo $search_email;
				//echo $count;
			
				if($count==1)
				{ ?>
				<p><a href='http://rotaryteach.org/child_development/other/login.php?id=<?php echo $donar_id; ?>'><font style="color:#357ebd;"><b><u>Login</u></b></font></a></p>	
				<?php }
				else if($count==0)
				{?>
				<p><a href='register.php?id=<?php echo $donar_id; ?>&fn=<?php echo $first_name; ?>&ln=<?php echo $last_name; ?>&eml=<?php echo $donar_email; ?>&dis=<?php echo $donar_district; ?>&clb=<?php echo $donar_club; ?>'><font style="color:#357ebd;"><b><u>Sign Up</u></b></font></a></p>	
				<?php 
				}
			
			
		?></td>        
		</tr>
             <?php
			}
			 ?>	
			          </div>
                          </table>
		
						 
                          	<div class="box-footer clearfix">
							<font style="font-size: 15px;">
							<br/>Donated for Asha Kiran but your name is not in tagged list?<a href='http://rotaryteach.org/donor/not_in_tagged_list.php'><font style="color:#357ebd;"><b><u><i>CLICK HERE.</i></u></b></font></a><br/><br/>
     <ul class="pagination pagination-sm no-margin pull-right">
     <?php //echo $pagingLink; ?>
     </ul>
	 </font>
    </div>
	<?php 
	}
	elseif ($count1 <> -1)
	{
		
		echo '<center><font style="color:#FF0000"><b>-- No Record Found --</b></font></center></br></br>';
	}		 
	?>
             
                </div>
          </div>

     </form>
     </section>
	 
   
	  

    </div>
    <!-- Wrapper End --> 
	<br/>
	<br/>
	<div class="footer clearfix">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
	



  <!-- Logo Start -->
  
  <!-- Sidebar Navigation End --> 
	
	
 

</body>
</html>