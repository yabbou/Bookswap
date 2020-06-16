<?php
include_once 'getDBTables.php';
?>

<div class="sidebar">

    <form action="displayBooks.php" method="get">
        <div class="browse-text-sidebar">
            <input type="text" name="browse" placeholder="Browse our titles" required>
        </div>
    </form>

    <div>
        <h2>By Major</h2>
        <?php
        foreach ($_SESSION['major'] as $m) {
            echo "<div><a href=?major=" . toHref($m) . ">" . $m . '</a></div>';
        }
        ?>
    </div>

    <div>
        <h2>By Professor</h2>
        <?php
        foreach ($_SESSION['professor'] as $m) {
            echo '<div><a href=?prof=' . toHref($m) . '>' . $m . '</a></div>';
        }
        ?>
    </div>

</div>