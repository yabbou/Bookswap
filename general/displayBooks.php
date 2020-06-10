<?php include 'header.php';
include_once 'methods.php';

$bookResults = 'bookResults';

if (empty($_SESSION[$bookResults])) { //make retriev every offset...
    $sql = "SELECT * FROM book";
    $_SESSION[$bookResults] = sqlToArray_Books($bookResults, mysqli_query(initDb(), $sql));
}

echo "<div class='inner-body'><ul class='book-tiles'>";
foreach ($_SESSION[$bookResults] as $i => $row) { //should make interm var?
    echo '<li class="list-group">';
    echo "<img src='img/no-image-yet.png'>";
    echo '<h4><a href="">' . $row['title'] . '</a></h4>';
    // echo '<p>ISBN-10: ' . $row['isbn-10'] . '</p>';
    // echo '<p>Prof: ' . $row['prof'] . '</p>'; //tab
    // echo '<p>Major: ' . $row['cat'] . '</p>';
    echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
    echo '</li>';
}
echo "</ul></div>";

include 'footer.php';
