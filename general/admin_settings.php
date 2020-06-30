<?php
include 'header.php';
include 'methods.php';
include 'sqlMethods.php';

if (isAdmin()) {
    include 'admin_detailed.php';
} else {
    echo "<div class='inner-body'><h3>Forbidden access.</h3><h3>Your user settings are <a href='my_account.php'>here</a>.</h3></div>";
}
include 'footer.php';
