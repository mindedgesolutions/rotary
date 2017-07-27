<?php
include('include/config_rigd.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form | <?php include('include/title.php'); ?></title>

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
                  <h1>Student Volunteer</h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="registration_rigd.php#">Student Volunteer </a></li>
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
            
                <form action="volunteer.php" method="post" enctype="multipart/form-data" name="">
                  <table class="table">
                        <thead>
                            <tr>
                            <th height="62" colspan="3" align="center">Student Volunteer Registration Form</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="22%"><p id="text">Your Name <font color="#FF0000">*</font></p></td>
                                <td colspan="2"><input id="name" name="name" type="text" placeholder="Your Name" required class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Father/Mother's Name <font color="#FF0000">*</font></p></td>
                                <td colspan="2">
                                <input id="father_name" name="father_name" type="text" placeholder="Father/Mother's Name" class="form-control" ></td>
                            </tr>
                            <tr>
                              <td width="22%"><p id="text">School / College Name <font color="#FF0000">*</font></p></td>
                              <td colspan="2">
                              <input id="school_name" name="school_name" type="text" placeholder="School / College Name" required class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">City <font color="#FF0000">*</font></p></td>
                                <td colspan="2"><input id="city" name="city" type="text" placeholder="City" required class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">State <font color="#FF0000">*</font></p></td>
                                <td colspan="2">
                                <select id="state" name="state" required>
                                <option value="">Select State</option>
                                  <?php 
									$sql=mysql_query("select * from sp_tbl_states");
									while($row = mysql_fetch_array($sql))
									{
									$data=$row['state'];
									$data_id=$row['id'];
									?>
									<option value="<?php echo $data_id; ?>"><?php echo $data; ?></option>
									<?php
									 } 
								   ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Your Class/Standard</p></td>
                                <td colspan="2">
                                <select id="stdn" name="stdn">
                                <option value="">Select Class/Standard</option>
                                <?php 
									$sql=mysql_query("select * from sp_tbl_qualification");
									while($row = mysql_fetch_array($sql))
									{
									$data=$row['qualification_code'];
									$data_quali=$row['qualification_id'];
									?>
									<option value="<?php echo $data_quali; ?>"><?php echo $data; ?></option>
									<?php
									 } 
								   ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Section</p></td>
                                <td colspan="2"><input id="section" name="section" type="text" placeholder="Section" class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">College / Professional</p></td>
                                <td colspan="2"><input id="other" name="other" type="text" placeholder="College / Professional" class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Mobile <font color="#FF0000">*</font></p></td>
                                <td colspan="2"><input id="mobile" name="mobile" type="text" placeholder="Mobile" required class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Email ID (Father or Mother) <font color="#FF0000">*</font></p></td>
                                <td colspan="2">
                                <input id="email" name="email" type="email" placeholder="Email ID (Father or Mother)" class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Your Email ID</p></td>
                                <td width="70%"><input id="your_email" name="your_email" type="email" placeholder="Your Email ID" class="form-control" ></td>
                                <td width="8%"><p id="text">(Optional)</p></td>
                            </tr>
                            <tr><td colspan="3" height="20">&nbsp;</td></tr>
                            <tr>
                            <td colspan="3" style="padding-left:20px; text-transform:capitalize; font-size:24px;"><strong>Adult Learner Details</strong></td>
                            </tr>
                            <tr><td colspan="3" height="20">&nbsp;</td></tr>
                            <tr>
                             <td width="22%"><p id="text">Name <font color="#FF0000">*</font></p></td>
                             <td width="70%" colspan="2">
                             <input id="adult_name" name="adult_name" type="text" placeholder="Adult Learner Name" required class="form-control" ></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Age</p></td>
                                <td width="70%"><input id="age" name="age" type="text" placeholder="Age" class="form-control" ></td>
                                <td width="8%"><p id="text">(Optional)</p></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Sex</p></td>
                                <td width="70%"><input id="sex" name="sex" type="text" placeholder="Sex" class="form-control" ></td>
                                <td width="8%"><p id="text">(Optional)</p></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Occupation</p></td>
                                <td width="70%"><input id="occupation" name="occupation" type="text" placeholder="Occupation" class="form-control" ></td>
                                <td width="8%"><p id="text">(Optional)</p></td>
                            </tr>
                            <tr>
                                <td width="22%"><p id="text">Mother Tounge</p></td>
                                <td width="70%"><input id="m_tounge" name="m_tounge" type="text" placeholder="Mother Tounge" class="form-control" ></td>
                                <td width="8%"><p id="text">(Optional)</p></td>
                            </tr>
                            <tr>
                             <td width="22%"><p id="text">Current Place of Stay</p></td>
                             <td width="70%"><input id="stay_place" name="stay_place" type="text" placeholder="Current Place of Stay" class="form-control" >
                             </td>
                                <td width="8%"><p id="text">(Optional)</p></td>
                            </tr>
                            <tr>
                              <td width="22%"><p id="text">Originally From</p></td>
                              <td width="70%"><input id="original_from" name="original_from" type="text" placeholder="Originally From" class="form-control" >
                              </td>
                                <td width="8%"><p id="text">(Optional)</p></td>
                            </tr>
                            <tr>
                            	<td colspan="3">
                                <input type="checkbox" value="1" name="allow_receive_notification" id="allow_receive_notification"> &nbsp;
                                I also consent to Rotary Global Dream sending 
                                SMS/e-mail alerts on this subject till the project is completed.<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>[NB: If your answer is 'Yes', please check in the box and  for 'No', please leave it empty]</strong>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="3">
                                <input type="checkbox"  class="agree" required><strong> &nbsp;
                                I hereby agree to participate wholeheartedly in the Swabhiman Campaign by reaching out to and making atleast one adult (15+)
                                literate.</strong>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="3" align="center"><input name="submit" type="submit" class="dt-sc-button medium" value="Submit"></td>
                            </tr>
                        </tbody>
                    </table>
                  </form>
              
            </div>
          </div>
        </div>
        <!--// MainSection //-->

        <!--// MainSection //-->
        <!--// MainSection //-->

        <!--// MainSection //-->
        <!--// MainSection //-->
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