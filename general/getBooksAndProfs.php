<?php include_once 'methods.php';
$offset = 5; //move to methods.php //incfermrent sesion var by 5

$conn = initDb();
exitIfErr($conn);

$table = 'book';
$result = mysqli_query($conn, "SELECT title FROM book"); // LIMIT $offset
$_SESSION[$table] = addToSessionArr($table, 'title', $result); //move to sellbook.php

echo print_r($_SESSION[$table]); //san

// $table = 'professor';
// $result = selectQuery($conn, $offset,  $table);
// $_SESSION[$table] = addToSessionArr($table, 'name', $result);

mysqli_free_result($result);
mysqli_close($conn);
