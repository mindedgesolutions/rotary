<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Child Screening | <?php include('include/title.php'); ?></title>

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
                  <h1>Child Screening </h1>
                  <!--<p>Phasellus auctor felis quis risus varius ac posuere massa dapibus.</p>-->
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Child Screening </a></li>
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
                   <h3>List of Rotarian Volunteers helping in Asha Kiran Screening all across India.</h3>
                  </p>
                  <div style="text-align:justify; line-height:18px">
				<?php
                 /* $connect = @mysql_connect('localhost','root','');
                  $db = @mysql_select_db('rotary32_teach');*/
                  $connect = @mysql_connect('192.185.36.129','rotary32_arindam','info123');
                  $db = @mysql_select_db('rotary32_teach');
				  
                  $sql = "Select * from screening";
                  $result = mysql_query($sql);
		   		?>
       			<div class="box-body table-responsive">
      <table cellspacing="0" cellpadding="0" border="0" width="100%">
          <tr>
            <td>
              <table width="100%" border="1" cellspacing="0" cellpadding="0" bgcolor="#ec9a22">
                <tr>
                <th width="16%" scope="col">Name</th>
                <th width="10%" scope="col">District</th>
                <th width="18%" scope="col">Club</th>
                </tr>
               </table>
            </td>
          </tr>
          <tr>
            <td>
               <div style="width:100%; height:500px; overflow:auto;">
                 
                 <table cellspacing="0" cellpadding="0" border="0" width="100%" >
                   
                   <?php
					while($row_product = mysql_fetch_array($result)){
					extract($row_product);
				  ?>
				  <tr>
                    <td width="17%"><?php echo $name; ?></td>
                    <td width="11%"><?php echo $dist; ?></td>
                    <td width="18%"><?php echo $club; ?></td>
                    </tr>
                  <?php
					}
				   ?>
                 </table> 
                  
               </div>
            </td>
          </tr>
        </table>

      </div>
              </div>
                </div>
                
                <div class="as-event-gallery">
                  <h2><span class="as-color">screening pictures</span></h2>
                  <ul class="gallery">
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/1.jpg" alt="">
                        <a href="screen/1.jpg" data-rel="prettyPhoto[gallery1]" title="">
                        <i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/2.jpg" alt="">
                        <a href="screen/2.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/3.jpg" alt="">
                        <a href="screen/3.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/4.jpg" alt="">
                        <a href="screen/4.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/5.jpg" alt="">
                        <a href="screen/5.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/6.jpg" alt="">
                        <a href="screen/6.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/7.jpg" alt="">
                        <a href="screen/7.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    <li>
                      <div class="as-event-gallery-wrap">
                        <img src="screen/8.jpg" alt="">
                        <a href="screen/8.jpg" data-rel="prettyPhoto[gallery1]" title=""><i class="fa fa-plus"></i></a>
                      </div>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>
            
        <!--// MainSection //--> 
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