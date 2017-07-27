<?php
include('../include/config.php');
$genInfo = mysql_fetch_array(mysql_query("select * from project_master where project_no='".base64_decode($_REQUEST['prno'])."'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php include('../../../include/title.php'); ?></title>
<!-- Css Files -->
<?php include('../../../include/favicon.php'); ?>

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../../../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/owl.carousel.css" rel="stylesheet">
<link href="../css/color.css" rel="stylesheet">
<link href="../css/dl-menu.css" rel="stylesheet">
<link href="../css/flexslider.css" rel="stylesheet"> 
<link href="../css/prettyphoto.css" rel="stylesheet">
<link href="../css/responsive.css" rel="stylesheet">
<link href="../css/menu_v.css" rel="stylesheet" type="text/css" />

<script src="../js/jquery.min.js"></script>
<script src="../js/modernizr.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dlmenu.js"></script>
<script src="../js/flexslider-min.js"></script>
<script src="../js/goalProgress.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.prettyphoto.js"></script>
<script src="../js/waypoints-min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/newsticker.js"></script>
<script src="../js/parallex.js"></script>
<script src="../js/styleswitch.js"></script>
<script src="../js/functions.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/dot-luv/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<style type="text/css">
.form-div{
  width: 100%;
  height: auto;
  float: left;
  margin: 25px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  color: #4a4a4a;
  font-size: 90%;
  padding: 15px 15px 0 15px;
}
.header-text{
  width: 100%;
  height: 60px;
  float: left;
}
.header-text h3{
  font-weight: 600;
  color: #757575;
  word-spacing: 5px;
  position: relative;
  text-align: center;
}
.header-text h3:after{
  content: '';
  height: 2px;
  width: 10%;
  position: absolute;
  background: #edb542;
  top: 30px;
  left: 45%;
}
</style>

<script>
$(function() {
    $("#distDate").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2150",
        maxDate: '0',
        dateFormat: 'dd-mm-yy'
    });
});
/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}
function showTable(){
  var distDate = $('#distDate').val();
  var schoolNo = $('#schoolNo').val();
  var prno = $('#prno').val();
  var folderno = $('#folderno').val();

  if (distDate=='' || schoolNo==''){

    alert('Please provide all information');
  }else{

    $.ajax({

      url: 'show_table.php',
      type: 'post',
      data: 'schoolNo=' + schoolNo + '&prno=' + prno + '&folderno=' + folderno + '&distDate=' + distDate,
      success: function(f){

        $('#show_table').html(f);
      }
    })
  }
}
</script>   

<!-- My Script Start -->
<script>
$(document).ready(function () {
$('#chkRenovation').change(function () {
    if (!this.checked) 
    $('#projectCost1').fadeOut('slow');
    else 
    $('#projectCost1').fadeIn('slow');
        
});
$('#chkSepToiletsBoysGirls').change(function () {
    if (!this.checked) 
    $('#SepToiletsBoysGirls').fadeOut('slow');
    else 
    $('#SepToiletsBoysGirls').fadeIn('slow');
        
});
$('#chkHandWashStation').change(function () {
    if (!this.checked) 
    $('#HandWashStation').fadeOut('slow');
    else 
    $('#HandWashStation').fadeIn('slow');
        
});
$('#chkDrinkingWater').change(function () {
    if (!this.checked) 
    $('#DrinkingWater').fadeOut('slow');
    else 
    $('#DrinkingWater').fadeIn('slow');
        
});
$('#chkLibrary').change(function () {
    if (!this.checked) 
    $('#Library').fadeOut('slow');
    else 
    $('#Library').fadeIn('slow');
});
$('#chkPlayMaterial').change(function () {
    if (!this.checked) 
    $('#PlayMaterial').fadeOut('slow');
    else 
    $('#PlayMaterial').fadeIn('slow');
});
$('#chkBenchesDesks').change(function () {
    if (!this.checked) 
    $('#BenchesDesks').fadeOut('slow');
    else 
    $('#BenchesDesks').fadeIn('slow');
});
$('#chkSpaceForTeachingStaff').change(function () {
    if (!this.checked) 
    $('#SpaceForTeachingStaff').fadeOut('slow');
    else 
    $('#SpaceForTeachingStaff').fadeIn('slow');
});
$('#chkShoesBags').change(function () {
    if (!this.checked) 
    $('#ShoesBags').fadeOut('slow');
    else 
    $('#ShoesBags').fadeIn('slow');
});
$('#chkAnyOther').change(function () {
    if (!this.checked) 
    $('#AnyOther').fadeOut('slow');
    else 
    $('#AnyOther').fadeIn('slow');
});
$('#chkFundingDetails').change(function () {
    if (!this.checked) 
    $('#FundingDetails').fadeOut('slow');
    else 
    $('#FundingDetails').fadeIn('slow');
});
});
</script>

