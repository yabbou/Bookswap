<?php
include_once 'methods.php';

$bookResults = 'bookResults';
if (empty($_SESSION[$bookResults])) {
    $sql = "SELECT * FROM book LIMIT 6";
    $_SESSION[$bookResults] = sqlToArray_Books($bookResults, mysqli_query(initDb(), $sql));
}

include 'featuredBooks.html';
