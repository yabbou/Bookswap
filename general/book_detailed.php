<div class="book-and-tables">
    <?php echo $_SESSION['congrats'] ? "<h3 class='success'>Thanks for your contribution!</h3>" : '';
    $_SESSION['congrats'] = false; ?>
    <div class="book-information">
        <?php
        $row = $bookByISBN[0];

        echo "<div><img class='book-tile-img' src='" . $row['Image'] . "'></div>";
        echo "<div class='book-dets'><h2 class='title'> ${row['Title']} </h2>";
        echo '<p><b>ISBN-10</b>: ' . $row['ISBN_10'] . ' </p>';
        echo "<p><b>Professor</b>: " . $row['Professor'] . ' </p>';
        echo "<p><b>Major</b>: " . $row['Category'] . ' </p></div>';
        ?>
    </div>
    <div class="tables">
        <?php
        if (isset($_POST['Sell']) || isset($_POST['Ask'])) { //convert to ajax?
            $conn = initDb();
            exitIfErr($conn);

            insertBookAvailable($conn, $_COOKIE['userInfo'], $_GET['isbn'], isset($_POST['Sell']) ? 0 : 1);
            mysqli_close($conn);
        }

        displayTradingTable(0, 'Selling', $row['ISBN_10'], 'for sale', 'Sell');
        displayTradingTable(1, 'Wanted', $row['ISBN_10'], 'wanted', 'Ask');
        ?>
    </div>
</div>
</div>