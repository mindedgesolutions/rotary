<?php
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
 //$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");

$folder=$_POST['folderno'];


if(isset($_FILES['uploadimg1'])){
      $errors= array();
      $file_name = $_FILES['uploadimg1']['name'];
      $file_size =$_FILES['uploadimg1']['size'];
      $file_tmp =$_FILES['uploadimg1']['tmp_name'];
      $file_type=$_FILES['uploadimg1']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg1']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }      
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg1']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg1']['tmp_name'], $dst);
      }else{
         print_r($errors);
      }
   }
if(isset($_FILES['uploadimg2'])){
      $errors= array();
      $file_name = $_FILES['uploadimg2']['name'];
      $file_size =$_FILES['uploadimg2']['size'];
      $file_tmp =$_FILES['uploadimg2']['tmp_name'];
      $file_type=$_FILES['uploadimg2']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg2']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }		  
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg2']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg2']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }

if(isset($_FILES['uploadimg3'])){
      $errors= array();
      $file_name = $_FILES['uploadimg3']['name'];
      $file_size =$_FILES['uploadimg3']['size'];
      $file_tmp =$_FILES['uploadimg3']['tmp_name'];
      $file_type=$_FILES['uploadimg3']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg3']['name'])));
	  if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }      
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg3']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg3']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }
   
if(isset($_FILES['uploadimg4'])){
      $errors= array();
      $file_name = $_FILES['uploadimg4']['name'];
      $file_size =$_FILES['uploadimg4']['size'];
      $file_tmp =$_FILES['uploadimg4']['tmp_name'];
      $file_type=$_FILES['uploadimg4']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg4']['name'])));
      if($file_name!="")
	  {   
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }		  
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg4']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg4']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }   

if(isset($_FILES['uploadimg5'])){
      $errors= array();
      $file_name = $_FILES['uploadimg5']['name'];
      $file_size =$_FILES['uploadimg5']['size'];
      $file_tmp =$_FILES['uploadimg5']['tmp_name'];
      $file_type=$_FILES['uploadimg5']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg5']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }		  
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg5']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg5']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }  

if(isset($_FILES['uploadimg6'])){
      $errors= array();
      $file_name = $_FILES['uploadimg6']['name'];
      $file_size =$_FILES['uploadimg6']['size'];
      $file_tmp =$_FILES['uploadimg6']['tmp_name'];
      $file_type=$_FILES['uploadimg6']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg6']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg6']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg6']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }  
   
if(isset($_FILES['uploadimg7'])){
      $errors= array();
      $file_name = $_FILES['uploadimg7']['name'];
      $file_size =$_FILES['uploadimg7']['size'];
      $file_tmp =$_FILES['uploadimg7']['tmp_name'];
      $file_type=$_FILES['uploadimg7']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg7']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }		  
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg7']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg7']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }  

if(isset($_FILES['uploadimg8'])){
      $errors= array();
      $file_name = $_FILES['uploadimg8']['name'];
      $file_size =$_FILES['uploadimg8']['size'];
      $file_tmp =$_FILES['uploadimg8']['tmp_name'];
      $file_type=$_FILES['uploadimg8']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg8']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg8']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg8']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }

