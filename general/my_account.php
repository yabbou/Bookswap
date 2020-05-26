<?php 
include_once "methods.php";
include_once "getBooksAndProfs.php";
include "../login/login-logic.php";
include "header.php";

$_SESSION['users'] = initSessionArray('users');
initUsers(); //necc?

if ($_SESSION['loggedIn']) {
    echo "<h4>Hello " . filter_input(INPUT_COOKIE, 'userCookie') . "!<h4>"; //chanage to session var
    echo "<h4>Feel free to browse our books, or sell your own :)<h4>";
} else {
    $_SESSION['loggedIn'] = FALSE;
    include "login.html";
}

include "footer.php";
