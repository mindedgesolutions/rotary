<?php 
session_start();
include("connection.php");
if(!isset($_SESSION["userid"]))
{
	header("Location: TElogout.php");
}


$userid= $_SESSION["userid"];

	
	function  findexts($filename) {
		$ext1 = split("[/\\.]", $filename) ;
		$n = count($ext1)-1; 
		$exts = $ext1[$n]; 
		return strtoupper($exts);
	}
	
	 function FileNewname($filename,$imgname)
	{
		$dt=date("Y-m-d-h-i-s");
		$newname=$dt.".".strtolower(findexts($filename));
		return $imgname."_".$newname;
	}






if(isset($_POST["btnSave"])) {

$schoolid = $_POST["schoolname"];
$teacherNo = $_POST["teacherNo"];
$teachername = $_POST["txtteachername"];
$gender = $_POST["chogender"];
$noofstudent = $_POST["nosofstudent"];
$totalmarksbystudent= $_POST["studenttotalmarks"];
$totalmarksbyprinciple= $_POST["principletotalmarks"];

$getaward= $_POST["optisgetaward"];
$aboutteacher= $_POST["aboutteacher"];
$teacherimage=  $_FILES["teacherimg"]["name"];


$totalmarks= $_POST["totalmarks"];
$rank= $_POST["txtrank"];

$newimg ="";
//die($query);

if($teacherimage!='')  { 
	$newimg = FileNewname($teacherimage,'teacherimage');	 
	if($_FILES["teacherimg"]["error"]==0 ) {
		 move_uploaded_file($_FILES["teacherimg"]["tmp_name"], "upload/" . $newimg);
		 }
	 }



if($_POST["hdnTEid"]==0) {
$insertqry = "INSERT INTO teacherevaluationmarks (schoolid,teacherNo,teachername,gender,noofstudent,totalmarksbystudent,totalmarksbyprinciple,totalmarks,rank,getaward,aboutteacher,teacherimage, userid,submitdt) VALUES (".$schoolid.",'".$teacherNo."','".$teachername."','".$gender."',".$noofstudent.", ".$totalmarksbystudent.",  ".$totalmarksbyprinciple.",".$totalmarks.", ".$rank.",'".$getaward."','".$aboutteacher."','".$newimg."',".$userid.",'".date('d-m-Y')."');";
}
else
{
$id = $_POST["hdnTEid"];
$insertqry = "UPDATE teacherevaluationmarks SET schoolid=".$schoolid.",teachername='".$teachername."',gender='".$gender."',noofstudent=".$noofstudent.", totalmarksbystudent=".$totalmarksbystudent.",totalmarksbyprinciple=".$totalmarksbyprinciple.",totalmarks=".$totalmarks.", rank=".$rank.",getaward='".$getaward."',aboutteacher='".$aboutteacher."',teacherimage = if('".$newimg."'=' ',teacherimage,'".$newimg."')  WHERE id=".$id.";";

}

//die($insertqry);


	if(mysqli_query($link,$insertqry)) {
		$msg = "Successfully saved.";
		} 
		else
		{
		$msg = "Try again.";
		}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - Teacher Evaluation</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<script type="text/javascript">


function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

function inputNumber(e,val,allowdecimal)
{
    var key=(window.event) ? event.keyCode : e.charCode || 0;
	
	if(allowdecimal==true)
	{
		if(key==0 || key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57))
	    {	
		    if(key==46)
		    {
			    if(val.indexOf(".")!=-1)
			    {
				    if(window.event)
				    {
					    event.returnValue=false
				    }
				    else
				    {
					    e.preventDefault()
				    }
			    }
		    }
	    }      
	    else
	    {
		    if(window.event)
		    {
			    event.returnValue=false
		    }
		    else
		    {
			    e.preventDefault()
		    }
	    }
	}
	else
	{
		if(key==0 || key == 8 || key == 9 || (key >= 48 && key <= 57))
		{	
			
		}      
		else
		{
			if(window.event)
			{
				event.returnValue=false
			}
			else
			{
				e.preventDefault()
			}
		}
	}
}

 $(document).ready(function(){
 
        //iterate through each textboxes and add keyup
        //handler to trigger sum event
        $(".marks").each(function() {
 
            $(this).keyup(function(){
                calculateSum();
            });
        });
 
    });
 
    function calculateSum() {
 
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".marks").each(function() {
 
            //add only if the value is number
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        $("#totalmarks").val(sum.toFixed(2));
    }

function setTEid(val) {
				$("#hdnTEid").val(0);
				$("#txtteachername").val('');
				$("#chogender").val('');
				$("#nosofstudent").val('');
				$("#studenttotalmarks").val('');
				$("#principletotalmarks").val('');
				$("#totalmarks").val('');
				$("#txtrank").val('');
				$("#getawardno").attr('checked')
				checkvalue('No')

				$("#aboutteacher").val('');

	var pars ='schoolid='+$("#schoolname").val()+'&teacherNo='+val+'&userid='+$("#hdnuserid").val();
//alert(pars)
$.ajax({                                      
      url: 'getTEid.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				$("#hdnTEid").val(data[0]["id"]);
				$("#txtteachername").val(data[0]["teachername"]);
				$("#chogender").val(data[0]["gender"]);
				$("#nosofstudent").val(data[0]["noofstudent"]);
				$("#studenttotalmarks").val(data[0]["totalmarksbystudent"]);
				$("#principletotalmarks").val(data[0]["totalmarksbyprinciple"]);
				$("#totalmarks").val(data[0]["totalmarks"]);
				$("#txtrank").val(data[0]["rank"]);
				if(data[0]["getaward"]=='Yes')
				$("#getawardyes").attr('checked','checked');
				else
				$("#getawardno").attr('checked','checked');

				checkvalue(data[0]["getaward"])
				$("#aboutteacher").val(data[0]["aboutteacher"]);
			}
			 
		}
	});
}	
	
