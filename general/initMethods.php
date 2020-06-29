<?php
include_once 'sqlMethods.php';

function sqlToArray($sql) //move to sqlmethods.php
{
    $conn = initDb();
    exitIfErr($conn);
    $res = mysqli_query($conn, $sql);

    $arr = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $arr[] = $row;
    }
    return $arr;
}
