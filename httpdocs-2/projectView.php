<?php
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project View | <?php include('include/title.php'); ?></title>

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
	
	<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>




	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>

<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="/clubprojects/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="/clubprojects/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 <!--	<link rel="stylesheet" href="style.css" />-->

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
</script>
<style>
td{
	border:none;
}
</style>
  </head>
  <body onload="categorylist();" style="padding-right:0px;">

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
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="as-page-title">
                  <h1>Project View</h1>
                  
                </div>
              </div>
              <div class="col-md-3">
                <ul class="as-breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="projectView.php">Project View</a></li>
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
					<div class="col-md-12" style="border :1px solid #990000;">
						<div class="as-detail-editor">
							<p>Filter your search</p>
							<div class="col-md-12">
								<div class="col-md-4">
									<strong>Category</strong>
								</div>
								<div class="col-md-1">
									<strong>:</strong>
								</div>
								<div class="col-md-6">
									<select id="chocateg" name="chocateg" onchange="districtlist(this.value);"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px"><!--onchange="subcategorylist(this.value)"-->
										<option value="">Select</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								 <div class="col-md-4">
									<strong>Rotary District</strong>
								 </div>
								 <div class="col-md-1">
									<strong>:</strong>
								 </div>
								 <div class="col-md-6">
									 <select id="chodistrict" name="chodistrict" onchange="dispclub(this.value)"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
											<option value="">Select</option>
									</select>
								 </div>
							</div>
							<div class="col-md-12">
								 <div class="col-md-4">
									<strong>Rotary Club of</strong>
								 </div>
								 <div class="col-md-1">
									<strong>:</strong>
								 </div>
								 <div class="col-md-6">
									 <select id="choclub" name="choclub"  style="width:50%; border:1px solid #CCCCCC; padding:4px 2px; border-radius:3px">
											<option value="">Select</option>
									</select>
								 </div>
							</div>
							<div class="col-md-12" style="margin:10px;"></div>
							<div class="col-md-12">
								<div class="col-md-4">
								 
								 </div>
								 <div class="col-md-1">
								
								 </div>
								 <div class="col-md-6">
									<div class="col-md-3">
									<input style="padding:5px 10px;" type="button" id="btngo" name="btngo" value="Search" onclick="dispProjects();" class="login" />
									</div>
									<div class="col-md-3">
									<input style="padding:5px 10px;" type="button" id="btnreset" name="btnreset" value="Reset" onclick="resetView()" class="login" />
									</div>
								 </div>
							</div>
							<div class="col-md-12" style="margin:10px;"></div>
							<div id="projectResult"></div>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12" style="margin:10px;"></div>
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

    <!-- Search Modal -->
    <?php include('include/search-model.php'); ?>
    <!-- Search Modal -->

    <!-- jQuery (necessary for JavaScript plugins) -->
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
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

function categorylist()
{
var str = "";
$.ajax({                                      
      url: '../categorylist.php',                     
      data: '',
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["categoryid"]+"'>"+data[i]["category"]+"</option>";
				}
			}			 
			 	$("#chocateg").append(str);
		}
	});	
}

function subcategorylist(val)
{
var str = "";
var pars = 'categid='+val;
$.ajax({                                      
      url: '../subcategorylist.php',                     
      data:pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["subcategoryid"]+"'>"+data[i]["subcategory"]+"</option>";
				}
			}	
				$("#chosubcateg").children('option:not(:first)').remove();	
				$("#chodistrict").children('option:not(:first)').remove();
				$("#choclub").children('option:not(:first)').remove();	
			 	$("#chosubcateg").append(str);
		}
	});	
}

function districtlist(val)
{
var str = "";
var pars = 'categid='+val
$.ajax({                                      
      url: '../districtlistforview.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["district"]+"'>"+data[i]["district"]+"</option>";
				}
			}
				$("#chodistrict").children('option:not(:first)').remove();	
				$("#choclub").children('option:not(:first)').remove();	
			 	$("#chodistrict").append(str);
		}
	});
}


function dispclub(val)
{
	var str = "";
	var pars ='dist='+val;
	var selected='';
$.ajax({                                      
      url: '../clublistforview.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
				//str=str+"<option value=''>Select</option>";
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["club"]+"'" +selected+">"+data[i]["club"]+"</option>";
				}
			}
			$("#choclub").children('option:not(:first)').remove();	
			$("#choclub").append(str);			 
		}
	});
}


