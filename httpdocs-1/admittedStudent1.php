<?php 
if (isset($_POST['submit'])) {
	/*if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['filename']['tmp_name']);
	}*/

	$handle = fopen($_FILES['filename']['tmp_name'], "r");

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$arr[] = $data;
		$import .="INSERT into tablename(item1,item2,item3,item4,item5) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";

		////mysql_query($import) or die(mysql_error());
	}

	fclose($handle);
	//print_r($arr);
	print $import;

	//view upload form
}else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	print "<form enctype='multipart/form-data' action='' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";

}

?>

<?php

/*include "../connection.php"; //Connect to Database
 $sqldb=mssql_select_db($dbname,$sqlconnect) or die("Couldn't open database");

$deleterecords = "TRUNCATE TABLE admittedStudent "; //empty the table of its current records
mssql_query($deleterecords);
*/
//Upload File
/*$import="INSERT into admittedStudent(appno,admissionDatedd,admissionDatemm,admissionDateyy) values";
	//Import uploaded file to Database
	$handle = fopen('C:\xampp\htdocs\NewWay\student.csv', "r");

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		//$arr[] =  $data;
	
		$import=$import."(".$data[0].",".$data[1].",".$data[2].",".$data[3].")";

		//mssql_query($import) or die("error occured");
	}
echo $import;
	fclose($handle);*/
//print_r($arr);
	//print "Import done";

	//view upload form

?>
