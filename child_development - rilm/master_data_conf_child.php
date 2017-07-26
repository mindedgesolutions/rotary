<?php
session_start();
ob_start();
include('include/config.php');

 $id=$_POST['txtId'];
  $childNo=$_POST['txtChild'];


$msg = "";

 $sqlchild="select count(*) as totchild from tbl_child_selected_tagging where donar_id='$id'";

       $totchild=0;
       $resultchild = mysql_query($sqlchild);
       while($rowchild = mysql_fetch_array($resultchild)){
	   extract($rowchild);
              $totchild=$totchild;

        }


if ($childNo > $totchild)
{
   $nochild=$childNo - $totchild;
   for ($x = 0; $x < $nochild; $x++) {
       $childUpdate = "select child_id as child_id_upd from tbl_child_profile_card where tagged <>'yes' limit 1";

       $resultchildupd = mysql_query($childUpdate);
       while($rowchildupd = mysql_fetch_array($resultchildupd)){
	   extract($rowchildupd);
              $child_id_upd=$child_id_upd;

             $sqlupdate = "update tbl_child_profile_card set tagged='yes' where child_id='$child_id_upd'";
              $resultchild1 = mysql_query($sqlupdate);
            $sqlupdate = "insert into tbl_child_selected_tagging (child_id,donar_id,date_of,time_of) values ('$child_id_upd','$id',CURDATE(),CURTIME())";
              $resultchild2 = mysql_query($sqlupdate);
        }
    }
}
else
{
     $nochild=$totchild  - $childNo;
     for ($x = 0; $x < $nochild; $x++) {
               $childUpdate = "select child_tag_id,child_id as child_id_upd from tbl_child_selected_tagging where donar_id='$id' limit 1";
                 $resultchildupd = mysql_query($childUpdate);
                 while($rowchildupd = mysql_fetch_array($resultchildupd)){
                    extract($rowchildupd);
                    $sqlupdate = "delete from tbl_child_selected_tagging where child_tag_id='$child_tag_id'";
                     $resultchild1 = mysql_query($sqlupdate);

                     $sqlupdate = "update tbl_child_profile_card set tagged='no' where child_id='$child_id_upd'";
                     $resultchild1 = mysql_query($sqlupdate);
                 }
               
     }
     
}

echo '
				<script>
				alert("Data Updated successfully.");
				window.location.href="master_donar_child.php";
				</script>
				';

?>
