<?php include 'include/config-2.php'; ?>

<?php
$getDet = mysql_fetch_array(mysql_query("select * from video_master where video_id='".base64_decode($_REQUEST['vid'])."'"));

$ytCode = substr($getDet['video'], -11);
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

<!-------------For Progress Bar------------------>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<!-------------For Progress Bar------------------>

<style type="text/css">
.table-tr{
  height: 60px;
  line-height: 60px;
}
</style>

<script type="text/javascript">
/*$(document).ready(function(){

  $('form').on('submit',function(event){

    event.preventDefault();

    var formData = new FormData($('form')[0]);

    $.ajax({

      xhr: function(){
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('progress', function(e){

          if (e.lengthComputable){

            console.log('Bytes loaded : ' + e.loaded);
            console.log('Total Size : ' + e.total);
            console.log('Percentage Uploaded : ' + (e.loaded/e.total));

            var percent = Math.round((e.loaded / e.total) * 100);
            var perReset = '';

            $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
          }
        });
        return xhr;
      },
      url: 'file_upload_parser.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(f){

        if (f==1){
          
          alert('Select a file');
          window.location.reload();

        }else if (f==2){

          alert('File size is too large to upload');
          window.location.reload();

        }else if (f==3){

          alert('File type not supported');
          window.location.reload();

        }else{

          alert('File uploaded successfully');
          $('#progressBar').attr('aria-valuenow', '').css('width', '').text('');
          $('#notification').html(f);
        }
      }
    });
  });
});

function insertData(){

  var video_title = $('#video_title').val();
  var status = $('#status').val();
  var vid_id = $('#vid_id').val();

  if (video_title==''){
    alert('Enter video title');
  }else{

    $.ajax({

      url: 'insert-data.php',
      type: 'POST',
      data: 'video_title=' + video_title + '&status=' + status + '&vid_id=' + vid_id,
      success: function(f){

        if (f==1){

          alert('Select a video first');
          return false;
        }else{

          alert('Video details have been saved');
          window.location = 'upload-video.php';
        }
      }
    })
  }
}*/

function validateData(){

  var video_title = $('#video_title').val();
  var yt_url = $('#yt_url').val();
  var video_type = $('#video_type').val();

  if (video_type==''){

    alert('Select video type');
    return false;
  }
  else if (video_title==''){

    alert('Enter video title');
    return false;
  }else if (yt_url==''){

    alert('Enter YouTube video URL');
    return false;
  }
}
</script>

</head>

<body>

<!-- Wrapper Start -->

<div class="wrapper">

 <?php include('include/header.php'); ?>
    
    <?php include 'pagination_present.php'; ?>

    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add/Edit Video</li>
      </ol>
    </section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <?php
        if (isset($_REQUEST['addBtn'])){

          if (!preg_match('/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/', $_REQUEST['yt_url'])){

          ?>
          <script type="text/javascript">
            alert('Enter a valid YouTube URL');
          </script>
          <?php
          }else{

            $update = "update video_master set video_header='".$_REQUEST['video_title']."', video='".urlencode($_REQUEST['yt_url'])."', status='".$_REQUEST['status']."', video_type='".$_REQUEST['video_type']."' where video_id='".base64_decode($_REQUEST['vid'])."'";

            mysql_query($update);
          ?>
          <script type="text/javascript">
            alert('Link has been saved');
            window.location = 'upload-video.php';
          </script>
          <?php
          }
        }
        ?>

        <form action="" method="post" onsubmit="return validateData()" autocomplete="off">

        <table width="100%">
        <!--<tr>
          <td class="col-sm-4" style="vertical-align: top;padding-top: 5px;">Upload Video : </td>
          <td class="col-sm-8">
            <table width="100%">
              <form id="upload" enctype="multipart/form-data" method="post">

              <input type="hidden" name="vid_id" id="vid_id" value="<?= $_REQUEST['vid'] ?>" />

              <tr>
                <td class="col-sm-6"><input type="file" id="file1" name="file1" required /></td>

                <td class="col-sm-6"><input type="submit" name="upload" class="btn btn-primary" value="Upload File" /></td>
              </tr>

              </form>

              <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td colspan="2">
                  Instructions : <br />1. File Size cannot exceed more than 10MB <br />2. Only .MP4 files can be uploaded<br />3. Wait for the upload confirmation<br />
                  <span id="notification"></span>
                </td>
              </tr>

              <tr><td colspan="2" style="height: 10px;"></td></tr>

              <tr>
                <td class="col-sm-6">
                  <div class="progress">
                    <div id="progressBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" >0%</div>
                  </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>-->

        <tr class="table-tr">
          <td class="col-sm-4">Select Category : </td>
          <td class="col-sm-8">

            <select class="form-control" name="video_type" id="video_type">

            <option value="">-- Please Select --</option>

              <option value="rilm_teach" <?php if ($getDet['video_type']=='rilm_teach'){echo 'selected';} ?>>RILM T-E-A-C-H</option>

              <option value="teacher_support" <?php if ($getDet['video_type']=='teacher_support'){echo 'selected';} ?>>Teacher Support</option>

              <option value="e_learning" <?php if ($getDet['video_type']=='e_learning'){echo 'selected';} ?>>E-Learning</option>

              <option value="adult_literacy" <?php if ($getDet['video_type']=='adult_literacy'){echo 'selected';} ?>>Adult Literacy</option>

              <option value="child_development" <?php if ($getDet['video_type']=='child_development'){echo 'selected';} ?>>Child Development</option>

              <option value="happy_school" <?php if ($getDet['video_type']=='happy_school'){echo 'selected';} ?>>Happy School</option>

            </select>

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">Video Title : </td>
          <td class="col-sm-8">

            <input type="text" name="video_title" id="video_title" class="form-control" value="<?= $getDet['video_header'] ?>" />

          </td>
        </tr>

        <tr class="table-tr">
          <td class="col-sm-4">YouTube URL : </td>
          <td class="col-sm-8">

            <input type="text" name="yt_url" id="yt_url" class="form-control" value="<?= urldecode($getDet['video']) ?>" />

          </td>
        </tr>

        <?php if ($getDet['video']!=''){ ?>
        <tr>
          <td class="col-sm-4"></td>
          <td class="col-sm-8">

            <div class="youtube">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $ytCode ?>" frameborder="0" allowfullscreen></iframe>
            </div>

          </td>
        </tr>
        <?php } ?>

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

            <a href="upload-video.php"><input type="button" name="backBtn" id="backBtn" class="btn btn-primary" value="Back to List" style="margin: 0 15px 0 0;" /></a>

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