<?php
include 'header.php';
include_once 'methods.php';

$conn = initDb();
exitIfErr($conn);

$sql = "SELECT * FROM book WHERE ISBN_10 =" . $_GET['isbn'];
$_SESSION['bookByISBN'] = sqlToArray($sql);
?>

<div class="sidebar-and-content">
    <?php include 'sidebar.php'; ?>
    <div class="book-and-tables">
        <div class="book-information">
            <?php
            $row = $_SESSION['bookByISBN'][0]; //global var instead of sess
            echo "<div><img class='book-tile-img' src='img/no-image-yet.png'></div>";
            echo '<div class=\'book-dets\'><p>Title: ' . $row['Title'] . ' </p>';
            echo '<p>ISBN-10: ' . $row['ISBN_10'] . ' </p>';
            echo "<p>Professor: " . $row['Professor'] . ' </p>';
            echo "<p>Major: " . $row['Category'] . ' </p></div>';
            ?>
        </div>
        <div class="tables">
            <?php
            displayTradingTable(0, 'Selling', $row['ISBN_10'], 'for sale');
            displayTradingTable(1, 'Wanted', $row['ISBN_10'], 'wanted');
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
