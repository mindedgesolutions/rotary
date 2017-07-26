<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";
if(isset($_GET['pid'])){
$pid = $_GET['pid'];
}

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
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="#" class="logo">
  <!-- Add the class icon to your logo image or logo icon to add the margining -->
  </a>
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
          <p>Hello, <?php echo ucfirst($_SESSION['username']); ?></p>
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
  <!--
    <section class="content-header">
      <h1> Product <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>.
        <li><a href="child_profile.php">Catagory</a></li>
        <li class="active">View Detail Product</li>
      </ol>
    </section>
  -->
    <!-- Main content -->
     <section class="content">
     <!-- Small boxes (Stat box) -->
     <div class="box-body table-responsive">
      <fieldset>

      <?php 
        $sql = "select child_name from tbl_child_profile_card where child_id='".$_REQUEST['pid']."'";
        $result = mysql_query($sql);
        if($result){
              while($row = mysql_fetch_array($result)) {
              extract($row);
            }
          }
        ?>

        <?php 
        $sql1 = "Select * from quarter_11 where child_id = '".$_REQUEST['pid']."' and exam='1' and year=(select max(year) as uyear from quarter_11 where child_id = '".$_REQUEST['pid']."')";
        $result1 = mysql_query($sql1);
        while($fetch1 = mysql_fetch_array($result1)){
          $marks1 = $marks1.$fetch1['value'].'+';
        }
        $arrayVal1 = explode('+', $marks1);

        $sql11 = "Select * from quarter_1 where child_id = '".$_REQUEST['pid']."' and exam='1' order by quater_id desc";
        $result11 = mysql_query($sql11);
        while($fetch11 = mysql_fetch_array($result11)){
          $marks11 = $marks11.$fetch11['value'].'+';
        }
        $arrayVal11 = explode('+', $marks11);


        $sql2 = "Select * from quarter_22 where child_id = '".$_REQUEST['pid']."' and exam='2' and year=(select max(year) as uyear from quarter_22 where child_id = '".$_REQUEST['pid']."')";
        $result2 = mysql_query($sql2);
        while($fetch2 = mysql_fetch_array($result2)){
          $marks2 = $marks2.$fetch2['value'].'+';
        }
        $arrayVal2 = explode('+', $marks2);

        $sql22 = "Select * from quarter_2 where child_id = '".$_REQUEST['pid']."' and exam='2' order by quater_id desc";
        $result22 = mysql_query($sql22);
        while($fetch22 = mysql_fetch_array($result22)){
          $marks22 = $marks22.$fetch22['value'].'+';
        }
        $arrayVal22 = explode('+', $marks22);
        

        $sql3 = "Select * from quarter_33 where child_id = '".$_REQUEST['pid']."' and exam='3' and year=(select max(year) as uyear from quarter_33 where child_id = '".$_REQUEST['pid']."')";
        $result3 = mysql_query($sql3);
        while($fetch3 = mysql_fetch_array($result3)){
          $marks3 = $marks3.$fetch3['value'].'+';
        }
        $arrayVal3 = explode('+', $marks3);

        $sql33 = "Select * from quarter_3 where child_id = '".$_REQUEST['pid']."' and exam='3' order by quater_id desc";
        $result33 = mysql_query($sql33);
        while($fetch33 = mysql_fetch_array($result33)){
          $marks33 = $marks33.$fetch33['value'].'+';
        }
        $arrayVal33 = explode('+', $marks33);


        $sql4 = "Select * from quarter_44 where child_id = '".$_REQUEST['pid']."' and exam='4' and year=(select max(year) as uyear from quarter_44 where child_id = '".$_REQUEST['pid']."')";
        $result4 = mysql_query($sql4);
        while($fetch4 = mysql_fetch_array($result4)){
          $marks4 = $marks4.$fetch4['value'].'+';
        }
        $arrayVal4 = explode('+', $marks4);

        $sql44 = "Select * from quarter_4 where child_id = '".$_REQUEST['pid']."' and exam='4' order by quater_id desc";
        $result44 = mysql_query($sql44);
        while($fetch44 = mysql_fetch_array($result44)){
          $marks44 = $marks44.$fetch44['value'].'+';
        }
        $arrayVal44 = explode('+', $marks44);
        ?>

         <table width="100%" border="1">
          <tr>
            <td colspan="6"><center>Child Progress Report Card :&nbsp;<b><i><?php echo $child_name; ?></i></b></center></td>
          </tr>
          <tr>
            <td width="5%" align="center"><strong>Sl. No.</strong></td>
            <td width="35%" align="center"><strong>Areas of Progress</strong></td>
            <td width="15%" align="center"><strong>1st Quarter</strong></td>
            <td width="15%" align="center"><strong>2nd Quarter</strong></td>
            <td width="15%" align="center"><strong>3rd Quarter</strong></td>
            <td width="15%" align="center"><strong>4th Quarter</strong></td>
          </tr>

          <tr>
            <td width="5%" align="center">A</td>
            <td width="35%" align="center" style="text-align: left;">Ability to understand what is been said to him/her in mother tongue</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[0]!=''){$quarter_1_1 = $arrayVal1[0];}
              else{$quarter_1_1 = $arrayVal11[15];}
              echo $quarter_1_1;
            ?>
            </td>

            <td width="15%" align="center">
            <?php
              if ($arrayVal2[0]!=''){$quarter_2_1 = $arrayVal2[0];}
              else{$quarter_2_1 = $arrayVal22[15];}
              echo $quarter_2_1;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[0]!=''){$quarter_3_1 = $arrayVal3[0];}
              else{$quarter_3_1 = $arrayVal33[15];}
              echo $quarter_3_1;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[0]!=''){$quarter_4_1 = $arrayVal4[0];}
              else{$quarter_4_1 = $arrayVal44[15];}
              echo $quarter_4_1;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">A.1</td>
            <td width="35%" align="center" style="text-align: left;">Ability to express his/her ideas in a conclusive manner in mother tongue</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[1]!=''){$quarter_1_2 = $arrayVal1[1];}
              else{$quarter_1_2 = $arrayVal11[14];}
              echo $quarter_1_2;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[1]!=''){$quarter_2_2 = $arrayVal2[1];}
              else{$quarter_2_2 = $arrayVal22[14];}
              echo $quarter_2_2;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[1]!=''){$quarter_3_2 = $arrayVal3[1];}
              else{$quarter_3_2 = $arrayVal33[14];}
              echo $quarter_3_2;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[1]!=''){$quarter_4_2 = $arrayVal4[1];}
              else{$quarter_4_2 = $arrayVal44[14];}
              echo $quarter_4_2;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">A.2</td>
            <td width="35%" align="center" style="text-align: left;">Ability to read in mother tongue</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[2]!=''){$quarter_1_3 = $arrayVal1[2];}
              else{$quarter_1_3 = $arrayVal11[13];}
              echo $quarter_1_3;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[2]!=''){$quarter_2_3 = $arrayVal2[2];}
              else{$quarter_2_3 = $arrayVal22[13];}
              echo $quarter_2_3;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[2]!=''){$quarter_3_3 = $arrayVal3[2];}
              else{$quarter_3_3 = $arrayVal33[13];}
              echo $quarter_3_3;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[2]!=''){$quarter_4_3 = $arrayVal4[2];}
              else{$quarter_4_3 = $arrayVal44[13];}
              echo $quarter_4_3;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">A.3</td>
            <td width="35%" align="center" style="text-align: left;">Ability to write in mother tongue</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[3]!=''){$quarter_1_4 = $arrayVal1[3];}
              else{$quarter_1_4 = $arrayVal11[12];}
              echo $quarter_1_4;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[3]!=''){$quarter_2_4 = $arrayVal2[3];}
              else{$quarter_2_4 = $arrayVal22[12];}
              echo $quarter_2_4;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[3]!=''){$quarter_3_4 = $arrayVal3[3];}
              else{$quarter_3_4 = $arrayVal33[12];}
              echo $quarter_3_4;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[3]!=''){$quarter_4_4 = $arrayVal4[3];}
              else{$quarter_4_4 = $arrayVal44[12];}
              echo $quarter_4_4;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">B</td>
            <td width="35%" align="center" style="text-align: left;">Knowledge in Arithmetic</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[4]!=''){$quarter_1_5 = $arrayVal1[4];}
              else{$quarter_1_5 = $arrayVal11[11];}
              echo $quarter_1_5;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[4]!=''){$quarter_2_5 = $arrayVal2[4];}
              else{$quarter_2_5 = $arrayVal22[11];}
              echo $quarter_2_5;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[4]!=''){$quarter_3_5 = $arrayVal3[4];}
              else{$quarter_3_5 = $arrayVal33[11];}
              echo $quarter_3_5;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[4]!=''){$quarter_4_5 = $arrayVal4[4];}
              else{$quarter_4_5 = $arrayVal44[11];}
              echo $quarter_4_5;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">C</td>
            <td width="35%" align="center" style="text-align: left;">General Knowledge</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[5]!=''){$quarter_1_6 = $arrayVal1[5];}
              else{$quarter_1_6 = $arrayVal11[10];}
              echo $quarter_1_6;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[5]!=''){$quarter_2_6 = $arrayVal2[5];}
              else{$quarter_2_6 = $arrayVal22[10];}
              echo $quarter_2_6;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[5]!=''){$quarter_3_6 = $arrayVal3[5];}
              else{$quarter_3_6 = $arrayVal33[10];}
              echo $quarter_3_6;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[5]!=''){$quarter_4_6 = $arrayVal4[5];}
              else{$quarter_4_6 = $arrayVal44[10];}
              echo $quarter_4_6;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">D</td>
            <td width="35%" align="center" style="text-align: left;">Creative Skill (Games & Sports/drawing/dance/others)</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[6]!=''){$quarter_1_7 = $arrayVal1[6];}
              else{$quarter_1_7 = $arrayVal11[9];}
              echo $quarter_1_7;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[6]!=''){$quarter_2_7 = $arrayVal2[6];}
              else{$quarter_2_7 = $arrayVal22[9];}
              echo $quarter_2_7;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[6]!=''){$quarter_3_7 = $arrayVal3[6];}
              else{$quarter_3_7 = $arrayVal33[9];}
              echo $quarter_3_7;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[6]!=''){$quarter_4_7 = $arrayVal4[6];}
              else{$quarter_4_7 = $arrayVal44[9];}
              echo $quarter_4_7;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">E</td>
            <td width="35%" align="center" style="text-align: left;">Personal Hygiene</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[7]!=''){$quarter_1_8 = $arrayVal1[7];}
              else{$quarter_1_8 = $arrayVal11[8];}
              echo $quarter_1_8;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[7]!=''){$quarter_2_8 = $arrayVal2[7];}
              else{$quarter_2_8 = $arrayVal22[8];}
              echo $quarter_2_8;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[7]!=''){$quarter_3_8 = $arrayVal3[7];}
              else{$quarter_3_8 = $arrayVal33[8];}
              echo $quarter_3_8;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[7]!=''){$quarter_4_8 = $arrayVal4[7];}
              else{$quarter_4_8 = $arrayVal44[8];}
              echo $quarter_4_8;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">F</td>
            <td width="35%" align="center" style="text-align: left;">Attendance</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[8]!=''){$quarter_1_9 = $arrayVal1[8];}
              else{$quarter_1_9 = $arrayVal11[7];}
              echo $quarter_1_9;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[8]!=''){$quarter_2_9 = $arrayVal2[8];}
              else{$quarter_2_9 = $arrayVal22[7];}
              echo $quarter_2_9;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[8]!=''){$quarter_3_9 = $arrayVal3[8];}
              else{$quarter_3_9 = $arrayVal33[7];}
              echo $quarter_3_9;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[8]!=''){$quarter_4_9 = $arrayVal4[8];}
              else{$quarter_4_9 = $arrayVal44[7];}
              echo $quarter_4_9;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">G</td>
            <td width="35%" align="center" style="text-align: left;">Discipline</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[9]!=''){$quarter_1_10 = $arrayVal1[9];}
              else{$quarter_1_10 = $arrayVal11[6];}
              echo $quarter_1_10;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[9]!=''){$quarter_2_10 = $arrayVal2[9];}
              else{$quarter_2_10 = $arrayVal22[6];}
              echo $quarter_2_10;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[9]!=''){$quarter_3_10 = $arrayVal3[9];}
              else{$quarter_3_10 = $arrayVal33[6];}
              echo $quarter_3_10;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[9]!=''){$quarter_4_10 = $arrayVal4[9];}
              else{$quarter_4_10 = $arrayVal44[6];}
              echo $quarter_4_10;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">H</td>
            <td width="35%" align="center" style="text-align: left;">Sociability (Participation, Group interaction, etc.)</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[10]!=''){$quarter_1_11 = $arrayVal1[10];}
              else{$quarter_1_11 = $arrayVal11[5];}
              echo $quarter_1_11;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[10]!=''){$quarter_2_11 = $arrayVal2[10];}
              else{$quarter_2_11 = $arrayVal22[5];}
              echo $quarter_2_11;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[10]!=''){$quarter_3_11 = $arrayVal3[10];}
              else{$quarter_3_11 = $arrayVal33[5];}
              echo $quarter_3_11;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[10]!=''){$quarter_4_11 = $arrayVal4[10];}
              else{$quarter_4_11 = $arrayVal44[5];}
              echo $quarter_4_11;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">I</td>
            <td width="35%" align="center" style="text-align: left;">Leadership quality</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[11]!=''){$quarter_1_12 = $arrayVal1[11];}
              else{$quarter_1_12 = $arrayVal11[4];}
              echo $quarter_1_12;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[11]!=''){$quarter_2_12 = $arrayVal2[11];}
              else{$quarter_2_12 = $arrayVal22[4];}
              echo $quarter_2_12;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[11]!=''){$quarter_3_12 = $arrayVal3[11];}
              else{$quarter_3_12 = $arrayVal33[4];}
              echo $quarter_3_12;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[11]!=''){$quarter_4_12 = $arrayVal4[11];}
              else{$quarter_4_12 = $arrayVal44[4];}
              echo $quarter_4_12;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">J</td>
            <td width="35%" align="center" style="text-align: left;">Teacher's overall opinion about the student</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[12]!=''){$quarter_1_13 = $arrayVal1[12];}
              else{$quarter_1_13 = $arrayVal11[3];}
              echo $quarter_1_13;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[12]!=''){$quarter_2_13 = $arrayVal2[12];}
              else{$quarter_2_13 = $arrayVal22[3];}
              echo $quarter_2_13;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[12]!=''){$quarter_3_13 = $arrayVal3[12];}
              else{$quarter_3_13 = $arrayVal33[3];}
              echo $quarter_3_13;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[12]!=''){$quarter_4_13 = $arrayVal4[12];}
              else{$quarter_4_13 = $arrayVal44[3];}
              echo $quarter_4_13;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">K</td>
            <td width="35%" align="center" style="text-align: left;">Above mentioned abilities of the child are commensurate to class</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[13]!=''){$quarter_1_14 = $arrayVal1[13];}
              else{$quarter_1_14 = $arrayVal11[2];}
              echo $quarter_1_14;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[13]!=''){$quarter_2_14 = $arrayVal2[13];}
              else{$quarter_2_14 = $arrayVal22[2];}
              echo $quarter_2_14;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[13]!=''){$quarter_3_14 = $arrayVal3[13];}
              else{$quarter_3_14 = $arrayVal33[2];}
              echo $quarter_3_14;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[13]!=''){$quarter_4_14 = $arrayVal4[13];}
              else{$quarter_4_14 = $arrayVal44[2];}
              echo $quarter_4_14;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">L</td>
            <td width="35%" align="center" style="text-align: left;">Date of Admission in Government School/back to school</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[14]!=''){$quarter_1_15 = $arrayVal1[14];}
              else{$quarter_1_15 = $arrayVal11[1];}
              echo $quarter_1_15;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[14]!=''){$quarter_2_15 = $arrayVal2[14];}
              else{$quarter_2_15 = $arrayVal22[1];}
              echo $quarter_2_15;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[14]!=''){$quarter_3_15 = $arrayVal3[14];}
              else{$quarter_3_15 = $arrayVal33[1];}
              echo $quarter_3_15;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[14]!=''){$quarter_4_15 = $arrayVal4[14];}
              else{$quarter_4_15 = $arrayVal44[1];}
              echo $quarter_4_15;
            ?>
            </td>
          </tr>

          <tr>
            <td width="5%" align="center">M</td>
            <td width="35%" align="center" style="text-align: left;">Name of the School where the child admitted/readmitted</td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal1[15]!=''){$quarter_1_16 = $arrayVal1[15];}
              else{$quarter_1_16 = $arrayVal11[0];}
              echo $quarter_1_16;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal2[15]!=''){$quarter_2_16 = $arrayVal2[15];}
              else{$quarter_2_16 = $arrayVal22[0];}
              echo $quarter_2_16;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal3[15]!=''){$quarter_3_16 = $arrayVal3[15];}
              else{$quarter_3_16 = $arrayVal33[0];}
              echo $quarter_3_16;
            ?>
            </td>
            <td width="15%" align="center">
            <?php
              if ($arrayVal4[15]!=''){$quarter_4_16 = $arrayVal4[15];}
              else{$quarter_4_16 = $arrayVal44[0];}
              echo $quarter_4_16;
            ?>
            </td>
          </tr>

          </table>
          </fieldset>
          </div>
      <!-- /.box-body -->
      <br>
    <br>
      <div class="box-footer">
      <a href="view_child_progress.php?pid=<?php echo $pid; ?>"><button class="btn btn-success btn-sm">Back</button></a>
        <!--&nbsp;
      <a href="edit_child_profile.php?pid=<?php //echo $child_id; ?>"><button class="btn btn-success btn-sm">Modify</button></a>-->
      </div>
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