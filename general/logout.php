<!-- temp file -->

<select>
        <?php echo (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == FALSE) ?
            " <option value =\"my_account.php\">Log In</option>" :
            " <option value =\"logout.php\">Log Out</option>";
        ?>
        </option>
    </select>

    <?php
    function logout()
    {
        $_SESSION['loggedIn'] = FALSE;
    }
    ?>