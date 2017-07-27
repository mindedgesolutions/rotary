<?php
session_start();
ob_start();
include("admin/includes/connect.php"); 

$type=$_REQUEST['radiobutton1'];
$name=$_REQUEST['name'];
$ad1=$_REQUEST['ad1'];
$ad2=$_REQUEST['ad2'];
$city=$_REQUEST['city'];
$zip=$_REQUEST['zip'];
$country=$_REQUEST['country'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];

//--------------------------------------------------------------------------
$final_interest = array();
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");

$comapre = array();
array_push($comapre, "health");
array_push($comapre, "environment");
array_push($comapre, "education");
array_push($comapre, "empowerment");
array_push($comapre, "disaster");
array_push($comapre, "polio");

$interest=$_POST['interest'];
$how_many = count($interest);
if($how_many>0)
{

for ($i=0; $i<6; $i++) 
{
 for($j=0;$j<$how_many;$j++)
  {
   if($comapre[$i]==$interest[$j])
      {
	   $final_interest[$i]="yes";
	  }
  }
}

}
//---------------------------------------------------------------------------

$uniqueID = md5( microtime() . rand() ).session_id();
//---------------------------------------------------------------------------create login------------------------------------------
$query="INSERT into login (email,pass,status,vcode,health,environment,education,empowerment,disaster,polio,type) VALUES ('$email','$pass','unverified','$uniqueID','$final_interest[0]','$final_interest[1]','$final_interest[2]','$final_interest[3]','$final_interest[4]','$final_interest[5]','$type')";
$result=mysql_query($query);
if($result)
{
//--------------------------------------------------------------------------------NON COMPANY---------------------------------------
if($type!="Organization")
{

$age=$_REQUEST[age];
$sex=$_REQUEST['radiobutton'];

if(isset($_REQUEST[lcc]) && $_REQUEST[lcc]!="")
{
$lcc=$_REQUEST[lcc];
}
else
{
$lcc=0;
}

if(isset($_REQUEST[lctc]) && $_REQUEST[lctc]!="")
{
$lctc=$_REQUEST[lctc];
}
else
{
$lctc=0;
}


if(isset($_REQUEST[ln]) && $_REQUEST[ln]!="")
{
$ln=$_REQUEST[ln];
}
else
{
$ln=0;
}


if(isset($_REQUEST[mcc]) && $_REQUEST[mcc]!="")
{
$mcc=$_REQUEST[mcc];
}
else
{
$mcc=0;
}


if(isset($_REQUEST[mn]) && $_REQUEST[mn]!="")
{
$mn=$_REQUEST[mn];
}
else
{
$mn=0;
}

$basic_stu=$_REQUEST['basic_stu'];

$query="INSERT into nonorg (name,type,ad1,ad2,city,zip,country,age,sex,ph_country,ph_city,ph_no,mobile_country,mobile_no,email,qualification) VALUES ('$name','$type','$ad1','$ad2','$city','$zip','$country',$age,'$sex',$lcc,$lctc,$ln,$mcc,$mn,'$email','$basic_stu')";
$result=mysql_query($query);

}
else if($type=="Organization")
{

$type=$_REQUEST['kind'];
if($type=="ot")
{
$type=$_REQUEST['oot'];
}

if(isset($_REQUEST[lcc]) && $_REQUEST[lcc]!="")
{
$lcc=$_REQUEST[lcc];
}
else
{
$lcc=0;
}

if(isset($_REQUEST[lctc]) && $_REQUEST[lctc]!="")
{
$lctc=$_REQUEST[lctc];
}
else
{
$lctc=0;
}


if(isset($_REQUEST[ln]) && $_REQUEST[ln]!="")
{
$ln=$_REQUEST[ln];
}
else
{
$ln=0;
}

$cp=$_REQUEST['cp'];
$dp=$_REQUEST['dp'];
$ho=$_REQUEST['ho'];
$hd=$_REQUEST['hd'];

$query="INSERT into reg_org (name,type,ad1,ad2,city,zip,country,ph_country,ph_city,ph_no,email,contact_person,designation_contact,hod,desgnation_hod) VALUES ('$name','$type','$ad1','$ad2','$city','$zip','$country',$lcc,$lctc,$ln,'$email','$cp','$dp','$ho','$hd')";
$result=mysql_query($query);

}
//--------------------------------------------------------CREATE newsletter------------------------------------------------------------------
if(isset($_REQUEST['checkbox7']) && $_REQUEST['checkbox7']!="")
{
$mo=$_REQUEST[mcc]."".$_REQUEST[mn];
$query="INSERT into sms_cust (id_em,mobile_no) VALUES ('$email','$mo')";
$result=mysql_query($query);
}

if(isset($_REQUEST['checkbox8']) && $_REQUEST['checkbox8']!="")
{

if(isset($_REQUEST['altem']) && $_REQUEST['altem']!="")
{
$altem=$_REQUEST['altem'];
}
else
{
$altem=$email;
}

$query="INSERT into newsletter (id_em,email) VALUES ('$email','$altem')";
$result=mysql_query($query);
}

//----------------------------------------------------SEND EMAIL---------------------------------------------------------------------------------

$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: support@rihf.org\n";
$headers .= "To: ".$email."\n";
$headers .= "X-Priority: 1\n"; 
$headers .= "Reply-To: support@rihf.org\n";

$sendTo2=$email;
$subject2="Thank you for registering with us at RIHF";

$message2 = "<table><tr><td>Dear $name,</td></tr><tr><td>&nbsp;</td></tr><tr><td>Thank you for visiting our website and registering with us. Kindly verify your registration by clicking on the link below:<br /><br /><a href='http://rihf.org/verify.php?vc=$uniqueID&em=$email'>http://www.rihf.org/verify_me</a></td></tr><tr><td>&nbsp;</td></tr><tr><td>Thank You for your time.</td></tr><tr><td>&nbsp;</td></tr><tr><td>Kind regards,</td></tr><tr><td>System Support</td></tr><tr><td>&nbsp;</td></tr><tr><td>RIHF</td></tr><tr><td><img src='http://rihf.org/images/elogo.jpg'></td></tr><tr><td>&nbsp;</td></tr><tr><td>Tel: :+91 33 24863434/35<br />Fax:+91 33 24863436<br />E-mail: support@rihf.org<br />Or visit our website: www.rihf.org</td></tr></table>";

//if(@mail($sendTo2, $subject2, $message2, $headers))
//{
header("location:signup_status.php?msg=1&nam=$name");
//}
}
?>