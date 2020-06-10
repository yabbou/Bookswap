<?php include 'header.php';
include_once 'methods.php';

$bookResults = 'bookResults';

if (empty($_SESSION[$bookResults])) { //make retriev every offset...
    $sql = "SELECT * FROM book";
    $_SESSION[$bookResults] = sqlToArray_Books($bookResults, mysqli_query(initDb(), $sql));
}

echo "<div class='sidebar-and-content'>";
include 'sidebar.html';

echo "<div class='tiles-grid'><ul class='book-tiles'>";

$size = count($_SESSION[$bookResults]);
$rows = $_SESSION[$bookResults];

for ($i = 0; $i < $size; $i++) {
    // if ($i % 2 == 0) {
    //     echo "<div class='book-subgroup'>";
    // }

    echo '<li class="book-tile">';
    echo "<img src='img/no-image-yet.png'>";
    echo '<h4><a href="">' . $rows[$i]['title'] . '</a></h4>';
    echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
    echo '</li>';

    // if ($i % 2 == 1) {
    //     echo "</div>";
    // }
}
echo "</ul></div></div>";

include 'footer.php';
