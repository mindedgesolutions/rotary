<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script>
function perAttendance()
		{
			var text1 = document.getElementById("txtTotalNoOfDaysAtten").value;
			var text2 = document.getElementById("txtNoOfWorkinDays").value;
			if(text1 == "")
				text1=0;
			if(text2 == "")
				text2=0;
			var result = (parseInt(text1) / parseInt(text2))*100;
			if(!isNaN(result)){
				document.getElementById("txtPerctOfAttend").value = result.toFixed(2);;
			}
		}

function addLocalLanguage()
		{
			var text1 = document.getElementById("txtLLListeningSkill").value;
			var text2 = document.getElementById("txtLLSpeakingSkill").value;
			var text3 = document.getElementById("txtLLReadingSkill").value;
			var text4 = document.getElementById("txtLLWritingSkill").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			if(text4 == "" )
				text4=0;
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3) + parseInt(text4);
			if(!isNaN(result)){
				document.getElementById("txtLLAggregate").value = result;
				if(result < 120)
					var grade="D";
				if(result > 120 && result < 160)
					var grade="C";
				if(result > 160 && result < 240)
					var grade="B";
				if(result > 240 )
					var grade="A";
				document.getElementById("txtLLGrade").value = grade;
			}
			
		}	

function addEnglish()
		{
			var text1 = document.getElementById("txtEngListeningSkill").value;
			var text2 = document.getElementById("txtEngSpeakingSkill").value;
			var text3 = document.getElementById("txtEngReadingSkill").value;
			var text4 = document.getElementById("txtEngWritingSkill").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			if(text4 == "" )
				text4=0;
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3) + parseInt(text4);
			if(!isNaN(result)){
				document.getElementById("txtEngAggregate").value = result;
				if(result < 120)
					var grade="D";
				if(result > 120 && result < 160)
					var grade="C";
				if(result > 160 && result < 240)
					var grade="B";
				if(result > 240 )
					var grade="A";
				document.getElementById("txtEngGrade").value = grade;
			}
		}			

function addMath()
		{
			var text1 = document.getElementById("txtMathProgressInArth").value;
			var text2 = document.getElementById("txtMathAnalyticalSkill").value;
			var text3 = document.getElementById("txtMathGeoShap").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3);
			if(!isNaN(result)){
				document.getElementById("txtMathAggregate").value = result;
				if(result < 90)
					var grade="D";
				if(result > 90 && result < 120)
					var grade="C";
				if(result > 120 && result < 180)
					var grade="B";
				if(result > 180 )
					var grade="A";
				document.getElementById("txtMathGrade").value = grade;
			}
		}

function addEnvironmentalStudies()
		{
			var text1 = document.getElementById("txtEnvStuSocKnow").value;
			var text2 = document.getElementById("txtEnvStuNatuEnvKnow").value;
			var text3 = document.getElementById("txtEnvStuCivicSense").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3);
			if(!isNaN(result)){
				document.getElementById("txtEnvStuAggregate").value = result;
				if(result < 90)
					var grade="D";
				if(result > 90 && result < 120)
					var grade="C";
				if(result > 120 && result < 180)
					var grade="B";
				if(result > 180 )
					var grade="A";
				document.getElementById("txtEnvStuGrade").value = grade;
			}
		}

function addHolisticDevelopment()
		{
			var text1 = document.getElementById("txtHoliDevGenKnow").value;
			var text2 = document.getElementById("txtHoliDevPartInActive").value;
			var text3 = document.getElementById("txtHoliDevSociability").value;
			var text4 = document.getElementById("txtHoliDevLeaderQuality").value;
			var text5 = document.getElementById("txtHoliDevHealthHyg").value;
			if(text1 == "")
				text1=0;
			if(text2 == "" )
				text2=0;
			if(text3 == "" )
				text3=0;
			if(text4 == "" )
				text4=0;
			if(text5 == "" )
				text5=0;
			var result = parseInt(text1) + parseInt(text2) + parseInt(text3) + parseInt(text4) + parseInt(text5);
			if(!isNaN(result)){
				document.getElementById("txtHoliDevAggregate").value = result;
				if(result < 150)
					var grade="D";
				if(result > 150 && result < 200)
					var grade="C";
				if(result > 200 && result < 250)
					var grade="B";
				if(result > 250 )
					var grade="A";
				document.getElementById("txtHoliDevGrade").value = grade;
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
function IsNumeric11(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error11").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric12(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error12").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric13(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error13").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric14(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error14").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric15(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error15").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric16(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error16").style.display = ret ? "none" : "inline";
			return ret;
		}	

function IsNumeric17(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error17").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric18(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error18").style.display = ret ? "none" : "inline";
			return ret;
		}
function IsNumeric19(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error19").style.display = ret ? "none" : "inline";
			return ret;
		}		

function IsNumeric20(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error20").style.display = ret ? "none" : "inline";
			return ret;
		}			
function IsNumeric21(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
			document.getElementById("error21").style.display = ret ? "none" : "inline";
			return ret;
		}					
</script>
<script type="text/javascript">
function get_children() { // Call to ajax function
    var monthname = $('#monthname').val();
    var dataString = "monthname="+monthname;
    $.ajax({
        type: "POST",
        url: "getChildrenList.php", // Name of the php files
        data: dataString,
        success: function(html)
        {
            $("#get_children_name").html(html);
        }
    });
}

