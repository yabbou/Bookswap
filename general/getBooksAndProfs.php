<?php include_once 'methods.php';

$profsList;
$booksList;
$offset = isset($_SESSION['offset']) ? $_SESSION['offset'] + 5 : 5; //move to methods.php

//if (empty($_SESSION['books'])) {

$conn = initDb();
exitIfErr($conn);

$table = 'book';
$result = selectQuery($conn, $offset, $table);
addToSessionArr($table, 'title', $result);

$table = 'professor';
$result = selectQuery($conn, $offset,  $table);
addToSessionArr($table, 'name', $result);

mysqli_free_result($result);
mysqli_close($conn);
//}
