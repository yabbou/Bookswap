<div class='inner-body'>
    <div class='userPage'>
        <div class="userInfo">
            <!-- filter_input(INPUT_COOKIE, 'userCookie')  -->
            <div>
                <img class="userImage" src="img/no-image.png">
                <?php echo "<h4>Welcome " . $_SESSION['currentUser'] . "</h4>"; //get name from query
                ?>
            </div>

            <form action="" method="POST">
                <?php //echo $_SERVER['PHP_SELF'];                 
                ?>
                <input name="logout" type="submit" value="Logout" />
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

    // $page = $_SERVER['PHP_SELF'];
    // header("url=$page");
    echo "<meta http-equiv=\"refresh\" content=\"0.1\">";
}

if (isset($_POST['delete'])) {
    $conn = initDb();
    exitIfErr($conn);

    // how to get these vars..
    $sql = "DELETE FROM booksAvailable WHERE email = '${$_SESSION['currentUser']}' AND ISBN_10 = '$isbn' AND isWanted = '$isWanted'";
    $result = mysqli_query($conn, $sql);

    mysqli_free_result($result);
    mysqli_close($conn);
}
