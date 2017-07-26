<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$_SESSION['first_name'];
$_SESSION['ngo_name'];
$_SESSION['type'];

$getDet = mysql_fetch_array(mysql_query("select * from honor_master where SLN='".$_REQUEST['hid']."'"));

$password = mysql_fetch_array(mysql_query("select password from tbl_admin where idfk='".$_REQUEST['hid']."'"));
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>
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

<style>
.footer {
     position: absolute;
     bottom: 0;
     width:100%;
     height:60px;
     background-color:#32343b;
    }
.headercol
  {
    background-color : #b8d1f3;
  }
  .altcol
  {
    background-color : #dae5f4;
  }   
  .pad
  {
    padding-left:5px;
  }
</style>  

<script type="text/javascript">
/*-----------------------Letter with space-------------------------*/
function letterswithspace(input){
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}

/*----------------------Numbers only-------------------------*/
function numbersOnly(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}

/*-------------------No Special Character--------------------------*/
function nospecial(input){
  var regex = /[^a-zA-Z0-9 ]/gi;
  input.value = input.value.replace(regex, "");
}

function validateData(){

  var member_name = $('#member_name').val();
  var address_1 = $('#address_1').val();
  var address_2 = $('#address_2').val();
  var city = $('#city').val();
  var state = $('#state').val();
  var pin = $('#pin').val();
  var Mobile_No1 = $('#Mobile_No1').val();
  var Email = $('#Email').val();
  var password = $('#password').val();
  var confirm_password = $('#confirm_password').val();

  if (member_name==''){

    alert('Name cannot be empty');
    return false;
  }else if (address_1==''){

    alert('Address Line-1 cannot be empty');
    return false;
  }else if (address_2==''){

    alert('Address Line-2 cannot be empty');
    return false;
  }else if (city==''){

    alert('City cannot be empty');
    return false;
  }else if (state==''){

    alert('State cannot be empty');
    return false;
  }else if (pin==''){

    alert('PIN cannot be empty');
    return false;
  }else if (Mobile_No1==''){

    alert('Mobile No. cannot be empty');
    return false;
  }else if (Email==''){

    alert('Email cannot be empty');
    return false;
  }else if (password==''){

    alert('Password cannot be empty');
    return false;
  }else if (confirm_password==''){

    alert('Confirm your password');
    return false;
  }
}

function mobnumber1(Mobile_No1){

  var mobile_no1=$('#Mobile_No1').val();

  if(mobile_no1!=''){

    var mobno1 = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    if(Mobile_No1.value.match(mobno1)){

      $.ajax({

        url: 'check-honor-mobile.php',
        type: 'post',
        data: 'mobile_no1=' + mobile_no1,
        success: function(f){

          if (f==1){

            alert('Mobile no. "' + mobile_no1 + '" already exists.');
            document.getElementById('Mobile_No1').value = '';
            return false;
          }
        }
      })
    }else{

      alert('"' + mobile_no1 + '" is not a valid mobile no.');
      document.getElementById('Mobile_No1').value = '';
      return false;
    }  
  }
}

function ValidateEmail(Email){
  var email=$('#Email').val();

  if(email!='')
  {
      var email_valid= /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      if (email_valid.test(email)){
          
        $.ajax({
          url: 'check-honor-email.php',
          type: 'post',
          data: 'email=' + email,
          success: function(f){

            if (f==1){

              alert('Mobile no. "' + mobile_no1 + '" already exists.');
              document.getElementById('Mobile_No1').value = '';
              return false;
            }
          }
        })
      }
      else {

        alert('"' + email + '" is not a valid email address');
        document.getElementById('Email').value = '';
        return false;
      }
  }
}

function matchPassword(){

  var password = $('#password').val();
  var confirm_password = $('#confirm_password').val();

  if (confirm_password!=''){

    if (password!==confirm_password){

      alert('Passwords do not match. Try again');
      document.getElementById('confirm_password').value = '';
    }
  }
}
</script>

</head>

