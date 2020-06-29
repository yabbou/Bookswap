<div class='inner-body'>
    <div class='userPage'>
        <div class="userInfo">
            <div>
                <img class="userImage" src="img/no-image.png">
                <?php echo "<h4>Welcome " . $_COOKIE['userEmail'] . "</h4>"; //get name from php query
                ?>
            </div>
            <div>
                <?php echo isAdmin() ? "<h4 class='admin'><a href='admin_settings.php'>Admin settings</a></h4>" : "";
                ?>
            </div>

            <form method="POST">
                <input id="logout" name="logout" type="submit" value="Logout" />
            </form>
        </div>

        <div class="tables">
            <?php
            if (isset($_POST['remove'])) {
                deleteBook($_COOKIE['userEmail']);
            }

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
