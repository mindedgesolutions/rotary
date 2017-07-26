<?php

//--========================For Pagination==========================--//
 $query = "select * from present_act where article_id!='' order by SLN desc";

$result = mysql_query($query);
$nr = mysql_num_rows($result);

if (isset($_REQUEST['pn'])){
    $pn = preg_replace('#[^0-9]#i', '',$_REQUEST['pn']);
}else{
    $pn = 1;
}
$itemsPerPage = 10;
$lastPage = ceil($nr / $itemsPerPage);

if ($pn < 1){
    $pn = 1;
}else if ($pn > $lastPage){
    $pn = $lastPage;
}

$centerPages = '';
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;

if ($pn==1){

    $centerPages .= '&nbsp; <span class="pageNumActive">'.$pn.'</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$add1.'">'.$add1.'</a> &nbsp;';
    //$centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$add2.'">'.$add2.'</a> &nbsp;';
}else if ($pn==$lastPage){
    
    //$centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$sub2.'">'.$sub2.'</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$sub1.'">'.$sub1.'</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pageNumActive">'.$pn.'</span> &nbsp;';
}else if ($pn > 2 && $pn < ($lastPage - 1)){

    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$sub2.'">'.$sub2.'</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$sub1.'">'.$sub1.'</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pageNumActive">'.$pn.'</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$add1.'">'.$add1.'</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$add2.'">'.$add2.'</a> &nbsp;';
}else if ($pn > 1 && $pn < $lastPage){

    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$sub1.'">'.$sub1.'</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pageNumActive">'.$pn.'</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$add1.'">'.$add1.'</a> &nbsp;';
}

$limit = 'LIMIT '.($pn - 1) * $itemsPerPage.','.$itemsPerPage;

$paginationDisplay = '';

if ($lastPage!='1'){
    $paginationDisplay .= 'Page <strong>'.$pn.'</strong> of '.$lastPage.'&nbsp;<span style="margin-right:20px;"></span>';
    if($pn!=1){
        $previous = $pn - 1;
        $paginationDisplay .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" style="color: #000000;text-decoration: none;margin-right: 20px;">Back</a>';
    }
    $paginationDisplay .= '<span class="paginationNumbers">'.$centerPages.'</span>';

    if ($pn!=$lastPage){
        $nextPage = $pn + 1;
        $paginationDisplay .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$nextPage.'" style="color: #000000;text-decoration: none;margin-left: 15px;">Next</a>';
    }
}
//--========================For Pagination==========================--//