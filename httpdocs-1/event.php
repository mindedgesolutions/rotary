<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event List | Helping-Hand</title>

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
                  <?php include('include/search-bar.php'); ?>
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
                  <h1>Event</h1>
                  <p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="home.php">Home</a></li>
                  <li><a href="event.php">Event</a></li>
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
             
              <div class="col-md-9">
                <!-- <div class="as-content-title"> <h2>Blog <span class="as-color">Large</span></h2> </div> -->
                
                <div class="as-events as-list-view">
                  <ul class="row">
                    <li class="col-md-12">
                      <div class="event-wrap">
                        <div class="event-thumb-section">
                          <figure>
                            <img src="extra-images/event-list1.jpg" alt="">
                            <figcaption>
                              <div class="map-btn"><a id="btn-one" class="view-map as-bgcolor">VIEW MAP</a></div>
                              <div class="as-event-map" id="map-one">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317716.36474144517!2d-0.10159865000003898!3d51.52864165000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2s!4v1435239524443"  height="247"></iframe>
                              </div>
                            </figcaption>
                          </figure>
                          <div class="as-short-info">
                            <time datetime="2008-02-14 20:00"><i class="fa fa-clock-o"></i> 10:52 TO 10:52</time>
                            <div class="ev-tag">
                              <i class="fa fa-align-left"></i>
                              <a href="event-list.html#">CHARITY,</a>
                              <a href="event-list.html#">POLITICAL</a>
                              <a href="event-list.html#">EVENTS,</a>
                              <a href="event-list.html#">PRAYERS</a>
                            </div>
                          </div>
                        </div>
                        <div class="as-event-info">
                          <div class="as-info-wrap">
                            <time datetime="2008-02-14 20:00"><span>SUNDAY</span> 24, mAY <span>DECEMBER</span></time>
                            <h3><a href="event-list.html#">Democratic Republic</a></h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptem accusanum doloreque laudtium. error sit voluptatem</p>
                            <ul>
                              <li><i class="fa fa-map-marker"></i> 123 Eccles Old Road, Manchester, UK</li>
                              <li><i class="fa fa-facebook-official"></i> Follow us on Facebook</li>
                            </ul>
                          </div>
                          <a href="event-list.html#" class="as-event-btn">UPCOMING</a>
                        </div>
                      </div>
                    </li>
                    <li class="col-md-12">
                      <div class="event-wrap">
                        <div class="event-thumb-section">
                          <figure>
                            <img src="extra-images/event-list2.jpg" alt="">
                            <figcaption>
                              <div class="map-btn"><a id="btn-two" class="view-map as-bgcolor">VIEW MAP</a></div>
                              <div class="as-event-map" id="map-two">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317716.36474144517!2d-0.10159865000003898!3d51.52864165000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2s!4v1435239524443"  height="247"></iframe>
                              </div>
                            </figcaption>
                          </figure>
                          <div class="as-short-info">
                            <time datetime="2008-02-14 20:00"><i class="fa fa-clock-o"></i> 10:52 TO 10:52</time>
                            <div class="ev-tag">
                              <i class="fa fa-align-left"></i>
                              <a href="event-list.html#">CHARITY,</a>
                              <a href="event-list.html#">POLITICAL</a>
                              <a href="event-list.html#">EVENTS,</a>
                              <a href="event-list.html#">PRAYERS</a>
                            </div>
                          </div>
                        </div>
                        <div class="as-event-info">
                          <div class="as-info-wrap">
                            <time datetime="2008-02-14 20:00"><span>SUNDAY</span> 24, mAY <span>DECEMBER</span></time>
                            <h3><a href="event-list.html#">Democratic Republic</a></h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptem accusanum doloreque laudtium. error sit voluptatem</p>
                            <ul>
                              <li><i class="fa fa-map-marker"></i> 123 Eccles Old Road, Manchester, UK</li>
                              <li><i class="fa fa-facebook-official"></i> Follow us on Facebook</li>
                            </ul>
                          </div>
                          <a href="event-list.html#" class="as-event-btn as-cnl">CANCELLED</a>
                        </div>
                      </div>
                    </li>
                    <li class="col-md-12">
                      <div class="event-wrap">
                        <div class="event-thumb-section">
                          <figure>
                            <img src="extra-images/event-list3.jpg" alt="">
                            <figcaption>
                              <div class="map-btn"><a id="btn-three" class="view-map as-bgcolor">VIEW MAP</a></div>
                              <div class="as-event-map" id="map-three">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317716.36474144517!2d-0.10159865000003898!3d51.52864165000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2s!4v1435239524443"  height="247"></iframe>
                              </div>
                            </figcaption>
                          </figure>
                          <div class="as-short-info">
                            <time datetime="2008-02-14 20:00"><i class="fa fa-clock-o"></i> 10:52 TO 10:52</time>
                            <div class="ev-tag">
                              <i class="fa fa-align-left"></i>
                              <a href="event-list.html#">CHARITY,</a>
                              <a href="event-list.html#">POLITICAL</a>
                              <a href="event-list.html#">EVENTS,</a>
                              <a href="event-list.html#">PRAYERS</a>
                            </div>
                          </div>
                        </div>
                        <div class="as-event-info">
                          <div class="as-info-wrap">
                            <time datetime="2008-02-14 20:00"><span>SUNDAY</span> 24, mAY <span>DECEMBER</span></time>
                            <h3><a href="event-list.html#">Democratic Republic</a></h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptem accusanum doloreque laudtium. error sit voluptatem</p>
                            <ul>
                              <li><i class="fa fa-map-marker"></i> 123 Eccles Old Road, Manchester, UK</li>
                              <li><i class="fa fa-facebook-official"></i> Follow us on Facebook</li>
                            </ul>
                          </div>
                          <a href="event-list.html#" class="as-event-btn as-free">FREE</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>

                <!--// Pagination //-->
                <ul class="as-pagination">
                  <li><a href="event-list.html#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="event-list.html#">1</a></li>
                  <li class="active"><a href="event-list.html#">2</a></li>
                  <li><a href="event-list.html#">3</a></li>
                  <li><a href="event-list.html#">4</a></li>
                  <li><a href="event-list.html#">5</a></li>
                  <li><a href="event-list.html#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!--// Pagination //-->

              </div>
              <aside class="col-md-3">

                <!--// Widget Categories //-->
                <div class="widget widget_categories">
                  <div class="as-strip-title"> <h2>CATEGORY <span class="as-color">WIDGET</span></h2> </div>
                  <ul>
                    <li><a href="event-list.html#">About Us</a></li>
                    <li><a href="event-list.html#">Delivery Information</a></li>
                    <li><a href="event-list.html#">Terms and Conditions</a></li>
                    <li><a href="event-list.html#">Privacy Policy</a></li>
                    <li><a href="event-list.html#">Contact Us</a></li>
                    <li><a href="event-list.html#">Return Policy</a></li>
                  </ul>
                </div>
                <!--// Widget Categories //-->

                <!--// Widget RecentPost //-->
                <div class="widget widget_recent_post">
                  <div class="as-strip-title"> <h2>RECENT <span class="as-color">POST</span></h2> </div>
                  <ul>
                    <li>
                      <figure><a href="event-list.html#" class="as-thumb"><img src="extra-images/recent-post1.jpg" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                        <figcaption>
                          <h4><a href="event-list.html#">Democratic Republic</a></h4>
                          <p>This is Photoshop's version  of Lorem Ipsum. enim.</p>
                        </figcaption>
                      </figure>
                    </li>
                    <li>
                      <figure><a href="event-list.html#" class="as-thumb"><img src="extra-images/recent-post2.jpg" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                        <figcaption>
                          <h4><a href="event-list.html#">Democratic Republic</a></h4>
                          <p>This is Photoshop's version  of Lorem Ipsum. enim.</p>
                        </figcaption>
                      </figure>
                    </li>
                    <li>
                      <figure><a href="event-list.html#" class="as-thumb"><img src="extra-images/recent-post3.jpg" alt=""> <span class="fa fa-angle-double-right as-hover-icon"></span></a>
                        <figcaption>
                          <h4><a href="event-list.html#">Democratic Republic</a></h4>
                          <p>This is Photoshop's version  of Lorem Ipsum. enim.</p>
                        </figcaption>
                      </figure>
                    </li>
                  </ul>
                </div>
                <!--// Widget RecentPost //-->

                <!--// Widget Twitter //-->
                <div class="widget widget_twitter">
                  <div class="as-strip-title"> <h2>twitter <span class="as-color">Feed</span></h2> </div>
                  <ul>
                    <li>
                      <span class="as-color">@Lorem Ipsum</span> Looking cautiously round, to ascerta in that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily. <a href="event-list.html#">#Quote</a>
                    </li>
                    <li>
                      <span class="as-color">@Lorem Ipsum</span> Looking cautiously round, to ascerta in that they were not overheard, the two hags cowered nearer to the fire, and chuckled heartily. <a href="event-list.html#">#Quote</a>
                    </li>
                  </ul>
                </div>
                <!--// Widget Twitter //-->

                <!--// Widget Search //-->
                <div class="widget widget_search">
                  <div class="as-strip-title"> <h2>Search <span class="as-color">WIDGET</span></h2> </div>
                  <form>
                    <input type="text" placeholder="Search here..">
                    <label><input type="submit" value=""></label>
                  </form>
                </div>
                <!--// Widget Twitter //-->

              </aside>

            </div>
          </div>
        </div>
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