function validation(){
	if($("#schoolname").val()=="") 
	{
		alert("Please choose school.");
		$("#schoolname").focus();
		return false;
	}
	
	if($("#teacherNo").val()=="") 
	{
		alert("Please choose teacher.");
		$("#teacherNo").focus();
		return false;
	}
	
	if($.trim($("#txtteachername").val())=="") 
	{
		alert("Enter Teacher Name.");
		$("#txtteachername").focus();
		return false;
	}
	if($("#chogender").val()=="") 
	{
		alert("Enter Gender of Teacher.");
		$("#chogender").focus();
		return false;
	}
	if($("#nosofstudent").val()=="") 
	{
		alert("Enter No. of student.");
		$("#nosofstudent").focus();
		return false;
	}
	
	
	if($("#studenttotalmarks").val()=="") 
	{
		alert("Enter Total marks enter by student.");
		$("#studenttotalmarks").focus();
		return false;
	}
	if($("#principletotalmarks").val()=="") 
	{
		alert("Enter Total marks enter by principle.");
		$("#principletotalmarks").focus();
		return false;
	}

	if($("#txtrank").val()=="") 
	{
		alert("Enter Rank.");
		$("#txtrank").focus();
		return false;
	}
	
return true;
}

function checkvalue(val){
	if(val=='Yes')
	{
	$("#teacherinfo").show();
	}
	else
	{
	$("#aboutteacher").val('');
	$("#teacherinfo").show();
	}
}
</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
.auto-style1 {
	text-align: center;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!-- 

function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=350,left = 363,top = 144');");
}

// -->
</script>


</head>

<body >
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!-- --------------------- LOGO AREA START ------------------- -->
        <?php include("logo_area.html") ?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("menu_area.html") ?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <?php include("header_area.html") ?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="images/h_top_l.png" /></td>
                <td style="background:url(images/h_top.png)"></td>
                <td width="8"><img src="images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="100%" valign="top" >
                                <h1 align="left"> Evaluation Form for &quot;Nation Builder&quot; Award (Outstanding Teacher Award)</h1>
                                <h3 align="right"><a href="TElogout.php">Logout</a></h3>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;" class="auto-style1">
									</div>
									<div class="auto-style1">
									<strong><br>Kindly fill the details in serial 
									order. i-e- enter details for Teacher1, then 
									Teacher2 and so on.</strong>
						          </div>
						          <div style="margin:15px 0 10px 0; line-height:18px; color:#CC0000; text-align:justify">
									<?php echo $msg; ?>
							  </div>

<div id="evaluationform" style="padding:0 7px; margin:10px 0 0 0; "> 
<form name="frm" action="teacherEvaluationForm.php" method="post" onsubmit="return validation();" enctype="multipart/form-data">

<table border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" width="100%" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; border-collapse:collapse; font-size:12px" align="center">
<input type="hidden" id="hdnTEid" name="hdnTEid" value="0" />
<input type="hidden" id="hdnuserid" name="hdnuserid" value="<?php echo $userid;?>"/>

<?php $qry = "SELECT id,schoolname from schoolInfo where userid=".$userid.";";
	$res = mysqli_query($link,$qry);
	while($row=mysqli_fetch_assoc($res)) {
		$arrres[] = $row;
	}
	
?>
<tr style="background:#f5f5f5">
<td width="52%">Select School<span style="color:#FF0000">*</span></td>
<td width="3%">:</td>
<td width="45%"><Select id="schoolname" name="schoolname" >
		<option value="">Select</option>
			<?php foreach($arrres as $val) {?>
		<option value="<?php echo  $val["id"];?>"><?php echo  $val["schoolname"];?></option>
			<?php } ?>
</Select></td>
</tr>

