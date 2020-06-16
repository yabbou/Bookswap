<?php
$_SESSION['numOfBooks'] = isset($_SESSION['all']) ? count($_SESSION['all']) : 0;

function setAllBooks()
{
    $sql = "SELECT * FROM book";
    $_SESSION['all'] = sqlToArray_Books('all', mysqli_query(initDb(), $sql));
}

if (!isset($_GET['browse']) || $_GET['browse'] != $_SESSION['lastSearch']) {
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));
    $_SESSION['lastSearch'] = $browse;

    $sql = "SELECT * FROM book WHERE title LIKE '%$browse%'"; //also browse isbn
    $_SESSION[$specificBR] = sqlToArray_Books($specificBR, mysqli_query(initDb(), $sql));
}