function dispProjects(){
var str = '<table width="100%" cellspacing="0" cellpadding="5" border="1" bordercolor="#cccccc" style="border-collapse:collapse; font-size:11px; font-family:Arial, Helvetica, sans-serif; background:#FFFFFF" align="center">';
	str = str+'<tr height="20px"><td style="text-align:center; font-weight:bold; background:#eaeaea">Sl. No.</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Id</td><td style="text-align:center; font-weight:bold; background:#eaeaea">District</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Title</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Category</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Club</td><td style="text-align:center; font-weight:bold; background:#eaeaea">No of Teacher Evaluated</td><td style="text-align:center; font-weight:bold; background:#eaeaea">No of Teacher Awarded </td><td style="text-align:center; font-weight:bold; background:#eaeaea">No of School</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Date</td><td style="text-align:center; font-weight:bold; background:#eaeaea">Project Submitted On</td><td style="text-align:center; font-weight:bold; background:#eaeaea">View</td></tr>';
	var pars ='categid='+$("#chocateg").val()+'&dist='+$('#chodistrict').val()+'&club='+$('#choclub').val();
//alert(pars)
$.ajax({                                      
      url: '../projectslist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
			//	alert(JSON.stringify(data))
				for(var i=0; i<data.length; i++)
				{
				
					
					
					str = str+'<tr height="20px">';
					str = str+'<td style="text-align:center;">'+(i+1)+'</td>';
					str = str+'<td style="text-align:center;">'+data[i]["projectid"]+'</td>';
					str = str+'<td style="text-align:center;">'+data[i]["district"]+'</td>';
					str = str+'<td>'+data[i]["title"]+'</td>';
					str = str+'<td>'+data[i]["category"]+'</td>';
					str = str+'<td>'+data[i]["club"]+'</td>';
					str = str+'<td>'+data[i]["teacher_evaluated"]+'</td>';
					str = str+'<td>'+data[i]["teacher_awarded"]+'</td>';
					str = str+'<td>'+data[i]["no_school"]+'</td>';
					
					
					str = str+'<td style="text-align:center;">'+data[i]["projectdate"]+'</td>';
					str = str+'<td style="text-align:center;">'+data[i]["submitted"]+'</td>';
					
					if(data[i]["img1"]!='' || data[i]["img2"]!='' || data[i]["img3"]!='' || data[i]["img4"]!='' || data[i]["img5"]!='' || data[i]["img6"]!='' || data[i]["img7"]!='' || data[i]["img8"]!='' || data[i]["img9"]!='' || data[i]["img10"]!='' || data[i]["img11"]!='' || data[i]["img12"]!='' || data[i]["img13"]!='' || data[i]["img14"]!='' || data[i]["img15"]!='' || data[i]["img16"]!='' || data[i]["img17"]!='' || data[i]["img18"]!='' || data[i]["img19"]!='' || data[i]["img20"]!='' || data[i]["img21"]!='' || data[i]["img22"]!='' || data[i]["img23"]!='' || data[i]["img24"]!='' || data[i]["img25"]!=''){
					str = str+'<td style="text-align:center;" class="link"><a onclick="displimg('+data[i]["projectid"]+');" title="Click here to view Image">Image</a>&nbsp;&nbsp;&nbsp;<a href="javascript: void(0)" onclick="displcontent('+data[i]["projectid"]+');" title="Click here to view Detail">Detail</a></td>';
					}
					else
					{
					str = str+'<td style="text-align:center;" class="link"><a href="javascript: void(0)" onclick="displcontent('+data[i]["projectid"]+');" title="Click here to view Detail">Detail</a></td>';
					}
					str = str+'</tr>';
				}
			}
			str = str+"</table>";
			$("#projectResult").html(str);
					 
		}
	});

}

function resetView() {
	$("#chocateg").val('');
	$("#chosubcateg").children('option:not(:first)').remove();
	$('#chodistrict').children('option:not(:first)').remove();
	$('#choclub').children('option:not(:first)').remove();
	$("#projectResult").html('');
}

function displimg(val) {
	
	var _items = [];
	var pars ='id='+val;
	$.ajax({                                      
      url: 'http://rotaryteach.org/clubprojects/dispimg.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0) 
			{
				for(var i=1; i<=26; i++ ) {
					if(data[0]["img"+i]!='') {
						
				 _items.push({'href' : 'http://www.rotaryteach.org/clubprojects/projectupload/'+data[0]["img"+i], 'title' : data[0]["title"]});
					}
				}
				/*[
								{"title": "Image title 1", "href": "projectupload/"+data[0]["img1"]},
								{"title": "Image title 2", "href": "projectupload/"+data[0]["img2"]},
								{"title": "Image title 3", "href": "projectupload/"+data[0]["img3"]}
								]*/
					$.fancybox(_items,
								{
								
								'padding': 0,
								'transitionIn': 'elastic',
								'transitionOut': 'elastic',
								'type' : 'image',
								'changeFade' : 0,
								'overlayOpacity': 0.8,
								'overlayColor': '#000000'
								}
								
								);				 
			}
		}
	});
	 return false;
}



function displcontent(val) {
	
	var pars ='id='+val; 
	$.ajax({                                      
      url: 'clubprojects/dispcontent.php',                     
      data: pars,
	  type:"post",
		dataType: 'text',
		success: function(data)         
      	{
			
			if(data.length>0) 
			{
				 alert(data);
				 $.fancybox(data); 
			}
								 
		}
	});
	 return false;
}

	Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});
</script>


  </body>
</html>