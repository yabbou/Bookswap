<?php
include "setLocalDBTables.php";
$titleErr = "";
$profErr = "";
?>

<!-- fix pattern mathcing... -->
<div class="inner-body">
    <h3>Trade Book</h3>
    <form id="book-form" action="sell_book_confim.php" method="post">

        <input list="books" type="text" name="title" placeholder="Title" pattern="[\w\d\s]+" required>
        <span class="error"><?php echo $titleErr; ?></span>
        <!-- 
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST["title"])) {
            $titleErr = "Only letters, numbers, and white space allowed.";
        } -->

        <input list="cats" type="text" name="cat" placeholder="Category" minlength="4" maxlength="4" pattern="[A-Z]+" required>
        <datalist id="cats">
            <?php
            foreach ($_SESSION['majors'] as $major) {
                echo '<option value="' . $major['ID'] . '">';
            }
            ?>
        </datalist>

        <!-- should really also check if not taken by other book... live -->
        <input type="number" name="isbn" placeholder="ISBN-10" min="1000000000" max="9999999999" required>

        <input list="profs" type="text" name="prof" placeholder="Professor" pattern="[\w\s]+" required>
        <datalist id="profs">
            <?php
            foreach ($_SESSION['professors'] as $prof) {
                echo '<option value="' . $prof['name'] . '">';
            }
            ?>
        </datalist>
        <span class="error"><?php echo $profErr; ?></span>
        <!-- 
            if (!preg_match("/^[a-zA-Z ]*$/", avoidSQLInjection($_POST["prof"]))) {
            $profErr = "Only letters and white space allowed";
            } -->

        <?php
        include 'methods.php';
        echo askSellButtons("Sell Book", 'Book Wanted', 'btn-add-book') ?>
    </form>

</div>