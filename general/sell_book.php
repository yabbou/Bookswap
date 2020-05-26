<?php include "header.php"; ?>
<!--send to login if not yet loggedin, instead of to actual add book page...-->

<?php
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == TRUE) {
    include "sell_book_detailed.php";
} else{
    echo "<h3>Only users can sell books. Please create an account or login.\n<h3>";
    echo "<a href='my_account.php'>Create Account or Log In</a>";
}

include "footer.php"; 