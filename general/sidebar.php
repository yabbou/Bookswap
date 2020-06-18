<?php
include_once 'setLocalDBTables.php';
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
        foreach ($_SESSION['majors'] as $m) {
            echo "<div><a href=?major=" . toHref($m['Category']) . ">" . $m['Category'] . '</a></div>';
        }
        ?>
    </div>

    <div>
        <h2>By Professor</h2>
        <?php
        
        foreach ($_SESSION['professors'] as $p) {
            echo '<div><a href=?prof=' . toHref($p['name']) . '>' . $p['name'] . '</a></div>';
        }
        ?>
    </div>

</div>