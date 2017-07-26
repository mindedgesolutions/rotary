<?php
session_start();
ob_start();
include('include/config.php');

 
  $childNo=1;


$msg = "";


/*$sqlNoTag="select donar_id as donaridnotag,FLOOR(amount_no_child) as  amount_no_child from tbl_donar_master where  voucherNo='J1979' and donar_id not in (select distinct donar_id from tbl_child_selected_tagging) limit 500"; */
/*$sqlNoTag="select donar_id as donaridnotag,FLOOR(amount_no_child) as  amount_no_child from tbl_donar_master where  donar_id in (select distinct donar_id from tbl_child_selected_tagging_deactivate)";*/
$sqlNoTag="select donar_id as donaridnotag,FLOOR(amount_no_child) as  amount_no_child from tbl_donar_master where  donar_id in (9548,9514,9489,10722)";
$resultNoTag = mysql_query($sqlNoTag);
 while($rowchilNoTag = mysql_fetch_array($resultNoTag)){
	   extract($rowchilNoTag);
             
			$id=$donaridnotag;		
			$sqlchild="select count(*) as totchild from tbl_child_selected_tagging where donar_id='$donaridnotag'";

       $totchild=0;
       $resultchild = mysql_query($sqlchild);
       while($rowchild = mysql_fetch_array($resultchild)){
	   extract($rowchild);
              $totchild=$totchild;

        }

		$childNo=$amount_no_child;
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
			 
			 
			 
			 
			 
        }



 

echo '
				<script>
				alert("Data Updated successfully.");
				
				</script>
				';

?>
