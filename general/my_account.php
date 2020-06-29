<?php
include "header.php";
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// echo isset($_SESSION['loggedIn']) ?'yes':'no';
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) { 
    include 'user.php';
} else {
    include "../login/login-logic.php";
    include "login.php";
}

include "footer.php";
