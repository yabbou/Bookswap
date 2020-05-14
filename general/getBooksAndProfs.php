<?php include_once 'methods.php';

$profsList;
$booksList;
$offset = 5; //move to methods.php //incfermrent sesion var by 5

//if (empty($_SESSION['books'])) {

$conn = initDb();
exitIfErr($conn);

$table = 'book';
$result = selectQuery($conn, $offset, $table);

while ($row = $result->fetch_assoc) {
    echo $row['title'];
}

$_SESSION[$table] = addToSessionArr($table, 'title', $result);


// $table = 'professor';
// $result = selectQuery($conn, $offset,  $table);
// $_SESSION[$table] = addToSessionArr($table, 'name', $result);

mysqli_free_result($result);
mysqli_close($conn);