if(isset($_FILES['uploadimg9'])){
      $errors= array();
      $file_name = $_FILES['uploadimg9']['name'];
      $file_size =$_FILES['uploadimg9']['size'];
      $file_tmp =$_FILES['uploadimg9']['tmp_name'];
      $file_type=$_FILES['uploadimg9']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg9']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }		  
      if(empty($errors)==true){
        $fnm = $_FILES['uploadimg9']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg9']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }   
   
if(isset($_FILES['uploadimg10'])){
      $errors= array();
      $file_name = $_FILES['uploadimg10']['name'];
      $file_size =$_FILES['uploadimg10']['size'];
      $file_tmp =$_FILES['uploadimg10']['tmp_name'];
      $file_type=$_FILES['uploadimg10']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg10']['name'])));
	  if($file_name!="")
	  {     
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg10']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg10']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }    

if(isset($_FILES['uploadimg11'])){
      $errors= array();
      $file_name = $_FILES['uploadimg11']['name'];
      $file_size =$_FILES['uploadimg11']['size'];
      $file_tmp =$_FILES['uploadimg11']['tmp_name'];
      $file_type=$_FILES['uploadimg11']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg11']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }      
      if(empty($errors)==true){
        $fnm = $_FILES['uploadimg11']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg11']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }   

if(isset($_FILES['uploadimg12'])){
      $errors= array();
      $file_name = $_FILES['uploadimg12']['name'];
      $file_size =$_FILES['uploadimg12']['size'];
      $file_tmp =$_FILES['uploadimg12']['tmp_name'];
      $file_type=$_FILES['uploadimg12']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg12']['name'])));
      if($file_name!="")
	  { 
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg12']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg12']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }      

if(isset($_FILES['uploadimg13'])){
      $errors= array();
      $file_name = $_FILES['uploadimg13']['name'];
      $file_size =$_FILES['uploadimg13']['size'];
      $file_tmp =$_FILES['uploadimg13']['tmp_name'];
      $file_type=$_FILES['uploadimg13']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg13']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }      
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg13']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg13']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }    

if(isset($_FILES['uploadimg14'])){
      $errors= array();
      $file_name = $_FILES['uploadimg14']['name'];
      $file_size =$_FILES['uploadimg14']['size'];
      $file_tmp =$_FILES['uploadimg14']['tmp_name'];
      $file_type=$_FILES['uploadimg14']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg14']['name'])));
	  if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg14']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg14']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }

if(isset($_FILES['uploadimg15'])){
      $errors= array();
      $file_name = $_FILES['uploadimg15']['name'];
      $file_size =$_FILES['uploadimg15']['size'];
      $file_tmp =$_FILES['uploadimg15']['tmp_name'];
      $file_type=$_FILES['uploadimg15']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg15']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }      
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg15']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg15']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }
   
if(isset($_FILES['uploadimg16'])){
      $errors= array();
      $file_name = $_FILES['uploadimg16']['name'];
      $file_size =$_FILES['uploadimg16']['size'];
      $file_tmp =$_FILES['uploadimg16']['tmp_name'];
      $file_type=$_FILES['uploadimg16']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg16']['name'])));
     if($file_name!="")
	  { 
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg16']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg16']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }

if(isset($_FILES['uploadimg17'])){
      $errors= array();
      $file_name = $_FILES['uploadimg17']['name'];
      $file_size =$_FILES['uploadimg17']['size'];
      $file_tmp =$_FILES['uploadimg17']['tmp_name'];
      $file_type=$_FILES['uploadimg17']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg17']['name'])));
      if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg17']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg17']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }

if(isset($_FILES['uploadimg18'])){
      $errors= array();
      $file_name = $_FILES['uploadimg18']['name'];
      $file_size =$_FILES['uploadimg18']['size'];
      $file_tmp =$_FILES['uploadimg18']['tmp_name'];
      $file_type=$_FILES['uploadimg18']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg18']['name'])));
		if($file_name!="")
	  {
		  $expensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }
	  }  
      if(empty($errors)==true){
        $fnm = $_FILES['uploadimg18']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg18']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }

   if(isset($_FILES['uploadimg19'])){
      $errors= array();
      $file_name = $_FILES['uploadimg19']['name'];
      $file_size =$_FILES['uploadimg19']['size'];
      $file_tmp =$_FILES['uploadimg19']['tmp_name'];
      $file_type=$_FILES['uploadimg19']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg19']['name'])));
      
	  if($file_name!="")
	  {
		$expensions= array("jpeg","jpg","png");      
		  if(in_array($file_ext,$expensions)=== false){
			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		  }
		  
		  if($file_size > 2097152){
			 $errors[]='File size must be excately 2 MB';
		  }  
	  }
      
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg19']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg19']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }
   
   if(isset($_FILES['uploadimg20'])){
      $errors= array();
      $file_name = $_FILES['uploadimg20']['name'];
      $file_size =$_FILES['uploadimg20']['size'];
      $file_tmp =$_FILES['uploadimg20']['tmp_name'];
      $file_type=$_FILES['uploadimg20']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['uploadimg20']['name'])));
      
     if($file_name!="")
     {
      $expensions= array("jpeg","jpg","png");      
        if(in_array($file_ext,$expensions)=== false){
          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
          $errors[]='File size must be excately 2 MB';
        }  
     }
      
      if(empty($errors)==true){
         $fnm = $_FILES['uploadimg20']['name'];
         $dst = 'images/'.$folder.'/'.$fnm;
         $upload = move_uploaded_file($_FILES['uploadimg20']['tmp_name'], $dst);  
      }else{
         print_r($errors);
      }
   }
   
//$host="192.185.36.129"; // Host name 
//$username="rotary32_arindam"; // Mysql username 
//$password="info123"; // Mysql password 
//$db_name="rotary32_teach"; // Database name 
//$tbl_name="tblHappySchoolMaster"; // Table name 