<script>
    $(document).ready(function() {

        var iCnt = 0;
        // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.
        var container = $(document.createElement('div')).css({
            padding: '5px', margin: '10px', width: '95%', border: '1px dashed',
            borderTopColor: '#999', borderBottomColor: '#999',
            borderLeftColor: '#999', borderRightColor: '#999'
        });

        $('#btAdd').click(function() {
            if (iCnt <= 19) {

                iCnt = iCnt + 1;
        document.getElementById('text4').value=iCnt;
                // ADD TEXTBOX.
            /*    $(container).append('<input type=text class="input" id=tb' + iCnt + ' ' +
                  'value="Text Element1 ' + iCnt + '" />' + ' ' +
                  '<input type=text class="input" id=tb2' + iCnt + ' ' +
                  'value="Text Element2 ' + iCnt + '" />');
      */
        $(container).append('<select id=choFund' + iCnt + ' ' + 'style="width:35%; border:1px solid #CCCCCC; line-height:35px; height:35px">' +
                  '<option value="">Select Source Name</option>' +
                                    '<option value="Rotary">Rotary</option>' +
                                    '<option value="IW">IW</option>' +
                                    '<option value="District Fund">District Fund</option>' +
                                    '<option value="International Funding Collaboration(INR)">International Funding Collaboration(INR)</option>' +
                                    '<option value="Rotary Global Grant Support(INR)">Rotary Global Grant Support(INR)</option>' +
                                    '<option value="External Support through RILM">External Support through RILM</option>' +
                                    '<option value="Corporate Support">Corporate Support</option>' +
                                    '<option value="Any other agency/individual funding(INR)">Any other agency/individual funding(INR)</option>' +
                                    '</select> &nbsp;&nbsp;&nbsp;' +
                  '<input type=text placeholder="Organization Name" class="input" style="width:40%; border:1px solid #CCCCCC; line-height:35px; height:35px" id=tbName' + iCnt + ' ' +
                  '/>&nbsp;&nbsp;&nbsp;' + ' ' +
                  '<input type=text placeholder="Amount" class="input" style="width:20%; border:1px solid #CCCCCC; line-height:35px; height:35px" id=tbAmount' + iCnt + ' ' +
                  '/>');
                  
                // SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
  /*      
               if (iCnt == 1) {
          
                    var divSubmit = $(document.createElement('div'));
                    $(divSubmit).append('<input type=button class="btn btn-default"' + 
                        'onclick="GetTextValue()"' + 
                            'id=btSubmit value=Save />' +
              '<input type=button class="btn btn-default"' + 
                        'onclick="enable()"' + 
                            'id=btCancel value=Cancel />');
          
                }
*/
                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                //$('#child').after(container, divSubmit);
        $('#child').after(container);
            }
            // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
            // (20 IS THE LIMIT WE HAVE SET)
            else {      
                $(container).append('<label>Reached the limit</label>'); 
                $('#btAdd').attr('class', 'bt-disable'); 
                $('#btAdd').attr('disabled', 'disabled');
            }
        });

        // REMOVE ONE ELEMENT PER CLICK.
        $('#btRemove').click(function() {
            if (iCnt != 0) { $('#choFund' + iCnt).remove(); 
               $('#tbName' + iCnt).remove(); 
               $('#tbAmount' + iCnt).remove(); 
               iCnt = iCnt - 1; 
              }
        
            if (iCnt == 0) { 
                $(container)
                    .empty() 
                    .remove(); 

                $('#btSubmit').remove(); 
        $('#btCancel').remove(); 
                $('#btAdd')
                    .removeAttr('disabled') 
                    .attr('class', 'btn btn-default');
            }
      document.getElementById('text4').value=iCnt;
        });

        // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
        $('#btRemoveAll').click(function() {
            $(container)
                .empty()
                .remove(); 

            $('#btSubmit').remove(); 
      $('#btCancel').remove();
            iCnt = 0; 
            
            $('#btAdd')
                .removeAttr('disabled') 
                .attr('class', 'btn btn-default');
    document.getElementById('text4').value=iCnt;
        });
    });

    // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
    var divValue, values = '';

  function enable()
  {
      document.getElementById('btAdd').disabled = false;
      document.getElementById('btRemove').disabled = false;
      document.getElementById('btRemoveAll').disabled = false;
  }
    function GetTextValue() {
      
/*        $(divValue) 
            .empty() 
            .remove(); 
        
        values = '';

        $('.input').each(function() {
            divValue = $(document.createElement('div')).css({
                padding:'5px', width:'200px'
            });
            values += this.value + '<br />'
        });

        $(divValue).append('<p><b>Your selected values</b></p>' + values);
        $('body').append(divValue);

      if (iCnt <= 19) {
                iCnt = iCnt + 1;
        for($i=1;$i<=20;$i++)
        {
          sourceName=sourceName + '#' + document.getElementById('choFund' + $i).value;
        }
*/
      var tot=document.getElementById('text4').value;
    //  var sourceName=null;
      var orgName=null;
    //  var amt=null;
        for(var i=1; i<=tot; i++)
        {
          //sourceName=sourceName + '#' + document.getElementById('choFund' + i).value;
          //orgName=orgName + '#' + document.getElementById('tbName' + i).value;
          //amt=amt + '#' + document.getElementById('tbAmount' + i).value;
          orgName=orgName + i + '#' + document.getElementById('choFund' + i).value + '#' + document.getElementById('tbName' + i).value + '#' + document.getElementById('tbAmount' + i).value + '|';
        }
        //document.getElementById('text1').value = sourceName;
//        document.getElementById('text1').value = sourceName;
        orgName1=orgName.slice(0,-1);
        
        document.getElementById('text2').value = orgName1;
  //      document.getElementById('text3').value = amt;
        document.getElementById('btAdd').disabled = true;
        document.getElementById('btRemove').disabled = true;
        document.getElementById('btRemoveAll').disabled = true;
        checkEmail();
        
    }
  
  function checkEmail() {

    var email = document.getElementById('txtEmailAddress');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
}
</script>

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
    function IsNumeric22(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error22").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric23(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error23").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric24(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error24").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric25(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error25").style.display = ret ? "none" : "inline";
      return ret;
    }
    function IsNumeric26(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error26").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric27(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error27").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric28(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error28").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric29(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error29").style.display = ret ? "none" : "inline";
      return ret;
    }
    function IsNumeric30(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error30").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric31(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error31").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric32(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error32").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric33(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error33").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric34(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error34").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric35(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error35").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric36(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error36").style.display = ret ? "none" : "inline";     
      return ret;
    }
    function IsNumeric37(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error37").style.display = ret ? "none" : "inline";                                         
      return ret;
    }
    function IsNumeric38(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
      document.getElementById("error38").style.display = ret ? "none" : "inline";
      return ret;
    }
    function totalStudent()
    {
      var boy = document.getElementById("txtNoOfBoys").value;
      var girl = document.getElementById("txtNoOfGirls").value;
      if(boy == "")
        boy=0;
      if(girl == "")
        girl=0;
      var result = parseInt(boy) + parseInt(girl);
      if(!isNaN(result)){
        document.getElementById("txtTotalNoOfStudents").value = result;
      }
    }
    function totalTeacher()
    {
      var male = document.getElementById("txtTotalNoOfMaleTeachers").value;
      var female = document.getElementById("txtTotalNoOfFemaleTeachers").value;
      if(male == "")
        male=0;
      if(female == "")
        female=0;
      var result = parseInt(male) + parseInt(female);
      if(!isNaN(result)){
        document.getElementById("txtTotalNoOfTeachersInTheSchool").value = result;
      }
    }
    //function minmax(value, min, max) 
    function minmax(value, max) 
    {
      //if(parseInt(value) < min || isNaN(parseInt(value))) 
      //  return 0; 
      //else if(parseInt(value) > max) 
      if(parseInt(value) > max) 
        return 5000000; 
      else return value;
    }
    function totalToiletforBoys()
    {
      var text1 = document.getElementById("txtRenovatedNoBoys").value;
      var text2 = document.getElementById("txtNewlyConstrNoBoys").value;
      if(text1 == "")
        text1=0;
      if(text2 == "")
        text2=0;
      var result = parseInt(text1) + parseInt(text2);
      if(!isNaN(result)){
        document.getElementById("txtTotalNoBoys").value = result;
      }
    }
    function totalToiletforGirls()
    {
      var text1 = document.getElementById("txtRenovatedNoGirls").value;
      var text2 = document.getElementById("txtNewlyConstrNoGirls").value;
      if(text1 == "")
        text1=0;
      if(text2 == "")
        text2=0;
      var result = parseInt(text1) + parseInt(text2);
      if(!isNaN(result)){
        document.getElementById("txtTotalNoGirls").value = result;
      }
    }
    function totalHandWash()
    {
      var text1 = document.getElementById("txtRenovatedNo").value;
      var text2 = document.getElementById("txtNewlyConstrNo").value;
      if(text1 == "")
        text1=0;
      if(text2 == "")
        text2=0;
      var result = parseInt(text1) + parseInt(text2);
      if(!isNaN(result)){
        document.getElementById("txtHandWashStationTotalNo").value = result;
      }
    }
    function totalCleanWater()
    {
      var text1 = document.getElementById("txtDrinkingWaterRepaired").value;
      var text2 = document.getElementById("txtDrinkingWaterInstalled").value;
      if(text1 == "")
        text1=0;
      if(text2 == "")
        text2=0;
      var result = parseInt(text1) + parseInt(text2);
      if(!isNaN(result)){
        document.getElementById("txtDrinkingWaterTotalNo").value = result;
      }
    }
    function totalBenchDesk()
    {
      var text1 = document.getElementById("txtTotalBenches").value;
      var text2 = document.getElementById("txtTotalDesks").value;
      if(text1 == "")
        text1=0;
      if(text2 == "")
        text2=0;
      var result = parseInt(text1) + parseInt(text2);
      if(!isNaN(result)){
        document.getElementById("txtTotalBenchesDesks").value = result;
      }
    }
    
    </script>
