<?php
include_once 'sqlMethods.php';

function initSessionArray($arr)
{
    return isset($_SESSION[$arr]) ? $_SESSION[$arr] : array();
}

function sqlToArray($sql)
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

function initUsers()
{
    if (empty($_SESSION['users'])) {
        $conn = initDb();
        exitIfErr($conn);

        $result = mysqli_query($conn, "SELECT email, password FROM user LIMIT 5");
        $_SESSION['users'] = sqlToArray_Users($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

function sqlToArray_Users($res) //unnecc
{
    $users = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $users[$row['email']] = $row['password'];
    }
    return $users;
}
