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

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asha Kiran Donor Entry Form</title>
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
		.help {
    display:none;
    font-size:90%;
}
input:focus + .help {
    display:inline-block;
}
</style>
<script type="text/javascript">

var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
			return ret;
        }
		function IsNumeric1(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error1").style.display = ret ? "none" : "inline";
			return ret;
        }
		function IsNumeric2(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error2").style.display = ret ? "none" : "inline";
			return ret;
        }
		
function allLetter(inputtxt)  
      {   
      var letters = /^[A-Za-z]+$/;  
      if(inputtxt.value.match(letters))  
      {  
      alert('Your name have accepted : you can try another');  
      return true;  
      }  
      else  
      {  
      alert('Please input alphabet characters only');  
      return false;  
      }  
      }  

function showClub(str)
{
	var textHolderClub = ddDistrict.options[ddDistrict.selectedIndex].text
	document.getElementById("txtDistrictName").value = textHolderClub;
	
	if (str == "") {
        document.getElementById("ddClub").innerHTML = "";
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
                document.getElementById("ddClub").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_club_list.php?q="+str,true);
        xmlhttp.send();
    }
}
function showDistrict(str) {
	var textHolderDistrict = ddMember.options[ddMember.selectedIndex].text
	document.getElementById("txtMemberName").value = textHolderDistrict;
	
    if (str == "") {
        document.getElementById("ddDistrict").innerHTML = "";
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
                document.getElementById("ddDistrict").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_district_list.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>	
<script>
  $(document).ready(function() {
    $("#ddMember").change(function(){
      $("#txtNGOName").val(("#ddMember").find(":selected").text());
    });
  });
</script>

<script>
function getid()
{
var email=$("#txtEmail").val();    // get the id from textbox
//alert("rajesh");
$.ajax({
        type:"post",
        dataType:"text",
        data:"email="+email,
        url:"idpage.php",   // url of php page where you are writing the query
        success:function(response)
        { 
            $("#txtdbemail").val(response);   // setting the result from page as value of name field

        }
        });

}
</script>	
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<header> 
	  <!-- Logo Start -->
	  <div class="row">
		<div class="col-xs-12">
			<div class="col-xs-4"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
			<div class="col-xs-8">
				<font color="#ffffff">
				
				</font>
			</div>
		</div>
	  </div>
	  <!-- Logo End --> 
	  
	  <!-- Sidebar Navigation Start -->
	  <?php //include('include/mainnav.php'); ?>
	  
	  <div class="clearfix"></div>
	  <!-- Sidebar Navigation End --> 
	</header>
	<div class="structure-row alone">
	<div class="right-sec"> 
<!--		<header> 
	  <div class="row">
			<div class="col-xs-12">
				<div class="col-xs-4">
				<?php //include('include/child_header.php');?>
				</div>
				<div class="col-xs-4">
				<h3 style="color:#ffffff; text-align:center;">Asha Kiran Donor Entry Form</h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;"></h5>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
      </header> -->
	  
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                       <!-- <div class="col-xs-12"> -->
					   <div class="col-md-2"></div>
					   <div class="col-md-8 sec-box">
                            <div class="sec-box">
                                <!-- <a class="closethis">Close</a> -->
                                <header>

									Thank you for your donation. But we have not received your donation / your name as donor because:<br/>
									1. Donation by donor, not communicated to RILM Office.<br/>
									2. Donation is made to RC / IWC, but donor details not been provided with payment.<br/>
									3. Donation made but not received by RILM. <br/>
									4. Any other reason. <br/>
									<center>
									<h4 class="heading">To help us create your donation profile, fill this form.</h4>
									</center>
								</header>
                                <div class="contents">
                                    <!-- <a class="togglethis">Toggle</a> -->
                                    <div class="table-box">
                                        <table class="table">
                                            
                                            <tbody>
	<form class="form-horizontal" name="frm" id="frm" action="ins_not_in_tagged_list.php" method="post" enctype="multipart/form-data" >			
                                                <tr>
												
												<input type="text" id="txtMemberName" readonly name="txtMemberName" style="display:none;">
												<input type="text" id="txtDistrictName" readonly name="txtDistrictName" style="display:none;">
                                                    <td class="col-md-4">A member of:</td>
                                                    <td class="col-md-8"><select class="form-control" id="ddMember" name="ddMember" required onchange='showDistrict(this.value)'>
																		<option value="">Select Member</option>
																		<option value="Rotary">Rotary</option>
																		<option value="Inner Wheel">Inner Wheel</option>
																		<!-- <option value="Rotaract">Rotaract</option> -->
																		<option value="Other">Other</option>
																	</select></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="col-md-4">Rotary/IW District:</td>
                                                    <td class="col-md-8"><select class="form-control" id="ddDistrict" name="ddDistrict" required onchange='showClub(this.value)'>
                                                        
                                                    </td>
													
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Name of the Rotary/IW Club:</td>
                                                    <td class="col-md-8">
                                                       <select class="form-control" id="ddClub" name="ddClub" required >
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">First Name:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtFirstName" name="txtFirstName" class="form-control" required><font style="color: Red;">*</font>   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Last Name:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtLastName" name="txtLastName" class="form-control">   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Address:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtAddress" name="txtAddress" class="form-control">   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">City:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtCity" name="txtCity" class="form-control">   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">State:</td>
                                                    <td class="col-md-8">
														<?php
															$sql = "SELECT id,state FROM tbl_states";
															$result = mysql_query($sql);
															echo "<select class='form-control' width='100%' id='ddState1' name='ddState1'>";
															echo "<option value=' '>Select State</option>";
															while ($row = mysql_fetch_array($result)) {
																echo "<option value='" . $row['state'] . "'>" . $row['state'] . "</option>";
															}
															echo "</select><font style='color: Red;'>*</font> ";
														?>
													</td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Country:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtCountry" name="txtCountry" class="form-control" ><font style="color: Red;">*</font>  
                                                    <!-- <span id="error" style="color: Red; display: none">Please input alphabet characters only</span> -->
													</td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">E-Mail:</td>
                                                    <td class="col-md-8">
														
                                                     <input type="email" id="txtEmail" name="txtEmail" required onblur="getid()" class="form-control" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"><font style="color: Red;">*</font>       
														<input type="text" id="txtdbemail" name="txtdbemail" readonly class="form-control" style="display:none;" >
													</td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Mobile No:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtMobNo" name="txtMobNo" required class="form-control" maxlength="10" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" />	
														<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>   
                                                    </td>
                                                </tr>
												<!--
												<tr>
                                                    <td class="col-md-4">Voucher No:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtVoucherNo" name="txtVoucherNo" class="form-control" required><font style="color: Red;">*</font>    
                                                    </td>
                                                </tr> -->
												<tr>
                                                    <td class="col-md-4">Preferred State:</td>
                                                    <td class="col-md-8"><?php
																			$sql = "SELECT id,state FROM tbl_states";
																			$result = mysql_query($sql);
																			echo "<select class='form-control' width='100%' id='ddState' name='ddState'>";
																			echo "<option value=' '>Select State</option>";
																			while ($row = mysql_fetch_array($result)) {
																				echo "<option value='" . $row['state'] . "'>" . $row['state'] . "</option>";
																			}
																			echo "</select>";
																		?></td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                     <u><b><i>Donation Details</i></b></u>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Donation Date:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtDonationDT" name="txtDonationDT" class="form-control" onfocus="showCalendarControl(this);">
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Donation Amount:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtDonationAmount" name="txtDonationAmount" class="form-control" required maxlength="10" onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" /><font style="color: Red;">*</font>    	
														<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>   
                                                    </td>
                                                </tr>
												
												<tr>
                                                    <td class="col-md-4">No of Child:</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtNoOfChild" name="txtNoOfChild" class="form-control" required maxlength="3" onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" /><font style="color: Red;">*</font>    	
														<span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>  
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Payment Method:</td>
                                                    <td class="col-md-8">
														<select class="form-control" id="ddPayMethod" name="ddPayMethod">
															<option value="no">Select Payment Method</option>
															<option value="Cash">Cash</option>
															<option value="Cheque">Cheque</option>															
															<option value="Bank Draft">Bank Draft</option>
															<option value="Net Banking">Net Banking</option>
															<option value="RTGS">RTGS</option>
															<option value="NEFT">NEFT</option>
															<option value="Other">Other</option>
														</select>
											  
                                                    </td>
                                                </tr> 
												<tr>
                                                    <td class="col-md-4">Remarks:</td>
                                                    <td class="col-md-8">
														<input type="text" id="txtRemarks" name="txtRemarks" class="form-control" maxlength="100">  
                                                    </td>
                                                </tr> 
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
    </form>   
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-2"></div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Content Section End -->
    </div>
	</div>
	<br/>
	<br/>
	<div class="footer">
	  <?php
	  include('include/footer.php');
	  ?>
	</div>
</div>
<!-- Wrapper End -->
</body>
</html>
