<input list='titles' type='text' name='browse' placeholder='Browse our titles' required>
<datalist id='titles'>
    <?php
    foreach ($_SESSION['books'] as $book) {
        echo "<option value='${book['Title']}'>";
    } ?>
</datalist>