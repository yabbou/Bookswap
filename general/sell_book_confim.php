<?php
include_once 'methods.php';
include 'header.php';

echo "<div class='inner-body'>";

function displayBookInfo($title, $category, $isbn, $prof)
{
    echo "<h2>This is your book:</h2>";
    echo $title;
    echo "<br>";
    echo $category;
    echo "<br>";
    echo $isbn;
    echo "<br>";
    echo $prof;
    echo "<br><br>";
}

include 'insertToDbTables.php';
displayBookInfo($title, $category, $isbn10, $prof);
// redirectToHomepage();

echo '</div>';
include 'footer.php';

//NOTE: 
//can technically compare count of books/profs/etc with local books... 
//but primary adding is directly thru sell-book page
