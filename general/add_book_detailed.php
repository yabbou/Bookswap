<!DOCTYPE HTML>  
<html>
    <body>

        <?php
        include "getBooksAndProfs.php";
        include "book_validation.php";
        include 'methods.php';
        ?>

        <h3>Sell Book</h3>

        <form id="book-form" action="add_book_confim.php" method="post">

            <div class="in">
                Title: <input type="text" name="title" value="<?php $title; ?>">
                <span class="error"><?php echo $titleErr; ?></span>
            </div>

            <div class="in">
                ISBN-10: <input type="text" name="isbn" value="<?php $isbn; ?>">
                <span class="error"><?php echo $isbnErr; ?></span>
            </div>

            <div class="in">
                Professor: <input type="text" name="prof" 
                                  value="<?php $prof; ?>">

                <datalist id="profs">
                    <?php
                    foreach ($_SESSION['profs'] as $prof) {
                        echo '<option>$prof</option>';
                    }
                    ?>
                </datalist>
                <span class="error"><?php echo $profErr; ?></span>
            </div>

            <input type="submit" name="add_book" value="Add">  
        </form>

    </body>
</html>