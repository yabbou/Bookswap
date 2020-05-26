<?php include_once 'methods.php';
$offset = 5; //move to methods.php //incremrent session var by 5

$conn = initDb();
exitIfErr($conn);

$table = 'book';
$result = mysqli_query($conn, "SELECT title FROM book"); // LIMIT $offset //make only if not yet run
$_SESSION[$table] = sqlToArray_SingleVar($table, 'title', $result);
// echo print_r($_SESSION[$table]); //replace with logger

$table = 'professor';
$result = mysqli_query($conn, "SELECT name FROM professor");
$_SESSION[$table] = sqlToArray_SingleVar($table, 'name', $result);

mysqli_free_result($result);
mysqli_close($conn);
