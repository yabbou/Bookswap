<?php include 'header.php';
include_once 'methods.php';

if (empty($_SESSION['profResults'])) {
    // $_SESSION['profResults'] = sqlToArray_Books('profResults', mysqli_query(initDb(), "SELECT * FROM professor")); //rename 
}

echo '<div class="inner-body"></div>';

include 'footer.php';
