<?php
include_once 'sqlMethods.php';

function initSessionArray($arr)
{
    return isset($_SESSION[$arr]) ? $_SESSION[$arr] : array();
}

function sqlToArray_Books($sql)
{
    $arr = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $arr[] = array('title' => $row['Title'], 'isbn-10' => $row['ISBN_10'], 'prof' => $row['Professor'], 'cat' => $row['Category'], 'img' => $row['Image']);
    }
    return $arr;
}

function sqlToArray_Users($sql)
{
    $users = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $users[$row['email']] = $row['password'];
    }
    return $users;
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
