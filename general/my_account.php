<?php
include_once "methods.php";
include_once "getBooksAndProfs.php";
include "../login/login-logic.php";
include "header.php";

$_SESSION['users'] = initSessionArray('users');
initUsers(); //necc?

if ($_SESSION['loggedIn']) {
    echo "<div class='inner-body'>";
    echo "<h3>Hello " . filter_input(INPUT_COOKIE, 'userCookie') . "!<h3>"; //chanage to session var
    echo "<h3>Feel free to browse our books, or sell your own :)<h3>";
    echo "</div>";
} else {
    $_SESSION['loggedIn'] = FALSE;
    include "login.html";
}

include "footer.php";
