<?php
include('include/config.php');
?>
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
<link href="http://rotaryteach.org/css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/color.css" rel="stylesheet">
<link href="css/dl-menu.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet"> 
<link href="css/prettyphoto.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="css/menu_v.css" rel="stylesheet" type="text/css" />

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
</style>

<script>
/*-----------------------Letter without space-------------------------*/
function lettersOnly(input){
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex, "");
}

/*-----------------------Letter with space-------------------------*/
function letterswithspace(input){
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}

/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}

/*-------------------No Special Character--------------------------*/
function nospecial(input){
  var regex = /[^a-zA-Z0-9 ]/gi;
  input.value = input.value.replace(regex, "");
}

function myFunction(){
  var myWindow = window.open("district_option.php", "", "top=200, left=500, width=400, height=400");
}
function CloseAndRefresh(){
  opener.location.reload(true);
  self.close();
}
function showDiv(par){
  var club_type = par;
  $('#form_div_1').fadeIn('1000');
  $('#form_div_2').fadeIn('1000');

  $.ajax({
    url: 'get-district.php',
    type: 'post',
    data: 'club_type=' + club_type,
    success: function(f){

      $('#rotary_district').html(f);
    }
  })
}
function getClub(){
  var rotary_district = $('#rotary_district').val();

  $.ajax({
    url: 'get-club-name.php',
    type: 'post',
    data: 'rotary_district=' + rotary_district,
    success: function(f){

      $('#rotary_club').html(f);
    }
  })
}
function mobnumber1(phoneNo) {
  var mobile_no1 = $('#phoneNo').val();

  if(mobile_no1!=''){

    var mobno1 = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    if(!phoneNo.value.match(mobno1)){

      alert('Invalid mobile number');
      document.getElementById('phoneNo').value = '';
      return false;
    }
  }
}
function ValidateEmail(Email){
    var email=$('#Email').val();

    if(email!=''){
        var email_valid= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!email_valid.test(email)){

          alert('Invalid email address');
          document.getElementById('Email').value = '';
          return false;
        }
    }
}
function validateData(){
  var funding_type = $('#funding_type').val();
  var grant_no = $('#grant_no').val();
  var rotary_district = $('#rotary_district').val();
  var rotary_club = $('#rotary_club').val();
  var project_type = $('#project_type').val();
  var name = $('#name').val();
  var designation = $('#designation').val();
  var phoneNo = $('#phoneNo').val();
  var Email = $('#Email').val();
  var city = $('#city').val();
  var state = $('#state').val();
  var pin = $('#pin').val();
  var done_by = $('#done_by').val();
  var club_no = $('#club_no').val();

  if (funding_type==''){
    alert('Please select funding type');
    document.getElementById('funding_type').focus();
    return false;
  }else if (funding_type=='RILM Grant Support' && grant_no==''){
    alert('Please enter Grant No');
    document.getElementById('grant_no').focus();
    return false;
  }else if (rotary_district==''){
    alert('Please select district');
    document.getElementById('rotary_district').focus();
    return false;
  }else if (rotary_club==''){
    alert('Please select club');
    document.getElementById('rotary_club').focus();
    return false;
  }else if (project_type==''){
    alert('Please select project type');
    document.getElementById('project_type').focus();
    return false;
  }else if (name==''){
    alert('Please enter name');
    document.getElementById('name').focus();
    return false;
  }else if (designation==''){
    alert('Please enter designation');
    document.getElementById('designation').focus();
    return false;
  }else if (phoneNo==''){
    alert('Please enter your phone (mobile) no.');
    document.getElementById('phoneNo').focus();
    return false;
  }else if (Email==''){
    alert('Please enter your email address');
    document.getElementById('Email').focus();
    return false;
  }else if (city==''){
    alert('Please enter city');
    document.getElementById('city').focus();
    return false;
  }else if (state==''){
    alert('Please select state');
    document.getElementById('state').focus();
    return false;
  }else if (pin==''){
    alert('Please enter PIN');
    document.getElementById('pin').focus();
    return false;
  }else if (done_by==''){
    alert('Please select how the project was done');
    document.getElementById('done_by').focus();
    return false;
  }else if (done_by=='Jointly By Multiple Clubs' && club_no==''){
    alert('Please enter number of clubs');
    document.getElementById('club_no').focus();
    return false;
  }else if (done_by=='Jointly By Multiple Clubs' && club_no!=''){
    for (i=0; i<=club_no; i++){

      var district_code = $('#district_code'+i).val();
      var club_name = $('#club_name'+i).val();

      if (district_code=='' || club_name==''){
        alert('Please provide required information regarding the club(s)');
        return false;
      }
    }
  }
}
function grantNo(){
  
  var funding_type = $('#funding_type').val();

  if (funding_type=='RILM Grant Support'){

    $('#grant_div').fadeIn('500');
    document.getElementById('grant_no').value = '';
  }else{

    $('#grant_div').hide();
    document.getElementById('grant_no').value = '';
  }
}
function showType(){

  var project_type = $('#project_type').val();

  if (project_type==1){

    $('#support_row').fadeIn('1500');
  }else{

    $('#support_row').hide();
  }
}
function showClubNo(){

  var done_by = $('#done_by').val();

  if (done_by=='Jointly By Multiple Clubs'){

    $('#club_table').fadeIn('1500');
    document.getElementById('club_no').value = '';
    $('#club_details').html('');
  }else{

    $('#club_table').hide();
    document.getElementById('club_no').value = '';
    $('#club_details').html('');
  }
}
function getClubRow(){

  var club_no = $('#club_no').val();
  var rotary_district = $('#rotary_district').val();
  var rotary_club = $('#rotary_club').val();
  var club_type = $("input[name='club_type']:checked"). val();

  if (rotary_district!='' && rotary_club!=''){

    if (club_no!=''){

      $.ajax({

        url: 'get-club-row.php',
        type: 'post',
        data: 'club_no=' + club_no + '&rotary_district=' + rotary_district + '&rotary_club=' + rotary_club + '&club_type=' + club_type,
        success: function(f){

          $('#club_details').html(f);
        }
      })
    }
  }else{
    alert('Your own club details are missing. Please provide us with your own club details');
    document.getElementById('club_no').value = '';
    document.getElementById('rotary_district').focus();
  }
}
</script>