$host="103.227.62.215"; // Host name 
$username="mindedgeteach1"; // Mysql username 
$password="SuHiNa@1979"; // Mysql password 
$db_name="rotary32_teach"; // Database name 
$tbl_name="tblHappySchoolMaster"; // Table name 


// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$projectNo=$_POST['txtprojectno'];
$areyoua=$_POST['areyoua'];
$name=$_POST['txtName'];
$designation=$_POST['txtDesignation'];
$mobno=$_POST['txtMobNo'];
$email=$_POST['txtEmailAddress'];
$state=$_POST['chostate'];
$city=$_POST['txtcity'];
$district=$_POST['txtdistrictforother'];
$club=$_POST['txtclubforother'];
$schoolID=$_POST['txtUniqSchoolId'];
$schoolName=$_POST['txtNameofSchool'];
$SchoolAddress=$_POST['txtAddressOfSchool'];
$noOfBoys=$_POST['txtNoOfBoys'];
$noOfGirls=$_POST['txtNoOfGirls'];
$totNoOfStudInSchool=$_POST['txtTotalNoOfStudents'];
$totNoOfMaleTeachers=$_POST['txtTotalNoOfMaleTeachers'];
$totNoOfFemaleTeachers=$_POST['txtTotalNoOfFemaleTeachers'];
$totNoOfTeachersInSchool=$_POST['txtTotalNoOfTeachersInTheSchool'];
$existenceOfSMC=$_POST['smc'];
//
$schoolTypePrimary=$_POST['chkSchool1'];
$schoolTypeElementary=$_POST['chkSchool2'];
$schoolTypeSecondary=$_POST['chkSchool3'];
$schoolTypeHigherSecondary=$_POST['chkSchool4'];

$projectYear=$_POST['choProjYear'];
$painted=$_POST['chkRenovation'];

$structureroof=$_POST['chkProject1'];
$wall=$_POST['chkProject2'];
$flor=$_POST['chkProject3'];
$doors=$_POST['chkProject4'];
$windows=$_POST['chkProject5'];
$boundarywall=$_POST['chkProject6'];
$light=$_POST['chkProject7'];
$fans=$_POST['chkProject8'];



$img1=$_FILES['uploadimg1']['name'];
$picbefore='images/'.$folder.'/'.$img1;

$picafter='images/'.$folder.'/'.$_FILES['uploadimg2']['name'];

$paintedprojcost=$_POST['txtProjectCost'];
$adequate=$_POST['chkSepToiletsBoysGirls'];
$renovatedforboys=$_POST['txtRenovatedNoBoys'];
$newlyconstructedforboys=$_POST['txtNewlyConstrNoBoys'];
$renovatedtotalforboys=$_POST['txtTotalNoBoys'];
$renovatedforgirls=$_POST['txtRenovatedNoGirls'];
$newlyconstructedforgirls=$_POST['txtNewlyConstrNoGirls'];
$renovatedtotalforgirls=$_POST['txtTotalNoGirls'];
$adequateprojcost=$_POST['txtProjectCostSepToiletsBoysGirls'];

$adequatepicbefore1='images/'.$folder.'/'.$_FILES['uploadimg3']['name'];
$adequatepicbefore2='images/'.$folder.'/'.$_FILES['uploadimg4']['name'];
$adequatepicafter1='images/'.$folder.'/'.$_FILES['uploadimg5']['name'];
$adequatepicafter2='images/'.$folder.'/'.$_FILES['uploadimg6']['name'];

$handwash=$_POST['chkHandWashStation'];
$handwashrenovated=$_POST['txtRenovatedNo'];
$handwashnewlyconstructed=$_POST['txtNewlyConstrNo'];
$handwashtotalnumber=$_POST['txtHandWashStationTotalNo'];
$handwashprojcost=$_POST['txtHandWashStationProjectCost'];

$handwashpicbefore='images/'.$folder.'/'.$_FILES['uploadimg7']['name'];
$handwashpicafter='images/'.$folder.'/'.$_FILES['uploadimg8']['name'];

$cleandrink=$_POST['chkDrinkingWater'];
$cleandrinkrepaired=$_POST['txtDrinkingWaterRepaired'];
$cleandrinkinstalled=$_POST['txtDrinkingWaterInstalled'];
$cleandrinktotalnumber=$_POST['txtDrinkingWaterTotalNo'];
$cleandrinkprojcost=$_POST['txtDrinkingWaterProjectCost'];

