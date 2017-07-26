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

</style>
<div class="row">

  <div class="col-md-12">
    <div class="as-fancytitle"> <h2>Past Activities</h2> </div>
    <div class="as-fancy-divider-wrap">
      <div class="as-fancy-divider"> <span class="as-first-dote"></span> <span class="as-sec-dote as-bgcolor"></span> 
        <span class="as-third-dote"></span> 
      </div>
    </div>
  </div>


  <div class="as-events as-grid-view">
  <ul class="row">

  <?php
  $query_getDet = mysql_query("select * from rotary32_teach2.past_act where status='activate' order by SLN desc limit 4");
  while ($getDet = mysql_fetch_array($query_getDet)){

    $link = "<a href='".urldecode($getDet['link_url'])."' style='color: #1a53ff;'>".urldecode($getDet['link_text'])."</a>";
  ?>
      <li class="col-md-3" style="height: 275px;">
        <div class="event-wrap hovereffect">
          <figure><img class="btn btn-lg" src="../backend-cms/<?= $getDet['image'] ?>" alt="" title="" data-toggle="modal" data-target="#past_<?= $getDet['SLN'] ?>"></figure>
          <div class="as-event-info">
            <div class="as-info-wrap">
              <h4><strong><?= urldecode($getDet['article_header']) ?></strong></h4>

            </div>
          </div>
        </div>
      </li>

      <div class="modal" id="past_<?= $getDet['SLN'] ?>" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="border : 0; ">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="background-color: #FFFFFF;">
              <div class="row">
                <div class="col-sm-4 col-xs-12">
                  <img src="../backend-cms/<?= $getDet['image'] ?>" alt="prakash-javadekar"  align="left" class="img-responsive"/>
                </div>
                <div class="col-sm-8 col-xs-12"><div style="padding-left : 5px; padding-right : 5px;">
                  <h3>

                  <?= urldecode($getDet['article_header']) ?>

                  </h3>
                </div>

                <div style="padding-left : 5px; padding-right : 5px;">
                  <p align="justify">

                   <?= nl2br(urldecode($getDet['article_content'])) ?><p>

                   <span style="float: left;"><?= $link ?></span>

                  </p></div></div>
                </div>
              </div>
              <div class="modal-footer" style="border : 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

    <?php } ?>

    </ul>
    </div>

  </div>       