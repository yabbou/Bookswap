<?php
include_once 'sqlMethods.php';
include_once 'arrInitMethods.php';

if (session_status() != PHP_SESSION_ACTIVE) { //better, move sessoin to header.php?
    session_start();
}

function redirectToHomepage()
{
    echo "Redirecting...";
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=index.php\" />";
}

function toHref($s)
{
    $s = strtolower($s);
    $s = str_replace(' ', '-',  $s);
    return $s;
}
