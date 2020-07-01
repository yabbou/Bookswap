<div class="routing-group majors">

    <h1 class="routing-title">Majors</h1>

    <div class="landing-options">
        <?php

        $i = 0;
        foreach ($_SESSION['majors'] as $m) { //convert to full name
            if ($i % 6 == 0) {
                echo "<div>";
            }
            echo "<div><a href=displayBooks.php?major=" . toHref($m['ID']) . ">" . $m['ID'] . '</a></div>';
            $i++;
            if ($i % 6 == 0) {
                echo "</div>";
            }
        }
        ?>

    </div>
</div>