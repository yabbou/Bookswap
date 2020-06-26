<?php
include_once 'setLocalDBTables.php';
?>

<div class="sidebar">

    <form action="displayBooks.php" method="get">
        <div class="browse-text-sidebar">
            <input type="text" name="browse" placeholder="Browse our titles" required>
        <div class="browse-link"><a href="displayBooks.php">All books</a></div>
        </div>
    </form>

    <div>
        <h2>By Major</h2>
        <?php
        foreach ($_SESSION['majors'] as $m) { //convert to full name
            // if ($m['Category'] != null) 
            echo "<div><a href=displayBooks.php?major=" . toHref($m['ID']) . ">" . $m['ID'] . '</a></div>';
        }
        ?>
    </div>

    <div>
        <h2>By Professor</h2>
        <?php

        foreach ($_SESSION['professors'] as $p) {
            echo '<div><a href=displayBooks.php?prof=' . toHref($p['name']) . '>' . $p['name'] . '</a></div>';
        }
        ?>
    </div>

</div>