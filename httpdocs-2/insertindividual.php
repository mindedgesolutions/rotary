<?php
$host = '103.227.62.224';
$username = "literacy_hero_ar";
$password = "literacy_hero_arindam_123";
$database = "literacy_hero";

$connect = @mysql_connect($host,$username,$password);



?>

 <?php             
									$sql = "Select ind_id from individual";   
									
									$result = mysql_query($sql);
									while($data = mysql_fetch_array($result)){
									    echo $sql;
										extract($data);
								
								
								$id = $ind_id;
								$counter = 1;
												
								date_default_timezone_set('Asia/Kolkata');
								$current_date = date("m/d/Y");
								$current_time = date("h:i:s", time());				
								$ip_02 = '10.0.0.1';
								
								$indi_count_ip=1;
								//
									for ($x = 0; $x <= 50; $x++) {
														$sql = "Insert into vote_count_ind (partcipant_id,voting_number,type,`current_date`,your_ip) values('$id','$counter','indi','$current_date','$ip_02')";
											echo $sql;
											//$result = mysql_query($sql);
									}
								}
								?>
								
                              