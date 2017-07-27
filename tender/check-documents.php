<?php
include 'include/config.php';

$check = mysql_fetch_array(mysql_query("select * from tender_documents where tender_no='".$_REQUEST['tno']."'"));

if ($check['quotation_letter_head']=='' || $check['registration_certificate']=='' || $check['pan']=='' || $check['product_brochure']=='' || $check['past_client']==''){

	echo 1;
}