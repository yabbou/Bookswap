<?php

// still in development

if (empty($_SESSION['bookResults'])) {
    $_SESSION['bookResults'] = sqlToArray_Books('bookResults', mysqli_query(initDb(), "SELECT * FROM book")); //rename 
}

echo "<ul>";
foreach ($_SESSION['bookResults'] as $i => $row) { //should make interm var?

    echo '<li class="book-tile">';
    echo '<h3><a href="">' . $row['title'] . '</a></h3>';
    echo '<p>ISBN-10: ' . $row['isbn-10'] . '</p>';
    echo '<p>Prof: ' . $row['prof'] . '</p>'; //tab
    echo '<p>Major: ' . $row['cat'] . '</p>';
    echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
    echo '</li>';
}
echo "</ul>";
