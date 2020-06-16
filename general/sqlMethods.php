<?php

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

function insertBook($conn, $title, $category, $isbn10, $prof, $img)
{
    $sql = "INSERT INTO book (TITLE,CATEGORY,`ISBN_10`,`ISBN_13`, PROFESSOR, Image) 
    VALUES ('$title','$category',$isbn10,0000000000000,'$prof', $img)";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertBookAvailable($conn, $email, $isbn10, $isWanted)
{
    $sql = "INSERT INTO booksAvailable (userEmail,`ISBN_10`, isWanted) VALUES ($email,$isbn10,$isWanted)";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertMajor($conn, $category, $id)
{
    $sql = "INSERT INTO major (CATEGORY,ID) VALUES ($category,$id)";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertProf($conn, $prof, $email)
{
    $sql = "INSERT INTO professor (name, email) VALUES ($prof,$email)";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function avoidSQLInjection($data)
{ //integrate into login and sellbook forms
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
