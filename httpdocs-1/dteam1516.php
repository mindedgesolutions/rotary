<?php
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District Team 2015-16</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/logo_area.css" rel="stylesheet" type="text/css" />
<!--<link href="css/header_area.css" rel="stylesheet" type="text/css" />-->
<link href="css/box_area.css" rel="stylesheet" type="text/css" />

<link href="top_menu.css" rel="stylesheet" type="text/css" />
<link href="menu_v.css" rel="stylesheet" type="text/css" />

<!-- FONT -->
<script type="text/javascript" src="cufon-yui.js"></script>
<script type="text/javascript" src="Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<!-- TOP MENU START-->
<!--<link rel="stylesheet" type="text/css" href="topmenu/ddsmoothmenu.css" />-->
<!--<script type="text/javascript" src="topmenu/jquery.min.js"></script>
<script type="text/javascript" src="topmenu/ddsmoothmenu.js"></script>
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "smoothmenu1",
	orientation: 'h',
	classname: 'ddsmoothmenu',
	contentsource: "markup"
})
</script>-->
<!-- TOP MENU END-->


<link href="button/style.css" rel="stylesheet" type="text/css" />




<script type="text/javascript" src="jquery-1.2.6.min.js"></script>

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

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
</style>

</head>

<body>
<center>
<div style="background:url(images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("logo_area.html"); ?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
        <?php include("menu_area.html"); ?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
        <?php include("header_area.html"); ?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="images/h_top_l.png" /></td>
                <td style="background:url(images/h_top.png)"></td>
                <td width="8"><img src="images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td valign="top">
                                
                              <h1 align="center">District Wise DG and DLCC List</h1>
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;">
                                  </p>
                              </div>
<table width="100%" border="1" bordercolor="#CCCCCC" cellpadding="5" cellspacing="0" align="center" style="text-align:center; border-collapse:collapse; margin-top:10px">
<tr style="background:#f5f5f5; font-weight:bold">
<td width="7%">District</td>

<td width="25%">DG Name</td>
<td width="26%">DG Email</td>
</tr>

<?php
$sql = "SELECT * FROM info order by district asc";
$result = mysqli_query($link,$sql);
while($data = mysqli_fetch_assoc($result)){
	extract($data);
?>
<tr>
<td><?php echo $district; ?></td>
<td><div align="left"><?php echo $name; ?></div></td>
<td><?php echo $email; ?></td>
</tr>
<?php
}
?>




