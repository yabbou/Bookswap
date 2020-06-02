<?php include "header.php";
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == TRUE) {
    include "sell_book_detailed.php";
} else {
   include 'redirect_to_login.html';
}

include "footer.php";
