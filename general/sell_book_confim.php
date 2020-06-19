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
$img = '/public/img/no-image.png'; //unless input string; requires input tag

// echo print_r($_SESSION['major']); //san

$res = insertBook($conn, $title, $category, $isbn10, $prof, $img);
insertBookAvailable($conn, $_SESSION['currentUser'], $isbn10, $isWanted);
addToLocalTable('book', 'ISBN_10', $isbn10, $res);

$res = insertMajor($conn, '?', $category); //problem starts here
addToLocalTable('major', 'ID', $category, $res);

$res = insertProf($conn, $prof, '?');
addToLocalTable('professor', 'Name', $prof, $res);

redirectToHomepage();
echo '</div>';

include 'footer.php';

function addToLocalTable($sess, $col, $val, $res)
//note: can technically compare count of books/profs/etc with local books... but primary adding is directly thru sell-book page
{
    if (isNotYetInDatabase($sess, $col, $val)) { //otherwise the db will not input it...
        $_SESSION[$sess.'s'][] = mysqli_fetch_assoc($res);
    }
}