function evsHide(value)
{
    //alert(value);
	if(value=="Class1" || value=="Class2" || value=="Class3")
	{
		document.getElementById("evsMaster").style.display = "none";
		document.getElementById("evsChild").style.display = "none";
	}
	else{
		document.getElementById("evsMaster").style.display = null;
		document.getElementById("evsChild").style.display = null;
	}
}
function isValidDate(txtdate) {
    var txtDate = "#" + txtdate;
    var dateString = $(txtDate).val();
    var date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
    if (!(date_regex.test(dateString))) {
    alert("Date Must Be in mm/dd/yyyy format");
}}
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
      <div class="user">
        <figure> <a href="dashboard.php#"><img src="assets/images/avatar1.jpg" alt="Adminise" /></a> </figure>
        <div class="welcome">
          <p>Welcome</p>
          <h5><a href="dashboard.php#">RILM Member</a></h5>
        </div>
      </div>
      <!-- User Section End --> 
      <!-- Search Section Start -->
     <!-- <div class="search-box">
        <input type="text" placeholder="Search Anything" />
        <input type="submit" value="go" />
      </div> -->
      <!-- Search Section End --> 
      <!-- Header Top Navigation Start -->
		<div align="Centre" style="margin-left:400px;">
			<h1 style="color:#ffffff;">ASHA KIRAN CHILDREN MARKS ENTRY SCREEN</h1>
		</div>
      <!-- Header Top Navigation End -->
      <div class="clearfix"></div>
    </header>
    <!-- Right Section Header End --> 
    <!-- Content Section Start -->
    
		  <div class="container" style="position: relative; left: 150px;">
			<form class="form-horizontal" name="frm" id="frm" action="AshaKiranChildrenMarksform2.php" method="post" enctype="multipart/form-data" >
				<div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:30px; padding : 5px;">Master Information</div>
				  <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
	
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Month:</label>
					  <select class="form-control" id="selMonth" name="selMonth" >
						<option value="" selected="selected">Select Month</option>
                                    <option value="January" <?php if($monname=='January'){ echo "selected";} ?> >January</option>
                                    <option value="February" <?php if($monname=='February'){ echo "selected";} ?> >February</option>
                                    <option value="March" <?php if($monname=='March'){ echo "selected";} ?> >March</option>
                                    <option value="April" <?php if($monname=='April'){ echo "selected";} ?> >April</option>
                                    <option value="May" <?php if($monname=='May'){ echo "selected";} ?> >May</option>
                                    <option value="June" <?php if($monname=='June'){ echo "selected";} ?> >June</option>
                                    <option value="July" <?php if($monname=='July'){ echo "selected";} ?> >July</option>
                                    <option value="August" <?php if($monname=='August'){ echo "selected";} ?> >August</option>
                                    <option value="September" <?php if($monname=='September'){ echo "selected";} ?> >September</option>
                                    <option value="October" <?php if($monname=='October'){ echo "selected";} ?> >October</option>
                                    <option value="November" <?php if($monname=='November'){ echo "selected";} ?> >November</option>
                                    <option value="December" <?php if($monname=='December'){ echo "selected";} ?> >December</option>
						</select>
					  </div>
				  </div>
				  <div class="form-group">
					  <label class="control-label col-sm-3" ></label>
					  <div class="col-sm-8"> 
					  <label for="exampleInputFile">Year:</label>
					  <select class="form-control" id="selYear" name="selYear" >
						<option value="">Select Year</option>
                                    <option value="2016" <?php if($year=='2016'){ echo "selected";} ?> >2016</option>
                                    <option value="2017" <?php if($year=='2017'){ echo "selected";} ?> >2017</option>
                                    <option value="2018" <?php if($year=='2018'){ echo "selected";} ?> >2018</option>
                                    <option value="2019" <?php if($year=='2019'){ echo "selected";} ?> >2019</option>
                                    <option value="2020" <?php if($year=='2020'){ echo "selected";} ?> >2020</option>
                                    <option value="2021" <?php if($year=='2021'){ echo "selected";} ?> >2021</option>
                                    <option value="2022" <?php if($year=='2022'){ echo "selected";} ?> >2022</option>
                                    <option value="2023" <?php if($year=='2023'){ echo "selected";} ?> >2023</option>
                                    <option value="2024" <?php if($year=='2024'){ echo "selected";} ?> >2024</option>
                                    <option value="2025" <?php if($year=='2025'){ echo "selected";} ?> >2025</option>
						</select>
					  </div>
				  </div>
				  
				 <div class="form-group">
					 <div class="col-sm-11s" align="center">
<!--						<input class="btn btn-default" style="background-color: #134B96;" type="submit" value="Search" />  -->
						
						<input class="btn" style="color: #ffffff; background-color: #003c6a;" type="submit" value="Search" />
					</div>
				  </div>

				 	<br/>
    <!-- Wrapper End --> 
	<header> 
	


  <!-- Logo Start -->
  
	  
	  <!-- Logo End --> 
	  <!-- Sidebar Navigation Start -->
	
	  <!-- Header Top Navigation Start -->
		
      <!-- Header Top Navigation End -->
	  <div class="clearfix">
		<div align="right">
			<h3 style="color:#ffffff;">Design & Development By</h3><br/>
			<h5 style="color:#ffffff;">MindedgeSolutions</h5>
		</div>
	  </div>
  <!-- Sidebar Navigation End --> 
	
	</header>
  </div>

</body>
</html>
