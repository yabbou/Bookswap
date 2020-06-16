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

function insertQuery_Book($conn, $table, $title, $category, $isbn10, $prof)
{
    $sql = "INSERT INTO $table (TITLE,CATEGORY,`ISBN_10`,`ISBN_13`, PROFESSOR, Image) 
    VALUES ('$title','$category',$isbn10,0000000000000,'$prof', '/public/img/no-image.png')";
    //add prof also to prof table
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn)); //dry
}

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

function redirectToHomepage()
{
    echo "Redirecting...";
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=index.php\" />";
}

function toHref($s)
{
    $s = strtolower($s);
    $s = str_replace(' ', '-',  $s);
    return $s;
}
