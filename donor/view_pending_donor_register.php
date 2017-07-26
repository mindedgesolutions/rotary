<?php
session_start();
ob_start();
include('include/config.php');
$msg = "";
$rowsPerPage = 25;
$first_name=$_POST['txtMemberFirstName'];
$last_name=$_POST['txtMemberLastName'];
$donar_email=$_POST['txtMemberEmail'];
$donar_contact=$_POST['txtMemberMobile'];
$district=$_POST['district'];
$club=$_POST['club'];
$donation_dt=$_POST['txtDonationDT'];

$sql="select * from tbl_donar_master_not_tagged where 1=1";
if (strlen($first_name)>0)
{
     $sql=$sql . "  and first_name like '%$first_name%'";
}
if (strlen($last_name)>0)
{
     $sql=$sql . " and last_name like '%$last_name%'";
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
if (strlen($donation_dt)>0)
{
     $sql=$sql . " and donation_dt = '$donation_dt'";
}
 $sql=$sql . " order by first_name";

$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);


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
<link href="http://rotaryteach.org/donor/css/CalendarControl.css"
      rel="stylesheet" type="text/css">
<script src="http://rotaryteach.org/donor/js/CalendarControl.js"
        language="javascript"></script>
<style>
.footer {
		 position: absolute;
		 bottom: 0;
		 width:100%;
		 height:60px;
		 background-color:#32343b;
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


<div class="structure-row alone"> 
    <!-- Right Section Start -->
    <div class="right-sec"> 
      <!-- Right Section Header Start -->
      <header> 
	  <div class="row">
			<div class="col-xs-12">
				
				<h3 style="color:#ffffff; text-align:center;">ASHA KIRAN TEACH PROGRAMME</h3>
				<h6 style="color:#ffffff; text-align:center;"><i>Pending Donor List</i></h6>
				
			</div>
		</div>
		
        <!-- User Section Start -->
        
        <!-- Header Top Navigation End -->
        <div class="clearfix"></div>
      </header>
      <!-- Right Section Header End --> 
      <!-- Content Section Start -->  
<br/>
<section class="content" style="padding-left:20px; padding-right:20px;">
 <!-- Small boxes (Stat box) -->
 <form role="form" action="view_pending_donor_register.php" method="post" enctype="multipart/form-data">
 <div class="box-body">
     <?php echo $msg; ?>
     <fieldset>
	  <legend>Donor Search</legend>

      <div class="form-group">
        <div class="row">
             <div class="col-sm-3">
                         <label>First Name</label>
                          <input type="text" class="form-control" name="txtMemberFirstName" id="txtMemberFirstName" />
              </div>
              <div class="col-sm-3">
                         <label>Last Name</label>
                         <input type="text" class="form-control" name="txtMemberLastName" id="txtMemberLastName" />
              </div>
			  <div class="col-sm-3">
                         <label>Contact No</label>
                          <input type="text" class="form-control" name="txtMemberMobile" id="txtMemberMobile" />
              </div>
			  <div class="col-sm-3">
                         <label>Donation Date</label>
                          <input type="text" id="txtDonationDT" name="txtDonationDT" class="form-control" onfocus="showCalendarControl(this);">
              </div>
        </div>
         
		<div class="row">
				<div class="col-sm-4">
                         <label>Email</label>
                         <input type="text" class="form-control" name="txtMemberEmail" id="txtMemberEmail" />
              </div>
				<div class="col-sm-4">
                         <label>District</label>
							<select name="district" class="form-control" onchange="showClub(this.value)" id="district" >
							   <option value="-1">Select District</option>
							   <?php 
								$sql1=mysql_query("select distinct(district_code) from all_district;");
								while($row = mysql_fetch_array($sql1))
								{
								$data=$row['district_code'];
								?>
								<option value="<?php echo $data; ?>"><?php echo $data; ?></option>
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
        </div>
                 <div class="row" style="margin-top : 10px;">
                             <div class="col-sm-12">
                 <div class="box-footer" style="text-align : center;">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
      </div>
      </div>
            </div>
        </div>
	<?php 
			if($_POST['district']=='-1')
				$dist = '';
			else
				$dist = $_POST['district'];
			
			if($_POST['club']=='-1')
				$club = '';
			else
				$club = $_POST['club'];
		?>
          <legend>Donor List (First Name:<u><i><?php echo $_POST['txtMemberFirstName']; ?></i></u>,&nbsp;Last Name:<u><i><?php echo $_POST['txtMemberLastName']; ?></i></u>,
		  &nbsp;Contact No:<u><i><?php echo $_POST['txtMemberMobile']; ?></i></u>,&nbsp;Donation Date:<u><i><?php echo $_POST['txtDonationDT']; ?></i></u>,
		  Email:<u><i><?php echo $_POST['txtMemberEmail']; ?></i></u>,&nbsp;District:<u><i><?php echo $dist; ?></i></u>,&nbsp;Club:<u><i><?php echo $club; ?></i></u>)
		  
		  </legend>

                <div class="form-group">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tr>
        <td width="15%"><p>First Name</p></td>
        <td width="15%"><p>Last Name</p></td>
        <td width="15%"><p>Email</p></td>
        <td width="15%"><p>Mobile</p></td>
        <td width="10%"><p>District</p></td>
        <td width="14%"><p>Club</p></td>
		<td width="8%"><p>Donation Date</p></td>
        <td width="8%"><p>Register</p></td>
		<!-- <td width="8%"><p>Delete</p></td> -->
                                         </tr>
                                         
                                         
                                          <?php
	  while($row = mysql_fetch_array($result)){
	  extract($row);
	  ?>
	    <tr>
        <td><p style="color:#0d9429;"><?php echo $first_name; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $last_name; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $donar_email; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $donar_contact; ?></p></td>
		<td><p style="color:#0d9429;"><?php echo $donar_district; ?></p></td>
        <td><p style="color:#0d9429;"><?php echo $donar_club; ?></p></td>  
		<td><p style="color:#0d9429;"><?php echo $donation_dt; ?></p></td>  
        <td><p style="color:#0d9429;"><a href='donar_entery_form.php?id=<?php echo $donar_id; ?>'><font style="color:#357ebd;"><b><u>Register</u></b></font></a></p></td>
        <!-- <td><p style="color:#0d9429;"><a href=''><b>Delete</b></a></p></td> -->
        </tr>
             <?php
	}
	?>
                          
                          </table>
						  
                          	<div class="box-footer clearfix">
							
     <ul class="pagination pagination-sm no-margin pull-right">
     <?php //echo $pagingLink; ?>
     </ul>
    </div>
                
                
                </div>
          </div>

     </form>
     </section>


	


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

