<?php

$title = avoidSQLInjection(filter_input(INPUT_POST, 'title'));
$category = avoidSQLInjection(filter_input(INPUT_POST, 'cat'));
$isbn10 = avoidSQLInjection(filter_input(INPUT_POST, 'isbn'));
$prof = avoidSQLInjection(filter_input(INPUT_POST, 'prof'));

$isWanted = isset($_POST['ask-book']);
$img = 'img/no-image.png'; //unless input string; requires input tag

$conn = initDb();
exitIfErr($conn);

$table = 'book';
if (isNotYetInDatabase($table, 'ISBN_10', "$isbn10' or title = '$title")) { 
    insertBook($conn, $title, $category, $isbn10, $prof, $img);
    insertBookAvailable($conn, $_COOKIE['userInfo'], $isbn10, $isWanted);
}

$table = 'major';
if (isNotYetInDatabase($table, 'ID', $category)) {
    $res = insertMajor($conn, '?', $category);
}

$table = 'professor';
if (isNotYetInDatabase($table, 'Name', $prof)) {
    $res = insertProf($conn, $prof, '?');
}
