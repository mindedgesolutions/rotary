<?php
session_start();
ob_start();
include('include/config.php');

    $recordNo=$_POST['txtRecord'];
    $cnt=1;
    $mergeid=0;
   foreach($_POST['checkbox'] as $x)
  {
    if ($cnt == $recordNo)
    {
        $mergeid=$x;
        break;
    }
    $cnt=$cnt + 1;
	/*header('Location:donar_tagging.php');*/
   }

      foreach($_POST['checkbox'] as $x)
      {
         if ($mergeid == $x)
         {
             echo "1";
         }
         else
         {

           $sql="update tbl_child_selected_tagging set donar_id='$mergeid' where donar_id='$x'";
           $result1 = mysql_query($sql);


           $sql="delete from tbl_donar_master where donar_id='$x'";
           $result1 = mysql_query($sql);


         }
      }
        echo '
				<script>
				alert("Data Merged successfully.");
				window.location.href="master_donar_merge.php";
				</script>
				';

?>

