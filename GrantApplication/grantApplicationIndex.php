<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
.hed1 {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
 .hed {border:1px solid #d1dcdf; font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/font-weight:bold; color:#10607c;
 background-color: #f2f5f6; background-image: linear-gradient(to bottom, #f2f5f6, #c8d7dc);
 }
 .hed:hover { border:1px solid #b6c7cc;
 background-color: #d4dee1; color: #0066FF;
 background-image: linear-gradient(to bottom, #d4dee1, #a9c0c8);
 }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rotary Teach</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/footer.css" rel="stylesheet" type="text/css" />
<link href="../css/logo_area.css" rel="stylesheet" type="text/css" />
<link href="../css/box_area.css" rel="stylesheet" type="text/css" />

<link href="../top_menu.css" rel="stylesheet" type="text/css" />
<link href="../menu_v.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../cufon-yui.js"></script>
<script type="text/javascript" src="../Futuri_Condensed_400-Futuri_Condensed_400.font.js"></script>

<link href="../button/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>


<script type="text/javascript">

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

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

function districtlist()
{
var str = "";
$.ajax({                                      
      url: '../districtlist.php',                     
      data: '',
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
			 	$("#txtRotDistrict").append(str);
		}
	});
}


function dispclub(val)
{
	var str = "<option value=''>Select</option>";
	var pars ='dist='+val;

$.ajax({                                      
      url: '../clublist.php',                     
      data: pars,
	  type:"post",
		dataType: 'json',
		success: function(data)         
      	{
			if(data.length>0)
			{
				for(var i=0; i<data.length; i++)
				{
				str = str+"<option value='"+data[i]["club"]+"'>"+data[i]["club"]+"</option>";
				}
			}
			
			$("#txtRotClub").empty();
			$("#listofapplication").html('');
			$("#txtRotClub").append(str);			 
		}
	});
}


function changeDistrict(val) {

var selected =$('input[name=txtbelong]:checked').val();

//alert(selected)
if(selected==val) {
	if(val=='Rotary') {
		$('#districttr').show();
		$("#txtRotDistrict").val('');
		$("#txtRotClub").val('');
		$('#clubtr').show();		
		$('#rotdistrict').show();
		$('#rotclub').show();
		$('#innerdistrict').hide();
		$('#otherclub').hide();
	}
	else if(val=='Rotaract' ) {
	
		alert("To proceed with the Grant application, please email the Name, Email Address, Mobile Number, Club Name and District Number of the Club President and the Primary Contact of the applicant Club at grant@rotaryteach.org. Once RILM updates the Club data in its database, you will be intimated by email and then only you may proceed further with the application.")
		/*$('#districttr').show();
		$("#txtRotDistrict").val('');
		$('#clubtr').show();		
		$('#txtClubName').val('');
		$('#rotdistrict').show();
		$('#otherclub').show();
		$('#rotclub').hide();
		$('#innerdistrict').hide();*/
	}
	else if(val=='Inner Wheel') {
		alert("To proceed with the Grant application, please email the Name, Email Address, Mobile Number, Club Name and District Number of the Club President and the Primary Contact of the applicant Club at grant@rotaryteach.org. Once RILM updates the Club data in its database, you will be intimated by email and then only you may proceed further with the application.")
		/*$('#districttr').show();
		$('#clubtr').show();		
		$('#txtClubName').val('');
		$('#innerdistrict').show();
		$('#txtinnerdistrict').val('');
		$('#otherclub').show();
		$('#rotclub').hide();
		$('#rotdistrict').hide();*/
	}
}
	else
	{
		$('#districttr').hide();
		$('#clubtr').hide();		
		$('#innerdistrict').hide();
		$('#rotdistrict').hide();
		$('#otherclub').hide();
		$('#rotclub').hide();
	
	}

}

</script>

<style type="text/css">
#slideshow { position:relative; height:152px }
#slideshow IMG { position:absolute; top:0; left:0; z-index:8; opacity:0.0 }
#slideshow IMG.active { z-index:10; opacity:1.0 }
#slideshow IMG.last-active { z-index:9 }
 p.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	}
</style>

</head>

