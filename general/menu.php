<!--        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>-->

<ul class="navbar-list">
    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="sell_book.php">Sell Book</a></li>
    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>      
    <li class="nav-item">
        <a class="nav-link" href="my_account.php">Log In
            <?php // (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == FALSE ) ? '<span>Log In</span>' : "<span>Welcome</span>" ?>
            <!--logout option-->
        </a>
    </li>
</ul>

<!--</div>-->