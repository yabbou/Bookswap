<?php include "../login/login-logic.php"; ?>
<?php include "methods.php"; ?>
<?php

if ($_SESSION['loggedIn']) {
    echo "Hello " . filter_input(INPUT_COOKIE, 'userCookie');
}

redirectToHomepage();