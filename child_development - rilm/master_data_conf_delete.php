<?php
session_start();
ob_start();
include('include/config.php');

 $id=$_POST['txtId'];

$msg = "";


$sqlchild="select child_id from tbl_child_selected_tagging where donar_id='$id'";
$resultchild = mysql_query($sql);
$resultchild = mysql_query($sqlchild);
       while($rowchild = mysql_fetch_array($resultchild)){
	   extract($rowchild);
              $child_id=$child_id;

        }
$sql="update tbl_child_profile_card set tagged='' where child_id='$child_id'";
$result1 = mysql_query($sql);

$sql="delete from  tbl_child_selected_tagging where donar_id='$id'";
$result2 = mysql_query($sql);

$sql="delete from  tbl_donar_master_detail where donar_fk='$id'";
$result3 = mysql_query($sql);

$sql="delete from  tbl_donar_master where donar_id='$id'";
$result4 = mysql_query($sql);
 echo '
				<script>
				alert("Data Deleted successfully.");
				window.location.href="master_donar.php";
				</script>
				';

?>
