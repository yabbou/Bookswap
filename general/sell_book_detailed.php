<!DOCTYPE HTML>
<html>

<body>

    <?php
    include "getBooksAndProfs.php";
    $titleErr = "";
    $profErr = "";
    ?>

    <h3>Sell Book</h3>
    <form id="book-form" action="sell_book_confim.php" method="post">

        <div class="in">
            <input list="books" type="text" name="title" placeholder="Title" pattern="[a-zA-Z0-9 ]" required>
            <datalist id="books">
                <?php
                foreach ($_SESSION['book'] as $title) {
                    echo '<option value="' . $title . '">';
                }
                ?>
            </datalist>
            <span class="error"><?php echo $titleErr; ?></span>
            <!-- 
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", avoidSQLInjection($_POST["title"]))) {
            $titleErr = "Only letters, numbers, and white space allowed.";
        } -->
        </div>

        <div class="in">
            <input type="text" name="cat" placeholder="Category" minlength="4" maxlength="4" required>
        </div>

        <!-- should really also check if not taken by other book -->
        <div class="in">
            <input type="number" name="isbn" placeholder="ISBN-10" min="1000000000" max="9999999999" required>
        </div>

        <div class="in">
            <input list="profs" type="text" name="prof" placeholder="Professor" pattern="[a-zA-Z ]" required>
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
        </div>

        <input type="submit" name="sell_book" value="Add">
    </form>

</body>

<script>
    function check(input) {
        if (input.validity.typeMismatch) {
            input.setCustomValidity("Only letters, numbers, and white space allowed.");
        } else {
            input.setCustomValidity("");
        }
    }
</script>

</html>