<body onload="districtlist()">
<center>
<div style="background:url(../images/bg.png) top repeat-x; margin:0; padding:0">
<div style="background:url(../images/bg1.png) top center no-repeat; margin:0; padding:15px 0 0 0">

    <div id="wrapper">
        
        <!----------------------- LOGO AREA START --------------------->
        <?php include("../logo_area.html");?>
        <!----------------------- LOGO AREA END ----------------------->
        
        <!----------------------- MENU AREA START --------------------->
         <?php include("../menu_area.html");?>
        <!----------------------- MENU AREA END ----------------------->
        
        <!----------------------- HEADER AREA START ------------------>
          <?php /*?><?php include("../header_area.html");?><?php */?>
        <!----------------------- HEADER AREA END -------------------->
        
        <!----------------------- CONTENT AREA START ------------------>
        <table width="906" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:5px; margin-bottom:7px">
            <tr>
                <td width="8"><img src="../images/h_top_l.png" /></td>
                <td style="background:url(../images/h_top.png)"></td>
                <td width="8"><img src="../images/h_top_r.png" /></td>
            </tr>
            <tr>
                <td style="background:url(../images/left.png)"></td>
                <td style="background:#FFFFFF" valign="top">
                    <table width="880" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:15px">
                        <tr>
                            <td width="650" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:5px">
                                    <tr>
                                        <td align="left" colspan="3">
                                       	  <h1 style="padding:0; margin:0">RILM Grant Application</h1>
                                     	</td>
                                      
                                  </tr>
                                </table>
                                
                                <div style="height:2px; border-bottom:2px solid #999999; border-top:1px solid #999999;"></div>
                                
<!--<table border="0" cellpadding="5" cellspacing="0" width="70%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999;">
	<tr>
		<td class="hed1">Applications</td>
  	</tr>
</table>-->
<!--<table border="0" cellpadding="5" cellspacing="0" width="70%" align="center" style="text-align:left; color:#666666; font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f5f5f5; box-shadow:0 0 1px #999999; border:1px solid #FFFFFF">
    <tr>
        <td>-->
        
<style type="text/css">
.grant {
border:1px solid #15aeec; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 25px; text-decoration:none; display:inline-block;font-weight:bold; color: #FFFFFF;
 background-color: #49c0f0; background-image: linear-gradient(to bottom, #49c0f0, #2CAFE3);
 }
.grant:hover{
 border:1px solid #1090c3;
 background-color: #1ab0ec; background-image: linear-gradient(to bottom, #1ab0ec, #1a92c2);
 }
</style>
<table width="100%" border="1" align="center">
  <tr>
    <td width="18%"><strong>Activity</strong> </td>
    <td width="39%"><strong>Project</strong></td>
    <td width="43%"><strong>Grant</strong></td>
  </tr>
  
  <tr>
    <td>E-Learning </td>
    <td>Provision of Software and Hardware for e-learning centres in schools@ Rs. 30,000/- to 40,000/- per centre</td>
    <td>RILM will re-imburse a minimum of  Rs. 10,000/- with the maximum amount subject to funding available to RILM at the time.</td>
  </tr>
  
  <tr>
    <td>Happy School </td>
    <td>Providing at least 5 out of 9 mandated facilities to a selected school to make it a Happy School- cost maximum Rs 5 lakh per school</td>
    <td>RILM will re-imburse 50% of project cost subject to maximum of Rs.2.5 lakh (50% assistance)</td>
  </tr>
</table>

<p style="text-align:center"><a class="grant" href="http://www.grant.rotaryteach.org" style="text-transform:uppercase" target="_blank">Click here to apply for RILM Grant</a></p>
<p style="text-align: center;font-family:Arial, Helvetica, sans-serif;font-size:15px"><strong>Club Presidents
<a href="http://grant.rotaryteach.org/help.html" target="_blank">CLICK HERE</a> 
for help / details page regarding proceeding with the Grant Application</strong></p>
<p style="text-align: center;font-family:Arial, Helvetica, sans-serif;font-size:12px">
								<strong>1A.
								Club Presidents If you do not have your password 
								or forgotten it, go to the grant application 
								page by clicking on the blue button above and 
								click on "here" at the 'Create / Reset your Password' section at the bottom 
								of the login screen. in the subsequent screen, 
								enter your registered email id and press "send" 
								to recieve your password in your email. You may 
								later change the password after loging in from 
								your panel. In case you do not receive the 
								email, kindly check your "Spam" folder or wait 
								for some time.</strong></p>
            
            
            <div style="padding:15px 15px 0 15px; margin:0">
            <span style="color:#FF0000; font-size:14px; font-weight:bold"><?php echo $msg;?></span>
               
                </form>
				
