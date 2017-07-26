<?php
include('include/config.php'); 

if(isset($_POST['submit'])){
$category = $_POST['category'];
$type = $_POST['r2'];
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

$sql = "Insert into volunteer_form values(NULL,'$category','$type','$name','$district','$club','$address','$city','$state','$pin_code','$mobile','$email','$qualification','$occupation')";
$result = mysql_query($sql);
$sql2 = "Select * from volunteer_form where mobile = '$mobile' and email = '$email'";
$result2 = mysql_query($sql2);
while($data = mysql_fetch_array($result2)){
	extract($data);
}
  header('location: vertical_section.php?ver='.$vol_id);
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
    
  </head>
  <body>

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
                  <h1>Volunteer Form</h1>
                  
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Volunteer Form</a></li>
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
                  <h2 style="text-align:center"><strong>Volunteer for a more Literate India!</strong></h2><br>
                    <br>
                       <strong>You are a :</strong> <strong><?php echo $_GET['ver']; ?></strong>
                       <br>
                       <br>
                       <div class="as-donation-form">
                       <strong>You want to be :</strong>  
                        <ul class="row">
                        <?php
					     if($_GET['ver'] == 'Rotarian'){ 
					    ?>
                        <li class="col-md-6"><input type ="radio" name="r2" value="rotarian_volunteer" id="form1" onClick="volunteer_form()">Volunteer</li>
                        <li class="col-md-6"><input type ="radio" name="r3" value="cadre_rota" onchange="window.location.href ='cadre.php?ver=cadre_rota';">
                        Cadre</li>
                        <?php
						}
					     if($_GET['ver'] == 'Inner Wheel'){
					    ?>

                        <li class="col-md-6"><input type ="radio" name="r2" id="form2" value="inner_wheel_volunteer" onclick="iw_form()">Volunteer</li>
                        <li class="col-md-6"><input type ="radio" name="r3" value="cadre_iw" onchange="window.location.href = 'cadre.php?ver=cadre_iw';">
                        
                        <?php
						 }
						 if($_GET['ver'] == 'Rotaract'){
						?>
                        
                        <li class="col-md-6"><input type ="radio" name="r1" id="form3" value="rotaract_volunteer" onclick="rotr_form()">Rotaract</li>
                        
                        <?php	 
						 }
						 if($_GET['ver'] == 'RCC'){
						?>
                        
                        <li class="col-md-6"><input type ="radio" name="r1" id="form4" value="rcc_volunteer" onclick="javascript: submit();">RCC</li>
                        
                        <?php	 
						 }
						 if($_GET['ver'] == 'Other'){
						?>
                    
                        <li class="col-md-6"><input type ="radio" name="r2" value="rotarian_volunteer" id="form1" onClick="volunteer_form()">Volunteer</li>
                        <li class="col-md-6"><input type ="radio" name="r3" value="cadre_rota" onchange="window.location.href ='cadre.php?ver=cadre_rota';">    	 
					
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
                      <div style="display:none;" id="rota_vol_form">
                        <div class="as-donation-form">
                         <ul class="row">
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
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control"></li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" required></li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li>
                          </ul>   
                        </div>
                     </div>
                      <?php
					  }
					  if($_GET['ver'] == 'Inner Wheel'){
					  ?>
                      
                      <div style="display:none" id="iw_vol_form">
                        <div class="as-donation-form">
                         <ul class="row">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: 
                          <label class="as-style">
                            <select name="rotary_district" onchange="showUser(this.value)"  required>
                            <option>Inner Wheel District</option>
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
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control"></li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" required></li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li> 
                          </ul>  
                        </div>
                     </div>
                      
                      <?php
					  }
                      if($_GET['ver'] == 'Rotaract'){
					  ?>
                      
                      <div class="as-donation-form">
                         <ul class="row">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: 
                          <label class="as-style">
                            <select name="rotary_district" onchange="showUser(this.value)"  required>
                            <option>Inner Wheel District</option>
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
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control"></li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" required></li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li> 
                          </ul>  
                        </div>
                      
                      <?php
					  }
                      if($_GET['ver'] == 'RCC'){
					  ?>
                      
                      <div class="as-donation-form">
                         <ul class="row">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: 
                          <label class="as-style">
                            <select name="rotary_district" onchange="showUser(this.value)"  required>
                            <option>Inner Wheel District</option>
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
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control"></li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" required></li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li> 
                          </ul>  
                        </div>
                      
                      <?php
					  }
                      if($_GET['ver'] == 'Other'){
					  ?>
                      
                      <div class="as-donation-form">
                         <ul class="row">
                    	  <li class="col-md-6">Name : <input type="text" name="name" class="form-control" required></li>
                          <li class="col-md-6">District: [Any other Geographical District area that you wish to work.] 
                            <input type="text" name="rotary_district" class="form-control" required>
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
                            <li class="col-md-6">Pin Code : <input type="text" name="pincode" class="form-control"></li>
                            <li class="col-md-6">Mobile Number : <input type="text" name="mobile" class="form-control" required></li>
                            <li class="col-md-6">E-mail : <input type="text" name="email" class="form-control" required></li>
                            <li class="col-md-6">Educational Qualification : <input type="text" name="qualification" class="form-control" required></li>
                            <li class="col-md-6">Occupation : <input type="text" name="occupation" class="form-control" required></li>
                            <li class="col-md-12"><input type="submit" value="Confirm" class="as-bgcolor" name="submit" style="text-align:center;"></li> 
                          </ul>  
                        </div>
                      
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