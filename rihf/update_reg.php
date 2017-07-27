<?php
session_start();
ob_start();
include("admin/includes/connect.php"); 

$email=$_SESSION['uid'];
$query=mysql_query("select * from login where email='$email'");
$rec=mysql_fetch_array($query);
$type=$rec['type'];


$name=$_REQUEST['name'];
$ad1=$_REQUEST['ad1'];
$ad2=$_REQUEST['ad2'];
$city=$_REQUEST['city'];
$zip=$_REQUEST['zip'];
$country=$_REQUEST['country'];

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

$query="UPDATE nonorg SET name='$name',ad1='$ad1',ad2='$ad2',city='$city',zip='$zip',country='$country',age=$age,sex='$sex',ph_country=$lcc,ph_city=$lctc,ph_no=$ln,mobile_country=$mcc,mobile_no=$mn,qualification='$basic_stu' where email='$email'";
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

$query="UPDATE reg_org SET name='$name',type='$type',ad1='$ad1',ad2='$ad2',city='$city',zip='$zip',country='$country',ph_country=$lcc,ph_city=$lctc,ph_no=$ln,contact_person='$cp',designation_contact='$dp',hod='$ho',desgnation_hod='$hd' where  email='$email'";
$result=mysql_query($query);
}
//--------------------------------------------------------CREATE SMS------------------------------------------------------------------
if($type!="Organization")
{
if(isset($_REQUEST['checkbox7']) && $_REQUEST['checkbox7']!="")
{

$query="select * from sms_cust where id_em='$email'";
$result=mysql_query($query);
$row=mysql_num_rows($result);

if($row==0)
{
$mo=$_REQUEST[mcc]."".$_REQUEST[mn];
$query="INSERT into sms_cust (id_em,mobile_no) VALUES ('$email','$mo')";
$result=mysql_query($query);
}
else
{
$mo=$_REQUEST[mcc]."".$_REQUEST[mn];
$query="UPDATE sms_cust SET mobile_no='$mo' where id_em='$email'";
$result=mysql_query($query);
}

}
else
{
$query="DELETE from sms_cust where id_em='$email'";
$result=mysql_query($query);
}

}
//--------------------------------------------------------CREATE NEWSLETTER------------------------------------------------------------------------------------------------------
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

$query="select * from newsletter where id_em='$email'";
$result=mysql_query($query);
$row=mysql_num_rows($result);

if($row==0)
{
$query="INSERT into newsletter (id_em,email) VALUES ('$email','$altem')";
$result=mysql_query($query);
}
else
{
$query="UPDATE newsletter SET email='$altem' where id_em='$email'";
$result=mysql_query($query);
}

}
else
{
$query="DELETE from newsletter where id_em='$email'";
$result=mysql_query($query);
}
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


$query23="UPDATE login SET health='$final_interest[0]',environment='$final_interest[1]',education='$final_interest[2]',empowerment='$final_interest[3]',disaster='$final_interest[4]',polio='$final_interest[5]' where email='$email'";
$result23=mysql_query($query23);

header("location:my_home.php?ht=home");
?>