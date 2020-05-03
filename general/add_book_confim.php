<?php

include 'methods.php';
include 'header.php';

function displayBookInfo($title, $isbn, $prof) {
    echo "<h2>This is your book:</h2>";
    echo $title;
    echo "<br>";
    echo $isbn;
    echo "<br>";
    echo $prof;
    echo "<br>";
}

displayBookInfo(filter_input(INPUT_POST, 'title'), filter_input(INPUT_POST, 'isbn'), filter_input(INPUT_POST, 'prof'));
redirectToHomepage();

include 'footer.php';



