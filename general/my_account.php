<?php include_once "methods.php";
include_once "getBooksAndProfs.php";

$_SESSION['users'] = initSessionArray('users');
initUsers(); //necc?
echo $_SESSION['loggedIn'];

include "header.php";

if ($_SESSION['loggedIn']) {
    echo "<h4>Hello " . filter_input(INPUT_COOKIE, 'userCookie') . "!<h4>";
    echo "<h4>Feel free to browse our books, or sell your own :)<h4>";
} else {
    $_SESSION['loggedIn'] = FALSE;
    include "login.html";
}

include "footer.php";
