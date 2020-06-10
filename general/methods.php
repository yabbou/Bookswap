<?php

if (session_status() != PHP_SESSION_ACTIVE) { //better, move sessoin to header.php?
    session_start();
}

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
//     return mysqli_query($conn, $sql); //error msg without db info
// }

function insertQuery_Book($conn, $table, $title, $category, $isbn10, $prof)
{
    $sql = "INSERT INTO $table (TITLE,CATEGORY,`ISBN_10`,`ISBN-13`, PROFESSOR) 
    VALUES ('$title','$category',$isbn10,0000000000000,'$prof')";
    //add prof also to prof table

    return mysqli_query($conn, $sql) or exit(mysqli_error($conn)); //dry
}

function sqlToArray_SingleVar($table, $nameType, $sql)
{ //rename
    $_SESSION[$table] = initSessionArray($table);
    
    if (count($_SESSION[$table]) < mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_array($sql)) {
            $arr[] = $row[$nameType];
        }
    }
    return $_SESSION[$table];
}

function sqlToArray_Books($ar, $sql)
{
    $arr = initSessionArray($ar); //optimization: seperate method that only queries the new books 

    while ($row = mysqli_fetch_assoc($sql)) {
        $arr[] = array('title' => $row['Title'], 'isbn-10' => $row['ISBN_10'], 'prof' => $row['Professor'], 'cat' => $row['Category']);
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

//html 

function avoidSQLInjection($data)
{ //integrate into login and sellbook forms
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//general

function initUsers()
{
    if (empty($_SESSION['users'])) {
        $conn = initDb();
        exitIfErr($conn);

        $result = mysqli_query($conn, "SELECT email, password FROM AuthorizedUsers LIMIT 5"); //replace with selectQuery()
        $_SESSION['users'] = sqlToArray_Users($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

function initSessionArray($arr)
{
    return isset($_SESSION[$arr]) ? $_SESSION[$arr] : array();
}

function redirectToHomepage()
{
    echo "<br>Redirecting...";
    echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\" />";
}
