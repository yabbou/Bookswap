<?php
include "setLocalDBTables.php";
?>

<!-- fix pattern mathcing... -->
<div class="inner-body">
    <h2>Trade Book</h2>
    <form id="book-form" method="post">

        <!-- err='Only letters, numbers, and white space allowed.' -->
        <div><input list="books" type="text" name="title" placeholder="Title" pattern="[\w\d\s]+" title="Only letters, numbers, and white space allowed." required>
            <span id="t-id" class="error">Only letters, numbers, and white space allowed.</span></div>

        <div><input list="cats" type="text" name="cat" placeholder="Category" minlength="4" maxlength="4" pattern="[A-Z]{4}" title="Must be 4 capital letters." required>
            <datalist id="cats">
                <?php
                foreach ($_SESSION['majors'] as $major) {
                    echo '<option value="' . $major['ID'] . '">';
                }
                ?>
            </datalist>
            <span id="c-id" class="error books">Must be 4 capital letters.</span></div>

        <div>
            <input type="number" name="isbn" placeholder="ISBN-10" min="1000000000" max="9999999999" title="Must be a 10-digit number." required>
            <span id="i-id" class="error isbn">Must be a 10-digit number.</span>
            <!-- should really also check if not taken by other book... live -->
        </div>

        <div><input list="profs" type="text" name="prof" id="p-id" placeholder="Professor" pattern="[\w\s]+" title="Only letters and white space allowed." required>
            <datalist id="profs">
                <?php
                foreach ($_SESSION['professors'] as $prof) {
                    echo '<option value="' . $prof['name'] . '">';
                }
                ?>
            </datalist>
            <span id="p-id" class="error prof">Only letters and white space allowed.</span>
        </div>

        <div class='book-buttons'>
            <input class='btn-add-book' type='submit' name='sell-book' value='Sell Book'>
            <input class='btn-add-book' type='submit' name='ask-book' value='Book Wanted'>
        </div>

        <script src="error.js" type="text/javascript"></script>
    </form>

</div>

<?php
include 'methods.php';
if (isset($_POST['isbn'])) {
    include 'insertToDbTables.php';
    $_SESSION['congrats'] = true; //cookies did not work...
    redirectTo("book.php?isbn={$_POST['isbn']}");
}
