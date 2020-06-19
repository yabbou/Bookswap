<?php include 'header.php';
include_once 'methods.php';

echo "<div class='sidebar-and-content'>";
include 'sidebar.php';

include 'storeSearchResults.php';
$keyword =  isset($_GET['browse']) ? $_GET['browse'] : "ALL BOOKS"; //until impl major and prof; then isset
$rows = isset($_GET['browse']) ? $_SESSION['specificBooks'] : $_SESSION['books']; 
$size = count($rows);

echo "<div class='tiles-and-content'><h3 class='browse-res'>Searched: ${keyword} (${size} results)</h3>";
echo "<div class='tiles-grid'><ul class='book-tiles'>";

for ($i = 0; $i < $size; $i++) {
    $numAvailable = getNumAvailable($rows[$i]['ISBN_10']); 

    echo '<li class="book-tile">';
    echo "<img class='book-tile-img' src='img/no-image-yet.png'>";
    echo "<h4><a href='book.php?isbn=" . $rows[$i]['ISBN_10'] . "'>" . $rows[$i]['Title'] . '</a></h4>';
    echo '<p>Available: <strong>' . $numAvailable . '</strong></p>'; 
    echo '</li>';
}
echo "</ul></div></div></div>";

include 'footer.php';
