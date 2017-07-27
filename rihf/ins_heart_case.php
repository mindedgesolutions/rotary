<?php
session_start();
ob_start();
include("admin/includes/connect.php"); 
$email=$_SESSION['uid'];

$query1="SELECT MAX(ref_no) as max_mark FROM `heart_case`"; 
	$result1=mysql_query($query1);
	$h=mysql_fetch_array($result1);
	$id=$h[max_mark];
	if($id==0)
	{
	$id=1000;
	}
	else
	{
	$id=$id+1;
	}
mkdir("heart_ref/".$id, 0777);
mkdir("heart_ref/".$id."/other", 0777);
//----------------------------------------------------------------


if(isset($_REQUEST['name']) && $_REQUEST['name']!="")
{
$name=$_REQUEST['name'];
}
else
{
$name="N/A";
}
//----------------------------------------------------
if(isset($_REQUEST['ad1']) && $_REQUEST['ad1']!="")
{
$ad1=$_REQUEST['ad1'];
}
else
{
$ad1="N/A";
}
//----------------------------------------------------
if(isset($_REQUEST['ad2']) && $_REQUEST['ad2']!="")
{
$ad2=$_REQUEST['ad2'];
}
else
{
$ad2="N/A";
} 
//-------------------------------------------------------
if(isset($_REQUEST['city']) && $_REQUEST['city']!="")
{
$city=$_REQUEST['city'];
}
else
{
$city="N/A";
} 
//------------------------------------------------------
if(isset($_REQUEST['age']) && $_REQUEST['age']!="")
{
$age=$_REQUEST['age'];
}
else
{
$age=0;
}
//------------------------------------------------------
if(isset($_REQUEST['radiobutton']) && $_REQUEST['radiobutton']!="")
{
$sex=$_REQUEST['radiobutton'];
}
else
{
$sex="N/A";
} 
//------------------------------------------------------
if(isset($_REQUEST['ps']) && $_REQUEST['ps']!="")
{
$ps=$_REQUEST['ps'];
}
else
{
$ps="N/A";
}
//------------------------------------------------------
if(isset($_FILES['file1']['name']) && $_FILES['file1']['name']!="")
{
$file1=$_FILES['file1']['name'];
$target_path="heart_ref/".$id."/".$file1;
@move_uploaded_file($_FILES['file1']['tmp_name'], $target_path);
}
else
{
$file1="N/A";
}
//------------------------------------------------------
if(isset($_FILES['file2']['name']) && $_FILES['file2']['name']!="")
{
$file2=$_FILES['file2']['name'];
$target_path="heart_ref/".$id."/".$file2;
@move_uploaded_file($_FILES['file2']['tmp_name'], $target_path);
}
else
{
$file2="N/A";
} 
//------------------------------------------------------
if(isset($_FILES['file3']['name']) && $_FILES['file3']['name']!="")
{
$file3=$_FILES['file3']['name'];
$target_path="heart_ref/".$id."/".$file3;
@move_uploaded_file($_FILES['file3']['tmp_name'], $target_path);
}
else
{
$file3="N/A";
} 
//------------------------------------------------------
if(isset($_FILES['file4']['name']) && $_FILES['file4']['name']!="")
{
$file4=$_FILES['file4']['name'];
$target_path="heart_ref/".$id."/".$file4;
@move_uploaded_file($_FILES['file4']['tmp_name'], $target_path);
}
else
{
$file4="N/A";
} 
//------------------------------------------------------
if(isset($_FILES['file5']['name']) && $_FILES['file5']['name']!="")
{
$file5=$_FILES['file5']['name'];
$target_path="heart_ref/".$id."/".$file5;
@move_uploaded_file($_FILES['file5']['tmp_name'], $target_path);
}
else
{
$file5="N/A";
} 
//------------------------------------------------------
if(isset($_FILES['file6']['name']) && $_FILES['file6']['name']!="")
{
$file6=$_FILES['file6']['name'];
$target_path="heart_ref/".$id."/".$file6;
@move_uploaded_file($_FILES['file6']['tmp_name'], $target_path);
}
else
{
$file6="N/A";
} 
//------------------------------------------------------
if(isset($_FILES['file7']['name']) && $_FILES['file7']['name']!="")
{
$file7=$_FILES['file7']['name'];
$target_path="heart_ref/".$id."/".$file7;
@move_uploaded_file($_FILES['file7']['tmp_name'], $target_path);
}
else
{
$file7="N/A";
} 
//--------------------------------------------------------------------------------
define("GMT_HR_DIFF",5);
define("GMT_MIN_DIFF",30);


   
$dt=date("Y-m-d",mktime(gmdate("H")+GMT_HR_DIFF,gmdate("i")+GMT_MIN_DIFF,gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
//--------------------------------------------------------------------------------
$query="INSERT into heart_case (ref,name,ad1,ad2,city,age,sex,photo,prscription,c_report,p_report,ecg,scans,quotations,p_surgery,status,ref_no,date) VALUES ('$email','$name','$ad1','$ad2','$city',$age,'$sex','$file1','$file2','$file3','$file4','$file5','$file6','$file7','$ps','Submitted',$id,'$dt')";
$result=mysql_query($query);

$query="INSERT into case_heart_donations (ref_id) VALUES ($id)";
$result=mysql_query($query);

$query="INSERT into case_heart_ongoing (ref_id) VALUES ($id)";
$result=mysql_query($query);

header("location:my_home.php?ht=home");
?>