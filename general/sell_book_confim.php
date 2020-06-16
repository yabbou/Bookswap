<?php
include_once 'methods.php';
include 'header.php';

function displayBookInfo($title, $category, $isbn, $prof)
{
    echo "<div class='inner-body'><h2>This is your book:</h2>";
    echo $title;
    echo "<br>";
    echo $category;
    echo "<br>";
    echo $isbn;
    echo "<br>";
    echo $prof;
    echo "<br><br>";
}

$title = avoidSQLInjection(filter_input(INPUT_POST, 'title'));
$category = avoidSQLInjection(filter_input(INPUT_POST, 'cat'));
$isbn10 = avoidSQLInjection(filter_input(INPUT_POST, 'isbn'));
$prof = avoidSQLInjection(filter_input(INPUT_POST, 'prof'));
displayBookInfo($title, $category, $isbn10, $prof);

$conn = initDb();
exitIfErr($conn);

$isWanted = isset($_POST['ask-book']); // ? true : false;
$img = '/public/img/no-image.png';

insertBook($conn, $title, $category, $isbn10, $prof, $img);
insertBookAvailable($conn, '$title', $isbn10, $isWanted);
insertMajor($conn, '', $category);
insertProf($conn, $prof, '');

global $all;
$_SESSION[$all][] = array('title' => $title, 'isbn-10' => $isbn10, 'prof' => $prof, 'cat' => $category, 'img' => $img);

redirectToHomepage();
echo '</div>';

include 'footer.php';