<body>
<div class="wrapper">
  <header>
    <div class="logo"> <a href="dashboard.php"><img height="90" src="http://rotaryteach.org/images/logo.jpg" alt="Adminise" /></a> </div>
    <?php include('include/mainnav.php'); ?>
    <div class="clearfix"></div>
  </header>
  <div class="structure-row alone"> 
    <div class="right-sec"> 
      <header> 
        <?php include('include/child_header.php'); ?>
        <div>
          <h1 style="color:#ffffff; text-align:center;">Add New Honorary Member</h1>
          <font color="#F4F3F3" style="float:right;">Master -> Add New Honorary Member</font>
        </div>
        <div class="clearfix"></div>
      </header>

      <?php
      if (isset($_REQUEST['submitBtn'])){

        if ($_REQUEST['hid']==''){

          $insert = "insert into honor_master(name, mobile_no, email, address_1, address_2, city, state, pin, status) values('".$_REQUEST['member_name']."', '".$_REQUEST['Mobile_No1']."', '".$_REQUEST['Email']."', '".urlencode($_REQUEST['address_1'])."', '".urlencode($_REQUEST['address_2'])."', '".$_REQUEST['city']."', '".$_REQUEST['state']."', '".$_REQUEST['pin']."', 'active')";

          mysql_query($insert);

          $getSln = mysql_fetch_array(mysql_query("select SLN from honor_master where email='".$_REQUEST['Email']."'"));

          $insertAdmin = "insert into tbl_admin(username, password, email, type, create_date, status, idfk) values('".$_REQUEST['member_name']."', '".$_REQUEST['password']."', '".$_REQUEST['Email']."', 'Honorary', '".date('Y-m-d')."', 'Active', '".$getSln['SLN']."')";

          mysql_query($insertAdmin);
        ?>
        <script type="text/javascript">
          alert('Member has been added');
          window.location = "add-edit-honorary.php";
        </script>
        <?php
        }else{

          $update = "update honor_master set name='".$_REQUEST['member_name']."', mobile_no='".$_REQUEST['Mobile_No1']."', email='".$_REQUEST['Email']."', address_1='".urlencode($_REQUEST['address_1'])."', address_2='".urlencode($_REQUEST['address_2'])."', city='".$_REQUEST['city']."', state='".$_REQUEST['state']."', pin='".$_REQUEST['pin']."' where SLN='".$_REQUEST['hid']."'";

          mysql_query($update);

          $updateAdmin = "update tbl_admin set username='".$_REQUEST['member_name']."', email='".$_REQUEST['Email']."' where idfk='".$_REQUEST['hid']."'";

          mysql_query($updateAdmin);
        ?>
        <script type="text/javascript">
          alert('Member details have been updated');
          window.location = "add-edit-honorary.php";
        </script>
        <?php
        }
      }
      ?>

      <!--Record Searching Start--> 
      <div class="container">
      
        <form action="" method="post" onsubmit="return validateData()" autocomplete="off" > 
          <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8" style="height : 35px; color: #ffffff; background-color: #003c6a; margin-top:10px; padding : 5px;"><b>Add New Honorary Member</b></div>
          <div class="col-sm-2"></div>
          </div>
          <div class="row">
            <div class="col-sm-2"></div>
              <div class="col-sm-8" style="border : 1px solid #303238;margin-top : 0px;">
                <div class="form-group" style="padding-bottom:75px;">
                    <div class="col-sm-12">
                      <label>Member Name:</label>
                      <input type="text" class="form-control" id="member_name" name="member_name" value="<?= $getDet['name'] ?>" style="width: 100%;" onkeyup="letterswithspace(this)" />
                    </div>
                    
                    <div class="col-sm-12">
                      <label>Address Line - 1</label>
                      <input type="text" class="form-control" name="address_1" id="address_1" value="<?= urldecode($getDet['address_1']) ?>" style="width: 100%;" />
                    </div>

                    <div class="col-sm-12">
                      <label>Address Line - 2</label>
                      <input type="text" class="form-control" name="address_2" id="address_2" value="<?= urldecode($getDet['address_2']) ?>" style="width: 100%;" />
                    </div>

                    <div class="col-sm-12">
                      <label>City</label>
                      <input type="text" class="form-control" name="city" id="city" onkeyup="letterswithspace(this)" value="<?= $getDet['city'] ?>" style="width: 100%;" />
                    </div>

                    <div class="col-sm-12">
                      <label>State</label>
                      <select name="state" id="state" class="form-control" style="width: 100%;" >
                        <option value="">Select State</option>
                        <?php 
                          $i=0;
                          $sql_c="select * from  tbl_states";
                          $result_c= mysql_query($sql_c);
                          while($row_c = mysql_fetch_array($result_c)){     
                        ?>
                        <option value="<?php echo $row_c['state'];?>" <?php if ($getDet['state']==$row_c['state']){echo 'selected';} ?>><?php echo $row_c['state']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-sm-12">
                      <label>PIN</label>
                      <input type="text" class="form-control" name="pin" id="pin" onkeyup="numbersOnly(this)" value="<?= $getDet['pin'] ?>" style="width: 100%;" />
                    </div>

                    <div class="col-sm-12">
                      <label>Mobile No.</label>
                      <input type="text" class="form-control" name="Mobile_No1" id="Mobile_No1" onblur="return mobnumber1(Mobile_No1)" onkeyup="numbersOnly(this)" value="<?= $getDet['mobile_no'] ?>" style="width: 100%;" />
                    </div>
                    
                    <div class="col-sm-12">
                      <label>Email</label>
                      <input type="text" class="form-control" name="Email" id="Email" onblur="return ValidateEmail(Email)" value="<?= $getDet['email'] ?>" style="width: 100%;" />
                    </div>

                    <?php
                    if ($_REQUEST['hid']==''){
                    ?>
                    <div class="col-sm-12">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="password" value="" style="width: 100%;" />
                    </div>


                    <div class="col-sm-12">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" onblur="matchPassword()" style="width: 100%;" />
                    </div>
                    <?php } ?>

                    <div class="col-sm-12">
                      <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Submit" style="width: 100px;margin: 0 20px 0 0;" />

                      <a href="add-edit-honorary.php"><input type="button" name="backBtn" id="backBtn" class="btn btn-primary" value="Back" style="width: 100px;" /></a>
                    </div>
                    <div class="col-sm-12">
                      <br/>
                    </div>
                </div>
                
              </div>
            
            <div class="col-sm-2"></div>
          
          </div>
          
        </form>
        <br/> 
        <br/>
        <br/>
            
      </div>
      <!--Record Searching End-->
      <br/>
    </div>
    
  </div>
  <br/>

  <div class="footer">
    <?php
    include('include/footer.php');
    ?>
  </div>
</div>



  

</body>
</html>