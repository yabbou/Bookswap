<?php
include_once 'displayBooks.php';

$all = 'allBooks';
$specific = 'specificBooks';
$_SESSION['lastSearch'] = initSessionArray('lastSearch'); //works?
// $_SESSION['allBooksCount'] = isset($_SESSION[$all]) ? count($_SESSION[$all]) : 0;

function setAllBooks()
{
    global $all;
    $sql = "SELECT * FROM book";
    $_SESSION[$all] = sqlToArray_Books(mysqli_query(initDb(), $sql));
}

if (!isset($_SESSION[$all])) { 
    setAllBooks();
}

if (isset($_GET['browse']) && $_GET['browse'] != $_SESSION['lastSearch']) {
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));
    // $browse = toCol($browse);
    $_SESSION['lastSearch'] = $browse;

    global $specific;
    $sql = "SELECT * FROM book WHERE title LIKE %$browse%"; //also browse isbn
    $_SESSION[$specific] = sqlToArray_Books(mysqli_query(initDb(), $sql));
}

// else if (isset($_GET['prof'])) {
//     setSpecificBookResults('prof', 'professor');
// } else if (isset($_GET['major'])) {
//     $browse = avoidSQLInjection(filter_input(INPUT_GET, $keyword)); //dry
//     $browse = toCol($browse);
//     $_SESSION['lastSearch'] = $browse;

//     global $specific;
//     $sql = 'SELECT * FROM book join major on book.Category = major.Category where major.category = $browse';
//     $_SESSION[$specific] = sqlToArray_Books($specific, mysqli_query(initDb(), $sql));
// }


function toCol($s)
{
    return str_replace('-', ' ',  $s);
}
