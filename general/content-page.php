<?php include "../login/login-logic.php"; ?>
<?php include "methods.php"; ?>
<?php

//old page...

if ($_SESSION['loggedIn']) {
    echo "Hello " . filter_input(INPUT_COOKIE, 'userCookie');
}

redirectToHomepage();