<?php
include 'header.php';
include_once 'methods.php';

$conn = initDb();
exitIfErr($conn);

$sql = "SELECT * FROM book WHERE ISBN_10 =" . $_GET['isbn'];
$_SESSION['bookByISBN'] = sqlToArray_Books(mysqli_query(initDb(), $sql));
?>

<div class="sidebar-and-content">
    <?php include 'sidebar.php'; ?>
    <div class="book-and-tables">
        <div class="book-information">
            <?php
            $row = $_SESSION['bookByISBN'][0]; //bc of method used to obtain...
            echo "<div><img class='book-tile-img' src='img/no-image-yet.png'></div>";
            echo '<div class=\'book-dets\'><p>Title: ' . $row['title'] . ' </p>';
            echo '<p>ISBN-10: ' . $row['isbn-10'] . ' </p>';
            echo "<p>Professor: " . $row['prof'] . ' </p>';
            echo "<p>Major: " . $row['cat'] . ' </p></div>';
            ?>
        </div>
        <div class="tables">
            <?php
            displayTradingTable(0, 'Selling', $row['isbn-10']);
            displayTradingTable(1, 'Wanted', $row['isbn-10']);
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