<!--<tr>
<td>2982</td>
<td><div align="left">R. Vasu</div></td>
<td>vasukaruna@gmail.com</td>
<td><div align="left">A. K. Natesan</div></td>
<td>aknatesan@yahoo.com </td>
</tr>
<tr>
<td>3000</td>
<td><div align="left">Rathinasamy Theenachandran</div></td>
<td>theena3000@gmail.com</td>
<td><div align="left">PDG M. Rajasekaran</div></td>
<td>manickamsekhar@yahoo.co.in</td>
</tr>
<tr>
<td>3011</td>
<td><div align="left">Sudhir Mangla</div></td>
<td>sudhirmangla3011@gmail.com</td>
<td><div align="left">Ravi Bhatia</div></td>
<td>taxauditors.bhatia@gmail.com</td>
</tr>
<tr>
<td>3012</td>
<td><div align="left">Jitender Kumar Gaur</div></td>
<td>rtnjkgaur@gmail.com</td>
<td><div align="left">Dr. Ajay Kumar Singh</div></td>
<td>drajayksingh@gmail.com</td>
</tr>
<tr>
<td>3020</td>
<td><div align="left">Jagadeeswararao Maddu</div></td>
<td>vijayavahinientp@gmail.com</td>
<td><div align="left">Badam Madhava Rao</div></td>
<td>bmr@abhyudaya.org</td>
</tr>
<tr>
<td>3030</td>
<td><div align="left">Dr. Nikhil A Kibe</div></td>
<td>drnikhilkibe@gmail.com</td>
<td><div align="left">Dr. Madhusadan Sarda</div></td>
<td>mrsarda3@rediffmail.com</td>
</tr>
<tr>
<td>3040</td>
<td><div align="left">Sanjeev Gupta</div></td>
<td>sanjeevgupta@veltronics.com</td>
<td><div align="left">Hemendra Singh</div></td>
<td>hemendravarsha@gmail.com</td>
</tr>
<tr>
<td>3051</td>
<td><div align="left">Lalit Sharma</div></td>
<td>lalitsharma2001@hotmail.com</td>
<td><div align="left">H. K. KRIPALANI</div></td>
<td>hkkripalani@hotmail.com</td>
</tr>
<tr>
<td>3052</td>
<td><div align="left">Pradhuman Kumar Patni</div></td>
<td>pkp15patni@yahoo.co.in</td>
<td><div align="left">Raakhi Gupta</div></td>
<td>raakhi27@yahoo.com</td>
</tr>
<tr>
<td>3053</td>
<td><div align="left">Anil Beniwal</div></td>
<td>anilbeniwal6666@gmail.com</td>
<td><div align="left">PDG Kranti Chandra Mehta</div></td>
<td>mehta_company@hotmail.com</td>
</tr>
<tr>
<td>3060</td>
<td><div align="left">Paragbhai Rasiklal Sheth </div></td>
<td>parag@ambicasalt.com</td>
<td><div align="left">PDG Mayur Vyas</div></td>
<td>mayurvyas51@yahoo.com</td>
</tr>
<tr>
<td>3070</td>
<td><div align="left">Kuldip Kumar Dhir</div></td>
<td>kdhirk@yahoo.com</td>
<td><div align="left">Sarabjeet Singh</div></td>
<td>drsarbjeet29@yahoo.com</td>
</tr>
<tr>
<td>3080</td>
<td><div align="left">David Joseph Hilton</div></td>
<td>davidjhilton@gmail.com</td>
<td><div align="left">PDG Prem Prakash Bhalla</div></td>
<td>prempbhalla@gmail.com</td>
</tr>
<tr>
<td>3090</td>
<td><div align="left">Dharam Vir Garg</div></td>
<td>dharam46@yahoo.co.in</td>
<td><div align="left">PDG Prem Aggarwal</div></td>
<td>premmansa2003@yahoo.co.in</td>
</tr>
<tr>
<td>3100</td>
<td><div align="left">Sunil Gupta</div></td>
<td>suneelgupta.gupta@gmail.com</td>
<td><div align="left">Dr. Akhilesh Saran Kothiwal</div></td>
<td>rot_akhilesh@yahoo.com</td>
</tr>
<tr>
<td>3110</td>
<td><div align="left">Sharat Chandra</div></td>
<td>casharatchandra@gmail.com</td>
<td><div align="left">DR. SAILENDRA K RAJU</div></td>
<td>drskraju0910@yahoo.co.in</td>
</tr>
<tr>
<td>3120</td>
<td><div align="left">Ved Prakash</div></td>
<td>vedcentral@yahoo.in</td>
<td><div align="left">Dr. Ajai Kumar Agha</div></td>
<td>ajaiagha@gmail.com</td>
</tr>
<tr>
<td>3131</td>
<td><div align="left">Subodh Mukund Joshi</div></td>
<td>rtnsubodh@gmail.com</td>
<td><div align="left">Ravee Dhotre</div></td>
<td>rtnravee@gmail.com</td>
</tr>
<tr>
<td>3132</td>
<td><div align="left">Dr. Deepak Prabhakarrao Pophale</div></td>
<td>rtndeepak@rediffmail.com</td>
<td><div align="left">Swati Herkal</div></td>
<td>swati.herkal@gmail.com</td>
</tr>
<tr>
<td>3140</td>
<td><div align="left">Subhash Rajaram Kulkarni</div></td>
<td>subhashrkulkarni@yahoo.co.in</td>
<td><div align="left">PDG Dr. Mayuresh Warke</div></td>
<td>mayureshwarke@hotmail.com</td>
</tr>
<tr>
<td>3150</td>
<td><div align="left">Gopinath Reddy Vedire</div></td>
<td>rotariangopi3150@gmail.com</td>
<td><div align="left">Naresh Raman</div></td>
<td>nareshcraman@gmail.com</td>
</tr>
<tr>
<td>3160</td>
<td><div align="left">Dr. Gautam Jahagirdar</div></td>
<td>dggautam1516_3160@yahoo.com</td>
<td><div align="left">PDG Chandrasenan Krishnan</div></td>
<td>kcsenanbdr@rediffmail.com</td>
</tr>
<tr>
<td>3170</td>
<td><div align="left">Shrinivas R. Malu</div></td>
<td>shreemalu@yahoo.co.in</td>
<td><div align="left">Prakash Yeri</div></td>
<td>prakashyeri@gmail.com</td>
</tr>
<tr>
<td>3180</td>
<td><div align="left">Dr. Bharathesh Adiraj</div></td>
<td>drbharatesh@yahoo.com</td>
<td><div align="left">Chandrashekhar Alilaghatta</div></td>
<td>shekarasc@gmail.com</td>
</tr>
<tr>
<td>3190</td>
<td><div align="left">Nagesh Kothanur Puttasiddegowda</div></td>
<td>rtnkpnagesh@gmail.com</td>
<td><div align="left">V. R. Ramesh</div></td>
<td>vr.ramesh@gmail.com</td>
</tr>
<tr>
<td>3201</td>
<td><div align="left">Kamlesh V. Raheja</div></td>
<td>kamlesh_raheja@yahoo.com</td>
<td><div align="left">Babu Joseph</div></td>
<td>babujosephk@gmail.com</td>
</tr>
<tr>
<td>3202</td>
<td><div align="left">George T. Sundararaj</div></td>
<td>geopris12@gmail.com</td>
<td><div align="left">M. Thejraj Mallar</div></td>
<td>gthejraj@gmail.com</td>
</tr>
<tr>
<td>3211</td>
<td><div align="left">Luke Chirakadavil</div></td>
<td>rebuluke@hotmail.com</td>
<td><div align="left">Shirish Kesavan</div></td>
<td>kesavanshirish@gmail.com</td>
</tr>
<tr>
<td>3212</td>
<td><div align="left">Navaani James</div></td>
<td>navamani3212@gmail.com</td>
<td><div align="left">PDG Rajenthiran K Vee</div></td>
<td>kvr@ganapathymills.com</td>
</tr>
<tr>
<td>3230</td>
<td><div align="left">Rajendra Raju Chamarthi</div></td>
<td>crraju_26@rediffmail.com</td>
<td><div align="left">Sridhar Penukonda</div></td>
<td>rtnsridhar@gmail.com</td>
</tr>
<tr>
<td>3240</td>
<td><div align="left">Chandu Agarwalla</div></td>
<td>chandu_dmp@yahoo.com</td>
<td><div align="left">Dr. B.C. Das Purkayastha</div></td>
<td>bcdpurkayastha@gmail.com</td>
</tr>
<tr>
<td>3250</td>
<td><div align="left">Mrs. Bindu Singh</div></td>
<td>bindu_singh16@rediffmail.com</td>
<td><div align="left">PDG Dr. Rakesh Prasad</div></td>
<td>rakesh3250@gmail.com</td>
</tr>
<tr>
<td>3261</td>
<td><div align="left">Rakesh Dave</div></td>
<td>rakeshdave3261@gmail.com</td>
<td><div align="left">PDG Rakesh Chaturvedi</div></td>
<td>rakeshcgforest@gmail.com</td>
</tr>
<tr>
<td>3262</td>
<td><div align="left">Sibabrata Dash Siba</div></td>
<td>tukuni4741@yahoo.com</td>
<td><div align="left">PDG Rabi Narayan Nanda</div></td>
<td>rabinanda3262@gmail.com</td>
</tr>
<tr>
<td>3291</td>
<td><div align="left">Jhulan Basu</div></td>
<td>jhbasu@gmail.com</td>
<td><div align="left">PDG Uttam Ganguli</div></td>
<td>guttam55@hotmail.com</td>
</tr>-->
</table>

<br />

                            </td>
                        </tr>
                    </table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
					<!--#include file="footer_area.html"-->
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="images/h_bottom_l.png" /></td>
                <td style="background:url(images/h_bottom.png)"></td>
                <td width="8"><img src="images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>
</body>
</html>






