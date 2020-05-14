<?php include_once "methods.php";
include_once "getBooksAndProfs.php";

$_SESSION['loggedIn'] = FALSE;
$_SESSION['users'] = initSessionArray('users');

if (empty($_SESSION['users'])) {
    $conn = initDb();
    exitIfErr($conn);

    $result = $conn->query("SELECT email, password FROM AuthorizedUsers LIMIT 5");
    $_SESSION['users'] = sqlToArray_Users($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

// echo print_r($_SESSION['users']); //san test

include "header.php";
include "login.html";
include "footer.php";
