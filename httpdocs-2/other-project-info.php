<?php include('include/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include('include/title.php'); ?></title>
  <!-- Css Files -->
  <?php include('include/favicon.php'); ?>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <link href="css/color.css" rel="stylesheet">
  <link href="css/dl-menu.css" rel="stylesheet">
  <link href="css/flexslider.css" rel="stylesheet"> 
  <link href="css/prettyphoto.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="menu_v.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.form-container{
  width: 100%;
  height: 730px;
  box-sizing: border-box;
  padding: 15px 0 15px 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  transition: all 0.4s;
}
.form-container:hover{
  border: 1px solid #edb542;
  box-shadow: 0 10px 15px #a5a5a5;
}
.form-row{
  width: 100%;
  height: auto;
  float: left;
  margin: 5px 0;
}
.form-label{
  width: 30%;
  height: 40px;
  float: left;
  margin: 5px 0;
  line-height: 40px;
}
.form-label h3{
  padding: 0;
  margin: 0;
  font-size: 100%;
  color: #545454;
  line-height: 40px;
}
.form-field{
  width: 60%;
  height: 40px;
  float: left;
  margin: 5px 0;
  line-height: 40px;
}
#details{
  width: 100%;
  height: 100px;
  float: left;
  resize: none;
}
#submitBtn, #resetBtn{
  background:#0099FF;
  color:#FFF;
  padding:2px 25px;
  border:0;
  cursor:pointer;
  margin: 0 5px;
  transition: all 0.3s;
}
#submitBtn:hover, #resetBtn:hover{
  background-color: #0078c9;
}
</style>

<script>
/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}
function myFunction(){
  var myWindow = window.open("district_option.php", "", "top=200, left=500, width=400, height=400");
}
function CloseAndRefresh(){
  opener.location.reload(true);
  self.close();
}
function getDistrict(){

	var createdBy = $('#createdBy').val();

	if (createdBy!=''){

		$.ajax({
			url: 'get-district.php',
			type: 'post',
			data: 'createdBy=' + createdBy,
			success: function(f){

				$('#district').html(f);
				document.getElementById('club').value = '';
			}
		})
	}else{
		document.getElementById('district').value = '';
		document.getElementById('club').value = '';
	}
}
function getClub(){

	var createdBy = $('#createdBy').val();
	var district = $('#district').val();

	if (createdBy!='' && district!=''){

		$.ajax({
			url: 'get-club.php',
			type: 'post',
			data: 'createdBy=' + createdBy + '&district=' + district,
			success: function(f){

				$('#club').html(f);
			}
		})
	}
}
function validateData(){

	var project_name = $('#project_name').val();
	var createdBy = $('#createdBy').val();
	var district = $('#district').val();
	var club = $('#club').val();
	var category = $('#category').val();
	var state = $('#state').val();
	var city = $('#city').val();
	var details = $('#details').val();
	var beneficiary = $('#beneficiary').val();

	if (project_name==''){

		alert('Please enter project name');
		return false;
	}else if (createdBy==''){

		alert('Please select who created the project');
		return false;
	}else if(district==''){

		alert('Please select district');
		return false;
	}else if(club==''){

		alert('Please select club');
		return false;
	}else if(category==''){

		alert('Please select category');
		return false;
	}else if(state==''){

		alert('Please select state');
		return false;
	}else if(city==''){

		alert('Please enter city / town / village');
		return false;
	}else if(details==''){

		alert('Please enter project details');
		return false;
	}else if(beneficiary==''){

		alert('Please enter at least one beneficiary');
		return false;
	}
}
</script>

</head>




