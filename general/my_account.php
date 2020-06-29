<?php
include "header.php";
include_once "methods.php";
include_once "setLocalDBTables.php";

$_SESSION['users'] = initSessionArray('users'); //necc?
initUsers();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    include 'user.php';
} else {
    $_SESSION['loggedIn'] = FALSE;
    include "../login/login-logic.php";
    include "login.php";
}

include "footer.php";
