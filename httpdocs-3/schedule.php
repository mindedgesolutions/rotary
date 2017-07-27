<?php 
$pagename = 'schedule';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
<?php include('include/title.php'); ?>
</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/revolution-slider.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper"> 
  
  <!-- Preloader -->
  <div class="preloader"></div>
  
  <!-- Main Header -->
  <header class="main-header">
    <div class="auto-container clearfix"> 
      <!--Logo-->
      <div class="logo">
        <?php include('include/logo.php'); ?>
      </div>
      
      <!--Main Menu-->
      <nav class="main-menu">
        <div class="navbar-header"> 
          <!-- Toggle Button -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="navbar-collapse collapse clearfix">
          <?php include('include/main-menu.php'); ?>
        </div>
      </nav>
      <!--Main Menu End--> 
      
    </div>
  </header>
  <!--End Main Header --> 
  
  <!-- Page Banner -->
  <section class="page-banner" style="background-image:url(images/background/presiden.jpg);">
    <div class="auto-container"> 
      <!--<h1>Schedule for Presidential Conference</h1>--> 
    </div>
  </section>
  
  <!--Schedule Section-->
  <section class="schedule-section">
    <div class="auto-container"> 
      
      <!--Schedule Box-->
      <div class="schedule-box clearfix wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms"> 
        
        <!--Tab Buttons-->
        <ul class="tab-buttons clearfix">
          <li class="tab-btn active" data-id="#friday"><span class="day">Venue: Netaji Indoor Stadium</span> <span class="day">Friday</span><span class="date">11/03/2016</span><span class="curve"></span> </li>
          <li class="tab-btn" data-id="#saturday"><span class="day">Venue: Netaji Indoor Stadium</span> <span class="day">Saturday</span><span class="date">12/03/2016</span><span class="curve"></span> </li>
          <li class="tab-btn" data-id="#sunday"><span class="day">Venue: Netaji Indoor Stadium</span> <span class="day">Sunday</span><span class="date">13/03/2016</span><span class="curve"></span> </li>
        </ul>
        
        <!--Tabs Box-->
        <div class="tabs-box"> 
          
          <!--Tab / Current / Friday-->
          <div class="tab current" id="friday">
            <div class="hour-box active-box">
              <div class="hour">11:00 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Registration at Netaji Indoor Stadium</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Registration at Netaji Indoor Stadium Networking at the House of Friendship at Khudiram Anushilan Kendra 
                    (adjacent to Netaji Indoor Stadium) </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01.30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Delegates to be seated</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01:45 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Inspirational videos</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01:55 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>RTE Anthem</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">02:00 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Literacy Hero Awards</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Literacy Hero Awards Session Chair, PRID Shekhar Mehta.<br>
                    Our National Heroes Shadow art by Prahlad Acharya </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">02:05 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Our Literacy Heroes</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PRID Shekhar Mehta, Chair </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">02:15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Address of the Chief Guest Sri K.N. Tripathi, Hon’ble Governor of West Bengal </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">02:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Selecting the Literacy Heroes</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PDG Ramesh Chander and PDG Anil 
                    Agrawal </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">02:35 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Comments by  Jury  Representative </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">02:40 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Literacy Hero Awards Presentation </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Expression of Gratitude </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Rajani Mukerji, Secretary Presidential
                    Conference </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:35 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>India's Greatest Hero </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Presentation by I Rock Group </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:40 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Tea Break </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Inaugural Session </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Musical presentation by Sapphire Dance
                    Group<br>
                    Session Chair, RID Dr. Manoj Desai<br>
                    Presidential Conference called to order </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:25 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Welcome </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> RID  Dr. Manoj Desai, Convenor </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:35 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Our Journey </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PRID Shekhar Mehta, Chair </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:45 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Hosting this Mega Event </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Kamal Sanghvi, HOC Chair </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:50 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>WASH IN SCHOOLS (WinS) </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>WinS Chair Trustee, PRID Sushil Gupta </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">05:00 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Film on Sachin Tendulkar </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">05:05 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Address by Special Guest
                  Sraddhalu Ranade </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">05:20 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Address by  Guest of Honour </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> TRF Trustee Chair Ray Klinginsmith </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">05:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Address by Chief Guest </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Rotary International President K.R. Ravindran </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">05:50 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Expression of Gratitude </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Anirudha Roychowdhury, Secretary, RILM </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">05:55 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Symphony of South Asia by Sapphire Dance Group </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">06:15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Kaleidoscope </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> (Presenting India's most outstanding talent)<br/>
                    Featuring:<br/>
                    Manik Pal <br/>
                    X1X Dance Group<br/>
                    Yogeswari Mistri<br/>
                    I Rock Crew <br/>
                    V Company </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">07:15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> House of Friendship and Entertainment </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">07:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Departure for Presidential Dinner at Taj Bengal
                  (Ticketed event)</h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> Please note buses will leave sharp at 07.30 PM<br>
                  </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">08:00 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Arrival at Taj Bengal </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">08:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> All seated for Presidential Dinner at Taj Bengal </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> M.O.C. - Presidential Dinner Chair PDG Ashok Gupta<br>
                    Welcome by Conference Chair Shekhar Mehta<br>
                    Address by Director Dr.  Manoj Desai<br>
                    Address by RI President K.R. Ravindran<br>
                    Vote of thanks by Presidential  Dinner Co-chair Utpal Majumdar </p>
                </div>
              </div>
            </div>
          </div>
          <!--Tab / Current / Friday--> 
          
          <!--Tab / Saturday-->
          <div class="tab" id="saturday">
            <div class="hour-box active-box">
              <div class="hour">09:30 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Musical Presentation</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Shadow Art by Prahlad Acharya 
                    (Do not miss these outstanding shows) </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10.00 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Rabindranath Tagore Session - Plenary 1 E-Learning</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Opening remarks by Session Chair
                    Trustee Thomas  M.Thorfinnson </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:00 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Film on E-Shiksha</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:05 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>The Gujarat Initiative</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Ashish Desai </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:10 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Our Partnership</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Anubhav Kapoor </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:20 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Ekta Sodha</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:40 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Expression of Gratitude – PDG Vijay Jalan</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:50 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Pandit Ishwar Chandra Vidyasagar Session - Plenary 2 
                  Adult Literacy</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Session Chair PRID Ashok Mahajan </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:50 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Lets live the dream </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PRIP Kalyan Banerjee, Trustee Chair Elect </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11:00 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Opening remarks by Session Chair </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PRID Ashok Mahajan </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11:05 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Adult Literacy, a presentation through Film</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PRID Ashok Mahajan </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11:10 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Accelerating Literacy though Global Dream</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Dr Sunita Gandhi </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11:20 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>New dimensions in Adult Literacy </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Prof. Dr. S. Y. Shah </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11:35 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Expression of Gratitide </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PDG Benjamin Cherian </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11:45 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Sri Ramakrishna Paramhansa Session - Plenary 3 </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Opening remarks by Session Chair PDG Kamal Sanghvi </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11:50 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>100 Million for 100 Million </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Kailash Satyarthi </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Expression of Gratitide </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PDG Angsuman Bandyopadhyay </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12:35 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Mahatma Gandhi Session - Plenary 4 </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Wash in Schools (WinS)<br>
                    Opening remarks by Session Chair TRF Trustee 
                    PRID Sushil Gupta, Chair WinS </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12:40 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>WASH in Schools </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Building the Context </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12:55 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Rotary's commitment to WASH in Schools </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PDG Ramesh Aggarwal </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01:05 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Swachh Bharat Swachh Vidyalaya : Achieving the outcomes </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>HRD, Government of India</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01:25 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Expression of Gratitude </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Vinay Kulkarni </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Lunch</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">2:45 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Sarvepalli Radhakrishnan Session - Plenary 5 Teacher
                  Support </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Opening remarks by Session Chair <br>
                    PRID Panduranga  Shetty </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">2:50 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Teacher Support, an Audio Visual</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">02:55 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Panel discussion</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Devang Thakore with Chaitali Moitra, Macmillan and Mrigank
                    Mukherjee, British Council </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:10 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Teachers – the Mainstay of the Education System </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Dr. Rukmini Banerji </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:25 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Expression of Gratitude </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> PDG J.B. Kamdar </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:35 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> C.V. Raman Session Plenary 6 Happy Schools <br>
                  Swachha Bharat – Our Commitment <br>
                  Past Rotary International President Raja Saboo </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> Session Chair PRID Yash Pal Das </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:45 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Opening remarks by session Chair </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PRID Yash Pal Das </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:50 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Inner Wheel Shines </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> Mamta Agarwal - IWAP </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">03:55 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Empowering the Girls--
                  PRID Sudarshan Agarwal, 
                  Former Governor of Uttarakhand and Sikkim. </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:05 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Every child deserves a Happy School </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> Vinayak Lohani </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:20 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Presentation of Mementoes </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Deepak Shikarpur </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:22 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Synergy with RILM's Happy Schools </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> A Panel discussion by PDG Ravi Vadlamani <br>
                    SBI, Sanjukta Raiguru, Mr. Prajodh Rajan (Euro Kids), <br>
                    Ishteyaque Amjad and Meenakshi Batra,  CAF India </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:37 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Expression of Gratitude </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Deepak Shikarpur </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">04:50 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Breakaway Sessions </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> Teacher's Support<br>
                    E-learning<br>
                    Adult Literacy<br>
                    Child Development<br>
                    Happy School<br>
                    WinS 1<br>
                    WinS 2 </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">06:15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Move to Main Hall </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">06:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Musical Evening </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">07:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> House of Friendship and Entertainment </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">07:45 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Move to TRF Chair's dinner at
                  Lalit Great Eastern (Ticketed Event) </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">08:00 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Arrival at Lalit Great Eastern </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">08:30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> All seated for TRF Chair's Dinner at Lalit Great Eastern </h3>
                <i class="fa fa-angle-down"></i> </div>
              <div class="content-box">
                <div class="content">
                  <p> M.O.C. – TRF Chair’s Diner – PDG Bharat Pandya<br>
                    Welcome by TRF Trustee PRID Sushil Gupta<br>
                    Address by TRF Trustee Chair Elect Kalyan Banerjee<br>
                    Address by TRF Trustee Chair Ray Klinginsmith<br>
                    Vote of thanks by PDG Jogesh Gambhir </p>
                </div>
              </div>
            </div>
          </div>
          
          <!--Tab / Sunday-->
          <div class="tab" id="sunday">
            <div class="hour-box active-box">
              <div class="hour">09:30 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>The wonder boy on Drums </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Angshuman Nandi </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">09.45 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>South Asia Presentation </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Session Chair PDG Aziz Memon <br>
                    Pakistan : PDG Faiz Kidwai<br>
                    Bangladesh : PDG Salim Reza<br>
                    Nepal : PDG Tirthaman Sakya <br>
                    <br>
                    Expression of Gratitude : PDG  B. Rajan </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10:10 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Plenary 7 WinS</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Opening remarks by Session Chair by PRID P. T. Prabhakar </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10.15 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Standardising school level interventions </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Ms. Mamita Bora Thakkar </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10.25 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> WASH in Schools – A game changer </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Carolyn Johnson </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10.45 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Role of Partnerships </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Srinivas Chary Vedala </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10.45 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Partners in progress : Rotary and World Vision </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Mr. Cherian Thomas </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">10.55 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> WinS in In India -International Support </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> Rtn. Mark Balla </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11.05 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Expression of Gratitude </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PDG Sanjay Khemka </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11.15 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Munshi Premchand Session - Plenary 8 Child Development </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> “Taare Zameen Par” – Presentation by Asha Kiran Children </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11.20 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> Opening remarks by Session Chair</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PRID Shekhar Mehta</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11.25 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3> WinS Overview</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p> PRID Sushil Gupta,Chair WinS </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11.35 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>T-E-A-C-H Overview </h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PRID Shekhar Mehta, Chair</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">11.45 AM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Address by Hon'ble HRD Minister</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Smt Smriti Zubin Irani</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12.15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Recognition and MoU signing </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12.30 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Expression of Gratitude</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PDG Manjunath Shetty </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12.35 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Closing Session</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Session Chair RID Dr. Manoj Desai, Convenor</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12.35 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>The Road Ahead</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>PRID Shekhar Mehta, Chair</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12.45 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Get Set Go</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>RID Dr. Manoj Desai, Convenor </p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">12.55 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Carrying on the baton</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>RIDN N.C Baskar</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01.00 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Closing Remarks</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>Ray Klinginsmith Trustee Chair</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01.05 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>The Last Word</h3>
                <i class="fa fa-angle-down"></i></div>
              <div class="content-box">
                <div class="content">
                  <p>RIP K R Ravindran</p>
                </div>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01.15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Conference Adjourns</h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">01.15 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>Closing presentation Adieu </h3>
              </div>
            </div>
            <div class="hour-box">
              <div class="hour">Upto 04.00 PM</div>
              <div class="img-circle circle"><span></span></div>
              <div class="toggle-btn">
                <h3>House of Friendship At Food Court</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Schedule Box End--> 
      <br>
    </div>
  </section>
  
  <!--Intro Section--> 
  
  <!--Main Footer-->
  <?php include('include/footer.php'); ?>
</div>
<!--End pagewrapper--> 

<!--Scroll to top-->
<div class="scroll-to-top"></div>
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/revolution.min.js"></script> 
<script src="js/bxslider.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/jquery.countdown.js"></script> 
<script src="js/script.js"></script>
</body>
</html>
