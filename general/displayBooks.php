<?php include 'header.php';
include_once 'methods.php';


$_SESSION['bookResults'] = sqlArray_Book('bookResults', mysqli_query(initDb(), "SELECT * FROM book")); //rename //dry
$row = $_SESSION['bookResults'];

echo print_r($row);

echo "<ul>";
for ($i = 0; $i < count($row); $i++) { //foreach
    echo '<li class="list-group">';
    echo '<h4><a href="">' . $row[$i]['title'] . '</a></h4>';
    echo '<p>ISBN-10: ' . $row[$i]['isbn-10'] . '</p>';
    echo '<p>Prof: ' . $row[$i]['professor'] . '</p>'; //tab
    echo '<p>Major: ' . $row[$i]['category'] . '</p>';
    // num available
    echo '</li>';
}
echo "</ul>";

include 'footer.php';
