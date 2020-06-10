<?php include 'header.php';
include_once 'methods.php';

$bookResults = 'bookResults';
$specificBR = 'specificBookResults';
$_SESSION['lastSearch'];

if (empty($_SESSION[$bookResults])) { //make retriev every offset...
    $sql = "SELECT * FROM book";
    $_SESSION[$bookResults] = sqlToArray_Books($bookResults, mysqli_query(initDb(), $sql));
}
if (!isset($_GET['browse']) || $_GET['browse'] != $_SESSION['lastSearch']) {
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));
    $_SESSION['lastSearch'] = $browse;

    $sql = "SELECT * FROM book WHERE title LIKE '%$browse%'"; //also browse isbn
    $_SESSION[$specificBR] = sqlToArray_Books($specificBR, mysqli_query(initDb(), $sql));
}

echo "<div class='sidebar-and-content'>";
include 'sidebar.php';

echo "<div class='tiles-grid'><ul class='book-tiles'>";
$size = isset($_GET['browse']) ? count($_SESSION[$specificBR])  : count($_SESSION[$bookResults]);
$rows = isset($_GET['browse']) ? $_SESSION[$specificBR] : $_SESSION[$bookResults];

for ($i = 0; $i < $size; $i++) {
    echo '<li class="book-tile">';
    echo "<img class='book-tile-img' src='img/no-image-yet.png'>";
    echo "<h4><a href='book.php?isbn=" . $rows[$i]['isbn-10'] . "'>" . $rows[$i]['title'] . '</a></h4>';
    echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
    echo '</li>';
}
echo "</ul></form></div></div>";

include 'footer.php';
