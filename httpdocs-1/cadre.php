<?php
include('include/config.php'); 

if(isset($_POST['submit'])){
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
$professional_qualification = $_POST['professional_qualification'];
$answer = $_POST['answer'];
$experience_detail = $_POST['experience_detail'];	

$monitering_feild = $_POST['monitering'];
$monitering_feild = str_replace("_"," ",$monitering_feild);
$monitering = implode(",",$monitering_feild);

$langauges = $_POST['langauge'];
$langauges = str_replace("_"," ",$langauges);
$langauge = implode(",",$langauges);


$weeks = $_POST['week'];
$weeks = str_replace("_"," ",$weeks);
$week = implode(",",$weeks);

$resume = $_POST['resume'];
$resume_name= basename($_FILES['resume']['name']);
move_uploaded_file($image['tmp_name'], "upload_resume_cadre/". $resume_name);
$type = $_POST['ver'];
$district_other =  '';


$sql = "Insert into cadre_form values(NULL,'$type','$name','$club','$district','$district_other','$address','$city','$state','$pin_code','$mobile','$email','$qualification','$professional_qualification','$langauge','$monitering','$answer','$experience_detail','$week','$resume_name')";
$result = mysql_query($sql);
	
$to = $email; // Email address of the Receiver.
$subject = "RILMs Cadre for Literacy";
$message = '<table cellspacing="2" cellpadding="2" style="width:auto;border:1px solid #ccc;">
			<tr>
			<td width="388">Thank you for applying  to be member of RILMs Cadre for Literacy! We will screen your application and revert to you shortly.</td>
			</tr>
		</table>';
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	// More headers
	$headers .= 'From: Rotary India Literacy Mission <volunteer@rotarytech.org>'. "\r\n";
	$send_contact = mail($to,$subject,$message,$headers);
		
echo "<script>
alert('Thank you for applying  to be member of RILMs Cadre for Literacy! We will screen your application and revert to you shortly.');
window.location.href='volunteer_form.php';
</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadre Form |
    <?php include('include/title.php'); ?>
    </title>

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

function validateForm()
{
	var checkboxs=document.getElementsByName("monitering[]");
		var okay=false;
		for(var i=0,l=checkboxs.length;i<l;i++)
			{
				if(checkboxs[i].checked)
				{				
					okay=true;
					break;									
				}				
			}
					
		if(okay)
		{
			//2nd group
				var checkboxs=document.getElementsByName("week[]");
			var okay=false;
			for(var i=0,l=checkboxs.length;i<l;i++)
				{
					if(checkboxs[i].checked)
					{				
						okay=true;
						break;									
					}				
				}
						
			if(okay)
			{
			//3rd group RADIO BUTTON 
				var fromYes = document.getElementById("txtYes").value;
				//alert(fromYes);
				if(fromYes="yes")
				{
					var exptxt = document.getElementById("experience_detail").value;
					if(exptxt=""){
						alert("Please provide details of your experience");
						return false;	
					}					
				}
			}
			else
			{
				alert("Please select the days of the week on which you are available");
			}
		}
		else
		{
			alert("Please select the area in which you would like to lend your expertise in monitoring");
		}
}		
</script>		
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
                  <h1>Cadre Form</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Cadre Form</a></li>
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
          <div class="container">
        <div class="row">
              <div class="col-md-12">
            <div class="as-detail-editor">
            <h2 style="text-align:center"><strong>VOLUNTEER FOR T-E-A-C-H IN INDIA!</strong></h2>
            <br>
            <form action="cadre.php" method="post" enctype="multipart/form-data" name="myForm">
            <div class="as-donation-form">
             <ul class="row">
              <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
              <li class="col-md-6">District:
               <select name="rotary_district" onchange="showUser(this.value)" required>
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
              </li>
              <li class="col-md-6">State : 
                <select name="state" class="form-control" required>
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
               </li>
              <li class="col-md-6">Club : <select name="club" id="txtHint" required></select></li>
              
              <li class="col-md-6">Address : <input type="text" name="address" class="form-control" required></li>
              <li class="col-md-6">City / Town / Village : <input type="text" name="city" class="form-control" required></li>
              
              <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control" maxlength="6" required onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
			  
			  </li>
              <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" maxlength="10" required onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" />
								<span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>
			  
			  </li>
              
              <li class="col-md-6">E-mail : <input type="email" name="email" class="form-control" required></li>
              <li class="col-md-6">Educational Qualification : <select name="qualification" required>
                  <option value="">Select Qualification</option>
                  <option value="Professional">Professional</option>
                  <option value="Doctorate">Doctorate</option>
                  <option value="Post Graduate">Post Graduate</option>
                  <option value="Graduate">Graduate</option>
                  <option value="Higher Secondary">Higher Secondary</option>
                </select>
               </li>
               <li class="col-md-6">Professional Qualification : <select name="professional_qualification" required>
                  <option value="">Select Qualification</option>
                  <option value="Chartered Accountant">Chartered Accountant</option>
                  <option value="Cost Accountant">Cost Accountant</option>
                  <option value="Company Secretary">Company Secretary</option>
                  <option value="Engineer">Engineer</option>
                  <option value="Architect">Architect</option>
                  <option value="Educationist">Educationist</option>
                  <option value="Social Development Professional">Social Development Professional</option>
                </select>
               </li>
               <li class="col-md-6">Languages Spoken : [Please press ctrl button for multiple selection]<select name="langauge[]" multiple required>
                  <option>Select Langauge</option>
                  <option value="Gujarati">Gujarati</option>
                  <option value="Hindi">Hindi</option>
                  <option value="Kannada">Kannada</option>
                  <option value="Kashmiri">Kashmiri</option>
                  <option value="Konkani">Konkani</option>
                  <option value="Malayalam">Malayalam</option>
                  <option value="Manipuri">Manipuri</option>
                  <option value="Marathi">Marathi</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Odia">Odia</option>
                  <option value="Punjabi">Punjabi</option>
                  <option value="Sanskrit">Sanskrit</option>
                  <option value="Sindhi">Sindhi</option>
                  <option value="Tamil">Tamil</option>
                  <option value="Telugu">Telugu</option>
                  <option value="Urdu">Urdu</option>
                  <option value="English">English</option>
                  <option value="Bodo">Bodo</option>
                  <option value="Mising">Mising</option>
                  <option value="Dogri">Dogri</option>
                  <option value="Khasi">Khasi</option>
                  <option value="Garo">Garo</option>
                  <option value="Mizo">Mizo</option>
                  <option value="Bhutia">Bhutia</option>
                  <option value="Lepcha">Lepcha</option>
                  <option value="Limboo">Limboo</option>
                </select>
               </li>
               <li class="col-md-6">Please select from the following, the area in which you would like to lend your expertise in monitoring :
               <label><input type="checkbox" name="monitering[]" id="monitering" value="Teacher Support"><span>Teacher Support</span></label> 
               <label><input type="checkbox" name="monitering[]" id="monitering" value="E-Learning"><span>E-Learning</span></label> 
               <label><input type="checkbox" name="monitering[]" id="monitering" value="Adult Literacy"><span>Adult Literacy</span></label> 
               <label><input type="checkbox" name="monitering[]" id="monitering" value="Child Development"><span>Child Development</span></label> 
               <label><input type="checkbox" name="monitering[]" id="monitering" value="Happy Schools"><span>Happy Schools </span></label> 
              </li>
              <li class="col-md-6">Please select the days of the week on which you are available :
               <label><input type="checkbox" name="week[]" id="week" value="Monday"><span>Monday</span></label> 
               <label><input type="checkbox" name="week[]" id="week" value="Tuesday"><span>Tuesday</span></label> 
               <label><input type="checkbox" name="week[]" id="week" value="Wednesday"><span>Wednesday</span></label> 
               <label><input type="checkbox" name="week[]" id="week" value="Thursday"><span>Thursday</span></label> 
               <label><input type="checkbox" name="week[]" id="week" value="Friday"><span>Friday</span></label> 
               <label><input type="checkbox" name="week[]" id="week" value="Saturday"><span>Saturday</span></label> 
               <label><input type="checkbox" name="week[]" id="week" value="Sunday"><span>Sunday</span></label>
               <label><input type="checkbox" name="week[]" id="week" value="Any Day"><span>Any Day</span></label> 
              </li>
              
              <li class="col-md-6">Do you have previous experience as a member of the Cadre for the Rotary Foundation ?
               <label><input type="radio" name="answer" value="yes" onClick="return show_more1();" id="hmmYes"><span>Yes</span></label>
               <label><input type="radio" name="answer" value="no" onClick="return show_more2();" id="hmmNo" checked ><span>No</span></label>
			   <input type="text" id="txtYes" id="txtYes" value="no" readonly style="display:none;">
              </li>
              <li class="col-md-6">Please attach your updated resume : <input type="file" name="resume" value="" required class="form-control"/></li>
              
              <li class="col-md-12" style="display:none;" id="show_val">Please provide details of your experience (Max 250 words): 
              <textarea name="experience_detail" class="form-control"></textarea>
              </li>
              <input type="hidden" name="ver" value="<?php echo $_GET['ver']; ?>">
              <!-- <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit"></li> -->
              <li class="col-md-12"><input type="submit" value="CONFIRM" onClick="return validateForm();" class="btn btn-primary" name="submit" style="text-align:center;"></li>
			  
			  
             </ul>
           </div>  
            </form>
          </div>
            </div>
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
<?php //include('include/search-model.php'); ?>
<!-- Search Modal --> 
<script type="text/javascript">
	function show_more1()
	{
	  //var form = document.getElementByName("answer").value;
	  var formYes = document.getElementById("hmmYes").value;
	  //alert(form);
	  if(formYes == "yes"){
		 document.getElementById('show_val').style.display = ''; 
		 document.getElementById("txtYes").value = formYes;
	  }
	}
	
	function show_more2()
	{
	  //var form = document.getElementByName("answer").value;
	  var formNo = document.getElementById("hmmNo").value;
	  //alert(form);
	  if(formNo == "no"){
		 document.getElementById('show_val').style.display = "none";  
		 document.getElementById("txtYes").value = formNo;
		 document.getElementById("experience_detail").value = "";
	  }
	}
	</script>
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
		var txtMobile = document.getElementById(txtMobId);
		if (mob.test(txtMobile.value) == false) {
			alert("Please enter valid mobile number.");
			txtMobile.focus();
			return false;
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