<form name="frmregister" id="frmregister" method="post" action="grantApplicationRegistration.php" style="line-height:18px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#CC0000; font-weight:bold">
<input type="hidden" name="hdntype" id="hdntype" />
<input type="hidden" name="hdnbelongto" id="hdnbelongto" />
<input type="hidden" name="hdndistrict" id="hdndistrict" />
<input type="hidden" name="hdnclub" id="hdnclub" />
<input type="hidden" name="hdnrefno" id="hdnrefno" />
<u>Please read the Important Instructions below before proceeding with the Grant Application :</u>
</form> 				  
<form name="frmapprove" id="frmapprove" method="post" action="goforapproval.php" style="line-height:18px; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify; margin:10px 0 0 0">
<input type="hidden" name="hdnrefappno" id="hdnrefappno" />
<input type="hidden" name="hdnapproveby" id="hdnapproveby" />
<input type="hidden" name="hdnvalidationfor" id="hdnvalidationfor" />

<ul style="text-align:justify; margin:0; padding:0 0 0 10px; list-style:decimal;" class="link">
	<li style="margin-bottom:15px; line-height:20px">
    	If you are applying for the first time, then select your District and Club, enter your Name and Email at the Primary Contact Section and click on <strong>"Submit"</strong>. Upon selecting your Club and District, please see if your club president’s name and e mail ID is shown in the respective fields. If yes, then click “Submit” after filling up Primary Contact data and an automated email will go to the RI registered email ID of your club president asking for his/her approval of your credentials. If the Club President’s name and registered email id, does not automatically show up, kindly send the club president’s name, e mail ID and mobile no. to RILM office at grant@rotaryteach.org before applying for grant. Once approved, your Club President will be notified by email with email id and password for log in to approve the Primary Contact. Once the club president approves, you will get an email with your email id and password and will be allowed to proceed with the application by logging in through the <strong>“Login”</strong> section. Once logged in, you can click on <strong>“Create Grant Application”</strong> on the top menu and proceed by selecting the project for which you wish to apply for grant.
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	In order to submit a grant application, your club president needs to be registered with RILM if it does not appear in the designated fields by default. In that case, kindly send the club president’s name, e mail ID and mobile no. to RILM office at <strong>grant@rotaryteach.org</strong> before applying for grant. Once approved, your Club President will be notified by e mail and then you will be able to register yourself as above. 
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	 For a Happy School Grant application, you need to select which activities you propose to undertake. You need to select a minimum of 5 activities for a Happy School project Grant Application. However, presence of all 9 facilities must be ensured to be eligible for reimbursement against a Happy School Grant. You must also agree that the facilities that you are not including in your activities are already exist in proper condition in those schools. Please note, for a School to be a Happy School, all 9 facilities must exist in proper condition in those schools. You may however choose to undertake less than 5 facilities but in that case, the application will not be eligible for Grant but you can upload in Project Upload section.
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	Now you may move on to the actual Grant Application Form and fill in the requisite details. You can fill up part of the application at a time and can click <strong>"Save & Next"</strong> at the bottom of each page and can exit. Next time when you log in, you can fill up the remaining unfilled data or can also edit the already filled data till you authorise the application as per following process.
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	After filling in the Grant Application, it needs to be approved by the Primary Contact as well as the Club President at the Club level. To approve a Grant Application, kindly click on <strong>“Approve”</strong> button on the respective panel. Kindly note that you CANNOT edit the application once you have approved it. Your Club President also needs to approve the application in the same process after you did it through the Login Section by putting email id and password.
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	<strong><u>MOST IMPORTANT -</u></strong> Before proceeding to fill up the Grant Application kindly download a copy of the blank Application Form by 
		<a href="http://www.rotaryteach.org/download_forms_grant.shtml">CLICKING HERE</a>, fill it up and then proceed to fill up the online application form.
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	To know the Approval Status of your Grant Application, you can see the approval status against your grant number. A “Tick” against the application by the designated person means that it has been approved by him/her. You can also download the PDF file of your application during any stage of the process by clicking Download PDF after saving the file at any page by clicking next and coming back to this page.
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	After authorization at club level, the grant will be evaluated and approved by District and RILM level. <strong>Please do not start work unless the grant is finally approved by RILM and an intimation is mailed to you.</strong> Please also note that your approved grant amount will be reimbursed only after you submit the final report in the designated  reporting form and the same is accepted by RILM.
    </li>
    <li style="margin-bottom:15px; line-height:20px">
    	In case you forget your password at any stage, you may retrieve the same by clicking on the "Click here to Reset your password" on the grant application page.
    </li>
	<li style="margin-bottom:15px; line-height:20px">
    	Once you login to the system, To start an application, click on “Create Grant Application” at top right hand of the page and select the appropriate project to start. You will see that the list of your all previous applications is displayed along with approval status by various stakeholders. A “tick” against a person signifies that the application has been approved by that person.
    </li>
	<li style="margin-bottom:15px; line-height:20px">Now proceed by filling in the various sections. Please note that you need to attach minimum 1 picture and 1 quotation in each section.
    </li>
	<li style="margin-bottom:15px; line-height:20px">Click on an application number to see the summary. You may approve your application once it is complete in all respect by clicking the “approve” button and can also download the PDF of your application. Also, the various pictures and quotations uploaded by you will also be shown section wise below.
    </li>
