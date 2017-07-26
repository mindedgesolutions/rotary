<?php
session_start();
ob_start();
include('include/config.php');
include 'include/session_check.php';

$msg = "";

$pid = base64_decode($_GET['pid']);

$getDet = mysql_fetch_array(mysql_query("Select * from tbl_child_profile_card where child_id = '$pid'"));

if (base64_decode($_REQUEST['qid'])=='quarter1'){

  $quarter_id = '1st Quarter';
  $table = 'quarter_11';
  $exam_id = '1';

}else if (base64_decode($_REQUEST['qid'])=='quarter2'){

  $quarter_id = '2nd Quarter';
  $table = 'quarter_22';
  $exam_id = '2';

}else if (base64_decode($_REQUEST['qid'])=='quarter3'){

  $quarter_id = '3rd Quarter';
  $table = 'quarter_33';
  $exam_id = '3';

}else if (base64_decode($_REQUEST['qid'])=='quarter4'){

  $quarter_id = '4th Quarter';
  $table = 'quarter_44';
  $exam_id = '4';

}

if(isset($_POST['submit_form'])){
  
  $pid = $_POST['pid'];
  $date_admission_center = $_POST['date_admission_center']; 
  $age_class = $_POST['age_class'];   
  $child_id = $_POST['child_id'];   
  $exam = $_POST['exam'];   
  $quarter = $_POST['quarter']; 
  $date_of = date('d/m/Y');
  $create_by = $_SESSION['username'];

  $sql = "Insert into tbl_child_progress_card(progress_id, child_id, date_admission_center, age_class, create_by) values(NULL, '".$pid."', '".$date_admission_center."', '".$age_class."', '".$create_by."')";

  $result = mysql_query($sql);

  $val = $_REQUEST['quarter'];
  $subId = 0;

  for ($i=0; $i<16; $i++){

    $sub_marks = $val[$i];
    $sub_id = ($i + 1);

    $checkPresent = mysql_num_rows(mysql_query("select * from ".$table." where child_id='".$pid."' and exam='".$exam_id."' and year='".date('Y')."'"));

    if ($checkPresent < 16){

      $insert = "Insert into ".$table."(quater_id, child_id, exam, value, date_of, create_by, subject_id, year) values(NULL, '".$pid."', '".$exam_id."', '".$sub_marks."', '".$date_of."', '".$create_by."', '".$sub_id."', '".date('Y')."')";

      mysql_query($insert);

    }else{

      $update = "update ".$table." set value='".$sub_marks."' where child_id='".$pid."' and subject_id='".$sub_id."' and year='".date('Y')."'";

      mysql_query($update);

    }
  }
  ?>
  <script>
    alert('Data has been saved successfully');
    window.location = "add_child_progress.php?pid=<?= base64_encode($_REQUEST['pid']) ?>";
  </script>
<?php
}
?>
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

<script type="text/javascript">
function numbersForDate(input){
    var regex = /[^0-9-/]/gi;
    input.value = input.value.replace(regex, "");
}

function numbersOnly(input){
    var regex = /[^0-9.]/gi;
    input.value = input.value.replace(regex, "");
}
</script>

