<?php
include "header.php";
include_once "methods.php";
include_once "setLocalDBTables.php";
include "../login/login-logic.php";

$_SESSION['users'] = initSessionArray('users'); //necc?
initUsers();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    include 'user.php';
} else {
    $_SESSION['loggedIn'] = FALSE;
    include "login.html";
}

include "footer.php";