</ul>
</form>
	            </div>            

           
        
    						</td>
						</tr>
					</table>
                    
                    <!----------------------- FOOTER AREA START------------------------>
                     <?php include("../footer_area.html");?>
					
                    <!----------------------- FOOTER AREA END-------------------------->
                </td>
                <td style="background:url(../images/right.png)"></td>
            </tr>
            <tr>
                <td width="8"><img src="../images/h_bottom_l.png" /></td>
                <td style="background:url(../images/h_bottom.png)"></td>
                <td width="8"><img src="../images/h_bottom_r.png" /></td>
            </tr>
        </table>
        <!----------------------- CONTENT AREA END -------------------->
          
    </div> 

    
    
</div>
</div>
</center>
	<script type="text/javascript" src="../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>


<script type="text/javascript">




	Cufon.now();
	Cufon.replace('h1', {hover: true});
	Cufon.replace('h2', {hover: true});
	//Cufon.replace('h2');
	Cufon.replace('h3');
	Cufon.replace('h4');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('h7', {hover: true});
	
	function validation()
	{
	if($('input[name=txtbelong]:checked').length<=0)
	{
		alert("Please choose from where you belong.");
		return false;
	}
	if($('input[name=txtbelong]:checked').val()=='Rotary')
	{
		if($.trim($("#txtRotDistrict").val())==''){
			alert("Please choose district.");
			$("#txtRotDistrict").focus();
			return false;
		}
		if($.trim($("#txtRotClub").val())==''){
			alert("Please choose club.");
			$("#txtRotClub").focus();
			return false;
		}
	}
	else if($('input[name=txtbelong]:checked').val()=='Rotaract')
	{
			if($.trim($("#txtRotDistrict").val())==''){
			alert("Please choose district.");
			$("#txtRotDistrict").focus();
			return false;
			}
			if($.trim($("#txtClubName").val())==''){
			alert("Please enter club.");
			$("#txtClubName").focus();
			return false;
			}

	}
	else if($('input[name=txtbelong]:checked').val()=='Inner Wheel')
	{
			if($.trim($("#txtinnerdistrict").val())==''){
			alert("Please enter district.");
			$("#txtinnerdistrict").focus();
			return false;
			}
			if($.trim($("#txtClubName").val())==''){
			alert("Please enter club.");
			$("#txtClubName").focus();
			return false;
			}

	}
	return true;
	
	}
	
	function applicationlist(){
	
if(!validation())
		{
			return false;
		}
	
	var pars = 'belongto='+$('input[name=txtbelong]:checked').val()
	
		if($('input[name=txtbelong]:checked').val()=='Rotary')
		{
		 pars =pars+'&district='+$("#txtRotDistrict").val()+'&club='+$("#txtRotClub").val()
		}
		else if($('input[name=txtbelong]:checked').val()=='Rotaract')
		{
		 pars =pars+'&district='+$("#txtRotDistrict").val()+'&club='+$("#txtClubName").val()
		}
		else if($('input[name=txtbelong]:checked').val()=='Inner Wheel') 
		{
		 pars =pars+'&district='+$("#txtinnerdistrict").val()+'&club='+$("#txtClubName").val()
		}

//alert(pars)
		
		var str = ""
						str =str+"<table border='1' cellpadding='2' cellspacing='0' ><tr>";
						str =str+"<td>RILM Grant No.</td>";
						str =str+"<td>Authorization Status of Primary Contact</td>";
						str =str+"<td>Authorization Status of Club President</td>";
						str =str+"<td>Overall Authorization/Approval Status</td>";
						str =str+"<td>Download PDF of Grant Application</td>";
						str =str+"</tr>";
		$.ajax({                                      
			  url: 'getApplication.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
				
				if(data.length>0) {	
					for(var i=0; i<data.length; i++){
						var funct = "gotologin('"+data[i]["refappno"]+"')"
						var PDFfunct = "gotoPDF('"+data[i]["refappno"]+"')"
						var CPapprovefunct = "goforapprove('"+data[i]["refappno"]+"','CP')"
						var PCPapprovefunct = "goforapprove('"+data[i]["refappno"]+"','PCP')"
						var statusfunct = "viewStatus('"+data[i]["refappno"]+"')"
						str =str+"<tr>";
						str =str+"<td>"+(i+1)+". <a href='javascript: void(0)' onclick="+funct+">"+data[i]["refappno"]+"</a></td>";
						if(data[i]["approvebyPCP"]=='Yes')
						str =str+"<td><a href='javascript: void(0)' >"+data[i]["approvebyPCP"]+"</a></td>";
						else
						str =str+"<td><a href='javascript: void(0)' onclick="+PCPapprovefunct+" >"+data[i]["approvebyPCP"]+"</a></td>";
						if(data[i]["approvebyCP"]=='Yes')
						str =str+"<td><a href='javascript: void(0)' disabled='disabled'>"+data[i]["approvebyCP"]+"</a></td>";
						else
						str =str+"<td><a href='javascript: void(0)' onclick="+CPapprovefunct+">"+data[i]["approvebyCP"]+"</a></td>";
						
						str =str+"<td><a href='javascript: void(0)' onclick="+statusfunct+">Status</a></td>";
						str =str+"<td><a href='javascript: void(0)' onclick="+PDFfunct+">PDF of "+data[i]["refappno"]+"</a></td>";
						str =str+"</tr>";
						}
					}
					else
					{
					str =str+"<tr><td colspan='3' style='color:red'>Application are not found</td></tr>";
					}
			$("#listofapplication").html(str);
				}
			});
			
	}
	
	function viewStatus(val) {
	
	var pars ='refappno='+val; 
	$.ajax({                                      
      url: 'dispstatus.php',                     
      data: pars,
	  type:"post",
		dataType: 'text',
		success: function(data)         
      	{
			if(data.length>0) 
			{
				 $.fancybox(data); 
		
			}
								 
		}
	});
	 return false;
}

	
	function fillhidden()
	{
	$('#hdnbelongto').val($('input[name=txtbelong]:checked').val());
		if($('input[name=txtbelong]:checked').val()=='Rotary')
		{
			$('#hdndistrict').val($("#txtRotDistrict").val());
			$('#hdnclub').val($("#txtRotClub").val());
		}
		else if($('input[name=txtbelong]:checked').val()=='Rotaract')
		{	
			$('#hdndistrict').val($("#txtRotDistrict").val());
			$('#hdnclub').val($("#txtClubName").val());
		}
		else if($('input[name=txtbelong]:checked').val()=='Inner Wheel')
		{	
			$('#hdndistrict').val($("#txtinnerdistrict").val());
			$('#hdnclub').val($("#txtClubName").val());
		}

	}
	
	function newapplication() {
	if(!validation())
		{
			return false;
		}
	
	fillhidden();
	$('#hdntype').val('New');
	$('#hdnbelongto').val($('input[name=txtbelong]:checked').val());
	$('#hdnrefappno').val('');
	$("#frmregister").submit();
	
	}
	
	function gotologin(refno){
			
			var pars = 'refappno='+refno
		if($('input[name=txtbelong]:checked').val()=='Rotary')
		{
		 pars =pars+'&district='+$("#txtRotDistrict").val()+'&club='+$("#txtRotClub").val()
		}
		else if($('input[name=txtbelong]:checked').val()=='Rotaract')
		{
		 pars =pars+'&district='+$("#txtRotDistrict").val()+'&club='+$("#txtClubName").val()
		}
		else if($('input[name=txtbelong]:checked').val()=='Inner Wheel') 
		{
		 pars =pars+'&district='+$("#txtinnerdistrict").val()+'&club='+$("#txtClubName").val()
		}
		fillhidden();
		//alert(pars)
		
			$.ajax({                                      
			  url: 'checkforaccess.php',                     
			  data: pars,
			  type:"post",
				dataType: 'json',
				success: function(data)         
				{
				//alert(JSON.stringify(data))
				if(data["status"]==0)
				{
					$('#hdntype').val('Existing');
					$('#hdnbelongto').val($('input[name=txtbelong]:checked').val());
					$('#hdnrefno').val(refno);
					$("#frmregister").submit();
				}
				else if(data["status"]==2) {
				$('#hdnpdfrefappno').val(refno);
				$("#frmpdf").submit();
				}
				else
				{
					window.location = "grantApplicationLogin.php?refno="+refno;
				}
				}
			});
	}
	
	function gotoPDF(refno) {
			$('#hdnpdfrefappno').val(refno);
			$("#frmpdf").submit();
	}

function goforapprove(refno,approveby)
{
		if(!confirm('Want to Approved this application?')) return;
			$('#hdnrefappno').val(refno);
			$('#hdnapproveby').val(approveby);
				$('#frmapprove').submit();

}

</script>


</body>
</html>






