<?php
$host = '103.227.62.224';
$username = "literacy_hero_ar";
$password = "literacy_hero_arindam_123";
$database = "literacy_hero";

$connect = @mysql_connect($host,$username,$password);



//total vote count for organisation
//$sql_org_vote = "Select * from vote_count_ind where type='orga'";
//$res_org_vote = mysql_query($sql_org_vote);
//$org_count_vote = mysql_num_rows($res_org_vote);

?>
 <?php             
									$sql = "Select self_id from organisation";             
									$result = mysql_query($sql);
									while($data = mysql_fetch_array($result)){
										extract($data);
								   ?> 
								
								     <?php

								$id = $self_id;
								$counter = 1;
								
								date_default_timezone_set('Asia/Kolkata');
								$current_date = date("m/d/Y");
								$current_time = date("h:i:s", time());				
								$ip_02 = '10.0.0.1';
								//$sql = "Insert into vote_count_org values(NULL,'$id','$counter')";
								//count IP address if it is grater then 20 then stop insert 
								/*$sql_org_ip = "Select * from vote_count_ind where type='orga' and partcipant_id='$id' and your_ip='$ip_02'";
								$res_org_ip = mysql_query($sql_org_ip);
								$org_count_ip = mysql_num_rows($res_org_ip);*/
								$org_count_ip=1;
								//
								if($org_count_ip<200)
									{
										for ($x = 0; $x <= 100; $x++) {
										$sql = "Insert into vote_count_ind (partcipant_id,voting_number,type,`current_date`,your_ip) values('$id','$counter','orga','$current_date','$ip_02')";
										//echo $sql;
										$result = mysql_query($sql);
										}
									}								
								
								?>
								
                                <?php
								}
								?>