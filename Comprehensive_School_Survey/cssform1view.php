<?php
session_start();
ob_start();
include('include/config.php');
$userid=$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];
$survey_id=$_GET['id'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprehensive School Survey Form</title>
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
	var url;

function showDistrict(str) {
	//alert("test");
	//var textHolderDistrict = ddMember.options[ddMember.selectedIndex].text
	//document.getElementById("txtMemberName").value = textHolderDistrict;
	
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

function showClub(str)
{
	//var textHolderClub = ddDistrict.options[ddDistrict.selectedIndex].text
	//document.getElementById("txtDistrictName").value = textHolderClub;
	
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
</script>

<script type="text/javascript">
var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric1(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error1").style.display = ret ? "none" : "inline";
			return ret;
		}

function checkEmail(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
    alert("Please enter a valid email address");
}		
</script>
</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">
	<header> 
	  <!-- Logo Start -->
	  <div class="logo"><a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a></div>
	  <!-- Logo End --> 
	  
	  <!-- Sidebar Navigation Start -->
	  <?php include('include/mainnav.php'); ?>
	  
	  <div class="clearfix"></div>
	  <!-- Sidebar Navigation End --> 
	</header>
	<div class="structure-row alone">
	<div class="right-sec">   
		<header> 
	  <div class="row">
			<div class="col-xs-12">
				<div class="col-xs-4">
				<?php include('include/child_header.php'); ?>
				</div>
				<div class="col-xs-4">
				<h3 style="color:#ffffff; text-align:center;">Comprehensive School Survey Form for Teacher Support, E-Learning & Happy School (Form No R 1.1)</h3>
				</div>
				<div class="col-xs-4" >
				<h5 style="color:#ffffff; text-align:right;">Step-1</h5>
				</div>
			</div>
		</div>
		
        <div class="clearfix"></div>
      </header> 
	  
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
									<center>
										<h4 class="heading">PERSONAL DETAILS OF THE PERSON FILLING THE FORM 1</h4>
									</center>
								</header>
                                <div class="contents">
                                    <!-- <a class="togglethis">Toggle</a> -->
                                    <div class="table-box">
                                        <table class="table">
                                            
                                            <tbody>
	<form class="form-horizontal" name="frm" id="frm" action="" method="" enctype="multipart/form-data" >
		<?php 
			$sql = "select survey_id,userid,identity,district,club,ph_no,name,Address,email,rotractClub 
					from tbl_school_survey where userid='$userid' and survey_id='$survey_id'";
			
			$result = mysql_query($sql);
			//echo $sql;
			$chk = "checked";
			
			while($row = mysql_fetch_array($result)){
			extract($row);
		?>
                                                <tr>												
                                                    <td class="col-md-4">Select your identity :</td>
                                                    <td class="col-md-8">
														<label class="radio-inline" for = "rotary"><input type = "radio" name = "areyoua" id = "rotary" value = "Rotary" onclick="showDistrict(this.value);" <?php if($identity=='Rotary'){echo $chk;} ?> disabled='disabled'  />Rotary</label>
														<label class="radio-inline" for = "innerwheel"><input type = "radio" name = "areyoua" id = "innerwheel" value = "Inner Wheel" onclick="showDistrict(this.value);" <?php if($identity=='Inner Wheel'){echo $chk;} ?> disabled='disabled' />Inner Wheel</label>
														<label class="radio-inline" for = "rotaract"><input type = "radio" name = "areyoua" id = "rotaract" value = "Rotaract" onclick="showDistrict(this.value);" <?php if($identity=='Rotaract'){echo $chk;} ?> disabled='disabled' />Rotaract</label>
													</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="col-md-4">RI District :</td>
                                                    <td class="col-md-8">
														<select class="form-control" id="ddDistrict" name="ddDistrict" onchange='showClub(this.value)' readonly >
														<option value=""><?php echo $district; ?></option>
														</select>																
                                                    </td>
													
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Name of Club :</td>
                                                    <td class="col-md-8">
														<select class="form-control" id="ddClub" name="ddClub" readonly >
															<option value=""><?php if($club==""){echo $rotractClub; } else { echo $club; } ?></option>									
														</select>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Phone Number :</td>
                                                    <td class="col-md-8">
														<input class="form-control" type="text" id="txtPhoneNo" name="txtPhoneNo" maxlength="10" value="<?php echo $ph_no; ?>" readonly required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
														<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Full Name:</td>
                                                    <td class="col-md-8">
                                                     <input type="text" id="txtPersonName" name="txtPersonName" class="form-control" value="<?php echo $name; ?>" readonly >   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Postal Address :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtAddress" name="txtAddress" value="<?php echo $Address; ?>" readonly >   
                                                    </td>
                                                </tr>
												<tr>
                                                    <td class="col-md-4">Email id :</td>
                                                    <td class="col-md-8">
                                                     <input class="form-control" type="text" id="txtEmailID" name="txtEmailID" onblur="checkEmail(this.value)" value="<?php echo $email; ?>" readonly >  
                                                    </td>
                                                </tr>
											<?php
												}
											?>
												<tr>
                                                    <td class="col-md-4"></td>
                                                    <td class="col-md-8">
                                                        <div class="form-group has-error">
                                                            <button type="button" class="btn btn-primary" name="submit" onClick="window.location = 'http://rotaryteach.org/Comprehensive_School_Survey/cssform2view.php?id=<?php echo $survey_id; ?>'">Next</button>
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