<style type="text/css">
.content-wrapper{
  height: auto;
  padding: 15px;
}
.content-header{
  width: 100%;
  float: left;
  padding: 10px;
  border: 1px solid #ccc;
}
.content-header h1{
  height: auto;
  margin: 0;
  font-size: 18px;
  word-spacing: 5px;  
}
.content-content{
  width: 100%;
  height: auto;
  float: left;
  margin: 15px 0;
  border-bottom: 1px solid #ccc;
}
.child-image{
  width: 15%;
  height: auto;
  float: left;
  box-sizing: border-box;
  padding: 5px;
  border: 1px solid #ccc;
}
.child-image img{
  width: 100%;
  height: auto;
}
.child-desc{
  width: 83%;
  height: auto;
  float: left;
  margin: 0 0 0 2%;
}
.sub-desc{
  width: 50%;
  height: auto;
  float: left;
  line-height: 20px;
  margin: 5px 0;
  box-sizing: border-box;
  padding: 10px;
}
.sub-desc h2{
  margin: 0;
  font-size: 13px;
  float: left;
  font-weight: normal;
  color: #6d6f75;
  line-height: 20px;
}
.data{
  margin: 0 0 0 15px;
  padding-bottom:15px;
}
.other-details{
  width: 41.5%;
  height: 100px;
  float: left;
  box-sizing: border-box;
  padding: 10px;
}
.other-details h1{
  font-size: 13px;
  font-weight: normal;
  color: #6d6f75;
  line-height: 20px;
}
.table-div{
  width: 100%;
  height: 100px;
  float: left;
  margin: 20px 0%;
}
.table-header{
  height: 45px;
  line-height: 35px;
  background-color: #32333a;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}
.table-header:nth-of-type(odd){
    background-color: #000;
}
.table-row{
  height: 45px;
  line-height: 35px;
  text-align: center;
  text-transform: uppercase;
  color: #000;
}
.btn-holder{
  height: auto;
  float: left;
  margin: 20px 5%;
}
.dataLabel{
  padding-right:10px;
  padding-bottom:15px;
}
</style>

</head>

<body>
<!-- Wrapper Start -->
<div class="wrapper">

 <?php include('include/header.php'); ?>
 <?php include 'child-progress-pagination.php'; ?>
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Child Report Card</li>
      </ol>
    </section>
	<div class="container">
		<div class="row">
		<div class="col-sm-12">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="content-wrapper">          
          <div class="content-header"><h1>Child Information</h1></div>

            <div class="col-md-12">          
              <div class="col-md-2 child-image">
                <img src="../child_development/upload/<?= $getDet['child_photo'] ?>" >
              </div>
            
            <div class="col-md-5">                        
                <div>
                  <div class="data">
                    <span class="dataLabel">Child Name :</span><?= strtoupper($getDet['child_name']) ?>
                  </div>
                </div>
                
                <div>
                  <div class="data">
                    <span class="dataLabel">Child DOB :</span><?= $getDet['child_dob'] ?>
                  </div>
                </div>
              
                <div>            
                  <div class="data">
                    <span class="dataLabel">Child Gender :</span> <?= strtoupper($getDet['child_gender']) ?>
                  </div>
                </div>
      
                <div>            
                  <div class="data">
                    <span class="dataLabel">Father's Name :</span><?= strtoupper($getDet['child_father_name']) ?>
                  </div>
                </div>          
            </div>

            <div class="col-md-5">
              <div>        
                <div class="data">
                  <span class="dataLabel">Mother's Name :</span><?= strtoupper($getDet['child_mother_name']) ?>
                </div>
              </div>
              <div>
                <div class="data">
                  <span class="dataLabel">Child's City :</span><?= strtoupper($getDet['city']) ?>
                </div>
              </div>      
              <div class="data">
                <span class="dataLabel">NGO Partner :</span><?= strtoupper($getDet['name_partner_ngo']) ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-2"></div>
            
            <div class="col-md-5">
              <div class="data">
                <h1>Date of Admission in the Center : </h1>
                    <input type="text" class="form-control" placeholder="Date of Admission" name="date_admission_center" id="date_admission_center" value="<?= $getDate['date_admission_center'] ?>" onkeyup="numbersForDate(this)" required />
              </div>
            </div>
            <div class="col-md-5">
              <div class="data">
                <h1>Age appropriate class : </h1>
                    <input type="text" class="form-control"  placeholder="Age appropriate class" name="age_class" value="<?= $getDate['age_class'] ?>" onkeyup="numbersOnly(this)" required />
              </div>
            </div>
        </div>

        <?php
          $sql_getDate = "Select * from tbl_child_progress_card where child_id = '$pid'";
          $result_getDate = mysql_query($sql_getDate);
          $getDate = mysql_fetch_array($result_getDate);
        ?>



     <div class="content-content" style="text-align: center;border: none;">
    <p style="font-weight: bold;">Grades: A = Very Good, B = Good, C = Satisfactory, D = Need Improvement</p>

    (Please assess as commensurate to the age appropriate class)
  </div>


    <table class="col-md-12" border="1">

      <tr class="table-header" style="height: 50px;line-height: 50px;"><td colspan="3" style="text-align: left;padding: 0 5px;">Child Progress Report Card</td></tr>

      <tr class="table-header">
        <td class="col-md-2">Serial</td>
        <td class="col-md-7">Areas of Progress</td>
        <td class="col-md-3" align="center"><?= $quarter_id ?></td>
      </tr>

      <?php
        $subId = '';
        $sql = "Select * from tbl_subject";
        $res = mysql_query($sql);
        while($data = mysql_fetch_array($res)){

            extract($data);
            $subId = $subId.$subject_serial;

            $getVal = mysql_fetch_array(mysql_query("select * from ".$table." where subject_id='".$subject_id."' and child_id='".$pid."' and year='".date('Y')."'"));
    
        ?>

      <tr class="table-row">
        <td class="col-md-2"><?php echo $subject_serial; ?></td>

        <td class="col-md-7" style="text-align: left;padding: 0 5px;"><?php echo $subject_name; ?></td>

        <td class="col-md-3"><input type="text" class="form-control" name="quarter[]" value="<?= $getVal['value'] ?>" required style="width: 80%;margin: 0 10%;" /></td>
      </tr>

      <?php } ?>
    </table>

    <input type="hidden" class="form-control"  name="exam" value="1"/>
    <input type="hidden" class="form-control"  name="child_id" value="<?php echo $child_id; ?>"/>
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
  
    <div class="btn-holder">
      <input type="submit" name="submit_form" class="btn btn-primary" value="Submit" style="float: right;" >

      <a href="child_progress_report1.php"><input type="button" name="backBtn" class="btn btn-primary" value="Back" style="float: right;margin: 0 15px 0 0;" ></a>
    </div>       
      </form>
      
   </div>
   </div>
   </div>
  <!-- Wrapper End --> 
  
  



  <!-- Logo Start -->
  
    <?php
    include('include/footer.php');
    ?>
  <!-- Sidebar Navigation End --> 
  
  
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