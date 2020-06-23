
<div class='inner-body'>
    <div class='userPage'>
        <div><?php echo "<h3>Hello " . $_SESSION['currentUser'] . "!<br>Feel free to browse our books, or sell your own :)</h3>"; ?>
            <!-- filter_input(INPUT_COOKIE, 'userCookie')  -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input name="logout" type="submit" type="button" value="Logout" />
            </form>
        </div>
        <div class="tables">
            <?php
            displayUserTable(0, 'Selling', $_SESSION['currentUser'], 'for sale');
            displayUserTable(1, 'Wanted', $_SESSION['currentUser'], 'wanted');
            ?>
        </div>
    </div>
</div>

<?php
if (isset($_POST['logout'])) { 
    session_destroy();
    $_SESSION['loggedIn'] = FALSE;

    $page = $_SERVER['PHP_SELF'];
    header("url=$page");
    echo "<meta http-equiv=\"refresh\">";
}

if (isset($_POST['delete'])) {
    $conn = initDb();
    exitIfErr($conn);

    $sql = "DELETE FROM booksAvailable WHERE email = '${$_SESSION['currentUser']}' AND ISBN_10 = '$isbn' AND isWanted = '$isWanted'";
    $result = mysqli_query($conn, $sql);

    mysqli_free_result($result);
    mysqli_close($conn);
}
