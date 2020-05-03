<?php include "methods.php"; ?>

<?php

session_start();
$_SESSION['loggedIn'] = FALSE;
$_SESSION['users'] = initSessionArray('users');

if (empty($_SESSION['users'])) {
    $conn = mysqli_connect("localhost", "root", "", "bookswap");
    if ($conn->connect_errno) {
        exit();
    }

    $result = $conn->query("SELECT email, password FROM AuthorizedUsers LIMIT 5");
    $_SESSION['users'] = sqlToArray_Users($result);
    $result->free_result();

    mysqli_close($conn);
}

//echo print_r($_SESSION['users']); //san test
?>

<?php include "header.php"; ?>
<?php include "login.html"; ?>
<?php include "footer.php"; ?>

