<?php
/*$dbName='child_development';
$dbHost='localhost';
$dbUser='root';
$dbPass='';*/

$dbName='rotary32_teach2';
$dbHost='103.227.62.215';//'192.185.36.129';
$dbUser='rotary32_teach2';
$dbPass='Rotary@2016';//'info123'; 

$dbConn = @mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
@mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());

function dbQuery($sql)
{
    $result = mysql_query($sql) or die(mysql_error());
    
    return $result;
}

function dbAffectedRows()
{
    global $dbConn;
    
    return mysql_affected_rows($dbConn);
}

function dbFetchArray($result, $resultType = MYSQL_NUM) {
    return mysql_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
    return mysql_fetch_assoc($result);
}

function dbFetchRow($result)
{
    return mysql_fetch_row($result);
}

function dbFreeResult($result)
{
    return mysql_free_result($result);
}

function dbNumRows($result)
{
    return mysql_num_rows($result);
}

function dbSelect($dbName)
{
    return mysql_select_db($dbName);
}

function dbInsertId()
{
    return mysql_insert_id();
}

function getPagingQuery($sql, $itemPerPage = 10)
{
    if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }
    
    // start fetching from this row number
    $offset = ($page - 1) * $itemPerPage;
    
    return $sql . " LIMIT $offset, $itemPerPage";
}

/*
    Get the links to navigate between one result page to another.
    Supply a value for $strGet if the page url already contain some
    GET values for example if the original page url is like this :
    
    http://www.phpwebcommerce.com/plaincart/index.php?c=12
    
    use "c=12" as the value for $strGet. But if the url is like this :
    
    http://www.phpwebcommerce.com/plaincart/index.php
    
    then there's no need to set a value for $strGet
    
    
*/
function getPagingLink1($sql, $itemPerPage = 10,$child)

{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    $type = $_GET['type'];
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&type=$type/\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?type=$type\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?type=$type\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&type=$type\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&type=$type\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?type=$type\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&type=$type\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}



function getPagingLink7($sql, $itemPerPage = 10,$child)

{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    $color = $_GET['color'];
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&color=$color/\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?color=$color\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?color=$color\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&color=$color\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&color=$color\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?color=$color\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&color=$color\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}


function getPagingLink8($sql, $itemPerPage = 10,$child)

{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    $look = $_GET['look'];
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&look=$look/\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?look=$look\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?look=$look\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&look=$look\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&look=$look\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?look=$look\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&look=$look\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}



function getPagingLink9($sql, $itemPerPage = 10, $child)

{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    $price = $_GET['price'];
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&price=$price/\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?price=$price\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?price=$price\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&price=$price\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&price=$price\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?price=$price\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&price=$price\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}




































































































function getPagingLink2($sql, $itemPerPage = 10,$date, $date1, $action)

{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&date=$date&date1=$date1&action=$action\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?date=$date&date1=$date1&action=$action\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?date=$date&date1=$date1&action=$action\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&date=$date&date1=$date1&action=$action\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&date=$date&date1=$date1&action=$action\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?date=$date&date1=$date1&action=$action\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&date=$date&date1=$date1&action=$action\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}

function getPagingLink3($sql, $itemPerPage = 10, $parent, $child, $date, $date1, $action)

{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&parent=$parent&child=$child&date=$date&date1=$date1&action=$action\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?parent=$parent&child=$child&date=$date&date1=$date1&action=$action\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?parent=$parent&child=$child&date=$date&date1=$date1&action=$action\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&parent=$parent&child=$child&date=$date&date1=$date1&action=$action\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&parent=$parent&child=$child&date=$date&date1=$date1&action=$action\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?&parent=$parent&child=$child&date=$date&date1=$date1&action=$action\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&parent=$parent&child=$child&date=$date&date1=$date1&action=$action\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}

function getPagingLink4($sql, $itemPerPage = 10, $lead)
{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&$lead/\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?$lead\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?$lead\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&$lead\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&$lead\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?$lead\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&$lead\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}

function getPagingLink($sql, $itemPerPage = 10, $strGet = '')
{
    $result        = dbQuery($sql);
    $pagingLink    = '';
    $totalResults  = dbNumRows($result);
    $totalPages    = ceil($totalResults / $itemPerPage);
    
    // how many link pages to show
    $numLinks      = 10;

        
    // create the paging links only if we have more than one page of results
    if ($totalPages > 1) {
    
        $self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
        

        if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
            $pageNumber = (int)$_GET['page'];
        } else {
            $pageNumber = 1;
        }
        
        // print 'previous' link only if we're not
        // on page one
        if ($pageNumber > 1) {
            $page = $pageNumber - 1;
            if ($page > 1) {
                $prev = " <a href=\"$self?page=$page&$strGet/\">[Prev]</a> ";
            } else {
                $prev = " <a href=\"$self?$strGet\">[Prev]</a> ";
            }    
                
            $first = " <a href=\"$self?$strGet\">[First]</a> ";
        } else {
            $prev  = ''; // we're on page one, don't show 'previous' link
            $first = ''; // nor 'first page' link
        }
    
        // print 'next' link only if we're not
        // on the last page
        if ($pageNumber < $totalPages) {
            $page = $pageNumber + 1;
            $next = " <a href=\"$self?page=$page&$strGet\">[Next]</a> ";
            $last = " <a href=\"$self?page=$totalPages&$strGet\">[Last]</a> ";
        } else {
            $next = ''; // we're on the last page, don't show 'next' link
            $last = ''; // nor 'last page' link
        }

        $start = $pageNumber - ($pageNumber % $numLinks) + 1;
        $end   = $start + $numLinks - 1;        
        
        $end   = min($totalPages, $end);
        
        $pagingLink = array();
        for($page = $start; $page <= $end; $page++)    {
            if ($page == $pageNumber) {
                $pagingLink[] = " $page ";   // no need to create a link to current page
            } else {
                if ($page == 1) {
                    $pagingLink[] = " <a href=\"$self?$strGet\">$page</a> ";
                } else {    
                    $pagingLink[] = " <a href=\"$self?page=$page&$strGet\">$page</a> ";
                }    
            }
    
        }
        
        $pagingLink = implode(' | ', $pagingLink);
        
        // return the page navigation link
        $pagingLink = $first . $prev . $pagingLink . $next . $last;
    }
    
    return $pagingLink;
}
 
?>