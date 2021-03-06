<?php
include 'setLocalDBTables.php';
include "header.php"; ?>

<div class='b-form-container parallax'>
    <form id='b-form' action='displayBooks.php' method='get'>
        <div class='browse-text'>
            <?php include 'searchbar.php'; ?>
        </div>

        <div class='browse-link'><a href='displayBooks.php?major=#'>By major </a></div>
        <div class='browse-link'><a href='displayBooks.php?prof=#'>By professor </a></div>
        <div class='browse-link'><a href='displayBooks.php'>All books </a></div>
    </form>
</div>

<?php
include "featuredBooks.php";
include "majors.php";
include "profs.php";
include "footer.php";
