<?php
include 'header.php';
include_once 'methods.php';

$conn = initDb();
exitIfErr($conn);

if (isset($_GET['isbn'])) {
    $sql = "SELECT * FROM book WHERE ISBN_10 =" . $_GET['isbn'];
    $_SESSION['bookByISBN'] = sqlToArray($sql);
}
?>

<div class="sidebar-and-content">
    <?php include 'sidebar.php'; ?>
    <div class="book-and-tables">
        <div class="book-information">
            <?php
            $row = $_SESSION['bookByISBN'][0]; //global var instead of sess

            echo "<div><img class='book-tile-img' src='" . $row['Image'] . "'></div>";
            echo '<div class=\'book-dets\'><p>Title: ' . $row['Title'] . ' </p>';
            echo '<p>ISBN-10: ' . $row['ISBN_10'] . ' </p>';
            echo "<p>Professor: " . $row['Professor'] . ' </p>';
            echo "<p>Major: " . $row['Category'] . ' </p></div>';
            ?>
        </div>
        <div class="tables">
            <?php
            if (isset($_POST['Sell']) || isset($_POST['Ask'])) { //convert to ajax
                $conn = initDb();
                exitIfErr($conn);

                insertBookAvailable($conn, $_SESSION['currentUser']['user'], $_GET['isbn'], isset($_POST['Sell']) ? 0 : 1);
                mysqli_close($conn);
            }

            displayTradingTable(0, 'Selling', $row['ISBN_10'], 'for sale', 'Sell');
            displayTradingTable(1, 'Wanted', $row['ISBN_10'], 'wanted', 'Ask');

            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