$cleandrinkpicbefore='images/'.$folder.'/'.$_FILES['uploadimg9']['name'];
$cleandrinkpicafter='images/'.$folder.'/'.$_FILES['uploadimg10']['name'];

$library=$_POST['chkLibrary'];
$librarynoofbooks=$_POST['txtLibraryNoBooks'];
$librarynoofalmirah=$_POST['txtLibraryNoOfAlmirah'];
$libraryprojcost=$_POST['txtLibraryProjectCost'];

$librarypic='images/'.$folder.'/'.$_FILES['uploadimg11']['name'];

$playmaterial=$_POST['chkPlayMaterial'];
$totalnoofsportsequipments=$_POST['txtTotalSportsEquipment'];
$playmaterialprojcost=$_POST['txtSportsEquipmentProjectCost'];

$playmaterialpic1='images/'.$folder.'/'.$_FILES['uploadimg12']['name'];
$playmaterialpic2='images/'.$folder.'/'.$_FILES['uploadimg13']['name'];

$benches=$_POST['chkBenchesDesks'];
$noofbenchesprovided=$_POST['txtTotalBenches'];
$noofdeskprovided=$_POST['txtTotalDesks'];
$benchestotalno=$_POST['txtTotalBenchesDesks'];
$benchesprojcost=$_POST['txtBenchesDesksProjectCost'];

$benchespicbefore='images/'.$folder.'/'.$_FILES['uploadimg14']['name'];
$benchespicafter='images/'.$folder.'/'.$_FILES['uploadimg15']['name'];

$wellmaintained=$_POST['chkSpaceForTeachingStaff'];
$wellmaintainednooftables=$_POST['txtTotalTablesForTeachingStaff'];
$wellmaintainednoofchairs=$_POST['txtTotalChairsForTeachingStaff'];
$wellmaintainednooflight=$_POST['txtTotalLightsFans'];
$wellmaintainedprojcost=$_POST['txtForTeachingStaffProjectCost'];

$wellmaintainedpicbefore='images/'.$folder.'/'.$_FILES['uploadimg16']['name'];
$wellmaintainedpicafter='images/'.$folder.'/'.$_FILES['uploadimg17']['name'];

$shoes=$_POST['chkShoesBags'];
$shoesnooffootwear=$_POST['txtTotalShoes'];
$shoesnoofschoolbags=$_POST['txtTotalBags'];
$shoesprojcost=$_POST['txtShoesBagsProjectCost'];

$shoespicbefore='images/'.$folder.'/'.$_FILES['uploadimg18']['name'];
$shoespicafter='images/'.$folder.'/'.$_FILES['uploadimg19']['name'];

$anyother=$_POST['chkAnyOther'];
$anyotherdetails=$_POST['txtAnyOtherdetail'];
$anyrequirement='images/'.$folder.'/'.$_FILES['uploadimg20']['name'];

//$source=$_POST['text1'];
//$orgname=$_POST['text2'];
//$amt=$_POST['text3'];
$str=$_POST['text2'];
$count=$_POST['text4'];


