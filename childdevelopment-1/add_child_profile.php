<?php
session_start();
ob_start();
include '../include/config.php';
include '../include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$ngoname = $_SESSION['ngo_name'];
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

<!--<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />-->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
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
<script type="text/javascript">
function showCenter(str)
{
	var textHolderCenter = ddCenter.options[ddCenter.selectedIndex].text
	document.getElementById("txtCenterName").value = textHolderCenter;
}
function showUser(str) {
	var textHolderNGO = NGOname.options[NGOname.selectedIndex].text
	document.getElementById("txtNGOName").value = textHolderNGO;
	
    if (str == "") {
        document.getElementById("ddCenter").innerHTML = "";
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
                document.getElementById("ddCenter").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_center_list.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>	
<script>
  $(document).ready(function() {
    $("#NGOname").change(function(){
      $("#txtNGOName").val(("#NGOname").find(":selected").text());
    });
  });
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
      <!-- User Section Start -->
      <?php include('include/child_header.php'); ?>
	  <div>
			<h1 style="color:#ffffff; text-align:center;">Child Profile</h1>
            <font color="#F4F3F3" style="float:right;">Home -> Master -> Child Profile</font>
		</div>
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<!--<div align="Centre" style="margin-left:400px;">
			<h1 style="color:#ffffff;"></h1>
		</div>-->
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
	<section class="content">
      <div class="row">
		<div class="col-md-12">
         
         <!-- form start 
         <div class="box-header">
           <h3 class="box-title"><center>Child Profile</center></h3>
         </div><!-- /.box-header --> 
		 
			<div class="col-sm-12" align="left" style="height : 35px; color: #ffffff; margin-top:10px; margin-left:10px; padding : 5px;">
				<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="button" value="Add New" onClick="Javascript:window.location.href = 'http://rotaryteach.org/childdevelopment/add_new_child.php';" />
			</div>
         <form action=""  method="post" id="" role="form">
           <div class="col-md-4">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<center>
							<input type="text" id="txtNGOName" readonly name="txtNGOName" style="display:none;">
							<input type="text" id="txtCenterName" readonly name="txtCenterName" style="display:none;">
								<label>NGO</label><br/>
                                <!-- <select class='form-control' width='100%' id='NGOname' name='NGOname' onchange='showUser(this.value)'> -->
								<input type="text" class="form-control" id="txtngo" name="txtngo" value="<?php echo $ngoname; ?>" readonly>
                                <!-- <option value="">Select NGO</option> -->
								<?php
								/*	$sql = "SELECT id,center_name FROM tbl_admin WHERE type='NGO'";
									$result = mysql_query($sql);
									while ($row = mysql_fetch_array($result)) {
										extract($row);
									?>
                                      <option value="<?php echo $id; ?>"><?php echo $center_name; ?></option>;
                                    <?php		
									}
									*/
								 ?>
                                </select>
							</center>
						</div>
					</div>				
				</div>
		   </div>
           <div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group">
							<center>
								<label for="exampleInputPassword1">Center</label>
								<select class="form-control" id="ddCenter" name="ddCenter" onchange='showCenter(this.value)'>
                                <option value="">Select Center</option>
                                
								</select>
							</center>
						</div>						
					</div>				
				</div>
		   </div>
		   <div class="col-md-4">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">						
							<center>
								<label for="exampleInputPassword1"></label><br/>
								<button type="submit" class="btn btn-primary">Submit</button>
							</center>			
						</div>
					</div>				
				</div>
		   </div>
           
         </form>
		 <div class="col-md-12">
				<div class="box box-primary">						
					<div class="box-body">
						<div class="form-group">
							<center>
								<?php
										$ngoid=$_POST['NGOname'];
										$centerid=$_POST['ddCenter'];
										$ngo_name=$_POST['txtNGOName'];
										$centername=$_POST['txtCenterName'];
										//echo $ngo_name;

										if ($centerid!='') {
										?>	
										<table width='50%' border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
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
									 
									</table>
									<?php
										$sql="select child_id,child_name,child_dob,child_father_name,city from tbl_child_profile_card where centerid='". $centerid ."'";	
										//echo $sql;
										$r_query = mysql_query($sql); 
										?>
										<br/>
										<table width='100%', border='1px dashed' style='font-family: Droid Sans, sans-serif;'>
																	  <thead>
																		
																		  <tr>
																			  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Sl. No.</th>
																			  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child ID</th>
																			  <th width='25%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Name</th>
																			  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Child Age</th>
																			  <th width='25%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Father Name</th>
																			  <th width='10%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>City</th>
																			  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>View</th>
																			  <th width='5%' style='background-color:#1980cf; text-align:center; color:#ffffff;'>Edit</th>
																		  </tr>
																	  </thead>
										<?php 
										while ($row = mysql_fetch_array($r_query)){  
										//while($row = $result->fetch_assoc()){
										if ($i%2==0) 
											{
										echo "
												<tr class='headercol'>
													<td class='pad'>".$i."</td>
													<td class='pad'>".$row["child_id"]."</td>
													<td class='pad'>".$row["child_name"]."</td>
													<td class='pad'>".$row["child_dob"]."</td>
													<td class='pad'>".$row["child_father_name"]."</td>				
													<td class='pad'>".$row["city"]."</td>
													<td class='pad' style='text-align:center;'><a href=viewChildProfile.php?id=" .$row["child_id"]. " target='_blank' >View</a></td>
													<td class='pad' style='text-align:center;'><a href=editChildProfile.php?id=" .$row["child_id"]. " >Edit</a></td>
												</tr>
											  ";
											}
											else
											{
												echo "
												<tr class='altcol'>
													<td class='pad'>".$i."</td>
													<td class='pad'>".$row["child_id"]."</td>
													<td class='pad'>".$row["child_name"]."</td>
													<td class='pad'>".$row["child_dob"]."</td>
													<td class='pad'>".$row["child_father_name"]."</td>				
													<td class='pad'>".$row["city"]."</td>
													<td class='pad' style='text-align:center;'><a href=viewChildProfile.php?id=" .$row["child_id"]. " target='_blank' >View</a></td>
													<td class='pad' style='text-align:center;'><a href=editChildProfile.php?id=" .$row["child_id"]. " >Edit</a></td>
												</tr>
											  ";
											}
										$i=$i+1;
										}  

										}
										?>
							</center>
						</div>
					</div>				
				</div>
		   </div>
		</div>
        
       </div>   <!-- /.row -->
    </section>
      </div>
    </div>
    <!-- Wrapper End --> 
	
	



  <!-- Logo Start -->
  
	  
  <!-- Sidebar Navigation End --> 
	
	
	
  
     
  </div>
  
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
