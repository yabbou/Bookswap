<?php
include_once 'initMethods.php';
// $offset = 5; //incremrent a session var by 5

//convert to using live calling?

$conn = initDb();
exitIfErr($conn);

// setLocalTable('books', '*', 'book');
setLocalTable('professors', 'name', 'professor');
setLocalTable('majors', '*', 'major');
mysqli_close($conn);

function setLocalTable($sess, $col, $dbTable) //fix this <<<<<<<
{
    global $conn;
    // $_SESSION[$sess] = initSessionArray($sess);

    $res = mysqli_query($conn, "SELECT $col FROM $dbTable");

    $arr = array();
    while ($row = mysqli_fetch_assoc($res)) { //lvl 2: only add new rows
        $arr[] = $row;
    }
    $_SESSION[$sess] = $arr;
}
