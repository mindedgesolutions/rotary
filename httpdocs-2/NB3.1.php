<?php
include('include/admin_sp.php');
date_default_timezone_set("Asia/Kolkata"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compilation Sheet for NBA | <?php include('include/title.php'); ?></title>

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
        xmlhttp.open("GET","get_user10.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script type="text/javascript">
function showUser1(str) {
    if (str == "") {
        document.getElementById("txtHint1").innerHTML = "";
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
                document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_user10.php?p="+str,true);
        xmlhttp.send();
    }
}
</script>

    <!-- Color Css Files Start -->
    <!-- Color Css Files End -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header //-->

      <div class="as-minheader">
        <span class="full-pattren"></span>
        <div class="as-minheader-wrap">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Compilation Sheet for NBA</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="NB3.1.php#">Compilation Sheet for NBA</a></li>
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
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <p>
                    <table width="100%" border="0">
                      <tr>
                        <td colspan="3">Compilation Sheet for "Nation Buliders Award" (Outstanding Teacher Award)</td>
                      </tr>
                      <tr>
                        <td colspan="3">Once completed this sheet will have to be uploaded on www.rotaryteach.org, calculations for this can be doneon the website.</td>
                      </tr>
                      <tr>
                      	<td colspan="3" align="right">Date: <?php echo date('d-m-Y'); ?>&nbsp;&nbsp;&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Type of School</td>
                        <td>Primary &nbsp;&nbsp;<input type="radio" name="r1" value="primary"></td>
                        <td>Elementary &nbsp;&nbsp;<input type="radio" name="r1" value="elementary"></td>
                      </tr>
                      <tr>
                      	<td>District&nbsp;&nbsp;&nbsp;&nbsp;<select name="district_type" style="width:200px;" onchange="showUser(this.value)">
                        <option value="">Select</option>
                        <option value="Rotary Club">Rotary</option>
                        <option value="Inner Wheel">Inner Wheel</option>
                        <option value="Rotaract">Rotaract</option>
                        </select></td>
                        <td colspan="3">
                        <select name="district_list" id="txtHint" onchange="showUser1(this.value)">
                          <option value="">Select District</option>
                        </select>
                          </td>
                      </tr>
                      <tr>
                      	<td>Rotary/Inner Wheel/Rotaract Club of </td>
                        <td colspan="3">
                        <select name="club" id="txtHint1">
                          <option value="">Select Club</option>
						</select></td>
                      </tr>
                      <tr>
                      	<td>Name of the person filling this form </td>
                        <td colspan="3"><input type="text" name="your_name" value="" class="form-control"></td> 
                      </tr>
                      <tr>
                      	<td>Name of the School </td>
                        <td colspan="3"><input type="text" name="name_school" value="" class="form-control"></td> 
                      </tr>
                      <tr>
                      	<td>Address </td>
                        <td colspan="3"><input type="text" name="your_address" value="" class="form-control"></td> 
                      </tr>
                    </table>
                    <form action="#" method="post" name="form" enctype="multipart/form-data" id="form0">
                    <table width="100%" border="0">
                      <tr>
                        <td style="font-size:13px;">Serial.</td>
                        <td style="font-size:12px;">Total marks given by Students *</td>
                        <td style="font-size:12px;">Teacher 1</td>
                        <td style="font-size:12px;">Teacher 2</td>
                        <td style="font-size:12px;">Teacher 3</td>
                        <td style="font-size:12px;">Teacher 4</td>
                        <td style="font-size:12px;">Teacher 5</td>
                        <td style="font-size:12px;">Teacher 6</td>
                        <td style="font-size:12px;">Teacher 7</td>
                        <td style="font-size:12px;">Teacher 8</td>
                        <td style="font-size:12px;">Teacher 9</td>
                        <td style="font-size:12px;">Teacher 10</td>
                        <td style="font-size:12px;">Teacher 11</td>
                        <td style="font-size:12px;">Teacher 12</td>
                        <td style="font-size:12px;">Teacher 13</td>
                        <td style="font-size:12px;">Teacher 14</td>
                        <td style="font-size:13px;">Teacher 15</td>
                      </tr>
                      
					  <tr>
						<td style="font-size:12px;">1</td>
						<td style="font-size:12px;">Student 1</td>
						<td><input type="text" class="form-control" name="teacher_1" value="" min="1" max="10" id="teacher_1"  onkeyup="sum1();" /></td>
                        <td><input type="text" class="form-control" name="teacher_2" value="" min="1" max="10" id="teacher_2"  onkeyup="sum2();"/></td>
                        <td><input type="text" class="form-control" name="teacher_3" value="" min="1" max="10" id="teacher_3"  onkeyup="sum3();"/></td>
                        <td><input type="text" class="form-control" name="teacher_4" value="" min="1" max="10" id="teacher_4"  onkeyup="sum4();"/></td>
                        <td><input type="text" class="form-control" name="teacher_5" value="" min="1" max="10" id="teacher_5"  onkeyup="sum5();"/></td>
                        <td><input type="text" class="form-control" name="teacher_6" value="" min="1" max="10" id="teacher_6"  onkeyup="sum6();"/></td>
                        <td><input type="text" class="form-control" name="teacher_7" value="" min="1" max="10" id="teacher_7"  onkeyup="sum7();"/></td>
                        <td><input type="text" class="form-control" name="teacher_8" value="" min="1" max="10" id="teacher_8"  onkeyup="sum8();"/></td>
                        <td><input type="text" class="form-control" name="teacher_9" value="" min="1" max="10" id="teacher_9"  onkeyup="sum9();"/></td>
                        <td><input type="text" class="form-control" name="teacher_10" value="" min="1" max="10" id="teacher_10"  onkeyup="sum10();"/></td>
                        <td><input type="text" class="form-control" name="teacher_11" value="" min="1" max="10" id="teacher_11"  onkeyup="sum11();"/></td>
                        <td><input type="text" class="form-control" name="teacher_12" value="" min="1" max="10" id="teacher_12"  onkeyup="sum12();"/></td>
                        <td><input type="text" class="form-control" name="teacher_13" value="" min="1" max="10" id="teacher_13"  onkeyup="sum13();"/></td>
                        <td><input type="text" class="form-control" name="teacher_14" value="" min="1" max="10" id="teacher_14"  onkeyup="sum14();"/></td>
                        <td><input type="text" class="form-control" name="teacher_15" value="" min="1" max="10" id="teacher_15"  onkeyup="sum15();"/></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">2</td>
						<td style="font-size:12px;">Student 2</td>
						<td><input type="text" class="form-control" name="teacher_16" value="" id="teacher_16"  onkeyup="sum1();"/></td>
                        <td><input type="text" class="form-control" name="teacher_17" value="" id="teacher_17"  onkeyup="sum2();"/></td>
                        <td><input type="text" class="form-control" name="teacher_18" value="" id="teacher_18"  onkeyup="sum3();"/></td>
                        <td><input type="text" class="form-control" name="teacher_19" value="" id="teacher_19"  onkeyup="sum4();" /></td>
                        <td><input type="text" class="form-control" name="teacher_20" value="" id="teacher_20"  onkeyup="sum5();" /></td>
                        <td><input type="text" class="form-control" name="teacher_21" value="" id="teacher_21"  onkeyup="sum6();" /></td>
                        <td><input type="text" class="form-control" name="teacher_22" value="" id="teacher_22"  onkeyup="sum7();" /></td>
                        <td><input type="text" class="form-control" name="teacher_23" value="" id="teacher_23"  onkeyup="sum8();" /></td>
                        <td><input type="text" class="form-control" name="teacher_24" value="" id="teacher_24"  onkeyup="sum9();" /></td>
                        <td><input type="text" class="form-control" name="teacher_25" value="" id="teacher_25"  onkeyup="sum10();" /></td>
                        <td><input type="text" class="form-control" name="teacher_26" value="" id="teacher_26"  onkeyup="sum11();" /></td>
                        <td><input type="text" class="form-control" name="teacher_27" value="" id="teacher_27"  onkeyup="sum12();" /></td>
                        <td><input type="text" class="form-control" name="teacher_28" value="" id="teacher_28"  onkeyup="sum13();" /></td>
                        <td><input type="text" class="form-control" name="teacher_29" value="" id="teacher_29"  onkeyup="sum14();" /></td>
                        <td><input type="text" class="form-control" name="teacher_30" value="" id="teacher_30"  onkeyup="sum15();" /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">3</td>
						<td style="font-size:12px;">Student 3</td>
						<td><input type="text" class="form-control" name="teacher_31" value="" id="teacher_31"  onkeyup="sum1();" /></td>
                        <td><input type="text" class="form-control" name="teacher_32" value="" id="teacher_32"  onkeyup="sum2();" /></td>
                        <td><input type="text" class="form-control" name="teacher_33" value="" id="teacher_33"  onkeyup="sum3();" /></td>
                        <td><input type="text" class="form-control" name="teacher_34" value="" id="teacher_34"  onkeyup="sum4();" /></td>
                        <td><input type="text" class="form-control" name="teacher_35" value="" id="teacher_35"  onkeyup="sum5();" /></td>
                        <td><input type="text" class="form-control" name="teacher_36" value="" id="teacher_36"  onkeyup="sum6();" /></td>
                        <td><input type="text" class="form-control" name="teacher_37" value="" id="teacher_37"  onkeyup="sum7();" /></td>
                        <td><input type="text" class="form-control" name="teacher_38" value="" id="teacher_38"  onkeyup="sum8();" /></td>
                        <td><input type="text" class="form-control" name="teacher_39" value="" id="teacher_39"  onkeyup="sum9();" /></td>
                        <td><input type="text" class="form-control" name="teacher_40" value="" id="teacher_40"  onkeyup="sum10();" /></td>
                        <td><input type="text" class="form-control" name="teacher_41" value="" id="teacher_41"  onkeyup="sum11();" /></td>
                        <td><input type="text" class="form-control" name="teacher_42" value="" id="teacher_42"  onkeyup="sum12();" /></td>
                        <td><input type="text" class="form-control" name="teacher_43" value="" id="teacher_43"  onkeyup="sum13();" /></td>
                        <td><input type="text" class="form-control" name="teacher_44" value="" id="teacher_44"  onkeyup="sum14();" /></td>
                        <td><input type="text" class="form-control" name="teacher_45" value="" id="teacher_45"  onkeyup="sum15();" /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">4</td>
						<td style="font-size:12px;">Student 4</td>
						<td><input type="text" class="form-control" name="teacher_46" value="" id="teacher_46"  onkeyup="sum1();"/></td>
                        <td><input type="text" class="form-control" name="teacher_47" value="" id="teacher_47"  onkeyup="sum2();" /></td>
                        <td><input type="text" class="form-control" name="teacher_48" value="" id="teacher_48"  onkeyup="sum3();" /></td>
                        <td><input type="text" class="form-control" name="teacher_49" value="" id="teacher_49"  onkeyup="sum4();" /></td>
                        <td><input type="text" class="form-control" name="teacher_50" value="" id="teacher_50"  onkeyup="sum5();"/></td>
                        <td><input type="text" class="form-control" name="teacher_51" value="" id="teacher_51"  onkeyup="sum6();"/></td>
                        <td><input type="text" class="form-control" name="teacher_52" value="" id="teacher_52"  onkeyup="sum7();"/></td>
                        <td><input type="text" class="form-control" name="teacher_53" value="" id="teacher_53"  onkeyup="sum8();"/></td>
                        <td><input type="text" class="form-control" name="teacher_54" value="" id="teacher_54"  onkeyup="sum9();" /></td>
                        <td><input type="text" class="form-control" name="teacher_55" value="" id="teacher_55"  onkeyup="sum10();" /></td>
                        <td><input type="text" class="form-control" name="teacher_56" value="" id="teacher_56"  onkeyup="sum11();" /></td>
                        <td><input type="text" class="form-control" name="teacher_57" value="" id="teacher_57"  onkeyup="sum12();" /></td>
                        <td><input type="text" class="form-control" name="teacher_58" value="" id="teacher_58"  onkeyup="sum13();" /></td>
                        <td><input type="text" class="form-control" name="teacher_60" value="" id="teacher_59"  onkeyup="sum14();" /></td>
                        <td><input type="text" class="form-control" name="teacher_61" value="" id="teacher_61"  onkeyup="sum15();" /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">5</td>
						<td style="font-size:12px;">Student 5</td>
						<td><input type="text" class="form-control" name="teacher_62" value="" id="teacher_62"  onkeyup="sum1();" /></td>
                        <td><input type="text" class="form-control" name="teacher_63" value="" id="teacher_63"  onkeyup="sum2();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_64" value="" id="teacher_64"  onkeyup="sum3();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_65" value="" id="teacher_65"  onkeyup="sum4();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_66" value="" id="teacher_66"  onkeyup="sum5();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_67" value="" id="teacher_67"  onkeyup="sum6();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_68" value="" id="teacher_68"  onkeyup="sum7();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_69" value="" id="teacher_69"  onkeyup="sum8();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_70" value="" id="teacher_70"  onkeyup="sum9();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_71" value="" id="teacher_71"  onkeyup="sum10();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_72" value="" id="teacher_72"  onkeyup="sum11();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_73" value="" id="teacher_73"  onkeyup="sum12();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_74" value="" id="teacher_74"  onkeyup="sum13();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_75" value="" id="teacher_75"  onkeyup="sum14();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_76" value="" id="teacher_76"  onkeyup="sum15();"  /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">6</td>
						<td style="font-size:12px;">Student 6</td>
						<td><input type="text" class="form-control" name="teacher_78" value="" id="teacher_78"  onkeyup="sum1();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_79" value="" id="teacher_79"  onkeyup="sum2();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_80" value="" id="teacher_80"  onkeyup="sum3();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_81" value="" id="teacher_81"  onkeyup="sum4();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_82" value="" id="teacher_82"  onkeyup="sum5();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_83" value="" id="teacher_83"  onkeyup="sum6();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_84" value="" id="teacher_84"  onkeyup="sum7();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_85" value="" id="teacher_85"  onkeyup="sum8();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_86" value="" id="teacher_86"  onkeyup="sum9();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_87" value="" id="teacher_87"  onkeyup="sum10();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_88" value="" id="teacher_88"  onkeyup="sum11();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_89" value="" id="teacher_89"  onkeyup="sum12();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_90" value="" id="teacher_90"  onkeyup="sum13();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_91" value="" id="teacher_91"  onkeyup="sum14();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_92" value="" id="teacher_92"  onkeyup="sum15();"   /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">7</td>
						<td style="font-size:12px;">Student 7</td>
						<td><input type="text" class="form-control" name="teacher_93" value="" id="teacher_93" onkeyup="sum1();"  /></td>
                        <td><input type="text" class="form-control" name="teacher_94" value="" id="teacher_94"  onkeyup="sum2();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_95" value="" id="teacher_95"  onkeyup="sum3();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_96" value="" id="teacher_96"  onkeyup="sum4();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_97" value="" id="teacher_97"  onkeyup="sum5();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_98" value="" id="teacher_98"  onkeyup="sum6();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_99" value="" id="teacher_99"  onkeyup="sum7();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_100" value="" id="teacher_100"  onkeyup="sum8();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_101" value="" id="teacher_101"  onkeyup="sum9();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_102" value="" id="teacher_102"  onkeyup="sum10();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_103" value="" id="teacher_103"  onkeyup="sum11();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_104" value="" id="teacher_104"  onkeyup="sum12();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_105" value="" id="teacher_105"  onkeyup="sum13();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_106" value="" id="teacher_106"  onkeyup="sum14();"   /></td>
                        <td><input type="text" class="form-control" name="teacher_107" value="" id="teacher_107"  onkeyup="sum15();"   /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">8</td>
						<td style="font-size:12px;">Student 8</td>
						<td><input type="text" class="form-control" name="teacher_108" value="" id="teacher_108"  onkeyup="sum1();" /></td>
                        <td><input type="text" class="form-control" name="teacher_109" value="" id="teacher_109"  onkeyup="sum2();" /></td>
                        <td><input type="text" class="form-control" name="teacher_110" value="" id="teacher_110"  onkeyup="sum3();" /></td>
                        <td><input type="text" class="form-control" name="teacher_111" value="" id="teacher_111"  onkeyup="sum4();" /></td>
                        <td><input type="text" class="form-control" name="teacher_112" value="" id="teacher_112"  onkeyup="sum5();" /></td>
                        <td><input type="text" class="form-control" name="teacher_113" value="" id="teacher_113"  onkeyup="sum6();" /></td>
                        <td><input type="text" class="form-control" name="teacher_114" value="" id="teacher_114"  onkeyup="sum7();" /></td>
                        <td><input type="text" class="form-control" name="teacher_115" value="" id="teacher_115"  onkeyup="sum8();" /></td>
                        <td><input type="text" class="form-control" name="teacher_116" value="" id="teacher_116"  onkeyup="sum9();" /></td>
                        <td><input type="text" class="form-control" name="teacher_117" value="" id="teacher_117"  onkeyup="sum10();" /></td>
                        <td><input type="text" class="form-control" name="teacher_118" value="" id="teacher_118"  onkeyup="sum11();" /></td>
                        <td><input type="text" class="form-control" name="teacher_119" value="" id="teacher_119"  onkeyup="sum12();" /></td>
                        <td><input type="text" class="form-control" name="teacher_120" value="" id="teacher_120"  onkeyup="sum13();" /></td>
                        <td><input type="text" class="form-control" name="teacher_121" value="" id="teacher_121"  onkeyup="sum14();" /></td>
                        <td><input type="text" class="form-control" name="teacher_122" value="" id="teacher_122"  onkeyup="sum15();" /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">9</td>
						<td style="font-size:12px;">Student 9</td>
						<td><input type="text" class="form-control" name="teacher_123" value="" id="teacher_123"  onkeyup="sum1();"/></td>
                        <td><input type="text" class="form-control" name="teacher_124" value="" id="teacher_124"  onkeyup="sum2();" /></td>
                        <td><input type="text" class="form-control" name="teacher_125" value="" id="teacher_125"  onkeyup="sum3();" /></td>
                        <td><input type="text" class="form-control" name="teacher_126" value="" id="teacher_126"  onkeyup="sum4();" /></td>
                        <td><input type="text" class="form-control" name="teacher_127" value="" id="teacher_127"  onkeyup="sum5();" /></td>
                        <td><input type="text" class="form-control" name="teacher_128" value="" id="teacher_128"  onkeyup="sum6();" /></td>
                        <td><input type="text" class="form-control" name="teacher_129" value="" id="teacher_129"  onkeyup="sum7();" /></td>
                        <td><input type="text" class="form-control" name="teacher_130" value="" id="teacher_130"  onkeyup="sum8();" /></td>
                        <td><input type="text" class="form-control" name="teacher_131" value="" id="teacher_131"  onkeyup="sum9();" /></td>
                        <td><input type="text" class="form-control" name="teacher_132" value="" id="teacher_132"  onkeyup="sum10();" /></td>
                        <td><input type="text" class="form-control" name="teacher_133" value="" id="teacher_133"  onkeyup="sum11();" /></td>
                        <td><input type="text" class="form-control" name="teacher_134" value="" id="teacher_134"  onkeyup="sum12();" /></td>
                        <td><input type="text" class="form-control" name="teacher_135" value="" id="teacher_135"  onkeyup="sum13();" /></td>
                        <td><input type="text" class="form-control" name="teacher_136" value="" id="teacher_136"  onkeyup="sum14();" /></td>
                        <td><input type="text" class="form-control" name="teacher_137" value="" id="teacher_137"  onkeyup="sum15();" /></td>
					  </tr>
                      
                      <tr>
						<td style="font-size:12px;">10</td>
						<td style="font-size:12px;">Student 10</td>
						<td><input type="text" class="form-control" name="teacher_138" value="" id="teacher_138" onkeyup="sum1();"/></td>
                        <td><input type="text" class="form-control" name="teacher_139" value="" id="teacher_139" onkeyup="sum2();" /></td>
                        <td><input type="text" class="form-control" name="teacher_140" value="" id="teacher_140" onkeyup="sum3();" /></td>
                        <td><input type="text" class="form-control" name="teacher_141" value="" id="teacher_141" onkeyup="sum4();" /></td>
                        <td><input type="text" class="form-control" name="teacher_142" value="" id="teacher_142" onkeyup="sum5();" /></td>
                        <td><input type="text" class="form-control" name="teacher_143" value="" id="teacher_143" onkeyup="sum6();" /></td>
                        <td><input type="text" class="form-control" name="teacher_144" value="" id="teacher_144" onkeyup="sum7();" /></td>
                        <td><input type="text" class="form-control" name="teacher_145" value="" id="teacher_145" onkeyup="sum8();" /></td>
                        <td><input type="text" class="form-control" name="teacher_146" value="" id="teacher_146" onkeyup="sum9();" /></td>
                        <td><input type="text" class="form-control" name="teacher_147" value="" id="teacher_147" onkeyup="sum10();" /></td>
                        <td><input type="text" class="form-control" name="teacher_148" value="" id="teacher_148" onkeyup="sum11();" /></td>
                        <td><input type="text" class="form-control" name="teacher_149" value="" id="teacher_149" onkeyup="sum12();" /></td>
                        <td><input type="text" class="form-control" name="teacher_150" value="" id="teacher_150" onkeyup="sum13();" /></td>
                        <td><input type="text" class="form-control" name="teacher_151" value="" id="teacher_151" onkeyup="sum14();" /></td>
                        <td><input type="text" class="form-control" name="teacher_152" value="" id="teacher_152" onkeyup="sum15();" /></td>
					  </tr>
                      
                      <tr>
                        <td colspan="2" align="center"><strong>TOTAL - A</strong></td>
                        <td><input type="text" class="form-control" name ="total_01" value="" readonly id="total" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_02" value="" readonly id="total_1" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_03" value="" readonly id="total_2" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_04" value="" readonly id="total_3" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_05" value="" readonly id="total_4" onChange="avg();"></td>
                        <td><input type="text" class="form-control" name="total_06" value="" readonly id="total_5" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_07" value="" readonly id="total_6" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_08" value="" readonly id="total_7" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_09" value="" readonly id="total_8" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_010" value="" readonly id="total_9" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_011" value="" readonly id="total_10" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_012" value="" readonly id="total_11" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_013" value="" readonly id="total_12" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_014" value="" readonly id="total_13" onChange="avg();"/></td>
                        <td><input type="text" class="form-control" name="total_015" value="" readonly id="total_14" onChange="avg();"/></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"><strong>AVERAGE - A **</strong></td>
                        <td><input type="text" class="form-control" name="avg_01" value="" readonly id="avg_01" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_02" value="" readonly id="avg_02" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_03" value="" readonly id="avg_03" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_04" value="" readonly id="avg_04" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_05" value="" readonly id="avg_05" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_06" value="" readonly id="avg_06" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_07" value="" readonly id="avg_07" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_08" value="" readonly id="avg_08" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_09" value="" readonly id="avg_09" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_010" value="" readonly id="avg_10" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_011" value="" readonly id="avg_11" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_012" value="" readonly id="avg_12" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_013" value="" readonly id="avg_13" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_014" value="" readonly id="avg_14" onMouseMove="avg();"/></td>
                        <td><input type="text" class="form-control" name="avg_015" value="" readonly id="avg_15" onMouseMove="avg();"/></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"><strong>TOTAL - C </strong></td>
                        <td><input type="text" class="form-control" name="total_c_01" value=""  id="total_c_01" onKeyUp="grand1();"/></td>
                        <td><input type="text" class="form-control" name="total_c_02" value=""  id="total_c_02" onKeyUp="grand2();"/></td>
                        <td><input type="text" class="form-control" name="total_c_03" value=""  id="total_c_03" onKeyUp="grand3();"/></td>
                        <td><input type="text" class="form-control" name="total_c_04" value=""  id="total_c_04" onKeyUp="grand4();"/></td>
                        <td><input type="text" class="form-control" name="total_c_05" value=""  id="total_c_05" onKeyUp="grand5();"/></td>
                        <td><input type="text" class="form-control" name="total_c_06" value=""  id="total_c_06" onKeyUp="grand6();"/></td>
                        <td><input type="text" class="form-control" name="total_c_07" value=""  id="total_c_07" onKeyUp="grand7();"/></td>
                        <td><input type="text" class="form-control" name="total_c_08" value=""  id="total_c_08" onKeyUp="grand8();"/></td>
                        <td><input type="text" class="form-control" name="total_c_09" value=""  id="total_c_09" onKeyUp="grand9();"/></td>
                        <td><input type="text" class="form-control" name="total_c_010" value="" id="total_c_010" onKeyUp="grand10();"/></td>
                        <td><input type="text" class="form-control" name="total_c_011" value="" id="total_c_011" onKeyUp="grand11();"/></td>
                        <td><input type="text" class="form-control" name="total_c_012" value="" id="total_c_012" onKeyUp="grand12();"/></td>
                        <td><input type="text" class="form-control" name="total_c_013" value="" id="total_c_013" onKeyUp="grand13();"/></td>
                        <td><input type="text" class="form-control" name="total_c_014" value="" id="total_c_014" onKeyUp="grand14();"/></td>
                        <td><input type="text" class="form-control" name="total_c_015" value="" id="total_c_015" onKeyUp="grand15();"/></td>
                      </tr>
                      
                      <tr>
                        <td colspan="2" align="center"><strong>GRAND TOTAL </strong></td>
                        <td><input type="text" class="form-control" name="grand_01" value="" readonly id="grand_01"/></td>
                        <td><input type="text" class="form-control" name="grand_02" value="" readonly id="grand_02"/></td>
                        <td><input type="text" class="form-control" name="grand_03" value="" readonly id="grand_03"/></td>
                        <td><input type="text" class="form-control" name="grand_04" value="" readonly id="grand_04"/></td>
                        <td><input type="text" class="form-control" name="grand_05" value="" readonly id="grand_05"/></td>
                        <td><input type="text" class="form-control" name="grand_06" value="" readonly id="grand_06"/></td>
                        <td><input type="text" class="form-control" name="grand_07" value="" readonly id="grand_07"/></td>
                        <td><input type="text" class="form-control" name="grand_08" value="" readonly id="grand_08"/></td>
                        <td><input type="text" class="form-control" name="grand_09" value="" readonly id="grand_09"/></td>
                        <td><input type="text" class="form-control" name="grand_010" value="" readonly id="grand_010"/></td>
                        <td><input type="text" class="form-control" name="grand_011" value="" readonly id="grand_011"/></td>
                        <td><input type="text" class="form-control" name="grand_012" value="" readonly id="grand_012"/></td>
                        <td><input type="text" class="form-control" name="grand_013" value="" readonly id="grand_013"/></td>
                        <td><input type="text" class="form-control" name="grand_014" value="" readonly id="grand_014"/></td>
                        <td><input type="text" class="form-control" name="grand_015" value="" readonly id="grand_015"/></td>
                      </tr>
                      <tr>
                      <td colspan="16" align="center"><input type="submit" name="submit" value="Submit"></td>
                      </tr>
                    </table>
                    </form>


                  </p>
                </div>
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
    <script language="javascript">
   function sum1() {
      var col1 = document.getElementById('teacher_1').value;
      var col2 = document.getElementById('teacher_16').value;
	  var col3 = document.getElementById('teacher_31').value;
	  var col4 = document.getElementById('teacher_46').value;
	  var col5 = document.getElementById('teacher_62').value;
	  var col6 = document.getElementById('teacher_78').value;
	  var col7 = document.getElementById('teacher_93').value;
	  var col8 = document.getElementById('teacher_108').value;
	  var col9 = document.getElementById('teacher_123').value;
	  var col10 = document.getElementById('teacher_138').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
	}
	//////////////////////////////////////////////
	function sum2() {
      var col1 = document.getElementById('teacher_2').value;
      var col2 = document.getElementById('teacher_17').value;
	  var col3 = document.getElementById('teacher_32').value;
	  var col4 = document.getElementById('teacher_47').value;
	  var col5 = document.getElementById('teacher_63').value;
	  var col6 = document.getElementById('teacher_79').value;
	  var col7 = document.getElementById('teacher_94').value;
	  var col8 = document.getElementById('teacher_109').value;
	  var col9 = document.getElementById('teacher_124').value;
	  var col10 = document.getElementById('teacher_139').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_1').value = result;
      }
	}
	/////////////////////////////////////////////////////////////
	function sum3() {
      var col1 = document.getElementById('teacher_3').value;
      var col2 = document.getElementById('teacher_18').value;
	  var col3 = document.getElementById('teacher_33').value;
	  var col4 = document.getElementById('teacher_48').value;
	  var col5 = document.getElementById('teacher_64').value;
	  var col6 = document.getElementById('teacher_80').value;
	  var col7 = document.getElementById('teacher_95').value;
	  var col8 = document.getElementById('teacher_110').value;
	  var col9 = document.getElementById('teacher_125').value;
	  var col10 = document.getElementById('teacher_140').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_2').value = result;
      }
	}
	/////////////////////////////////////////////////////////////////
	function sum4() {
      var col1 = document.getElementById('teacher_4').value;
      var col2 = document.getElementById('teacher_19').value;
	  var col3 = document.getElementById('teacher_34').value;
	  var col4 = document.getElementById('teacher_49').value;
	  var col5 = document.getElementById('teacher_65').value;
	  var col6 = document.getElementById('teacher_81').value;
	  var col7 = document.getElementById('teacher_96').value;
	  var col8 = document.getElementById('teacher_111').value;
	  var col9 = document.getElementById('teacher_126').value;
	  var col10 = document.getElementById('teacher_141').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_3').value = result;
      }
	}
	////////////////////////////////////////////////////////////////////
	function sum5() {
      var col1 = document.getElementById('teacher_5').value;
      var col2 = document.getElementById('teacher_20').value;
	  var col3 = document.getElementById('teacher_35').value;
	  var col4 = document.getElementById('teacher_50').value;
	  var col5 = document.getElementById('teacher_66').value;
	  var col6 = document.getElementById('teacher_82').value;
	  var col7 = document.getElementById('teacher_97').value;
	  var col8 = document.getElementById('teacher_112').value;
	  var col9 = document.getElementById('teacher_127').value;
	  var col10 = document.getElementById('teacher_142').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_4').value = result;
      }
	}
	//////////////////////////////////////////////////////////////////////
	function sum6() {
      var col1 = document.getElementById('teacher_6').value;
      var col2 = document.getElementById('teacher_21').value;
	  var col3 = document.getElementById('teacher_36').value;
	  var col4 = document.getElementById('teacher_51').value;
	  var col5 = document.getElementById('teacher_67').value;
	  var col6 = document.getElementById('teacher_83').value;
	  var col7 = document.getElementById('teacher_98').value;
	  var col8 = document.getElementById('teacher_113').value;
	  var col9 = document.getElementById('teacher_128').value;
	  var col10 = document.getElementById('teacher_143').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_5').value = result;
      }
	}
	/////////////////////////////////////////////////////////////////////
	function sum7() {
      var col1 = document.getElementById('teacher_7').value;
      var col2 = document.getElementById('teacher_22').value;
	  var col3 = document.getElementById('teacher_37').value;
	  var col4 = document.getElementById('teacher_52').value;
	  var col5 = document.getElementById('teacher_68').value;
	  var col6 = document.getElementById('teacher_84').value;
	  var col7 = document.getElementById('teacher_99').value;
	  var col8 = document.getElementById('teacher_114').value;
	  var col9 = document.getElementById('teacher_129').value;
	  var col10 = document.getElementById('teacher_144').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_6').value = result;
      }
	}
	//////////////////////////////////////////////////////////////////////////
	function sum8() {
      var col1 = document.getElementById('teacher_8').value;
      var col2 = document.getElementById('teacher_23').value;
	  var col3 = document.getElementById('teacher_38').value;
	  var col4 = document.getElementById('teacher_53').value;
	  var col5 = document.getElementById('teacher_68').value;
	  var col6 = document.getElementById('teacher_85').value;
	  var col7 = document.getElementById('teacher_100').value;
	  var col8 = document.getElementById('teacher_115').value;
	  var col9 = document.getElementById('teacher_130').value;
	  var col10 = document.getElementById('teacher_145').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_7').value = result;
      }
	}
	////////////////////////////////////////////////////////////////////////////
	function sum9() {
      var col1 = document.getElementById('teacher_9').value;
      var col2 = document.getElementById('teacher_24').value;
	  var col3 = document.getElementById('teacher_39').value;
	  var col4 = document.getElementById('teacher_54').value;
	  var col5 = document.getElementById('teacher_70').value;
	  var col6 = document.getElementById('teacher_86').value;
	  var col7 = document.getElementById('teacher_101').value;
	  var col8 = document.getElementById('teacher_116').value;
	  var col9 = document.getElementById('teacher_131').value;
	  var col10 = document.getElementById('teacher_146').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_8').value = result;
      }
	}
	///////////////////////////////////////////////////////////////////////////////
	function sum10() {
      var col1 = document.getElementById('teacher_10').value;
      var col2 = document.getElementById('teacher_25').value;
	  var col3 = document.getElementById('teacher_38').value;
	  var col4 = document.getElementById('teacher_55').value;
	  var col5 = document.getElementById('teacher_71').value;
	  var col6 = document.getElementById('teacher_87').value;
	  var col7 = document.getElementById('teacher_102').value;
	  var col8 = document.getElementById('teacher_117').value;
	  var col9 = document.getElementById('teacher_132').value;
	  var col10 = document.getElementById('teacher_147').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_9').value = result;
      }
	}
	///////////////////////////////////////////////////////////////////////////////
	function sum11() {
      var col1 = document.getElementById('teacher_11').value;
      var col2 = document.getElementById('teacher_26').value;
	  var col3 = document.getElementById('teacher_39').value;
	  var col4 = document.getElementById('teacher_56').value;
	  var col5 = document.getElementById('teacher_72').value;
	  var col6 = document.getElementById('teacher_88').value;
	  var col7 = document.getElementById('teacher_103').value;
	  var col8 = document.getElementById('teacher_118').value;
	  var col9 = document.getElementById('teacher_133').value;
	  var col10 = document.getElementById('teacher_148').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_10').value = result;
      }
	}
	///////////////////////////////////////////////////////////////////////////////
	function sum12() {
      var col1 = document.getElementById('teacher_12').value;
      var col2 = document.getElementById('teacher_27').value;
	  var col3 = document.getElementById('teacher_40').value;
	  var col4 = document.getElementById('teacher_57').value;
	  var col5 = document.getElementById('teacher_73').value;
	  var col6 = document.getElementById('teacher_89').value;
	  var col7 = document.getElementById('teacher_104').value;
	  var col8 = document.getElementById('teacher_119').value;
	  var col9 = document.getElementById('teacher_134').value;
	  var col10 = document.getElementById('teacher_149').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_11').value = result;
      }
	}
	///////////////////////////////////////////////////////////////////////////////
	function sum13() {
      var col1 = document.getElementById('teacher_13').value;
      var col2 = document.getElementById('teacher_28').value;
	  var col3 = document.getElementById('teacher_41').value;
	  var col4 = document.getElementById('teacher_58').value;
	  var col5 = document.getElementById('teacher_74').value;
	  var col6 = document.getElementById('teacher_90').value;
	  var col7 = document.getElementById('teacher_105').value;
	  var col8 = document.getElementById('teacher_120').value;
	  var col9 = document.getElementById('teacher_135').value;
	  var col10 = document.getElementById('teacher_150').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_12').value = result;
      }
	}
	///////////////////////////////////////////////////////////////////////////////
	function sum14() {
      var col1 = document.getElementById('teacher_14').value;
      var col2 = document.getElementById('teacher_29').value;
	  var col3 = document.getElementById('teacher_42').value;
	  var col4 = document.getElementById('teacher_59').value;
	  var col5 = document.getElementById('teacher_75').value;
	  var col6 = document.getElementById('teacher_91').value;
	  var col7 = document.getElementById('teacher_106').value;
	  var col8 = document.getElementById('teacher_121').value;
	  var col9 = document.getElementById('teacher_135').value;
	  var col10 = document.getElementById('teacher_151').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_13').value = result;
      }
	}
	///////////////////////////////////////////////////////////////////////////////
	function sum15() {
      var col1 = document.getElementById('teacher_15').value;
      var col2 = document.getElementById('teacher_30').value;
	  var col3 = document.getElementById('teacher_45').value;
	  var col4 = document.getElementById('teacher_61').value;
	  var col5 = document.getElementById('teacher_76').value;
	  var col6 = document.getElementById('teacher_92').value;
	  var col7 = document.getElementById('teacher_107').value;
	  var col8 = document.getElementById('teacher_122').value;
	  var col9 = document.getElementById('teacher_137').value;
	  var col10 = document.getElementById('teacher_152').value;
      var result = parseInt(col1) + parseInt(col2 ) + parseInt(col3) + parseInt(col4) + parseInt(col5) + parseInt(col6) + parseInt(col7) + parseInt(col8) + parseInt(col9) + parseInt(col10);
      if (!isNaN(result)) {
         document.getElementById('total_14').value = result;
      }
	}
	
	///////////////////////////////////////////////////////////////////////////////////
	function avg() {
      var col1 = document.getElementById('total').value;
      var col2 = document.getElementById('total_1').value;
	  var col3 = document.getElementById('total_2').value;
	  var col4 = document.getElementById('total_3').value;
	  var col5 = document.getElementById('total_4').value;
	  var col6 = document.getElementById('total_5').value;
	  var col7 = document.getElementById('total_6').value;
	  var col8 = document.getElementById('total_7').value;
	  var col9 = document.getElementById('total_8').value;
	  var col10 = document.getElementById('total_9').value;
	  var col11 = document.getElementById('total_10').value;
	  var col12 = document.getElementById('total_11').value;
	  var col13 = document.getElementById('total_12').value;
	  var col14 = document.getElementById('total_13').value;
	  var col15 = document.getElementById('total_14').value;
	  
      var result_1 = parseInt(col1)/ 10;
	  var result_2 = parseInt(col2)/ 10;
	  var result_3 = parseInt(col3)/ 10;
	  var result_4 = parseInt(col4)/ 10;
	  var result_5 = parseInt(col5)/ 10;
	  var result_6 = parseInt(col6)/ 10;
	  var result_7 = parseInt(col7)/ 10;
	  var result_8 = parseInt(col8)/ 10;
	  var result_9 = parseInt(col9)/10;
	  var result_10 = parseInt(col10)/ 10;
	  var result_11 = parseInt(col11)/ 10;
	  var result_12 = parseInt(col12)/ 10;
	  var result_13 = parseInt(col13)/ 10;
	  var result_14 = parseInt(col14)/ 10;
	  var result_15 = parseInt(col15)/ 10;
	  
	  
      if (!isNaN(result_1)) {
         document.getElementById('avg_01').value = result_1;
      }
	  if (!isNaN(result_2)) {
         document.getElementById('avg_02').value = result_2;
      }
	  if (!isNaN(result_3)) {
         document.getElementById('avg_03').value = result_3;
      }
	  if (!isNaN(result_4)) {
         document.getElementById('avg_04').value = result_4;
      }
	  if (!isNaN(result_5)) {
         document.getElementById('avg_05').value = result_5;
      }
	  if (!isNaN(result_6)) {
         document.getElementById('avg_06').value = result_6;
      }
	  if (!isNaN(result_7)) {
         document.getElementById('avg_07').value = result_7;
      }
	  if (!isNaN(result_8)) {
         document.getElementById('avg_08').value = result_8;
      }
	  if (!isNaN(result_9)) {
         document.getElementById('avg_09').value = result_9;
      }
	  if (!isNaN(result_10)) {
         document.getElementById('avg_10').value = result_10;
      }
	  if (!isNaN(result_11)) {
         document.getElementById('avg_11').value = result_11;
      }
	  if (!isNaN(result_12)) {
         document.getElementById('avg_12').value = result_12;
      }
	  if (!isNaN(result_13)) {
         document.getElementById('avg_13').value = result_13;
      }
	  if (!isNaN(result_14)) {
         document.getElementById('avg_14').value = result_14;
      }
	  if (!isNaN(result_15)) {
         document.getElementById('avg_15').value = result_15;
      }
	   
	}
	
	function grand1() {
      var col1 = document.getElementById('total_c_01').value;
      var col2 = document.getElementById('avg_01').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_01').value = result;
      }
	}
	function grand2() {
      var col1 = document.getElementById('total_c_02').value;
      var col2 = document.getElementById('avg_02').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_02').value = result;
      }
	}
	function grand3() {
      var col1 = document.getElementById('total_c_03').value;
      var col2 = document.getElementById('avg_03').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_03').value = result;
      }
	}
	function grand4() {
      var col1 = document.getElementById('total_c_04').value;
      var col2 = document.getElementById('avg_04').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_04').value = result;
      }
	}
	function grand5() {
      var col1 = document.getElementById('total_c_05').value;
      var col2 = document.getElementById('avg_05').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_05').value = result;
      }
	}
	function grand6() {
      var col1 = document.getElementById('total_c_06').value;
      var col2 = document.getElementById('avg_06').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_06').value = result;
      }
	}
	function grand7() {
      var col1 = document.getElementById('total_c_07').value;
      var col2 = document.getElementById('avg_07').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_07').value = result;
      }
	}
	function grand8() {
      var col1 = document.getElementById('total_c_08').value;
      var col2 = document.getElementById('avg_08').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_08').value = result;
      }
	}
	function grand9() {
      var col1 = document.getElementById('total_c_09').value;
      var col2 = document.getElementById('avg_09').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_09').value = result;
      }
	}
	function grand10() {
      var col1 = document.getElementById('total_c_010').value;
      var col2 = document.getElementById('avg_10').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_010').value = result;
      }
	}
	function grand11() {
      var col1 = document.getElementById('total_c_011').value;
      var col2 = document.getElementById('avg_11').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_011').value = result;
      }
	}
	function grand12() {
      var col1 = document.getElementById('total_c_012').value;
      var col2 = document.getElementById('avg_12').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_012').value = result;
      }
	}
	function grand13() {
      var col1 = document.getElementById('total_c_013').value;
      var col2 = document.getElementById('avg_13').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_013').value = result;
      }
	}
	function grand14() {
      var col1 = document.getElementById('total_c_014').value;
      var col2 = document.getElementById('avg_14').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_014').value = result;
      }
	}function grand15() {
      var col1 = document.getElementById('total_c_015').value;
      var col2 = document.getElementById('avg_15').value;
      var result = parseInt(col1) + parseInt(col2 );
      if (!isNaN(result)) {
         document.getElementById('grand_015').value = result;
      }
	}
	</script>
    
    
    <!-- Search Modal -->
    <?php include('include/search-model.php'); ?>
    <!-- Search Modal -->

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