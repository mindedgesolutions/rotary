<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$ngoname = $_SESSION['ngo_name'];
$createby = $_SESSION['username'];
$_SESSION['type'];
$i=1;


?>
<!DOCTYPE HTML>
<html>
<head>
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

<script>
function jumpToPage(){
    var lastPage = $('#lastPage').val();
    var jumpTo = $('#jumpTo').val();
    var pathname = window.location.pathname;
    
    if (Number(jumpTo) > Number(lastPage)){
        window.location.href = pathname + '?pn=' + lastPage;
    }else{
        window.location.href = pathname + '?pn=' + jumpTo;
    }
}
</script>

<style>
.headercol
	{
		background-color : #b8d1f3;
	}
	.altcol
	{
		background-color : #dae5f4;
	}		
	.pad
	{
		padding-left:5px;
	}
</style>	

</head>

<body>

<?php include 'pagination_souvik.php'; ?>

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
      <!-- User Section Start -->
	  <div class="row">
		<div class="col-md-4">
			<?php include('include/child_header.php'); ?>
		</div>
		<div class="col-md-4">
			<h1 style="color:#ffffff; text-align:center;">Approved Child Profile</h1>
		</div>
		<div class="col-md-4">
			<font color="#F4F3F3" style="float:right;">Home -> Master -> Approved Child Profile</font>
		</div>
	  </div>
      
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
	<section class="content">
      <div class="row">
		<div class="col-md-12">
        
		 <?php
			//live database
			/*$db_database='rotary32_teach2';
			$db_hostname='103.227.62.215';
			$db_username='rotary32_teach2';
			$db_password='Rotary@2016'; 
			
			$con = mysql_connect($db_hostname,$db_username,$db_password);
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }

			mysql_select_db($db_database, $con);*/
			?>
			
		 <div class="col-md-12">
				<div class="box box-primary">						
					<div class="box-body">
							<center>
								<?php
										$ngoName=$_POST['NGOname'];
										$centerid=$_POST['ddCenter'];
										$ngo_name=$_POST['txtNGOName'];
										$centername=$_POST['txtCenterName'];
										$ngoid=$_SESSION['uid'];
										$child = '';
										$rowsPerPage = 10;

										//$sql = "SELECT * FROM  tbl_child_profile_card where create_by = '$createby' ORDER BY child_name ASC";
										

										if ($ngoid!='') {
										?>	
										<!--<table width='50%' border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
										<thead>
										<tr>
										  <th style='background-color:#1980cf; text-align:center; color:#ffffff;'><b>NGO Name</b></th>
										  <th style='background-color:#1980cf; text-align:center; color:#ffffff;'><b>Center Name</b></th>
										</tr>
										</thead>
										<tr>
										  <td style='text-align:center;'><?php echo $ngo_name; ?></td>
										  <td style='text-align:center;'><?php echo $centername; ?></td>
										</tr>
										</table> -->
									<?php
										/*-------------Count Row No----------------*/
										$rowNo = mysql_num_rows(mysql_query("select count(child_id) as childCount from tbl_child_profile_card where create_by='$createby'"));
										/*-------------Count Row No----------------*/

										//$sql="select child_id,child_photo,child_name,child_dob,child_father_name,city from tbl_child_profile_card where ngoid='". $ngoid ."'";	
										$sql="select child_id,child_photo,child_name,child_dob,child_father_name,child_gender,child_mother_name,street,city,state,name_partner_ngo from tbl_child_profile_card where create_by='$createby' order by child_name $limit";	
										//select username from tbl_admin where id='". $ngoid ."'"
										//echo $sql;
										//$r_query     = dbQuery(getPagingQuery($sql, $rowsPerPage));
										//$pagingLink = getPagingLink($sql, $rowsPerPage);
										
										
										$r_query = mysql_query($sql); 
										$count = mysql_num_rows($r_query);
									//echo $count;
									if($r_query)
									{
									if($count>0)
									{
										?>
										
										<table width="100%">
											<tr>
												<td><a href="export-approved-child.php?ngoid=<?= $ngoid ?>"><input type="button" name="exportBtn" id="exportBtn" value="Export Data To Excel" class="btn btn-primary" /></a></td>
											</tr>
										</table>

										<br/>
										<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
																	  <thead>
																		
																		  <tr>
																			  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Image</th>
																			  <th width='15%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
																			  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Gender</th>
																			  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Age/DOB</th>
																			  <th width='20%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Father Name</th>
																			  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Street</th>
																			  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>City</th>
																			  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>State</th>
																			   <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>NGO Name</th>

																			   <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>View</th>

																			  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Edit</th> 
																			  <!--<th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Edit</th>
																			  <td class='pad' style='text-align:center;'><a href=editChildProfile.php?id=" .$row["child_id"]. " >Edit</a></td>
																			  -->
																		  </tr>
																	  </thead>
										
	  
										<?php 
										while ($row = mysql_fetch_array($r_query)){  
										extract($row);
										//while($row = $result->fetch_assoc()){
										//<td class='pad' style='text-align:center;'><a href=viewChildProfile.php?id=" .$row["child_id"]. " target='_blank' >View</a></td>
										//<td class='pad' style='text-align:center;'><a href=viewChildProfile.php?id=" .$row["child_id"]. " target='_blank' >View</a></td>
										if ($i%2==0) 
											{
										echo "
												<tr class='headercol'>
													<td class='pad'><center><img height='100px' width='100px' src='../child_development/upload/".$row["child_photo"]."'></center></td>
													<td class='pad'>".$row["child_name"]."</td>
													<td class='pad'>".$row["child_gender"]."</td>
													<td class='pad'>".$row["child_dob"]."</td>
													<td class='pad'>".$row["child_father_name"]."</td>
													<td class='pad'>".$row["street"]."</td>
													<td class='pad'>".$row["city"]."</td>
													<td class='pad'>".$row["state"]."</td>
													<td class='pad'>".$row["name_partner_ngo"]."</td>
													<td class='pad' style='text-align:center; color:#2288f1;'><a href=http://rotaryteach.org/childdevelopment/viewChildProfile.php?id=" .$row["child_id"]. " style='color:#2288f1;' >View</a></td>
													<td class='pad' style='text-align:center; color:#2288f1;'><a href=http://rotaryteach.org/childdevelopment/edit_child_profile_for_img.php?pid=" .$row["child_id"]. " style='color:#2288f1;' >Edit</a></td>
													
												</tr>
											  ";
											}
											else
											{
												echo "
												<tr class='altcol'>
													<td class='pad'><center><img height='100px' width='100px' src='../child_development/upload/".$row["child_photo"]."'></center></td>
													<td class='pad'>".$row["child_name"]."</td>
													<td class='pad'>".$row["child_gender"]."</td>
													<td class='pad'>".$row["child_dob"]."</td>
													<td class='pad'>".$row["child_father_name"]."</td>
													<td class='pad'>".$row["street"]."</td>
													<td class='pad'>".$row["city"]."</td>
													<td class='pad'>".$row["state"]."</td>
													<td class='pad'>".$row["name_partner_ngo"]."</td>
													<td class='pad' style='text-align:center; color:#2288f1;'><a href=http://rotaryteach.org/childdevelopment/viewChildProfile.php?id=" .$row["child_id"]. " style='color:#2288f1;' >View</a></td>
													<td class='pad' style='text-align:center;'><a href=http://rotaryteach.org/childdevelopment/edit_child_profile_for_img.php?pid=" .$row["child_id"]. " style='color:#2288f1;' >Edit</a></td>
												</tr>
											  ";
											}
										$i=$i+1;
										}  									
										?>

										<tr><td colspan="10" style="height: 30px;"></td></tr>

										<!-----------Pagination---------->

										<tr>
											<td colspan="10">
												<div class="pagination" >
							                        <div style="float: left; color:#2288f1; margin-right: 50px;"><?php echo $paginationDisplay; ?></div>
													
							                        <div style="line-height: 32px; float: right;">
														 <input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" name="jumpBtn" id="jumpBtn" value="Go To Page" onclick="jumpToPage()" class="jump" />
							                            <input type="text" name="jumpTo" id="jumpTo" placeholder="Enter Page No" onkeypress="return isNumberKey(event)" style="border: 1px solid; height: 30px; border-radius: 3px; width: 100px; text-align: center; margin-right: 10px;" />
							                           
							                        </div>

							                    </div>
											</td>
										</tr>

										<!-----------Pagination---------->

										</table>
										<div class="box-footer clearfix">
										 <ul class="pagination pagination-sm no-margin pull-right">
										 <?php echo $pagingLink; ?>
										 </ul>
										</div>	
										<?php
										}
											else
											{
												echo "No Record Found";
											}
										}
									}
										?>
							</center>
						</div>
					</div>				
				</div>

		   </div>
		</div>
     </section>   
       </div>   <!-- /.row -->
   
      </div>
    </div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  
	  
  <!-- Sidebar Navigation End --> 
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!--<script type="text/javascript">
function showCenter1(val,setcenterval)
{<?php
	  include('include/footer.php');
	  ?>
	alert(val)
	var str = "<option value=''>Select</option>";
	var pars ='dist='+val;
	var selected='';
$.ajax({                                      
      url: 'centerlist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
		//alert(JSON.stringify(data))
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
					if(setcenterval==data[i]["id"]) {
						selected = 'selected=selected';
					}
				str = str+"<option value='"+data[i]["id"]+"'" +selected+">"+data[i]["id"]+"</option>";
				}
			}
			//$(".forother").show();
			$("#ddCenter").empty();
			$("#ddCenter").append(str);				 
		//alert(str)
		}
	});
}
</script>-->
<!--<script type="text/javascript">
function showCenter(val){
  window.location="centerlist.php?drp="+val;
}
</script>-->
</body>
</html>
