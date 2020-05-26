<?php include "../login/login-logic.php"; ?>
<?php include "methods.php"; ?>
<?php

//deprecated

if ($_SESSION['loggedIn']) {
    echo "Hello " . filter_input(INPUT_COOKIE, 'userCookie');
}

redirectToHomepage();