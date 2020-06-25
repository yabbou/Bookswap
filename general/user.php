<div class='inner-body'>
    <div class='userPage'>
        <div class="userInfo">
            <!-- filter_input(INPUT_COOKIE, 'userCookie')  -->
            <div>
                <img class="userImage" src="img/no-image.png">
                <?php echo "<h4>Welcome " . $_SESSION['currentUser']['user'] . "</h4>"; //get name from query
                ?>
            </div>

            <form action="" method="POST">
                <input name="logout" type="submit" value="Logout" />
            </form>
        </div>

        <div class="tables">
            <?php
            displayUserTable(0, 'Selling', $_SESSION['currentUser']['user'], 'for sale');
            displayUserTable(1, 'Wanted', $_SESSION['currentUser']['user'], 'wanted');
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

if (isset($_POST['delete'])) {
    $conn = initDb();
    exitIfErr($conn);

    // how to get these vars..
    $sql = "DELETE FROM booksAvailable WHERE email = '${$_SESSION['currentUser']}' AND ISBN_10 = " . $_SESSION['currentUser']['isbn']  . "AND isWanted = " . $_SESSION['currentUser']['isWanted'];
    $result = mysqli_query($conn, $sql);

    mysqli_free_result($result);
    mysqli_close($conn);
}