<tr>
<td>Select Teacher<span style="color:#FF0000">*</span></td>
<td>:</td>
<td><Select id="teacherNo" name="teacherNo" onchange="setTEid(this.value);" style="width:50%">
		<option value="">Select</option>
		<option value="Teacher1">Teacher 1</option>
		<option value="Teacher2">Teacher 2</option>
		<option value="Teacher3">Teacher 3</option>
		<option value="Teacher4">Teacher 4</option>
		<option value="Teacher5">Teacher 5</option>
		<option value="Teacher6">Teacher 6</option>
		<option value="Teacher7">Teacher 7</option>
		<option value="Teacher8">Teacher 8</option>
		<option value="Teacher9">Teacher 9</option>
		<option value="Teacher10">Teacher 10</option>
		<option value="Teacher11">Teacher 11</option>
		<option value="Teacher12">Teacher 12</option>
		<option value="Teacher13">Teacher 13</option>
		<option value="Teacher14">Teacher 14</option>
		<option value="Teacher15">Teacher 15</option>
</Select></td>
</tr>
<tr style="background:#f5f5f5">
<td>Teacher Name<span style="color:#FF0000">*</span></td>
<td>:</td>
<td><input type="text" id="txtteachername" name="txtteachername" style="width:99%" /></td>
</tr>
<tr>
<td>Gender<span style="color:#FF0000">*</span></td>
<td>:</td>
<td><select id="chogender" name="chogender" ><option value="">Select</option><option value="Male">Male</option><option value="Female">Female</option></select></td>
</tr>

<tr style="background:#D3E7F5; color:#000000">
  <td colspan="3"><strong>Part A - To be filled by student of the School<br /></strong></td>
  </tr>

<tr style="background:#f5f5f5">
<td>No of students interviewed<span style="color:#FF0000">*</span> </td>
<td>:</td>
<td><input type="text" id="nosofstudent" name="nosofstudent" maxlength="5" onKeyPress="inputNumber(event,this.value,false);"  class="marks" style="width:99%" /></td>
</tr>

<tr style="background:#f5f5f5">
<td> Total<span style="color:#FF0000"> [A] *</span> <strong>[ <em>
  Please give the sum total of Marks given by all students across all attributes 
  for a Teacher</em> ]</strong></td>
<td>:</td>
<td><input type="text" id="studenttotalmarks" name="studenttotalmarks" maxlength="4" onKeyPress="inputNumber(event,this.value,false);"  class="marks" style="width:99%" /></td>
</tr>

<tr style="background:#D3E7F5; color:#000000">
  <td colspan="3"><strong>Part B - To be filled by Principal of the School<br />[ <em>Please give </em>
  the sum total of Marks given by the Principal across all attributes multiplied 
  by 5 for a teacher]</strong></td>
  </tr>
<tr style="background:#f5f5f5">
<td>Total<span style="color:#FF0000"> [C] = [B x 5] *</span></td>
<td>:</td>
<td><input type="text" id="principletotalmarks" name="principletotalmarks" maxlength="4" onKeyPress="inputNumber(event,this.value,false);"  class="marks" style="width:99%" /></td>
</tr>

<tr>
<td><strong>Grand Total [A + C]</strong></td>
<td>:</td>
<td><input type="text" id="totalmarks" name="totalmarks"  readonly="readonly" style="width:99%"/></td>
</tr>
<tr>
<td><strong>Rank</strong><span style="color:#FF0000">*</span></td>
<td>:</td>
<td><input type="text" id="txtrank" name="txtrank" maxlength="2"  onKeyPress="inputNumber(event,this.value,false);"   style="width:99%"/></td>
</tr>
<tr style="background:#f5f5f5">
<td>Whether this teacher has been awarded</td>
<td>:</td>
<td><input type="radio" id="getawardyes" name="optisgetaward" value="Yes" onclick="checkvalue(this.value)"/>Yes &nbsp;<input type="radio" id="getawardno" checked="checked"  name="optisgetaward" value="No"  onclick="checkvalue(this.value)"/> No</td>
</tr>
<tr id="teacherinfo" style="background:#f5f5f5; display:none">
<td colspan="3">
<table width="100%">
<tr>
<td>Write about the teacher (Maximum in 1000 characters)</td>
<td>:</td>
<td>
<textarea id="aboutteacher" name="aboutteacher" style="width: 279px; height: 102px"></textarea></td>
</tr>
<tr>
<td>Upload Photo of the Teacher</td>
<td>:</td>
<td><input type="file" id="teacherimg" name="teacherimg" /></td>
</tr>

</table>
</td>
</tr>

<tr style="background:#f5f5f5">
	<td colspan="3" align="center">
    	<input type="submit" name="btnSave" id="btnSave" value="SUBMIT" title="Submit detail to Register" style="background:#0099FF; text-shadow:0 1px 1px #000000; padding:10px 50px; color:#ffffff; font-weight:bold; cursor:pointer; border-radius:5px; border:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; letter-spacing:1px"/>    </td>
</tr>
</table>
</form>

</div>


</p>
								

                            </td>
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<?php include("footer_area.html") ?>
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="images/h_bottom_l.png" /></td>
                <td style="background:url(images/h_bottom.png)"></td>
                <td width="8"><img src="images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>

<script type="text/javascript">

function allowsubmit(obj) {
document.getElementById("btnSave").disabled=!obj.checked

}


	Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});
</script>


</body>
</html>






