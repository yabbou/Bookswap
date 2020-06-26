<div class='inner-body'>
    <div class='userPage'>
        <div class="userInfo">
            <!-- filter_input(INPUT_COOKIE, 'userCookie')  -->
            <div>
                <img class="userImage" src="img/no-image.png">
                <?php echo "<h4>Welcome " . $_SESSION['currentUser']['user'] . "</h4>"; //get name from php query
                ?>
            </div>

            <form method="POST">
                <input name="logout" type="submit" value="Logout" />
            </form>
        </div>

        <div class="tables">
            <?php
            displayUserTable(0, 'Selling', 'for sale');
            displayUserTable(1, 'Wanted', 'wanted');
            ?>
        </div>

    </div>
</div>

<?php
if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION['loggedIn'] = FALSE;
    refreshPage();
}

if (isset($_POST['remove'])) {
    deleteBook();
}
