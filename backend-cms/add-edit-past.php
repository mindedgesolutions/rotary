<?php include 'include/config-2.php'; ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from past_act where article_id='".base64_decode($_REQUEST['aid'])."'"));
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include('include/title.php'); ?>

<?php include 'include/header-link.php'; ?>

<style type="text/css">

.container{
  margin-bottom:20px;
  min-height: 350px;
}
.table-tr{
  height: 60px;
  line-height: 60px;
}
#thumb-output, #thumb-output-1{
  width: 250px;
  height: 250px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  margin: 15px 5px 0 5px;
  float: left;
}
#thumb-output img, #thumb-output-1 img{
  width: 100%;
  height: 100%;
}
#article_content{
  resize: none;
  height: 120px;
}
</style>

</head>

<body>
<!-- Wrapper Start -->

<div class="wrapper">

 <?php include('include/header.php'); ?>
    
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add/Edit Past Activities</li>
      </ol>
    </section>

    <?php
    if (isset($_REQUEST['addBtn'])){

      if (!empty($_FILES['product_img']['name'])){

        $extension = explode('.', $_FILES["product_img"]["name"]);
        $exten = $extension[1];

        if ($exten=='jpg' || $exten=='JPG' || $exten=='JPEG' || $exten=='png'){

          $fnm = $_FILES['product_img']['name'];
          $dst = 'img_past_act/'.$fnm;

          $upload = move_uploaded_file($_FILES['product_img']['tmp_name'], $dst);

          $update = "update past_act set image='".$dst."', article_header='".urlencode($_REQUEST['article_header'])."', article_content='".urlencode($_REQUEST['article_content'])."', image_name='".urlencode($_REQUEST['image_name'])."', status='".$_REQUEST['status']."', link_text='".urlencode($_REQUEST['link_text'])."', link_url='".urlencode($_REQUEST['link_url'])."' where article_id='".base64_decode($_REQUEST['aid'])."'";

          mysql_query($update);
        ?>
        <script type="text/javascript">
          alert('Article has been updated');
          window.location = 'upload-past-activity.php';
        </script>
        <?php
        }else{
        ?>
        <script type="text/javascript">
          alert('File Type not supported');
        </script>
        <?php
        }
      }else{
        
        $update = "update past_act set article_header='".urlencode($_REQUEST['article_header'])."', article_content='".urlencode($_REQUEST['article_content'])."', image_name='".urlencode($_REQUEST['image_name'])."', status='".$_REQUEST['status']."', link_text='".urlencode($_REQUEST['link_text'])."', link_url='".urlencode($_REQUEST['link_url'])."' where article_id='".base64_decode($_REQUEST['aid'])."'";

        mysql_query($update);
      ?>
      <script type="text/javascript">
        alert('Article has been updated');
        window.location = 'upload-past-activity.php';
      </script>
      <?php
      }
    }
    ?>

  <div class="container">
    <div class="row">

      <div class="col-sm-12">

      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

      <table width="100%">
        <?php if ($getDet['image']==''){ ?>
        <tr>
          <td class="col-sm-4" style="vertical-align: top;padding-top: 5px;">Upload Image : </td>
          <td class="col-sm-8">
            <input type="file" id="exampleInputFile" name="product_img" required />
            <span style="color: #008000;width: 100%;margin: 0 0 20px 0;float: left;">(Upload JPG and JPEG images only)</span>

            <div id="thumb-output"></div>
          </td>
        </tr>

        <?php }else{ ?>

        <tr>
          <td class="col-sm-4" style="vertical-align: top;padding-top: 5px;">Upload Image : </td>
          <td class="col-sm-8">
            <input type="file" id="exampleInputFile" name="product_img" />
            <span style="color: #008000;width: 100%;margin: 0 0 10px 0;float: left;">(Upload JPG and JPEG images only)</span>

            <div id="thumb-output">
              <?php if ($getDet['image']!=''){ ?>
              <img src="<?= $getDet['image'] ?>" width="250" height="250" />
              <?php } ?>
            </div>
          </td>
        </tr>

        <?php } ?>

        <tr class="table-tr">
          <td class="col-sm-4">Image Name : </td>
          <td class="col-sm-8">

            <input type="text" name="image_name" id="image_name" class="form-control" value="<?= urldecode($getDet['image_name']) ?>" />

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">Article Header : </td>
          <td class="col-sm-8">

            <input type="text" name="article_header" id="article_header" class="form-control" value="<?= urldecode($getDet['article_header']) ?>" required />

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4" style="vertical-align: top;padding-top: 5px;">Article Content : </td>
          <td class="col-sm-8">

            <textarea class="form-control" name="article_content" id="article_content" required><?= urldecode($getDet['article_content']) ?></textarea>

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">Link Text : </td>
          <td class="col-sm-8">

            <input type="text" name="link_text" id="link_text" class="form-control" value="<?= urldecode($getDet['link_text']) ?>" />

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">Link URL : </td>
          <td class="col-sm-8">

            <input type="text" name="link_url" id="link_url" class="form-control" value="<?= urldecode($getDet['link_url']) ?>" />

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">Activate/Deactivate Article : </td>
          <td class="col-sm-8">

            <select class="form-control" name="status" id="status">

              <option value="activate" <?php if ($getDet['status']=='activate'){echo 'selected';} ?>>Activate</option>

              <option value="deactivate" <?php if ($getDet['status']=='deactivate'){echo 'selected';} ?>>Deactivate</option>

            </select>

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-12" colspan="2"></td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-12" colspan="2" style="text-align: center;">

            <a href="upload-past-activity.php"><input type="button" name="backBtn" id="backBtn" class="btn btn-primary" value="Back to List" style="margin: 0 15px 0 0;" /></a>

            <input type="submit" name="addBtn" id="addBtn" class="btn btn-primary" value="Update Activity" />

          </td>
        </tr>
      </table>

      </form>

      </div>
    </div>
  </div>
  <!-- Wrapper End -->
  
  



  <!-- Logo Start -->
  
    <?php
    include('include/footer.php');
    ?>
  <!-- Sidebar Navigation End --> 
  
  
</div>

</body>
</html>

<script>
$(document).ready(function(){
  $('#exampleInputFile').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
      $('#thumb-output').html(''); //clear html of output element
      var data = $(this)[0].files; //this file data
      
      $.each(data, function(index, file){ //loop though each file
        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
          var fRead = new FileReader(); //new filereader
          fRead.onload = (function(file){ //trigger function on successful read
          return function(e) {
            var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
            $('#thumb-output').append(img); //append image to output element
          };
          })(file);
          fRead.readAsDataURL(file); //URL representing the file's data.
        }
      });
        
    }else{
      alert("Your browser doesn't support File API!"); //if File API is absent
    }
  });
});
</script>