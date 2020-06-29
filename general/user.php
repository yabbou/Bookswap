<div class='inner-body'>
    <div class='userPage'>
        <div class="userInfo">
            <div>
                <img class="userImage" src="img/no-image.png">
                <?php echo "<h4>Welcome " . $_COOKIE['userInfo'] . "</h4>"; //get name from php query
                ?>
            </div>
            <div>
                <?php 
                include_once 'methods.php';
                echo isAdmin() ? "<h4 class='admin'><a href='admin_settings.php'>Admin settings</a></h4>" : "";
                ?>
            </div>

            <form method="POST">
                <input id="logout" name="logout" type="submit" value="Logout" />
            </form>
        </div>

        <div class="tables">
            <?php
            if (isset($_POST['remove'])) {
                deleteBook($_COOKIE['userInfo']);
            }

            displayUserTable(0, 'Selling', 'selling');
            displayUserTable(1, 'Wanted', 'asking');
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
