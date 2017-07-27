<?php 
include('include/config.php');
session_start();
ob_start();
if(isset($_POST['submit'])){
$name = $_POST['name'];	
$designation = $_POST['desig'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$district = $_POST['district'];
$club = $_POST['club'];
$state = $_POST['state'];	
$city_town = $_POST['city_town'];
$no_school = $_POST['no_school'];
$total_lib_amt = $_POST['total_lib_amt'];
$amount_paidby = $_POST['amount_paidby'];
$date_of = date("d/m/Y");

$school_id = $_POST['school_id']; 	
$inst_name = $_POST['inst_name'];
$address = $_POST['address'];
$type_school = $_POST['type_school'];
$no_of_stdent = $_POST['no_of_stdent'];
$langauge = $_POST['langaug'];
$contact_name = $_POST['contact_name'];
$contact_no = $_POST['contact_no'];


$sql = "Insert into wisdom_donation values(NULL,'$name','$designation','$phone','$email','$district','$club','$state','$city_town','$no_school','$total_lib_amt','$amount_paidby',$date_of)";
$result = mysql_query($sql);
if($result){
foreach($inst_name as $value){
 $sql1 = "Insert into school_report values(NULL,'1','','$value','$inst_name','$address')";	
 //echo $sql1;
 $_SESSION['email'] = $email;
 $_SESSION['total_amt'] = $total_lib_amt;
 header('location:wisdom_libraries_payment.php');
}
//
 }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Happy School |
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var slno=document.getElementById("slno").value;
 var school_id=document.getElementById("school_id").value;
 var inst_name=document.getElementById("inst_name").value;
 var address=document.getElementById("address").value;
 var type_school=document.getElementById("type_school").value;
 var no_of_stdent=document.getElementById("no_of_stdent").value;
 var langauge=document.getElementById("langauge").value;
 var contact_name=document.getElementById("contact_name").value;
 var contact_no=document.getElementById("contact_no").value;
	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='slno"+table_len+"'>"+slno+"</td><td id='school_id"+table_len+"'>"+school_id+"</td><td id='inst_name"+table_len+"'>"+inst_name+"</td><td id='address"+table_len+"'>"+address+"</td><td id='type_school"+table_len+"'>"+type_school+"</td><td id='no_of_stdent"+table_len+"'>"+no_of_stdent+"</td><td id='langauge"+table_len+"'>"+langauge+"</td><td id='contact_name"+table_len+"'>"+contact_name+"</td><td id='contact_no"+table_len+"'>"+contact_no+"</td><td><input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("slno").value="";
 document.getElementById("school_id").value="";
 document.getElementById("inst_name").value="";
 
 document.getElementById("address").value="";
 document.getElementById("type_school").value="";
 document.getElementById("no_of_stdent").value="";
 document.getElementById("langauge").value="";
 document.getElementById("contact_name").value="";
 document.getElementById("contact_no").value="";
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
			xmlhttp.open("GET","get_user_01.php?p="+str,true);
			xmlhttp.send();
		}
	}
	</script>
    <style>
        .box{
        padding: 20px;
        display: none;
        margin-top: 20px;
        border: 1px solid #000;
    }
	</style>
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
      
      <div class="as-minheader"> <span class="full-pattren"></span>
    <div class="as-minheader-wrap">
          <div class="container">
        <div class="row">
              <div class="col-md-8">
            <div class="as-page-title">
                  <h1>Wisdom Libraries Online Donation Form</h1>
                </div>
          </div>
              <div class="col-md-4">
            <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Wisdom Libraries Donation Form </a></li>
                </ul>
          </div>
            </div>
      </div>
        </div>
  </div>
      
      <!--// Main Content //-->
      <div class="as-main-content">
    <div class="as-main-section">
          <div class="container">
        <div class="row">
              <div class="col-md-12">
              <form action="wisdom_libraries.php" method="post" enctype="multipart/form-data">
            		<table width="100%" border="0">
                  <tr>
                <td colspan="8" align="center"><strong>General Information</strong></td>
              </tr>
                  <tr>
                <td width="26%"><strong>Name:</strong></td>
                <td colspan="7"><input type="text" name="name" value="" class="form-control" required/></td>
              </tr>
                  <tr>
                <td><strong>Designation:</strong></td>
                <td colspan="7"><input type="text" name="desig" value="" class="form-control" required/></td>
              </tr>
                  <tr>
                <td><strong>Mobile Number:</strong></td>
                <td colspan="7"><input type="text" name="phone" value="" class="form-control" required/></td>
              </tr>
                  <tr>
                <td><strong>Email Address:</strong></td>
                <td colspan="7"><input type="text" name="email" value="" class="form-control" required/></td>
              </tr>
                  <tr>
                <td><strong>RI/IW District:</strong></td>
                <td colspan="7"><select name="district" onchange="showUser(this.value)" required>
                    <option>RI/IW District</option>
                    <?php
                     $sql = "select DISTINCT `district_code` from all_district_club";
					 $res = mysql_query($sql);
                     while($row = mysql_fetch_array($res))
                     {
                      $data = $row['district_code'];
                      echo '<option value="'.$data.'">'.$data.'</option>';
                     } 
                     ?>
                  </select></td>
              </tr>
                  <tr>
                <td><strong>Name of the RI/IW Club:</strong></td>
                <td colspan="7"><select name="club" id="txtHint" required>
                    <option value="">Select Club</option>
                  </select></td>
              </tr>
                  <tr>
                <td><strong>State:</strong></td>
                <td colspan="7"><select name="state" required>
                    <option>State</option>
                    <?php
                      $sql= "select DISTINCT `state` from states"; 
					  $res = mysql_query($sql);
                      while($row=mysql_fetch_array($res))
                      {
                       $data=$row['state'];
                       echo '<option value="'.$data.'">'.$data.'</option>';
                      } 
                    ?>
                  </select></td>
              </tr>
               <tr>
                <td><strong>City/Town:</strong></td>
                <td colspan="7"><input type="text" name="city_town" value="" class="form-control" required/></td>
              </tr>
                </table>
              
              <!--------------------------------------------------------------------------------------------------------------------------------------------------------------->
              
             	    <table width="100%" border="0">
                                  <tr>
                                    <td colspan="8" align="center"><strong>Project Details</strong></td>
                                  </tr>
                                  <tr>
                                    <td width="46%"><strong>No of Schools where Wizdom Library will be provided :</strong><br />
                                    (No of School x Rs.2,625)</td>
                                    <td width="54%" colspan="7"><input type="text" name="no_school" value="" onKeyUp="grand1();" id="no_school" required/>
                                    &nbsp;&nbsp;&nbsp;
                                    Total Amount : <input type="text" name="total_lib_amt" value="" readonly id="grand_01"/></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Donation by Rotary Clubs/ Districts *:</strong> </td>
                                    <td colspan="7"><input type="text" name="amount_paidby" value="" class="form-control" id="amot_paid" required/></td>
                                  </tr>
                                  <tr>
                                    <td colspan="8"><strong>PROPOSED INSTITUTION/SCHOOL DETAIL:</strong> </td>
                                  </tr>
                                  <tr>
                                  	<td colspan="9">
                                    <div id="wrapper">
                                    <table width="100%" border="0" cellspacing="2" cellpadding="2" id="data_table">
                                      <tr>
                                        <td>SL. No.</td>
                                        <td>School ID</td>
                                        <td>Name of the Institute/ School</td>
                                        <td>Address</td>
                                        <td>Primary/Elementary Secondary</td>
                                        <td>No. of Students</td>
                                        <td>Language of Teaching</td>
                                        <td>School Contact Person</td>
                                        <td>Contact No.</td>
                                        <td>Action</td>
                                      </tr>
                                      <tr>
                                        <td><input type="text" name="slno[]" value="" class="form-control" id="slno" /></td>
                                        <td><input type="text" name="school_id[]" value="" class="form-control" id="school_id" /></td>
                                        <td><input type="text" name="inst_name[]" value="" class="form-control" id="inst_name" /></td>
                                        <td><input type="text" name="address[]" value="" class="form-control" id="address" /></td>
                                        <td><input type="text" name="type_school[]" value="" class="form-control" id="type_school" /></td>
                                        <td><input type="text" name="no_of_stdent[]" value="" class="form-control" id="no_of_stdent" /></td>
                                        <td><input type="text" name="langauge[]" value="" class="form-control" id="langauge" /></td>
                                        <td><input type="text" name="contact_name[]" value="" class="form-control" id="contact_name" /></td>
                                        <td><input type="text" name="contact_no[]" value="" class="form-control" id="contact_no" /></td>
                                        <td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
                                      </tr>
                                    </table>
                                    </div>
                                    </td>
                                  </tr>
                                </table>  
                                <table width="100%" border="0">
                                <tr>
                                 <td colspan="8" style="font-weight:bold;">* Please note that cost for transporting the books from the warehouse of Wizdoms Library to respective school would be in addition and shall be borne by the respective Rotary / Inner Wheel Club / District. </td>
                                </tr> 
                                <tr>
                                 <td colspan="8" align="center"><input type="submit" name="submit" value="Submit" class="as-submit"/></td>
                                </tr>             
                				</table>
                				</form>
                
                
                
                
          </div>
            </div>
      </div>
        </div>
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
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="cash"){
            $(".box").not(".cash").hide();
            $(".cash").show();
        }
        if($(this).attr("value")=="cheque"){
            $(".box").not(".cheque").hide();
            $(".cheque").show();
        }
        if($(this).attr("value")=="dd"){
            $(".box").not(".dd").hide();
            $(".dd").show();
        }
		if($(this).attr("value")=="neft"){
            $(".box").not(".neft").hide();
            $(".neft").show();
        }
		if($(this).attr("value")=="online"){
            $(".box").not(".online").hide();
            $(".online").show();
        }
    });
});
</script>
<!-- Search Modal --> 
<script language="javascript">
    function grand1() {
          var col1 = document.getElementById('no_school').value;
          var col2 = 2625;
          var result = parseInt(col1) * parseInt(col2 );
          if (!isNaN(result)) {
             document.getElementById('grand_01').value = result;
			 document.getElementById('amot_paid').value = result;
			 document.getElementById('grand_02').value = result;
			 
          }
        }
</script> 
<!--<script language="javascript">
    function grand2() {
          var col_1 = document.getElementById('ri_fund_1').value;
		  var col_2 = document.getElementById('int_fund_1').value;
		  var col_3 = document.getElementById('ri_gg_1').value;
		  var col_4 = document.getElementById('corp_fun_1').value;
		  var col_5 = document.getElementById('other_fun_1').value;
		  var col_6 = document.getElementById('ri_fund_2').value;
		  var col_7 = document.getElementById('int_fund_2').value;
		  var col_8 = document.getElementById('ri_gg_2').value;
		  var col_9 = document.getElementById('corp_fun_2').value;
		  var col_10 = document.getElementById('other_fun_2').value;
		  var col_11 = document.getElementById('grand_01').value;
          var result = parseInt(col_1) + parseInt(col_2) + parseInt(col_3) + parseInt(col_4) + parseInt(col_5) + parseInt(col_6) + parseInt(col_7) + parseInt(col_8) + parseInt(col_9) + parseInt(col_10) + parseInt(col_11);
          if (!isNaN(result)) {
             document.getElementById('grand_02').value = result;
          }
        }
</script> -->

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