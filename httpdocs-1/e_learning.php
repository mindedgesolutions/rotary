<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-learning Program | <?php include('include/title.php'); ?></title>

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
  </head>
  <style>
  #panel1,#panel2,#panel3,#insidePanel1,#insidePanel2,#hardPanel1,#hardPanel2,#hardPanel3{
	display:none;
	padding:20px;
}
.space{
	padding-right:10px;
}
.accord{
	background-color:#d8d8d8;
	padding:25px;
}
a.list { color:#990000;}
a.list:hover { color:#333333}
  </style>
  
  <body style="padding-right:0px;">
    <!-- Color Switcher -->
    <!-- Color Switcher -->

    <!--// Main Wrapper //-->
    <div class="as-mainwrapper">

      <!--// Header //-->
      <header id="as-header" >

        <!--// TopStrip //-->
        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-topstrip as-bgcolor">
            <?php //include('include/top-head-new.php'); ?>
			<?php include('include/top-head.php'); ?>
          </div>
        </div>
        <!--// TopStrip //-->

        <div class="container" style="width:100%;padding-right:0px;padding-left:0px;">
          <div class="as-header-bar">
            <div class="row">
			<div class="col-md-12" style="padding-bottom:10px;padding-top:10px;">
				<div class="col-md-2">
					<a style="float:left;" href="index.php" class="logo1"><img src="images/logo2.png" alt=""></a>
				</div>
             <!--  include('include/logo.php');  -->
              <div class="col-md-10">
                <div>
				  <?php include('include/navigation_mem.php'); ?>
                  <?php //include('include/navigation_new.php'); ?>
                  <?php //include('include/search-bar.php'); ?>
                </div>

                <?php include('include/responsive-menu.php'); ?>

              </div>
			  </div>
            </div>
          </div>
        </div>

      </header>
      <!--// Header //-->

      <div class="as-minheader">
        
        <div class="as-minheader-wrap">
          <div class="container" >
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>E-learning</h1>
                  
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="elearning.php">E-learning</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

       <!--// Main Content //-->
      <div class="as-main-content">
        
        <!--// MainSection //-->
        <div class="as-main-section">
			<div class="container">
				<div class="row">
             
				<div class="col-md-12">
                
					<div class="as-detail-editor">
					<p>This project aim is to improve the quality of elementary education through expanded availability and extensive use of high quality local language and curriculum-based e-learning modules and thus enhance knowledge absorption - retention and critical thinking abilities of children in the selected schools. </p>
					</div>
					<p>The schemes included in this project are:</p>
					<ol style="text-align:left; margin:5px 0 0 0; padding:0 0 0 25px;list-style: lower-roman;">
                    <li style="margin-bottom:15px; line-height:18px;color:#000000;">Establishing e-learning centers in selected elementary schools by equipping them with
						<ul style="text-align:left; margin:5px 0 0 0; padding:0 0 0 25px;list-style-type:circle;">
							<li style="margin-bottom:15px; line-height:18px;color:#000000;">High quality e-learning modules in the respective local languages, stitched together to conform with state-approved curricula of elementary classes (I to X)</li>
							<li style="margin-bottom:15px; line-height:18px;color:#000000;">Projector and-power-pack sets to each e-learning center along with arrangements for requisite maintenance over three years.</li>
						</ul>
					</li>
                    <li style="margin-bottom:15px; line-height:18px;color:#000000;">Training the teachers in the use of these devices.</li>
                  </ol>
				</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 accord">
					<a href="#a" onclick="toggle_visibility('list0');"  class="list">
						<p><i class="fa fa-plus space"></i>Impementation of E-Learning</p></a>
							<div id="list0" style="display:none;">
								<center><img class="img-responsive" src="images/Flowchart for E-learning.jpg" height="800" width="800"></center>
							</div>
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-md-12 accord">
					<a href="#a" onclick="toggle_visibility('list1');"  class="list">
					<p><i class="fa fa-plus space"></i>Software Specifications</p></a>
						<div id="list1" style="display:none;">
							<div class="col-md-10 accord">
							<a href="#a" onclick="toggle_visibility('list2');"  class="list">
								<p><i class="fa fa-plus space"></i>Comparative Chart  for what is available for softwares</p></a>
								<div id="list2" style="display:none;">
									<table width="100%" border="0">
										<tbody>
											<tr>
												<td>
												<!-- <a href="images/chart1.jpg"><img src="images/chart1.jpg" border="0" usemap="#Map"/> -->
												<a href="images/software_venders.jpg"><img src="images/software_venders.jpg" border="0" usemap="#Map"/>
													<map name="Map" id="Map">
													  <area shape="rect" coords="725,35,785,64" href="https://youtu.be/DqYEqzz5Fu4" target="_blank"/>
													  <area shape="rect" coords="727,71,782,105" href="https://youtu.be/xIzYPY44G-g" target="_blank" />
													  <area shape="rect" coords="728,113,780,156" href="https://youtu.be/v8sm-I5-tQY" target="_blank"/>
													  <area shape="rect" coords="728,181,781,215" href="https://youtu.be/leLDZP87B1U" target="_blank"/>
													  <area shape="rect" coords="726,221,780,259" href="https://youtu.be/JDQe4CE5a1w" target="_blank"/>
													  <area shape="rect" coords="722,271,783,309" href="https://youtu.be/KTlweIRXTRI" target="_blank"/>
													  <area shape="rect" coords="723,326,783,368" href="https://youtu.be/NHfGnh3s0aA" target="_blank"/>
													  <area shape="rect" coords="724,370,779,408" href="https://youtu.be/MAdpDjro-wU" target="_blank"/>
													  <area shape="rect" coords="720,419,782,459" href="https://youtu.be/-zemSGlfHWs" target="_blank"/>
													</map>
												</a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-10 accord" id="ssSecond">
							<a href="#a" onclick="toggle_visibility('list3');"  class="list">
								<p><i class="fa fa-plus space"></i>Software companies contact details</p></a>
								<div id="list3" style="display:none;">
									<table width="100%" border="0" bordercolor="#f5f5f5" cellspacing="0" cellpadding="5" align="center" style="text-align:left; 
											font-family:Arial, Helvetica, sans-serif; font-size:12px; border-collapse:collapse" class="link">
										<br />
										<h3><strong><font color="#edb542">The contact details of the Software Companies has been attached herewith.</font></strong></h3>
										<table width="100%" border="0">
											<tbody>
											<tr>
											  <td><b>1. Oxygen</b></td>
											</tr>
											<tr>
											  <td>Name : Dhananjay Wagh</td>
											</tr>
											<tr>
											  <td>Address : "Dr S.K Wagh Empire", Kolhapur Road, Behind Radio Station, Sangli, Maharastra</td>
											</tr>
											<tr>
											  <td>Office : 0233 2331999</td>
											</tr>
											<tr>
											  <td>Mobile : +91 9890903522</td>
											</tr>
											<tr>
											  <td>Email ID : oxygenanim@gmail.com
											  </td>
											</tr>
											</tbody>
										</table>
										<br />
						 
										<table width="100%" border="0">
											<tbody>
											<tr>
											  <td><b>2. Eframe</b></td>
											</tr>
											<tr>
											  <td>Name- Arnab Das</td>
											</tr>
											<tr>
												<td> Address- E–405, City Centre, DC Block, Sector I, Salt lake, Kolkata 700 064</td>
											</tr>
											<tr>
												<td>Mobile- 9836063677</td>
											</tr>
											<tr>
											  <td>Office- 23589107/40063132,</td>
											</tr>
											<tr>
											  <td>Email id- smartstudy@eframe.in</td>
											</tr>
											</tbody>
										</table>
										<br>
										<!--<table width="100%" border="0">
										  <tbody>
											<tr>
											  <td><b>3. CLT</b></td>
											</tr>
											<tr>
											  <td> Name- Omar Wani</td>
											</tr>
											
											<tr>
											  <td>Address- Jakkur, Bengaluru, Karnataka 560064</td>
											</tr>
											<tr>
											  <td>Mobile - 9008174000</td>
											</tr>
											 <tr>
											  <td> Office - 08065596702</td>
											</tr>
											<tr>
											  <td>Email - omar@cltindia.org</td>
											</tr>
										  </tbody>
										</table>-->
										<br>
										<table width="100%" border="0">
										  <tbody>
											<tr>
											  <td><b>4. Espranza/Iscuela</b></td>
											</tr>
											<tr>
											  <td>Name - Maninder Bajwa</td>
											</tr>
											
											<tr>
											  <td>Address - Sebiz square, IT Park, Sector 67 Mohali, Punjab- 160062</td>
											</tr>
											<tr>
											  <td>Mobile - 9815980353</td>
											</tr>
											<tr>
											  <td>Email- maninder@espranza.net</td>
											</tr>
										  </tbody>
										</table>
										<br>
										<table width="100%" border="0">
										  <tbody>
											<tr>
											  <td><b>5. Home Revise</b></td>
											</tr>
											<tr>
											  <td>Name - Leena Kore</td>
											</tr>
											
											<tr>
											  <td>Address- 7th Floor, Odyssey IT Park, Road No.9 Near Old Passport Office, Wagale Estate, Thane West 400604</td>
											</tr>
											<tr>
											  <td>Mobile - +91 9224641352</td>
											</tr>
											<tr>
											  <td>Email - leenakore@homerevise.co.in</td>
											</tr>
										  </tbody>
										</table>
										<br>
										<table width="100%" border="0">
										  <tbody>
											<tr>
											  <td><b>6. Espranza</b></td>
											</tr>
											<tr>
											  <td>Name - Maninder Singh Bajwa</td>
											</tr>
											
											<tr>
											  <td>Address - Sebiz Square, IT Park, Sector 67, Mohali, Punjab - 160062</td>
											</tr>
											<tr>
											  <td>Mobile - +91 9815980353</td>
											</tr>
											<tr>
											  <td>Email - maninder@espranza.net</td>
											</tr>
										  </tbody>
										</table>
										<br>
										<table width="100%" border="0">
										  <tbody>
											<tr>
											  <td><b>7.  JIL Information Technology</b></td>
											</tr>
											<tr>
											  <td>Name - Tanuja Varma</td>
											</tr>
											
											<tr>
											  <td>Address - 64/4, Site IV, Sahibabad Industrial Area, District Ghaziabad - 201010</td>
											</tr>
											<tr>
											  <td>Mobile - +91 9811606969</td>
											</tr>
											<tr>
											  <td>Office - 0120-4964852</td>
											</tr>
											<tr>
											  <td>Email - tanuja.varma@jalindia.co.in</td>
											</tr>
										  </tbody>
										</table>
									</table>         
								</div>
							</div>	
						</div>
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-md-12 accord"  id="hardHead">
					<a href="#a" onclick="toggle_visibility('list4');"  class="list">
					<p><i class="fa fa-plus space"></i>Hardware Specifications</p></a>
						<div id="list4" style="display:none;">
							<div class="col-md-10 accord" id="hardFirst">
							<a href="#a" onclick="toggle_visibility('list5');"  class="list">
								<p><i class="fa fa-plus space"></i>Hardware Specifications</p></a>
								<div id="list5" style="display:none;">
								<center><a href="images/Detail_specification.jpg" target="_blank">
											<img src="images/Detail_specification.jpg" alt="" style="border:#000000 medium solid;" width="970"/>
										</a>
								</center>
								</div>
							</div>
							</br>
							<div class="col-md-10 accord" id="hardSecond">
							<a href="#a" onclick="toggle_visibility('list6');"  class="list">
								<p><i class="fa fa-plus space"></i>Hardware Price Details</p></a>
								<div id="list6" style="display:none;">
									<center><a href="images/new_hardware_prices.jpg" target="_blank">
										<img src="images/new_hardware_prices.jpg" alt="" style="border:#000000 medium solid;"/>
										</a></center>
								</div>
							</div>
							</br>
							<div class="col-md-10 accord" id="hardThird">
							<a href="#a" onclick="toggle_visibility('list7');"  class="list">
								<p><i class="fa fa-plus space"></i>Hardware companies contact details</p></a>
								<div id="list7" style="display:none;">
									<table width="100%" border="0" bordercolor="#f5f5f5" cellspacing="0" cellpadding="5" align="center" style="text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:12px; border-collapse:collapse" class="link">
									<br>
										<h3><strong><font color="#edb542">The contact details of the Hardware Companies has been attached herewith.</font></strong></h3>
										<table width="100%" border="0">
										<tbody>
										<tr>
											<td><b>Egate Infotel Pvt Ltd</b></td>
										</tr>
										<tr>
										  <td>Name : Mr. Diwakar Singh / Ms. Antima Sharma</td>
										</tr>
										<tr>
										  <td>Address : 503, SG Alpha Tower II, Sec – 9 Vasundhara, Ghaziabad (U. P.)</td>
										</tr>
										<tr>
										  <td>Mobile : +91 987151 5550 / +91 99996 31577</td>
										</tr>
										<tr>
										  <td>Office :0120- 4120225 </td>
										</tr>
										<tr>
										  <td>Email ID : sales@egate.pro / rotary@egate.pro
										  </td>
										</tr>
										</tbody>
										</table>
										<br />
										  <table width="100%" border="0">
										  <tbody>
											<tr>
											  <td><b>Tirubaa Technologies Pvt Ltd</b></td>
											</tr>
											<tr>
											  <td>Name : Sanjiv Kadam</td>
											</tr>
											<tr>
											  <td>Designation : Chief Operating Officer </td>
											</tr>
											<tr>
											  <td>Address : Krishnashree, 1294, Shukrawar Peth, Subhash Nagar Road No 7 <br />
												  Pune, Maharashtra – 411 002 
											  </td>
											</tr>
											<tr>
											  <td>Mobile : +91 88053 73500 </td>
											</tr>
											<tr>
											  <td>Office : 020 3029 1000 </td>
											</tr>
											<tr>
											  <td>Email ID : rotaryenquiry@tirubaa.com
											  </td>
											</tr>
										  </tbody>
										</table>
										<br />
									  <table width="100%" border="0">
									  <tbody>
										<tr>
										  <td><b>Oxygen Animation Studio</b></td>
										</tr>
										<tr>
										  <td>Name : Dhananjay Wagh</td>
										</tr>
										<tr>
										  <td>Address : "Dr S.K Wagh Empire", Kolhapur Road, Behind Radio Station, Sangli, Maharastra
										  </td>
										</tr>
										<tr>
										  <td>Mobile : +91 9890903522 </td>
										</tr>
										<tr>
										  <td>Office : 0233 2331999 </td>
										</tr>
										<tr>
										  <td>Email ID : oxygenanim@gmail.com
										  </td>
										</tr>
									  </tbody>
									</table>
										<br/>
										<table width="100%" border="0">
											<tbody>
											<tr>
												<td><b>Eprashala</b></td>
											</tr>
											<tr>
											  <td>Name : Mr. Pramod Shinde</td>
											</tr>
											<tr>
											  <td>Address : Gadrewadi, opposite Municipal school No.7, Uthalsar, Thane (w) 400601</td>
											</tr>
											<tr>
											  <td>Mobile : +91 9869065253</td>
											</tr>
											<tr>
											  <td>Office : 022-25472634</td>
											</tr>
											<tr>
											  <td>Email ID : eprashala@hotmail.com
											  </td>
											</tr>
											</tbody>
											</table>
									</table>              
								</div>
							</div>
						</div>
					</div>
				</div>
				</br>
				<div class="row">
					<div class="col-md-12">
					<h3 style="margin-bottom:20px;"><strong>Forms and Formats</strong></h3>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Requirement_letter_from_District_Authority_EL_1.1.pdf" target="_blank" >Requirement letter from District Authority EL 1.1</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Requirement_letter_from_School_Principal_EL_1.2.pdf" target="_blank" >Requirement letter from School Principal EL 1.2</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Grant_Application_Form_for_E-learning__EL_3.1_.pdf" target="_blank" >Grant Application Form for E-learning EL 3.1</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Pre-installation_Survey_Form_EL_4.1.pdf" target="_blank" >Pre-installation Survey Form EL 4.1</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Project_Upload_Form_for_ELearning__EL_5.1_.pdf" target="_blank" >Project Upload Form for ELearning EL 5.1</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Follow_up_Visit_Form_EL_6.1_a_.pdf" target="_blank" >Follow up Visit Form EL 6.1 a</a></div>					
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Feedback_from_Students_E.L_7.1_a_.pdf" target="_blank" >Feedback from Students EL 7.1 a</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Feedback_from_Teachers_El_7.1_b_.pdf" target="_blank" >Feedback from Teachers EL 7.1 b</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Feedback_from_Parents_7.1__c_.pdf" target="_blank" >Feedback from Parents 7.1 c</a></div>
					<div style="padding-bottom:15px;"><img style="padding-right:15px;" src="images/pdf.png" /><a class="downFormBtn" href="doc_e_learnning/Offline School Survey Form (R1.1)_18_03_17.pdf" target="_blank" >Comprehensive School Survey Form - R(1.1)</a></div>
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
	</div>
    <!-- Search Modal -->
    <?php //include('include/search-model.php'); ?>
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
	
	<script type="text/javascript">
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script> 

  </body>
</html>