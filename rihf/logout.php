<?php

session_start();

// Some simple code etc etc
$requested_logout = true;

if ($requested_logout) {
    session_restart();
}

// Now the session_id will be different every browser refresh
//print(session_id());

function session_restart()
{
    if (session_name()=='') {
        // Session not started yet
        session_start();
    }
    else {
        // Session was started, so destroy
        session_destroy();

        // But we do want a session started for the next request
        session_start();
        session_regenerate_id();

        // PHP < 4.3.3, since it does not put 
        setcookie(session_name(), session_id());
    }
}
header("location:signup_status.php?msg=3");
?>

