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

$isWanted = isset($_POST['ask-book']);
$img = '/public/img/no-image.png'; //unless input string... into input-tag

insertBook($conn, $title, $category, $isbn10, $prof, $img);
insertBookAvailable($conn, $title, $isbn10, $isWanted);
insertMajor($conn, '', $category);
insertProf($conn, $prof, '');

//note: can technically compare count of books/profs/etc with local books... but primary adding is directly thru sell-book page

global $all;
if (isNotYetInDatabase()) {
    $_SESSION[$all][] = array('title' => $title, 'isbn-10' => $isbn10, 'prof' => $prof, 'cat' => $category, 'img' => $img);
}
print_r($_SESSION[$all]);
$_SESSION['professors'][] = array('category' => $title, 'isbn-10' => $isbn10, 'prof' => $prof, 'cat' => $category, 'img' => $img);
$_SESSION['majors'][] = array('title' => $title, 'isbn-10' => $isbn10, 'prof' => $prof, 'cat' => $category, 'img' => $img);

//into [majors] and [professors] too? or query each time load sell_book page?

redirectToHomepage();
echo '</div>';

include 'footer.php';
