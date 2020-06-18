<?php
include_once 'initMethods.php';
// $offset = 5; //incremrent a session var by 5

$conn = initDb();
exitIfErr($conn);

setLocalTable('books', '*', 'book');
setLocalTable('professors', 'name', 'professor');
setLocalTable('majors', '*', 'major');
mysqli_close($conn);

function setLocalTable($sess, $col, $dbTable)
{
    global $conn;
    $_SESSION[$sess] = initSessionArray($sess);

    if ($_SESSION[$sess] == null) { //!isset($_SESSION[$sess]) ||
        $res = mysqli_query($conn, "SELECT $col FROM $dbTable");

        if (count($_SESSION[$sess]) < mysqli_num_rows($res)) {
            $arr = array();
            while ($row = mysqli_fetch_assoc($res)) { //todo: only add new rows
                $arr[] = $row;
            }
            $_SESSION[$sess] = $arr;
        }
    }
}
