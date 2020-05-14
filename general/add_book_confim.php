<?php

include_once 'methods.php';
include 'header.php';

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
    echo "<br>";
}

$title = filter_input(INPUT_POST, 'title');
$category = filter_input(INPUT_POST, 'cat');
$isbn10 = filter_input(INPUT_POST, 'isbn');
$prof = filter_input(INPUT_POST, 'prof');
displayBookInfo($title, $category, $isbn10, $prof);

$conn = initDb();
exitIfErr($conn);
insertQuery_Book($conn, 'book', $title, $category, $isbn10, $prof);

//forgot if missing something

redirectToHomepage();

include 'footer.php';