</head>

<body style="padding-right:0px;">

  <!--// Main Wrapper //-->
  <div class="as-mainwrapper">

    <!--// Header //-->
      <header id="as-header" >

        <!--// TopStrip //-->
        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-topstrip as-bgcolor" style="background-color: #009dff;">
            <?php include('../../include/top-head.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-header-bar">
            <div class="row">
      <div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
          <div class="col-md-2">
            <a style="float:left;" href="http://rotaryteach.org/index.php" class="logo1"><img src="http://rotaryteach.org/images/logo2.png" alt=""></a>
          </div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
                  <?php include('../../include/navigation_mem.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('../../include/responsive-menu.php'); ?>

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
                  <h1>Project Upload</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Project Upload</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      if (isset($_REQUEST['submitBtn'])){

        //-----------------------------Generate project number-----------------------------//
        $sql="select max(id) as SLN from project_master";
        $result=mysql_query($sql);
        $row=mysql_fetch_array($result);

        if($row['SLN']==0){

          $prNo = "PR/0001";
        }else{

          $NewSLN=$row['SLN']+1;
          $NewSLN_length=strlen($NewSLN);
          
          if($NewSLN_length==1){
            $NewSLN = "000".$NewSLN;
          }else if($NewSLN_length==2){
            $NewSLN = "00".$NewSLN;
          }else if($NewSLN_length==3){
            $NewSLN = "0".$NewSLN;
          }else{
            $NewSLN = $NewSLN;
          }
          $prNo = "PR/".$NewSLN;
        }
        $distCode = $_REQUEST['district_code'];
        $clubType = $_REQUEST['clubType'];
        $clubName = $_REQUEST['club_name'];

        $count = count($distCode);
        $dCode = '';
        $cType = '';
        $cName = '';

        for ($i=0; $i<$count; $i++){
          $dCode = $dCode.$distCode[$i].',';
          $cType = $cType.$clubType[$i].',';
          $cName = $cName.$clubName[$i].',';
        }

        if ($_REQUEST['done_by']=='Independently By Your Club'){
          $doneByDis = $_REQUEST['rotary_district'];
          $doneByType = $_REQUEST['club_type'];
          $doneByClub = $_REQUEST['rotary_club'];
        }else{
          $doneByDis = $dCode;
          $doneByType = $cType;
          $doneByClub = $cName;
        }
        $clubNo = $_REQUEST['club_no'] + 1;

        $insert = "insert into project_master(funding_type, club_type, district_code, club_name, project_category, project_subcategory, name, designation, phone_no, email, city, state, pin, project_done_by, no_of_clubs, done_by_districts, done_by_type, done_by_club, upload_date, status, grant_no, project_no) values('".$_REQUEST['funding_type']."', '".$_REQUEST['club_type']."', '".$_REQUEST['rotary_district']."', '".$_REQUEST['rotary_club']."', '".$_REQUEST['project_type']."', '".$_REQUEST['support_type']."', '".$_REQUEST['name']."', '".$_REQUEST['designation']."', '".$_REQUEST['phoneNo']."', '".$_REQUEST['Email']."', '".$_REQUEST['city']."', '".$_REQUEST['state']."', '".$_REQUEST['pin']."', '".$_REQUEST['done_by']."', '".$clubNo."', '".$doneByDis."', '".$doneByType."', '".$doneByClub."', '".date('Y-m-d')."', '', '".$_REQUEST['grant_no']."', '".$prNo."')";

        mysql_query($insert);

        $folderNo_whole = explode('/', $prNo);
        $folderNo = $folderNo_whole[1];

        $_SESSION['grant_no'] = $_REQUEST['grant_no'];
        $_SESSION['prno'] = base64_encode($prNo);
        $_SESSION['folderno'] = base64_encode($folderNo);

        if ($_REQUEST['project_type']=='1'){
        ?>
        <script type="text/javascript">
          window.location = 'teacher-support/index.php?prno=<?= base64_encode($prNo) ?>&folderno=<?= base64_encode($folderNo) ?>&subtype=<?= $_REQUEST['support_type'] ?>';
        </script>
        <?php
        }else if ($_REQUEST['project_type']=='2'){

          if (!file_exists('e-learning/images/'.$folderNo)){
            mkdir('e-learning/images/'.$folderNo, 0777, true);
          }

          if (!file_exists('e-learning/documents/'.$folderNo)){
            mkdir('e-learning/documents/'.$folderNo, 0777, true);
          }
        ?>
        <script type="text/javascript">
          window.location = 'e-learning/index.php?prno=<?= base64_encode($prNo) ?>&folderno=<?= base64_encode($folderNo) ?>';
        </script>
        <?php
        }else if ($_REQUEST['project_type']=='3'){

          if (!file_exists('adult-literacy/images/'.$folderNo)){
            mkdir('adult-literacy/images/'.$folderNo, 0777, true);
          }

          if (!file_exists('adult-literacy/documents/'.$folderNo)){
            mkdir('adult-literacy/documents/'.$folderNo, 0777, true);
          }
        ?>
        <script type="text/javascript">
          window.location = 'adult-literacy/index.php?prno=<?= base64_encode($prNo) ?>&folderno=<?= base64_encode($folderNo) ?>';
        </script>
        <?php
        }else if ($_REQUEST['project_type']=='4'){

          if (!file_exists('child-development/images/'.$folderNo)){
            mkdir('child-development/images/'.$folderNo, 0777, true);
          }

          if (!file_exists('child-development/documents/'.$folderNo)){
            mkdir('child-development/documents/'.$folderNo, 0777, true);
          }
        ?>
        <script type="text/javascript">
          window.location = 'child-development/index.php?prno=<?= base64_encode($prNo) ?>&folderno=<?= base64_encode($folderNo) ?>';
        </script>
        <?php
        }else if ($_REQUEST['project_type']=='5'){

          if (!file_exists('happy-school/images/'.$folderNo)){
            mkdir('happy-school/images/'.$folderNo, 0777, true);
          }

          if (!file_exists('happy-school/documents/'.$folderNo)){
            mkdir('happy-school/documents/'.$folderNo, 0777, true);
          }
        ?>
        <script type="text/javascript">
          window.location = 'happy-school/happyschool.php?prno=<?= base64_encode($prNo) ?>&folderno=<?= base64_encode($folderNo) ?>';
        </script>
        <?php
        }else if ($_REQUEST['project_type']=='6'){

          if (!file_exists('other/images/'.$folderNo)){
            mkdir('other/images/'.$folderNo, 0777, true);
          }

          if (!file_exists('other/documents/'.$folderNo)){
            mkdir('other/documents/'.$folderNo, 0777, true);
          }
        ?>
        <script type="text/javascript">
          window.location = 'other/index.php?prno=<?= base64_encode($prNo) ?>&folderno=<?= base64_encode($folderNo) ?>';
        </script>
        <?php
        }else if ($_REQUEST['project_type']=='7'){

          if (!file_exists('library-creation/images/'.$folderNo)){
            mkdir('library-creation/images/'.$folderNo, 0777, true);
          }

          if (!file_exists('library-creation/documents/'.$folderNo)){
            mkdir('library-creation/documents/'.$folderNo, 0777, true);
          }
        ?>
        <script type="text/javascript">
          window.location = 'library-creation/index.php?prno=<?= base64_encode($prNo) ?>&folderno=<?= base64_encode($folderNo) ?>';
        </script>
        <?php
        }
      }
      ?>

      <form action="" method="post" onsubmit="return validateData()" autocomplete="off">

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-div">
              <table>
                <tr>
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Funding Type : </td>
                  <td width="35%">
                    <select name="funding_type" id="funding_type" class="form-control" onchange="grantNo()">
                      <option value="">-- Please Select --</option>

                      <!--<option value="RILM Grant Support">RILM Grant Support</option>-->
                      <option value="Independent Funding">Independent Funding</option>
                    </select>
                  </td>

                  <td width="50%" colspan="2" style="text-align: right;"><span id="grant_div" style="display: none;">Enter Grant No. <input type="text" name="grant_no" id="grant_no" value="" class="form-control" style="width: 50%;margin: 0 0 0 10px;" /></span></td>
                </tr>
              </table>
            </div>

            <table style="margin: 20px 0 0 0;">
              <tr style="height: 50px;background-color: #333;color: #fff;">
                <td colspan="3" style="padding: 0 20px;line-height: 50px;">Select your identity</td>
              </tr>

              <tr style="height: 50px;background-color: #ccc;">
                <td width="50%" style="padding: 0 20px;line-height: 50px;">
                  <input type="radio" name="club_type" id="club_type_1" value="Rotary" onclick="showDiv(this.value)" />&nbsp;&nbsp;Rotarian
                </td>
                <td width="50%" style="padding: 0 20px;line-height: 50px;">
                  <input type="radio" name="club_type" id="club_type_2" value="Inner Wheel" onclick="showDiv(this.value)" />&nbsp;&nbsp;Inner Wheel Member
                </td>
              </tr>
            </table>

            <div class="form-div" id="form_div_1" style="display: none;">
              <table>
                <tr style="height: 50px;">
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Select District : </td>
                  <td width="35%">
                    <select id="rotary_district" name="rotary_district" class="form-control" onchange="getClub()">
                      <option value="">-- Please Select --</option>
                    </select>
                  </td>

                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Select Club : </td>
                  <td width="35%">
                    <select id="rotary_club" name="rotary_club" class="form-control">
                      <option value="">-- Please Select --</option>
                    </select>
                  </td>
                </tr>

                <tr style="height: 50px;">
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Project Type : </td>
                  <td width="35%">
                    <select id="project_type" name="project_type" class="form-control" onchange="showType()">
                      <option value="">-- Please Select --</option>

                      <?php
                      //$query_getCategory = mysql_query("select * from category where category!='Child Development' and category!='Other' and category!='Library Creation'");
                      $query_getCategory = mysql_query("select * from category where category!='Child Development'");
                      while ($getCategory = mysql_fetch_array($query_getCategory)){
                      ?>
                      <option value="<?= $getCategory['id'] ?>"><?= $getCategory['category'] ?></option>
                      <?php } ?>
                    </select>
                  </td>

                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">&nbsp;</td>
                  <td width="35%">&nbsp;</td>
                </tr>

                <tr id="support_row" style="height: 50px;display: none;">
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Teacher Support Type : </td>
                  <td width="35%">
                    <select id="support_type" name="support_type" class="form-control">
                      <option value="">-- Please Select --</option>

                      <option value="Nation Builder Award">Nation Builder Award</option>
                      <option value="Teacher Training">Teacher Training</option>
                      <option value="Supplemental Teaching">Supplemental Teaching</option>
                    </select>
                  </td>

                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">&nbsp;</td>
                  <td width="35%">&nbsp;</td>
                </tr>

                <tr style="height: 50px;">
                  <td style="text-align: right;padding: 0 10px 0 0;">Name : </td>
                  <td><input type="text" name="name" id="name" value="" class="form-control" onkeyup="letterswithspace(this)" /></td>

                  <td style="text-align: right;padding: 0 10px 0 0;">Designation : </td>
                  <td><input type="text" name="designation" id="designation" value="" class="form-control" /></td>
                </tr>

                <tr style="height: 50px;">
                  <td style="text-align: right;padding: 0 10px 0 0;">Phone No : </td>
                  <td><input type="text" name="phoneNo" id="phoneNo" value="" class="form-control" onblur="return mobnumber1(phoneNo)" onkeyup="numbersOnly(this)" /></td>

                  <td style="text-align: right;padding: 0 10px 0 0;">Email : </td>
                  <td><input type="text" name="Email" id="Email" value="" class="form-control" onblur="return ValidateEmail(Email)" /></td>
                </tr>

                <tr style="height: 50px;">
                  <td colspan="4">
                    <table>
                      <tr>
                        <td width="15%" style="text-align: right;padding: 0 10px 0 0;">City / Town / Village :</td>
                        <td width="20%"><input type="text" name="city" id="city" value="" class="form-control" onkeyup="letterswithspace(this)" /></td>

                        <td width="12.5%" style="text-align: right;padding: 0 10px 0 0;">State :</td>
                        <td width="20%">
                          <select id="state" name="state" class="form-control">
                            <option value="">-- Please Select --</option>

                            <?php
                            $query_getState = mysql_query("select * from states");
                            while ($getState = mysql_fetch_array($query_getState)){
                            ?>
                            <option value="<?= $getState['state'] ?>"><?= $getState['state'] ?></option>
                            <?php } ?>
                          </select>
                        </td>

                        <td width="12.5%" style="text-align: right;padding: 0 10px 0 0;">PIN :</td>
                        <td><input type="text" name="pin" id="pin" value="" class="form-control" onkeyup="numbersOnly(this)" /></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>

            <div class="form-div" id="form_div_2" style="display: none;margin: 0 0 25px 0;">
              <table>
                <tr>
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Project Done : </td>
                  <td width="35%">
                    <select name="done_by" id="done_by" class="form-control" onchange="showClubNo()">
                      <option value="">-- Please Select --</option>

                      <option value="Independently By Your Club">Independently By Your Club</option>
                      <option value="Jointly By Multiple Clubs">Jointly By Multiple Clubs</option>
                    </select>
                  </td>

                  <td width="50%" colspan="2">&nbsp;</td>
                </tr>
              </table>

              <table id="club_table" style="display: none;">
                <tr>
                  <td width="15%" style="text-align: right;padding: 0 10px 0 0;">Number of Clubs : </td>
                  <td width="35%">
                    <input type="text" name="club_no" id="club_no" value="" class="form-control" onkeyup="numbersOnly(this)" />
                  </td>
                  <td width="50%" colspan="2"><input type="button" name="clubBtn" id="clubBtn" value="OK" class="btn btn-primary" onclick="getClubRow();" style="margin: 0 0 0 15px;width: 80px;" /></td>
                </tr>

                <tr><td colspan="4" style="height: 20px;"></td></tr>

                <tr>
                  <td colspan="4" width="100%"><span id="club_details"></span></td>
                </tr>
              </table>

              <table style="margin: 30px 0 0 0;">
                <tr style="height: 50px;">
                  <td width="100%" colspan="4" style="text-align: center;">
                    <input type="submit" name="submitBtn" id="submitBtn" value="Submit" class="btn btn-primary" style="width: 100px;" />
                  </td>
                </tr>
              </table>
            </div>
        </div>
      </div>

  </div>

  </form>

  <div class="col-md-12" style="height: 50px;"></div>

  <!--// Footer //-->
  <div class="as-footer">
    <div class="container">
      <?php include('include/footer.php'); ?>
    </div>
    <?php include('include/copy-right.php'); ?>
  </div>
  <!--// Footer //-->
  <div class="clearfix"></div>
    
  <!--// Main Wrapper //-->

    <!-- Search Modal -->
    <?php //include('include/search-model.php'); ?>
    <!-- Search Modal -->
    <!-- jQuery (necessary for JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dlmenu.js"></script>
    <script src="js/flexslider-min.js"></script>
    <script src="js/goalProgress.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.prettyphoto.js"></script>
    <script src="js/waypoints-min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/newsticker.js"></script>
    <script src="js/parallex.js"></script>
    <script src="js/styleswitch.js"></script>
    <script src="js/functions.js"></script>
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