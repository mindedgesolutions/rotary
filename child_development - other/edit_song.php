<?php
session_start();
ob_start();
include('include/config.php');
include('include/session_check.php');

$msg = "";
if(isset($_GET['pid'])){
$pid =$_GET['pid'];
$sql = "Select * from tbl_songs_master where songs_id = '$pid'";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)){
	$artists=explode(",",$row['song_artist_name']);
	extract($row);	
 }
}
//////////////////////// ADDITION ////////////////////////////////////////////////////////
if(isset($_REQUEST['action'])){
$action=$_REQUEST['action'];
if($action == 'edit'){
	
$song_artist_names=$_POST['song_artist_name'];
$song_artist_names=str_replace("_"," ",$song_artist_names);
$song_artist_name=implode(",",$song_artist_names);

$songs_id = $_POST['songs_id'];
$songs_name = $_POST['songs_name'];
$songs_duration = $_POST['songs_duration'];
$song_artist_name = $song_artist_name; 
$song_composer = $_POST['song_composer'];
$song_lyrics = $_POST['song_lyrics'];
$song_albumname = $_POST['song_albumname'];
$song_language = $_POST['song_language'];
$song_version = $_POST['song_version'];
$song_type = $_POST['song_type'];
$songs_price = $_POST['songs_price'];
$latest_songs = $_POST['latest_songs'];
$songs_editedby = $_SESSION['username'];
$songs_editdate = date('Y-m-d');
$status = 1;

///////////////////////////// IMAGE ///////////////////////////////////////////////////
$image = $_FILES['product_image'];
$image_name= basename($_FILES['product_image']['name']);
move_uploaded_file($image['tmp_name'], "../songsimage/songs/". $image_name);

$sql = "Select * from tbl_songs_master where songs_id = '$songs_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_02 = $data['songs_image'];
}

///////////////////////// SONG TRACK SMALL /////////////////////////////////////////////
$songs_path = $_FILES['songs_path'];
$mp3 = basename($_FILES['songs_path']['name']);
move_uploaded_file($songs_path['tmp_name'], '../songs/'.$mp3);

$sql = "Select * from tbl_songs_master where songs_id = '$songs_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_03 = $data['songs_path'];
}

//////////////////////// SONG TRACK FULL ////////////////////////////////////////////////
$full_songs_path = $_FILES['full_songs_path'];
$full_mp3 = basename($_FILES['full_songs_path']['name']);
move_uploaded_file($full_songs_path['tmp_name'], '../songs/full_songs/'.$full_mp3);

$sql = "Select * from tbl_songs_master where songs_id = '$songs_id'";
$result = mysql_query($sql);
while($data = mysql_fetch_array($result)){
$pd_img_04 = $data['full_songs_path'];
}


$sql = "Update tbl_songs_master set 
songs_name = '$songs_name',
songs_path = IF('$mp3'='','$pd_img_03','$mp3'),
full_songs_path = IF('$full_mp3'='','$pd_img_04','$full_mp3'),
songs_duration = '$songs_duration',
songs_image = IF('$image_name'='','$pd_img_02','$image_name'),
song_artist_name = '$song_artist_name',
song_composer = '$song_composer',
song_lyrics = '$song_lyrics',
song_albumname = '$song_albumname',
song_language = '$song_language',
song_version = '$song_version',
song_type = '$song_type',
songs_price = '$songs_price',
latest_songs = '$latest_songs',
songs_editdate = '$songs_editdate',
songs_editedby = '$songs_editedby',
status = '$status' where songs_id = '$songs_id'";

