<?php
include("connection.php");

$arr = array();

$district = $_POST["district"];

$query = "SELECT id, district, DG, DLCC, PDG, if(nobookcommited=0,'',nobookcommited) as nobookcommited, if(volunteercommited=0,'',volunteercommited) as volunteercommited, if(educatechild=0,'',educatechild) as educatechild,if(vocationalcenter=0,'',vocationalcenter) as vocationalcenter,if(adopthighschool=0,'',adopthighschool) as adopthighschool,if(urbanadultliteracy=0,'',urbanadultliteracy) as urbanadultliteracy,if(educateilliterates=0,'',educateilliterates) as educateilliterates ,if(elearningcenter=0,'',elearningcenter) as elearningcenter,if(DIED=0,'',DIED) as DIED,if(disabled=0,'',disabled) as disabled,if(sensitype=0,'',sensitype) as sensitype,if(Award=0,'',Award) as Award FROM districttracker WHERE district='".$district."';";



$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
	}
}

		
echo json_encode($arr);
?>
