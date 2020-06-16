<?php
include_once 'methods.php';

$bookResults = 'bookResults';
if (empty($_SESSION[$bookResults])) {
    $sql = "SELECT * FROM book";//LIMIT 6 offse ... on scroll
    $_SESSION[$bookResults] = sqlToArray_Books(mysqli_query(initDb(), $sql));
}

include 'featuredBooks.html';
