<?php
include_once 'methods.php';

$bookResults = 'bookResults';
if (empty($_SESSION[$bookResults])) {
    $sql = "SELECT * FROM book LIMIT 6";
    $_SESSION[$bookResults] = sqlToArray_Books($bookResults, mysqli_query(initDb(), $sql));
}

// echo "<ul>";
// foreach ($_SESSION[$bookResults] as $i => $row) { //should make interm var?

//     echo '<li class="book-tile">';
//     echo '<h4><a href="">' . $row['title'] . '</a></h4>';
//     echo '<p>ISBN-10: ' . $row['isbn-10'] . '</p>';
//     echo '<p>Prof: ' . $row['prof'] . '</p>'; //tab
//     echo '<p>Major: ' . $row['cat'] . '</p>';
//     echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
//     echo '</li>';
// }
// echo "</ul>";

include 'featuredBooks.html';
