<?php include 'header.php';
include_once 'methods.php';

if (empty($_SESSION['bookResults'])) {
    $_SESSION['bookResults'] = sqlToArray_Books('bookResults', mysqli_query(initDb(), "SELECT * FROM book")); //rename //check before doing entore call again
}

echo "<ul>";
foreach ($_SESSION['bookResults'] as $i => $row) { //should make interm var?

    echo '<li class="list-group">';
    echo '<h4><a href="">' . $row['title'] . '</a></h4>';
    echo '<p>ISBN-10: ' . $row['isbn-10'] . '</p>';
    echo '<p>Prof: ' . $row['prof'] . '</p>'; //tab
    echo '<p>Major: ' . $row['cat'] . '</p>';
    // num available
    echo '</li>';
}
echo "</ul>";

include 'footer.php';
