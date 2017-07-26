<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin | Dashboard</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

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
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="index.html" class="logo">
  <!-- Add the class icon to your logo image or logo icon to add the margining -->
  Super Admin </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> 
    <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
    <div class="navbar-right">
      <?php include('include/user_account.php'); ?>
    </div>
  </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image"> <img src="img/avatar5.png" class="img-circle" alt="User Image" /> </div>
        <div class="pull-left info">
          <p>Hello, <?php echo ucfirst($_SESSION['user_code']); ?></p>
          </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('include/side_menu.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Dashboard <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <?php
      if (isset($_REQUEST['submitBtn'])){

        if ($_REQUEST['hid']==''){

          $insert = "insert into honor_master(name, mobile_no, email, address_1, address_2, city, state, pin, status) values('".$_REQUEST['member_name']."', '".$_REQUEST['Mobile_No1']."', '".$_REQUEST['Email']."', '".urlencode($_REQUEST['address_1'])."', '".urlencode($_REQUEST['address_2'])."', '".$_REQUEST['city']."', '".$_REQUEST['state']."', '".$_REQUEST['pin']."', 'active')";

          //mysql_query($insert);

          $getSln = mysql_fetch_array(mysql_query("select SLN from honor_master where email='".$_REQUEST['Email']."'"));

          $insertAdmin = "insert into tbl_admin(username, password, email, type, create_date, status, idfk) values('".$_REQUEST['member_name']."', '".$_REQUEST['password']."', '".$_REQUEST['Email']."', 'Honorary', '".date('Y-m-d')."', 'Active', '".$getSln['SLN']."')";

          //mysql_query($insertAdmin);
        ?>
        <script type="text/javascript">
          alert('Member has been added');
          window.location = "add-edit-honor-member.php";
        </script>
        <?php
        }else{

          $update = "update honor_master set name='".$_REQUEST['member_name']."', mobile_no='".$_REQUEST['Mobile_No1']."', email='".$_REQUEST['Email']."', address_1='".urlencode($_REQUEST['address_1'])."', address_2='".urlencode($_REQUEST['address_2'])."', city='".$_REQUEST['city']."', state='".$_REQUEST['state']."', pin='".$_REQUEST['pin']."' where hid='".$_REQUEST['hid']."'";

          //mysql_query($update);

          $updateAdmin = "update tbl_admin set username='".$_REQUEST['member_name']."', password='".$_REQUEST['password']."', email='".$_REQUEST['Email']."' where idfk='".$_REQUEST['hid']."'";

          //mysql_query($updateAdmin);
        ?>
        <script type="text/javascript">
          alert('Member details have been updated');
          window.location = "add-edit-honor-member.php";
        </script>
        <?php
        }
      }
      ?>
    
    <!-- Main content -->
     <section class="content">
     
      <fieldset>
      <legend>Member Information</legend>

      <form action="" method="post" onsubmit="return validateData()" autocomplete="off">
        
        <div class="form-group">
          <label>Member Name</label>
          <input type="text" class="form-control" name="member_name" id="member_name" onkeyup="letterswithspace(this)" value=""/>
        </div>

        <div class="form-group">
          <label>Address Line - 1</label>
          <input type="text" class="form-control" name="address_1" id="address_1" value="" />
        </div>

        <div class="form-group">
          <label>Address Line - 2</label>
          <input type="text" class="form-control" name="address_2" id="address_2" value="" />
        </div>

        <div class="form-group">
          <label>City</label>
          <input type="text" class="form-control" name="city" id="city" onkeyup="letterswithspace(this)" value="" />
        </div>

        <div class="form-group">
          <label>State</label>
          <select name="state" id="state" class="form-control">
            <option value="">Select State</option>
            <?php 
              $i=0;
              $sql_c="select * from  tbl_states";
              $result_c= mysql_query($sql_c);
              while($row_c = mysql_fetch_array($result_c)){     
            ?>
            <option value="<?php echo $row_c['state'];?>" <?php echo $c; ?>><?php echo $row_c['state']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>PIN</label>
          <input type="text" class="form-control" name="pin" id="pin" onkeyup="numbersOnly(this)" value="<?php echo $child_guardian_name; ?>" />
        </div>

        <div class="form-group">
           <label>Mobile No.</label>
           <input type="text" class="form-control" name="Mobile_No1" id="Mobile_No1" onblur="return mobnumber1(Mobile_No1)" onkeyup="numbersOnly(this)" value="<?php echo $child_guardian_name; ?>" name="child_gaurdian"/>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" name="Email" id="Email" onblur="return ValidateEmail(Email)" value="<?php echo $child_guardian_name; ?>" />
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" id="password" value="" />
        </div>

        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" onblur="matchPassword()" />
        </div>

        <div class="box-footer">
          <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Submit" />
        </div>

      </form>
     
     </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- add new calendar event modal -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
</body>
</html>