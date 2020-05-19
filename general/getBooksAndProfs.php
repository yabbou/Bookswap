<?php include_once 'methods.php';

// $profsList;
// $booksList;
$offset = 5; //move to methods.php //incfermrent sesion var by 5

$conn = initDb();
exitIfErr($conn);

$table = 'book';
echo "1st san: " . print_r($_SESSION[$table]); //san
$result = selectQuery($conn, 'title', $table, $offset); //doesnt work
$_SESSION[$table] = addToSessionArr($table, 'title', $result);
echo "2nd san: " . print_r($_SESSION[$table]); //san

// $table = 'professor';
// $result = selectQuery($conn, $offset,  $table);
// $_SESSION[$table] = addToSessionArr($table, 'name', $result);

mysqli_free_result($result);
mysqli_close($conn);
