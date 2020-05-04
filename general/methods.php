<?php
session_start();

//sql  

function selectQuery($conn, $offset, $db) // look into prep staements
{
    $sql = "SELECT * FROM $db LIMIT $offset"; //should get every 5...

    return mysqli_query($conn, $sql) or exit(mysqli_error($conn)); //error msg without db info
}

function addToSessionArr($db, $nameType, $res)
{
    $_SESSION[$db] = initSessionArray($db);

    while ($row = mysqli_fetch_array($res)) { 
        $_SESSION[$db][] = $row[$nameType];
    }
}

function sqlToArray_Users($sql) //dry
{  
    $users = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $users[$row['email']] = $row['password'];
    }
    return $users;
}

//general

function initSessionArray($arr)
{
    return isset($_SESSION[$arr]) ? $_SESSION[$arr] : array();
}

function redirectToHomepage()
{
    echo "<br>Redirecting...";
    echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\" />";
}
