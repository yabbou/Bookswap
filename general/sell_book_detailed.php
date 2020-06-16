<?php
include "getDBTables.php";
$titleErr = "";
$profErr = "";
?>

<!-- fix pattern mathcing... -->
<div class="inner-body">
    <h3>Sell Book</h3>
    <form id="book-form" action="sell_book_confim.php" method="post">

        <input list="books" type="text" name="title" placeholder="Title" required>
        <!-- pattern="[a-zA-Z0-9 ]" -->
        <datalist id="books">
            <?php
            foreach ($_SESSION['book'] as $title) {
                echo '<option value="' . $title . '">';
            }
            ?>
        </datalist>
        <span class="error"><?php echo $titleErr; ?></span>
        <!-- 
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST["title"])) {
            $titleErr = "Only letters, numbers, and white space allowed.";
        } -->

        <input type="text" name="cat" placeholder="Category" minlength="4" maxlength="4" required>
        <!-- pattern="[a-zA-Z ]" -->

        <!-- should really also check if not taken by other book -->
        <input type="number" name="isbn" placeholder="ISBN-10" min="1000000000" max="9999999999" required>

        <input list="profs" type="text" name="prof" placeholder="Professor" required>
        <!-- pattern="[a-zA-Z ]"  -->
        <datalist id="profs">
            <?php
            foreach ($_SESSION['professor'] as $prof) {
                echo '<option value="' . $prof . '">';
            }
            ?>
        </datalist>
        <span class="error"><?php echo $profErr; ?></span>
        <!-- 
            if (!preg_match("/^[a-zA-Z ]*$/", avoidSQLInjection($_POST["prof"]))) {
            $profErr = "Only letters and white space allowed";
            } -->

        <input class="btn-add-book" type="submit" value="Add Book!">
    </form>

</div>