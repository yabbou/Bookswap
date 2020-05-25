<?php
session_start();

//sql  

function initDb()
{
    return mysqli_connect("localhost", "root", "", "bookswap");
}

function exitIfErr($conn)
{
    if ($conn->connect_errno) {
        exit();
    }
}

// function selectQuery($conn, $col, $table, $offset) // look into prep staements
// {
//     $sql = "SELECT `$col` FROM `$table` LIMIT $offset"; //should get every 5...
//     return mysqli_query($conn, $sql) or exit(mysqli_error($conn)); //error msg without db info
// }

function insertQuery_Book($conn, $table, $title, $category, $isbn10, $prof)
{
    $sql = "INSERT INTO $table (TITLE,CATEGORY,`ISBN-10`,`ISBN-13`, PROFESSOR) 
    VALUES ('$title','$category',$isbn10,NULL,'$prof')";
    //add prof also to prof table

    return mysqli_query($conn, $sql) or exit(mysqli_error($conn)); //dry
}

function addToSessionArr($table, $nameType, $sql)
{
    $arr = initSessionArray($table);

    if (count($_SESSION[$table]) < mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_array($sql)) {
            $arr[] = $row[$nameType];
        }
    }
    return $arr;
}

function sqlToArray_Users($sql) //dry
{
    $users = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $users[$row['name']] = $row['password']; //change to email
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
