<?php
include "header.php";
include 'methods.php';

$browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));
$sql = "SELECT * FROM book WHERE title LIKE '%$browse%'";
$_COOKIE['specificBookResults'] =
    sqlToArray_Books('bookResults', mysqli_query(initDb(), $sql));

echo "<div class='sidebar-and-content'>";
include 'sidebar.html';
include 'browse_results.html'; //todo
echo "</div>";

include "footer.php";