// Insert data into mysql 
$sql="INSERT INTO $tbl_name(project_no,areyou,name,designation,mobno,email,state,city,district,club,schoolID,schoolName,SchoolAddress,noOfBoys,noOfGirls
,totNoOfStudInSchool,totNoOfMaleTeachers,totNoOfFemaleTeachers,totNoOfTeachersInSchool,existenceOfSMC,schoolTypePrimary,schoolTypeElementary
,schoolTypeSecondary,schoolTypeHigherSecondary,projectYear,painted,structureroof,wall,flor,doors,windows,boundarywall,light,fans,picbefore
,picafter,paintedprojcost,adequate,renovatedforboys,newlyconstructedforboys,renovatedtotalforboys,renovatedforgirls,newlyconstructedforgirls
,renovatedtotalforgirls,adequateprojcost,adequatepicbefore1,adequatepicbefore2,adequatepicafter1,adequatepicafter2
,handwash,handwashrenovated,handwashnewlyconstructed,handwashtotalnumber,handwashprojcost,handwashpicbefore,handwashpicafter
,cleandrink,cleandrinkrepaired,cleandrinkinstalled,cleandrinktotalnumber,cleandrinkprojcost,cleandrinkpicbefore,cleandrinkpicafter
,library,librarynoofbooks,librarynoofalmirah,libraryprojcost,librarypic,playmaterial,totalnoofsportsequipments,playmaterialprojcost
,playmaterialpic1,playmaterialpic2,benches,noofbenchesprovided,noofdeskprovided,benchestotalno,benchesprojcost,benchespicbefore,benchespicafter
,wellmaintained,wellmaintainednooftables,wellmaintainednoofchairs,wellmaintainednooflight,wellmaintainedprojcost,wellmaintainedpicbefore
,wellmaintainedpicafter,shoes,shoesnooffootwear,shoesnoofschoolbags,shoesprojcost,shoespicbefore,shoespicafter,anyother,anyotherdetails,anyrequirement
)
VALUES('$projectNo','$areyoua','$name','$designation','$mobno','$email','$state','$city','$district','$club','$schoolID','$schoolName','$SchoolAddress','$noOfBoys'
,'$noOfGirls','$totNoOfStudInSchool','$totNoOfMaleTeachers','$totNoOfFemaleTeachers','$totNoOfTeachersInSchool','$existenceOfSMC','$schoolTypePrimary'
,'$schoolTypeElementary','$schoolTypeSecondary','$schoolTypeHigherSecondary','$projectYear','$painted','$structureroof','$wall','$flor','$doors'
,'$windows','$boundarywall','$light','$fans','$picbefore','$picafter','$paintedprojcost','$adequate','$renovatedforboys','$newlyconstructedforboys'
,'$renovatedtotalforboys','$renovatedforgirls','$newlyconstructedforgirls','$renovatedtotalforgirls','$adequateprojcost','$adequatepicbefore1'
,'$adequatepicbefore2','$adequatepicafter1','$adequatepicafter2','$handwash','$handwashrenovated','$handwashnewlyconstructed','$handwashtotalnumber'
,'$handwashprojcost','$handwashpicbefore','$handwashpicafter','$cleandrink','$cleandrinkrepaired','$cleandrinkinstalled','$cleandrinktotalnumber'
,'$cleandrinkprojcost','$cleandrinkpicbefore','$cleandrinkpicafter','$library','$librarynoofbooks','$librarynoofalmirah','$libraryprojcost','$librarypic'
,'$playmaterial','$totalnoofsportsequipments','$playmaterialprojcost','$playmaterialpic1','$playmaterialpic2','$benches','$noofbenchesprovided'
,'$noofdeskprovided','$benchestotalno','$benchesprojcost','$benchespicbefore','$benchespicafter','$wellmaintained','$wellmaintainednooftables'
,'$wellmaintainednoofchairs','$wellmaintainednooflight','$wellmaintainedprojcost','$wellmaintainedpicbefore','$wellmaintainedpicafter'
,'$shoes','$shoesnooffootwear','$shoesnoofschoolbags','$shoesprojcost','$shoespicbefore','$shoespicafter','$anyother','$anyotherdetails','$anyrequirement')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	//$sqlSel="select max(happyschoolID) from tblHappySchoolMaster";	
	/*$result1 = mysql_query("select max(happyschoolID) from tblHappySchoolMaster");
    $row = mysql_fetch_row($result1);
    $highest_id = $row[0];
	for($i=1; $i<$count; $i++;)
	{
			$sqlChildIns="INSERT INTO tblHappySchoolFundDetails(happyschoolfkID,slno,sourcename,orgname,amount)
			VALUES('$highest_id','1','$source','$orgname','$amt')";
			$result1=mysql_query($sqlChildIns);
	}*/
	$result1 = mysql_query("select max(happyschoolID) from tblHappySchoolMaster");
    $row = mysql_fetch_row($result1);
    $highest_id = $row[0];
	
	//$str="Rotary#aa#22|Rotary1#aa1#221|Rotary2#aa2#222";
	$myArray = explode('|', $str);
	foreach($myArray as $my_Array){
    $sss= explode('#', $my_Array); 
	$sqlChildIns="INSERT INTO tblHappySchoolFundDetails(happyschoolfkID,project_no,slno,sourcename,orgname,amount)
			VALUES('$highest_id','$projectNo','$sss[0]','$sss[1]','$sss[2]','$sss[3]')";
			$result1=mysql_query($sqlChildIns);
}
	
//echo $highest_id;
	if($result1)
	{
      $updProjectMaster = "update project_master set status='complete' where project_no='$projectNo'";
      $resultUpdate = mysql_query($updProjectMaster);
      if($resultUpdate)
      {
         echo '
         <script>
         alert("Data Successfully Saved");
         window.location.href="../index.php";
         </script>';   
      }
		
	}
   else {
      echo "ERROR";

      }
	
}

else {
echo "ERROR";
}
?> 
