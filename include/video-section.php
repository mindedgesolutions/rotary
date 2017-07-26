<head>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/revolution-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link href="css/responsive.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link href="css/hover.css" rel="stylesheet">
</head>
<style>
.modal-header:before,.modal-header:after {border-top:none!important;}

#goBtn{
  background-color: transparent;
  border: 1px solid #b7b7b7;
  color: #b7b7b7;
  padding: 15px 25px;
  transition: all 0.2s linear;
}
#goBtn:hover{
  border: 1px solid #edb542;
  color: #edb542;
}
</style>
<div class="row">

  <div class="col-md-12">
    <div class="as-fancytitle"> <h2>Latest Videos</h2> </div>
    <div class="as-fancy-divider-wrap">
      <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> 
        <span class="as-third-dote"></span> 
      </div>
    </div>
  </div>


  <div class="as-events as-grid-view">
  <ul class="row">

  <?php
  $query_getDet = mysql_query("select * from rotary32_teach2.video_master where status='activate' order by SLN desc limit 3");
  while ($getDet = mysql_fetch_array($query_getDet)){

    $ytCode = substr($getDet['video'], -11);
  ?>
      <li class="col-md-4" style="height: 275px;">
        <div class="event-wrap hovereffect">
          <figure>
            <iframe width="356" height="200" src="https://www.youtube.com/embed/<?= $ytCode ?>" frameborder="0" allowfullscreen></iframe>
          </figure>
          <div class="as-event-info">
            <div class="as-info-wrap">
              <h4><strong><?= urldecode($getDet['video_header']) ?></strong></h4>

            </div>
          </div>
        </div>
      </li>

    <?php } ?>

    </ul>

    <div class="col-md-12" style="text-align: center;margin: 0 0 40px 0;">
      <a href="media.php" style="text-decoration: none;"><input type="button" name="goBtn" id="goBtn" value="More Videos" /></a>
    </div>

  </div>