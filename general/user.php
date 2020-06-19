<div class='inner-body'>
    <?php echo "<h3>Hello " . $_SESSION['currentUser'] . "!<h3>"; ?>
    <!-- echo "<h3>Hello " . filter_input(INPUT_COOKIE, 'userCookie') . "!<h3>";  -->
    <h3>Feel free to browse our books, or sell your own :)<h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input name="logout" type="submit" type="button" value="Logout" />
            </form>
</div>

<?php

if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION['loggedIn'] = FALSE;

    $page = $_SERVER['PHP_SELF'];
    header("url=$page");
}
