<?php
include_once 'initMethods.php';
// $offset = 5; //incremrent a session var by 5

$conn = initDb();
exitIfErr($conn);

getDBTable('books', 'Title', 'book'); //delete this page adnd call method only when appropriate // rename
getDBTable('professors', 'name', 'professor');
getDBTable('majors', '*', 'major');
mysqli_close($conn);

function getDBTable($sess, $col, $dbTable)
{
    $conn = initDb();
    exitIfErr($conn);

    $sql = "SELECT $col FROM $dbTable";
    $res = mysqli_query($conn, $sql);

    $arr = array();
    while ($row = mysqli_fetch_assoc($res)) { //lvl 2: only add new rows
        $arr[] = $row;
    }
    $_SESSION[$sess] = $arr;
    mysqli_close($conn);
}
