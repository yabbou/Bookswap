<?php
include_once 'displayBooks.php';

$all = 'allBooks';
$specific = 'specific';
$_SESSION['lastSearch'] = initSessionArray('lastSearch'); //works?
// $_SESSION['allBooksCount'] = isset($_SESSION[$all]) ? count($_SESSION[$all]) : 0;

function setAllBooks(){
    global $all;
    $sql = "SELECT * FROM book";
    $_SESSION[$all] = sqlToArray_Books($all, mysqli_query(initDb(), $sql));
}

if ($_SESSION[$specific] != null) {
    setAllBooks();
}

if (!isset($_GET['browse']) || $_GET['browse'] != $_SESSION['lastSearch']) {
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));
    $_SESSION['lastSearch'] = $browse;

    $sql = "SELECT * FROM book WHERE title LIKE '%$browse%'"; //also browse isbn
    $_SESSION[$specific] = sqlToArray_Books($specific, mysqli_query(initDb(), $sql));
}
