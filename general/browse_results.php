<?php
include "header.php";
include 'methods.php';

$browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));
$sql = "SELECT * FROM book WHERE title LIKE '%$browse%'";
$_COOKIE['specificBookResults'] =
    sqlToArray_Books('bookResults', mysqli_query(initDb(), $sql));

include 'browse_results.html'; //todo
include "footer.php";
