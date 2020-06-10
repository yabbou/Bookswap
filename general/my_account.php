<?php
include_once "methods.php";
include_once "getDBTables.php";
include "../login/login-logic.php";
include "header.php";

$_SESSION['users'] = initSessionArray('users'); //necc?
initUsers();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    echo "<div class='inner-body'>";
    echo "<h3>Hello " . $_SESSION['currentUser'] . "!<h3>";
    echo "<h3>Feel free to browse our books, or sell your own :)<h3>";
    echo "</div>";
} else {
    $_SESSION['loggedIn'] = FALSE;
    include "login.html";
}

include "footer.php";