<!-- My Script End -->

</head>
<body style="padding-right:0px;">

  <!--// Main Wrapper //-->
  <div class="as-mainwrapper" >

    <!--// Header //-->
    <header id="as-header" >

        <!--// TopStrip //-->
      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-topstrip as-bgcolor" style="background-color: #009dff;">
          <?php include('../include/top-head.php'); ?>
        </div>
      </div>
      <!--// TopStrip //-->

      <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
        <div class="as-header-bar">
          <div class="row">
            <div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
              <div class="col-md-2">
                <a style="float:left;" href="index.php" class="logo1"><img src="../images/logo2.png" alt=""></a>
              </div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('../include/navigation_mem.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('../include/responsive-menu.php'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>

    </header>

    <!--// Header class="as-section-right" //-->
    <div class="as-main-content">

      <!--// MainSection //-->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-1"></div>
            <div class="col-md-10" style="margin: 5px 0;">
              <div class="header-text"><h3>Happy School</h3></div>
            </div>
          <div class="col-md-1"></div>
        </div>
      </div>

       

<!-- Main Code start -->
<form class="form-horizontal" name="frm" id="frm" action="happyschool_ins.php" method="post" enctype="multipart/form-data" >

  <input type="hidden" name="prno" id="prno" value="<?= base64_decode($_REQUEST['prno']) ?>" />
  <input type="hidden" name="folderno" id="folderno" value="<?= base64_decode($_REQUEST['folderno']) ?>" />

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-1"></div>
        <div class="col-md-10" style="margin: 5px 0;">         
          <div style="height : 35px; background-color : #303238; margin-top:5px; padding : 5px; color : #FFF;">General Information</div>
        </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
        <!-- style="border : 1px solid #303238;" -->
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Are you a member of:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="memberoption" name="areyoua" value="<?= $genInfo['club_type'] ?>" readonly="readonly" />

              
              <input type="text" class="form-control" id="txtprojectno" name="txtprojectno" value="<?= base64_decode($_REQUEST['prno']) ?>" readonly="readonly" style="display:none;" />

            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Name:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="txtName" name="txtName" value="<?= $genInfo['name'] ?>" readonly="readonly" />
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Designation:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="txtDesignation" name="txtDesignation" value="<?= $genInfo['designation'] ?>" readonly="readonly"  />
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Mobile Number:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="txtMobNo" maxlength="10" name="txtMobNo" value="<?= $genInfo['phone_no'] ?>" readonly="readonly" />  
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;" >
              <label><b>Email Address:</b></label>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" id="txtEmailAddress" name="txtEmailAddress" value="<?= $genInfo['email'] ?>" readonly="readonly" />   
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>State:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="chostate" name="chostate" value="<?= $genInfo['state'] ?>" readonly="readonly" />
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;" >
              <label><b>City / Town:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtcity" id="txtcity" value="<?= $genInfo['city'] ?>" readonly="readonly"  />  
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>RI/IW/Rotaract District:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtdistrictforother" id="txtdistrictforother" value="<?= $genInfo['district_code'] ?>" readonly="readonly"  />
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Name of the RI/IW/Rotaract Club:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtclubforother" id="txtclubforother" value="<?= $genInfo['club_name'] ?>" readonly="readonly"  />
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
      <div class="col-md-1"></div>
        <div class="col-md-10" style="margin: 5px 0;">         
          <div style="height : 35px; background-color : #303238; margin-top:5px; padding : 5px; color : #FFF;">Project Information</div>
        </div>
      <div class="col-md-1"></div>
    </div>
  </div>

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Unique School ID:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="txtUniqSchoolId" name="txtUniqSchoolId" />
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Name of the School:</b></label>
            </div>
            <div class="col-md-6">              
              <input type="text" class="form-control" id="txtNameofSchool" name="txtNameofSchool" />
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Address of the School:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="txtAddressOfSchool" name="txtAddressOfSchool"  />
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>No. of Boys:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtNoOfBoys" id="txtNoOfBoys" maxlength="3" onkeyup="totalStudent();" onkeypress="return IsNumeric1(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span> 
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>No. of Girls:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtNoOfGirls" id="txtNoOfGirls" maxlength="3" onkeyup="totalStudent();" onkeypress="return IsNumeric2(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error2" style="color: Red; display: none">* Input digits (0 - 9)</span>  
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Total No of Students in the School:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalNoOfStudents" id="txtTotalNoOfStudents" readonly maxlength="3" onkeypress="return IsNumeric3(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error3" style="color: Red; display: none">* Input digits (0 - 9)</span>   
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Total No of male Teachers:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalNoOfMaleTeachers" id="txtTotalNoOfMaleTeachers" onkeyup="totalTeacher();" maxlength="3" onkeypress="return IsNumeric4(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error4" style="color: Red; display: none">* Input digits (0 - 9)</span> 
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Total No of female Teachers:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalNoOfFemaleTeachers" id="txtTotalNoOfFemaleTeachers" onkeyup="totalTeacher();" maxlength="3" onkeypress="return IsNumeric5(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error5" style="color: Red; display: none">* Input digits (0 - 9)</span> 
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Total No of Teachers in the School:</b></label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalNoOfTeachersInTheSchool" id="txtTotalNoOfTeachersInTheSchool" readonly maxlength="3" onkeypress="return IsNumeric6(event);" ondrop="return false;" onpaste="return false;" /> 
              <span id="error6" style="color: Red; display: none">* Input digits (0 - 9)</span> 
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Existence Of SMC and preparation of School Development Plan:</b></label>
            </div>
            <div class="col-md-2">
              <label class="radio-inline" for = "Yes"><input type = "radio" name = "smc" id = "smcYes" value = "Y" checked="Checked" />Yes</label>
            </div>
            <div class="col-md-4">
            <label class="radio-inline" for = "No"><input type = "radio" name = "smc" id = "smcNo" value = "N" />No</label> 
            </div>                
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Select the type of School:</b></label>
            </div>
            <div class="col-md-3">
              <label class="checkbox-inline" ><input type="checkbox" name="chkSchool1" value="primary">Primary (Class-4)</label><br/>
              <label class="checkbox-inline" ><input type="checkbox" name="chkSchool3" value="secondary">Secondary (Class 1-10)</label>
            </div>
            <div class="col-md-3">
              <label class="checkbox-inline" ><input type="checkbox" name="chkSchool2" value="elementary" >Elementary (Class 1-8)</label><br/>
              <label class="checkbox-inline" ><input type="checkbox" name="chkSchool4" value="higherSecondary" >Higher Secondary (Class 1-12)</label>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-1"></div>
          <div class="col-md-10" >
            <div class="col-md-4" style="padding-top:5px;">
              <label><b>Project Year:</b></label>
            </div>
            <div class="col-md-6">
              <select class="form-control" id="choProjYear" name="choProjYear">
                <option value="">Select</option>
                <option value="2016-2017">2016-2017</option>
                <option value="2017-2018">2017-2018</option>
                <option value="2018-2019">2018-2019</option>
                <option value="2019-2020">2019-2020</option>
                <option value="2020-2021">2020-2021</option>                        
              </select>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row">
  <div class="col-md-12">
    <div class="col-md-1"></div>
      <div class="col-md-10" style="margin: 5px 0;">         
        <div style="height : 35px; background-color : #303238; margin-top:5px; padding : 5px; color : #FFF;">Programme Component</div>
      </div>
    <div class="col-md-1"></div>
  </div>
</div>

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" >
            <input type="checkbox" name="chkRenovation" id="chkRenovation" value="Y">
              1. Painted, well maintained and secure school building.
          </label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 

<div id="projectCost1" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <label class="checkbox-inline" >
              <input type="checkbox" name="chkProject1" value="StrRoof">Structure Roof</label><br/>
              <label class="checkbox-inline" >
              <input type="checkbox" name="chkProject6" value="BoundaryWall" >Boundary Wall</label>
            </div>
            <div class="col-md-2">
              <label class="checkbox-inline" >
              <input type="checkbox" name="chkProject2" value="Wall" >Wall</label><br/>
              <label class="checkbox-inline" >
              <input type="checkbox" name="chkProject5" value="Windows" >Windows</label>
            </div>
            <div class="col-md-2">
              <label class="checkbox-inline" >
              <input type="checkbox" name="chkProject3" value="Flor">Floor</label><br/>
              <label class="checkbox-inline" >
              <input type="checkbox" name="chkProject7" value="Lights" >Lights</label>
            </div>
            <div class="col-md-2">
              <label class="checkbox-inline" >
              <input type="checkbox" name="chkProject4" value="Doors" >Doors</label><br/>
              <label class="checkbox-inline" >
            <input type="checkbox" name="chkProject8" value="Fans" >Fans</label>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg1" id="uploadimg1" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg2" id="uploadimg2" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtProjectCost" id="" maxlength="7" onkeyup="this.value = minmax(this.value, 5000000)" onkeypress="return IsNumeric7(event);" ondrop="return false;" onpaste="return false;" /> 
              <span id="error7" style="color: Red; display: none">* Input digits (0 - 9)</span> 
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

</div>

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkSepToiletsBoysGirls" id="chkSepToiletsBoysGirls" value="Y">2. Adequate and functional separate toilets for boys and girls.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 
<div id="SepToiletsBoysGirls" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <label><b><u>Toilet for Boys:</u></b></label>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Renovated:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtRenovatedNoBoys" id="txtRenovatedNoBoys" onkeyup="totalToiletforBoys();" maxlength="3" onkeypress="return IsNumeric8(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error8" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Newly Constructed:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtNewlyConstrNoBoys" id="txtNewlyConstrNoBoys" onkeyup="totalToiletforBoys();" maxlength="3" onkeypress="return IsNumeric9(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error9" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 


<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Number:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalNoBoys" id="txtTotalNoBoys" readonly maxlength="3" onkeypress="return IsNumeric10(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error10" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <label><b><u>Toilet for Girls:</u></b></label>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Renovated:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtRenovatedNoGirls" id="txtRenovatedNoGirls" onkeyup="totalToiletforGirls();" maxlength="3" onkeypress="return IsNumeric11(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error11" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Newly Constructed:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtNewlyConstrNoGirls" id="txtNewlyConstrNoGirls" onkeyup="totalToiletforGirls();" maxlength="3" onkeypress="return IsNumeric12(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error12" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 


<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Number:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalNoGirls" id="txtTotalNoGirls" readonly maxlength="3" onkeypress="return IsNumeric13(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error13" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtProjectCostSepToiletsBoysGirls" id="txtProjectCostSepToiletsBoysGirls" onkeyup="this.value = minmax(this.value, 5000000)" maxlength="7" onkeypress="return IsNumeric14(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error14" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg3" id="uploadimg3" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg4" id="uploadimg4" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg5" id="uploadimg5" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>    
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg6" id="uploadimg6" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>  

</div>


<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkHandWashStation" id="chkHandWashStation" value="Y">3. Hand Washing Station.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 
<div id="HandWashStation" style="display:none;">
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Renovated:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtRenovatedNo" id="txtRenovatedNo" onkeyup="totalHandWash();" maxlength="3" onkeypress="return IsNumeric15(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error15" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>  
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Newly Constructed:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtNewlyConstrNo" id="txtNewlyConstrNo" onkeyup="totalHandWash();" maxlength="3" onkeypress="return IsNumeric16(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error16" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>  

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Number:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtHandWashStationTotalNo" id="txtHandWashStationTotalNo" readonly maxlength="3" onkeypress="return IsNumeric17(event);" ondrop="return false;" onpaste="return false;" />  
              <span id="error17" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtHandWashStationProjectCost" id="" maxlength="7" onkeyup="this.value = minmax(this.value, 5000000)" onkeypress="return IsNumeric18(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error18" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg7" id="uploadimg7" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>   
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg8" id="uploadimg8" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>   


</div>



<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkDrinkingWater" id="chkDrinkingWater" value="Y">
            4. Clean and adequate drinking water for both students and teachers.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 
<div id="DrinkingWater" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Repaired:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtDrinkingWaterRepaired" id="txtDrinkingWaterRepaired" onkeyup="totalCleanWater();" maxlength="3" onkeypress="return IsNumeric19(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error19" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Installed:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtDrinkingWaterInstalled" id="txtDrinkingWaterInstalled" onkeyup="totalCleanWater();" maxlength="3" onkeypress="return IsNumeric20(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error20" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Number:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtDrinkingWaterTotalNo" id="txtDrinkingWaterTotalNo" readonly maxlength="3" onkeypress="return IsNumeric21(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error21" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtDrinkingWaterProjectCost" id="txtDrinkingWaterProjectCost" onkeyup="this.value = minmax(this.value, 5000000)" maxlength="7" onkeypress="return IsNumeric22(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error22" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg9" id="uploadimg9" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg10" id="uploadimg10" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

</div>



<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkLibrary" id="chkLibrary" value="Y">
            5. Library.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 

<div id="Library" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Number of Books Provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtLibraryNoBooks" id="" maxlength="5" onkeypress="return IsNumeric23(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error23" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No of Almirah/ Rack Provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtLibraryNoOfAlmirah" id="" maxlength="5" onkeypress="return IsNumeric24(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error24" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtLibraryProjectCost" id="txtLibraryProjectCost" maxlength="7" onkeyup="this.value = minmax(this.value, 5000000)" onkeypress="return IsNumeric25(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error25" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload Picture:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg11" id="uploadimg11" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

</div>


<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkPlayMaterial" id="chkPlayMaterial" value="Y">
            6. Play material, games and sports equipment.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 

<div id="PlayMaterial" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total No of sports equipments provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalSportsEquipment" id="" maxlength="5" onkeypress="return IsNumeric26(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error26" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtSportsEquipmentProjectCost" id="txtSportsEquipmentProjectCost" onkeyup="this.value = minmax(this.value, 5000000)" maxlength="7" onkeypress="return IsNumeric27(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error27" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload Picture:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg12" id="uploadimg12" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload Picture:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg13" id="uploadimg13" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

</div>

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkBenchesDesks" id="chkBenchesDesks" value="Y">
            7. Benches, desks for students.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 
<div id="BenchesDesks" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No of Benches Provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalBenches" id="txtTotalBenches" onkeyup="totalBenchDesk();" maxlength="3" onkeypress="return IsNumeric28(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error28" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No of Desks Provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalDesks" id="txtTotalDesks" maxlength="3" onkeyup="totalBenchDesk();" onkeypress="return IsNumeric29(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error29" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Number:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalBenchesDesks" id="txtTotalBenchesDesks" readonly maxlength="3" onkeypress="return IsNumeric30(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error30" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtBenchesDesksProjectCost" id="" maxlength="7" onkeyup="this.value = minmax(this.value, 5000000)" onkeypress="return IsNumeric31(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error31" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg14" id="uploadimg14" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg15" id="uploadimg15" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

</div>



<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkSpaceForTeachingStaff" id="chkSpaceForTeachingStaff" value="Y">
            8. Well maintained space for teaching staff.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 
<div id="SpaceForTeachingStaff" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No of Tables provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalTablesForTeachingStaff" id="txtTotalTablesForTeachingStaff" maxlength="3" onkeypress="return IsNumeric32(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error32" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No of Chairs provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalChairsForTeachingStaff" id="txtTotalChairsForTeachingStaff" maxlength="3" onkeypress="return IsNumeric33(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error33" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No Lights and Fans provided:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalLightsFans" id="txtTotalLightsFans" maxlength="3" onkeypress="return IsNumeric34(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error34" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtForTeachingStaffProjectCost" id="txtForTeachingStaffProjectCost" onkeyup="this.value = minmax(this.value, 5000000)" maxlength="7" onkeypress="return IsNumeric35(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error35" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg16" id="uploadimg16" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg17" id="uploadimg17" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

</div>


<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
        <div class="col-md-9" style="padding-top:5px;">
          <label class="checkbox-inline" ><input type="checkbox" name="chkShoesBags" id="chkShoesBags" value="Y">
            9. Shoes and School Bags for students.</label>
        </div>    
      <div class="col-md-1"></div>
    </div>
  </div> 

<div id="ShoesBags" style="display:none;">
  
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No of Footwear distributed for students:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalShoes" id="txtTotalShoes" maxlength="3" onkeypress="return IsNumeric36(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error36" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>No of School Bags distributed for students:</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtTotalBags" id="txtTotalBags" maxlength="3" onkeypress="return IsNumeric37(event);" ondrop="return false;" onpaste="return false;" /> 
            <span id="error37" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Total Project Cost(INR):</b>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="txtShoesBagsProjectCost" id="txtShoesBagsProjectCost" maxlength="7" onkeyup="this.value = minmax(this.value, 5000000)" onkeypress="return IsNumeric38(event);" ondrop="return false;" onpaste="return false;" />  
            <span id="error38" style="color: Red; display: none">* Input digits (0 - 9)</span>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
  <div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>1. Upload picture before:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg18" id="uploadimg18" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>2. Upload picture after:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg19" id="uploadimg19" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

</div>

<div class="row">
  <div class="col-md-12">
    <div class="col-md-1"></div>
      <div class="col-md-10" style="margin: 5px 0;">         
        <div style="height : 35px; background-color : #303238; margin-top:5px; padding : 5px; color : #FFF;">Other Information</div>
      </div>
    <div class="col-md-1"></div>
  </div>
</div>

<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Any Other Information:</b>
            </div>
            <div class="col-md-6">
              <textarea class="form-control" rows="5" id="txtAnyOtherdetail" name="txtAnyOtherdetail" maxlength='100'></textarea>
              <em>(Maximum 100 Character)</em>
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 
<div class="row" style="padding:10px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <b>Please upload any requirement letter from School:</b>
            </div>
            <div class="col-md-6">
              <input type="file" class="form-control-file" name="uploadimg20" id="uploadimg20" onchange="readURL(this);" aria-describedby="fileHelp">
            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding:0px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <div class="col-md-3">
              <label class="checkbox-inline" ><input type="checkbox" name="chkFundingDetails" id="chkFundingDetails" value="Y">
            <b>Funding Details</b></label>
            </div>
            <div class="col-md-6">
              

            </div>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" >
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
              
              <div id="FundingDetails" style="display:none;">
          
                <div id="main1" align="center">
                  <input type="text" id="text1" name="text1" style="display:none;" />
                  <input type="text" id="text2" name="text2" style="display:none;" />
                  <input type="text" id="text3" name="text3" style="display:none;" />
                  <input type="text" id="text4" name="text4" style="display:none;" />
                  <input type="button" id="btFinal" value="Final" class="bt" style="display:none;" /><br />
                </div>
                
                <div id="main" align="center">
                  <input type="button" class="btn btn-default" id="btAdd" value="Add Element" />
                  <input type="button" class="btn btn-default" id="btRemove" value="Remove Element" />
                  <input type="button" class="btn btn-default" id="btRemoveAll" value="Remove All" /><br />
                </div>
                
                  <!-- <label class="control-label col-sm-3" for="pwd"></label> -->
                  <div class="col-md-12">
                    <div id="child" align="center" style="display: inline-block; background-color: #d3d3d3; padding-top:0px;">
                    </div>  
                  </div>
              

                </div>


          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 

<div class="row" style="padding-top:30px; padding-bottom:30px;">
    <div class="col-md-12">
      <div class="col-md-2"></div>
          <div class="col-md-9" >
            <center><button type="submit" onClick="GetTextValue();" class="btn btn-primary">Submit</button></center>
          </div>
      <div class="col-md-1"></div>
    </div>
  </div> 


</form> 
<!-- Main Code end -->
    
    </div>

    <!--// MainSection //-->

  </div>


  <!--// Footer //-->
  <div class="as-footer">
    <div class="container">
      <?php include('../include/footer.php'); ?>
    </div>
    <?php include('../include/copy-right.php'); ?>
  </div>
  <!--// Footer //-->
  <div class="clearfix"></div>
    
  <!--// Main Wrapper //-->
<script type="text/javascript">
    var url;
    function insert(){
      alert("testing");
      url = 'happyschool_ins.php';
    }
    
function openByCategory(val){
  if(val=='Teacher Support') {
    alert(val);
    $(".forinnerwheel").hide()
    $(".forrotractor").hide()
    $(".forother").show();
  }
}

/*$(document).ready(function () {
$('.calendarFocus').calendar();
});*/

function categorylist()
{
str ="<option value=''>Select</option>";  
$.ajax({                                      
      url: 'categorylist.php',                     
      data: '',
    type:"post",
    dataType: 'json',
    success: function(data)         
        {
      if(data.length>0)
      {
        for(var i=0; i<data.length; i++)
        {
        str = str+"<option value='"+data[i]["id"]+"'>"+data[i]["category"]+"</option>";
        }
      }      
        $("#chocategory").empty();
        $("#chocategory").append(str);
    }
  });
}

function removeOptions(selectbox)
{
    var i;
    for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
    {
        selectbox.remove(i);
    }
}

function changeoptions(val){
  if(val=='Rotary') {
    removeOptions(document.getElementById("txtdistrictforother"));
    districtlist();
  }
  else if(val=='Rotaract'){
    removeOptions(document.getElementById("txtdistrictforother"));
    districtlist_inner(val,setclubval);
    //alert("Rotaract");
  }
  else if(val=='Inner Wheel'){
    removeOptions(document.getElementById("txtdistrictforother"));
    district_list();
  }
}


function districtlist()
{
var str = "";
$.ajax({                   
      url: '../../../districtlist.php',
      data: '',
      type:"post",
      dataType: 'json',
      success: function(data)         
      {
        if(data.length>0)
        {
          for(var i=0; i<data.length; i++)
          {
          str = str+"<option value='"+data[i]["district"]+"'>"+data[i]["district"]+"</option>";
          }
        }      
          $("#txtdistrictforother").append(str);
          $("#txtdistrict").append(str);
      }
    
  });
}


function dispclub(val,setclubval)
{
//alert(val)
  var str = "<option value=''>Select</option>";
  var pars ='dist='+val;
  var selected='';
$.ajax({                                      
      url: '../../../clublist.php',                     
      data: pars,
    type:"post",
    dataType: 'json',
    success: function(data)         
        {
    //alert(JSON.stringify(data))
      if(data.length>0)
      {
        for(var i=0; i<data.length; i++)
        {
          if(setclubval==data[i]["club"]) {
            selected = 'selected=selected';
          }
        str = str+"<option value='"+data[i]["club_name"]+"'" +selected+">"+data[i]["club_name"]+"</option>";
        }
      }
      //$(".forother").show();
      $("#txtclubforother").empty();
      $("#txtclubforother").append(str);         
    //alert(str)
    }
  });
}


function district_list()
{
var str = "";
$.ajax({                                      
      url: '../../../districtlist_iwc.php',                     
      data: '',
    type:"post",
    dataType: 'json',
    success: function(data)         
        {
      if(data.length>0)
      {
        for(var i=0; i<data.length; i++)
        {
        str = str+"<option value='"+data[i]["IWdistrict"]+"'>"+data[i]["IWdistrict"]+"</option>";
        }
      } 
        $("#txtdistrictforother").append(str);   
        $("#txtdistrictforlib").append(str);
    }
  });
}



function districtlist_inner(val,setclubval)
{
//alert(val)
  var str = "<option value=''>Select</option>";
  var pars ='dist='+val;
  var selected='';
$.ajax({                                      
      url: '../districtlist_inner.php',                     
      data: pars,
    type:"post",
    dataType: 'json',
    success: function(data)         
        {
    //alert(JSON.stringify(data))
      if(data.length>0)
      {
        for(var i=0; i<data.length; i++)
        {
          if(setclubval==data[i]["IWclub"]) {
            selected = 'selected=selected';
          }
        str = str+"<option value='"+data[i]["IWclub"]+"'" +selected+">"+data[i]["IWclub"]+"</option>";
        }
      }
      //$(".forother").show();
      $("#txtdistrictforother").append(str);
      $("#txtclubforlib").append(str);             
    //alert(str)
    }
  });
}
</script>

  </body>
</html>