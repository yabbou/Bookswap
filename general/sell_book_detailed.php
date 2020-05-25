<!DOCTYPE HTML>
<html>

<body>

    <?php
    include "getBooksAndProfs.php";
    include "book_validation.php";
    ?>

    <h3>Sell Book</h3>

    <form id="book-form" action="sell_book_confim.php" method="post">

        <div class="in">Title:

            <input list="books" type="text" name="title">
            <datalist id="books">
                <?php
                foreach ($_SESSION['book'] as $title) {
                    echo '<option value="' . $title . '">';
                }
                ?>
            </datalist>

            <span class="error"><?php echo $titleErr; ?></span>
        </div>

        <div class="in">
            Category: <input type="text" name="cat" value="<?php $cat; ?>">
            <span class="error"><?php echo $catErr; ?></span>
        </div>

        <div class="in">
            <!-- to numeric -->
            ISBN-10: <input type="text" name="isbn" value="<?php $isbn; ?>">
            <span class="error"><?php echo $isbnErr; ?></span>
        </div>

        <div class="in">
            Professor: <input list="profs" type="text" name="prof" value="<?php $prof; ?>">

            <datalist id="profs">
                <?php
                foreach ($_SESSION['professor'] as $prof) {
                    echo '<option value="' . $prof . '">';
                }
                ?>
            </datalist>
            <span class="error"><?php echo $profErr; ?></span>
        </div>

        <input type="submit" name="sell_book" value="Add">
    </form>

</body>

</html>