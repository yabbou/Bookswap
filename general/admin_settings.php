<?php
include 'header.php';
include 'methods.php';
?>

<div class="inner-body">
    <div class="tables">
        <?php
        if (isset($_POST['remove'])) {
            deleteBook();
        }

        displayUserTable(0, 'Selling', 'for sale');
        displayUserTable(1, 'Wanted', 'wanted');
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>