<div class="inner-body">
    <h2 class="admin">Admin Settings </h2>
    <!-- <h3>All Books Selling & Wanted</h3> -->
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
