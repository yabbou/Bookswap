<?php
include_once 'methods.php';
// $offset = 5; //incremrent a session var by 5

$conn = initDb();
exitIfErr($conn);

setLocalTable('books', 'title', 'book'); 
setLocalTable('professors', 'name','professor');
// $result = mysqli_query($conn, "SELECT * FROM major");
// $_SESSION[$table] = sqlToArray_TwoCols($table, 'category', 'id', $result);
setLocalTable('majors','*','major');

mysqli_free_result($result);
mysqli_close($conn);

function setLocalTable($sess, $col, $table)
{
    global $conn;
    $res = !empty($_SESSION[$sess]) ? $_SESSION[$sess] : mysqli_query($conn, "SELECT $col FROM $table");

    if (empty($_SESSION[$sess]) && count($_SESSION[$table]) < mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_assoc($res)) {
            $_SESSION[$sess][] = $row; //works?
        }
    }
}
