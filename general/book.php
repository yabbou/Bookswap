<?php
include 'header.php';
include_once 'methods.php';

$conn = initDb();
exitIfErr($conn);

$bookByISBN;
if (isset($_GET['isbn'])) {
    $sql = "SELECT * FROM book WHERE ISBN_10 =" . $_GET['isbn'];
    $bookByISBN = sqlToArray($sql);
}
?>

<div class="sidebar-and-content">
    <?php include 'sidebar.php'; ?>
    <div class="book-and-tables">
        <?php echo isset($_POST['sell-book']) || isset($_POST['ask-book']) ? "<h3 class='confim-msg'>Thanks for your contribution!</h3>" : ''; ?>
        <div class="book-information">
            <?php
            $row = $bookByISBN[0]; 

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

                insertBookAvailable($conn, $_COOKIE['userEmail'], $_GET['isbn'], isset($_POST['Sell']) ? 0 : 1);
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
