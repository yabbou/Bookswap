<?php
include_once 'methods.php';
include 'header.php';
echo "<div class='inner-body'>";

//deprecated

function displayBookInfo($title, $category, $isbn, $prof) //unnecc
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

// displayBookInfo($title, $category, $isbn10, $prof); 
redirectTo("book.php?isbn=$isbn10");

echo '</div>';
include 'footer.php';
