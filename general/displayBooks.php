<?php include 'header.php';
include_once 'methods.php';

$bookResults = 'bookResults';
$specificBR = 'specificBookResults';

$_SESSION['lastSearch'] = initSessionArray('lastSearch'); //works?
include 'setSearchResults.php';

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
echo "</ul></div></div>";

include 'footer.php';
