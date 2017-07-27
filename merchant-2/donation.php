<?php
include('include/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donation | <?php include('include/title.php'); ?></title>

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
	<script type='text/javascript'>

function formValidator(){
	// Make quick references to our fields
	var mobile = document.getElementById('mobile');
	var zip = document.getElementById('zip');
	var amount = document.getElementById('amount');
	var email = document.getElementById('email');
	var pan = document.getElementById('pan');
	
	// Check each input in the order that it appears in the form!
			if(isNumeric(zip, "Please enter a valid zip code")){
				if(pancard_validation(pan, "Please check pan card number")){
						if(emailValidator(email, "Please enter a valid email address")){
							if(isNumeric(amount, "Please enter a valid pledge amount")){
							    if(phonenumber(mobile, "Please give valid mobile no")){
								return true;
							}
						}
					}
				}
			}
	return false;	
}
function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function phonenumber(elem, helperMsg)  
{  
  var phoneno = /^\d{10}$/;  
  if(elem.value.match(phoneno)){  
      return true;  
  }else{  
     alert(helperMsg); 
	 elem.focus(); 
     return false;  
   }  
} 
  
function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function pancard_validation(elem, helperMsg){
	var pan_card = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/ ;
	if(elem.value.match(pan_card)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
</script>
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
</script>

<script type="text/javascript">
function showUser1(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
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
                document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_user1.php?p="+str,true);
        xmlhttp.send();
    }
}
</script>

    <!-- Color Css Files Start -->
    <!-- Color Css Files End -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Color Switcher -->
    <!-- Color Switcher -->

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" class="as-absolute">

        <!--// TopStrip //-->
        <div class="container">
          <div class="as-topstrip as-bgcolor">
            <?php include('include/top-head.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container">
          <div class="as-header-bar">
            <div class="row">
              <?php include('include/logo.php'); ?>
              <div class="col-md-10">
                <div class="as-section-right">
                  <?php include('include/navigation.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
            </div>
          </div>
        </div>
      </header>
      <!--// Header //-->

      <div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Donation</h1>
                  <p></p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Donation</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section" style=" padding: 40px 0px 30px 0px; ">
          <div class="container">
            <div class="row">

       		 <div class="col-md-6">
        <div style="text-align:justify; line-height:18px; padding:0; margin:0">
    	<h2>DONATION <span class="as-color">FOR TOTAL LITERACY IN INDIA</span></h2></p>
        <br>
       	<ul style="text-align:justify; list-style:disc;">
        <!--<li>Rotarians of India have decided to bring about Total Literacy in India.</li>
        <li>Towards this objective, Rotary India Literacy Mission has been launched.</li>
        <li>The Rotary India Literacy Mission has, in turn, taken up implementation of the &nbsp;&nbsp;&nbsp;&nbsp;T-E-A-C-H Program.

        
        </li>-->
        <li>Help raise funds for the T-E-A-C-H program of Rotary India Literacy Mission.</li>
        <li>Donate through cheque/demand draft in favour of <strong>"RSAS A/c Literacy Mission"</strong>.</li>
        <li>All donations to RILM are tax exempt u/s 80G and 12 A</li>
        <li><font style="color:#FF0000">*</font> <strong>
        In case of direct remittance, please inform the RILM office with the details - Name of the Donor, Contact No, Email-Id, Rotary / IWC , Club, Dist, Purpose, Amount, 
        Cheque / DD / NEFT details at admin@rotaryteach.org
        </strong></li>
        </ul>
        <br>
        <strong>For RTGS/NEFT Transfer, the details are as follows:</strong>
        <strong style="color:#0066CC; text-decoration:underline">Indian Donors</strong>
        <br><br>           
                        <table class="table">
                            <tr bgcolor="#f5f5f5">
                              <td width="27%"><strong>Account Name</strong></td>
                                <td width="2%"><strong>:</strong></td>
                                <td width="71%">RSAS A/c Literacy Mission</td>
                          </tr>
                            <tr bgcolor="#eaeaea">
                                <td><strong>Bank</strong></td>
                                <td><strong>:</strong></td>
                                <td>ICICI Bank</td>
                            </tr>
                            <tr bgcolor="#f5f5f5">
                                <td><strong>Account Number</strong></td>
                                <td><strong>:</strong></td>
                                <td>037201003120</td>
                            </tr>
                            <tr bgcolor="#eaeaea">
                                <td><strong>IFSC Code</strong></td>
                                <td><strong>:</strong></td>
                                <td>ICIC0000372</td>
                            </tr>
                            <tr bgcolor="#f5f5f5">
                                <td><strong>Branch</strong></td>
                                <td><strong>:</strong></td>
                                <td>Sarat Bose Road Branch</td>
                            </tr>
                            <tr bgcolor="#eaeaea">
                                <td><strong>Address</strong></td>
                                <td><strong>:</strong></td>
                                <td>Sarat Bose Road, Kolkata - 700 026.</td>
                            </tr>
                        </table>   
               <br />
              </div> 
            </div>

        	 <div class="col-md-6">
          <div class="as-donation-form">
                  <h2>DONOR <span class="as-color">INFORMATION</span></h2>
                  <form action="" method="post">
                  <ul class="row">
                    <li class="col-md-3"> Rotarian &nbsp;&nbsp;<input type="radio" name="r1" value="rotarian" style="vertical-align:baseline;" onclick="javascript: submit();"> </li>
                    <li class="col-md-3"> IWC &nbsp;&nbsp;<input type="radio" name="r1" value="innerwheel" style="vertical-align:baseline;" onclick="javascript: submit();"> </li>
                    <li class="col-md-3"> Other &nbsp;&nbsp;<input type="radio" name="r1" value="other" style="vertical-align:baseline;" onclick="javascript: submit();"> </li>
                 </ul>
                 </form>
                 <?php
				 $r1 = '';
				  if(isset($_POST['r1']))
				  $r1 = $_POST['r1'];
				 {
				  if($r1 == 'rotarian'){
				 ?>
                  <form action="merchant/submit.php" method="post" enctype="multipart/form-data" onsubmit='return formValidator()' name="form">
                  <ul class="row">
                    <li class="col-md-6"> <input type="text" placeholder="First Name:" name="first_name"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Last Name:" name="last_name"> </li>
                    
                    <li class="col-md-6"> <input type="text" placeholder="Your Address:" name="address"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="City:" name="city"> </li>
                    
                    <li class="col-md-6"> <input type="text" placeholder="Mobile:" name="mobile" id="mobile"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Email:" id="email" name="email"> </li>
                    
                    <li class="col-md-6">
                      <label class="as-style">
                        <select name="rotary_district" onchange="showUser(this.value)">
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
                    <li class="col-md-6">
                      <label class="as-style">
                        <select name="club" id="txtHint">
						</select>
                      </label>
                    </li>
                    
                    
                    <li class="col-md-6">
                      <label class="as-style">
                        <select name="state">
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
                    
                    <li class="col-md-6"> <input type="text" placeholder="Postal Code:" id="zip" name="zip"></li>
                    <li class="col-md-6"> <input type="text" placeholder="Pan Card" name="pan_card" id="pan"> </li>  
                    <li class="col-md-6"> <input type="text" placeholder="Donation Amount:" name="amount" id="amount"> </li>
                                      
                    <input type="hidden" name="product" value="ASIA">
                    <input type="hidden" name="TType" value="NBFundTransfer">
                    
                    <input type="hidden" name="clientcode" value="18143">
                    <input type="hidden" name="AccountNo" value="1234567890">
                    
                    <input type="hidden" name="ru" value="http://rotaryteach.org/merchant/response.php">
                    <input type="hidden" name="bookingid" value="100001"/>
                    <li class="col-md-12"><label><input type="checkbox"> 
                    <span>I give my consent for RILM to contact me with news of their latest developments & works</span></label></li>
                    <li class="col-md-12"><input type="submit" value="Donate Now" class="as-bgcolor" name="submit"></li>
                  </ul>
                  </form>
                  <?php
				  }
				  if($r1 == 'innerwheel'){
				 ?>
                 <form action="submit.php" method="post" enctype="multipart/form-data" onsubmit='return formValidator()' name="form">
                  <ul class="row">
                    <li class="col-md-6"> <input type="text" placeholder="First Name:" name="first_name"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Your Address:" name="address"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Last Name:" name="last_name"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="City:" name="city"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Mobile:" name="mobile" id="mobile"> </li>
                    <li class="col-md-6">
                      <label class="as-style">
                        <select name="iwc_district" onchange="showUser1(this.value)">
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
                    <li class="col-md-6">
                      <label class="as-style">
                        <select name="iwc_club" id="txtHint1">
						</select>
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label class="as-style">
                        <select name="state">
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
                    <li class="col-md-6"> <input type="text" placeholder="Email:" id="email"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Postal Code:" id="zip"></li>
                    <li class="col-md-6"> <input type="text" placeholder="Donation Amount:" name="amount" id="amount"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Pan Card" name="pan_card" id="pan"> </li>                    
                    <input type="hidden" name="product" value="ASIA">
                    <input type="hidden" name="TType" value="NBFundTransfer">
                    
                    <input type="hidden" name="clientcode" value="18143">
                    <input type="hidden" name="AccountNo" value="1234567890">
                    
                    <input type="hidden" name="ru" value="http://rotaryteach.org/merchant/response.php">
                    <input type="hidden" name="bookingid" value="100001"/>
                    <li class="col-md-12"><label><input type="checkbox"> 
                    <span>I give my consent for RILM to contact me with news of their latest developments & works</span></label></li>
                    <li class="col-md-12"><input type="submit" value="Donate Now" class="as-bgcolor" name="submit"></li>
                  </ul>
                  </form>
                 <?php
				  }
				  if($r1 == 'other'){
				 ?>
                 <form action="submit.php" method="post" enctype="multipart/form-data" onsubmit='return formValidator()' name="form">
                  <ul class="row">
                    <li class="col-md-6"> <input type="text" placeholder="First Name:" name="first_name" > </li>
                    <li class="col-md-6"> <input type="text" placeholder="Your Address:" name="address" > </li>
                    <li class="col-md-6"> <input type="text" placeholder="Last Name:" name="last_name" > </li>
                    <li class="col-md-6"> <input type="text" placeholder="City:" name="city" > </li>
                    <li class="col-md-6"> <input type="text" placeholder="Mobile:" name="mobile" id="mobile"> </li>
                    <li class="col-md-6">
                      <label class="as-style">
                        <select name="state" >
                          <option>Chose State</option>
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
                    <li class="col-md-6"> <input type="text" placeholder="Email:" id="email"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Postal Code:" id="zip"></li>
                    <li class="col-md-6"> <input type="text" placeholder="Donation Amount:" name="amount" id="amount"> </li>
                    <li class="col-md-6"> <input type="text" placeholder="Pan Card" name="pan_card" id="pan"> </li>                    
                    <input type="hidden" name="product" value="ASIA">
                    <input type="hidden" name="TType" value="NBFundTransfer">
                    
                    <input type="hidden" name="clientcode" value="18143">
                    <input type="hidden" name="AccountNo" value="1234567890">
                    
                    <input type="hidden" name="ru" value="http://rotaryteach.org/merchant/response.php">
                    <input type="hidden" name="bookingid" value="100001"/>
                    
                    <li class="col-md-12"><label><input type="checkbox"> 
                    <span>I give my consent for RILM to contact me with news of their latest developments & works</span></label></li>
                    <li class="col-md-12"><input type="submit" value="Donate Now" class="as-bgcolor" name="submit"></li>
                  </ul>
                  </form>
                 <?php
				  }
				 }
				 ?>
                </div>
          </div>
        
			</div>
            <div class="row" style="background-color:#ffde99;">
			
       		 <div class="col-md-6">
             <br>
             <strong>For RTGS/NEFT Transfer, the details are as follows:</strong>
        	 <strong style="color:#0066CC; text-decoration:underline">Foreign Donors</strong>
             <br>
             <br>
        	  <table class="table">
                            <tr bgcolor="#f5f5f5">
                                <td width="27%"><strong>Account Name</strong></td>
                                <td width="2%"><strong>:</strong></td>
                                <td width="71%">R I DIST 3230 Rotary Centenary Charitable Trust</td>
                            </tr>
                            <tr bgcolor="#eaeaea">
                                <td><strong>Bank</strong></td>
                                <td><strong>:</strong></td>
                                <td>Canara Bank</td>
                            </tr>
                            <tr bgcolor="#f5f5f5">
                                <td><strong>Account Number</strong></td>
                                <td><strong>:</strong></td>
                                <td>0917201009086</td>
                            </tr>
                            <tr bgcolor="#eaeaea">
                                <td><strong>IFSC Code</strong></td>
                                <td><strong>:</strong></td>
                                <td>CNRB0000917</td>
                            </tr>
                            <tr bgcolor="#f5f5f5">
                                <td><strong>Branch</strong></td>
                                <td><strong>:</strong></td>
                                <td>T. Nagar Branch</td>
                            </tr>
                            <tr bgcolor="#eaeaea">
                                <td><strong>Address</strong></td>
                                <td><strong>:</strong></td>
                                <td>New No. 26, Old No. 22, Duraiswamy Road, T. Nagar, Chennai – 17.</td>
                            </tr>
                            <tr bgcolor="#f5f5f5">
                                <td><strong>Type of A/C</strong></td>
                                <td><strong>:</strong></td>
                                <td>Current Account</td>
                            </tr>
                        </table> 
                        <p style="font-size:16px;">With instruction to send <strong>SWIFT MT 103 to Canara Bank, Foreign Department, CNRBINBBMFD</strong></p>
    		 </div>

        	 <div class="col-md-6">
             <br>
             <br>
          		<div class="as-donation-form">
                  Please find given below the Remittance Procedure for Overseas Donors:
                    <p style="text-align:left; line-height:20px; font-size:12px; font-family:Arial, Helvetica, sans-serif">
                    <span style="color:#0066CC; text-decoration:underline; font-weight:bold">PLEASE INSTRUCT YOUR BANKERS TO REMIT THE AMOUNT IN USD TO</span><br />
                    <strong>JP Morgan Chase Bank, 
                    270, Park Avenue, New York, NY - 10017. U.S.A.<br />
                    Swift Code : CHAS US33
                    <br /><br />
                    Credit to Account :<br />
                    001–1395969 of Canara Bank, 
                    International Division, Mumbai, India.<br />
                    Swift Code : CNRBINBBBID
                    <br /><br />
                    For final credit to :<br />
                    Canara Bank, T. Nagar Branch.<br />
                    Beneficiary Details : R I DIST 3230 Rotary Centenary Charitable Trust<br />
                    A/C Number : 0917201009086</strong>
                    <br /><br />
                    </strong>
                    
                    </p>
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
    <?php include('include/search-model.php'); ?>
    <!-- Search Modal -->

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