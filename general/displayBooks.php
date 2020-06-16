<?php include 'header.php';
include_once 'methods.php';

echo "<div class='sidebar-and-content'>";
include 'sidebar.php';
include 'storeSearchResults.php';

$keyword =  isset($_GET['browse']) ? $_GET['browse'] : "ALL BOOKS"; //until impl major and prof; then isset
$rows = isset($_GET['browse']) ? $_SESSION[$specific] : $_SESSION[$all]; 
$size = count($rows);

echo "<div class='tiles-and-content'><h3 class='browse-res'>Searched: ${keyword} (${size} results)</h3>";
echo "<div class='tiles-grid'><ul class='book-tiles'>";
for ($i = 0; $i < $size; $i++) {
    echo '<li class="book-tile">';
    echo "<img class='book-tile-img' src='img/no-image-yet.png'>";
    echo "<h4><a href='book.php?isbn=" . $rows[$i]['isbn-10'] . "'>" . $rows[$i]['title'] . '</a></h4>';
    echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
    echo '</li>';
}
echo "</ul></div></div></div>";

include 'footer.php';