$answer = mysql_query($sql);
}
header('location:song_list.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin | Dashboard</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->

<script type="text/javascript">
function loadXMLDoc(albumname)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function() {
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		//alert(xmlhttp.responseText);
		document.getElementById('song_artist_name[]').innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","album_names.php?albumname="+albumname);
	xmlhttp.send();
}
</script>

</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header"> <a href="dashboard.php" class="logo">
  <!-- Add the class icon to your logo image or logo icon to add the margining -->
  Super Admin </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
    <div class="navbar-right">
      <?php include('include/user_account.php'); ?>
    </div>
  </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image"> <img src="img/avatar5.png" class="img-circle" alt="User Image" /> </div>
        <div class="pull-left info">
          <p>Hello, <?php echo ucfirst($_SESSION['username']); ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('include/side_menu.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Product <small>Control panel</small> </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="song_list.php">Song List</a></li>
        <li class="active">Add Song</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <form role="form" action="edit_song.php?action=edit" method="post" enctype="multipart/form-data">
        <div class="box-body"> <?php echo $msg; ?>
          <fieldset>
            <legend>Songs Information</legend>
            <div class="form-group">
              <label>Songs Name</label>
              <input type="text" class="form-control" placeholder="Enter Song Name...." name="songs_name" value="<?php echo $songs_name; ?>"/>
            </div>
            
            <div class="form-group">
              <label>Songs Album name</label>
              <select class="form-control" type="text" id="song_albumname" name="song_albumname">
            <option value="">Choose Album</option>
            <?php $rscat = mysql_query("SELECT * from tbl_album_master");
			while($rwcat = mysql_fetch_array($rscat)){
			?>
            <option <?php if($song_albumname==$rwcat['album_name']) { echo "selected";} ?> value="<?php echo $rwcat['album_name']?>">
            <?php echo stripslashes($rwcat['album_name'])?>
            </option>
            <?php } ?>
          </select>
            </div>
            
            <div class="form-group">
              <select class="form-control" type="text" id="song_artist_name[]" name="song_artist_name[]" multiple="multiple">
           <option value="">Choose Artist</option>
		      <?php
			  $sql = mysql_query("SELECT * from tbl_artist_master");
			  while($data = mysql_fetch_array($sql)){
			  ?> 
			  <option value="<?php echo $data['artist_name'];?>" <?php if(in_array($data['artist_name'],$artists)) {?> selected="selected" <?php } ?>>
			  <?php echo stripslashes($data['artist_name'])?>
			  </option>
			  <?php } ?>
          </select>
            </div>
            <div class="form-group">
              <label>Songs Composer</label>
              <select class="form-control" type="text" name="song_composer">
                <option value="">Choose Composer</option>
                <?php $rscat = mysql_query("SELECT * from tbl_composer_master");
				while($rwcat = mysql_fetch_array($rscat)){
				?>
            <option <?php if($song_composer==$rwcat['composer_name']){ echo "selected";} ?> value="<?php echo $rwcat['composer_name']?>">
			<?php echo stripslashes($rwcat['composer_name'])?></option>
            <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Songs  Lyrics  :</label>
              <select class="form-control" type="text" id="song_lyrics" name="song_lyrics">
                <option value="">Choose Lyrics</option>
                <?php $rscat = mysql_query("SELECT * from tbl_composer_master");
				while($rwcat = mysql_fetch_array($rscat)){
				?>
            <option <?php if($song_lyrics==$rwcat['composer_name']){ echo "selected";} ?> value="<?php echo $rwcat['composer_name']?>">
			<?php echo stripslashes($rwcat['composer_name'])?></option>
            <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Songs Duration  :</label>
              <input class="form-control" type="text" name="songs_duration" placeholder="Enter Song Duration...." value="<?php echo $songs_duration; ?>"/>
            </div>
            <div class="form-group">
              <label>Songs  Language  :</label>
              <select class="form-control" type="text" id="song_language" name="song_language">
                <option value="">Choose Language</option>
                <option value="Bengali" <?php  if($song_language=='Bengali'){ echo "selected";} ?>>Bengali</option>
                <option value="Hindi"  <?php  if($song_language=='Hindi'){ echo "selected";} ?>>Hindi</option>
                <option value="English" <?php  if($song_language=='English'){ echo "selected";} ?>>English</option>
              </select>
            </div>
            <div class="form-group">
              <label>Songs  Version  :</label>
              <select class="form-control" type="text" name="song_version">
                <option value="">Choose Version</option>
                <option value="normal" <?php  if($song_version=='normal'){ echo "selected";} ?>>Normal</option>
            	<option value="remix"<?php  if($song_version=='remix'){ echo "selected";} ?>>Remix</option>
              </select>
            </div>
            <div class="form-group">
              <label>Songs  Type  :</label>
              <select class="form-control" type="text" name="song_type">
                <option value="">Choose Type</option>
                <option value="pop"<?php  if($song_type=='pop'){ echo "selected";} ?>>Pop</option>
                <option value="jazz"<?php  if($song_type=='jazz'){ echo "selected";} ?>>Jazz</option>
              </select>
            </div>
            <div class="form-group">
              <label>Songs Price  :</label>
              <input class="form-control" type="text" name="songs_price" placeholder="Enter Song Price...." value="<?php echo $songs_price;?>"/>
            </div>
            <div class="form-group">
              <label>Latest Songs :</label>
              Yes :
              <input type="checkbox" name="latest_songs" value="<?php if($latest_songs==1){ $c ="checked=checked"; } else { $c = ""; } ?>" <?php echo $c; ?>/>
            </div>
          </fieldset>
          <fieldset>
            <legend>Song Image / Song Track</legend>
            <div class="form-group">
              <label>Song Track [Small Length]</label>
              <input type="file" id="exampleInputFile" name="songs_path" ><?php echo $songs_path; ?>
              <!--File Upload-->
            </div>
            <div class="form-group">
              <label>Song Track [Full Length]</label>
              <input type="file" id="exampleInputFile" name="full_songs_path" ><?php echo $full_songs_path; ?>
              <!--File Upload-->
            </div>
            <div class="form-group">
              <label>Song Image</label>
              <input type="file" id="exampleInputFile" name="product_image" >
              <img src="../songsimage/songs/<?php echo $songs_image; ?>" height="150" width="150" alt="No Image">
              <!--File Upload-->
            </div>
            <input type="hidden" name="songs_id" value="<?php echo $songs_id; ?>">
          </fieldset>
        </div>
        <!-- /.box-body -->
        <br>
        <br>
        <div class="box-footer">
          <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
        </div>
      </form>
    </section>
    <!-- /.content -->
  </aside>
  <!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- add new calendar event modal -->
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
</body>
</html>