<?php //dry from displaybooks.php
include "header.php";
include 'methods.php';

// deprecated

$browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));
$sql = "SELECT * FROM book WHERE title LIKE \'%" . $browse . "%\'"; //also browse isbn

echo $browse;

$arr = 'specificBookResults';
$_COOKIE[$arr] = sqlToArray_Books($arr, mysqli_query(initDb(), $sql));

echo "<div class='sidebar-and-content'>";
include 'sidebar.php';
echo "<div class='tiles-grid'><form method='GET'><ul class='book-tiles'>";

$size = count($_SESSION[$arr]);
$rows = $_SESSION[$arr];

for ($i = 0; $i < $size; $i++) {
    echo '<li class="book-tile">';
    echo "<img class='book-tile-img' src='img/no-image-yet.png'>";
    echo "<h4><a href='book/" . $rows[$i]['isbn-10'] . "'>" . $rows[$i]['title'] . '</a></h4>';
    echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
    echo '</li>';
}
echo "</ul></form></div></div>";

// include 'browse_results.html'; //todo
echo "</div>";

include "footer.php";
