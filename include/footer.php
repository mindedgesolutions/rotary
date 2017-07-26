<?php
session_start();
error_reporting(0);

include('include/config-2.php');

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 30; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}

if(!isset($_SESSION['userId'])){
  $_SESSION['userId'] = $randomString;
  
}else{

  $checkSession = mysql_num_rows(mysql_query("select * from rotary32_teach2.traffic_master where user_session='".$_SESSION[userId]."'"));

  if ($checkSession == 0){

    $insertQry = "insert into rotary32_teach2.traffic_master(SLN, url, user_session, visit_time) values('', 'http://rotaryteach.org/', '".$_SESSION[userId]."', '".date('Y-m-d H:i:s')."')";

    mysql_query($insertQry);
  }
}
?>

<div class="row">

            <aside class="widget widget_info col-md-3">
              <a href="http://rotaryteach.org/index.php" class="footer-logo"><img src="http://rotaryteach.org/images/logo2.png" alt=""></a>
              <ul>
                <li><i class="fa fa-home"></i> Skyline House, <br />
                145 Sarat Bose Road, Kolkata, <br />West Bengal, 700 026</li>
                <li><i class="fa fa-envelope-o"></i> <a href="mailto:info@rotaryteach.org" target="_top">info@rotaryteach.org</a></li>
                <li><i class="fa fa-phone"></i> +91 33 2486 3434 / 35</li>
              </ul>

              <ul>
                <li style="height: 20px;"></li>
                <li>
                  Total Visitor :
                  <?php
                  $rowCount = mysql_fetch_array(mysql_query("select count(SLN) as SLN from rotary32_teach2.traffic_master"));

                  $count = 30183 + $rowCount['SLN'];

                  echo $count;
                  ?>
                </li>
              </ul>
            </aside>
            <aside class="widget widget_categories col-md-3">
              <div class="as-strip-title"> <h3>Quick Links</h3> </div>
              <ul>
                <li><a href="about.php">About RILM</a></li>
                <li><a href="introduction_to_teach.php">The T-E-A-C-H Program</a></li>
                <li><a href="http://rotaryteach.org/m-zone.shtml">Member Zone</a></li>
                <li><a href="partner.php">Our Partners</a></li>
                <!--<li><a href="http://www.rotaryteach.org/presidentialconference/index.php">Pres Con 2016</a></li>-->
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="sitemap.php">Sitemap</a></li>
                <li><a href="cancellation_refund.php">Cancellation & Refund Policy</a></li>
                <li><a href="tc.php">Terms & Conditions</a></li>
                <li><a href="pp.php">Privacy Policy</a></li>
              </ul>
            </aside>
            
            <aside class="widget widget_newslatter col-md-3">
            <div class="as-strip-title"> <h3>Go Social With Us !</h3> </div>
			            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/Rotaryteach" data-widget-id="662146860547616768">Tweets by @Rotaryteach</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </aside>
            
            <aside class="widget widget_info col-md-3">
            <div class="as-strip-title"> <h3>&nbsp;</h3> </div>
              <div class="fb-page" data-href="https://www.facebook.com/RotaryIndiaLiteracyMission" data-width="300" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
                           <div class="fb-xfbml-parse-ignore">
                           <blockquote cite="https://www.facebook.com/RotaryIndiaLiteracyMission">
                           <a href="https://www.facebook.com/RotaryIndiaLiteracyMission">Rotary India Literacy Mission</a></blockquote>
                           </div>
                           </div>
            </aside>
            
            
            
            
          </div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>          