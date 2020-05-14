<?php include 'header.php';
include_once 'getBooksAndProfs.php';

echo "<table>";
foreach ($_SESSION['book'] as $row) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['first_name'] . '</td>';
    echo '</tr>';
}
echo "</table>";

include 'footer.php'; 

    