<?php
include("admin/includes/connect.php"); 

$name=$_REQUEST['name'];
$ad1=$_REQUEST['ad1'];
$ad2=$_REQUEST['ad2'];
$occupation=$_REQUEST['occup'];
$date=$_REQUEST['date'];
//--------------------------------------------------
if($_REQUEST[lcc]!="")
{
$lcc=$_REQUEST[lcc];
$lctc=$_REQUEST[lctc];
$ln=$_REQUEST[ln];
$land=$lcc."".$lctc."".$ln;
}
else
{
$land=0;
}
//--------------------------------------------------------------------------
$final_interest = array();
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");
array_push($final_interest, "no");

$comapre = array();
array_push($comapre, "doctor");
array_push($comapre, "nurse");
array_push($comapre, "paramedic");
array_push($comapre, "psychiatrist");
array_push($comapre, "general");

$interest=$_POST['interest'];
$how_many = count($interest);
if($how_many>0)
{

for ($i=0; $i<5; $i++) 
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
echo $final_interest[0];
echo $final_interest[1];
echo $final_interest[2];
echo $final_interest[3];
echo $final_interest[4];

$query=mysql_query("INSERT into volunteer (name,ad1,ad2,occupation,date,phone,doctor,nurse,paramedic,psychiatrist,general) VALUES ('$name','$ad1','$ad2','$occupation','$date',$land,'$final_interest[0]','$final_interest[1]','$final_interest[2]','$final_interest[3]','$final_interest[4]')");

if($query)
{
  header("location:signup_status.php?msg=4");
 }
?>