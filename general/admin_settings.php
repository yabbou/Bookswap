<?php
include 'header.php';
include 'methods.php';
?>

<div class="inner-body">
    <div class="tables all">
        <?php
        if (isset($_POST['remove'])) {
            //js here to get other user's email
            deleteBook('');
        }

        displayUserTable_All(0, 'Selling', 'for sale');
        displayUserTable_All(1, 'Wanted', 'wanted');
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>