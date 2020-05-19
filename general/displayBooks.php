<?php include 'header.php';
include_once 'getBooksAndProfs.php';

// echo "<table>";
echo "<ul>";

$_SESSION['book'][] = array('title' => 'macro', 'isbn-10' => 10, 'professor' => 'prof asif', 'major' => 'eben');
$row = $_SESSION['book']; //rename

for ($i = 0; $i < count($_SESSION['book']); $i++) {
    // echo '<tr>';
    // echo '<td>' . $row['title'] . '</td>';
    // echo '<td>' . $row['isbn-10'] . '</td>';
    // echo '<td>' . $row['professor'] . '</td>';
    // echo '<td>' . $row['major'] . '</td>';
    // //num available
    // echo '</tr>';

    echo '<li class="list-group">';
    echo '<h4><a href="">' . $row[$i]['title'] . '</a></h4>';
    echo '<p>ISBN-10: ' . $row[$i]['isbn-10'] . '</p>';
    echo '<p>Prof: ' . $row[$i]['professor'] . '</p>'; //tab
    echo '<p>Major: ' . $row[$i]['major'] . '</p>';
    echo '</li>';
}
// echo "</table>";
echo "</ul>";

include 'footer.php';