<body style="padding-right:0px;">
  <div class="as-mainwrapper">
    <header id="as-header" >
      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-topstrip as-bgcolor"><?php include('include/top-head.php'); ?></div>
      </div>

      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-header-bar">
          <div class="row">
            <div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
              <div class="col-md-2"><a style="float:left;" href="index.php" class="logo1"><img src="images/logo2.png" alt=""></a></div>

              <div class="col-md-10">
                <div><?php include('include/navigation_mem.php'); ?></div>

                <?php include('include/responsive-menu.php'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="as-minheader">
      <div class="as-minheader-wrap">
        <div class="container" >
          <div class="row">
            <div class="col-md-9">
              <div class="as-page-title"><h1 style="word-spacing: 3px;">Add Previous Project Details</h1></div>
            </div>
            <div class="col-md-3">
              <ul class="as-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="enter-other-project-info.php">Previous Project Details</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="as-main-content" style="min-height: 760px;margin: 20px 0;">

  	<div class="row">
        <div class="col-md-12">
      		<div class="col-md-3"></div>

      		<div class="col-md-6">

  			<form action="" method="post" onsubmit="return validateData()">

            <div class="form-container" id="form_container">
              <div class="form-row">
                <div class="form-label"><h3>Project Name : </h3></div>
                <div class="form-field"><input type="text" name="project_name" id="project_name" value="" class="form-control" placeholder="Enter Project Name" /></div>
              </div>

              <div class="form-row">
                <div class="form-label"><h3>Created By : </h3></div>
                <div class="form-field">
					<select class="form-control" id="createdBy" name="createdBy" onchange="getDistrict()">
						<option value="">-- Please Select --</option>

                    	<option value="Rotary">Rotary</option>
                    	<option value="Inner Wheel">Inner Wheel</option>
                    	<option value="Rotaract">Rotaract</option>
					</select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-label"><h3>Select District : </h3></div>
                <div class="form-field">
                  <select class="form-control" id="district" name="district" onchange="getClub()">
                    <option value="">-- Please Select --</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-label"><h3>Select Club : </h3></div>
                <div class="form-field">
                  <select class="form-control" id="club" name="club">
                    <option value="">-- Please Select --</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-label"><h3>Project Category : </h3></div>
                <div class="form-field">
                  <select class="form-control" id="category" name="category">
                    <option value="">-- Please Select --</option>

                    <?php
                    $query_category = mysql_query("select * from category");
                    while ($category = mysql_fetch_array($query_category)){
                    ?>
                    <option value="<?= $category['id'] ?>"><?= $category['category'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-label"><h3>Select State : </h3></div>
                <div class="form-field">
                  <select class="form-control" id="state" name="state">
                    <option value="">-- Please Select --</option>

                    <?php
                    $query_state = mysql_query("select * from states");
                    while ($state = mysql_fetch_array($query_state)){
                    ?>
                    <option value="<?= $state['state'] ?>"><?= $state['state'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-label"><h3>City / Town / Village : </h3></div>
                <div class="form-field"><input type="text" name="city" id="city" value="" class="form-control" placeholder="Enter City / Town / Village" /></div>
              </div>

              <div class="form-row">
                <div class="form-label"><h3>Project Details : </h3></div>
                <div class="form-field">
                  <textarea class="form-control" id="details" name="details" placeholder="Enter Project Details"></textarea>
                </div>
              </div>

              <div class="form-row" style="margin: 65px 0 0 0;">
                <div class="form-label"><h3>Beneficiaries : </h3></div>
                <div class="form-field"><input type="text" name="beneficiary" id="beneficiary" value="" class="form-control" placeholder="Enter No. of Beneficiaries" onkeyup="numbersOnly(this)" /></div>
              </div>

              <div class="form-row" style="margin: 40px 0 0 0;">
                <div class="form-label"></div>
                <div class="form-field">
                  <input type="submit" name="submitBtn" id="submitBtn" value="Submit" />

                  <input type="button" name="resetBtn" id="resetBtn" value="Reset" />
                </div>
              </div>

            </div>

            </form>

          </div>
        </div>
  	</div>

  	<?php
  	if (isset($_REQUEST['submitBtn'])){

  		$getNo = mysql_fetch_array(mysql_query("select total_no from other_project_details where district='".$_REQUEST['district']."' and club_name='".$_REQUEST['club']."' and project_category='".$_REQUEST['category']."'"));

  		$updatedNo = $getNo['total_no'] - 1;

  		$insert = "insert into clubproject(categoryid, title, projdesc, state, city, district, club, beneficiaryno) values('".$_REQUEST['category']."', '".$_REQUEST['project_name']."', '".$_REQUEST['details']."', '".$_REQUEST['state']."', '".$_REQUEST['city']."', '".$_REQUEST['district']."', '".$_REQUEST['club']."', '".$_REQUEST['beneficiary']."')";

  		mysql_query($insert);

  		if ($updatedNo >= 0){

  			$updateOther = "update other_project_details set total_no='".$updatedNo."' where district='".$_REQUEST['district']."' and club_name='".$_REQUEST['club']."' and project_category='".$_REQUEST['category']."'";

  			mysql_query($updateOther);
  		}
  	?>
  	<script type="text/javascript">
  	alert('Details have been saved succesfully');
  	window.location = 'other-project-info.php';
  	</script>
  	<?php
  	}
  	?>

    </div>

    <div class="as-footer">
      <div class="container"><?php include('include/footer.php'); ?></div>

      <?php include('include/copy-right.php'); ?>
    </div>
      <!--// Footer //-->
    <div class="clearfix"></div>
    
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
    <script>
      // NewsTicker
      'use strict';
        var options = {
          newsList: "#as-news",
          startDelay: 10,
          placeHolder1: ""
        }
        jQuery().newsTicker(options);
    </script>
  </body>
</html>