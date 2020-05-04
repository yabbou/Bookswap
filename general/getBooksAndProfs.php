<?php

include 'methods.php';

$profsList;
$booksList;
$offset = isset($_SESSION['offset']) ? $_SESSION['offset'] + 5 : 5; //move to methods.php

//if (empty($_SESSION['books'])) {

$conn = mysqli_connect("localhost", "root", "", "bookswap");
if ($conn->connect_errno) {
    exit();
}

$db = 'book';
$result = getQueryResults($conn, $offset, $db);
addToSessionArr($db, 'title', $result);

$db = 'professor';
$result = getQueryResults($conn, $offset,  $db);
addToSessionArr($db, 'name', $result);

mysqli_free_result($result);
mysqli_close($conn);
//}
