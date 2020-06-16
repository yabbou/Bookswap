<?php 
include_once 'methods.php';
// $offset = 5; //incremrent a session var by 5
global $all;

$conn = initDb();
exitIfErr($conn);

$table = 'titles';
$result = isset($_SESSION[$all]) ? $_SESSION[$all] : mysqli_query($conn, "SELECT title FROM book"); // LIMIT $offset 
$_SESSION[$table] = sqlToArray_SingleVar($table, 'title', $result);
// echo print_r($_SESSION[$table]); //replace with logger

$table = 'professors';
$result = mysqli_query($conn, "SELECT name FROM professor");
$_SESSION[$table] = sqlToArray_SingleVar($table, 'name', $result);

$table = 'majors';
$result = mysqli_query($conn, "SELECT category FROM major");
$_SESSION[$table] = sqlToArray_SingleVar($table, 'category', $result);

mysqli_free_result($result);
mysqli_close($conn);
