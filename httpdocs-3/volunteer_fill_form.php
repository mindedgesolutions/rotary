<?php
include('include/config.php');

session_start(); 

if(isset($_POST['submit'])){
$category = $_POST['category'];
$type = $category;
$name = $_POST['name']; 
$district = $_POST['rotary_district'];
$club = $_POST['club'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin_code = $_POST['pincode'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$qualification = $_POST['qualification'];
$occupation = $_POST['occupation'];
$created_on = date('d/m/y');

$sql = "Insert into volunteer_form values(NULL,'$category','$type','$name','$district','$club','$address','$city','$state','$pin_code','$mobile','$email','$qualification','$occupation','$created_on','n')";
$result = mysql_query($sql);

$sql2 = "Select * from volunteer_form where mobile = '$mobile' and email = '$email'";
$result2 = mysql_query($sql2);
while($data = mysql_fetch_array($result2)){
	extract($data);
}

$_SESSION['volunteer_session'] = 'abcd';

  header('location: vertical_section.php?ver='.$vol_id);
  /*
 
  
  
  */
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer Form | <?php include('include/title.php'); ?></title>

    <!-- Css Files -->
    <?php include('include/favicon.php'); ?>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/color.css" rel="stylesheet">
    <link href="css/dl-menu.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/prettyphoto.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <script type="text/javascript">
function showUser(str) {
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
				//document.getElementById("txtHint").innerHTML = "<option value=' '>Select Club</option>";
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_user.php?q="+str,true);
        xmlhttp.send();
    }
}

function showUser1(str) {
    if (str == "") {
        document.getElementById("txtHintiw").innerHTML = "";
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
                document.getElementById("txtHintiw").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_user_iw.php?iw="+str,true);
        xmlhttp.send();
    }
}

</script>
<script type="text/javascript">
    function volunteer_form()
	{
	  var form = document.getElementById("form1").value;
	  if(form == "rotarian_volunteer"){
		 document.getElementById('rota_vol_form').style.display = "block";
		 
		 document.getElementById('rcc_vol_form').style.display = "none"; 
		 document.getElementById('rtr_vol_form').style.display = "none";
		 document.getElementById('iw_vol_form').style.display = "none";
		    
	  }
	  	  
	  
	}
	function iw_form()
	{
	  var form = document.getElementById("form2").value;
	  if(form == "inner_wheel_volunteer"){
		 document.getElementById('iw_vol_form').style.display = "block";
		 
		 document.getElementById('rcc_vol_form').style.display = "none"; 
		 document.getElementById('rtr_vol_form').style.display = "none";
		 document.getElementById('rota_vol_form').style.display = "none";   
	  }
	  	  
	  
	}
	function rotr_form()
	{
	  var form = document.getElementById("form3").value;
	  if(form == "rotaract_volunteer"){
		 document.getElementById('rtr_vol_form').style.display = "block";
		 
		 document.getElementById('rcc_vol_form').style.display = "none"; 
		 document.getElementById('iw_vol_form').style.display = "none";
		 document.getElementById('rota_vol_form').style.display = "none";   
	  }
	  	  
	  
	}
	function rcc_form()
	{
	  var form = document.getElementById("form4").value;
	  if(form == "rcc_volunteer"){
		 document.getElementById('rcc_vol_form').style.display = "block"; 
		 document.getElementById('rtr_vol_form').style.display = "none";
		 document.getElementById('iw_vol_form').style.display = "none";
		 document.getElementById('rota_vol_form').style.display = "none";   
	  }
	  	  
	  
	}
	</script>
    <style>
.tooltip1 {
    position: relative;
    display: inline-block;
}

.tooltip1 .tooltiptext {
    visibility: hidden;
    width: 550px;
    background-color: #7c7b7a;
    color: #fff;
    
    border-radius: 6px;
    padding: 10px 0;
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 110%;
	font-weight:bold;
}

.tooltip .tooltiptext::after {
    content: " ";
    position: absolute;
    top: 100%; /* At the bottom of the tooltip */
    left: 50%;
    margin-left: -5px;
    /*border-width: 5px;
    border-style: solid;*/
    border-color: black transparent transparent transparent;
}
.tooltip1:hover .tooltiptext {
    visibility: visible;
}
</style>
 <style>
.tooltip1 {
        display: '';
    }
	.tooltip2 {
        display: '';
    }
	.as-footer {
		display: '';
	}
	.as-absolute{
		display: '';
	}
	.as-breadcrumb {
		display: '';
	}
@media only screen and (max-width: 500px) {
    .tooltip1 {
        display: none;
    }
	.tooltip2 {
        display: none;
    }
	.as-footer {
		display: none;
	}
	.as-absolute{
		display: none;
	}
	.as-breadcrumb {
		display: none;
	}
}
</style>
<script>
	 function validate()
      {
	if( document.myForm.pincode.value == "" ||
         isNaN( document.myForm.pincode.value ) ||
         document.myForm.pincode.value.length != 6 )
         {
            alert( "Please provide a zip in the format eg. 700061." );
            document.myForm.pincode.focus() ;
            return false;
         }
		var mob = /^[1-9]{1}[0-9]{9}$/;
		var mobile = document.getElementById(mobile);
		if (mob.test(mobile.value) == false) {
			alert("Please enter valid mobile number.");
			mobile.focus();
			return false;
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
function IsNumeric2(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error2").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric3(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error3").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric4(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error4").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric5(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error5").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric6(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error6").style.display = ret ? "none" : "inline";
			return ret;
		}			
function IsNumeric7(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error7").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric8(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error8").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric9(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error9").style.display = ret ? "none" : "inline";
			return ret;
		}	
function IsNumeric10(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error10").style.display = ret ? "none" : "inline";
			return ret;
		}	

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function checkLength(){
    var textbox = document.getElementById("mobile");
    //if(textbox.value.length <= 10 && textbox.value.length >= 5){
	if(textbox.value.length < 10){
       alert("Enter 10 digit mobile number without country code");
		return false;
    }
    else{
        return true;
    }
}		
</script>

<!-- table style -->
	</head>
  <body>

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" >

        <!--// TopStrip //-->
        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-topstrip as-bgcolor">
            <?php include('include/top-head.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-header-bar">
            <div class="row">
			<div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
				<div class="col-md-2">
					<a style="float:left;" href="index.php" class="logo1"><img src="images/logo2.png" alt=""></a>
				</div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('include/navigation_new.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
			  </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header //-->

      <div class="as-minheader">
       
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Volunteer Registration</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Volunteer Registration</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section">
        <br>
        <br>
          <div class="container">
            <div class="row">
             <div class="col-md-12">
              <div class="as-detail-editor">
                  <h2 style="text-align:center"><strong>VOLUNTEER FOR T-E-A-C-H IN INDIA!</strong></h2><br>
					<p style="text-align: justify;">
					<strong>
						After the successful eradication of polio, Rotary in India through Rotary India Literacy Mission has embarked 
						upon the mission of Total Literacy & Quality Education in the country with the help of the T-E-A-C-H program. 
						Learn more about T-E-A-C-H <a target="_blank" href="http://rotaryteach.org/teacher_support.php" style="color:#0000ff;"><u>Teacher Support</u></a>,
						<a target="_blank" href="http://rotaryteach.org/elearning.php" style="color:#0000ff;"><u>E-Learning</u></a>, 
						<a target="_blank" href="http://rotaryteach.org/adult_literacy.php" style="color:#0000ff;"><u>Adult Literacy</u></a>,
						<a target="_blank" href="http://rotaryteach.org/child_development.php" style="color:#0000ff;"><u>Child Development</u></a> and 
						<a target="_blank" href="http://rotaryteach.org/happy_schools.php" style="color:#0000ff;"><u>Happy School</u></a> 
					</strong>
					</p>
					<br/>
					
						<h3>
							We welcome volunteers to use their talents, skills and experiences to aid RILM in its crusade of making India totally literate.
						</h3>
					<br/>
						<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Support teachers in improving the educational experience of a child</h4>
						<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Assist a non-literate adult on the path to functional literacy </h4>
						<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Bring extra-curricular activities to the fold of bridge classes attended by out-of-school children</h4>
						<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Assist in communications development as a Virtual Volunteer</h4>
						
					<br/>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2">
								<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
									  <h5 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="false" 
										aria-controls="collapseOne" style="background-color:#033;">
										  <strong style="color:#FFFFFF;">Teacher Support</strong>
										</a>
									  </h5>
									</div>
									<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									  <div class="panel-body" style="padding:0px;">
										<table width="100%" border="1">
										  <tr>
											<td valign="top">Teacher Training</td>										
										  </tr>
										  <tr>
											<td valign="top" style="line-height:1.5;">Supplemental Teaching</td>
										  </tr>
										</table>
									  </div>
									</div>
								  </div>
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="heading2">
									  <h5 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse2" aria-expanded="false" 
										aria-controls="collapse2" style="background-color:#033;">
										  <strong style="color:#FFFFFF;">Adult <br/>Literacy</strong>
										</a>
									  </h5>
									</div>
									<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									  <div class="panel-body" style="padding:0px;">
										<table width="100%" border="1">
										  <tr>
											<td valign="top" style="line-height:1.5;">Volunteer teacher for functional literacy</td>										
										  </tr>
										  <tr>
											<td valign="top" style="line-height:1.5;">Supplemental Educative classes</td>
										  </tr>
										</table>
									  </div>
									</div>
								  </div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="heading3">
									  <h5 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse3" aria-expanded="false" 
										aria-controls="collapse3" style="background-color:#033;">
										  <strong style="color:#FFFFFF;">Child Development</strong>
										</a>
									  </h5>
									</div>
									<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
									  <div class="panel-body" style="padding:0px;">
										<table width="100%" border="1" >
										  <tr>
											<td valign="top">Child Screening</td>										
										  </tr>
										  <tr>
											<td valign="top" style="line-height:1.5;">Extra-curricular activities</td>
										  </tr>
										</table>
									  </div>
									</div>
								  </div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="heading4">
									  <h5 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#collapse4" aria-expanded="false" 
										aria-controls="collapse4" style="background-color:#033;">
										  <strong style="color:#FFFFFF;">Fundraising &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
										</a>
									  </h5>
									</div>
									<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
									  <div class="panel-body" style="padding:0px;">
										<table width="100%" border="1">
										  <tr>
											<td valign="top">Help in fund raising</td>										
										  </tr>
										</table>
									  </div>
									</div>
								  </div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="panel-group" id="accordion5" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="heading5">
									  <h5 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapse5" aria-expanded="false" 
										aria-controls="collapse5" style="background-color:#033;">
										  <strong style="color:#FFFFFF;">Communi<br/>cations </strong>
										</a>
									  </h5>
									</div>
									<div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
									  <div class="panel-body" style="padding:0px;">
										<table width="100%" border="1">
										  <tr>
											<td valign="top">Graphic Design</td>										
										  </tr>
										  <tr>
											<td valign="top" style="line-height:1.5;">Content writing and editing</td>										
										  </tr>
										  <tr>
											<td valign="top" style="line-height:1.5;">Audio Visual Productions</td>										
										  </tr>
										  <tr>
											<td valign="top">Photography</td>										
										  </tr>
										  <tr>
											<td valign="top" style="line-height:1.5;">Social Media Communications</td>										
										  </tr>
										  <tr>
											<td valign="top">IT Develpment</td>										
										  </tr>
										</table>
									  </div>
									</div>
								  </div>
								</div>
							</div>
						</div>
					</div>
					
					
					
					
					<br/>
						<strong>You may register as a Volunteer or Cadre. Please select one of the following.</strong>
                       <!-- <strong>Please enter your details to register as :</strong> <strong><?php echo $_GET['ver']; ?></strong> -->
                       <br/>
                       <br/>
					   <br/>
                       <div class="as-donation-form">
                        
                        <ul class="row">
                        <?php
					     if($_GET['ver'] == 'Rotarian'){ 
					    ?>
                        <li class="col-md-6"><input type ="radio" name="r2" value="rotarian_volunteer" id="form1" onClick="volunteer_form()"> Volunteer</li>
                        <li class="col-md-6"><input type ="radio" name="r3" value="cadre_rota" onchange="window.location.href ='cadre.php?ver=cadre_rota';">
                        Cadre<div class="tooltip1">&nbsp;&nbsp;&nbsp;<img src="info.png"><span class="tooltiptext">
                        &nbsp;&nbsp;Only Rotarians and Inner Wheel members having the following qualifications can register &nbsp;&nbsp;as Cadres:<br>
                        &nbsp;&nbsp;•	Certified Accountant <br>
                        &nbsp;&nbsp;•	Engineer<br> 
                        &nbsp;&nbsp;•	Architect <br>
                        &nbsp;&nbsp;•	Educationist <br>
                        &nbsp;&nbsp;•	Social Development Professional
                        </span>
                        </div></li>
                        <?php
						}
					     if($_GET['ver'] == 'Inner Wheel'){
					    ?>
                        <li class="col-md-6"><input type ="radio" name="r2" id="form2" value="inner_wheel_volunteer" onclick="iw_form()"> Volunteer</li>
                        <li class="col-md-6"><input type ="radio" name="r3" value="cadre_iw" onchange="window.location.href = 'cadre.php?ver=cadre_iw';">
                        Cadre</li>
                        <?php
						 }
						 if($_GET['ver'] == 'Rotaract'){
						?>
                        
                        <!--<li class="col-md-6"><input type ="radio" name="r1" id="form3" value="rotaract_volunteer" onclick="rotr_form()">Rotaract</li>-->
                        
                        <?php	 
						 }
						 if($_GET['ver'] == 'RCC'){
						?>
                        
                        <!--<li class="col-md-6"><input type ="radio" name="r1" id="form4" value="rcc_volunteer" onclick="javascript: submit();">RCC</li>-->
                        
                        <?php	 
						 }
						 if($_GET['ver'] == 'Other'){
						?>
                    
                        <!--<input type ="radio" name="r1" value="other" onclick="javascript: submit();"></li>    -->	 
					
						<?php	 
						 }
						?> 
                        </ul>
                        
                       </div>
                      </div>
                      <br>
                      <br>
                      <div class="col-md-12">
                      <?php
					  if($_GET['ver'] == 'Rotarian'){
					  ?>
					   <br/>
					   <br/>
					   <br/>
				 
                     <!-- <form action="" method="post" enctype="multipart/form-data" onsubmit="return validate();" name="myForm"> -->
					 <form action="" method="post" enctype="multipart/form-data" name="myForm">
                      <div style="display:none;" id="rota_vol_form">
                        <div class="as-donation-form">
                         <ul class="row">
                          <input type="hidden" name="category" value="<?php echo $_GET['ver']; ?>">
                          
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: 
                          <label class="as-style">
                            <select name="rotary_district" onchange="showUser(this.value)"  required>
                            <option value="">Rotary District</option>
                             <?php
                                $sql=mysql_query("select DISTINCT `district` from districtclub");
                                while($row=mysql_fetch_array($sql))
                                {
                                $data=$row['district'];
                                echo '<option value="'.$data.'">'.$data.'</option>';
                                } 
                              ?>
                            </select>
                          </label>
                           </li>
                            <li class="col-md-6">Address : <input type="text" name="address" class="form-control" required></li>
                            <li class="col-md-6"> Club : 
                              <label class="as-style" >
                                <select name="club" id="txtHint" required>
								
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">City : <input type="text" name="city" class="form-control" required></li>
                            <li class="col-md-6">State : <label class="as-style">
                                <select name="state" required>
                                  <option value="">State</option>
                                  <?php
                                    $sql=mysql_query("select DISTINCT `state` from states");
                                    while($row=mysql_fetch_array($sql))
                                    {
                                    $data=$row['state'];
                                    echo '<option value="'.$data.'">'.$data.'</option>';
                                    } 
                                  ?>
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control" maxlength="6" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10" required onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" />
								 <span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
								
							</li>
                            <li class="col-md-6">E-mail : <input type="email" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <!-- <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li> -->
							<li class="col-md-12"><input type="submit" value="Next" class="btn btn-primary" onClick="return checkLength();" name="submit" style="text-align:center;"></li>
							<li class="col-md-12"><b>NOTE :- Your registration will be complete only when you select one or more Area of Work on the Next page.</b></li>
                          </ul>   
                        </div>
                     </div>
                      </form>
                      <?php
					  }
					  if($_GET['ver'] == 'Inner Wheel'){
					  ?>
                      <form action="" method="post" enctype="multipart/form-data">
                      <div style="display:none" id="iw_vol_form">
                        <div class="as-donation-form">
                         <ul class="row">
                          <input type="hidden" name="category" value="<?php echo $_GET['ver']; ?>">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: 
                          <label class="as-style">
                            <select name="rotary_district" onchange="showUser1(this.value)"  required>
                            <option>Inner Wheel District</option>
                             <?php
                                $sql=mysql_query("select DISTINCT `IWdistrict` from IWDistrictClub");
                                while($row=mysql_fetch_array($sql))
                                {
                                $data=$row['IWdistrict'];
                                echo '<option value="'.$data.'">'.$data.'</option>';
                                } 
                              ?>
                            </select>
                          </label>
                           </li>
                            <li class="col-md-6">Address : <input type="text" name="address" class="form-control" required></li>
                            <li class="col-md-6"> Club : 
                              <label class="as-style">
                                <select name="club" id="txtHintiw">
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">City : <input type="text" name="city" class="form-control" required></li>
                            <li class="col-md-6">State : <label class="as-style">
                                <select name="state" required>
                                  <option>State</option>
                                  <?php
                                    $sql=mysql_query("select DISTINCT `state` from states");
                                    while($row=mysql_fetch_array($sql))
                                    {
                                    $data=$row['state'];
                                    echo '<option value="'.$data.'">'.$data.'</option>';
                                    } 
                                  ?>
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control" maxlength="6" required onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" id="mobile" maxlength="10" required onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <!-- <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li> -->							
							<li class="col-md-12"><input type="submit" value="Next" class="btn btn-primary" onClick="return checkLength();" name="submit" style="text-align:center;"></li>
							<li class="col-md-12"><b>NOTE :- Your registration will be complete only when you select one or more Area of Work on the Next page.</b></li>
                          </ul>  
                        </div>
                     </div>
                      </form>
                      <?php
					  }
                      if($_GET['ver'] == 'Rotaract'){
					  ?>
                      <form action="" method="post" enctype="multipart/form-data">
                      <div class="as-donation-form">
                         <ul class="row">
                         <input type="hidden" name="category" value="<?php echo $_GET['ver']; ?>">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: 
                          <label class="as-style">
                            <select name="rotary_district" onchange="showUser(this.value)"  required>
                            <option>Rotary District</option>
                             <?php
                                $sql=mysql_query("select DISTINCT `district` from districtclub");
                                while($row=mysql_fetch_array($sql))
                                {
                                $data=$row['district'];
                                echo '<option value="'.$data.'">'.$data.'</option>';
                                } 
                              ?>
                            </select>
                          </label>
                           </li>
                            <li class="col-md-6">Address : <input type="text" name="address" class="form-control" required></li>
                            <li class="col-md-6"> Club : 
                              <label class="as-style">
                                <select name="club" id="txtHint">
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">City : <input type="text" name="city" class="form-control" required></li>
                            <li class="col-md-6">State : <label class="as-style">
                                <select name="state" required>
                                  <option>State</option>
                                  <?php
                                    $sql=mysql_query("select DISTINCT `state` from states");
                                    while($row=mysql_fetch_array($sql))
                                    {
                                    $data=$row['state'];
                                    echo '<option value="'.$data.'">'.$data.'</option>';
                                    } 
                                  ?>
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control" maxlength="6" required onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10" required onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <!-- <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li>  -->
							<li class="col-md-12"><input type="submit" value="Next" class="btn btn-primary" onClick="return checkLength();" name="submit" style="text-align:center;"></li> 
							<li class="col-md-12"><b>NOTE :- Your registration will be complete only when you select one or more Area of Work on the Next page.</b></li>							
                          </ul>  
                        </div>
                      </form>
                      <?php
					  }
                      if($_GET['ver'] == 'RCC'){
					  ?>
                      <form action="" method="post" enctype="multipart/form-data">
                      <div class="as-donation-form">
                         <ul class="row">
                         <input type="hidden" name="category" value="<?php echo $_GET['ver']; ?>">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: 
                          <label class="as-style">
                            <select name="rotary_district" onchange="showUser(this.value)" required>
                            <option>Rotary District</option>
                             <?php
                                $sql=mysql_query("select DISTINCT `district` from districtclub");
                                while($row=mysql_fetch_array($sql))
                                {
                                $data=$row['district'];
                                echo '<option value="'.$data.'">'.$data.'</option>';
                                } 
                              ?>
                            </select>
                          </label>
                           </li>
                            <li class="col-md-6">Address : <input type="text" name="address" class="form-control" required></li>
                            <li class="col-md-6"> Club : 
                              <label class="as-style">
                                <select name="club" id="txtHint">
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">City : <input type="text" name="city" class="form-control" required></li>
                            <li class="col-md-6">State : <label class="as-style">
                                <select name="state" required>
                                  <option>State</option>
                                  <?php
                                    $sql=mysql_query("select DISTINCT `state` from states");
                                    while($row=mysql_fetch_array($sql))
                                    {
                                    $data=$row['state'];
                                    echo '<option value="'.$data.'">'.$data.'</option>';
                                    } 
                                  ?>
                                </select>
                              </label>
                            </li>
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control" maxlength="6" required onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" id="mobile" maxlength="10" required onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <!-- <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li> -->
							<li class="col-md-12"><input type="submit" value="Next" class="btn btn-primary" onClick="return checkLength();" name="submit" style="text-align:center;"></li>
							<li class="col-md-12"><b>NOTE :- Your registration will be complete only when you select one or more Area of Work on the Next page.</b></li>
                          </ul>  
                        </div>
                      </form>
                      <?php
					  }
                      if($_GET['ver'] == 'Other'){
					  ?>
                      <form action="" method="post" enctype="multipart/form-data">
                      <div class="as-donation-form">
                         <ul class="row">
                          <input type="hidden" name="category" value="<?php echo $_GET['ver']; ?>">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District:
                            <input type="text" name="rotary_district" class="form-control" required>
                          </li>
                            <li class="col-md-6">Address : <input type="text" name="address" class="form-control" required></li>
                            <li class="col-md-6">City : <input type="text" name="city" class="form-control" required></li>
                            <li class="col-md-6">State : 
                                <select name="state" class="form-control" required>
                                  <option>State</option>
                                  <?php
                                    $sql=mysql_query("select DISTINCT `state` from states");
                                    while($row=mysql_fetch_array($sql))
                                    {
                                    $data=$row['state'];
                                    echo '<option value="'.$data.'">'.$data.'</option>';
                                    } 
                                  ?>
                                </select>
                            </li>
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control" maxlength="6" required onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            
                            <li class="col-md-6">E-mail : <input type="email" name="email" class="form-control" required></li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" id="mobile" maxlength="10" required onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
							
							</li>
                            
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <!-- <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li>  -->
							<li class="col-md-12"><input type="submit" value="Next" class="btn btn-primary" onClick="return checkLength();" name="submit" style="text-align:center;"></li> 
							<li class="col-md-12"><b>NOTE :- Your registration will be complete only when you select one or more Area of Work on the Next page.</b></li>
							
                          </ul>  
                        </div>
                      </form>
                      <?php
					  }
					  ?>
                      </div>
                  </div>
                </div>
        <!--// MainSection //-->

      </div>

      <!--// Footer //-->
      <div class="as-footer">
        <div class="container">
          <?php include('include/footer.php'); ?>
        </div>
        <?php include('include/copy-right.php'); ?>
      </div>
      <!--// Footer //-->
	<div class="clearfix"></div>
    </div>
    <!--// Main Wrapper //-->

    <!-- Search Modal -->
    <?php include('include/search-model.php'); ?>
    <!-- Search Modal -->
	<script type="text/javascript">
	function show_more1()
	{
	  var form = document.getElementById("hmm").value;
	  alert(form);
	  if(form == "yes"){
		 document.getElementById('show_val').style.display = ''; 
	  }
	  else if(form == "no"){
		 document.getElementById('show_val').style.display = "none";  
	  }
	}

	</script>
    <!-- jQuery (necessary for JavaScript plugins) -->
    <script src="script/jquery.min.js"></script>
    <script src="script/modernizr.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/jquery.dlmenu.js"></script>
    <script src="script/flexslider-min.js"></script>
    <script src="script/goalProgress.min.js"></script>
    <script src="script/jquery.countdown.min.js"></script>
    <script src="script/jquery.prettyphoto.js"></script>
    <script src="script/waypoints-min.js"></script>
    <script src="script/owl.carousel.min.js"></script>
    <script src="script/newsticker.js"></script>
    <script src="script/parallex.js"></script>
    <script src="script/styleswitch.js"></script>
    <script src="script/functions.js"></script>
  </body>
</html>