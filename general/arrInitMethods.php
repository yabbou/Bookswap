<?php
include_once 'sqlMethods.php';

function sqlToArray_SingleVar($table, $col, $sql)
{ //rename
    $arr = initSessionArray($table);
    $_SESSION[$table] = $arr;

    if (count($_SESSION[$table]) < mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_array($sql)) {
            $arr[] = $row[$col];
        }
    }
    return $arr;
}

function sqlToArray_Books($sql)
{
    $arr = array(); //optimization: seperate method that only queries the new books 
    while ($row = mysqli_fetch_assoc($sql)) {
        $arr[] = array('title' => $row['Title'], 'isbn-10' => $row['ISBN_10'], 'prof' => $row['Professor'], 'cat' => $row['Category'], 'img' => $row['Image']);
    }
    return $arr;
}

function sqlToArray_Users($sql)
{ //dry 
    $users = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $users[$row['email']] = $row['password'];
    }
    return $users;
}

//general

function initUsers()
{
    if (empty($_SESSION['users'])) {
        $conn = initDb();
        exitIfErr($conn);

        $result = mysqli_query($conn, "SELECT email, password FROM user LIMIT 5"); //replace with selectQuery()
        $_SESSION['users'] = sqlToArray_Users($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

function initSessionArray($arr)
{
    return isset($_SESSION[$arr]) ? $_SESSION[$arr] : array();
}
